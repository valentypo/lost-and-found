<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Claim;
use Illuminate\Support\Facades\Auth;
use App\Models\LostItem;
use App\Models\FoundItem;

class ClaimController extends Controller
{
    public function index(Request $request)
    {
        $userId = auth()->id();

        // 1) Claims yang kamu buat (claimer)
        $myClaims = Claim::with(['lostItem', 'foundItem'])
            ->where('claimer_id', $userId)
            ->latest()
            ->paginate(5, ['*'], 'my_page'); // ✅ page param khusus

        // 2) Claims yang masuk ke item kamu (owner)
        $claimsOnMyItems = Claim::with(['lostItem', 'foundItem'])
            ->where('owner_id', $userId)
            ->latest()
            ->paginate(5, ['*'], 'owner_page'); // ✅ page param khusus

        return view('claims.index', compact('myClaims', 'claimsOnMyItems'));
    }

    public function pending()
    {
        // Pending claim untuk item milik kamu
        $claims = Claim::with(['lostItem', 'foundItem'])
            ->where('status', 'pending')
            ->where('owner_id', auth()->id())
            ->latest()
            ->paginate(5);

        return view('claims.pending', compact('claims'));
    }

    public function requests()
    {
        // Semua claim untuk item milik kamu (atau bisa khusus pending kalau mau)
        $claims = Claim::with(['lostItem', 'foundItem'])
            ->where('owner_id', Auth::id())
            ->latest()
            ->paginate(5);

        return view('claims.requests', compact('claims'));
    }

    public function show($id)
    {
        // Konsisten pakai lostItem/foundItem (bukan 'item')
        $claim = Claim::with(['lostItem', 'foundItem'])->findOrFail($id);

        return view('claims.show', compact('claim'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'item_id'  => 'required',
            'owner_id' => 'required',
            'type'     => 'required|in:lost,found',
        ]);

        // Prevent claiming your own items
        if ((int)$request->owner_id === (int)auth()->id()) {
            return back()->with('error', 'You cannot claim your own item.');
        }
        // Prevent duplicate claims
    $exists = Claim::where('claimer_id', auth()->id())
        ->where('item_id', $request->item_id)
        ->where('type', $request->type)
        ->whereIn('status', ['pending', 'approved'])
        ->exists();

    if ($exists) {
        return back()->with('error', 'You have already requested a claim for this item.');
    }

        Claim::create([
            'claimer_id' => auth()->id(),
            'item_id'    => $request->item_id,
            'owner_id'   => $request->owner_id,
            'type'       => $request->type,
            'status'     => 'pending',
        ]);

        return redirect()->route('claims.index')
            ->with('success', 'Claim request submitted!');
    }

    public function destroy($id)
        {
            $claim = Claim::where('id', $id)
                ->where('claimer_id', auth()->id()) // only delete your own claims
                ->firstOrFail();

            $claim->delete();

            return redirect()->route('claims.index')
                ->with('success', 'Claim request deleted.');
        }

    public function approve(Claim $claim)
    {
        // Only the item owner can approve
        abort_if($claim->owner_id !== auth()->id(), 403);

        // Only pending claims can be approved
        if ($claim->status !== 'pending') {
            return back()->with('error', 'This claim is no longer pending.');
        }

        // Approve this claim
        $claim->update([
            'status' => 'approved',
        ]);

        // OPTIONAL: mark item as claimed
        if ($claim->type === 'lost') {
            LostItem::where('id', $claim->item_id)
                ->update(['status' => 'claimed']);
        }

        if ($claim->type === 'found') {
            FoundItem::where('id', $claim->item_id)
                ->update(['status' => 'claimed']);
        }

        return back()->with('success', 'Claim approved. Contact is now visible.');
    }

    public function reject(Claim $claim)
    {
        // Only the item owner can reject
        abort_if($claim->owner_id !== auth()->id(), 403);

        // Only pending claims can be rejected
        if ($claim->status !== 'pending') {
            return back()->with('error', 'This claim is no longer pending.');
        }

        $claim->update([
            'status' => 'rejected',
        ]);

        return back()->with('success', 'Claim rejected.');
    }

    public function finish(Claim $claim)
    {
        abort_if($claim->owner_id !== auth()->id(), 403);

        if ($claim->status !== 'approved') {
            return back()->with('error', 'Only approved claims can be finished.');
        }

        $claim->update([
            'status' => 'finished',
        ]);

        return back()->with('success', 'Claim process marked as finished.');
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\LostItem;
use Illuminate\Http\Request;

class LostItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = LostItem::query();

        // Search by title OR description
        if ($request->filled('search')) {
            $query->where(function($q) use ($request) {
                $q->where('title', 'LIKE', '%' . $request->search . '%')
                ->orWhere('description', 'LIKE', '%' . $request->search . '%');
            });
        }

        // Filter by location
        if ($request->filled('location')) {
            $query->where('location', 'LIKE', '%' . $request->location . '%');
        }

        // Filter by lost date
        if ($request->filled('lost_date')) {
            $query->whereDate('lost_date', $request->lost_date);
        }

        $items = $query->latest()->get();

        return view('lost-items.index', compact('items'));
    }
   
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('lost-items.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'location' => 'required',
            'lost_date' => 'required|date',
            'photo' => 'image|nullable|max:2048',
            'contact_number' => 'required'
        ]);

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('lost-items', 'public');
        }

        $data['user_id'] = auth()->id();

        LostItem::create($data);

        return redirect()->route('lost-items.index')
                         ->with('success', 'Lost item added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $item = LostItem::findOrFail($id);

        return view('lost-items.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $lostItem = LostItem::findOrFail($id);

        abort_if($lostItem->user_id !== auth()->id(), 403);

        return view('lost-items.edit', compact('lostItem'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $lostItem = LostItem::findOrFail($id);

        abort_if($lostItem->user_id !== auth()->id(), 403);

        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'location' => 'required',
            'lost_date' => 'required|date',
            'photo' => 'image|nullable|max:2048',
            'contact_number' => 'required',
        ]);

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('lost-items', 'public');
        }

        $lostItem->update($data);

        return redirect()->route('lost-items.index')
                         ->with('success', 'Lost item updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $item = LostItem::findOrFail($id);

        abort_if($item->user_id !== auth()->id(), 403);

        $item->delete();

        return redirect()->route('lost-items.index')
                         ->with('success', 'Lost item deleted successfully!');
    }

    public function claim($id)
    {
        $item = LostItem::findOrFail($id);

        abort_if($item->user_id === auth()->id(), 403);

        $item->update(['status' => 'claimed']);

        return back()->with('success', 'Claim request sent.');
    }


}

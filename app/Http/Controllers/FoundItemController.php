<?php

namespace App\Http\Controllers;

use App\Models\FoundItem;
use Illuminate\Http\Request;

class FoundItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = FoundItem::query();

        // Search (title + description)
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                ->orWhere('description', 'like', '%' . $request->search . '%');
            });
        }

        // Location filter
        if ($request->filled('location')) {
            $query->where('location', 'like', '%' . $request->location . '%');
        }

        // Found date filter
        if ($request->filled('found_date')) {
            $query->whereDate('found_date', $request->found_date);
        }

        // Final result
        $items = $query->latest()->get();

        return view('found-items.index', compact('items'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('found-items.create');
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
            'found_date' => 'required|date',
            'photo' => 'image|nullable|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('found-items', 'public');
        }

        $data['user_id'] = auth()->id();

        FoundItem::create($data);

        return redirect()->route('found-items.index')
                         ->with('success', 'Found item added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $item = FoundItem::findOrFail($id);

        abort_if($item->user_id !== auth()->id(), 403);

        return view('found-items.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $foundItem = FoundItem::findOrFail($id);

        abort_if($foundItem->user_id !== auth()->id(), 403);

        return view('found-items.edit', compact('foundItem'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $foundItem = FoundItem::findOrFail($id);

        abort_if($foundItem->user_id !== auth()->id(), 403);

        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'location' => 'required',
            'found_date' => 'required|date',
            'photo' => 'image|nullable|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('found-items', 'public');
        }

        $foundItem->update($data);

        return redirect()->route('found-items.index')
                         ->with('success', 'Found item updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $item = FoundItem::findOrFail($id);

        abort_if($item->user_id !== auth()->id(), 403);

        $item->delete();

        return redirect()->route('found-items.index')
                         ->with('success', 'Found item deleted successfully!');
    }
}

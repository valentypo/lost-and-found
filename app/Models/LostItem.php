<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LostItem extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'location',
        'lost_date',
        'photo',
        'contact_number',
        'status'
    ];


    // public function store(Request $request)
    // {
    // $data = $request->validate([
    //     'title' => 'required',
    //     'description' => 'required',
    //     'location' => 'required',
    //     'lost_date' => 'required|date',
    //     'photo' => 'image|nullable|max:2048'
    // ]);

    // if ($request->hasFile('photo')) {
    //     $data['photo'] = $request->file('photo')->store('lost-items', 'public');
    // }

    // $data['user_id'] = auth()->id();

    // LostItem::create($data);

    // return redirect()->route('lost-items.index');
    // }

}

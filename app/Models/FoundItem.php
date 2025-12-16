<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FoundItem extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'location',
        'found_date',
        'photo',
        'contact_number',
        'status'
    ];

}

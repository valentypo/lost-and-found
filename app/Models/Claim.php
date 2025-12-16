<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\FoundItem;
use App\Models\LostItem;
use App\Models\User;

class Claim extends Model
{
    protected $fillable = [
        'claimer_id',
        'item_id',
        'owner_id',
        'type',
        'status'
    ];

    public function claimer()
    {
        return $this->belongsTo(User::class, 'claimer_id');
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    // Specific relationships
    public function lostItem()
    {
        return $this->belongsTo(LostItem::class, 'item_id');
    }

    public function foundItem()
    {
        return $this->belongsTo(FoundItem::class, 'item_id');
    }

    // Smart accessor (NOT used in eager loading)
    public function getItemAttribute()
    {
        return $this->type === 'lost'
            ? $this->lostItem
            : $this->foundItem;
    }
}

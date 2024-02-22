<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RoomItem extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}

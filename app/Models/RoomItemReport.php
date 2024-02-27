<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RoomItemReport extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    public function roomItem()
    {
        return $this->belongsTo(RoomItem::class);
    }
}

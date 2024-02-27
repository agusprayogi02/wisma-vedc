<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Room extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    public function boardingHouse()
    {
        return $this->belongsTo(BoardingHouse::class);
    }

    public function roomStatus()
    {
        return $this->belongsTo(RoomStatus::class);
    }
    public function roomType()
    {
        return $this->belongsTo(RoomType::class);
    }

    public function roomItems()
    {
        return $this->hasMany(RoomItem::class);
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function roomUsers()
    {
        return $this->belongsToMany(User::class, 'room_user')->withPivot('poin');
    }
}

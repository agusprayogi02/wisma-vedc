<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Room extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    public function boardingHouse(): BelongsTo
    {
        return $this->belongsTo(BoardingHouse::class);
    }

    public function roomStatus(): BelongsTo
    {
        return $this->belongsTo(RoomStatus::class);
    }

    public function roomType(): BelongsTo
    {
        return $this->belongsTo(RoomType::class);
    }

    public function roomItems(): HasMany
    {
        return $this->hasMany(RoomItem::class);
    }

    public function reservations(): BelongsToMany
    {
        return $this->BelongsToMany(Reservation::class, 'reservation_boarding_houses')->withTimestamps();
    }

    public function roomUsers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'room_user')->withPivot('poin');
    }
}

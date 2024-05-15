<?php

namespace App\Repositories\Keeper;

use App\Models\Room;

class KeeperRepository
{
    protected Room $room;

    public function __construct(Room $room)
    {
        $this->room = $room;
    }

    public function getSummaryRoom(): array
    {
//        $usedRoom = $this->room->select(["rooms.id"])->leftJoin("customers", "rooms.id", "=", "customers.room_id")
//            ->leftJoin("reservations", "customers.reservation_id", "=", "reservations.id")
//            ->where(function ($query) {
//                $query->whereBetween('reservations.date_ci', [now(), now()])
//                    ->orWhereBetween('reservations.date_co', [now(), now()])
//                    ->orWhere(function ($query) {
//                        $query->where('reservations.date_ci', '<', now())
//                            ->where('reservations.date_co', '>', now());
//                    });
//            })
//            ->groupBy('rooms.id');

        
        return [
            'used' => $usedRoom->count(),
        ];
    }
}

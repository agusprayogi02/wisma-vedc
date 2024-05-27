<?php

namespace App\Repositories\Keeper;

use App\Models\RoomStatus;

class KeeperRepository
{
    protected RoomStatus $roomStatus;

    public function __construct(RoomStatus $roomStatus)
    {
        $this->roomStatus = $roomStatus;
    }

    public function getSummaryRoom(): array
    {
        $sumByStatus = $this->roomStatus
            ->selectRaw('room_statuses.id AS status_id, room_statuses.name AS status_name, COUNT(a.id) AS jumlah')
            ->leftJoin('rooms as a', 'a.room_status_id', '=', 'room_statuses.id')
            ->groupBy('room_statuses.id', 'room_statuses.name')
            ->orderBy('room_statuses.id', 'ASC');

        return $sumByStatus->get()->toArray();
    }
}

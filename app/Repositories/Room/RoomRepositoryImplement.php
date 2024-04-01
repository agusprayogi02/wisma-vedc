<?php

namespace App\Repositories\Room;

use App\Models\Room;
use LaravelEasyRepository\Implementations\Eloquent;

class RoomRepositoryImplement extends Eloquent implements RoomRepository
{

    /**
     * Model class to be used in this repository for the common methods inside Eloquent
     * Don't remove or change $this->model variable name
     * @property Model|mixed $model;
     */
    protected Room $model;

    public function __construct(Room $model)
    {
        $this->model = $model;
    }

    public function getRooms()
    {
        return $this->model->with(['boardingHouse', 'roomStatus', 'roomType'])->get();
    }

    public function getTotalRoomUsedToday(): array
{
    $roomsUsed = $this->model
        ->whereIn('room_status_id', [1, 3, 4])
        ->with(['boardingHouse', 'roomStatus', 'roomType'])
        ->get();

    return [
        'total' => $roomsUsed->count(),
        'rooms' => $roomsUsed
    ];
}

    public function getTotalRoomKotorToday(): array
{
    $roomsKotor = $this->model
        ->where('room_status_id', 7)
        ->with(['boardingHouse', 'roomStatus', 'roomType'])
        ->get();

    return [
        'total' => $roomsKotor->count(),
        'rooms' => $roomsKotor
    ];
}


    public function getTotalRoomReadyToday(): array
{
    $roomsReady = $this->model
        ->whereIn('room_status_id', [2,5,6])
        ->with(['boardingHouse', 'roomStatus', 'roomType'])
        ->get();

    return [
        'total' => $roomsReady->count(),
        'rooms' => $roomsReady
    ];
}

    public function getTotalRoom(): int
    {
        return $this->model->count();
    }

    public function getTotalRoomUsedByAsramaToday(): int
    {
        return $this->model
            ->whereIn('room_status_id', [1, 3, 4])
            ->groupBy('boarding_house_id')
            ->count();
    }

}

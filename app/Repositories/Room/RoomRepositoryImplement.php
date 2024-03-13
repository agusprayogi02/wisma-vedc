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

    public function getTotalRoomUsedToday(): int
    {
        return $this->model
            ->whereIn('room_status_id', [1, 3, 4])
            // ->whereDate('created_at', '=', now()->format('Y-m-d'))
            ->count();
    }
    public function getTotalRoomKotorToday(): int
    {
        return $this->model
            ->where('room_status_id', 7)
            // ->whereDate('created_at', '=', now()->format('Y-m-d'))
            ->count();
    }

    public function getTotalRoomReadyToday(): int
    {
        return $this->model
            ->whereIn('room_status_id', [2,5,6])
            // ->whereDate('created_at', '=', now()->format('Y-m-d'))
            ->count();
    }

    public function getTotalRoom(): int
    {
        return $this->model->count();
    }

}

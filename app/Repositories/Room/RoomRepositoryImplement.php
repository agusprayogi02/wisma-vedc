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

    public function getRooms(): \LaravelIdea\Helper\App\Models\_IH_Room_C|\Illuminate\Database\Eloquent\Collection|array
    {
        return $this->model->with(['boardingHouse', 'roomStatus', 'roomType'])->get();
    }

    public function getTotalRoomUsedToday(): int
    {
        return $this->model
            ->whereIn('room_type_id', [1, 3, 4])
            ->whereDate('created_at', '=', now()->format('Y-m-d'))
            ->count();
    }


}

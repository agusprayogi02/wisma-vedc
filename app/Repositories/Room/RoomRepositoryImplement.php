<?php

namespace App\Repositories\Room;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\Room;

class RoomRepositoryImplement extends Eloquent implements RoomRepository{

    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    protected $model;

    public function __construct(Room $model)
    {
        $this->model = $model;
    }

    public function getRooms()
    {
        $data = $this->model->all();
        $return_data = [];

        foreach($data as $items){
            $return_data[] = [
                'id' => $items->id,
                'room_status' => $items->roomStatus->name,
                'boardinghouse' => $items->boardingHouse->name,
                'room_type' => $items->roomType->name,
                'code' => $items->code,
                'note' => $items->note,
            ];
        }

        return $return_data;
    }

    public function getTotalRoomUsedToday()
    {
        return $this->model
        ->whereIn('room_type_id', [1, 3, 4])
        ->whereDate('created_at', now()->format('Y-m-d'))
        ->count();
    }


}

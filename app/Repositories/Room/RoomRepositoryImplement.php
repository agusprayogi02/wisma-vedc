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

    public function getRooms(): \Illuminate\Database\Eloquent\Collection|array
    {
        return $this->model->with(['boardingHouse', 'roomStatus', 'roomType'])->get();
    }

    public function getTotalRoomUsedToday(): \Illuminate\Database\Eloquent\Collection|array
    {
        return $this->model
            ->whereIn('room_status_id', [1, 3, 4])
            ->with(['boardingHouse', 'roomStatus', 'roomType'])
            ->get();
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
            ->whereIn('room_status_id', [2, 5, 6])
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

    public function update($id, array $data)
    {
        $room = $this->model->find($id);
        if (!$room) {
            return false;
        }

        $room->update($data);
        return true;
    }
}

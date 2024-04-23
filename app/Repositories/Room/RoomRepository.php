<?php

namespace App\Repositories\Room;

use App\Models\Room;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class RoomRepository
{

    /**
     * Model class to be used in this repository for the common methods inside Eloquent
     * Don't remove or change $this->model variable name
     * @property Room|mixed $model;
     */
    protected Room $model;

    public function __construct(Room $model)
    {
        $this->model = $model;
    }

    /**
     * @return Room[]|LengthAwarePaginator|\Illuminate\Pagination\LengthAwarePaginator
     */
    public function getRooms(int $perPage): LengthAwarePaginator|array|\Illuminate\Pagination\LengthAwarePaginator
    {
        return $this->model->with(['boardingHouse', 'roomStatus', 'roomType'])->paginate($perPage);
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

    public function getTotalRoomUsedByAsramaToday($boarding_house_id): int
    {
        return $this->model
            ->where('boarding_house_id', $boarding_house_id) // Menambahkan kriteria pencarian berdasarkan ID asrama
            ->whereIn('room_status_id', [1, 3, 4])
            ->count();
    }

    public function update($id, array $data): bool
    {
        $room = $this->model->find($id);
        if (!$room) {
            return false;
        }

        $room->update($data);
        return true;
    }
}

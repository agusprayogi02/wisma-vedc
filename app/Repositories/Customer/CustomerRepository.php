<?php

// File: CustomerRepositoryImplement.php

namespace App\Repositories\Customer;

use App\Models\Customer;

class CustomerRepository
{

    /**
     * Model class to be used in this repository for the common methods inside Eloquent
     * Don't remove or change $this->model variable name
     * @property Customer|mixed $model;
     */
    protected Customer $model;

    public function __construct(Customer $model)
    {
        $this->model = $model;
    }

    public function countRoomDate($tgl, $id_room): int
    {
        return $this->model->where('room_id', $id_room)->whereHas('reservation', function ($query) use ($tgl) {
            $query->where('date_ci', $tgl);
        })->count();
    }

    public function getCustomerData($id): Customer|array|null
    {
        return $this->model->find($id);
    }

    public function updateDataCustomer($id, $data): true
    {
        $customer = $this->model->findOrFail($id);
        $customer->update($data);
        return true;
    }

    public function getRoomCapacity($tgl): array
    {
        return $this->model
            ->join('rooms', 'rooms.id', '=', 'customers.room_id')
            ->join('room_types', 'rooms.room_type_id', '=', 'room_types.id')
            ->whereHas('reservation', function ($query) use ($tgl) {
                $query->where('date_ci', $tgl);
            })
            ->groupBy('room_id', 'gender')
            ->selectRaw('rooms.code as room, room_types.capacity as capacity, count(*) as used, gender')
            ->get()
            ->toArray();
    }

    public function countCustomersInRoomOnDate($roomId, $tgl): int
    {
        return $this->model
            ->where('room_id', $roomId)
            ->whereHas('reservation', function ($query) use ($tgl) {
                $query->where('date_ci', $tgl);
            })
            ->count();
    }

    public function isRoomAvailable($roomId, $tgl): bool
    {
        $customerCount = $this->countCustomersInRoomOnDate($roomId, $tgl);
        return $customerCount < $this->getCurrentRoomCapacity($roomId);
    }


    public function getCurrentRoomCapacity($roomId): int
    {
        // Mengambil kapasitas kamar saat ini
        return Customer::where('room_id', $roomId)->count();
    }
}


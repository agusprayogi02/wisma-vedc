<?php

// File: CustomerRepositoryImplement.php

namespace App\Repositories\Customer;

use App\Http\Response;
use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\Customer; // tambahkan import model Customer
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CustomerRepositoryImplement extends Eloquent implements CustomerRepository
{

    /**
     * Model class to be used in this repository for the common methods inside Eloquent
     * Don't remove or change $this->model variable name
     * @property Model|mixed $model;
     */
    protected $model;

    public function __construct(Customer $model)
    {
        $this->model = $model;
    }

    public function countRoomDate($tgl, $id_room)
    {
        return $this->model->where('room_id', $id_room)->whereHas('reservation', function ($query) use ($tgl) {
            $query->where('date_ci', $tgl);
        })->count();
    }

    public function getCustomerData($id)
    {
        return $this->model->find($id);
    }

    public function updateDataCustomer($id, $data)
    {
        $customer = $this->model->findOrFail($id);
        $customer->update($data);
        return true;
    }

    public function getRoomCapacity($tgl)
    {
        $roomCapacity = $this->model
            ->join('rooms', 'rooms.id', '=', 'customers.room_id')
            ->join('room_types', 'rooms.room_type_id', '=', 'room_types.id')
            ->whereHas('reservation', function ($query) use ($tgl) {
                $query->where('date_ci', $tgl);
            })
            ->groupBy('room_id', 'gender')
            ->selectRaw('rooms.code as room, room_types.capacity as capacity, count(*) as used, gender')
            ->get()
            ->toArray();

        return $roomCapacity;
    }

    public function countCustomersInRoomOnDate($roomId, $tgl)
    {
        return $this->model
            ->where('room_id', $roomId)
            ->whereHas('reservation', function ($query) use ($tgl) {
                $query->where('date_ci', $tgl);
            })
            ->count();
    }

    public function isRoomAvailable($roomId, $tgl)
    {
        $customerCount = $this->countCustomersInRoomOnDate($roomId, $tgl);
        return $customerCount < $this->getCurrentRoomCapacity($roomId);
    }


    public function getCurrentRoomCapacity($roomId)
    {
        // Mengambil kapasitas kamar saat ini
        $currentCapacity = Customer::where('room_id', $roomId)->count();

        return $currentCapacity;
    }
}


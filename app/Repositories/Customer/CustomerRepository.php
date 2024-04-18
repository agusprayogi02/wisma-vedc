<?php

namespace App\Repositories\Customer;

use LaravelEasyRepository\Repository;

interface CustomerRepository extends Repository{

    public function getRoomCapacity($tgl);
    public function isRoomAvailable($roomId, $tgl);
    public function getCustomerData($id);
    public function updateDataCustomer($id, $data);
    public function countRoomDate($tgl, $id_room);
    public function countCustomersInRoomOnDate($roomId, $tgl);
    public function getCurrentRoomCapacity($roomId);
}

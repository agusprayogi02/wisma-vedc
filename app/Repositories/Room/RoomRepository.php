<?php

namespace App\Repositories\Room;

use LaravelEasyRepository\Repository;

interface RoomRepository extends Repository
{

    public function getRooms();

    public function getTotalRoomUsedToday(): int;
}

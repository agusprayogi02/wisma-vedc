<?php

namespace App\Repositories\Room;

use Illuminate\Http\Request;
use LaravelEasyRepository\Repository;

interface RoomRepository extends Repository
{
    public function getRooms();
    public function getTotalRoomUsedToday(): array;
    public function getTotalRoomKotorToday(): array;
    public function getTotalRoomReadyToday(): array;
    public function getTotalRoomUsedByAsramaToday(): int;
    public function getTotalRoom(): int;
    public function update($id, array $data);
}

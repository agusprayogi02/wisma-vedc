<?php

namespace App\Repositories\RoomItem;

use LaravelEasyRepository\Repository;

interface RoomItemRepository extends Repository{

    public function getRoomItems();
}

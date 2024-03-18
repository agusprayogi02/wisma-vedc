<?php

namespace App\Repositories\RoomUser;

use LaravelEasyRepository\Repository;

interface RoomUserRepository extends Repository{

    public function getRoomReportCleaner(): int;
}
<?php

namespace App\Repositories\RoomItemReport;

use LaravelEasyRepository\Repository;

interface RoomItemReportRepository extends Repository{

    public function getTotalRusak(): int;
    public function getTotalHilang(): int;
    public function getTotal(): int;
}

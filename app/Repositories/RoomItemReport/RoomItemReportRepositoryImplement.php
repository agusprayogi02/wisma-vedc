<?php

namespace App\Repositories\RoomItemReport;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\RoomItemReport;
use Illuminate\Support\Facades\DB;

class RoomItemReportRepositoryImplement extends Eloquent implements RoomItemReportRepository{
    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    protected $model;

    public function __construct(RoomItemReport $model)
    {
        $this->model = $model;
    }
    
    public function getTotalRusak(): int
    {
        return $this->model
            ->where('status', 'Rusak')
            ->where(DB::raw("DATE_FORMAT(created_at, '%Y-%m')"), now()->format("Y-m"))
            ->sum('quantity');        
    }

    public function getTotalHilang(): int
    {
        return $this->model
            ->where('status', 'Hilang')
            ->where(DB::raw("DATE_FORMAT(created_at, '%Y-%m')"), now()->format("Y-m"))
            ->sum('quantity');
    }

    public function getTotal(): int
    {
        return $this->model
            ->where(DB::raw("DATE_FORMAT(created_at, '%Y-%m')"), now()->format("Y-m"))
            ->sum('quantity');
    }
}

    




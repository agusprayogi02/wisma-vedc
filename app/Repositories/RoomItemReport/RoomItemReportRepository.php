<?php

namespace App\Repositories\RoomItemReport;

use App\Models\RoomItemReport;
use Illuminate\Support\Facades\DB;

class RoomItemReportRepository
{
    /**
     * @var RoomItemReport
     */
    protected RoomItemReport $model;

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

    public function all(): array|\Illuminate\Pagination\LengthAwarePaginator
    {
        return $this->model->paginate(10);
    }
}

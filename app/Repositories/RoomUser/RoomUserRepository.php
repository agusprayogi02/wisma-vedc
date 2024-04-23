<?php

namespace App\Repositories\RoomUser;

use App\Models\RoomUser;
use Illuminate\Pagination\LengthAwarePaginator;

class RoomUserRepository
{
    /**
     * @var RoomUser
     */
    protected RoomUser $model;

    public function __construct(RoomUser $model)
    {
        $this->model = $model;
    }

    public function getRoomReportCleaner(): int
    {
        return $this->model
            ->groupBy('user_id')
            ->sum('poin');
    }

    /**
     * @return RoomUser[]|LengthAwarePaginator
     */
    public function all(): LengthAwarePaginator|array
    {
        return $this->model->paginate(10);
    }
}

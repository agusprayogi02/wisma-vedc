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

    public function getRoomReportCleaner(): array
    {
        return $this->model
            ->select(["users.name", \DB::raw('count(*) as total')])
            ->join('users', 'users.id', '=', 'user_id')
            ->groupBy('user_id')->get()->toArray();
    }

    /**
     * @return RoomUser[]|LengthAwarePaginator
     */
    public function all(): LengthAwarePaginator|array
    {
        return $this->model->paginate(10);
    }
}

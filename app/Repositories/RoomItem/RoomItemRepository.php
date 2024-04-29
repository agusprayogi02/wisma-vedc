<?php

namespace App\Repositories\RoomItem;

use App\Models\RoomItem;

class RoomItemRepository
{
    /**
     * @var RoomItem
     */
    protected Roomitem $model;

    public function __construct(RoomItem $model)
    {
        $this->model = $model;
    }

    public function getRoomItems(int $perPage): \Illuminate\Contracts\Pagination\LengthAwarePaginator|\Illuminate\Pagination\LengthAwarePaginator|array
    {
        return $this->model->with(['room', 'item'])->paginate($perPage);
    }
}

<?php

namespace App\Repositories\RoomItem;

use App\Models\RoomItem;
use Illuminate\Database\Eloquent\Collection;

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

    /**
     * @return Collection|array
     */
    public function getRoomItems(int $perPage): \Illuminate\Database\Eloquent\Collection|array
    {
        return $this->model->with(['room', 'item'])->paginate($perPage);
    }
}

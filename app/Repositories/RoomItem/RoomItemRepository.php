<?php

namespace App\Repositories\RoomItem;

use App\Models\RoomItem;
use Illuminate\Database\Eloquent\Collection;
use LaravelEasyRepository\Repository;
use LaravelIdea\Helper\App\Models\_IH_RoomItem_C;

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
     * @return Collection|array|_IH_RoomItem_C
     */
    public function getRoomItems(): \Illuminate\Database\Eloquent\Collection|array|\LaravelIdea\Helper\App\Models\_IH_RoomItem_C
    {
        return $this->model->with(['room', 'item'])->get();
    }
}

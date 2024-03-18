<?php

namespace App\Repositories\RoomItem;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\RoomItem;

class RoomItemRepositoryImplement extends Eloquent implements RoomItemRepository{

    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    protected $model;

    public function __construct(RoomItem $model)
    {
        $this->model = $model;
    }

    public function getRoomItems()
    {
        return $this->model->with(['room', 'item'])->get();
    }
}

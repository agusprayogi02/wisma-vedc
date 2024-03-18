<?php

namespace App\Repositories\RoomUser;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\RoomUser;

class RoomUserRepositoryImplement extends Eloquent implements RoomUserRepository{

    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    protected $model;

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
}

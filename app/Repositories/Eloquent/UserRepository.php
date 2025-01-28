<?php

namespace App\Repositories\Eloquent;

use App\User as Model;
use App\Repositories\Eloquent\RepositoriesAbstract;
use App\Repositories\EloquentInterface\UserInterface;

class UserRepository extends RepositoriesAbstract implements UserInterface{

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

}


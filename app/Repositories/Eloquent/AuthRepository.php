<?php

namespace App\Repositories\Eloquent;

use App\User as Model;
use Illuminate\Support\Facades\Mail;
use App\Repositories\Eloquent\RepositoriesAbstract;
use App\Repositories\EloquentInterface\AuthInterface;
use Exception;

class AuthRepository extends RepositoriesAbstract implements AuthInterface{

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

}


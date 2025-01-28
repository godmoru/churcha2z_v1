<?php

namespace App\Repositories\Eloquent;

use App\Disbursement as Model;
use App\Repositories\Eloquent\RepositoriesAbstract;
use App\Repositories\EloquentInterface\DisbursementInterface;

class DisbursementRepository extends RepositoriesAbstract implements DisbursementInterface{

    public function __construct(Model $model)
    {
        $this->model = $model;
    }
}


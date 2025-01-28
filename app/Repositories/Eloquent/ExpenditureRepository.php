<?php

namespace App\Repositories\Eloquent;

use App\LocationExpenditure as Model;
use App\ExpenditureType as Type;
use App\Repositories\Eloquent\RepositoriesAbstract;
use App\Repositories\EloquentInterface\ExpenditureInterface;

class ExpenditureRepository extends RepositoriesAbstract implements ExpenditureInterface {
    
    protected $type;
    public function __construct(Model $model, Type $type)
    {
        $this->model = $model;
        $this->type = $type;
    }

    public function createNew(array $data)
    {
        $check = $this->type::find($data['expenditure_type_id']);
        $data['expenditure_category_id'] = $check->expenditure_category_id;
        return $this->create($data);
    }
}


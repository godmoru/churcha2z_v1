<?php
namespace App\Repositories\EloquentInterface;

use App\Repositories\EloquentInterface\RepositoryInterface;

interface ExpenditureInterface extends RepositoryInterface {

    public function createNew(array $data);
}

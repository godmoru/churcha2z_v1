<?php
namespace App\Repositories\EloquentInterface;

use App\Repositories\EloquentInterface\RepositoryInterface;

interface AuthInterface extends RepositoryInterface {

    public function register(array $data);
}

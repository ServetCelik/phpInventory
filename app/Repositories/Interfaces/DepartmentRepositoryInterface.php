<?php

namespace App\Repositories\Interfaces;


Interface DepartmentRepositoryInterface
{
    public function existsByName($name);

    public function create(array $data);
}

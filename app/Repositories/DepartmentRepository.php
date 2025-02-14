<?php

namespace App\Repositories;

use App\Models\Department;
use App\Repositories\Interfaces\DepartmentRepositoryInterface;

class DepartmentRepository implements DepartmentRepositoryInterface
{
    public function existsByName($name)
    {
        return Department::where('name', $name)->exists();
    }

    public function create(array $data)
    {
        return Department::create($data);
    }
}

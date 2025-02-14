<?php

namespace App\Services;

use App\Repositories\Interfaces\DepartmentRepositoryInterface;
use App\Exceptions\DepartmentAlreadyExistsException;
use App\Exceptions\DepartmentDescriptionTooShortException;
use App\Services\Interfaces\CreateDepartmentServiceInterface;

class CreateDepartmentService implements CreateDepartmentServiceInterface
{
    protected $departmentRepository;

    public function __construct(DepartmentRepositoryInterface $departmentRepository)
    {
        $this->departmentRepository = $departmentRepository;
    }

    public function createDepartment(array $data)
    {
        // Validate description length
        if (strlen($data['description']) < 10) {
            throw new DepartmentDescriptionTooShortException();
        }

        // Check if department already exists
        if ($this->departmentRepository->existsByName($data['name'])) {
            throw new DepartmentAlreadyExistsException();
        }        

        return $this->save($data);
    }

    private function save(array $data)
    {
        return $this->departmentRepository->create($data);
    }
}

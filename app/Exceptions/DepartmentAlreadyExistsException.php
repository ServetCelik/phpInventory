<?php

namespace App\Exceptions;

use Exception;

class DepartmentAlreadyExistsException extends Exception
{
    public function __construct()
    {
        parent::__construct("Department with this name already exists.", 400);
    }
}

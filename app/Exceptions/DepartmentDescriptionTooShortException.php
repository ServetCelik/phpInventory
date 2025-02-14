<?php

namespace App\Exceptions;

use Exception;

class DepartmentDescriptionTooShortException extends Exception
{
    public function __construct()
    {
        parent::__construct("Department description must be at least 10 characters long.", 400);
    }
}

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartmentController;

Route::apiResource('departments', DepartmentController::class);

Route::get('/departments/{id}', [DepartmentController::class, 'getById']);
Route::get('/departments/manager/{managerName}', [DepartmentController::class, 'getByManager']);
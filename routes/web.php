<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomMessageController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/custom-message', [CustomMessageController::class, 'showMessage']);

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomMessageController extends Controller
{
    public function showMessage()
    {
        return response()->json([
            'message' => 'Hello, Benim Adim Servet Ulan!'
        ]);
    }
}

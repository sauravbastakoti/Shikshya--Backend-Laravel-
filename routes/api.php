<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controller\Api\LoginController;



Route::post('auth/register', [LoginController::class, 'createUser']);
Route::post('auth/login', [LoginController::class, 'loginUser']);

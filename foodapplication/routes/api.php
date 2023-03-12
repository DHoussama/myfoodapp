<?php

use App\Http\Controllers\AuthApiManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::any("/users/login",[AuthApiManager::class, "login"]) ;
Route::any("/users/login",[AuthApiManager::class, "registration"]);
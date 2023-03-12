<?php

use Illuminate\Support\Facades\Route;
use App\Http\controllers\AuthManager;
use App\Http\controllers\ProductManager;
use App\Http\Middleware\RoleAdmin;



Route::get('/', function () {
    return "hi";
});

Route::get('dashboard', function() {
    return "dashboard" ;
})->name('dashboard') ;

Route::get("login", [AuthManager::class, "login"])->name("login");
Route::get("logout", [AuthManager::class, "logout"])->name("logout");
Route::post("login", [AuthManager::class, "loginPost"])->name("login.post");

Route::prefix("admin")->middleware(RoleAdmin::class)->group(function() {
   Route::get('dashboard',function() {
  return "dashboard" ;
  })->name('dashboard') ;
   Route::get('products',[ProductManager::class, "ListProducts"])->name("products");
   Route::post('products',[ProductManager::class, "addProducts"])->name("product.add");
   Route::post('product/delete',[ProductManager::class, "deleteProducts"])->name("product.delete");
});


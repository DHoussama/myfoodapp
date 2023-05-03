<?php

use Illuminate\Support\Facades\Route;
use App\Http\controllers\AuthManager;
use App\Http\controllers\ProductManager;
use App\Http\controllers\OrderManager;
use App\Http\Middleware\RoleAdmin;




Route::get('/', function () {
    return view("home");
});

Route::get("goHome", [AuthManager::class, "goHome"])->name("goHome");

Route::get("login", [AuthManager::class, "login"])->name("login");
Route::post("login", [AuthManager::class, "loginPost"])->name("login.post");

Route::get("logout", [AuthManager::class, "logout"])->name("logout");


Route::prefix("admin")->middleware(RoleAdmin::class)->group(function() {
   
   Route::get('dashboard', [OrderManager::class, "newOrders"])->name('dashboard') ;
   Route::get('products',[ProductManager::class, "ListProducts"])->name("products");
   Route::post('products',[ProductManager::class, "addProducts"])->name("product.add");
   Route::get('product/delete',[ProductManager::class, "deleteProducts"])->name("product.delete");
   Route::post('order/assign',[OrderManager::class, "assignOrder"])->name("order.assign");
   Route::get('order/list', [OrderManager::class, "ListOrders"])->name("Order.list");
   Route::get('order/dashboard', [OrderManager::class, "newOrders"])->name("Dashboard");
   
});


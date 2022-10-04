<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemController;



Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('/user', [HomeController::class, 'user']);

    Route::post('/add-menu', [MenuController::class, 'add']);
    Route::get('/get-menus', [MenuController::class, 'get']);

    Route::post('/add-category', [CategoryController::class, 'add']);
    Route::get('/get-user-categories', [CategoryController::class, 'get_categories']);
    Route::get('/get-user-categories-items', [CategoryController::class, 'get_item_categories']);

    Route::post('/add-item', [ItemController::class, 'add']);

});

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

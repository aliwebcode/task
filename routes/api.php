<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemController;


// Auth Routes
Route::group(['middleware' => 'auth:sanctum'], function () {
    // Get User
    Route::get('/user', [HomeController::class, 'user']);

    // Menus
    Route::post('/add-menu', [MenuController::class, 'add']);
    Route::get('/get-menus', [MenuController::class, 'get']);

    // Categories
    Route::post('/add-category', [CategoryController::class, 'add']);
    Route::get('/get-user-categories', [CategoryController::class, 'get_categories']);

    // Items
    Route::post('/add-item', [ItemController::class, 'add']);

    // Show Data
    Route::get('/all-menus', [MenuController::class, 'all']);
    Route::get('/get-menu-categories/{id}', [CategoryController::class, 'get_menu_categories']);
    Route::get('/get-category-items/{id}', [ItemController::class, 'get_category_items']);

});

// Guest Routes
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register_action', [AuthController::class, 'register']);

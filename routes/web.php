<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


//Auth::routes();

Route::get('/{any?}', [HomeController::class, 'index']);

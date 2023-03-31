<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource("posts", PostController::class);

use App\Http\Controllers\WelcomeController;
Route::get('/w', [WelcomeController::class, 'index']);
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\WelcomeController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource("posts", PostController::class);

Route::get('/welcoming', [WelcomeController::class, 'index'])->name('home');
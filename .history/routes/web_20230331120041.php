<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\WelcomeController;



Route::get('/', function () {
    return view('welcome');
});

Route::get('users', [UsersController::class, 'create']);
Route::get('users', [UsersController::class, 'store']);



Route::resource("posts", PostController::class);

Route::get('/welcoming', [WelcomeController::class, 'index']);

Route::get('article/{n}', [ArticleController::class, 'show'])->where('n', '[0-9]+');
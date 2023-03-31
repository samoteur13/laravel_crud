<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\WelcomeController;



Route::get('/', function () {
    return view('welcome');
});

//User
Route::get('users', [UsersController::class, 'create']);
Route::post('users', [UsersController::class, 'store']);


//Contact
Route::get('users', [ContactController])



Route::resource("posts", PostController::class);

Route::get('/welcoming', [WelcomeController::class, 'index']);

Route::get('article/{n}', [ArticleController::class, 'show'])->where('n', '[0-9]+');
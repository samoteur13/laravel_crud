<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\WelcomeController;



Route::get('/', function () {
    return view('welcome');
});

//User
Route::get('users', [UsersController::class, 'create']);
Route::post('users', [UsersController::class, 'store']);


//Contact
Route::get('contact', [ContactController::class, 'create']);
Route::post('contact', [ContactController::class, 'store']);
//test le mail
Route::get('/test-contact', function () {
    return new App\Mail\Contact([
      'nom' => 'Durand',
      'email' => 'durand@chezlui.com',
      'message' => 'Je voulais vous dire que votre site est magnifique !'
      ]);
});

//Image 
Route::get('photo',[PhotoController::class, 'create']);
Route::post('photo',[PhotoController::class, 'store']);



Route::resource("posts", PostController::class);

Route::get('/welcoming', [WelcomeController::class, 'index']);

Route::get('article/{n}', [ArticleController::class, 'show'])->where('n', '[0-9]+');


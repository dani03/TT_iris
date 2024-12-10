<?php

use App\Http\Controllers\CommentaireController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;


//Route::post('/post/store', [PostController::class, 'store'])->name('post.store');

Route::resource('posts', PostController::class);
Route::view('/', 'home')->name('home');
Route::view('/add/post', 'welcome')->name('adding.post');
Route::resource('/commentaire', CommentaireController::class);


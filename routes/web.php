<?php

use App\Http\Controllers\CommentaireController;
use App\Http\Controllers\PostController;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use function Pest\Laravel\post;

//Route::post('/post/store', [PostController::class, 'store'])->name('post.store');
Route::view('/login', 'auth.login')->name('login');
Route::view('/register', 'auth.registration')->name('register');

Route::resource('posts', PostController::class)->except(['store']);
Route::view('/', 'home')->name('home');

Route::view('/forgot-password', 'auth.passwordForgot')->name('forgot.password');
Route::get('/reset-password/{token}', function (Request $request, $token) {
    return view('auth.resetPassword', [
        'request' => $request,
        'token' => $token
    ]);
})->name('password.reset');
Route::view('/add/post', 'welcome')->name('adding.post');
Route::resource('/commentaire', CommentaireController::class)->except(['store']);

Route::middleware(['auth'])->get('/home', function () {

    return view('profile');
})->name('profile');

Route::middleware(['auth'])->group(function () {
    Route::post('/commentaire', [CommentaireController::class, 'store'])->name('commentaire.store');
    Route::post('post/like/{post}', [PostController::class, 'likes'])->name('post.likes');
    Route::post('posts', [PostController::class, 'store'])->name('posts.store');

});

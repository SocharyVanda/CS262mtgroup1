<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('homepage');
});



Route::get('/signup', function () {
    return view('signup');
});


Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);

Route::get('/dashboard', function () {
    $posts = [];
    if (Auth::check()) {
        $posts = Post::where('user_id', Auth::id())->latest()->get();
    }
    return view('dashboard', ['posts' => $posts]);
});

Route::post('/logout', [UserController::class, 'logout'])->name('logout');

Route::post('/create-post', [PostController::class, 'createPost']);
Route::get('/edit-post/{post}', [PostController::class, 'showEditScreen']);
Route::put('/edit-post/{post}', [PostController::class, 'updatePost']);
Route::delete('/delete-post/{post}', [PostController::class, 'deletePost']);
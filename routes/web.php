<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;

Route::get('/', fn() => view('homepage'));
Route::get('/signup', fn() => view('signup'));
Route::get('/science', fn() => view('science'));
Route::get('/technology', fn() => view('technology'));
Route::get('/mathematics', fn() => view('mathematics'));
Route::get('/engineering', fn() => view('engineering'));
Route::get('/aboutus', fn() => view('aboutus'));
Route::get('/news', fn() => view('news'));
Route::get('/bookmarks', fn() => view('bookmarks'));

// ── AUTH ──
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ── DASHBOARD ── (one route, with posts data)
Route::get('/dashboard', function () {
    $posts = [];
    if (Auth::check()) {
        $posts = Post::where('user_id', Auth::id())->latest()->get();
    }
    return view('dashboard', ['posts' => $posts]);
});

// ── POSTS PAGE ──
Route::get('/posts', function () {
    $posts = Post::with('user')->latest()->get();
    return view('posts', compact('posts'));
});

// ── POST CRUD ──
Route::post('/create-post', [PostController::class, 'createPost']);
Route::get('/edit-post/{post}', [PostController::class, 'showEditScreen']);
Route::put('/edit-post/{post}', [PostController::class, 'updatePost']);
Route::delete('/delete-post/{post}', [PostController::class, 'deletePost']);

<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\NewsController;

Route::get('/', fn() => view('pages.homepage'));
Route::get('/signup', fn() => view('pages.signup'));
Route::get('/science', fn() => view('categories.science'));
Route::get('/technology', fn() => view('categories.technology'));
Route::get('/mathematics', fn() => view('categories.mathematics'));
Route::get('/engineering', fn() => view('categories.engineering'));
Route::get('/aboutus', fn() => view('pages.aboutus'));
// Route::get('/news', [NewsController::class, 'index']);
// Route::get('/bookmarks', fn() => view('pages.bookmarks'));

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
    return view('pages.dashboard', ['posts' => $posts]);
});

// ── POSTS PAGE ──
Route::get('/posts', function () {
    $posts = Post::with('user')->latest()->get();
    return view('pages.posts', compact('posts'));
});

// Route::get('/news', function () {
//     $news = Post::with('user')->latest()->get();
//     return view('posts', compact('news'));
// });

// web.php
Route::get('/news', [NewsController::class, 'index']);


// ── POST CRUD ──
Route::post('/create-post', [PostController::class, 'createPost']);
Route::get('/edit-post/{post}', [PostController::class, 'showEditScreen']);
Route::put('/edit-post/{post}', [PostController::class, 'updatePost']);
Route::delete('/delete-post/{post}', [PostController::class, 'deletePost']);

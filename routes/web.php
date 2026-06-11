<?php

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PostController;

Route::get('/', fn() => view('homepage'));
Route::get('/signup', fn() => view('signup'));
<<<<<<< HEAD
Route::get('/science', fn() => view('science'));
Route::get('/technology', fn() => view('technology'));
Route::get('/mathematics', fn() => view('mathematics'));
Route::get('/engineering', fn() => view('engineering'));
=======
// Route::get('/science', fn() => view('science'));
// Route::get('/technology', fn() => view('technology'));
// Route::get('/engineering', fn() => view('engineering'));
>>>>>>> cee8697e9ba19fb2b747be2ef3a1b4e160b17010
Route::get('/aboutus', fn() => view('aboutus'));
Route::get('/news', [NewsController::class, 'index']);
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
<<<<<<< HEAD
Route::get('/posts', function () {
    $posts = Post::with('user')->latest()->get();
    return view('posts', compact('posts'));
});

Route::get('/mathematics', function () {
    $posts = Post::with('user')->latest()->get();
    return view('mathematics', compact('posts'));
});

// Route::get('/display', function () {
//     $posts = Post::with('user')->latest()->get();
//     return view('display', compact('posts'));
// });
=======
Route::get('/posts', function (Request $request) {
    $category = $request->query('category');

    $posts = Post::with('user')
        ->when($category, fn ($query) => $query->where('category', $category))
        ->latest()
        ->get();

    return view('posts', compact('posts', 'category'));
});

Route::get('/mathematics', function () {
    $posts = Post::with('user')
        ->where('category', 'Mathematics')
        ->latest()
        ->get();
    $category = 'Mathematics';

    return view('mathematics', compact('posts', 'category'));
});

Route::get('/science', function () {
    $posts = Post::with('user')
        ->where('category', 'Science')
        ->latest()
        ->get();
    $category = 'Science';

    return view('science', compact('posts', 'category'));
});

Route::get('/engineering', function () {
    $posts = Post::with('user')
        ->where('category', 'Engineering')
        ->latest()
        ->get();
    $category = 'Engineering';

    return view('engineering', compact('posts', 'category'));
});

Route::get('/technology', function () {
    $posts = Post::with('user')
        ->where('category', 'Technology')
        ->latest()
        ->get();
    $category = 'Technology';

    return view('technology', compact('posts', 'category'));
});

>>>>>>> cee8697e9ba19fb2b747be2ef3a1b4e160b17010

// Route::get('/display/{post:slug}', function (App\Models\Post $post) {
//     return view('each', compact('post'));
// });

Route::get('/news/{post:slug}', function (App\Models\Post $post) {
    return view('each', compact('post'));
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

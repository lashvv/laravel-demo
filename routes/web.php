<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Models\Post;

Route::get('/', function () {
    $posts = [];
    if (auth()->check())
    {
        $posts = auth()->user()->userCoolPosts()->latest()->get();
        // $posts = Post::where('user_id', auth()->id())->latest()->get());
    }
    return view('home', ['posts' => $posts]);
});

Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
Route::post('/logout', [UserController::class, 'logout']);

// Blog post related routes
Route::post('/create-post', [PostController::class, 'createPost']);
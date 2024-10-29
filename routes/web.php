<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('home');
});

Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/create', [PostController::class, 'create']);
Route::post('/posts', [PostController::class, 'store']);

Route::get('/posts/{post}', [PostController::class, 'show'])->where('post', '[0-9]+');

Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->where('post', '[0-9]+');
Route::patch('/posts/{post}', [PostController::class, 'update'])->where('post', '[0-9]+');

Route::delete('/posts/{post}', [PostController::class, 'destroy'])->where('post', '[0-9]+');

Route::get('/posts/{post}/comments', [CommentController::class, 'index'])->where('post', '[0-9]+');
Route::post('/posts/{post}/comments', [CommentController::class, 'store'])->where('post', '[0-9]+');

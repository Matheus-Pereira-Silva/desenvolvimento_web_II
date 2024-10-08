<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;

// Rota para exibir todas as postagens
Route::get('/', [PostController::class, 'index'])->name('posts.index');

// Rota para exibir uma postagem específica
Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');

// Rotas para comentários
Route::post('/posts/{id}/comments', [CommentController::class, 'store'])->name('comments.store');
Route::delete('/comments/{id}', [CommentController::class, 'destroy'])->name('comments.destroy');

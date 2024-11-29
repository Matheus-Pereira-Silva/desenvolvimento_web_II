<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    // Exibir os comentários de um post específico
    public function index(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    // Armazenar novo comentário
    public function store(Request $request, Post $post)
    {
        $validated = $request->validate([
            'comment' => 'required|string|max:1000',
        ]);

        $post->comments()->create([
            'content' => $validated['comment'],
            'author' => $request->user() ? $request->user()->name : 'Visitante',
        ]);

        return back()->with('success', 'Comentário adicionado com sucesso!');
    }
}

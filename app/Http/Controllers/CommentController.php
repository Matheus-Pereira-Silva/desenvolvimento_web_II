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

    // Exibir formulário de edição do comentário
    public function edit(Comment $comment)
    {
        return view('comments.edit', compact('comment'));
    }

    // Atualizar o comentário
    public function update(Request $request, Comment $comment)
    {
        $validated = $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        $comment->update([
            'content' => $validated['content'],
        ]);

        return redirect()->route('home')->with('success', 'Comentário atualizado com sucesso!');
    }

    // Excluir comentário
    public function destroy(Comment $comment)
    {
        $comment->delete();

        return redirect()->back()->with('success', 'Comentário excluído com sucesso!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class PostController extends Controller
{
    use AuthorizesRequests;

    // Exibir todos os posts
    public function index()
    {
        $posts = Post::latest()->get();
        return view('home', compact('posts'));
    }

    // Criar novo post
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        // Criar e salvar o post com o ID do usuário autenticado
        Post::create([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'user_id' => Auth::id(),
        ]);

        return redirect('/')->with('success', 'Post criado com sucesso!');
    }

    // Editar post
    public function edit(Post $post)
    {
    return view('posts.edit', compact('post'));
    }


    // Atualizar post
    public function update(Request $request, Post $post)
    {
        $this->authorize('update', $post);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $post->update($validated);
        return redirect('/')->with('success', 'Post atualizado com sucesso!');
    }

    // Excluir post
    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);
        $post->delete();

        return redirect('/')->with('success', 'Post excluído com sucesso!');
    }
}

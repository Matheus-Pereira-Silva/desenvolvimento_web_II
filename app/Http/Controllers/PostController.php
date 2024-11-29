<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    // Exibir lista de posts
    public function index()
    {
        $posts = Post::latest()->get(); // Ordena por data de criação
        return view('home', compact('posts'));
    }

    // Exibir formulário de criação de post
    public function create()
    {
        return view('posts.create');
    }

    // Armazenar novo post
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        // Atribui o ID do usuário autenticado
        $validated['user_id'] = Auth::id(); // Para pegar o ID do usuário autenticado

        Post::create($validated);
        return redirect('/')->with('success', 'Post criado com sucesso!');
    }

    // Exibir um post específico
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    // Exibir formulário de edição de post
    public function edit(Post $post)
    {
        $this->authorizeAction($post);
        return view('posts.edit', compact('post'));
    }

    // Atualizar um post
    public function update(Request $request, Post $post)
    {
        $this->authorizeAction($post);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $post->update($validated);
        return redirect('/')->with('success', 'Post atualizado com sucesso!');
    }

    // Excluir um post
    public function destroy(Post $post)
    {
        $this->authorizeAction($post);

        $post->delete();
        return redirect('/')->with('success', 'Post excluído com sucesso!');
    }

    // Autorizar ação para o proprietário do post ou administrador
    private function authorizeAction(Post $post)
    {
        if (Auth::id() !== $post->user_id) {
            abort(403, 'Você não tem permissão para realizar esta ação.');
        }
    }
}

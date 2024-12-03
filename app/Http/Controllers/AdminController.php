<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        $comments = Comment::all();
        return view('admin.index', compact('posts', 'comments'));
    }

    public function destroyPost($id)
    {
        Post::findOrFail($id)->delete();
        return redirect()->route('admin.index')->with('success', 'Post deletado com sucesso.');
    }

    public function destroyComment($id)
    {
        Comment::findOrFail($id)->delete();
        return redirect()->route('admin.index')->with('success', 'Comentário deletado com sucesso.');
    }
}


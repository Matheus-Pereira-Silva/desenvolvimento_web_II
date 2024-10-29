<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  int  $postId
     * @return \Illuminate\Http\Response
     */
    public function index($postId)
    {
        $comments = Comment::where('post_id', $postId)->latest()->paginate(10);
        $post = Post::findOrFail($postId);
        return view('comments.index', compact('comments', 'post'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $postId
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $postId)
    {
        $this->validate($request, [
            'body' => 'required',
        ]);

        $comment = Comment::create([
            'post_id' => $postId,
            'user_id' => auth()->id(),
            'body' => $request->body,
        ]);

        return redirect()->back()->with('success', 'Comentário adicionado com sucesso.');
    }
}

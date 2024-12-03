<h1>Painel de Administração</h1>
<h2>Posts</h2>
<ul>
    @foreach($posts as $post)
        <li>
            {{ $post->title }}
            <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Deletar</button>
            </form>
        </li>
    @endforeach
</ul>

<h2>Comentários</h2>
<ul>
    @foreach($comments as $comment)
        <li>
            {{ $comment->content }}
            <form action="{{ route('admin.comments.destroy', $comment->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Deletar</button>
            </form>
        </li>
    @endforeach
</ul>

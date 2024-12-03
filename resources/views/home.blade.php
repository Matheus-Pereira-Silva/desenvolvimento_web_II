@extends('layouts.app')

@section('head')
@vite('resources/css/home.css')
@endsection

@section('content')
<div class="container mt-5 text-center">
    <h1 class="mb-4">Reclame Aqui</h1>

    <!-- Botão para abrir o modal -->
    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createPostModal">Fazer uma reclamação</button>

    <!-- Modal -->
    <div class="modal fade" id="createPostModal" tabindex="-1" aria-labelledby="createPostModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createPostModalLabel">Criar Reclamação</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('posts.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="title">Título</label>
                            <input type="text" name="title" id="title" class="form-control" required>
                        </div>
                        <div class="form-group mt-3">
                            <label for="content">Conteúdo</label>
                            <textarea name="content" id="content" class="form-control" rows="5" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-success mt-3">Confirmar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <h2 class="mb-4">Reclamações:</h2>
    @foreach ($posts as $post)
        <div class="card mb-4 shadow-sm">
            <div class="card-header bg-primary text-white">
                <h2 class="mb-0">{{ $post->title }}</h2>
                <small>Autor: {{ $post->user->name ?? 'Anônimo' }}</small>
            </div>
            <div class="card-body">
                <p>{{ $post->content }}</p>
            </div>
            <div class="card-footer">
                <h5>Comentários</h5>
                @if ($post->comments->isEmpty())
                    <p class="text-muted">Nenhum comentário ainda. Seja o primeiro!</p>
                @else
                    <ul class="list-group">
                        @foreach ($post->comments as $comment)
                            <li class="list-group-item">
                                <strong>{{ $comment->author }}:</strong> {{ $comment->content }}
                                <span class="text-muted float-end small">{{ $comment->created_at->format('d/m/Y H:i') }}</span>

                                <!-- Edição e Exclusão de Comentário -->
                                <div class="mt-2 d-flex justify-content-end">
                                    <a href="{{ route('comments.edit', $comment->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                    <form action="{{ route('comments.destroy', $comment->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Tem certeza que deseja deletar este comentário?')">Excluir</button>
                                    </form>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @endif

                <form action="{{ route('comments.store', $post->id) }}" method="POST" class="mt-3">
                    @csrf
                    <div class="form-group">
                        <textarea name="comment" class="form-control" rows="3" placeholder="Escreva seu comentário"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mt-2">Comentar</button>
                </form>

                <!-- Edição e Exclusão de Post -->
                <div class="mt-3 d-flex justify-content-between">
                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Tem certeza que deseja deletar esta reclamação?')">Excluir</button>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection

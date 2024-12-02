@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1>Editar Comentário</h1>
        @if (auth()->user()->id === $comment->user_id || auth()->user()->is_admin)
            <form action="{{ route('comments.update', $comment->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="content">Conteúdo</label>
                    <textarea name="content" id="content" class="form-control" rows="5" required>{{ $comment->content }}</textarea>
                </div>
                <button type="submit" class="btn btn-success mt-3">Salvar Alterações</button>
            </form>
        @else
            <div class="alert alert-danger mt-3">Você não tem permissão para editar este comentário.</div>
        @endif
    </div>
@endsection

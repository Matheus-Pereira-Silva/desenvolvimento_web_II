@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1>Editar Reclamação</h1>
        @if (auth()->user()->id === $post->user_id || auth()->user()->is_admin)
            <form action="{{ route('posts.update', $post->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="title">Título</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{ $post->title }}" required>
                </div>
                <div class="form-group mt-3">
                    <label for="content">Conteúdo</label>
                    <textarea name="content" id="content" class="form-control" rows="5" required>{{ $post->content }}</textarea>
                </div>
                <button type="submit" class="btn btn-success mt-3">Salvar Alterações</button>
            </form>
        @else
            <div class="alert alert-danger mt-3">Você não tem permissão para editar este post.</div>
        @endif
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1>Editar Post</h1>
        <form action="{{ route('posts.update', $post->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Título</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $post->title) }}" required>
            </div>

            <div class="form-group">
                <label for="content">Conteúdo</label>
                <textarea name="content" id="content" class="form-control" rows="5" required>{{ old('content', $post->content) }}</textarea>
            </div>

            <button type="submit" class="btn btn-success mt-3">Salvar Alterações</button>
        </form>
    </div>
@endsection

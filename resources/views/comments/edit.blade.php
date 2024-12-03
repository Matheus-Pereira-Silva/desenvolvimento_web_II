@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Editar Comentário</h2>
        <form action="{{ route('comments.update', $comment->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="content">Conteúdo:</label>
                <textarea id="content" name="content" class="form-control" rows="4">{{ old('content', $comment->content) }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Atualizar Comentário</button>
        </form>
    </div>
@endsection

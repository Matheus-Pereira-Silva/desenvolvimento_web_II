@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Comentários</div>

                <div class="card-body">
                    <h2>Comentários do Post #{{ $post->id }}</h2>

                    <ul>
                        @foreach($comments as $comment)
                            <li>
                                <strong>{{ $comment->user->name }}</strong>: {{ $comment->body }}
                            </li>
                        @endforeach
                    </ul>

                    <hr>

                    <form method="POST" action="{{ route('comments.store', $post) }}">
                        @csrf

                        <div class="form-group">
                            <textarea name="body" rows="4" cols="50" required></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Enviar Comentário</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

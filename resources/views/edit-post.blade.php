@extends('layout')
@section('title', 'STEM Cambodia - Home')
@section('content')
    <main class="container">
        <div class="row">
            @auth
                <h2> Contrat! You are login!</h2>
                <form action="/edit-post/{{ $post->id }}" method="POST" class="p-3 ">
                    @csrf
                    @method('PUT')
                    <input type="text" name="title" value="{{ $post->title }}" class="form-control">
                    <textarea name="body" class="form-control my-3">{{ $post->body }}</textarea>
                    <button class="btn btn-primary">Save Changes</button>
                </form>
            @else
            @endauth
        </div>

    </main>
@endsection

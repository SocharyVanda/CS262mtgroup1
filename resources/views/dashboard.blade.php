@extends('layout')
@section('title', 'STEM Cambodia - Home')
@section('content')
    <main class="container">
        <div class="row">
            @auth
                <h2>Create Post</h2>
                <div class="p-4 p-md-5 mb-4 rounded text-body-emphasis bg-body-secondary">
                    <form action="/create-post" method="POST">
                        @csrf
                        <input type="text" name="title" class="my-2 form-control" placeholder="Post Title"
                            value="{{ old('title') }}">
                        <textarea name="body" class="my-2 form-control" placeholder="Body content...">{{ old('body') }}</textarea>
                        <br>
                        <button type="submit" class="btn btn-primary my-2">Create Post</button>
                    </form>
                </div>

                <h2>All Posts</h2>
                @foreach ($posts as $post)
                    <div class="p-4 p-md-5 mb-4 rounded text-body-emphasis bg-body-secondary">
                        <h3>{{ $post['title'] }} by {{ $post->user->name }}</h3>
                        <p>{{ $post['body'] }}</p>
                        <p><a href="/edit-post/{{ $post->id }}">Edit</a></p>
                        <form action="/delete-post/{{ $post->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </div>
                @endforeach
            @else
                <div class="col-md-6">
                    <div class="p-4 p-md-5 mb-4 rounded text-body-emphasis bg-body-secondary">
                        <h4>SIGN UP</h4>
                        <p>Don't have an account yet? Sign up here!</p>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="/register" method="POST">
                            @csrf
                            <input type="text" name="name" class="my-2 form-control" placeholder="Username"
                                value="{{ old('name') }}">
                            <input type="password" name="password" class="my-2 form-control" placeholder="Password">
                            <input type="password" name="password_confirmation" class="my-2 form-control"
                                placeholder="Repeat Password">
                            <input type="text" name="email" class="my-2 form-control" placeholder="E-mail"
                                value="{{ old('email') }}">
                            <br>
                            <button type="submit" class="btn btn-primary my-2">SIGN UP</button>
                        </form>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="p-4 p-md-5 mb-4 rounded text-body-emphasis bg-body-secondary">
                        <h4>LOGIN</h4>
                        <p>Log in here!</p>

                        @if ($errors->has('loginname'))
                            <div class="alert alert-danger">{{ $errors->first('loginname') }}</div>
                        @endif


                        <form action="/login" method="POST">
                            @csrf
                            <input type="text" name="loginname" class="my-2 form-control" placeholder="Username"
                                value="{{ old('loginname') }}">
                            <input type="password" name="loginpassword" class="my-2 form-control" placeholder="Password">
                            <br>
                            <button type="submit" class="btn btn-primary my-2">LOGIN</button>
                        </form>
                    </div>
                </div>

            @endauth
        </div>
    </main>
    </body>

    </html>
@endsection

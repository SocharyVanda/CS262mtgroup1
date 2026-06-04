<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
     <main class="container">
        <div class="row">
            @auth
            <h2> Contrat! You are login!</h2>
                <form action="/edit-post/{{$post->id}}" method="POST" class="p-3 ">
                    @csrf
                    @method('PUT')
                    <input type="text" name="title" value="{{$post->title}}" class="form-control">
                    <textarea name="body" class="form-control my-3">{{$post->body}}</textarea>
                    <button class="btn btn-primary">Save Changes</button> 
                </form>
            @else
             @endauth
        </div>

    </main>
</body>
</html>

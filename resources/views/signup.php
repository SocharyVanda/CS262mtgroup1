@extends('layout')

@section('content')
<main class="container">
    <div class="row">
        @auth
            <h2>Contrat! You are login!</h2>
            <form action="/logout" method="POST">
                @csrf
                <button>Logout</button>
            </form>
        @else
            <div class="col-md-6">
                <div class="p-4 p-md-5 mb-4 rounded text-body-emphasis bg-body-secondary">
                    <h4>SIGN UP</h4>
                    <p>Don't have an account yet? Sign up here!</p>
                    <form action="/register" method="post">
                        @csrf
                        <input type="text" name="username" class="my-2" placeholder="Username">
                        <input type="password" name="password" class="my-2" placeholder="Password">
                        <input type="password" name="pwdrepeat" class="my-2" placeholder="Repeat Password">
                        <input type="text" name="email" class="my-2" placeholder="E-mail">
                        <br>
                        <button type="submit" name="submit" class="btn btn-primary my-2">SIGN UP</button>
                    </form>
                </div>
            </div>

            <div class="col-md-6">
                <div class="p-4 p-md-5 mb-4 rounded text-body-emphasis bg-body-secondary">
                    <h4>LOGIN</h4>
                    <p>Log in here!</p>
                    <form action="/login" method="post">
                        @csrf
                        <input type="text" name="loginname" placeholder="Username">
                        <input type="password" name="loginpassword" placeholder="Password">
                        <br>
                        <button type="submit" name="submit" class="btn btn-primary my-2">LOGIN</button>
                    </form>
                </div>
            </div>
        @endauth
    </div>
</main>
@endsection

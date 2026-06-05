@extends('layout')
@section('title', 'STEM Cambodia - Home')
@section('content')

    <div style="padding:  1.25rem 1rem; display: flex; flex-direction: column; align-items: center; gap: 4rem;">

        <div style="text-align: center; margin-bottom: 0.5rem;">
            <p class="text-muted small text-uppercase fw-semibold mb-1" style="letter-spacing: 0.08em;">STEM Cambodia</p>
            <h1 class="h4 fw-medium mb-0">Welcome</h1>
        </div>

        @auth
            <div class="text-center">
                <p class="mb-3">You are logged in.</p>
                <form action="/logout" method="POST">
                    @csrf
                    <button class="btn btn-outline-secondary btn-sm">Log out</button>
                </form>
            </div>
        @else
            <div class="row g-4" style="width: 100%; max-width: 640px;">

                <div class="col-md-6">
                    <div class="p-4 border rounded-3 bg-white">
                        <p class="text-muted small text-uppercase fw-semibold mb-3" style="letter-spacing: 0.07em;">Sign up</p>
                        <form action="/register" method="post" class="d-flex flex-column gap-2">
                            @csrf
                            <input type="text" name="name" class="form-control" placeholder="Username">
                            <input type="password" name="password" class="form-control" placeholder="Password">
                            <input type="password" name="password_confirmation" class="form-control"
                                placeholder="Repeat password">
                            <input type="email" name="email" class="form-control" placeholder="Email">
                            <button type="submit" class="btn btn-primary mt-1">Create account</button>
                        </form>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="p-4 border rounded-3 bg-white">
                        <p class="text-muted small text-uppercase fw-semibold mb-3" style="letter-spacing: 0.07em;">Log in</p>
                        <form action="/login" method="post" class="d-flex flex-column gap-2">
                            @csrf
                            <input type="text" name="loginname" class="form-control" placeholder="Username">
                            <input type="password" name="loginpassword" class="form-control" placeholder="Password">
                            <button type="submit" class="btn btn-primary mt-1">Log in</button>
                        </form>
                        <p class="text-center text-muted mt-3 mb-0" style="font-size: 12px;">Forgot your password?</p>
                    </div>
                </div>

            </div>
        @endauth

    </div>

@endsection

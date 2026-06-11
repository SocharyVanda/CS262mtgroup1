@extends('layout')
@section('title', 'STEM Cambodia - Welcome')
@section('content')
<link rel="stylesheet" href="{{ asset('css/signup.css') }}">

    <div class="auth-root">
        <div class="grid-bg"></div>
        <div class="radial-glow"></div>

        <div class="page-body">
            <div class="auth-container">

                <div class="auth-eyebrow">
                    <div class="eyebrow-badge">STEM Cambodia Platform</div>
                    <div class="auth-headline">Your gateway to <span>science &amp; tech</span> in Cambodia</div>
                    <div class="auth-subline">Join thousands of students and educators building Cambodia's future.</div>
                </div>

                @auth
                    <div
                        style="max-width:400px; margin: 0 auto; background:#fff; border:1px solid #e5e7eb; border-radius:12px; padding:2rem; text-align:center; box-shadow:0 4px 24px rgba(0,0,0,0.06);">
                        <p style="font-size:14px; color:#6b7280; margin-bottom:1.25rem;">You are currently logged in.</p>
                        <form action="/logout" method="POST">
                            @csrf
                            <button class="btn-stem-ghost" style="max-width:160px; margin:0 auto;">Log out</button>
                        </form>
                    </div>
                @else
                    <div class="auth-panels">

                        {{-- SIGN UP --}}
                        <div class="auth-panel">
                            <div class="panel-label">
                                <span class="panel-label-text">New here</span>
                                <div class="panel-label-line"></div>
                            </div>
                            <div class="panel-title">Create an account</div>
                            <div class="panel-sub">Start your STEM journey today — it's free.</div>



                            @if ($errors->any())
                                <div class="alert-stem">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form action="/register" method="POST" class="form-stack">
                                @csrf
                                <div class="input-group">
                                    <label class="input-label">Username</label>
                                    <input type="text" name="name" class="stem-input" placeholder="your_username"
                                        value="{{ old('name') }}">
                                </div>
                                <div class="input-group">
                                    <label class="input-label">Email address</label>
                                    <input type="email" name="email" class="stem-input" placeholder="you@example.com"
                                        value="{{ old('email') }}">
                                </div>
                                <div class="form-row">
                                    <div class="input-group">
                                        <label class="input-label">Password</label>
                                        <input type="password" name="password" class="stem-input" placeholder="••••••••">
                                    </div>
                                    <div class="input-group">
                                        <label class="input-label">Confirm</label>
                                        <input type="password" name="password_confirmation" class="stem-input"
                                            placeholder="••••••••">
                                    </div>
                                </div>
                                <button type="submit" class="btn-stem">Create account →</button>
                            </form>
                            <div class="form-footer">By signing up you agree to our <a href="#">Terms of Service</a></div>
                        </div>

                        <div class="divider-col"></div>

                        {{-- LOG IN --}}
                        <div class="auth-panel">
                            <div class="panel-label">
                                <span class="panel-label-text">Returning</span>
                                <div class="panel-label-line"></div>
                            </div>
                            <div class="panel-title">Welcome back</div>
                            <div class="panel-sub">Log in to your dashboard and continue learning.</div>

                            @if ($errors->has('loginname'))
                                <div class="alert-stem">{{ $errors->first('loginname') }}</div>
                            @endif

                            <form action="/login" method="POST" class="form-stack">
                                @csrf
                                <div class="input-group">
                                    <label class="input-label">Username</label>
                                    <input type="text" name="loginname" class="stem-input" placeholder="your_username"
                                        value="{{ old('loginname') }}">
                                </div>
                                <div class="input-group">
                                    <div class="label-row">
                                        <label class="input-label">Password</label>
                                        <a href="#" class="forgot-link">Forgot password?</a>
                                    </div>
                                    <input type="password" name="loginpassword" class="stem-input" placeholder="••••••••">
                                </div>
                                <button type="submit" class="btn-stem-ghost">Log in →</button>
                            </form>

                            <div class="sso-divider">
                                <div class="sso-divider-line"></div>
                                <span class="sso-divider-text">or continue with</span>
                                <div class="sso-divider-line"></div>
                            </div>

                            <div class="sso-row">
                                <button class="btn-sso">
                                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#374151"
                                        stroke-width="2">
                                        <path
                                            d="M15 22v-4a4.8 4.8 0 0 0-1-3.2c3 0 6-2 6-5.5.08-1.25-.27-2.48-1-3.5.28-1.15.28-2.35 0-3.5 0 0-1 0-3 1.5-2.64-.5-5.36-.5-8 0C6 2 5 2 5 2c-.3 1.15-.3 2.35 0 3.5A5.4 5.4 0 0 0 4 9c0 3.5 3 5.5 6 5.5-.39.49-.68 1.05-.85 1.65-.17.6-.22 1.23-.15 1.85v4" />
                                        <path d="M9 18c-4.51 2-5-2-7-2" />
                                    </svg>
                                    GitHub
                                </button>
                                <button class="btn-sso">
                                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none">
                                        <path
                                            d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"
                                            fill="#4285F4" />
                                        <path
                                            d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"
                                            fill="#34A853" />
                                        <path
                                            d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"
                                            fill="#FBBC05" />
                                        <path
                                            d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"
                                            fill="#EA4335" />
                                    </svg>
                                    Google
                                </button>
                            </div>

                            <div class="form-footer" style="margin-top:16px;">Don't have an account? <a href="#">Sign
                                    up free</a></div>
                        </div>

                    </div>
                @endauth

            </div>
        </div>
    </div>

@endsection

@extends('layout')
@section('title', 'STEM Cambodia - Welcome')
@section('content')

    <style>
        .welcome-wrap {
            min-height: calc(100vh - 60px);
            display: flex;
            flex-direction: column;
            align-items: center;

            padding: 4rem 1.5rem;
            gap: 3rem;
        }

        .welcome-brand {
            text-align: center;
        }

        .welcome-eyebrow {
            font-family: 'DM Mono', monospace;
            font-size: 11px;
            letter-spacing: 0.14em;
            text-transform: uppercase;
            color: var(--clr-muted);
            margin-bottom: 0.5rem;
        }

        .welcome-heading {
            font-size: 1.6rem;
            font-weight: 600;
            color: var(--clr-text);
        }

        /* ─ LOGGED IN ─ */
        .logout-box {
            background: var(--bg);
            border: 1px solid var(--clr-border);
            border-radius: var(--radius);
            padding: 2rem 2.5rem;
            text-align: center;
        }

        .logout-box p {
            font-size: 14px;
            color: var(--clr-muted);
            margin-bottom: 1.25rem;
        }

        .btn-outline-stem {
            font-size: 13px;
            font-weight: 500;
            color: var(--clr-accent);
            background: transparent;
            border: 1px solid var(--clr-accent);
            padding: 0.45rem 1.1rem;
            border-radius: 6px;
            cursor: pointer;
            transition: background 0.15s, color 0.15s;
        }

        .btn-outline-stem:hover {
            background: var(--clr-accent-dim);
        }

        /* ─ AUTH PANELS ─ */
        .auth-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.5rem;
            width: 100%;
            max-width: 850px;
            padding: 1.5rem;
            border: 2px solid var(--clr-border);
            border-radius: 16px;

        }

        @media (max-width: 600px) {
            .auth-grid {
                grid-template-columns: 1fr;
            }
        }

        .auth-panel {
            background: #fff;
            border: 2px solid #d1d5db;
            border-radius: 12px;
            padding: 2rem;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
        }

        .auth-panel {
            background: #fff;
            border: 2px solid #e5e7eb;
            border-radius: 16px;
            padding: 2rem;
            box-shadow:
                0 4px 12px rgba(0, 0, 0, 0.04),
                0 1px 3px rgba(0, 0, 0, 0.06);
        }

        .auth-panel:hover {
            border-color: #2563eb;
        }

        .auth-panel-label {
            font-family: 'DM Mono', monospace;
            font-size: 11px;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: var(--clr-muted);
            margin-bottom: 1.25rem;
        }

        .auth-form {
            display: flex;
            flex-direction: column;
            gap: 0.6rem;
        }

        .stem-input {
            width: 100%;
            background: var(--clr-bg);
            border: 2px solid var(--clr-border);

            .stem-input:focus {
                border-color: var(--clr-accent);
                box-shadow: 0 0 0 3px var(--clr-accent-dim);
            }

            .stem-input:focus {
                border-color: var(--clr-accent);
                box-shadow: 0 0 0 3px var(--clr-accent-dim);
            }

            .btn-stem {
                font-size: 13px;
                font-weight: 500;
                color: var(--clr-surface);
                background: var(--clr-accent);
                border: none;
                border-radius: 6px;
                padding: 0.55rem 1rem;
                cursor: pointer;
                transition: opacity 0.15s;
                margin-top: 0.25rem;
                border: 2px solid transparent;
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            }

            .welcome-brand {
                text-align: center;
                padding-bottom: 1rem;
                border-bottom: 2px solid var(--clr-border);
                width: 100%;
                max-width: 850px;
            }

            .btn-stem:hover {
                opacity: 0.85;
            }

            .auth-footer {
                font-size: 12px;
                color: var(--clr-muted);
                text-align: center;
                margin-top: 1rem;
            }

            .auth-footer a {
                color: var(--clr-accent);
                text-decoration: none;
            }

            .auth-footer a:hover {
                text-decoration: underline;
            }

            .alert-stem {
                background: #fef2f2;
                border: 1px solid #fecaca;
                border-radius: 6px;
                padding: 0.75rem 1rem;
                font-size: 13px;
                color: #b91c1c;
                margin-bottom: 1rem;
            }

            .alert-stem ul {
                margin: 0;
                padding-left: 1.1rem;
            }
    </style>

    <div class="welcome-wrap">

        <div class="welcome-brand">
            <p class="welcome-eyebrow">STEM Cambodia</p>
            <h1 class="welcome-heading">Welcome</h1>
        </div>

        @auth
            <div class="logout-box">
                <p>You are currently logged in.</p>
                <form action="/logout" method="POST">
                    @csrf
                    <button class="btn-outline-stem">Log out</button>
                </form>
            </div>
        @else
            <div class="auth-grid">

                <!-- SIGN UP -->
                <div class="auth-panel">
                    <p class="auth-panel-label">Create account</p>

                    @if ($errors->any())
                        <div class="alert-stem">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="/register" method="POST" class="auth-form">
                        @csrf
                        <input type="text" name="name" class="stem-input" placeholder="Username"
                            value="{{ old('name') }}">
                        <input type="password" name="password" class="stem-input" placeholder="Password">
                        <input type="password" name="password_confirmation" class="stem-input" placeholder="Repeat password">
                        <input type="email" name="email" class="stem-input" placeholder="Email" value="{{ old('email') }}">
                        <button type="submit" class="btn-stem">Create account</button>
                    </form>
                </div>

                <!-- LOG IN -->
                <div class="auth-panel">
                    <p class="auth-panel-label">Log in</p>

                    @if ($errors->has('loginname'))
                        <div class="alert-stem">{{ $errors->first('loginname') }}</div>
                    @endif

                    <form action="/login" method="POST" class="auth-form">
                        @csrf
                        <input type="text" name="loginname" class="stem-input" placeholder="Username"
                            value="{{ old('loginname') }}">
                        <input type="password" name="loginpassword" class="stem-input" placeholder="Password">
                        <button type="submit" class="btn-stem">Log in</button>
                    </form>
                    <p class="auth-footer"><a href="#">Forgot your password?</a></p>
                </div>

            </div>
        @endauth

    </div>

@endsection

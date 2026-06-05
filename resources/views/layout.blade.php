<!DOCTYPE html>
<html class="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>@yield('title', 'STEMBODIAN')</title>

    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=DM+Mono:wght@400;500&family=DM+Sans:wght@300;400;500;600&family=Noto+Sans+Khmer:wght@400&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>

    <style>
        :root {
            --clr-bg: #f5f5f0;
            --clr-surface: #ffffff;
            --clr-accent: #1a7a4a;
            --clr-accent-dim: #e8f5ee;
            --clr-text: #111110;
            --clr-muted: #6b7280;
            --clr-border: #e2e2dc;
            --clr-tertiary: #1e40af;
            --clr-secondary: #4b5563;
            --nav-h: 60px;
            --radius: 8px;
        }

        *,
        *::before,
        *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            background: var(--clr-bg);
            color: var(--clr-text);
            font-family: 'DM Sans', sans-serif;
            font-size: 15px;
            line-height: 1.6;
            min-height: 100vh;
            padding-top: var(--nav-h);
        }

        /* ── NAV ── */
        nav.site-nav {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            height: var(--nav-h);
            background: rgba(245, 245, 240, 0.88);
            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
            border-bottom: 1px solid var(--clr-border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 2rem;
            z-index: 100;
        }

        .nav-wordmark {
            font-family: 'DM Mono', monospace;
            font-size: 14px;
            font-weight: 500;
            color: var(--clr-accent);
            letter-spacing: 0.04em;
            text-decoration: none;
        }

        .nav-wordmark span {
            color: var(--clr-muted);
            font-weight: 400;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 0.25rem;
        }

        .nav-link-item {
            font-size: 13.5px;
            font-weight: 400;
            color: var(--clr-muted);
            text-decoration: none;
            padding: 0.35rem 0.75rem;
            border-radius: 6px;
            transition: color 0.15s, background 0.15s;
        }

        .nav-link-item:hover {
            color: var(--clr-text);
            background: var(--clr-accent-dim);
        }

        .nav-link-item.active {
            color: var(--clr-accent);
            font-weight: 500;
        }

        .nav-link-pill {
            font-size: 13px;
            font-weight: 500;
            color: var(--clr-surface);
            background: var(--clr-accent);
            text-decoration: none;
            padding: 0.35rem 0.9rem;
            border-radius: 100px;
            transition: opacity 0.15s;
        }

        .nav-link-pill:hover {
            opacity: 0.85;
            color: var(--clr-surface);
        }

        /* ── UTILITY ── */
        .mono {
            font-family: 'DM Mono', monospace;
        }
    </style>
</head>

<body>

    <nav class="site-nav">
        <a href="{{ url('') }}" class="nav-wordmark">
            <span> <img src="{{ asset('img/logosteam.png') }}" alt="logo" style="width:60px;height:auto;"></span>
            STEM<span> Cambodia</span></a>

        <div class="nav-links">
            <a class="nav-link-item active" href="{{ url('') }}">Home</a>
            <a class="nav-link-item" href="/aboutus">About Us</a>
            <a class="nav-link-item" href="/news">News</a>
            <a class="nav-link-item" href="/bookmarks">Bookmarks</a>
            <a class="nav-link-item" href="/signup">Sign up</a>
            <a class="nav-link-pill" href="/dashboard">Dashboard</a>
        </div>
    </nav>
    @if (session('message'))
        <div
            style="
    background: #e8f5ee;
    border-bottom: 1px solid #a7d7b8;
    color: #1a7a4a;
    font-size: 13.5px;
    font-family: 'DM Sans', sans-serif;
    padding: 0.65rem 2rem;
    text-align: center;
">
            {{ session('message') }}
        </div>
    @endif
    @yield('content')

</body>

</html>

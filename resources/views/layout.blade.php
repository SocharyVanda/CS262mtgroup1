<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>@yield('title', 'STEMBODIAN')</title>

    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;0,9..40,500;0,9..40,600;1,9..40,400&family=DM+Mono:wght@400;500&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
</head>

<body>

    <nav class="site-nav">
        <a href="{{ url('') }}" class="nav-logo">
            <div class="nav-logo-icon">
                <img src="{{ asset('img/logosteam.png') }}" alt="STEM Cambodia">
            </div>
            <div class="nav-logo-text">
                <span class="t1">STEMBODIAN</span>
                <span class="t2">Cambodia</span>
            </div>
        </a>

        <div class="nav-links">
            <a class="nav-link active" href="{{ url('') }}">Home</a>
            <a class="nav-link" href="/news">News</a>
            <a class="nav-link" href="/posts">Posts</a>
            <a class="nav-link" href="/signup">Sign up</a>
            <a class="nav-btn" href="/dashboard">Dashboard</a>
        </div>
    </nav>

    @if (session('message'))
        <div class="flash-msg">{{ session('message') }}</div>
    @endif

    @yield('content')

    <footer class="site-footer">
        <div class="footer-inner">
            <div class="footer-brand">
                <div class="footer-brand-name">STEMBODIAN</div>
                <p>Advancing Cambodia's future through science, technology, engineering, and mathematics education.</p>
            </div>
            <div class="footer-col">
                <h4>Navigate</h4>
                <a href="/">Home</a>
                <a href="/news">News & events</a>
                <a href="/bookmarks">Bookmarks</a>
            </div>
            <div class="footer-col">
                <h4>Subjects</h4>
                <a href="/science">Science</a>
                <a href="/technology">Technology</a>
                <a href="/engineering">Engineering</a>
                <a href="/mathematics">Mathematics</a>
            </div>
        </div>
        <div class="footer-bottom">
            <span>© 2025 STEMBODIAN — STEM Cambodia</span>
            <span class="status-pill">All systems operational</span>
        </div>
    </footer>

</body>

</html>

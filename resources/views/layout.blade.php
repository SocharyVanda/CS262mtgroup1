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
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

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
            <div class="dropdown custom-nav-dropdown">
    <button class="nav-btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        Courses
    </button>
    <ul class="dropdown-menu dropdown-menu-end">
        <li><a class="dropdown-item" href="http://cs262mtgroup1.test/science">Science</a></li>
        <li><a class="dropdown-item" href="http://cs262mtgroup1.test/technology">Technology</a></li>
        <li><a class="dropdown-item" href="http://cs262mtgroup1.test/engineering">Engineering</a></li>
        <li><a class="dropdown-item" href="http://cs262mtgroup1.test/mathematics">Mathematics</a></li>
    </ul>
</div>

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

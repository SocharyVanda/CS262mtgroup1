<!DOCTYPE html>
<html class="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>@yield('title', 'STEMBODIAN')</title>

    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&family=JetBrains+Mono:wght@400;500;700&family=Syne:wght@400;700;800&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap"
        rel="stylesheet">

    <style>
        :root {
            --clr-bg: #050c14;
            --clr-bg2: #080f1a;
            --clr-surface: #0d1929;
            --clr-surface2: #101e30;
            --clr-accent: #00e676;
            --clr-accent-dim: rgba(0, 230, 118, 0.08);
            --clr-accent-glow: rgba(0, 230, 118, 0.25);
            --clr-blue: #38bdf8;
            --clr-purple: #a78bfa;
            --clr-text: #e8f4f8;
            --clr-text2: #8ba8c0;
            --clr-muted: #4a6880;
            --clr-border: rgba(56, 189, 248, 0.12);
            --clr-border-bright: rgba(0, 230, 118, 0.3);
            --nav-h: 64px;
            --radius: 8px;
            --font-display: 'Syne', sans-serif;
            --font-body: 'Space Grotesk', sans-serif;
            --font-mono: 'JetBrains Mono', monospace;
        }

        *,
        *::before,
        *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            background: var(--clr-bg);
            color: var(--clr-text);
            font-family: var(--font-body);
            font-size: 15px;
            line-height: 1.7;
            min-height: 100vh;
            padding-top: var(--nav-h);
        }

        /* ── GRID TEXTURE ── */
        body::before {
            content: '';
            position: fixed;
            inset: 0;
            background-image:
                linear-gradient(rgba(56, 189, 248, 0.03) 1px, transparent 1px),
                linear-gradient(90deg, rgba(56, 189, 248, 0.03) 1px, transparent 1px);
            background-size: 48px 48px;
            pointer-events: none;
            z-index: 0;
        }

        /* ── NAV ── */
        nav.site-nav {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            height: var(--nav-h);
            background: rgba(5, 12, 20, 0.85);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--clr-border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 2.5rem;
            z-index: 1000;
        }

        nav.site-nav::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 1px;
            background: linear-gradient(90deg, transparent, var(--clr-accent), transparent);
            opacity: 0.4;
        }

        .nav-wordmark {
            font-family: var(--font-mono);
            font-size: 13px;
            font-weight: 700;
            color: var(--clr-accent);
            letter-spacing: 0.08em;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .nav-wordmark img {
            width: 36px;
            height: auto;
            filter: brightness(0) invert(1) saturate(0) brightness(1.5);
        }

        .nav-wordmark .brand-name {
            display: flex;
            flex-direction: column;
            line-height: 1.1;
        }

        .nav-wordmark .brand-top {
            font-size: 14px;
            font-weight: 700;
            color: var(--clr-text);
            letter-spacing: 0.15em;
        }

        .nav-wordmark .brand-sub {
            font-size: 10px;
            color: var(--clr-accent);
            font-weight: 500;
            letter-spacing: 0.2em;
            text-transform: uppercase;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 0.15rem;
        }

        .nav-link-item {
            font-family: var(--font-body);
            font-size: 13px;
            font-weight: 500;
            color: var(--clr-text2);
            text-decoration: none;
            padding: 0.4rem 0.85rem;
            border-radius: 6px;
            transition: color 0.2s, background 0.2s;
            letter-spacing: 0.02em;
        }

        .nav-link-item:hover {
            color: var(--clr-text);
            background: rgba(56, 189, 248, 0.08);
        }

        .nav-link-item.active {
            color: var(--clr-accent);
        }

        .nav-link-pill {
            font-family: var(--font-mono);
            font-size: 12px;
            font-weight: 700;
            color: #050c14;
            background: var(--clr-accent);
            text-decoration: none;
            padding: 0.4rem 1.1rem;
            border-radius: 4px;
            transition: box-shadow 0.2s, opacity 0.2s;
            letter-spacing: 0.05em;
            text-transform: uppercase;
        }

        .nav-link-pill:hover {
            opacity: 0.88;
            color: #050c14;
            box-shadow: 0 0 20px var(--clr-accent-glow);
        }

        /* ── FLASH MESSAGE ── */
        .flash-msg {
            background: rgba(0, 230, 118, 0.08);
            border-bottom: 1px solid rgba(0, 230, 118, 0.2);
            color: var(--clr-accent);
            font-size: 13px;
            font-family: var(--font-mono);
            padding: 0.65rem 2rem;
            text-align: center;
            position: relative;
            z-index: 10;
        }

        /* ── FOOTER ── */
        footer.site-footer {
            background: var(--clr-bg2);
            border-top: 1px solid var(--clr-border);
            padding: 3rem 2.5rem 2rem;
            margin-top: 0;
        }

        .footer-inner {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 3rem;
        }

        .footer-brand .brand-name-lg {
            font-family: var(--font-mono);
            font-size: 16px;
            font-weight: 700;
            color: var(--clr-text);
            letter-spacing: 0.1em;
            margin-bottom: 0.75rem;
        }

        .footer-brand .brand-name-lg span {
            color: var(--clr-accent);
        }

        .footer-brand p {
            font-size: 13px;
            color: var(--clr-muted);
            line-height: 1.7;
            max-width: 260px;
        }

        .footer-col h4 {
            font-family: var(--font-mono);
            font-size: 10px;
            font-weight: 700;
            color: var(--clr-accent);
            letter-spacing: 0.2em;
            text-transform: uppercase;
            margin-bottom: 1rem;
        }

        .footer-col a {
            display: block;
            font-size: 13px;
            color: var(--clr-text2);
            text-decoration: none;
            padding: 0.3rem 0;
            transition: color 0.2s;
        }

        .footer-col a:hover {
            color: var(--clr-text);
        }

        .footer-bottom {
            max-width: 1200px;
            margin: 2rem auto 0;
            padding-top: 1.5rem;
            border-top: 1px solid var(--clr-border);
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 12px;
            color: var(--clr-muted);
            font-family: var(--font-mono);
        }

        .status-dot {
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .status-dot::before {
            content: '';
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: var(--clr-accent);
            animation: pulse-dot 2s infinite;
        }

        @keyframes pulse-dot {

            0%,
            100% {
                opacity: 1;
            }

            50% {
                opacity: 0.3;
            }
        }
    </style>
</head>

<body>

    <nav class="site-nav">
        <a href="{{ url('') }}" class="nav-wordmark">
            <img src="{{ asset('img/logosteam.png') }}" alt="STEM Cambodia logo">
            <div class="brand-name">
                <span class="brand-top">STEMBODIAN</span>
                <span class="brand-sub">Cambodia</span>
            </div>
        </a>

        <div class="nav-links">
            <a class="nav-link-item active" href="{{ url('') }}">Home</a>
            <a class="nav-link-item" href="/aboutus">About Us</a>
            <a class="nav-link-item" href="/news">News</a>
            <a class="nav-link-item" href="/bookmarks">Bookmarks</a>
            <a class="nav-link-item" href="/signup">Sign Up</a>
            <a class="nav-link-pill" href="/dashboard">Dashboard →</a>
        </div>
    </nav>

    @if (session('message'))
        <div class="flash-msg">// {{ session('message') }}</div>
    @endif

    @yield('content')

    <footer class="site-footer">
        <div class="footer-inner">
            <div class="footer-brand">
                <div class="brand-name-lg">STEM<span>BODIAN</span></div>
                <p>Advancing Cambodia's future through science, technology, engineering, and mathematics education.</p>
            </div>
            <div class="footer-col">
                <h4>Navigate</h4>
                <a href="/">Home</a>
                <a href="/aboutus">About Us</a>
                <a href="/news">News & Events</a>
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
            <span class="status-dot">All systems operational</span>
        </div>
    </footer>

</body>

</html>

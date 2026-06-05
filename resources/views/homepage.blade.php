@extends('layout')
@section('title', 'STEM Cambodia - Home')
@section('content')

    <style>
        /* ── CAROUSEL ── */
        .hero-carousel {
            position: relative;
            overflow: hidden;
        }

        .hero-carousel .carousel-inner {
            border-radius: 0;
        }

        .hero-carousel img {
            height: 480px;
            object-fit: cover;
            width: 100%;
            filter: brightness(0.88);
        }

        .hero-carousel .carousel-indicators [data-bs-target] {
            width: 24px;
            height: 3px;
            border-radius: 2px;
            background: rgba(255, 255, 255, 0.5);
            border: none;
            opacity: 1;
        }

        .hero-carousel .carousel-indicators .active {
            background: #fff;
        }

        .hero-overlay {
            position: absolute;
            inset: 0;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            padding: 2.5rem 3rem;
            background: linear-gradient(to top, rgba(17, 17, 16, 0.55) 0%, transparent 60%);
            pointer-events: none;
        }

        .hero-label {
            font-family: 'DM Mono', monospace;
            font-size: 11px;
            letter-spacing: 0.12em;
            color: rgba(255, 255, 255, 0.65);
            text-transform: uppercase;
            margin-bottom: 0.4rem;
        }

        .hero-title {
            font-size: 1.9rem;
            font-weight: 600;
            color: #fff;
            line-height: 1.25;
        }

        /* ── PAGE WRAPPER ── */
        .page-body {
            max-width: 1160px;
            margin: 0 auto;
            padding: 0 1.5rem 5rem;
        }

        /* ── SECTION LABEL ── */
        .section-label {
            font-family: 'DM Mono', monospace;
            font-size: 11px;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: var(--clr-muted);
            margin-bottom: 1.25rem;
        }

        /* ── SUBJECT GRID ── */
        .subject-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1rem;
        }

        @media (max-width: 900px) {
            .subject-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 500px) {
            .subject-grid {
                grid-template-columns: 1fr 1fr;
            }
        }

        .subject-card {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 0.85rem;
            background: var(--clr-surface);
            border: 1px solid var(--clr-border);
            border-radius: var(--radius);
            padding: 2rem 1rem;
            text-decoration: none;
            transition: border-color 0.2s, box-shadow 0.2s, transform 0.2s;
        }

        .subject-card:hover {
            border-color: var(--clr-accent);
            box-shadow: 0 4px 16px rgba(26, 122, 74, 0.1);
            transform: translateY(-2px);
        }

        .subject-icon {
            width: 44px;
            height: 44px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .subject-icon .material-symbols-outlined {
            font-size: 22px;
        }

        .subject-name {
            font-size: 13.5px;
            font-weight: 500;
            color: var(--clr-text);
            text-align: center;
        }

        .icon-science {
            background: #e8f5ee;
            color: var(--clr-accent);
        }

        .icon-tech {
            background: #eff6ff;
            color: var(--clr-tertiary);
        }

        .icon-eng {
            background: #f3f4f6;
            color: var(--clr-secondary);
        }

        .icon-math {
            background: #fef3c7;
            color: #92400e;
        }

        /* ── FEATURED CARD ── */
        .featured-card {
            background: var(--clr-surface);
            border: 1px solid var(--clr-border);
            border-radius: var(--radius);
            padding: 2rem;
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
        }

        .featured-tag {
            font-family: 'DM Mono', monospace;
            font-size: 11px;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            color: var(--clr-accent);
            font-weight: 500;
        }

        .featured-title {
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--clr-text);
        }

        .featured-body {
            font-size: 14px;
            color: var(--clr-muted);
        }

        .btn-stem {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            font-size: 13px;
            font-weight: 500;
            color: var(--clr-surface);
            background: var(--clr-accent);
            padding: 0.5rem 1.1rem;
            border-radius: 6px;
            text-decoration: none;
            border: none;
            cursor: pointer;
            transition: opacity 0.15s;
            width: fit-content;
        }

        .btn-stem:hover {
            opacity: 0.85;
            color: var(--clr-surface);
        }

        /* ── CREATE/LIST POSTS (auth) ── */
        .post-form-wrap {
            background: var(--clr-surface);
            border: 1px solid var(--clr-border);
            border-radius: var(--radius);
            padding: 1.75rem;
        }

        .stem-input {
            width: 100%;
            background: var(--clr-bg);
            border: 1px solid var(--clr-border);
            border-radius: 6px;
            padding: 0.6rem 0.85rem;
            font-family: 'DM Sans', sans-serif;
            font-size: 14px;
            color: var(--clr-text);
            outline: none;
            transition: border-color 0.15s;
            resize: vertical;
        }

        .stem-input:focus {
            border-color: var(--clr-accent);
        }

        .post-card {
            background: var(--clr-surface);
            border: 1px solid var(--clr-border);
            border-radius: var(--radius);
            padding: 1.5rem;
        }

        .post-card-title {
            font-size: 1rem;
            font-weight: 600;
            color: var(--clr-text);
            margin-bottom: 0.35rem;
        }

        .post-card-by {
            font-size: 12px;
            font-family: 'DM Mono', monospace;
            color: var(--clr-muted);
            margin-bottom: 0.75rem;
        }

        .post-card-body {
            font-size: 14px;
            color: var(--clr-muted);
        }

        .post-actions {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin-top: 1rem;
        }

        .link-edit {
            font-size: 13px;
            color: var(--clr-accent);
            text-decoration: none;
        }

        .link-edit:hover {
            text-decoration: underline;
        }

        .btn-danger-sm {
            font-size: 12px;
            font-weight: 500;
            color: #b91c1c;
            background: #fef2f2;
            border: 1px solid #fecaca;
            padding: 0.3rem 0.75rem;
            border-radius: 6px;
            cursor: pointer;
            transition: background 0.15s;
        }

        .btn-danger-sm:hover {
            background: #fee2e2;
        }

        .stack {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .section-gap {
            margin-top: 3rem;
        }
    </style>

    <!-- ── HERO CAROUSEL ── -->
    <div id="stemCarousel" class="carousel slide hero-carousel" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#stemCarousel" data-bs-slide-to="0" class="active" aria-current="true"
                aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#stemCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#stemCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://i.pinimg.com/1200x/e5/06/25/e50625aafcb8cdc0df2ac6231c5d912a.jpg" alt="STEM Cambodia">
                <div class="hero-overlay">
                    <p class="hero-label">Featured</p>
                    <h2 class="hero-title">Advancing Science &amp; Technology<br>in Cambodia</h2>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://i.pinimg.com/1200x/e5/06/25/e50625aafcb8cdc0df2ac6231c5d912a.jpg" alt="Slide 2">
            </div>
            <div class="carousel-item">
                <img src="https://i.pinimg.com/1200x/e5/06/25/e50625aafcb8cdc0df2ac6231c5d912a.jpg" alt="Slide 3">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#stemCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#stemCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- ── PAGE BODY ── -->
    {{-- <div class="page-body">

        @auth
            <!-- ─ CREATE POST ─ -->
            <div class="section-gap">
                <p class="section-label">New Post</p>
                <div class="post-form-wrap">
                    <form action="/create-post" method="POST" class="stack">
                        @csrf
                        <input type="text" name="title" class="stem-input" placeholder="Post title"
                            value="{{ old('title') }}">
                        <textarea name="body" class="stem-input" rows="4" placeholder="Write something…">{{ old('body') }}</textarea>
                        <button type="submit" class="btn-stem">Publish post</button>
                    </form>
                </div>
            </div>

            <!-- ─ ALL POSTS ─ -->
            <div class="section-gap">
                <p class="section-label">All Posts</p>
                <div class="stack">
                    @foreach ($posts ?? [] as $post)
                        <div class="post-card">
                            <p class="post-card-title">{{ $post['title'] }}</p>
                            <p class="post-card-by mono">by {{ $post->user->name }}</p>
                            <p class="post-card-body">{{ $post['body'] }}</p>
                            <div class="post-actions">
                                <a href="/edit-post/{{ $post->id }}" class="link-edit">Edit</a>
                                <form action="/delete-post/{{ $post->id }}" method="POST" style="margin:0">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn-danger-sm">Delete</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @else
            <!-- ─ EXPLORE SUBJECTS ─ -->
            <div class="section-gap">
                <p class="section-label">Explore Subjects</p>
                <div class="subject-grid">
                    <a class="subject-card" href="#">
                        <div class="subject-icon icon-science"><span class="material-symbols-outlined">science</span></div>
                        <span class="subject-name">Science</span>
                    </a>
                    <a class="subject-card" href="#">
                        <div class="subject-icon icon-tech"><span class="material-symbols-outlined">devices</span></div>
                        <span class="subject-name">Technology</span>
                    </a>
                    <a class="subject-card" href="#">
                        <div class="subject-icon icon-eng"><span
                                class="material-symbols-outlined">precision_manufacturing</span></div>
                        <span class="subject-name">Engineering</span>
                    </a>
                    <a class="subject-card" href="#">
                        <div class="subject-icon icon-math"><span class="material-symbols-outlined">calculate</span></div>
                        <span class="subject-name">Mathematics</span>
                    </a>
                </div>
            </div> --}}

    <!-- ─ FEATURED ─ -->
    {{-- <div class="section-gap">
        <p class="section-label">Featured</p>
        <div class="featured-card">
            <span class="featured-tag">Spotlight</span>
            <p class="featured-title">Special title treatment</p>
            <p class="featured-body">With supporting text below as a natural lead-in to additional content.</p>
            <a href="#" class="btn-stem">Read more</a>
        </div>
    </div>

@endauth --}}

    </div>

@endsection

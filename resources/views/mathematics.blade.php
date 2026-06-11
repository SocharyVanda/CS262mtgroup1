@extends('layout')
@section('title', 'STEM Cambodia - Home')
@section('content')

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Introduction to mathematics</title>
<<<<<<< HEAD
        <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            body {
                background: var(--bg);
                font-family: Georgia, 'Times New Roman', serif;
                color: #1a1a1a;
                line-height: 1.7;
            }

            .page-wrapper {
                display: flex;
                justify-content: center;
                padding: 60px 20px;
            }

            .article {
                width: 100%;
                max-width: 720px;
            }

            /* ── GRID (remaining posts) ── */
            .section-label {
                font-family: 'DM Mono', monospace;
                font-size: 11px;
                letter-spacing: 0.12em;
                text-transform: uppercase;
                color: var(--text-3);
                margin-bottom: 1rem;
            }

            .section-gap {
                margin-top: 2.5rem;
            }

            .news-grid {
                display: grid;
                grid-template-columns: repeat(3, 1fr);
                gap: 1.25rem;
            }

            @media (max-width: 900px) {
                .news-grid {
                    grid-template-columns: repeat(2, 1fr);
                }
            }

            @media (max-width: 560px) {
                .news-grid {
                    grid-template-columns: 1fr;
                }
            }

            .news-card {
                background: var(--bg-soft);
                border: 1px solid var(--border);
                border-radius: 12px;
                overflow: hidden;
                display: flex;
                flex-direction: column;
                transition: box-shadow 0.2s, transform 0.2s;
                text-decoration: none;
            }

            .news-card:hover {
                box-shadow: 0 4px 16px rgba(0, 0, 0, 0.07);
                transform: translateY(-2px);
            }

            .news-card-thumb {
                height: 160px;
                overflow: hidden;
                background: linear-gradient(135deg, #eff6ff, #dbeafe);
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .news-card-thumb img {
                width: 100%;
                height: 100%;
                object-fit: cover;
            }

            .news-card-thumb .placeholder-icon {
                font-size: 40px;
                color: #d1d5db;
            }

            .news-card-body {
                padding: 1.1rem;
                flex: 1;
                display: flex;
                flex-direction: column;
                gap: 0.4rem;
            }

            .news-card-tag {
                font-family: 'DM Mono', monospace;
                font-size: 10.5px;
                letter-spacing: 0.08em;
                text-transform: uppercase;
                color: var(--blue);
            }

            .news-card-title {
                font-size: 14px;
                font-weight: 500;
                color: var(--text);
                line-height: 1.4;
                flex: 1;
            }

            .news-card-excerpt {
                font-size: 12px;
                color: var(--text-2);
                line-height: 1.5;
            }

            .news-card-meta {
                font-family: 'DM Mono', monospace;
                font-size: 11px;
                color: var(--text-3);
                margin-top: 0.5rem;
            }

            /* ── EMPTY STATE ── */
            .empty-posts {
                text-align: center;
                padding: 4rem 1rem;
                color: var(--text-3);
            }

            .empty-posts .material-symbols-outlined {
                font-size: 48px;
                display: block;
                margin-bottom: 1rem;
                color: var(--border);
            }

            .empty-posts p {
                font-size: 14px;
            }

            

            /* Tags */
            .tags {
                display: flex;
                align-items: center;
                gap: 10px;
                margin-bottom: 20px;
            }

            .tag {
                font-family: Arial, sans-serif;
                font-size: 13px;
                padding: 4px 12px;
                border-radius: 20px;
                font-weight: 500;
            }

            .tag-tech {
                background-color: #e8f0e9;
                color: #2d6a4f;
                border: 1px solid #b7d5be;
            }

            .tag-beginner {
                background-color: #e8f0e9;
                color: #2d6a4f;
                border: 1px solid #b7d5be;
            }

            .read-time {
                font-family: Arial, sans-serif;
                font-size: 13px;
                color: #777;
            }

            /* Title */
            h1 {
                font-size: 42px;
                font-weight: 800;
                line-height: 1.2;
                margin-bottom: 16px;
                color: #111;
            }

            /* Meta */
            .meta {
                display: flex;
                align-items: center;
                justify-content: space-between;
                font-family: Arial, sans-serif;
                font-size: 14px;
                color: #555;
                padding-bottom: 20px;
                border-bottom: 1px solid #ddd;
                margin-bottom: 30px;
            }

            .meta .author {
                font-weight: 700;
                color: #111;
            }

            .bookmark-icon {
                font-size: 20px;
                cursor: pointer;
            }

            /* Body text */
            p {
                font-size: 17px;
                margin-bottom: 24px;
                color: #222;
            }

            /* Tip box */
            .tip-box {
                background-color: #f0faf2;
                border-left: 4px solid #4caf7d;
                border-radius: 4px;
                padding: 16px 20px;
                margin-bottom: 30px;
                font-size: 16px;
                color: #333;
            }

            .tip-box .tip-icon {
                margin-right: 6px;
            }

            /* Headings */
            h2 {
                font-size: 26px;
                font-weight: 800;
                margin-top: 10px;
                margin-bottom: 14px;
                color: #111;
            }

            /* List */
            ul {
                list-style: none;
                padding: 0;
                margin-bottom: 30px;
            }

            ul li {
                font-size: 17px;
                padding: 6px 0;
                color: #222;
                display: flex;
                align-items: flex-start;
                gap: 10px;
            }

            ul li::before {
                content: "•";
                color: #333;
                font-size: 18px;
                margin-top: 1px;
                flex-shrink: 0;
            }

            ul li strong {
                font-weight: 700;
            }

            /* Code block */
            .code-block {
                background-color: #f0ede6;
                border: 1px solid #ddd;
                border-radius: 6px;
                padding: 18px 20px;
                margin-bottom: 30px;
                font-family: 'Courier New', Courier, monospace;
                font-size: 14px;
                line-height: 1.8;
                color: #555;
                overflow-x: auto;
            }

            .code-block .c-comment {
                color: #999;
                font-style: italic;
            }

            .code-block .c-string {
                color: #c0392b;
            }

            .code-block .c-number {
                color: #c0392b;
            }

            .code-block .c-keyword {
                color: #2471a3;
                font-weight: bold;
            }

            .code-block .c-func {
                color: #e67e22;
            }

            .code-block .c-var {
                color: #c0392b;
            }

            /* Divider */
            .divider {
                border: none;
                border-top: 1px solid #ddd;
                margin: 40px 0 30px;
            }

            /* Post navigation */
            .post-nav {
                display: flex;
                gap: 16px;
            }

            .post-nav a {
                flex: 1;
                display: block;
                border: 1px solid #ddd;
                border-radius: 8px;
                padding: 16px 20px;
                text-decoration: none;
                color: inherit;
                background: #fff;
            }

            .post-nav a:hover {
                background: #f0ede6;
            }

            .post-nav .nav-label {
                font-family: Arial, sans-serif;
                font-size: 11px;
                color: #999;
                text-transform: uppercase;
                letter-spacing: 0.5px;
                margin-bottom: 6px;
            }

            .post-nav .nav-title {
                font-size: 16px;
                font-weight: 700;
                color: #111;
            }

            .post-nav .nav-next {
                text-align: right;
            }
        </style>
=======
        <link rel="stylesheet" href="{{ asset('css/pillar.css') }}">
>>>>>>> cee8697e9ba19fb2b747be2ef3a1b4e160b17010
    </head>

    <body>

        <div class="page-wrapper">
            <article class="article">

                {{-- Tags --}}
                <div class="tags">
                    <span class="tag tag-tech">Technology</span>
                    <span class="tag tag-beginner">Beginner</span>
                    <span class="read-time">8 min read</span>
                </div>

                {{-- Title --}}
                <h1>Introduction to Python Programming</h1>

                {{-- Meta --}}
                <div class="meta">
                    <span>By <span class="author">Admin</span> &nbsp;·&nbsp; June 2025</span>
                    <span class="bookmark-icon">🔖</span>
                </div>

                {{-- Intro paragraph --}}
                <p>
                    Python is a high-level, interpreted programming language known for its clear and readable
                    syntax. Created by Guido van Rossum in 1991, it has become one of the most popular languages
                    worldwide — used in web development, data science, AI, automation, and more.
                </p>

                {{-- Tip box --}}
                <div class="tip-box">
                    <span class="tip-icon">💡</span>
                    Python uses indentation instead of curly braces to define code blocks, making code visually
                    clean and easy to read.
                </div>

                {{-- Key Concepts --}}
                <h2>Key Concepts</h2>

                <p>Before writing your first program, you need to understand a few foundational ideas:</p>

                <ul>
                    <li><strong>Variables</strong> — containers that store data values</li>
                    <li><strong>Data types</strong> — integers, floats, strings, booleans, lists, dictionaries</li>
                    <li><strong>Control flow</strong> — if/else statements, loops</li>
                    <li><strong>Functions</strong> — reusable blocks of code</li>
                </ul>

                {{-- How It Works --}}
                <h2>How It Works</h2>

                <p>Python code is written in <code>.py</code> files and run by the Python interpreter. The interpreter reads
                    your code line by line and executes each instruction.</p>

                {{-- Code block --}}
                <div class="code-block">
                    <span class="c-comment"># Your first Python program</span><br>
                    <span class="c-var">name</span> = <span class="c-string">"Sophea"</span> &nbsp;
                    <span class="c-var">age</span> = <span class="c-number">18</span><br>
                    <span class="c-func">print</span>(<span class="c-string">f"Hello, {<span class="c-var">name</span>}!
                        You are {<span class="c-var">age</span>} years old."</span>)<br>
                    <span class="c-comment"># A simple loop</span><br>
                    <span class="c-keyword">for</span> i <span class="c-keyword">in</span> <span
                        class="c-func">range</span>(<span class="c-number">5</span>): &nbsp;
                    <span class="c-func">print</span>(<span class="c-string">f"Count: {i}"</span>)
                </div>

                {{-- Applications --}}
                <h2>Applications</h2>

                <p>Python is used across many fields. In Cambodia and throughout Southeast Asia, Python skills are
                    increasingly in demand for careers in fintech, e-commerce, agriculture data analytics, and government
                    digital services.</p>

                <ul>
                    <li>Web development with Django and Flask</li>
                    <li>Data analysis with Pandas and NumPy</li>
                    <li>Machine learning with TensorFlow and scikit-learn</li>
                    <li>Automation of repetitive tasks</li>
                </ul>

                {{-- Summary --}}
                <h2>Summary</h2>

                <p>Python is the perfect first language — readable, powerful, and supported by one of the largest
                    communities in software. Start small, write a few scripts, and you'll be building real applications in
                    no time.</p>

                <div class="posts-section">
                    @if (isset($posts) && count($posts) > 0)
                        <div class="section-gap">
                            <p class="section-label">More articles</p>
                            <div class="news-grid">
                                @foreach ($posts as $post)
                                    <a href="{{ url('/news/' . $post->slug)}}" class="post-link">
                                        <div class="news-card">
                                            <div class="news-card-thumb">
                                                @if ($post->image)
                                                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}">
                                                @else
                                                    <span class="material-symbols-outlined placeholder-icon">article</span>
                                                @endif
                                            </div>
                                            <div class="news-card-body">
                                                <p class="news-card-tag">Article</p>
                                                <p class="news-card-title">{{ $post->title }}</p>
                                                <p class="news-card-excerpt">{{ Str::limit($post->body, 80) }}</p>
                                                <p class="news-card-meta">
                                                    {{ $post->user->name ?? 'Unknown' }} ·
                                                    {{ $post->created_at->format('d M Y') }}
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </article>
        </div>
        @if (isset($posts) && count($posts) > 0)
            <div class="section-gap">
                <p class="section-label">More articles</p>
                <div class="news-grid">
                    @foreach ($posts->skip(1) as $post)
                        <a href="{{ url('/news/' . $post->slug)}}" class="post-link">
                            <div class="news-card">
                                <div class="news-card-thumb">
                                    @if ($post->image)
                                        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}">
                                    @else
                                        <span class="material-symbols-outlined placeholder-icon">article</span>
                                    @endif
                                </div>
                                <div class="news-card-body">
                                    <p class="news-card-tag">Article</p>
                                    <p class="news-card-title">{{ $post->title }}</p>
                                    <p class="news-card-excerpt">{{ Str::limit($post->body, 80) }}</p>
                                    <p class="news-card-meta">
                                        {{ $post->user->name ?? 'Unknown' }} ·
                                        {{ $post->created_at->format('d M Y') }}
                                    </p>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        @endif


    </body>

    </html>

@endsection
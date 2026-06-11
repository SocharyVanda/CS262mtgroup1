@extends('layout')
@section('title', 'STEM Cambodia - Home')
@section('content')

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Introduction to mathematics</title>
        <link rel="stylesheet" href="{{ asset('css/pillar.css') }}">
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


    </body>

    </html>

@endsection
@extends('layout')
@section('title', 'Cell Biology: The Building Blocks of Life - STEM Cambodia')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/pillar.css') }}">

    <div class="page-wrapper">
        <article class="article">

            {{-- Tags --}}
            <div class="tags">
                <span class="tag tag-science">Science</span>
                <span class="tag tag-beginner">Beginner</span>
                <span class="read-time">7 min read</span>
            </div>

            {{-- Title --}}
            <h1>Cell Biology: The Building Blocks of Life</h1>

            {{-- Meta --}}
            <div class="meta">
                <span>By <span class="author">Admin</span> &nbsp;·&nbsp; June 2025</span>
                <span class="bookmark-icon">🔖</span>
            </div>

            {{-- Intro paragraph --}}
            <p>
                The cell is the fundamental unit of life. Every living organism — from the simplest bacterium
                to a complex human — is made of cells. Understanding cells is the foundation of all biology.
            </p>

            {{-- Tip box --}}
            <div class="tip-box">
                <span class="tip-icon">🔬</span>
                The average human body contains approximately 37 trillion cells, each performing specialised
                functions to keep you alive.
            </div>

            {{-- Key Concepts --}}
            <h2>Key Concepts</h2>

            <p>There are two primary types of cells:</p>

            <ul>
                <li><strong>Prokaryotic cells</strong> — simple cells without a nucleus (bacteria, archaea)</li>
                <li><strong>Eukaryotic cells</strong> — complex cells with a membrane-bound nucleus (plants, animals, fungi)
                </li>
            </ul>

            {{-- How It Works --}}
            <h2>How It Works</h2>

            <p>Every cell contains organelles — specialised structures that carry out specific functions:</p>

            <ul>
                <li><strong>Nucleus</strong> — contains DNA and controls cell activity</li>
                <li><strong>Mitochondria</strong> — produces energy (ATP) through cellular respiration</li>
                <li><strong>Ribosome</strong> — synthesises proteins</li>
                <li><strong>Cell membrane</strong> — controls what enters and exits the cell</li>
            </ul>

            {{-- Applications --}}
            <h2>Applications</h2>

            <p>
                Cell biology underpins modern medicine. Understanding how cells divide (mitosis and meiosis),
                communicate, and die (apoptosis) is essential for understanding cancer, genetic diseases,
                and developing new treatments.
            </p>

            {{-- Summary --}}
            <h2>Summary</h2>

            <p>
                Cells are not just building blocks — they are living machines. Every process in your body,
                from thinking to digesting food, comes down to what's happening inside individual cells.
            </p>
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

@endsection
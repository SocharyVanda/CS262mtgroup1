@extends('layout')
@section('title', 'Mathematics - STEM Cambodia')
@section('content')
<link rel="stylesheet" href="{{ asset('css/pillar.css') }}">

{{-- HERO --}}
<div class="pillar-hero">
    <div class="pillar-hero-inner">
        <div class="pillar-hero-text">
            <span class="pillar-tag">Mathematics</span>
            <h1>What is <span class="accent">Mathematics?</span></h1>
            <p class="pillar-lead">
                The study of numbers, patterns, and shapes to make sense of the world — laying the foundation for every STEM discipline and providing tools to model and analyse complex systems.
            </p>
        </div>
        <div class="pillar-hero-img">
            <img src="https://images.unsplash.com/photo-1635070041078-e363dbe005cb?w=800&q=80" alt="Mathematics">
        </div>
    </div>
</div>

{{-- CONTENT --}}
<div class="pillar-content">

    <div class="content-section">
        <h2>Why is Mathematics Important?</h2>
        <p>
            Mathematics is the foundational language of STEM. It provides the logical structure, precision, and analytical tools necessary to understand natural phenomena, build technological systems, and solve complex real-world problems across every industry.
        </p>
    </div>

    <div class="content-section">
        <h2>Career in Mathematics</h2>
        <p>
            As a mathematics professional, you would use mathematical principles and computational models to make predictions, solve problems, and model new innovations. Many sectors — including finance, business, and education — rely on mathematicians to ensure new innovations are sustainable and sound.
        </p>
        <div class="career-grid">
            <div class="career-pill">Statistician</div>
            <div class="career-pill">Actuary</div>
            <div class="career-pill">Financial Analyst</div>
            <div class="career-pill">Data Scientist</div>
            <div class="career-pill">Biostatistician</div>
            <div class="career-pill">Operations Researcher</div>
        </div>
        <div class="tip-box">
            Common entry-level education: Bachelor's degree in mathematics, statistics, or a related field. Certain careers may require advanced degrees with specialization in the intended area.
        </div>
    </div>

</div>

{{-- ARTICLES --}}
<div class="articles-section">
    <div class="articles-inner">
        @if (isset($posts) && count($posts) > 0)
            <span class="section-label">More articles</span>
            <div class="news-grid">
                @foreach ($posts as $post)
                    <a href="{{ url('/news/' . $post->slug) }}" class="news-card">
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
                    </a>
                @endforeach
            </div>
        @else
            <div class="empty-posts">
                <p>No articles yet.</p>
            </div>
        @endif
    </div>
</div>

@endsection
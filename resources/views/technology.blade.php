@extends('layout')
@section('title', 'Technology - STEM Cambodia')
@section('content')
<link rel="stylesheet" href="{{ asset('css/pillar.css') }}">

{{-- HERO --}}
<div class="pillar-hero">
    <div class="pillar-hero-inner">
        <div class="pillar-hero-text">
            <span class="pillar-tag">Technology</span>
            <h1>What is <span class="accent">Technology?</span></h1>
            <p class="pillar-lead">
                The practical application of scientific knowledge — spanning software development, data science, and information technology — to improve the quality of life and drive innovation.
            </p>
        </div>
        <div class="pillar-hero-img">
            <img src="https://images.unsplash.com/photo-1518770660439-4636190af475?w=800&q=80" alt="Technology">
        </div>
    </div>
</div>

{{-- CONTENT --}}
<div class="pillar-content">

    <div class="content-section">
        <h2>Why is Technology Important?</h2>
        <p>
            Technology is the backbone of modern society, driving progress by increasing efficiency, connecting people globally, and solving complex problems. It shapes every aspect of daily life, from how we work and communicate to how we access healthcare and education.
        </p>
    </div>

    <div class="content-section">
        <h2>Career in Technology</h2>
        <p>
            Technology careers are centered around designing, innovating, and improving technologies. You might develop new software to solve an existing problem, streamline processes, improve business productivity, or reduce inequities across different populations.
        </p>
        <div class="career-grid">
            <div class="career-pill">Software Engineer</div>
            <div class="career-pill">Data Scientist</div>
            <div class="career-pill">Web Developer</div>
            <div class="career-pill">Technical Support</div>
            <div class="career-pill">Computer Programmer</div>
            <div class="career-pill">Cybersecurity Specialist</div>
        </div>
        <div class="tip-box">
            Common entry-level education: Bachelor's degree in computer science, information technology, or a related field. An associate's degree or relevant experience may sometimes substitute. Certain careers may require advanced degrees.
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
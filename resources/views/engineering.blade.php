@extends('layout')
@section('title', 'Engineering - STEM Cambodia')
@section('content')
<link rel="stylesheet" href="{{ asset('css/pillar.css') }}">

{{-- HERO --}}
<div class="pillar-hero">
    <div class="pillar-hero-inner">
        <div class="pillar-hero-text">
            <span class="pillar-tag">Engineering</span>
            <h1>What is <span class="accent">Engineering?</span></h1>
            <p class="pillar-lead">
                Designing, building, and maintaining systems and structures based on scientific principles — from biomedical devices to civil infrastructure and beyond.
            </p>
        </div>
        <div class="pillar-hero-img">
            <img src="https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?w=800&q=80" alt="Engineering">
        </div>
    </div>
</div>

{{-- CONTENT --}}
<div class="pillar-content">

    <div class="content-section">
        <h2>Why is Engineering Important?</h2>
        <p>
            Engineering is the catalyst that connects STEM disciplines. It translates abstract theories into tangible solutions — without it, science and mathematics would remain purely theoretical. It provides the hands-on, problem-solving framework that drives technological innovation and prepares students for real-world challenges.
        </p>
    </div>

    <div class="content-section">
        <h2>Career in Engineering</h2>
        <p>
            Engineering careers involve designing, building, and maintaining structures, machines, systems, and technologies across many industries. Engineers play a large role in ensuring new productions are safe, efficient, sustainable, and environmentally friendly.
        </p>
        <div class="career-grid">
            <div class="career-pill">Biomedical Engineer</div>
            <div class="career-pill">Electrical Engineer</div>
            <div class="career-pill">Chemical Engineer</div>
            <div class="career-pill">Aerospace Engineer</div>
            <div class="career-pill">Software Engineer</div>
            <div class="career-pill">Mechanical Engineer</div>
        </div>
        <div class="tip-box">
            Common entry-level education: Bachelor's degree in engineering or a related field. Certain careers may require advanced degrees with specialization in the intended area or professional licensure.
        </div>
    </div>

    <div class="content-section">
        <h2>Engineering Topics</h2>
        <div class="career-grid">
            <div class="career-pill">Mechanical Engineering</div>
            <div class="career-pill">Civil Engineering</div>
            <div class="career-pill">Electrical &amp; Electronics</div>
            <div class="career-pill">Chemical Engineering</div>
            <div class="career-pill">Computer &amp; Software</div>
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
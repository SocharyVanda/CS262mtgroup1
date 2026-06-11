@extends('layout')
@section('title', 'Science - STEM Cambodia')
@section('content')
<link rel="stylesheet" href="{{ asset('css/pillar.css') }}">

{{-- HERO --}}
<div class="pillar-hero">
    <div class="pillar-hero-inner">
        <div class="pillar-hero-text">
            <span class="pillar-tag">Science</span>
            <h1>What is <span class="accent">Science?</span></h1>
            <p class="pillar-lead">
                The systematic study of the natural world through observation and experimentation — spanning biology, chemistry, physics, and environmental science.
            </p>
        </div>
        <div class="pillar-hero-img">
            <img src="https://images.unsplash.com/photo-1582719471384-894fbb16e074?w=800&q=80" alt="Science laboratory">
        </div>
    </div>
</div>

{{-- CONTENT --}}
<div class="pillar-content">

    <div class="content-section">
        <h2>Why is Science Important?</h2>
        <p>
            Science is a fundamental component of STEM education, playing a crucial role in developing critical thinking, problem-solving skills, and innovation necessary for addressing real-world challenges. It underpins every other STEM discipline and drives progress in medicine, technology, and our understanding of the universe.
        </p>
    </div>

    <div class="content-section">
        <h2>Career in Science</h2>
        <p>
            Science careers often involve research, data analysis, hypothesis testing, and study design. You may work in a laboratory, university, government agency, or private corporation — seeking gaps in knowledge and testing hypotheses to fill them.
        </p>
        <div class="career-grid">
            <div class="career-pill">Biochemist</div>
            <div class="career-pill">Microbiologist</div>
            <div class="career-pill">Epidemiologist</div>
            <div class="career-pill">Zoologist</div>
            <div class="career-pill">Environmental Scientist</div>
            <div class="career-pill">Organic Chemist</div>
        </div>
        <div class="tip-box">
            Common entry-level education: Bachelor's degree in biology, chemistry, physics, or a related field. Certain careers may require advanced degrees with specialization in the intended area.
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
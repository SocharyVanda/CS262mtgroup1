@extends('layout')
@section('title', 'Posts')
@section('content')
<link rel="stylesheet" href="{{ asset('css/post.css') }}">

    <div class="page-wrap">

        <!-- PAGE HEADER -->
        <div class="page-header">
            <p class="page-eyebrow">Latest updates</p>
            <h1 class="page-title">Post Articles</h1>
        </div>

        <!-- FILTER BAR -->
        @php $selectedCategory = $category ?? null; @endphp
        <div class="filter-bar">
            <a class="filter-btn {{ !$selectedCategory ? 'active' : '' }}" href="{{ url('/posts') }}">All</a>
            <a class="filter-btn {{ $selectedCategory === 'Science' ? 'active' : '' }}" href="{{ url('/posts?category=Science') }}">Science</a>
            <a class="filter-btn {{ $selectedCategory === 'Technology' ? 'active' : '' }}" href="{{ url('/posts?category=Technology') }}">Technology</a>
            <a class="filter-btn {{ $selectedCategory === 'Engineering' ? 'active' : '' }}" href="{{ url('/posts?category=Engineering') }}">Engineering</a>
            <a class="filter-btn {{ $selectedCategory === 'Mathematics' ? 'active' : '' }}" href="{{ url('/posts?category=Mathematics') }}">Mathematics</a>
        </div>

        @if (isset($posts) && count($posts) > 0)

            {{-- ── FEATURED POST (first post) ── --}}
            @php $featured = $posts->first(); @endphp

            <div class="featured-article">
                <div class="featured-img">
                    @if ($featured->image)
                        <img src="{{ asset('storage/' . $featured->image) }}" alt="{{ $featured->title }}">
                    @else
                        <span class="material-symbols-outlined placeholder-icon">article</span>
                    @endif
                </div>
                <div class="featured-body">
                    <p class="article-tag">Featured</p>
                    <a href="{{ url('/news/' .$featured->slug) }}" class="article-title">{{ $featured->title }}</a>
                    <p class="article-excerpt">{{ Str::limit($featured->body, 160) }}</p>
                    <div class="article-meta">
                        <span>{{ $featured->user->name ?? 'Unknown' }}</span>
                        <span>{{ $featured->created_at->format('d M Y') }}</span>
                    </div>
                    <a href="#" class="read-more">Read article →</a>
                </div>
            </div>

            {{-- ── REMAINING POSTS GRID ── --}}
            @if ($posts->count() > 1)
                <div class="section-gap">
                    <p class="section-label">More articles</p>
                    <div class="news-grid">
                        @foreach ($posts->skip(1) as $post)
                        <a href="{{ url('/news/' .$post->slug) }}">
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
        @else
            {{-- ── EMPTY STATE ── --}}
            <div class="empty-posts">
                <span class="material-symbols-outlined">article</span>
                <p>No posts yet. Be the first to publish one.</p>
            </div>
        @endif

        <!-- NEWSLETTER -->
        <div class="newsletter-bar">
            <div class="newsletter-text">
                <h3>Stay up to date</h3>
                <p>Get the latest STEM articles delivered to your inbox.</p>
            </div>
            <div class="newsletter-form">
                <input class="newsletter-input" type="email" placeholder="your@email.com">
                <button class="newsletter-btn">Subscribe</button>
            </div>
        </div>

    </div>

@endsection

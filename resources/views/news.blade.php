@extends('layout')
@section('title', 'STEM Cambodia - News')
@section('content')

<link rel="stylesheet" href="{{ asset('css/news.css') }}">

<div class="page-wrap">

    <!-- PAGE HEADER -->
    <div class="page-header">
        <p class="page-eyebrow">Latest updates</p>
        <h1 class="page-title">News &amp; Articles</h1>
    </div>

    <!-- FILTER BAR -->
    {{-- <div class="filter-bar">
        <a class="filter-btn active" href="#">All</a>
        <a class="filter-btn" href="#">Science</a>
        <a class="filter-btn" href="#">Technology</a>
        <a class="filter-btn" href="#">Engineering</a>
        <a class="filter-btn" href="#">Mathematics</a>
        <a class="filter-btn" href="#">Environment</a>
        <a class="filter-btn" href="#">Health</a>
    </div> --}}

    <!-- FEATURED ARTICLE -->
    <a class="featured-article" href="#">
        <div class="featured-body">
            <span class="article-tag">Featured · Science</span>
            <span class="article-title">Cambodia Launches First National STEM Curriculum for Secondary Schools</span>
            <p class="article-excerpt">The Ministry of Education, Youth and Sport unveiled a comprehensive STEM
                framework designed to integrate science, technology, engineering, and mathematics across all secondary
                schools by 2027, aiming to produce 50,000 STEM graduates annually.</p>
            <div class="article-meta">
                <span>Jun 2026</span>
                <span>·</span>
                <span>5 min read</span>
            </div>
            <span class="read-more">Read article →</span>
        </div>
        <div class="featured-img">
            <img src="https://stemcambodia.ngo/wp-content/uploads/2025/06/6150103721892233908.jpg"
                alt="Cambodia STEM Festival students"
                style="width:100%;height:100%;object-fit:cover;border-radius:inherit;">
        </div>
    </a>

    <!-- LATEST NEWS -->
    <div class="section-gap">
        <p class="section-label">Latest</p>
        <div class="news-grid">

            <a class="news-card" href="#">
                <div class="news-card-thumb thumb-tech">
                    <img src="https://stemcambodia.ngo/wp-content/uploads/2026/06/707276690_1405230471650614_3640902636218841858_n-1024x1024.jpg"
                        alt="Coding Bootcamp" style="width:100%;height:100%;object-fit:cover;">
                </div>
                <div class="news-card-body">
                    <span class="news-card-tag">Technology</span>
                    <p class="news-card-title">Phnom Penh Tech Hub Opens New Coding Bootcamp for Rural Youth</p>
                    <p class="news-card-meta">May 2026 · 3 min read</p>
                </div>
            </a>

            <a class="news-card" href="#">
                <div class="news-card-thumb thumb-math">
                    <img src="https://stemcambodia.ngo/wp-content/uploads/2026/06/707235737_1405230431650618_8614770210813328930_n-1024x1024.jpg"
                        alt="Math Olympiad" style="width:100%;height:100%;object-fit:cover;">
                </div>
                <div class="news-card-body">
                    <span class="news-card-tag">Mathematics</span>
                    <p class="news-card-title">Cambodian Students Win Silver at 2026 Asia-Pacific Math Olympiad</p>
                    <p class="news-card-meta">May 2026 · 2 min read</p>
                </div>
            </a>

            <a class="news-card" href="#">
                <div class="news-card-thumb thumb-env">
                    <img src="https://stemcambodia.ngo/wp-content/uploads/2026/06/707646851_1405230371650624_3445541354606307499_n-1024x1024.jpg"
                        alt="Environment Research" style="width:100%;height:100%;object-fit:cover;">
                </div>
                <div class="news-card-body">
                    <span class="news-card-tag">Environment</span>
                    <p class="news-card-title">RUPP Researchers Develop Low-Cost Water Filtration Using Local Materials
                    </p>
                    <p class="news-card-meta">Apr 2026 · 4 min read</p>
                </div>
            </a>

            <a class="news-card" href="#">
                <div class="news-card-thumb thumb-eng">
                    <img src="https://stemcambodia.ngo/wp-content/uploads/elementor/thumbs/6150103721892233916-r94j6yc9823pyanpsgi2if2wuafppogkfxwqcdiiio.jpg"
                        alt="Engineering Students" style="width:100%;height:100%;object-fit:cover;">
                </div>
                <div class="news-card-body">
                    <span class="news-card-tag">Engineering</span>
                    <p class="news-card-title">Solar-Powered Irrigation System Built by Kampong Cham Engineering
                        Students</p>
                    <p class="news-card-meta">Apr 2026 · 3 min read</p>
                </div>
            </a>

            <a class="news-card" href="#">
                <div class="news-card-thumb thumb-health">
                    <img src="https://stemcambodia.ngo/wp-content/uploads/elementor/thumbs/6150103721892233909-r94j3myr43kazth45iwg7r7decs3k4annj22e8figw.jpg"
                        alt="Health Science Research" style="width:100%;height:100%;object-fit:cover;">
                </div>
                <div class="news-card-body">
                    <span class="news-card-tag">Health Science</span>
                    <p class="news-card-title">IU Medical Faculty Publishes Dengue Fever Early Detection Research</p>
                    <p class="news-card-meta">Mar 2026 · 5 min read</p>
                </div>
            </a>

            <a class="news-card" href="#">
                <div class="news-card-thumb thumb-tech">
                    <img src="https://stemcambodia.ngo/wp-content/uploads/2025/06/STEM-Mark.png" alt="STEM AI Program"
                        style="width:100%;height:100%;object-fit:contain;padding:8px;">
                </div>
                <div class="news-card-body">
                    <span class="news-card-tag">Technology</span>
                    <p class="news-card-title">AI Literacy Program Reaches 12,000 Students Across 6 Provinces</p>
                    <p class="news-card-meta">Mar 2026 · 3 min read</p>
                </div>
            </a>

        </div>
    </div>

    <!-- OLDER ARTICLES -->
    <div class="section-gap">
        <p class="section-label">Earlier this year</p>
        <div class="news-grid">

            <a class="news-card" href="#">
                <div class="news-card-thumb thumb-science">
                    <img src="https://stemcambodia.ngo/wp-content/uploads/2025/06/ACSF-Logo-4.png"
                        alt="ASEAN Space Research" style="width:100%;height:100%;object-fit:contain;padding:8px;">
                </div>
                <div class="news-card-body">
                    <span class="news-card-tag">Science</span>
                    <p class="news-card-title">Cambodia Joins ASEAN Space Research Network as Observer Member</p>
                    <p class="news-card-meta">Feb 2026 · 4 min read</p>
                </div>
            </a>

            <a class="news-card" href="#">
                <div class="news-card-thumb thumb-eng">
                    <img src="https://stemcambodia.ngo/wp-content/uploads/2025/06/cropped-STEM-Mark.png"
                        alt="Bridge Competition" style="width:100%;height:100%;object-fit:contain;padding:8px;">
                </div>
                <div class="news-card-body">
                    <span class="news-card-tag">Engineering</span>
                    <p class="news-card-title">Bridge Design Competition Draws 200 University Teams Nationwide</p>
                    <p class="news-card-meta">Jan 2026 · 2 min read</p>
                </div>
            </a>

            <a class="news-card" href="#">
                <div class="news-card-thumb thumb-math">
                    <img src="https://stemcambodia.ngo/wp-content/uploads/2025/06/Untitled-design-3.png"
                        alt="Data Science Degree" style="width:100%;height:100%;object-fit:contain;padding:8px;">
                </div>
                <div class="news-card-body">
                    <span class="news-card-tag">Mathematics</span>
                    <p class="news-card-title">New Data Science Degree Launched at Norton University Phnom Penh</p>
                    <p class="news-card-meta">Jan 2026 · 3 min read</p>
                </div>
            </a>

        </div>
    </div>
    <br>

    <div>
        <h2 class="article-title">Published articles</h2>
        <br>
    </div>

    <p class="article-tag">Checkout the newly released articles</p>
    <br>

    {{-- Adding the newly post contents --}}
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
                <a href="#" class="article-title">{{ $featured->title }}</a>
                <p class="article-excerpt">{{ Str::limit($featured->body, 160) }}</p>
                <div class="article-meta">
                    <span>{{ $featured->user->name ?? 'Unknown' }}</span>
                    <span>{{ $featured->created_at->format('d M Y') }}</span>
                </div>
                <a href="{{ url('/news/' . $featured->slug)}}" class="read-more">Read article →</a>
            </div>
        </div>

        {{-- ── REMAINING POSTS GRID ── --}}
        @if ($posts->count() > 1)
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
    @else
        {{-- ── EMPTY STATE ── --}}
        <div class="empty-posts">
            <span class="material-symbols-outlined">article</span>
            <p>No posts yet. Be the first to publish one.</p>
        </div>
    @endif




    @endSection
@extends('layout')
@section('title', $post->title)
@section('content')
<link rel="stylesheet" href="{{ asset('css/pillar.css') }}">

<div class="page-wrapper">
    <article class="article">

        {{-- Tags + read time --}}
        <div class="tags">
            <span class="tag">{{ ucfirst($post->status) }}</span>
            <span class="tag" style="background:#f0fdf4;color:#15803d;border-color:#bbf7d0">
                {{ $post->user->name ?? 'Author' }}
            </span>
            <span class="read-time">
                {{ $post->published_at?->diffForHumans() ?? $post->created_at->diffForHumans() }}
            </span>
        </div>

        {{-- Title --}}
        <h1>{{ $post->title }}</h1>

        {{-- Meta --}}
        <div class="meta">
            <span class="author">By {{ $post->user->name ?? 'Unknown' }}</span>
            <span>{{ $post->created_at?->format('d M Y') ?? '' }}</span>
            <span class="meta-chip">{{ $post->views }} views</span>
        </div>

        {{-- Post image --}}
        @if ($post->image)
            <div class="post-image">
                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}">
            </div>
        @endif

        {{-- Body --}}
        <div class="post-content">
            <p>{!! nl2br(e($post->body)) !!}</p>

            <div class="tip-box">
                Read this article carefully to understand the full topic and see how it is styled like the Mathematics page.
            </div>

            <h2>Key takeaways</h2>
            <ul>
                <li>Article title: {{ $post->title }}</li>
                <li>Written by: {{ $post->user->name ?? 'Unknown' }}</li>
                <li>Published: {{ $post->created_at?->format('d M Y') ?? '' }}</li>
            </ul>
        </div>

        {{-- Back link --}}
        @php
            $categoryRoutes = [
                'science'     => '/science',
                'technology'  => '/technology',
                'engineering' => '/engineering',
                'mathematics' => '/mathematics',
            ];
            $backRoute = $categoryRoutes[strtolower($post->category)] ?? '/display';
        @endphp
        <a href="{{ url($backRoute) }}" class="back-link">
            ← Back to {{ ucfirst($post->category ?? 'posts') }}
        </a>

    </article>
</div>

@endsection
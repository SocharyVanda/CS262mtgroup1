@extends('layout')
@section('title', $post->title)
@section('content')
<link rel="stylesheet" href="{{ asset('css/pillar.css') }}">
    

    <div class="page-wrapper">
        <article class="article">
            <div class="tags">
                <span class="tag tag-tech">{{ ucfirst($post->status) }}</span>
                <span class="tag tag-beginner">{{ $post->user->name ?? 'Author' }}</span>
                <span class="read-time">{{ $post->published_at?->diffForHumans() ?? $post->created_at->diffForHumans() }}</span>
            </div>

            <h1>{{ $post->title }}</h1>

            <div class="meta">
                <span class="author">By {{ $post->user->name ?? 'Unknown' }}</span>
                <span>{{ $post->created_at?->format('d M Y') ?? '' }}</span>
                <span>{{ $post->views }} views</span>
            </div>

            @if ($post->image)
                <div class="post-image">
                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}">
                </div>
            @endif

            <div class="post-content">
                <p>{!! nl2br(e($post->body)) !!}</p>

                <div class="tip-box">
                    <span class="tip-icon">💡</span>
                    <span>Read this article carefully to understand the full topic and see how it is styled like the Mathematics page.</span>
                </div>

                <h2>Key takeaways</h2>
                <ul>
                    <li>Article title: {{ $post->title }}</li>
                    <li>Written by: {{ $post->user->name ?? 'Unknown' }}</li>
                    <li>Published: {{ $post->created_at?->format('d M Y') ?? '' }}</li>
                </ul>
            </div>

            <a href="{{ url('/display') }}" class="back-link">← Back to all posts</a>
        </article>
    </div>

@endsection

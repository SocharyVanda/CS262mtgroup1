<<<<<<< HEAD
﻿@extends('layout')
=======
﻿{{-- @extends('layout')
>>>>>>> cee8697e9ba19fb2b747be2ef3a1b4e160b17010
@section('title', 'All Posts')
@section('content')

    <style>
        .page-wrap {
            max-width: 1120px;
            margin: 0 auto;
            padding: 4rem 1.5rem 5rem;
        }

        .page-header {
            margin-bottom: 2.5rem;
        }

        .page-eyebrow {
            font-family: 'DM Mono', monospace;
            font-size: 11px;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: var(--text-3);
            margin-bottom: 0.5rem;
        }

        .page-title {
            font-size: 2rem;
            font-weight: 700;
            color: var(--text);
            margin-bottom: 0.5rem;
        }

        .page-description {
            color: var(--text-2);
            max-width: 720px;
            line-height: 1.7;
        }

        .posts-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 1.25rem;
        }

        @media (max-width: 900px) {
            .posts-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (max-width: 620px) {
            .posts-grid {
                grid-template-columns: 1fr;
            }
        }

        .post-card {
            border: 1px solid var(--border);
            border-radius: 16px;
            overflow: hidden;
            background: var(--bg-soft);
            display: flex;
            flex-direction: column;
            min-height: 100%;
            transition: transform .18s ease, box-shadow .18s ease;
            text-decoration: none;
            color: inherit;
        }

        .post-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 18px 40px rgba(13, 28, 66, 0.08);
        }

        .post-link {
            display: block;
            color: inherit;
            text-decoration: none;
        }

        .post-link:hover {
            text-decoration: none;
        }

        .post-thumb {
            min-height: 180px;
            overflow: hidden;
            background: linear-gradient(135deg, #eff6ff, #dbeafe);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .post-thumb img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .post-body {
            padding: 1.3rem;
            display: flex;
            flex-direction: column;
            gap: 0.85rem;
            flex: 1;
        }

        .post-meta {
            font-family: 'DM Mono', monospace;
            font-size: 11px;
            color: var(--text-3);
        }

        .post-title {
            font-size: 1.15rem;
            font-weight: 600;
            color: var(--text);
            line-height: 1.4;
        }

        .post-excerpt {
            color: var(--text-2);
            line-height: 1.7;
            flex: 1;
        }

        .empty-state {
            text-align: center;
            color: var(--text-3);
            padding: 4rem 1rem;
        }

        .empty-state .material-symbols-outlined {
            font-size: 54px;
            margin-bottom: 1rem;
            display: block;
            color: var(--border);
        }
    </style>

    <div class="page-wrap">
        <div class="page-header">
            <p class="page-eyebrow">Database posts</p>
            <h1 class="page-title">All Posts</h1>
            <p class="page-description">This page loads every post from the database and displays it using the shared layout.</p>
        </div>

        @if ($posts->isNotEmpty())
            <div class="posts-grid">
                @foreach ($posts as $post)
                    <a href="{{ url('/display/' . $post->slug) }}" class="post-link">
                        <article class="post-card">
                            <div class="post-thumb">
                                @if ($post->image)
                                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}">
                                @else
                                    <span class="material-symbols-outlined">article</span>
                                @endif
                            </div>
                            <div class="post-body">
                                <p class="post-meta">{{ $post->user->name ?? 'Unknown' }} · {{ $post->created_at?->format('d M Y') ?? '' }}</p>
                                <h2 class="post-title">{{ $post->title }}</h2>
                                <p class="post-excerpt">{{ \Illuminate\Support\Str::limit($post->body, 130) }}</p>
                            </div>
                        </article>
                    </a>
                @endforeach
            </div>
        @else
            <div class="empty-state">
                <span class="material-symbols-outlined">article</span>
                <p>No posts found in the database yet.</p>
            </div>
        @endif
    </div>

<<<<<<< HEAD
@endsection
=======
@endsection --}}
>>>>>>> cee8697e9ba19fb2b747be2ef3a1b4e160b17010

@extends('layout')
@section('title', $post->title)
@section('content')
<<<<<<< HEAD

    <style>
        .page-wrapper {
            display: flex;
            justify-content: center;
            padding: 80px 20px 60px;
            background: var(--bg);
        }

        .article {
            width: 100%;
            max-width: 760px;
            padding: 0 12px;
        }

        .tags {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 10px;
            margin-bottom: 24px;
        }

        .tag {
            font-family: Arial, sans-serif;
            font-size: 12px;
            padding: 6px 14px;
            border-radius: 999px;
            font-weight: 600;
        }

        .tag-tech {
            background-color: #e8f0e9;
            color: #2d6a4f;
            border: 1px solid #b7d5be;
        }

        .tag-beginner {
            background-color: #f3eefc;
            color: #5b21b6;
            border: 1px solid #d6c5f9;
        }

        .read-time {
            font-family: Arial, sans-serif;
            font-size: 13px;
            color: #6b7280;
        }

        h1 {
            font-size: clamp(2.2rem, 2.1vw, 3rem);
            font-weight: 800;
            line-height: 1.1;
            margin-bottom: 20px;
            color: var(--text);
        }

        .meta {
            display: flex;
            flex-wrap: wrap;
            gap: 14px;
            font-family: Arial, sans-serif;
            font-size: 14px;
            color: #4b5563;
            margin-bottom: 26px;
            border-bottom: 1px solid #e5e7eb;
            padding-bottom: 18px;
        }

        .meta .author {
            font-weight: 700;
            color: #111827;
        }

        .post-image {
            width: 100%;
            border-radius: 18px;
            overflow: hidden;
            margin-bottom: 26px;
            border: 1px solid #e5e7eb;
            background: #f9fafb;
        }

        .post-image img {
            width: 100%;
            height: auto;
            display: block;
            object-fit: cover;
        }

        .post-content p {
            font-size: 17px;
            line-height: 1.85;
            color: #252f3f;
            margin-bottom: 1.6rem;
        }

        .post-content p strong {
            color: #111827;
        }

        .tip-box {
            background-color: #f0faf2;
            border-left: 4px solid #22c55e;
            border-radius: 8px;
            padding: 18px 22px;
            margin-bottom: 32px;
            color: #134e4a;
        }

        .tip-box .tip-icon {
            margin-right: 8px;
        }

        .post-content h2 {
            font-size: 1.7rem;
            font-weight: 700;
            margin-top: 40px;
            margin-bottom: 18px;
            color: #111827;
        }

        .post-content ul {
            list-style: none;
            padding: 0;
            margin-bottom: 28px;
        }

        .post-content ul li {
            font-size: 17px;
            padding: 10px 0;
            color: #334155;
            display: flex;
            gap: 12px;
        }

        .post-content ul li::before {
            content: "•";
            color: #2563eb;
            margin-top: 2px;
            font-size: 18px;
        }

        .code-block {
            background-color: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            padding: 18px 20px;
            margin-bottom: 32px;
            font-family: 'Courier New', Courier, monospace;
            font-size: 14px;
            line-height: 1.7;
            color: #334155;
            overflow-x: auto;
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-top: 34px;
            color: var(--blue);
            text-decoration: none;
            font-weight: 600;
        }

        .back-link:hover {
            text-decoration: underline;
        }
    </style>
=======
<link rel="stylesheet" href="{{ asset('css/pillar.css') }}">
    
>>>>>>> cee8697e9ba19fb2b747be2ef3a1b4e160b17010

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

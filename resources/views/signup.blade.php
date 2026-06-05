@extends('layout')
@section('title', 'STEM Cambodia - Edit Post')
@section('content')

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Geist+Mono:wght@400;500&family=Instrument+Sans:wght@400;500;600&display=swap');

        .edit-root {
            min-height: calc(100vh - var(--nav-h));
            background: #ffffff;
            color: #0f1117;
            font-family: 'Instrument Sans', sans-serif;
            display: flex;
            flex-direction: column;
            position: relative;
            overflow: hidden;
        }

        .grid-bg {
            position: absolute;
            inset: 0;
            background-image:
                linear-gradient(rgba(0, 0, 0, 0.04) 1px, transparent 1px),
                linear-gradient(90deg, rgba(0, 0, 0, 0.04) 1px, transparent 1px);
            background-size: 48px 48px;
            pointer-events: none;
        }

        .radial-glow {
            position: absolute;
            top: -160px;
            left: 50%;
            transform: translateX(-50%);
            width: 700px;
            height: 400px;
            background: radial-gradient(ellipse at 50% 0%, rgba(59, 130, 246, 0.1) 0%, transparent 70%);
            pointer-events: none;
        }

        .page-body {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 4rem 1.5rem;
            position: relative;
            z-index: 5;
        }

        .edit-container {
            width: 100%;
            max-width: 600px;
        }

        .edit-eyebrow {
            text-align: center;
            margin-bottom: 2rem;
        }

        .eyebrow-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: rgba(59, 130, 246, 0.08);
            border: 1px solid rgba(59, 130, 246, 0.2);
            border-radius: 100px;
            padding: 4px 14px;
            font-family: 'Geist Mono', monospace;
            font-size: 11px;
            color: #2563eb;
            letter-spacing: 0.06em;
            text-transform: uppercase;
            margin-bottom: 1rem;
        }

        .eyebrow-badge::before {
            content: '';
            width: 5px;
            height: 5px;
            border-radius: 50%;
            background: #3b82f6;
        }

        .edit-headline {
            font-size: 24px;
            font-weight: 600;
            color: #0f1117;
            letter-spacing: -0.02em;
            line-height: 1.3;
            margin-bottom: 4px;
        }

        .edit-headline span {
            color: #2563eb;
        }

        .edit-subline {
            font-size: 13px;
            color: #6b7280;
        }

        .edit-card {
            background: #ffffff;
            border: 1px solid #e5e7eb;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 4px 24px rgba(0, 0, 0, 0.06), 0 1px 4px rgba(0, 0, 0, 0.04);
            padding: 2.25rem 2.5rem;
        }

        .panel-label {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 1.5rem;
        }

        .panel-label-text {
            font-family: 'Geist Mono', monospace;
            font-size: 10px;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: #9ca3af;
            white-space: nowrap;
        }

        .panel-label-line {
            flex: 1;
            height: 1px;
            background: #e5e7eb;
        }

        .alert-stem {
            background: #fef2f2;
            border: 1px solid #fecaca;
            border-radius: 8px;
            padding: 10px 14px;
            font-size: 12px;
            color: #b91c1c;
            margin-bottom: 14px;
        }

        .alert-stem ul {
            margin: 0;
            padding-left: 1rem;
        }

        .alert-success {
            background: #f0fdf4;
            border: 1px solid #bbf7d0;
            border-radius: 8px;
            padding: 10px 14px;
            font-size: 12px;
            color: #15803d;
            margin-bottom: 14px;
        }

        .form-stack {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .input-group {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .input-label {
            font-size: 12px;
            font-weight: 500;
            color: #374151;
            letter-spacing: 0.01em;
        }

        .stem-input {
            width: 100%;
            background: #f9fafb;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            padding: 10px 13px;
            font-size: 13px;
            color: #0f1117;
            font-family: 'Instrument Sans', sans-serif;
            outline: none;
            transition: border-color 0.15s, box-shadow 0.15s, background 0.15s;
            box-sizing: border-box;
            resize: vertical;
        }

        .stem-input::placeholder {
            color: #d1d5db;
        }

        .stem-input:focus {
            background: #fff;
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }

        .error-msg {
            font-size: 11px;
            color: #b91c1c;
            margin-top: 2px;
        }

        .edit-actions {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-top: 4px;
        }

        .btn-stem {
            flex: 1;
            padding: 10px 16px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 500;
            cursor: pointer;
            border: none;
            transition: opacity 0.15s, transform 0.1s;
            font-family: 'Instrument Sans', sans-serif;
            letter-spacing: 0.01em;
            background: #2563eb;
            color: #fff;
        }

        .btn-stem:hover {
            opacity: 0.88;
        }

        .btn-stem:active {
            transform: scale(0.99);
        }

        .btn-cancel {
            padding: 10px 16px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 500;
            cursor: pointer;
            border: 1px solid #e5e7eb;
            background: #fff;
            color: #374151;
            font-family: 'Instrument Sans', sans-serif;
            text-decoration: none;
            transition: background 0.15s, border-color 0.15s, transform 0.1s;
            display: inline-block;
            letter-spacing: 0.01em;
        }

        .btn-cancel:hover {
            background: #f9fafb;
            border-color: #d1d5db;
        }

        .btn-cancel:active {
            transform: scale(0.99);
        }

        @media (max-width: 600px) {
            .edit-card {
                padding: 1.75rem 1.5rem;
            }

            .edit-actions {
                flex-direction: column-reverse;
            }

            .btn-stem,
            .btn-cancel {
                width: 100%;
                text-align: center;
            }
        }
    </style>

    <div class="edit-root">
        <div class="grid-bg"></div>
        <div class="radial-glow"></div>

        <div class="page-body">
            <div class="edit-container">

                <div class="edit-eyebrow">
                    <div class="eyebrow-badge">Posts</div>
                    <div class="edit-headline">Edit your <span>post</span></div>
                    <div class="edit-subline">Update your title or content below, then save.</div>
                </div>

                @auth
                    <div class="edit-card">

                        <div class="panel-label">
                            <span class="panel-label-text">Editing</span>
                            <div class="panel-label-line"></div>
                        </div>

                        @if (session('success'))
                            <div class="alert-success">{{ session('success') }}</div>
                        @endif

                        @if ($errors->any())
                            <div class="alert-stem">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="/edit-post/{{ $post->id }}" method="POST" class="form-stack">
                            @csrf
                            @method('PUT')

                            <div class="input-group">
                                <label class="input-label" for="edit-title">Title</label>
                                <input id="edit-title" type="text" name="title" class="stem-input"
                                    placeholder="Post title…" value="{{ old('title', $post->title) }}">
                                @error('title')
                                    <p class="error-msg">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="input-group">
                                <label class="input-label" for="edit-body">Content</label>
                                <textarea id="edit-body" name="body" class="stem-input" rows="9" placeholder="Write something…">{{ old('body', $post->body) }}</textarea>
                                @error('body')
                                    <p class="error-msg">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="edit-actions">
                                <a href="{{ url('') }}" class="btn-cancel">Cancel</a>
                                <button type="submit" class="btn-stem">Save changes →</button>
                            </div>
                        </form>

                    </div>
                @endauth

            </div>
        </div>
    </div>

@endsection

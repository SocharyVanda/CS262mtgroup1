@extends('layouts.layout')
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
            max-width: 540px;
        }

        .edit-eyebrow {
            text-align: center;
            margin-bottom: 2.5rem;
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

        .auth-headline {
            font-size: 26px;
            font-weight: 600;
            color: #0f1117;
            letter-spacing: -0.02em;
            line-height: 1.3;
            margin-bottom: 6px;
        }

        .auth-headline span {
            color: #2563eb;
        }

        .auth-subline {
            font-size: 14px;
            color: #6b7280;
        }

        .edit-panel {
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
            margin-bottom: 1.25rem;
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

        .panel-title {
            font-size: 17px;
            font-weight: 600;
            color: #0f1117;
            margin-bottom: 4px;
            letter-spacing: -0.01em;
        }

        .panel-sub {
            font-size: 13px;
            color: #6b7280;
            margin-bottom: 1.5rem;
            line-height: 1.55;
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

        .form-stack {
            display: flex;
            flex-direction: column;
            gap: 10px;
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
            font-size: 12px;
            color: #b91c1c;
            margin-top: 4px;
        }

        .edit-actions {
            display: flex;
            gap: 8px;
            margin-top: 6px;
        }

        .btn-stem {
            flex: 1;
            padding: 10px 16px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 500;
            cursor: pointer;
            border: none;
            font-family: 'Instrument Sans', sans-serif;
            letter-spacing: 0.01em;
            background: #2563eb;
            color: #fff;
            transition: opacity 0.15s, transform 0.1s;
        }

        .btn-stem:hover {
            opacity: 0.88;
        }

        .btn-stem:active {
            transform: scale(0.99);
        }

        .btn-cancel {
            flex: 1;
            padding: 10px 16px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 500;
            cursor: pointer;
            border: 1px solid #e5e7eb;
            font-family: 'Instrument Sans', sans-serif;
            letter-spacing: 0.01em;
            background: #fff;
            color: #374151;
            text-decoration: none;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background 0.15s, border-color 0.15s, transform 0.1s;
        }

        .btn-cancel:hover {
            background: #f9fafb;
            border-color: #d1d5db;
        }

        .btn-cancel:active {
            transform: scale(0.99);
        }

        @media (max-width: 600px) {
            .edit-panel {
                padding: 1.75rem 1.5rem;
            }

            .edit-actions {
                flex-direction: column;
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
                    <div class="auth-headline">Edit your <span>post</span></div>
                    <div class="auth-subline">Make changes below and save when you're ready.</div>
                </div>

                @auth
                    <div class="edit-panel">

                        <div class="panel-label">
                            <span class="panel-label-text">Editing</span>
                            <div class="panel-label-line"></div>
                        </div>
                        <div class="panel-title">Update post</div>
                        <div class="panel-sub">Changes will be published immediately after saving.</div>

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

                        <form action="/edit-post/{{ $post->id }}" method="POST" enctype="multipart/form-data"
                            class="form-stack">
                            @csrf
                            @method('PUT')

                            {{-- Cover image --}}
                            <div class="input-group">
                                <label class="input-label">Cover image</label>

                                {{-- Show existing image if present --}}
                                @if ($post->image)
                                    <img src="{{ asset('storage/' . $post->image) }}" id="edit-img-preview"
                                        style="width:100%;max-height:200px;object-fit:cover;border-radius:8px;border:1px solid #e5e7eb;margin-bottom:6px;">
                                @else
                                    <img id="edit-img-preview" src="" alt="Preview"
                                        style="display:none;width:100%;max-height:200px;object-fit:cover;border-radius:8px;border:1px solid #e5e7eb;margin-bottom:6px;">
                                @endif

                                <label for="edit-image" id="edit-img-drop"
                                    style="display:flex;flex-direction:column;align-items:center;justify-content:center;gap:8px;border:1.5px dashed #d1d5db;border-radius:10px;padding:1.5rem 1rem;cursor:pointer;background:#f9fafb;transition:border-color 0.15s,background 0.15s;text-align:center;">
                                    <span class="material-symbols-outlined" style="font-size:28px;color:#d1d5db"
                                        id="edit-img-icon">image</span>
                                    <span style="font-size:13px;color:#9ca3af" id="edit-img-label">
                                        {{ $post->image ? 'Click to replace image' : 'Click to upload an image' }}
                                    </span>
                                    <span style="font-size:11px;color:#d1d5db">PNG, JPG, WEBP — max 2MB</span>
                                    <input type="file" id="edit-image" name="image" accept="image/*" style="display:none"
                                        onchange="editPreviewImage(event)">
                                </label>
                            </div>

                            {{-- Title --}}
                            <div class="input-group">
                                <label class="input-label" for="edit-title">Title</label>
                                <input id="edit-title" type="text" name="title" class="stem-input" placeholder="Post title"
                                    value="{{ old('title', $post->title) }}">
                                @error('title')
                                    <p class="error-msg">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Body --}}
                            <div class="input-group">
                                <label class="input-label" for="edit-body">Content</label>
                                <textarea id="edit-body" name="body" class="stem-input" rows="7" placeholder="Write your post content here…">{{ old('body', $post->body) }}</textarea>
                                @error('body')
                                    <p class="error-msg">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="edit-actions">
                                <button type="submit" class="btn-stem">Save changes →</button>
                                <a href="{{ url('') }}" class="btn-cancel">Cancel</a>
                            </div>

                        </form>
                    </div>
                @endauth

            </div>
        </div>
    </div>

    <script>
        function editPreviewImage(event) {
            const file = event.target.files[0];
            if (!file) return;

            const preview = document.getElementById('edit-img-preview');
            const label = document.getElementById('edit-img-label');
            const icon = document.getElementById('edit-img-icon');
            const drop = document.getElementById('edit-img-drop');

            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
                label.textContent = file.name;
                icon.style.color = '#2563eb';
                drop.style.borderColor = '#3b82f6';
                drop.style.background = '#eff6ff';
            };
            reader.readAsDataURL(file);
        }
    </script>

@endsection

@extends('layout')

@section('title', 'STEM Cambodia - Edit Post')

@section('content')

<link rel="stylesheet" href="{{ asset('css/edit.css') }}">

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
                                <label class="input-label" for="edit-category">Category</label>
                                <select id="edit-category" name="category" class="stem-input">
                                    <option value="" disabled {{ old('category', $post->category) ? '' : 'selected' }}>Choose a category</option>
                                    <option value="Mathematics" {{ old('category', $post->category) === 'Mathematics' ? 'selected' : '' }}>Mathematics</option>
                                    <option value="Science" {{ old('category', $post->category) === 'Science' ? 'selected' : '' }}>Science</option>
                                    <option value="Engineering" {{ old('category', $post->category) === 'Engineering' ? 'selected' : '' }}>Engineering</option>
                                    <option value="Technology" {{ old('category', $post->category) === 'Technology' ? 'selected' : '' }}>Technology</option>
                                </select>
                                @error('category')
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

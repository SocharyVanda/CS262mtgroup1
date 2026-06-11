@extends('layout')
@section('title', 'STEM Cambodia - Dashboard')
@section('content')

<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

    <div class="db-root">
        <div class="db-gridbg"></div>
        <div class="db-glow"></div>

        <div class="db-inner">

            {{-- ── SIDEBAR ── --}}
            <aside class="db-sidebar">
                <div class="db-profile">
                    <div class="db-avatar">{{ strtoupper(substr(auth()->user()?->name ?? 'U', 0, 1)) }}</div>
                    <p class="db-pname">{{ auth()->user()?->name ?? 'User' }}</p>
                    <p class="db-pemail">{{ auth()->user()?->email ?? '' }}</p>
                    <span class="db-pbadge">Member</span>
                </div>

                <nav class="db-nav" role="navigation" aria-label="Dashboard navigation">
                    <button class="db-navitem active" onclick="switchTab('overview', this)">
                        <span class="nav-ic material-symbols-outlined">grid_view</span>
                        Overview
                    </button>
                    <button class="db-navitem" onclick="switchTab('posts', this)">
                        <span class="nav-ic material-symbols-outlined">article</span>
                        My Articles
                    </button>
                    <button class="db-navitem" onclick="switchTab('create', this)">
                        <span class="nav-ic material-symbols-outlined">edit</span>
                        New Articles
                    </button>

                    {{-- adding new posts --}}
                    <button class="db-navitem" onclick="switchTab('newpost', this)">
                        <span class="nav-ic material-symbols-outlined">add_photo_alternate</span>
                        New Posts
                    </button>

                    <div class="db-nav-divider"></div>

                    <form action="/logout" method="POST" style="margin:0">
                        @csrf
                        <button type="submit" class="db-navitem danger" style="width:100%">
                            <span class="nav-ic material-symbols-outlined">logout</span>
                            Log out
                        </button>
                    </form>
                </nav>
            </aside>

            {{-- ── MAIN ── --}}
            <main class="db-main">

                {{-- ── OVERVIEW TAB ── --}}
                <div id="tab-overview" class="db-section visible">

                    <div class="panel">
                        <div class="panel-hd">
                            <span class="panel-htitle">
                                <span class="material-symbols-outlined">insights</span>
                                Overview
                            </span>
                        </div>
                        <div class="panel-bd">
                            <div class="stats-grid">
                                <div class="stat-card">
                                    <p class="stat-lbl">Posts</p>
                                    <p class="stat-val">{{ isset($posts) ? count($posts) : 0 }}</p>
                                    <p class="stat-sub">published</p>
                                </div>
                                <div class="stat-card">
                                    <p class="stat-lbl">Member since</p>
                                    <p class="stat-val" style="font-size:1rem;padding-top:6px">
                                        {{ auth()->user()?->created_at?->format('M Y') ?? '—' }}
                                    </p>
                                    <p class="stat-sub">joined</p>
                                </div>
                                <div class="stat-card">
                                    <p class="stat-lbl">Subjects</p>
                                    <p class="stat-val">4</p>
                                    <p class="stat-sub">available</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="panel">
                        <div class="panel-hd">
                            <span class="panel-htitle">
                                <span class="material-symbols-outlined">article</span>
                                Recent posts
                            </span>
                            <span class="panel-badge">{{ isset($posts) ? count($posts) : 0 }}</span>
                        </div>

                        @if (isset($posts) && count($posts) > 0)
                            <div class="post-list">
                                @foreach ($posts->take(5) as $post)
                                    <div class="post-row">
                                        <div class="post-info">
                                            <p class="post-title">{{ $post->title }}</p>
                                            <p class="post-preview">{{ Str::limit($post->body, 80) }}</p>
                                            <p class="post-meta">
                                                {{ $post->created_at ? $post->created_at->diffForHumans() : '' }}
                                            </p>
                                        </div>
                                        <div class="post-acts">
                                            <a href="/edit-post/{{ $post->id }}" class="btn-ic" title="Edit">
                                                <span class="material-symbols-outlined" style="font-size:14px">edit</span>
                                            </a>
                                            <form action="/delete-post/{{ $post->id }}" method="POST"
                                                style="margin:0">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn-ic del" title="Delete">
                                                    <span class="material-symbols-outlined"
                                                        style="font-size:14px">delete</span>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="empty-state">
                                <span class="material-symbols-outlined">article</span>
                                <p>No posts yet. Write your first one.</p>
                            </div>
                        @endif
                    </div>

                </div>

                {{-- ── POSTS TAB ── --}}
                <div id="tab-posts" class="db-section">
                    <div class="panel">
                        <div class="panel-hd">
                            <span class="panel-htitle">
                                <span class="material-symbols-outlined">article</span>
                                All Articles
                            </span>
                            <span class="panel-badge">{{ isset($posts) ? count($posts) : 0 }}</span>
                        </div>

                        @if (isset($posts) && count($posts) > 0)
                            <div class="post-list">
                                @foreach ($posts as $post)
                                    <div class="post-row">
                                        {{-- Thumbnail --}}
                                        @if ($post->image)
                                            <img src="{{ asset('storage/' . $post->image) }}"
                                                style="width:52px;height:52px;object-fit:cover;border-radius:8px;flex-shrink:0;border:1px solid #e5e7eb;">
                                        @else
                                            <div
                                                style="width:52px;height:52px;border-radius:8px;background:#f3f4f6;flex-shrink:0;display:flex;align-items:center;justify-content:center;">
                                                <span class="material-symbols-outlined"
                                                    style="font-size:20px;color:#d1d5db">image</span>
                                            </div>
                                        @endif

                                        <div class="post-info">
                                            <p class="post-title">{{ $post->title }}</p>
                                            <p class="post-preview">{{ Str::limit($post->body, 100) }}</p>
                                            <p class="post-meta">{{ $post->created_at?->diffForHumans() }}</p>
                                        </div>
                                        <div class="post-acts">
                                            <a href="/edit-post/{{ $post->id }}" class="btn-ic" title="Edit">
                                                <span class="material-symbols-outlined" style="font-size:14px">edit</span>
                                            </a>
                                            <form action="/delete-post/{{ $post->id }}" method="POST"
                                                style="margin:0">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn-ic del" title="Delete">
                                                    <span class="material-symbols-outlined"
                                                        style="font-size:14px">delete</span>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="empty-state">
                                <span class="material-symbols-outlined">article</span>
                                <p>No posts yet.</p>
                            </div>
                        @endif
                    </div>
                </div>
                {{-- ── CREATE POST TAB ── --}}
                <div id="tab-create" class="db-section">
                    <div class="panel">
                        <div class="panel-hd">
                            <span class="panel-htitle">
                                <span class="material-symbols-outlined">edit</span>
                                New article (text only)
                            </span>
                        </div>
                        <div class="panel-bd">
                            @if ($errors->any())
                                <div class="alert-stem">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form action="/create-post" method="POST" class="form-stack">
                                @csrf
                                <div class="f-group">
                                    <label class="f-label" for="new-title">Title</label>
                                    <input id="new-title" type="text" name="title" class="stem-input"
                                        placeholder="Give your post a title" value="{{ old('title') }}">
                                </div>
                                <div class="f-group">
                                    <label class="f-label" for="new-category">Category</label>
                                    <select id="new-category" name="category" class="stem-input">
                                        <option value="" disabled {{ old('category') ? '' : 'selected' }}>Choose a category</option>
                                        <option value="Mathematics" {{ old('category') === 'Mathematics' ? 'selected' : '' }}>Mathematics</option>
                                        <option value="Science" {{ old('category') === 'Science' ? 'selected' : '' }}>Science</option>
                                        <option value="Engineering" {{ old('category') === 'Engineering' ? 'selected' : '' }}>Engineering</option>
                                        <option value="Technology" {{ old('category') === 'Technology' ? 'selected' : '' }}>Technology</option>
                                    </select>
                                </div>
                                <div class="f-group">
                                    <label class="f-label" for="new-body">Content</label>
                                    <textarea id="new-body" name="body" class="stem-input" rows="10" placeholder="Write something…">{{ old('body') }}</textarea>
                                </div>
                                <div class="form-footer-right">
                                    <button type="submit" class="btn-stem">Publish article →</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                {{-- ── NEW POST WITH IMAGE TAB ── --}}
                <div id="tab-newpost" class="db-section">
                    <div class="panel">
                        <div class="panel-hd">
                            <span class="panel-htitle">
                                <span class="material-symbols-outlined">add_photo_alternate</span>
                                New post with image
                            </span>
                        </div>
                        <div class="panel-bd">

                            @if ($errors->any())
                                <div class="alert-stem">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form action="/create-post" method="POST" enctype="multipart/form-data" class="form-stack">
                                @csrf

                                {{-- Image Upload --}}
                                <div class="f-group">
                                    <label class="f-label">Cover image</label>
                                    <label for="post-image" id="img-drop"
                                        style="
                        display: flex;
                        flex-direction: column;
                        align-items: center;
                        justify-content: center;
                        gap: 8px;
                        border: 1.5px dashed #d1d5db;
                        border-radius: 10px;
                        padding: 2rem 1rem;
                        cursor: pointer;
                        background: #f9fafb;
                        transition: border-color 0.15s, background 0.15s;
                        text-align: center;
                    ">
                                        <span class="material-symbols-outlined" style="font-size:32px;color:#d1d5db"
                                            id="img-icon">image</span>
                                        <span style="font-size:13px;color:#9ca3af" id="img-label">Click to upload an
                                            image</span>
                                        <span style="font-size:11px;color:#d1d5db">PNG, JPG, WEBP — max 2MB</span>
                                        <input type="file" id="post-image" name="image" accept="image/*"
                                            style="display:none" onchange="previewImage(event)">
                                    </label>
                                    {{-- Image preview --}}
                                    <img id="img-preview" src="" alt="Preview"
                                        style="display:none; width:100%; max-height:220px; object-fit:cover; border-radius:8px; margin-top:8px; border:1px solid #e5e7eb;">
                                </div>

                                {{-- Title --}}
                                <div class="f-group">
                                    <label class="f-label" for="post-title">Title</label>
                                    <input id="post-title" type="text" name="title" class="stem-input"
                                        placeholder="Give your post a title" value="{{ old('title') }}">
                                </div>
                                <div class="f-group">
                                    <label class="f-label" for="post-category">Category</label>
                                    <select id="post-category" name="category" class="stem-input">
                                        <option value="" disabled {{ old('category') ? '' : 'selected' }}>Choose a category</option>
                                        <option value="Mathematics" {{ old('category') === 'Mathematics' ? 'selected' : '' }}>Mathematics</option>
                                        <option value="Science" {{ old('category') === 'Science' ? 'selected' : '' }}>Science</option>
                                        <option value="Engineering" {{ old('category') === 'Engineering' ? 'selected' : '' }}>Engineering</option>
                                        <option value="Technology" {{ old('category') === 'Technology' ? 'selected' : '' }}>Technology</option>
                                    </select>
                                </div>

                                {{-- Body --}}
                                <div class="f-group">
                                    <label class="f-label" for="post-body">Article content</label>
                                    <textarea id="post-body" name="body" class="stem-input" rows="12" placeholder="Write your article here…">{{ old('body') }}</textarea>
                                </div>

                                <div class="form-footer-right">
                                    <button type="submit" class="btn-stem">Publish post →</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                {{-- ── ACCOUNT TAB ── --}}
                <div id="tab-settings" class="db-section">
                    <div class="panel">
                        <div class="panel-hd">
                            <span class="panel-htitle">
                                <span class="material-symbols-outlined">manage_accounts</span>
                                Account details
                            </span>
                        </div>
                        <div class="srow">
                            <span class="skey">Username</span>
                            <span class="sval">{{ auth()->user()?->name ?? '—' }}</span>
                            <a href="#" class="sedit">Edit</a>
                        </div>
                        <div class="srow">
                            <span class="skey">Email</span>
                            <span class="sval">{{ auth()->user()?->email ?? '—' }}</span>
                            <a href="#" class="sedit">Edit</a>
                        </div>
                        <div class="srow">
                            <span class="skey">Password</span>
                            <span class="sval" style="color:#d1d5db">••••••••</span>
                            <a href="#" class="sedit">Change</a>
                        </div>
                        <div class="srow">
                            <span class="skey">Joined</span>
                            <span class="sval">{{ auth()->user()?->created_at?->format('d M Y') ?? '—' }}</span>
                            <span></span>
                        </div>
                    </div>

                    <div class="panel" style="border-color:#fecaca">
                        <div class="panel-hd" style="border-bottom-color:#fecaca">
                            <span class="panel-htitle" style="color:#b91c1c">
                                <span class="material-symbols-outlined"
                                    style="color:#b91c1c;font-size:16px">warning</span>
                                Danger zone
                            </span>
                        </div>
                        <div class="panel-bd">
                            <div class="danger-zone-body">
                                <div>
                                    <p style="font-size:13.5px;font-weight:500;color:#0f1117;margin-bottom:3px">Log out of
                                        all devices</p>
                                    <p style="font-size:12px;color:#9ca3af">End all active sessions for your account.</p>
                                </div>
                                <form action="/logout" method="POST" style="margin:0">
                                    @csrf
                                    <button type="submit" class="btn-danger">Log out</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </main>
        </div>
    </div>

    <script src="{{ asset('js/dashboard.js') }}"></script>

@endsection

@extends('layout')
@section('title', 'STEM Cambodia - Bookmarks')
@section('content')

    <style>
        .page-wrap {
            max-width: 1100px;
            margin: 0 auto;
            padding: 3rem 1.5rem 5rem;
        }

        /* ── PAGE HEADER ── */
        .page-header {
            margin-bottom: 2.5rem;
        }

        .page-eyebrow {
            font-family: 'DM Mono', monospace;
            font-size: 11px;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: var(--clr-muted);
            margin-bottom: 0.4rem;
        }

        .page-title {
            font-size: 1.6rem;
            font-weight: 600;
            color: var(--clr-text);
        }

        .page-subtitle {
            font-size: 14px;
            color: var(--clr-muted);
            margin-top: 0.4rem;
        }

        /* ── LAYOUT ── */
        .bm-layout {
            display: grid;
            grid-template-columns: 220px 1fr;
            gap: 2rem;
            align-items: start;
        }

        @media (max-width: 720px) {
            .bm-layout {
                grid-template-columns: 1fr;
            }
        }

        /* ── SIDEBAR ── */
        .bm-sidebar {
            position: sticky;
            top: calc(60px + 1.5rem);
            display: flex;
            flex-direction: column;
            gap: 0.15rem;
        }

        .bm-sidebar-label {
            font-family: 'DM Mono', monospace;
            font-size: 10.5px;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            color: var(--clr-muted);
            padding: 0 0.75rem;
            margin-bottom: 0.5rem;
        }

        .bm-nav-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            font-size: 13.5px;
            color: var(--clr-muted);
            padding: 0.45rem 0.75rem;
            border-radius: 6px;
            text-decoration: none;
            cursor: pointer;
            transition: color 0.15s, background 0.15s;
        }

        .bm-nav-item:hover {
            color: var(--clr-text);
            background: var(--clr-accent-dim);
        }

        .bm-nav-item.active {
            color: var(--clr-accent);
            background: var(--clr-accent-dim);
            font-weight: 500;
        }

        .bm-count {
            font-family: 'DM Mono', monospace;
            font-size: 11px;
            color: var(--clr-muted);
            background: var(--clr-bg);
            border: 1px solid var(--clr-border);
            border-radius: 100px;
            padding: 0.05rem 0.45rem;
        }

        .bm-divider {
            height: 1px;
            background: var(--clr-border);
            margin: 0.5rem 0;
        }

        /* ── SEARCH ── */
        .bm-search-wrap {
            position: relative;
            margin-bottom: 1.5rem;
        }

        .bm-search {
            width: 100%;
            background: var(--clr-surface);
            border: 1px solid var(--clr-border);
            border-radius: 8px;
            padding: 0.6rem 0.85rem 0.6rem 2.25rem;
            font-family: 'DM Sans', sans-serif;
            font-size: 14px;
            color: var(--clr-text);
            outline: none;
            transition: border-color 0.15s;
        }

        .bm-search:focus {
            border-color: var(--clr-accent);
        }

        .bm-search::placeholder {
            color: #a1a1a1;
        }

        .bm-search-icon {
            position: absolute;
            left: 0.7rem;
            top: 50%;
            transform: translateY(-50%);
            font-size: 16px;
            color: var(--clr-muted);
        }

        /* ── SECTION LABEL ── */
        .section-label {
            font-family: 'DM Mono', monospace;
            font-size: 11px;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: var(--clr-muted);
            margin-bottom: 1rem;
        }

        .section-gap {
            margin-top: 2rem;
        }

        /* ── BOOKMARK LIST ── */
        .bm-list {
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
        }

        .bm-card {
            background: var(--clr-surface);
            border: 1px solid var(--clr-border);
            border-radius: var(--radius);
            padding: 1.1rem 1.25rem;
            display: flex;
            align-items: flex-start;
            gap: 1rem;
            text-decoration: none;
            transition: box-shadow 0.15s, border-color 0.15s;
        }

        .bm-card:hover {
            border-color: var(--clr-accent);
            box-shadow: 0 2px 12px rgba(26, 122, 74, 0.08);
        }

        .bm-icon {
            width: 40px;
            height: 40px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            flex-shrink: 0;
        }

        .bm-science {
            background: #e8f5ee;
        }

        .bm-tech {
            background: #eff6ff;
        }

        .bm-eng {
            background: #f3f4f6;
        }

        .bm-math {
            background: #fef3c7;
        }

        .bm-env {
            background: #ecfdf5;
        }

        .bm-health {
            background: #fdf2f8;
        }

        .bm-info {
            flex: 1;
            min-width: 0;
        }

        .bm-title {
            font-size: 14px;
            font-weight: 500;
            color: var(--clr-text);
            line-height: 1.4;
            margin-bottom: 0.25rem;
        }

        .bm-desc {
            font-size: 12.5px;
            color: var(--clr-muted);
            line-height: 1.5;
        }

        .bm-meta {
            font-family: 'DM Mono', monospace;
            font-size: 11px;
            color: var(--clr-muted);
            margin-top: 0.5rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .bm-tag {
            font-size: 11px;
            font-weight: 500;
            color: var(--clr-accent);
            background: var(--clr-accent-dim);
            padding: 0.1rem 0.5rem;
            border-radius: 100px;
        }

        .bm-action {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 30px;
            height: 30px;
            border: 1px solid var(--clr-border);
            border-radius: 6px;
            background: transparent;
            color: var(--clr-muted);
            cursor: pointer;
            flex-shrink: 0;
            font-size: 16px;
            transition: border-color 0.15s, color 0.15s, background 0.15s;
        }

        .bm-action:hover {
            border-color: #fca5a5;
            color: #b91c1c;
            background: #fef2f2;
        }

        /* ── RESOURCE GRID ── */
        .resource-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1rem;
        }

        @media (max-width: 600px) {
            .resource-grid {
                grid-template-columns: 1fr;
            }
        }

        .resource-card {
            background: var(--clr-surface);
            border: 1px solid var(--clr-border);
            border-radius: var(--radius);
            padding: 1.25rem;
            text-decoration: none;
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
            transition: box-shadow 0.15s, border-color 0.15s;
        }

        .resource-card:hover {
            border-color: var(--clr-accent);
            box-shadow: 0 2px 12px rgba(26, 122, 74, 0.08);
        }

        .resource-card-header {
            display: flex;
            align-items: center;
            gap: 0.6rem;
        }

        .resource-icon {
            font-size: 20px;
        }

        .resource-name {
            font-size: 13.5px;
            font-weight: 500;
            color: var(--clr-text);
        }

        .resource-desc {
            font-size: 12.5px;
            color: var(--clr-muted);
            line-height: 1.5;
        }

        .resource-link {
            font-size: 12px;
            font-family: 'DM Mono', monospace;
            color: var(--clr-accent);
            margin-top: 0.25rem;
        }

        /* ── EMPTY STATE ── */
        .empty-state {
            background: var(--clr-surface);
            border: 1px solid var(--clr-border);
            border-radius: var(--radius);
            padding: 3rem 1.5rem;
            text-align: center;
        }

        .empty-icon {
            font-size: 32px;
            margin-bottom: 0.75rem;
        }

        .empty-text {
            font-size: 14px;
            color: var(--clr-muted);
            margin-bottom: 1rem;
        }

        .btn-stem {
            display: inline-flex;
            align-items: center;
            font-size: 13px;
            font-weight: 500;
            color: var(--clr-surface);
            background: var(--clr-accent);
            border: none;
            border-radius: 6px;
            padding: 0.5rem 1.2rem;
            cursor: pointer;
            text-decoration: none;
            transition: opacity 0.15s;
        }

        .btn-stem:hover {
            opacity: 0.85;
            color: var(--clr-surface);
        }
    </style>

    <div class="page-wrap">

        <div class="page-header">
            <p class="page-eyebrow">Saved content</p>
            <h1 class="page-title">Bookmarks</h1>
            <p class="page-subtitle">Your saved articles, resources, and references.</p>
        </div>

        <div class="bm-layout">

            <!-- SIDEBAR -->
            <aside class="bm-sidebar">
                <p class="bm-sidebar-label">Collections</p>
                <a class="bm-nav-item active" href="#">
                    All saved
                    <span class="bm-count">12</span>
                </a>
                <a class="bm-nav-item" href="#">
                    Articles
                    <span class="bm-count">5</span>
                </a>
                <a class="bm-nav-item" href="#">
                    Resources
                    <span class="bm-count">4</span>
                </a>
                <a class="bm-nav-item" href="#">
                    Videos
                    <span class="bm-count">3</span>
                </a>

                <div class="bm-divider"></div>

                <p class="bm-sidebar-label">By subject</p>
                <a class="bm-nav-item" href="#">Science</a>
                <a class="bm-nav-item" href="#">Technology</a>
                <a class="bm-nav-item" href="#">Engineering</a>
                <a class="bm-nav-item" href="#">Mathematics</a>
            </aside>

            <!-- MAIN -->
            <main>

                <!-- SEARCH -->
                <div class="bm-search-wrap">
                    <span class="bm-search-icon material-symbols-outlined">search</span>
                    <input class="bm-search" type="text" placeholder="Search your bookmarks…">
                </div>

                <!-- SAVED ARTICLES -->
                <p class="section-label">Saved articles</p>
                <div class="bm-list">

                    <div class="bm-card">
                        <div class="bm-icon bm-science">🔬</div>
                        <div class="bm-info">
                            <p class="bm-title">Cambodia Launches First National STEM Curriculum for Secondary Schools</p>
                            <p class="bm-desc">The Ministry of Education unveils a comprehensive framework targeting 50,000
                                STEM graduates annually by 2027.</p>
                            <div class="bm-meta">
                                <span class="bm-tag">Science</span>
                                <span>Saved Jun 2026</span>
                                <span>5 min read</span>
                            </div>
                        </div>
                        <button class="bm-action" title="Remove bookmark">
                            <span class="material-symbols-outlined" style="font-size:15px">bookmark_remove</span>
                        </button>
                    </div>

                    <div class="bm-card">
                        <div class="bm-icon bm-tech">💻</div>
                        <div class="bm-info">
                            <p class="bm-title">AI Literacy Program Reaches 12,000 Students Across 6 Provinces</p>
                            <p class="bm-desc">A joint initiative between local NGOs and the Ministry of Education brings
                                foundational AI education to rural students.</p>
                            <div class="bm-meta">
                                <span class="bm-tag">Technology</span>
                                <span>Saved May 2026</span>
                                <span>3 min read</span>
                            </div>
                        </div>
                        <button class="bm-action" title="Remove bookmark">
                            <span class="material-symbols-outlined" style="font-size:15px">bookmark_remove</span>
                        </button>
                    </div>

                    <div class="bm-card">
                        <div class="bm-icon bm-math">📐</div>
                        <div class="bm-info">
                            <p class="bm-title">Cambodian Students Win Silver at 2026 Asia-Pacific Math Olympiad</p>
                            <p class="bm-desc">A team of six students from Phnom Penh's top high schools brought home
                                silver, the country's best result to date.</p>
                            <div class="bm-meta">
                                <span class="bm-tag">Mathematics</span>
                                <span>Saved May 2026</span>
                                <span>2 min read</span>
                            </div>
                        </div>
                        <button class="bm-action" title="Remove bookmark">
                            <span class="material-symbols-outlined" style="font-size:15px">bookmark_remove</span>
                        </button>
                    </div>

                    <div class="bm-card">
                        <div class="bm-icon bm-env">🌿</div>
                        <div class="bm-info">
                            <p class="bm-title">RUPP Researchers Develop Low-Cost Water Filtration Using Local Materials</p>
                            <p class="bm-desc">Royal University of Phnom Penh publishes findings on a filtration system
                                costing under $10 using locally sourced clay and sand.</p>
                            <div class="bm-meta">
                                <span class="bm-tag">Environment</span>
                                <span>Saved Apr 2026</span>
                                <span>4 min read</span>
                            </div>
                        </div>
                        <button class="bm-action" title="Remove bookmark">
                            <span class="material-symbols-outlined" style="font-size:15px">bookmark_remove</span>
                        </button>
                    </div>

                    <div class="bm-card">
                        <div class="bm-icon bm-eng">⚙️</div>
                        <div class="bm-info">
                            <p class="bm-title">Solar-Powered Irrigation System Built by Kampong Cham Engineering Students
                            </p>
                            <p class="bm-desc">Final-year engineering students design and deploy a working solar irrigation
                                system serving three local farming families.</p>
                            <div class="bm-meta">
                                <span class="bm-tag">Engineering</span>
                                <span>Saved Apr 2026</span>
                                <span>3 min read</span>
                            </div>
                        </div>
                        <button class="bm-action" title="Remove bookmark">
                            <span class="material-symbols-outlined" style="font-size:15px">bookmark_remove</span>
                        </button>
                    </div>

                </div>

                <!-- SAVED RESOURCES -->
                <div class="section-gap">
                    <p class="section-label">Saved resources</p>
                    <div class="resource-grid">

                        <a class="resource-card" href="#">
                            <div class="resource-card-header">
                                <span class="resource-icon">📘</span>
                                <span class="resource-name">Khan Academy — STEM Courses</span>
                            </div>
                            <p class="resource-desc">Free courses in mathematics, physics, chemistry, biology, and computer
                                science with exercises and videos.</p>
                            <span class="resource-link">khanacademy.org →</span>
                        </a>

                        <a class="resource-card" href="#">
                            <div class="resource-card-header">
                                <span class="resource-icon">🧪</span>
                                <span class="resource-name">PhET Interactive Simulations</span>
                            </div>
                            <p class="resource-desc">University of Colorado's free science and math simulations — available
                                in Khmer.</p>
                            <span class="resource-link">phet.colorado.edu →</span>
                        </a>

                        <a class="resource-card" href="#">
                            <div class="resource-card-header">
                                <span class="resource-icon">🤖</span>
                                <span class="resource-name">CS50 — Introduction to Computer Science</span>
                            </div>
                            <p class="resource-desc">Harvard's free introductory computer science course, widely regarded
                                as the best starting point for programming.</p>
                            <span class="resource-link">cs50.harvard.edu →</span>
                        </a>

                        <a class="resource-card" href="#">
                            <div class="resource-card-header">
                                <span class="resource-icon">📊</span>
                                <span class="resource-name">Desmos Graphing Calculator</span>
                            </div>
                            <p class="resource-desc">A powerful, free graphing tool used in classrooms worldwide for
                                exploring mathematical functions and data.</p>
                            <span class="resource-link">desmos.com →</span>
                        </a>

                    </div>
                </div>

            </main>
        </div>
    </div>

@endsection

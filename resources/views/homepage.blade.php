@extends('layout')
@section('title', 'STEM Cambodia - Home')
@section('content')

    <style>
        /* ── CAROUSEL ── */
        .hero-carousel {
            position: relative;
            overflow: hidden;
        }

        .hero-carousel .carousel-inner {
            border-radius: 0;
        }

        .hero-carousel img {
            height: 480px;
            object-fit: cover;
            width: 100%;
            filter: brightness(0.88);
        }

        .hero-carousel .carousel-indicators [data-bs-target] {
            width: 24px;
            height: 3px;
            border-radius: 2px;
            background: rgba(255, 255, 255, 0.5);
            border: none;
            opacity: 1;
        }

        .hero-carousel .carousel-indicators .active {
            background: #fff;
        }

        .hero-overlay {
            position: absolute;
            inset: 0;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            padding: 2.5rem 3rem;
            background: linear-gradient(to top, rgba(17, 17, 16, 0.55) 0%, transparent 60%);
            pointer-events: none;
        }

        .hero-label {
            font-family: 'DM Mono', monospace;
            font-size: 11px;
            letter-spacing: 0.12em;
            color: rgba(255, 255, 255, 0.65);
            text-transform: uppercase;
            margin-bottom: 0.4rem;
        }

        .hero-title {
            font-size: 1.9rem;
            font-weight: 600;
            color: #fff;
            line-height: 1.25;
        }

        /* ── PAGE WRAPPER ── */
        .page-body {
            max-width: 1160px;
            margin: 0 auto;
            padding: 0 1.5rem 5rem;
        }

        /* ── SECTION LABEL ── */
        .section-label {
            font-family: 'DM Mono', monospace;
            font-size: 11px;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: var(--clr-muted);
            margin-bottom: 1.25rem;
        }

        /* ── SUBJECT GRID ── */
        .subject-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1rem;
        }

        @media (max-width: 900px) {
            .subject-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 500px) {
            .subject-grid {
                grid-template-columns: 1fr 1fr;
            }
        }

        .subject-card {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 0.85rem;
            background: var(--clr-surface);
            border: 1px solid var(--clr-border);
            border-radius: var(--radius);
            padding: 2rem 1rem;
            text-decoration: none;
            transition: border-color 0.2s, box-shadow 0.2s, transform 0.2s;
        }

        .subject-card:hover {
            border-color: var(--clr-accent);
            box-shadow: 0 4px 16px rgba(26, 122, 74, 0.1);
            transform: translateY(-2px);
        }

        .subject-icon {
            width: 44px;
            height: 44px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .subject-icon .material-symbols-outlined {
            font-size: 22px;
        }

        .subject-name {
            font-size: 13.5px;
            font-weight: 500;
            color: var(--clr-text);
            text-align: center;
        }

        .icon-science {
            background: #e8f5ee;
            color: var(--clr-accent);
        }

        .icon-tech {
            background: #eff6ff;
            color: var(--clr-tertiary);
        }

        .icon-eng {
            background: #f3f4f6;
            color: var(--clr-secondary);
        }

        .icon-math {
            background: #fef3c7;
            color: #92400e;
        }

        /* ── FEATURED CARD ── */
        .featured-card {
            background: var(--clr-surface);
            border: 1px solid var(--clr-border);
            border-radius: var(--radius);
            padding: 2rem;
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
        }

        .featured-tag {
            font-family: 'DM Mono', monospace;
            font-size: 11px;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            color: var(--clr-accent);
            font-weight: 500;
        }

        .featured-title {
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--clr-text);
        }

        .featured-body {
            font-size: 14px;
            color: var(--clr-muted);
        }

        .btn-stem {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            font-size: 13px;
            font-weight: 500;
            color: var(--clr-surface);
            background: var(--clr-accent);
            padding: 0.5rem 1.1rem;
            border-radius: 6px;
            text-decoration: none;
            border: none;
            cursor: pointer;
            transition: opacity 0.15s;
            width: fit-content;
        }

        .btn-stem:hover {
            opacity: 0.85;
            color: var(--clr-surface);
        }

        /* ── CREATE/LIST POSTS (auth) ── */
        .post-form-wrap {
            background: var(--clr-surface);
            border: 1px solid var(--clr-border);
            border-radius: var(--radius);
            padding: 1.75rem;
        }

        .stem-input {
            width: 100%;
            background: var(--clr-bg);
            border: 1px solid var(--clr-border);
            border-radius: 6px;
            padding: 0.6rem 0.85rem;
            font-family: 'DM Sans', sans-serif;
            font-size: 14px;
            color: var(--clr-text);
            outline: none;
            transition: border-color 0.15s;
            resize: vertical;
        }

        .stem-input:focus {
            border-color: var(--clr-accent);
        }

        .post-card {
            background: var(--clr-surface);
            border: 1px solid var(--clr-border);
            border-radius: var(--radius);
            padding: 1.5rem;
        }

        .post-card-title {
            font-size: 1rem;
            font-weight: 600;
            color: var(--clr-text);
            margin-bottom: 0.35rem;
        }

        .post-card-by {
            font-size: 12px;
            font-family: 'DM Mono', monospace;
            color: var(--clr-muted);
            margin-bottom: 0.75rem;
        }

        .post-card-body {
            font-size: 14px;
            color: var(--clr-muted);
        }

        .post-actions {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin-top: 1rem;
        }

        .link-edit {
            font-size: 13px;
            color: var(--clr-accent);
            text-decoration: none;
        }

        .link-edit:hover {
            text-decoration: underline;
        }

        .btn-danger-sm {
            font-size: 12px;
            font-weight: 500;
            color: #b91c1c;
            background: #fef2f2;
            border: 1px solid #fecaca;
            padding: 0.3rem 0.75rem;
            border-radius: 6px;
            cursor: pointer;
            transition: background 0.15s;
        }

        .btn-danger-sm:hover {
            background: #fee2e2;
        }

        .stack {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .section-gap {
            margin-top: 3rem;
        }
    </style>

    <header
        class="relative flex min-h-[100svh] flex-col justify-center px-12 pt-0 pb-0 bg-surface dark:bg-inverse-surface overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-primary/5 to-transparent pointer-events-none"></div>

        <div class="relative z-10 mx-auto grid w-full max-w-7xl items-center gap-12 lg:grid-cols-12">

            <div class="flex flex-col justify-center lg:col-span-7 space-y-3">

                <h1
                    class="text-4xl font-extrabold tracking-tight text-on-surface dark:text-surface-container-high sm:text-5xl md:text-6xl">
                    Advancing Cambodia's
                    <span class="block mt-1 text-primary dark:text-primary-fixed-dim relative h-[1.2em] overflow-hidden">
                        <span class="absolute inset-0 animate-text-slide opacity-0">Future Through STEM</span>
                        <span class="absolute inset-0 animate-text-slide-delayed-1 opacity-0">Innovation & Tech</span>
                        <span class="absolute inset-0 animate-text-slide-delayed-2 opacity-0">Youth Education</span>
                    </span>
                </h1>

                <p
                    class="max-w-2xl text-base text-on-surface-variant dark:text-outline-variant sm:text-lg md:text-xl leading-relaxed">
                    STEMBODIAN provides high-impact educational programs and interactive resources that equip students with
                    critical skills, driving sustainable progress across Cambodia's growing STEM sectors.
                </p>
            </div>

            <div class="flex items-center justify-center lg:col-span-5">
                <div class="relative w-full max-w-[400px] aspect-square rounded-2xl bg-surface-container-low mb-20">
                    <img src="https://stemcambodia.ngo/wp-content/uploads/2025/06/STEM-Mark.png"
                        class="w-full h-full object-contain drop-shadow-lg" alt="STEM Cambodia Circular Diagram">
                </div>
            </div>
        </div>
    </header>


    </div>
    </section>
    <!-- Explore Section (Bento Grid) -->
    <section class="max-w-container-max mx-auto px-gutter py-lg py-xl">
        <h2 class="text-headline-md font-headline-md text-on-surface mb-md">Explore Subjects</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-md">
            <!-- Science -->
            <a class="group relative overflow-hidden rounded-xl bg-surface-bright border border-outline-variant p-md flex flex-col justify-between h-48 ambient-shadow transition-all duration-300 items-center"
                href="http://cs262mtgroup1.test/science">

                <div
                    class="bg-primary/10 w-12 h-12 flex items-center justify-center rounded-lg mb-4 group-hover:bg-primary/20 transition-colors">
                    <span class="material-symbols-outlined text-primary">science</span>
                </div>
                <div>
                    <h3 class="text-headline-md font-headline-md text-on-surface text-lg text-center">Science</h3>

                </div>
            </a>
            <!-- Technology -->
            <a class="group relative overflow-hidden rounded-xl bg-surface-bright border border-outline-variant p-md flex flex-col justify-between h-48 ambient-shadow transition-all duration-300 items-center"
                href="http://cs262mtgroup1.test/technology">

                <div
                    class="bg-tertiary/10 w-12 h-12 flex items-center justify-center rounded-lg mb-4 group-hover:bg-tertiary/20 transition-colors">
                    <span class="material-symbols-outlined text-tertiary">devices</span>
                </div>
                <div>
                    <h3 class="text-headline-md font-headline-md text-on-surface text-lg text-center">Technology</h3>

                </div>
            </a>
            <!-- Engineering -->
            <a class="group relative overflow-hidden rounded-xl bg-surface-bright border border-outline-variant p-md flex flex-col justify-between h-48 ambient-shadow transition-all duration-300 items-center"
                href="http://cs262mtgroup1.test/engineering">

                <div
                    class="bg-secondary/10 w-12 h-12 flex items-center justify-center rounded-lg mb-4 group-hover:bg-secondary/20 transition-colors">
                    <span class="material-symbols-outlined text-secondary">precision_manufacturing</span>
                </div>
                <div>
                    <h3 class="text-headline-md font-headline-md text-on-surface text-lg text-center">Engineering</h3>

                </div>
            </a>
            <!-- Math -->
            <a class="group relative overflow-hidden rounded-xl bg-surface-bright border border-outline-variant p-md flex flex-col justify-between h-48 ambient-shadow transition-all duration-300 items-center"
                href="http://cs262mtgroup1.test/mathematics">

                <div
                    class="bg-on-primary-fixed-variant/10 w-12 h-12 flex items-center justify-center rounded-lg mb-4 group-hover:bg-on-primary-fixed-variant/20 transition-colors">
                    <span class="material-symbols-outlined text-on-primary-fixed-variant">calculate</span>
                </div>
                <div>
                    <h3 class="text-headline-md font-headline-md text-on-surface text-lg text-center">Mathematics</h3>

                </div>
            </a>
        </div>
    </section>



    </main>

@endsection

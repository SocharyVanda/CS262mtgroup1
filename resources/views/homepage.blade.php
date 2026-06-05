@extends('layout')
@section('title', 'STEM Cambodia - Home')
@section('content')

    <style>
        /* ── RESET OVERRIDES ── */
        .section-label {
            font-family: var(--font-mono);
            font-size: 11px;
            font-weight: 600;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            color: var(--clr-accent);
            display: block;
            margin-bottom: 0.75rem;
        }

        .section-title {
            font-family: var(--font-display);
            font-size: clamp(1.9rem, 3.5vw, 2.75rem);
            font-weight: 800;
            color: var(--clr-text);
            line-height: 1.15;
            letter-spacing: -0.02em;
            margin-bottom: 1rem;
        }

        .section-title .accent {
            color: var(--clr-accent);
        }

        /* ── HERO ── */
        .hero {
            min-height: calc(100svh - var(--nav-h));
            display: flex;
            align-items: center;
            padding: 4rem 2.5rem;
            position: relative;
            overflow: hidden;
        }

        /* Soft background glow */
        .hero::before {
            content: '';
            position: absolute;
            width: 600px;
            height: 600px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(0, 230, 118, 0.06) 0%, transparent 65%);
            top: 50%;
            right: 5%;
            transform: translateY(-50%);
            pointer-events: none;
        }

        .hero-inner {
            max-width: 1100px;
            margin: 0 auto;
            width: 100%;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            align-items: center;
            min-width: 0;
        }

        .hero-left {
            min-width: 0;
        }

        .hero-eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-family: var(--font-mono);
            font-size: 11px;
            color: var(--clr-accent);
            letter-spacing: 0.1em;
            margin-bottom: 1.5rem;
            opacity: 0;
            animation: fadeUp 0.5s 0.1s ease forwards;
        }

        .hero-eyebrow-dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: var(--clr-accent);
            animation: pulse-dot 2s infinite;
        }

        .hero-h1 {
            font-family: var(--font-display);
            font-size: clamp(2.4rem, 4.5vw, 3.8rem);
            font-weight: 800;
            line-height: 1.08;
            letter-spacing: -0.03em;
            color: var(--clr-text);
            margin-bottom: 1.25rem;
            opacity: 0;
            animation: fadeUp 0.5s 0.2s ease forwards;
        }

        .hero-h1 .gradient-text {
            background: linear-gradient(135deg, var(--clr-accent) 0%, var(--clr-blue) 100%);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .hero-sub {
            font-size: 15px;
            color: var(--clr-text2);
            line-height: 1.85;
            max-width: 480px;
            margin-bottom: 2.5rem;
            opacity: 0;
            animation: fadeUp 0.5s 0.3s ease forwards;
        }

        .hero-actions {
            display: flex;
            gap: 0.85rem;
            align-items: center;
            flex-wrap: wrap;
            opacity: 0;
            animation: fadeUp 0.5s 0.4s ease forwards;
        }

        .btn-primary {
            font-family: var(--font-body);
            font-size: 13px;
            font-weight: 600;
            color: #050c14;
            background: var(--clr-accent);
            text-decoration: none;
            padding: 0.7rem 1.6rem;
            border-radius: 6px;
            letter-spacing: 0.01em;
            transition: opacity 0.2s, box-shadow 0.2s;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .btn-primary:hover {
            color: #050c14;
            opacity: 0.85;
            box-shadow: 0 0 24px rgba(0, 230, 118, 0.3);
        }

        .btn-ghost {
            font-family: var(--font-body);
            font-size: 13px;
            font-weight: 500;
            color: var(--clr-text2);
            text-decoration: none;
            padding: 0.7rem 1.4rem;
            border-radius: 6px;
            border: 1px solid var(--clr-border);
            transition: color 0.2s, border-color 0.2s;
        }

        .btn-ghost:hover {
            color: var(--clr-text);
            border-color: rgba(56, 189, 248, 0.35);
        }

        .hero-stats {
            display: flex;
            gap: 2.5rem;
            margin-top: 3rem;
            padding-top: 2rem;
            border-top: 1px solid var(--clr-border);
            opacity: 0;
            animation: fadeUp 0.5s 0.5s ease forwards;
        }

        .h-stat-val {
            font-family: var(--font-mono);
            font-size: 1.6rem;
            font-weight: 700;
            color: var(--clr-text);
            line-height: 1;
            margin-bottom: 4px;
        }

        .h-stat-val .a {
            color: var(--clr-accent);
        }

        .h-stat-lbl {
            font-size: 12px;
            color: var(--clr-text2);
        }

        /* Hero visual */
        .hero-visual {
            display: flex;
            justify-content: center;
            align-items: center;
            opacity: 0;
            animation: fadeIn 0.8s 0.6s ease forwards;
        }

        .hero-img-wrap {
            width: 100%;
            max-width: 400px;
            aspect-ratio: 1;
            position: relative;
        }

        .hero-img-wrap img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            filter: drop-shadow(0 0 40px rgba(0, 230, 118, 0.18));
            animation: floatY 5s ease-in-out infinite;
        }

        /* ── TICKER ── */
        .ticker-bar {
            background: var(--clr-surface);
            border-top: 1px solid var(--clr-border);
            border-bottom: 1px solid var(--clr-border);
            height: 40px;
            display: flex;
            align-items: center;
            overflow: hidden;
            position: relative;
            z-index: 1;
        }

        .ticker-pill {
            flex-shrink: 0;
            font-family: var(--font-mono);
            font-size: 10px;
            font-weight: 700;
            color: #050c14;
            background: var(--clr-accent);
            padding: 0 1rem;
            height: 100%;
            display: flex;
            align-items: center;
            letter-spacing: 0.12em;
        }

        .ticker-scroll {
            overflow: hidden;
            flex: 1;
        }

        .ticker-track {
            display: flex;
            gap: 3rem;
            white-space: nowrap;
            animation: ticker 32s linear infinite;
            padding-left: 2rem;
        }

        .ticker-item {
            font-family: var(--font-mono);
            font-size: 11px;
            color: var(--clr-text2);
            letter-spacing: 0.04em;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .ticker-item::before {
            content: '·';
            color: var(--clr-accent);
            font-size: 16px;
            line-height: 1;
        }

        /* ── STATS BAR ── */
        .stats-bar {
            background: var(--clr-surface);
            border-bottom: 1px solid var(--clr-border);
            position: relative;
            z-index: 1;
        }

        .stats-bar-inner {
            max-width: 1100px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
        }

        .stat-cell {
            padding: 2.25rem 2rem;
            border-right: 1px solid var(--clr-border);
        }

        .stat-cell:last-child {
            border-right: none;
        }

        .stat-num {
            font-family: var(--font-mono);
            font-size: 2.4rem;
            font-weight: 700;
            line-height: 1;
            margin-bottom: 6px;
            color: var(--clr-text);
        }

        .stat-num.green {
            color: var(--clr-accent);
        }

        .stat-num.blue {
            color: var(--clr-blue);
        }

        .stat-num.amber {
            color: #f59e0b;
        }

        .stat-num.purple {
            color: var(--clr-purple);
        }

        .stat-desc {
            font-size: 13px;
            color: var(--clr-text2);
            margin-bottom: 4px;
        }

        .stat-note {
            font-family: var(--font-mono);
            font-size: 10px;
            color: var(--clr-muted);
            letter-spacing: 0.06em;
        }

        /* ── SUBJECTS ── */
        .subjects-section {
            padding: 6rem 2.5rem;
            position: relative;
            z-index: 1;
        }

        .subjects-inner {
            max-width: 1100px;
            margin: 0 auto;
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            margin-bottom: 2.5rem;
        }

        .subjects-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1px;
            background: var(--clr-border);
            border-radius: 10px;
            overflow: hidden;
        }

        .subj-card {
            background: var(--clr-surface);
            padding: 2rem 1.75rem 2.5rem;
            text-decoration: none;
            display: flex;
            flex-direction: column;
            gap: 1.25rem;
            position: relative;
            overflow: hidden;
            transition: background 0.25s;
        }

        .subj-card:hover {
            background: var(--clr-surface2);
        }

        .subj-card::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 2px;
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.3s ease;
        }

        .subj-card:hover::after {
            transform: scaleX(1);
        }

        .subj-card.c-sci::after {
            background: var(--clr-accent);
        }

        .subj-card.c-tech::after {
            background: var(--clr-blue);
        }

        .subj-card.c-eng::after {
            background: #f59e0b;
        }

        .subj-card.c-math::after {
            background: var(--clr-purple);
        }

        .subj-icon {
            width: 44px;
            height: 44px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
        }

        .c-sci .subj-icon {
            background: rgba(0, 230, 118, 0.1);
            color: var(--clr-accent);
        }

        .c-tech .subj-icon {
            background: rgba(56, 189, 248, 0.1);
            color: var(--clr-blue);
        }

        .c-eng .subj-icon {
            background: rgba(245, 158, 11, 0.1);
            color: #f59e0b;
        }

        .c-math .subj-icon {
            background: rgba(167, 139, 250, 0.1);
            color: var(--clr-purple);
        }

        .subj-title {
            font-family: var(--font-display);
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--clr-text);
            margin-bottom: 0.4rem;
        }

        .subj-desc {
            font-size: 13px;
            color: var(--clr-text2);
            line-height: 1.65;
        }

        .subj-link {
            font-family: var(--font-mono);
            font-size: 11px;
            color: var(--clr-muted);
            letter-spacing: 0.05em;
            transition: color 0.2s;
            margin-top: auto;
        }

        .subj-card:hover .subj-link {
            color: var(--clr-text2);
        }

        /* ── WHY ── */
        .why-section {
            padding: 6rem 2.5rem;
            background: var(--clr-bg2);
            border-top: 1px solid var(--clr-border);
            position: relative;
            z-index: 1;
        }

        .why-inner {
            max-width: 1100px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 320px 1fr;
            gap: 5rem;
            align-items: start;
        }

        .why-sticky {
            position: sticky;
            top: calc(var(--nav-h) + 2rem);
        }

        .why-sticky p {
            font-size: 14px;
            color: var(--clr-text2);
            line-height: 1.8;
            margin-top: 0.75rem;
        }

        .why-list {
            display: flex;
            flex-direction: column;
        }

        .why-item {
            display: grid;
            grid-template-columns: 36px 1fr;
            gap: 1.25rem;
            padding: 1.75rem 0;
            border-bottom: 1px solid var(--clr-border);
            transition: border-color 0.25s;
        }

        .why-item:first-child {
            border-top: 1px solid var(--clr-border);
        }

        .why-item:hover {
            border-color: rgba(0, 230, 118, 0.2);
        }

        .why-n {
            font-family: var(--font-mono);
            font-size: 11px;
            color: var(--clr-accent);
            opacity: 0.45;
            padding-top: 3px;
            font-weight: 600;
        }

        .why-item h3 {
            font-family: var(--font-display);
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--clr-text);
            margin-bottom: 0.45rem;
        }

        .why-item p {
            font-size: 13.5px;
            color: var(--clr-text2);
            line-height: 1.75;
        }

        .why-chip {
            display: inline-block;
            margin-top: 0.6rem;
            font-family: var(--font-mono);
            font-size: 10px;
            color: var(--clr-blue);
            background: rgba(56, 189, 248, 0.07);
            border: 1px solid rgba(56, 189, 248, 0.18);
            padding: 0.15rem 0.6rem;
            border-radius: 100px;
            letter-spacing: 0.06em;
        }

        /* ── PROGRAMS ── */
        .programs-section {
            padding: 6rem 2.5rem;
            position: relative;
            z-index: 1;
        }

        .programs-inner {
            max-width: 1100px;
            margin: 0 auto;
        }

        .programs-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1.25rem;
            margin-top: 2.5rem;
        }

        .prog-card {
            background: var(--clr-surface);
            border: 1px solid var(--clr-border);
            border-radius: 10px;
            padding: 1.75rem;
            transition: border-color 0.25s, transform 0.25s;
        }

        .prog-card:hover {
            border-color: rgba(0, 230, 118, 0.22);
            transform: translateY(-3px);
        }

        .prog-badge {
            font-family: var(--font-mono);
            font-size: 10px;
            font-weight: 600;
            color: var(--clr-accent);
            letter-spacing: 0.15em;
            text-transform: uppercase;
            margin-bottom: 0.85rem;
        }

        .prog-card h3 {
            font-family: var(--font-display);
            font-size: 1.05rem;
            font-weight: 700;
            color: var(--clr-text);
            margin-bottom: 0.65rem;
            letter-spacing: -0.01em;
        }

        .prog-card p {
            font-size: 13px;
            color: var(--clr-text2);
            line-height: 1.75;
        }

        .prog-meta {
            display: flex;
            gap: 0.75rem;
            margin-top: 1.25rem;
            padding-top: 1.25rem;
            border-top: 1px solid var(--clr-border);
            flex-wrap: wrap;
        }

        .prog-meta-item {
            font-family: var(--font-mono);
            font-size: 10px;
            color: var(--clr-muted);
            display: flex;
            flex-direction: column;
            gap: 2px;
        }

        .prog-meta-item strong {
            font-size: 12px;
            color: var(--clr-text2);
            font-weight: 500;
        }

        /* ── CTA ── */
        .cta-section {
            padding: 6rem 2.5rem;
            background: var(--clr-bg2);
            border-top: 1px solid var(--clr-border);
            position: relative;
            z-index: 1;
        }

        .cta-inner {
            max-width: 1100px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 5rem;
            align-items: center;
        }

        .cta-card {
            background: var(--clr-surface);
            border: 1px solid var(--clr-border);
            border-radius: 10px;
            padding: 2.5rem;
        }

        .cta-card-title {
            font-family: var(--font-display);
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--clr-text);
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .cta-card-title span {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: var(--clr-accent);
            display: inline-block;
            animation: pulse-dot 2s infinite;
        }

        .cta-list {
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 0;
        }

        .cta-list li {
            font-size: 13.5px;
            color: var(--clr-text2);
            padding: 0.85rem 0;
            border-bottom: 1px solid var(--clr-border);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .cta-list li:last-child {
            border-bottom: none;
        }

        .cta-list .val {
            font-family: var(--font-mono);
            font-size: 12px;
            color: var(--clr-accent);
            font-weight: 600;
        }

        .cta-text p {
            font-size: 15px;
            color: var(--clr-text2);
            line-height: 1.8;
            margin-bottom: 1.75rem;
        }

        .cta-checklist {
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 0.65rem;
            margin-bottom: 2rem;
        }

        .cta-checklist li {
            font-size: 13.5px;
            color: var(--clr-text2);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .cta-checklist li::before {
            content: '✓';
            color: var(--clr-accent);
            font-family: var(--font-mono);
            font-size: 12px;
            font-weight: 700;
            flex-shrink: 0;
        }

        /* ── PARTNERS ── */
        .partners-section {
            padding: 3rem 2.5rem;
            background: var(--clr-surface);
            border-top: 1px solid var(--clr-border);
            position: relative;
            z-index: 1;
        }

        .partners-inner {
            max-width: 1100px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            gap: 2.5rem;
        }

        .partners-lbl {
            font-family: var(--font-mono);
            font-size: 10px;
            font-weight: 600;
            color: var(--clr-muted);
            letter-spacing: 0.18em;
            text-transform: uppercase;
            white-space: nowrap;
        }

        .partners-div {
            width: 1px;
            height: 32px;
            background: var(--clr-border);
            flex-shrink: 0;
        }

        .partners-row {
            display: flex;
            gap: 2rem;
            align-items: center;
            flex-wrap: wrap;
        }

        .partner-item {
            font-family: var(--font-mono);
            font-size: 12px;
            font-weight: 600;
            color: var(--clr-muted);
            letter-spacing: 0.06em;
            text-transform: uppercase;
            transition: color 0.2s;
            cursor: default;
        }

        .partner-item:hover {
            color: var(--clr-text2);
        }

        /* ── KEYFRAMES ── */
        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes floatY {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-12px);
            }
        }

        @keyframes ticker {
            from {
                transform: translateX(0);
            }

            to {
                transform: translateX(-50%);
            }
        }

        /* ── RESPONSIVE ── */
        @media (max-width: 1024px) {

            .hero-inner,
            .why-inner,
            .cta-inner {
                grid-template-columns: 1fr;
                gap: 3rem;
            }

            .subjects-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .stats-bar-inner {
                grid-template-columns: repeat(2, 1fr);
            }

            .programs-grid {
                grid-template-columns: 1fr;
            }

            .why-sticky {
                position: static;
            }

            .hero-visual {
                display: none;
            }
        }

        @media (max-width: 640px) {
            .hero {
                padding: 3rem 1.5rem;
            }

            .subjects-grid {
                grid-template-columns: 1fr;
            }

            .stats-bar-inner {
                grid-template-columns: 1fr 1fr;
            }

            .hero-stats {
                flex-direction: column;
                gap: 1.25rem;
            }

            .section-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }

            .partners-inner {
                flex-wrap: wrap;
            }
        }
    </style>

    <!-- ══ HERO ══ -->
    <section class="hero">
        <div class="hero-inner">
            <div class="hero-left">
                <div class="hero-eyebrow">
                    <div class="hero-eyebrow-dot"></div>
                    Cambodia's leading STEM platform
                </div>

                <h1 class="hero-h1">
                    Advancing Cambodia's<br>
                    <span class="gradient-text">Future Through STEM</span>
                </h1>

                <p class="hero-sub">
                    STEMBODIAN equips Cambodian students with critical skills through high-impact
                    educational programs — driving sustainable progress across science, technology,
                    engineering, and mathematics.
                </p>

                <div class="hero-actions">
                    <a href="/dashboard" class="btn-primary">Start Learning →</a>
                    <a href="/aboutus" class="btn-ghost">About Us</a>
                </div>

                <div class="hero-stats">
                    <div>
                        <div class="h-stat-val">12<span class="a">K+</span></div>
                        <div class="h-stat-lbl">Students enrolled</div>
                    </div>
                    <div>
                        <div class="h-stat-val">4</div>
                        <div class="h-stat-lbl">STEM disciplines</div>
                    </div>
                    <div>
                        <div class="h-stat-val">98<span class="a">%</span></div>
                        <div class="h-stat-lbl">Satisfaction rate</div>
                    </div>
                </div>
            </div>

            <div class="hero-visual">
                <div class="hero-img-wrap">
                    <img src="https://stemcambodia.ngo/wp-content/uploads/2025/06/STEM-Mark.png" alt="STEM Cambodia">
                </div>
            </div>
        </div>
    </section>

    <!-- ══ TICKER ══ -->
    <div class="ticker-bar">
        <div class="ticker-pill">LIVE</div>
        <div class="ticker-scroll">
            <div class="ticker-track">
                <span class="ticker-item">New: Robotics curriculum launched</span>
                <span class="ticker-item">Science olympiad registrations open</span>
                <span class="ticker-item">AI literacy workshop — Phnom Penh</span>
                <span class="ticker-item">Coding bootcamp applications closing soon</span>
                <span class="ticker-item">Partnership with Royal University of Phnom Penh</span>
                <span class="ticker-item">Mathematics competition results published</span>
                <span class="ticker-item">New: Robotics curriculum launched</span>
                <span class="ticker-item">Science olympiad registrations open</span>
                <span class="ticker-item">AI literacy workshop — Phnom Penh</span>
                <span class="ticker-item">Coding bootcamp applications closing soon</span>
                <span class="ticker-item">Partnership with Royal University of Phnom Penh</span>
                <span class="ticker-item">Mathematics competition results published</span>
            </div>
        </div>
    </div>

    <!-- ══ STATS BAR ══ -->
    <div class="stats-bar">
        <div class="stats-bar-inner">
            <div class="stat-cell">
                <div class="stat-num green">12,000</div>
                <div class="stat-desc">Students reached across Cambodia</div>
                <div class="stat-note">↑ 34% YoY growth</div>
            </div>
            <div class="stat-cell">
                <div class="stat-num blue">200+</div>
                <div class="stat-desc">Schools partnered nationwide</div>
                <div class="stat-note">25 provinces covered</div>
            </div>
            <div class="stat-cell">
                <div class="stat-num amber">500+</div>
                <div class="stat-desc">Interactive learning modules</div>
                <div class="stat-note">Curriculum-aligned content</div>
            </div>
            <div class="stat-cell">
                <div class="stat-num purple">98%</div>
                <div class="stat-desc">Student satisfaction score</div>
                <div class="stat-note">Based on 2024 survey</div>
            </div>
        </div>
    </div>

    <!-- ══ SUBJECTS ══ -->
    <section class="subjects-section">
        <div class="subjects-inner">
            <div class="section-header">
                <div>
                    <span class="section-label">Explore</span>
                    <h2 class="section-title">Four pillars of <span class="accent">STEM</span></h2>
                </div>
                <a href="/dashboard" class="btn-ghost">View all →</a>
            </div>

            <div class="subjects-grid">
                <a class="subj-card c-sci" href="/science">
                    <div class="subj-icon">
                        <span class="material-symbols-outlined">science</span>
                    </div>
                    <div>
                        <div class="subj-title">Science</div>
                        <p class="subj-desc">Explore biology, chemistry, physics, and earth science through experiments and
                            real-world phenomena.</p>
                    </div>
                    <span class="subj-link">Explore Science →</span>
                </a>

                <a class="subj-card c-tech" href="/technology">
                    <div class="subj-icon">
                        <span class="material-symbols-outlined">devices</span>
                    </div>
                    <div>
                        <div class="subj-title">Technology</div>
                        <p class="subj-desc">Learn programming, AI, data science, and digital literacy for the modern
                            tech-driven economy.</p>
                    </div>
                    <span class="subj-link">Explore Technology →</span>
                </a>

                <a class="subj-card c-eng" href="/engineering">
                    <div class="subj-icon">
                        <span class="material-symbols-outlined">precision_manufacturing</span>
                    </div>
                    <div>
                        <div class="subj-title">Engineering</div>
                        <p class="subj-desc">Design, build, and test. From civil structures to robotics — apply science to
                            solve real problems.</p>
                    </div>
                    <span class="subj-link">Explore Engineering →</span>
                </a>

                <a class="subj-card c-math" href="/mathematics">
                    <div class="subj-icon">
                        <span class="material-symbols-outlined">calculate</span>
                    </div>
                    <div>
                        <div class="subj-title">Mathematics</div>
                        <p class="subj-desc">From algebra and geometry to calculus and statistics — the universal language
                            of all STEM disciplines.</p>
                    </div>
                    <span class="subj-link">Explore Mathematics →</span>
                </a>
            </div>
        </div>
    </section>

    <!-- ══ WHY STEM ══ -->
    <section class="why-section">
        <div class="why-inner">
            <div class="why-sticky">
                <span class="section-label">Why it matters</span>
                <h2 class="section-title">Why choose <span class="accent">STEM?</span></h2>
                <p>STEM disciplines are the backbone of Cambodia's fastest-growing industries — from digital banking to
                    agritech.</p>
            </div>

            <div class="why-list">
                <div class="why-item">
                    <div class="why-n">01</div>
                    <div>
                        <h3>Critical Thinking</h3>
                        <p>STEM teaches you to break down complex problems, evaluate evidence, and arrive at logical
                            conclusions — skills valued in every career and life situation.</p>
                        <span class="why-chip">Problem Solving</span>
                    </div>
                </div>
                <div class="why-item">
                    <div class="why-n">02</div>
                    <div>
                        <h3>Future-Ready Careers</h3>
                        <p>By 2030, over 85% of the fastest-growing jobs in Southeast Asia will require STEM competencies.
                            Start building your edge now.</p>
                        <span class="why-chip">Career Growth</span>
                    </div>
                </div>
                <div class="why-item">
                    <div class="why-n">03</div>
                    <div>
                        <h3>Innovation Engine</h3>
                        <p>Empower the next generation to build better technology, sustainable agriculture, clean energy
                            solutions, and world-class software — rooted in Cambodian context.</p>
                        <span class="why-chip">Tech Innovation</span>
                    </div>
                </div>
                <div class="why-item">
                    <div class="why-n">04</div>
                    <div>
                        <h3>National Development</h3>
                        <p>Cambodia's Vision 2050 relies on a tech-literate workforce. STEM education is a direct investment
                            in the country's digital transformation.</p>
                        <span class="why-chip">Cambodia 2050</span>
                    </div>
                </div>
                <div class="why-item">
                    <div class="why-n">05</div>
                    <div>
                        <h3>Collaborative Mindset</h3>
                        <p>Science and engineering are team sports. STEM education builds the communication, teamwork, and
                            cross-disciplinary skills modern workplaces demand.</p>
                        <span class="why-chip">Teamwork</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ══ PROGRAMS ══ -->
    <section class="programs-section">
        <div class="programs-inner">
            <span class="section-label">Programs</span>
            <h2 class="section-title">What we <span class="accent">offer</span></h2>

            <div class="programs-grid">
                <div class="prog-card">
                    <div class="prog-badge">Curriculum</div>
                    <h3>School Integration Program</h3>
                    <p>Fully-aligned STEM curricula embedded into Cambodia's national school system, with trained teachers
                        and localized content for grades 7–12.</p>
                    <div class="prog-meta">
                        <div class="prog-meta-item"><span>Grade level</span><strong>7 – 12</strong></div>
                        <div class="prog-meta-item"><span>Mode</span><strong>Hybrid</strong></div>
                        <div class="prog-meta-item"><span>Duration</span><strong>Year-round</strong></div>
                    </div>
                </div>

                <div class="prog-card">
                    <div class="prog-badge">Workshop</div>
                    <h3>Hands-On Innovation Labs</h3>
                    <p>Weekend and holiday programs where students build robots, design apps, run chemistry experiments, and
                        present their work to industry mentors.</p>
                    <div class="prog-meta">
                        <div class="prog-meta-item"><span>Frequency</span><strong>Bi-monthly</strong></div>
                        <div class="prog-meta-item"><span>Mode</span><strong>In-person</strong></div>
                        <div class="prog-meta-item"><span>Ages</span><strong>12 – 18</strong></div>
                    </div>
                </div>

                <div class="prog-card">
                    <div class="prog-badge">Digital</div>
                    <h3>Online Learning Platform</h3>
                    <p>Self-paced modules, video lectures, quizzes, and project-based assessments — available 24/7 in Khmer
                        and English for any device.</p>
                    <div class="prog-meta">
                        <div class="prog-meta-item"><span>Access</span><strong>Free</strong></div>
                        <div class="prog-meta-item"><span>Language</span><strong>KH / EN</strong></div>
                        <div class="prog-meta-item"><span>Modules</span><strong>500+</strong></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ══ CTA ══ -->
    <section class="cta-section">
        <div class="cta-inner">
            <div class="cta-card">
                <div class="cta-card-title">
                    <span></span> Platform Status
                </div>
                <ul class="cta-list">
                    <li>Active students <span class="val">12,047</span></li>
                    <li>Modules available <span class="val">523</span></li>
                    <li>Schools connected <span class="val">200+</span></li>
                    <li>Registration <span class="val">FREE</span></li>
                    <li>Languages <span class="val">KH / EN</span></li>
                </ul>
            </div>

            <div class="cta-text">
                <span class="section-label">Join today</span>
                <h2 class="section-title">Ready to build Cambodia's <span class="accent">future?</span></h2>
                <p>Whether you're a student, teacher, or school — STEMBODIAN has everything you need to get started today.
                </p>
                <ul class="cta-checklist">
                    <li>Free access to 500+ learning modules</li>
                    <li>Available in Khmer and English</li>
                    <li>Curriculum-aligned with national standards</li>
                    <li>Mentors and live workshops included</li>
                </ul>
                <div style="display: flex; gap: 0.85rem; flex-wrap: wrap;">
                    <a href="/signup" class="btn-primary">Create Free Account</a>
                    <a href="/news" class="btn-ghost">See Latest News</a>
                </div>
            </div>
        </div>
    </section>

    <!-- ══ PARTNERS ══ -->
    <section class="partners-section">
        <div class="partners-inner">
            <div class="partners-lbl">Trusted by</div>
            <div class="partners-div"></div>
            <div class="partners-row">
                <span class="partner-item">Ministry of Education</span>
                <span class="partner-item">RUPP</span>
                <span class="partner-item">IFL</span>
                <span class="partner-item">USAID</span>
                <span class="partner-item">UNESCO</span>
                <span class="partner-item">Smart Axiata</span>
            </div>
        </div>
    </section>

@endsection

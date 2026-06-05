@extends('layout')
@section('title', 'STEM Cambodia - Home')
@section('content')

    <style>
        /* ── KEYFRAMES ── */
        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(28px);
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

        @keyframes slideWord {
            0% {
                opacity: 0;
                transform: translateY(100%);
            }

            12% {
                opacity: 1;
                transform: translateY(0);
            }

            30% {
                opacity: 1;
                transform: translateY(0);
            }

            42% {
                opacity: 0;
                transform: translateY(-100%);
            }

            100% {
                opacity: 0;
                transform: translateY(-100%);
            }
        }

        @keyframes lineGrow {
            from {
                transform: scaleX(0);
            }

            to {
                transform: scaleX(1);
            }
        }

        @keyframes countUp {
            from {
                opacity: 0;
                transform: translateY(12px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes orbFloat {

            0%,
            100% {
                transform: translate(-50%, -50%) scale(1);
            }

            50% {
                transform: translate(-50%, -50%) scale(1.08);
            }
        }

        @keyframes scanLine {
            0% {
                top: 0;
                opacity: 1;
            }

            90% {
                top: 100%;
                opacity: 1;
            }

            100% {
                top: 100%;
                opacity: 0;
            }
        }

        @keyframes blinkCaret {

            0%,
            100% {
                opacity: 1;
            }

            50% {
                opacity: 0;
            }
        }

        @keyframes cardReveal {
            from {
                opacity: 0;
                transform: translateY(32px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes shimmer {
            0% {
                background-position: -200% center;
            }

            100% {
                background-position: 200% center;
            }
        }

        /* ── SHARED ── */
        .section-label {
            font-family: var(--font-mono);
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 0.25em;
            text-transform: uppercase;
            color: var(--clr-accent);
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 1rem;
        }

        .section-label::before {
            content: '';
            width: 20px;
            height: 1px;
            background: var(--clr-accent);
        }

        .section-title {
            font-family: var(--font-display);
            font-size: clamp(2rem, 4vw, 3rem);
            font-weight: 800;
            color: var(--clr-text);
            line-height: 1.1;
            letter-spacing: -0.02em;
            margin-bottom: 1rem;
        }

        .section-title .accent {
            color: var(--clr-accent);
        }

        /* ── HERO ── */
        .hero {
            position: relative;
            min-height: calc(100svh - var(--nav-h));
            display: flex;
            align-items: center;
            padding: 5rem 2.5rem 5rem;
            overflow: hidden;
            z-index: 1;
        }

        .hero-orb {
            position: absolute;
            width: 700px;
            height: 700px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(0, 230, 118, 0.07) 0%, transparent 70%);
            top: 50%;
            right: -15%;
            transform: translate(-50%, -50%);
            animation: orbFloat 8s ease-in-out infinite;
            pointer-events: none;
        }

        .hero-orb-2 {
            position: absolute;
            width: 400px;
            height: 400px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(56, 189, 248, 0.05) 0%, transparent 70%);
            bottom: 10%;
            left: 5%;
            pointer-events: none;
        }

        .hero-inner {
            max-width: 1200px;
            margin: 0 auto;
            width: 100%;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 5rem;
            align-items: center;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(0, 230, 118, 0.08);
            border: 1px solid rgba(0, 230, 118, 0.25);
            border-radius: 100px;
            padding: 0.35rem 1rem 0.35rem 0.6rem;
            font-family: var(--font-mono);
            font-size: 11px;
            color: var(--clr-accent);
            letter-spacing: 0.08em;
            margin-bottom: 1.5rem;
            animation: fadeUp 0.6s ease both;
        }

        .hero-badge-dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: var(--clr-accent);
            animation: pulse-dot 2s infinite;
        }

        .hero-h1 {
            font-family: var(--font-display);
            font-size: clamp(2.8rem, 5vw, 4.5rem);
            font-weight: 800;
            line-height: 1.05;
            letter-spacing: -0.03em;
            color: var(--clr-text);
            margin-bottom: 1rem;
            animation: fadeUp 0.6s 0.1s ease both;
        }

        .hero-h1 .line2 {
            display: block;
            color: transparent;
            background: linear-gradient(90deg, var(--clr-accent), var(--clr-blue));
            -webkit-background-clip: text;
            background-clip: text;
        }

        .hero-word-carousel {
            position: relative;
            display: inline-block;
            height: 1.1em;
            overflow: hidden;
            vertical-align: bottom;
            min-width: 320px;
        }

        .hero-word {
            position: absolute;
            left: 0;
            top: 0;
            display: block;
            color: transparent;
            background: linear-gradient(90deg, var(--clr-accent), var(--clr-blue));
            -webkit-background-clip: text;
            background-clip: text;
            white-space: nowrap;
            animation: slideWord 9s infinite;
        }

        .hero-word:nth-child(2) {
            animation-delay: 3s;
        }

        .hero-word:nth-child(3) {
            animation-delay: 6s;
        }

        .hero-sub {
            font-size: 16px;
            color: var(--clr-text2);
            line-height: 1.8;
            max-width: 520px;
            margin-bottom: 2.5rem;
            animation: fadeUp 0.6s 0.2s ease both;
        }

        .hero-cta-row {
            display: flex;
            gap: 1rem;
            align-items: center;
            animation: fadeUp 0.6s 0.3s ease both;
        }

        .btn-primary {
            font-family: var(--font-mono);
            font-size: 13px;
            font-weight: 700;
            color: #050c14;
            background: var(--clr-accent);
            text-decoration: none;
            padding: 0.75rem 1.75rem;
            border-radius: 4px;
            letter-spacing: 0.06em;
            text-transform: uppercase;
            transition: box-shadow 0.2s, opacity 0.2s;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-primary:hover {
            color: #050c14;
            opacity: 0.88;
            box-shadow: 0 0 30px var(--clr-accent-glow);
        }

        .btn-secondary {
            font-family: var(--font-mono);
            font-size: 13px;
            font-weight: 500;
            color: var(--clr-text2);
            text-decoration: none;
            padding: 0.75rem 1.5rem;
            border-radius: 4px;
            border: 1px solid var(--clr-border);
            letter-spacing: 0.04em;
            transition: color 0.2s, border-color 0.2s;
        }

        .btn-secondary:hover {
            color: var(--clr-text);
            border-color: rgba(56, 189, 248, 0.3);
        }

        /* Hero visual */
        .hero-visual {
            position: relative;
            animation: fadeIn 0.8s 0.5s ease both;
        }

        .hero-diagram {
            position: relative;
            width: 100%;
            aspect-ratio: 1;
            max-width: 480px;
            margin: 0 auto;
        }

        .hero-diagram-img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            filter: drop-shadow(0 0 40px rgba(0, 230, 118, 0.2));
            animation: orbFloat 6s ease-in-out infinite;
        }

        .hero-stats-row {
            display: flex;
            gap: 2rem;
            margin-top: 2.5rem;
            animation: fadeUp 0.6s 0.4s ease both;
        }

        .hero-stat {
            border-left: 2px solid var(--clr-accent);
            padding-left: 1rem;
        }

        .hero-stat .val {
            font-family: var(--font-mono);
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--clr-text);
            line-height: 1;
        }

        .hero-stat .val .accent {
            color: var(--clr-accent);
        }

        .hero-stat .lbl {
            font-size: 12px;
            color: var(--clr-text2);
            margin-top: 4px;
            letter-spacing: 0.04em;
        }

        /* ── TICKER ── */
        .ticker-bar {
            position: relative;
            z-index: 1;
            background: var(--clr-surface);
            border-top: 1px solid var(--clr-border);
            border-bottom: 1px solid var(--clr-border);
            overflow: hidden;
            height: 44px;
            display: flex;
            align-items: center;
        }

        .ticker-label {
            flex-shrink: 0;
            font-family: var(--font-mono);
            font-size: 10px;
            font-weight: 700;
            color: #050c14;
            background: var(--clr-accent);
            padding: 0 1.2rem;
            height: 100%;
            display: flex;
            align-items: center;
            letter-spacing: 0.12em;
            z-index: 2;
        }

        .ticker-track {
            display: flex;
            gap: 3rem;
            animation: ticker 30s linear infinite;
            white-space: nowrap;
            padding-left: 2rem;
        }

        .ticker-item {
            font-family: var(--font-mono);
            font-size: 12px;
            color: var(--clr-text2);
            letter-spacing: 0.06em;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .ticker-item::before {
            content: '//';
            color: var(--clr-accent);
            opacity: 0.6;
        }

        @keyframes ticker {
            from {
                transform: translateX(0);
            }

            to {
                transform: translateX(-50%);
            }
        }

        /* ── WHY STEM ── */
        .why-section {
            position: relative;
            z-index: 1;
            padding: 7rem 2.5rem;
            background: var(--clr-bg2);
            border-top: 1px solid var(--clr-border);
        }

        .why-inner {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1fr 2fr;
            gap: 6rem;
            align-items: start;
        }

        .why-left {
            position: sticky;
            top: calc(var(--nav-h) + 2rem);
        }

        .why-reason {
            display: grid;
            grid-template-columns: 48px 1fr;
            gap: 1.5rem;
            padding: 2rem 0;
            border-bottom: 1px solid var(--clr-border);
            transition: border-color 0.3s;
        }

        .why-reason:hover {
            border-color: rgba(0, 230, 118, 0.25);
        }

        .why-reason:first-child {
            border-top: 1px solid var(--clr-border);
        }

        .why-num {
            font-family: var(--font-mono);
            font-size: 11px;
            font-weight: 700;
            color: var(--clr-accent);
            opacity: 0.5;
            padding-top: 4px;
        }

        .why-body h3 {
            font-family: var(--font-display);
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--clr-text);
            margin-bottom: 0.5rem;
            letter-spacing: -0.01em;
        }

        .why-body p {
            font-size: 14px;
            color: var(--clr-text2);
            line-height: 1.75;
        }

        .why-tag {
            display: inline-block;
            margin-top: 0.75rem;
            font-family: var(--font-mono);
            font-size: 10px;
            color: var(--clr-blue);
            background: rgba(56, 189, 248, 0.08);
            border: 1px solid rgba(56, 189, 248, 0.2);
            padding: 0.2rem 0.65rem;
            border-radius: 100px;
            letter-spacing: 0.08em;
        }

        /* ── SUBJECTS ── */
        .subjects-section {
            position: relative;
            z-index: 1;
            padding: 7rem 2.5rem;
        }

        .subjects-inner {
            max-width: 1200px;
            margin: 0 auto;
        }

        .subjects-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            margin-bottom: 3rem;
        }

        .subjects-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1.5px;
            background: var(--clr-border);
            border-radius: 12px;
            overflow: hidden;
        }

        .subject-card {
            position: relative;
            background: var(--clr-surface);
            padding: 2.5rem 2rem;
            text-decoration: none;
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
            overflow: hidden;
            transition: background 0.3s;
            min-height: 220px;
        }

        .subject-card:hover {
            background: var(--clr-surface2);
        }

        .subject-card::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 2px;
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.35s ease;
        }

        .subject-card:hover::after {
            transform: scaleX(1);
        }

        .subject-card.s-science::after {
            background: var(--clr-accent);
        }

        .subject-card.s-tech::after {
            background: var(--clr-blue);
        }

        .subject-card.s-eng::after {
            background: #f59e0b;
        }

        .subject-card.s-math::after {
            background: var(--clr-purple);
        }

        .subject-icon {
            width: 48px;
            height: 48px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            transition: transform 0.3s;
        }

        .subject-card:hover .subject-icon {
            transform: scale(1.1);
        }

        .subject-card.s-science .subject-icon {
            background: rgba(0, 230, 118, 0.1);
            color: var(--clr-accent);
        }

        .subject-card.s-tech .subject-icon {
            background: rgba(56, 189, 248, 0.1);
            color: var(--clr-blue);
        }

        .subject-card.s-eng .subject-icon {
            background: rgba(245, 158, 11, 0.1);
            color: #f59e0b;
        }

        .subject-card.s-math .subject-icon {
            background: rgba(167, 139, 250, 0.1);
            color: var(--clr-purple);
        }

        .subject-title {
            font-family: var(--font-display);
            font-size: 1.2rem;
            font-weight: 700;
            color: var(--clr-text);
            letter-spacing: -0.01em;
        }

        .subject-desc {
            font-size: 13px;
            color: var(--clr-text2);
            line-height: 1.65;
        }

        .subject-arrow {
            position: absolute;
            right: 1.5rem;
            bottom: 1.5rem;
            font-size: 18px;
            color: var(--clr-muted);
            transition: color 0.3s, transform 0.3s;
        }

        .subject-card:hover .subject-arrow {
            color: var(--clr-text);
            transform: translate(3px, -3px);
        }

        /* ── IMPACT STATS ── */
        .stats-section {
            position: relative;
            z-index: 1;
            padding: 5rem 2.5rem;
            background: var(--clr-surface);
            border-top: 1px solid var(--clr-border);
            border-bottom: 1px solid var(--clr-border);
        }

        .stats-inner {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 0;
        }

        .stat-block {
            padding: 2rem 2.5rem;
            border-right: 1px solid var(--clr-border);
        }

        .stat-block:last-child {
            border-right: none;
        }

        .stat-val {
            font-family: var(--font-mono);
            font-size: 3rem;
            font-weight: 700;
            color: var(--clr-text);
            line-height: 1;
            margin-bottom: 0.5rem;
            animation: countUp 0.6s ease both;
        }

        .stat-val .accent-green {
            color: var(--clr-accent);
        }

        .stat-val .accent-blue {
            color: var(--clr-blue);
        }

        .stat-val .accent-amber {
            color: #f59e0b;
        }

        .stat-val .accent-purple {
            color: var(--clr-purple);
        }

        .stat-lbl {
            font-size: 13px;
            color: var(--clr-text2);
            letter-spacing: 0.02em;
        }

        .stat-sub {
            font-family: var(--font-mono);
            font-size: 10px;
            color: var(--clr-muted);
            letter-spacing: 0.08em;
            margin-top: 4px;
        }

        /* ── PROGRAMS ── */
        .programs-section {
            position: relative;
            z-index: 1;
            padding: 7rem 2.5rem;
            background: var(--clr-bg2);
        }

        .programs-inner {
            max-width: 1200px;
            margin: 0 auto;
        }

        .programs-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1.5rem;
            margin-top: 3rem;
        }

        .program-card {
            background: var(--clr-surface);
            border: 1px solid var(--clr-border);
            border-radius: 10px;
            padding: 2rem;
            transition: border-color 0.3s, transform 0.3s;
            animation: cardReveal 0.5s ease both;
        }

        .program-card:hover {
            border-color: rgba(0, 230, 118, 0.25);
            transform: translateY(-4px);
        }

        .program-card:nth-child(2) {
            animation-delay: 0.1s;
        }

        .program-card:nth-child(3) {
            animation-delay: 0.2s;
        }

        .prog-tag {
            font-family: var(--font-mono);
            font-size: 10px;
            font-weight: 700;
            color: var(--clr-accent);
            letter-spacing: 0.15em;
            text-transform: uppercase;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .prog-tag::before {
            content: '';
            width: 3px;
            height: 3px;
            border-radius: 50%;
            background: var(--clr-accent);
        }

        .program-card h3 {
            font-family: var(--font-display);
            font-size: 1.15rem;
            font-weight: 700;
            color: var(--clr-text);
            margin-bottom: 0.75rem;
            letter-spacing: -0.01em;
        }

        .program-card p {
            font-size: 13.5px;
            color: var(--clr-text2);
            line-height: 1.75;
        }

        .prog-meta {
            display: flex;
            gap: 1rem;
            margin-top: 1.25rem;
            padding-top: 1.25rem;
            border-top: 1px solid var(--clr-border);
        }

        .prog-meta-item {
            font-family: var(--font-mono);
            font-size: 11px;
            color: var(--clr-muted);
            display: flex;
            flex-direction: column;
            gap: 2px;
        }

        .prog-meta-item strong {
            font-size: 13px;
            color: var(--clr-text2);
            font-weight: 500;
        }

        /* ── TERMINAL / CTA ── */
        .cta-section {
            position: relative;
            z-index: 1;
            padding: 7rem 2.5rem;
            overflow: hidden;
        }

        .cta-inner {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 6rem;
            align-items: center;
        }

        .terminal {
            background: #020810;
            border: 1px solid var(--clr-border);
            border-radius: 10px;
            overflow: hidden;
            font-family: var(--font-mono);
            position: relative;
        }

        .terminal-bar {
            background: var(--clr-surface);
            padding: 0.75rem 1rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            border-bottom: 1px solid var(--clr-border);
        }

        .terminal-dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
        }

        .terminal-dot.red {
            background: #ef4444;
        }

        .terminal-dot.amber {
            background: #f59e0b;
        }

        .terminal-dot.green {
            background: var(--clr-accent);
        }

        .terminal-title {
            flex: 1;
            text-align: center;
            font-size: 11px;
            color: var(--clr-muted);
            letter-spacing: 0.06em;
        }

        .terminal-body {
            padding: 1.5rem;
            font-size: 13px;
            line-height: 2;
        }

        .t-line {
            display: flex;
            gap: 0.75rem;
        }

        .t-prompt {
            color: var(--clr-accent);
            flex-shrink: 0;
        }

        .t-cmd {
            color: var(--clr-text);
        }

        .t-output {
            color: var(--clr-text2);
            padding-left: 1.5rem;
        }

        .t-out-accent {
            color: var(--clr-accent);
        }

        .t-out-blue {
            color: var(--clr-blue);
        }

        .t-out-amber {
            color: #f59e0b;
        }

        .t-cursor {
            display: inline-block;
            width: 8px;
            height: 15px;
            background: var(--clr-accent);
            animation: blinkCaret 1s infinite;
            vertical-align: -3px;
            margin-left: 2px;
        }

        .cta-text .section-title {
            margin-bottom: 1.25rem;
        }

        .cta-text p {
            font-size: 15px;
            color: var(--clr-text2);
            line-height: 1.8;
            margin-bottom: 2rem;
        }

        /* ── PARTNERS ── */
        .partners-section {
            position: relative;
            z-index: 1;
            padding: 4rem 2.5rem;
            background: var(--clr-surface);
            border-top: 1px solid var(--clr-border);
        }

        .partners-inner {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            gap: 3rem;
        }

        .partners-label {
            font-family: var(--font-mono);
            font-size: 10px;
            font-weight: 700;
            color: var(--clr-muted);
            letter-spacing: 0.2em;
            text-transform: uppercase;
            white-space: nowrap;
        }

        .partners-divider {
            width: 1px;
            height: 40px;
            background: var(--clr-border);
            flex-shrink: 0;
        }

        .partners-logos {
            display: flex;
            gap: 2.5rem;
            align-items: center;
            flex-wrap: wrap;
        }

        .partner-name {
            font-family: var(--font-mono);
            font-size: 13px;
            font-weight: 700;
            color: var(--clr-muted);
            letter-spacing: 0.08em;
            text-transform: uppercase;
            transition: color 0.2s;
        }

        .partner-name:hover {
            color: var(--clr-text2);
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

            .stats-inner {
                grid-template-columns: repeat(2, 1fr);
            }

            .programs-grid {
                grid-template-columns: 1fr;
            }

            .why-left {
                position: static;
            }

            .hero-visual {
                display: none;
            }
        }

        @media (max-width: 640px) {
            .hero {
                padding: 3rem 1.5rem 4rem;
            }

            .subjects-grid {
                grid-template-columns: 1fr;
            }

            .stats-inner {
                grid-template-columns: 1fr 1fr;
            }

            .hero-stats-row {
                flex-direction: column;
                gap: 1rem;
            }

            .subjects-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }
        }
    </style>

    <!-- ═══════════════════════════════════ HERO ═══════════════════════════════════ -->
    <section class="hero">
        <div class="hero-orb"></div>
        <div class="hero-orb-2"></div>

        <div class="hero-inner">
            <div class="hero-left">
                <div class="hero-badge">
                    <div class="hero-badge-dot"></div>
                    Cambodia's leading STEM platform
                </div>

                <h1 class="hero-h1">
                    Advancing Cambodia's
                    <span class="hero-word-carousel">
                        <span class="hero-word">Future Through STEM</span>
                        <span class="hero-word">Innovation &amp; Tech</span>
                        <span class="hero-word">Youth Education</span>
                    </span>
                </h1>

                <p class="hero-sub">
                    STEMBODIAN provides high-impact educational programs and interactive
                    resources that equip Cambodian students with critical skills, driving
                    sustainable progress across science, technology, engineering, and math.
                </p>

                <div class="hero-cta-row">
                    <a href="/dashboard" class="btn-primary">
                        Start Learning <span>→</span>
                    </a>
                    <a href="/aboutus" class="btn-secondary">About Us</a>
                </div>

                <div class="hero-stats-row">
                    <div class="hero-stat">
                        <div class="val">12<span class="accent">K+</span></div>
                        <div class="lbl">Students enrolled</div>
                    </div>
                    <div class="hero-stat">
                        <div class="val">4<span class="accent"></span></div>
                        <div class="lbl">STEM disciplines</div>
                    </div>
                    <div class="hero-stat">
                        <div class="val">98<span class="accent">%</span></div>
                        <div class="lbl">Satisfaction rate</div>
                    </div>
                </div>
            </div>

            <div class="hero-visual">
                <div class="hero-diagram">
                    <img src="https://stemcambodia.ngo/wp-content/uploads/2025/06/STEM-Mark.png" class="hero-diagram-img"
                        alt="STEM Cambodia Circular Diagram">
                </div>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════════════════ TICKER ═══════════════════════════════════ -->
    <div class="ticker-bar">
        <div class="ticker-label">LIVE</div>
        <div style="overflow: hidden; flex: 1;">
            <div class="ticker-track">
                <span class="ticker-item">New: Robotics curriculum launched</span>
                <span class="ticker-item">Science olympiad registrations open</span>
                <span class="ticker-item">AI literacy workshop — Phnom Penh</span>
                <span class="ticker-item">Coding bootcamp applications closing soon</span>
                <span class="ticker-item">Partnership with Royal University of Phnom Penh</span>
                <span class="ticker-item">Mathematics competition results published</span>
                <!-- duplicate for seamless loop -->
                <span class="ticker-item">New: Robotics curriculum launched</span>
                <span class="ticker-item">Science olympiad registrations open</span>
                <span class="ticker-item">AI literacy workshop — Phnom Penh</span>
                <span class="ticker-item">Coding bootcamp applications closing soon</span>
                <span class="ticker-item">Partnership with Royal University of Phnom Penh</span>
                <span class="ticker-item">Mathematics competition results published</span>
            </div>
        </div>
    </div>

    <!-- ═══════════════════════════════════ IMPACT STATS ═══════════════════════════════════ -->
    <section class="stats-section">
        <div class="stats-inner">
            <div class="stat-block">
                <div class="stat-val"><span class="accent-green">12,000</span></div>
                <div class="stat-lbl">Students reached across Cambodia</div>
                <div class="stat-sub">↑ 34% YoY growth</div>
            </div>
            <div class="stat-block">
                <div class="stat-val"><span class="accent-blue">200+</span></div>
                <div class="stat-lbl">Schools partnered nationwide</div>
                <div class="stat-sub">25 provinces covered</div>
            </div>
            <div class="stat-block">
                <div class="stat-val"><span class="accent-amber">500+</span></div>
                <div class="stat-lbl">Interactive learning modules</div>
                <div class="stat-sub">Curriculum-aligned content</div>
            </div>
            <div class="stat-block">
                <div class="stat-val"><span class="accent-purple">98%</span></div>
                <div class="stat-lbl">Student satisfaction score</div>
                <div class="stat-sub">Based on 2024 survey</div>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════════════════ WHY STEM ═══════════════════════════════════ -->
    <section class="why-section">
        <div class="why-inner">
            <div class="why-left">
                <span class="section-label">Why it matters</span>
                <h2 class="section-title">Why choose <span class="accent">STEM?</span></h2>
                <p style="font-size: 14px; color: var(--clr-text2); line-height: 1.8; max-width: 300px;">
                    STEM disciplines are the backbone of Cambodia's fastest-growing industries — from digital banking to
                    agritech.
                </p>
            </div>

            <div class="why-reasons">
                <div class="why-reason">
                    <div class="why-num">01</div>
                    <div class="why-body">
                        <h3>Critical Thinking</h3>
                        <p>STEM teaches you to break down complex problems, evaluate evidence, and arrive at logical
                            conclusions — skills valued in every career and life situation.</p>
                        <span class="why-tag">Problem Solving</span>
                    </div>
                </div>

                <div class="why-reason">
                    <div class="why-num">02</div>
                    <div class="why-body">
                        <h3>Future-Ready Careers</h3>
                        <p>By 2030, over 85% of the fastest-growing jobs in Southeast Asia will require STEM competencies.
                            Start building your edge now.</p>
                        <span class="why-tag">Career Growth</span>
                    </div>
                </div>

                <div class="why-reason">
                    <div class="why-num">03</div>
                    <div class="why-body">
                        <h3>Innovation Engine</h3>
                        <p>Empower the next generation to build better technology, sustainable agriculture, clean energy
                            solutions, and world-class software — all rooted in Cambodian context.</p>
                        <span class="why-tag">Tech Innovation</span>
                    </div>
                </div>

                <div class="why-reason">
                    <div class="why-num">04</div>
                    <div class="why-body">
                        <h3>National Development</h3>
                        <p>Cambodia's Vision 2050 relies on a tech-literate workforce. STEM education is a direct investment
                            in the country's digital and economic transformation.</p>
                        <span class="why-tag">Cambodia 2050</span>
                    </div>
                </div>

                <div class="why-reason">
                    <div class="why-num">05</div>
                    <div class="why-body">
                        <h3>Collaborative Mindset</h3>
                        <p>Science and engineering are team sports. STEM education builds the communication, teamwork, and
                            cross-disciplinary collaboration skills modern workplaces demand.</p>
                        <span class="why-tag">Teamwork</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════════════════ EXPLORE SUBJECTS ═══════════════════════════════════ -->
    <section class="subjects-section">
        <div class="subjects-inner">
            <div class="subjects-header">
                <div>
                    <span class="section-label">Explore</span>
                    <h2 class="section-title">Four pillars of <span class="accent">STEM</span></h2>
                </div>
                <a href="/dashboard" class="btn-secondary">View all →</a>
            </div>

            <div class="subjects-grid">
                <a class="subject-card s-science" href="/science">
                    <div class="subject-icon">
                        <span class="material-symbols-outlined">science</span>
                    </div>
                    <div>
                        <div class="subject-title">Science</div>
                        <p class="subject-desc">Explore biology, chemistry, physics, and earth science through experiments
                            and real-world phenomena.</p>
                    </div>
                    <span class="subject-arrow material-symbols-outlined">arrow_outward</span>
                </a>

                <a class="subject-card s-tech" href="/technology">
                    <div class="subject-icon">
                        <span class="material-symbols-outlined">devices</span>
                    </div>
                    <div>
                        <div class="subject-title">Technology</div>
                        <p class="subject-desc">Learn programming, AI, data science, and digital literacy for the modern
                            tech-driven economy.</p>
                    </div>
                    <span class="subject-arrow material-symbols-outlined">arrow_outward</span>
                </a>

                <a class="subject-card s-eng" href="/engineering">
                    <div class="subject-icon">
                        <span class="material-symbols-outlined">precision_manufacturing</span>
                    </div>
                    <div>
                        <div class="subject-title">Engineering</div>
                        <p class="subject-desc">Design, build, and test. From civil structures to robotics — apply science
                            to solve real problems.</p>
                    </div>
                    <span class="subject-arrow material-symbols-outlined">arrow_outward</span>
                </a>

                <a class="subject-card s-math" href="/mathematics">
                    <div class="subject-icon">
                        <span class="material-symbols-outlined">calculate</span>
                    </div>
                    <div>
                        <div class="subject-title">Mathematics</div>
                        <p class="subject-desc">From algebra and geometry to calculus and statistics — the universal
                            language of all STEM disciplines.</p>
                    </div>
                    <span class="subject-arrow material-symbols-outlined">arrow_outward</span>
                </a>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════════════════ PROGRAMS ═══════════════════════════════════ -->
    <section class="programs-section">
        <div class="programs-inner">
            <span class="section-label">Programs</span>
            <h2 class="section-title">What we <span class="accent">offer</span></h2>

            <div class="programs-grid">
                <div class="program-card">
                    <div class="prog-tag">Curriculum</div>
                    <h3>School Integration Program</h3>
                    <p>Fully-aligned STEM curricula embedded into Cambodia's national school system, with trained teachers
                        and localized content for grades 7–12.</p>
                    <div class="prog-meta">
                        <div class="prog-meta-item">
                            <span>Grade level</span>
                            <strong>7 – 12</strong>
                        </div>
                        <div class="prog-meta-item">
                            <span>Mode</span>
                            <strong>Hybrid</strong>
                        </div>
                        <div class="prog-meta-item">
                            <span>Duration</span>
                            <strong>Year-round</strong>
                        </div>
                    </div>
                </div>

                <div class="program-card">
                    <div class="prog-tag">Workshop</div>
                    <h3>Hands-On Innovation Labs</h3>
                    <p>Weekend and holiday programs where students build robots, design apps, run chemistry experiments, and
                        present their work to industry mentors.</p>
                    <div class="prog-meta">
                        <div class="prog-meta-item">
                            <span>Frequency</span>
                            <strong>Bi-monthly</strong>
                        </div>
                        <div class="prog-meta-item">
                            <span>Mode</span>
                            <strong>In-person</strong>
                        </div>
                        <div class="prog-meta-item">
                            <span>Ages</span>
                            <strong>12 – 18</strong>
                        </div>
                    </div>
                </div>

                <div class="program-card">
                    <div class="prog-tag">Digital</div>
                    <h3>Online Learning Platform</h3>
                    <p>Self-paced modules, video lectures, quizzes, and project-based assessments — available 24/7 in Khmer
                        and English for any device.</p>
                    <div class="prog-meta">
                        <div class="prog-meta-item">
                            <span>Access</span>
                            <strong>Free</strong>
                        </div>
                        <div class="prog-meta-item">
                            <span>Language</span>
                            <strong>KH / EN</strong>
                        </div>
                        <div class="prog-meta-item">
                            <span>Modules</span>
                            <strong>500+</strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════════════════ TERMINAL CTA ═══════════════════════════════════ -->
    <section class="cta-section">
        <div class="cta-inner">
            <div class="terminal">
                <div class="terminal-bar">
                    <div class="terminal-dot red"></div>
                    <div class="terminal-dot amber"></div>
                    <div class="terminal-dot green"></div>
                    <div class="terminal-title">stembodian_terminal — bash</div>
                </div>
                <div class="terminal-body">
                    <div class="t-line">
                        <span class="t-prompt">~$</span>
                        <span class="t-cmd">stem --status</span>
                    </div>
                    <div class="t-output"><span class="t-out-accent">✓</span> Platform online</div>
                    <div class="t-output"><span class="t-out-blue">→</span> Active students: <span
                            class="t-out-accent">12,047</span></div>
                    <div class="t-output"><span class="t-out-blue">→</span> Modules available: <span
                            class="t-out-accent">523</span></div>
                    <br>
                    <div class="t-line">
                        <span class="t-prompt">~$</span>
                        <span class="t-cmd">stem --enroll --student=you</span>
                    </div>
                    <div class="t-output"><span class="t-out-amber">⚡</span> Checking eligibility...</div>
                    <div class="t-output"><span class="t-out-accent">✓</span> Eligible! <span
                            class="t-out-blue">Registration is FREE</span></div>
                    <div class="t-output"><span class="t-out-accent">✓</span> Access granted to all subjects</div>
                    <br>
                    <div class="t-line">
                        <span class="t-prompt">~$</span>
                        <span class="t-cmd">stem --start-learning<span class="t-cursor"></span></span>
                    </div>
                </div>
            </div>

            <div class="cta-text">
                <span class="section-label">Join today</span>
                <h2 class="section-title">Ready to build Cambodia's <span class="accent">future?</span></h2>
                <p>
                    Whether you're a student hungry to learn, a teacher looking for curriculum support, or a school ready to
                    transform your STEM program — STEMBODIAN has everything you need to start today.
                </p>
                <div style="display: flex; flex-direction: column; gap: 0.85rem; margin-bottom: 2rem;">
                    <div style="display: flex; align-items: center; gap: 10px; font-size: 14px; color: var(--clr-text2);">
                        <span style="color: var(--clr-accent); font-family: var(--font-mono);">✓</span> Free access to 500+
                        learning modules
                    </div>
                    <div style="display: flex; align-items: center; gap: 10px; font-size: 14px; color: var(--clr-text2);">
                        <span style="color: var(--clr-accent); font-family: var(--font-mono);">✓</span> Available in Khmer
                        and English
                    </div>
                    <div style="display: flex; align-items: center; gap: 10px; font-size: 14px; color: var(--clr-text2);">
                        <span style="color: var(--clr-accent); font-family: var(--font-mono);">✓</span> Curriculum-aligned
                        with national standards
                    </div>
                    <div style="display: flex; align-items: center; gap: 10px; font-size: 14px; color: var(--clr-text2);">
                        <span style="color: var(--clr-accent); font-family: var(--font-mono);">✓</span> Mentors and live
                        workshops included
                    </div>
                </div>
                <div style="display: flex; gap: 1rem; flex-wrap: wrap;">
                    <a href="/signup" class="btn-primary">Create Free Account</a>
                    <a href="/news" class="btn-secondary">See Latest News</a>
                </div>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════════════════ PARTNERS ═══════════════════════════════════ -->
    <section class="partners-section">
        <div class="partners-inner">
            <div class="partners-label">Trusted by</div>
            <div class="partners-divider"></div>
            <div class="partners-logos">
                <span class="partner-name">Ministry of Education</span>
                <span class="partner-name">RUPP</span>
                <span class="partner-name">IFL</span>
                <span class="partner-name">USAID</span>
                <span class="partner-name">UNESCO</span>
                <span class="partner-name">Smart Axiata</span>
            </div>
        </div>
    </section>

@endsection

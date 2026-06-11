@extends('layout')
@section('title', 'STEM Cambodia - Home')
@section('content')
<link rel="stylesheet" href="{{ asset('css/home.css') }}"> 



    <!-- ══ HERO ══ -->
    <section class="hero"
        style="
    background-image: url('https://stemcambodia.ngo/wp-content/uploads/2025/06/STEM-Group-scaled-e1750055818707.jpg');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    position: relative;
">
        {{-- Dark overlay so text stays readable --}}
        <div
            style="
            position: absolute;
            inset: 0;
            background: linear-gradient(
                to right,
                rgba(5, 15, 35, 0.82) 0%,
                rgba(5, 15, 35, 0.55) 60%,
            rgba(5, 15, 35, 0.25) 100%
        );
        z-index: 0;
    ">
        </div>

        <div class="hero-inner" style="position: relative; z-index: 1;">
            <div>
                <div class="hero-eyebrow"
                    style="color: #a8c8ff; border-color: rgba(168,200,255,0.35); background: rgba(168,200,255,0.12);">
                    Cambodia's leading STEM platform
                </div>

                <h1 class="hero-h1" style="color: #ffffff;">
                    Advancing Cambodia<br>through <span class="blue" style="color: #60a5fa;">STEM education</span>
                </h1>

                <p class="hero-sub" style="color: rgba(255,255,255,0.78);">
                    STEMBODIAN equips Cambodian students with critical skills through high-impact educational programs —
                    driving sustainable progress across science, technology, engineering, and mathematics.
                </p>

                <div class="hero-ctas">
                    <a href="/dashboard" class="btn-primary">Start learning →</a>
                </div>

                <div class="hero-stats" style="border-top-color: rgba(255,255,255,0.15);">
                    <div>
                        <div class="h-stat-val" style="color: #ffffff;">12<b style="color: #60a5fa;">K+</b></div>
                        <div class="h-stat-lbl" style="color: rgba(255,255,255,0.55);">Students enrolled</div>
                    </div>
                    <div>
                        <div class="h-stat-val" style="color: #ffffff;">4</div>
                        <div class="h-stat-lbl" style="color: rgba(255,255,255,0.55);">STEM disciplines</div>
                    </div>
                    <div>
                        <div class="h-stat-val" style="color: #ffffff;">98<b style="color: #60a5fa;">%</b></div>
                        <div class="h-stat-lbl" style="color: rgba(255,255,255,0.55);">Satisfaction rate</div>
                    </div>
                </div>
            </div>

            <div class="hero-visual">
                <div class="hero-visual-box"
                    style="background: rgba(255,255,255,0.06); border-color: rgba(255,255,255,0.15); backdrop-filter: blur(8px);">
                    <img src="https://stemcambodia.ngo/wp-content/uploads/2025/06/STEM-Mark.png" alt="STEM Cambodia">
                </div>
            </div>
        </div>
    </section>

    <!-- ══ TICKER ══ -->
    <div class="ticker">
        <div class="ticker-label">Updates</div>
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
    <section class="section">
        <div class="section-inner">
            <div style="display:flex; justify-content:space-between; align-items:flex-end;">
                <div>
                    <span class="label">Explore</span>
                    <h2 class="h2">Four pillars of <em>STEM</em></h2>
                </div>
                <a href="/dashboard" class="btn-ghost" style="font-size:13px;">View all →</a>
            </div>

            <div class="subjects-grid">
                <a class="subj-card s-sci" href="/science">
                    <div class="subj-icon">
                        <span class="material-symbols-outlined">science</span>
                    </div>
                    <div>
                        <div class="subj-title">Science</div>
                        <p class="subj-desc">Biology, chemistry, physics, and earth science through experiments and
                            real-world phenomena.</p>
                    </div>
                    <span class="subj-link">Explore Science →</span>
                </a>
                <a class="subj-card s-tech" href="/technology">
                    <div class="subj-icon">
                        <span class="material-symbols-outlined">devices</span>
                    </div>
                    <div>
                        <div class="subj-title">Technology</div>
                        <p class="subj-desc">Programming, AI, data science, and digital literacy for the modern tech-driven
                            economy.</p>
                    </div>
                    <span class="subj-link">Explore Technology →</span>
                </a>
                <a class="subj-card s-eng" href="/engineering">
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
                <a class="subj-card s-math" href="/mathematics">
                    <div class="subj-icon">
                        <span class="material-symbols-outlined">calculate</span>
                    </div>
                    <div>
                        <div class="subj-title">Mathematics</div>
                        <p class="subj-desc">Algebra, geometry, calculus, and statistics — the universal language of all
                            STEM disciplines.</p>
                    </div>
                    <span class="subj-link">Explore Mathematics →</span>
                </a>
            </div>
        </div>
    </section>

    <!-- ══ WHY STEM ══ -->
    <section class="section section-soft">
        <div class="section-inner">
            <div class="why-inner">
                <div class="why-sticky">
                    <span class="label">Why it matters</span>
                    <h2 class="h2">Why choose <em>STEM?</em></h2>
                    <p>STEM disciplines are the backbone of Cambodia's fastest-growing industries — from digital banking to
                        agritech.</p>
                </div>
                <div>
                    <div class="why-item">
                        <div class="why-n">01</div>
                        <div>
                            <h3>Critical thinking</h3>
                            <p>Break down complex problems, evaluate evidence, and arrive at logical conclusions — skills
                                valued in every career and life situation.</p>
                            <span class="tag">Problem solving</span>
                        </div>
                    </div>
                    <div class="why-item">
                        <div class="why-n">02</div>
                        <div>
                            <h3>Future-ready careers</h3>
                            <p>By 2030, over 85% of the fastest-growing jobs in Southeast Asia will require STEM
                                competencies.</p>
                            <span class="tag">Career growth</span>
                        </div>
                    </div>
                    <div class="why-item">
                        <div class="why-n">03</div>
                        <div>
                            <h3>Innovation engine</h3>
                            <p>Build better technology, sustainable agriculture, clean energy solutions, and world-class
                                software — rooted in Cambodian context.</p>
                            <span class="tag">Tech innovation</span>
                        </div>
                    </div>
                    <div class="why-item">
                        <div class="why-n">04</div>
                        <div>
                            <h3>National development</h3>
                            <p>Cambodia's Vision 2050 relies on a tech-literate workforce. STEM is a direct investment in
                                the country's digital transformation.</p>
                            <span class="tag">Cambodia 2050</span>
                        </div>
                    </div>
                    <div class="why-item">
                        <div class="why-n">05</div>
                        <div>
                            <h3>Collaborative mindset</h3>
                            <p>Science and engineering are team sports. STEM builds communication, teamwork, and
                                cross-disciplinary skills modern workplaces demand.</p>
                            <span class="tag">Teamwork</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- ══ CTA ══ -->
    <section class="section section-soft">
        <div class="section-inner">
            <span class="label">Community</span>
            <h2 class="h2">What we <em>offer</em></h2>

            <div class="programs-grid">

                <div class="prog-card">
                    <div class="prog-badge">Networking</div>
                    <h3>Tech community meetups</h3>
                    <p>Connect with developers, designers, entrepreneurs, and tech enthusiasts through regular networking
                        events, knowledge-sharing sessions, and community gatherings across Cambodia.</p>

                    <div class="prog-meta">
                        <div class="prog-meta-item"><span>Audience</span><strong>All Levels</strong></div>
                        <div class="prog-meta-item"><span>Format</span><strong>Hybrid</strong></div>
                        <div class="prog-meta-item"><span>Schedule</span><strong>Monthly</strong></div>
                    </div>
                    <ul class="cta-list">
                        <li>Active students <span class="val">12,047</span></li>
                        <li>Modules available <span class="val">523</span></li>
                        <li>Schools connected <span class="val">200+</span></li>
                        <li>Registration <span class="val">FREE</span></li>
                        <li>Languages <span class="val">KH / EN</span></li>
                    </ul>
                </div>

                <div class="prog-card">
                    <div class="prog-badge">Events</div>
                    <h3>Workshops & hackathons</h3>
                    <p>Participate in hands-on coding workshops, startup challenges, hackathons, and collaborative projects
                        designed to strengthen practical skills and encourage innovation.</p>

                    <div class="prog-meta">
                        <div class="prog-meta-item"><span>Frequency</span><strong>Regular</strong></div>
                        <div class="prog-meta-item"><span>Mode</span><strong>In-person</strong></div>
                        <div class="prog-meta-item"><span>Focus</span><strong>Tech & Innovation</strong></div>
                    </div>
                </div>

                <div class="prog-card">
                    <div class="prog-badge">Resources</div>
                    <h3>Learning & career growth</h3>
                    <p>Access curated learning resources, mentorship opportunities, career guidance, job postings, and
                        industry insights to support your journey in Cambodia's growing tech ecosystem.</p>

                    <div class="prog-meta">
                        <div class="prog-meta-item"><span>Access</span><strong>Open</strong></div>
                        <div class="prog-meta-item"><span>Language</span><strong>KH / EN</strong></div>
                        <div class="prog-meta-item"><span>Support</span><strong>Mentorship</strong></div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ══ SPONSORS ══ -->
    <section class="sponsors">
        <style>
            .sponsors {
                padding: 4rem 2rem;
                border-top: 1px solid var(--border);
                border-bottom: 1px solid var(--border);
                background: var(--bg-soft);
            }

            .sponsors-inner {
                max-width: var(--max-w);
                margin: 0 auto;
            }

            .sponsors-inner>.label {
                display: block;
                margin-bottom: .5rem;
            }

            .sponsors-inner>.h2 {
                margin-bottom: 2.5rem;
            }

            .sponsors-grid {
                display: flex;
                flex-wrap: wrap;
                align-items: center;
                justify-content: center;
                gap: 2.5rem 3rem;
            }

            .sponsor-item {
                display: flex;
                flex-direction: column;
                align-items: center;
                gap: .6rem;
            }

            .sponsor-item img {
                height: 72px;
                width: auto;
                max-width: 140px;
                object-fit: contain;
                filter: grayscale(20%);
                opacity: .85;
                transition: opacity .2s, filter .2s;
            }

            .sponsor-item:hover img {
                opacity: 1;
                filter: grayscale(0%);
            }

            .sponsor-item span {
                font-size: 10.5px;
                color: var(--text-3);
                text-align: center;
                font-family: var(--mono);
                letter-spacing: .04em;
                text-transform: uppercase;
            }
        </style>

        <div class="sponsors-inner">

            <span class="label">Sponsors</span>
            <h2 class="h2">Supported by our <em>partners</em></h2>

            <div class="sponsors-grid">

                <div class="sponsor-item">
                    <img src="https://stemcambodia.ngo/wp-content/uploads/2025/06/MOEYS-2-254x300.png"
                        alt="Ministry of Education Youth and Sport">
                    <span>Ministry of Education<br>Youth and Sport</span>
                </div>

                <div class="sponsor-item">
                    <img src="https://stemcambodia.ngo/wp-content/uploads/2025/06/MOE-1-253x300.png"
                        alt="Ministry of Environment">
                    <span>Ministry of Environment</span>
                </div>

                <div class="sponsor-item">
                    <img src="https://stemcambodia.ngo/wp-content/uploads/2025/06/PTC.png" alt="PTC">
                    <span>P.T.C</span>
                </div>

                <div class="sponsor-item">
                    <img src="https://stemcambodia.ngo/wp-content/uploads/2025/06/MISTI.png"
                        alt="Ministry of Industry Science Technology and Innovation">
                    <span>Ministry of Industry,<br>Science & Innovation</span>
                </div>

                <div class="sponsor-item">
                    <img src="https://stemcambodia.ngo/wp-content/uploads/2025/06/cropped-logo-300x300.png"
                        alt="RUPP">
                    <span>RUPP</span>
                </div>

                <div class="sponsor-item">
                    <img src="https://stemcambodia.ngo/wp-content/uploads/2025/06/British-Embassy-1024x840.png"
                        alt="British Embassy Phnom Penh">
                    <span>British Embassy<br>Phnom Penh</span>
                </div>

                <div class="sponsor-item">
                    <img src="https://stemcambodia.ngo/wp-content/uploads/2025/06/Untitled-design-8.png" alt="WCS">
                    <span>WCS</span>
                </div>

                <div class="sponsor-item">
                    <img src="https://stemcambodia.ngo/wp-content/uploads/2025/06/Logo1-04.png" alt="Kilat Events">
                    <span>Kilat Events</span>
                </div>

                <div class="sponsor-item">
                    <img src="https://stemcambodia.ngo/wp-content/uploads/2025/06/Smart-Logo-768x501.png"
                        alt="Smart Axiata">
                    <span>Smart Axiata</span>
                </div>

                <div class="sponsor-item">
                    <img src="https://stemcambodia.ngo/wp-content/uploads/2025/06/Logo-1024x346.jpg"
                        alt="AEON Mall Mean Chey">
                    <span>AEON MALL<br>Mean Chey</span>
                </div>

            </div>

        </div>
    </section>

    <!-- ══ PARTNERS ══ -->
    <section style="padding: 2.5rem 2rem; border-top: 1px solid var(--border);">
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

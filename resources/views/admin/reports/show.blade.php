<!DOCTYPE html>
<html lang="en">
<head>
    <!--
      Stark Panel · Report Details (Mark-22 Glassmorphism HUD)
      - Futuristic neon/glass UI
      - Subtle, motion-safe animations (no jitter)
      - Holographic grid + scanlines + glowing dividers
      - Data "chips" + action toolbar + responsive
      - Keeps Blade variables & routes
    -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0" />
    <title>Report Details — Stark Panel</title>

    <!-- Orbitron for HUD headings + system UI for body -->
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500;700&display=swap" rel="stylesheet" />

    <style>
        /* ==============================
           0) THEME TOKENS (CSS VARIABLES)
           ============================== */
        :root {
            --bg0: #050506;
            --bg1: #120008;
            --bg2: #2a0010;
            --lava1: #ff3b00;
            --lava2: #ff7a00;
            --gold1: #ffd166;
            --aqua1: #00eaff;
            --aqua2: #00a8ff;
            --glass: rgba(255, 255, 255, 0.08);
            --glass-strong: rgba(255, 255, 255, 0.14);
            --stroke-soft: rgba(255, 255, 255, 0.18);
            --stroke-aqua: rgba(0, 234, 255, 0.55);
            --stroke-lava: rgba(255, 80, 0, 0.5);
            --text-main: #fff8ee;
            --text-dim: #dfecff;
            --text-accent: #ffb088;
            --shadow-neon-aqua: 0 0 22px rgba(0, 234, 255, 0.5);
            --shadow-neon-lava: 0 0 24px rgba(255, 80, 0, 0.55);
            --radius-lg: 16px;
            --radius-md: 12px;
            --radius-sm: 8px;
            --blur: 16px;
            --ring: 1px solid var(--stroke-soft);
            --ease-std: cubic-bezier(.22,.61,.36,1);
        }

        /* ===================================
           1) RESET + BASE (NO JITTER ALLOWED)
           =================================== */
        *, *::before, *::after { box-sizing: border-box; }
        html, body { height: 100%; }
        body {
            margin: 0;
            color: var(--text-main);
            font-family: system-ui, -apple-system, Segoe UI, Roboto, "Helvetica Neue", Arial, "Noto Sans", "Apple Color Emoji", "Segoe UI Emoji";
            line-height: 1.4;
            background:
                radial-gradient(1200px 600px at 20% -10%, rgba(255, 60, 0, 0.35), transparent 60%),
                radial-gradient(800px 500px at 85% 10%, rgba(0, 234, 255, 0.2), transparent 60%),
                linear-gradient(135deg, var(--bg0), var(--bg1) 40%, var(--bg2) 100%);
            overflow-x: hidden;
            /* No layout-shifting transforms on root */
        }

        /* Scanline layer (tasteful) */
        .scanlines {
            pointer-events: none;
            position: fixed;
            inset: 0;
            background: repeating-linear-gradient(
                to bottom,
                rgba(255,255,255,0.02) 0px,
                rgba(255,255,255,0.02) 1px,
                transparent 2px,
                transparent 3px
            );
            mix-blend-mode: soft-light;
            opacity: .35;
            z-index: 1;
        }

        /* Hologrid layer */
        .holo-grid {
            pointer-events: none;
            position: fixed;
            inset: -10% -10% -10% -10%;
            background:
                radial-gradient(circle at 50% 50%, rgba(0,234,255,0.06) 0 25%, transparent 26% 100%),
                conic-gradient(from 0deg at 50% 50%, rgba(0,234,255,.08), rgba(255,80,0,.08), rgba(0,234,255,.08));
            mask-image:
                linear-gradient(to bottom, transparent, black 20% 80%, transparent 100%);
            filter: blur(12px);
            z-index: 0;
            animation: gridSpin 40s linear infinite;
        }
        @keyframes gridSpin {
            to { transform: rotate(360deg); }
        }

        /* ===================================
           2) APP WRAPPER + SAFE CONTAINER
           =================================== */
        .wrap {
            position: relative;
            z-index: 2;
            padding: 24px clamp(16px, 4vw, 40px);
            max-width: 1200px;
            margin: 0 auto;
        }

        /* ===================================
           3) TOP BAR (LOGO + ACTIONS)
           =================================== */
        .topbar {
            display: grid;
            grid-template-columns: 1fr auto;
            gap: 16px;
            align-items: center;
            margin-bottom: 22px;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 14px;
            min-width: 0;
        }

        .orb {
            width: 46px;
            height: 46px;
            border-radius: 50%;
            background:
                radial-gradient(circle at 30% 30%, #fff 2%, #9ffaff 6%, transparent 7%),
                radial-gradient(circle at 70% 70%, rgba(0,234,255,.7), rgba(0,234,255,0) 60%),
                linear-gradient(135deg, rgba(0,234,255,.35), rgba(255,80,0,.35));
            border: 1px solid var(--stroke-aqua);
            box-shadow: var(--shadow-neon-aqua), inset 0 0 18px rgba(0,234,255,.35);
            position: relative;
        }
        .orb::after {
            content: "TDP";
            position: absolute;
            inset: 0;
            display: grid;
            place-items: center;
            font-family: 'Orbitron', sans-serif;
            font-weight: 700;
            font-size: 12px;
            letter-spacing: 1.2px;
            color: #e9fdff;
            text-shadow: 0 0 8px rgba(0,234,255,.8);
        }

        .brand-name {
            display: flex;
            flex-direction: column;
            min-width: 0;
        }
        .brand-name h1 {
            margin: 0;
            font-family: 'Orbitron', sans-serif;
            font-size: clamp(18px, 2.4vw, 24px);
            letter-spacing: 1.5px;
            color: var(--aqua1);
            text-shadow: 0 0 12px rgba(0,234,255,.7), 0 0 24px rgba(0,168,255,.45);
        }
        .brand-name .sub {
            margin-top: 2px;
            font-size: 12px;
            color: var(--text-dim);
            opacity: .8;
        }

        .actions {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
            justify-content: flex-end;
        }

        .btn {
            appearance: none;
            border: 1px solid var(--stroke-aqua);
            background: linear-gradient(180deg, rgba(0,234,255,.08), rgba(0,168,255,.06));
            color: var(--text-main);
            font-weight: 700;
            font-size: 13px;
            letter-spacing: .6px;
            padding: 10px 14px;
            border-radius: var(--radius-sm);
            transition: transform .2s var(--ease-std), box-shadow .2s var(--ease-std), border-color .2s;
            box-shadow: inset 0 0 0 1px rgba(255,255,255,.06), 0 0 0 0 rgba(0,234,255,.0);
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            will-change: transform;
        }
        .btn svg { width: 16px; height: 16px; }
        .btn:hover {
            transform: translateY(-1px);
            box-shadow: 0 0 18px rgba(0,234,255,.25);
        }
        .btn:active { transform: translateY(0); }
        .btn--lava {
            border-color: var(--stroke-lava);
            background: linear-gradient(180deg, rgba(255,80,0,.10), rgba(255,80,0,.06));
            box-shadow: inset 0 0 0 1px rgba(255,255,255,.04);
        }
        .btn--ghost {
            border-color: var(--stroke-soft);
            background: linear-gradient(180deg, rgba(255,255,255,.06), rgba(255,255,255,.03));
        }

        /* ===================================
           4) CARD (REPORT PANEL)
           =================================== */
        .card {
            position: relative;
            border-radius: var(--radius-lg);
            border: 1px solid var(--stroke-soft);
            background: linear-gradient(180deg, rgba(255,255,255,.06), rgba(255,255,255,.02));
            backdrop-filter: blur(var(--blur));
            -webkit-backdrop-filter: blur(var(--blur));
            box-shadow:
                inset 0 0 0 1px rgba(255,255,255,.06),
                0 10px 40px rgba(0,0,0,.45),
                0 0 42px rgba(0,234,255,.06);
            padding: clamp(16px, 3vw, 28px);
            overflow: hidden;
        }

        /* Edge glows */
        .card::before,
        .card::after {
            content: "";
            position: absolute;
            inset: 0;
            border-radius: inherit;
            pointer-events: none;
        }
        .card::before {
            background:
                radial-gradient(600px 80px at 10% 0%, rgba(0,234,255,.18), transparent 60%),
                radial-gradient(600px 80px at 90% 0%, rgba(255,80,0,.18), transparent 60%);
            mask-image: linear-gradient(to bottom, black, transparent 60%);
        }
        .card::after {
            border: 1px solid rgba(0,234,255,.12);
            mix-blend-mode: screen;
            opacity: .6;
        }

        /* Header inside card */
        .card-head {
            display: grid;
            grid-template-columns: 1fr auto;
            gap: 12px;
            align-items: start;
        }

        .title {
            margin: 0;
            font-family: 'Orbitron', sans-serif;
            font-size: clamp(18px, 2.2vw, 26px);
            color: var(--gold1);
            text-shadow: 0 0 12px rgba(255,209,102,.45), 0 0 24px rgba(255,122,0,.25);
            letter-spacing: 1.1px;
        }

        .meta-bar {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
            justify-content: flex-end;
        }

        .chip {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 10px;
            border-radius: 999px;
            border: 1px solid rgba(255,255,255,.18);
            background: linear-gradient(180deg, rgba(255,255,255,.06), rgba(255,255,255,.03));
            font-size: 12px;
            color: var(--text-dim);
            white-space: nowrap;
        }
        .chip .dot {
            width: 7px; height: 7px; border-radius: 50%;
            box-shadow: 0 0 10px currentColor;
        }
        .chip--user .dot { color: var(--aqua1); background: var(--aqua1); }
        .chip--time .dot { color: var(--lava2); background: var(--lava2); }

        .divider {
            height: 2px;
            margin: 16px 0 18px;
            background:
               linear-gradient(90deg, transparent, rgba(0,234,255,.45), transparent),
               radial-gradient(8px 24px at 10% 50%, rgba(255,80,0,.6), transparent 60%),
               radial-gradient(8px 24px at 90% 50%, rgba(255,209,102,.6), transparent 60%);
            border-radius: 2px;
            box-shadow: 0 0 18px rgba(0,234,255,.35);
        }

        /* Content */
        .content {
            color: var(--text-main);
            font-size: clamp(14px, 1.8vw, 16px);
            line-height: 1.75;
        }
        .content p { margin: 0; }

        /* Sub-grid for meta rows */
        .meta-grid {
            display: grid;
            grid-template-columns: repeat(12, 1fr);
            gap: 12px;
            margin: 18px 0 8px;
        }
        .meta-item {
            grid-column: span 12;
            display: grid;
            grid-template-columns: 120px 1fr;
            gap: 10px;
            align-items: center;
            padding: 10px 12px;
            border-radius: var(--radius-md);
            border: 1px solid rgba(255,255,255,.14);
            background: linear-gradient(180deg, rgba(255,255,255,.05), rgba(255,255,255,.02));
        }
        .meta-key {
            color: var(--text-accent);
            font-weight: 700;
            letter-spacing: .4px;
        }
        .meta-val {
            color: var(--text-dim);
            overflow-wrap: anywhere;
        }

        /* Responsive wide layout */
        @media (min-width: 760px) {
            .meta-item { grid-column: span 6; }
        }

        /* ===================================
           5) FOOTER ACTIONS (SECONDARY)
           =================================== */
        .footer-actions {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
            margin-top: 22px;
            justify-content: flex-end;
        }

        /* ===================================
           6) TOAST (COPY / FEEDBACK)
           =================================== */
        .toast {
            position: fixed;
            bottom: 18px;
            left: 50%;
            transform: translateX(-50%) translateY(20px);
            background: rgba(0,0,0,.65);
            color: #eaffff;
            border: 1px solid rgba(0,234,255,.4);
            box-shadow: 0 0 18px rgba(0,234,255,.25);
            padding: 10px 14px;
            border-radius: 10px;
            font-size: 13px;
            opacity: 0;
            pointer-events: none;
            transition: transform .25s var(--ease-std), opacity .25s var(--ease-std);
            z-index: 4;
        }
        .toast.show {
            opacity: 1;
            transform: translateX(-50%) translateY(0);
        }

        /* ===================================
           7) PREFERS-REDUCED-MOTION (ACCESSIBLE)
           =================================== */
        @media (prefers-reduced-motion: reduce) {
            .holo-grid { animation: none; }
            .btn { transition: none; }
            .toast { transition: none; }
        }

        /* ===================================
           8) ICONS (INLINE SVG RESETS)
           =================================== */
        .ico {
            display: inline-block;
            vertical-align: middle;
        }

        /* ===================================
           9) SMALL UTILITIES
           =================================== */
        .sr-only {
            position: absolute !important;
            width: 1px; height: 1px;
            padding: 0; margin: -1px;
            overflow: hidden; clip: rect(0,0,0,0);
            white-space: nowrap; border: 0;
        }
        .mt-8 { margin-top: 8px; }
        .mt-16 { margin-top: 16px; }
        .mt-24 { margin-top: 24px; }
        .w-full { width: 100%; }
    </style>
</head>
<body>
    <!-- Ambient layers -->
    <div class="scanlines" aria-hidden="true"></div>
    <div class="holo-grid" aria-hidden="true"></div>

    <div class="wrap">
        <!-- ================= TOP BAR ================= -->
        <header class="topbar" role="banner">
            <div class="brand">
                <div class="orb" aria-hidden="true"></div>
                <div class="brand-name">
                    <h1>Admin Report Panel</h1>
                    <div class="sub">Report Intelligence  Glass UI</div>
                </div>
            </div>

            <nav class="actions" aria-label="Primary actions">
                <!-- Back to list -->
                <a class="btn btn--ghost" href="{{ route('admin.reports.index') }}" title="Back to Reports">
                    <svg class="ico" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                        <path d="M10 6L4 12L10 18" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M4 12H20" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" />
                    </svg>
                    Back
                </a>

                <!-- Export PDF (keep if you want quick export here too) -->
                <a class="btn btn--lava" href="{{ route('admin.reports.exportPDF') }}" target="_blank" rel="noopener" title="Export all reports as PDF">
                    <svg class="ico" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                        <path d="M6 20H18" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                        <path d="M12 16V4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                        <path d="M8 8L12 4L16 8" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    Export PDF
                </a>

                <!-- Copy permalink -->
                <button class="btn" id="copyLinkBtn" type="button" title="Copy permalink">
                    <svg class="ico" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                        <path d="M10 14L14 10" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                        <path d="M7 17C4.8 14.8 4.8 11.2 7 9L9 7C11.2 4.8 14.8 4.8 17 7" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                        <path d="M7 17L9 15" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                        <path d="M15 9L17 7" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                    </svg>
                    Copy Link
                </button>
            </nav>
        </header>

        <!-- ================= CARD ================= -->
        <main class="card" role="main" aria-labelledby="reportTitle">
            <div class="card-head">
                <h2 class="title" id="reportTitle">{{ $report->title }}</h2>

                <div class="meta-bar" role="group" aria-label="Report metadata">
                    <div class="chip chip--user">
                        <span class="dot" aria-hidden="true"></span>
                        <span>User</span>
                        <strong>{{ $report->user->name ?? 'N/A' }}</strong>
                    </div>
                    <div class="chip chip--time">
                        <span class="dot" aria-hidden="true"></span>
                        <span>Created</span>
                        <strong>{{ $report->created_at->format('d-m-Y H:i') }}</strong>
                    </div>
                </div>
            </div>

            <div class="divider" aria-hidden="true"></div>

            <!-- Structured meta rows (easy scan) -->
            <section class="meta-grid" aria-label="Key details">
                <div class="meta-item" role="group" aria-label="Report ID">
                    <div class="meta-key">Report ID</div>
                    <div class="meta-val">{{ $report->id }}</div>
                </div>

                <div class="meta-item" role="group" aria-label="Category">
                    <div class="meta-key">Category</div>
                    <div class="meta-val">{{ $report->category ?? '—' }}</div>
                </div>

                <div class="meta-item" role="group" aria-label="Status">
                    <div class="meta-key">Status</div>
                    <div class="meta-val">{{ $report->status ?? '—' }}</div>
                </div>

                <div class="meta-item" role="group" aria-label="Priority">
                    <div class="meta-key">Priority</div>
                    <div class="meta-val">{{ $report->priority ?? '—' }}</div>
                </div>
            </section>

            <div class="divider" aria-hidden="true"></div>

            <!-- Content body -->
            <section class="content" aria-label="Report content">
                <p><strong style="color:var(--aqua1)">Content</strong></p>
                <p class="mt-8">{{ $report->content ?? 'No content available.' }}</p>
            </section>

            <!-- Secondary actions -->
            <div class="footer-actions">
                <a class="btn btn--ghost" href="{{ route('admin.reports.index') }}">
                    <svg class="ico" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                        <path d="M10 6L4 12L10 18" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M4 12H20" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" />
                    </svg>
                    Back to Reports
                </a>
                <a class="btn btn--lava" href="{{ route('admin.dashboard') }}">
                    <svg class="ico" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                        <path d="M3 12L12 3L21 12V20C21 20.6 20.6 21 20 21H4C3.4 21 3 20.6 3 20V12Z" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/>
                        <path d="M9 21V12H15V21" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                    </svg>
                    Dashboard
                </a>
            </div>
        </main>
    </div>

    <!-- Toast -->
    <div class="toast" id="toast" role="status" aria-live="polite" aria-atomic="true">Link copied to clipboard</div>

    <script>
        // Minimal JS: Copy permalink + toast feedback
        (function () {
            const btn = document.getElementById('copyLinkBtn');
            const toast = document.getElementById('toast');

            if (btn) {
                btn.addEventListener('click', async () => {
                    try {
                        const url = window.location.href;
                        await navigator.clipboard.writeText(url);
                        toast.classList.add('show');
                        setTimeout(() => toast.classList.remove('show'), 2000);
                    } catch (err) {
                        toast.textContent = 'Copy failed';
                        toast.classList.add('show');
                        setTimeout(() => {
                            toast.textContent = 'Link copied to clipboard';
                            toast.classList.remove('show');
                        }, 2000);
                    }
                });
            }
        })();
    </script>
</body>
</html>

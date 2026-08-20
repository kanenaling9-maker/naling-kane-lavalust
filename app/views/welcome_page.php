<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

$showProfile = isset($_GET['student']) && trim($_GET['student']) !== '';

$student = [
    'id' => 'MCC2024-00162',
    'name' => 'Kane Ashley E. Naling',
    'course' => 'Information Technology',
    'year' => '3rd Year',
    'section' => '3F4',
    'email' => 'kanenaling9@gmail.com',
    'address' => 'Calero, Oriental Mindoro',
    'contact' => '09690483789',
    'tag' => 'IT',
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Desk</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@700;800&family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg-page: #f1ece5;
            --panel: #f5f3ee;
            --panel-strong: #f0efe8;
            --ink: #0e0e0f;
            --muted: #676767;
            --line: #111111;
            --accent: #0d4dba;
            --accent-2: #4ea3ff;
            --accent-3: #dfe9ff;
            --shadow: rgba(7, 12, 24, 0.18);
            --blue-shadow: rgba(13, 77, 186, 0.28);
            --white-shadow: rgba(255,255,255,0.9);
        }

        * { box-sizing: border-box; }

        html { scroll-behavior: smooth; }

        body {
            margin: 0;
            min-height: 100vh;
            font-family: "Inter", sans-serif;
            background: var(--bg-page);
            color: var(--ink);
            overflow-x: hidden;
        }

        body::before,
        body::after {
            content: "";
            position: fixed;
            border-radius: 50%;
            z-index: 0;
            pointer-events: none;
        }

        body::before {
            width: 250px;
            height: 250px;
            right: 30px;
            bottom: 12px;
            background: rgba(17, 17, 17, 0.03);
        }

        body::after {
            width: 180px;
            height: 180px;
            left: 50px;
            top: 60px;
            background: rgba(13, 77, 186, 0.06);
        }

        .frame {
            position: relative;
            z-index: 1;
            width: min(1220px, calc(100vw - 80px));
            margin: 42px auto;
            background: var(--panel);
            border: 3px solid var(--line);
            border-radius: 18px 18px 24px 18px;
            box-shadow: 18px 18px 0 var(--accent);
            overflow: hidden;
        }

        .topbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 24px;
            min-height: 84px;
            padding: 16px 34px;
            border-bottom: 2px solid var(--line);
            background: rgba(255,255,255,0.15);
        }

        .brand {
            display: inline-flex;
            align-items: center;
            gap: 14px;
            font-weight: 800;
            letter-spacing: 0.05em;
            text-transform: uppercase;
            font-size: 1.08rem;
            color: var(--ink);
        }

        .brand-mark {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: radial-gradient(circle at 35% 30%, #bfc9e7 0%, #1b3f8b 26%, #0b0b0c 60%, #111 100%);
            border: 2px solid var(--line);
            box-shadow: inset 0 0 0 3px rgba(255,255,255,0.12), 0 6px 0 rgba(0,0,0,0.18);
        }

        .home-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 118px;
            padding: 10px 18px;
            border: 2px solid var(--line);
            border-radius: 12px;
            background: rgba(255,255,255,0.38);
            color: var(--ink);
            text-decoration: none;
            font-weight: 600;
            box-shadow: 0 6px 0 rgba(15,15,15,0.16);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .home-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 0 rgba(15,15,15,0.16);
        }

        .content {
            position: relative;
            min-height: 760px;
            padding: 42px 64px 64px;
            background: linear-gradient(180deg, rgba(255,255,255,0.15), rgba(13, 77, 186, 0.03));
        }

        .hero-panel {
            display: grid;
            grid-template-columns: 1.2fr 0.9fr;
            align-items: center;
            gap: 64px;
            padding-top: 48px;
        }

        .intro {
            position: relative;
            padding-left: 8px;
        }

        .label-tag {
            display: inline-block;
            padding: 8px 18px;
            margin-bottom: 28px;
            background: var(--accent);
            color: #fff;
            text-transform: uppercase;
            letter-spacing: 0.09em;
            font-size: 0.72rem;
            font-weight: 800;
            border-radius: 8px;
            border: 2px solid var(--line);
            box-shadow: 0 6px 0 rgba(0,0,0,0.18);
        }

        h1 {
            margin: 0;
            font-family: "Cormorant Garamond", serif;
            font-size: clamp(4.6rem, 7vw, 10rem);
            line-height: 0.84;
            letter-spacing: -0.065em;
            font-weight: 700;
            color: #0d0d0f;
        }

        .subtext {
            max-width: 550px;
            margin-top: 28px;
            color: var(--muted);
            font-size: 1.1rem;
            line-height: 1.7;
            font-weight: 500;
            font-style: italic;
        }

        .meta {
            margin-top: 28px;
            display: inline-flex;
            align-items: center;
            gap: 12px;
            font-size: 0.9rem;
            font-weight: 700;
            letter-spacing: 0.09em;
            text-transform: uppercase;
            color: var(--ink);
        }

        .meta-dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: var(--accent);
            box-shadow: 0 0 0 4px rgba(13, 77, 186, 0.12);
        }

        .access-card {
            position: relative;
            width: min(100%, 430px);
            margin-left: auto;
            background: linear-gradient(180deg, #f8f7f4, #efeee9);
            border: 2px solid var(--line);
            border-radius: 20px;
            box-shadow: 10px 12px 0 var(--accent);
            padding: 22px 18px 18px;
        }

        .access-badge {
            position: absolute;
            top: -18px;
            right: 18px;
            width: 52px;
            height: 52px;
            border-radius: 12px;
            background: var(--ink);
            color: #fff;
            font-size: 1.2rem;
            font-weight: 800;
            display: grid;
            place-items: center;
            border: 2px solid var(--line);
            box-shadow: 0 8px 0 rgba(0,0,0,0.14);
        }

        .access-card h2 {
            margin: 22px 0 16px;
            font-size: clamp(1.8rem, 2vw, 2.6rem);
            line-height: 1.1;
            letter-spacing: -0.06em;
            font-weight: 800;
            color: var(--ink);
        }

        .access-card p {
            margin: 0 0 18px;
            color: var(--muted);
            font-size: 1.05rem;
            line-height: 1.5;
        }

        form {
            display: grid;
            gap: 18px;
        }

        .field-label {
            display: block;
            margin: 0 0 8px;
            font-size: 0.78rem;
            font-weight: 800;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            color: var(--ink);
        }

        input {
            width: 100%;
            min-height: 60px;
            border: 2px solid rgba(17,17,17,0.8);
            border-radius: 12px;
            background: rgba(255,255,255,0.25);
            font-size: 1.15rem;
            color: var(--ink);
            padding: 16px 18px;
            outline: none;
            transition: border-color 0.2s ease, box-shadow 0.2s ease, transform 0.2s ease;
        }

        input:focus {
            border-color: var(--accent);
            box-shadow: 0 0 0 4px rgba(13, 77, 186, 0.12);
        }

        .submit-btn {
            min-height: 60px;
            border: 2px solid var(--line);
            border-radius: 12px;
            background: linear-gradient(180deg, #f4cb54, #e4b52b);
            color: var(--ink);
            font-weight: 800;
            letter-spacing: 0.03em;
            font-size: 1.05rem;
            cursor: pointer;
            box-shadow: 0 8px 0 rgba(0,0,0,0.15);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 0 rgba(0,0,0,0.15);
        }

        .profile-shell {
            display: none;
            padding-top: 26px;
        }

        .profile-shell.active {
            display: block;
        }

        .profile-title {
            margin: 0 0 34px;
            font-size: clamp(4rem, 7vw, 9rem);
            line-height: 0.9;
            letter-spacing: -0.065em;
            font-family: "Cormorant Garamond", serif;
            color: var(--ink);
        }

        .profile-grid {
            display: grid;
            grid-template-columns: 360px 1fr;
            gap: 36px;
            align-items: start;
        }

        .profile-card {
            background: linear-gradient(180deg, #f5f4f2, #f0efe9);
            border: 2px solid var(--line);
            border-radius: 20px;
            box-shadow: 12px 14px 0 rgba(13, 77, 186, 0.2);
            padding: 24px 20px 20px;
            text-align: center;
        }

        .avatar-wrap {
            width: 190px;
            height: 190px;
            margin: 0 auto 14px;
            border-radius: 50%;
            border: 3px solid var(--line);
            background: linear-gradient(135deg, #d9e7ff, #bfd5ff 35%, #8eb7ff 100%);
            overflow: hidden;
            position: relative;
            box-shadow: inset 0 0 0 5px rgba(255,255,255,0.6), 0 12px 0 rgba(0,0,0,0.12);
        }

        .avatar-wrap::before {
            content: "";
            position: absolute;
            inset: 12px;
            border-radius: 50%;
            background: radial-gradient(circle at 50% 30%, rgba(255,255,255,0.6), rgba(13,77,186,0.18));
        }

        .avatar-wrap::after {
            content: "";
            position: absolute;
            left: 18%;
            right: 18%;
            bottom: 10%;
            height: 42%;
            border-radius: 48% 52% 48% 52% / 58% 60% 40% 42%;
            background: linear-gradient(180deg, #0d0d0f, #2d2d2d);
            box-shadow: 0 -18px 0 10px #f0f3ff;
            opacity: 0.75;
        }

        .student-name {
            margin: 10px 0 0;
            font-size: clamp(2rem, 2vw, 2.7rem);
            line-height: 1.05;
            font-weight: 800;
            letter-spacing: -0.05em;
        }

        .student-badge {
            display: inline-block;
            margin-top: 16px;
            background: var(--ink);
            color: #fff;
            border: 2px solid var(--line);
            border-radius: 8px;
            padding: 10px 18px;
            font-size: 0.72rem;
            font-weight: 800;
            letter-spacing: 0.12em;
            text-transform: uppercase;
        }

        .info-panel {
            display: grid;
            grid-template-columns: repeat(2, minmax(220px, 1fr));
            gap: 18px;
        }

        .info-box {
            min-height: 104px;
            background: rgba(255,255,255,0.28);
            border: 2px solid rgba(17,17,17,0.8);
            border-radius: 16px;
            padding: 16px 18px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            box-shadow: inset 0 0 0 1px rgba(255,255,255,0.28);
        }

        .info-label {
            margin: 0 0 6px;
            font-size: 0.75rem;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: var(--muted);
            font-weight: 700;
        }

        .info-value {
            margin: 0;
            font-size: clamp(1.1rem, 1.4vw, 1.5rem);
            font-weight: 700;
            line-height: 1.4;
            letter-spacing: -0.04em;
            color: #121212;
        }

        .info-box.full {
            grid-column: 1 / -1;
            min-height: 76px;
        }

        .contact-box {
            grid-column: 1 / -1;
            text-align: center;
            min-height: 78px;
            background: rgba(255,255,255,0.25);
            border: 2px solid rgba(17,17,17,0.8);
            border-radius: 14px;
            padding: 18px 20px;
        }

        .profile-status {
            margin-top: 18px;
            display: inline-flex;
            align-items: center;
            gap: 12px;
            font-size: 0.82rem;
            letter-spacing: 0.14em;
            text-transform: uppercase;
            color: var(--ink);
            font-weight: 700;
        }

        .profile-status::before {
            content: "";
            width: 12px;
            height: 12px;
            border-radius: 50%;
            display: inline-block;
            background: #2cb06d;
            box-shadow: 0 0 0 4px rgba(44, 176, 109, 0.14);
        }

        @media (max-width: 940px) {
            .frame { width: min(100vw - 24px, 1200px); margin: 18px auto; }

            .topbar {
                padding: 16px 18px;
                min-height: 70px;
            }

            .brand {
                font-size: 0.86rem;
                letter-spacing: 0.03em;
            }

            .hero-panel {
                grid-template-columns: 1fr;
                gap: 30px;
            }

            .content {
                padding: 26px 24px 42px;
            }

            .profile-grid {
                grid-template-columns: 1fr;
            }

            .access-card {
                width: 100%;
                margin-left: 0;
            }
        }

        @media (max-width: 560px) {
            .topbar {
                flex-direction: column;
                align-items: flex-start;
            }

            .home-btn {
                width: 100%;
            }

            .info-panel {
                grid-template-columns: 1fr;
            }

            .profile-title {
                font-size: 3.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="frame">
        <header class="topbar">
            <div class="brand">
                <span class="brand-mark" aria-hidden="true"></span>
                <span>Student Desk</span>
            </div>
            <a class="home-btn" href="/?home=1">Home</a>
        </header>

        <main class="content">
            <?php if (!$showProfile): ?>
                <section class="hero-panel" aria-label="Student information page">
                    <div class="intro">
                        <div class="label-tag">Student Information</div>
                        <h1>Welcome,<br>Student<br>User.</h1>
                        <p class="subtext">A bright little corner for the essential details of a BS Information Technology student.</p>
                        <div class="meta">
                            <span class="meta-dot" aria-hidden="true"></span>
                            <span>MCC / 3F4 / 3RD YEAR</span>
                        </div>
                    </div>

                    <aside class="access-card">
                        <div class="access-badge">01</div>
                        <h2>Profile access</h2>
                        <p>Verify the student name to open the full profile.</p>
                        <form id="studentForm" method="get" action="">
                            <div>
                                <label class="field-label" for="studentName">Student Name</label>
                                <input id="studentName" name="student" type="text" placeholder="Enter student name" value="Kane Ashley E. Naling" required>
                            </div>
                            <button class="submit-btn" type="submit">Open student profile</button>
                        </form>
                    </aside>
                </section>
            <?php else: ?>
                <section class="profile-shell active" aria-label="Student profile overview">
                    <h1 class="profile-title">Student profile</h1>

                    <div class="profile-grid">
                        <aside class="profile-card">
                            <div class="avatar-wrap" aria-label="Student profile image"></div>
                            <h2 class="student-name"><?php echo htmlspecialchars($student['name']); ?></h2>
                            <div class="student-badge"><?php echo htmlspecialchars($student['course']); ?></div>
                            <div class="profile-status">active profile</div>
                        </aside>

                        <div class="info-panel">
                            <div class="info-box">
                                <p class="info-label">Student ID</p>
                                <p class="info-value"><?php echo htmlspecialchars($student['id']); ?></p>
                            </div>
                            <div class="info-box">
                                <p class="info-label">Name</p>
                                <p class="info-value"><?php echo htmlspecialchars($student['name']); ?></p>
                            </div>

                            <div class="info-box">
                                <p class="info-label">Course</p>
                                <p class="info-value"><?php echo htmlspecialchars($student['course']); ?></p>
                            </div>
                            <div class="info-box">
                                <p class="info-label">Year level</p>
                                <p class="info-value"><?php echo htmlspecialchars($student['year']); ?></p>
                            </div>

                            <div class="info-box">
                                <p class="info-label">Section</p>
                                <p class="info-value"><?php echo htmlspecialchars($student['section']); ?></p>
                            </div>
                            <div class="info-box">
                                <p class="info-label">Email</p>
                                <p class="info-value"><?php echo htmlspecialchars($student['email']); ?></p>
                            </div>

                            <div class="info-box full">
                                <p class="info-label">Address</p>
                                <p class="info-value"><?php echo htmlspecialchars($student['address']); ?></p>
                            </div>

                            <div class="contact-box">
                                <p class="info-label">Contact</p>
                                <p class="info-value"><?php echo htmlspecialchars($student['contact']); ?></p>
                            </div>
                        </div>
                    </div>
                </section>
            <?php endif; ?>
        </main>
    </div>
</body>
</html>

        .btn-ghost {
            background: transparent;
            color: var(--text-muted);
            border: 1px solid var(--border);
        }

        .btn-ghost:hover {
            color: var(--text);
            border-color: rgba(255,255,255,0.2);
            background: var(--bg3);
        }

        /* ── STAT BAR ── */
        .stats {
            display: flex;
            justify-content: center;
            gap: 3rem;
            flex-wrap: wrap;
            padding: 3rem 2rem;
            border-top: 1px solid var(--border);
            border-bottom: 1px solid var(--border);
            position: relative;
            z-index: 1;
        }

        .stat { text-align: center; }

        .stat-value {
            font-size: 2rem;
            font-weight: 800;
            color: var(--text);
            letter-spacing: -0.03em;
            line-height: 1;
        }

        .stat-value span { color: var(--lava); }

        .stat-label {
            font-size: 0.78rem;
            color: var(--text-muted);
            font-weight: 500;
            margin-top: 0.3rem;
            text-transform: uppercase;
            letter-spacing: 0.06em;
        }

        /* ── SECTION ── */
        section {
            padding: 5rem 2rem;
            position: relative;
            z-index: 1;
        }

        .section-label {
            font-family: var(--mono);
            font-size: 0.72rem;
            font-weight: 500;
            color: var(--lava);
            text-transform: uppercase;
            letter-spacing: 0.12em;
            margin-bottom: 0.75rem;
        }

        .section-title {
            font-size: clamp(1.8rem, 4vw, 2.8rem);
            font-weight: 800;
            letter-spacing: -0.03em;
            line-height: 1.1;
            margin-bottom: 1rem;
        }

        .section-desc {
            color: var(--text-muted);
            font-size: 1rem;
            line-height: 1.7;
            max-width: 480px;
        }

        /* ── FEATURES GRID ── */
        .features-layout {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1px;
            background: var(--border);
            border: 1px solid var(--border);
            border-radius: 16px;
            overflow: hidden;
            margin-top: 3rem;
        }

        .feature {
            background: var(--bg);
            padding: 2rem;
            transition: background 0.2s;
            position: relative;
        }

        .feature:hover { background: var(--bg2); }

        .feature::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0;
            height: 1px;
            background: linear-gradient(90deg, transparent, var(--lava-glow-strong), transparent);
            opacity: 0;
            transition: opacity 0.3s;
        }

        .feature:hover::before { opacity: 1; }

        .feature-icon {
            width: 40px; height: 40px;
            background: rgba(221,72,20,0.1);
            border: 1px solid var(--border-hot);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            margin-bottom: 1rem;
        }

        .feature h3 {
            font-size: 1rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            letter-spacing: -0.01em;
        }

        .feature p {
            font-size: 0.875rem;
            color: var(--text-muted);
            line-height: 1.6;
        }

        /* ── CODE SECTION ── */
        .code-section {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 3rem;
            align-items: center;
        }

        .code-block {
            background: var(--bg2);
            border: 1px solid var(--border);
            border-radius: 12px;
            overflow: hidden;
        }

        .code-header {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.75rem 1rem;
            border-bottom: 1px solid var(--border);
            background: var(--bg3);
        }

        .dot { width: 10px; height: 10px; border-radius: 50%; }
        .dot-r { background: #ff5f57; }
        .dot-y { background: #febc2e; }
        .dot-g { background: #28c840; }

        .code-filename {
            font-family: var(--mono);
            font-size: 0.75rem;
            color: var(--text-muted);
            margin-left: 0.5rem;
        }

        .code-body {
            padding: 1.5rem;
            font-family: var(--mono);
            font-size: 0.82rem;
            line-height: 1.8;
            color: #a1a1aa;
            overflow-x: auto;
        }

        .code-body .kw { color: #f97316; }
        .code-body .fn { color: #60a5fa; }
        .code-body .str { color: #86efac; }
        .code-body .cm { color: #3f3f46; }
        .code-body .cl { color: #fde68a; }
        .code-body .var { color: #c4b5fd; }

        /* ── STRUCTURE ── */
        .structure-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
            gap: 0.5rem;
            margin-top: 2rem;
        }

        .dir-item {
            background: var(--bg2);
            border: 1px solid var(--border);
            border-radius: 8px;
            padding: 0.875rem 1rem;
            font-family: var(--mono);
            font-size: 0.8rem;
            color: var(--text-muted);
            transition: all 0.2s;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .dir-item:hover {
            border-color: var(--border-hot);
            color: var(--text);
            background: rgba(221,72,20,0.05);
        }

        .dir-item .dir-icon { color: var(--lava); font-size: 0.9rem; }

        /* ── FOOTER ── */
        footer {
            border-top: 1px solid var(--border);
            padding: 2rem;
            position: relative;
            z-index: 1;
        }

        .footer-inner {
            max-width: 1100px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .footer-meta {
            font-family: var(--mono);
            font-size: 0.75rem;
            color: var(--text-dim);
            display: flex;
            gap: 1.5rem;
            flex-wrap: wrap;
        }

        .footer-meta span { color: var(--text-muted); }

        .footer-links {
            display: flex;
            gap: 1rem;
        }

        .footer-links a {
            color: var(--text-muted);
            text-decoration: none;
            font-size: 0.82rem;
            transition: color 0.2s;
        }

        .footer-links a:hover { color: var(--lava); }

        /* ── DIVIDER ── */
        .divider {
            height: 1px;
            background: linear-gradient(90deg, transparent, var(--border), transparent);
            margin: 0 2rem;
            position: relative;
            z-index: 1;
        }

        /* ── ANIMATIONS ── */
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(24px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        .hero > * {
            animation: fadeUp 0.6s ease both;
        }

        .hero .badge         { animation-delay: 0.05s; }
        .hero h1             { animation-delay: 0.15s; }
        .hero .hero-sub      { animation-delay: 0.25s; }
        .hero .hero-actions  { animation-delay: 0.35s; }

        @media (max-width: 768px) {
            .features-layout { grid-template-columns: 1fr; }
            .code-section { grid-template-columns: 1fr; }
            nav { padding: 1rem 1.5rem; }
            .nav-links a:not(.btn-nav) { display: none; }
            section { padding: 3rem 1.5rem; }
        }
    </style>
</head>
<body>

<div class="orb orb-1"></div>
<div class="orb orb-2"></div>

<!-- NAV -->
<nav>
    <a class="nav-logo" href="#">
        <div class="flame">🔥</div>
        LavaLust
    </a>
    <div class="nav-links">
        <a href="https://lavalust.netlify.app/docs/" target="_blank">Docs</a>
        <a href="https://github.com/ronmarasigan/LavaLust" target="_blank">GitHub</a>
        <a href="https://lavalust.netlify.app/docs/" target="_blank" class="btn-nav">Get Started →</a>
    </div>
</nav>

<!-- HERO -->
<div class="hero wrap">
    <div class="badge">v<?php echo config_item('VERSION') ?? '4.x'; ?> — Now Available</div>
    <h1>
        <span class="word-lava">Lava</span><span class="word-lust">Lust</span><br>Framework
    </h1>
    <p class="hero-sub">
        A lightweight, expressive PHP MVC framework built for developers who want structure without the bloat.
    </p>
    <div class="hero-actions">
        <a href="https://lavalust.netlify.app/docs/" target="_blank" class="btn btn-primary">
            Read the Docs
        </a>
        <a href="https://github.com/ronmarasigan/LavaLust" target="_blank" class="btn btn-ghost">
            View on GitHub
        </a>
    </div>
</div>

<!-- STATS -->
<div class="stats">
    <div class="stat">
        <div class="stat-value">MVC<span>+</span></div>
        <div class="stat-label">Architecture</div>
    </div>
    <div class="stat">
        <div class="stat-value"><span>4</span> DB</div>
        <div class="stat-label">Drivers</div>
    </div>
    <div class="stat">
        <div class="stat-value">HMVC<span>✓</span></div>
        <div class="stat-label">Module Support</div>
    </div>
    <div class="stat">
        <div class="stat-value">REST<span>*</span></div>
        <div class="stat-label">API Ready</div>
    </div>
</div>

<div class="divider"></div>

<!-- FEATURES -->
<section>
    <div class="wrap">
        <div class="section-label">// features</div>
        <h2 class="section-title">Everything you need.<br>Nothing you don't.</h2>
        <p class="section-desc">LavaLust gives you a clean, consistent structure so you can focus on building — not configuring.</p>

        <div class="features-layout">
            <div class="feature">
                <div class="feature-icon">🧠</div>
                <h3>MVC Architecture</h3>
                <p>Clean separation between Models, Views, and Controllers keeps your codebase maintainable as it grows.</p>
            </div>
            <div class="feature">
                <div class="feature-icon">⚙️</div>
                <h3>Flexible Routing</h3>
                <p>Define routes with GET, POST, PUT, DELETE and more. Supports named routes, closures, and grouped prefixes.</p>
            </div>
            <div class="feature">
                <div class="feature-icon">🗄️</div>
                <h3>ORM-style Models</h3>
                <p>Fluent query builder with relationships, soft deletes, timestamps, mass assignment protection, and eager loading.</p>
            </div>
            <div class="feature">
                <div class="feature-icon">📦</div>
                <h3>HMVC Modules</h3>
                <p>Scale your app with self-contained modules. Each module owns its controllers, models, and views.</p>
            </div>
            <div class="feature">
                <div class="feature-icon">🔗</div>
                <h3>REST API Support</h3>
                <p>Build JSON APIs out of the box using built-in conventions, response helpers, and content negotiation.</p>
            </div>
            <div class="feature">
                <div class="feature-icon">🛡️</div>
                <h3>Libraries & Helpers</h3>
                <p>Sessions, form validation, file uploads, pagination, encryption — batteries included where it counts.</p>
            </div>
        </div>
    </div>
</section>

<div class="divider"></div>

<!-- CODE EXAMPLE -->
<section>
    <div class="wrap">
        <div class="code-section">
            <div>
                <div class="section-label">// quick start</div>
                <h2 class="section-title">Up and running in minutes.</h2>
                <p class="section-desc">Define a route, write a controller method, render a view. That's the whole loop.</p>
            </div>

            <div>
                <div class="code-block" style="margin-bottom:1rem;">
                    <div class="code-header">
                        <div class="dot dot-r"></div>
                        <div class="dot dot-y"></div>
                        <div class="dot dot-g"></div>
                        <span class="code-filename">app/config/routes.php</span>
                    </div>
                    <div class="code-body">
<span class="var">$router</span>-><span class="fn">get</span>(<span class="str">'/'</span>, <span class="str">'Welcome::index'</span>);<br>
<span class="var">$router</span>-><span class="fn">get</span>(<span class="str">'/users'</span>, <span class="str">'Users::index'</span>);<br>
<span class="var">$router</span>-><span class="fn">post</span>(<span class="str">'/users/store'</span>, <span class="str">'Users::store'</span>);
                    </div>
                </div>

                <div class="code-block">
                    <div class="code-header">
                        <div class="dot dot-r"></div>
                        <div class="dot dot-y"></div>
                        <div class="dot dot-g"></div>
                        <span class="code-filename">app/controllers/Welcome.php</span>
                    </div>
                    <div class="code-body">
<span class="kw">class</span> <span class="cl">Welcome</span> <span class="kw">extends</span> <span class="cl">Controller</span> {<br>
&nbsp;&nbsp;<span class="kw">public function</span> <span class="fn">index</span>() {<br>
&nbsp;&nbsp;&nbsp;&nbsp;<span class="var">$this</span>-><span class="fn">call</span>-><span class="fn">model</span>(<span class="str">'UserModel'</span>);<br>
&nbsp;&nbsp;&nbsp;&nbsp;<span class="var">$data</span>[<span class="str">'users'</span>] = <span class="var">$this</span>-><span class="cl">UserModel</span>-><span class="fn">all</span>();<br>
&nbsp;&nbsp;&nbsp;&nbsp;<span class="var">$this</span>-><span class="fn">call</span>-><span class="fn">view</span>(<span class="str">'welcome'</span>, <span class="var">$data</span>);<br>
&nbsp;&nbsp;}<br>
}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="divider"></div>

<!-- STRUCTURE -->
<section>
    <div class="wrap">
        <div class="section-label">// project structure</div>
        <h2 class="section-title">Organized by default.</h2>
        <p class="section-desc">A predictable directory layout so every file has a logical home from day one.</p>

        <div class="structure-grid">
            <?php
            $dirs = [
                ['app/config',      '⚙'],
                ['app/controllers', '🎮'],
                ['app/helpers',     '🔧'],
                ['app/libraries',   '📚'],
                ['app/language',    '🌐'],
                ['app/middlewares', '🛡️'],
                ['app/migrations',  '🔄'],
                ['app/models',      '🗄'],
                ['app/modules',     '📦'],
                ['app/views',       '🖼'],
                ['public/',         '🌍'],
                ['runtime/',        '⚡'],
                ['console/',        '💻'],
                ['scheme/',         '📐'],
            ];
            foreach ($dirs as [$name, $icon]): ?>
            <div class="dir-item">
                <span class="dir-icon"><?php echo $icon; ?></span>
                <?php echo $name; ?>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- FOOTER -->
<footer>
    <div class="footer-inner">
        <div class="footer-meta">
            <span>rendered in <span><?php echo lava_instance()->performance->elapsed_time('lavalust'); ?>s</span></span>
            <span>memory <span><?php echo lava_instance()->performance->memory_usage(); ?></span></span>
            <?php if(config_item('environment') === 'development'): ?>
            <span>version <span><?php echo config_item('version'); ?></span></span>
            <span style="color: #dd4814;">● development</span>
            <?php endif; ?>
        </div>
        <div class="footer-links">
            <a href="https://github.com/ronmarasigan/LavaLust" target="_blank">GitHub</a>
            <a href="https://lavalust.netlify.app/docs/" target="_blank">Docs</a>
            <a href="https://opensource.org/licenses/MIT" target="_blank">MIT License</a>
        </div>
    </div>
</footer>

</body>
</html>
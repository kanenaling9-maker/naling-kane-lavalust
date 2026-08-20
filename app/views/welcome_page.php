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
            --bg-page: #f3f6fb;
            --panel: #ffffff;
            --panel-soft: #eef4ff;
            --ink: #111827;
            --muted: #5d6472;
            --line: #d8e1f0;
            --accent: #1d4ed8;
            --accent-dark: #153ea8;
            --accent-soft: #dfeaff;
            --button: #1d4ed8;
            --button-text: #ffffff;
            --surface: #f8fafc;
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
            border: 1px solid var(--line);
            border-radius: 18px;
            overflow: hidden;
        }

        .topbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 24px;
            min-height: 82px;
            padding: 16px 32px;
            border-bottom: 1px solid var(--line);
            background: rgba(255, 255, 255, 0.92);
        }

        .brand {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            font-weight: 700;
            letter-spacing: 0.04em;
            text-transform: uppercase;
            font-size: 1rem;
            color: var(--ink);
        }

        .brand-mark {
            width: 28px;
            height: 28px;
            border-radius: 50%;
            background: linear-gradient(135deg, #1d4ed8, #0f172a);
            border: 1px solid rgba(17,24,39,0.18);
        }

        .home-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 110px;
            padding: 10px 18px;
            border: 1px solid var(--line);
            border-radius: 10px;
            background: var(--panel-soft);
            color: var(--ink);
            text-decoration: none;
            font-weight: 600;
            transition: background 0.2s ease, border-color 0.2s ease;
        }

        .home-btn:hover {
            background: #eaf1ff;
            border-color: #bed3ff;
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
            background: var(--accent-soft);
            color: var(--accent-dark);
            text-transform: uppercase;
            letter-spacing: 0.09em;
            font-size: 0.72rem;
            font-weight: 800;
            border-radius: 8px;
            border: 1px solid #bfd4ff;
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
            background: #f9fbff;
            border: 1px solid var(--line);
            border-radius: 16px;
            padding: 22px 18px 18px;
        }

        .access-badge {
            position: absolute;
            top: -16px;
            right: 18px;
            width: 48px;
            height: 48px;
            border-radius: 10px;
            background: var(--accent);
            color: #fff;
            font-size: 1.15rem;
            font-weight: 800;
            display: grid;
            place-items: center;
            border: 1px solid var(--line);
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
            min-height: 58px;
            border: 1px solid var(--accent);
            border-radius: 10px;
            background: var(--button);
            color: var(--button-text);
            font-weight: 700;
            letter-spacing: 0.02em;
            font-size: 1rem;
            cursor: pointer;
            transition: background 0.2s ease;
        }

        .submit-btn:hover {
            background: var(--accent-dark);
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
            background: var(--surface);
            border: 1px solid var(--line);
            border-radius: 14px;
            padding: 22px 18px 18px;
            text-align: center;
        }

        .avatar-wrap {
            width: 190px;
            height: 190px;
            margin: 0 auto 14px;
            border-radius: 50%;
            border: 2px solid var(--line);
            background: linear-gradient(135deg, #dfeaff, #cfe0ff 35%, #bcd1ff 100%);
            overflow: hidden;
            position: relative;
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
            background: var(--accent);
            color: #fff;
            border: 1px solid var(--accent-dark);
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
            background: #f8fafc;
            border: 1px solid var(--line);
            border-radius: 12px;
            padding: 16px 18px;
            display: flex;
            flex-direction: column;
            justify-content: center;
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
            background: #f8fafc;
            border: 1px solid var(--line);
            border-radius: 12px;
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
                    </div>

                    <aside class="access-card">
                        <div class="access-badge">01</div>
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

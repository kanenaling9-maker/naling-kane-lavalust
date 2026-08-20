<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

$escape = static function ($value) {
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
};
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $escape($student['name']) ?> | Kane Student Desk</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700;800&family=Playfair+Display:wght@700;800;900&display=swap" rel="stylesheet">
    <style>
        :root{--ink:#17152b;--paper:#ffffff;--cream:#f3f0ff;--yellow:#6d5ce7;--muted:#68627b;--line:#27213f}*{box-sizing:border-box}body{margin:0;min-height:100vh;background:var(--cream);color:var(--ink);font-family:"DM Sans",sans-serif;padding:34px 20px}body:after{content:"";position:fixed;width:180px;height:180px;right:-60px;top:65px;border:1px solid #8e82ed;border-radius:50%;background:#dce5ff;z-index:-1}.frame{width:min(980px,100%);margin:auto;background:var(--paper);border:2px solid var(--line);box-shadow:12px 12px 0 var(--yellow);border-radius:7px;overflow:hidden}.topbar{min-height:80px;padding:18px 26px;display:flex;justify-content:space-between;align-items:center;border-bottom:2px solid var(--line)}.brand{display:flex;align-items:center;gap:12px;font-weight:800;letter-spacing:.04em;text-transform:uppercase}.mark{width:38px;height:38px;border:2px solid var(--line);border-radius:50%;display:grid;place-items:center;background:var(--yellow);font-family:"Playfair Display",serif;font-size:1.1rem}.nav{display:flex;gap:10px}.nav a{display:inline-block;padding:10px 15px;border:1px solid var(--line);border-radius:5px;text-decoration:none;color:var(--ink);font-weight:800;background:var(--paper)}.nav a.active{background:var(--yellow)}main{padding:62px}.eyebrow{display:inline-block;padding:8px 11px;background:var(--yellow);font-size:.75rem;font-weight:800;letter-spacing:.12em;text-transform:uppercase;border-radius:3px}h1{font-family:"Playfair Display",serif;font-size:clamp(3.2rem,6vw,5.7rem);line-height:.92;letter-spacing:-.055em;margin:22px 0 42px}.profile-grid{display:grid;grid-template-columns:230px 1fr;gap:42px;align-items:start}.identity{border:2px solid var(--line);border-radius:8px;padding:22px;background:var(--cream);box-shadow:9px 9px 0 var(--yellow);position:relative}.identity:after{content:"";position:absolute;width:11px;height:11px;border-radius:50%;right:14px;top:14px;background:var(--yellow)}.avatar{width:126px;height:126px;border:2px solid var(--line);border-radius:50%;display:grid;place-items:center;background:var(--yellow);font-family:"Playfair Display",serif;font-size:3.3rem;margin:2px auto 25px}.identity h2{font-family:"Playfair Display",serif;font-size:1.5rem;line-height:1.05;margin:0 0 15px}.badge{background:var(--ink);color:var(--yellow);padding:10px;font-size:.68rem;font-weight:800;letter-spacing:.08em;text-transform:uppercase;border-radius:3px}.status{font-size:.7rem;color:var(--muted);margin-top:17px;letter-spacing:.1em;text-transform:uppercase}.info-grid{display:grid;grid-template-columns:1fr 1fr;gap:12px}.info-box{border:1px solid #d9d2f4;border-radius:5px;padding:17px;background:#fbfaff;min-height:82px}.info-box.wide{grid-column:1/-1}.info-label{font-size:.68rem;color:var(--muted);letter-spacing:.1em;text-transform:uppercase;font-weight:800;margin:0 0 9px}.info-value{font-size:.98rem;font-weight:700;margin:0;overflow-wrap:anywhere}.footer{margin-top:40px;color:var(--muted);font-size:.8rem}.footer a{color:var(--ink);font-weight:800}@media(max-width:720px){body{padding:15px 10px}.topbar{align-items:flex-start;gap:16px;flex-direction:column}.nav{width:100%}.nav a{flex:1;text-align:center}main{padding:48px 24px 58px}.profile-grid{grid-template-columns:1fr;gap:36px}.identity{max-width:290px}.info-grid{grid-template-columns:1fr}.info-box.wide{grid-column:auto}}
    </style>
</head>
<body>
    <div class="frame">
        <header class="topbar">
            <div class="brand"><span class="mark">K</span><span>Kane Student Desk</span></div>
            <nav class="nav" aria-label="Main navigation"><a href="/student">Home</a><a class="active" href="/student/profile">Profile</a></nav>
        </header>
        <main>
            <div class="eyebrow">Verified student record</div>
            <h1>Student profile</h1>
            <div class="profile-grid">
                <aside class="identity">
                    <div class="avatar">NA</div>
                    <h2><?= $escape($student['name']) ?></h2>
                    <div class="badge"><?= $escape($student['course']) ?></div>
                    <div class="status">Active profile</div>
                </aside>
                <section class="info-grid" aria-label="Student information">
                    <div class="info-box"><p class="info-label">Student ID</p><p class="info-value"><?= $escape($student['student_id']) ?></p></div>
                    <div class="info-box"><p class="info-label">Name</p><p class="info-value"><?= $escape($student['name']) ?></p></div>
                    <div class="info-box"><p class="info-label">Course</p><p class="info-value"><?= $escape($student['course']) ?></p></div>
                    <div class="info-box"><p class="info-label">Year level</p><p class="info-value"><?= $escape($student['year']) ?></p></div>
                    <div class="info-box"><p class="info-label">Section</p><p class="info-value"><?= $escape($student['section']) ?></p></div>
                    <div class="info-box"><p class="info-label">Email</p><p class="info-value"><?= $escape($student['email']) ?></p></div>
                    <div class="info-box wide"><p class="info-label">Address</p><p class="info-value"><?= $escape($student['address']) ?></p></div>
                    <div class="info-box"><p class="info-label">Contact</p><p class="info-value"><?= $escape($student['contact']) ?></p></div>
                </section>
            </div>
            <p class="footer">Protected by StudentMiddleware. <a href="/student">Return to student desk</a></p>
        </main>
    </div>
</body>
</html>

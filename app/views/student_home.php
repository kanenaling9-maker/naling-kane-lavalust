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
    <title>Kane Student Desk</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700;800&family=Playfair+Display:wght@700;800;900&display=swap" rel="stylesheet">
    <style>
        :root{--ink:#17152b;--paper:#ffffff;--cream:#f3f0ff;--yellow:#6d5ce7;--muted:#68627b;--line:#27213f;--blue:#3867f0}
        *{box-sizing:border-box} body{margin:0;min-height:100vh;background:var(--cream);color:var(--ink);font-family:"DM Sans",sans-serif;padding:34px 20px;overflow-x:hidden}
        body:before,body:after{content:"";position:fixed;border:1px solid #8e82ed;border-radius:50%;pointer-events:none;z-index:-1} body:before{width:180px;height:180px;left:-76px;top:-86px} body:after{width:150px;height:150px;right:-52px;bottom:-72px;background:#dce5ff}
        .frame{width:min(980px,100%);margin:auto;background:var(--paper);border:2px solid var(--line);box-shadow:12px 12px 0 var(--yellow);border-radius:7px;overflow:hidden}.topbar{min-height:80px;padding:18px 26px;display:flex;justify-content:space-between;align-items:center;border-bottom:2px solid var(--line)}
        .brand{display:flex;align-items:center;gap:12px;font-weight:800;letter-spacing:.04em;text-transform:uppercase}.mark{width:38px;height:38px;border:2px solid var(--line);border-radius:50%;display:grid;place-items:center;background:var(--yellow);font-family:"Playfair Display",serif;font-size:1.1rem}.nav{display:flex;gap:10px}.nav a,.button{display:inline-block;padding:10px 15px;border:1px solid var(--line);border-radius:5px;text-decoration:none;color:var(--ink);font-weight:800;background:var(--paper)}.nav a.active,.button{background:var(--yellow)}
        main{padding:74px 62px 82px}.hero{display:grid;grid-template-columns:1.05fr .95fr;gap:62px;align-items:center}.eyebrow{display:inline-block;padding:8px 11px;background:var(--yellow);font-size:.75rem;font-weight:800;letter-spacing:.12em;text-transform:uppercase;border-radius:3px}h1{font-family:"Playfair Display",serif;font-size:clamp(3.8rem,7vw,6.6rem);line-height:.88;letter-spacing:-.055em;margin:26px 0 24px;max-width:540px}h1 span{display:block}.intro{font-family:"Playfair Display",serif;font-size:1.1rem;line-height:1.65;color:var(--muted);max-width:480px}.meta{display:flex;align-items:center;gap:10px;margin-top:28px;font-size:.78rem;font-weight:800;letter-spacing:.1em}.dot{width:9px;height:9px;border-radius:50%;background:var(--yellow)}.card{position:relative;border:2px solid var(--line);border-radius:8px;background:var(--cream);padding:30px;box-shadow:10px 10px 0 var(--yellow)}.card:before{content:"01";position:absolute;right:16px;top:-13px;padding:3px 8px;background:var(--ink);color:var(--yellow);font-size:.75rem;font-weight:800}.card h2{font-family:"Playfair Display",serif;font-size:2rem;margin:0 0 14px}.card p{color:var(--muted);line-height:1.5;margin:0 0 24px}.label{display:block;font-size:.72rem;font-weight:800;letter-spacing:.1em;text-transform:uppercase;margin-bottom:7px}input{width:100%;padding:14px;border:1px solid var(--line);border-radius:5px;background:#fff;font:inherit;margin-bottom:12px}.button{width:100%;font-size:.95rem;cursor:pointer}.note{font-size:.75rem;color:var(--muted);margin-top:18px!important}
        @media(max-width:720px){body{padding:15px 10px}.topbar{align-items:flex-start;gap:16px;flex-direction:column}.nav{width:100%}.nav a{flex:1;text-align:center}main{padding:54px 24px 60px}.hero{grid-template-columns:1fr;gap:46px}h1{font-size:clamp(3.5rem,17vw,5.5rem)}.card{margin:0 8px 0 0}}
    </style>
</head>
<body>
    <div class="frame">
        <header class="topbar">
            <div class="brand"><span class="mark">K</span><span>Kane Student Desk</span></div>
            <nav class="nav" aria-label="Main navigation"><a class="active" href="/student">Home</a><a href="/student/profile">Profile</a></nav>
        </header>
        <main>
            <section class="hero">
                <div>
                    <div class="eyebrow">Student Information</div>
                    <h1>Welcome,<span>Student</span><span>User.</span></h1>
                    <p class="intro">A bright little corner for the essential details of a BS Information Technology student.</p>
                    <div class="meta"><span class="dot"></span><span>MCC / <?= $escape($student['section']) ?> / <?= $escape($student['year']) ?></span></div>
                </div>
                <aside class="card">
                    <h2>Profile access</h2>
                    <p>Visit the protected student profile to view the complete information.</p>
                    <span class="label">Student name</span>
                    <form method="post" action="/student/profile">
                        <input type="text" name="name" value="<?= $escape($student['name']) ?>" placeholder="Enter any student name" required>
                        <button class="button" type="submit">Open student profile</button>
                    </form>
                    <p class="note">Access is enabled when you enter through this home page.</p>
                </aside>
            </section>
        </main>
    </div>
</body>
</html>

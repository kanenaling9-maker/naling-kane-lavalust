<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class StudentAccessMiddleware
{
    public function handle($next)
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        $studentName = trim((string) ($_GET['name'] ?? ''));

        $hasAccess = isset($_SESSION['student_access']) && $_SESSION['student_access'] === true;

        if (!$hasAccess && $studentName === '') {
            echo '<!DOCTYPE html>';
            echo '<html lang="en">';
            echo '<head>';
            echo '<meta charset="UTF-8">';
            echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
            echo '<title>Profile verification</title>';
            echo '<style>';
            echo ':root{--ink:#17152b;--paper:#fff;--cream:#f3f0ff;--purple:#6d5ce7;--blue:#3867f0;--muted:#68627b;--line:#27213f}*{box-sizing:border-box}body{margin:0;min-height:100vh;display:grid;place-items:center;padding:20px;background:var(--cream);color:var(--ink);font-family:Arial,sans-serif}.card{width:min(580px,100%);background:var(--paper);border:2px solid var(--line);padding:38px 48px;box-shadow:10px 10px 0 var(--purple)}.notice{border-left:7px solid var(--blue);background:#e5ebff;padding:17px 19px;margin-bottom:34px;line-height:1.45;font-size:1.05rem}.label{display:block;margin-bottom:10px;font-size:.9rem;font-weight:800;letter-spacing:.08em}.name{width:100%;padding:16px;border:2px solid #6d687c;border-radius:8px;background:#fff;font:inherit;font-size:1rem;margin-bottom:22px}.button{width:100%;padding:17px;border:2px solid var(--line);border-radius:8px;background:var(--purple);color:#fff;font-size:1.1rem;font-weight:800;cursor:pointer}.button:hover{background:var(--blue)}h1{font-size:0;position:absolute}';
            echo '</style>';
            echo '</head>';
            echo '<body><main class="card">';
            echo '<div class="notice">Please verify your name before opening the student profile.</div>';
            echo '<form method="get">';
            echo '<label class="label" for="student-name">STUDENT NAME</label>';
            echo '<input class="name" id="student-name" name="name" type="text" placeholder="Enter student name" required autofocus>';
            echo '<button class="button" type="submit">Open student profile</button>';
            echo '</form>';
            echo '</main></body></html>';
            exit;
        }

        if ($studentName !== '') {
            $_SESSION['student_access'] = true;
        }

        return $next();
    }
}

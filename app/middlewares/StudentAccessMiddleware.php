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
            echo '<!DOCTYPE html><html lang="en"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title>Profile access warning</title><style>body{margin:0;min-height:100vh;display:grid;place-items:center;padding:20px;background:#f3f0ff;color:#17152b;font-family:Arial,sans-serif}.card{width:min(560px,100%);padding:36px 42px;background:#fff;border:2px solid #27213f;box-shadow:10px 10px 0 #6d5ce7}.warning{padding:16px 18px;margin-bottom:24px;border-left:7px solid #d28b00;background:#fff1c7;color:#5d3b00;line-height:1.45}.button{display:inline-block;padding:13px 18px;background:#6d5ce7;color:#fff;border:2px solid #27213f;text-decoration:none;font-weight:700}</style></head><body><main class="card"><div class="warning"><strong>Warning:</strong> You must verify your student name before accessing the profile.</div><a class="button" href="/student">Return to homepage and verify</a></main></body></html>';
            exit;
        }

        if ($studentName !== '') {
            $_SESSION['student_access'] = true;
        }

        return $next();
    }
}

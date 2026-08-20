<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class StudentAccessMiddleware
{
    public function handle($next)
    {
        $hasHomeFlag = isset($_GET['home']) && $_GET['home'] === '1';
        $studentName = trim((string) ($_GET['student'] ?? ''));

        if ($studentName !== '' && !$hasHomeFlag) {
            http_response_code(403);
            echo '<!DOCTYPE html>';
            echo '<html lang="en">';
            echo '<head>';
            echo '<meta charset="UTF-8">';
            echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
            echo '<title>Access denied</title>';
            echo '<style>';
            echo 'body{margin:0;padding:40px 20px;display:grid;place-items:center;font-family:Arial,sans-serif;background:#f3f6fb;color:#111827;}';
            echo '.card{max-width:720px;width:100%;background:#fff7ed;border:1px solid #f7c98d;border-radius:18px;padding:28px 30px;box-shadow:0 10px 30px rgba(15,23,42,.08);}';
            echo 'h1{margin:0 0 12px;font-size:clamp(2.3rem,4vw,4rem);line-height:1;}';
            echo 'p{margin:0 0 18px;line-height:1.7;color:#475569;font-size:1.05rem;}';
            echo 'a{display:inline-block;padding:12px 18px;background:#1d4ed8;color:#fff;text-decoration:none;border-radius:10px;font-weight:700;}';
            echo '</style>';
            echo '</head>';
            echo '<body>';
            echo '<div class="card">';
            echo '<h1>Access denied.</h1>';
            echo '<p>Please return to the homepage and enter your student name first before opening the profile.</p>';
            echo '<a href="/?home=1">Go to homepage</a>';
            echo '</div>';
            echo '</body>';
            echo '</html>';
            return;
        }

        return $next();
    }
}

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
            $_SESSION['student_access_warning'] = 'Warning: this profile was opened without student verification.';
        }

        if ($studentName !== '') {
            $_SESSION['student_access'] = true;
        }

        return $next();
    }
}

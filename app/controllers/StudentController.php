<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class StudentController extends Controller
{
    private function student()
    {
        return [
            'student_id' => 'MCC2024-00162',
            'name' => 'Naling Kane Ashley E.',
            'course' => 'BS Information Technology',
            'year' => '3rd Year',
            'section' => '3F4',
            'email' => 'kanenaling9@gmail.com',
            'address' => 'Calero, Calapan City',
            'contact' => '09690483789',
        ];
    }

    public function index()
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        $_SESSION['student_access'] = true;
        $this->call->view('student_home', ['student' => $this->student()]);
    }

    public function profile()
    {
        $this->call->view('student_profile', ['student' => $this->student()]);
    }
}

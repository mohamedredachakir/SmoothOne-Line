<?php

namespace App\Controllers;
use App\services\Authservice;

class AuthController {

    public function showlogin() {
        require_once __DIR__ . '/../views/Auth/login.blade.php';
    }
    public function login() {
    $auth = new Authservice();
    $role = $auth->login(
        $_POST['email'],
        $_POST['password'],
    );
    if (!$role) {
    header('Location: /login');
    exit;
        }else {
            header('Location: /profile');
        }
    }

    public function logout() {
        session_destroy();
        header('Location: /login');
        exit();
    }

}

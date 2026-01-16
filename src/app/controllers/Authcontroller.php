<?php

namespace App\Controllers;
use App\services\Authservice;

class AuthController {

    public function showlogin() {
        require_once __DIR__ . '/../views/Auth/login.blade.php';
    }
    public function login() {
    $auth = new Authservice();
    $succes = $auth->login(
        $_POST['email'],
        $_POST['password'],
    );
    if ($succes) {
        header('Location: /dashboard');
        exit();
    }
}

}

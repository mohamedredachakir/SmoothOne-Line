<?php

namespace App\services;

use App\repositories\UserRepository;

class Authservice {


    public function login(string $email, string $password) {
        $userRepository = UserRepository::getInstance();
        $user = $userRepository->findbyemail($email);

         if (!$user) {
            return false;
        }

        if (!password_verify($password, $user['password'])) {
            return false;
        }

        $_SESSION['user'] = $user;
        return true;
    }
}
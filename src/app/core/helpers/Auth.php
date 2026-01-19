<?php

namespace App\core\helpers;


class Auth {
    public static function check() {
        if(!isset($_SESSION['user'])){
            header('Location: /login');
            exit();
        };
        return (object) $_SESSION['user'];
    }

    public static function role($role) {
        self::check();
        if($_SESSION['user']['role'] !== $role){
            header('/404');
            exit();
        };
    }
}
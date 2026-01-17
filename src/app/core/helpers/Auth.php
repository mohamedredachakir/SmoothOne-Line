<?php

namespace App\core\helpers;


class Auth {
    public static function check() {
        if(!isset($_SESSION['user'])){
            header('Location: /login');
            exit();
        };
    }

    public static function role($role) {
        self::check();
        if($_SESSION['user']['role'] !== $role){
            header('/404');
            exit();
        };
    }
}
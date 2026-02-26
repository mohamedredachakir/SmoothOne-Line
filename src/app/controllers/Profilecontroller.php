<?php

namespace App\Controllers;
use App\core\helpers\Auth;

class Profilecontroller {
    public function index() {
        Auth::check();
        $role = $_SESSION["user"]["role"];
        if($role) {
            require_once __DIR__ ."/../views/profile/profile.blade.php";
        }else{
            header("Location: /404");
        }

    }
}
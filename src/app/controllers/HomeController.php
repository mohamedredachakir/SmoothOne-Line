<?php

namespace App\Controllers;
use Database;
class HomeController {
    public function index(){
        require_once __DIR__ . '/../views/Home/home.blade.php';
    }
}
<?php

namespace App\Controllers;

class ErrorController {
    public function notFound(){
        require_once __DIR__ . '/../views/Errors/404.blade.php';

    }
}
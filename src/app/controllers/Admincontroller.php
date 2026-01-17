<?php

namespace App\Controllers;
use App\core\helpers\Auth;

class Admincontroller {
    public function dashboard() {
         Auth::check('ADMIN');
        



    }
}
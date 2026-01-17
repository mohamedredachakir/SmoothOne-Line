<?php

namespace App\Controllers;

use App\core\helpers\Auth;
use App\repositories\ClassRepository;

class AdminClassController {
    public function index() {
        Auth::role("ADMIN");
        $classes = ClassRepository::getInstance()->getAll();
        require_once __DIR__ ."/../views/admin/index.blade.php";
    }

    public function create() {
        Auth::role("ADMIN");
        $classes = ClassRepository::getInstance()->getAll();
        require_once __DIR__ ."/../views/admin/classes/create.blade.php";
    }
    public function store() {
        Auth::role("ADMIN");
        ClassRepository::getInstance()->create($_POST['name']);
        header('Location: /admin/classes');
        exit();
    }
    public function edit() {
        Auth::role('ADMIN');
        ClassRepository::getInstance()->find($_GET['id']);
        require_once __DIR__ .'/../views/admin/classes/edit.blade.php';
    }
    public function update() {
        Auth::role('ADMIN');
        ClassRepository::getInstance()->update($_POST['id'],$_POST['name']);
        header('Location: /admin/classes');
        exit();
    }
    public function delete() {
        Auth::role('ADMIN');
        ClassRepository::getInstance()->delete($_GET['id']);
        header('Location: /admin/classes');
        exit();
    }

}
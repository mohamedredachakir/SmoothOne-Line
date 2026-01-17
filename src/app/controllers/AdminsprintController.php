<?php

namespace App\Controllers;

use App\core\helpers\Auth;
use App\repositories\SprintRepository;


class AdminsprintController {
    public function index() {
        Auth::role("ADMIN");
        $sprints = SprintRepository::getInstance()->getall();
        require_once __DIR__ . "/../views/admin/sprints/index.blade.php";

    }
    public function create() {
        Auth::role("ADMIN");
        $sprints = SprintRepository::getInstance()->getAll();
        require_once __DIR__ . "/../views/admin/sprints/create.blade.php";
    }
    public function store() {
        Auth::role("ADMIN");
        SprintRepository::getInstance()->create($_POST['name'],$_POST['time']);
        header('Location: /admin/sprints');
        exit();
    }
    public function edit(){
        Auth::role('ADMIN');
        $sprint = SprintRepository::getInstance()->find($_GET['id']);
        //dd($sprint);
        require_once __DIR__ . '/../views/admin/sprints/edit.blade.php';
    }
    public function update() {
        Auth::role('ADMIN');
        SprintRepository::getInstance()->update($_POST['id'],$_POST['name'],$_POST['duration']);
        header('Location: /admin/sprints');
        exit();
    }
    public function delete() {
        Auth::role('ADMIN');
        SprintRepository::getInstance()->delete($_POST['id']);
        header('Location: /admin/sprints');
        exit();
    }
}


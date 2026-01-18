<?php

namespace App\Controllers;

use App\core\helpers\Auth;
use App\repositories\CompetenceRepository;
use App\repositories\SprintRepository;



class AdminCompetenceController {
    
      public function index() {
         Auth::role("ADMIN");
         $competence = CompetenceRepository::getInstance()->getAll();
         require_once __DIR__ ."/../views/admin/competences/index.blade.php";
      }
      public function create() {
        Auth::role("ADMIN");
        $competence = CompetenceRepository::getInstance();
        require_once __DIR__ ."/../views/admin/competences/create.blade.php";
      }

public function store() {
    $code = $_POST['code'];
    $label = $_POST['label'];
    CompetenceRepository::getInstance()->create($code, $label);
    header('Location: /admin/competences');
    exit();
}

      public function edit(){
        Auth::role('ADMIN');
        $competence = CompetenceRepository::getInstance()->find($_GET['id']);
        $sprints = SprintRepository::getInstance()->getall();
        require_once __DIR__ .'/../views/admin/competences/edit.blade.php';
      }
public function update() {
    $id = $_POST['id'];
    $code = $_POST['code'];
    $label = $_POST['label'];
    CompetenceRepository::getInstance()->update($id, $code, $label);
    header('Location: /admin/competences');
    exit();
}
      public function delete() {
        Auth::role('ADMIN');
        CompetenceRepository::getInstance()->delete($_POST['id']);
        header('Location: /admin/competences');
        exit();
      }
}
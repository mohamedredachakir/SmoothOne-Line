<?php

namespace App\Controllers;

use App\core\helpers\Auth;
use App\repositories\CompetenceRepository;
use App\repositories\SprintCompetenceRepository;
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
        $sprints = SprintRepository::getInstance()->getAll();
        require_once __DIR__ ."/../views/admin/competences/create.blade.php";
      }

public function store() {
Auth::role("ADMIN");
$newCompetenceId = CompetenceRepository::getInstance()->create(
    $_POST['sprint_id'],
    $_POST['code'],
    $_POST['label']
);
//SprintCompetenceRepository::getInstance()->attach($_POST['sprint_id'], $newCompetenceId);
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
    Auth::role('ADMIN');

    $id = $_POST['id'];
    $code = $_POST['code'];
    $label = $_POST['label'];
    $sprint_id = $_POST['sprint_id'];

    $competence = CompetenceRepository::getInstance()->find($id);

    CompetenceRepository::getInstance()->update($id, $code, $label);

    $linkedSprints = SprintCompetenceRepository::getInstance()->getByCompetence($id);
    $oldSprintId = $linkedSprints[0] ?? null;
    if($oldSprintId) {
        SprintCompetenceRepository::getInstance()->detach($oldSprintId, $id);
    }
    SprintCompetenceRepository::getInstance()->attach($sprint_id, $id);

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
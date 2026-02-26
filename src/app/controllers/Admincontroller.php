<?php

namespace App\Controllers;
use App\core\helpers\Auth;
use App\repositories\UserRepository;
use App\repositories\ClassRepository;
use App\repositories\SprintRepository;
use App\repositories\CompetenceRepository;

class Admincontroller {
    public function dashboard() {
         Auth::role('ADMIN');
     $userRepo = UserRepository::getInstance();
     $classRepo = ClassRepository::getInstance();
     $sprintRepo = Sprintrepository::getInstance();
     $competenceRepo = Competencerepository::getInstance();
     
     $stats = [
    'classes_count' => $classRepo->countAll(),
    'teachers_count' => $userRepo->countByRole('TEACHER'),
    'students_count' => $userRepo->countByRole('STUDENT'),
    'sprints_count' => $sprintRepo->countAll(),
    'competences_count' => $competenceRepo->countAll()
];


        require_once __DIR__ .'/../views/admin/dashboard.blade.php';

    }
}
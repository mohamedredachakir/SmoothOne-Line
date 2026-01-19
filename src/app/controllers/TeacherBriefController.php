<?php

namespace App\Controllers;

use App\core\helpers\Auth;
use App\repositories\BriefRepository;
use App\repositories\ClassRepository;
use App\repositories\SprintRepository;


class TeacherBriefController {
    public function index(){
        Auth::role("TEACHER");
        $teacherId = Auth::check()->id;
        $briefs = BriefRepository::getInstance()->getByTeacher($teacherId);
        require_once __DIR__ ."/../views/teacher/index.blade.php";
    }

    public function create(){
        Auth::role("TEACHER");
        $sprints = SprintRepository::getInstance()->getAll();
        $classes = ClassRepository::getInstance()->getAll();
        require_once __DIR__ ."/../views/teacher/create.blade.php";
    }
    
    public function store(){
        Auth::role("TEACHER");

$data = [
    'title' => $_POST['title'],
    'description' => $_POST['description'],
    'estimated_duration' => (int) $_POST['estimated_duration'],
    'type' => $_POST['type'], 
    'sprint_id' => (int) $_POST['sprint_id'],
    'class_id' => (int) $_POST['class_id'],
    'teacher_id' => (int) Auth::check()->id,
];

BriefRepository::getInstance()->create($data);



        header('Location: /teacher/briefs');
        exit;
    }
}
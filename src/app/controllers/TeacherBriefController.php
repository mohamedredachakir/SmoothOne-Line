<?php

namespace App\Controllers;

use App\core\helpers\Auth;
use App\repositories\BriefRepository;
use App\repositories\ClassRepository;
use App\repositories\SprintRepository;
use App\services\BriefService;


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
    
    public function store()
    {
        Auth::role('TEACHER');

        $service = new BriefService(
            new BriefRepository(),
            new SprintRepository()
        );

        $user = Auth::check();

        if(!$user){
            throw new \Exception('not login!!!');
        }
        $teacherId = $user->id;

        $service->create($_POST, $teacherId);

        header('Location: /teacher/briefs');
        exit;
    }

}
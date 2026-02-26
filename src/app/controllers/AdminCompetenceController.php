<?php

namespace App\Controllers;

use App\services\CompetenceService;
use App\core\helpers\Auth;
use App\repositories\CompetenceRepository;
use App\repositories\SprintCompetenceRepository;
use App\repositories\SprintRepository;



class AdminCompetenceController
{
    private CompetenceService $service;

    public function __construct()
    {
        $this->service = new CompetenceService(
            CompetenceRepository::getInstance(),
            SprintCompetenceRepository::getInstance()
        );
    }

    public function index()
    {
        Auth::role('ADMIN');
        $competences = $this->service->all();
        require_once __DIR__ . '/../views/admin/competences/index.blade.php';
    }

    public function create()
    {
        Auth::role('ADMIN');
        $sprints = SprintRepository::getInstance()->getAll();
        require_once __DIR__ . '/../views/admin/competences/create.blade.php';
    }

    public function store()
    {
        Auth::role('ADMIN');
        $this->service->create($_POST);
        header('Location: /admin/competences');
        exit;
    }

    public function edit()
    {
        Auth::role('ADMIN');
        $competence = $this->service->find((int)$_GET['id']);
        $sprints = SprintRepository::getInstance()->getAll();
        require_once __DIR__ . '/../views/admin/competences/edit.blade.php';
    }

    public function update()
    {
        Auth::role('ADMIN');
        $this->service->update($_POST);
        header('Location: /admin/competences');
        exit;
    }

    public function delete()
    {
        Auth::role('ADMIN');
        $this->service->delete((int)$_POST['id']);
        header('Location: /admin/competences');
        exit;
    }
}

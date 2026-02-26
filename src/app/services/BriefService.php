<?php

namespace App\services;

use App\models\Brief;
use App\repositories\BriefRepository;
use App\repositories\SprintRepository;

class BriefService {

    public function __construct(
        private BriefRepository $briefRepo,
        private SprintRepository $sprintRepo
    ) {}

    public function create(array $data, int $teacherId): int
    {
        if (empty($data['title'])) {
            throw new \Exception("Title is required");
        }

        if (empty($data['estimated_duration']) || $data['estimated_duration'] <= 0) {
            throw new \Exception("Invalid duration");
        }

        if (!in_array($data['type'], ['INDIVIDUAL','GROUP'])) {
            throw new \Exception("Invalid type");
        }

        if (!$this->sprintRepo->exists($data['sprint_id'])) {
            throw new \Exception("Sprint not found");
        }

        $brief = new Brief(
            null,
            $data['title'],
            $data['description'] ?? '',
            (int)$data['estimated_duration'],
            $data['type'],
            (int)$data['sprint_id'],
            (int)$data['class_id'],
            $teacherId
        );

        return $this->briefRepo->create($brief);
    }
}

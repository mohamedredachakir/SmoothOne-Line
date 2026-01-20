<?php

namespace App\services;

use App\Models\Competence;
use App\repositories\CompetenceRepository;
use App\repositories\SprintCompetenceRepository;

class CompetenceService
{
    public function __construct(
        private CompetenceRepository $competenceRepo,
        private SprintCompetenceRepository $sprintCompetenceRepo
    ) {}

    public function all(): array
    {
        return $this->competenceRepo->getAll();
    }

    public function find(int $id): ?Competence
    {
        return $this->competenceRepo->find($id);
    }

    public function create(array $data): int
    {
        if (empty($data['code']) || empty($data['label'])) {
            throw new \Exception('Code and label required');
        }

        $competence = new Competence(
            null,
            $data['code'],
            $data['label']
        );

        $id = $this->competenceRepo->create($competence);

        if (!empty($data['sprint_id'])) {
            $this->sprintCompetenceRepo->attach(
                (int)$data['sprint_id'],
                $id
            );
        }

        return $id;
    }

    public function update(array $data): void
    {
        $this->competenceRepo->update(
            $data['id'],
            $data['code'],
            $data['label']
        );

        $linked = $this->sprintCompetenceRepo->getByCompetence($data['id']);
        foreach ($linked as $sprintId) {
            $this->sprintCompetenceRepo->detach($sprintId, $data['id']);
        }

        if (!empty($data['sprint_id'])) {
            $this->sprintCompetenceRepo->attach(
                (int)$data['sprint_id'],
                (int)$data['id']
            );
        }
    }

    public function delete(int $id): void
    {
        $linked = $this->sprintCompetenceRepo->getByCompetence($id);

        foreach ($linked as $sprintId) {
            $this->sprintCompetenceRepo->detach($sprintId, $id);
        }

        $this->competenceRepo->delete($id);
    }
}
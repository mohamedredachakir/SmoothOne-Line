<?php

namespace App\repositories;
use Database;
use PDO;

class SprintCompetenceRepository {
    private static $instance = null;

    public static function getInstance() {
        if (is_null(self::$instance)) {
            self::$instance = new SprintCompetenceRepository();
        }
        return self::$instance;
    }

    public function attach($sprint_id, $competence_id) {
        $conn = Database::getConnection();
        $stmt = $conn->prepare("INSERT INTO sprint_competence (sprint_id, competence_id) VALUES (:sprint_id, :competence_id)");
        $stmt->execute(['sprint_id' => $sprint_id, 'competence_id' => $competence_id]);
    }

    public function detach($sprint_id, $competence_id) {
        $conn = Database::getConnection();
        $stmt = $conn->prepare("DELETE FROM sprint_competence WHERE sprint_id=:sprint_id AND competence_id=:competence_id");
        $stmt->execute(['sprint_id' => $sprint_id, 'competence_id' => $competence_id]);
    }

    public function getBySprint($sprint_id) {
        $conn = Database::getConnection();
        $stmt = $conn->prepare("SELECT competence_id FROM sprint_competence WHERE sprint_id=:sprint_id");
        $stmt->execute(['sprint_id' => $sprint_id]);
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }

    public function getByCompetence($competence_id) {
        $conn = Database::getConnection();
        $stmt = $conn->prepare("SELECT sprint_id FROM sprint_competence WHERE competence_id=:competence_id");
        $stmt->execute(['competence_id' => $competence_id]);
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }
}

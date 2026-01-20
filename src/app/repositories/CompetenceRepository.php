<?php

namespace App\repositories;

use App\models\Competence;

use Database;
use PDO;

class CompetenceRepository {
    private static $instance = null;

    public static function getInstance() {
        if (is_null(self::$instance)) {
            self::$instance = new CompetenceRepository();
        }
        return self::$instance;
    }

    public function countall() {
        $conn = Database::getConnection();
        $stmt = $conn->prepare("SELECT COUNT(*) as total FROM competences");
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result["total"];
    }

    public function getAll(): array
    {
        $sql = "
            SELECT 
                c.id,
                c.code,
                c.label,
                s.name AS sprint_name
            FROM competences c
            LEFT JOIN sprint_competence sc ON sc.competence_id = c.id
            LEFT JOIN sprints s ON s.id = sc.sprint_id
            ORDER BY c.id DESC
        ";

        $stmt = Database::getConnection()->query($sql);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $competences = [];

        foreach ($rows as $row) {
            $competences[] = new Competence(
                $row['id'],
                $row['code'],
                $row['label'],
                $row['sprint_name']
            );
        }

        return $competences;
    }

    public function create(Competence $c): int
    {
        $stmt = Database::getConnection()->prepare(
            "INSERT INTO competences (code, label) VALUES (:code, :label)"
        );

        $stmt->execute([
            'code'  => $c->code,
            'label' => $c->label,
        ]);

        return Database::getConnection()->lastInsertId();
    }

    public function find(int $id): ?Competence
    {
        $stmt = Database::getConnection()->prepare(
            "SELECT * FROM competences WHERE id = :id"
        );
        $stmt->execute(['id' => $id]);
        $row = $stmt->fetch();

        if (!$row) return null;

        return new Competence(
            $row['id'],
            $row['code'],
            $row['label']
        );
    }



    public function update($id, $code, $label) {
        $conn = Database::getConnection();
        $stmt = $conn->prepare("UPDATE competences SET code=:code, label=:label WHERE id=:id");
        $stmt->execute(['id'=>$id, 'code'=>$code, 'label'=>$label]);
    }

    public function delete($id) {
        $conn = Database::getConnection();
        $stmt = $conn->prepare("DELETE FROM competences WHERE id=:id");
        $stmt->execute(['id'=>$id]);
    }


}
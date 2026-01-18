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

public function getAll() {
    $conn = Database::getConnection();
    $stmt = $conn->query("SELECT * FROM competences ORDER BY id DESC");
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $competences = [];
    foreach ($result as $row) {
      $c = new Competence();
$c->id = $row['id'];
$c->code = $row['code'] ?? null;
$c->label = $row['label'] ?? null;
$c->sprint_id = $row['sprint_id'] ?? null;

        $competences[] = $c;
    }
    return $competences;
}

public function find($id) {
    $conn = Database::getConnection();
    $stmt = $conn->prepare("SELECT * FROM competences WHERE id = :id");
    $stmt->execute(['id' => $id]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$row) return null;

    $c = new Competence();
    $c->id = $row['id'];
    $c->code = $row['code'];
    $c->label = $row['label'];
    return $c;
}

public function create($sprint_id, $code, $label) {
    $conn = Database::getConnection();
    $stmt = $conn->prepare("INSERT INTO competences (code, label) VALUES (:code, :label)");
    $stmt->execute(['code' => $code, 'label' => $label]);

    $competenceId = $conn->lastInsertId();

   
    SprintCompetenceRepository::getInstance()->attach($sprint_id, $competenceId);

    return $competenceId;
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
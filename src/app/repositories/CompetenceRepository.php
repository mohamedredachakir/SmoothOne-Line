<?php

namespace App\repositories;
use App\Models\Competence;
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

    public function getAll(){
        $conn = Database::getConnection();
        $stmt = $conn->query("SELECT * FROM competences ORDER BY id DESC");
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $competences = [];
        foreach ($result as $row) {
            $data = new Competence();
            $data->id = $row["id"];
            $data->sprint_id = $row["sprint_id"];
            $data->name = $row["name"];
            $data->description = $row["description"];
            $competences[] = $data;
        }
         return $competences;
    }

    public function find( $id ) {
        $conn = Database::getConnection();
        $stmt = $conn->prepare("SELECT * FROM competences WHERE id =:id");
        $stmt->execute(['id' => $id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if(!$result) return null;
        
        $competence = new Competence();
        $competence->id = $result['id'];
        $competence->sprint_id = $result['sprint_id'];
        $competence->name = $result['name'];
        $competence->description = $result['description'];

        return $competence;
    }

    public function create($sprint_id, $name, $description){
        $conn = Database::getConnection();
        $stmt = $conn->prepare('INSERT INTO competences (sprint_id,name,description) VALUES (:sprint_id,:name,:description)');
        $stmt->execute([ 'sprint_id'=> $sprint_id,'name'=> $name, 'description'=> $description ]);
    }

    public function update($id, $sprint_id, $name,$description){
        $conn = Database::getConnection();
        $stmt = $conn->prepare('UPDATE compentences SET sprint_id=:sprint_id,name=:name,description=:description WHERE id=:id');
        return $stmt->execute([ 'sprint_id'=> $sprint_id,'name'=> $name, 'description'=> $description ]);
    }

    public function delete($id){
        $conn = Database::getConnection();
        $stmt = $conn->prepare('DELETE FROM competences WHERE id=:id');
        return $stmt->execute([ 'id'=> $id ]);
    }

}
<?php

namespace App\repositories;

use App\models\Sprint;
use Database;
use PDO;


class SprintRepository {
    private static $instance = null;

    public static function getInstance() {
        if (is_null(self::$instance)) {
            self::$instance = new SprintRepository();
        }
        return self::$instance;
    }

    public function countAll() {
        $conn = Database::getConnection();
        $stmt = $conn->prepare("SELECT COUNT(*) as total FROM sprints");
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result["total"];
    }
    public function getall() {
        $conn = Database::getConnection();
        $stmt = $conn->prepare("SELECT * FROM sprints ORDER BY id DESC");
        $stmt->execute();
        $rows =  $stmt->fetchAll(PDO::FETCH_ASSOC);
            $sprints = [];
        foreach ($rows as $row) {
        $s = new Sprint();
        $s->id = $row['id'];
        $s->name = $row['name'];
        $sprints[] = $s;
           }
        return $sprints;
    }
     public function find($id){
        $conn = Database::getConnection();
        $stmt = $conn->prepare("SELECT * FROM sprints WHERE id=:id");
        $stmt->execute(['id' => $id]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if(!$data) return null;

        $sprint = new Sprint();
        $sprint->id = $data['id'];
        $sprint->name = $data['name'];
        $sprint->duration = $data['duration'];
        $sprint->sprint_order = $data['sprint_order']?? 0;

        return $sprint;
    }
    public function create($name,$time){
        $conn = Database::getConnection();
        $stmt = $conn->prepare("INSERT INTO sprints (name,duration) VALUES (:name,:duration)");
        $stmt->execute(["name"=> $name,"duration"=> $time]);
    }
    public function update($id,$name,$time){
        $conn = Database::getConnection();
        $stmt = $conn->prepare("UPDATE sprints SET name=:name,duration=:duration WHERE id=:id");
        $stmt->execute(["id"=> $id,"name"=> $name,"duration"=> $time]);
    }
    public function delete($id){
        $conn = Database::getConnection();
        $stmt = $conn->prepare("DELETE FROM sprints WHERE id=:id");
        $stmt->execute(["id"=> $id]);
    }
}

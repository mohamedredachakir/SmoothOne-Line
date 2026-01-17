<?php

namespace App\repositories;

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
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function find($id){
        $conn = Database::getConnection();
        $stmt = $conn->prepare("SELECT * FROM sprints WHERE id = :id");
        $stmt->execute(["id" => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
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

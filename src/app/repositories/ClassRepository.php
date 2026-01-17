<?php

namespace App\repositories;

use Database;
use PDO;

class ClassRepository {
    private static $instance = null;

    public static function getInstance() {
        if (is_null(self::$instance)) {
            self::$instance = new ClassRepository();
        }
        return self::$instance;
    }

    public function countAll() {
        $conn = Database::getconnection();
        $stmt = $conn->prepare("SELECT COUNT(*) as total FROM classes");
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ? (int) $result['total'] : 0;
    }

    public function getAll() {
        $conn = Database::getconnection();
        $stmt = $conn->prepare("SELECT * FROM classes ORDER BY id DESC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($id) {
        $conn = Database::getconnection();
        $stmt = $conn->prepare("SELECT * FROM classes WHERE id = :id");
        $stmt->execute(["id"=> $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($name){
        $conn = Database::getconnection();
        $stmt = $conn->prepare("INSERT INTO classes (name) VALUES (:name)");
        $stmt->execute(["name"=> $name]);
    }

    public function update($id, $name){
        $conn = Database::getconnection();
        $stmt = $conn->prepare("UPDATE classes SET name =:name WHERE id=:id");
        return $stmt->execute([':name' => $name,':id'=> $id]);
    }
    public function delete($id){
        $conn = Database::getconnection();
        $stmt = $conn->prepare("DELETE FROM classes WHERE id =:id");
        return $stmt->execute(["id"=> $id]);
    }
}

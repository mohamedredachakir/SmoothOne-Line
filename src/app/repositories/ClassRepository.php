<?php

namespace App\repositories;

use App\models\ClassModel;
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

    public function getAll(): array {
        $conn = Database::getConnection();
        $stmt = $conn->query("SELECT * FROM classes ORDER BY id DESC");
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $classes = [];
        foreach ($rows as $data) {
            $class = new ClassModel();
            $class->id = $data['id'];
            $class->name = $data['name'];
            $classes[] = $class;
        }
        return $classes;
    }

    public function find($id){
       $conn = Database::getConnection();
       $stmt = $conn->prepare("SELECT * FROM classes WHERE id=:id");
       $stmt->execute(['id' => $id]);
       $data = $stmt->fetch(PDO::FETCH_ASSOC);

       if (!$data) return null;
    
       $class = new ClassModel();
       $class->id = $data['id'];
       $class->name = $data['name'];
    
        return $class;
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

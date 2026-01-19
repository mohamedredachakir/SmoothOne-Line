<?php

namespace App\repositories;
use Database;
use App\models\Brief;
use PDO;


class BriefRepository {
    private static ?BriefRepository $instance = null;
    public static function getInstance(): BriefRepository {
        if (self::$instance === null) {
            self::$instance = new BriefRepository();
        }
        return self::$instance;
    }

    public function getAll(){
        $stmt = Database::getconnection()->query("SELECT * FROM breifs");
        return $stmt->fetchAll(PDO::FETCH_ASSOC, Brief::class);
    }

    public function find($id){
           $stmt = Database::getconnection()->prepare("SELECT * FROM breifs WHERE id=:id");
           $stmt->execute(['id' => $id]);
           $stmt->setFetchMode(PDO::FETCH_ASSOC, Brief::class);
           return $stmt->fetch() ?: null;
    }

    public function getByTeacher(int $teacherId): array{
    $stmt = Database::getconnection()->prepare(  "SELECT * FROM briefs WHERE teacher_id = :teacher_id");
    $stmt->execute(['teacher_id' => $teacherId]);

    return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function create(array $data){
    $stmt = Database::getconnection()->prepare('
        INSERT INTO briefs 
        (title, description, estimated_duration, type, sprint_id, class_id, teacher_id)
        VALUES 
        (:title, :description, :estimated_duration, :type, :sprint_id, :class_id, :teacher_id)
    ');
    $stmt->execute($data);
    return Database::getconnection()->lastInsertId();
}



}
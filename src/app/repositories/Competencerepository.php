<?php

namespace App\repositories;
use Database;
use PDO;

class Competencerepository {
    private static $instance = null;

    public static function getInstance() {
        if (is_null(self::$instance)) {
            self::$instance = new UserRepository();
        }
        return self::$instance;
    }

    public function countall() {
        $conn = Database::getConnection();
        $stmt = $conn->prepare("SELECT COUNT(*) as total FROM competences");
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result["total"];
    }

}
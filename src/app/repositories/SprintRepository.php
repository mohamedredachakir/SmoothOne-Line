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
}
<?php

namespace App\repositories;

use Database;
use PDO;


class Classrepository {
    private static $instance = null;
    public static function getInstance() {
        if (is_null(self::$instance)) {
            self::$instance = new UserRepository();
        }
        return self::$instance;
    }

    public function countall() {
      $conn = Database::getconnection();
      $stmt = $conn->prepare("SELECT COUNT(*) as total FROM classes");
      $result = $stmt->fetch(PDO::FETCH_ASSOC);
      return $result["total"];
    }

    public function getall() {
      $conn = Database::getconnection();
      $stmt = $conn->prepare("SELECT * FROM classes ORDER BY id DESC");
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}
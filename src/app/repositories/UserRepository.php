<?php

namespace App\repositories;
use Database;
use PDO;

class UserRepository {
    private static $instance = null;

    public static function getInstance() {
        if (is_null(self::$instance)) {
            self::$instance = new UserRepository();
        }
        return self::$instance;
    }
  public static function findByEmail($email) {
    $conn = Database::getconnection();
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email LIMIT 1");
    $stmt->execute(['email' => $email]); 
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    return $user ?: null;
}


}
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

        public function  countByRole(string $role): int {
        $conn = Database::getconnection();
        $stmt = $conn->prepare("SELECT COUNT(*) as total FROM users WHERE role = :role");
        $stmt->execute([':role' => $role]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return (int) $result['total'];
    }
}
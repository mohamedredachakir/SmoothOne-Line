<?php

class Database {
    private static $host = "smouthone_app";
    private static $db_name = "smouthone";
    private static $user_name = "admin";
    private static $password = "red123";
    private static $conn = null;
    
    public static function getconnection(){
        if(static::$conn === null){
            try{
                static::$conn = new PDO(
                    "pgsql:host=".static::$host.";dbname=".static::$db_name,
                    static::$user_name,static::$password
                );
            }catch(PDOException $e){
                echo "connection failed" . $e->getMessage();
            }
        }
        return static::$conn;

    }
}
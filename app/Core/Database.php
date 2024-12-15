<?php

class Database{
    private static $connection;
    public static function getConnection(){
      
        if(!self::$connection){
            $host = "localhost";
            $db = "finance_buddy";
            $user = "root";
            $password = "";
            $dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";

            try {
                self::$connection = new PDO($dsn, $user, $password);
                self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Database connection failed: " . $e->getMessage());
            }
        }
       
        return self::$connection;
    }
}
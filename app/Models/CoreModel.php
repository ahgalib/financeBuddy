<?php

namespace App\Models;

use PDO;
use Database;

class CoreModel {
    protected $db;
    public function __construct()
    {
        return $this->db =  Database::getConnection();
    }

    // public function create($table_name, $name, $email, $password)
    // {
    //     $hash_password = password_hash($password, PASSWORD_BCRYPT);

    //     $sql = "INSERT INTO $table_name (name,email,password) VALUES (:name, :email, :password)";
    //     $stmt = $this->db->prepare($sql);
    //     $stmt->bindParam(':name', $name);
    //     $stmt->bindParam(':email', $email);
    //     $stmt->bindParam(':password', $hash_password);
    //     return $stmt->execute();
    // }

    public function create(string $table, array $data)
    {

        $columns = implode(', ', array_keys($data));
        echo "<pre>";print_r($data);
        echo "<pre>";print_r($columns);
        $placeholders = implode(', ', array_map(fn($key) => ":$key", array_keys($data)));

        echo "<pre>";
        print_r($placeholders);

        $query = "INSERT INTO $table ($columns) VALUES ($placeholders)";
        // echo $query;die;
        $stmt = $this->db->prepare($query);

        return $stmt->execute($data);
    }
}
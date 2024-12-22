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

    //show all the recode 
    public function all(string $table){
        $sql = "SELECT * FROM $table";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //show the recode base on $id
    public function find(string $table, $id){
        $sql = "SELECT * FROM $table WHERE id = :id LIMIT 1";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id',$id,PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    //select specific records
    public function select(string $table, array $columns){
        // $columns = !empty($columns)? implode(',', $columns) : '*';
        // echo "<pre>";print_r($columns);
        $columns = !empty($columns)? implode(',', $columns) : '*';
        // echo ($columns);
        $sql = "SELECT $columns FROM $table";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        die;
        echo $columns;die;
    }

    public function create(string $table, array $data)
    {
        echo "<pre>";print_r($data);
        echo "<pre>";print_r(array_keys($data));
        $columns = implode(', ', array_keys($data));
        echo "this is column" . $columns;
        $placeholders = implode(', ', array_map(fn($key) => ":$key", array_keys($data)));

        echo $placeholders;

        $query = "INSERT INTO $table ($columns) VALUES ($placeholders)";
        // echo $query;die;
        $stmt = $this->db->prepare($query);

        return $stmt->execute($data);
    }
}
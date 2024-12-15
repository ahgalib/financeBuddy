<?php

namespace Model;

use PDO;
use Database;
use App\Models\CoreModel;
class User extends CoreModel {
    // private $db;
    // public function __construct()
    // {
    //     return $this->db =  Database::getConnection();
    // }

    //create user
    // public function create($name, $email, $password){
    //     $hash_password = password_hash($password, PASSWORD_BCRYPT);

        // $sql = "INSERT INTO users (name,email,password) VALUES (:name, :email, :password)";
        // $stmt = $this->db->prepare($sql);
        // $stmt->bindParam(':name', $name);
        // $stmt->bindParam(':email', $email);
        // $stmt->bindParam(':password', $hash_password);
        // return $stmt->execute();
    // }

    public function findMyEmail($email){
        $query = "SELECT * FROM users where email = :email";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute(); // Execute the query
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        //echo "<pre>";print_r($result);die;
        return $result;
        // return $this->db->single(); // Fetch a single result
        echo $this->db->single(); // Fetch a single result
        die;

    }
}


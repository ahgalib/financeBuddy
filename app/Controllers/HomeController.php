<?php
namespace App\Controllers;

require_once __DIR__ . '/../Core/Database.php';
require_once __DIR__ . '/../Models/User.php';

use Model\User;

class HomeController {

    public function index(){

        $userModel = new User();

        // Create a new user
     //   $userModel->create('John Doe', 'john@example.com', 'password123');
       // return "Welcom to home";
        return view('home/home', ['id' => '33333333333']);
       
    }



    
}
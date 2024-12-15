<?php

namespace App\Controllers;

require_once __DIR__ . '/../Models/User.php';
use Model\User;

require_once __DIR__ . '/../Core/Database.php';

class ExpenseController{

    public function dashboard(){

        $userModel = new User();
        $userModel->create('users', [
            'name' => 'Aria Stark',
            'email' => 'aria@example.com',
            'password' => password_hash('password123', PASSWORD_BCRYPT)
        ]);

        return view('expense/dashboard');
    }

    public function expense(){
        return view('expense/add-expense');
    }
}
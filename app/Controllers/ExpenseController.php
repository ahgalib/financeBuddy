<?php

namespace App\Controllers;

require_once __DIR__ . '/../Models/User.php';

use App\Models\Expense;
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

    public function addExpense(){
        // echo "request got here";die;

        $expenseModel = new Expense();
        $expenseModel->create('add_expense',[
            'category_id' => 2,
            'amount' => $_POST['amount'],
            'date' => $_POST['date'],
            'notes' => $_POST['notes'],
            'is_recurring' => 0,
            'frequency' => $_POST['frequency'],

        ]);

        
    }
}
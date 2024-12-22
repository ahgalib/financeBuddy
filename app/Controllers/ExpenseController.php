<?php

namespace App\Controllers;

require_once __DIR__ . '/../Models/User.php';

use App\Models\Expense;
use App\Validator\Validator;
use Model\User;

require_once __DIR__ . '/../Core/Database.php';

class ExpenseController{


    public function dashboard(){
        return view('expense/dashboard');
    }

    public function showExpense(){
        $expense = new Expense();
        $expense_data = $expense->all('add_expense');
        // $expense_data = $expense->find('add_expense', 2);
        //$expense_data = $expense->select('add_expense', ['id', 'category_id', 'amount', 'date']);
        // echo "<pre>";
        // print_r($expense_data);
        // die;
        return view('expense/show-expense',['expense_data' => $expense_data]);
    }

    public function expense(){
       
        return view('expense/add-expense');
    }

    //create user expense
    public function addExpense(){
       
        $expenseModel = new Expense();

        $validation = new Validator();

        $data = [
            'category_id' => 2, // Hardcoded for now
            'amount' => $_POST['amount'],
            'date' => $_POST['date'],
            'notes' => $_POST['notes'],
            'is_recurring' => '0',
            'frequency' => $_POST['frequency'],
        ];
        // $is_recurring = false;
        // if(empty($is_recurring)){
        //     echo "boolean value is empty";
        //     die;
        // }
        //validate the data
        if(!$validation->validatior($data, [
            'category_id' => 'required',
            'amount' => 'required',
            'date' => 'required|date',
            'notes' => 'nullable|string',
            'is_recurring' => 'required|boolean',
            'frequency' => 'nullable|string',
        ])){
            $errors = $validation->errors;
            // Handle errors (e.g., store in session, display to user, etc.)
            print_r($errors); // For debugging; replace with your error handling.
            return;
        };

        // if (!$validation->validatior($data, $rules)) {
        //     $errors = $validator->errors();
        //     // Handle errors (e.g., store in session, display to user, etc.)
        //     print_r($errors); // For debugging; replace with your error handling.
        //     return;
        // }
        $expenseModel->create('add_expense',
            $data

        );

        header("Location: /financebuddy/dashboard");
        
    }
}
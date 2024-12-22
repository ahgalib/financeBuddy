<?php

namespace App\Middleware;

class AuthMiddleware extends Middleware{

    public function handle(){
        session_start();
      
        if(!isset($_SESSION['user'])){
            header("Location: /financebuddy/login");
        }
    }
}
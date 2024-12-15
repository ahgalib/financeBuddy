<?php

namespace App\Middleware;

class AuthMiddleware extends Middleware{

    public function handle(){
        session_start();
        // echo"<pre>"; print_r($_SESSION);
        // die;
        if(!isset($_SESSION['user'])){
            header("Location: /financebuddy/login");
        }
    }
}
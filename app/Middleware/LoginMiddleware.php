<?php

namespace App\Middleware;

class LoginMiddleware extends Middleware{

    // check if already login then redirect to home page and if already logout then redirect to login page
    public function handle(){
      
        $url =  explode('/', $_SERVER['REQUEST_URI']);
        $route =  end($url);
        session_start();
        
        if(isset($_SESSION['user'])){
            if($route == "login"){
                header("Location: /financebuddy/add-expense");
                exit;
            }
        }else{
            if ($route == "logout") {
                header("Location: /financebuddy/login");
                exit;
            }
            
        }
    }
}
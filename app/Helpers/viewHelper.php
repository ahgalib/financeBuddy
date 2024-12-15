<?php

function view($path, $data = [])
{
    // if($path !== 'auth/login' && $path !== 'auth/register'){

    //     extract($data); // Convert array keys to variables
    //     ob_start();
    //     require_once __DIR__ . "/../Views/$path.php"; // Include the view file
    //     $content = ob_get_clean(); // Capture the content
    
    //     require_once __DIR__ . '/../Views/layouts/main.php'; // Load the layout and inject the content
    // }else{
    //     require_once __DIR__ . "/../Views/$path.php"; 
    // }

    if($path == "home/home"){
        extract($data); // Convert array keys to variables
        ob_start();
        require_once __DIR__ . "/../Views/$path.php"; // Include the view file
        $content = ob_get_clean(); // Capture the content

        require_once __DIR__ . '/../Views/layouts/main.php';
    }else{
        require_once __DIR__ . "/../Views/$path.php"; 
    }
}

<?php


use App\Controllers\HomeController;
use App\Controllers\AuthController;
use App\Controllers\ExpenseController;
use App\Middleware\AuthMiddleware;

// require_once __DIR__ . '/../app/Middleware/Middleware.php';  
// // Normalize the URI by removing the base path (financebuddy/public/index.php)
// $basePath = '/financebuddy';
// $uri = str_replace($basePath, '', $_SERVER['REQUEST_URI']);
// $uri = trim($uri, '/'); // Remove leading and trailing slashes
// $method = $_SERVER['REQUEST_METHOD'];

// echo "this is uri val ". $uri;
// if($uri == '' || $uri == "home"){
//     $controller = new HomeController();

//     echo $controller->index();
// }else{
//     http_response_code(404);
//     echo "404 - Page not found";
// }
// echo $uri;


// Define routes
// $routes = [
//     'login' => [LoginController::class, 'index'],
//     '/' => [HomeController::class, 'index'],
//     'home' => [HomeController::class, 'index'],
//     'about' => [HomeController::class, 'about'],
//     'user/{id}' => [HomeController::class, 'userProfile'], // Dynamic route
// ];

$routes = [
    ['method' => 'GET', 'uri' => 'login', 'action' => [AuthController::class, 'index']],
    ['method' => 'POST', 'uri' => 'login', 'action' => [AuthController::class, 'authenticate']],
    ['method' => 'GET', 'uri' => 'dashboard', 'action' => [ExpenseController::class, 'dashboard']],
    ['method' => 'GET', 'uri' => 'add-expense', 'action' => [ExpenseController::class, 'expense'], 'middleware' => \App\Middleware\AuthMiddleware::class],
    ['method' => 'POST', 'uri' => 'save-expense', 'action' => [ExpenseController::class, 'addExpense'], 'middleware' => \App\Middleware\AuthMiddleware::class],
];

// $routes = [
//     ['method' => 'GET', 'uri' => 'login', 'action' => [AuthController::class, 'showLoginForm']],
//     ['method' => 'POST', 'uri' => 'login', 'action' => [AuthController::class, 'login']],
//     ['method' => 'GET', 'uri' => '/', 'action' => [HomeController::class, 'index']],
//     ['method' => 'GET', 'uri' => 'home', 'action' => [HomeController::class, 'index']],
//     ['method' => 'GET', 'uri' => 'about', 'action' => [HomeController::class, 'about']],
//     ['method' => 'GET', 'uri' => 'user/{id}', 'action' => [HomeController::class, 'userProfile']], // Dynamic route
// ];

// Get current URI
$basePath = '/financebuddy';
$uri = str_replace($basePath, '', $_SERVER['REQUEST_URI']);
$uri = trim($uri, '/');
$method = $_SERVER['REQUEST_METHOD']; 

// Match route
foreach ($routes as $route) {
    // Check if HTTP method matches
    if ($method !== $route['method']) {
        continue;
    }
   
    $pattern = preg_replace('/\{[a-z]+\}/', '([a-zA-Z0-9-_]+)', $route['uri']); // Convert {id} to a regex pattern
 
    if (preg_match("#^$pattern$#", $uri, $matches)) {
       
        array_shift($matches); // Remove the full match
        if(isset($route['middleware'])){
            echo "middleware is exits and no premission granted";
            $middlewareClass =  $route['middleware'];
            $middleware = new $middlewareClass();
            $middleware->handle();
            // die;
        }
        [$controller, $method] = $route['action'];
        $controllerInstance = new $controller();
        echo call_user_func_array([$controllerInstance, $method], $matches);
        exit;
    }
}

// If no route matches
http_response_code(404);
echo "404 - Page not found";
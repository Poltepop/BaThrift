<?php

$routes = [];

function add(
    string $method, 
    string $path, 
    string $controller, 
    string $function
): void{
    global $routes;

    $routes[] = [
        'method' => $method,
        'path' => $path,
        'controller' => $controller,
        'function' => $function,
    ];
}

function run(): void{
    $path = '/';
    global $routes;

    if(isset($_SERVER['PATH_INFO'])){
        $path = $_SERVER['PATH_INFO'];
    }

    $method = $_SERVER['REQUEST_METHOD'];

    foreach($routes as $route){
        if($path == $route['path'] && $method == $route['method']){
            require_once __DIR__ . "/../Controller/" . $route['controller'] . ".php";
            call_user_func($route['function']);
            return;
        }
    }

    http_response_code(404);
    echo "404 - Halaman tidak ditemukan";
}
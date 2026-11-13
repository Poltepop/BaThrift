<?php

$routes = [];

function base_url(string $path = ''): string {
    $base = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/');
    return $base . '/' . ltrim($path, '/');
}

function redirect(string $path = ''): void {
    header('Location: ' . base_url($path));
    exit();
}

function add(
    string $method, // GET / POST / DELETE
    string $path, // /Home
    string $controller, // HomeController
    string $function // index
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

    if(isset($_SERVER['PATH_INFO']) && $_SERVER['PATH_INFO'] !== ''){
        $path = $_SERVER['PATH_INFO'];
    } elseif(isset($_SERVER['REQUEST_URI'])){
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $base = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/');
        $path = '/' . ltrim(substr($uri, strlen($base)), '/');
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
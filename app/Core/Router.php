<?php

$routes = [];

function url(string $path = ''): string {
    $base = rtrim(str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'])), '/');
    return $base . '/' . ltrim($path, '/');
}

function redirect(string $path = ''): void {
    // http_response_code(303);
    header('Location: ' . url($path));
    exit();
}

function add(
    string $method,       // GET / POST / DELETE
    string $path,         // /home
    string $controller,   // HomeController
    string $function,     // index
    array $middlewares = [] // ['auth', 'admin', ...]
): void{
    global $routes;

    $routes[] = [
        'method'      => $method,
        'path'        => $path,
        'controller'  => $controller,
        'function'    => $function,
        'middlewares' => $middlewares,
    ];
}

function run(): void{
    $path = '/';
    global $routes;

    if(isset($_SERVER['REQUEST_URI'])){
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $base = rtrim(str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'])), '/');
        $path = '/' . ltrim(substr($uri, strlen($base)), '/');
    }

    $method = $_SERVER['REQUEST_METHOD'];

    foreach($routes as $route){
        if($path == $route['path'] && $method == $route['method']){

            foreach($route['middlewares'] as $middleware){
                call_user_func("middleware$middleware");
            }

            require_once __DIR__ . "/../Controller/" . $route['controller'] . ".php";
            call_user_func($route['function']);
            return;
        }
    }

    http_response_code(404);
    echo "404 - Halaman tidak ditemukan";
} 
<?php

session_start();

require_once __DIR__ . '/app/Core/Database.php';
require_once __DIR__ . '/app/Core/View.php';
require_once __DIR__ . '/app/Core/Middleware.php';
require_once __DIR__ . '/app/Core/Router.php';

// Auth Route
add('GET', '/login', 'AuthController', 'login');
add('POST', '/authenticate', 'AuthController', 'auth');
add('GET', '/register', 'AuthController', 'register');
add('POST', '/storeRegister', 'AuthController', 'storeRegister');
add('GET', '/logout', 'AuthController', 'logout');

add('GET', '/', 'KatalogController', 'index', ['auth']);
add('GET', '/profil', 'UserController', 'index', ['auth']);

run();
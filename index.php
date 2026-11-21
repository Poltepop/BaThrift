<?php

session_start();

require_once __DIR__ . '/app/Core/Database.php';
require_once __DIR__ . '/app/Core/View.php';
require_once __DIR__ . '/app/Core/Middleware.php';
require_once __DIR__ . '/app/Core/Router.php';

// Auth Route
add('GET', '/auth/login', 'AuthController', 'login');
add('POST', '/auth/authenticate', 'AuthController', 'auth');
add('GET', '/auth/register', 'AuthController', 'register');
add('POST', '/auth/storeRegister', 'AuthController', 'storeRegister');
add('GET', '/auth/logout', 'AuthController', 'logout');

add('GET', '/', 'KatalogController', 'index', ['auth']);
add('GET', '/profil', 'UserController', 'index', ['auth']);

run();
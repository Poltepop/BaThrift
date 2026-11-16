<?php

session_start();

require_once __DIR__ . '/app/Core/Database.php';
require_once __DIR__ . '/app/Core/View.php';
require_once __DIR__ . '/app/Core/Middleware.php';
require_once __DIR__ . '/app/Core/Router.php';

// Auth Route
add('GET', '/login', 'AuthController', 'login');
add('POST', '/auth', 'AuthController', 'auth');
add('GET', '/register', 'AuthController', 'register');

// User Route
add('GET', '/', 'HomeController', 'index', ['auth']);

// Admin Route
add('GET', '/dashboard', 'dashboardController', 'index', ['admin']);

run();
<?php

session_start();

require_once __DIR__ . '/app/Core/Database.php';
require_once __DIR__ . '/app/Core/View.php';
require_once __DIR__ . '/app/Core/Router.php';

add('GET', "/", 'HomeController', 'index');
add('GET', '/login', 'AuthController', 'login');
add('POST', '/auth', 'AuthController', 'auth');

run();
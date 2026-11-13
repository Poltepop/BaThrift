<?php

require_once __DIR__ . '/./app/Core/View.php';
require_once __DIR__ . '/./app/Core/Router.php';

$title = 'Hello From Index';

$path = $_SERVER['PATH_INFO'] ?? '/';

add('GET', '/', 'HomeController', 'index');
run();
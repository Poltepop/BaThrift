<?php

session_start();

require_once __DIR__ . '/app/Core/Database.php';
require_once __DIR__ . '/app/Core/View.php';
require_once __DIR__ . '/app/Core/Middleware.php';
require_once __DIR__ . '/app/Core/Router.php';
require_once __DIR__ . '/app/Core/Validator.php';

// Auth Route
add('GET', '/login', 'AuthController', 'login');
add('POST', '/authenticate', 'AuthController', 'auth');
add('GET', '/register', 'AuthController', 'register');
add('POST', '/storeRegister', 'AuthController', 'storeRegister');
add('GET', '/logout', 'AuthController', 'logout');

//Pembeli
add('GET', '/', 'KatalogController', 'index', ['auth']);
add('GET', '/profil', 'UserController', 'index', ['auth']);
add('POST', '/update-user', 'UserController', 'update', ['auth']);
add('POST', '/update-toko', 'TokoController', 'update', ['auth']);
add('GET', '/daftar-alamat', 'AddressController', 'index', ['auth']);
add('POST', '/add-alamat', 'AddresController', 'addAddress', ['auth']);


//Penjual 
add('GET', '/buka-toko', 'TokoController', 'bukaToko', ['auth']);
run();
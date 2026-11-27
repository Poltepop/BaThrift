<?php

require_once __DIR__ . "/../Core/View.php";
require_once __DIR__ . "/../Model/User.php";

function login(): void{
    $errors = $_SESSION['errors'] ?? [];
    $old = $_SESSION['old'] ?? [];
    unset($_SESSION['errors']);

    Render("auth/login", [
        'title' => 'Masuk - BaThrift',
        'errors' => $errors,
        'old' => $old
    ]);
}

function auth(): void{
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $data = [
            'email' =>  trim($_POST['email']),
            'password' =>  $_POST['password']
        ];

        $user = userAuthenticate($data['email'], $data['password']);

        $errors = array_filter([
            'email' => validate($data['email'], required(), min_length(3), max_length(100), email_format()),
            'password' => validate($data['password'], required())
        ]);

        if(is_null($user)){
            $errors['error_login'] = 'Email Atau Password Salah';
            $_SESSION['errors'] = $errors;
            $_SESSION['old'] = $data;
            redirect('/login');
            exit();
        }
    
        $_SESSION['errors'] = $errors;

        if($user['role'] !== 'admin'){
            $_SESSION['user'] = $user;
            redirect('/');
            exit();
        }
        
        if($user['role'] === 'admin'){
            $_SESSION['user'] = $user;
            redirect('/dashboard');
            exit();
        }
    }
}

function register(): void{
    $errors = $_SESSION['errors'] ?? [];
    unset($_SESSION['errors']);

    Render('auth/register', [
        'title' => 'Daftar - BaThrift',
        'errors' => $errors
    ]);
}

function storeRegister(): void{
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $nl = trim($_POST['nama_lengkap']);
        $email = trim($_POST['email']);
        $phone = trim($_POST['phone']);
        $pass = $_POST['password'];
        $pass_re = $_POST['password-re'];

        $errors = array_filter([
            'nama_lengkap' => validate($nl, required(), max_length(100)),
            'email' => validate($email, required(), min_length(3), max_length(100), email_format()),
            'phone' => validate($phone, required(), max_length(20), phone_format()),
            'password' => validate($pass, required(), min_length(8), max_length(255)),
            'password-re' => validate($pass_re, required(), min_length(8), max_length(255), matches($pass, 'Kata Sandi Tidak Cocok! Pastikan sama persis dengan kolom sandi di atas'))
        ]);

        if(!isEmailUnique($email)){
            $errors['email'] = "Email Sudah Digunakan!";
        }

        if(!empty($errors)){
            $_SESSION['errors'] = $errors;
           redirect('/register');
           exit(); 
        }
        
        storeDataUser($nl, $email, $phone, $pass);
        redirect('/login');
        return;
    }
}

function logout(): void{
    session_unset();
    session_destroy();
    setcookie(session_name(), '', time() - 3600, '/');
    redirect('/login');
}
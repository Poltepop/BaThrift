<?php

require_once __DIR__ . "/../Core/View.php";
require_once __DIR__ . "/../Model/User.php";

function login(): void{
    $errors = $_SESSION['errors'] ?? [];
    $old = $_SESSION['old'] ?? [];
    unset($_SESSION['errors']);
    unset($_SESSION['old']);

    Render("auth/login", [
        'title' => 'Masuk - BaThrift',
        'errors' => $errors,
        'old' => $old
    ]);
}

function auth(): void{
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $data = [
            'email' => trim($_POST['email'] ?? ''),
            'password' => $_POST['password'] ?? ''
        ];

        $errors = array_filter([
            'email' => validate($data['email'], required(), min_length(3), max_length(100), email_format()),
            'password' => validate($data['password'], required())
        ]);

        if(!empty($errors)){
            $_SESSION['errors'] = $errors;
            $_SESSION['old'] = ['email' => $data['email']];
            redirect('/login');
            exit();
        }

        $user = getUserByEmail($data['email']);

        if(empty($user) || !password_verify($data['password'], $user['password'])){
            $errors['error_login'] = 'Email Atau Password Salah';
            $_SESSION['errors'] = $errors;
            $_SESSION['old'] = ['email' => $data['email']];
            redirect('/login');
            exit();
        }

        session_regenerate_id(true);
        $_SESSION['user'] = $user;

        if($user['role'] !== 'admin'){
            redirect('/');
            exit();
        }

        redirect('/dashboard');
        exit();
    }
}

function register(): void{
    $errors = $_SESSION['errors'] ?? [];
    $old = $_SESSION['old'] ?? [];
    unset($_SESSION['errors']);
    unset($_SESSION['old']);

    Render('auth/register', [
        'title' => 'Daftar - BaThrift',
        'errors' => $errors,
        'old' => $old
    ]);
}

function storeRegister(): void{
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $data = [
            'name' => trim($_POST['nama_lengkap']),
            'email' => trim($_POST['email']),
            'phone' => trim($_POST['phone']),
            'password' => $_POST['password'],
            'password_re' => $_POST['password-re']
        ];

        $errors = array_filter([
            'nama_lengkap' => validate($data['name'], required(), max_length(100)),
            'email' => validate($data['email'], required(), min_length(3), max_length(100), email_format()),
            'phone' => validate($data['phone'], required(), max_length(20), phone_format()),
            'password' => validate($data['password'], required(), min_length(8), max_length(255)),
            'password-re' => validate($data['password_re'], required(), min_length(8), max_length(255), matches($data['password'], 'Kata Sandi Tidak Cocok! Pastikan sama persis dengan kolom sandi di atas'))
        ]);

        if(!isEmailUnique($data['email'])){
            $errors['email'] = "Email Sudah Digunakan!";
        }

        if(!empty($errors)){
            $_SESSION['errors'] = $errors;
            $_SESSION['old'] = $data;
            redirect('/register');
            exit(); 
        }
        
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        storeDataUser($data);
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
<?php

require_once __DIR__ . "/../Core/View.php";
require_once __DIR__ . "/../Model/User.php";
require_once __DIR__ . "/../Core/Validator.php";

function login(): void{
    $errors = $_SESSION['errors'] ?? [];
    unset($_SESSION['errors']);

    Render("Auth/login", [
        'title' => 'login',
        'errors' => $errors
    ]);
}

function auth(): void{
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $email = trim($_POST['email']);
        $pass = $_POST['password'];
        $user = userAuthenticate($email, $pass);

        $errors = array_filter([
            'email' => validate($email, required(), min_length(3), max_length(100), email_format()),
            'password' => validate($pass, required())
        ]);
        
        $_SESSION['errors'] = $errors;

        if($user['role'] !== 'admin'){
            $_SESSION['user'] = $user;
            redirect('/');
            return;
        }
        
        if($user['role'] === 'admin'){
            $_SESSION['user'] = $user;
            redirect('/dashboard');
            return;
        }
        
        $errors['error_login'] = 'Email Atau Password Salah';
        $_SESSION['errors'] = $errors;
        redirect('/login');
    }
}

function register(): void{
    $errors = $_SESSION['errors'] ?? [];
    unset($_SESSION['errors']);

    Render('Auth/register', [
        'title' => 'register',
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
            'phone' => validate($phone, required(), max_length(20)),
            'password' => validate($pass, required(), min_length(8), max_length(255)),
            'password-re' => validate($pass_re, required(), min_length(8), max_length(255))
        ]);

        if($pass !== $pass_re){
            $errors['error_not_match'] = "Password tidak sesuai";
        }

        if(!is_numeric($phone)){
            $errors['error_not_number'] = "Nomor Telephone harus berupa angka";
        }

        if(!isEmailUnique($email)){
            $errors['error_not_unique'] = "Email Sudah Digunakan!";
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
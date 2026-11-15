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

        if($user){
            $_SESSION['user'] = $user['user'];
            redirect('/');
            return;
        }
        
        $errors['error_login'] = 'Email Atau Password Salah';
        $_SESSION['errors'] = $errors;
        redirect('/login');
    }
}

function register(): void{

}

function storeRegister(): void{
    
}
<?php

require_once __DIR__ . "/../Core/View.php";
require_once __DIR__ . "/../Model/User.php";

function login(): void{
    $error_login = $_SESSION['error_login'];

    Render("Auth/login", [
        'error_login' => $error_login
    ]);
}

function auth(): void{
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $users = getAllUser();
        $email = trim($_POST['email']);
        $pass = $_POST['password'];

        foreach($users as $user){
            if($email == $user['email'] && $pass == $user['password']){
                $_SESSION['user_id'] = $user['id'];
                redirect('/');
            }
        }
        
        $_SESSION['error_login'] = 'email atau password salah';
        redirect('/login');
    }
}

function register(): void{

}

function storeRegister(): void{
    
}
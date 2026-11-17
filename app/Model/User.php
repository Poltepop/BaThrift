<?php

define('USER_TABLE', 'users');

function getAllUser(): array{
    global $conn;
    $role = 'admin';

    $stmt = mysqli_prepare($conn, "SELECT * FROM " . USER_TABLE . " WHERE role != ?");
    mysqli_stmt_bind_param($stmt, 's', $role);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

function userAuthenticate(string $email, string $password): array|null{
    global $conn;

    $stmt = mysqli_prepare($conn, "SELECT * FROM " . USER_TABLE . " WHERE EMAIL = ? AND PASSWORD = ?");
    mysqli_stmt_bind_param($stmt, 'ss', $email, $password);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    return mysqli_fetch_assoc($result);
}

function isEmailUnique(string $email): bool{
    global $conn;

    $stmt = mysqli_prepare($conn, "SELECT * FROM " . USER_TABLE . " WHERE EMAIL = ?");
    mysqli_stmt_bind_param($stmt, 's', $email);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    if(mysqli_fetch_assoc($result) !== null){
        return false;
    }

    return true;
}

function storeDataUser(string $nl, string $email, string $phone, string $pass): void{
    global $conn;

    $stmt = mysqli_prepare($conn, "INSERT INTO " . USER_TABLE . " (name, email, password, phone) VALUES (? , ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, 'ssss', $nl, $email, $pass, $phone);
    mysqli_stmt_execute($stmt);

}

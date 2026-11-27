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

function getUserById(int $id): array{
    global $conn;
    
    $stmt = mysqli_prepare($conn, "SELECT * FROM " . USER_TABLE . " WHERE id = ?");
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    return mysqli_fetch_assoc($result);
}

function updateUser(array $data = []): void {
    global $conn;

    $sql = "UPDATE " . USER_TABLE . " SET "
         . "name = ?, "
         . "username = ?, "
         . "email = ?, "
         . "phone = ?, "
         . "bio = ?, "
         . "photo = ? "
         . "WHERE id = ?";

    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt === false) {
        return;
    }

    mysqli_stmt_bind_param(
        $stmt,
        'ssssssi',
        $data['name'],
        $data['username'],
        $data['email'],
        $data['phone'],
        $data['bio'],
        $data['photo'],
        $data['id']
    );

    mysqli_stmt_execute($stmt);
}

function getUserByEmail(string $email): array{
    global $conn;

    $stmt = mysqli_prepare($conn, "SELECT * FROM " . USER_TABLE . " WHERE EMAIL = ?");
    mysqli_stmt_bind_param($stmt, 's', $email);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    return mysqli_fetch_assoc($result);
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

function storeDataUser(array $data = []): void{
    global $conn;

    $stmt = mysqli_prepare($conn, "INSERT INTO " . USER_TABLE . " (name, email, password, phone) VALUES (? , ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, 'ssss', $data['name'], $data['email'], $data['password'], $data['phone']);
    mysqli_stmt_execute($stmt);
}

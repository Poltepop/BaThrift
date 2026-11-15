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


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




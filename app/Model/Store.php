<?php

define('STORE_TABLE', 'stores');

function getStoreByUserId(int $userId): array{
    global $conn;
    
    $stmt = mysqli_prepare($conn, "SELECT * FROM stores WHERE user_id = ?");
    mysqli_stmt_bind_param($stmt, 'i', $userId);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    return mysqli_fetch_assoc($result);
}

function updateToko(array $data = []): void{
    global $conn;

    $stmt = mysqli_prepare($conn, "UPDATE " . STORE_TABLE 
        . " SET "
        . "name = ?, "
        . "slug = ?, "
        . "description = ? "
        . "WHERE id = ?"
    );

    mysqli_stmt_bind_param($stmt, 'sssi', 
        $data['name'], 
        $data['slug'], 
        $data['description'], 
        $data['store_id']
    );

    mysqli_stmt_execute($stmt);
}
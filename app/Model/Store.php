<?php

define('STORE_TABLE', 'stores');

function getStoreByUserId(int $userId): ?array{
    global $conn;
    
    $stmt = mysqli_prepare($conn, "SELECT * FROM stores WHERE user_id = ?");
    mysqli_stmt_bind_param($stmt, 'i', $userId);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    return mysqli_fetch_assoc($result) ?: null;
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

function isStoreNameTaken(string $name): bool {
    global $conn;

    $stmt = mysqli_prepare($conn, "SELECT id FROM " . STORE_TABLE . " WHERE name = ? LIMIT 1");
    mysqli_stmt_bind_param($stmt, 's', $name);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    return mysqli_fetch_assoc($result) !== null;
}

function isStoreSlugTaken(string $slug): bool {
    global $conn;

    $stmt = mysqli_prepare($conn, "SELECT id FROM " . STORE_TABLE . " WHERE slug = ? LIMIT 1");
    mysqli_stmt_bind_param($stmt, 's', $slug);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    return mysqli_fetch_assoc($result) !== null;
}

function createStore(array $data): int {
    global $conn;

    $stmt = mysqli_prepare(
        $conn,
        "INSERT INTO " . STORE_TABLE . " (user_id, name, slug, description) VALUES (?, ?, ?, ?)"
    );
    mysqli_stmt_bind_param(
        $stmt,
        'isss',
        $data['user_id'],
        $data['name'],
        $data['slug'],
        $data['description']
    );
    mysqli_stmt_execute($stmt);

    return (int) mysqli_insert_id($conn);
}
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

function getStoreBySlug(string $slug): ?array {
    global $conn;

    $stmt = mysqli_prepare(
        $conn,
        "SELECT s.*, u.name AS owner_name, u.username AS owner_username "
        . "FROM " . STORE_TABLE . " s "
        . "INNER JOIN users u ON u.id = s.user_id "
        . "WHERE s.slug = ? LIMIT 1"
    );
    mysqli_stmt_bind_param($stmt, 's', $slug);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    return mysqli_fetch_assoc($result) ?: null;
}

function getStoreItems(int $storeId): array {
    global $conn;

    $stmt = mysqli_prepare(
        $conn,
        "SELECT i.*, c.name AS category_name "
        . "FROM items i "
        . "LEFT JOIN categories c ON c.id = i.category_id "
        . "WHERE i.store_id = ? AND i.status IN ('available', 'sold') "
        . "ORDER BY i.created_at DESC"
    );
    mysqli_stmt_bind_param($stmt, 'i', $storeId);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    return $result ? mysqli_fetch_all($result, MYSQLI_ASSOC) : [];
}

function getStoreStats(int $storeId): array {
    global $conn;

    $stmt = mysqli_prepare(
        $conn,
        "SELECT "
        . "SUM(CASE WHEN status = 'available' THEN 1 ELSE 0 END) AS ready_count, "
        . "SUM(CASE WHEN status = 'sold' THEN 1 ELSE 0 END) AS sold_count, "
        . "COUNT(*) AS total_count "
        . "FROM items WHERE store_id = ? AND status IN ('available', 'sold')"
    );
    mysqli_stmt_bind_param($stmt, 'i', $storeId);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result) ?: [];

    return [
        'ready_count' => (int) ($row['ready_count'] ?? 0),
        'sold_count'  => (int) ($row['sold_count'] ?? 0),
        'total_count' => (int) ($row['total_count'] ?? 0),
    ];
}
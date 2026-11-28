<?php

define('ADDRESS_TABLE', 'addresses');

function getAddressUser(int $userId): array{
    global $conn;

    $stmt = mysqli_prepare($conn, 'SELECT * FROM ' . ADDRESS_TABLE . ' WHERE user_id = ?');
    mysqli_stmt_bind_param($stmt , 'i', $userId);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    return $result ? mysqli_fetch_all($result, MYSQLI_ASSOC) : [];
}

function createAddress(array $data): void {
    global $conn;

    $stmt = mysqli_prepare(
        $conn,
        "INSERT INTO " . ADDRESS_TABLE
        . " (user_id, label, recipient_name, recipient_phone, full_address, city, province, postal_code, is_primary)"
        . " VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)"
    );
    $postalCode = $data['postal_code'] ?? '';
    $isPrimary = (int) ($data['is_primary'] ?? 0);

    mysqli_stmt_bind_param(
        $stmt,
        'isssssssi',
        $data['user_id'],
        $data['label'],
        $data['recipient_name'],
        $data['recipient_phone'],
        $data['full_address'],
        $data['city'],
        $data['province'],
        $postalCode,
        $isPrimary
    );
    mysqli_stmt_execute($stmt);
}
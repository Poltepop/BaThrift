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
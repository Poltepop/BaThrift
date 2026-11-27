<?php

define('BT_TABLE', 'balance_transactions');

function getUserBalance(int $storeId): array {
    global $conn;

    $stmt = mysqli_prepare($conn, "SELECT COALESCE(SUM(amount), 0) AS saldo FROM " . BT_TABLE . " WHERE store_id = ?");
    mysqli_stmt_bind_param($stmt, 'i', $storeId);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    return mysqli_fetch_assoc($result) ?: ['saldo' => 0];
}
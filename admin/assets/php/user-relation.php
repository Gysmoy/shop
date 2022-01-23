<?php
session_start();
if (
    isset($_SESSION['status']) &&
    $_SESSION['status'] == true &&
    isset($_SESSION['type']) &&
    $_SESSION['type'] == 'admin'
) {
    include_once '../../../assets/php/database.php';
    $db = new Database();
    $business_query = $db -> connect() -> query('SELECT
        COUNT(*) AS quantity,
        (
            SELECT join_date
            FROM business
            ORDER BY id DESC
            LIMIT 1
        ) AS join_date,
        (
            SELECT COUNT(*)
            FROM business
            WHERE join_date BETWEEN DATE_SUB(NOW(),INTERVAL 1 WEEK) AND NOW()
        ) AS quantity_last_week
    FROM business');
    $clients_query = $db -> connect() -> query('SELECT
        COUNT(*) AS quantity,
        (
            SELECT join_date
            FROM general_users
            ORDER BY id DESC
            LIMIT 1
        ) AS join_date,
        (
            SELECT COUNT(*)
            FROM general_users
            WHERE join_date BETWEEN DATE_SUB(NOW(),INTERVAL 1 WEEK) AND NOW()
        ) AS quantity_last_week
    FROM general_users');
    $marketers_query = $db -> connect() -> query('SELECT
        COUNT(*) AS quantity,
        (
            SELECT join_date
            FROM marketers
            ORDER BY id DESC
            LIMIT 1
        ) AS join_date,
        (
            SELECT COUNT(*)
            FROM marketers
            WHERE join_date BETWEEN DATE_SUB(NOW(),INTERVAL 1 WEEK) AND NOW()
        ) AS quantity_last_week
    FROM marketers');
    $business_row = $business_query -> fetch(PDO::FETCH_ASSOC);
    $clients_row = $clients_query -> fetch(PDO::FETCH_ASSOC);
    $marketers_row = $marketers_query -> fetch(PDO::FETCH_ASSOC);
    echo json_encode([
        'business' => [
            'quantity' => $business_row['quantity'],
            'join_date' => $business_row['join_date'],
            'last_week' => $business_row['quantity_last_week']
        ],
        'clients' => [
            'quantity' => $clients_row['quantity'],
            'join_date' => $clients_row['join_date'],
            'last_week' => $clients_row['quantity_last_week']
        ],
        'marketers' => [
            'quantity' => $marketers_row['quantity'],
            'join_date' => $marketers_row['join_date'],
            'last_week' => $marketers_row['quantity_last_week']
        ]
    ], JSON_PRETTY_PRINT);
}

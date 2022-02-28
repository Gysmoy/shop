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
  $query = $db -> connect() -> prepare('SELECT
    profile_full,
    profile_type
  FROM admins
  WHERE id = ?
  ');
  $query -> execute([$_GET['id']]);
  $row = $query -> fetch(PDO::FETCH_ASSOC);
  if ($row && $row['profile_full'] != '' && $row['profile_full'] != null) {
    header('Content-Type: ' . $row['profile_type']);
    echo $row['profile_full'];
  } else {
    http_response_code(400);
    header('Content-Type: image/svg+xml');
    echo file_get_contents('../../../assets/img/user-not-found.svg');
  }
}

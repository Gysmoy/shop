<?php
session_start();
if (
  isset($_SESSION['status']) &&
  $_SESSION['status'] == true &&
  isset($_SESSION['type']) &&
  $_SESSION['type'] == 'client'
) {
  include_once '../../../assets/php/database.php';
  $db = new Database();
  $query = $db -> connect() -> prepare('SELECT
    profile
  FROM general_users
  WHERE id = ?
  ');
  $query -> execute([$_GET['id']]);
  $row = $query -> fetch(PDO::FETCH_ASSOC);
  if ($row && $row['profile'] != '' && $row['profile'] != null) {
    header('Content-Type: image/jpg');
    echo $row['profile'];
  } else {
    header('Content-Type: image/svg+xml');
    echo file_get_contents('../../../assets/img/user-not-found.svg');
  }
}

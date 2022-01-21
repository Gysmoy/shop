<?php
session_start();
if (
  isset($_SESSION['status']) &&
  $_SESSION['status'] == true &&
  isset($_SESSION['type']) &&
  $_SESSION['type'] == 'client'
) {
} else {
  header('location: ./login.php');
}
?>
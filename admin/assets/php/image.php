<?php
session_start();
if (
    isset($_SESSION['status']) && 
    isset($_SESSION['status']) == true
) {
    include_once './assets/php/database.php';
}
?>
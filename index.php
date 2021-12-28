<?php
if (isset($_GET['page'])) {
    echo $_GET['page'];
} else {
    include_once 'assets/html/index.html';
}
?>
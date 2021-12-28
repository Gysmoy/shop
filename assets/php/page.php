<?php
if (strpos($_SERVER['PHP_SELF'], 'assets') !== false) {
    header('location: ../../');
    die();
}
$idPage = $_GET['page'];
$id = uniqid();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="assets/css/page-style.css?v=<?php echo $id;?>">
</head>
<body page="<?php echo $idPage;?>">
<header>
    <img id="logo" src="assets/img/logo.png" alt="">
    <h1 id="name">Rambo Chicken</h1>
    <select id="container">
        <option value="container1">Contenedor 1</option>
        <option value="container2">Contenedor 2</option>
        <option value="container3">Contenedor 3</option>
    </select>
</header>
<main></main>
<footer></footer>
<script type="text/javascript" src="assets/js/jquery.min.js"></script>
<script type="text/javascript" src="assets/js/getGeneralConfig.js?v=<?php echo $id;?>"></script>
</body>
</html>
<?php
if (strpos($_SERVER['PHP_SELF'], 'assets') !== false) {
    header('location: ../../');
    die();
}
$idPage = $_GET['page'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body idPage="<?php echo $idPage;?>">
<script type="text/javascript" src="assets/js/jquery.min.js"></script>
<script type="text/javascript" src=""></script>
</body>
</html>
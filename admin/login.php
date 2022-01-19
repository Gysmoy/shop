<?php
session_start();
$i = uniqid();
// Cerrar sesión
if (isset($_GET['logout'])) {
  session_unset();
  session_destroy();
  header('location: ./login.php');
}
// Redireccionar sesión
if (
  isset($_SESSION['status']) &&
  $_SESSION['status'] == true &&
  isset($_SESSION['type']) &&
  $_SESSION['type'] == 'admin'
) {
  header('location: ./index.php');
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Administración | Login</title>
  <link rel="stylesheet" href="../assets/css/fontawesome.css">
  <script src="../assets/js/fontawesome.min.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="assets/css/login.css?<?php echo $i; ?>">
</head>

<body>
  <form id="login" action="../api/admin/access" method="POST" autocomplete="off">
    <img src="../assets/img/lock.svg" alt="Iniciar sesión en SHOP">
    <h1>Administración | Login</h1>
    <button type="button" class="btn-google">
      <i class="fa fa-google"></i>
      Iniciar sesión con Google
    </button>
    <button type="button" class="btn-facebook">
      <i class="fa fa-facebook"></i>
      Iniciar sesión con Facebook
    </button>
    <label for="username">Usuario o correo electrónico</label>
    <input type="text" id="username" placeholder="ejemplo@dominio.com">
    <label for="password">Contraseña</label>
    <input type="password" id="password" placeholder="••••••••••">
    <blockquote>
      Ingrese sus credenciales para iniciar sesión
    </blockquote>
    <button type="submit">
      <i id="btn-icon" class="fa fa-user"></i>
      Acceder
    </button>
  </form>
  <script src="../assets/js/jquery.min.js"></script>
  <script src="assets/js/login.js?<?php echo $i; ?>"></script>
</body>

</html>
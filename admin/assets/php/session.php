<?php
session_start();
$res = [
  'status' => 400,
  'message' => 'La sesión ha expirado',
  'data' => []
];
if (
  isset($_SESSION['status']) &&
  $_SESSION['status'] == true &&
  isset($_SESSION['type']) &&
  $_SESSION['type'] == 'admin'
) {
  $res['status'] = 200;
  $res['message'] = 'Sesión correcta';
  $res['data'] = $_SESSION;
  unset($res['data']['user']['password']);
}
http_response_code($res['status']);
echo json_encode($res, JSON_PRETTY_PRINT);
?>
<?php
  session_start();

  include("conexion.php");
  $fecha = date("Y-m-j H:i:s");
  $codigo = $_SESSION['codigo'];
  $query = mysql_query("UPDATE profileusuario SET ultimo_acceso='$fecha' WHERE codigo='$codigo'");
 
  // store to test if they *were* logged in
  unset($_SESSION['valid_user']);
  unset($_SESSION['apellidos']);
  unset($_SESSION['tipo_usuario']);
  unset($_SESSION['ultimo_acceso']);
  unset($_SESSION['permisos']);
  session_destroy();
  header("Location: ../");
?>
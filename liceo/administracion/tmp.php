<?php
$userid = "liceo";
$password = md5(admin);

include ("conexion.php");
  
$query = mysql_query("SELECT usuario, clave_acceso FROM cat_usr WHERE usuario = '$userid' and clave_acceso = '$password'");

$query = "UPDATE cat_usr SET clave_acceso='$password' WHERE usuario='$userid'";
mysql_query($query) or die(mysql_error());
  
echo "La clave se ha cambiado, la nueva clave es: $password";
?>
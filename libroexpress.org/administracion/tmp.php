<?php
include ("conexion.php");
conecta_bd("libroexpress");

$password = "obando";
$password1 = md5($password);

$query = "INSERT INTO usuarios_admin (nombre_completo, usuario_admin, password, correo, token) VALUES ('Manuel Obando', 'manuel', '$password1', 'gerencia@videoexpress.org', '0')";
mysql_query($query) or die(mysql_error());
echo "se actualizo la clave de acceso encriptada con MD5\n";
?>
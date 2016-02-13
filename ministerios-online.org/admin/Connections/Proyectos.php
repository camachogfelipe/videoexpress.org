<?php
//die();

# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_Proyectos = "localhost";
$database_Proyectos = "libroexp_mio";
$username_Proyectos = "libroexp_admin";
$password_Proyectos = "manuel.obando.123";
$conexion = mysql_connect($hostname_Proyectos, $username_Proyectos,$password_Proyectos);
mysql_select_db($database_Proyectos,$conexion);
 
$Proyectos = mysql_pconnect($hostname_Proyectos, 
$username_Proyectos, $password_Proyectos) or trigger_error(mysql_error(),E_USER_ERROR);


?>
<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_Proyectos = "localhost";
$database_Proyectos = "cieccom_CIEC";
$username_Proyectos = "cieccom_ciecUser";
$password_Proyectos = "ciecpass123";
 
$Proyectos = mysql_pconnect($hostname_Proyectos, 
$username_Proyectos, $password_Proyectos) or trigger_error(mysql_error(),E_USER_ERROR);


?>
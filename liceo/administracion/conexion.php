<?php
// Configura los datos de tu cuenta
$dbhost='localhost';
$dbusername='liceoan_anglo';
$dbuserpass='anglo.admin.123';
$dbname='liceoan_anglo';

//nos conectamos a la base de datos
mysql_connect ($dbhost, $dbusername, $dbuserpass);
mysql_select_db($dbname) or die("Cannot select database");
?>
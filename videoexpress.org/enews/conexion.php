<?php
// Configura los datos de tu cuenta
    $dbhost='mysql911.ixwebhosting.com';
    $dbusername='C274400_catalogo';
    $dbuserpass='Videx.123';
	$dbname= "C274400_".$bd;

//nos conectamos a la base de datos
$con = mysql_connect ($dbhost, $dbusername, $dbuserpass);
mysql_select_db($dbname) or die("Cannot select database");
?>
<?php
function conecta_bd($bd)
{
	// Configura los datos de tu cuenta
	$dbhost='localhost';
	$dbusername='libroexp_admin';
	$dbuserpass='manuel.obando.123';
	$dbname='libroexp_'.$bd;

	//nos conectamos a la base de datos
	mysql_connect ($dbhost, $dbusername, $dbuserpass);
	mysql_select_db($dbname) or die("Cannot select database");
}
?>
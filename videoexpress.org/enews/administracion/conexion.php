<?php
// Configura los datos de tu cuenta
$dbhost='localhost';
$dbusername='root';
$dbuserpass='camachitos';
$dbname='c274400_'.$bd;

//nos conectamos a la base de datos
mysql_connect ("$dbhost", "$dbusername", "$dbuserpass");
mysql_select_db("$dbname") or die("Cannot select database");
?>
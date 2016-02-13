<?php
session_start();

$id = $_REQUEST['id'];

// check session variable
if (isset($_SESSION['valid_user']))
{
	$bd = "enews";
	include ("conexion.php");
	
	$query = "DELETE FROM catalogo WHERE id='$id'";
	mysql_query($query) or die(mysql_error());
	echo "<script languaje='Javascript'>location.href='listado_peliculas.php'</script>";
}
else
{
	include ('index.php');
}
?>
<?php
session_start();

  // check session variable

if (isset($_SESSION['user_admin']))
{
	$id = $_REQUEST['id'];
	
	include('../../include/funciones_globales.php');
	$conecta = conecta_bd("videoexpress");
	$query = act_datos_tabla("info_fac_videx","devueltas='si'","id_factura='$id'",1);
	echo '<script languaje="Javascript">location.href="facturas.php"</script>';
}
else
{
	include ('index.php');
}
?>
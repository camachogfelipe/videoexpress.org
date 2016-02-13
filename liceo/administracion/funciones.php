<?php
function cargar_permisos()
{
	include ("conexion.php");

	$permisos = "";
	$query = mysql_query("SELECT $permisos FROM profileusuario WHERE codigo='$_SESSION[cod]'");

	while($row=mysql_fetch_object($query))
	{
		//cargamos los valores de las sesiones
		$user = $row->usuario;
		$pass = $row->clave_acceso;
		$activo = $row->activo;
	}
}
?>
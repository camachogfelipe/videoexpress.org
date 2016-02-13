<?php
session_start();

echo "<body bgcolor=\"#FFFFFF\">";
// check session variable
if (isset($_SESSION['valid_user']) and $_SESSION['permisos'][1] == "Y")
{
	echo "<html><meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1' />";
	echo "<link href='../estilo.css' rel='stylesheet' type='text/css'/>";
	//nos conectamos a la base de datos
	include ("conexion.php");
	
	$sql = "select * FROM boletin";	
	//nos conectamos a la tabla respectiva
	$result = mysql_query($sql) or die("La siguiente consulta contiene algún error:<br>nSQL: <b>$sql</b>");
	
	$estilo_celda = "valign='top' style='text-align:justify; font-weight: bold'";
	
	echo "<table border='1px' width='100%' style='border: 1px solid #CCC;' id='listado_contenido'><tr class='encabezado_tabla'>";
	echo "<td width='30px' $estilo_celda>No</td>";
	echo "<td $estilo_celda>Boletin</td>";
	echo "<td $estilo_celda width='100px'>Acci&oacute;n</td></tr>";
	
	$colorfila = 0;
			
	while ($row = mysql_fetch_object($result))
	{
		if ($colorfila==0)
		{
			$color = "#FFFF99";
			$color1 = "#000";
		    $colorfila = 1; 
		}
		else
		{
			$color = "#FFF";
			$color1 = "#000";
			$colorfila = 0;
		}
		
		$estilo_celda = "valign='top' style='text-align:justify; background-color:$color; color:$color1'";

		echo "<tr>";
		$No = $row->No;
		echo "<td $estilo_celda>$No</td>";
		$boletin = $row->boletin;
		echo "<td $estilo_celda>$boletin</td>";
		echo "<td $estilo_celda class='menu_enlaces'>";
		if($_SESSION['permisos'][0] == "Y")
			echo "<a href='editar.php?No=$No&editar=true&boletin=$boletin'>Editar</a>";
		if($_SESSION['permisos'][2] == "Y")
			echo "<br /><a href='borrar.php?No=$No&tipo=boletin'>Eliminar</a></td></tr>";
	}

	echo "</table>";
}
else
{
	include ('index.php');
}
?>
</body>
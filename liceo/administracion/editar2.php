<?php
session_start();

// check session variable
if (isset($_SESSION['valid_user']) and $_SESSION['permisos'][0] == "Y")
{
	include ("conexion.php");
	
	$info[No]		= $_REQUEST["No"];
	$info[boletin]	= $_REQUEST["boletin"];
	$editar 		= $_REQUEST['editar'];
	
	if ($info[boletin] == NULL)
	{
		echo "<script languaje='Javascript'>location.href='editar.php'</script>";
	}
	if ($info[boletin] != NULL)
	{
		//tomamos el numero del articulo que es el mismo del archivo de imagen
		$sql = "SELECT COUNT(*) FROM boletin";
	
		$result = mysql_query($sql) or die("La siguiente consulta contiene alg&uacute;n error:<br>nSQL: <b>$sql</b>");
		$total_resultados = mysql_fetch_array($result);
		
		$num = $total_resultados[0];
		$num++;

		if ($info[No] > 0)
		{
			$query = "UPDATE boletin SET boletin='$info[boletin]' WHERE No='$info[No]'";
			mysql_query($query) or die(mysql_error());
			echo "<script languaje='Javascript'>location.href='tabla_contenido.php'</script>";
		}
		else
		{
			//Todo parece correcto procedemos con la inserccion
			$query = "INSERT INTO boletin (No, boletin) VALUES('$num', '$info[boletin]')";		
			mysql_query($query) or die(mysql_error());
			echo "<script languaje='Javascript'>location.href='tabla_contenido.php'</script>";
		}
	}
}
else
{
	include ('index.php');
}
?>
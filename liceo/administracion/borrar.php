<?php
session_start();

$No = $_REQUEST['No'];
$tipo = $_REQUEST['tipo'];
$archivo = $_REQUEST['archivo'];

// check session variable
if (isset($_SESSION['valid_user']))
{
	include ("conexion.php");
	
	if($tipo == 'email' and $_SESSION['permisos'][5] == "Y")
	{
		$query = "DELETE FROM emails WHERE No='$No'";
		mysql_query($query) or die(mysql_error());
		echo "<script languaje='Javascript'>location.href='tabla_padres.php'</script>";
	}
	elseif($tipo == 'boletin' and $_SESSION['permisos'][2] == "Y")
	{
		$query = "DELETE FROM boletin WHERE No='$No'";
		mysql_query($query) or die(mysql_error());
		echo "<script languaje='Javascript'>location.href='tabla_contenido.php'</script>";
	}
	elseif($tipo == 'archivo' and $_SESSION['permisos'][8] == "Y")
	{
		$query = "DELETE FROM archivos WHERE id='$No'";
		mysql_query($query) or die(mysql_error());
		$borrar = "../archivos_descarga/".$archivo;
		unlink($borrar);
		echo "<script languaje='Javascript'>location.href='subir_archivos.php?accion=listar'</script>";
	}
	elseif($tipo == 'archivo_profe' and $_SESSION['permisos'][10] == "Y")
	{
		$query = "DELETE FROM alumnos WHERE id='$No'";
		mysql_query($query) or die(mysql_error());
		$borrar = "../alumnos/".$archivo;
		unlink($borrar);
		echo "<script languaje='Javascript'>location.href='up_file_alumno.php?accion=listar'</script>";
	}
}
else
{
	include ('index.php');
}
?>
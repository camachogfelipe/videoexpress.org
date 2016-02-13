<?php
session_start();
// check session variable
if (isset($_SESSION['valid_user']))
{
	include ("funciones.php");
	conecta_bd("redlibr_redlibreria");
	
	$info[No]		= $_POST["No"];
	$titulo			= htmlentities($_POST["titulo"]);
	$info[titulo]	= $titulo;
	$encabezado		= htmlentities($_POST["encabezado"]);
	$info[encabezado] = $encabezado;
	$texto			= htmlspecialchars($_POST["texto"]);
	$info[texto]	= $texto;
	$editar 		= $_POST['editar'];
	
	if($info[titulo] == NULL || $info[encabezado] == NULL || $info[texto] == NULL)
	{
		echo "<script languaje='Javascript'>location.href='editar.php?No=$info[No]titulo=$info[titulo]&encabezado=$info[encabezado]&texto=$info[texto]'</script>";
	}
	elseif($info[titulo] != NULL and $info[encabezado] != NULL and $info[texto] != NULL)
	{
		//tomamos el numero del articulo que es el mismo del archivo de imagen
		if ($info[No] > 0)
		{
			$query = "UPDATE notired SET titulo='$info[titulo]', encabezado='$info[encabezado]', texto='$info[texto]', fecha='".date("Y-m-j")."' WHERE id_notired='$info[No]'";
			mysql_query($query) or die(mysql_error());
			echo "<script languaje='Javascript'>location.href='notired.php?op=2'</script>";
		}
		else
		{
			//Todo parece correcto procedemos con la inserccion
			$query = "INSERT INTO notired (titulo, encabezado, texto, fecha) VALUES('$info[titulo]', '$info[encabezado]', '$info[texto]', '".date("Y-m-j")."')";		
			mysql_query($query) or die(mysql_error());
			echo "<script languaje='Javascript'>location.href='notired.php'</script>";
		}
	}
}
else
{
	echo "<script languaje='Javascript'>location.href='../'</script>";
}
?>
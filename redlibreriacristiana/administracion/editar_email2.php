<?php
session_start();
// check session variable
if (isset($_SESSION['valid_user']))
{
	include ("funciones.php");
	conecta_bd("redlibr_redlibreria");
	
	$info[No]			= $_REQUEST["id_email"];
	$info[nombres]		= $_REQUEST["nombres"];
	$info[email]		= $_REQUEST["correo"];
	$editar 			= $_REQUEST['editar'];
	
	if($info[nombres] == NULL || $info[email] == NULL)
	{
		echo "<script languaje='Javascript'>location.href='notired.php?op=3'</script>";
	}
	elseif($info[nombres] != NULL and $info[email] != NULL)
	{
		//tomamos el numero del articulo que es el mismo del archivo de imagen
		if ($info[No] > 0)
		{
			$query = "UPDATE email SET nombres='$info[nombres]', email='$info[email]' WHERE id_email='$info[No]'";
			mysql_query($query) or die(mysql_error());
			echo "Se ha actualizado el inscrito correctamente";
		}
		else
		{
			//Todo parece correcto procedemos con la inserccion
			$query = "INSERT INTO email (nombres, email) VALUES('$info[nombres]', '$info[email]')";		
			mysql_query($query) or die(mysql_error());
			echo "Se han agregado los datos del nuevo inscrito correctamente";
		}
	}
}
else
{
	echo "<script languaje='Javascript'>location.href='../'</script>";
}
?>
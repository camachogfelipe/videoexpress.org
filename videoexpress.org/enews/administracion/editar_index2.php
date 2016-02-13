<?php
session_start();

// check session variable
if (isset($_SESSION['valid_user']))
{
	$bd = "enews";
	include ("conexion.php");
	include("../../catalogo/include/funciones_globales.php");
	
	$info[No]					= $_REQUEST["No"];
	$info[fecha]				= $_POST["fecha"];
	$info[fondo]				= $_REQUEST["fondo"];
	$info[titulo_paraeditar]	= remplazar(addslashes($_POST["titulo_paraeditar"]));
	$info[texto_paraeditar]		= remplazar(addslashes($_POST["texto_paraeditar"]));
	$info[titulo_primerafila]	= remplazar(addslashes($_POST["titulo_primerafila"]));
	$info[texto_primerafila]	= remplazar(addslashes($_POST["texto_primerafila"]));
	$info[titulo_nuevamente] 	= remplazar(addslashes($_POST["titulo_nuevamente"]));
	$info[texto_nuevamente] 	= remplazar(addslashes($_POST["texto_nuevamente"]));
	$info[titulo_buenasnuevas] 	= remplazar(addslashes($_POST["titulo_buenasnuevas"]));
	$info[texto_buenasnuevas] 	= remplazar(addslashes($_POST["texto_buenasnuevas"]));
	$info[titulo_garabatos] 	= remplazar(addslashes($_POST["titulo_garabatos"]));
	$info[texto_garabatos] 		= remplazar(addslashes($_POST["texto_garabatos"]));
	$editar 					= $_GET['editar'];
	
	//Tomamos el numero de index a crear, que va a ser el mismo del fondo
	$sql = "SELECT COUNT(*) FROM inicio";
	$result = mysql_query($sql) or die("La siguiente consulta contiene alg&uacute;n error:<br>nSQL: <b>$sql</b>");
	$total_resultados = mysql_fetch_array($result);
	
	$numimg = $total_resultados[0];
	$numimg++;

	if ($_POST["action"] == "upload")
	{
    	// obtenemos los datos del archivo 
	   	$tamano = $_FILES["fondo"]['size'];
	   	$tipo = $_FILES["fondo"]['type'];
	    $archivo1 = $_FILES["fondo"]['name'];
	
	   	if ($archivo1 != "")
		{
           // guardamos el archivo a la carpeta files
			
			// guardamos el archivo a la carpeta files
			$ext_archivo = substr($archivo1, -4);
			$archivo1 = "fondo";
			if($editar == true)
			{
				$archivo1 .= $info[No];
			}
			else
			{
				$archivo1 .= $numimg;
			}
			
			$archivo1 .= $ext_archivo;
			$archivo = $archivo1;
			
			$destino =  "../imagenes-para-secciones/fondos/";
			$destino .= $archivo;
			
        	if (copy($_FILES['fondo']['tmp_name'],$destino))
			{
            	$status = "<br>Archivo subido: <b>".$archivo."</b>";
	   	    }
			else
			{
            	$status = "<br>Error al subir el archivo";
	   	    }
	   	}
		else
		{
			$archivo = $_GET['fondo'];
       		$status = "<br>Error al subir el archivo: esta vacio";
	    }
	
		if ($info[No] > 0)
		{
			if ($archivo1 != NULL) $info[fondo] = $archivo1;
			$query = "UPDATE inicio SET ";
			$query .= "fondo='$info[fondo]', ";
			$query .= "fecha='$info[fecha]', ";
			$query .= "titulo_paraeditar='$info[titulo_paraeditar]', cuerpo_paraeditar='$info[texto_paraeditar]', ";
			$query .= "titulo_primerafila='$info[titulo_primerafila]', cuerpo_primerafila='$info[texto_primerafila]', ";
			$query .= "titulo_nuevamente='$info[titulo_nuevamente]', cuerpo_nuevamente='$info[texto_nuevamente]', ";
			$query .= "titulo_buenasnuevas='$info[titulo_buenasnuevas]', cuerpo_buenasnuevas='$info[texto_buenasnuevas]', ";
			$query .= "titulo_garabatos='$info[titulo_garabatos]', cuerpo_garabatos='$info[texto_garabatos]' ";
			$query .= "WHERE No='$info[No]'";
			mysql_query($query) or die(mysql_error());
			echo "<script languaje='Javascript'>location.href='tabla_contenido.php'</script>";
		}
		else
		{
			//Todo parece correcto procedemos con la inserccion
			$query = "INSERT INTO inicio (";
			$query .= "No, fondo, fecha, ";
			$query .= "titulo_paraeditar, cuerpo_paraeditar, ";
			$query .= "titulo_primerafila, cuerpo_primerafila, ";
			$query .= "titulo_nuevamente, cuerpo_nuevamente, ";
			$query .= "titulo_buenasnuevas, cuerpo_buenasnuevas, ";
			$query .= "titulo_garabatos, cuerpo_garabatos";
			$query .= ") VALUES (";
			$query .= "'$numimg', '$archivo', '$info[fecha]', ";
			$query .= "'$info[titulo_paraeditar]', '$info[texto_paraeditar]', ";
			$query .= "'$info[titulo_primerafila]', '$info[texto_primerafila]', ";
			$query .= "'$info[titulo_nuevamente]', '$info[texto_nuevamente]', ";
			$query .= "'$info[titulo_buenasnuevas]', '$info[texto_buenasnuevas]', ";
			$query .= "'$info[titulo_garabatos]', '$info[texto_garabatos]')";
			mysql_query($query) or die(mysql_error());
			echo "<script languaje='Javascript'>location.href='mail.php?es=1'</script>";
		}
	} 
	else
	{
		echo "No se ha tomado el archivo por alguna razón";
	}
}
else
{
	include ('index.php');
}
?>
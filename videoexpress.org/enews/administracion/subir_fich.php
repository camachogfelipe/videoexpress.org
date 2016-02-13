<?php
session_start();

// check session variable
if (isset($_SESSION['valid_user']))
{
	$bd = "enews";
	include ("conexion.php");
	
	$editar = $_GET['editar'];

	$id = $_POST["id"];
	$titulo = $_POST["titulo_pelicula"];
	$auditorio = $_POST["auditorio"];
	$clasificacion = $_POST["clasificacion"];
	$genero = $_POST["genero"];
	$tiempo = $_POST["tiempo"];
	$descripcion = $_POST["descripcion"];
	$formato = $_POST["formato"];
	$nuevo = $_POST["nuevo"];

	//obtenemos la fecha de hoy
	$num_dia = date(j);
	$mes = date(n);
	$anio = date(Y);

	$fecha = "$anio-$mes-$num_dia";

	if ($_POST["action"] == "upload")
	{
    	// obtenemos los datos del archivo 
	   	$tamano = $_FILES["archivo"]['size'];
	   	$tipo = $_FILES["archivo"]['type'];
	    $archivo1 = $_FILES["archivo"]['name'];
	
	   	if ($archivo1 != "")
		{
               	// guardamos el archivo a la carpeta files
			$sql = "SELECT num_img FROM actualizacion";
	
			$result = mysql_query($sql) or die("La siguiente consulta contiene alg&uacute;n error:<br>nSQL: <b>$sql</b>");
	
			while($row=mysql_fetch_object($result))
			{
				$numimg = $row->num_img;
			}
			
			$numimg++;
			$num_img = $numimg;
			$numimg = "cv".$numimg;
			$numimg .= "_";
			
	   	    $tmp = $archivo1;
			$archivo1 = $numimg;
			$archivo1 .= $tmp;
			
			//$archivo1 = implode("-", $archivo1);
			
			$cadena_buscar['á'] = "a";
			$cadena_buscar['é'] = "e";
			$cadena_buscar['í'] = "i";
			$cadena_buscar['ó'] = "o";
			$cadena_buscar['ú'] = "u";
			$cadena_buscar['ñ'] = "n";

			$archivo = strtr($archivo1, $cadena_buscar);
			
			$destino =  "../Imagenes_peliculas/";
			$destino .= $archivo;
			
        	if (copy($_FILES['archivo']['tmp_name'],$destino))
			{
            	$status = "Archivo subido: <b>".$archivo."</b>";
	   	    }
			else
			{
            	$status = "Error al subir el archivo";
	   	    }
	   	}
		else
		{
			$archivo = $_GET['imagen'];
       		$status = "Error al subir archivo";
	    }
	
		if ($id > 0)
		{
			$query = "UPDATE catalogo SET titulo='$titulo', auditorio='$auditorio', clasificacion='$clasificacion', genero='$genero', tiempo='$tiempo', descripcion='$descripcion', imagen='$archivo', formato='$formato', fecha='$fecha', nuevo='$nuevo' WHERE id='$id'";
			mysql_query($query) or die(mysql_error());
			$query = "UPDATE actualizacion SET fecha_actualizacion='$fecha'";
			mysql_query($query) or die(mysql_error());
			echo "<script languaje='Javascript'>location.href='listado_peliculas.php'</script>";
		}
		else
		{
			//Todo parece correcto procedemos con la inserccion
			$query = "INSERT INTO catalogo (titulo, auditorio, clasificacion, genero, tiempo, descripcion, imagen, formato, fecha, nuevo) VALUES('$titulo', '$auditorio', '$clasificacion', '$genero', '$tiempo', '$descripcion', '$archivo', '$formato', '$fecha', '$nuevo')";
			mysql_query($query) or die(mysql_error());
			$query = "UPDATE actualizacion SET fecha_actualizacion='$fecha', num_img='$num_img'";
			mysql_query($query) or die(mysql_error());
			echo "<script languaje='Javascript'>location.href='listado_peliculas.php'</script>";
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

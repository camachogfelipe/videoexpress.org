<?php
session_start();

// check session variable
if (isset($_SESSION['valid_user']))
{
	$bd = "enews";
	include ("conexion.php");
	include("../../catalogo/include/funciones_globales.php");
	
	$info[No]					= $_POST["No"];
	$info[articulo]				= $_REQUEST["articulo"];
	$info[titulo_articulo]		= addslashes($_POST["titulo_articulo"]);
	$info[titulo_articulo]		= remplazar($info[titulo_articulo]);
	$info[img_photo_main]		= $_REQUEST["img_photo_main"];
	$info[fecha]				= $_POST["fecha"];
	$info[texto_articulo]		= $_POST["texto_articulo"];
	$info[texto_articulo]		= remplazar($info[texto_articulo]);
	$info[anio]					= $_POST["anio"];
	$editar 					= $_GET['editar'];
	
	
	$cadena_buscar['"'] = "\"";
	$tmp = strtr($info[texto_articulo], $cadena_buscar);
	$texto_articulo = $tmp;
	
	$info[fecha] .= " de $info[anio]";
	
	//tomamos el numero del articulo que es el mismo del archivo de imagen
	$sql = "SELECT COUNT(*) FROM $info[articulo]";

	$result = mysql_query($sql) or die("La siguiente consulta contiene alg&uacute;n error:<br>nSQL: <b>$sql</b>");
	$total_resultados = mysql_fetch_array($result);
	
	$numimg = $total_resultados[0];
	$numimg++;

	if ($_POST["action"] == "upload")
	{
    	// obtenemos los datos del archivo 
	   	$tamano = $_FILES["img_photo_main"]['size'];
	   	$tipo = $_FILES["img_photo_main"]['type'];
	    $archivo1 = $_FILES["img_photo_main"]['name'];
	
	   	if ($archivo1 != "")
		{
           	// guardamos el archivo a la carpeta files
			$ext_archivo = substr($archivo1, -4);
			$archivo1 = "photo-main-";
			$archivo1 .= $info[articulo];
			if($editar == true)
			{
				if($info[No] < 10) $archivo1 .= "-0".$info[No];
				else $archivo1 .= "-".$info[No];
			}
			else
			{
				$archivo1 .= "-".$numimg;
			}
			
			$archivo1 .= $ext_archivo;
			$archivo = $archivo1;
			
			$destino =  "../imagenes-para-secciones/photo-main/";
			echo "<br>".$destino .= $archivo;
			
        	if (copy($_FILES['img_photo_main']['tmp_name'],$destino))
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
       		$status = "<br>Error al subir archivo esta vacio";
	    }
	
		if ($info[No] > 0)
		{
			if ($archivo1 != NULL) $info[img_photo_main] = $archivo1;
			$query = "UPDATE $info[articulo] SET ";
			$query .= "Titulo='$info[titulo_articulo]', ";
			$query .= "Texto='$info[texto_articulo]', ";
			$query .= "Img_photo_main='$info[img_photo_main]', ";
			$query .= "fecha='$info[fecha]' ";
			$query .= "WHERE No_seccion='$info[No]'";
			mysql_query($query) or die(mysql_error());
			echo "<script languaje='Javascript'>location.href='tabla_contenido.php'</script>";
		}
		else
		{
			//Todo parece correcto procedemos con la inserccion
			$query = "INSERT INTO $info[articulo] (";
			$query .= "No_seccion, Titulo, Texto, Img_photo_main, fecha";
			$query .= ") VALUES(";
			$query .= "'$numimg', ";
			$query .= "'$info[titulo_articulo]', ";
			$query .= "'$info[texto_articulo]', ";
			$query .= "'$archivo', ";
			$query .= "'$info[fecha]')";
			mysql_query($query) or die(mysql_error());
			echo "<script languaje='Javascript'>location.href='tabla_contenido.php'</script>";
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
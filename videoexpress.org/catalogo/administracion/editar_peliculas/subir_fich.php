<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
session_start();

// check session variable
if (isset($_SESSION['user_admin'])) {
	include("../../include/funciones_globales.php");
	
	$conecta = conecta_bd("videoexpress");
	
	//echo "<pre>";print_r($_REQUEST);echo "</pre>";//exit();
	
	$editar = $_POST['editar'];

	$id = $_POST["id"];
	$titulo = $_POST["titulo_pelicula"];
	$auditorio = $_POST["auditorio"];
	$clasificacion = $_POST["clasificacion"];
	$genero = $_POST["genero"];
	$tiempo = $_POST["tiempo"];
	$descripcion = htmlspecialchars($_POST["descripcion"], ENT_QUOTES);
	$formato = $_POST["formato"];
	$nuevo = $_POST["nuevo"];
	$compra = $_POST['compra'];
	if ($compra == 'si') {
		if($_POST['precio_compra'] == 0) $compra = "no";
		else $precio_compra = $_POST['precio_compra'];
	}
	$alquiler = $_POST['alquiler'];
	$pag = $_REQUEST['pag'];
	if(empty($pag)) $pag = 1;
	$orden = $_REQUEST['orden'];
	//echo "<pre>";print_r($_REQUEST);echo "</pre>";exit();
	
	//obtenemos la fecha de hoy
	$num_dia = date("j");
	$mes = date("n");
	$anio = date("Y");

	$fecha = "$anio-$mes-$num_dia";
	
	$sql = "SELECT num_img FROM actualizacion";
	
	$result = consulta_bd("actualizacion","num_img","-1;;;;");	
	//$result = mysql_query($sql) or die("La siguiente consulta contiene alg&uacute;n error:<br>nSQL: <b>$sql</b>");

	while($row=mysql_fetch_object($result)) $numimg = $row->num_img;


	if ($_POST["action"] == "upload") {
    	// obtenemos los datos del archivo 
	   	$tamano = $_FILES["archivo"]['size'];
	   	$tipo = $_FILES["archivo"]['type'];
	    $archivo1 = $_FILES["archivo"]['name'];
		// obtenemos los datos del trailer
		$tamano2 = $_FILES["trailer"]['size'];
		$tipo2 = $_FILES["trailer"]['type'];
		$archivo2 = $_FILES["trailer"]['name'];
		// obtenemos los datos de la pelicula online
	   	$tamano4 = $_FILES["online"]['size'];
	   	$tipo4 = $_FILES["online"]['type'];
	    $archivo4 = $_FILES["online"]['name'];
		// obtenemos los datos de la resena
	   	$tamano3 = $_FILES["resena"]['size'];
	   	$tipo3 = $_FILES["resena"]['type'];
	    $archivo3 = $_FILES["resena"]['name'];
		
		$cadena_buscar['á'] = "a";
		$cadena_buscar['é'] = "e";
		$cadena_buscar['í'] = "i";
		$cadena_buscar['ó'] = "o";
		$cadena_buscar['ú'] = "u";
		$cadena_buscar['ñ'] = "n";
		$cadena_buscar[' '] = "_";
		
		echo "<table cellspacing='0' cellpading='0' border='1px' align='center' style='border-style:dotted; background-color:#9ABEDC; color:#000'>";
		echo "<tr><td>";		
	
	   	if ($archivo1 != "") {
            // guardamos el archivo a la carpeta files
						
			$numimg += 1;
			$num_img = $numimg;
			$numimg = "CV".$numimg."_";
			
	   	    $tmp	= $archivo1;
			$archivo1 = $numimg;
			$archivo1 .= $tmp;
		
			$archivo = strtr($archivo1, $cadena_buscar);
			
			$destino =  "../../Imagenes_peliculas/";
			$destino .= $archivo;
			
        	if (copy($_FILES['archivo']['tmp_name'],$destino)) $status['imagen'] = "Archivo subido: <b>".$archivo1."</b><br>";
			else $status['imagen'] = "Error al subir el archivo de la imagen<br>";
	   	}
		else {
			$archivo = $_POST['imagen_'];
			if($archivo != NULL) $status['imagen'] = "Se mantuvo el archivo de imagen <b>".$archivo."</b><br>";
			else $status['imagen'] = "No ingresaste archivo de imagen";
	    }
		
		if ($archivo2 != "") {
			// guardamos el archivo a la carpeta files
			$trailer = strtr($archivo2, $cadena_buscar);
		
			$destino_trailer = "../../files/";
			$destino_trailer .= $trailer;
			$tipo_video = "FILE";
			
			if (copy($_FILES['trailer']['tmp_name'],$destino_trailer)) $status['trailer'] = "Archivo subido: <b>".$archivo2."</b><br>";
			else $status['trailer'] = "Error al subir el archivo del trailer<br>";
	   	}
		else {
			if($_POST['web']) { $trailer = $_POST['web']; $tipo_video = "LINK"; }
			else { $trailer = $_POST['trailer_']; $tipo_video = "FILE"; }
			if($trailer != NULL) $status['trailer'] = "Se mantuvo el archivo del trailer <b>".$trailer."</b><br>";
			else $status['trailer'] = "La película no tiene trailer";
	    }
		
		if ($archivo3 != "") {
			// guardamos el archivo a la carpeta files
			$resena = strtr($archivo3, $cadena_buscar);
			
			$destino_resena = "../../resenas/";
			$destino_resena .= $resena;
			
			if (copy($_FILES['resena']['tmp_name'],$destino_resena)) $status['resena'] = "Archivo subido: <b>".$archivo3."</b><br>";
			else $status['resena'] = "Error al subir el archivo de la reseña<br>";
	   	}
		else {
			$resena = $_POST['resena_'];
			if($resena != NULL) $status['resena'] = "Se mantuvo el archivo de la reseña <b>".$resena."</b><br>";
			else $status['resena'] = "La película no tiene una reseña";
	    }
		
		if ($archivo4 != "") {
			// guardamos el archivo a la carpeta files
			$online = strtr($archivo4, $cadena_buscar);
		
			$destino_online = "../../files/";
			$destino_online .= $online;
			$tipo_video_online = "FILE";
			
			if (copy($_FILES['online']['tmp_name'],$destino_trailer)) $status['online'] = "Archivo subido: <b>".$archivo4."</b><br>";
			else $status['online'] = "Error al subir el archivo del trailer<br>";
	   	}
		else {
			if($_POST['web_online']) { $online = $_POST['web_online']; $tipo_video_online = "LINK"; }
			else { $online = $_POST['online_']; $tipo_video_online = "FILE"; }
			if($online != NULL) $status['online'] = "Se mantuvo el archivo del video online <b>".$online."</b><br>";
			else { $status['online'] = "La película no tiene video online"; $online = "(NULL)"; }
	    }
	
		if ($id > 0) {
			$tabla = "catalogo";
			$datos = "titulo='$titulo', auditorio='$auditorio', clasificacion='$clasificacion', genero='$genero', tiempo='$tiempo', 
					  descripcion='$descripcion', imagen='$archivo', formato='$formato', fecha='$fecha', nuevo='$nuevo', 
					  compra='$compra', alquiler='$alquiler', precio_compra='$precio_compra', trailer='$trailer', 
					  tipo_video='$tipo_video', resena='$resena', online='$online', tipo_online='$tipo_video_online'";
			$concepto = "id='$id'";
			$query = act_datos_tabla($tabla,$datos,$concepto,1);
			$query = act_datos_tabla("actualizacion","fecha_actualizacion='$fecha', num_img='$num_img'","","");
			if($archivo1 != NULL) echo $status['imagen'];
			if($archivo2 != NULL) echo $status['trailer'];
			if($archivo3 != NULL) echo $status['resena'];
			if($archivo4 != NULL) echo $status['online'];
			echo "<b>Se ha actualizado con exito la pel&iacute;cula</b></td></tr></table>";
		}
		else {
			//Todo parece correcto procedemos con la inserccion
			$tabla = "catalogo";
			$columna = "titulo, auditorio, clasificacion, genero, tiempo, descripcion, imagen, formato, fecha, nuevo, compra, alquiler, 
						precio_compra, trailer, tipo_video, resena, online, tipo_online";
			$valores ="'$titulo', '$auditorio', '$clasificacion', '$genero', '$tiempo', '$descripcion', '$archivo', '$formato', '$fecha',
						'$nuevo', '$compra', '$alquiler', '$precio_compra', '$trailer', '$tipo_video', '$resena', '$online', 
						'$tipo_video_online'";
			$query = ing_datos_tabla($tabla,$columna,$valores);
			$query = act_datos_tabla("actualizacion","fecha_actualizacion='$fecha', num_img='$num_img'","","");
			if($status['imagen'] != NULL) echo $status['imagen'];
			if($status['trailer'] != NULL) echo $status['trailer'];
			if($status['resena'] != NULL) echo $status['resena'];
			if($status['online'] != NULL) echo $status['online'];
			echo "<b>Se ha agregado la pel&iacute;cula con exito</b></td></tr></table>";
		}
	} 
	else echo "No se ha tomado el archivo por alguna razón";
	echo "<br><center><a id=\"flechas\" href=\"http://".$_SERVER['HTTP_HOST']."/catalogo/administracion/listas/peliculas.php?pag=$pag&orden=$orden\" style=\"cursor:pointer;\"><img src=\"../../botones/botonadelante.png\" alt=\"Regresar\" width=\"25\" height=\"25\" align=\"absmiddle\" border=\"0\" /> Regresar</a></center>";
}
else include ('index.php');
?>
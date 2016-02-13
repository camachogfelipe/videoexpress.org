<?php
session_start();

// check session variable
if (isset($_SESSION['valid_user']) and $_SESSION['permisos'][6] == "Y")
{
	include ("conexion.php");
	
	$accion = $_REQUEST['accion'];
	$id = $_REQUEST['id'];
	$titulo = $_REQUEST["titulo"];
	$boletin = $_REQUEST['boletin'];
	$editar = $_REQUEST['editar'];
	$action = $_REQUEST['action'];
	$archivo2 = $_REQUEST['aarchivo'];
	
	if ($accion == NULL) $action = NULL;
	
	if ($action == "upload" and $_SESSION['permisos'][3] == "Y")
	{
		$tamano = $_FILES["archivo"]['size'];
		$tipo = $_FILES["archivo"]['type'];
		$archivo1 = $_FILES["archivo"]['name'];
		$tmp = $_FILES['archivo']['tmp_name'];
				
		if ($archivo1 != "")
		{
			// guardamos el archivo a la carpeta files
					
			$cadena_buscar['á'] = "a";
			$cadena_buscar['é'] = "e";
			$cadena_buscar['í'] = "i";
			$cadena_buscar['ó'] = "o";
			$cadena_buscar['ú'] = "u";
			$cadena_buscar['ñ'] = "n";
	
			$archivo1 = strtr($archivo1, $cadena_buscar);
		
			$destino =  "../archivos_descarga/";
			$destino .= $archivo1;
				
		    if (copy($_FILES['archivo']['tmp_name'],$destino))
			{
				echo $status = "Archivo subido: <b>".$archivo1."</b>";
			}
			else
			{
        		echo $status = "Error al subir el archivo, no se pudo copiar";
			}
		}
		else
		{
			$archivo1 = $archivo2;
    		echo $status = "Error al subir archivo";
		}
	}
	
	
	if($accion == 'ingresar' and $_SESSION['permisos'][3] == "Y")
	{
		if($boletin == 'no' and $titulo != NULL)
		{
			$sql = "SELECT MAX(id) FROM archivos";

			$result = mysql_query($sql) or die("La siguiente consulta contiene alg&uacute;n error:<br>nSQL: <b>$sql</b>");
			$total_resultados = mysql_fetch_array($result);
		
			$num = $total_resultados[0];
			$num++;
			
			if ($id > 0)
			{
				$query = "UPDATE archivos SET titulo='$titulo', archivo='$archivo1' WHERE id='$id'";
				mysql_query($query) or die(mysql_error());
				echo "<script languaje='Javascript'>location.href='subir_archivos.php?accion=listar'</script>";
			}
			else
			{
				//Todo parece correcto procedemos con la inserccion
				$query = "INSERT INTO archivos (id, titulo, archivo) VALUES('$num', '$titulo', '$archivo1')";
				mysql_query($query) or die(mysql_error());
				echo "<script languaje='Javascript'>location.href='subir_archivos.php?accion=listar'</script>";
			}
		}
	}
	elseif($accion == 'listar' and $_SESSION['permisos'][7] == "Y")
	{
		echo "<html><meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1' />";
		echo "<link href='../estilo.css' rel='stylesheet' type='text/css'/>";
		//nos conectamos a la base de datos
		include ("conexion.php");
	
		$sql = "select * FROM archivos";	
		//nos conectamos a la tabla respectiva
		$result = mysql_query($sql) or die("La siguiente consulta contiene algún error:<br>nSQL: <b>$sql</b>");
	
		$estilo_celda = "valign='top' style='text-align:justify; font-weight: bold'";
	
		echo "<table border='1px' width='100%' style='border: 1px solid #CCC;' id='listado_contenido'><tr class='encabezado_tabla'>";
		echo "<td width='30px' $estilo_celda>No</td>";
		echo "<td $estilo_celda>Título</td>";
		echo "<td $estilo_celda>Archivo</td>";
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
			$No = $row->id;
			echo "<td $estilo_celda>$No</td>";
			$titulo = $row->titulo;
			echo "<td $estilo_celda>$titulo</td>";
			$archivo = $row->archivo;
			echo "<td $estilo_celda>$archivo</td>";
			echo "<td $estilo_celda class='menu_enlaces'>";
			if($_SESSION['permisos'][6] == "Y")
				echo "<a href='subir_archivos.php?id=$No&editar=true&aarchivo=$archivo&titulo=$titulo'>Editar</a>";
			if($_SESSION['permisos'][8] == "Y")
				echo "&nbsp;<a href='borrar.php?tipo=archivo&No=$No&archivo=$archivo'>Eliminar</a></td></tr>";
		}

		echo "</table>";
	}
	else
	{
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="../estilo.css" rel="stylesheet" type="text/css">
</head>
<body>
<center>
<form action="subir_archivos.php?accion=ingresar" method="post" enctype="multipart/form-data">
<table width="600" border="0" cellspacing="5" cellpadding="0" align="center">
  <tr>
    <td width="216">T&iacute;tulo</td>
    <td width="369"><input name="titulo" type="text" id="titulo" tabindex="1" value="<?php if ($editar ==  true) echo $titulo;?>" size="50"></td>
  </tr>
  <tr>
    <td>Archivo</td>
    <td>
    	<?php
		if ($editar == true) echo "<p>Nombre del archivo: ".$archivo2."</p>";
		?>
        <input name="archivo" type="file" tabindex="2" size="40">
    </td>
  </tr>
  <tr>
    <td>&iquest;El archivo es de un boletin?</td>
    <td>Si<input type="radio" name="boletin" id="boletin" value="si" tabindex="3" /> No<input name="boletin" type="radio" id="boletin" tabindex="4" value="no" checked="checked" /></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><input name="enviar" type="submit" value="Enviar" tabindex="5" /><input name="action" type="hidden" value="upload" /></td>
  </tr>
</table>
</form>
</center>
</body>
</html>
<?php
	}
}
else
{
	include ('index.php');
}
?>
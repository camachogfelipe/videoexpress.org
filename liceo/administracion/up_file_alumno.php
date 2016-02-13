<?php session_start(); ?>
<script type="text/javascript" src="upload_files/LoadVars.js"><!--// http://www.devpro.it/javascript_id_92.html //--></script>
<script type="text/javascript" src="upload_files/BytesUploaded.js"><!--// http://www.devpro.it/javascript_id_96.html //--></script>
<script type="text/javascript">
	var bUploaded = new BytesUploaded('upload_files/whileuploading.php');
</script>
<?php
function tamanio($cadena, $tam)
{
	if(strlen($cadena) > $tam) $cadena = substr($cadena, $tam);
	return strtolower($cadena);
}

// check session variable
if (isset($_SESSION['valid_user']) and $_SESSION['permisos'][10] == "Y")
{
	include ("conexion.php");
	
	$accion = $_REQUEST['accion'];
	$id = $_REQUEST['id'];
	$titulo = tamanio($_REQUEST["titulo"],150);
	$alumno = tamanio($_REQUEST['alumno'], 150);
	$area = tamanio($_REQUEST['area'],100);
	$curso = tamanio($_REQUEST['curso'],30);
	$editar = $_REQUEST['editar'];
	$action = $_REQUEST['action'];
	$archivo2 = $_REQUEST['aarchivo'];
	
	if ($accion == NULL) $action = NULL;
	
	if ($action == "upload" and $_SESSION['permisos'][10] == "Y" and $_REQUEST['titulo'] != NULL)
	{
		$tamano = $_FILES["archivo"]['size'];
		$tipo = $_FILES["archivo"]['type'];
		$archivo1 = $_FILES["archivo"]['name'];
		$cadena_buscar['á'] = "a";
		$cadena_buscar['é'] = "e";
		$cadena_buscar['í'] = "i";
		$cadena_buscar['ó'] = "o";
		$cadena_buscar['ú'] = "u";
		$cadena_buscar['ñ'] = "n";
		$cadena_buscar[' '] = "";

		$archivo1 = strtr($archivo1, $cadena_buscar);
		$archivo1 = $archivo1;
		
		$tmp = $_FILES['archivo']['tmp_name'];
				
		if ($archivo1 != "")
		{
			if($tamano > 12000000)
			{
				echo "El archivo es demasiado grande";
				exit();
			}
			else
			{
				$grabar = 1;
				if($tipo == "image/jpeg" || $tipo == "image/jpg") $grabar = 2;
				if($tipo == "image/png") $grabar = 2;
				if($tipo == "application/pdf") $grabar = 2;
				if($tipo == "application/vnd.openxmlformats-officedocument.presentationml.presentation") $grabar = 2;
				if($tipo == "application/vnd.ms-powerpoint") $grabar = 2;
				if($tipo == "application/vnd.openxmlformats-officedocument.presentationml.slideshow") $grabar = 2;
				if($tipo == "application/vnd.openxmlformats-officedocument.wordprocessingml.document") $grabar = 2;
				if($tipo == "application/msword") $grabar = 2;
				if($tipo == "application/octet-stream" || $tipo == "video/x-flv") $grabar = 2;
				if($tipo == "video/mp4") $grabar = 2;
			}

			if($grabar == 2)
			{
				// guardamos el archivo a la carpeta files
				$alumno2 = strtr($alumno, $cadena_buscar);
				$curso1 = strtr($curso, $cadena_buscar);
				$destino =  "../alumnos/$alumno2$curso1/";
				if(!is_dir($destino))
				{
					@mkdir($destino, 0777);
				}
				$destino .= $archivo1;
				if(file_exists($destino))
				{
					echo "El fichero ya existe. Por favor intentelo nuevamente.";
					$grabar = 0;
					exit();
				}
				else
				{
				    if(copy($_FILES['archivo']['tmp_name'],$destino))
					{
						$status = "Archivo subido: <b>".$archivo1."</b>";
					}
					else
					{
       					echo $status = "Error al subir el archivo, no se pudo copiar";
					}
				}
			}
			else
			{
				$archivo1 = $archivo2;
    			echo $status = "Error al subir archivo";
			}
		}
	}
	if($accion == 'ingresar' and $_SESSION['permisos'][10] == "Y" and $grabar == 2 and $_REQUEST['titulo'] != NULL)
	{
		if($titulo != NULL and $alumno != NULL and $area != NULL and $curso != NULL)
		{
			$user = $_SESSION['valid_user'];
			if ($id > 0)
			{
				$query = "UPDATE alumnos SET titulo='$titulo', alumno='$alumno', area='$area', curso='$curso', archivo='$alumno2".strtr($curso, $cadena_buscar)."'/$archivo1', user='$user' WHERE id='$id'";
				mysql_query($query) or die(mysql_error());
				echo "<script languaje='Javascript'>location.href='up_file_alumno.php?accion=listar'</script>";
			}
			else
			{
				//Todo parece correcto procedemos con la inserccion
				$query = "INSERT INTO alumnos (titulo, alumno, area, curso, archivo, user) VALUES('$titulo', '$alumno', '$area', '$curso', '$alumno2".strtr($curso, $cadena_buscar)."/$archivo1', '$user')";
				mysql_query($query) or die(mysql_error());
				echo "<script languaje='Javascript'>location.href='up_file_alumno.php?accion=listar'</script>";
			}
		}
	}
	elseif($accion == 'listar' and $_SESSION['permisos'][10] == "Y")
	{
		echo "<html><meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1' />";
		echo "<link href='../estilo.css' rel='stylesheet' type='text/css'/>";
		//nos conectamos a la base de datos
		include ("conexion.php");

		$user = $_SESSION['valid_user'];
		$sql = "select * FROM alumnos";
		if($_SESSION['valid_user'] != "liceo") $sql .= " WHERE user = '$user'";
		//nos conectamos a la tabla respectiva
		$result = mysql_query($sql) or die("La siguiente consulta contiene algún error:<br>nSQL: <b>$sql</b>");
	
		$estilo_celda = "valign='top' style='text-align:justify; font-weight: bold'";
	
		echo "<table border='1px' width='100%' style='border: 1px solid #CCC;' id='listado_contenido' align='center'>";
		echo "<tr class='encabezado_tabla'>";
		echo "<td width='30px' $estilo_celda>No</td>";
		echo "<td $estilo_celda>T&iacute;tulo</td>";
		echo "<td $estilo_celda>Alumno</td>";
		echo "<td $estilo_celda>&Aacute;rea</td>";
		echo "<td $estilo_celda>Curso</td>";
		echo "<td $estilo_celda>Archivo</td>";
		echo "<td $estilo_celda>Subido por</td>";
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
			$alumno = $row->alumno;
			echo "<td $estilo_celda>$alumno</td>";
			$area = $row->area;
			echo "<td $estilo_celda>$area</td>";
			$curso = $row->curso;
			echo "<td $estilo_celda>$curso</td>";
			$archivo = $row->archivo;
			echo "<td $estilo_celda>$archivo</td>";
			$user = $row->user;
			echo "<td $estilo_celda>$user</td>";
			echo "<td $estilo_celda class='menu_enlaces'>";
			if($_SESSION['permisos'][10] == "Y")
				echo "<a href='up_file_alumno.php?id=$No&editar=true&aarchivo=$archivo&titulo=$titulo&area=$area&curso=$curso&alumno=$alumno'>Editar</a>";
			if($_SESSION['permisos'][10] == "Y")
				echo "&nbsp;<a href='borrar.php?tipo=archivo_profe&No=$No&archivo=$archivo'>Eliminar</a></td></tr>";
		}

		echo "</table>";
		echo '<center><p><a href="javascript:history.go(-1)">Regresar</a></p></center>';
	}
	else
	{
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="../estilo.css" rel="stylesheet" type="text/css">
<script>
//Pon en la variable obligatorios el name de todos los campos que deben rellenar

obligatorio = ["titulo", "alumno", "area", "curso", "archivo"];
vacio = 0;

//Pon en la veriable textoObligatorio el texto que quieres que aparezca en el alert
textoObligatorio=["Titulo de la tarea", "Nombre del alumno", "El area que maneja", "El curso del alumno", "El archivo de la tarea"];

function comprobar(este)
{
	for(a=0; a<obligatorio.length; a++)
	{
		if(este.elements[obligatorio[a]].value == "")
		{
			alert("Por favor, rellena el campo "+textoObligatorio[a]);
			este.elements[obligatorio[a]].focus();
			return false;
		}
	}
}
</script>
</head>
<body>
<center>
<form action="up_file_alumno.php?accion=ingresar" method="post" enctype="multipart/form-data" onSubmit="bUploaded.start('fileprogress');">
<table width="600" border="0" cellspacing="5" cellpadding="0" align="center">
  <tr>
    <td width="216">T&iacute;tulo <span id="max">(max. 150 caracteres)</span></td>
    <td width="369"><input name="titulo" type="text" id="titulo" tabindex="1" value="<?php if ($editar ==  true) echo $titulo;?>" size="50"></td>
  </tr>
  <tr>
    <td>Nombre alumno <span id="max">(max. 150 caracteres)</span></td>
    <td><input name="alumno" type="text" id="alumno" tabindex="2" value="<?php if ($editar ==  true) echo $alumno;?>" size="50"></td>
  </tr>
  <tr>
    <td>&Aacute;rea <span id="max">(max. 100 caracteres)</span></td>
    <td><input name="area" type="text" id="area" tabindex="3" value="<?php if ($editar ==  true) echo $area;?>" size="50"></td>
  </tr>
  <tr>
    <td>Curso o grado <span id="max">(max.30 caracteres)</span></td>
    <td>
    <select name="curso" tabindex="4">
    <option value="Prejard&iacute;n" <?php if ($editar ==  true and $area = "Prejard&iacute;n") echo 'selected="selected"';?>>Prejard&iacute;n</option>
    <option value="Jard&iacute;n" <?php if ($editar ==  true and $area = "Jard&iacute;n") echo 'selected="selected"';?>>Jard&iacute;n</option>
    <option value="Transici&oacute;n" <?php if ($editar ==  true and $area = "Transici&oacute;n") echo 'selected="selected"';?>>Transici&oacute;n</option>
    <option value="Primero" <?php if ($editar ==  true and $area = "Primero") echo 'selected="selected"';?>>Primero</option>
    <option value="Segundo" <?php if ($editar ==  true and $area = "Segundo") echo 'selected="selected"';?>>Segundo</option>
    <option value="Tercero" <?php if ($editar ==  true and $area = "Tercero") echo 'selected="selected"';?>>Tercero</option>
    <option value="Cuarto" <?php if ($editar ==  true and $area = "Cuarto") echo 'selected="selected"';?>>Cuarto</option>
    <option value="Quinto" <?php if ($editar ==  true and $area = "Quinto") echo 'selected="selected"';?>>Quinto</option>
    <option value="Sexto" <?php if ($editar ==  true and $area = "Sexto") echo 'selected="selected"';?>>Sexto</option>
    <option value="Septimo" <?php if ($editar ==  true and $area = "Septimo") echo 'selected="selected"';?>>Septimo</option>
    <option value="Octavo" <?php if ($editar ==  true and $area = "Octavo") echo 'selected="selected"';?>>Octavo</option>
    <option value="Noveno" <?php if ($editar ==  true and $area = "Noveno") echo 'selected="selected"';?>>Noveno</option>
    </select>
    </td>
  </tr>
  <tr>
    <td>Archivo <span id="max">(max. 100 caracteres)</span></td>
    <td>
    	<?php
		if ($editar == true) echo "<p>Nombre del archivo: ".$archivo2."</p>";
		?>
        <input name="archivo" type="file" tabindex="5" size="40">
    </td>
  </tr>
  <tr>
    <td colspan="2" align="center"><input name="enviar" type="submit" value="Enviar" tabindex="6" onClick="comprobar(this)" /><input name="action" type="hidden" value="upload" /></td>
  </tr>
</table>
</form>
<p><a href="up_file_alumno.php?accion=listar">Ver su lista de archivos subidos</a></p>
<div id="fileprogress"></div>
<pre><?php include("upload_files/test2.php"); ?></pre>
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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="adminvideo.css" rel="stylesheet" type="text/css" />
<title>Form_edit</title>
<script type="text/javascript" src="upload_files/LoadVars.js"><!--// http://www.devpro.it/javascript_id_92.html //--></script>
<script type="text/javascript" src="upload_files/BytesUploaded.js"><!--// http://www.devpro.it/javascript_id_96.html //--></script>
<script type="text/javascript">
	var bUploaded = new BytesUploaded('upload_files/whileuploading.php');
</script>
</head>

<body>
<?php
include("../catalogo/include/funciones_globales.php");
$conecta = conecta_bd("videoexpress");
extract($_REQUEST);
if(isset($_REQUEST['act'])) $msj = recibir_datos($op);
if($form == "link")
{
	if($op == "wl_vyg") $nombre_form = "vyglink";
	elseif($op == "wl_mea") $nombre_form = "mealink";
}
elseif($form == "archivo")
{
	if($op == "pr") $nombre_form = "praa";
	elseif($op == "vyg") $nombre_form = "vygaa";
}
?>
<div style="margin-top: 15px">
<form name="<?php echo $nombre_form ?>" method="post" action="" enctype="multipart/form-data">
<input type="hidden" id="act" name="act" value="1" />
<table width="70%" border="0" cellspacing="2" cellpadding="0" align="center">
<?php
if($msj == 1) $msj = '<img src="imagenes/info.png" width="48" height="48" align="absmiddle" /><span id="info">Los datos se actualizaron con exito<br />Por favor cierre esta ventana y recargue la p&aacute;gina</span>';
elseif($msj == 2 || $msj == NULL)
{
	if($msj == 2) $msj = "<div id=\"error2\"><img src=\"imagenes/error.png\" width=\"48\" height=\"48\" align=\"absmiddle\" /> Alg&uacute;n campo est&aacute; vac&iacute;o</span></div>";
	if($form == "link") formlink($nombre_form, $id);
	elseif($form == "archivo")
	{
		if($op == "pr") add_archivo_pr($nombre_form, $id);
		elseif($op == "vyg") add_archivo_vyg($nombre_form, $id);
		echo '<input name="action" type="hidden" value="upload" />';
	}
}
?>
</table>
<div id="fileprogress"></div><pre><?php include("upload_files/test2.php") ?></pre>
</form>
</div>
<?php
echo "<center>".$msj."</center>";
function pinta_ingresar($nombre_form)
{
	?>
    	<a href="javascript:document.<?php echo $nombre_form ?>.submit(bUploaded.start('fileprogress'))" style="border:1px">
			<div id="btn">
				<img src="imagenes/aceptar.png" width="25" height="25" border="0" align="left" alt="ingresar">
				<div id="texto">Ingresar</div>
			</div>
		</a>
	<?php
}

function pinta_limpiar($nombre_form)
{
	?>
    	<a href="javascript:document.<?php echo $nombre_form ?>.reset()">
			<div id="btn">
				<img src="imagenes/limpiar.png" width="25" height="25" border="0" align="left" alt="ingresar">
				<div id="texto">Limpiar</div>
			</div>
		</a>
	<?php
}

function formlink($nombre_form, $id)
{
	$nombre	= sel_items_form("weblinks", "nombre", "1;;;id_link='$id'");
	$link	= sel_items_form("weblinks", "link", "1;;;id_link='$id'");
	?>
		  <tr>
		    <td width="30%">Nombre</td>
		    <td width="30%"><input name="name_link" type="text" id="name_link" size="40" value="<?php echo $nombre[0] ?>" /></td>
            <td rowspan="3" width="60" align="center" valign="middle">
            	<?php
					if($nombre_form == "vyglink") $img = "index_r1_c4.png";
					elseif($nombre_form == "mealink") $img = "index_r2_c3.png";
                ?>
            	<img src="../portafolio/imagenes/<?php echo $img; ?>" width="150" height="120" />
            </td>
		  </tr>
		  <tr>
		    <td>Link http://www.</td>
		    <td><input name="dir_link" type="text" id="dir_link" size="40" value="<?php echo $link[0] ?>" /></td>
		  </tr>
		  <tr>
		    <td align="right"><?php pinta_ingresar($nombre_form); ?></td>
		    <td align="left"><?php pinta_limpiar($nombre_form); ?></td>
		  </tr>
    <?php
}

function add_archivo_vyg($nombre_form, $id)
{
	$titulo			= sel_items_form("videos_garabatos", "titulo", "1;;;id='$id'");
	$tema			= sel_items_form("videos_garabatos", "Tema", "1;;;id='$id'");
	$auditorio		= sel_items_form("videos_garabatos", "Auditorio", "1;;;id='$id'");
	$archivo		= sel_items_form("videos_garabatos", "Archivo", "1;;;id='$id'");
	$vx100			= sel_items_form("videos_garabatos", "valorx100", "1;;;id='$id'");
	$vx500			= sel_items_form("videos_garabatos", "valorx500", "1;;;id='$id'");
	$vx1000			= sel_items_form("videos_garabatos", "valorx1000", "1;;;id='$id'");
	$vx2000			= sel_items_form("videos_garabatos", "valorx2000", "1;;;id='$id'");
	$descripcion	= sel_items_form("videos_garabatos", "Descripcion", "1;;;id='$id'");
	?>
		<input type="hidden" id="swf_vyg" name="swf_vyg" value="<?php echo $archivo[0] ?>" />
	      <tr>
    	    <td width="50%">T&iacute;tulo</td>
        	<td><input name="titulo_vyg" type="text" id="titulo_vyg" size="40" value="<?php echo $titulo[0] ?>" /></td>
	      </tr>
          <tr>
    	    <td width="50%">Tema</td>
        	<td><input name="tema_vyg" type="text" id="tema_vyg" size="40" value="<?php echo $tema[0] ?>" /></td>
	      </tr>
          <tr>
    	    <td width="50%">Auditorio</td>
        	<td><input name="auditorio_vyg" type="text" id="auditorio_vyg" size="40" value="<?php echo $auditorio[0] ?>" /></td>
	      </tr>
    	  <tr>
        	<td>Archivo (.swf o .flv)</td>
	        <td>
            	Archivo: <?php echo $archivo[0] ?>
            	<input type="file" name="archivo_vyg" id="archivo_vyg" />
	            <br />Borrar archivo <input name="bvyg" type="checkbox" value="1" checked />
            </td>
    	  </tr>
	      <tr>
    	    <td>Valor por 100 unidades</td>
        	<td><input name="vx100_vyg" type="text" id="vx100_vyg" size="20" value="<?php echo $vx100[0] ?>" /></td>
	      </tr>
    	  <tr>
        	<td>Valor por 500 unidades</td>
	        <td><input name="vx500_vyg" type="text" id="vx500_vyg" size="20" value="<?php echo $vx500[0] ?>" /></td>
    	  </tr>
	      <tr>
    	    <td>Valor por 1000 unidades</td>
        	<td><input name="vx1000_vyg" type="text" id="vx1000_vyg" size="20" value="<?php echo $vx1000[0] ?>" /></td>
	      </tr>
    	  <tr>
        	<td>Valor por 2000 o m&aacute;s unidades</td>
	        <td><input name="vx2000_vyg" type="text" id="vx2000_vyg" size="20" value="<?php echo $vx2000[0] ?>" /></td>
    	  </tr>
	      <tr>
    	    <td valign="top">Descripci&oacute;n</td>
        	<td>
            	<textarea name="descripcion_vyg" cols="39" rows="5" id="descripcion_vyg"><?php echo utf8_encode($descripcion[0]) ?></textarea>
            </td>
	      </tr>
    	  <tr>
        	<td align="right"><?php pinta_ingresar($nombre_form); ?></td>
		    <td align="left"><?php pinta_limpiar($nombre_form); ?></td>
    	  </tr>
    <?php
}

function add_archivo_pr($nombre_form, $id)
{
	$titulo			= sel_items_form("radio", "Nombre", "1;;;id_radio='$id'");
	$archivo		= sel_items_form("radio", "Archivo", "1;;;id_radio='$id'");
	$imagen			= sel_items_form("radio", "Imagen", "1;;;id_radio='$id'");
	$descripcion	= sel_items_form("radio", "Descripcion", "1;;;id_radio='$id'");
	?>
		<input type="hidden" id="mp3_pr" name="mp3_pr" value="<?php echo $archivo[0] ?>" />
        <input type="hidden" id="img_pr" name="img_pr" value="<?php echo $imagen[0] ?>" />
	      <tr>
    	    <td width="50%" valign="top">T&iacute;tulo</td>
        	<td><input name="titulo_pr" type="text" id="titulo_pr" size="40" value="<?php echo $titulo[0] ?>" /></td>
	      </tr>
    	  <tr>
        	<td valign="top">Archivo (.mp3, .wma)</td>
	        <td>
            	MP3: <?php echo $archivo[0] ?>
            	<input type="file" name="archivo_pr" id="archivo_pr" />
                <br />Borrar archivo <input name="bpr_mp3" type="checkbox" value="1" checked />
            </td>
    	  </tr>
	      <tr>
    	    <td valign="top">Imagen (.jpg, .jpeg, .png)</td>
        	<td>
            	Imagen:  <?php echo $imagen[0] ?>
            	<input type="file" name="imagen_pr" id="imagen_pr" />
                <br />Borrar archivo <input name="bpr_img" type="checkbox" value="1" checked />
            </td>
	      </tr>
	      <tr>
    	    <td valign="top">Autores</td>
        	<td>
            	<textarea name="descripcion_pr" cols="39" rows="5" id="descripcion_pr"><?php echo $descripcion[0] ?></textarea>
            </td>
	      </tr>
    	  <tr>
        	<td align="right"><?php pinta_ingresar($nombre_form); ?></td>
		    <td align="left"><?php pinta_limpiar($nombre_form); ?></td>
    	  </tr>
    <?php
}

function recibir_datos($op)
{
	$id = $_REQUEST['id'];
	$msj = 0;
	if($op == "wl_vyg" || $op == "wl_mea")
	{
		$name_link		= $_REQUEST['name_link'];
		$dir_link		= $_REQUEST['dir_link'];
		if($name_link != NULL and $dir_link != NULL)
		{
			$conecta = conecta_bd("videoexpress");
			$datos = "nombre='$name_link', link='$dir_link'";
			act_datos_tabla("weblinks", $datos, "id_link=$id", 1);
			return $msj = 1;
		}
		else return $msj = 2;
	}
	elseif($op == "vyg")
	{
		$titulo_vyg = $_REQUEST['titulo_vyg'];
		$tema_vyg = $_REQUEST['tema_vyg'];
		$auditorio_vyg = $_REQUEST['auditorio_vyg'];
		$vx100_vyg = $_REQUEST["vx100_vyg"];
	    $vx500_vyg = $_REQUEST["vx500_vyg"];
        $vx1000_vyg = $_REQUEST["vx1000_vyg"];
	    $vx2000_vyg = $_REQUEST["vx2000_vyg"];
        $descripcion_vyg = utf8_decode($_REQUEST["descripcion_vyg"]);
		if ($_POST["action"] == "upload")
		{
			// obtenemos los datos del archivo 
		   	$tamano = $_FILES["archivo_vyg"]['size'];
		   	$tipo = $_FILES["archivo_vyg"]['type'];
	    	$archivo = $_FILES["archivo_vyg"]['name'];
			
			if ($archivo != "")
			{
				if ((strpos($archivo, "swf") || strpos($archivo, "flv")))
				{
					if(isset($_REQUEST['bvyg']) == 1) unlink("../videosygarabatos/".$_REQUEST['swf_vyg']);
        	       	// guardamos el archivo a la carpeta files
					$archivo = cadena_sin_tildes($archivo);
					$destino =  "../videosygarabatos/";
					$destino .= $archivo;
	    	    	if(copy($_FILES['archivo_vyg']['tmp_name'],$destino)) $status = 1;
				}
			}
			else
			{
				$archivo = $_REQUEST['swf_vyg'];
				$status = 1;
	    	}
			
			if($titulo_vyg != NULL and $vx100_vyg != NULL and $vx500_vyg != NULL and $vx1000_vyg != NULL and $vx2000_vyg != NULL and $descripcion_vyg != NULL and $archivo != NULL and $status == 1)
			{
				$conecta = conecta_bd("videoexpress");
				$datos = "titulo='$titulo_vyg', tema='$tema_vyg', auditorio='$auditorio_vyg', descripcion='$descripcion_vyg', ";
				$datos .= "Archivo='$archivo', valorx100='$vx100_vyg', valorx500='$vx500_vyg', ";
				$datos .= "valorx1000='$vx1000_vyg', valorx2000='$vx2000_vyg'";
				act_datos_tabla("videos_garabatos", $datos, "id=$id", 1);
				return $msj = 1;
			}
			else
			{
				return $msj = 2;
			}
		}
	}
	elseif($op == "pr")
	{
		$titulo_pr = $_REQUEST['titulo_pr'];
        $descripcion_pr = $_REQUEST["descripcion_pr"];
		$status = 0;
		if ($_REQUEST["action"] == "upload")
		{
			// obtenemos los datos del archivo 
			$tamano1 = $_FILES["archivo_pr"]['size'];
			$tipo1 = $_FILES["archivo_pr"]['type'];
			$archivo1 = $_FILES["archivo_pr"]['name'];
			// obtenemos los datos de la imagen
			$tamano2 = $_FILES["imagen_pr"]['size'];
			$tipo2 = $_FILES["imagen_pr"]['type'];
			$archivo2 = $_FILES["imagen_pr"]['name'];

			$error = 0;
		   	if ($archivo1 != "")
			{
				if ((strpos($archivo1, ".mp3") || strpos($archivo1, ".wma")))
				{
					if(isset($_REQUEST['bpr_mp3']) == 1) unlink("../radio/mp3/".$_REQUEST['mp3_pr']);
        	       	// guardamos el archivo a la carpeta files
					$archivo1 = cadena_sin_tildes($archivo1);
					$destino =  "../radio/mp3/";
					$destino .= $archivo1;
		        	if(copy($_FILES['archivo_pr']['tmp_name'],$destino)) $status = 1;
				}
				else $error += 1;
			}
			else
			{
				$archivo1 = $_REQUEST['mp3_pr'];
				$status = 1;
	    	}

			if ($archivo2 != "")
			{
				if (!(strpos($archivo2, ".jpg") || strpos($archivo2, ".png") || strpos($archivo2, ".jpeg"))) $error += 1;
				else
				{
					if(isset($_REQUEST['bpr_img']) == 1) unlink("../radio/covers/".$_REQUEST['img_pr']);
        	       	// guardamos el archivo a la carpeta files
					$archivo2 = cadena_sin_tildes($archivo2);
					$destino =  "../radio/covers/";
					$destino .= $archivo2;
	        		if(copy($_FILES['imagen_pr']['tmp_name'],$destino)) $status = 1;
				}
			}
			else
			{
				$archivo2 = $_REQUEST['img_pr'];
				$status = 1;
    		}

			if($titulo_pr != NULL and $descripcion_pr != NULL and $archivo1 != NULL and $archivo2 != NULL and $error < 1 and $status > 0)
			{
				$conecta = conecta_bd("videoexpress");
				$datos = "Nombre='$titulo_pr', Archivo='$archivo1', Imagen='$archivo2', Descripcion='$descripcion_pr'";
				act_datos_tabla("radio", $datos, "id_radio=$id", 1);
				return $msj = 1;
			}
			else
			{
				return $msj = 2;
			}
		}
		else
		{
			return $msj = 2;
		}
	}
}

function cadena_sin_tildes($nombre)
{
	$cadena_buscar['á'] = "a";
	$cadena_buscar['é'] = "e";
	$cadena_buscar['í'] = "i";
	$cadena_buscar['ó'] = "o";
	$cadena_buscar['ú'] = "u";
	$cadena_buscar['ñ'] = "n";
	$st = strtr($nombre, $cadena_buscar);
	return preg_replace("/ /","-",$st);
}
?>
</body>
</html>
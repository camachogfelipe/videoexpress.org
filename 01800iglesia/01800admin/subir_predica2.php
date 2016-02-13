<link href="estilo.css" rel="stylesheet" type="text/css" />
<?php
function carga_archivo($tipo, $id) {
	if(isset($_FILES['archivo']['name']) && $tipo != 'emisora')
	{
		//print_r($_FILES);
		$archivo['nombre'] = trim(str_replace(' ','',$_FILES['archivo']['name']));
		$dir = '../archivos_iglesias/audio_video/';
		if (!copy($_FILES['archivo']['tmp_name'], $dir.$archivo['nombre']))
		{
			$archivo['tipo'] = mime_content_type($dir.$archivo['nombre']);
			$archivo['tipo'] = explode("/", $_FILES['archivo']['type']);
			$archivo['tipo'] = $archivo['tipo'][0];
			echo "Tipo de archivo: ".$archivo['tipo'];
			$valido = false;
			if($archivo['tipo'] == 'application') {
				$archivo['tipo'] = explode("/", $_FILES['archivo']['type']);
				$archivo['tipo'] = $archivo['tipo'][1];
				if($archivo['tipo'] == 'octet-stream') $valido = true;
			}
			if($archivo['tipo'] == 'video') $valido = true;
			if($archivo['tipo'] == 'emisora') $valido = true;
			$size = $_FILES['archivo']['size'];
			$archivo['sizemb'] = number_format($size / 50331648, 2);
			if ($tipo == 'audio' and $archivo['tipo'] != 'audio') {
				unlink($dir.$archivo['nombre']);
				$mensaje = new mensajes_globales("El tipo de archivo no es de audio", 3);
				$mensaje->mostrar_mensaje(); form();
				exit();
			}		
			elseif ($tipo == 'video' and $valido == false) {
				unlink($dir.$archivo['nombre']);
				$mensaje = new mensajes_globales("El tipo de archivo no es de video.", 3);
				$mensaje->mostrar_mensaje(); form();
				exit();
			}
			$mensaje = new mensajes_globales("No se pudo copiar el archivo", 3);
			$mensaje->mostrar_mensaje(); form();
			exit();
		}
		else {
			echo "<p>";
			echo "<br />Nombre del archivo: ".$archivo['nombre'];
			echo "<br />Tipo del archivo: ".$archivo['tipo'];
			echo "<br />Tama&ntilde;o del archivo: ".$archivo['sizemb']." Megabytes";
			echo "</p>";
			return $archivo;
		}
	}
	else if($tipo != 'emisora'){
		$mensaje = new mensajes_globales("Debe enviar un archivo", 3);
		$mensaje->mostrar_mensaje(); form();
		exit();
	}	
}

// Script Que copia el archivo temporal subido al servidor en un directorio.
//recibimos las variables y definimos las faltantes
define( '_01800', 1 );
require_once("01800BD.php");
if(!empty($_GET['id'])) $id = $_GET['id'];
else $mensaje = new mensajes_globales("No se ha definido la iglesia", 3);
if(!empty($_POST['nombre_archivo'])) $nombre = htmlentities(trim($_POST['nombre_archivo']), ENT_QUOTES, 'UTF-8');
else { $mensaje = new mensajes_globales("Debe rellenar el campo t&iacute;tulo", 3); $mensaje->mostrar_mensaje(); exit(); }
$vid_tipo = "archivo";
if(!empty($_POST['tipo_archivo'])) {
	$tipo = $_POST['tipo_archivo'];
	if($tipo == "video" || $tipo == 'emisora') {
		if(!empty($_POST['tipo_video'])) {
			$tipo_video = htmlentities($_POST['tipo_video']);
			if($tipo_video == "link") {
				if($tipo == 'emisora')
				{
					$tipo = "E";
				}
				else
				{
					$tipo = "V";
				}
				$vid_tipo = "link";
				if(!empty($_POST['web'])) $archivo['nombre'] = $_POST['web'];
				else { $mensaje = new mensajes_globales("Debe rellenar el campo link", 3); $mensaje->mostrar_mensaje(); exit(); }
			}
			else {
				$archivo = carga_archivo($tipo, $id);
				$tipo = "V";
				if(empty($archivo['nombre']) && $tipo != 'emisora') {
					$mensaje = new mensajes_globales("Debe enviar un archivo", 3);
					$mensaje->mostrar_mensaje();
					unset($archivo); form();
					exit();
				}
			}
		}
		else { $mensaje = new mensajes_globales("Debe seleccionar el tipo de video", 3); $mensaje->mostrar_mensaje(); exit(); }
	}
	else {
		$archivo = carga_archivo($tipo, $id);
		$tipo = "A";
		if(empty($archivo['nombre']) && $tipo != 'emisora') {
			$mensaje = new mensajes_globales("Debe enviar un archivo", 3);
			$mensaje->mostrar_mensaje();
			unset($archivo); form();
			exit();
		}
	}
}
else { $mensaje = new mensajes_globales("Debe seleccionar un tipo de archivo", 3); $mensaje->mostrar_mensaje(); form(); exit(); }
//ejecutamos las operaciones de guardado
//
$bd = new BDManejo();
$bd->conecta();
$bd->tabla("audio_video");
$bd->columnas("igl_id, aud_vid_nombre, aud_vid_archivo, aud_vid_tipo, vid_tipo");
$bd->datos("'".$id."','".$nombre."','".$archivo['nombre']."','".$tipo."','".$vid_tipo."'");
$bd->insert();
$res = $bd->ejecutar_query();
if($res == 1) $mensaje = new mensajes_globales("Su archivo ha sido guardado con exito", 1);
else $mensaje = new mensajes_globales("Su archivo no ha sido guardado", 3);
$mensaje->mostrar_mensaje();
$bd->desconecta();
form();

function form() {
	echo "<br />";
	require_once("subir_predica.php");
	?>
	<script type="text/javascript">top.recargarm();</script>
	<?php
}
?>
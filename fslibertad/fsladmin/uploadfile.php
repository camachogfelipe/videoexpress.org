<link href="../admin.css" rel="stylesheet" type="text/css" />
<?php
// Script Que copia el archivo temporal subido al servidor en un directorio.
// Definimos Directorio donde se guarda el archivo
// Intentamos Subir Archivo
// (1) Comprovamos que existe el nombre temporal del archivo
echo '<span id="upload_div">';
if (isset($_FILES['file']['tmp_name']))
{
	require("funciones.php");
	$conecta = conecta_bd();
	$tipo = $_REQUEST['tipo'];
	$idproyecto = $_REQUEST['idproyecto'];
	$valor = remplazar($_FILES['file']['name']);
	if($tipo == "logo")
	{
		$allowedExtensions = array("jpg","jpeg","gif","png");
		$dir = '../proyectos/logos/';
		$col = "logo_proyecto";
	}
	elseif($tipo == "video")
	{
		$allowedExtensions = array("flv","avi","wmv","mov","mp4");
		$dir = '../proyectos/videos/';
		$col = "video";
	}
	elseif($tipo == "foto")
	{
		$allowedExtensions = array("jpg","jpeg","gif","png");
		$dir = '../proyectos/fotos/';
		$fotos .= dato_columna("proyectos", "fotos", "id_proyecto='$idproyecto'");
		if(!empty($fotos)) $valor = $fotos.",".$valor;
		$col = "fotos";
	}
	else { echo "Seleccione un tipo de archivo a subir"; exit(); }
	// (2) - Comprobamos que se trata de un archivo de imágen
	foreach ($_FILES as $file) {
		if($file['tmp_name'] > '') {
			if(!in_array(end(explode(".", strtolower($file['name']))),$allowedExtensions)) {
				die($file['name'].' es un tipo de archivo invalido!');
			}
			else $copiado = copiar($dir);
		}
	}
	if($copiado == true)
	{
		act_datos_tabla("proyectos", "$col='$valor'", "id_proyecto='$idproyecto'", 1);
	}
}
else echo 'El Archivo no ha llegado al Servidor.';
echo '</span>';

function copiar($dir)
{
	// (3) Por ultimo se intenta copiar el archivo al servidor.
	if (!copy($_FILES['file']['tmp_name'], $dir.remplazar($_FILES['file']['name'])))
	{
		echo 'Error al Subir el Archivo';
		return false;
	}
	else
	{
		echo 'Se ha subido el archivo con exito';
		return true;
	}
}
?>
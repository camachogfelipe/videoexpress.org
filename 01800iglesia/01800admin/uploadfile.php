<?php
if(isset($_REQUEST['op'])) $op = $_REQUEST['op'];
else $op = 1;
// Script Que copia el archivo temporal subido al servidor en un directorio.
$tipo = substr($_FILES['logo']['type'], 0, 5);
// Definimos Directorio donde se guarda el archivo
if($op == 1) $dir = '../archivos_iglesias/logos/';
else $dir = '../banner/';
// Intentamos Subir Archivo
// (1) Comprovamos que existe el nombre temporal del archivo
if (isset($_FILES['logo']['tmp_name']))
{
	// (2) - Comprovamos que se trata de un archivo de imágen
	if ($tipo == 'image')
	{
		// (3) Por ultimo se intenta copiar el archivo al servidor.
		if (!copy($_FILES['logo']['tmp_name'], $dir.$_FILES['logo']['name']))
			echo '<script> alert("Error al Subir el Archivo");</script>';
		else{
			if($op == 2) {
				define( '_01800', 1 );
				require_once("01800BD.php");
				$bd = new BDManejo();
				$bd->conecta();
				$bd->tabla("banner");
				$bd->columnas("ban_texto, ban_imagen");
				if($op == 2) $bd->datos("'".$_REQUEST['ban_texto']."','".$_FILES['logo']['name']."'");
				$bd->insert();
				echo '<link href="estilo.css" rel="stylesheet" type="text/css" />';
				if($bd->ejecutar_query()==1) $mensaje = new mensajes_globales("Se ha subido el archivo con exito", 1);
				else $mensaje = new mensajes_globales("No se ha subido el archivo", 3);
				$mensaje->mostrar_mensaje();
				$bd->libera();
				$bd->desconecta();
			}
			echo '<script>top.refrescar()</script>';
		}
	}
	else echo '<script> alert("El Archivo que se intenta subir NO ES del tipo Imagen.");</script>';
}
else echo '<script> alert("El Archivo no ha llegado al Servidor.");</script>'; 
?>
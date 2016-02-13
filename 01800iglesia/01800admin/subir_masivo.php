<?php
defined( '_01800' ) or die('Acceso no permitido');

//Clase de iglesia
class Subir_masivo {
	private $pag;
	private $bd;
	private $resultados;
	private $geografia;
	var $total;
	private $total_paginas;
	private $admin;
	var $id;
	private $form;
	private $mensajes;
	private $texto_busqueda;
	private $lugar_busqueda;
	var $nombre;
	
	//Función constructora
	function __construct($pag = 1) {
		$this->pag = $pag;
		if($this->pag < 1) $this->pag = 1;
		$this->admin = new Administracion();
		$this->bd = new BDManejo($this->pag);
		unset($this->bd->limite);
	}
	
	function form($op = NULL) {
		if(is_null($op)) :
			$this->mensajes = new mensajes_globales("Error al cargar la página", 1);
			$this->mensajes->mostrar_mensaje();
		else :
			if($op == 1) :
				require_once("forms/form_subir_masivo.html.php");
			elseif($op == 2) :
				require_once("forms/form_subir_masivo_b.html.php");
			elseif($op == 3) :
				$archivo = $this->carga_archivo();
				if($archivo !== false) :
					require_once("forms/form_subir_masivo2.html.php");
				else :
					$this->mensajes = new mensajes_globales("Error al cargar el archivo", 3);
					$this->mensajes->mostrar_mensaje();
				endif;
			elseif($op == 4) :
				//echo "<pre>";print_r($_POST);echo "</pre>";
				$dir = getcwd().'/archivos_cargue/';
				$archivo['ruta'] = $dir.$_POST['file'];
				echo '<h3 id="titulos">Procesando archivo: '.$_POST['file']."<h3>";
				$archivo['iglesia_ppal'] = explode("::", $_POST['iglesia_ppal']);
				echo '<h3 id="titulos">Cargando iglesias asociadas a la principal: '.$archivo['iglesia_ppal'][0]."</h3>";
				$archivo['iglesia_ppal'] = $archivo['iglesia_ppal'][1];
				if(!empty($archivo['iglesia_ppal'])) :
					if (($gestor = fopen($archivo['ruta'], "r")) !== FALSE) :
						$fila = 0;
						if(isset($_POST['cabeceras']) and $_POST['cabeceras'] == "S" and $fila > 0) :
							$fila = 1;
						endif;
						set_time_limit(0);
						while (($datos = fgetcsv($gestor, 0, ";")) !== FALSE) :
							ob_start();
							if($fila >= 1) :
								$this->bd->opciones("");
							  $this->bd->tabla("iglesias");
							  $this->bd->columnas("igl_nombre, igl_pastor_ppal, igl_rep_legal, igl_direccion, igl_telefono, igl_pbx, igl_celular, igl_email, 
																		 city_id, igl_web, igl_logo, igl_resolucion, igl_cuenta, igl_skype, usr_id, igl_actualizada, igl_sede");
							  $this->bd->datos("'".implode("','", $datos)."', '".$_SESSION['user_01800']."', NOW(), '".$archivo['iglesia_ppal']."'");
							  $this->bd->insert();
							  if($this->bd->ejecutar_query() == 1) $this->mensajes = new mensajes_globales("la iglesia ".$datos[0]." ha sido creada con exito", 1);
							  else $this->mensajes = new mensajes_globales("Se produjo un error", 2);
							  $this->mensajes->mostrar_mensaje();
							endif;
							$fila++;
							ob_end_flush();
						endwhile;
						fclose($gestor);
					endif;
				endif;
			elseif($op == 5) :
				$archivo = $this->carga_archivo();
				if($archivo !== false) :
					require_once("forms/form_subir_masivo2b.html.php");
				else :
					$this->mensajes = new mensajes_globales("Error al cargar el archivo", 3);
					$this->mensajes->mostrar_mensaje();
				endif;
			elseif($op == 6) :
				//echo "<pre>";print_r($_POST);echo "</pre>";
				$dir = getcwd().'/archivos_cargue/';
				$archivo['ruta'] = $dir.$_POST['file'];
				echo '<h3 id="titulos">Procesando archivo: '.$_POST['file']."<h3>";
				echo '<h3 id="titulos">Cargando iglesias de diferente denominación</h3>';
				if (($gestor = fopen($archivo['ruta'], "r")) !== FALSE) :
					$fila = 0;
					if(isset($_POST['cabeceras']) and $_POST['cabeceras'] == "S" and $fila > 0) :
						$fila = 1;
					endif;
					set_time_limit(0);
					while (($datos = fgetcsv($gestor, 0, ";")) !== FALSE) :
						ob_start();
						if($fila >= 1) :
							$this->bd->opciones("");
							$this->bd->tabla("iglesias");
							$this->bd->columnas("igl_nombre, igl_pastor_ppal, igl_rep_legal, igl_direccion, igl_telefono, igl_pbx, igl_celular, igl_email,
																	 city_id, igl_web, igl_logo, igl_resolucion, igl_cuenta, igl_mision, igl_vision, igl_credo, igl_historia, 
																	 igl_fecha_fundacion, igl_skype, usr_id, igl_actualizada");
							$this->bd->datos("'".implode("','", $datos)."', '".$_SESSION['user_01800']."', NOW()");
							$this->bd->insert();
							if($this->bd->ejecutar_query() == 1) $this->mensajes = new mensajes_globales("la iglesia ".$datos[0]." ha sido creada con exito", 1);
							else $this->mensajes = new mensajes_globales("Se produjo un error", 2);
							$this->mensajes->mostrar_mensaje();
						endif;
						$fila++;
						ob_end_flush();
					endwhile;
					fclose($gestor);
				endif;
			endif;
		endif;
	}
	
	function carga_archivo($tipo, $id) {
		if(isset($_FILES['archivo']['name']) && $tipo != 'emisora') :
			//echo "<pre>";
			//print_r($_FILES);
			$archivo['nombre'] = trim(str_replace(' ','',$_FILES['archivo']['name']));
			$dir = getcwd().'/archivos_cargue/';
			if (copy($_FILES['archivo']['tmp_name'], $dir.$archivo['nombre'])) :
				$archivo['error'] = $_FILES['archivo']['error'];
				if($archivo['error'] != 0) :
					return false;
				else :
					$archivo['extension'] = explode(".", $_FILES['archivo']['name']);
					$archivo['extension'] = $archivo['extension'][count($archivo['extension'])-1];
					if($archivo['extension'] != "csv") :
						return false;
					else:
						$archivo['ruta'] = $dir.$archivo['nombre'];
						$archivo['tipo'] = $_FILES['archivo']['type'];
						$size = $_FILES['archivo']['size'];
						$archivo['size'] = number_format($size / pow(1024, 2), 4, ",", ".");
						$archivo['sizeType'] = "MB";
						if($archivo['size'] < 1) :
							$archivo['size'] = number_format($size / 1024, 4, ",", ".");
							$archivo['sizeType'] = "KB";
							if($archivo['size'] < 100) :
								$archivo['size'] = number_format($size, 0, ",", ".");
								$archivo['sizeType'] = "BYTES";
							endif;
						endif;
						//print_r($archivo);
						$fila = 0;
						if (($gestor = fopen($archivo['ruta'], "r")) !== FALSE) :
							while (($datos = fgetcsv($gestor, 0, ";")) !== FALSE) :
								if(isset($_POST['cabeceras'])) $archivo['cabeceras'] = $_POST['cabeceras'];
								else $archivo['cabeceras'] = "N";
								if(isset($_POST['cabeceras']) and $_POST['cabeceras'] == "S" and $fila == 0) :
									$archivo['columnas_nombre'] = $datos;
								endif;
								if(isset($_POST['cabeceras']) and $_POST['cabeceras'] == "S" and $fila > 0) :
									$archivo['columnas'] = count($datos);
									$archivo['datos'][] = $datos;
								else :
									$archivo['columnas'] = count($datos);
								endif;
								$fila++;
							endwhile;
							fclose($gestor);
						endif;
						if(isset($_POST['cabeceras']) and $_POST['cabeceras'] == "S") :
							$fila = $fila - 1;
						endif;
						$archivo['filas'] = number_format($fila, 0, ",", ".");
						return $archivo;
					endif;
					unlink($archivo['ruta']);
				endif;
			else :
				return false;
			endif;
			echo "</pre>";
		endif;
	}
}
?>
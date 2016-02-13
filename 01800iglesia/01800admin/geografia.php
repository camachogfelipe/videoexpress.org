<?php
defined( '_01800' ) or die('Acceso no permitido');

//Clase de iglesia
class Geografia {
	private $pag;
	private $bd;
	private $resultados;
	private $admin;
	private $mensajes;
	private $language;
	
	//Función constructora
	function __construct($pag = 1) {
		$this->pag = $pag;
		if($this->pag < 1) $this->pag = 1;
		$this->admin = new Administracion();
		$this->bd = new BDManejo($this->pag);
		unset($this->bd->limite);
		$this->language = 7;
	}
	
	function crear_continente($op = NULL) {
		if(is_null($op)) :
			echo '<script type="text/javascript" src="../Scripts/jquery-ui/js/jquery-1.7.1.min.js"></script>'."\n";
			echo '<script type="text/javascript" src="../Scripts/jquery.form.js"></script>'."\n";
			echo '<script type="text/javascript" src="../Scripts/jquery.validate.js"></script>'."\n";
			echo '<script type="text/javascript" src="../Scripts/jquery.validate.additional-methods.js"></script>'."\n";
			echo '<script src="../Scripts/geografia.js"></script>';
			require_once("forms/crear_contiente.html.php");
		else :
			$spanish = trim(htmlentities($_POST['spanish']));
			$english = trim($_POST['english']);
			if(empty($spanish) || empty($english)) :
				echo '<script type="text/javascript" src="../Scripts/jquery-ui/js/jquery-1.7.1.min.js"></script>'."\n";
				echo '<script type="text/javascript" src="../Scripts/jquery.form.js"></script>'."\n";
				echo '<script type="text/javascript" src="../Scripts/jquery.validate.js"></script>'."\n";
				echo '<script type="text/javascript" src="../Scripts/jquery.validate.additional-methods.js"></script>'."\n";
				echo '<script src="../Scripts/geografia.js"></script>';
				require_once("forms/crear_contiente.html.php");
			else :
				//Guardar los datos
				$this->bd->tabla("continentes");
				$this->bd->datos("MAX(id) AS id");
				$this->bd->leer_datos();
				$this->resultados = $this->bd->array_asociativo();
				//echo "<pre>";print_r($this->resultados);echo "</pre><br>";
				$id = $this->resultados[0]['id'];
				$id = $id + 1;
				$this->bd->columnas("id, id_idioma, nombre");
				$this->bd->datos("'".$id."','3','".$english."'");
				$this->bd->insert();
				//$this->bd->mostrar_sql();
				$this->resultados = $this->bd->ejecutar_query();
				$this->bd->datos("'".$id."','7','".$spanish."'");
				$this->bd->insert();
				//echo "<br>";$this->bd->mostrar_sql();//exit;
				$this->resultados = $this->bd->ejecutar_query();
				$this->bd->desconecta();
				if($this->resultados == 1) {
					$this->mensajes = new mensajes_globales("El continente se ha creado con &eacute;xito.", 1);
					$this->mensajes->mostrar_mensaje();
				}
				else {
					$this->mensajes = new mensajes_globales("El continente no se ha podido crear.", 3);
					$this->mensajes->mostrar_mensaje();
				}
			endif;
		endif;
	}
	
	function crear_pais($op = NULL) {
		if(is_null($op)) :
			echo '<script type="text/javascript" src="../Scripts/jquery-ui/js/jquery-1.7.1.min.js"></script>'."\n";
			echo '<script type="text/javascript" src="../Scripts/jquery.form.js"></script>'."\n";
			echo '<script type="text/javascript" src="../Scripts/jquery.validate.js"></script>'."\n";
			echo '<script type="text/javascript" src="../Scripts/jquery.validate.additional-methods.js"></script>'."\n";
			echo '<script src="../Scripts/geografia.js"></script>';
			require_once("forms/crear_pais.html.php");
		else :
			$continente = trim($_POST['continente']);
			$spanish = trim(htmlentities($_POST['spanish']));
			$english = trim($_POST['english']);
			if(empty($spanish) || empty($english)) :
				echo '<script type="text/javascript" src="../Scripts/jquery-ui/js/jquery-1.7.1.min.js"></script>'."\n";
				echo '<script type="text/javascript" src="../Scripts/jquery.form.js"></script>'."\n";
				echo '<script type="text/javascript" src="../Scripts/jquery.validate.js"></script>'."\n";
				echo '<script type="text/javascript" src="../Scripts/jquery.validate.additional-methods.js"></script>'."\n";
				echo '<script src="../Scripts/geografia.js"></script>';
				require_once("forms/crear_pais.html.php");
			else :
				//Guardar los datos
				$this->bd->tabla("paises");
				$this->bd->datos("MAX(id) AS id");
				$this->bd->leer_datos();
				$this->resultados = $this->bd->array_asociativo();
				//echo "<pre>";print_r($this->resultados);echo "</pre><br>";
				$id = $this->resultados[0]['id'];
				$id = $id + 1;
				$this->bd->columnas("id, id_continente, id_idioma, nombre");
				$this->bd->datos("'".$id."', '".$continente."', '3','".$english."'");
				$this->bd->insert();
				//$this->bd->mostrar_sql();
				$this->resultados = $this->bd->ejecutar_query();
				$this->bd->datos("'".$id."','".$continente."','7','".$spanish."'");
				$this->bd->insert();
				//echo "<br>";$this->bd->mostrar_sql();//exit;
				$this->resultados = $this->bd->ejecutar_query();
				$this->bd->desconecta();
				if($this->resultados == 1) {
					$this->mensajes = new mensajes_globales("El pa&iacute;s se ha creado con &eacute;xito.", 1);
					$this->mensajes->mostrar_mensaje();
				}
				else {
					$this->mensajes = new mensajes_globales("El pa&iacute;s no se ha podido crear.", 3);
					$this->mensajes->mostrar_mensaje();
				}
			endif;
		endif;
	}
	
	function crear_region($op = NULL) {
		if(is_null($op)) :
			echo '<script type="text/javascript" src="../Scripts/jquery-ui/js/jquery-1.7.1.min.js"></script>'."\n";
			echo '<script type="text/javascript" src="../Scripts/jquery.form.js"></script>'."\n";
			echo '<script type="text/javascript" src="../Scripts/jquery.validate.js"></script>'."\n";
			echo '<script type="text/javascript" src="../Scripts/jquery.validate.additional-methods.js"></script>'."\n";
			echo '<script src="../Scripts/geografia.js"></script>';
			require_once("forms/crear_region.html.php");
		else :
			$continente = trim($_POST['continente']);
			$pais = trim($_POST['pais']);
			$spanish = trim(htmlentities($_POST['spanish']));
			$english = trim($_POST['english']);
			if(empty($spanish) || empty($english)) :
				echo '<script type="text/javascript" src="../Scripts/jquery-ui/js/jquery-1.7.1.min.js"></script>'."\n";
				echo '<script type="text/javascript" src="../Scripts/jquery.form.js"></script>'."\n";
				echo '<script type="text/javascript" src="../Scripts/jquery.validate.js"></script>'."\n";
				echo '<script type="text/javascript" src="../Scripts/jquery.validate.additional-methods.js"></script>'."\n";
				echo '<script src="../Scripts/geografia.js"></script>';
				require_once("forms/crear_region.html.php");
			else :
				//Guardar los datos
				$this->bd->tabla("regiones");
				$this->bd->datos("MAX(id) AS id");
				$this->bd->leer_datos();
				$this->resultados = $this->bd->array_asociativo();
				//echo "<pre>";print_r($this->resultados);echo "</pre><br>";
				$id = $this->resultados[0]['id'];
				$id = $id + 1;
				$this->bd->columnas("id, id_continente, id_pais, id_idioma, nombre");
				$this->bd->datos("'".$id."','".$continente."','".$pais."','3','".$english."'");
				$this->bd->insert();
				//$this->bd->mostrar_sql();
				$this->resultados = $this->bd->ejecutar_query();
				$this->bd->datos("'".$id."','".$continente."','".$pais."','7','".$spanish."'");
				$this->bd->insert();
				//echo "<br>";$this->bd->mostrar_sql();//exit;
				$this->resultados = $this->bd->ejecutar_query();
				$this->bd->desconecta();
				if($this->resultados == 1) {
					$this->mensajes = new mensajes_globales("El departamento y/o regi&oacute; se ha creado con &eacute;xito.", 1);
					$this->mensajes->mostrar_mensaje();
				}
				else {
					$this->mensajes = new mensajes_globales("El departamento y/o regi&oacute; no se ha podido crear.", 3);
					$this->mensajes->mostrar_mensaje();
				}
			endif;
		endif;
	}
	
	function crear_ciudad($op = NULL) {
		if(is_null($op)) :
			echo '<script type="text/javascript" src="../Scripts/jquery-ui/js/jquery-1.7.1.min.js"></script>'."\n";
			echo '<script type="text/javascript" src="../Scripts/jquery.form.js"></script>'."\n";
			echo '<script type="text/javascript" src="../Scripts/jquery.validate.js"></script>'."\n";
			echo '<script type="text/javascript" src="../Scripts/jquery.validate.additional-methods.js"></script>'."\n";
			echo '<script src="../Scripts/geografia.js"></script>';
			require_once("forms/crear_ciudad.html.php");
		else :
			$continente = trim($_POST['continente']);
			$pais = trim($_POST['pais']);
			$ciudad = trim($_POST['region']);
			$spanish = trim(htmlentities($_POST['spanish']));
			$english = trim($_POST['english']);
			if(empty($spanish) || empty($english)) :
				echo '<script type="text/javascript" src="../Scripts/jquery-ui/js/jquery-1.7.1.min.js"></script>'."\n";
				echo '<script type="text/javascript" src="../Scripts/jquery.form.js"></script>'."\n";
				echo '<script type="text/javascript" src="../Scripts/jquery.validate.js"></script>'."\n";
				echo '<script type="text/javascript" src="../Scripts/jquery.validate.additional-methods.js"></script>'."\n";
				echo '<script src="../Scripts/geografia.js"></script>';
				require_once("forms/crear_ciudad.html.php");
			else :
				//Guardar los datos
				$this->bd->tabla("localidades");
				$this->bd->datos("MAX(id) AS id");
				$this->bd->leer_datos();
				$this->resultados = $this->bd->array_asociativo();
				//echo "<pre>";print_r($this->resultados);echo "</pre><br>";
				$id = $this->resultados[0]['id'];
				$id = $id + 1;
				$this->bd->columnas("id, id_continente, id_pais, id_region, id_idioma, nombre");
				$this->bd->datos("'".$id."','".$continente."','".$pais."','".$ciudad."','3','".$english."'");
				$this->bd->insert();
				//$this->bd->mostrar_sql();
				$this->resultados = $this->bd->ejecutar_query();
				$this->bd->datos("'".$id."','".$continente."','".$pais."','".$ciudad."','7','".$spanish."'");
				$this->bd->insert();
				//echo "<br>";$this->bd->mostrar_sql();//exit;
				$this->resultados = $this->bd->ejecutar_query();
				$this->bd->desconecta();
				if($this->resultados == 1) {
					$this->mensajes = new mensajes_globales("La ciudad y/o municipio se ha creado con &eacute;xito.", 1);
					$this->mensajes->mostrar_mensaje();
				}
				else {
					$this->mensajes = new mensajes_globales("La ciudad y/o municipio no se ha podido crear.", 3);
					$this->mensajes->mostrar_mensaje();
				}
			endif;
		endif;
	}
	
	function buscar($op = NULL) {
		if(is_null($op)) :
			echo '<script type="text/javascript" src="../Scripts/jquery-ui/js/jquery-1.7.1.min.js"></script>'."\n";
			echo '<script type="text/javascript" src="../Scripts/jquery.form.js"></script>'."\n";
			echo '<script type="text/javascript" src="../Scripts/jquery.validate.js"></script>'."\n";
			echo '<script type="text/javascript" src="../Scripts/jquery.validate.additional-methods.js"></script>'."\n";
			echo '<script src="../Scripts/geografia.js"></script>';
			require_once("forms/buscar_geografia.html.php");
		else :
			$termino = trim($_POST['termino']);
			$buscar_en = $_POST['buscar_en'];
			//echo "<pre>";print_r($_POST['buscar_en']);echo "buscar_en";print_r($buscar_en);echo "</pre>";exit;
			if(empty($termino) || empty($buscar_en)) :
				echo '<script type="text/javascript" src="../Scripts/jquery-ui/js/jquery-1.7.1.min.js"></script>'."\n";
				echo '<script type="text/javascript" src="../Scripts/jquery.form.js"></script>'."\n";
				echo '<script type="text/javascript" src="../Scripts/jquery.validate.js"></script>'."\n";
				echo '<script type="text/javascript" src="../Scripts/jquery.validate.additional-methods.js"></script>'."\n";
				echo '<script src="../Scripts/geografia.js"></script>';
				require_once("forms/buscar_geografia.html.php");
			else :
				//Busqueda de continentes
				$conteo = 0;
				if(in_array('continente', $buscar_en)) :
					$this->bd->tabla("continentes");
					$this->bd->datos("DISTINCT(id) as id, nombre");
					$opciones .= "WHERE nombre REGEXP LOWER('".$termino."') ";
					$opciones .= "ORDER BY continentes.nombre";
					$this->bd->opciones($opciones);
					$this->bd->leer_datos();
					$this->resultados['continentes'] = $this->bd->array_asociativo();
					$conteo += count($this->resultados['continentes']);
				endif;
				//Busqueda de paises
				if(in_array('pais', $buscar_en)) :
					$this->bd->tabla("paises");
					$this->bd->datos("DISTINCT(paises.id) as id, paises.id_continente, paises.nombre AS nombre, continentes.nombre AS continente_nombre");
					$opciones = "INNER JOIN continentes ON paises.id_continente=continentes.id ";
					$opciones .= "WHERE paises.nombre REGEXP LOWER('".$termino."') ";
					$opciones .= "ORDER BY paises.nombre, continentes.nombre";
					$this->bd->opciones($opciones);
					$this->bd->leer_datos();
					$this->resultados['paises'] = $this->bd->array_asociativo();
					$conteo += count($this->resultados['paises']);
				endif;
				//Busqueda de departamentos
				if(in_array('depto', $buscar_en)) :
					$this->bd->tabla("regiones");
					$this->bd->datos("DISTINCT(regiones.id) AS id, regiones.id_continente, regiones.id_pais, regiones.nombre AS nombre, 
														continentes.nombre AS continente_nombre, paises.nombre AS pais_nombre");
					$opciones = "INNER JOIN paises ON regiones.id_pais=paises.id ";
					$opciones .= "INNER JOIN continentes ON paises.id_continente=continentes.id ";
					$opciones .= "WHERE regiones.nombre REGEXP LOWER('".$termino."') ";
					$opciones .= "ORDER BY regiones.nombre, paises.nombre, continentes.nombre";
					$this->bd->opciones($opciones);
					$this->bd->leer_datos();
					$this->resultados['deptos'] = $this->bd->array_asociativo();
					$conteo += count($this->resultados['deptos']);
				endif;
				//Busqueda de ciudades
				if(in_array('ciudad', $buscar_en)) :
					$this->bd->tabla("localidades");
					$this->bd->datos("DISTINCT(localidades.id) AS id, localidades.id_continente, localidades.id_pais, localidades.id_region, localidades.nombre AS nombre,
														continentes.nombre AS continente_nombre, paises.nombre AS pais_nombre, regiones.nombre AS region_nombre");
					$opciones = "INNER JOIN regiones ON localidades.id_region=regiones.id ";
					$opciones .= "INNER JOIN paises ON regiones.id_pais=paises.id ";
					$opciones .= "INNER JOIN continentes ON paises.id_continente=continentes.id ";
					$opciones .= "WHERE localidades.nombre REGEXP LOWER('".$termino."') ";
					$opciones .= "ORDER BY localidades.nombre, regiones.nombre, paises.nombre, continentes.nombre";
					$this->bd->opciones($opciones);
					$this->bd->leer_datos();
					$this->resultados['ciudades'] = $this->bd->array_asociativo();
					$conteo += count($this->resultados['ciudades']);
				endif;
				$this->bd->desconecta();
				//echo "conteo = ".$conteo;
				//echo "<pre>";print_r($this->resultados);echo "</pre>";exit;
				if($conteo >= 1) {
					$this->mensajes = new mensajes_globales("Se encontraron ".$conteo." resultados", 1);
					$this->mensajes->mostrar_mensaje();
					require_once("forms/resultados_geografia.html.php");
				}
				else {
					$this->mensajes = new mensajes_globales("No se encontraron resultados con la palabra <b>".$termino."</b>.", 3);
					$this->mensajes->mostrar_mensaje();
				}
			endif;
		endif;
	}
}
?>
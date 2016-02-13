<?php
defined("_01800") or die("Acceso no permitido");

class BDManejo {
	private $usuario;
	private $clave;
	private $servidor;
	private $base_datos;
	private $tabla;
	private $columnas;
	private $datos;
	private $opciones;
	private $sql;
	private $resultados;
	private $res = NULL;
	private $conecto;
	private $tipo;
	private $pag;
	var $limite;
	
	function __construct($pag = 1) {
		$this->libera();
		if(empty($this->usuario)) {
			$this->usuario = "root";
			$this->clave = "camachitos";
			$this->servidor = "localhost";
			$this->base_datos = "01800iglesia";
			/*$this->usuario = "iglesia0_admin";
			$this->clave = "01800iglesia.org.manuelobando";
			$this->servidor = "localhost";
			$this->base_datos = "iglesia0_01800iglesia";*/
		}
		unset($this->conecto);
		$this->pag = $pag;
		$this->datos = "*";
		//$this->limite = (($this->pag - 1) * 20).",20";
	}
	
	function tabla($tabla) {
		return $this->tabla = $tabla;
	}
	
	function datos($datos) {
		return $this->datos = $datos;
	}
	
	function columnas($columnas) {
		return $this->columnas = $columnas;
	}
	
	function opciones($opciones) {
		return $this->opciones = $opciones;
	}
	
	function limite($pag = NULL, $lim) {
		if(empty($pag)) $this->limite = $lim;
		else {
			if($pag > 1000) $pag = 1000;
			elseif($pag < 0) $pag = 0;
			$this->limite = (($pag - 1) * $lim).",".$lim;
		}
	}
	
	function conecta(){
		$this->conecto = mysql_connect($this->servidor, $this->usuario, $this->clave);
	    mysql_select_db($this->base_datos) or die("La base de datos no existe");
		return $this->conecto;
	}
	
	function desconecta() {
		$this->libera();
		mysql_close($this->conecto);		
		unset($this->conecto);
	}
	
	function insert() {
		$this->sql = "INSERT INTO ".$this->tabla."(".$this->columnas.") VALUES (".$this->datos.")";
		//if(!empty($this->opciones)) $this->sql .= " ".$this->opciones;
	}
	
	function replace() {
		$this->sql = "INSERT INTO ".$this->tabla."(".$this->columnas.") VALUES (".$this->datos.")";
		if(!empty($this->opciones)) $this->sql .= " ".$this->opciones;
	}
	
	function actualiza() {
		$this->sql = "UPDATE ".$this->tabla." SET ".$this->datos;
		if(!empty($this->opciones)) $this->sql .= " ".$this->opciones;
	}
	
	function eliminar() {
		$this->sql = "DELETE FROM ".$this->tabla;
		if(!empty($this->opciones)) $this->sql .= " ".$this->opciones;
	}
	
	function leer_datos() {
		$this->sql = "SELECT ".$this->datos." FROM ".$this->tabla;
		if(!empty($this->opciones)) $this->sql .= " ".$this->opciones;
		if(!empty($this->limite)) $this->sql .= " LIMIT ".$this->limite;
	}
	
	function total_resultados() {
		if(!empty($this->resultados)) return mysql_num_rows($this->resultados);
		else return $this->resultados = true;
	}
	
	function ejecutar_query() {
		unset($this->resultados);
		unset($this->res);
		mysql_set_charset('utf8');
		return $this->resultados = mysql_query($this->sql) or die("".$this->sql.",".mysql_error());
	}
	
	function array_array($tipo = NULL) {
		$this->conecta();
		$this->ejecutar_query();
		$this->res = NULL;
		if(!empty($this->resultados)) {
			switch($tipo) {
				case 1 : while($row = mysql_fetch_array($this->resultados, MYSQL_NUM)) $this->res[] = $row;
						 break;
				case 2 : while($row = mysql_fetch_array($this->resultados, MYSQL_ASSOC)) $this->res[] = $row;
						 break;
				case 3 : while($row = mysql_fetch_array($this->resultados, MYSQL_BOTH)) $this->res[] = $row;
						 break;
				default : while($row = mysql_fetch_array($this->resultados, MYSQL_BOTH)) $this->res[] = $row;
						  break;
			}
			return $this->res;
		}
	}
	
	function array_asociativo() {
		$this->conecta();
		$this->ejecutar_query();
		$this->res = NULL;
		if(!empty($this->resultados)) {
			while($row = mysql_fetch_assoc($this->resultados)) $this->res[] = $row;
			return $this->res;
		}
		else return $this->res;
	}
	
	function array_objetos() {
		$this->conecta();
		$this->ejecutar_query();
		$this->res = NULL;
		if(!empty($this->resultados)) {
			while($row = mysql_fetch_object($this->resultados)) $this->res[] = $row;
			return $this->res;
		}
	}
	
	function array_numerico() {
		$this->conecta();
		$this->ejecutar_query();
		$this->res = NULL;
		if(!empty($this->resultados)) {
			while($row = mysql_fetch_row($this->resultados)) $this->res[] = $row;
			return $this->res;
		}
	}
	
	function dato_unico() {
		$this->leer_datos();
		$this->res = $this->array_numerico();
		$this->res = $this->res[0][0];
		return $this->res;
	}
	
	function fila_unica() {
		$this->leer_datos();
		$this->res = $this->array_asociativo();
		$this->res = $this->res[0];
		return $this->res;
	}
	
	function libera() {
		unset($this->usuario);
		unset($this->clave);
		unset($this->servidor);
		unset($this->base_datos);
		unset($this->tabla);
		unset($this->columnas);
		unset($this->datos);
		unset($this->opciones);
		unset($this->sql);
		unset($this->resultados);
		unset($this->res);
		unset($this->tipo);
		unset($this->pag);
		unset($this->limite);
	}
	
	function ultimo_id() {
		return mysql_insert_id();
	}
	
	function mostrar_sql() {
		echo $this->sql;
	}
}

class mensajes_globales {
	private $imagen;
	private $mensaje;
	private $msg;
	private $i = 1;
	private $l = "admin";
	
	function __construct($mensaje, $i, $l = "admin") {
		unset($this->mensaje);
		if(!empty($mensaje)) $this->mensaje = $mensaje;
		if(!empty($i)) $this->i = $i;
		else $this->i = 1;
		if(!empty($l)) $this->l = $l;
		
		switch($this->i){
			case 1 : $this->tipo = "info";
					 $this->info();
					 break;
			case 2 : $this->tipo = "alerta";
					 $this->alerta();
					 break;
			case 3 : $this->tipo = "error";
					 $this->error();
					 break;
		}
		$this->armar_mensaje();
	}
	
	function info(){
		$this->imagen = "info48x48.png";
	}
	
	function alerta(){
		$this->imagen = "alerta48x48.png";
	}
	
	function error(){
		$this->imagen = "error48x48.png";
	}
	
	function armar_mensaje() {
		$this->msg = '<div id="'.$this->tipo.'">';
		$servidor = $_SERVER['HTTP_REFERER'];
		$pos = strpos($servidor, "?");
		if($pos !== false) :
			$servidor = mb_substr($servidor, 0, $pos);
		endif;
		$pos = mb_stripos($servidor, "01800admin");
		if($pos !== false) :
			$servidor = mb_substr($servidor, 0, $pos-1);
		endif;
		if($this->l == "admin") $this->msg .= '<img src="'.$servidor.'/imagenes/mensajes/'.$this->imagen.'" align="absmiddle"> '."\n";
		elseif($this->l == "noadmin") $this->msg .= '<img src="'.$servidor.'imagenes/mensajes/'.$this->imagen.'" align="absmiddle"> '."\n";
		$this->msg .= $this->mensaje."\n";
		$this->msg .= '</div>';
	}
	
	function mostrar_mensaje() {
		echo $this->msg;
	}
}
?>
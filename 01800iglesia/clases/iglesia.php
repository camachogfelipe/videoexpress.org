<?php
class igl_msg {
	private $e;
	private $post;
	private $resultados;
	private $bd;
	
	function __construct($e=false) {
		$this->e = $e;
		$this->bd = new BDManejo();
		$this->controlador();
	}
	
	function controlador() {
		foreach($_REQUEST as $key=>$value) $this->post[$key] = trim(htmlentities($value, ENT_QUOTES, "UTF-8"));
		if($this->e === false) require_once("forms/igl_msg.php");
		elseif($this->e == true) {
			$this->bd->tabla("contactenos");
			$this->bd->columnas("con_nombre, con_email, con_motivo, con_mensaje, igl_id");
			$this->bd->datos("'".$this->post['nombre_completo']."', '".$this->post['mail']."', '".$this->post['motivo']."', '"
							 .$this->post['asunto']."', '".$this->post['igl']."'");
			$this->bd->insert();
			if($this->bd->ejecutar_query()==true) $mensaje = new mensajes_globales("Se ha enviado el mensaje", 1, "noadmin");
			else $mensaje = new mensajes_globales("No se ha enviado el mensaje", 2, "noadmin");
			$mensaje->mostrar_mensaje();
		}
	}
}

class igl_act {
	private $e;
	private $post;
	private $resultados;
	private $bd;
	
	function __construct($e=false) {
		$this->e = $e;
		$this->bd = new BDManejo();
		$this->controlador();
	}
	
	function controlador() {
		foreach($_REQUEST as $key=>$value) $this->post[$key] = trim(htmlentities($value, ENT_QUOTES, "UTF-8"));
		if($this->e === false) {
			$this->bd->tabla("iglesias");
			$this->bd->datos("*");
			$this->bd->opciones("WHERE igl_id='".$this->post['igl']."'");
			$this->resultados = $this->bd->fila_unica();
			require_once("forms/igl_act.php");
		}
		elseif($this->e == true) {
			$this->bd->tabla("solicitudes_sugerencias");
			$this->bd->columnas("igl_id, sol_sug_nombre, sol_sug_pastor, sol_sug_direccion, sol_sug_telefono, sol_sug_pbx, sol_sug_celular, 
								sol_sug_email, sol_sug_web, sol_sug_tipo, sol_sug_ins_nombre, sol_sug_ins_email, sol_sug_ins_telefono, 
								sol_sug_ins_skype, sol_sug_ins_msn");
			$this->bd->datos("'".$this->post['igl']."', '".$this->post['nombre_iglesia']."', '".$this->post['pastor']."', '"
							 .$this->post['direccion']."', '".$this->post['telefono']."', '".$this->post['pbx']."', '".$this->post['celular']."', '"
							 .$this->post['mail']."', '".$this->post['web']."', 'sug', '"
							 .$this->post['nombre_inscribe']."', '".$this->post['mail_inscribe']."', '".$this->post['tel_inscribe']
							 ."', '".$this->post['skype']."', '".$this->post['msn']."'");
			$this->bd->insert();
			if($this->bd->ejecutar_query()==true) $mensaje = new mensajes_globales("Se ha enviado la sugerencia", 1, "noadmin");
			else $mensaje = new mensajes_globales("No se ha enviado la sugerencia, vuelva a intentarlo m&aacute;s tarde por favor.", 2, "noadmin");
			$mensaje->mostrar_mensaje();
		}
	}
}

class igl_ins {
	private $e;
	private $post;
	private $resultados;
	private $bd;
	private $geo;
	
	function __construct($e=false) {
		$this->e = $e;
		$this->bd = new BDManejo();
		$this->geo = new Administracion();
		$this->controlador();
	}
	
	function controlador() {
		foreach($_REQUEST as $key=>$value) $this->post[$key] = trim(htmlentities($value, ENT_QUOTES, "UTF-8"));
		if($this->e === false) require_once("forms/igl_ins.php");
		elseif($this->e == "geo") {
			$this->geo->carga_geolocalizacion($this->post['tabla'], $this->post['id_geo']);
			$this->geo->mostrar_select_geolocalizacion();
		}
		elseif($this->e == true) {
			$this->bd->tabla("solicitudes_sugerencias");
			$this->bd->columnas("sol_sug_nombre, sol_sug_pastor, sol_sug_telefono, sol_sug_pbx, sol_sug_celular, city_id, sol_sug_email, sol_sug_tipo, 
								sol_sug_credo, sol_sug_ins_nombre, sol_sug_ins_email, sol_sug_ins_telefono, sol_sug_ins_skype, sol_sug_ins_msn");
			$this->post['credo'] = $this->post['p1']."::";
			$this->post['credo'] .= $this->post['p2']."::";
			$this->post['credo'] .= $this->post['p3']."::";
			$this->post['credo'] .= $this->post['p4']."::\n";
			$this->post['credo'] .= nl2br($this->post['p5'])."\n";
			$this->bd->datos("'".$this->post['nombre_iglesia']."', '".$this->post['pastor']."', '".$this->post['telefono']."', '"
							 .$this->post['pbx']."', '".$this->post['celular']."', '".$this->post['ciudad']."', '".$this->post['email']."', 'sol', '"
							 .$this->post['credo']."', '".$this->post['nombre_inscribe']."', '".$this->post['mail_inscribe']."', '"
							 .$this->post['tel_inscribe']."', '".$this->post['skype']."', '".$this->post['msn']."'");
			$this->bd->insert();
			if($this->bd->ejecutar_query()==true) $mensaje = new mensajes_globales("Se ha preinscrito la iglesia", 1, "noadmin");
			else $mensaje = new mensajes_globales("No se ha preinscrito la iglesia, vuelva a intentarlo m&aacute;s tarde por favor.", 2, "noadmin");
			$mensaje->mostrar_mensaje();
		}
	}
}
?>
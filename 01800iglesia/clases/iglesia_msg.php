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
		foreach($_REQUEST as $key=>$value) $this->post[$key] = trim(htmlentities($value));
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
?>
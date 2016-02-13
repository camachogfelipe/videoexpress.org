<?php

class Recordacion {
	private $bd;
	private $res;
	private $captcha;
	private $captchaImage;
	private $post;
	
	function __construct() {
		$this->limpiar_variables();
		$this->bd = new BDManejo();
	}
	
	function solicito_usuario() {
		$this->limpiar_variables();
		require_once("recordacion.form.php");
	}
	
	function confirmo_usuario() {
		//recibo variables, que vengan del formulario y del sitio
		foreach($_REQUEST as $key=>$value) $this->post[$key] = $value;
		if(!empty($this->post['captcha'])) $this->post['captcha'] = md5($this->post['captcha']);
		require_once("cabecera.html.php");
		if($this->comprobar_email() == 1 and $this->post['form'] == "recordacion_usuario" and $this->post['captcha'] == $_SESSION['key']) {
			$this->post['token'] = $this->post['captcha'];
			unset($this->post['captcha']);
			$this->bd->tabla("usuarios");
			$this->bd->datos("usuarios.usr_id, usr_login, pusr_email");
			$this->bd->opciones("INNER JOIN profile_usuario ON usuarios.usr_id=profile_usuario.usr_id
								 WHERE usuarios.usr_login = '".$this->post['usrname']."' AND usuarios.usr_status='A'");
			$this->res = $this->bd->fila_unica();
			if(!empty($this->res)) {
				$link = "http://www.01800iglesia.org/01800admin/recordacion.php?op=2&usr=".$this->res['usr_login']."&tok=".$this->post['token']."&refer=".$this->res['usr_id'];
				$asunto = "Nueva contrase&ntilde;a de 01800Iglesia.org";
				$cuerpo = "Su ha enviado un correo a su cuenta para confirmar la recordación de la contraseña. Por favor de click al enlace que se le ha enviado en este correo y siga los pasos.<p>Administraci&oacute;n VideoExpress.org</p><a href=\"".$link."\">".$link."</a>";
				$headers = "X-Mailer:PHP/".phpversion()."\n"; $headers .= "Mime-Version: 1.0\n"; $headers .= "Content-Type: text/html; charset=utf-8\n";
				if(mail($this->res['pusr_email'], $asunto, $cuerpo, $headers)) {
					$this->bd->datos("usr_token='".$this->post['token']."', usr_status='I'");
					$this->bd->opciones("WHERE usr_id='".$this->res['usr_id']."'");
					$this->bd->actualiza();
					$this->bd->ejecutar_query();
					$this->mensaje = new mensajes_globales("Se ha enviado un correo electrónico a su cuenta registrada, por favor ingrese y siga las instrucciones que se le enviaron. Gracias", 1, "admin");
				}
				else $this->mensaje = new mensajes_globales("El mail no ha podido ser enviado, por favor intentelo más tarde.", 1, "admin");
			}
			else $this->mensaje = new mensajes_globales("El nombre de usuario no existe", 3, "admin");
		}
		else {
			$this->mensaje = new mensajes_globales("Por favor ingrese los datos correctamente", 3, "admin");
		}
		$this->mensaje->mostrar_mensaje();
		echo "</body></html>";
	}
	
	function form_cambio_pass() {
		foreach($_REQUEST as $key=>$value) $this->post[$key] = $value;
		$this->bd->tabla("usuarios");
		$this->bd->datos("usr_id");
		$this->bd->opciones("WHERE usr_login = '".$this->post['usr']."' AND usr_token='".$this->post['tok']."' 
							 AND usr_id='".$this->post['refer']."' AND usr_status='I'");
		$this->res = $this->bd->dato_unico();
		if(!empty($this->res)) require_once("cambio_clave.form.php");
	}
	
	function habilito_usuario() {
		foreach($_REQUEST as $key=>$value) $this->post[$key] = $value;
		if(!empty($this->post['captcha'])) $this->post['captcha'] = md5($this->post['captcha']);
		if(!empty($this->post['clave1'])) $this->post['clave1'] = md5($this->post['clave1']);
		if(!empty($this->post['clave2'])) $this->post['clave2'] = md5($this->post['clave2']);
		if($this->post['form'] == "recordacion_usuario" and !empty($this->post['usrmail']) and !empty($this->post['refer']) and 
		   !empty($this->post['clave1']) and !empty($this->post['clave2']) and !empty($this->post['captcha']) and 
		   $this->post['clave1'] == $this->post['clave2'] and $this->post['captcha'] == $_SESSION['key']) {
			$this->bd->tabla("usuarios");
			$this->bd->datos("usr_id");
			$this->bd->opciones("WHERE usr_login = '".$this->post['usrmail']."' AND usr_token='".$this->post['tok']."' 
								 AND usr_id='".$this->post['refer']."' AND usr_status='I'");
			$this->res = $this->bd->dato_unico();
			if($this->post['usr'] == $this->res) {
				$this->bd->datos("usr_token='0', usr_status='A', usr_clave='".$this->post['clave1']."'");
				$this->bd->opciones("WHERE usr_id='".$this->res."'");
				$this->bd->actualiza();
				$this->bd->ejecutar_query();
				$this->mensaje = new mensajes_globales("Se ha cambiado la contraseña con éxito. Regrese al panel de ingreso e ingrese con la nueva contraseña", 1, "admin");
			}
			else $this->mensaje = new mensajes_globales("Por favor llene todos los campos correctamente", 3, "admin");
	   }
	   else $this->mensaje = new mensajes_globales("Por favor llene todos los campos", 3, "admin");
	   $this->mensaje->mostrar_mensaje();
	}
	
	private function limpiar_variables() {
		unset($this->bd);
		unset($this->captcha);
		unset($this->res);
	}
	
	private function comprobar_email() {
		$mail_correcto = 0;
		//compruebo unas cosas primeras
		if((strlen($this->post['usrname']) >= 6) && (substr_count($this->post['usrname'],"@") == 1) && 
		   (substr($this->post['usrname'],0,1) != "@") && (substr($this->post['usrname'],strlen($this->post['usrname'])-1,1) != "@")) {
			if ((!strstr($this->post['usrname'],"'")) && (!strstr($this->post['usrname'],"\"")) && 
		   	   (!strstr($this->post['usrname'],"\\")) && (!strstr($this->post['usrname'],"\$")) && 
			   (!strstr($this->post['usrname']," "))) {
					//miro si tiene caracter.
					if (substr_count($this->post['usrname'],".")>= 1) {
						//obtengo la terminacion del dominio
						$term_dom = substr(strrchr ($this->post['usrname'], '.'),1);
						//compruebo que la terminación del dominio sea correcta
						if (strlen($term_dom)>1 && strlen($term_dom)<5 && (!strstr($term_dom,"@")) ) {
							//compruebo que lo de antes del dominio sea correcto
							$antes_dom = substr($this->post['usrname'],0,strlen($this->post['usrname']) - strlen($term_dom) - 1);
							$caracter_ult = substr($antes_dom,strlen($antes_dom)-1,1);
							if ($caracter_ult != "@" && $caracter_ult != ".") $mail_correcto = 1;
						}
					}
			}
		}
		if ($mail_correcto) return 1;
		else return 0;
	}
}
?>
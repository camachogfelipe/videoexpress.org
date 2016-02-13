<?php
defined( '_01800' ) or die('Acceso no permitido');
if(class_exists('BDManejo') == false) require_once("01800BD.php");
if(class_exists('Administracion') == false) require_once("administracion.php");

//Clase de usuario
class usuario {
	private $usuario;
	private $clave;
	private $permisos;
	private $bd;
	private $resultados;
	private $total_usuarios;
	private $iduser;
	private $admin;
	private $form;
	
	//Funci�n constructora
	function __construct($usuario = NULL, $clave = NULL) {
		if(!empty($usuario)) $this->usuario = $usuario;
		if(!empty($clave)) $this->clave = $clave;
		$this->bd = new BDManejo();
		$this->bd->tabla("usuarios");
		$this->admin = new Administracion();
	}
	
	function verifica_usuario() {
		$this->bd->tabla("usuarios, profile_usuario");
		$this->bd->datos("usuarios.usr_id, usuarios.usr_login, usuarios.usr_clave, usuarios.usr_tipo, profile_usuario.pusr_uacceso, 
						 profile_usuario.pusr_nombre, profile_usuario.pusr_apellidos");
		$this->bd->opciones("WHERE usuarios.usr_login='".$this->usuario."' and usuarios.usr_clave = '".$this->clave."' and usuarios.usr_status = 'A' and usuarios.usr_id = profile_usuario.usr_id");
		$this->bd->leer_datos();
		$this->resultados = $this->bd->array_array(2);
	
		$this->usuario = strcmp($this->usuario, $this->resultados[0]['usr_login']);
		$this->password = strcmp($this->clave, $this->resultados[0]['usr_clave']);
		if ($this->usuario == 0 and $this->password == 0) {
			// Si están en la base de datos del registro de usuario
			$_SESSION['user_01800'] = $this->resultados[0]['usr_id'];
			$_SESSION['usuario'] = $this->usuario;
			$_SESSION['nombre'] = ucwords($this->resultados[0]['pusr_nombre']." ".$this->resultados[0]['pusr_apellidos']);
			$_SESSION['user_tipo'] = $this->resultados[0]['usr_tipo'];
			$_SESSION['user_uacceso'] = $this->resultados[0]['pusr_uacceso'];
			$this->bd->tabla("profile_usuario");
			$this->bd->datos("pusr_uacceso='".date("Y-m-d H:i:s")."'");
			$this->bd->opciones(NULL);
			$this->bd->actualiza();
			$this->bd->ejecutar_query();
			if($_SESSION['user_tipo'] != "SA") {$this->bd->tabla("iglesias");
				$this->bd->datos("igl_id");
				$this->bd->opciones("WHERE usr_id='".$_SESSION['user_01800']."'");
				$_SESSION['user_igl'] = $this->bd->dato_unico();
			}
			$this->bd->libera();
			$this->bd->desconecta();
			return true;
		}
		else {
			$this->bd->libera();
			$this->bd->desconecta();
			return false;
		}
	}
	
	function verifica_nombre_usuario($user) {
		$this->bd->tabla("usuarios");
		$this->bd->datos("usuarios.usr_login");
		$this->bd->opciones("WHERE usuarios.usr_login='".$user."'");
		$this->bd->leer_datos();
		$this->resultados = $this->bd->dato_unico();
		$this->usuario = strcmp($user, $this->resultados);
		if ($this->usuario == 0) return true;
		else return false;
	}
	
	function salir() {
		unset($_SESSION['user_01800']);
		unset($_SESSION['usuario']);
		unset($_SESSION['nombre']);
	}
	
	function cambioclave($tipo = NULL) {
		if(empty($tipo)) {
			echo '<div id="formcc">'."\n";
			echo '<script type="text/javascript" src="../Scripts/jquery-ui/js/jquery-1.7.1.min.js"></script>'."\n";
			echo '<script type="text/javascript" src="../Scripts/jquery-ui/js/jquery.form.js"></script>'."\n";
			echo '<script type="text/javascript" src="../Scripts/jquery.validate.js"></script>'."\n";
			echo '<script type="text/javascript" src="../Scripts/jquery.validate.additional-methods.js"></script>'."\n";
			echo '<script type="text/javascript" src="../Scripts/usuario.js"></script>'."\n";
			echo '<form action="index3.php?op=6&e=true" method="post" name="cambio_clave" id="cambio_clave">'."\n";
			echo '<table cellpadding="2" cellspacing="3">';
			echo '<tr><td><label for="clave_anterior">Clave anterior</label></td><td><input type="password" id="clave_anterior" name="clave_anterior"></td></tr>'."\n";
			echo '<tr><td><label for="clave_nueva1">Clave nueva</label></td><td><input type="password" id="clave_nueva1" name="clave_nueva1"></td></tr>'."\n";
			echo '<tr><td><label for="clave_nueva2">Repita la clave</label></td><td><input type="password" id="clave_nueva2" name="clave_nueva2"></td></tr>'."\n";
			echo '<tr><td colspan="2" align="center"><button type="submit" id="submit" name="submit" title="Buscar"><img src="../imagenes/iconos_admin/icono_admin-afiliacion_aceptada.png" width="37" height="37" align="absmiddle"> <span style="font-size: 20px">Cambiar</span></button></td></tr>'."\n";
			echo '</form>'."\n";
			echo '</div>'."\n";
			echo '<div id="resultados_cambio"></div>'."\n";
		}
		else {
			$clave_anterior1 = md5($_POST['clave_anterior']);
			$clave_nueva1 = md5($_POST['clave_nueva1']);
			$clave_nueva2 = md5($_POST['clave_nueva2']);
			$this->usuario = $_SESSION['user_01800'];

			if($clave_anterior1!=NULL and $clave_nueva1!=NULL and $clave_nueva2!=NULL and $this->usuario!=NULL) {
				$this->bd->tabla("usuarios");
				$this->bd->datos("usr_clave");
				$this->bd->opciones("WHERE usr_id='".$this->usuario."'");
				$this->resultados = $this->bd->dato_unico();
				$clave1 = strcmp($clave_anterior1, $this->resultados);
				$clave2 = strcmp($clave_nueva1, $clave_nueva2);
				unset($this->resultados);

				if ($clave1 == 0 and $clave2 == 0) {
					$this->bd->tabla("usuarios");
					$this->bd->datos("usr_clave='$clave_nueva1'");
					$this->bd->opciones("WHERE usr_id='$this->usuario'");
					$this->bd->actualiza();
					$this->resultados = $this->bd->ejecutar_query();
					if($this->resultados == 1) {
						$mensaje = new mensajes_globales('Se ha cambiado la clave con exito', 1);
					}
					else $mensaje = new mensajes_globales('No se ha podido cambiar la clave', 3);
				}
				else $mensaje = new mensajes_globales('Las claves no coinciden', 2);
			}
			else $mensaje = new mensajes_globales('Los valores no deben estar vacios', 3);
			$mensaje->mostrar_mensaje();
			$this->bd->libera();
			$this->bd->desconecta();
		}
	}
	
	function listausuarios() {
		if($_SESSION['user_tipo'] == "SA" || $_SESSION['user_tipo'] == "AI") {
			$this->bd->datos("COUNT(*)");
			if($_SESSION['user_tipo'] == "AI") $this->bd->opciones("WHERE usr_depende='".$_SESSION['user_01800']."'");
			else $this->bd->opciones("");
			$this->total_usuarios = $this->bd->dato_unico();
			if(!empty($this->total_usuarios)) {
				$this->bd->datos("*");
				$this->bd->leer_datos();
				$this->resultados = $this->bd->array_asociativo();
				echo '<link href="estilo.css" rel="stylesheet" type="text/css">'."\n";
				echo '<script type="text/javascript" src="../Scripts/jquery-ui/js/jquery-1.7.1.min.js"></script>'."\n";
				echo '<script type="text/javascript" src="../Scripts/jquery.tools.min.js"></script>'."\n";
				echo '<script type="text/javascript">jQuery(document).ready(function() {
						jQuery("#links img[title]").tooltip({ position: "bottom center" });
					  });
					  initLytebox();
					  function actualiza() {
						  recargar(\'index3\',\'op=5\',\'#panel_derecho_menu\');
					  }
					  
					  function eliminar(id) {
						  var entrar = confirm("¿Está seguro de eliminar el usuario?");
						  if(entrar == true) {
							  var pag = jQuery("#pag").val();
							  var uri = "op=23&iduser="+id;
							  recargar(\'index3\',uri,\'#panel_derecho_menu\');
						  }
					  }
					  
					  function desactivar(id, status) {
						  var entrar = confirm("¿Está seguro de desactivar el usuario?");
						  if(entrar == true) {
							  var pag = jQuery("#pag").val();
							  var uri = "op=41&iduser="+id+"&status="+status;
							  recargar(\'index3\',uri,\'#panel_derecho_menu\');
						  }
					  }
					  </script>'."\n";
				echo '<span id="titulos">Lista de usuarios</span>'."<br>\n";
				echo '<p><a id="links" href="index3.php?op=38" class="lytebox" data-title="Crear usuario nuevo" data-lyte-options="width:600 height:300 forceCloseClick:true afterEnd:actualiza">';
				echo '<img align="absmiddle" title="Crear" src="../imagenes/iconos_admin/icono_admin-afiliado_new.png" width="37" height="37"> Crear usuario nuevo';
				echo '</a></p>';
				echo '<span id="titulos">Total usuarios: </span>'.$this->total_usuarios."<p>";
				echo '<table id="vli_table" cellpadding="2" cellspacing="0" align="center" width="100%">'."\n";
				foreach($this->resultados as $valor) {
					echo "<tr>\n<td id=\"titulos\" style=\"border-left: 1px solid #700095; border-top: 1px solid #700095; border-bottom: 1px solid #700095;\">\n".$valor['usr_id'].". ".$usuario = ucwords(strtolower(htmlentities($valor['usr_login'])))."</td>\n<td style=\"border-top: 1px solid #700095; border-bottom: 1px solid #700095;\">\n";
					$tipo = $valor['usr_tipo'];
					if($tipo == "SA") $tipo = "Super administrador";
					elseif($tipo == "AI") $tipo = "Usuario de congregaci&oacute;n";
					elseif($tipo == "I") $tipo = "Usuario de Iglesia";
					echo $tipo."</td>\n<td style=\"border-right: 1px solid #700095; border-top: 1px solid #700095; border-bottom: 1px solid #700095;\">\n";
					echo '<a id="links" href="index3.php?op=21&iduser='.$valor['usr_id'].'" class="lytebox" data-title="Editar informaci&oacute;n de ';
					echo $valor['usr_login'].'" data-lyte-options="width:600 height:300 forceCloseClick:true afterEnd:actualiza">';
					echo '<img title="Editar" src="../imagenes/iconos_admin/icono_admin-afiliado_edit.png" width="37" height="37">';
					echo '</a> ';
					echo '<a id="links" href="index3.php?op=16&iduser='.$valor['usr_id'].'" class="lytebox" data-title="Informaci&oacute;n de ';
					echo $valor['usr_login'].'" data-lyte-options="width:600 height:200 forceCloseClick:true afterEnd:actualiza">';
					echo '<img title="Ver informaci&oacute;n" src="../imagenes/iconos_admin/icono_admin-afiliado_info.png" width="37" height="37">';
					echo '</a> ';
					if($valor['usr_id'] != $_SESSION['user_01800']) {
						echo '<a href="#Eliminar" title="Elimiar usuario" id="links"';
						echo ' onclick="eliminar('.$valor['usr_id'].')"';
						echo '>';
						echo '<img title="Eliminar" src="../imagenes/iconos_admin/icono_admin-afiliado_eliminar.png" width="37" height="37">';
						echo '</a>';
						echo "</td>\n<td style=\"border-right: 1px solid #700095; border-top: 1px solid #700095; border-bottom: 1px solid #700095;\">";
						echo '<a href="#Desactivar" title="Elimiar usuario" id="links"';
						if($valor['usr_status'] == "A") $status = "I";
						elseif($valor['usr_status'] == "I") $status = "A";
						echo ' onclick="desactivar('.$valor['usr_id'].', \''.$status.'\')"';
						echo '>';
						if($valor['usr_status'] == "A") echo '<img title="Activar/Desactivar" src="../imagenes/iconos_admin/icono_admin-afiliado_activo.png" width="37" height="37">';
						else echo '<img title="Activar/Desactivar" src="../imagenes/iconos_admin/icono_admin-afiliado_inactivo.png" width="37" height="37">';
						echo '</a>';
					}
					echo "</td>\n</tr>\n";
				}
				echo "</table>\n</p>\n";
			}
			else {
				$mensaje = new mensajes_globales("No existen usuarios", 1);
				$mensaje->mostrar_mensaje();
			}
		}
	}
	
	function carga_usuario() {
		$this->bd->tabla("usuarios");
		$this->bd->datos("usuarios.*, profile_usuario.*");
		$this->bd->opciones("LEFT JOIN profile_usuario ON usuarios.usr_id=profile_usuario.usr_id WHERE usuarios.usr_id='$this->iduser';");
		$this->bd->leer_datos();
		$this->resultados = $this->bd->array_asociativo();
		return $this->resultados;
	}
	
	function verinfouser($iduser) {
		echo '<link href="estilo.css" rel="stylesheet" type="text/css">'."\n";
		$this->iduser = $iduser;
		$this->carga_usuario();
		//echo "<pre>";print_r($this->resultados);echo "</pre>";
		echo '<table id="vli_table" cellpadding="2" cellspacing="3" align="center" width="100%">'."\n";
		foreach($this->resultados as $valor) {
			echo "<tr>\n";
			echo "<td>Nombre</td>\n";
			echo "<td>".$valor['pusr_nombre']."</td>\n";
			echo "</tr>\n";
			echo "<tr>\n";
			echo "<td>Apellidos</td>\n";
			echo "<td>".html_entity_decode($valor['pusr_apellidos'])."</td>\n";
			echo "</tr>\n";
			echo "<tr>\n";
			echo "<td>Creado el</td>\n";
			echo "<td>".$valor['pusr_creado']."</td>\n";
			echo "</tr>\n";
			echo "<tr>\n";
			echo "<td>Ultimo acceso el</td>\n";
			echo "<td>".$valor['pusr_uacceso']."</td>\n";
			echo "</tr>\n";
			echo "<tr>\n";
			echo "<td>Email</td>\n";
			echo "<td>".$valor['pusr_email']."</td>\n";
			echo "</tr>\n";
			echo "<tr>\n";
			echo "<td>Iglesias administradas</td>\n";
			echo "<td>";
			if($valor['usr_tipo'] == "SA") $valor['usr_tipo'] = "Super administrador";
			elseif($valor['usr_tipo'] == "AI") $valor['usr_tipo'] = "Usuario de congregaci&oacute;n";
			elseif($valor['usr_tipo'] == "I") $valor['usr_tipo'] = "Usuario de Iglesia";
			echo $valor['usr_tipo'];
			echo "</td>\n";
			echo "</tr>\n";
		}
		echo "</table>\n";
	}
	
	function editaruser($iduser, $form = NULL) {
		echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
		echo '<link href="estilo.css" rel="stylesheet" type="text/css">'."\n";
		if(empty($form)) {
			$this->iduser = $iduser;
			$this->carga_usuario();
			echo '<script type="text/javascript" src="../Scripts/jquery-1.7.1.min.js"></script>'."\n";
			echo '<script type="text/javascript" src="../Scripts/jquery.form.js"></script>'."\n";
			echo '<script type="text/javascript" src="../Scripts/jquery.validate.js"></script>'."\n";
			echo '<script type="text/javascript" src="../Scripts/jquery.validate.additional-methods.js"></script>'."\n";
			echo '<script type="text/javascript" src="../Scripts/edit_usuario.js"></script>'."\n";
			echo '<script type="text/javascript" language="javascript" src="../Scripts/jquery.corner.js"></script>'."\n";
			echo '<form action="index3.php?op=22&iduser='.$this->iduser.'" id="edit_user" name="edit_user" method="post">';
			echo '<table cellpadding="2" cellspacing="3" align="center" width="100%">'."\n";
			foreach($this->resultados as $valor) {
				echo "<tr>\n";
				echo '<td><label for="nombre">Nombre<label></td>'."\n".'<td><input type="text" name="nombre" id="nombre" value="'.$valor['pusr_nombre'].'"></td>'."\n";
				echo "</tr>\n";
				echo "<tr>\n";
				echo '<td><label for="apellidos">Apellidos</label></td>'."\n";
				echo '<td><input type="text" name="apellidos" id="apellidos" value="'.$valor['pusr_apellidos'].'"></td>'."\n";
				echo "</tr>\n";
				echo "<tr>\n";
				echo '<td><label for="email">Email</label></td>'."\n".'<td><input type="text" name="email" id="email" value="'.$valor['pusr_email'].'"></td>'."\n";
				echo "</tr>\n";
				echo "<tr>\n";
				echo "<td><label for=\"tipo\">Tipo de usuario<label></td>\n";
				echo "<td>\n";
				echo '<select name="tipo" id="tipo">'."\n";
				echo '<option value="">Seleccione el tipo de usuario</option>';
				if($_SESSION['user_tipo'] == "SA") {
					echo '<option value="SA" ';
					if($valor['usr_tipo'] == "SA") echo 'selected="selected"';
					echo '>Super administrador</option>';
				}
				if($_SESSION['user_tipo'] == "SA" || $_SESSION['user_tipo'] == "AI" || $valor['usr_tipo'] == "AI") {
					echo '<option value="AI"';
					if($valor['usr_tipo'] == "AI") echo ' selected="selected"'; echo '>Administrador de congregaci&oacute;n</option>';
				}
				echo '<option value="I"';if($valor['usr_tipo'] == "I" || $_SESSION['user_tipo'] == "I") echo ' selected="selected"';
				echo '>Administrador de iglesia</option>';
				echo '</select>'."\n";
				echo "</td>\n";
				echo "</tr>\n";
			}
			echo "<tr>\n";
			echo '<td colspan="2" align="center"><button type="submit"><img src="../imagenes/boton_ingreso.png"> Enviar</button></td>'."\n";			
			echo "</tr>\n";
			echo "</table>\n";
			echo "</form>\n";
			echo '<div id="resultados_editar"></div>';
		}
		else {
			$this->form = $this->admin->cargar_request();
			$this->bd->tabla("usuarios");
			$this->bd->datos("usuarios.usr_tipo='".$this->form['tipo']."'");
			$this->bd->opciones("WHERE usuarios.usr_id='".$this->form['iduser']."'");
			$this->bd->actualiza();
			$this->resultados = $this->bd->ejecutar_query();
			$this->bd->tabla("profile_usuario");
			$this->bd->datos("profile_usuario.pusr_nombre='".$this->form['nombre']."', "."profile_usuario.pusr_apellidos='".$this->form['apellidos'].
							 "', profile_usuario.pusr_email='".$this->form['email']."'");
			$this->bd->opciones("WHERE profile_usuario.usr_id='".$this->form['iduser']."'");
			$this->bd->actualiza();
			$this->resultados = $this->bd->ejecutar_query();
			if($this->resultados == 1) $mensaje = new mensajes_globales("Se actualizo el usuario correctamente", 1);
			else $mensaje = new mensajes_globales("No se actualizo el usuario correctamente", 3); 
			$mensaje->mostrar_mensaje();
		}
	}
	
	function deleteuser($iduser) {
		$this->bd->tabla("iglesias");
		$this->bd->datos("usr_id='1'");
		$this->bd->opciones("WHERE usr_id='".$iduser."'");
		$this->bd->actualiza();
		$this->bd->ejecutar_query();
		$this->bd->tabla("profile_usuario");
		$this->bd->opciones("WHERE usr_id='".$iduser."'");
		$this->bd->eliminar();
		$this->resultados[0] = $this->bd->ejecutar_query();
		$this->bd->tabla("usuarios");
		$this->bd->eliminar();
		$this->resultados[1] = $this->bd->ejecutar_query();
		if($this->resultados[0] == 1 and $this->resultados[1] == 1) $mensaje = new mensajes_globales("El usuario ha sido eliminado", 1);
		else $mensaje = new mensajes_globales("El usuario no ha sido eliminado", 3);
		$mensaje->mostrar_mensaje();
		$this->listausuarios();
	}
	
	function desactivaruser($iduser, $status = "I") {
		$this->bd->tabla("usuarios");
		$this->bd->datos("usr_status='".$status."'");
		$this->bd->opciones("WHERE usr_id='".$iduser."'");
		$this->bd->actualiza();
		//$this->bd->mostrar_sql();
		if($this->bd->ejecutar_query() == 1) $mensaje = new mensajes_globales("El usuario ha sido actualizado", 1);
		else $mensaje = new mensajes_globales("El usuario no ha sido actualizado", 3);
		$mensaje->mostrar_mensaje();
		$this->listausuarios();
	}
	
	function crearuser() {
		$this->form = $this->admin->cargar_request();
		//unset($this->form['op']);
		//echo "<pre>";print_r($this->form);echo "</pre>";//exit();
		echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
		echo '<link href="estilo.css" rel="stylesheet" type="text/css">'."\n";
		echo '<link href="../Scripts/jquery-ui/css/smoothness/jquery-ui-1.8.17.custom.css" rel="stylesheet" type="text/css">'."\n";
		if(empty($this->form) || $this->form['op'] == 38 and !isset($this->form['e'])) {
			echo '<script type="text/javascript" src="../Scripts/jquery-1.7.1.min.js"></script>'."\n";
			echo '<script type="text/javascript" src="../Scripts/jquery-ui/js/jquery-1.7.1.min.js"></script>'."\n";
			echo '<script type="text/javascript" src="../Scripts/jquery-ui/js/jquery-ui-1.8.17.custom.min.js"></script>'."\n";
			echo '<script type="text/javascript" src="../Scripts/jquery.form.js"></script>'."\n";
			echo '<script type="text/javascript" src="../Scripts/jquery.validate.js"></script>'."\n";
			echo '<script type="text/javascript" src="../Scripts/jquery.validate.additional-methods.js"></script>'."\n";
			echo '<script type="text/javascript" src="../Scripts/crear_usuario.js"></script>'."\n";
			echo '<script type="text/javascript" language="javascript" src="../Scripts/jquery.corner.js"></script>'."\n";
			echo '<form action="index3.php?op=38" id="crear_user" name="crear_user" method="post">';
			echo '<input type="hidden" name="e" value="true">';
			echo '<table cellpadding="2" cellspacing="3" align="center" width="100%">'."\n";
			echo "<tr>\n";
			echo '<td><label for="nombre">Nombre<label></td>'."\n";
			echo '<td><input type="text" name="nombre" id="nombre"></td>'."\n";
			echo "</tr>\n";
			echo "<tr>\n";
			echo '<td><label for="apellidos">Apellidos</label></td>'."\n";
			echo '<td><input type="text" name="apellidos" id="apellidos"></td>'."\n";
			echo "</tr>\n";
			echo "<tr>\n";
			echo '<td><label for="email">Email/nombre de usuario</label></td>'."\n";
			echo '<td><input type="text" name="email" id="email"></td>'."\n";
			echo "</tr>\n";
			echo "<tr>\n";
			echo "<td><label for=\"tipo\">Tipo de usuario<label></td>\n";
			echo "<td>\n";
			echo '<select name="tipo" id="tipo">'."\n";
			echo '<option value="">Seleccione el tipo de usuario</option>';
			if($_SESSION['user_tipo'] == "SA") {
				echo '<option value="SA" ';
				if($valor['usr_tipo'] == "SA") echo 'selected="selected"';
				echo '>Super administrador</option>';
			}
			if($_SESSION['user_tipo'] == "SA" || $_SESSION['user_tipo'] == "AI" || $valor['usr_tipo'] == "AI") {
				echo '<option value="AI"';
				if($valor['usr_tipo'] == "AI") echo ' selected="selected"'; echo '>Administrador de congregaci&oacute;n</option>';
			}
			echo '<option value="I"';if($valor['usr_tipo'] == "I" || $_SESSION['user_tipo'] == "I") echo ' selected="selected"';
			echo '>Administrador de iglesia</option>';
			echo '</select>'."\n";
			echo "</td>\n";
			echo "</tr>\n";
			echo "<tr>\n";
			echo '<td><label for="igl_id">Iglesia del usuario</label></td>'."\n";
			echo '<td><input type="text" name="igl_id" id="igl_id"></td>'."\n";
			echo "</tr>\n";
			echo "<tr>\n";
			echo '<td colspan="2" align="center"><button type="submit"><img src="../imagenes/boton_ingreso.png" align="absmiddle"> Crear usuario</button></td>'."\n";			
			echo "</tr>\n";
			echo "</table>\n";
			echo "</form>\n";
			echo '<div id="resultados_editar"></div>';
		}
		else {
			//print_r($this->form);exit();
			$this->form = $this->admin->cargar_request();
			$tmp = $this->genera_clave_token();
			$this->form['clave'] = $tmp['clave'];
			$this->form['token'] = $tmp['token'];
			unset($tmp);
			$this->bd->tabla("usuarios");
			$this->bd->columnas("usr_login, usr_clave, usr_status, usr_token, usr_tipo, usr_depende");
			$this->bd->datos("'".$this->form['email']."', '".md5('01800Iglesia')."', 'A', '".$this->form['token'].
							 "', '".$this->form['tipo']."', '".$this->form['depende']."'");
			$this->bd->insert();
			//$this->bd->mostrar_sql();
			$this->bd->ejecutar_query();
			$this->form['usr_id'] = $this->bd->ultimo_id();
			$this->bd->tabla("profile_usuario");
			$this->bd->columnas("usr_id, pusr_nombre, pusr_apellidos, pusr_creado, pusr_email");
			$this->bd->datos("'".$this->form['usr_id']."', '".$this->form['nombre']."', '".$this->form['apellidos'].
							 "', '".date("Y-m-d H:i:s")."', '".$this->form['email']."'");
			$this->bd->insert();
			//$this->bd->mostrar_sql();
			$this->bd->ejecutar_query();
			$this->form['igl_id'] = explode("::", $this->form['igl_id']);
			$this->form['igl_id'] = $this->form['igl_id'][1];
			if($this->form['tipo'] != "SA" and !empty($this->form['igl_id'])) {
				$this->bd->tabla("iglesias");
				$this->bd->datos("usr_id='".$this->form['usr_id']."'");
				$this->bd->opciones("WHERE igl_id='".$this->form['igl_id']."'");
				$this->bd->actualiza();
				$this->bd->ejecutar_query();
				//$this->bd->mostrar_sql();
			}
			$mensaje = new mensajes_globales("Se creo el usuario correctamente", 1);
			$mensaje->mostrar_mensaje();
			$email['mail'] = $this->form['email'];
			$email['nombre'] = $this->form['nombre'];
			$email['clave'] = "01800Iglesia";
			$this->envio_correo_usuario($email, 1);
		}
	}
	
	function genera_clave_token() {
		$source = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
		$this->form['clave'] = "";
		$source = str_split($source,1);
		for($i=1; $i<=10; $i++) {
			mt_srand((double)microtime() * 1000000);
			$num = mt_rand(1,count($source));
			$this->form['clave'] .= $source[$num-1];
		}
		$this->form['token'] = mt_rand();
		return $this->form;
	}
	
	function envio_correo_usuario($email = NULL, $opm = NULL) {
		if(!empty($email) and !empty($opm)) {
			if($opm == 1) {
				$body = 'Apreciado usuario &iexcl;Bienvenido a 01800-Iglesia!'."\n";
				$body .= '<p style="text-align:justify">Es un placer para nosotros poder contar con su voto de confianza.<br>';
				$body .= 'Su iglesia fue inscrita correctamente en nuestra base de datos y a partir de la fecha puede ingresar a nuestro sistema a';
				$body .= 'personalizar sus datos y los de su iglesia</p>'."\n";
				$body .= 'Recuerde su nombre de usuario es: '.$email['mail']."<br>\n";
				$body .= 'La clave de ingreso es: '.$email['clave']."<br>Recuerde cambiarla en su primer ingreso\n";
				$link = explode("/", $_SERVER['REQUEST_URI']);
				unset($link[count($link)-1]);
				$link = implode("/", $link);
				$body .= '<p>El link de ingreso es <a href="'.$_SERVER['SERVER_NAME']."/".$link.'">';
				$body .= '01800-Iglesia Usuarios</a><p>'."\n";
				$body .= 'Atentamente,'."\n".'<p>Administrador 01800-Iglesia</p>'."\n";
				$body .= '<p><font style="font-size:10px">Usted recibio este correo porque fue referenciado como usuario administrador de la iglesia ';
				$body .= 'en menci&oacute;n. Si usted no es el usuario ni tiene relaci&oacute;n con la iglesia por favor hacer caso omiso de este ';
				$body .= 'correo.</font></p>'."\n";
				$body .= '<p><font style="font-size:10px">01800-Iglesia. Todos los derechos reservados &copy; 2012</font></p>'."\n";
			}
			require_once 'PHPMailer_v5.1/class.phpmailer.php';

			//defaults to using php "mail()"; the true param means it will throw exceptions on errors, which we need to catch
			$mail = new PHPMailer(true);
	
			try {
				$mail->SetLanguage("es");
				$mail->AddAddress($email['mail'], $email['nombre']);
				$mail->SetFrom('administrador@01800iglesia.org', 'Gerencia Comercial');
				$mail->Subject = "Bienvenido a 01800Iglesia";
				// optional - MsgHTML will create an alternate automatically
				$mail->AltBody = '';
				$mail->MsgHTML($body);
				$mail->Send();
			} catch (phpmailerException $e) {
				echo $e->errorMessage(); //Pretty error messages from PHPMailer
			} catch (Exception $e) {
				echo $e->getMessage(); //Boring error messages from anything else!
			}
		}
	}
}
?>
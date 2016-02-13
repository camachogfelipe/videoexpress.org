<?php
defined( '_01800' ) or die('Acceso no permitido');

//Clase de administracion
class Administracion {
	private $pag;
	private $bd;
	private $archivo;
	var $resultados;
	var $op;
	private $form;
	
	//Función constructora
	function __construct($pag = 1) {
		$this->pag = $pag;
		$this->bd = new BDManejo($this->pag);
	}
	
	function resumen() {
		$iglesia = new Iglesia();
		echo '<span id="titulos">Bienvenido: </span>'.$_SESSION['nombre'];
		echo '<br /><span id="titulos">fecha del &uacute;ltimo acceso: </span>'.$_SESSION['user_uacceso'];
		echo '<p><span id="titulos">Iglesias inscritas: </span>'.number_format($iglesia->total_iglesias)."</p>";
		//echo '<br /><span id="titulos">Predicas de iglesias inscritas: </span>'.number_format(dato_columna("predicas", "COUNT(*)", ""));
		//echo '<br /><span id="titulos">Sugerencias de actualizaci&oacute;n: </span>'.number_format(dato_columna("sugerencias", "COUNT(*)", ""));
		//echo '<br /><span id="titulos">Solicitudes de inscripci&oacute;n: </span>'.number_format(dato_columna("solicitudes_ins", "COUNT(*)", ""));
		//echo '<br /><span id="titulos">Mensajes de contactenos: </span>'.number_format(dato_columna("contactenos", "COUNT(*)", ""))."</p>";
	}
	
	function mostrar_paginacion($pag, $total_paginas, $op, $tipo = NULL, $texto_busqueda = NULL, $lugar_busqueda = NULL)
	{
		if(!empty($tipo)) $busqueda = "&tb=".utf8_encode($texto_busqueda)."&lb=".utf8_encode($lugar_busqueda);
		else $busqueda = NULL;
		$anterior = $pag - 1;
		$siguiente = $pag + 1;
		$a = $pag - 3;
		$b = $pag + 3;
		if($a <= 1) {
			$a = 2;
			$b = 8;
		}
		if($b >= $total_paginas) {
			$b = $total_paginas - 1;
			$a = $total_paginas - 7;
			if ($a < 1) $a = 2;
		}

		if(isset($_REQUEST["lista_buscar"]) && htmlspecialchars($_REQUEST["lista_buscar"]) != "")
		{
			$busqueda .= "&lista_buscar=".htmlspecialchars($_REQUEST["lista_buscar"]);
		}
		if(isset($_REQUEST["lista_buscar_id"]) && htmlspecialchars($_REQUEST["lista_buscar_id"]) != "")
		{
			$busqueda .= "&lista_buscar_id=".htmlspecialchars($_REQUEST["lista_buscar_id"]);
		}


		if ($anterior <= 0) $ant = "<span id='pag_sel'><< anterior</span>\n";
		else $ant = "<a href='#' onclick=\"recargar('index3','op=".$op."&pag=$anterior".$busqueda."','#panel_derecho_menu')\"><< anterior</a>\n"; 
		if ($siguiente > $total_paginas) $sig = "<span id='pag_sel'>Siguiente >></span>\n";
		else $sig = "<a href='#' onclick=\"recargar('index3','op=".$op."&pag=$siguiente".$busqueda."','#panel_derecho_menu')\">Siguiente >></a>\n";

		echo $ant."\n";
		if($pag == 1) {
			echo "<span id='pag_sel'>1</span>\n";
			if($total_paginas != 1) echo "&nbsp;...&nbsp;\n";
		}
		else {
			echo "<a href='#' onclick=\"recargar('index3','op=".$op."&pag=1".$busqueda."','#panel_derecho_menu')\">1</a>\n";
			if($total_paginas != 1) echo "&nbsp;...&nbsp;\n";
		}

		for ($i=$a; $i<=$b; $i++) {
			if ($i == $pag) echo "<span id='pag_sel'>$i</span>\n";
			else echo "<a href='#' onclick=\"recargar('index3','op=".$op."&pag=$i".$busqueda."','#panel_derecho_menu')\">$i</a>\n";
		}

		if($pag == $total_paginas) {
			if($total_paginas != 1) {
				echo "&nbsp;...&nbsp;\n";
				echo "<span id='pag_sel'>$total_paginas</span>\n";
			}
		}
		else {
			echo "&nbsp;...&nbsp;\n";
			echo "<a href='#' onclick=\"recargar('index3','op=".$op."&pag=$total_paginas".$busqueda."','#panel_derecho_menu')\" border='0px'>$total_paginas</a>\n";
		}
		echo $sig."\n";
	}
	
	function carga_geolocalizacion($tabla = "continentes", $id_geo = NULL) {
		$this->bd->tabla($tabla);
		$this->bd->datos("DISTINCT(id), nombre");
		switch($tabla) {
			case "continentes"	: $opciones = "WHERE id_idioma='7'";
								  break;
			case "paises"		: $opciones = "WHERE id_idioma='7'";
								  if(!empty($id_geo)) $opciones .= " AND id_continente='".$id_geo."'";
								  break;
			case "regiones"		: $opciones = "WHERE id_idioma='7'";
								  if(!empty($id_geo)) $opciones .= " AND id_pais='".$id_geo."'";
								  break;
			case "localidades"	: $opciones = "WHERE id_idioma='7'";
								  if(!empty($id_geo)) $opciones .= " AND id_region='".$id_geo."'";
								  break;
		}
		$this->bd->opciones($opciones." ORDER BY nombre ASC");
		$this->bd->leer_datos();
		//$this->bd->mostrar_sql();
		$this->resultados = $this->bd->array_asociativo();
	}
	
	function mostrar_select_geolocalizacion($id = NULL) {
		$tmp = "\n".'<option value=""';
		if(!empty($id)) $tmp .= 'selected="selected"';
		$tmp .= '>Seleccione una opci&oacute;n...</option>'."\n";
		foreach($this->resultados as $valor) {
			$tmp .= '<option value="'.$valor['id'].'"';
			if($id == $valor['id']) $tmp .= ' selected="selected"';
			$tmp .= '>'.$valor['nombre'].'</option>'."\n";
		}
		echo html_entity_decode($tmp, ENT_QUOTES, "UTF-8");
		//echo $tmp;
		//return $tmp;
	}
	
	function cargar_directorio($path = "../archivos_iglesias/logos/") {
		$directorio=dir($path);
		while ($archivos = $directorio->read()) {
			if($archivos != "." and $archivos != "..") $this->archivo[] = $archivos;
		}
		$directorio->close();
		sort($this->archivo);
		return $this->archivo;
	}
	
	function mostrar_archivos($tipo = "../archivos_iglesias/logos/", $tam = 100) {
		if(count($this->archivo) > 2) {
			foreach($this->archivo as $valor) {
				if($valor != "." and $valor != "..") {
					$tmp = getimagesize($tipo.$valor);
					if($tmp[0] > $tam || $tmp[1] > $tam) {
						if($tmp[0] > $tmp[1]) {
							$width = $tam;
							$height = ($tam * $tmp[1])/$tmp[0];
						}
						elseif($tmp[0] < $tmp[1]) {
							$width = $tam;
							$height = ($tam * $tmp[0])/$tmp[1];
						}
						elseif($tmp[0] == $tmp[1]) {
							$width = $tam;
							$height = $tam;
						}
					}
					else {
						$width = $tmp[0];
						$height = $tmp[1];
					}
					echo '<img src="'.$tipo.$valor.'" width="'.$width.'" height="'.$height.'" />';
				}
			}
		}
	}
	
	function cargar_request() {
		foreach($_REQUEST as $key=>$valor) {
			//echo $key." : ".$valor."<br />";
			if($key == "firma") $this->form[$key] = trim($valor);
			elseif($key == "mensajecorreo") $this->form[$key] = trim($valor);
			elseif($key != "listaasociar" && $key != "logo" && $key != "logotipo")
				$this->form[$key] = htmlspecialchars(trim($valor), ENT_QUOTES, "UTF-8");
			elseif($key != "listaasociar") $this->form[$key] = htmlspecialchars(trim($valor), ENT_QUOTES, 'UTF-8');
		}
		return $this->form;
	}
	
	function contactenos() {
		if(!empty($_REQUEST['a'])) $this->action = $_REQUEST['a'];
		else $this->action = NULL;
		if(empty($this->action)) {
			$this->bd->tabla("contactenos");
			$this->bd->datos("COUNT(*)");
			if($_SESSION['user_tipo'] != "SA") $this->bd->opciones("WHERE igl_id='".$_SESSION['user_igl']."' AND con_status='NR'");
			$this->total_contactos = $this->bd->dato_unico();
			if(!empty($this->total_contactos)) {
				$this->bd->datos("*");
				$this->bd->leer_datos();
				$this->resultados = $this->bd->array_asociativo();
				echo '<script type="text/javascript" language="javascript" src="../Scripts/contactenos.js"></script>'."\n";
				echo '<script>initLytebox();</script>';
				echo '<span id="titulos">Total mensajes: </span>'.$this->total_contactos."<p></p>";
				echo '<div>';
				echo '<table id="vli_table" cellpadding="2" cellspacing="0" align="center" width="100%">'."\n";
				foreach($this->resultados as $valor) {
					echo '<tr>'."\n";
					echo '<td width="40%" style="border-left: 1px solid #700095; border-top: 1px solid #700095; border-bottom: 1px solid #700095;"><span id="titulos">Nombre: </span>'.ucwords(strtolower(htmlentities($valor['con_nombre'], ENT_QUOTES, "UTF-8")))."\n";
					echo '<br /><span id="titulos">Correo electr&oacute;nico: </span>'.$valor['con_email']."\n";
					echo '<br /><span id="titulos">Tel&eacute;fono: </span>'.$valor['con_telefono']."\n";
					echo '<br /><span id="titulos">Tel&eacute;fono movil: </span>'.$valor['con_celular']."\n";
					echo '<br /><span id="titulos">Ciudad: </span>'.$valor['city_id']."</td>\n";
					echo '<td width="54%" valign="top" style="border-top: 1px solid #700095; border-bottom: 1px solid #700095;"><span id="titulos">Motivo contacto:</span> '.$valor['con_motivo'].'<p>'.$valor['con_mensaje']."</p></td>\n";
					echo '<td width="6%" align="center" style="border-right: 1px solid #700095; border-top: 1px solid #700095; border-bottom: 1px solid #700095;">'."\n";
					echo '<a href="index3.php?op=4&id='.$valor['con_id'].'&a=res" class="lytebox" data-title="Responder a ';
					echo ucwords(strtolower(htmlentities($valor['con_nombre'], ENT_QUOTES, "UTF-8"))).'" data-lyte-options="width:600 height:300">';
					echo '<img src="../imagenes/iconos_admin/icono_admin-msj_respon.png" width="37" height="37" border="0" />';
					echo '</a><br />';
					echo '<a href="#" title="Eliminar" onclick="eliminar(\''.$valor['con_id'].'\')">';
					echo '<img src="../imagenes/iconos_admin/icono_admin-msj_eliminar.png" width="37" height="37" border="0" />';
					echo '</a></td>'."\n";
					echo "</tr>\n";
				}
				echo "</table>\n";
				echo '</div>';
			}
			else {
				echo '<link href="estilo.css" rel="stylesheet" type="text/css">'."\n";
				echo '<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />'."\n";
				echo '<script type="text/javascript" src="../Scripts/jquery-ui/js/jquery-1.7.1.min.js"></script>'."\n";
				$mensaje = new mensajes_globales("No existen mensajes de contacto", 2);
				$mensaje->mostrar_mensaje();
			}
		}
		elseif($this->action == "res") {
			$this->id = $_REQUEST['id'];
			echo '<link href="estilo.css" rel="stylesheet" type="text/css">'."\n";
			echo '<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />'."\n";
			echo '<script type="text/javascript" src="../Scripts/jquery-ui/js/jquery-1.7.1.min.js"></script>'."\n";
			echo '<script type="text/javascript" src="../Scripts/jquery.form.js"></script>'."\n";
			echo '<script type="text/javascript" src="../Scripts/jquery.validate.js"></script>'."\n";
			echo '<script type="text/javascript" src="../Scripts/jquery.validate.additional-methods.js"></script>'."\n";
			echo '<script type="text/javascript" language="javascript" src="../Scripts/contactenos.js"></script>'."\n";
			echo '<script>initLytebox();</script>';
			echo '<span id="titulos">Formulario de respuesta de contacto desde la p&aacute;gina web: </span><br /><br />'."\n";
			echo '<div id="form_contactenos">'."\n";
			echo '<form action="index3.php?op=4&id='.$this->id.'&a=env" name="form_contactenos" id="form_con" method="post">'."\n";
			echo '<span id="titulos">Respuesta:</p>'."\n";
			echo '<input type="hidden" name="id" value="'.$this->id.'" /><textarea name="respuesta" cols="60" rows="5"></textarea><p>'."\n";
			echo '<div align="center">';
			echo '<button type="submit"><img src="../imagenes/boton_ingreso.png" /> Enviar</button>';
			echo '<button type="reset"><img src="../imagenes/boton_borrar_form_contacto.png" /> Limpiar</button>';
			echo '</div></p>'."\n";
			echo '</form>'."\n";
			echo '</div>'."\n";
			echo '<div id="div_respuesta"></div>';
		}
		elseif($this->action == "env") {
			$this->id = $_REQUEST['id'];
			echo '<link href="estilo.css" rel="stylesheet" type="text/css">'."\n";
			echo '<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />'."\n";
			echo '<script type="text/javascript" src="../Scripts/jquery-ui/js/jquery-1.7.1.min.js"></script>'."\n";
			$this->bd->tabla("contactenos");
			$this->bd->datos("con_email");
			$this->bd->leer_datos();
			$this->resultados = $this->bd->dato_unico();
			$titulo = 'Respuesta a contacto 01800-Iglesia';
			$mensaje = htmlentities($_REQUEST['respuesta'], ENT_QUOTES, "UTF-8");
			$cabeceras = 'From: contacto@01800iglesia.org' . "\r\n" .
						 'Reply-To: contacto@01800iglesia.org' . "\r\n" .
						 'X-Mailer: PHP/' . phpversion();
			/*if(!mail($this->resultados, $titulo, $mensaje, $cabeceras)) $mensaje = new mensajes_globales("Su correo no ha podido ser enviado", 3);
			else {
				
				*/
				$this->bd->datos("con_status='R'");
				$this->bd->opciones("WHERE con_id='".$this->id."'");
				$this->bd->actualiza();
				$this->bd->ejecutar_query();
				$mensaje = new mensajes_globales("Su correo ha sido enviado con exito", 1);
			//}
			$mensaje->mostrar_mensaje();
		}
		elseif($this->action == "elm") {
			echo '<link href="estilo.css" rel="stylesheet" type="text/css">'."\n";
			echo '<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />'."\n";
			echo '<script type="text/javascript" src="../Scripts/jquery-ui/js/jquery-1.7.1.min.js"></script>'."\n";
			$this->id = $_REQUEST['id'];
			$this->bd->tabla("contactenos");
			$this->bd->opciones("WHERE con_id='".$this->id."'");
			$this->bd->eliminar();
			$this->resultados = $this->bd->ejecutar_query();
			if($this->resultados == 1) $mensaje = new mensajes_globales("El mensaje ha sido eliminado", 1);
			else $mensaje = new mensajes_globales("El mensaje no ha sido eliminado", 2);
			$mensaje->mostrar_mensaje();
		}
	}
	
	function solicitudes_sugerencias($tipo = "sol", $op) {
		$this->bd->tabla("solicitudes_sugerencias");
		$opciones = NULL;
		if($tipo == "sol") $this->bd->datos("*");
		else {
			$this->bd->datos("solicitudes_sugerencias.*, iglesias.igl_nombre, iglesias.igl_sede");
			$opciones = "INNER JOIN iglesias ON iglesias.igl_id=solicitudes_sugerencias.igl_id";
		}
		$opciones .= " WHERE solicitudes_sugerencias.sol_sug_tipo='".$tipo."'";
		if($_SESSION['user_tipo'] == 'I') $opciones .= " AND solicitudes_sugerencias.igl_id=".$_SESSION['user_igl'];
		$this->bd->opciones($opciones);
		$this->bd->leer_datos();
		$this->resultados = $this->bd->array_asociativo();
		if($tipo == "sol") $titulo = "solicitudes de inscripci&oacute;n";
		else $titulo = "sugerencias de actualizaci&oacute;n";
		if(!empty($this->resultados)) {
			echo '<link href="estilo.css" rel="stylesheet" type="text/css">'."\n";
			echo '<script type="text/javascript" src="../Scripts/jquery-ui/js/jquery-1.7.1.min.js"></script>'."\n";
			echo '<script type="text/javascript" src="../Scripts/jquery.tools.min.js"></script>'."\n";
			echo '<script type="text/javascript" src="../Scripts/sol_sug.js"></script>'."\n";
			echo '<span id="titulos">'.ucfirst($titulo).'</span><br /><br />'."\n";
			echo '<table id="vli_table" cellpadding="2" cellspacing="0" align="center" width="100%">'."\n";
			echo "<thead class=\"thead\">\n";
			echo "<th>Iglesia</th>\n";
			echo "<th>Solicitada por</th>\n";
			echo "<th>Acciones</th>\n";
			echo "</thead>\n";
			foreach($this->resultados as $valor) {
				echo "<tr>\n<td style=\"border-left: 1px solid #700095; border-top: 1px solid #700095; border-bottom: 1px solid #700095;\">\n";
				$tam = NULL;
				if($tipo == "sug") { $iglesia = $valor['igl_nombre']; $tam = "width:900 heigh:70%"; }
				elseif($tipo == "sol") { $iglesia = $valor['sol_sug_nombre']; $tam = "width:600 heigh:100%"; }
				echo $iglesia;
				echo '<span id="titulos">';
				if($valor['igl_sede'] != 0) echo " Sede";
				else echo " Principal";
				echo '</span>';
				echo "</td>\n<td style=\"border-top: 1px solid #700095; border-bottom: 1px solid #700095;\">\n";
				echo $valor['sol_sug_ins_nombre'];
				echo "</td>\n<td width=\"100\" style=\"border-right: 1px solid #700095; border-top: 1px solid #700095; border-bottom: 1px solid #700095;\">\n";
				echo '<a id="link" href="index3.php?op=34&id='.$valor['sol_sug_id'].'&e='.$valor['sol_sug_tipo'].'" class="lytebox" data-title="ver solicitud/sugerencia de '.$iglesia.'" data-lyte-options="'.$tam.' forceCloseClick:true afterEnd:actualizar args:'.$op.'">';
				echo '<img src="../imagenes/iconos_admin/icono_admin-iglesia_edit.png" width="37" height="37" border="0" title="Editar" />';
				echo '</a>&nbsp;&nbsp;'."\n";
				echo '<a id="link" href="#Eliminar" title="Elimiar Iglesia" id="eliminariglesia"';
				if($tipo == "sol") $valor['igl_id'] = $valor['sol_sug_id'];
				echo ' onclick="eliminar(\''.$valor['igl_id'].'\', \''.$op.'\')"';
				echo '>';
				echo '<img src="../imagenes/iconos_admin/icono_admin-eliminar_iglesia.png" width="37" height="37" border="0" title="Eliminar" />';
				echo '</a>'."\n";
				echo "</td>\n</tr>\n";
			}
			echo "</table>\n";
		}
		else {
			$this->mensaje = new mensajes_globales("No existen ".$titulo, 1);
			$this->mensaje->mostrar_mensaje();
		}
	}
	
	function eliminar_sol_sug($id, $op) {
		if(!empty($id)) {
			$this->bd->tabla("solicitudes_sugerencias");
			$this->bd->opciones("WHERE sol_sug_id='".$id."'");
			$this->bd->eliminar();
			$this->bd->ejecutar_query();
			$mensaje = new mensajes_globales("Se ha elimnado la solicitud/sugerencia No. ".$id, 1);
			$mensaje->mostrar_mensaje();
		}
		if($op == 7) $tipo = "sug";
		if($op == 8) $tipo = "sol";
		$this->solicitudes_sugerencias($tipo, $op);
	}
	
	function ver_sol_sug($id, $tipo) {
		if(!empty($id)) {
			$this->bd->tabla("solicitudes_sugerencias");
			if($tipo == "sug") {
				$this->bd->datos("solicitudes_sugerencias.*");
				$this->bd->opciones("WHERE sol_sug_id='".$id."'");
			}
			else {
				$this->bd->datos("solicitudes_sugerencias.*, localidades.nombre as city_name");
				$this->bd->opciones("INNER JOIN localidades ON localidades.id = solicitudes_sugerencias.city_id AND localidades.id_idioma='7' 
									 WHERE sol_sug_id='".$id."'");
			}
			$this->bd->leer_datos();
			//$this->bd->mostrar_sql();
			$this->resultados = $this->bd->fila_unica();
			$this->bd->tabla("iglesias");
			$this->bd->datos("*");
			$this->bd->opciones("WHERE igl_id='".$this->resultados['igl_id']."'");
			$this->bd->leer_datos();
			//$this->bd->mostrar_sql();
			$this->iglesia = $this->bd->fila_unica();
			if($tipo == "sug") require_once("forms/sugerencia.html.php");
			if($tipo == "sol") require_once("forms/inscripcion.html.php");
		}
	}
	
	function actualizar_sugerencia($id) {
		$this->cargar_request();
		$this->bd->tabla("iglesias");
		$datos = NULL;
		if($this->form['sug_nombre_act'] == true) $datos .= "igl_nombre='".$this->form['sug_nombre']."'";
		if($this->form['sug_pastor_ppal_act'] == true) {
			if(!empty($datos)) $datos .= ", ";
			$datos .= "igl_pastor_ppal='".$this->form['sug_pastor_ppal']."'";
		}
		if($this->form['sug_telefono_Act'] == true) {
			if(!empty($datos)) $datos .= ", ";
			$datos .= "igl_telefono='".$this->form['sug_telefono']."'";
		}
		if($this->form['sug_movil_act'] == true) {
			if(!empty($datos)) $datos .= ", ";
			$datos .= "igl_celular='".$this->form['sug_movil']."'";
		}
		if($this->form['sug_pbx_act'] == true) {
			if(!empty($datos)) $datos .= ", ";
			$datos .= "igl_pbx='".$this->form['sug_pbx']."'";
		}
		if($this->form['sug_dir_act'] == true) {
			if(!empty($datos)) $datos .= ", ";
			$datos .= "igl_direccion='".$this->form['sug_dir']."'";
		}
		if($this->form['sug_mail_act'] == true) {
			if(!empty($datos)) $datos .= ", ";
			$datos .= "igl_email='".$this->form['sug_mail']."'";
		}
		if($this->form['sug_web_act'] == true) {
			if(!empty($datos)) $datos .= ", ";
			$datos .= "igl_web='".$this->form['sug_web']."'";
		}
		$this->bd->datos($datos);
		$this->bd->opciones("WHERE igl_id='".$this->form['igl_id']."'");
		$this->bd->actualiza();
		echo '<link href="estilo.css" rel="stylesheet" type="text/css">'."\n";
		if($this->bd->ejecutar_query() == true){
			$this->bd->tabla("solicitudes_sugerencias");
			$this->bd->opciones("WHERE sol_sug_id='".$this->form['id']."'");
			$this->bd->eliminar();
			$this->bd->ejecutar_query();
			$mensaje = new mensajes_globales("La iglesia se ha actualizado con exito", 1);
		}
		else $mensaje = new mensajes_globales("No se pudo actualizar la iglesia, intentelo m&aacute;s tarde por favor", 2);
		$mensaje->mostrar_mensaje();
	}
	
	function inscribir_solicitud($id) {
		$this->cargar_request();
		//creamos el usuario para poder crear la iglesia
		if(!empty($this->form['nouser'])) $this->form['user'] = $this->form['nouser'];
		elseif(!empty($this->form['sug_email'])) $this->form['user'] = $this->form['sug_email'];
		if(!empty($this->form['user'])) {
			$this->usr = new usuario();
			$res_usr = $this->usr->verifica_nombre_usuario($this->form['user']);
			if($res_usr == true) {
				echo '<link href="estilo.css" rel="stylesheet" type="text/css">'."\n";
				$mensaje = new mensajes_globales("El nombre de usuario ya existe, por favor cree un nombre de usuario diferente", 2);
				$mensaje->mostrar_mensaje();
				echo "<br>";
				$this->ver_sol_sug($this->form['id'], "sol");
				exit();
			}
			else {
				$this->bd->tabla("usuarios");
				$this->bd->columnas("usr_login, usr_clave, usr_status, usr_token, usr_tipo, usr_depende");
				$form = $this->usr->genera_clave_token();
				$this->form['clave'] = $form['clave'];
				$this->form['token'] = $form['token'];
				unset($form);
				$this->bd->datos("'".$this->form['user']."', '".md5($this->form['clave'])."', 'A', '".$this->form['token']."', 'I', '0'");
				$this->bd->insert();
				$res_usr = $this->bd->ejecutar_query();
				$usrid = $this->bd->ultimo_id();
			}
		}
		else {
			$usrid = $_SESSION['user_01800'];
			$res_usr = true;
		}
		//enviamos correo y creamos la iglesia con el usuario asignado
		if($res_usr == true) {
			$this->usr->envio_correo_usuario($this->form, 1);
			$this->bd->tabla("iglesias");
			$this->bd->columnas("igl_nombre, igl_pastor_ppal, igl_telefono, igl_pbx, igl_celular, city_id, igl_actualizada, igl_estado, igl_sede, usr_id, evg_id");
			$this->bd->datos("'".$this->form['sug_nombre']."', '".$this->form['sug_pastor']."', '".$this->form['sug_telefono']."', '"
							 .$this->form['sug_pbx']."', '".$this->form['sug_movil']."', '".$this->form['sug_city']."', '".date("Y-m-d h:i:s")
							 ."', 'IA', '0', '".$usrid."', '1'");
			$this->bd->insert();
			$res_igl = $this->bd->ejecutar_query();
		}
		//$this->bd->mostrar_sql();
		echo '<link href="estilo.css" rel="stylesheet" type="text/css">'."\n";
		if($res_igl == false)
			$mensaje = new mensajes_globales("No se pudo crear la iglesia, intentelo m&aacute;s tarde por favor", 2);
		if($res_usr == false)
			$mensaje = new mensajes_globales("No se pudo crear el usuario de la iglesia, por favor creelo desde el administrador de usuarios.", 2);
		if($res_igl == true and $res_usr == true) {
			$this->bd->tabla("solicitudes_sugerencias");
			$this->bd->opciones("WHERE sol_sug_id='".$this->form['id']."'");
			$this->bd->eliminar();
			$this->bd->ejecutar_query();
			$msg = "La iglesia se ha creado con exito bajo el nombre de ".$this->form['sug_nombre'];
			$mensaje = new mensajes_globales($msg, 1);
		}
		$mensaje->mostrar_mensaje();
	}
	
	function cargar_texto_01800($e = false) {
		$nombre_fichero = "../01800.txt";
		if($e == false) {
			$nombre_fichero = "../01800.txt";
			$file = fopen($nombre_fichero, "r");
			$contenido = fread($file, filesize($nombre_fichero));
			require_once("forms/editar_01800.html.php");
		}
		else {
			//print_r($_REQUEST['texto']);exit();
			$buffer = $_REQUEST['texto'];
			$buffer = str_replace("\\\"",'', $buffer);
			$file = fopen($nombre_fichero, "w+");
			fwrite ($file,$buffer);
			$mensaje = new mensajes_globales("Se ha editado el archivo correctamente", 1);
			$mensaje->mostrar_mensaje();
		}
		fclose($file);
	}
	
	function redimensionar_imagen($ancho = 100, $alto = 100, $file = NULL, $aling = "absmiddle", $hspace = 0, $vspace = 0) {
		if(!empty($file)) {
			if(file_exists($file)) {
				$tmp = getimagesize($file);
				if($tmp[0] > $ancho || $tmp[1] > $alto) {
					if($tmp[0] > $tmp[1]) { $width = $ancho; $height = ($ancho * $tmp[1])/$tmp[0]; }
					elseif($tmp[0] < $tmp[1]) { $width = ($alto * $tmp[0])/$tmp[1]; $height = $alto; }
					elseif($tmp[0] == $tmp[1]) { $width = $ancho; $height = $alto; }
				}
				else { $width = $tmp[0]; $height = $tmp[1]; }
				return '<img src="'.$file.'" width="'.$width.'" height="'.$height.'" align="'.$aling.'" hspace="'.$hspace.'" vspace="'.$vspace.'" />'."\n";
			}
			else return false;
		}
		else return false;
	}
	
	function check($valor = 'Y', $link = true, $href = 'op=', $tag = "index", $lug = "#panel_derecho_menu", $pag = "index3") {
		if($valor == "Y") $file = "icono_admin-public_activa";
		else $file = "icono_admin-public_inactiva";
		if($link == true) $editar = '<a href="#'.$tag.'" onclick="recargar(\''.$pag.'\',\''.$href.'\',\''.$lug.'\')">';
		$editar .= '<img src="../imagenes/iconos_admin/'.$file.'.png" width="37" height="37" align="absmiddle" border="0" />'."\n";
		if($link == true) $editar .= '</a>';
		return $editar;
	}
	
	function editar($href = 'op=', $tag = "index", $tipo = array("ajax"), $lug = "#panel_derecho_menu", $pag = "index3") {
		if($tipo[0] == 'ajax') $editar = '<a href="#'.$tag.'" onclick="recargar(\''.$pag.'\',\''.$href.'\',\''.$lug.'\')">';
		elseif($tipo[0] == 'lytebox')
			$editar = '<a href="'.$pag.'.php?'.$href.'" class="lytebox" data-title="'.$tipo[1].'" data-lyte-options="'.$tipo[2].'">';
		$editar .= '<img src="../imagenes/iconos_admin/icono_admin-public_actuliz.png" width="37" height="37" align="absmiddle" border="0" />';
		$editar .= '</a>'."\n";
		return $editar;
	}
	
	//todo lo relacionado con modelos de evangelismo
	function modelos_evangelismo() {
		$this->cargar_request();
		switch($this->form['omde']) {
			case 'listar'	: $this->listar_mde();
							  break;
			case 'crear'	: $this->crear_mde();
							  break;
			case 'editar'	: $this->editar_mde();
							  break;
			case 'guardar'	: $this->guardar_mde();
							  break;
			case 'eliminar'	: $this->eliminar_mde();
							  break;
			default			: $this->listar_mde();
							  break;
		}
	}
	
	function cargar_mde() {
		$this->bd->tabla("mod_evangelismo");
		$this->bd->datos("*");
		$this->bd->opciones("WHERE evg_id <> '1'");
		$this->bd->leer_datos();
		return $this->bd->array_asociativo();
	}
	
	function cargar_1mde() {
		$this->bd->tabla("mod_evangelismo");
		$this->bd->datos("*");
		$this->bd->opciones("WHERE evg_id <> '1' AND evn_id='".$this->form['evg_id']."'");
		$this->bd->leer_datos();
		return $this->bd->array_asociativo();
	}
	
	function listar_mded() {
		$this->resultados = $this->cargar_mde();
		if(!empty($this->resultados)) {
			$mensaje = new mensajes_globales("No existen modelos de evangelismo", 2);
			$mensaje->mostrar_mensaje();
		}
	}
	
	function comprobar_compatibilidad($explorador) {
		if($explorador['browsertype'] == "MSIE") {
			if($explorador['version'] ==  5.5 || $explorador['version'] ==  6.0) return 1;
			else return 0;		
		}
		else return 0;	
	}
	
	public function cargarRequest($array) {
		if(!is_null($array)) :
			$post = array();
			foreach($array as $key=>$value) :
				if(is_array($value)) :
					$post[$k] = $this->cargarRequest($array);
				else :
					$post[$key] = htmlspecialchars(trim($value), ENT_QUOTES, "UTF-8");
				endif;
			endforeach;
			return $post;
		else : return NULL;
		endif;
	}
}
?>
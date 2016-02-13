<?php
defined( '_01800' ) or die('Acceso no permitido');

//Clase de iglesia
class Iglesia {
	private $pag;
	private $bd;
	private $resultados;
	private $iglesia;
	var $total_iglesias;
	private $total_paginas;
	var $op;
	private $admin;
	var $id;
	private $form;
	private $mensajes;
	private $texto_busqueda;
	private $lugar_busqueda;
	var $nombre;
	
	//Función constructora
	function __construct($pag = 1, $op = NULL) {
		if(!empty($this->op)) $this->op = $op;
		else $this->op = 1;
		$this->pag = $pag;
		if($this->pag < 1) $this->pag = 1;
		$this->admin = new Administracion();
		$this->bd = new BDManejo($this->pag);
		$this->bd->tabla("iglesias");
		$this->bd->datos("COUNT(*)");
		unset($this->bd->limite);
		if(isset($_SESSION['user_tipo'])) {
			if($_SESSION['user_tipo'] != 'SA') {
				if($_SESSION['user_tipo'] == 'AI')
					$this->bd->opciones("WHERE igl_id = '".$_SESSION['user_igl']."' OR igl_sede = '".$_SESSION['user_igl']."'");
				else $this->bd->opciones("WHERE igl_id = '".$_SESSION['user_igl']."'");
			}
		}
		$this->total_iglesias = $this->bd->dato_unico();
	}
	
	function cargar_iglesias_autocompletar($tipo = NULL, $term = NULL) {
		$this->bd->tabla("iglesias");
		switch($tipo) {
			case 1 : $this->bd->datos("DISTINCT(igl_nombre)");
					 if(!empty($term)) $opciones = "WHERE igl_nombre REGEXP LOWER('".$term."')";
					 else $opciones = "WHERE igl_sede='0' AND igl_nombre REGEXP LOWER('".$term."')";
					 break;
			case 2 : $this->bd->datos("igl_id, igl_nombre");
					 if(!empty($term)) $opciones = "WHERE igl_nombre REGEXP LOWER('".$term."')";
					 else $opciones = "WHERE igl_sede='0' AND igl_nombre REGEXP LOWER('".$term."')";
					 break;
			case 3 : $this->bd->datos("DISTINCT(igl_rep_legal)");
					 if(!empty($term)) $opciones = "WHERE igl_rep_legal REGEXP LOWER('".$term."')";
					 else $opciones = "WHERE igl_sede='0' AND igl_rep_legal REGEXP LOWER('".$term."')";
					 break;
			default: $this->bd->datos("DISTINCT(igl_nombre)");
					 if(!empty($term)) $opciones = "WHERE igl_nombre REGEXP LOWER('".$term."')";
					 else $opciones = "WHERE igl_sede='0' AND igl_nombre REGEXP LOWER('".$term."')";
					 break;
		}
		$this->bd->opciones($opciones);
		$this->bd->leer_datos();
		$this->resultados = $this->bd->array_asociativo();
		foreach($this->resultados as $value) {
			switch($tipo) {
				case 1 : $this->res[] = array( "label" => $value['igl_nombre'], "value" => $value['igl_nombre'] );
						 break;
				case 2 : $this->res[] = array( "label" => $value['igl_nombre'],"value" => $value['igl_nombre']."::".$value['igl_id'] );
						 break;
				case 3 : $this->res[] = array( "label" => $value['igl_rep_legal'], "value" => $value['igl_rep_legal'] );
						 break;
				default: $this->res[] = array( "label" => $value['igl_nombre'], "value" => $value['igl_nombre'] );
						 break;
			}
		}
		echo json_encode($this->res);
		unset($this->res);
	}
	
	function cargar_iglesia_basico() {
		$this->bd->tabla("iglesias");
		$datos = "iglesias.*, localidades.id as localidad_id, localidades.nombre as localidad_nombre, regiones.id as region_id, ";
		$datos .= "regiones.nombre as region_nombre, paises.id as pais_id, paises.nombre as pais_nombre, continentes.id as continente_id, ";
		$datos .= "continentes.nombre as continente_nombre";
		$this->bd->datos($datos);
		$opciones = "INNER JOIN localidades ON iglesias.city_id=localidades.id AND localidades.id_idioma='7' ";
		$opciones .= "INNER JOIN regiones ON localidades.id_region=regiones.id AND regiones.id_idioma='7' ";
		$opciones .= "INNER JOIN paises ON localidades.id_pais=paises.id AND paises.id_idioma='7' ";
		$opciones .= "INNER JOIN continentes ON localidades.id_continente=continentes.id AND continentes.id_idioma='7' ";
		$opciones .= "WHERE iglesias.igl_id='".$this->id."'";
		$this->bd->opciones($opciones);
		$this->bd->leer_datos();
		//$this->bd->mostrar_sql();
		$this->resultados = $this->bd->array_asociativo();
		//print_r($this->resultados);
	}
	
	//funcion que nos muestra las iglesias que tenemos en nuestra base de datos
	function ver_lista_iglesias() {
		if(!empty($this->total_iglesias)) {
			echo '<link href="estilo.css" rel="stylesheet" type="text/css">'."\n";
			echo '<script type="text/javascript" src="../Scripts/jquery-ui/js/jquery-1.7.1.min.js"></script>'."\n";
			echo '<script type="text/javascript" src="../Scripts/jquery.tools.min.js"></script>'."\n";
			echo '<script type="text/javascript" src="../Scripts/main_igl.js"></script>'."\n";
			$this->bd->limite = (($this->pag - 1) * 20).",20";
			$this->total_paginas = ceil($this->total_iglesias/20);
			echo '<span id="titulos">Total iglesias encontradas: </span>'.number_format($this->total_iglesias)."<p></p>\n";
			$this->bd->datos("iglesias.igl_id, iglesias.igl_nombre, iglesias.igl_sede, localidades.nombre as loc_nombre, paises.nombre as pais_nombre");
			$opciones = "INNER JOIN localidades ON iglesias.city_id=localidades.id AND localidades.id_idioma='7' ";
			$opciones .= "INNER JOIN regiones ON localidades.id_region=regiones.id AND regiones.id_idioma='7' ";
			$opciones .= "INNER JOIN paises ON localidades.id_pais=paises.id AND paises.id_idioma='7' ";
			if($_SESSION['user_tipo'] != 'SA') {
				if($_SESSION['user_tipo'] == 'AI')
					$opciones .= "WHERE igl_id = '".$_SESSION['user_igl']."' OR igl_sede = '".$_SESSION['user_igl']."'";
				else $opciones("WHERE igl_id = '".$_SESSION['user_igl']."'");
			}
			$this->bd->opciones($opciones." ORDER BY iglesias.igl_nombre ASC, iglesias.igl_id ASC");
			$this->bd->leer_datos();
			//$this->bd->mostrar_sql();
			$this->resultados = $this->bd->array_asociativo();
			$this->op = 1;
			$this->mostrar_tabla_iglesias();
		}
		else {
			$mensaje = new mensajes_globales("No existen iglesias en la base de datos", 1);
			$mensaje->mostrar_mensaje();
		}
	}
	
	private function mostrar_tabla_iglesias($tipo = NULL, $texto_busqueda = NULL, $lugar_busqueda = true, $back = 1) {
		echo '<div id="paginacion">'."\n";
		$this->admin->mostrar_paginacion($this->pag, $this->total_paginas, $this->op, $tipo, $texto_busqueda, $lugar_busqueda);
		echo '</div>'."\n";
		echo '<input type="hidden" id="pag" value="'.$this->pag.'" />'."\n";
		echo '<table id="vli_table" cellpadding="2" cellspacing="3" align="center" width="100%">'."\n";
		foreach($this->resultados as $valor) {
			echo "<tr>\n<td style=\"border-bottom: 1px solid #700095;\">\n";
			$iglesia = ucwords($valor['igl_nombre']);
			echo '<span id="titulos">';
			echo $iglesia;
			echo '</span><br>';
			if($valor['igl_sede'] != 0) echo " Sede";
			else echo " Principal";
			echo " - ".$valor['loc_nombre'].", ".$valor['pais_nombre'];
			echo "</td>\n<td width=\"150\" align=\"center\" style=\"border-bottom: 1px solid #700095;\">\n";
			//if($_SESSION['user_tipo'] == "SA" || $_SESSION['user_tipo'] == $valor['user_igl']) {
				echo '<a href="#Editar" title="Editar" onclick="recargar(\'index3\',\'op=2&e=true&id='.$valor['igl_id'].'&pag='.$this->pag.'&back='.$this->op.'&palabra='.$texto_busqueda.'&categoria='.$lugar_busqueda.'\',\'#panel_derecho_menu\')">';
				echo '<img src="../imagenes/iconos_admin/icono_admin-iglesia_edit.png" width="37" height="37" border="0" title="Editar" />';
				echo '</a>&nbsp;&nbsp;'."\n";
				echo '<a href="#Editar_informacion_adicional" title="Editar informaci&oacute;n adicional" onclick="recargar(\'index3\',\'op=25&id='.$valor['igl_id'].'&pag='.$this->pag.'&back='.$this->op.'&palabra='.$texto_busqueda.'&categoria='.$lugar_busqueda.'\',\'#panel_derecho_menu\')">';
				echo '<img src="../imagenes/iconos_admin/icono_admin-infoadicional.png" width="37" height="37" border="0" title="Editar informaci&oacute;n adicional" />';
				echo '</a>&nbsp;&nbsp;'."\n";
				echo '<a href="#Eliminar" title="Elimiar Iglesia" id="eliminariglesia"';
				echo ' onclick="eliminar('.$valor['igl_id'].')"';
				echo '>';
				echo '<img src="../imagenes/iconos_admin/icono_admin-eliminar_iglesia.png" width="37" height="37" border="0" title="Eliminar" />';
				echo '</a>'."\n";
			}
			echo "</td>\n</tr>\n";
		//}
		echo "</table>\n";
		echo '<div id="paginacion">'."\n";
		$this->admin->mostrar_paginacion($this->pag, $this->total_paginas, $this->op, $tipo, $texto_busqueda, $lugar_busqueda);
		echo '</div>'."\n";
	}
	
	function deleteiglesia($id) {
		if(!empty($id)) {
			$this->bd->tabla("audio_video");
			$this->bd->opciones("WHERE igl_id='".$id."'");
			$this->bd->eliminar();
			$this->bd->ejecutar_query();
			$this->bd->tabla("boletines");
			$this->bd->opciones("WHERE igl_id='".$id."'");
			$this->bd->eliminar();
			$this->bd->tabla("contactenos");
			$this->bd->opciones("WHERE igl_id='".$id."'");
			$this->bd->eliminar();
			$this->bd->tabla("cultos");
			$this->bd->opciones("WHERE igl_id='".$id."'");
			$this->bd->eliminar();
			$this->bd->ejecutar_query();
			$this->bd->tabla("educativos");
			$this->bd->opciones("WHERE igl_id='".$id."'");
			$this->bd->eliminar();
			$this->bd->ejecutar_query();
			$this->bd->tabla("redes_igle");
			$this->bd->opciones("WHERE igl_id='".$id."'");
			$this->bd->eliminar();
			$this->bd->ejecutar_query();
			$this->bd->tabla("eventos");
			$this->bd->opciones("WHERE igl_id='".$id."'");
			$this->bd->eliminar();
			$this->bd->ejecutar_query();
			$this->bd->tabla("grupos");
			$this->bd->opciones("WHERE igl_id='".$id."'");
			$this->bd->eliminar();
			$this->bd->ejecutar_query();
			$this->bd->tabla("solicitudes_sugerencias");
			$this->bd->opciones("WHERE igl_id='".$id."'");
			$this->bd->eliminar();
			$this->bd->ejecutar_query();
			$this->bd->tabla("iglesias");
			$this->bd->opciones("WHERE igl_id='".$id."'");
			$this->bd->eliminar();
			$this->bd->ejecutar_query();
			$this->bd->ejecutar_query();
		}
		header("Location: index3.php?op=1&pag=".$this->pag);
	}
	
	function ins_iglesia($e = false, $id = NULL, $op = 1, $texto_busqueda = NULL, $lugar_busqueda = NULL) {
		if(empty($_REQUEST['inc']) and $_REQUEST['inc'] == false) {
			echo '<link href="../Scripts/jquery-ui/css/smoothness/jquery-ui-1.8.17.custom.css" rel="stylesheet" type="text/css">'."\n";
			echo '<script type="text/javascript" src="../Scripts/jquery-ui/js/jquery-1.7.1.min.js"></script>'."\n";
			echo '<script type="text/javascript" src="../Scripts/jquery-ui/js/jquery-ui-1.8.17.custom.min.js"></script>'."\n";
			echo '<script type="text/javascript" src="../Scripts/jquery-ui/development-bundle/ui/i18n/jquery.ui.datepicker-es.js"></script>'."\n";
			echo '<script type="text/javascript" src="../Scripts/jquery.form.js"></script>'."\n";
			echo '<script type="text/javascript" src="../Scripts/jquery.validate.js"></script>'."\n";
			echo '<script type="text/javascript" src="../Scripts/jquery.validate.additional-methods.js"></script>'."\n";
			echo '<script src="../Scripts/iglesia.js"></script>';
			echo '<script type="text/javascript" src="../Scripts/ins_iglesia.js"></script>'."\n";
		}
		unset($this->resultados);		
		if($e == true and !empty($id)) {
			$this->id = $id;
			$o = "op=13&amp;id=".$id."&amp;pag=".$this->pag;
			$this->cargar_iglesia_basico();
			echo '<div id="back_interno">';
			echo '<a href="#regresar" title="regresar" onclick="recargar(\'index3\',\'op='.$op.'&pag='.$this->pag.'&palabra='.$texto_busqueda.'&categoria='.$lugar_busqueda.'\',\'#panel_derecho_menu\')">';
			echo '<img src="../imagenes/iconos_admin/icono_admin-regresar.png" align="absmiddle" /> Regresar';
			echo '</a></div>';
			//echo "<pre>";print_r($this->resultados);echo "</pre>";
		}
		else {
			$o = "op=12"."&amp;pag=".$this->pag;
		}
		require_once("forms/ins_iglesia.html.php");		
	}
	
	function armar_logos_form($inc = false) {
		if($inc == true) {
			echo '<link href="../Scripts/jquery-ui/css/smoothness/jquery-ui-1.8.17.custom.css" rel="stylesheet" type="text/css">'."\n";
			echo '<link href="estilo.css" rel="stylesheet" type="text/css">'."\n";
			echo '<script type="text/javascript" src="../Scripts/jquery-ui/js/jquery-1.7.1.min.js"></script>'."\n";
			echo '<script type="text/javascript" src="../Scripts/jquery-ui/js/jquery-ui-1.8.17.custom.min.js"></script>'."\n";
			echo '<script>'."\n";
			echo '$(document).ready(function() {'."\n";
			echo '	$( "#tabs" ).tabs({ selected: 0 });'."\n";
			echo '});'."\n";
			echo '</script>'."\n";
			echo '<script src="../Scripts/iglesia.js"></script>'."\n";
		}
		$archivos = $this->admin->cargar_directorio();
		$ta = count($archivos);
		$alfabeto = array("a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u",
						  "v", "w", "x", "y", "z");//26
		echo '<div id="tabs" class="mostrar_logos">'."\n";
		echo '<ul>'."\n";
		$txa = array();
		for($i=0; $i<26; ++$i) {
			$z=0;
			for($x=0; $x<$ta; ++$x) {
				$tmp = str_split(strtolower($archivos[$x]));
				if($alfabeto[$i] == $tmp[0]) $z++;
			}
			$txa[$i] = $z;
			if($txa[$i] > 0) {
				echo '<li>';
				echo '<a href="#tabs-';
				echo $a = $i + 1;
				echo '">'.$alfabeto[$i]."</a>";
				echo "</li>\n";
			}
			
		}
		echo '</ul>'."\n";
		$r = 0;
		$tac = $ta / 5;
		for($i=0; $i<26; ++$i) {
			echo '<div id="tabs-';
			echo $a = $i + 1;
			echo '">'."\n";
			echo '<table border="0">'."\n";
			echo '<tr>'."\n";
			$c = $b = 1;
			$style = NULL;
			for($x=0; $x<$ta; ++$x) {
				$tmp = str_split(strtolower($archivos[$x]));
				if($alfabeto[$i] == $tmp[0]) {
					if(!empty($this->resultados[0]['igl_logo'])) {
						if($this->resultados[0]['igl_logo'] == $archivos[$x]) {
							$this->resultados['id_td'] = $r;
							$style = "background-color:#421867; color:#FFFFFF";
						}
					}
					echo '<td';
					if($txa[$i] > 5) echo ' width="20%"';
					echo ' id="'.$r.'" align="center" style="cursor:pointer; padding: 5px';
					if(!empty($style)) { echo "; ".$style; unset($style); }
					echo '"';
					echo ' onclick="seleccionar(\''.$archivos[$x].'\', \''.$r.'\')">'."\n";
    	            $tmp = getimagesize('../archivos_iglesias/logos/'.$archivos[$x]);
   	    	        if($tmp[0] > 100 || $tmp[1] > 100) {
       	    	        if($tmp[0] > $tmp[1]) { $width = 100; $height = (100 * $tmp[1])/$tmp[0]; }
                	    elseif($tmp[0] < $tmp[1]) { $width = (100 * $tmp[0])/$tmp[1]; $height = 100; }
                    	elseif($tmp[0] == $tmp[1]) { $width = 100; $height = 100; }
					}
					else { $width = $tmp[0]; $height = $tmp[1]; }
    	            echo '<img src="../archivos_iglesias/logos/'.$archivos[$x].'" width="'.$width.'" height="'.$height.'" align="texttop" />'."\n";
					echo '<br /><span style="font-size: small">'.strtolower($archivos[$x]).'</span>'."\n";
   	   		        $b++;
       	    	    if($b > $tac) {$b = 1; echo '</td>'."\n"; }
               		$c++;
                	if($c > 5) {$c =1; echo '</tr>'."\n".'<tr>'."\n"; }
					$r++;
				}
			}
			echo "</tr>\n</table>\n</div>\n";
		}
		echo '</div>'."\n";
	}
	
	function guardar_iglesia(){
		$this->form = $this->admin->cargar_request();
		if($this->form["sede_tipo"] == "np") {
			if(empty($this->form["iglesia_ppal"]) || $this->form["iglesia_ppal"] == "escriba el nombre de la iglesia principal...") {
				$this->mensajes = new mensajes_globales("Por favor ingrese la iglesia de la que depende la nueva", 3);
				$this->mensajes->mostrar_mensaje();
				exit();
			}
			else {
				$tmp = explode("::", $this->form["iglesia_ppal"]);
				$this->form["iglesia_ppal"] = $tmp[1];
			}
		}
		else $this->form['iglesia_ppal'] = 0;
		$this->bd->tabla("iglesias");
		$this->bd->columnas("igl_nombre, igl_pastor_ppal, igl_rep_legal, igl_direccion, igl_telefono, igl_pbx, igl_celular, igl_email, city_id, 
							igl_web, igl_logo, igl_resolucion, igl_cuenta, igl_fecha_fundacion, igl_actualizada, usr_id, igl_sede, igl_skype");
		$this->bd->datos("'".$this->form['nombre']."','".$this->form['pastorppal']."','".$this->form['replegal']."','".$this->form['dir']."',".
						"'".$this->form['tel']."','".$this->form['pbx']."','".$this->form['cel']."','".$this->form['email']."',".
						"'".$this->form['ciudad']."','".$this->form['web']."','".$this->form['logo']."','".$this->form['resolucion']."',".
						"'".$this->form['cuenta']."',"."'".$this->form['fecha_fundacion']."','".date("Y-m-d H:i:s")."','".$_SESSION['user_01800'].
						"','".$this->form['iglesia_ppal']."','".$this->form['skype']."'");
		$this->bd->insert();
		//$this->bd->mostrar_sql();
		$this->resultados = $this->bd->ejecutar_query();
		$this->bd->desconecta();
		if($this->resultados == 1) {
			$this->mensajes = new mensajes_globales("La iglesia se ha creado con &eacute;xito.", 1);
			$this->mensajes->mostrar_mensaje();
		}
		else {
			$this->mensajes = new mensajes_globales("La iglesia no se ha podido crear.", 1);
			$this->mensajes->mostrar_mensaje();
		}
		unset($this->form);
	}
	
	function actualizar_iglesia(){
		$this->form = $this->admin->cargar_request();
		//echo "<pre>";print_r($this->form);echo "</pre>";
		if($this->form["sede_tipo"] == "NP") {
			if(empty($this->form["iglesia_ppal"]) || $this->form["iglesia_ppal"] == "escriba el nombre de la iglesia principal...") {
				$this->mensajes = new mensajes_globales("Por favor ingrese la iglesia de la que depende la nueva", 3);
				$this->mensajes->mostrar_mensaje();
				exit();
			}
			else {
				$tmp = explode("::", $this->form["iglesia_ppal"]);
				$this->form["iglesia_ppal"] = $tmp[1];
			}
		}
		else $this->form['iglesia_ppal'] = 0;
		$this->bd->tabla("iglesias");
		$this->bd->datos("igl_nombre='".$this->form['nombre']."',igl_pastor_ppal='".$this->form['pastorppal']."',".
						"igl_rep_legal='".$this->form['replegal']."',igl_direccion='".$this->form['dir']."',igl_telefono='".$this->form['tel']."',".
						"igl_pbx='".$this->form['pbx']."',igl_celular='".$this->form['cel']."',igl_email='".$this->form['email']."',".
						"city_id='".$this->form['ciudad']."',igl_web='".$this->form['web']."',igl_logo='".$this->form['logo']."',".
						"igl_resolucion='".$this->form['resolucion']."',"."igl_cuenta='".$this->form['cuenta']."',".
						"igl_fecha_fundacion='".$this->form['fecha_fundacion']."',"."igl_actualizada='".date("Y-m-d H:i:s")."',".
						"usr_id='".$_SESSION['user_01800']."',igl_sede='".$this->form['iglesia_ppal']."',igl_skype='".$this->form['skype']."'");
		$this->bd->opciones("WHERE igl_id='".$this->form['id']."'");
		$this->bd->actualiza();
		//$this->bd->mostrar_sql();
		$this->resultados = $this->bd->ejecutar_query();
		$this->bd->desconecta();
		if($this->resultados == 1) {
			$this->mensajes = new mensajes_globales("La iglesia se ha actualizado con &eacute;xito.", 1);
			$this->mensajes->mostrar_mensaje();
		}
		else {
			$this->mensajes = new mensajes_globales("La iglesia no se ha podido actualizar.", 1);
			$this->mensajes->mostrar_mensaje();
		}
		unset($this->form);
	}
	
	function iframe_predica($id, $tipo = NULL) {
		echo '<span id="formulario">'."\n";
		$src = "subir_predica.php?id=".$id;
		if($tipo == "editar") $src .= "&ed=true";
		echo '	<iframe id="iframeupload" style="height:200px; width: 100%; border:0; overflow: hidden" src="'.$src.'" name="iframeupload" />'."\n";
		echo '	<div id="formUpload">&nbsp;</div>'."\n";
		echo '</span>'."\n";
		echo '	<div id="multimedia">';
		$this->carga_multimedia($id);
		echo '</div>';
	}
	
	function carga_multimedia($id) {
		$this->id = $id;
		$this->bd->tabla("audio_video");
		$this->bd->datos("*");
		$this->bd->opciones("WHERE igl_id='".$this->id."'");
		$this->bd->leer_datos();
		$this->resultados = $this->bd->array_asociativo();
		if(!empty($this->resultados)) {
			echo '<script type="text/javascript" src="../Scripts/multimedia.js"></script>'."\n";
			echo '<script type="text/javascript">'."\n";
			echo 'function recargarm() {'."\n";
			echo '	opciones = "op=33&id='.$this->id.'";'."\n";
			echo '	var pagina="index3.php?"+opciones;'."\n";
			echo '		//alert(pagina);'."\n";
			echo '		$.post(pagina, function(data){'."\n";
			echo '			$("#multimedia").load($("#multimedia").html(data));'."\n";
			echo '			//eval(x);'."\n";
			echo '		});'."\n";
			echo '		$("#loading").hide();'."\n";
			echo '}'."\n";
			echo '</script>'."\n";
			//echo "<pre>";print_r($resultados); echo "</pre>";exit();
			echo '<p><table id="table" cellpadding="1" cellspacing="0" width="95%">'."\n";
			echo "<thead>\n\t";
			echo "<th>No.</th>\n<th>Nombre</th>\n<th>Archivo</th>\n<th>Tipo</th>\n<th width=\"120\">Acci&oacute;n</th>";
			echo "</thead>\n<tbody>\n\t";
			$i = 1;
			foreach($this->resultados as $valor) {
				echo "<tr>\n";
				echo "\t<td align=\"center\" style=\"border-left: 1px solid #700095; border-top: 1px solid #700095; border-bottom: 1px solid #700095;\">".$i."</td>\n";$i++;
				echo "\t<td style=\"border-top: 1px solid #700095; border-bottom: 1px solid #700095;\">".$valor['aud_vid_nombre']."</td>\n";
				echo "\t<td style=\"border-top: 1px solid #700095; border-bottom: 1px solid #700095;\">".ucfirst($valor['aud_vid_archivo'])."</td>\n";
				if($valor['aud_vid_tipo'] == "V") $t = "Video";
				elseif($valor['aud_vid_tipo'] == "A") $t = "Audio";
				elseif($valor['aud_vid_tipo'] == "E") $t = "Emisora";
				echo "\t<td id=\"img_iconos\" align=\"center\" style=\"border-top: 1px solid #700095; border-bottom: 1px solid #700095;\">".$t."</td>\n";
				echo "\t<td align=\"center\" style=\"border-right: 1px solid #700095; border-top: 1px solid #700095; border-bottom: 1px solid #700095;\">";
				$opciones = "op=25&id=".$this->id."&evt_id=".$valor['aud_vid_id']."&palabra=audio_video&e=editartitulo";
				echo '<a href="index3.php?'.$opciones.'" title="Editar titulo multimedia" class="lytebox" data-title="Editar titulo multimedia" ';
				echo 'data-lyte-options="width:400 height:100 forceCloseClick:true afterEnd:recargarm">';
				echo '<img src="../imagenes/iconos_admin/icono_admin-afiliacion_aceptada.png" width="37" height="37" border="0" />';
				echo '</a>&nbsp;&nbsp;'."\n";
				$opciones = "op=15&id=".$this->id."&aud_vid_id=".$valor['aud_vid_id']."&palabra=audio_video&e=eliminar";
				echo '<a id="links" href="#Eliminar multimedia" onclick="eliminarm(\''.$this->id.'\', \''.$valor['aud_vid_id'].'\', \''.$valor['vid_tipo'].'\')">';
				echo '<img src="../imagenes/iconos_admin/icono_admin-eliminar_iglesia.png" width="37" height="37" title="Eliminar multimedia" />';
				echo '</a>'."\n";
				echo "</td>\n";
				echo "</tr>\n";
			}
			echo "</tbody>\n</table></p>";
		}
	}
	
	function edita_multimedia($id, $avid, $avop = NULL) {
		echo '<link href="../estilo.css" rel="stylesheet" type="text/css">';
		if(empty($avop)) {
			$this->id = $id;
			$this->bd->tabla("audio_video");
			$this->bd->datos("aud_vid_nombre");
			$this->bd->opciones("WHERE igl_id='".$this->id."' AND aud_vid_id='".$avid."'");
			$this->bd->leer_datos();
			$this->resultados = $this->bd->dato_unico();
			echo '<form action="index3.php" method="post">'."\n";
			echo '<input type="hidden" name="op" value="40">'."\n";
			echo '<input type="hidden" name="id" value="'.$this->id.'">'."\n";
			echo '<input type="hidden" name="evt_id" value="'.$avid.'">'."\n";
			echo '<input type="text" name="titulo" value="'.$this->resultados.'">'."\n";
			echo '<button name="submit" type="submit">';
			echo '<img src="../imagenes/boton_ingreso.png" width="22" height="22" align="absmiddle"> ';
			echo 'Guardar t&iacute;tulo';
			echo '</button> '."\n";
		}
		elseif($avop == 1) {
			$this->id = $id;
			$this->bd->tabla("audio_video");
			$this->bd->datos("aud_vid_nombre='".htmlspecialchars(trim($_REQUEST['titulo']))."'", ENT_QUOTES, 'UTF-8');
			$this->bd->opciones("WHERE igl_id='".$this->id."' AND aud_vid_id='".$avid."'");
			$this->bd->actualiza();
			if($this->bd->ejecutar_query() == 1) $this->mensajes = new mensajes_globales("Se actualizo el t&iacute;tulo con exito", 1);
			else $this->mensajes = new mensajes_globales("No se actualizo el título con exito, intentelo m&aacute;s tarde", 2);
			$this->mensajes->mostrar_mensaje();
		}
	}
	
	function eliminar_multimedia($id, $avid, $tipo) {
		echo '<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />'."\n";
		echo '<link href="estilo.css" rel="stylesheet" type="text/css" />'."\n";
		if(!empty($id) and !empty($avid) and !empty($tipo)) {
			$this->bd->tabla("audio_video");
			$this->bd->opciones("WHERE aud_vid_id='".$avid."'");
			$elm = false;
			if($tipo == "archivo") {
				$this->bd->datos("aud_vid_archivo");
				$this->resultados = $this->bd->dato_unico();
				$archivo = "../archivos_iglesias/audio_video/".$this->resultados;
				if(file_exists($archivo) == true) $elm = unlink($archivo);
				else $elm = true;
			}
			$this->bd->eliminar();
			if($tipo == "archivo" and $elm == true and $this->bd->ejecutar_query() == true)
				$mensaje = new mensajes_globales("Se elimino la multimedia correctamente", 1);
			elseif($tipo != "archivo" and $elm == false and $this->bd->ejecutar_query() == true)
				$mensaje = new mensajes_globales("Se elimino la multimedia correctamente", 1);
			else $mensaje = new mensajes_globales("No se elimino la multimedia correctamente", 3);
			$mensaje->mostrar_mensaje();
			echo "<br />";
		}
		$this->iframe_predica($id);
	}
	
	function iframe_enlaceweb($id) {
			echo '<span id="formulario">'."\n";
			$src = "index3.php?id=".$id."&op=68&op2=form";
			if($tipo == "editar") $src .= "&ed=true";
			echo '	<iframe id="iframeupload" style="height:200px; width: 100%; border:0; overflow: hidden" src="'.$src.'" name="iframeupload" />'."\n";
			echo '	<div id="formUpload">&nbsp;</div>'."\n";
			echo '</span>'."\n";
	}
	
	function cargar_enlaceweb($op2 = "form") {
		$id = $_REQUEST['id'];
		$this->id = $id;
		switch($op2) :
			default			:
			case 'form'	:
				require_once("forms/enlaceweb.php");
				echo '	<div id="multimedia">';
				$this->cargar_iglesia_basico();
				if(!empty($this->resultados[0]['igl_img_web']))
					echo '<img src="../archivos_iglesias/web/'.$this->resultados[0]['igl_img_web'].'" width="auto" />';
				echo '</div>';
				break;
			case 'subir':
				if(!empty($_FILES)) :
					$archivo['nombre'] = $this->remplazarletras2($_FILES['archivo']['name']);
					$dir = '../archivos_iglesias/web/';
					$archivo['sizemb'] = number_format($_FILES['archivo']['size'] / 50331648, 4);
					if (!copy($_FILES['archivo']['tmp_name'], $dir.$archivo['nombre'])) :
						$mensaje = new mensajes_globales("No se pudo copiar el archivo", 3);
						$mensaje->mostrar_mensaje();
						require_once("forms/enlaceweb.php");
						echo '	<div id="multimedia">';
						$this->cargar_iglesia_basico();
						if(!empty($this->resultados[0]['igl_img_web']))
							echo '<img src="../archivos_iglesias/web/'.$this->resultados[0]['igl_img_web'].'" width="auto" />';
						echo '</div>';
						exit();
					endif;
				endif;
				$this->bd->tabla("iglesias");
				$this->bd->datos("igl_img_web='".$archivo['nombre']."'");
				$this->bd->opciones("WHERE igl_id='".$_POST['id']."'");
				$this->bd->actualiza();
				if($this->bd->ejecutar_query() == 1)
					$this->mensajes = new mensajes_globales("La imagen web de la iglesia ha sido actualizada con exito", 1);
				else $this->mensajes = new mensajes_globales("Se produjo un error", 2);
				$this->mensajes->mostrar_mensaje();
				require_once("forms/enlaceweb.php");
				echo '	<div id="multimedia">';
				$this->cargar_iglesia_basico();
				if(!empty($this->resultados[0]['igl_img_web']))
					echo '<img src="../archivos_iglesias/web/'.$this->resultados[0]['igl_img_web'].'" width="auto" />';
				echo '</div>';
				break;
		endswitch;
	}
	
	function busqueda($form = NULL){
		echo '<script type="text/javascript" src="../Scripts/jquery-ui/js/jquery-1.7.1.min.js"></script>'."\n";
		if(!empty($form)) {
			if(isset($_REQUEST['categoria']) and isset($_REQUEST['palabra'])) {
				$this->lugar_busqueda = mb_strtolower($_REQUEST['categoria'], 'ISO-8859-1');
				$this->texto_busqueda = mb_strtolower($_REQUEST['palabra'], 'ISO-8859-1');
			}
			else {
				$this->lugar_busqueda = mb_strtolower($_REQUEST['lb'], 'ISO-8859-1');
				$this->texto_busqueda = mb_strtolower($_REQUEST['tb'], 'ISO-8859-1');
			}
			$this->buscar();
			//$this->bd->mostrar_sql();
			$this->bd->datos("iglesias.igl_id, iglesias.igl_nombre, iglesias.igl_pastor_ppal, iglesias.igl_telefono, 
							  iglesias.igl_logo, iglesias.city_id, iglesias.igl_sede, localidades.id as loc_id, 
							  localidades.nombre as loc_nombre, regiones.id as reg_id, regiones.nombre as reg_nombre, 
							  paises.id as pais_id, paises.nombre as pais_nombre");
			$this->bd->limite = (($this->pag - 1) * 20).",20";
			$this->bd->leer_datos();
			//$this->bd->mostrar_sql();
			$this->resultados = $this->bd->array_asociativo();
			if(!empty($this->total_iglesias)) {
			?>
				<script type="text/javascript" src="../Scripts/jquery.tools.min.js"></script>
			    <script type="text/javascript">
					jQuery(document).ready(function() {
						jQuery("#link img[title]").tooltip({ position: "bottom center" });
					});
					function eliminar(id) {
        			    var entrar = confirm("¿Está seguro de eliminar la iglesia, se borraran todos los datos: eventos, grupos, etc., incluso las sugerencias de actualización?");
						if(entrar == true)
						{
							var pag = jQuery("#pag").val();
							var uri = "op=14&id="+id+"&pag="+pag;
							recargar('index3',uri,'#panel_derecho_menu');
						}
	    		    }
				</script>
		    <?php
				$this->total_paginas = ceil($this->total_iglesias/20);
				echo '<span id="titulos">Total iglesias encontradas: </span>'.number_format($this->total_iglesias)."<p></p>\n";
				$this->bd->leer_datos();
				//$this->bd->mostrar_sql();
				$this->resultados = $this->bd->array_asociativo();
				$this->op = 20;
				$this->mostrar_tabla_iglesias(1, $this->texto_busqueda, $this->lugar_busqueda);
			}
			else {
				$mensaje = new mensajes_globales("No existen resultados", 1);
				$mensaje->mostrar_mensaje();
			}
		}
	}
	
	function buscar() {
		if(isset($_REQUEST['categoria']) and isset($_REQUEST['palabra'])) {
			$this->lugar_busqueda = mb_strtolower($_REQUEST['categoria'], 'ISO-8859-1');
			$this->texto_busqueda = mb_strtolower($_REQUEST['palabra'], 'ISO-8859-1');
		}
		else {
			$this->lugar_busqueda = mb_strtolower($_REQUEST['lb'], 'ISO-8859-1');
			$this->texto_busqueda = mb_strtolower($_REQUEST['tb'], 'ISO-8859-1');
		}
		$this->l = 7;
		/*if($this->lugar_busqueda == "paises.nombre" || $this->lugar_busqueda == "localidades.nombre") {
			$this->texto_busqueda = htmlentities($_REQUEST['palabra'], ENT_QUOTES, "UTF-8");
			$this->l = 3;
		}
		if($this->lugar_busqueda == "igl_nombre" || $this->lugar_busqueda == "igl_pastor_ppal")
			$this->texto_busqueda = htmlentities($_REQUEST['palabra'], ENT_QUOTES, "UTF-8");*/
		$this->bd->tabla("iglesias");
		$opciones = "INNER JOIN localidades ON iglesias.city_id=localidades.id AND localidades.id_idioma='".$this->l."' ";
		$opciones .= "INNER JOIN regiones ON localidades.id_region=regiones.id AND regiones.id_idioma='".$this->l."' ";
		$opciones .= "INNER JOIN paises ON localidades.id_pais=paises.id AND paises.id_idioma='".$this->l."' ";
		$this->bd->datos("COUNT(igl_id)");
		if ($this->lugar_busqueda != 'Todos')
			$opciones .= "WHERE ".$this->lugar_busqueda." REGEXP LOWER('".$this->texto_busqueda."')";
		elseif($this->lugar_busqueda == "Todos")
			$opciones .= "WHERE (igl_nombre REGEXP LOWER('$this->texto_busqueda') 
						 OR igl_pastor_ppal REGEXP LOWER('$this->texto_busqueda') 
						 OR paises.nombre REGEXP LOWER('$this->texto_busqueda') 
						 OR localidades.nombre REGEXP LOWER('$this->texto_busqueda'))";
		if($_SESSION['user_tipo'] == "AI")
			$opciones .= " AND (igl_id='".$_SESSION['user_igl']."' OR igl_sede='".$_SESSION['user_igl']."')";
		elseif($_SESSION['user_tipo'] == "I")
			$opciones .= " AND igl_id='".$_SESSION['user_igl']."'";
		$opciones .=" ORDER BY iglesias.igl_nombre ASC, iglesias.igl_id ASC";
		$this->bd->opciones($opciones);
		$this->total_iglesias = $this->bd->dato_unico();
	}
	
	function getIglesiaId() {
		$this->bd->tabla("iglesias");
                $id = $this->nombre;
		$datos .= "igl_id";
		$this->bd->datos($datos);
		$opciones = "WHERE igl_nombre = '$id' ";
		$this->bd->opciones($opciones);
		$this->bd->leer_datos();
		//$this->bd->mostrar_sql();
		$this->id = $this->bd->dato_unico();
                //$this->id = $this->bd->array_asociativo();
                //var_dump($this->id);
                //$this->id = $this->bd->array_asociativo();
		//print_r($this->resultados);
	}
	
	function carga_iglesia_completo () {
		$this->cargar_iglesia_basico();
		$this->iglesia['iglesia'] = $this->resultados;
		//print_r($this->iglesia['iglesia']);
		unset($this->resultados);
		$this->bd->datos("*");
		//cargamos los audios de la iglesia
		$this->bd->opciones("WHERE igl_id='".$this->id."' AND aud_vid_tipo='E'");
		$this->bd->tabla("audio_video");
		$this->bd->leer_datos();
		$this->iglesia['emisoras'] = $this->bd->array_asociativo();
		//cargamos los audios de la iglesia
		$this->bd->opciones("WHERE igl_id='".$this->id."' AND aud_vid_tipo='A'");
		$this->bd->tabla("audio_video");
		$this->bd->leer_datos();
		$this->iglesia['audio'] = $this->bd->array_asociativo();
		//cargamos los videos de la iglesia
		$this->bd->opciones("WHERE igl_id='".$this->id."' AND aud_vid_tipo='V'");
		$this->bd->leer_datos();
		$this->iglesia['video'] = $this->bd->array_asociativo();
		//cargamos los boletines de la iglesia
		$this->bd->opciones("WHERE igl_id='".$this->id."'");
		$this->bd->tabla("boletines");
		$this->bd->leer_datos();
		$this->iglesia['boletines'] = $this->bd->array_asociativo();
		//cargamos los cultos de la iglesia
		$this->bd->tabla("cultos");
		$this->bd->leer_datos();
		$this->iglesia['cultos'] = $this->bd->array_asociativo();
		//cargamos los centros de enseÃ±anza de la iglesia
		$this->bd->tabla("educativos");
		$this->bd->leer_datos();
		$this->iglesia['educativos'] = $this->bd->array_asociativo();
		//cargamos los eventos de la iglesia
		$this->bd->tabla("eventos");
		$this->bd->opciones("WHERE igl_id='".$this->id."' ORDER BY evt_fecha_inicio DESC");
		$this->bd->leer_datos();
		$this->iglesia['eventos'] = $this->bd->array_asociativo();
		$this->bd->opciones("");
		//cargamos LAS REDES de la iglesia
		$this->bd->tabla("redes_igle");
		$this->bd->datos("redes_igle.*, redes.nombre_red, redes.icono_red");
		$this->bd->opciones("LEFT JOIN redes ON redes.id_red = redes_igle.redes_id WHERE igl_id='".$this->id."' ORDER BY nombre_red DESC");
		$this->bd->leer_datos();
		$this->iglesia['redes'] = $this->bd->array_asociativo();
		$this->bd->opciones("");
		$this->bd->datos("*");
		//cargamos los grupos de la iglesia
		$this->bd->opciones("WHERE igl_id='".$this->id."'");
		$this->bd->tabla("grupos");
		$this->bd->leer_datos();
		$this->iglesia['grupos'] = $this->bd->array_asociativo();
		//cargamos las solicitudes y sugerencias de la iglesia
		$this->bd->tabla("solicitudes_sugerencias");
		$this->bd->leer_datos();
		$this->iglesia['solicitudes_sugerencias'] = $this->bd->array_asociativo();		
		//cargamos las sedes asociadas de la iglesia
		$this->bd->tabla("iglesias");
		$this->bd->datos("iglesias.igl_id, iglesias.igl_nombre, iglesias.igl_pastor_ppal, iglesias.igl_telefono, iglesias.igl_pbx, 
						 iglesias.igl_direccion, iglesias.igl_celular, localidades.nombre as loc_nombre, regiones.nombre as reg_nombre, 
						 paises.nombre as pais_nombre, localidades.id AS loc_id, regiones.id AS reg_id, paises.id AS pais_id, 
						 continentes.id AS con_id, continentes.nombre AS con_nombre");
		$opciones = "INNER JOIN localidades ON iglesias.city_id=localidades.id AND localidades.id_idioma='7' ";
		$opciones .= "INNER JOIN regiones ON localidades.id_region=regiones.id AND regiones.id_idioma='7' ";
		$opciones .= "INNER JOIN paises ON localidades.id_pais=paises.id AND paises.id_idioma='7' ";
		$opciones .= "INNER JOIN continentes ON localidades.id_continente=continentes.id AND continentes.id_idioma='7' ";
		if($this->iglesia['iglesia'][0]['igl_sede'] == 0) $opciones .= " WHERE igl_sede='".$this->id."'";
		else {
			$opciones .= " WHERE igl_id='".$this->iglesia['iglesia'][0]['igl_sede']."' AND igl_id <> '".$this->id."' UNION 
						(SELECT iglesias.igl_id, iglesias.igl_nombre, iglesias.igl_pastor_ppal, iglesias.igl_telefono, iglesias.igl_pbx, 
						 iglesias.igl_direccion, iglesias.igl_celular, localidades.nombre as loc_nombre, regiones.nombre as reg_nombre, 
						 paises.nombre as pais_nombre, localidades.id AS loc_id, regiones.id AS reg_id, paises.id AS pais_id, 
						 continentes.id AS con_id, continentes.nombre AS con_nombre
						FROM iglesias ".$opciones." WHERE igl_sede='".$this->iglesia['iglesia'][0]['igl_sede']."' 
						AND igl_id <> '".$this->id."')";
		}
		$this->bd->opciones($opciones);
		$this->bd->leer_datos();
		//$this->bd->mostrar_sql();
		$this->iglesia['sedes'] = $this->bd->array_asociativo();
		return $this->iglesia;
	}
	
	function informacion_adicional($e = false, $palabra = NULL, $lugar_busqueda = NULL, $id = NULL, $evt_id = NULL, $red_id = NULL, $back = 1) {
		$this->id = $id;
		echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />'."\n";
		echo '<link href="../Scripts/jquery-ui/css/smoothness/jquery-ui-1.8.17.custom.css" rel="stylesheet" type="text/css">'."\n";
		echo '<script type="text/javascript" src="../Scripts/jquery-ui/js/jquery-1.7.1.min.js"></script>'."\n";
		echo '<script type="text/javascript" src="../Scripts/lytebox/lytebox.js"></script>'."\n";
		echo '<script type="text/javascript" src="../Scripts/jquery.tools.min.js"></script>'."\n";
		echo '<script type="text/javascript" src="../Scripts/jquery-ui/js/jquery-ui-1.8.17.custom.min.js"></script>'."\n";
		echo '<script type="text/javascript" src="../Scripts/jquery-ui/development-bundle/ui/i18n/jquery.ui.datepicker-es.js"></script>'."\n";
		echo '<script type="text/javascript" src="../Scripts/jquery.form.js"></script>'."\n";
		echo '<script type="text/javascript" src="../Scripts/jquery.validate.js"></script>'."\n";
		echo '<script type="text/javascript" src="../Scripts/jquery.validate.additional-methods.js"></script>'."\n";
		echo '<script type="text/javascript" src="../Scripts/info_adicional.js"></script>'."\n";
		if(!empty($lugar_busqueda) and !empty($this->id)) {
			$this->carga_iglesia_completo();
			echo '<script type="text/javascript" src="../Scripts/info_adicional_redes.js"></script>'."\n";
			echo '<script type="text/javascript" src="../Scripts/info_adicional_eventos.js"></script>'."\n";
			echo '<script type="text/javascript" src="../Scripts/info_adicional_grupos.js"></script>'."\n";
			echo '<script type="text/javascript">initLytebox();</script>'."\n";
			echo '<script>$(function() { $( "#accordion" ).accordion({ autoHeight: false }); }); </script>'."\n";
			if($this->iglesia['iglesia'][0]['igl_sede'] == 0) 
				echo '<script type="text/javascript" src="../Scripts/info_adicional_info.js"></script>'."\n";
			echo '<div id="back_interno">';
			echo '<a href="#regresar" title="regresar" onclick="recargar(\'index3\',\'op='.$back.'&back='.$back.'&pag='.$this->pag.'&palabra='.$palabra.'&categoria='.$lugar_busqueda.'\',\'#panel_derecho_menu\')">';
			echo '<img src="../imagenes/iconos_admin/icono_admin-regresar.png" align="absmiddle" border="0" /> Regresar';
			echo '</a></div><br /><br />';
			echo '<p id="titulos">';
	        echo '<img src="../imagenes/iconos_admin/icono_admin-iglesia_edit.png" border="5" width="37" height="37" alt="Iglesia" align="left">'."\n";
			//echo '<div id="titulos" style="float:left; margin-left: 3px;">';
			echo $this->iglesia['iglesia'][0]['igl_nombre'].'<br>Informaci&oacute;n adicional';
			//echo '</div>';
			echo '<a style="float: right" id="link" href="#Editar informaci&oacute;n_adicional" title="Editar informaci&oacute;n adicional" onclick="recargar(\'index3\',\'e=true&op=2&id='.$this->iglesia['iglesia'][0]['igl_id'].'&pag='.$this->pag.'&back='.$this->op.'&palabra='.$texto_busqueda.'&categoria='.$lugar_busqueda.'\',\'#panel_derecho_menu\')">';
			echo '<img align="left" src="../imagenes/iconos_admin/icono_admin-infoadicional.png" width="37" height="37" border="0" title="Editar informaci&oacute;n adicional" /> Editar datos<br>b&aacute;sicos';
			echo '</a>';
			echo '</p>';
			echo '<div id="accordion" style="clear:right">'."\n";
			echo '	<h3><a href="#">Enlace web</a></h3>'."\n";
			echo '	<div id="res_enlaceweb">'."\n";
			$this->iframe_enlaceweb($this->id);
			echo '	</div>';
			echo '	<h3><a href="#">Multimedia</a></h3>'."\n";
			echo '	<div id="res_multimedia">'."\n";
			$this->iframe_predica($this->id);
			echo '	</div>';
			echo '	<h3><a href="#">Redes</a></h3>'."\n";
			echo '	<div id="res_redes">'."\n";
			$this->listar_redes();
			echo '	</div>';
			echo '	<h3><a href="#">Eventos</a></h3>'."\n";
			echo '	<div id="res_eventos">'."\n";
			$this->listar_eventos();
			echo '	</div>';
			echo '	<h3><a href="#">Grupos</a></h3>'."\n";
			echo '	<div>'."\n";
			echo '		<div id="res_grupos">'."\n";
			unset($this->mensajes);
			require_once("forms/grupos.html.php");
			echo '		</div>';
			echo '	</div>';
			if($this->iglesia['iglesia'][0]['igl_sede'] == 0) {
				unset($this->mensajes);
				echo '	<h3><a href="#">Informaci&oacute;n</a></h3>'."\n";
				echo '	<div id="tabs-3">'."\n";
				require_once("forms/info_adicional.html.php");
				echo '	</div>'."\n";
			}
			echo '</div>'."\n";
		}
		elseif($palabra == "audio_video") {
			$this->edita_multimedia($this->id, $evt_id);
		}
		elseif($palabra == "eventos") {
			$this->eventos($evt_id, $e);
		}
		elseif($palabra == "redes") {
			$this->redes($red_id, $e);
		}
		elseif($palabra == "grupos" and !empty($id)) {
			$this->grupos($evt_id, $e);
		}
		elseif($palabra == "info_adicional" and !empty($id)) {
			$this->resultados = $this->admin->cargar_request();
			$this->bd->tabla("iglesias");
			$this->bd->datos("igl_mision='".$this->resultados['info_mision']."',igl_vision='".$this->resultados['info_vision']."',igl_credo='".
							 $this->resultados['info_credo']."',igl_historia='".$this->resultados['info_historia']."',igl_actualizada='".
							 date("Y-m-d H:i:s")."'");
			$this->bd->opciones("WHERE igl_id='".$this->resultados['id']."'");
			$this->bd->actualiza();
			if($this->bd->ejecutar_query() == 1) $this->mensajes = new mensajes_globales("La informaci&oacute;n ha sido actualizada con exito", 1);
			else $this->mensajes = new mensajes_globales("Se produjo un error", 2);
			$this->mensajes->mostrar_mensaje();
		}
		else {
			$this->mensajes = new mensajes_globales("Se requiere una iglesia para ser editada", 2);
			$this->mensajes->mostrar_mensaje();
		}
	}
	
	function armar_logos_grupos($grupo = NULL) {
		$archivos = $this->admin->cargar_directorio("../imagenes/iconos/grupos/");
		$ta = count($archivos);
		$r = 1;
		$style = NULL;
		echo '<div id="img_iconos">';
		for($x=0; $x<$ta; ++$x) {
			$tmp = explode(".", strtolower($archivos[$x]));
			$tmp = $tmp[0];
			$tmp = explode("_", $tmp);
			$tmp = $tmp[1];
			if(!empty($grupo['grp_icono']) and $grupo['grp_icono'] == $archivos[$x]) $style = "background-color: #421867; color: #FFFFFF;";
			echo '<img src="../imagenes/iconos/grupos/'.$archivos[$x].'" width="37" height="37" title="'.$tmp.'"';
			echo ' id="'.$r.'" style="cursor:pointer;';
			if(!empty($style)) { echo "; ".$style; unset($style); }
			echo '"';
			echo ' onclick="seleccionar(\''.$archivos[$x].'\', \''.$r.'\')" />'."\n";
			$r++;
		}
		echo '</div>'."\n";
	}
	
	private function eventos($evt_id = NULL, $e = NULL) {
		$this->carga_iglesia_completo();
		switch($e) {
			case 'editar'	: foreach($this->iglesia['eventos'] as $valor) if($valor['evt_id'] == $evt_id) $evento = $valor;
							  require_once("forms/eventos.html.php");
							  break;
			case 'guardar'	: $this->resultados = $this->admin->cargar_request();
							  $this->bd->tabla("eventos");
							  $this->subir_imagen_evento(true);
							  $this->bd->datos("igl_id='".$this->resultados['id']."',evt_nombre='".$this->resultados['evento_nombre'].
											   "',evt_descripcion='".$this->resultados['evento_descripcion']."',evt_fecha_inicio='".
											   $this->resultados['evento_fecha_inicio']."',evt_fecha_fin='".$this->resultados['evento_fecha_fin'].
											   "',evt_lugar='".$this->resultados['evento_lugar']."',evt_invita='".$this->resultados['evento_invita']
											   ."',evt_valor='".$this->resultados['evento_valor'].
											   "', evt_imagen='".$this->resultados['evento_imagen']."'");
							  $this->bd->opciones("WHERE evt_id='".$evt_id."'");
							  $this->bd->actualiza();
							  if($this->bd->ejecutar_query() == 1) $this->mensajes = new mensajes_globales("el evento ha sido actualizado con exito", 1);
							  else $this->mensajes = new mensajes_globales("Se produjo un error", 2);
							  unset($evt_id);
							  $this->mensajes->mostrar_mensaje();
							  break;
			case 'crear'	: $this->resultados = $this->admin->cargar_request();
							  //print_r($this->resultados);
							  $this->bd->opciones("");
							  $this->bd->tabla("eventos");
							  $this->bd->columnas("igl_id, evt_nombre, evt_descripcion, evt_fecha_inicio, evt_fecha_fin, evt_lugar, evt_invita, evt_valor, 
							  					  evt_imagen");
							  $this->subir_imagen_evento(false);
							  $this->bd->datos("'".$this->resultados['id']."','".$this->resultados['evento_nombre']."','".
											  $this->resultados['evento_descripcion']."','".$this->resultados['evento_fecha_inicio']."','".
											  $this->resultados['evento_fecha_fin']."','".$this->resultados['evento_lugar']."','".
											  $this->resultados['evento_invita']."','".$this->resultados['evento_valor']."','".
											  $this->resultados['evento_imagen']."'");
							  $this->bd->insert();
							  if($this->bd->ejecutar_query() == 1) $this->mensajes = new mensajes_globales("el evento ha sido creado con exito", 1);
							  else $this->mensajes = new mensajes_globales("Se produjo un error", 2);
							  $this->mensajes->mostrar_mensaje();
							  break;
			case 'eliminar'	: $this->bd->tabla("eventos");
							  $this->bd->opciones("WHERE evt_id='".$evt_id."'");
							  $this->bd->eliminar();
							  if($this->bd->ejecutar_query() == 1) $this->mensajes = new mensajes_globales("el evento ha sido eliminado con exito", 2);
							  else $this->mensajes = new mensajes_globales("Se produjo un error", 2);
							  unset($evt_id);
							  $this->listar_eventos();
							  $this->mensajes->mostrar_mensaje();
							  break;
			case 'listar_eventos' : $this->listar_eventos();
									break;
			case 'form' : require_once("forms/eventos.html.php");
						  break;
		}
		$this->carga_iglesia_completo();
	}

	private function redes($red_id = NULL, $e = NULL) {
		$this->carga_iglesia_completo();
		$this->bd->tabla("redes");
		$this->bd->opciones("ORDER BY nombre_red ASC");
		$this->bd->datos("*");
		$this->bd->leer_datos();
		//$this->bd->mostrar_sql();
		$redes = $this->bd->array_asociativo();
		switch($e) {
			case 'editar'	: 
							foreach($this->iglesia['redes'] as $valor)
							{
								if($valor['red_id'] == $red_id)
								{
									$red = $valor;
									//echo "blah";
								}
								else
								{
									//echo $valor['red_id']." - ".$red_id;
								}
							}
//							print_r($this->iglesia['redes']);
							  require_once("forms/redes.html.php");
							  break;
			case 'guardar'	: $this->resultados = $this->admin->cargar_request();
							  $this->bd->tabla("redes_igle");
							  $this->bd->datos("igl_id='".$this->resultados['id']."',red_url='".$this->resultados['red_url']."',redes_id='".$this->resultados['redes_id']."'");
							  $this->bd->opciones("WHERE red_id='".$red_id."'");
							  $this->bd->actualiza();
							  if($this->bd->ejecutar_query() == 1) $this->mensajes = new mensajes_globales("La red ha sido actualizada con exito", 1);
							  else $this->mensajes = new mensajes_globales("Se produjo un error", 2);
							  unset($evt_id);
							  $this->mensajes->mostrar_mensaje();
							  break;
			case 'crear'	: $this->resultados = $this->admin->cargar_request();
							  //print_r($this->resultados);
							  $this->bd->opciones("");
							  $this->bd->tabla("redes_igle");
							  $this->bd->columnas("igl_id, red_url, redes_id");
							  $this->bd->datos("'".$this->resultados['id']."','".$this->resultados['red_url']."','".$this->resultados['redes_id']."'");
							  $this->bd->insert();
							  if($this->bd->ejecutar_query() == 1) $this->mensajes = new mensajes_globales("la red ha sido creada con exito", 1);
							  else $this->mensajes = new mensajes_globales("Se produjo un error", 2);
							  $this->mensajes->mostrar_mensaje();
							  break;
			case 'eliminar'	: $this->bd->tabla("redes_igle");
							  $this->bd->opciones("WHERE red_id='".$red_id."'");
							  $this->bd->eliminar();
							  if($this->bd->ejecutar_query() == 1) $this->mensajes = new mensajes_globales("la red ha sido eliminada con exito", 2);
							  else $this->mensajes = new mensajes_globales("Se produjo un error", 2);
							  unset($evt_id);
							  $this->listar_redes();
							  $this->mensajes->mostrar_mensaje();
							  break;
			case 'listar_redes' : $this->listar_redes();
									break;
			case 'form' : require_once("forms/redes.html.php");
						  break;
		}
		$this->carga_iglesia_completo();
	}
	
	function listar_eventos() {
		if(isset($_REQUEST['inc'])) {
			echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />'."\n";
			echo '<link href="../Scripts/jquery-ui/css/smoothness/jquery-ui-1.8.17.custom.css" rel="stylesheet" type="text/css">'."\n";
			echo '<script type="text/javascript" src="../Scripts/jquery-ui/js/jquery-1.7.1.min.js"></script>'."\n";
			echo '<script type="text/javascript" src="../Scripts/lytebox/lytebox.js"></script>'."\n";
			echo '<script type="text/javascript" src="../Scripts/jquery.tools.min.js"></script>'."\n";
			echo '<script type="text/javascript" src="../Scripts/info_adicional_eventos.js"></script>'."\n";
			echo '<script type="text/javascript">initLytebox();</script>'."\n";
		}
		$this->carga_iglesia_completo();
		echo '<a href="index3.php?op=25&palabra=eventos&e=form&inc&id='.$this->id.'" class="lytebox" data-title="Crear evento" data-lyte-options="width:700 height:500';
		echo ' forceCloseClick:true afterEnd:actualiza_eventos"><img src="../imagenes/iconos_admin/icono_admin-public_new.png" ';
		echo 'align="absmiddle"> Crear</a>';
		if(!empty($this->iglesia['eventos'])) {
			echo '<input type="hidden" name="id_igl_evt" id="id_igl_evt" value="'.$this->id.'">';
			//echo "<pre>";print_r($this->iglesia['eventos']); echo "</pre>";
			echo '<p><table id="table" cellpadding="1" cellspacing="2" width="100%">'."\n";
			echo "<thead>\n\t";
			echo "<th>No.</th>\n<th width=\"50%\">Datos b&aacute;sicos</th>\n<th>Datos adicionales</th>\n";
			echo "\n<th width=\"15%\">Acci&oacute;n</th>";
			echo "</thead>\n<tbody>\n\t";
			$i = 1;
			foreach($this->iglesia['eventos'] as $valor) {
				echo "<tr valign=\"top\">\n";
				echo "\t<td align=\"center\" style=\"border-left: 1px solid #700095; border-top: 1px solid #700095; border-bottom: 1px solid #700095;\">".$i."</td>\n";$i++;
				echo "\t<td style=\"border-top: 1px solid #700095; border-bottom: 1px solid #700095;\">";
				echo "<span id=\"titulos\">Nombre:</span> ".$valor['evt_nombre']."<br>\n";
				echo "<span id=\"titulos\">Descripci&oacute;n:</span> ".$valor['evt_descripcion']."</td>\n";
				echo "\t<td align=\"justify\" style=\"border-top: 1px solid #700095; border-bottom: 1px solid #700095;\">";
				echo "<span id=\"titulos\">Fecha:</span> ".$valor['evt_fecha_inicio'];
				if(!empty($valor['evt_fecha_fin']) and $valor['evt_fecha_fin'] != $valor['evt_fecha_inicio']) echo " - ".$valor['evt_fecha_fin'];
				echo "<br>\n";
				echo "<span id=\"titulos\">Lugar:</span> ".$valor['evt_lugar']."<br>\n";
				echo "<span id=\"titulos\">Invita:</span> ".$valor['evt_invita']."<br>\n";
				echo "<span id=\"titulos\">Valor:</span> ";
				if(!empty($valor['evt_valor'])) echo "$ ".number_format($valor['evt_valor'], 0, '.', ',');
				else echo "Gratis";
				echo "</td>\n";
				echo "\t<td align=\"center\" style=\"border-right: 1px solid #700095; border-top: 1px solid #700095; border-bottom: 1px solid #700095;\">";
				$opciones = "op=25&id=".$this->id."&pag=".$this->pag."&evt_id=".$valor['evt_id']."&palabra=eventos&e=editar";
				echo '<a href="index3.php?'.$opciones.'" title="Editar Evento" class="lytebox" data-title="Editar evento" ';
				echo 'data-lyte-options="width:700 height:500 forceCloseClick:true afterEnd:actualiza_eventos">';
				echo '<img src="../imagenes/iconos_admin/icono_admin-afiliacion_aceptada.png" width="37" height="37" border="0" />';
				echo '</a>&nbsp;&nbsp;'."\n";
				$opciones = "op=25&id=".$this->id."&pag=".$this->pag."&evt_id=".$valor['evt_id']."&palabra=eventos&e=eliminar";
				echo '<a href="#Eliminar evento" title="Eliminar Evento" onclick="eliminar(\''.$opciones.'\',\'evento\')">';
				echo '<img src="../imagenes/iconos_admin/icono_admin-eliminar_iglesia.png" width="37" height="37" />';
				echo '</a>'."\n";
				echo "</td>\n";
				echo "</tr>\n";
			}
			echo "</tbody>\n</table></p>";
		}
		else {
			$this->mensajes = new mensajes_globales("No existen eventos.", 2);
			$this->mensajes->mostrar_mensaje();
		}
	}

	
	function listar_redes() {
		if(isset($_REQUEST['inc'])) {
			echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />'."\n";
			echo '<link href="../Scripts/jquery-ui/css/smoothness/jquery-ui-1.8.17.custom.css" rel="stylesheet" type="text/css">'."\n";
			echo '<script type="text/javascript" src="../Scripts/jquery-ui/js/jquery-1.7.1.min.js"></script>'."\n";
			echo '<script type="text/javascript" src="../Scripts/lytebox/lytebox.js"></script>'."\n";
			echo '<script type="text/javascript" src="../Scripts/jquery.tools.min.js"></script>'."\n";
			echo '<script type="text/javascript" src="../Scripts/info_adicional_redes.js"></script>'."\n";
			echo '<script type="text/javascript">initLytebox();</script>'."\n";
		}
		$this->carga_iglesia_completo();
		echo '<a href="index3.php?op=25&palabra=redes&e=form&inc&id='.$this->id.'" class="lytebox" data-title="Crear red" data-lyte-options="width:700 height:500';
		echo ' forceCloseClick:true afterEnd:actualiza_redes"><img src="../imagenes/iconos_admin/icono_admin-public_new.png" ';
		echo 'align="absmiddle"> Crear</a>';
		if(!empty($this->iglesia['redes'])) {
			echo '<input type="hidden" name="id_igl_red" id="id_igl_red" value="'.$this->id.'">';
			//echo "<pre>";print_r($this->iglesia['eventos']); echo "</pre>";
			echo '<p><table id="table" cellpadding="1" cellspacing="2" width="100%">'."\n";
			echo "<thead>\n\t";
			echo "<th>No.</th>\n<th width=\"50%\">URL</th>\n<th>Tipo</th>\n";
			echo "\n<th width=\"15%\">Acci&oacute;n</th>";
			echo "</thead>\n<tbody>\n\t";
			$i = 1;
			foreach($this->iglesia['redes'] as $valor) {
				echo "<tr valign=\"top\">\n";
				echo "\t<td align=\"center\" style=\"border-left: 1px solid #700095; border-top: 1px solid #700095; border-bottom: 1px solid #700095;\">".$i."</td>\n";$i++;
				echo "\t<td style=\"border-top: 1px solid #700095; border-bottom: 1px solid #700095;\">";
				echo "<span id=\"titulos\">URL:</span> ".$valor['red_url']."</td>\n";
				echo "\t<td align=\"justify\" style=\"border-top: 1px solid #700095; border-bottom: 1px solid #700095;\">";
				echo "<span id=\"titulos\">Tipo:</span> ".$valor['nombre_red'];
				echo "</td>\n";
				echo "\t<td align=\"center\" style=\"border-right: 1px solid #700095; border-top: 1px solid #700095; border-bottom: 1px solid #700095;\">";
				$opciones = "op=25&id=".$this->id."&pag=".$this->pag."&red_id=".$valor['red_id']."&palabra=redes&e=editar";
				echo '<a href="index3.php?'.$opciones.'" title="Editar Red" class="lytebox" data-title="Editar red" ';
				echo 'data-lyte-options="width:700 height:500 forceCloseClick:true afterEnd:actualiza_redes">';
				echo '<img src="../imagenes/iconos_admin/icono_admin-afiliacion_aceptada.png" width="37" height="37" border="0" />';
				echo '</a>&nbsp;&nbsp;'."\n";
				$opciones = "op=25&id=".$this->id."&pag=".$this->pag."&red_id=".$valor['red_id']."&palabra=redes&e=eliminar";
				echo '<a href="#Eliminar red" title="Eliminar red" onclick="eliminar(\''.$opciones.'\',\'red\')">';
				echo '<img src="../imagenes/iconos_admin/icono_admin-eliminar_iglesia.png" width="37" height="37" />';
				echo '</a>'."\n";
				echo "</td>\n";
				echo "</tr>\n";
			}
			echo "</tbody>\n</table></p>";
		}
		else {
			$this->mensajes = new mensajes_globales("No existen redes.", 2);
			$this->mensajes->mostrar_mensaje();
		}
	}
	
	private function subir_imagen_evento($elm = false) {
		$tipo = substr($_FILES['evento_imagen']['type'], 0, 5);
		// Definimos Directorio donde se guarda el archivo
		$dir = '../archivos_iglesias/eventos/';
		// Intentamos Subir Archivo
		// (1) Comprovamos que existe el nombre temporal del archivo
		if (isset($_FILES['evento_imagen']['tmp_name']) and !empty($_FILES['evento_imagen']['tmp_name'])) {
			// (2) - Comprovamos que se trata de un archivo de imágen
			if ($tipo == 'image') {
				// (3) Por ultimo se intenta copiar el archivo al servidor.
				if (!copy($_FILES['evento_imagen']['tmp_name'], $dir.$_FILES['evento_imagen']['name'])) {
					$this->mensajes = new mensajes_globales("Error al Subir el Archivo", 2);
					$this->mensajes->mostrar_mensaje();
				}
				else {
					if($elm == true and !empty($this->resultados['evento_imagen_file'])) unlink($dir.$this->resultados['evento_imagen_file']);
					$this->resultados['evento_imagen'] = $_FILES['evento_imagen']['name'];
				}
			}
			else {
				$this->mensajes = new mensajes_globales("El Archivo que se intenta subir NO ES del tipo Imagen.", 2);
				$this->mensajes->mostrar_mensaje();
			}
		}
		else {
			$this->resultados['evento_imagen'] = $this->resultados['evento_imagen_file'];
			$this->mensajes = new mensajes_globales("No a incluido ningún Archivo.", 2);
			$this->mensajes->mostrar_mensaje();
		}
	}
	
	private function grupos($evt_id = NULL, $e = NULL) {
		echo '<script type="text/javascript" src="../Scripts/info_adicional_grupos.js"></script>'."\n";
		$this->carga_iglesia_completo();
		switch($e) {
			case 'editar'	: foreach($this->iglesia['grupos'] as $valor) if($valor['grp_id'] == $evt_id) $grupo = $valor;
							  break;
			case 'guardar'	: $this->resultados = $this->admin->cargar_request();
							  $this->bd->tabla("grupos");
							  $this->resultados['grupo_tipo'] = substr($this->resultados['grupo_icono'], 6, -4);
							  $this->bd->datos("igl_id='".$this->resultados['id']."',grp_nombre='".$this->resultados['grupo_nombre']."',grp_tipo='".
											   $this->resultados['grupo_tipo']."',grp_icono='".$this->resultados['grupo_icono']."',grp_descripcion='".
											   $this->resultados['grupo_descripcion']."',grp_horarios='".$this->resultados['grupo_horarios']."'");
							  $this->bd->opciones("WHERE grp_id='".$evt_id."'");
							  $this->bd->actualiza();
							  if($this->bd->ejecutar_query() == 1) $this->mensajes = new mensajes_globales("el grupo ha sido actualizado con exito", 1);
							  else $this->mensajes = new mensajes_globales("Se produjo un error", 2);
							  unset($evt_id); $inc = true;
							  break;
			case 'crear'	: $this->resultados = $this->admin->cargar_request();
							  //print_r($this->resultados);
							  $this->bd->tabla("grupos");
							  $this->bd->columnas("igl_id, grp_nombre, grp_tipo, grp_icono, grp_descripcion, grp_horarios");
							  $this->resultados['grupo_tipo'] = substr($this->resultados['grupo_icono'], 6, -4);
							  $this->bd->datos("'".$this->resultados['id']."','".$this->resultados['grupo_nombre']."','".
											   $this->resultados['grupo_tipo']."','".$this->resultados['grupo_icono']."','".
											   $this->resultados['grupo_descripcion']."','".$this->resultados['grupo_horarios']."'");
							  $this->bd->insert();
							  if($this->bd->ejecutar_query() == 1) $this->mensajes = new mensajes_globales("el grupo ha sido creado con exito", 1);
							  else $this->mensajes = new mensajes_globales("Se produjo un error", 2); $inc = true;
							  break;
			case 'eliminar'	: $this->bd->tabla("grupos");
							  $this->bd->opciones("WHERE grp_id='".$evt_id."'");
							  $this->bd->eliminar();
							  if($this->bd->ejecutar_query() == 1) $this->mensajes = new mensajes_globales("el grupo ha sido eliminado con exito", 2);
							  else $this->mensajes = new mensajes_globales("Se produjo un error", 2);
							  unset($evt_id); $inc = true;
							  break;
		}
		$this->carga_iglesia_completo();
		require_once("forms/grupos.html.php");
	}
	
	function semaforo($iglesia) {
		$this->resultados = $iglesia['iglesia'][0];
		$c = 0;
		//echo "<pre>";print_r($this->resultados=$iglesia['iglesia'][0]);/*
		if(!empty($this->resultados['igl_nombre'])) $c += 1;
		if(!empty($this->resultados['igl_pastor_ppal'])) $c += 1;
		if(!empty($this->resultados['igl_rep_legal'])) $c += 1;
		if(!empty($this->resultados['igl_direccion'])) $c += 1;
		if(!empty($this->resultados['igl_telefono']) or $this->resultados['igl_telefono'] != 0) $c += 1;
		if(!empty($this->resultados['igl_pbx']) or $this->resultados['igl_pbx'] != 0) $c += 1;
		if(!empty($this->resultados['igl_celular']) or $this->resultados['igl_celular'] != 0) $c += 1;
		if(!empty($this->resultados['igl_email'])) $c += 1;
		if(!empty($this->resultados['continente_id'])) $c += 1;
		if(!empty($this->resultados['pais_id'])) $c += 1;
		if(!empty($this->resultados['region_id'])) $c += 1;
		if(!empty($this->resultados['city_id'])) $c += 1;
		if(isset($this->resultados['igl_sede'])) $c += 1;
		if(!empty($this->resultados['igl_logo'])) $c += 1;
		if($this->resultados['pais_id'] == 82) {
			if(!empty($this->resultados['igl_cuenta'])) $c += 1;
			if(!empty($this->resultados['igl_resolucion'])) $c += 1;
		}
		if(!empty($this->resultados['igl_web'])) $c += 1;
		//echo $c;
		if($this->resultados['pais_id'] == 82) $p = number_format(($c*100)/17, 2);
		else $p = number_format(($c*100)/15, 2);
		if($p > 100) $p = 100.00;
		echo '<div id="luzsemaforo">';
		if($c>=0 and $c<=4) {
			if($c==0) echo '<img src="imagenes/semaforo/vacio.png" width="40" height="40" align="absmiddle" />';
			if($c>=1 and $c<=2) echo '<img src="imagenes/semaforo/rojo_04.png" width="40" height="40" align="absmiddle" />';
			elseif($c==3) echo '<img src="imagenes/semaforo/rojo_03.png" width="40" height="40" align="absmiddle" />';
			elseif($c==4) echo '<img src="imagenes/semaforo/rojo_02.png" width="40" height="40" align="absmiddle" />';
			elseif($c==5) echo '<img src="imagenes/semaforo/rojo_01.png" width="40" height="40" align="absmiddle" />';
			echo '</div><div id="luzsemaforo">'.$p." %</div>";
		}
		else echo '<img src="imagenes/semaforo/rojo_01.png" width="40" height="40" align="absmiddle" /></div><div id="luzsemaforo"></div>';
		echo '<div id="luzsemaforo">';
		if($c>=5 and $c<=8) {
			if($c==5) echo '<img src="imagenes/semaforo/amarillo_04.png" width="40" height="40" align="absmiddle" />';
			elseif($c==6) echo '<img src="imagenes/semaforo/amarillo_03.png" width="40" height="40" align="absmiddle" />';
			elseif($c==7) echo '<img src="imagenes/semaforo/amarillo_02.png" width="40" height="40" align="absmiddle" />';
			elseif($c==8) echo '<img src="imagenes/semaforo/amarillo_01.png" width="40" height="40" align="absmiddle" />';
			echo '</div><div id="luzsemaforo">'.$p." %</div>";
		}
		else echo '<img src="imagenes/semaforo/amarillo_01.png" width="40" height="40" align="absmiddle" /></div><div id="luzsemaforo"></div>';
		echo '<div id="luzsemaforo">';
		if($c>=9) {
			if($c==9) echo '<img src="imagenes/semaforo/verde_04.png" width="40" height="40" align="absmiddle" />';
			elseif($c==10) echo '<img src="imagenes/semaforo/verde_04.png" width="40" height="40" align="absmiddle" />';
			elseif($c==11) echo '<img src="imagenes/semaforo/verde_03.png" width="40" height="40" align="absmiddle" />';
			elseif($c==12) echo '<img src="imagenes/semaforo/verde_03.png" width="40" height="40" align="absmiddle" />';
			elseif($c==13) echo '<img src="imagenes/semaforo/verde_02.png" width="40" height="40" align="absmiddle" />';
			elseif($c==14) echo '<img src="imagenes/semaforo/verde_02.png" width="40" height="40" align="absmiddle" />';
			elseif($c==15) echo '<img src="imagenes/semaforo/verde_01.png" width="40" height="40" align="absmiddle" />';
			elseif($c>=16) echo '<img src="imagenes/semaforo/verde_01.png" width="40" height="40" align="absmiddle" />';
			echo '</div><div id="luzsemaforo">'.$p." %</div>";
		}
		else echo '<img src="imagenes/semaforo/vacio.png" width="40" height="40" align="absmiddle" /></div><div id="luzsemaforo"></div>';
		//*/
	}
	
	function remplazarletras($tex) {
		$cadena_buscar['�'] = "a";
		$cadena_buscar['�'] = "e";
		$cadena_buscar['�'] = "i";
		$cadena_buscar['�'] = "o";
		$cadena_buscar['�'] = "u";
		$cadena_buscar['�'] = "n";
		$cadena_buscar['�'] = "A";
		$cadena_buscar['�'] = "E";
		$cadena_buscar['�'] = "I";
		$cadena_buscar['�'] = "O";
		$cadena_buscar['�'] = "U";
		$cadena_buscar['�'] = "N";
		
		return $texto = strtr($tex, $cadena_buscar);
	}
	
	function remplazarletras2($str) {
		$foreign_characters = array(
			'/ä|æ|ǽ/' => 'ae',
			'/ö|œ/' => 'oe',
			'/ü/' => 'ue',
			'/Ä/' => 'Ae',
			'/Ü/' => 'Ue',
			'/Ö/' => 'Oe',
			'/À|Á|Â|Ã|Ä|Å|Ǻ|Ā|Ă|Ą|Ǎ|Α|Ά|Ả|Ạ|Ầ|Ẫ|Ẩ|Ậ|Ằ|Ắ|Ẵ|Ẳ|Ặ|А/' => 'A',
			'/à|á|â|ã|å|ǻ|ā|ă|ą|ǎ|ª|α|ά|ả|ạ|ầ|ấ|ẫ|ẩ|ậ|ằ|ắ|ẵ|ẳ|ặ|а/' => 'a',
			'/Б/' => 'B',
			'/б/' => 'b',
			'/Ç|Ć|Ĉ|Ċ|Č/' => 'C',
			'/ç|ć|ĉ|ċ|č/' => 'c',
			'/Д/' => 'D',
			'/д/' => 'd',
			'/Ð|Ď|Đ|Δ/' => 'Dj',
			'/ð|ď|đ|δ/' => 'dj',
			'/È|É|Ê|Ë|Ē|Ĕ|Ė|Ę|Ě|Ε|Έ|Ẽ|Ẻ|Ẹ|Ề|Ế|Ễ|Ể|Ệ|Е|Э/' => 'E',
			'/è|é|ê|ë|ē|ĕ|ė|ę|ě|έ|ε|ẽ|ẻ|ẹ|ề|ế|ễ|ể|ệ|е|э/' => 'e',
			'/Ф/' => 'F',
			'/ф/' => 'f',
			'/Ĝ|Ğ|Ġ|Ģ|Γ|Г|Ґ/' => 'G',
			'/ĝ|ğ|ġ|ģ|γ|г|ґ/' => 'g',
			'/Ĥ|Ħ/' => 'H',
			'/ĥ|ħ/' => 'h',
			'/Ì|Í|Î|Ï|Ĩ|Ī|Ĭ|Ǐ|Į|İ|Η|Ή|Ί|Ι|Ϊ|Ỉ|Ị|И|Ы/' => 'I',
			'/ì|í|î|ï|ĩ|ī|ĭ|ǐ|į|ı|η|ή|ί|ι|ϊ|ỉ|ị|и|ы|ї/' => 'i',
			'/Ĵ/' => 'J',
			'/ĵ/' => 'j',
			'/Ķ|Κ|К/' => 'K',
			'/ķ|κ|к/' => 'k',
			'/Ĺ|Ļ|Ľ|Ŀ|Ł|Λ|Л/' => 'L',
			'/ĺ|ļ|ľ|ŀ|ł|λ|л/' => 'l',
			'/М/' => 'M',
			'/м/' => 'm',
			'/Ñ|Ń|Ņ|Ň|Ν|Н/' => 'N',
			'/ñ|ń|ņ|ň|ŉ|ν|н/' => 'n',
			'/Ò|Ó|Ô|Õ|Ō|Ŏ|Ǒ|Ő|Ơ|Ø|Ǿ|Ο|Ό|Ω|Ώ|Ỏ|Ọ|Ồ|Ố|Ỗ|Ổ|Ộ|Ờ|Ớ|Ỡ|Ở|Ợ|О/' => 'O',
			'/ò|ó|ô|õ|ō|ŏ|ǒ|ő|ơ|ø|ǿ|º|ο|ό|ω|ώ|ỏ|ọ|ồ|ố|ỗ|ổ|ộ|ờ|ớ|ỡ|ở|ợ|о/' => 'o',
			'/П/' => 'P',
			'/п/' => 'p',
			'/Ŕ|Ŗ|Ř|Ρ|Р/' => 'R',
			'/ŕ|ŗ|ř|ρ|р/' => 'r',
			'/Ś|Ŝ|Ş|Ș|Š|Σ|С/' => 'S',
			'/ś|ŝ|ş|ș|š|ſ|σ|ς|с/' => 's',
			'/Ț|Ţ|Ť|Ŧ|τ|Т/' => 'T',
			'/ț|ţ|ť|ŧ|т/' => 't',
			'/Ù|Ú|Û|Ũ|Ū|Ŭ|Ů|Ű|Ų|Ư|Ǔ|Ǖ|Ǘ|Ǚ|Ǜ|Ũ|Ủ|Ụ|Ừ|Ứ|Ữ|Ử|Ự|У/' => 'U',
			'/ù|ú|û|ũ|ū|ŭ|ů|ű|ų|ư|ǔ|ǖ|ǘ|ǚ|ǜ|υ|ύ|ϋ|ủ|ụ|ừ|ứ|ữ|ử|ự|у/' => 'u',
			'/Ý|Ÿ|Ŷ|Υ|Ύ|Ϋ|Ỳ|Ỹ|Ỷ|Ỵ|Й/' => 'Y',
			'/ý|ÿ|ŷ|ỳ|ỹ|ỷ|ỵ|й/' => 'y',
			'/В/' => 'V',
			'/в/' => 'v',
			'/Ŵ/' => 'W',
			'/ŵ/' => 'w',
			'/Ź|Ż|Ž|Ζ|З/' => 'Z',
			'/ź|ż|ž|ζ|з/' => 'z',
			'/Æ|Ǽ/' => 'AE',
			'/ß/' => 'ss',
			'/Ĳ/' => 'IJ',
			'/ĳ/' => 'ij',
			'/Œ/' => 'OE',
			'/ƒ/' => 'f',
			'/ξ/' => 'ks',
			'/π/' => 'p',
			'/β/' => 'v',
			'/μ/' => 'm',
			'/ψ/' => 'ps',
			'/Ё/' => 'Yo',
			'/ё/' => 'yo',
			'/Є/' => 'Ye',
			'/є/' => 'ye',
			'/Ї/' => 'Yi',
			'/Ж/' => 'Zh',
			'/ж/' => 'zh',
			'/Х/' => 'Kh',
			'/х/' => 'kh',
			'/Ц/' => 'Ts',
			'/ц/' => 'ts',
			'/Ч/' => 'Ch',
			'/ч/' => 'ch',
			'/Ш/' => 'Sh',
			'/ш/' => 'sh',
			'/Щ/' => 'Shch',
			'/щ/' => 'shch',
			'/Ъ|ъ|Ь|ь/' => '',
			'/Ю/' => 'Yu',
			'/ю/' => 'yu',
			'/Я/' => 'Ya',
			'/я/' => 'ya'
		);
		static $array_from, $array_to;

		if ( ! is_array($array_from)) :
			if (empty($foreign_characters) OR ! is_array($foreign_characters)) :
				$array_from = array();
				$array_to = array();
				return $str;
			endif;

			$array_from = array_keys($foreign_characters);
			$array_to = array_values($foreign_characters);
		endif;

		$name = preg_replace($array_from, $array_to, $str);
		return mb_strtolower(str_replace(" ", "_", $name));
	}
}
?>
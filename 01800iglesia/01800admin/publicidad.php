<?php
defined( '_01800' ) or die('Acceso no permitido');

//Clase de publicidad
class publicidad {
	private $pag;
	private $bd;
	var $post;
	private $admin;
	private $tpublicidad;
	var $resultados;
	
	//Funcion constructora
	function __construct($pag = 1) {
		$this->pag = $pag;
		$this->bd = new BDManejo($this->pag);
		$this->admin = new Administracion($this->pag);
		$this->post['opub'] = NULL;
		$this->bd->tabla("publicidad");
		$this->tpublicidad();
	}
	
	function publicidad() {
		$this->post = $this->admin->cargar_request();
		switch($this->post['opp']) {
			case 'form' 	: $this->post['opp'] = "crear";
							  require_once("forms/publicidad.html.php");
							  break;
			case 'crear'	: $this->crear();
							  break;
			case 'editar'	: require_once("forms/publicidad.html.php");
							  break;
			case 'guardar'	: $this->guardar();
							  break;
			case 'pub'		: $this->manejo();
							  break;
			case 'activar'	: $this->activar();
							  break;
			case 'del'		: $this->eliminar_publicidad();
							  break;
			default			: $this->manejo();
							  break;
		}
	}
	
	function manejo() {
		echo '<script src="../Scripts/main_publicidad.js"></script>';
		echo '<script></script>';
		echo '<a href="index3.php?op=10&opp=form" class="lytebox" data-title="Creaci&oacute;n de publicidad" data-lyte-options="width:700 height:90% autoResize:true forceCloseClick:true afterEnd:actualizar">';
		echo '<img src="../imagenes/iconos_admin/icono_admin-public_new.png" width="37" height="37" align="absmiddle" border="0" />';
		echo ' Crear</a>';
		if(!empty($this->tpublicidad['todos'])) {
			echo ' | <a href="#pub_act" onclick="recargar(\'index3\',\'op=10&opub=Y\',\'#panel_derecho_menu\')">Ver clientes activos</a>';
			echo ' | <a href="#pub_inact" onclick="recargar(\'index3\',\'op=10&opub=N\',\'#panel_derecho_menu\')">Ver clientes inactivos</a>';
			echo ' | <a href="#pub" onclick="recargar(\'index3\',\'op=10\',\'#panel_derecho_menu\')">Ver todos</a>';
			$this->avisos_publicidad();
			echo '<p>Total avisos publicitarios';
			if(!empty($this->post['opub'])) {
				if($this->post['opub'] == "Y") echo ' activos: '.number_format($this->tpublicidad['act']);
				else echo ' inactivos: '.number_format($this->tpublicidad['iact']);
			}
			else echo ': '.number_format($this->tpublicidad['todos']);
			if(!empty($this->resultados)) {
				echo '</p>';
				echo '<table id="table" cellpadding="2" cellspacing="3" border="0" align="center" width="100%">'."\n";
				echo '	<thead>'."\n";
				echo '		<th width="25%">Empresa</th>'."\n";
				echo '		<th width="35%">Aviso</th>'."\n";
				echo '		<th>Lugar de aparici&oacute;n</th>'."\n";
				echo '		<th>Acciones</th>'."\n";
				echo '	</thead>'."\n";
				echo '	<tbody>'."\n";
				foreach($this->resultados as $value) {
					echo '		<tr>'."\n";
					echo '			<td id="titulos" style="font-size:1.5em" valign="top">'.$value['pub_empresa'].'</td>'."\n";
					echo '			<td valign="top">';
					echo $this->admin->redimensionar_imagen(50, 50, "../logos_publicidad/".$value['pub_logo'], "left", 3, 3);
					echo '<div style="text-align:justify">'.$value['pub_texto'].'</div>';
					echo '<p>';
					echo $value['pub_telefono'];
					if(!empty($value['pub_web'])) echo '<br />'.$value['pub_web'];
					if(!empty($value['pub_email'])) echo '<br />'.$value['pub_email'];
					echo '</p>';
					echo '</td>'."\n";
					echo '			<td valign="top">';
					echo "Paises: ".$this->admin->check($value['pub_lugar_aparicion_paises'], false);
					echo "<br />Departamentos: ".$this->admin->check($value['pub_lugar_aparicion_deptos'], false);
					echo "<br />Ciudades: ".$this->admin->check($value['pub_lugar_aparicion_ciudades'], false);
					echo "<br />Iglesias: ".$this->admin->check($value['pub_lugar_aparicion_iglesia'], false);
					echo "<br />Inscripci&oacute;n iglesia: ".$this->admin->check($value['pub_lugar_aparicion_inscripcion'], false);
					echo "<br />&iquest;Qu&eacute; es 01800?: ".$this->admin->check($value['pub_lugar_aparicion_01800'], false);
					echo "<br />Contacto: ".$this->admin->check($value['pub_lugar_aparicion_contacto'], false);
					echo "<br />Glosario: ".$this->admin->check($value['pub_lugar_aparicion_iglesia'], false);
					echo '</td>'."\n";
					echo '			<td align="center" valign="top">';
					$href = "op=10&opp=activar&val=".$value['pub_activa']."&id=".$value['pub_id']."&opub=".$this->post['opub'];
					echo $this->admin->check($value['pub_activa'], true, $href, "Activar/desactivar");
					$tipo = array("lytebox", "Editar ".$value['pub_empresa'], "width:700 height:90% forceCloseClick:true afterEnd:actualizar");
					echo $this->admin->editar("op=10&opp=editar&id=".$value['pub_id']."&opub=".$this->post['opub'], "editar_aviso", $tipo);
					echo '<a href="#" onclick="eliminar_pub(\''.$value['pub_id'].'\')" title="Eliminar aviso">';
					echo '<img src="../imagenes/iconos_admin/icono_admin-public_eliminar.png" width="37" height="37" align="absmiddle" border="0" />';
					echo '</a>'."\n";
					echo '</td>'."\n";
					echo '		</tr>'."\n";
				}
				echo '	<tbody>'."\n";
				echo '</table>'."\n";
			}
			else {
				$mensaje = new mensajes_globales("No existen avisos", 2);
				$mensaje->mostrar_mensaje();
			}
		}
		if(empty($this->tpublicidad)) {
			$mensaje = new mensajes_globales("No hay publicidad que mostrar en los pasos.", 2);
			$mensaje->mostrar_mensaje();
		}
	}
	
	function tpublicidad() {
		$this->bd->datos("COUNT(*)");
		$this->tpublicidad['todos'] = $this->bd->dato_unico();
		if(!empty($this->tpublicidad['todos'])) {
			$this->bd->opciones("WHERE pub_activa='Y'");
			$this->tpublicidad['act'] = $this->bd->dato_unico();
			$this->bd->opciones("WHERE pub_activa='N'");
			$this->tpublicidad['iact'] = $this->bd->dato_unico();
		}
	}
	
	function avisos_publicidad() {
		$this->bd->datos("*");
		if(!empty($this->post['opub'])) $this->bd->opciones("WHERE pub_activa='".$this->post['opub']."'");
		else $this->bd->opciones("");
		$this->bd->leer_datos();
		//$this->bd->mostrar_sql();
		return $this->resultados = $this->bd->array_asociativo();
	}
	
	function avisos_publicidad_index() {
		$this->bd->datos("*");
		$this->bd->opciones("WHERE pub_activa='Y' AND pub_lugar_aparicion_".$this->post['opub']."='Y' ORDER BY RAND() ");
		$this->bd->leer_datos();
		//$this->bd->mostrar_sql();
		return $this->resultados = $this->bd->array_asociativo();
	}
	
	function aviso_publicidad() {
		$this->bd->datos("*");
		$this->bd->opciones("WHERE pub_id='".$this->post['id']."'");
		//$this->bd->mostrar_sql();
		return $this->resultados = $this->bd->fila_unica();
	}
	
	function crear() {
		echo '<link href="estilo.css" rel="stylesheet" type="text/css" />';
		$archivo['nombre'] = trim(str_replace(' ','',$_FILES['logotipo']['name']));
		$archivo['tipo'] = explode("/", $_FILES['logotipo']['type']);
		$archivo['tipo'] = $archivo['tipo'][0];
		$size = $_FILES['archivo']['size'];
		$archivo['sizemb'] = number_format($size / 50331648, 2);
		if ($archivo['tipo'] != 'image' || $archivo['size'] >= 50331648) {
			$mensaje = new mensajes_globales("El tipo de archivo no es de imagen o su tamaño excede los 12MB", 3);
			$mensaje->mostrar_mensaje();
			exit();
		}		
		else {
			$dir = '../logos_publicidad/';
			if (!copy($_FILES['logotipo']['tmp_name'], $dir.$archivo['nombre'])) {
				$mensaje = new mensajes_globales("No se pudo copiar el archivo", 3);
				$mensaje->mostrar_mensaje();
				exit();
			}
			else {
				$this->armar_tel();
				//ingresamos los datos recibidos
				$this->bd->columnas("pub_empresa, pub_logo, pub_texto, pub_telefono, pub_web, pub_email, pub_lugar_aparicion_paises, 
									 pub_lugar_aparicion_deptos, pub_lugar_aparicion_ciudades, pub_lugar_aparicion_iglesia, 
									 pub_lugar_aparicion_inscripcion, pub_lugar_aparicion_01800, pub_lugar_aparicion_contacto, 
									 pub_lugar_aparicion_glosario, pub_activa");
				$this->bd->datos("'".$this->post['empresa']."', '".$archivo['nombre']."', '".$this->post['texto']."', '".$this->post['tel']."', '".
								 $this->post['web']."', '".$this->post['email']."', '".
								 $this->post['lapa1']."', '".$this->post['lapa2']."', '". $this->post['lapa3']."', '".$this->post['lapa4']."', '".
								 $this->post['lapa5']."', '".$this->post['lapa6']."', '".$this->post['lapa7']."', '".$this->post['lapa8']."', '".
								 $this->post['pact']."'");
				$this->bd->insert();
				if($this->bd->ejecutar_query() == true) $mensaje = new mensajes_globales("Se ha creado el aviso de publicidad", 1);
				else $mensaje = new mensajes_globales("No se ha creado el aviso de publicidad", 1);
				$mensaje->mostrar_mensaje();
			}
		}
	}
	
	function armar_tel() {
		//verificamos el telefono
		if(!empty($this->post['tel'])) {
			if(!empty($this->post['movil'])) $this->post['tel'] .= " - ".$this->post['movil'];
			if(!empty($this->post['pbx'])) $this->post['tel'] .= " - ".$this->post['pbx'];
		}
		else if(!empty($this->post['movil'])) {
			$this->post['tel'] = $this->post['movil'];
			if(!empty($this->post['pbx'])) $this->post['tel'] .= " - ".$this->post['pbx'];
		}
		elseif(!empty($this->post['pbx'])) $this->post['tel'] = $this->post['pbx'];
	}
	
	function guardar() {
		echo '<link href="estilo.css" rel="stylesheet" type="text/css" />';
		if(isset($_FILES['logotipo1']['name']) and !empty($_FILES['logotipo1']['name'])) {
			$archivo['nombre'] = trim(str_replace(' ','',$_FILES['logotipo1']['name']));
			$archivo['tipo'] = explode("/", $_FILES['logotipo1']['type']);
			$archivo['tipo'] = $archivo['tipo'][0];
			$size = $_FILES['archivo']['size'];
			$archivo['sizemb'] = number_format($size / 50331648, 2);
			if ($archivo['tipo'] != 'image' || $archivo['size'] >= 50331648) {
				$mensaje = new mensajes_globales("El tipo de archivo no es de imagen o su tamaño excede los 12MB", 3);
				$mensaje->mostrar_mensaje();
				exit();
			}		
			else {
				$dir = '../logos_publicidad/';
				if (!copy($_FILES['logotipo1']['tmp_name'], $dir.$archivo['nombre'])) {
					$mensaje = new mensajes_globales("No se pudo copiar el archivo", 3);
					$mensaje->mostrar_mensaje();
					exit();
				}
				else {
					if(file_exists($dir.$this->post['logotipo'])) unlink($dir.$this->post['logotipo']);
				}
			}
		}
		else $archivo['nombre'] = $this->post['logotipo'];
		$this->armar_tel();
		//ingresamos los datos recibidos
		$this->bd->datos("pub_empresa='".$this->post['empresa']."', pub_logo='".$archivo['nombre']."', pub_texto='".$this->post['texto'].
						 "', pub_telefono='".$this->post['tel']."', pub_web='".$this->post['web']."', pub_email='".$this->post['email'].
						 "', pub_lugar_aparicion_paises='".$this->normaliza_lapa($this->post['lapa1']).
						 "', pub_lugar_aparicion_deptos='".$this->normaliza_lapa($this->post['lapa2']).
						 "', pub_lugar_aparicion_ciudades='".$this->normaliza_lapa($this->post['lapa3']).
						 "', pub_lugar_aparicion_iglesia='".$this->normaliza_lapa($this->post['lapa4']).
						 "', pub_lugar_aparicion_inscripcion='".$this->normaliza_lapa($this->post['lapa5']).
						 "', pub_lugar_aparicion_01800='".$this->normaliza_lapa($this->post['lapa6']).
						 "', pub_lugar_aparicion_contacto='".$this->normaliza_lapa($this->post['lapa7']).
						 "', pub_lugar_aparicion_glosario='".$this->normaliza_lapa($this->post['lapa8']).
						 "', pub_activa='".$this->post['pact']."'");
		$this->bd->opciones("WHERE pub_id='".$this->post['id']."'");
		$this->bd->actualiza();
		//$this->bd->mostrar_sql();
		if($this->bd->ejecutar_query() == true) $mensaje = new mensajes_globales("Se ha actualizado el aviso de publicidad", 1);
		else $mensaje = new mensajes_globales("No se ha actualizado el aviso de publicidad", 1);
		$mensaje->mostrar_mensaje();
	}
	
	function normaliza_lapa($lapa = "Y") {
		if(empty($lapa)) return $lapa = "N";
		else return $lapa;
	}
	
	function activar() {
		if($this->post['val'] == "Y") $this->post['val'] = "N";
		elseif($this->post['val'] == "N") $this->post['val'] = "Y";
		$this->bd->datos("pub_activa='".$this->post['val']."'");
		$this->bd->opciones("WHERE pub_id='".$this->post['id']."'");
		$this->bd->actualiza();
		$this->bd->ejecutar_query();
		$this->manejo();
	}
	
	function eliminar_publicidad() {
		if(!empty($this->post['idp'])) {
			$this->bd->tabla("publicidad");
			$this->bd->opciones("WHERE pub_id='".$this->post['idp']."'");
			$this->bd->eliminar();
			if($this->bd->ejecutar_query() == 1) $mensaje = new mensajes_globales("El aviso ha sido eliminado", 1);
			else $mensaje = new mensajes_globales("El aviso no ha sido eliminado", 3);
			$mensaje->mostrar_mensaje();
		}
		$this->manejo();
	}
}
<?php
//
defined( '_01800' ) or die('Acceso no permitido');

//Clase de iglesia
class ListaCorreo {
	private $pag;
	private $bd;
	private $bd2;
	private $resultados;
	private $resultadosB;
	private $listacorreo;
	private $total_paginas;
	var $total_listas;
	var $total_correos;	
	var $op;
	private $admin;
	var $id;
	private $form;
	private $mensajes;
	private $texto_busqueda;
	private $lugar_busqueda;
	var $nombre;
	var $idlista;
	var $idlisu;
	
	//Funcion constructora
	function __construct($pag = 1, $op = NULL) {
		if(!empty($this->op)) $this->op = $op;
		else $this->op = 1;
		$this->pag = $pag;
		if($this->pag < 1) $this->pag = 1;
		$this->admin = new Administracion();
		$this->bd2 = new BDManejo($this->pag);
		$this->bd = new BDManejo($this->pag);
		$this->bd->tabla("listas_usuarios LEFT JOIN listas_asociacion ON listas_asociacion.idUsuario = listas_usuarios.idLisu");
		$this->bd->datos("COUNT(listas_usuarios.idLisu)");
		unset($this->bd->limite);
		if(isset($_SESSION['user_tipo'])) {
			if($_SESSION['user_tipo'] != 'SA') {
				if($_SESSION['user_tipo'] == 'AI')
					$opciones = "WHERE listas_usuarios.idIglesia = '".$_SESSION['user_igl']."'";
				else $opciones = "WHERE listas_usuarios.idIglesia = '".$_SESSION['user_igl']."'";
			}
		}
		
		if(isset($_REQUEST["lista_buscar"]) && htmlspecialchars($_REQUEST["lista_buscar"]) != "")
		{
			$opciones .= " AND ( listas_usuarios.lisuNombre LIKE '%".htmlspecialchars($_REQUEST['lista_buscar'])."%'";
			$opciones .= " OR listas_usuarios.lisuEmail LIKE '%".htmlspecialchars($_REQUEST['lista_buscar'])."%'";
			$opciones .= " OR listas_usuarios.lisuCelular LIKE '%".htmlspecialchars($_REQUEST['lista_buscar'])."%')";
		}
		
		if(isset($_REQUEST["lista_buscar_id"]) && htmlspecialchars($_REQUEST["lista_buscar_id"]) != "")
		{
			$opciones .= " AND listas_asociacion.idLista = '".htmlspecialchars($_REQUEST['lista_buscar_id'])."'";
		}
		$opciones .= " GROUP BY listas_usuarios.idIglesia";
		$this->bd->opciones($opciones);
		$this->total_correos = $this->bd->dato_unico();
//		$this->bd->mostrar_sql();
		//
		$this->bd->opciones("");
		$this->bd->tabla("listas");
		$this->bd->datos("COUNT(*)");
		unset($this->bd->limite);
		if(isset($_SESSION['user_tipo'])) {
			if($_SESSION['user_tipo'] != 'SA') {
				if($_SESSION['user_tipo'] == 'AI')
					$this->bd->opciones("WHERE idIglesia = '".$_SESSION['user_igl']."'");
				else $this->bd->opciones("WHERE idIglesia = '".$_SESSION['user_igl']."'");
			}
		}
		$this->total_listas = $this->bd->dato_unico();
	}
	
	function cargar_iglesias_autocompletar($tipo = NULL, $term = NULL) {
		$this->bd->tabla("iglesias");
		switch($tipo) {
			case 1 : $this->bd->datos("DISTINCT(igl_nombre)");
					 if(!empty($term)) $opciones = "WHERE igl_nombre REGEXP '".$term."'";
					 else $opciones = "WHERE igl_sede='0' AND igl_nombre REGEXP '".$term."'";
					 break;
			case 2 : $this->bd->datos("igl_id, igl_nombre");
					 if(!empty($term)) $opciones = "WHERE igl_nombre REGEXP '".$term."'";
					 else $opciones = "WHERE igl_sede='0' AND igl_nombre REGEXP '".$term."'";
					 break;
			case 3 : $this->bd->datos("DISTINCT(igl_rep_legal)");
					 if(!empty($term)) $opciones = "WHERE igl_rep_legal REGEXP '".$term."'";
					 else $opciones = "WHERE igl_sede='0' AND igl_rep_legal REGEXP '".$term."'";
					 break;
			default: $this->bd->datos("DISTINCT(igl_nombre)");
					 if(!empty($term)) $opciones = "WHERE igl_nombre REGEXP '".$term."'";
					 else $opciones = "WHERE igl_sede='0' AND igl_nombre REGEXP '".$term."'";
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
	
	function ver_listas_correo() {
		$this->bd->tabla("listas");
		echo '<script type="text/javascript" src="../Scripts/lytebox/lytebox.js"></script>'."\n";
		echo '<script type="text/javascript">initLytebox();</script>'."\n";
		echo '<script type="text/javascript">jQuery(document).ready(function() {
						jQuery("#links img[title]").tooltip({ position: "bottom center" });
					  });
					  initLytebox();
					  function actualiza() {
						  recargar(\'index3\',\'op=42\',\'#panel_derecho_menu\');
					  }
					  function eliminar(id) {
						  var entrar = confirm("�Est� seguro de eliminar la lista?");
						  if(entrar == true) {
							  var pag = jQuery("#pag").val();
							  var uri = "op=46&idlista="+id;
							  recargar(\'index3\',uri,\'#panel_derecho_menu\');
						  }
					  }
					  </script>'."\n";
		echo '<span id="titulos">Listas de correo</span>'."<br>\n";
		echo '<p><a id="links" href="index3.php?op=43" class="lytebox" data-title="Crear lista nueva" data-lyte-options="width:800 height:400 forceCloseClick:true afterEnd:actualiza">';
		echo '<img align="absmiddle" title="Crear" src="../imagenes/iconos_admin/crear.png" width="37" height="37">Crear lista nueva';
		echo '</a></p>';
				
/*		?>[<a href="#listc" onClick="recargar('index3','op=43','#panel_derecho_menu')">Click aqu&iacute; para crear una lista de correo</a><br />]<?php */
		if(!empty($this->total_listas)) {
			echo '<link href="estilo.css" rel="stylesheet" type="text/css">'."\n";
			echo '<script type="text/javascript" src="../Scripts/jquery-ui/js/jquery-1.7.1.min.js"></script>'."\n";
			echo '<script type="text/javascript" src="../Scripts/jquery.tools.min.js"></script>'."\n";
			echo '<script type="text/javascript" src="../Scripts/main_igl.js"></script>'."\n";
			$this->bd->limite = (($this->pag - 1) * 20).",20";
			$this->total_paginas = ceil($this->total_listas/20);
			echo '<span id="titulos">Total listas encontradas: </span>'.number_format($this->total_listas)."<p></p>\n";
			//$this->bd->tabla("listas");
			$this->bd->datos("listas.idLista, listas.listaNombre, listas.listaDescripcion, listas.listaCorreo, count(listas_asociacion.idUsuario) as conteo");
			$opciones = "LEFT JOIN listas_asociacion ON listas_asociacion.idLista = listas.idLista ";
			if($_SESSION['user_tipo'] != 'SA') {
				if($_SESSION['user_tipo'] == 'AI')
					$opciones .= "WHERE listas.idIglesia = '".$_SESSION['user_igl']."'";
				else $opciones .= "WHERE listas.idIglesia = '".$_SESSION['user_igl']."'";
			}
			$this->bd->opciones($opciones." GROUP BY listas.idLista ORDER BY listas.listaNombre ASC");
			//$this->bd->mostrar_sql();
			$this->bd->leer_datos();
			$this->resultados = $this->bd->array_asociativo();
			$this->op = 42;
			$this->mostrar_tabla_listas();
		}
		else {
			$mensaje = new mensajes_globales("No existen listas en la base de datos aun.", 1);
			$mensaje->mostrar_mensaje();
		}
	}

	function ver_historico_sms() {
		$this->bd->tabla("iglesias");
		$this->bd->datos("igl_sms, sms_mensual");
		if($_SESSION['user_tipo'] != 'SA') {
			if($_SESSION['user_tipo'] == 'AI')
				$opciones = "WHERE igl_id = '".$_SESSION['user_igl']."'";
			else $opciones = "WHERE igl_id = '".$_SESSION['user_igl']."'";
		}
		//$this->bd->mostrar_sql();
		$this->bd->opciones($opciones);
		$this->bd->leer_datos();
		$this->resultadosB = $this->bd->array_asociativo();
		$this->op = 58;
		foreach($this->resultadosB as $valorB) {
			$igl_sms = $valorB['igl_sms'];
			$sms_mensual = $valorB['sms_mensual'];
		}
		
		/*
		TRAEMOS EL SALDO ACTUAL
		*/
		$this->bd->tabla("sms_enviomensual");
		$this->bd->datos("id_iglesia, mes, anho, sms_enviado, sms_error, sms_saldo");
		if($_SESSION['user_tipo'] != 'SA') {
			if($_SESSION['user_tipo'] == 'AI')
			{
				$opciones = "WHERE id_iglesia = '".$_SESSION['user_igl']."'";
			}
			else
			{
				$opciones = "WHERE id_iglesia = '".$_SESSION['user_igl']."'";
			}
			//$opciones .= " AND mes =  '".date("m")."' AND anho = '".date("Y")."'";
		}
		//$this->bd->mostrar_sql();
		$this->bd->opciones($opciones);
		$this->bd->leer_datos();
		$this->resultadosB = $this->bd->array_asociativo();
		$this->op = 58;
		foreach($this->resultadosB as $valorB) {
			$sms_enviado += $valorB['sms_enviado'];
			$sms_error += $valorB['sms_error'];
			$sms_saldo += $valorB['sms_saldo'];
		}

		if($igl_sms != 1 && $_SESSION['user_tipo'] != "SA")
		{
			$mensaje = new mensajes_globales("Su congregación no cuenta aun con el modulo de mensajes de texto SMS, por favor contacte a nuestro departamento de VENTAS para mayor información.", 1);
			$mensaje->mostrar_mensaje();
		}
		else
		{
			if($_SESSION['user_tipo'] != "SA")
			{
				?>Recuerde que usted tiene un total de <strong><?=$sms_saldo-$sms_enviado; ?> SMS</strong> disponibles.<br /><br /><?php
				
				$this->bd->tabla("sms_enviomensual");
				$this->bd->datos("id_iglesia, mes, anho, sms_enviado, sms_error, sms_saldo");
				if($_SESSION['user_tipo'] != 'SA') {
					if($_SESSION['user_tipo'] == 'AI')
					{
						$opciones = "WHERE id_iglesia = '".$_SESSION['user_igl']."'";
					}
					else
					{
						$opciones = "WHERE id_iglesia = '".$_SESSION['user_igl']."'";
					}
					$opciones .= " ORDER BY anho DESC, mes DESC";
				}
				//$this->bd->mostrar_sql();
				$this->bd->opciones($opciones);
				$this->bd->leer_datos();
				$this->resultadosB = $this->bd->array_asociativo();
	
				
				$mesesArray = array();
				
				$mesesArray[] = "";
				$mesesArray[] = "Enero";
				$mesesArray[] = "Febrero";
				$mesesArray[] = "Marzo";
				$mesesArray[] = "Abril";
				$mesesArray[] = "Mayo";
				$mesesArray[] = "Junio";
				$mesesArray[] = "Julio";
				$mesesArray[] = "Agosto";
				$mesesArray[] = "Septiembre";
				$mesesArray[] = "Octubre";
				$mesesArray[] = "Noviembre";
				$mesesArray[]= "Diciembre";	
	
				echo '<script type="text/javascript" src="../Scripts/lytebox/lytebox.js"></script>'."\n";
				echo '<script type="text/javascript">initLytebox();</script>'."\n";
				echo '<script type="text/javascript">jQuery(document).ready(function() {
								jQuery("#links img[title]").tooltip({ position: "bottom center" });
							  });
							  initLytebox();
							  function actualiza() {
								  recargar(\'index3\',\'op=42\',\'#panel_derecho_menu\');
							  }
							  function eliminar(id) {
								  var entrar = confirm("�Est� seguro de eliminar la lista?");
								  if(entrar == true) {
									  var pag = jQuery("#pag").val();
									  var uri = "op=46&idlista="+id;
									  recargar(\'index3\',uri,\'#panel_derecho_menu\');
								  }
							  }
							  </script>'."\n";
				echo '<span id="titulos">Historico de saldo</span>'."<br><br>\n";
			
				echo '<link href="estilo.css" rel="stylesheet" type="text/css">'."\n";
				echo '<script type="text/javascript" src="../Scripts/jquery-ui/js/jquery-1.7.1.min.js"></script>'."\n";
				echo '<script type="text/javascript" src="../Scripts/jquery.tools.min.js"></script>'."\n";
				echo '<script type="text/javascript" src="../Scripts/main_igl.js"></script>'."\n";
				echo '<table id="vli_table" cellpadding="2" cellspacing="3" align="center" width="100%">'."\n";
				?><tr height="35px">
					<th style="border: 1px solid #700095;">AÑO</th>
					<th style="border: 1px solid #700095;">MES</th>
					<th style="border: 1px solid #700095;">SMS CARGADOS</th>
					<th style="border: 1px solid #700095;">SMS ENVIADOS</th>
					<th style="border: 1px solid #700095;">SMS NO ENVIADOS**</th>
				</tr>
				<?php
				foreach($this->resultadosB as $valorB) {
		
					echo "<tr>\n<td style=\"border: 1px solid #700095;text-align:center\" align=\"center\">\n";
					echo '<span id="titulos">';
					echo $valorB['anho'];
					echo "</span>";
					echo "</td>\n<td width=\"150\" align=\"center\" style=\"border: 1px solid #700095;\">\n";
					echo '<span id="titulos">';
					echo $mesesArray[$valorB['mes']];
					echo "</span>";
					echo "</td>\n<td width=\"150\" align=\"center\" style=\"border: 1px solid #700095;\">\n";
					echo $valorB['sms_saldo'];
					echo "</td>\n<td width=\"150\" align=\"center\" style=\"border: 1px solid #700095;\">\n";
					echo $valorB['sms_enviado'];
					echo "</td>\n<td width=\"150\" align=\"center\" style=\"border: 1px solid #700095;\">\n";
					echo $valorB['sms_error'];
					echo "</td>\n</tr>\n";
				}

				echo "<tr>\n<td style=\"border: 1px solid #700095;text-align:center\" align=\"center\">\n";
				echo "</td>\n<td width=\"150\" align=\"center\" style=\"border: 1px solid #700095;\">\n";
				echo '<span id="titulos">TOTAL';
				echo "</span>";
				echo "</td>\n<td width=\"150\" align=\"center\" style=\"border: 1px solid #700095;\">\n";
				echo $sms_saldo;
				echo "</td>\n<td width=\"150\" align=\"center\" style=\"border: 1px solid #700095;\">\n";
				echo $sms_enviado;
				echo "</td>\n<td width=\"150\" align=\"center\" style=\"border: 1px solid #700095;\">\n";
				echo $sms_error;
				echo "</td>\n</tr>\n";
				echo "</table>\n";
				?><br /><strong>SMS NO ENVIADOS**</strong> Se refiere al número de SMS que por saldo insuficiente o teléfono no valido no pudieron ser enviados.<?php
				$this->op = 59;
			}
			else
			{
				/*
				ADMINISTRADOR
				*/
				
				$this->bd->tabla("iglesias LEFT JOIN sms_enviomensual ON id_iglesia = igl_id");
				$this->bd->datos("igl_nombre, sum(sms_saldo) as sms_saldo, id_iglesia, mes, anho, sum(sms_enviado) as sms_enviado, sum(sms_error) as sms_error");
				$opciones = " WHERE iglesias.igl_sms = 1";
				$opciones .= " GROUP BY igl_id ORDER BY anho DESC, mes DESC, igl_nombre ASC";
				//$this->bd->mostrar_sql();
				$this->bd->opciones($opciones);
				$this->bd->leer_datos();
				$this->resultadosB = $this->bd->array_asociativo();
	
				
				$mesesArray = array();
				
				$mesesArray[] = "";
				$mesesArray[] = "Enero";
				$mesesArray[] = "Febrero";
				$mesesArray[] = "Marzo";
				$mesesArray[] = "Abril";
				$mesesArray[] = "Mayo";
				$mesesArray[] = "Junio";
				$mesesArray[] = "Julio";
				$mesesArray[] = "Agosto";
				$mesesArray[] = "Septiembre";
				$mesesArray[] = "Octubre";
				$mesesArray[] = "Noviembre";
				$mesesArray[]= "Diciembre";	
	
				echo '<script type="text/javascript" src="../Scripts/lytebox/lytebox.js"></script>'."\n";
				echo '<script type="text/javascript">initLytebox();</script>'."\n";
				echo '<script type="text/javascript">jQuery(document).ready(function() {
								jQuery("#links img[title]").tooltip({ position: "bottom center" });
							  });
							  initLytebox();
							  function actualiza() {
								  recargar(\'index3\',\'op=42\',\'#panel_derecho_menu\');
							  }
							  function eliminar(id) {
								  var entrar = confirm("�Est� seguro de eliminar la lista?");
								  if(entrar == true) {
									  var pag = jQuery("#pag").val();
									  var uri = "op=46&idlista="+id;
									  recargar(\'index3\',uri,\'#panel_derecho_menu\');
								  }
							  }
							  </script>'."\n";
				echo '<span id="titulos">Historico de saldo</span>'."<br><br>\n";
			
				echo '<link href="estilo.css" rel="stylesheet" type="text/css">'."\n";
				echo '<script type="text/javascript" src="../Scripts/jquery-ui/js/jquery-1.7.1.min.js"></script>'."\n";
				echo '<script type="text/javascript" src="../Scripts/jquery.tools.min.js"></script>'."\n";
				echo '<script type="text/javascript" src="../Scripts/main_igl.js"></script>'."\n";
				echo '<table id="vli_table" cellpadding="2" cellspacing="3" align="center" width="100%">'."\n";
				?><tr height="35px">
					<th style="border: 1px solid #700095;">CONGREGACIÓN</th>
					<th style="border: 1px solid #700095;">SMS CARGADOS</th>
					<th style="border: 1px solid #700095;">SMS ENVIADOS</th>
					<th style="border: 1px solid #700095;">SMS EN ERROR</th>
				</tr>
				<?php
				foreach($this->resultadosB as $valorB) {		
					echo "<tr>\n<td style=\"border: 1px solid #700095;text-align:center\" align=\"center\">\n";
					echo '<span id="titulos">';
					echo $valorB['igl_nombre'];
					echo "</span>";
					echo "</td>\n<td align=\"center\" style=\"border: 1px solid #700095;\">\n";
					echo '<span id="titulos">';
					echo $valorB['sms_saldo'];
					echo "</span>";
					echo "</td>\n<td align=\"center\" style=\"border: 1px solid #700095;\">\n";
					echo $valorB['sms_enviado'];
					echo "</td>\n<td align=\"center\" style=\"border: 1px solid #700095;\">\n";
					echo $valorB['sms_error'];
					echo "</td>\n</tr>\n";
				}
				echo "</table>\n";
				$this->op = 59;
			}
		}
	}
	
	private function mostrar_tabla_listas($tipo = NULL, $texto_busqueda = NULL, $lugar_busqueda = true, $back = 1) {
		echo '<div id="paginacion">'."\n";
		$this->admin->mostrar_paginacion($this->pag, $this->total_paginas, $this->op, $tipo, $texto_busqueda, $lugar_busqueda);
		echo '</div>'."\n";
		echo '<input type="hidden" id="pag" value="'.$this->pag.'" />'."\n";
		echo '<table id="vli_table" cellpadding="2" cellspacing="3" align="center" width="100%">'."\n";
		foreach($this->resultados as $valor) {
			echo "<tr>\n<td style=\"border-bottom: 1px solid #700095;\">\n";
			$listanombre = ucwords($valor['listaNombre']);
			echo '<span id="titulos">';
			echo '<a href="#EditarLista" title="EditarLista" onclick="recargar(\'index3\',\'op=48&lista_buscar_id='.$valor['idLista'].'\',\'#panel_derecho_menu\')">';
			echo $listanombre;
			echo '</a>';
			echo " <i>(".$valor["conteo"]." usuarios)</i>";
			echo '</span><br>';
			echo $valor['listaCorreo'];
			echo '<br>';
			echo " - ".$valor['listaDescripcion'];
			echo "</td>\n<td width=\"150\" align=\"center\" style=\"border-bottom: 1px solid #700095;\">\n";
			//if($_SESSION['user_tipo'] == "SA" || $_SESSION['user_tipo'] == $valor['user_igl']) {
				echo '<a href="#EditarLista" title="EditarLista" onclick="recargar(\'index3\',\'op=44&e=true&idlista='.$valor['idLista'].'&pag='.$this->pag.'&back='.$this->op.'&palabra='.$texto_busqueda.'&categoria='.$lugar_busqueda.'\',\'#panel_derecho_menu\')">';
				echo '<img src="../imagenes/iconos_admin/edicion.jpg" width="37" height="37" border="0" title="Editar" />';
				echo '</a>&nbsp;&nbsp;'."\n";
			echo '<a href="#EditarLista" title="EditarLista" onclick="recargar(\'index3\',\'op=48&lista_buscar_id='.$valor['idLista'].'\',\'#panel_derecho_menu\')">';
				echo '<img src="../imagenes/iconos_admin/icono_admin-afiliado_info.png" width="37" height="37" border="0" title="Ver Usuarios" />';
				echo '</a>&nbsp;&nbsp;'."\n";
				echo '<a href="#EliminarLista" title="Elimiar Lista" id="eliminarlista"';
				echo ' onclick="eliminar('.$valor['idLista'].')"';
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
		
	private function subir_imagen_evento($elm = false) {
		$tipo = substr($_FILES['evento_imagen']['type'], 0, 5);
		// Definimos Directorio donde se guarda el archivo
		$dir = '../archivos_iglesias/eventos/';
		// Intentamos Subir Archivo
		// (1) Comprovamos que existe el nombre temporal del archivo
		if (isset($_FILES['evento_imagen']['tmp_name']) and !empty($_FILES['evento_imagen']['tmp_name'])) {
			// (2) - Comprovamos que se trata de un archivo de im�gen
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
			$this->mensajes = new mensajes_globales("No a incluido ning�n Archivo.", 2);
			$this->mensajes->mostrar_mensaje();
		}
	}
	
	function crear_lista() {
		$this->form = $this->admin->cargar_request();
		//unset($this->form['op']);
		//echo "<pre>";print_r($this->form);echo "</pre>";//exit();
		echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
		echo '<link href="estilo.css" rel="stylesheet" type="text/css">'."\n";
		echo '<link href="../Scripts/jquery-ui/css/smoothness/jquery-ui-1.8.17.custom.css" rel="stylesheet" type="text/css">'."\n";
		if(empty($this->form) || $this->form['op'] == 43 and !isset($this->form['e']))
		{
			echo '<script type="text/javascript" src="../Scripts/jquery-1.7.1.min.js"></script>'."\n";
			echo '<script type="text/javascript" src="../Scripts/jquery-ui/js/jquery-1.7.1.min.js"></script>'."\n";
			echo '<script type="text/javascript" src="../Scripts/jquery-ui/js/jquery-ui-1.8.17.custom.min.js"></script>'."\n";
			echo '<script type="text/javascript" src="../Scripts/jquery.form.js"></script>'."\n";
			echo '<script type="text/javascript" src="../Scripts/jquery.validate.js"></script>'."\n";
			echo '<script type="text/javascript" src="../Scripts/jquery.validate.additional-methods.js"></script>'."\n";
			echo '<script type="text/javascript" src="../Scripts/crear_lista.js"></script>'."\n";
			echo '<link rel="stylesheet" href="../Scripts/tinyeditor/tinyeditor.css">';
			echo '<script type="text/javascript" src="../Scripts/tinyeditor/tiny.editor.packed.js"></script>';
			echo '<script type="text/javascript" language="javascript" src="../Scripts/jquery.corner.js"></script>'."\n";
			echo '<form action="index3.php?op=43" id="crear_user" name="crear_lista" method="post" onsubmit="editor.post()">';
			echo '<input type="hidden" name="e" value="true">';
			echo '<table cellpadding="2" cellspacing="3" align="center" width="100%">'."\n";
			echo "<tr>\n";
			echo '<td><label for="nombre">Nombre<label></td>'."\n";
			echo '<td><input type="text" name="nombre" id="nombre"></td>'."\n";
			echo "</tr>\n";
			echo "<tr>\n";
			echo '<td><label for="descripcion">Descripci&oacute;n</label></td>'."\n";
			echo '<td><textarea name="descripcion" id="descripcion" cols="40" rows="4"></textarea></td>'."\n";
			echo "</tr>\n";
			echo "<tr>\n";
			echo '<td><label for="email">E-mail</label></td>'."\n";
			echo '<td><input type="text" name="email" id="email"></td>'."\n";
			echo "</tr>\n";
			echo "<tr>\n";
			echo '<td valign="top"><label for="firma">Firma</label></td>'."\n";
			echo '<td><textarea name="firma" id="firma" cols="40" rows="6"></textarea></td>'."\n";
			echo "</tr>\n";
			echo "<tr>\n";
			echo '<td colspan="2" align="center"><button type="submit"><img src="../imagenes/boton_ingreso.png" align="absmiddle"> Crear Lista</button></td>'."\n";			
			echo "</tr>\n";
			echo "</table>\n";
			echo "</form>\n";
			echo '<div id="resultados_editar"></div>';
			?><script>
			var editor = new TINY.editor.edit('editor', {
				id: 'firma',
				width: 584,
				height: 175,
				cssclass: 'tinyeditor',
				controlclass: 'tinyeditor-control',
				rowclass: 'tinyeditor-header',
				dividerclass: 'tinyeditor-divider',
				controls: ['bold', 'italic', 'underline', 'strikethrough', '|', 'subscript', 'superscript', '|',
					'orderedlist', 'unorderedlist', '|', 'outdent', 'indent', '|', 'leftalign',
					'centeralign', 'rightalign', 'blockjustify', '|', 'unformat', '|', 'undo', 'redo', 'n',
					'font', 'size', 'style', '|', 'image', 'hr', 'link', 'unlink', '|', 'print'],
				footer: true,
				fonts: ['Verdana','Arial','Georgia','Trebuchet MS'],
				xhtml: true,
				cssfile: 'custom.css',
				bodyid: 'editor',
				footerclass: 'tinyeditor-footer',
				toggle: {text: 'source', activetext: 'wysiwyg', cssclass: 'toggle'},
				resize: {cssclass: 'resize'}
			});
			</script><?php
		}
		else {
			//print_r($this->form);exit();
			$this->form = $this->admin->cargar_request();
			$this->bd->tabla("listas");
			$this->bd->columnas("idUsuario, idIglesia, listaNombre, listaDescripcion, listaFirma, listaCorreo");
			$this->bd->datos("'".$_SESSION['user_01800']."', '".$_SESSION['user_igl']."', '".$this->form['nombre']."', '".$this->form['descripcion']."', '".$this->form['firma']."', '".$this->form['email']."'");
			$this->bd->insert();
			//$this->bd->mostrar_sql();
			$this->bd->ejecutar_query();
			/*$this->form['usr_id'] = $this->bd->ultimo_id();
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
			$email['mail'] = $this->form['email'];
			$email['nombre'] = $this->form['nombre'];
			$email['clave'] = "01800Iglesia";
			$this->envio_correo_usuario($email, 1);*/
			$mensaje = new mensajes_globales("Se creo la lista correctamente", 1);
			$mensaje->mostrar_mensaje();
		}
	}
	//
	//
	function crear_correo() {
		$this->form = $this->admin->cargar_request();
		//unset($this->form['op']);
		//echo "<pre>";print_r($this->form);echo "</pre>";//exit();
		echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
		echo '<link href="estilo.css" rel="stylesheet" type="text/css">'."\n";
		echo '<link href="../Scripts/jquery-ui/css/smoothness/jquery-ui-1.8.17.custom.css" rel="stylesheet" type="text/css">'."\n";
		if(empty($this->form) || $this->form['op'] == 47 and !isset($this->form['e']))
		{
			echo '<script type="text/javascript" src="../Scripts/jquery-1.7.1.min.js"></script>'."\n";
			echo '<script type="text/javascript" src="../Scripts/jquery-ui/js/jquery-1.7.1.min.js"></script>'."\n";
			echo '<script type="text/javascript" src="../Scripts/jquery-ui/js/jquery-ui-1.8.17.custom.min.js"></script>'."\n";
			echo '<script type="text/javascript" src="../Scripts/jquery.form.js"></script>'."\n";
			echo '<script type="text/javascript" src="../Scripts/jquery.validate.js"></script>'."\n";
			echo '<script type="text/javascript" src="../Scripts/jquery.validate.additional-methods.js"></script>'."\n";
			echo '<script type="text/javascript" src="../Scripts/crear_correo.js"></script>'."\n";
			echo '<script type="text/javascript" language="javascript" src="../Scripts/jquery.corner.js"></script>'."\n";
			echo '<form action="index3.php?op=47" id="crear_correo" name="crear_correo" method="post">';
			echo '<input type="hidden" name="e" value="true">';
			echo '<table cellpadding="2" cellspacing="3" align="center" width="100%">'."\n";
			echo "<tr>\n";
			echo '<td><label for="email">E-mail</label></td>'."\n";
			echo '<td><input type="text" name="email" id="email"></td>'."\n";
			echo "</tr>\n";
			echo "<tr>\n";
			echo '<td><label for="estado">Activo</label></td>'."\n";
			echo '<td><input type="checkbox" name="estado" id="estado" value="1" checked="checked"></td>'."\n";
			echo "</tr>\n";
			echo "<tr>\n";
			echo '<td><label for="nombre">Nombre<label></td>'."\n";
			echo '<td><input type="text" name="nombre" id="nombre"></td>'."\n";
			echo "</tr>\n";
			echo "<tr>\n";
			echo '<td><label for="celular">Celular</label></td>'."\n";
			echo '<td><input type="text" name="celular" id="celular"></td>'."\n";
			echo "</tr>\n";
			echo "<tr>\n";
			echo '<td><label for="cargo">Cargo</label></td>'."\n";
			echo '<td><input type="text" name="cargo" id="cargo"></td>'."\n";
			echo "</tr>\n";

			echo "<tr>\n";
			echo '<td valign="top"><label for="listas">Listas</label></td>'."\n";
			echo '<td>';
			$this->bd->tabla("listas");
			$this->bd->datos("listas.idLista, listas.listaNombre");
			$opciones = "";
			if($_SESSION['user_tipo'] != 'SA') {
				if($_SESSION['user_tipo'] == 'AI')
					$opciones .= "WHERE listas.idIglesia = '".$_SESSION['user_igl']."'";
				else $opciones .= "WHERE listas.idIglesia = '".$_SESSION['user_igl']."'";
			}
			$this->bd->opciones($opciones." ORDER BY listas.listaNombre ASC");
			//$this->bd->mostrar_sql();
			$this->bd->leer_datos();
			$this->resultados = $this->bd->array_asociativo();
			$this->op = 47;
			foreach($this->resultados as $valor) {
				$listanombre = ucwords($valor['listaNombre']);
				echo '<input type="checkbox" name="listaasociar[]" value="'.$valor["idLista"].'">';
				echo $listanombre;
				echo '<br>';
			}
			echo "</td>\n</tr>\n";

			echo "<tr>\n";
			echo '<td colspan="2" align="center"><button type="submit"><img src="../imagenes/boton_ingreso.png" align="absmiddle"> Crear Correo</button></td>'."\n";			
			echo "</tr>\n";
			echo "</table>\n";
			echo "</form>\n";
			echo '<div id="resultados_editar"></div>';
		}
		else {
			//print_r($this->form);exit();
			$this->form = $this->admin->cargar_request();
			$this->bd->tabla("listas_usuarios");
			$this->bd->columnas("idUsuario, idIglesia, lisuNombre, lisuEmail, lisuCelular, lisuEstado, lisuCargo");
			$this->bd->datos("'".$_SESSION['user_01800']."', '".$_SESSION['user_igl']."', '".$this->form['nombre']."', '".$this->form['email']."', '".$this->form['celular']."', '".$this->form['estado']."', '".$this->form['cargo']."'");
			$this->bd->insert();
			//$this->bd->mostrar_sql();
			$this->bd->ejecutar_query();
			$miultimoid = $this->bd->ultimo_id();
			//
			$this->bd->tabla("listas_asociacion");
			$this->bd->columnas("idLista, idUsuario, idIglesia");
			if(isset($_POST['listaasociar'])){
			  if (is_array($_POST['listaasociar'])) {
			    foreach($_POST['listaasociar'] as $value){
					$this->bd->datos("'".$value."', '".$miultimoid."', '".$_SESSION['user_igl']."'");
					$this->bd->insert();
					//$this->bd->mostrar_sql();
					$this->bd->ejecutar_query();
			    }
			  } else {
			    //echo $value;
			  }
			}
			/*
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
			$email['mail'] = $this->form['email'];
			$email['nombre'] = $this->form['nombre'];
			$email['clave'] = "01800Iglesia";
			$this->envio_correo_usuario($email, 1);*/
			$mensaje = new mensajes_globales("Se agrego el correo correctamente", 1);
			$mensaje->mostrar_mensaje();
		}
	}
	//
	//
	function crear_correo_varios() {
		$this->form = $this->admin->cargar_request();
		//unset($this->form['op']);
		//echo "<pre>";print_r($this->form);echo "</pre>";//exit();
		echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
		echo '<link href="estilo.css" rel="stylesheet" type="text/css">'."\n";
		echo '<link href="../Scripts/jquery-ui/css/smoothness/jquery-ui-1.8.17.custom.css" rel="stylesheet" type="text/css">'."\n";
		if(empty($this->form) || $this->form['op'] == 53 and !isset($this->form['e']))
		{
			echo '<script type="text/javascript" src="../Scripts/jquery-1.7.1.min.js"></script>'."\n";
			echo '<script type="text/javascript" src="../Scripts/jquery-ui/js/jquery-1.7.1.min.js"></script>'."\n";
			echo '<script type="text/javascript" src="../Scripts/jquery-ui/js/jquery-ui-1.8.17.custom.min.js"></script>'."\n";
			echo '<script type="text/javascript" src="../Scripts/jquery.form.js"></script>'."\n";
			echo '<script type="text/javascript" src="../Scripts/jquery.validate.js"></script>'."\n";
			echo '<script type="text/javascript" src="../Scripts/jquery.validate.additional-methods.js"></script>'."\n";
			echo '<script type="text/javascript" src="../Scripts/crear_correo_varios.js"></script>'."\n";
			echo '<script type="text/javascript" language="javascript" src="../Scripts/jquery.corner.js"></script>'."\n";
			echo '<form action="index3.php?op=53" id="crear_correo_varios" name="crear_correo_varios" method="post">';
			echo '<input type="hidden" name="e" value="true">';
			echo '<table cellpadding="2" cellspacing="3" align="center" width="100%">'."\n";
			echo "<tr>\n";
			echo '<td><label for="email">E-mails separados por coma (,)</label></td>'."\n";
			echo '<td><input type="text" name="email" id="email"></td>'."\n";
			echo "</tr>\n";

			echo "<tr>\n";
			echo '<td valign="top"><label for="listas">Listas</label></td>'."\n";
			echo '<td>';
			$this->bd->tabla("listas");
			$this->bd->datos("listas.idLista, listas.listaNombre");
			$opciones = "";
			if($_SESSION['user_tipo'] != 'SA') {
				if($_SESSION['user_tipo'] == 'AI')
					$opciones .= "WHERE listas.idIglesia = '".$_SESSION['user_igl']."'";
				else $opciones .= "WHERE listas.idIglesia = '".$_SESSION['user_igl']."'";
			}
			$this->bd->opciones($opciones." ORDER BY listas.listaNombre ASC");
			//$this->bd->mostrar_sql();
			$this->bd->leer_datos();
			$this->resultados = $this->bd->array_asociativo();
			$this->op = 53;
			foreach($this->resultados as $valor) {
				$listanombre = ucwords($valor['listaNombre']);
				echo '<input type="checkbox" name="listaasociar[]" value="'.$valor["idLista"].'">';
				echo $listanombre;
				echo '<br>';
			}
			echo "</td>\n</tr>\n";

			echo "<tr>\n";
			echo '<td colspan="2" align="center"><button type="submit"><img src="../imagenes/boton_ingreso.png" align="absmiddle"> Crear Correo</button></td>'."\n";			
			echo "</tr>\n";
			echo "</table>\n";
			echo "</form>\n";
			echo '<div id="resultados_editar"></div>';
		}
		else {
			$this->form = $this->admin->cargar_request();
			
			$miarray = explode(",", $this->form['email']);

		    foreach($miarray as $valor)
		    {
		    	if(trim($valor) != "")
		    	{
				$this->bd->tabla("listas_usuarios");
				$this->bd->columnas("idUsuario, idIglesia, lisuEmail, lisuEstado");
				$this->bd->datos("'".$_SESSION['user_01800']."', '".$_SESSION['user_igl']."', '".$valor."', 1");
				$this->bd->insert();
				$this->bd->ejecutar_query();
				$miultimoid = $this->bd->ultimo_id();
				//
				$this->bd->tabla("listas_asociacion");
				$this->bd->columnas("idLista, idUsuario, idIglesia");
				if(isset($_POST['listaasociar'])){
				  if (is_array($_POST['listaasociar'])) {
				    foreach($_POST['listaasociar'] as $value){
						$this->bd->datos("'".$value."', '".$miultimoid."', '".$_SESSION['user_igl']."'");
						$this->bd->insert();
						//$this->bd->mostrar_sql();
						$this->bd->ejecutar_query();
				    }
				  } else {
				    //echo $value;
				  }
				}
				}
			}
			//
			$mensaje = new mensajes_globales("Se agregaron los correos correctamente", 1);
			$mensaje->mostrar_mensaje();
		}
	}
	//
	//
	function cargue_archivo() {
		$this->form = $this->admin->cargar_request();
		//unset($this->form['op']);
		//echo "<pre>";print_r($this->form);echo "</pre>";//exit();
		echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
		echo '<link href="estilo.css" rel="stylesheet" type="text/css">'."\n";
		echo '<link href="../Scripts/jquery-ui/css/smoothness/jquery-ui-1.8.17.custom.css" rel="stylesheet" type="text/css">'."\n";
		if(empty($this->form) || $this->form['op'] == 60 and !isset($this->form['e']))
		{
			echo '<script type="text/javascript" src="../Scripts/jquery-1.7.1.min.js"></script>'."\n";
			echo '<script type="text/javascript" src="../Scripts/jquery-ui/js/jquery-1.7.1.min.js"></script>'."\n";
			echo '<script type="text/javascript" src="../Scripts/jquery-ui/js/jquery-ui-1.8.17.custom.min.js"></script>'."\n";
			echo '<script type="text/javascript" src="../Scripts/jquery.form.js"></script>'."\n";
			echo '<script type="text/javascript" src="../Scripts/jquery.validate.js"></script>'."\n";
			echo '<script type="text/javascript" src="../Scripts/jquery.validate.additional-methods.js"></script>'."\n";
			echo '<script type="text/javascript" src="../Scripts/crear_correo_varios.js"></script>'."\n";
			echo '<script type="text/javascript" language="javascript" src="../Scripts/jquery.corner.js"></script>'."\n";
			echo '<form  enctype="multipart/form-data" action="index3.php?op=60" id="cargue_archivo" name="cargue_archivo" method="post">';
			echo '<input type="hidden" name="e" value="true">';
			echo '<table cellpadding="2" cellspacing="3" align="center" width="100%">'."\n";
			echo "<tr>\n";
			echo '<td><label for="email">Archivo de cargue con las columnas NOMBRES, E-MAIL, CELULAR y el GRUPO al cual desea sea asignado. Recuerde que una vez cargado el archivo puede tomar varias horas para verlo reflejado en el sistema debido a que debe ser verificado y procesado.</label></td>'."\n";
			echo '<td><input type="file" name="archivo_cargue" id="archivo_cargue"></td>'."\n";
			echo "</tr>\n";

			echo "<tr>\n";
			echo '<td colspan="2" align="center"><button type="submit"><img src="../imagenes/boton_ingreso.png" align="absmiddle"> Cargar Archivo</button></td>'."\n";			
			echo "</tr>\n";
			echo "</table>\n";
			echo "</form>\n";
			echo '<div id="resultados_editar"></div>';
		}
		else if(isset($_FILES['archivo_cargue']) &&	$_FILES['archivo_cargue']['error'] == UPLOAD_ERR_OK)
		{
			$this->form = $this->admin->cargar_request();
			//compruebo si las caracter?ticas del archivo son las que deseo
			if (move_uploaded_file($_FILES['archivo_cargue']['tmp_name'],  "archivos_cargue/".date("Ymd_His")."_".$_SESSION['user_01800']."_".$_FILES['archivo_cargue']['name']))
			{
				//echo "movio";
				$exito = 1;
				$mensaje = new mensajes_globales("Se cargo el archivo correctamente, recuerde que una vez cargado el archivo puede tomar varias horas para verlo reflejado en el sistema debido a que debe ser verificado y procesado.", 1);
				//
				require_once 'PHPMailer_v5.1/class.phpmailer.php';
				$mail = new PHPMailer(true);
				$mail->AddAttachment("archivos_cargue/".date("Ymd_His")."_".$_SESSION['user_01800']."_".$_FILES['archivo_cargue']['name'],	date("Ymd_His")."_".$_SESSION['user_01800']."_".$_FILES['archivo_cargue']['name']);
				$mail->SetLanguage("es");
				$mail->Subject = "Cargue de Archivo 01800 SMS";
				// optional - MsgHTML will create an alternate automatically
				$mail->AltBody = 'Ups.';
				try {
					$body = "CARGUE DE ARCHIVO DE PARTE DE:";
					$body.= "<br />Nombre: ";
					$body.= $_SESSION['nombre'];
					$body.= "<br />User_01800: ";
					$body.= $_SESSION['user_01800'];
					$body.= "<br />Tipo: ";
					$body.= $_SESSION['user_tipo'];
					$body.= "<br />User_igl: ";
					$body.= $_SESSION['user_igl'];
					$body.= "<br />";
					$mail->MsgHTML($body);
					$mail->SetFrom("contacto@01800iglesia.org", "Sistema Automatico");
					$mail->AddAddress("jlmflash@gmail.com", "Jorge Luis M");
					$mail->Send();
				} catch (phpmailerException $e) {
					echo $e->errorMessage(); //Pretty error messages from PHPMailer	
					$mensaje = new mensajes_globales("NO se cargo el archivo", 1);
//					$contadorError++;
				} catch (Exception $e) {
					echo $e->getMessage(); //Boring error messages from anything else!
					$mensaje = new mensajes_globales("NO se cargo el archivo", 1);
//					$contadorError++;
				}
				$mail->ClearAddresses();
			}
			else
			{
				$error = 1;
				$mensaje = new mensajes_globales("NO se cargo el archivo", 1);
			}
			//$_SESSION['nombre']
			//
			//
			$mensaje->mostrar_mensaje();
		}
	}
	
	function editar_lista($idlista, $form = NULL) {
		echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
		echo '<link href="estilo.css" rel="stylesheet" type="text/css">'."\n";
		$this->idlista = $idlista;
		if(empty($form)) {
			$this->carga_lista();
			echo '<script type="text/javascript" src="../Scripts/jquery-1.7.1.min.js"></script>'."\n";
			echo '<script type="text/javascript" src="../Scripts/jquery.form.js"></script>'."\n";
			echo '<script type="text/javascript" src="../Scripts/jquery.validate.js"></script>'."\n";
			echo '<script type="text/javascript" src="../Scripts/jquery.validate.additional-methods.js"></script>'."\n";
			echo '<script type="text/javascript" language="javascript" src="../Scripts/jquery.corner.js"></script>'."\n";
			echo '<link rel="stylesheet" href="../Scripts/tinyeditor/tinyeditor.css">';
			echo '<script type="text/javascript" src="../Scripts/tinyeditor/tiny.editor.packed.js"></script>';
			echo '<script type="text/javascript" src="../Scripts/edit_lista.js"></script>'."\n";
			echo '<form action="index3.php?op=45&idlista='.$this->idlista.'" id="edit_lista" name="edit_lista" method="post" onsubmit="editor.post()">';
			echo '<input type="hidden" name="idlista" id="idlista" value="'.$idlista.'">';
			echo '<table cellpadding="2" cellspacing="3" align="center" width="100%">'."\n";
			foreach($this->resultados as $valor) {
			echo '<table cellpadding="2" cellspacing="3" align="center" width="100%">'."\n";
			echo "<tr>\n";
			echo '<td><label for="nombre">Nombre<label></td>'."\n";
			echo '<td><input type="text" name="nombre" id="nombre" value="'.$valor['listaNombre'].'"></td>'."\n";
			echo "</tr>\n";
			echo "<tr>\n";
			echo '<td><label for="descripcion">Descripci&oacute;n</label></td>'."\n";
			echo '<td><textarea name="descripcion" id="descripcion" cols="40" rows="4">'.$valor['listaDescripcion'].'</textarea></td>'."\n";
			echo "</tr>\n";
			echo "<tr>\n";
			echo '<td><label for="email">E-mail</label></td>'."\n";
			echo '<td><input type="text" name="email" id="email" value="'.$valor['listaCorreo'].'"></td>'."\n";
			echo "</tr>\n";
			echo "<tr>\n";
			echo '<td valign="top"><label for="firma">Firma</label></td>'."\n";
			echo '<td><textarea name="firma" id="firma" cols="40" rows="6">'.$valor['listaFirma'].'</textarea></td>'."\n";
			echo "</tr>\n";
			echo "<tr>\n";
			echo '<td colspan="2" align="center"><button type="submit"><img src="../imagenes/boton_ingreso.png" align="absmiddle">Actualizar Lista</button></td>'."\n";			
			echo "</tr>\n";
			echo "</table>\n";
			echo "</form>\n";
			?><script>
			var editor = new TINY.editor.edit('editor', {
				id: 'firma',
				width: 584,
				height: 175,
				cssclass: 'tinyeditor',
				controlclass: 'tinyeditor-control',
				rowclass: 'tinyeditor-header',
				dividerclass: 'tinyeditor-divider',
				controls: ['bold', 'italic', 'underline', 'strikethrough', '|', 'subscript', 'superscript', '|',
					'orderedlist', 'unorderedlist', '|', 'outdent', 'indent', '|', 'leftalign',
					'centeralign', 'rightalign', 'blockjustify', '|', 'unformat', '|', 'undo', 'redo', 'n',
					'font', 'size', 'style', '|', 'image', 'hr', 'link', 'unlink', '|', 'print'],
				footer: true,
				fonts: ['Verdana','Arial','Georgia','Trebuchet MS'],
				xhtml: true,
				cssfile: 'custom.css',
				bodyid: 'editor',
				footerclass: 'tinyeditor-footer',
				toggle: {text: 'source', activetext: 'wysiwyg', cssclass: 'toggle'},
				resize: {cssclass: 'resize'}
			});

			</script><?php
			}
			echo '<div id="resultados_editar"></div>';
		}
		else {
			$this->form = $this->admin->cargar_request();
			$this->bd->tabla("listas");
			$this->bd->datos("listaNombre = '".$this->form['nombre']."', listaDescripcion = '".$this->form['descripcion']."', listaFirma = '".$this->form['firma']."', listaCorreo = '".$this->form['email']."'");
			$this->bd->opciones(" WHERE listas.idLista = '".$this->form['idlista']."'");
			$this->bd->actualiza();
			//$this->bd->mostrar_sql();
			$this->resultados = $this->bd->ejecutar_query();
			if($this->resultados == 1) $mensaje = new mensajes_globales("Se actualizo la lista correctamente", 1);
			else $mensaje = new mensajes_globales("No se actualizo la lista correctamente", 3); 
			$mensaje->mostrar_mensaje();
		}
	}

	function carga_lista() {
		$this->bd->tabla("listas");
		$this->bd->datos("listas.*, count(listas_asociacion.idUsuario) as conteo");
		$this->bd->opciones("LEFT JOIN listas_asociacion ON listas_asociacion.idLista = listas.idLista WHERE listas.idLista = '".$this->idlista."';");
		$this->bd->leer_datos();
		$this->resultados = $this->bd->array_asociativo();
		return $this->resultados;
	}

	function borrar_lista($idlista) {
		$this->bd->tabla("listas");
		$this->bd->opciones("WHERE idLista='".$idlista."'");
		$this->bd->eliminar();
		$this->resultados[0] = $this->bd->ejecutar_query();
		$this->bd->tabla("listas_asociacion");
		$this->bd->opciones("WHERE idLista='".$idlista."'");
		$this->bd->eliminar();
		$this->resultados[1] = $this->bd->ejecutar_query();
		if($this->resultados[0] == 1) $mensaje = new mensajes_globales("La lista ha sido eliminada", 1);
		else $mensaje = new mensajes_globales("La lista no ha sido eliminada", 3);
		$mensaje->mostrar_mensaje();
		$this->ver_listas_correo();
	}

	function borrar_usuario($idlisu) {
		$this->bd->tabla("listas_usuarios");
		$this->bd->opciones("WHERE idLisu ='".$idlisu."'");
		$this->bd->eliminar();
		$this->resultados[0] = $this->bd->ejecutar_query();
		$this->bd->tabla("listas_asociacion");
		$this->bd->opciones("WHERE idUsuario ='".$idlisu."'");
		$this->bd->eliminar();
		$this->resultados[1] = $this->bd->ejecutar_query();
		if($this->resultados[0] == 1) $mensaje = new mensajes_globales("El usuario ha sido eliminado", 1);
		else $mensaje = new mensajes_globales("El usuario no ha sido eliminado", 3);
		$mensaje->mostrar_mensaje();
		$this->ver_usuarios_correo();
	}

	function ver_usuarios_correo() {
		$this->bd->tabla("listas_usuarios");
		echo '<script type="text/javascript" src="../Scripts/lytebox/lytebox.js"></script>'."\n";
		echo '<script type="text/javascript">initLytebox();</script>'."\n";
		echo '<script type="text/javascript">jQuery(document).ready(function() {
						jQuery("#links img[title]").tooltip({ position: "bottom center" });
					  });
					  initLytebox();
					  function actualiza() {
						  recargar(\'index3\',\'op=48\',\'#panel_derecho_menu\');
					  }
					  function eliminarLisu(id) {
						  var entrar = confirm("�Est� seguro de eliminar el correo del usuario? Esto borrara tambien al usuario de todas las listas donde este asociado");
						  if(entrar == true) {
							  var pag = jQuery("#pag").val();
							  var uri = "op=51&idlisu="+id;
							  recargar(\'index3\',uri,\'#panel_derecho_menu\');
						  }
					  }
					  </script>'."\n";
		echo '<span id="titulos">Usuarios de mensajeria</span>'."<br>\n";
		echo '<p><a id="links" href="index3.php?op=47" class="lytebox" data-title="Crear usuario nuevo" data-lyte-options="width:800 height:400 forceCloseClick:true afterEnd:actualiza">';
		echo '<img align="absmiddle" title="Crear" src="../imagenes/iconos_admin/crear.png" width="37" height="37">Crear usuario nuevo';
		echo '</a>';

		echo '<a id="links" href="index3.php?op=53" class="lytebox" data-title="Crear multiples usuarios (Solo e-mail)" data-lyte-options="width:800 height:400 forceCloseClick:true afterEnd:actualiza">';
		echo '<img align="absmiddle" title="Crear" src="../imagenes/iconos_admin/crearvarios.png" width="37" height="37">Crear multiples usuarios (Solo e-mail)';
		echo '</a>';

		echo '<a id="links" href="index3.php?op=60" class="lytebox" data-title="Cargar Archivo" data-lyte-options="width:800 height:400 forceCloseClick:true afterEnd:actualiza">';
		echo '<img align="absmiddle" title="Cargar" src="../imagenes/iconos_admin/crearvarios.png" width="37" height="37">Cargar Archivo';
		echo '</a></p>';


				
/*		?>[<a href="#listc" onClick="recargar('index3','op=43','#panel_derecho_menu')">Click aqu&iacute; para crear una lista de correo</a><br />]<?php */
		if(!empty($this->total_correos)) {
			echo '<link href="estilo.css" rel="stylesheet" type="text/css">'."\n";
			echo '<script type="text/javascript" src="../Scripts/jquery-ui/js/jquery-1.7.1.min.js"></script>'."\n";
			echo '<script type="text/javascript" src="../Scripts/jquery.tools.min.js"></script>'."\n";
			echo '<script type="text/javascript" src="../Scripts/main_igl.js"></script>'."\n";

			?><script>
			function formularioCargar() {
				recargar("index3", "op=48&lista_buscar="+$('#lista_buscar').val()+"&lista_buscar_id="+$('#lista_buscar_id').val(), '#panel_derecho_menu');
			}
			</script>
			<?php //echo $_SERVER['REQUEST_URI']; ?>
            <div>
            <table width="30%" border="0" cellspacing="2" cellpadding="0" align="right">
            <tr>
                <td><label for="lista_buscar">Busqueda</label></td>
                <td><input type="text" name="lista_buscar" id="lista_buscar" value="<?php
                if(!empty($_REQUEST['lista_buscar'])) echo htmlspecialchars($_REQUEST['lista_buscar']);
                ?>" /></td>
                <td><label for="lista_buscar_id">Grupo</label></td>
                <td><select name="lista_buscar_id" id="lista_buscar_id">
                <option value="">Todos</option>
                <?php
                $this->bd->tabla("listas");
                $this->bd->datos("listas.idLista, listas.listaNombre");
                $opciones = "";
                if($_SESSION['user_tipo'] != 'SA') {
                    if($_SESSION['user_tipo'] == 'AI')
                        $opciones .= "WHERE listas.idIglesia = '".$_SESSION['user_igl']."'";
                    else $opciones .= "WHERE listas.idIglesia = '".$_SESSION['user_igl']."'";
                }
                $this->bd->opciones($opciones." ORDER BY listas.listaNombre ASC");
                //$this->bd->mostrar_sql();
                $this->bd->leer_datos();
                $this->resultados = $this->bd->array_asociativo();
                foreach($this->resultados as $valor) {
                    $listanombre = ucwords($valor['listaNombre']);
                    echo '<option value="'.$valor['idLista'].'" ';
					if(isset($_REQUEST["lista_buscar_id"]) && htmlspecialchars($_REQUEST["lista_buscar_id"]) != "" && htmlspecialchars($_REQUEST["lista_buscar_id"]) == $valor['idLista'])
					{
						echo 'selected="selected"';
					}
					echo '>'.$valor['idLista']." - ".$listanombre.'</option>';
                }
				?>
                </select></td>
                <td>
                    <button name="submit" onClick="formularioCargar()" type="button"><img src="../imagenes/boton_buscar.png" width="22" height="22" align="absmiddle"></button></td>
            </tr>
            </table>
            </div>
            <hr />
			<?php

			$this->bd->limite = (($this->pag - 1) * 20).",20";
			$this->total_paginas = ceil($this->total_correos/20);
			echo '<span id="titulos">Total registros encontrados: </span>'.number_format($this->total_correos)."<p></p>\n";
			$this->bd->tabla("listas_usuarios");
			$this->bd->datos("listas_usuarios.idLisu, listas_usuarios.lisuNombre, listas_usuarios.lisuEmail, listas_usuarios.lisuCelular, listas_usuarios.lisuEstado, count(listas_asociacion.idLista) as conteo");
			$opciones = "LEFT JOIN listas_asociacion ON listas_asociacion.idUsuario = listas_usuarios.idLisu ";
			if($_SESSION['user_tipo'] != 'SA') {
				if($_SESSION['user_tipo'] == 'AI')
					$opciones .= "WHERE listas_usuarios.idIglesia = '".$_SESSION['user_igl']."'";
				else $opciones .= "WHERE listas_usuarios.idIglesia = '".$_SESSION['user_igl']."'";
			}
			
			if(isset($_REQUEST["lista_buscar"]) && htmlspecialchars($_REQUEST["lista_buscar"]) != "")
			{
				$opciones .= " AND ( listas_usuarios.lisuNombre LIKE '%".htmlspecialchars($_REQUEST['lista_buscar'])."%'";
				$opciones .= " OR listas_usuarios.lisuEmail LIKE '%".htmlspecialchars($_REQUEST['lista_buscar'])."%'";
				$opciones .= " OR listas_usuarios.lisuCelular LIKE '%".htmlspecialchars($_REQUEST['lista_buscar'])."%')";
			}
			if(isset($_REQUEST["lista_buscar_id"]) && htmlspecialchars($_REQUEST["lista_buscar_id"]) != "")
			{
				$opciones .= " AND listas_asociacion.idLista = '".htmlspecialchars($_REQUEST['lista_buscar_id'])."'";
			}
			
			$this->bd->opciones($opciones." GROUP BY listas_usuarios.idLisu ORDER BY listas_usuarios.lisuNombre, listas_usuarios.lisuCelular, listas_usuarios.lisuEmail ASC");
			$this->bd->leer_datos();
			//$this->bd->mostrar_sql();
			$this->resultados = $this->bd->array_asociativo();
			$this->op = 48;
			$this->mostrar_tabla_usuarios();
		}
		else {
			$mensaje = new mensajes_globales("No existen usuarios con los filtros seleccionados.", 1);
			$mensaje->mostrar_mensaje();
		}
	}
	
	private function mostrar_tabla_usuarios($tipo = NULL, $texto_busqueda = NULL, $lugar_busqueda = true, $back = 1) {
		echo '<div id="paginacion">'."\n";
		$this->admin->mostrar_paginacion($this->pag, $this->total_paginas, $this->op, $tipo, $texto_busqueda, $lugar_busqueda);
		echo '</div>'."\n";
		echo '<input type="hidden" id="pag" value="'.$this->pag.'" />'."\n";
		echo '<table id="vli_table" cellpadding="2" cellspacing="3" align="center" width="100%">'."\n";
		foreach($this->resultados as $valor) {
			echo "<tr>\n<td style=\"border-bottom: 1px solid #700095;\">\n";
			echo '<span id="titulos">';
			echo $valor["lisuEmail"];
			echo " - ";
			echo $valor["lisuCelular"];
			echo " <i>(".$valor["conteo"]." listas)</i>";
			echo '</span><br>';
			echo $valor['lisuNombre'];
			echo "</td>\n<td width=\"150\" align=\"center\" style=\"border-bottom: 1px solid #700095;\">\n";
				echo '<a href="#EditarLisu" title="EditarLisu" onclick="recargar(\'index3\',\'op=49&e=true&idlisu='.$valor['idLisu'].'&pag='.$this->pag.'&back='.$this->op.'&palabra='.$texto_busqueda.'&categoria='.$lugar_busqueda.'\',\'#panel_derecho_menu\')">';
				echo '<img src="../imagenes/iconos_admin/edicion.jpg" width="37" height="37" border="0" title="Editar" />';
				echo '</a>&nbsp;&nbsp;'."\n";
				echo '<a href="#EliminarLisu" title="Elimiar Usuario" id="eliminarlisu"';
				echo ' onclick="eliminarLisu('.$valor['idLisu'].')"';
				echo '>';
				echo '<img src="../imagenes/iconos_admin/icono_admin-eliminar_iglesia.png" width="37" height="37" border="0" title="Eliminar" />';
				echo '</a>'."\n";
		}
		echo "</td>\n</tr>\n";
		echo "</table>\n";
		echo '<div id="paginacion">'."\n";
		$this->admin->mostrar_paginacion($this->pag, $this->total_paginas, $this->op, $tipo, $texto_busqueda, $lugar_busqueda);
		echo '</div>'."\n";
	}

	function editar_usuario($idlisu, $form = NULL) {
		//echo "idlisu:".$idlisu;
		echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
		echo '<link href="estilo.css" rel="stylesheet" type="text/css">'."\n";
		$this->idlisu = $idlisu;
		if(empty($form)) {
			$this->carga_usuario();
			echo '<script type="text/javascript" src="../Scripts/jquery-1.7.1.min.js"></script>'."\n";
			echo '<script type="text/javascript" src="../Scripts/jquery.form.js"></script>'."\n";
			echo '<script type="text/javascript" src="../Scripts/jquery.validate.js"></script>'."\n";
			echo '<script type="text/javascript" src="../Scripts/jquery.validate.additional-methods.js"></script>'."\n";
			echo '<script type="text/javascript" language="javascript" src="../Scripts/jquery.corner.js"></script>'."\n";
			echo '<script type="text/javascript" src="../Scripts/edit_correo.js"></script>'."\n";
			echo '<form action="index3.php?op=50&idlisu='.$this->idlisu.'" id="edit_correo" name="edit_correo" method="post">';
			echo '<input type="hidden" name="idlisu" id="idlisu" value="'.$idlisu.'">';
			echo '<table cellpadding="2" cellspacing="3" align="center" width="100%">'."\n";
			foreach($this->resultados as $valor)
			{
			echo '<table cellpadding="2" cellspacing="3" align="center" width="100%">'."\n";
			echo "<tr>\n";
			echo '<td><label for="email">E-mail</label></td>'."\n";
			echo '<td><input type="text" name="email" id="email" value="'.$valor['lisuEmail'].'"></td>'."\n";
			echo "</tr>\n";
			echo "<tr>\n";
			echo '<td><label for="estado">Activo</label></td>'."\n";
			echo '<td><input type="checkbox" name="estado" id="estado" value="1" ';
			
			if($valor['lisuEstado'] == 1)
			{
				echo 'checked="checked"';
			}
			
			echo '></td>'."\n";
			echo "</tr>\n";
			echo "<tr>\n";
			echo '<td><label for="nombre">Nombre<label></td>'."\n";
			echo '<td><input type="text" name="nombre" id="nombre" value="'.$valor['lisuNombre'].'"></td>'."\n";
			echo "</tr>\n";
			echo "<tr>\n";
			echo '<td><label for="celular">Celular</label></td>'."\n";
			echo '<td><input type="text" name="celular" id="celular" value="'.$valor['lisuCelular'].'"></td>'."\n";
			echo "</tr>\n";
			echo "<tr>\n";
			echo '<td><label for="cargo">Cargo</label></td>'."\n";
			echo '<td><input type="text" name="cargo" id="cargo" value="'.$valor['lisuCargo'].'"></td>'."\n";
			echo "</tr>\n";

			echo "<tr>\n";
			echo '<td valign="top"><label for="listas">Listas</label></td>'."\n";
			echo '<td>';
			$this->bd->tabla("listas");
			$this->bd->datos("listas.idLista, listas.listaNombre, count(listas_asociacion.idLista) as conteo");
			$opciones = " LEFT JOIN listas_asociacion ON listas_asociacion.idLista = listas.idLista AND listas_asociacion.idUsuario = '".$idlisu."'";
			if($_SESSION['user_tipo'] != 'SA') {
				if($_SESSION['user_tipo'] == 'AI')
					$opciones .= "WHERE listas.idIglesia = '".$_SESSION['user_igl']."'";
				else $opciones .= "WHERE listas.idIglesia = '".$_SESSION['user_igl']."'";
			}
			$this->bd->opciones($opciones." GROUP BY listas.idLista ORDER BY listas.listaNombre ASC");
			//$this->bd->mostrar_sql();
			$this->bd->leer_datos();
			$this->resultadosB = $this->bd->array_asociativo();
			$this->op = 49;
			foreach($this->resultadosB as $valorB) {
				$listanombre = ucwords($valorB['listaNombre']);
				echo '<input type="checkbox" name="listaasociar[]" value="'.$valorB["idLista"].'"';
				if($valorB['conteo'] > 0)
				{
					echo 'checked="checked"';
				}
				echo '>';
				echo $listanombre;
				echo '<br>';
			}
			echo "</td>\n</tr>\n";


			echo "<tr>\n";
			echo '<td colspan="2" align="center"><button type="submit"><img src="../imagenes/boton_ingreso.png" align="absmiddle">Actualizar Usuario Correo</button></td>'."\n";			
			echo "</tr>\n";
			echo "</table>\n";
			echo "</form>\n";
			}
			echo '<div id="resultados_editar"></div>';
		}
		else {
			$this->form = $this->admin->cargar_request();
			$this->bd->tabla("listas_usuarios");
			$this->bd->datos("lisuNombre = '".$this->form['nombre']."', lisuEmail = '".$this->form['email']."', lisuCelular = '".$this->form['celular']."', lisuEstado = '".$this->form['estado']."', lisuCargo = '".$this->form['cargo']."'");
			$this->bd->opciones(" WHERE listas_usuarios.idLisu = '".$this->idlisu."'");
			$this->bd->actualiza();
			//$this->bd->mostrar_sql();
			$this->resultados = $this->bd->ejecutar_query();

			$this->bd->tabla("listas_asociacion");
			$this->bd->opciones("WHERE idUsuario='".$idlisu."'");
			$this->bd->eliminar();
			$this->bd->ejecutar_query();

			$this->bd->tabla("listas_asociacion");
			$this->bd->columnas("idLista, idUsuario, idIglesia");
			if(isset($_POST['listaasociar'])){
			  if (is_array($_POST['listaasociar'])) {
			    foreach($_POST['listaasociar'] as $value){
					$this->bd->datos("'".$value."', '".$idlisu."', '".$_SESSION['user_igl']."'");
					$this->bd->insert();
					//$this->bd->mostrar_sql();
					$this->bd->ejecutar_query();
			    }
			  } else {
			    //echo $value;
			  }
			}

			if($this->resultados == 1) $mensaje = new mensajes_globales("Se actualizo la lista correctamente", 1);
			else $mensaje = new mensajes_globales("No se actualizo la lista correctamente", 3); 
			$mensaje->mostrar_mensaje();
		}
	}

	function carga_usuario() {
		$this->bd->tabla("listas_usuarios");
		$this->bd->datos("listas_usuarios.*, count(listas_asociacion.idUsuario) as conteo");
		$this->bd->opciones("LEFT JOIN listas_asociacion ON listas_asociacion.idUsuario = listas_usuarios.idLisu WHERE listas_usuarios.idLisu = '".$this->idlisu."' GROUP BY listas_usuarios.idLisu;");
		$this->bd->leer_datos();
		$this->resultados = $this->bd->array_asociativo();
		return $this->resultados;
	}

	function envio_masivo() {
		$this->form = $this->admin->cargar_request();
		//unset($this->form['op']);
		//echo "<pre>";print_r($this->form);echo "</pre>";//exit();
		echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
		echo '<link href="estilo.css" rel="stylesheet" type="text/css">'."\n";
		echo '<link href="../Scripts/jquery-ui/css/smoothness/jquery-ui-1.8.17.custom.css" rel="stylesheet" type="text/css">'."\n";
		if(empty($this->form) || $this->form['op'] == 52 and !isset($this->form['e']))
		{
			echo '<script type="text/javascript" src="../Scripts/jquery-1.7.1.min.js"></script>'."\n";
			echo '<script type="text/javascript" src="../Scripts/jquery-ui/js/jquery-1.7.1.min.js"></script>'."\n";
			echo '<script type="text/javascript" src="../Scripts/jquery-ui/js/jquery-ui-1.8.17.custom.min.js"></script>'."\n";
			echo '<script type="text/javascript" src="../Scripts/jquery.form.js"></script>'."\n";
			echo '<script type="text/javascript" src="../Scripts/jquery.validate.js"></script>'."\n";
			echo '<script type="text/javascript" src="../Scripts/jquery.validate.additional-methods.js"></script>'."\n";
			echo '<script type="text/javascript" src="../Scripts/envio_masivo.js"></script>'."\n";
			echo '<link rel="stylesheet" href="../Scripts/tinyeditor/tinyeditor.css">';
			echo '<script type="text/javascript" src="../Scripts/tinyeditor/tiny.editor.packed.js"></script>';
			echo '<script type="text/javascript" language="javascript" src="../Scripts/jquery.corner.js"></script>'."\n";
			echo '<form action="index3.php?op=52" id="envio_masivo" name="envio_masivo" enctype="multipart/form-data" method="post" onsubmit="editor.post()" target="resultados_editar">';
			echo '<input type="hidden" name="e" value="true">';
			echo '<table cellpadding="2" cellspacing="3" align="center" width="100%">'."\n";
			echo "<tr>\n";
			echo '<td><label for="asunto">Asunto<label></td>'."\n";
			echo '<td><input type="text" name="asunto" id="asunto"></td>'."\n";
			echo "</tr>\n";
			echo "<tr>\n";
			echo '<td valign="top"><label for="mensajecorreo">Mensaje</label></td>'."\n";
			echo '<td><textarea name="mensajecorreo" id="mensajecorreo" cols="40" rows="6"></textarea></td>'."\n";
			echo "</tr>\n";
			echo "<tr>\n";
			echo '<td><label for="archivoadjunto">Archivo Adjunto<label></td>'."\n";
			echo '<td><input type="file" name="archivoadjunto" id="archivoadjunto"></td>'."\n";
			echo "</tr>\n";


			echo "<tr>\n";
			echo '<td valign="top"><label for="listas">Listas</label></td>'."\n";
			echo '<td>';
			$this->bd->tabla("listas");
			$this->bd->datos("listas.idLista, listas.listaNombre");
			$opciones = "";
			if($_SESSION['user_tipo'] != 'SA') {
				if($_SESSION['user_tipo'] == 'AI')
					$opciones .= "WHERE listas.idIglesia = '".$_SESSION['user_igl']."'";
				else $opciones .= "WHERE listas.idIglesia = '".$_SESSION['user_igl']."'";
			}
			$this->bd->opciones($opciones." ORDER BY listas.listaNombre ASC");
			//$this->bd->mostrar_sql();
			$this->bd->leer_datos();
			$this->resultados = $this->bd->array_asociativo();
			$this->op = 52;
			foreach($this->resultados as $valor) {
				$listanombre = ucwords($valor['listaNombre']);
				echo '<input type="checkbox" name="listaasociar[]" value="'.$valor["idLista"].'">';
				echo $listanombre;
				echo '<br>';
			}
			echo "</td>\n</tr>\n";



			echo "<tr>\n";
			echo '<td colspan="2" align="center"><button type="submit"><img src="../imagenes/boton_ingreso.png" align="absmiddle"> Enviar Mensaje</button></td>'."\n";			
			echo "</tr>\n";
			echo "</table>\n";
			echo "</form>\n";
			echo '<iframe name="resultados_editar" id="resultados_editar" width="100%" height="100px">.</iframe>';
			?><script>
			var editor = new TINY.editor.edit('editor', {
				id: 'mensajecorreo',
				width: 584,
				height: 175,
				cssclass: 'tinyeditor',
				controlclass: 'tinyeditor-control',
				rowclass: 'tinyeditor-header',
				dividerclass: 'tinyeditor-divider',
				controls: ['bold', 'italic', 'underline', 'strikethrough', '|', 'subscript', 'superscript', '|',
					'orderedlist', 'unorderedlist', '|', 'outdent', 'indent', '|', 'leftalign',
					'centeralign', 'rightalign', 'blockjustify', '|', 'unformat', '|', 'undo', 'redo', 'n',
					'font', 'size', 'style', '|', 'image', 'hr', 'link', 'unlink', '|', 'print'],
				footer: true,
				fonts: ['Verdana','Arial','Georgia','Trebuchet MS'],
				xhtml: true,
				cssfile: 'custom.css',
				bodyid: 'editor',
				footerclass: 'tinyeditor-footer',
				toggle: {text: 'source', activetext: 'wysiwyg', cssclass: 'toggle'},
				resize: {cssclass: 'resize'}
			});
			</script><?php
		}
		else {
			//print_r($this->form);exit();
			$this->form = $this->admin->cargar_request();
			/*
			$this->bd->tabla("listas");
			$this->bd->columnas("idUsuario, idIglesia, listaNombre, listaDescripcion, listaFirma, listaCorreo");
			$this->bd->datos("'".$_SESSION['user_01800']."', '".$_SESSION['user_igl']."', '".$this->form['nombre']."', '".$this->form['descripcion']."', '".$this->form['firma']."', '".$this->form['email']."'");
			$this->bd->insert();
			//$this->bd->mostrar_sql();
			$this->bd->ejecutar_query();
			*/

			$mensaje = new mensajes_globales("Cargando request..", 1);
			$mensaje->mostrar_mensaje();

			if(isset($_POST['listaasociar']))
			{
				if(is_array($_POST['listaasociar'])) 
			  	{
					require_once 'PHPMailer_v5.1/class.phpmailer.php';
					
					$listas = implode(",", $_POST['listaasociar']);
					//
					$this->bd->tabla("listas, listas_asociacion, listas_usuarios");
					$this->bd->datos("listas.listaCorreo, listas.listaNombre, listas.listaFirma, listas_usuarios.lisuEmail, listas_usuarios.lisuCelular, listas_usuarios.lisuNombre");
					$opciones = "";
					if($_SESSION['user_tipo'] != 'SA') {
						if($_SESSION['user_tipo'] == 'AI')
							$opciones .= "WHERE listas_usuarios.idIglesia = '".$_SESSION['user_igl']."'";
							else $opciones .= "WHERE listas_usuarios.idIglesia = '".$_SESSION['user_igl']."'";
					}
					else
					{
						$opciones .= "WHERE listas_usuarios.idIglesia = '".$_SESSION['user_igl']."'";
					}
					$this->bd->opciones($opciones." AND listas_asociacion.idUsuario = listas_usuarios.idLisu AND listas.idLista IN (".$listas.") AND listas_asociacion.idLista = listas.idLista ORDER BY listas.listaNombre ASC");
					$this->bd->leer_datos();
					//$this->bd->mostrar_sql();
					$this->resultados = $this->bd->array_asociativo();
					$this->op = 52;

					$asuntoactual = $this->form['asunto'];

					//defaults to using php "mail()"; the true param means it will throw exceptions on errors, which we need to catch
					$mail = new PHPMailer(true);

					if (isset($_FILES['archivoadjunto']) &&
					    $_FILES['archivoadjunto']['error'] == UPLOAD_ERR_OK) {
					    $mail->AddAttachment($_FILES['archivoadjunto']['tmp_name'],
                        $_FILES['archivoadjunto']['name']);
					}

					$mail->SetLanguage("es");
					$mail->Subject = $asuntoactual;
					// optional - MsgHTML will create an alternate automatically
					$mail->AltBody = '';
					

					$contadorOk = 0;
					$contadorError = 0;
					foreach($this->resultados as $valor)
					{
						try {
							$body = $this->form['mensajecorreo']."<br /><br />".$valor["listaFirma"]."<hr ><font size='1'>Si no desea recibir mas mensajes responda a este correo electronico con el asunto DAR DE BAJA.<br />01800-Iglesia. Todos los derechos reservados �".date("Y")."</font>";
							$mail->MsgHTML($body);
							$mail->SetFrom($valor["listaCorreo"], $valor["listaNombre"]);
							$mail->AddAddress($valor['lisuEmail'], $valor['lisuNombre']);
							$mail->Send();
							} catch (phpmailerException $e) {
								echo $e->errorMessage(); //Pretty error messages from PHPMailer	
								$contadorError++;
							} catch (Exception $e) {
								echo $e->getMessage(); //Boring error messages from anything else!
							$contadorError++;
						}
						$mail->ClearAddresses();
						$contadorOk++;				
					}
					$mensaje = new mensajes_globales("Se enviaron ".$contadorOk." mensajes.", 1);
					$mensaje->mostrar_mensaje();

			  	} 
			  	else
			  	{
					$mensaje = new mensajes_globales("Debe seleccionar al menos una lista.", 1);
					$mensaje->mostrar_mensaje();
			  	}
			}
		  	else
		  	{
				$mensaje = new mensajes_globales("Debe seleccionar al menos una lista.", 1);
				$mensaje->mostrar_mensaje();
		  	}
		}
	}

	function envio_masivo_sms() {
		$this->form = $this->admin->cargar_request();
		//unset($this->form['op']);
		//echo "<pre>";print_r($this->form);echo "</pre>";//exit();
		echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
		echo '<link href="estilo.css" rel="stylesheet" type="text/css">'."\n";
		echo '<link href="../Scripts/jquery-ui/css/smoothness/jquery-ui-1.8.17.custom.css" rel="stylesheet" type="text/css">'."\n";
		echo '<link href="../Scripts/token-input.css" rel="stylesheet" type="text/css">'."\n";

	
		$this->bd->tabla("iglesias");
		$this->bd->datos("igl_sms, sms_mensual, igl_sms_user, igl_sms_pass");
		if($_SESSION['user_tipo'] != 'SA') {
			if($_SESSION['user_tipo'] == 'AI')
				$opciones = "WHERE igl_id = '".$_SESSION['user_igl']."'";
			else $opciones = "WHERE igl_id = '".$_SESSION['user_igl']."'";
		}
		//$this->bd->mostrar_sql();
		$this->bd->opciones($opciones);
		$this->bd->leer_datos();
		$this->resultadosB = $this->bd->array_asociativo();
		$this->op = 58;
		foreach($this->resultadosB as $valorB) {
			$igl_sms = $valorB['igl_sms'];
			$sms_mensual = $valorB['sms_mensual'];
			$igl_sms_user = $valorB['igl_sms_user'];
			$igl_sms_pass = $valorB['igl_sms_pass'];
		}
		
		/*
		TRAEMOS EL SALDO ACTUAL
		*/
		$this->bd->tabla("sms_enviomensual");
		$this->bd->datos("id_iglesia, mes, anho, sms_enviado, sms_error, sms_saldo");
		if($_SESSION['user_tipo'] != 'SA') {
			if($_SESSION['user_tipo'] == 'AI')
			{
				$opciones = "WHERE id_iglesia = '".$_SESSION['user_igl']."'";
			}
			else
			{
				$opciones = "WHERE id_iglesia = '".$_SESSION['user_igl']."'";
			}
			//$opciones .= " AND mes =  '".date("m")."' AND anho = '".date("Y")."'";
		}
		//$this->bd->mostrar_sql();
		$this->bd->opciones($opciones);
		$this->bd->leer_datos();
		$this->resultadosB = $this->bd->array_asociativo();
		$this->op = 58;
		foreach($this->resultadosB as $valorB) {
			$sms_enviado += $valorB['sms_enviado'];
			$sms_error += $valorB['sms_error'];
			$sms_saldo += $valorB['sms_saldo'];
		}
		
		if($igl_sms != 1)
		{
			$mensaje = new mensajes_globales("Su congregación no cuenta aun con el modulo de mensajes de texto SMS, por favor contacte a nuestro departamento de VENTAS para mayor información.", 1);
			$mensaje->mostrar_mensaje();
		}
		else if(empty($this->form) || $this->form['op'] == 58 and !isset($this->form['e']))
		{
			echo '<script type="text/javascript" src="../Scripts/jquery-1.7.1.min.js"></script>'."\n";
			echo '<script type="text/javascript" src="../Scripts/jquery-ui/js/jquery-1.7.1.min.js"></script>'."\n";
			echo '<script type="text/javascript" src="../Scripts/jquery-ui/js/jquery-ui-1.8.17.custom.min.js"></script>'."\n";
			echo '<script type="text/javascript" src="../Scripts/jquery.form.js"></script>'."\n";
			echo '<script type="text/javascript" src="../Scripts/jquery.validate.js"></script>'."\n";
			echo '<script type="text/javascript" src="../Scripts/jquery.validate.additional-methods.js"></script>'."\n";
			echo '<script type="text/javascript" src="../Scripts/jquery.tokeninput.js"></script>'."\n";
			echo '<script type="text/javascript" src="../Scripts/envio_masivo_sms.js"></script>'."\n";
			echo '<script type="text/javascript" language="javascript" src="../Scripts/jquery.corner.js"></script>'."\n";
			?>Recuerde que usted tiene un total de <strong><?=$sms_saldo-$sms_enviado; ?> SMS</strong> disponibles.<br /><br />
            <?php
			echo '<form action="index3.php?op=58" id="envio_masivo_sms" name="envio_masivo_sms" enctype="multipart/form-data" method="post" target="resultados_editar">';
			echo '<input type="hidden" name="e" value="true">';
			echo '<table cellpadding="2" cellspacing="3" align="center" width="100%">'."\n";
			echo "<tr>\n";
			echo '<td valign="top"><label for="mensajecorreo">Mensaje</label></td>'."\n";
			echo '<td><textarea name="mensajecorreo" id="mensajecorreo" cols="40" rows="6"></textarea></td>'."\n";
			echo "</tr>\n";
			echo "<tr>\n";
			echo '<td valign="top"><label for="listas">Grupos</label></td>'."\n";
			echo '<td>';
			$this->bd->tabla("listas");
			$this->bd->datos("listas.idLista, listas.listaNombre");
			$opciones = "";
			if($_SESSION['user_tipo'] != 'SA') {
				if($_SESSION['user_tipo'] == 'AI')
					$opciones .= "WHERE listas.idIglesia = '".$_SESSION['user_igl']."'";
				else $opciones .= "WHERE listas.idIglesia = '".$_SESSION['user_igl']."'";
			}
			$this->bd->opciones($opciones." ORDER BY listas.listaNombre ASC");
			//$this->bd->mostrar_sql();
			$this->bd->leer_datos();
			$this->resultados = $this->bd->array_asociativo();
			$this->op = 58;
			foreach($this->resultados as $valor) {
				$listanombre = ucwords($valor['listaNombre']);
				echo '<input type="checkbox" name="listaasociar[]" value="'.$valor["idLista"].'">';
				echo $listanombre;
				echo '<br>';
			}
			echo "</td>\n</tr>\n";


			?><tr>
            <td valign="top"><label for="listas">Usuarios Individuales:</label></td>
            <td><div><input type="text" id="mensajeusumanual" name="mensajeusumanual" />
			<script type="text/javascript">
			$(document).ready(function() {
				$("#mensajeusumanual").tokenInput("busqueda.php");
			});
			</script></div></td>
            </tr><?php

			echo "<tr>\n";
			echo '<td colspan="2" align="center"><button type="submit"><img src="../imagenes/boton_ingreso.png" align="absmiddle"> Enviar Mensaje</button></td>'."\n";			
			echo "</tr>\n";
			echo "</table>\n";
			echo "</form>\n";
			echo '<iframe name="resultados_editar" id="resultados_editar" width="100%" height="160px">.</iframe>';
		}
		else 
		{
			//print_r($this->form);exit();
			$this->form = $this->admin->cargar_request();
			/*
			$this->bd->tabla("listas");
			$this->bd->columnas("idUsuario, idIglesia, listaNombre, listaDescripcion, listaFirma, listaCorreo");
			$this->bd->datos("'".$_SESSION['user_01800']."', '".$_SESSION['user_igl']."', '".$this->form['nombre']."', '".$this->form['descripcion']."', '".$this->form['firma']."', '".$this->form['email']."'");
			$this->bd->insert();
			//$this->bd->mostrar_sql();
			$this->bd->ejecutar_query();
			*/
	
			$mesDB = date("m");
			$anhoDB = date("Y");
			$mensaje = new mensajes_globales("Cargando request..", 1);
			$mensaje->mostrar_mensaje();

			/*
			*	ENVIO A LISTAS
			*/
			if(isset($_POST['listaasociar']))
			{
				if(is_array($_POST['listaasociar'])) 
			  	{
					$listas = implode(",", $_POST['listaasociar']);
					//
					$this->bd->tabla("listas, listas_asociacion, listas_usuarios");
					$this->bd->datos("listas.listaCorreo, listas.listaNombre, listas.listaFirma, listas_usuarios.lisuEmail, listas_usuarios.lisuCelular, listas_usuarios.lisuNombre");
					$opciones = "";
					if($_SESSION['user_tipo'] != 'SA') {
						if($_SESSION['user_tipo'] == 'AI')
							$opciones .= "WHERE listas_usuarios.idIglesia = '".$_SESSION['user_igl']."'";
							else $opciones .= "WHERE listas_usuarios.idIglesia = '".$_SESSION['user_igl']."'";
					}
					else
					{
						$opciones .= "WHERE listas_usuarios.idIglesia = '".$_SESSION['user_igl']."'";
					}
					$this->bd->opciones($opciones." AND listas_asociacion.idUsuario = listas_usuarios.idLisu AND listas.idLista IN (".$listas.") AND listas_asociacion.idLista = listas.idLista ORDER BY listas.listaNombre ASC");
					$this->bd->leer_datos();
					//$this->bd->mostrar_sql();
					$this->resultados = $this->bd->array_asociativo();
					$this->op = 58;

					$contadorOk = 0;
					$contadorError = 0;
					foreach($this->resultados as $valor)
					{
						$mensaje_sms = urlencode($this->form['mensajecorreo']);
//						$mensaje_sms = str_replace(' ', '%20', $this->form['mensajecorreo']);
						/*
							AQUI VA EL ENVIO DEL MENSAJE SMS
							AQUI VA EL ENVIO DEL MENSAJE SMS
							AQUI VA EL ENVIO DEL MENSAJE SMS
							AQUI VA EL ENVIO DEL MENSAJE SMS
							AQUI VA EL ENVIO DEL MENSAJE SMS
						*/
						if(trim($valor["lisuCelular"]) != "")
						{
							//$xml = file_get_contents("https://sistemasmasivos.com/smsmasivo/api/sendsms/send.php?user=videoe@callmefone.com&password=uAZzLISZ2N&GSM=".$valor["lisuCelular"]."&SMSText=".$mensaje_sms);
							
							$xml = file_get_contents("https://sistemasmasivos.com/smsmasivo/api/sendsms/send.php?user=".urlencode($igl_sms_user)."&password=".$igl_sms_pass."&GSM=".$valor["lisuCelular"]."&SMSText=".$mensaje_sms);
							
							/*
							echo "URL:";
							echo "https://sistemasmasivos.com/smsmasivo/api/sendsms/send.php?user=".$igl_sms_user."&password=".$igl_sms_pass."=".$valor["lisuCelular"]."&SMSText=".$mensaje_sms;
							echo "<br />XML:".$xml.".";
							*/
							//
							$retorno = explode(",", $xml);
							if(trim($retorno[1]) > 0 && trim($retorno[1]) != "")
							{
								$this->bd2->tabla("sms_enviomensual");
								$this->bd2->columnas("id_iglesia, mes, anho, sms_enviado");
								$this->bd2->datos("'".$_SESSION['user_igl']."', '".$mesDB."', '".$anhoDB."', 1");
								$this->bd2->opciones(" ON DUPLICATE KEY UPDATE sms_enviado = (sms_enviado+1)");
								$this->bd2->replace();
								//$this->bd2->mostrar_sql();
								$this->bd2->ejecutar_query();
								$this->bd2->opciones("");
								$contadorOk++;				
							}
							else
							{
								$this->bd2->tabla("sms_enviomensual");
								$this->bd2->columnas("id_iglesia, mes, anho, sms_error");
								$this->bd2->datos("'".$_SESSION['user_igl']."', '".$mesDB."', '".$anhoDB."', 1");
								$this->bd2->opciones(" ON DUPLICATE KEY UPDATE sms_error = (sms_error+1)");
								$this->bd2->replace();
								//$this->bd2->mostrar_sql();
								$this->bd2->ejecutar_query();
								$this->bd2->opciones("");
								if($retorno[0] < 0)
								{
									echo "<strong><u>Error:</u></strong> ";
									switch($retorno[0])
									{
										case -3:
											echo "<strong>Saldo INSUFICIENTE (#".$valor["lisuCelular"].")...</strong><br />";
											break;
										case -4:
											echo "<strong>Celular INVALIDO (#".$valor["lisuCelular"].")...</strong><br />";
											break;
										case -5:
											echo "<strong>Mensaje invalido  (#".$valor["lisuCelular"].")...</strong><br />";
											break;
										case -6:
											echo "<strong>Sistema en mantenimiento, perdone los inconvenientes  (#".$valor["lisuCelular"].")...</strong><br />";
											break;
										default:
											echo "<strong>Error de autenticacion  (#".$valor["lisuCelular"].")...</strong><br />";
											break;
									}
								}
								$contadorError++;
							}
						}
					}
					$mensaje = new mensajes_globales("Se enviaron ".$contadorOk." mensajes con EXITO y hubo ".$contadorError." mensajes con error", 1);
					$mensaje->mostrar_mensaje();

			  	} 
			  	else
			  	{
					if(trim($_POST['mensajeusumanual']) == "")
					{
						$mensaje = new mensajes_globales("Debe seleccionar al menos una lista.", 1);
						$mensaje->mostrar_mensaje();
					}
			  	}

			}
		  	else
		  	{
				if(trim($_POST['mensajeusumanual']) == "")
				{
					$mensaje = new mensajes_globales("Debe seleccionar al menos una lista.", 1);
					$mensaje->mostrar_mensaje();
				}
		  	}

			/*
			*
			*	ENVIO A CORREOS MANUALES
			*
			*/
//			echo "*****".$_POST['mensajeusumanual'];
			if(isset($_POST['mensajeusumanual']) && trim($_POST['mensajeusumanual']) != "")
			{
				//
				$this->bd->tabla("listas_usuarios");
				$this->bd->datos("listas_usuarios.lisuEmail, listas_usuarios.lisuCelular, listas_usuarios.lisuNombre");
				$opciones = "";
				if($_SESSION['user_tipo'] != 'SA') {
					if($_SESSION['user_tipo'] == 'AI')
						$opciones .= "WHERE listas_usuarios.idIglesia = '".$_SESSION['user_igl']."'";
						else $opciones .= "WHERE listas_usuarios.idIglesia = '".$_SESSION['user_igl']."'";
				}
				else
				{
					$opciones .= "WHERE listas_usuarios.idIglesia = '".$_SESSION['user_igl']."'";
				}
				$this->bd->opciones($opciones." AND listas_usuarios.idLisu IN (".htmlspecialchars($_POST['mensajeusumanual']).") ORDER BY listas_usuarios.lisuNombre ASC");
				$this->bd->leer_datos();
				//$this->bd->mostrar_sql();
				$this->resultados = $this->bd->array_asociativo();
				$this->op = 58;

				$contadorOk = 0;
				$contadorError = 0;
				foreach($this->resultados as $valor)
				{
					$mensaje_sms = urlencode($this->form['mensajecorreo']);
//						$mensaje_sms = str_replace(' ', '%20', $this->form['mensajecorreo']);
					/*
						AQUI VA EL ENVIO DEL MENSAJE SMS
						AQUI VA EL ENVIO DEL MENSAJE SMS
						AQUI VA EL ENVIO DEL MENSAJE SMS
						AQUI VA EL ENVIO DEL MENSAJE SMS
						AQUI VA EL ENVIO DEL MENSAJE SMS
					*/
					if(trim($valor["lisuCelular"]) != "")
					{
						//$xml = file_get_contents("https://sistemasmasivos.com/smsmasivo/api/sendsms/send.php?user=videoe@callmefone.com&password=uAZzLISZ2N&GSM=".$valor["lisuCelular"]."&SMSText=".$mensaje_sms);
						
						$xml = file_get_contents("https://sistemasmasivos.com/smsmasivo/api/sendsms/send.php?user=".urlencode($igl_sms_user)."&password=".$igl_sms_pass."&GSM=".$valor["lisuCelular"]."&SMSText=".$mensaje_sms);
						
						/*
						echo "URL:";
						echo "https://sistemasmasivos.com/smsmasivo/api/sendsms/send.php?user=".$igl_sms_user."&password=".$igl_sms_pass."=".$valor["lisuCelular"]."&SMSText=".$mensaje_sms;
						echo "<br />XML:".$xml.".";
						*/
						//
						$retorno = explode(",", $xml);
						if(trim($retorno[1]) > 0 && trim($retorno[1]) != "")
						{
							$this->bd2->tabla("sms_enviomensual");
							$this->bd2->columnas("id_iglesia, mes, anho, sms_enviado");
							$this->bd2->datos("'".$_SESSION['user_igl']."', '".$mesDB."', '".$anhoDB."', 1");
							$this->bd2->opciones(" ON DUPLICATE KEY UPDATE sms_enviado = (sms_enviado+1)");
							$this->bd2->replace();
							//$this->bd2->mostrar_sql();
							$this->bd2->ejecutar_query();
							$this->bd2->opciones("");
							$contadorOk++;				
						}
						else
						{
							$this->bd2->tabla("sms_enviomensual");
							$this->bd2->columnas("id_iglesia, mes, anho, sms_error");
							$this->bd2->datos("'".$_SESSION['user_igl']."', '".$mesDB."', '".$anhoDB."', 1");
							$this->bd2->opciones(" ON DUPLICATE KEY UPDATE sms_error = (sms_error+1)");
							$this->bd2->replace();
							//$this->bd2->mostrar_sql();
							$this->bd2->ejecutar_query();
							$this->bd2->opciones("");
							if($retorno[0] < 0)
							{
								echo "<strong><u>Error:</u></strong> ";
								switch($retorno[0])
								{
									case -3:
										echo "<strong>Saldo INSUFICIENTE (#".$valor["lisuCelular"].")...</strong><br />";
										break;
									case -4:
										echo "<strong>Celular INVALIDO (#".$valor["lisuCelular"].")...</strong><br />";
										break;
									case -5:
										echo "<strong>Mensaje invalido  (#".$valor["lisuCelular"].")...</strong><br />";
										break;
									case -6:
										echo "<strong>Sistema en mantenimiento, perdone los inconvenientes  (#".$valor["lisuCelular"].")...</strong><br />";
										break;
									default:
										echo "<strong>Error de autenticacion  (#".$valor["lisuCelular"].")...</strong><br />";
										break;
								}
							}
							$contadorError++;
						}
					}
				}
				$mensaje = new mensajes_globales("Se enviaron ".$contadorOk." mensajes individuales con EXITO y hubo ".$contadorError." mensajes con error", 1);
				$mensaje->mostrar_mensaje();
			}
		}
	}
	//
	
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
}
?>
<?php
defined( '_01800' ) or die('Acceso no permitido');

class Glosario {
	private $bd;
	private $palabras;
	private $letras;
	private $lang = NULL;
	private $post;
	
	function __construct($lang = NULL) {
		$this->bd = new BDManejo();
		if(!empty($lang)) $this->lang = $lang;
	}
	
	function cargar_palabras($letra = NULL) {
		$this->bd->tabla("glosario");
		$this->bd->datos("glosario.glo_id, glosario.descripcion, glosario.id_idioma, LOWER(glosario.palabra) as palabra, idiomas.codigo as idioma");
		$opciones = "INNER JOIN idiomas ON glosario.id_idioma=idiomas.id";
		if(!empty($this->lang)) $opciones .= " WHERE id_idioma='".$this->lang."'";
		if(!empty($letra)) $opciones .= " AND palabra REGEXP LOWER('^".$letra."')";
		$opciones .= " ORDER BY glo_id ASC";
		$this->bd->opciones($opciones);
		$this->bd->leer_datos();
		//$this->bd->mostrar_sql();
		return $this->palabras = $this->bd->array_asociativo();
	}
	
	function agregar() {
		$this->cargar_palabras();
		if(empty($this->palabras)) {
			$mensaje = new mensajes_globales("No existen palabras en el glosario", 2);
			$mensaje->mostrar_mensaje();
		}
		require_once("forms/glosario.html.php");
	}
	
	function guardar() {
		$this->bd->tabla("glosario");
		$this->bd->columnas("palabra, descripcion, id_idioma");
		foreach($_REQUEST as $key=>$valor) {
			if(is_array($valor)) {
				foreach($valor as $value) {
					$value['palabra'] = trim($value['palabra']);
					$value['significado'] = trim(htmlentities($value['significado'], ENT_QUOTES, "UTF-8"));
					$value['idioma'] = trim(htmlentities($value['idioma'], ENT_QUOTES, "UTF-8"));
					$this->bd->datos("'".$value['palabra']."', '".$value['significado']."', '".$value['idioma']."'");
					$this->bd->insert();
					$this->bd->ejecutar_query();
				}
			}
		}
		$mensaje = new mensajes_globales("Se ha(n) ingresado la(s) palabra(s) con exito", 1);
		$mensaje->mostrar_mensaje();
		$this->mostrar_admin();
	}
	
	function cargar_abecedario() {
		$this->bd->tabla("glosario");
		$this->bd->datos("DISTINCT(UPPER(LEFT(palabra,1))) AS letra");
		if(!empty($this->lang)) $this->bd->opciones("WHERE id_idioma='".$this->lang."' ORDER BY letra ASC");
		else $this->bd->opciones("ORDER BY letra ASC");
		$this->bd->leer_datos();
		//$this->bd->mostrar_sql();
		return $this->letras = $this->bd->array_asociativo();		
	}
	
	function mostrar_admin($letra = NULL) {
		$this->cargar_palabras();
		if(!empty($this->palabras)) {
			echo '<span id="titulos">Glosario<br>Palabras:</span>'.count($this->palabras);
			echo '<script type="text/javascript" src="../Scripts/jquery-1.7.1.min.js"></script>';
			echo '<script type="text/javascript" src="../Scripts/jquery.tools.min.js"></script>';
			echo '<script>jQuery(document).ready(function() { jQuery("#link img[title]").tooltip({ position: "bottom center" }); });</script>';			
			echo '<script>initLytebox();</script>';
			echo '<script>
			function eliminar(id) {
        		    var entrar = confirm("¿Está seguro de eliminar la palabra del glosario?");
					if(entrar == true) {
						var uri = "op=29&id="+id;
						recargar(\'index3\',uri,\'#panel_derecho_menu\');
					}
	    	    }</script>';
			echo '<p><a ';
			if(!empty($this->lang) and $this->lang == 3) echo 'class="active" ';
			echo 'href="#ingles" onClick="recargar(\'index3\', \'op=27&lang=3\', \'#panel_derecho_menu\')">Ingles</a> / '."\n";
			echo '<a ';
			if(!empty($this->lang) and $this->lang == 7) echo 'class="active" ';
			echo 'href="#espa&ntilde;ol" onClick="recargar(\'index3\', \'op=27&lang=7\', \'#panel_derecho_menu\')">Espa&ntilde;ol</a> / '."\n";
			echo '<a ';
			if(empty($this->lang)) echo 'class="active" ';
			echo 'href="#espa&ntilde;ol" onClick="recargar(\'index3\', \'op=27\', \'#panel_derecho_menu\')">Todas</a></p>'."\n";
			$this->cargar_abecedario($letra);
			echo '<div style="float: right">';
			foreach($this->letras as $value) {
				if($letra == false) {
				  $letra = $value['letra'];
				}
				if($letra != $value['letra'])
					echo '<a href="#'.$value['letra'].'" onclick="recargar(\'index3\', \'op=27&lang='.$this->lang.'&letra='.$value['letra'].'\', \'#panel_derecho_menu\')">';
				echo strtoupper($value['letra'])." ";
				if($letra != $value['letra']) echo "</a> ";
			}
			$this->cargar_palabras($letra);
			if($letra == "Ñ") $letra = "nn";
			echo '</div><img src="../imagenes/abecedario/'.strtolower($letra).'.png" width="34" height="27" align="absmiddle" align="left" /><br><br>';
			echo '<table id="table" width="100%" border="0" cellspacing="0" cellpadding="1">'."\n";
			echo '  <thead>'."\n";
			echo '	  <th width="5%">Id</th>'."\n";
			echo '    <th width="25%">Palabra</th>'."\n";
			echo '    <th width="50%">Significado</th>'."\n";
			echo '    <th width="10%">Idioma</th>'."\n";
			echo '    <th width="10%">Acci&oacute;n</th>'."\n";
			echo '  </thead>'."\n";
			foreach($this->palabras as $valor) {
				echo '  <tr>';
				echo '		<td align="center" style="border-left: 1px solid #700095; border-top: 1px solid #700095; border-bottom: 1px solid #700095;">'.$valor['glo_id'].'</td>'."\n";
				echo '		<td align="center" style="border-top: 1px solid #700095; border-bottom: 1px solid #700095;">'.$valor['palabra'].'</td>'."\n";
				echo '		<td align="center" style="border-top: 1px solid #700095; border-bottom: 1px solid #700095;">'.$valor['descripcion'].'</td>'."\n";
				if($valor['idioma'] == "es") $l = "Espa&ntilde;ol";
				if($valor['idioma'] == "en") $l = "Ingles";
				echo '		<td align="center" style="border-top: 1px solid #700095; border-bottom: 1px solid #700095;">'.$l.'</td>'."\n";
				echo '		<td align="center" style="border-right: 1px solid #700095; border-top: 1px solid #700095; border-bottom: 1px solid #700095;">';
				echo '<a id="link" href="index3.php?op=28&id='.$valor['glo_id'].'" class="lytebox" data-title="Editar ';
					echo ucwords(strtolower(htmlentities($valor['palabra']))).'" data-lyte-options="width:600 heigh:200">';
				echo '<img src="../imagenes/iconos_admin/icono_admin-palabra_edit.png" width="37" height="37" align="absmiddle" title="Editar" /> ';
				echo '</a>';
				echo '<a id="link" href="#" onClick="eliminar('.$valor['glo_id'].')">';
				echo '<img src="../imagenes/iconos_admin/icono_admin-palabra_eliminar.png" width="37" height="37" align="absmiddle" title="Borrar" />';
				echo '</a>';
				echo '</td>'."\n";
				echo '	</tr>';
			}
			echo '</table>'."\n";
		}
		else {
			$mensaje = new mensajes_globales("No existen palabras en el glosario", 2);
			$mensaje->mostrar_mensaje();
		}
	}
	
	function editar_palabra($id = NULL, $e = false) {
		if(empty($id) || !is_numeric($id)) $mensaje = new mensajes_globales("No puede editar un campo vac&iacute;o", 3);
		elseif(!empty($id) and is_numeric($id) and $e === false) {
			$this->bd->tabla("glosario");
			$this->bd->datos("*");
			$this->bd->opciones("WHERE glo_id='".$id."'");
			$this->bd->leer_datos();
			$this->palabras = $this->bd->array_asociativo();
			if(!empty($this->palabras)) require_once("forms/editar_palabra_glosario.html.php");
			else $mensaje = new mensajes_globales("La palabra seleccionada no existe", 2);
		}
		elseif(!empty($id) and is_numeric($id) and $e == true) {
			$palabra = trim(htmlentities($_REQUEST['palabra']));
			$significado = trim(htmlentities($_REQUEST['significado']));
			$idioma = trim(htmlentities($_REQUEST['idioma']));
			$this->bd->tabla("glosario");
			$this->bd->datos("palabra='".$palabra."', descripcion='".$significado."', id_idioma='".$idioma."'");
			$this->bd->opciones("WHERE glo_id='".$id."'");
			$this->bd->actualiza();
			$this->bd->ejecutar_query();
			$mensaje = new mensajes_globales("Se ha actualizado la Palabra ".$palabra, 1);
		}
		if(isset($mensaje)) $mensaje->mostrar_mensaje();
	}
	
	function eliminar_palabra($id) {
		if(empty($id) || !is_numeric($id)) $mensaje = new mensajes_globales("No puede editar un campo vac&iacute;o", 3);
		elseif(!empty($id) and is_numeric($id)) {
			$this->bd->tabla("glosario");
			$this->bd->opciones("WHERE glo_id='".$id."'");
			$this->bd->eliminar();
			$this->bd->ejecutar_query();
			$mensaje = new mensajes_globales("Se ha eliminado la Palabra ".$palabra, 1);
		}
		if(isset($mensaje)) echo "<br />".$mensaje->mostrar_mensaje();
		$this->mostrar_admin();
	}
}
<?php
defined( '_01800' ) or die('Acceso no permitido');

//Clase de iglesia
class Banner {
	private $pag;
	private $bd;
	private $resultados;
	private $total_imagenes;
	private $total_activos;
	private $total_paginas;
	var $op;
	private $admin;
	private $id;
	private $form;
	private $mensajes;
	
	//Función constructora
	function __construct($pag = 1, $op = NULL) {
		if(!empty($this->op)) $this->op = $op;
		else $this->op = 1;
		$this->pag = $pag;
		if($this->pag < 1) $this->pag = 1;
		$this->admin = new Administracion();
		$this->bd = new BDManejo($this->pag);
		$this->bd->tabla("banner");
		$this->bd->datos("COUNT(*)");
		unset($this->bd->limite);
		$this->total_imagenes = $this->bd->dato_unico();
		$this->bd->datos("COUNT(*)");
		$this->bd->opciones("WHERE ban_status='A'");
		unset($this->bd->limite);
		$this->total_activos = $this->bd->dato_unico();
	}
	
	function listar_imagenes() {
		$this->bd->datos("*");
		$this->bd->opciones("");
		$this->bd->leer_datos();
		$this->resultados = $this->bd->array_asociativo();
		echo '<link href="estilo.css" rel="stylesheet" type="text/css">'."\n";
		echo '<script type="text/javascript" src="../Scripts/jquery-ui/js/jquery-1.7.1.min.js"></script>'."\n";
		echo '<script type="text/javascript" src="../Scripts/jquery.tools.min.js"></script>'."\n";
		?>
			<script>
				initLytebox();
				$(document).ready(function() { 
					$("#subir_img_iframe").hide();
					$("#subir_img").click(function() {
						$("#subir_img_iframe").show();
					});
					jQuery("#link img[title]").tooltip({ position: "bottom center" });
				});

				function refrescar() { recargar('index3','op=9&pag=<?php echo $this->pag ?>','#panel_derecho_menu') };

				function eliminar(id) {
					var entrar = confirm("¿Está seguro de eliminar la imagen No. "+id+"?");
					if(entrar == true) {
						var uri = "op=37&id="+id;
						recargar('index3',uri,'#panel_derecho_menu');
					}
				}
			</script>
		<?php
		echo '<button type="button" id="subir_img">'."\n";
		echo '<img src="../imagenes/boton_enviar_form_contacto.png" width="26" height="26" align="absmiddle" /> Subir imagen'."\n";
		echo '</button>'."\n";
		echo '<span id="subir_img_iframe"><br />'."\n";
		echo '<iframe id="iframeupload" style="height:50px; border:0; overflow:hidden" src="upload.php?op=2" name="iframeupload"></iframe>'."\n";
		echo '</span>'."\n";
		echo '<table id="vli_table" cellpadding="2" cellspacing="3" align="center" width="100%">'."\n";
		if(!empty($this->resultados)) {
			foreach($this->resultados as $valor) {
				echo '<tr>'."\n";
				echo '<td>';
				$tmp = getimagesize('../banner/'.$valor['ban_imagen']);
					if($tmp[0] > 498 || $tmp[1] > 190) {
						if($tmp[0] > $tmp[1]) { $width = 498; $height = (498 * $tmp[1])/$tmp[0]; }
						elseif($tmp[0] < $tmp[1]) { $width = (190 * $tmp[0])/$tmp[1]; $height = 190; }
						elseif($tmp[0] == $tmp[1]) { $width = 190; $height = 190; }
					}
					else { $width = $tmp[0]; $height = $tmp[1]; }
				echo '<a href="#" class="lytetip" data-description="Tooltip" data-title="" data-tip="<img src='.htmlentities('"../banner/'.$valor['ban_imagen'].'" width="'.$width.'" height="'.$height.'" />').'">'.$valor['ban_imagen'].'</a></td>'."\n";
				echo '<td width="45">';
				if($valor['ban_status'] == "A") {
					echo '<a href="#activar/desactivar" title="activar/desactivar" onclick="recargar(\'index3\',\'op=24&id='.$valor['ban_id'].'&pag='.$this->pag.'&status='.$valor['ban_status'].'\',\'#panel_derecho_menu\')">';
					echo '<img src="../imagenes/checked.png" />';
					echo '</a>';
				}
				elseif($this->total_activos < 4 and $valor['ban_status'] == "I") {
					echo '<a href="#activar/desactivar" title="activar/desactivar" onclick="recargar(\'index3\',\'op=24&id='.$valor['ban_id'].'&pag='.$this->pag.'&status='.$valor['ban_status'].'\',\'#panel_derecho_menu\')">';
					echo '<img src="../imagenes/checked_off.png" />';
					echo '</a>';
				}
				elseif($valor['ban_status'] == "I") echo '<img src="../imagenes/checked_off.png" />';
				echo ' <a href="#Eliminar_imagen" id="link" title="Eliminar imagen" onclick="eliminar(\''.$valor['ban_id'].'\')">';
				echo '<img src="../imagenes/boton_borrar_form_contacto.png" />';
				echo '</a>';
				echo '</td>'."\n";
				echo '</tr>'."\n";
			}
		}
		else {
			$mensaje = new mensajes_globales("No existen imagenes para el banner rotativo", 2);
			$mensaje->mostrar_mensaje();
		}
		echo '</table>'."\n";
	}
	
	function status($id) {
		$this->status = $_REQUEST['status'];
		if($this->status == "A") $this->status = "I";
		else $this->status = "A";
		if($this->status == "I") {
			$this->bd->datos("COUNT(*)");
			$this->bd->opciones("WHERE ban_status='A'");
			unset($this->bd->limite);
			$this->total_activos = $this->bd->dato_unico();
			if($this->total_activos == 1) {
				$mensaje = new mensajes_globales("No se pueden desactivar todas las imagenes", 2);
				$mensaje->mostrar_mensaje();
				$this->listar_imagenes();
				exit();
			}
		}
		$this->bd->datos("ban_status='".$this->status."'");
		$this->bd->opciones("WHERE ban_id='".$id."'");
		$this->bd->actualiza();
		if($this->bd->ejecutar_query() == 1) $mensaje = new mensajes_globales("Se ha activado/desactivado la imagen con exito", 1);
		else $mensaje = new mensajes_globales("No se ha activado/desactivado la imagen con exito", 1);
		$mensaje->mostrar_mensaje();
		$this->bd->datos("COUNT(*)");
		$this->bd->opciones("WHERE ban_status='A'");
		unset($this->bd->limite);
		$this->total_activos = $this->bd->dato_unico();
		$this->listar_imagenes();
	}
	
	function activos() {
		$this->bd->datos("*");
		$this->bd->opciones("WHERE ban_status='A'");
		$this->bd->leer_datos();
		return $this->resultados = $this->bd->array_asociativo();
	}
	
	function delete_imagen($id) {
		if(!empty($id)) {
			$this->bd->datos("*");
			$this->bd->opciones("WHERE ban_id='".$id."'");
			$this->bd->leer_datos();
			$this->resultados = $this->bd->fila_unica();
			$archivo = "../banner/".$this->resultados['ban_imagen'];
			if(file_exists($archivo)) unlink($archivo);
			$this->bd->eliminar();
			$this->bd->ejecutar_query();
			$this->listar_imagenes();
		}
	}
}
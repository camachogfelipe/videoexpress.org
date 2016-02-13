<?php
if(!isset($_SESSION)) session_start();
$file = $_SERVER['SCRIPT_NAME'];
if (strrpos($file, "/")) {
	$file = explode("/", $file);
	$ap = count($file) - 1;
	$file = $file[$ap];
}
if(isset($_GET['r'])) $r = $_GET['r'];
if($file == "paso1.php" and empty($r)) header("Location: index.php");
if(empty($_SESSION['lang'])) exit("Acceso restringido");
include("lang/".$_SESSION['lang']."/lang.php");
defined ( '_01800Index' ) or define ( '_01800Index', 1);
$p = $d = $c = $pag = NULL;
require_once("clases/index.php");
if(!isset($paises)) $paises = new regiones($r, $p, $d, $c, $pag);
if(!isset($tooltips)) $tooltips = new regiones($r, $p, $d, $c, $pag);
if(!defined("inc_paso1")) {
?>
<script type="text/javascript" src="Scripts/jquery-1.9.1.min.js?ver=1.9.1"></script>
<script type="text/javascript" src="Scripts/jquery.tools.min.js"></script>
<script type="text/javascript" language="javascript" src="Scripts/jquery.corner.js"></script>
<script>
jQuery(document).ready(function() {
	// main vertical scroll
	jQuery("#main").scrollable({	
		// basic settings
		vertical: true,	
		// up/down keys will always control this scrollable
		keyboard: 'static',	
		// assign left/right keys to the actively viewed scrollable
		onSeek: function(event, i) {
			horizontal.eq(i).data("scrollable").focus();
		},
		circular: true,
		speed: 3000
	// main navigator (thumbnail images)
	}).navigator("#main_navi").autoscroll({ autoplay: true });
	
	var width = jQuery("body").width();
	$(window).resize(function() {
		var width = jQuery("body").width();
		if(width >= 980) {
			// horizontal scrollables. each one is circular and has its own navigator instance
			var horizontal = jQuery(".scrollable").scrollable({ circular: true }).navigator();
			// when page loads setup keyboard focus on the first horzontal scrollable
			horizontal.eq(0).data("scrollable").focus();
		}
	});
	if(width >= 980) {
		// horizontal scrollables. each one is circular and has its own navigator instance
		var horizontal = jQuery(".scrollable").scrollable({ circular: true }).navigator();
		// when page loads setup keyboard focus on the first horzontal scrollable
		horizontal.eq(0).data("scrollable").focus();
	}

	jQuery.noConflict();
	jQuery('.pasos_region').corner("right");
	jQuery('#publicidad').corner("top");
	jQuery('#sel_pais').corner("right, cc:#FFF");
	jQuery('#bienvenida').corner("right");
	jQuery("#body_contenido").css("height", "auto");
});
</script>
<script type="text/javascript" src="Scripts/publicidad.js"></script>
<link href="estilo.css" rel="stylesheet" type="text/css">
<?php } ?>
<div id="pasos_region" class="margensup">
  <table cellspacing="5" cellpadding="0" align="left" class="pasos_region" id="pasos_region_normal">
    <tr align="left">
      <td width="5%"><img src="imagenes/numeros-gris01.png" width="24" height="24"></td>
      <td width="14%"><p><img src="imagenes/okgris.png" width="25" height="25"></p></td>
      <td width="5%"><img src="imagenes/numeros-02.png" width="24" height="24"></td>
      <td width="14%"><p><?php echo $TEXTO['paso1b']; ?></p></td>
      <td width="5%"><img src="imagenes/numeros-03.png" width="24" height="24"></td>
      <td width="14%"><p><?php echo $TEXTO['paso2']; ?></p></td>
      <td width="5%"><img src="imagenes/numeros-04.png" width="24" height="24"></td>
      <td width="14%"><p><?php echo $TEXTO['paso3']; ?></p></td>
      <td width="5%"><img src="imagenes/numeros-05.png" width="24" height="24"></td>
      <td width="14%"><p><?php echo $TEXTO['paso4']; ?></p></td>
      <td width="5%"><a id="back" href=""><img src="imagenes/back.png" title="volver" width="24" height="24"></a></td>
    </tr>
  </table>
  <table cellspacing="0" cellpadding="0" align="left" class="pasos_region" id="pasos_region_responsive">
    <tr align="left">
      <td width="30"><img src="imagenes/numeros-01.png" width="24" height="24" alt="paso1"></td>
      <td><p><img src="imagenes/okgris.png" width="25" height="25"></p></td>
    </tr>
    <tr>
      <td width="30"><img src="imagenes/numeros-02.png" width="24" height="24" alt="paso2"></td>
      <td><p><?php echo $TEXTO['paso1b']; ?></p></td>
    </tr>
    <tr>
      <td width="30"><img src="imagenes/numeros-03.png" width="24" height="24" alt="paso3"></td>
      <td><p><?php echo $TEXTO['paso2']; ?></p></td>
    </tr>
    <tr>
      <td width="30"><img src="imagenes/numeros-04.png" width="24" height="24" alt="paso4"></td>
      <td><p><?php echo $TEXTO['paso3']; ?></p></td>
    </tr>
    <tr>
      <td width="30"><img src="imagenes/numeros-05.png" width="24" height="24" alt="paso5"></td>
      <td><p><?php echo $TEXTO['paso4']; ?></p></td>
    </tr>
  </table>
</div>
<img src="imagenes/esquinas/esquina_izq_gris.png" width="25" height="18" class="bandera">
<div id="banner_superior">
  <div>
    <table cellspacing="0" cellpadding="0" id="bienvenida">
      <tr>
        <td rowspan="4" id="textoBienvenida">
        	<span id="titulos"><?php echo $TEXTO['titulo_bienvenida']; ?></span>
          <p><?php echo $TEXTO['texto_bienvenida']; ?></p>
				</td>
        <td rowspan="4" id="carruselPaso1">
        	<!-- main navigator -->
          <?php
					require_once("01800admin/banner.php");
					$banner = new Banner();
					$banner = $banner->activos();
					if(!empty($banner)) {
						echo '<ul id="main_navi">';
						$x = 0;
						foreach($banner as $value) {
							if($x == 0) echo '<li class="active">'.$value['ban_texto'].'</li>';
							else echo '<li>'.$value['ban_texto'].'</li>';
							$x++;
						}
						echo '</ul>';
						echo '<!-- root element for the main scrollable -->';
						echo '<div id="main">';
						echo '<!-- root element for pages -->';
						echo '<div id="pages">';
						$x = 1;
						foreach($banner as $value) {
							echo '<!-- page #'.$x.' -->';
							echo '<div class="page">';
							echo '<!-- inner scrollable #'.$x.' -->';
							echo '<div class="scrollable">';
							echo '<!-- root element for scrollable items -->';
							echo '<div class="items">';
							echo '<!-- items  -->';
							echo '<div class="item">';
							echo '<img src="banner/'.$value['ban_imagen'].'" width="558" height="231">';
							echo '</div>';
							echo '</div>';
							echo '</div>';
							echo '</div>';
							$x++;
						}
						echo '</div>';
						echo '</div>';
					}
				?>
				</td>
      </tr>
    </table>
  </div>
  <div id="bandera"><img src="imagenes/esquinas/esquina_izq_violeta.png" width="25" height="18" class="bandera"></div>
</div>
<div id="id_mitad_der_pub2">
  <div id="mitad_izq">
    <div id="sel_pais">
    	<span id="titulos"> <img src="imagenes/numeros-02.png" width="24" height="24"> <?php echo $TEXTO['paso1b']; ?> </span>
      <p>
      	<div style="display:none" id="tooltip">tooltip</div>
        <?php
					$paises = $paises->carga_paises();
					if(!empty($paises)) {
						echo '<table cellspacing="0" cellpadding="0" class="lista_paises">';
						echo '<tr>';
						$x = 0;
						foreach($paises as $pais) {
							$tooltip = $tooltips->tooltip($pais['pais_id']);
							//if(is_null($tooltip)) $tooltip = $pais['nombre'];
							echo '<td valign="top">';
							echo '<span style="display:none" id="'.$pais['pais_id'].'" class="tooltip toolpais">';
							$tooltips->total_iglesias_pais($pais['pais_id'], $TEXTO);
							echo nl2br($tooltip);
							echo '</span>';
							echo "<a id=\"link".$pais['pais_id']."\" onMouseOver=\"tooltippais(".$pais['pais_id'].")\" onclick=\"javascript:recargar('pasos','r=$r&p=".$pais['pais_id']."');\" href=\"#\"><img src=\"imagenes/Banderas/".$pais['bandera']."\" width=\"50\" height=\"34\" align=\"absmiddle\" border=\"0\"> ".$pais['nombre']."</a>\n";
							echo '</td>';
							$x++;
							if($x == 5) {
								echo '</tr><tr>';
								$x = 0;
							}
						}
						echo '</tr>';
						echo '</table>';
					}
					else {
						$mensaje = new mensajes_globales("No existen iglesias en esta región", 2);
						$mensaje->mostrar_mensaje();
					}
				?>
      </p>
    </div>
    <div id="bandera"><img src="imagenes/esquinas/esquina_izq_amarillo.png" width="25" height="14" class="bandera2"></div>
  </div>
  <div id="mitad_der">
    <div id="publicidad">
      <?php
            	$txs = 2;
				$minheight = $txs * 228;
				$publicidad->post['opub'] = "paises";
				require_once("publicidad.php");
			?>
    </div>
  </div>
</div>

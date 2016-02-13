<?php
ob_start();
header("Expires: Tue, 03 Jul 2003 06:00:00 GMT");
header("Last-modified: ". gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-control: no-store, no-cache, must-revalidate");
header("Cache-control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
error_reporting(0);
session_start();
define ( '_01800Index', 1);
?>
<!DOCTYPE html>
<html lang="es">
<head>
<link rel="shortcut icon" href="imagenes/favicon.ico" type="text/css" media="all">
<script type="text/javascript">
	var _gaq = _gaq || [];
	_gaq.push(['_setAccount', 'UA-35509605-1']);
	_gaq.push(['_trackPageview']);
	(function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	})();
</script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width; initial-scale=1.0"> 
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<?php
require_once("clases/index.php");
if($estilo == true) {
	echo '<style>';
	echo '#boton_menu_superior_banderas, #boton_menu_superior {';
	echo '	margin-top: 0px;';
	echo '}';
	echo '</style>'."\n";
}
$pag = NULL;

if(isset($_GET['nombre'])) $nombre = $_GET['nombre'];

if (isset($nombre) and !empty($nombre)) {
	$nombre = str_replace("-", " ", $nombre);
	$church = new Iglesia();
	$church->nombre = $nombre;
	$church->getIglesiaId();
	$i = $church->id;
	$iglesia = $church->carga_iglesia_completo();
	//echo "<pre>";print_r($iglesia['iglesia']);echo "</pre>";
	if(!empty($iglesia['iglesia'])) :
		$_REQUEST['i'] = $iglesia['iglesia'][0]['igl_id'];//578
		$_REQUEST['c'] = $iglesia['iglesia'][0]['localidad_id'];//452468
		$_REQUEST['d'] = $iglesia['iglesia'][0]['region_id'];//1726
		$_REQUEST['p'] = $iglesia['iglesia'][0]['pais_id'];//82
		$_REQUEST['r'] = $iglesia['iglesia'][0]['continente_id'];//3
	endif;
	//echo "<pre>";print_r($_REQUEST);echo "</pre>";exit;
}

foreach($_REQUEST as $key=>$valor) {
	if($key == "l" || $key == "r" || $key == "p" || $key == "d" || $key == "c" || $key == "i") :
		if(!empty($key)) $url[$key] = $valor;
	endif;
}
?>
<script type="text/javascript">
	document.cookie = 'url=; max-age=0; path=/';
	document.cookie = 'url='+location.hash+'; path=/'
</script>
<?php
if(!isset($url)) {
	if(isset($_COOKIE['url']) and !empty($_COOKIE['url'])) {
		$tmp = explode("#!/", $_COOKIE['url']);
		if(count($tmp) > 1) {
			$tmp = explode("&", $tmp[1]);
			foreach($tmp as $value) {
				$tmp2 = explode("=",$value);
				$url[$tmp2[0]] = $tmp2[1];
			}
		}
	}
}

if(isset($url) and array_key_exists("pag", $url)) $pag = $url['pag'];

//verificamos que existe una url como acceso directo antes de reiniciar todo
if(isset($url)) {
	if(array_key_exists('l', $url)) $_SESSION['lang'] = $url['l'];
	else $_SESSION['lang'] = "es";
	
	if(array_key_exists('r', $url)) {
		$r = $url['r'];
		if(array_key_exists('p', $url)) {
			$p = $url['p'];
			if(array_key_exists('d', $url)) {
				$d = $url['d'];
				if(array_key_exists('c', $url)) {
					$c = $url['c'];
					if(array_key_exists('i', $url)) {
						$i = $url['i'];
						define('inc_igl', 1);
					}
				}
			}
			define("inc_pasos", 1);
		}
		else define("inc_paso1", 1);
	}
}
else $_SESSION['lang'] = "es";

require_once("lang/".$_SESSION['lang']."/lang.php");

if(isset($_REQUEST['ing']) || isset($_REQUEST['salir'])) {
	$mensaje = false;
	require_once("01800admin/usuario.php");
	
	if(isset($_POST['usuario']) and isset($_POST['clave'])) {
		$user = $_POST['usuario'];
		$clave = md5($_POST['clave']);
		$usuario = new usuario($user, $clave);
		$usuario = $usuario->verifica_usuario();
		if($usuario === false) {
			unset($usuario);
			$usuario = new mensajes_globales("Usuario y/o Contrase&ntilde;a erroneos", 3);
			$mensaje = true;
		}
		elseif($usuario === true) {
			header("Location: http://www.01800iglesia.org/01800admin");
		}
	}
	if(isset($_SESSION['usuario']) and !empty($_SESSION['usuario'])) :
		header("Location: http://www.01800iglesia.org/01800admin");
	endif;
	
	if(isset($_GET['salir'])) {
		$usuario = new usuario();
		$usuario = $usuario->salir();
	}
}
?>
<title>.:<?php echo $TEXTO['bienvenida']; ?>:.</title>
<script type="text/javascript" src="Scripts/jquery-1.9.1.min.js?ver=1.9.1"></script>
<script type="text/javascript">jQuery(document).ready(function() { jQuery("#load").hide(); });</script>
<script type="text/javascript" src="Scripts/lytebox/lytebox.js"></script>
<script type="text/javascript" src="Scripts/jquery.tools.min.js"></script>
<script type="text/javascript" src="Scripts/jquery.form.js"></script>
<script type="text/javascript" src="Scripts/jquery.validate.js"></script>
<script type="text/javascript" src="Scripts/jquery.validate.additional-methods.js"></script>
<script type="text/javascript">
	var lyteboxTheme = 'purple';
	
	jQuery(document).ready(function() {
		jQuery('#boton_menu_superior li').each(function(index) {
			jQuery(this).corner("bottom");
		});
		jQuery('.pasos_region').corner("right");
		jQuery('#creditos_med').corner("top");
		jQuery.each(function() {
			jQuery("label").corner();
		});
		jQuery("#salir img[title]").tooltip({ position: "bottom center" });
	});
</script>
<?php if(!isset($url)) : ?>
<script src="Scripts/raphael-min.js"></script>
<script>
	var nombres = {
	<?php
		for($x=1; $x<=7; ++$x) :
			echo "R".$x." : \"".$TEXTO["r".$x]."\",\n\t";
		endfor;
	?>
	};
</script>
<script src="Scripts/world2.js"></script>
<?php
endif;
if(defined("inc_paso1")) {
?>
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
		// horizontal scrollables. each one is circular and has its own navigator instance
		var horizontal = jQuery(".scrollable").scrollable({ circular: true }).navigator();
		// when page loads setup keyboard focus on the first horzontal scrollable
		horizontal.eq(0).data("scrollable").focus();
		jQuery.noConflict();
		jQuery('.pasos_region').corner("right");
		jQuery('#id_mitad_der_pub').corner("top");
		jQuery('#sel_pais').corner("right");
		jQuery('#bienvenida').corner("right");
		jQuery('#bienvenida').corner("right");
	});

	function tooltippais(elemento) {
		//alert(elemento);
		//var tipstr = jQuery(this).attr('data-message');
		jQuery("#link"+elemento).tooltip({
			tip: '#' + elemento,
			position: "bottom left",
			offset: [20, "auto"],
			delay: 0
		});
	}
</script>
<script type="text/javascript" src="Scripts/publicidad.js"></script>
<?php
}
if(defined("inc_igl")) {
?>
<script type="text/javascript" src="Scripts/flowplayer/flowplayer-3.2.8.min.js"></script>
<script type="text/javascript" src="Scripts/flowplayer/flowplayer.playlist-3.2.8.min.js"></script>
<script type="text/javascript" src="Scripts/mediaplayer-5.9-viral/jwplayer.js"></script>
<script type="text/javascript" src="Scripts/info_iglesia.js"></script>
<?php } ?>
<link rel="stylesheet" href="Scripts/lytebox/lytebox.css" type="text/css" media="all">
<link href="estilo.css?ver=1.1" rel="stylesheet" type="text/css" media="all">
</head>

<body>
<div id="load"><img src="imagenes/loader.gif" class="load" alt="loader"></div>
<div id="body_gral">
  <div id="body_superior">
    <div id="menu_superior">
    	<a class="navigation-toggle" href="#" id="nav-open">
      	<span class="band"></span>
      </a>
      <!--<ul id="boton_menu_superior_banderas">
        <li> <a href="" title="Espa&ntilde;ol Colombia"><img src="imagenes/Banderas/colombia.png" width="34" height="20" alt="Espa&ntilde;ol Colombia"></a> </li>
        <li> <a href="" title="English USA"><img src="imagenes/Banderas/estados_unidos.png" width="34" height="20" alt="English USA"></a> </li>
      </ul>-->
      <ul class="navigation" id="boton_menu_superior">
        <li><a class="menu" href="<?php echo $_SERVER['PHP_SELF'] ?>"><?php echo $TEXTO['menu_inicio']; ?></a></li>
        <li><a class="menu" href="#inscribe" onclick="recargar('index2', 'sec=inscribe')"><?php echo $TEXTO['menu_inscribe_tu_iglesia']; ?></a></li>
        <li><a class="menu" href="#" onclick="recargar('index2', 'sec=quienes')"><?php echo $TEXTO['menu_que_es']; ?></a></li>
        <li><a class="menu" onclick="recargar('index2','sec=contacto')" href="#"><?php echo $TEXTO['menu_contacto']; ?></a></li>
        <li><a class="menu" href="#glosario" onclick="recargar('index2', 'sec=glosario')"><?php echo $TEXTO['menu_glosario']; ?></a></li>
      </ul>
    </div>
    <div id="logo_index"><img src="imagenes/logo_sup_izq_beta.png" width="175" height="100" alt="Logo"></div>
    <div id="form_busqueda">
      <form action="busqueda.php" method="post" enctype="application/x-www-form-urlencoded" name="busqueda" id="busqueda">
        <span><?php echo $TEXTO['busqueda_texto']; ?></span><br>
        <img src="imagenes/senal.png" width="10" height="10" alt="Busqueda"><br>
        <select name="lb" >
          <option value="paises.nombre">Pa&iacute;s</option>
          <option value="localidades.nombre">Ciudad</option>
          <option value="igl_nombre"><?php echo $TEXTO['busqueda_categoria1']; ?></option>
          <option value="igl_pastor_ppal"><?php echo $TEXTO['busqueda_categoria2']; ?></option>
          <option value="Todos"><?php echo $TEXTO['busqueda_categoria3']; ?></option>
        </select>
        <input name="tb" type="text" id="input_busqueda" size="30" value="">
        <button type="submit" id="enviar" name="submit" title="Buscar"><img src="imagenes/boton_buscar.png" width="17" height="17" alt="Buscar"></button>
        <br>
        <span class="error_busqueda" id='msj_error_texto'></span>
      </form>
    </div>
    <div id="login"> Total iglesias: <?php echo $total_iglesias ?>
      <?php
			if (isset($_SESSION['user_01800'])) {
				echo '<div style="min-width:405px">';
				echo "Bienvenido ".$_SESSION['nombre'];
				echo "\t".'<a href="?salir" id="salir"><img src="imagenes/boton_salir.png" title="salir" alt="Salir"></a>';
				echo '</div>';
			}
			else {
				?>
      <form action="index.php?ing" method="post" id="login_ing" name="login">
        <table cellspacing="5" cellpadding="0" align="right">
          <tr>
            <td align="right"><input type="text" id="usuario" name="usuario" size="20" placeholder="<?php echo $TEXTO['paginappal_usuario']; ?>" onFocus="javascript:this.value=''"></td>
            <td align="right"><input type="password" id="clave" name="clave" size="23"></td>
            <td align="right"><button type="submit" id="enviar" class="usuario" name="submit" title="Ingresar"><?php echo $TEXTO['paginappal_entrar']; ?> <img src="imagenes/boton_ingreso.png" width="17" height="17" alt="<?php echo $TEXTO['paginappal_entrar']; ?>"></button></td>
          </tr>
        </table>
      </form>
      <span class="error_ingreso" id='msj_error_texto'>
			<?php
				if(isset($mensaje) and $mensaje == true ) $usuario->mostrar_mensaje();
			?>
      </span>
      <?php } ?>
    </div>
  </div>
  <div id="body_content">
    <div id="body_contenido">
      <?php
				if(isset($url) and !empty($url)) {
					if(array_key_exists('r', $url)) {
						if(array_key_exists('p', $url)) {
							if(array_key_exists('d', $url)) {
								if(array_key_exists('c', $url)) {
									if(array_key_exists('i', $url)) {
										require_once("iglesia.php");
									}
									else require_once("pasos.php");
								}
								else require_once("pasos.php");
							}
							else require_once("pasos.php");
						}
						else require_once("paso1.php");
					}
				}
				else {
					?>
      <span class="titulo_region"><span id="titulos"><?php echo $TEXTO['titulo_pasos'] ?></span></span>
      <div id="pasos_region">
        <table cellspacing="5" cellpadding="0" align="left" class="pasos_region" id="pasos_region_normal">
          <tr align="left">
            <td width="5%"><img src="imagenes/numeros-01.png" width="24" height="24" alt="paso1"></td>
            <td width="15%"><p><?php echo $TEXTO['paso1a']; ?></p></td>
            <td width="5%"><img src="imagenes/numeros-02.png" width="24" height="24" alt="paso2"></td>
            <td width="15%"><p><?php echo $TEXTO['paso1b']; ?></p></td>
            <td width="5%"><img src="imagenes/numeros-03.png" width="24" height="24" alt="paso3"></td>
            <td width="15%"><p><?php echo $TEXTO['paso2']; ?></p></td>
            <td width="5%"><img src="imagenes/numeros-04.png" width="24" height="24" alt="paso4"></td>
            <td width="15%"><p><?php echo $TEXTO['paso3']; ?></p></td>
            <td width="5%"><img src="imagenes/numeros-05.png" width="24" height="24" alt="paso5"></td>
            <td width="15%"><p><?php echo $TEXTO['paso4']; ?></p></td>
          </tr>
        </table>
        <table cellspacing="0" cellpadding="0" align="left" class="pasos_region" id="pasos_region_responsive">
          <tr align="left">
            <td width="30"><img src="imagenes/numeros-01.png" width="24" height="24" alt="paso1"></td>
            <td><p><?php echo $TEXTO['paso1a']; ?></p></td>
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
      <img src="imagenes/esquinas/esquina_izq_gris.png" width="25" height="18" class="bandera" alt="">
      <?php
				if(!empty($nombre)) :
					$usuario = new mensajes_globales("La iglesia no existe o el nombre no es correcto", 2);
					$usuario->mostrar_mensaje();
				endif;
			?>
      <p> &nbsp;&nbsp;<span class="titulo_region"><span id="titulos"><img src="imagenes/numeros-01.png" width="24" height="24" alt="Paso1"> <?php echo $TEXTO['paso1a']; ?></span></span></p>
      <div id="region">
      	<nav class="menu_mapa">
        	<ul>
          	<a href="?r=1"><li>América del Norte</li></a>
            <a href="?r=2"><li>América central</li></a>
            <a href="?r=3"><li>América del Sur</li></a>
            <a href="?r=4"><li>Europa</li></a>
            <a href="?r=5"><li>Asía</li></a>
            <a href="?r=6"><li>Africa</li></a>
            <a href="?r=7"><li>Oceanía</li></a>
          </ul>
        </nav>
        <center>
        	<div class="div_mapa">
        	<script>
						Raphael("mapa", "100%", 423, function () {
							var r = this;
							r.rect(0, 0, "99%", 423, 0).attr({
								stroke: "none",
								fill: "0-#FFFFFF"
							});
							var over = function () {
								var obj = this.id;
								var name = Array();
								var color = Array();
								var i = 1;
								for (var country in worldmap.shapes) {
									name[i] = worldmap.names[country];
									color[i] = worldmap.color[country];
									i++;
								}
								this.c = this.c || this.attr("fill");
								this.stop().animate({fill: color[obj]}, 500);
								jQuery("#textoMapa").html(name[obj]);
								jQuery("#textoMapa").show(500);
							},
							out = function () {
								this.stop().animate({fill: this.c}, 500);
								jQuery("#textoMapa").hide();
								jQuery("#textoMapa").html("");
							},
							clic = function () {
								var name = Array();
								var color = Array();
								var i = 1;
								for (var country in worldmap.shapes) {
									name[i] = worldmap.names[country];
									color[i] = worldmap.color[country];
									i++;
								}
								jQuery(location).attr("href", "?r="+this.id);
							};
							r.setStart();
							var hue = Math.random();
							for (var country in worldmap.shapes) {
								r.path(worldmap.shapes[country]).attr({stroke: "#555555", fill: "#f0efeb", "stroke-opacity": 0.25});
							}
							var world = r.setFinish();
							world.hover(over, out);
							world.click(clic);
							world.getXY = function (lat, lon) {
								return {
									cx: lon * 2.6938 + 465.4,
									cy: lat * -2.6938 + 227.066
								};
							};
							world.getLatLon = function (x, y) {
								return {
									lat: (y - 227.066) / -2.6938,
									lon: (x - 465.4) / 2.6938
								};
							};
							var latlonrg = /(\d+(?:\.\d+)?)[\xb0\s]?\s*(?:(\d+(?:\.\d+)?)['\u2019\u2032\s])?\s*(?:(\d+(?:\.\d+)?)["\u201d\u2033\s])?\s*([SNEW])?/i;
							world.parseLatLon = function (latlon) {
								var m = String(latlon).split(latlonrg),
								lat = m && +m[1] + (m[2] || 0) / 60 + (m[3] || 0) / 3600;
								if (m[4].toUpperCase() == "S") {
									lat = -lat;
								}
								var lon = m && +m[6] + (m[7] || 0) / 60 + (m[8] || 0) / 3600;
								if (m[9].toUpperCase() == "W") {
									lon = -lon;
								}
								return this.getXY(lat, lon);
							};
							
							try {
								navigator.geolocation && navigator.geolocation.getCurrentPosition(function (pos) {
									r.circle().attr({fill: "none", stroke: "#f00", r: 5}).attr(world.getXY(pos.coords.latitude, pos.coords.longitude));
								});
							} catch (e) {}
						});
					</script>
          <div id="mapa">
            <div id="textoMapa"></div>
          </div>
          </div>
        </center>
      </div>
      <?php } ?>
    </div>
  </div>
  <div id="creditos">
    <div id="creditos_med">
      <div>
      	<ul>
          <li><a href="http://www.videoexpress.org" target="_new">VideoExpress.org</a></li>
          <li><a href="http://www.libroexpress.org" target="_new">LibroExpress.org</a></li>
          <li><a href="http://www.videoexpress.org/portafolio" target="_new"><?php echo $TEXTO['link_portafolio']; ?></a></li>
          <li><a href="http://facebook.com/01800iglesia.org"><img src="imagenes/redes/facebook.png" width="32" height="32" alt="Facebook" /></a></li>
        </ul>
			</div>
      <div id="creditos_bottom"><?php echo $TEXTO['derechos']; echo " ".$TEXTO['politica']; ?></div>
    </div>
  </div>
</div>
<script type="text/javascript" src="Scripts/jquery.corner.js"></script> 
<script type="text/javascript" src="Scripts/01800.js"></script> 
</body>
</html>
<?php ob_end_flush(); ?>
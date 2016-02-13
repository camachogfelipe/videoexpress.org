<?php
session_start();
define ( '_01800Index', 1);
?>
<!DOCTYPE HTML>
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
foreach($_REQUEST as $key=>$valor) {
	if($key == "l" || $key == "r" || $key == "p" || $key == "d" || $key == "c" || $key == "i") $url[$key] = $valor;
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

		if($usuario == false) {
			unset($usuario);
			$usuario = new mensajes_globales("Usuario y/o Contrase&ntilde;a erroneos", 3);
			$mensaje = true;
		}
	}
	if(isset($_GET['salir'])) {
		$usuario = new usuario();
		$usuario = $usuario->salir();
	}
}
?>
<title>.: <?php echo $TEXTO['bienvenida']; ?> :.</title>
<script type="text/javascript" src="Scripts/jquery-1.7.1.min.js"></script>
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
<?php
if(defined("inc_paso1")) {
?>
<script>
jQuery(document).ready(function() {
  	jQuery('.pasos_region').corner("right");
	jQuery('#id_mitad_der_pub').corner("top");
	jQuery('#sel_pais').corner("right");
	jQuery('#bienvenida').corner("right");
	jQuery('#bienvenida').corner("right");
});
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
<link rel="stylesheet" href="Scripts/lytebox/lytebox.css" type="text/css" media="screen">
<link href="estilo.css" rel="stylesheet" type="text/css">
</head>

<body>
<div id="load">
	<div class="load"><img src="imagenes/loader.gif" alt="loader"></div>
</div>
<div id="body_gral">
<div id="body_superior">
	<div id="menu_superior">
    	<ul id="boton_menu_superior_banderas">
    	<li>
        	<a href="" title="Espa&ntilde;ol Colombia"><img src="imagenes/Banderas/colombia.png" width="34" height="20" alt="Espa&ntilde;ol Colombia"></a>
		</li>
    	<li>
        	<a href="" title="English USA"><img src="imagenes/Banderas/estados_unidos.png" width="34" height="20" alt="English USA"></a>
		</li>
        </ul>
        <ul id="boton_menu_superior">
		<li><a class="menu" href=""><?php echo $TEXTO['menu_inicio']; ?></a></li>
        <li><a class="menu" href="#inscribe" onclick="recargar('index2', 'sec=inscribe')"><?php echo $TEXTO['menu_inscribe_tu_iglesia']; ?></a></li>
        <li><a class="menu" href="#" onclick="recargar('index2', 'sec=quienes')"><?php echo $TEXTO['menu_que_es']; ?></a></li>
        <li><a class="menu" onclick="recargar('index2','sec=contacto')" href="#"><?php echo $TEXTO['menu_contacto']; ?></a></li>
        <li><a class="menu" href="#glosario" onclick="recargar('index2', 'sec=glosario')"><?php echo $TEXTO['menu_glosario']; ?></a></li>
        </ul>
	</div>
	<div id="logo_index"><img src="imagenes/logo_sup_izq_beta.png" width="175" height="100" alt="Logo"></div>
	
	<div id="form_busqueda">
		<form action="busqueda.php" method="post" enctype="application/x-www-form-urlencoded" name="busqueda" id="busqueda">
        	<span><?php echo $TEXTO['busqueda_texto']; ?></span><br><img src="imagenes/senal.png" width="10" height="10" alt="Busqueda"><br>
			<select name="lb" >
              <option value="paises.nombre">Pa&iacute;s</option>
              <option value="localidades.nombre">Ciudad</option>
			  <option value="igl_nombre"><?php echo $TEXTO['busqueda_categoria1']; ?></option>
			  <option value="igl_pastor_ppal"><?php echo $TEXTO['busqueda_categoria2']; ?></option>
			  <option value="Todos"><?php echo $TEXTO['busqueda_categoria3']; ?></option>
			</select>
   	        <input name="tb" type="text" id="input_busqueda" size="30" value="">
       	    <button type="submit" id="enviar" name="submit" title="Buscar"><img src="imagenes/boton_buscar.png" width="17" height="17" alt="Buscar"></button><br><span class="error_busqueda" id='msj_error_texto'></span>
        </form>
	</div>
	<div id="login">
    	Total iglesias: <?php echo $total_iglesias ?>
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
			    <td align="right"><input type="text" id="usuario" name="usuario" size="23" value="<?php echo $TEXTO['paginappal_usuario']; ?>" onFocus="javascript:this.value=''"></td>
			    <td align="right"><input type="password" id="clave" name="clave" size="23"></td>
			    <td align="right">
                	<button type="submit" id="enviar" class="usuario" name="submit" title="Ingresar"><?php echo $TEXTO['paginappal_entrar']; ?> <img src="imagenes/boton_ingreso.png" width="17" height="17" alt="<?php echo $TEXTO['paginappal_entrar']; ?>"></button></td>
			  </tr>
			</table>
		</form><span class="error_ingreso" id='msj_error_texto'><?php
        	if(isset($mensaje) and $mensaje == true ) $usuario->mostrar_mensaje();
        ?></span>
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
require_once("iglesia.php");}
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
    	<table cellspacing="5" cellpadding="0" align="left" class="pasos_region">
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
        </div>
        <img src="imagenes/esquinas/esquina_izq_gris.png" width="25" height="18" class="bandera" alt=""><p>
	&nbsp;&nbsp;<span class="titulo_region"><span id="titulos"><img src="imagenes/numeros-01.png" width="24" height="24" alt="Paso1"> <?php echo $TEXTO['paso1a']; ?></span></span></p>
	<div id="region">
        <center>
		<script src="Scripts/swfobject_modified.js" type="text/javascript"></script>
		<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="95%" height="420" id="FlashID">
		  <param name="movie" value="flash/mapa_mundial.swf">
		  <param name="quality" value="high">
		  <param name="wmode" value="transparent">
		  <param name="swfversion" value="6.0.65.0">
		  <!-- Esta etiqueta param indica a los usuarios de Flash Player 6.0 r65 o posterior que descarguen la versión más reciente de Flash Player. Elimínela si no desea que los usuarios vean el mensaje. -->
		  <param name="expressinstall" value="Scripts/expressInstall.swf">
		  <!-- La siguiente etiqueta object es para navegadores distintos de IE. Ocúltela a IE mediante IECC. -->
		  <!--[if !IE]>-->
		  <object data="flash/mapa_mundial.swf" type="application/x-shockwave-flash" width="95%" height="420">
    		<!--<![endif]-->
		    <param name="quality" value="high">
    		<param name="wmode" value="transparent">
	    	<param name="swfversion" value="6.0.65.0">
	    	<param name="expressinstall" value="Scripts/expressInstall.swf">
		    <!-- El navegador muestra el siguiente contenido alternativo para usuarios con Flash Player 6.0 o versiones anteriores. -->
    		<div>
		      <h4>El contenido de esta p&aacute;gina requiere una versi&oacute;n m&aacute;s reciente de Adobe Flash Player.</h4>
    		  <p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Obtener Adobe Flash Player" width="112" height="33"></a></p>
		    </div>
    		<!--[if !IE]>-->
		  </object>
		  <!--<![endif]-->
		</object>
		<script type="text/javascript">
		<!--
		swfobject.registerObject("FlashID");
		//-->
		</script>
        </center>
        </div>
	<?php } ?>
	</div>
</div>
<div id="creditos">
    <div id="creditos_med">
    	<div><a href="http://www.videoexpress.org" target="_new">VideoExpress.org</a><br><a href="http://libroexpress.org" target="_new">LibroExpress.org</a><br><a href="http://www.videoexpress.org/portafolio" target="_new"><?php echo $TEXTO['link_portafolio']; ?></a></div>
        <div id="creditos_bottom"><?php echo $TEXTO['derechos']; echo " ".$TEXTO['politica']; ?></div>
    </div>
</div>
</div>
<script type="text/javascript" src="Scripts/jquery.corner.js"></script>
<script type="text/javascript" src="Scripts/01800.js"></script>
</body>
</html>
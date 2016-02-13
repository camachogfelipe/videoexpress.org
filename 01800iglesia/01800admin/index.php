<?php
//if(isset($_REQUEST['nc'])) header("Location: ../index.html");
session_start();
define( '_01800', 1 );
$mensaje = false;
require_once("usuario.php");

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
	header("Location: ../");
}
?>
<!DOCTYPE html>
<link rel="shortcut icon" href="../imagenes/favicon.ico" />
<link href="estilo.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="../Scripts/lytebox/lytebox.css" type="text/css" media="screen" />
<link href="../Scripts/jquery-ui/css/smoothness/jquery-ui-1.8.17.custom.css" rel="stylesheet" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="../Scripts/jquery-1.9.1.min.js?ver=1.9.1"></script>
<!--<script type="text/javascript" src="../Scripts/jquery-1.7.1.min.js"></script>-->
<!--<script type="text/javascript" src="../Scripts/jquery.corner.js"></script>-->
<script type="text/javascript" src="../Scripts/jquery-ui/js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="../Scripts/jquery-ui/js/jquery-ui-1.8.17.custom.min.js"></script>
<script type="text/javascript" src="../Scripts/jquery.form.js"></script>
<script type="text/javascript" src="../Scripts/jquery.validate.js"></script>
<script type="text/javascript" src="../Scripts/jquery.validate.additional-methods.js"></script>
<script type="text/javascript" src="../Scripts/busqueda.js"></script>
<?php
if(!empty($_REQUEST['inc']) and $_REQUEST['inc'] != false) {
	require_once("iglesia.php");
	$iglesia = new Iglesia(1, $_REQUEST['op']);
	echo '<script type="text/javascript" src="../Scripts/jquery-ui/development-bundle/ui/i18n/jquery.ui.datepicker-es.js"></script>'."\n";
	echo '<script type="text/javascript" src="../Scripts/iglesia.js"></script>';
	echo '<script>'."\n";
	echo '$(document).ready(function() { '."\n";
	echo '$( "#tabs" ).tabs({ selected: 0 });'."\n";
	echo '$( "#nombre" ).autocomplete({ source: ';$iglesia->cargar_iglesias_autocompletar(1);echo ' });'."\n";
	echo '$( "#iglesia_ppal" ).autocomplete({ source: ';$iglesia->cargar_iglesias_autocompletar(2);echo ' });'."\n";
	echo '$( "#replegal" ).autocomplete({ source: ';$iglesia->cargar_iglesias_autocompletar(3);echo ' });'."\n";
	echo '$("#igl_ppal").hide(); }); </script>'."\n";
}
?>
<script type="text/javascript" src="../Scripts/lytebox/lytebox.js"></script>
<script type="text/javascript">var lyteboxTheme = 'purple';</script>
<?php
if(!isset($_SESSION['user_01800'])) {
?>
<script type="text/javascript">
$(document).ready(function() {
	jQuery.noConflict();
	jQuery("#loading").hide();
	$.ajaxSetup({ cache: false });
	jQuery('INPUT:first').focus();
	// validate signup form on keyup and submit
	var valido = jQuery("#form, #admin01800").validate({
		rules: {
			usuario: {
				required: true,
				minlength: 4
			},
			clave: {
				required: true,
				minlength: 4,
				password: true
			},
		},
		messages: {
			usuario: "<br /><span id='msj_error_texto'>Por favor ingrese su nombre de usuario</span>",
			clave: "<br /><span id='msj_error_texto'>Por favor ingrese su password</span>"
		},
		submitHandler: function() {
			jQuery.ajax({
				type: 'POST',
				url: jQuery('#admin01800').attr('action'),
				data: jQuery('#admin01800').serialize(),
				success: function(data) {
					var result = jQuery('#result').html(data);
					jQuery(result).fadeIn('slow');
				}
			})
			return false;
		}
	});
});	

function recargar(x,y,z) {
	var pagina=x+".php?"+y;
	//alert(pagina);
	jQuery.ajax({
		type: 'POST',
		url: pagina,
		success: function(data) {
			jQuery(z).load(data);
		}
	});
	jQuery("#loading").hide();
}
</script>
<?php } else { ?>
<script type="text/javascript">
$(document).ready(function() {
	$("#loading").hide();
	//jQuery('.medio').corner("round right");
	//jQuery('#panel_derecho_menu').corner("round 14px");
	
	jQuery("#menu li a").click(function(e) {
		var a = this.id;
		if(a == "Home") location.reload();
		else if(a != "Salir" && a != "smmd" && a != "smmp") {
        	//desactivamos seccion y activamos elemento de menu  
	        jQuery("#menu li a.active").removeClass("active");  
    	    jQuery("#menu li a#"+a).addClass("active"); 
			return false;
		}
	});
});

function recargar(x,y,z) {
	var pagina=x+".php?"+y;
	//alert(pagina);
	jQuery.ajax({
		type: 'POST',
		url: pagina,
		success: function(data) {
			jQuery(z).html(data);
		}
	});
	jQuery("#loading").hide();
}
</script>
<script type="text/javascript" src="../Scripts/jquery-ui/js/jquery-ui-1.8.17.custom.min.js"></script>
<?php } ?>
<title>Panel de administraci&oacute;n de videoexpress.org</title></head>
<body>
<div id="loading"><img class="img" src="../imagenes/loadingAnimation.gif" width="64" height="64"></div>
<?php
  if (isset($_SESSION['user_01800'])) require_once("index2.php");
  else {
?>
<div id='loginindex'>
 <div id="logo"><img src="../imagenes/logo.png" width="176" height="109" align="left"><img src="../imagenes/admin40x40.png" width="40" height="40" align="right"></div>
 <div id="cuerpologin">
  <div id="texto1_login">Ingrese su usuario y contrase&ntilde;a</div>
  <form action="" method="post" enctype="application/x-www-form-urlencoded" name="admin01800" id="admin01800">
   <table width="79%" border="0" cellspacing="5" cellpadding="0" align="center">
    <tr>
     <td width="39%" align="right" class="fuentecolor">Usuario</td>
     <td width="61%"><div id="text_form"><label for="usuario"></label><input type="text" name="usuario" id="usuario" tabindex="1" /></div></td>
    </tr>
    <tr>
     <td align="right" class="fuentecolor">Contrase&ntilde;a</td>
     <td><label for="clave"></label><input type="password" name="clave" id="clave" tabindex="2" /></td>
    </tr>
    <tr>
     <td colspan="2" align="right" style="padding-top:10px">
      <input type="image" src="../imagenes/ingresar.png" name="submit" id="submit" />
     </td>
    </tr>
   </table>
  </form>
 </div>
 <div id="baseinf">
  <div id="error1">
<?php
	if($mensaje == true ) {
		$usuario->mostrar_mensaje();
	}
?>
  </div>
  <div id="recordacion"><p><a href='recordacion.php'>Olvido su contrase&ntilde;a?</a></p></div>
 </div>
</div>
<div id="requerimientos" class="fuentecolor">01800Iglesia.org &reg;, todos los derechos reservados &copy;, 2011</div>
</body>
</html>
<?php } ?>
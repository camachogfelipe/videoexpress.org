<?php
session_start();
/*error_reporting(E_ALL);
ini_set("display_errors", 1);*/
if(isset($_GET['l'])){ $_SESSION['lang'] = $_GET['l']; }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//ES" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
<head>
<link rel="shortcut icon" href="imagenes/faviconsemillas.ico" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="content-style-type" content="text/css" />
<title>_:_ Semillas de Libertad _:_</title>
<link href="fslibertad.css" rel="stylesheet" type="text/css" />
<link href="menu.css" rel="stylesheet" type="text/css" />
<script src="https://www.google.com/jsapi?key=ABQIAAAAOMhRlZ-C7tduTCg23mYARBTCXIT2lC7rH4jAmoltB9iwUyU0wBRaXiFXHijoSGE2LyjCFiHG-lsNvw" type="text/javascript"></script>
<script type="text/javascript">google.load("mootools", "1.3.0");</script>
<script type="text/javascript" src="scripts/mootools-more.js"></script>
<script type="text/javascript" src="scripts/McTranslate.js"></script>
<script type="text/javascript" src="scripts/jquery-1.5.1.js"></script>
<script type="text/javascript" src="scripts/jquery.jcarousel.min.js"></script>
<script type="text/javascript" src="scripts/jquery.corner.js"></script>
<script type="text/javascript" src="scripts/jquery.validate.js"></script>
<script type="text/javascript" src="scripts/jquery.validate.additional-methods.js"></script>
<script type="text/javascript" src="scripts/jquery.simplyscroll-1.0.4/jquery.simplyscroll-1.0.4.min.js"></script>
<script type="text/javascript" src="scripts/fslibertad.js"></script>
<script type="text/javascript" src="scripts/valida_form_ayudenos.js"></script>
<script type="text/javascript" src="scripts/valida_form_loayudamos.js"></script>
<script type="text/javascript" src="scripts/thickbox.js"></script>
<script>
function translate()
{
	alert("Se ejecutara translate");
	var array = Array('span', 'p', 'a', 'form', 'label', 'textarea', 'option', '#trad', '#trad1', '#trad2', '#trad3', 'tr');
	array.Detect();
	var en = new McTranslate({
			'nativo': 'es',
			'nuevo': 'en',
			'etiquetas': array
		});
}
</script>
<link rel="stylesheet" type="text/css" href="skins/tango/skin.css" />
<link rel="stylesheet" type="text/css" href="scripts/jquery.simplyscroll-1.0.4/jquery.simplyscroll-1.0.4.css" />
<link rel="stylesheet" type="text/css" href="scripts/thickbox.css" />
</head>

<body>
	<div id="div_main">
    	<div id="logo_top"><img src="imagenes/fondo_logo.png" width="1200" height="219" alt="Semillas de libertad" usemap="#Map" />
          <map name="Map" id="Map">
            <area shape="rect" coords="19,15,560,149" href="index.php" title="Inicio" alt="Semillas de Libertad - Home" />
          </map>
</div>
        <div id="main">
        	<div id="banderas"><a href="?l=es"><img src="imagenes/Banderas/colombia.png" width="50" height="34" align="absmiddle" border="0" alt="Espa&ntilde;ol" />Espa&ntilde;ol</a> <a href="?l=en"><img id="eng" src="imagenes/Banderas/estados_unidos.png" width="50" height="34" align="absmiddle" border="0" alt="Ingles" />English</a></div>
            <div id="cuerpotop"><img src="imagenes/brochazo_superior.png" width="1000" height="28" alt="brochaso" /></div>
			<div id="cuerpo">
            	<?php
					include("fsladmin/funciones.php");
					$conecta = conecta_bd();
					switch($_GET['op'])
					{
						case 1 : include("quienes.php");
								 break;
						case 2 : include("paraquientrabajamos.php");
								 break;
						case 3 : include("quehacemos.php");
								 break;
						case 4 : include("enquevamos.php");
								 break;
						case 5 : include("ayudenos.php");
								 break;
						case 6 : include("loayudamos.php");
								 break;
						default : include("inicio.php");
								  break;
					}
				?>
			</div>
		</div>
        <div id="piedepagina">&nbsp;</div>
        <div id="texto_piedepagina">Copyright &copy; Fundaci&oacute;n Semillas de Libertad 2011. Todos los derechos reservados. Diseño Por <a href="http://www.videoexpress.org">VideoExpress.org</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://www.google.com/a/fslibertad.org"><img src="imagenes/gmail.png" width="48" height="48" border="0" align="absmiddle" /></a>
        </div>
	</div>
    <?php if($_SESSION['lang'] == "en") { echo '<script type="text/javascript">translate()</script>'; } desconecta_bd($conecta); ?>
</body>
</html>
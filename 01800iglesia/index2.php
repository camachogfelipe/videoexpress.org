<?php
if(!isset($_SESSION)) session_start();
if(isset($_REQUEST['sec'])) $sec = $_REQUEST['sec'];
else header("Location: index.php");
if(empty($_SESSION['lang'])) exit("Acceso restringido");
include("lang/".$_SESSION['lang']."/lang.php");
defined ( '_01800Index' ) or define ( '_01800Index', 1);
require("clases/index.php");
if(isset($_REQUEST['e'])) $e = $_REQUEST['e'];
else $e = false;
$letra = strtolower($e);
if($sec != "inscribe") echo '<link href="estilo.css" rel="stylesheet" type="text/css" />';
switch($sec) {
	case 'glosario' : $glosario = new regiones();
					  $abecedario = $glosario->cargar_abecedario();
					  $tglosario = $glosario->cargar_glosario();
					  require_once("glosario.php");
					  break;
	case 'quienes'	: require_once("quien_somos.php");
					  break;
	case 'contacto'	: require_once("contacto.php");
					  break;
	case 'msg'		: $igl_msg = new igl_msg($e);
					  break;
	case 'sac'		: $igl_msg = new igl_act($e);
					  break;
	case 'inscribe'	: $igl_msg = new igl_ins($e);
					  break;
}
?>
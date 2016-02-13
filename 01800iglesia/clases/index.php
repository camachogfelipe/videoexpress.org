<?php
header("Expires: Tue, 03 Jul 2003 06:00:00 GMT");
header("Last-modified: ". gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-control: no-store, no-cache, must-revalidate");
header("Cache-control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
error_reporting(0);
defined ( '_01800Index') or die(header("Location: ../"));
defined ( '_01800' ) or define ( '_01800', 1);
require_once("01800admin/01800BD.php");
require_once("clases/browser_class_inc.php");
require_once("01800admin/administracion.php");
$b = new browser();
$explorer = new Administracion();
$explorer = $explorer->comprobar_compatibilidad($b->whatBrowser());
if($explorer == 1) {
	$mensaje = new mensajes_globales("Para ver est&aacute; p&aacute;gina correctamente se requiere Internet Explorer 8 o superior", 3);
	exit($mensaje->mostrar_mensaje());
}
else $estilo = true;
require_once("clases/regiones.class.php");
require_once("01800admin/iglesia.php");
require_once("01800admin/publicidad.php");
require_once("clases/iglesia.php");
$total_iglesias = new Iglesia();
$total_iglesias = $total_iglesias->total_iglesias;
$publicidad = new publicidad();
if(!empty($r)) :
	$paises = new regiones($r, $p, $d, $c, $pag);
	$tooltips = new regiones($r, $p, $d, $c, $pag);
endif;
?>
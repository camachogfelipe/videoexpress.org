<?php
session_start();
define("_01800", true);
//echo "<pre>";print_r($_SERVER);echo "</pre>";
define("HOST", $_SERVER['SERVER_NAME']);
define("URL_TRUE", "http://01800.local/01800admin/recordacion.php");
define("URL_NEW", "http://".HOST."/01800admin/recordacion.php");
if(URL_NEW == URL_TRUE) {
	if(class_exists('BDManejo') == false) require_once("01800BD.php");
	if(!isset($_REQUEST['op'])) $op = 0;
	elseif(is_numeric($_REQUEST['op'])) $op = $_REQUEST['op'];
	else exit();

	if(class_exists('Recordacion') == false) require_once("recordacion.class.php");

	$recordacion = new Recordacion();

	switch($op) {
		case 0	:
		default	: $recordacion->solicito_usuario();
				  break;
		case 1	: $recordacion->confirmo_usuario();
				  break;
		case 2	: $recordacion->form_cambio_pass();
				  break;
		case 3	: $recordacion->habilito_usuario();
				  break;
	}
}
?>
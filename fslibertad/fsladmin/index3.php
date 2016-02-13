<?php
session_start();
if(isset($_SESSION['fsluser']))
{
	$op = $_REQUEST['op'];
	$s = $_REQUEST['s'];
	$id = $_REQUEST['id'];
	$tipo = $_REQUEST['t'];
	require("funciones.php");
	$conecta = conecta_bd();
	switch($s)
	{
		case 'vlp'				:	verproyectos();
									break;
		case 'ver_editorial'	:	ver_editorial();
									break;
		case 'verpropuestas'	:	ver_ayudas($tipo);
									break;
		case 'versolicitudes'	:	ver_ayudas($tipo);
									break;
		case 'ver_editorial'	:	ver_editorial();
									break;
		case 'ver_semillas'		:	ver_semillas();
									break;
		case 'ver_semillas2'	:	ver_semillas2();
									break;
		case 'vereditorial'		:	vereditorial($id);
									break;
		case 'versemilla'		:	versemilla($id);
									break;
		case 'versemilla2'		:	versemilla2($id);
									break;
		case 'procesar_ayuda'	:	procesar_ayuda($id);
									break;
		case 'verpropuesta'		:	verpropuesta($id);
									break;
		case 'versolicitud'		:	versolicitud($id);
									break;
		case 'verproyecto'		:	verproyecto($id);
									break;
		case 'delcolaborador'	:	eliminarcolaborador($id);
									break;
		case 'cambioclave'		:	cambioclave($id);
									break;
		case 'delfoto'			:	delfoto($id, $tipo);
									break;
	}
	desconecta_bd($conecta);
	
}
else header("Location: ../");
?>
<?php
//error_reporting(E_ALL ^ E_NOTICE);
error_reporting(0);
session_start();
if (isset($_SESSION['user_01800'])) {
	define( '_01800', 1 );
	require_once("01800BD.php");
	require_once("usuario.php");
	require_once('iglesia.php');
	require_once("administracion.php");
	require_once("banner.php");
	require_once("glosario.php");
	require_once("publicidad.php");
	//Inicio - Cambio efectuado para sistema de Listas de Correo
	require_once('listacorreo.php');
	//Fin - Cambio efectuado para sistema de Listas de Correo
	require_once("estadisticas.php");
	require_once("geografia.php");
	require_once("subir_masivo.php");
	if(isset($_REQUEST['pag'])) $pag = $_REQUEST['pag'];
	else $pag = 1;
	if(isset($_REQUEST['op'])) $op = $_REQUEST['op'];
	else $op = NULL;
	if(isset($_REQUEST['op2'])) $op2 = $_REQUEST['op2'];
	else $op2 = NULL;
	if(!isset($iglesia)) $iglesia = new Iglesia($pag, $op);
	//Inicio - Cambio efectuado para sistema de Listas de Correo
	if(!isset($listacorreo)) $listacorreo = new ListaCorreo($pag, $op);
	//Fin - Cambio efectuado para sistema de Listas de Correo
	$usuario = new usuario($pag);
	$administracion = new Administracion($pag);
	$banner = new Banner($pag);
	$publicidad = new publicidad($pag);
	$geografia = new Geografia($pag);
	$subir_masivo = new Subir_masivo($pag);
	//$administracion = new Administracion();
	if(isset($_REQUEST['e'])) $e = $_REQUEST['e'];
	else $e = false;
	if(isset($_REQUEST['id'])) $id = $_REQUEST['id'];
	else $id = NULL;
	//Inicio - Cambio efectuado para sistema de Listas de Correo
	if(isset($_REQUEST['idlista'])) $idlista = $_REQUEST['idlista'];
	else $idlista = NULL;
	if(isset($_REQUEST['idlisu'])) $idlisu = $_REQUEST['idlisu'];
	else $idlisu = NULL;
	//Fin - Cambio efectuado para sistema de Listas de Correo
	if(isset($_REQUEST['evt_id'])) $evt_id = $_REQUEST['evt_id'];
	else $evt_id = NULL;
	//
	if(isset($_REQUEST['red_id']))
	{
		$red_id = $_REQUEST['red_id'];
		//echo $_REQUEST['red_id']." --- ".$red_id;
	}
	else
	{
		$red_id = NULL;
	}
	//
	if(isset($_REQUEST['iduser'])) $iduser = $_REQUEST['iduser'];
	if(isset($_REQUEST['tabla'])) $tabla = $_REQUEST['tabla'];
	if(isset($_REQUEST['id_geo'])) $id_geo = $_REQUEST['id_geo'];
	if(isset($_REQUEST['palabra'])) mb_strtolower($texto_busqueda = $_REQUEST['palabra'], 'ISO-8859-1');
	else $texto_busqueda = NULL;
	if(isset($_REQUEST['categoria'])) mb_strtolower($lugar_busqueda = $_REQUEST['categoria'], 'ISO-8859-1');
	else $lugar_busqueda = NULL;
	if(isset($_REQUEST['back'])) $back = $_REQUEST['back'];
	else $back = NULL;
	if(isset($_REQUEST['lang'])) $lang = $_REQUEST['lang'];
	else $lang = NULL;
	if(isset($_REQUEST['letra'])) $letra = $_REQUEST['letra'];
	else $letra = NULL;
	if(isset($_REQUEST['status'])) $status = $_REQUEST['status'];
	else $status = "I";
	$glosario = new Glosario($lang);
	if(!isset($estadisticas)) $estadisticas = new estadisticas();
	switch($op)
	{
		case 1 : $iglesia->ver_lista_iglesias();
				 break;
		case 2 : $iglesia->ins_iglesia($e, $id, $back, $texto_busqueda, $lugar_busqueda);
				 break;
		case 3 : $iglesia->busqueda();
				  break;
		case 4 : $administracion->contactenos();
				 break;
		case 5 : $usuario->listausuarios();
				 break;
		case 6 : $usuario->cambioclave($e);
				  break;
		case 7 : $administracion->solicitudes_sugerencias("sug", $op);
				 break;
		case 8 : $administracion->solicitudes_sugerencias("sol", $op);
				 break;
		case 9 : $banner->listar_imagenes();
				 break;;
		case 10 : $publicidad->publicidad();
				 break;;
		case 11 : $glosario->agregar();
				 break;
		case 12 : $iglesia->guardar_iglesia();
				  break;
		case 13 : $iglesia->actualizar_iglesia();
				  break;
		case 14 : $iglesia->deleteiglesia($id);
				  break;
		case 15 : $iglesia->eliminar_multimedia($id, $evt_id, $e);
				  break;
		case 16 : $usuario->verinfouser($iduser);
				  break;
		case 17 : $administracion->carga_geolocalizacion($tabla, $id_geo);
				  $administracion->mostrar_select_geolocalizacion();
				  break;
		case 18 : $administracion->cargar_directorio();
				  $administracion->mostrar_archivos();
				  break;
		case 19 : $inc = true;
				  $iglesia->armar_logos_form($inc);
				  break;
		case 20 : $iglesia->busqueda(1);
				  break;
		case 21 : $usuario->editaruser($iduser);
				  break;
		case 22 : $usuario->editaruser($iduser, 1);
				  break;
		case 23 : $usuario->deleteuser($iduser);
				  break;
		case 24 : $banner->status($id);
				  break;
		case 25 : 
				$iglesia->informacion_adicional($e, $texto_busqueda, $lugar_busqueda, $id, $evt_id, $red_id, $back);
				  break;
		case 26 : $glosario->guardar();
				  break;
		case 27 : $glosario->mostrar_admin($letra);
				  break;
		case 28 : $glosario->editar_palabra($id, $e);
				  break;
		case 29 : $glosario->eliminar_palabra($id);
				  break;
		case 30 : $administracion->cargar_texto_01800($e);
				  break;
		case 31 : $administracion->cargar_texto_01800($e);
				  break;
		case 32 : $administracion->eliminar_sol_sug($id, $op2);
				  break;
		case 33 : $iglesia->carga_multimedia($id);
				  break;
		case 34 : $administracion->ver_sol_sug($id, $e);
				  break;
		case 35 : $administracion->actualizar_sugerencia($id);
				  break;
		case 36 : $administracion->inscribir_solicitud($id);
				  break;
		case 37 : $banner->delete_imagen($id);
				  break;
		case 38 : $usuario->crearuser();
				  break;
		case 39 : $iglesia->cargar_iglesias_autocompletar($_REQUEST['tipo'], $_REQUEST['term']);
				  break;
		case 40 : $iglesia->edita_multimedia($id, $evt_id, 1);
				  break;
		case 41 : $usuario->desactivaruser($iduser, $status);
				  break;
		//Inicio - Cambio efectuado para sistema de Listas de Correo
		case 42 : $listacorreo->ver_listas_correo();
				  break;
		case 43 : $listacorreo->crear_lista();
				  break;
		case 44 : $listacorreo->editar_lista($idlista);
				  break;
		case 45 : $listacorreo->editar_lista($idlista, 1);
				  break;
		case 46 : $listacorreo->borrar_lista($idlista);
				  break;
		case 47 : $listacorreo->crear_correo();
				  break;
		case 48 : $listacorreo->ver_usuarios_correo();
				  break;
		case 49 : $listacorreo->editar_usuario($idlisu);
				  break;
		case 50 : $listacorreo->editar_usuario($idlisu, 1);
				  break;
		case 51 : $listacorreo->borrar_usuario($idlisu);
				  break;
		case 52 : $listacorreo->envio_masivo();
				  break;
		case 53 : $listacorreo->crear_correo_varios();
				  break;
		//Fin - Cambio efectuado para sistema de Listas de Correo
		//Estadisticas
		case 54 : $estadisticas->ver_lista();
				  break;
		case 55 : $estadisticas->crear_estadistica();
				  break;
		case 56 : $estadisticas->editar_estadistica();
				  break;
		case 57 : $estadisticas->eliminar_estadistica();
				  break;
		//Fin Estadisticas
		case 58 : $listacorreo->envio_masivo_sms();
				  break;
		case 59 : $listacorreo->ver_historico_sms();
				  break;
		case 60 : $listacorreo->cargue_archivo();
				  break;
		case 61 : $geografia->crear_continente($op2);
					break;
		case 62 : $geografia->crear_pais($op2);
					break;
		case 63 : $geografia->crear_region($op2);
					break;
		case 64 : $geografia->crear_ciudad($op2);
					break;
		case 65 : $geografia->buscar($op2);
					break;
		case 66 : $subir_masivo->form($op2);
					break;
		case 67 : $subir_masivo->form($op2);
					break;
		case 68 : $iglesia->cargar_enlaceweb($op2);
							break;
		default : $administracion->resumen();
				 break;
	}
}
else header ("Location: ../");
?>
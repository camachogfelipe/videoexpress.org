<?php
session_start();
// check session variable
if (isset($_SESSION['user_adminvideo']))
{
	include("../catalogo/include/funciones_globales.php");
	$salir = $_GET['salir'];
	if($salir == 'adminvideo')
	{
		salir($salir);
		header("Location: ../");
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" href="../images/favicon.ico" />
<title>Panel principal VideoExpress.org&reg;</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="adminvideo.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="panel" usemap="panel_ppal">
  <div id="botones_ppal">
  <img name="botones" src="imagenes/botones.png" width="805" height="176" border="0" id="botones" usemap="#m_botones" alt="" /><map name="m_botones" id="m_botones">
<area shape="poly" coords="595,150,741,151,754,147,764,142,772,135,778,128,784,117,787,108,788,101,796,102,798,97,799,87,796,85,788,84,784,72,780,65,776,58,769,52,761,46,754,43,744,40,732,39,595,38,595,150" href="../enews/administracion" alt="" />
<area shape="poly" coords="595,151,445,151,455,142,462,134,467,124,471,115,472,104,471,84,469,71,465,62,459,54,451,45,443,38,595,38,595,151" href="http://www.01800iglesia.org/01800admin" alt="" />
<area shape="poly" coords="204,150,354,151,347,144,340,136,335,130,331,122,328,112,327,104,327,86,330,73,334,63,341,53,348,45,356,38,291,38,289,36,230,37,229,38,204,38,204,150" href="http://www.libroexpress.org/administracion" alt="" />
<area shape="poly" coords="204,151,59,151,46,147,38,144,31,138,24,132,17,122,14,116,12,109,11,101,10,87,14,76,18,66,23,59,29,53,40,45,41,35,48,33,85,36,90,33,123,35,131,31,181,35,181,38,204,38,204,151" href="../catalogo/administracion" alt="" />
<area shape="poly" coords="330,95,331,81,335,68,342,56,350,46,360,38,372,31,385,27,399,26,413,27,426,31,438,38,448,46,456,56,463,68,467,81,468,95,467,109,463,122,456,134,448,144,438,152,426,159,413,163,399,164,385,163,372,159,360,152,350,144,342,134,335,122,331,109,330,95,330,95" href="principal.php" alt="" />
</map>
  </div>
  <div id="msj_ppal">
    Bienvenido <strong><?php echo $_SESSION['nombre']; ?></strong>
    <p>En este momento ha ingresado al panel de administraci&oacute;n general de VideoExpress.org &reg;, desde donde podr&aacute; dirigirse a los paneles de administraci&oacute;n de las distintas secciones, desde los cuales podra realizar las siguientes acciones:</p>
  <ul style="margin-left: 20px">
  <li>Administrar las bases de datos de peliculas</li>
  <li>Administrar las bases de datos de libros</li>
  <li>Administrar las bases de datos de iglesias</li>
  <li>Administrar los boletines de e-news</li>
  <li>Agregar y eliminar registros de las bases de datos</li>
  <li>Editar registros de las bases de datos</li>
  <li>Ver estadisticas</li>
  <li>Generar informes de facturaci&oacute;n</li>
  <li>Administrar pedidos</li>
  <li>Imprimir facturas</li>
  </ul>
  Y muchas m&aacute;s acciones relacionadas con las actividades comerciales de VideExpress.org &reg;.
  </div>
  <div id="salida_ppal"><a href="?salir=adminvideo"><img src="imagenes/salida.png" width="72" height="39" border="0" alt="salir" /></a></div>
</div>
</body>
</html>
<?php
}
else
{
	echo '<script languaje="Javascript">location.href="../admin_video"</script>';
}
?>
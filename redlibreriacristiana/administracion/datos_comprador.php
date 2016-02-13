<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin título</title>
<link href="estilo_admin.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php
// check session variable

if (isset($_SESSION['valid_user']))
{
	$id = $_REQUEST['id'];
	include ("funciones.php");
	conecta_bd("redlibr_redlibreria");
	//nos conectamos a la tabla respectiva
	$sql = "select * FROM clientes WHERE cedula = '$id'";	
	$result = mysql_query($sql) or die("La siguiente consulta contiene alg&uacute;n error:<br>nSQL: <b>$sql</b>");
	while ($row = mysql_fetch_object($result))
	{
		$cedula		= $row->cedula;
		$nombre		= $row->nombre;
		$apellidos	= $row->apellidos;
		$direccion	= $row->direccion;
		$telefono	= $row->telefono;
		$celular	= $row->celular;
		$correo		= $row->correo;
		$ciudad		= $row->ciudad;
		$pais		= $row->pais;
	}
?>
<table width="550" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td><img src="imagenes/redondo_sup_izq.png" width="20" height="20" /></td>
    <td background="imagenes/linea_superior.png">&nbsp;</td>
    <td><img src="imagenes/redondo_sup_der.png" width="20" height="20" /></td>
  </tr>
  <tr>
    <td style="background:url(imagenes/linea_vertical_izq.png) repeat-y">&nbsp;</td>
    <td bgcolor="#ebebeb">
     <table width="500" border="0" cellspacing="0" cellpadding="2" align="center">
  <tr>
    <td width="100" rowspan="9" align="center" valign="top"><img src="imagenes/avatar.png" width="100" height="150" /></td>
    <td width="120" id="encabezado_tablas">Cedula</td>
    <td width="280" id="encabezado_tablas"><?php echo $cedula ?></td>
  </tr>
  <tr>
    <td>Nombre(s)</td>
    <td><?php echo $nombre ?></td>
  </tr>
  <tr>
    <td id="encabezado_tablas">Apellidos</td>
    <td id="encabezado_tablas"><?php echo $apellidos ?></td>
  </tr>
  <tr>
    <td>Direcci&oacute;n</td>
    <td><?php echo $direccion ?></td>
  </tr>
  <tr>
    <td id="encabezado_tablas">Tel&eacute;fono</td>
    <td id="encabezado_tablas"><?php echo $telefono ?></td>
  </tr>
  <tr>
    <td>Celular</td>
    <td><?php echo $celular ?></td>
  </tr>
  <tr>
    <td id="encabezado_tablas">Correo electr&oacute;nico</td>
    <td id="encabezado_tablas"><?php echo $correo ?></td>
  </tr>
  <tr>
    <td>Ciudad</td>
    <td><?php echo $ciudad ?></td>
  </tr>
  <tr>
    <td id="encabezado_tablas">Pa&iacute;s</td>
    <td id="encabezado_tablas"><?php echo $pais ?></td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
</table>
    </td>
    <td style="background:url(imagenes/linea_vertical_der.png) repeat-y">&nbsp;</td>
  </tr>
  <tr>
    <td><img src="imagenes/redondo_inf_izq.png" width="20" height="20" /></td>
    <td background="imagenes/linea_inferior.png">&nbsp;</td>
    <td><img src="imagenes/redondo_inf_der.png" width="20" height="20" /></td>
  </tr>
</table>
<p align="center"><a id="flechas" onclick="history.go(-1)" style="cursor:pointer" ><img src="imagenes/botonatras.png" alt="Regresar" width="25" height="25" align="absmiddle" /> Regresar</a></p>
</body>
</html>
<?php
}
else
{
	echo '<script type="text/javascript">window.location="../administracion";</script>';
}
?>
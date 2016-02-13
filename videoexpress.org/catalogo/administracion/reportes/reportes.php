<?php
error_reporting(0);
session_start();

if (isset($_SESSION['user_admin']))
{
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<link href="../../estilo.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php
	$r = $_REQUEST['r'];
	if($r == NULL) $r = 'inf';
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr bgcolor="#003366" align="center">
    <td width="14.3%"><a href="reportes.php?r=inf" id="menu_admon">Informes generales</a></td>
    <td width="14.3%"><a href="reportes.php?r=dtv" id="menu_admon">D&iacute;as trabajados ventas</a></td>
    <td width="14.3%"><a href="reportes.php?r=dtc" id="menu_admon">D&iacute;as trabajados capital</a></td>
    <td width="14.3%"><a href="reportes.php?r=axa" id="menu_admon">A&ntilde;o X a&ntilde;o</a></td>
    <td width="14.3%"><a href="reportes.php?r=rc" id="menu_admon">Re-compra</a></td>
    <td width="14.3%"><a href="reportes.php?r=ic" id="menu_admon">Ingresar capital</a></td>
    <td width="14.2%"><a href="reportes.php?r=idac" id="menu_admon">Actualizar el día a celebrar</a></td>
  </tr>
</table><br />
<?php
	if($r == 'dtv') include('dias_trabajados_ventas.php');
	elseif($r == 'dtc') include('dias_trabajados_capital.php');
	elseif($r == 'axa') include('anio_por_anio.php');
	elseif($r == 'rc') include('recompra.php');
	elseif($r == 'inf') include('informes.php');
	elseif($r == 'ic') include('ing_capital.php');
	elseif($r == 'idac') include('ing_dia_celebrar.php');
?>
</body>
</html>
<?php
}
else
{
	echo '<script languaje="Javascript">location.href="../"</script>';
}
?>

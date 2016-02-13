<?php
session_start();
if (isset($_SESSION['valid_user']))
{
	include('funciones.php');
	conecta_bd("redlibr_redlibreria");
	$sql = "SELECT COUNT(*) FROM articulos";
	$result = mysql_query($sql) or die("La siguiente consulta contiene algún error:<br>nSQL: <b>$sql</b>");
	$total_resultados = mysql_fetch_array($result);
	$No_libros = $total_resultados[0];
	$sql = "SELECT COUNT(*) FROM pedidos";
	$result = mysql_query($sql) or die("La siguiente consulta contiene algún error:<br>nSQL: <b>$sql</b>");
	$total_resultados = mysql_fetch_array($result);
	$No_pedidos = $total_resultados[0];
	$sql = "SELECT * FROM datos";
	$result = mysql_query($sql) or die("La siguiente consulta contiene algún error:<br>nSQL: <b>$sql</b>");
	while ($row = mysql_fetch_object($result))
	{
		$act = $row->ultima_actualizacion;
	}
	$tmp4 = explode("-",$act);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin título</title>
<link href="estilo_admin.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="800" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="20"><img src="imagenes/redondo_sup_izq.png" width="20" height="20" /></td>
    <td background="imagenes/linea_superior.png">&nbsp;</td>
    <td width="20"><img src="imagenes/redondo_sup_der.png" width="20" height="20" /></td>
  </tr>
  <tr>
    <td style="background:url(imagenes/linea_vertical_izq.png) repeat-y">&nbsp;</td>
    <td bgcolor="#E65200" align="left">
     <table width="100%" border="0" cellspacing="2" cellpadding="0" style="font-size: 14px">
      <tr>
        <td id="info">Fecha de la &uacute;ltima actualizaci&oacute;n del cat&aacute;logo</td>
        <td valign="middle"><?php echo "D&iacute;a: ".$tmp4[2]." Mes: ".$tmp4[1]." a&ntilde;o: ".$tmp4[0] ?></td>
      </tr>
      <tr>
        <td id="info">Total &aacute;rticulos que existen en el cat&aacute;logo</td>
        <td><?php echo $No_libros ?></td>
      </tr>
      <tr>
        <td id="info">Total pedidos pendientes por resolver al d&iacute;a de hoy</td>
        <td><?php echo $No_pedidos ?></td>
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
</body>
</html>
<?php
}
else
{
	echo '<script type="text/javascript">window.location="../administracion";</script>';
}
?>
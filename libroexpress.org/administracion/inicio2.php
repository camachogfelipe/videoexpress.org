<?php
session_start();
if (isset($_SESSION['valid_user']))
{
	include('conexion.php');
	conecta_bd("libroexpress");
	$sql = "SELECT COUNT(*) FROM libros";
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
		$trm = $row->trm;
		$act_trm = $row->ultima_actualizacion_trm;
		$act = $row->ultima_actualizacion;
		$fact = $row->factura_actual;
		$fact_al = $row->factura_al;
	}
	$status = $status1 = false;
	$tmp = $fact_al - 10;
	if($fact >= $tmp){ echo "comparo"; $status = true; }
	$tmp1 = explode("-",$act_trm);
	$tmp2 = date("Y-m-d", mktime(0, 0, 0, $tmp1[1], $tmp1[2]+5, $tmp1[0]));
	$tmp3 = date("Y-m-d");
	$nUXDate1 = strtotime($tmp2);
	$nUXDate2 = strtotime($tmp3);
	$nUXDelta = $nUXDate2 - $nUXDate1;
	$strDeltaTime = "" . $nUXDelta/60/60; // sec -> hour
    $nPos = strpos($strDeltaTime, ".");
	if (nPos !== false) $dias = substr($strDeltaTime, 0, $nPos + 3);
	$dias /= 24;
	if($dias >= 5) $status1 = true;
	$tmp4 = explode("-",$act);
	$mensaje1 = "Han pasado $dias desde la &uacute;ltima actualizaci&oacute;n del dolar.";
	$mensaje2 = "Se est&aacute; aproximando al l&iacute;mite de el rango de facturaci&oacute;n.";
	$imagen = "<img src=\"imagenes/informacion.png\" width=\"25\" height=\"25\" align=\"absmiddle\" />";
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
    <td bgcolor="#ebebeb" align="left">
     <table width="100%" border="0" cellspacing="2" cellpadding="0" style="font-size: 14px">
      <tr bgcolor="#CCCCCC">
        <td width="61%" id="informacion_gral">Precio del dolar act&uacute;al</td>
        <td width="39%" valign="middle">$ <?php echo $trm ?></td>
      </tr>
      <tr>
        <td id="informacion_gral">Fecha de la &uacute;ltima actulizaci&oacute;n del dolar<br /><?php if($status1 == 1) echo $imagen." ".$mensaje1 ?></td>
        <td valign="middle"><?php echo "D&iacute;a: ".$tmp1[2]." Mes: ".$tmp1[1]." a&ntilde;o: ".$tmp1[0] ?></td>
      </tr>
      <tr bgcolor="#CCCCCC">
        <td id="informacion_gral">Fecha de la &uacute;ltima actualizaci&oacute;n del catalogo</td>
        <td valign="middle"><?php echo "D&iacute;a: ".$tmp4[2]." Mes: ".$tmp4[1]." a&ntilde;o: ".$tmp4[0] ?></td>
      </tr>
      <tr>
        <td id="informacion_gral">N&uacute;mero de la &uacute;ltima factura generada<?php if($status == 1) echo "<br />".$imagen." ".$mensaje2 ?></td>
        <td valign="middle"><?php echo $fact ?></td>
      </tr>
      <tr bgcolor="#CCCCCC">
        <td id="informacion_gral">Total libros que existen en el cat&aacute;logo</td>
        <td><?php echo $No_libros ?></td>
      </tr>
      <tr>
        <td id="informacion_gral">Total pedidos pendientes por resolver al d&iacute;a de hoy</td>
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
	include ('index.php');
}
?>
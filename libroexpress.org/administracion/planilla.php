<?php
session_start();

if (isset($_SESSION['valid_user']))
{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Planilla LibroExpress</title>
<link href="estilo_admin.css" rel="stylesheet" type="text/css" />

</head>

<body>
<?php
	include ("conexion.php");
	conecta_bd("libroexpress");
	//nos conectamos a la tabla respectiva
	$sql = "select id_comprador, articulos, cantidades, precio, fecha_emision, dolar_factura FROM pedidos";	
	$result = mysql_query($sql) or die("La siguiente consulta contiene alg&uacute;n error:<br>nSQL: <b>$sql</b>");
	$i = 0;
	while ($row = mysql_fetch_object($result))
	{
		$id_comprador[$i]		= $row->id_comprador;
		$articulos[$i]			= $row->articulos;
		$cantidades[$i]			= $row->cantidades;
		$precio[$i]				= $row->precio;
		$dolar_pedido[$i]		= $row->dolar_factura;
		$fecha_emision[$i]		= $row->fecha_emision;
		$i++;
	}
	
	for ($a=0; $a<$i; $a++)
	{
		$sql = "select nombre, apellidos, direccion, telefono, celular FROM clientes WHERE cedula = '$id_comprador[$a]'";	
		$result = mysql_query($sql) or die("La siguiente consulta contiene alg&uacute;n error:<br>nSQL: <b>$sql</b>");
		while ($row = mysql_fetch_object($result))
		{
			$nombre_completo[$a]	= $row->nombre." ".$row->apellidos;
			$direccion[$a]			= $row->direccion;
			$telefono[$a]			= $row->telefono;
			$celular[$a]			= $row->celular;
		}
	}
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0" style="border: 1px solid #000">
  <tr bgcolor="#CCCCCC" style="font-weight:bold" align="center">
    <td width="12%" style="border-right:1px solid #000; border-bottom:1px solid #000">Fecha</td>
    <td width="18%" style="border-right:1px solid #000; border-bottom:1px solid #000">Nombre completo</td>
    <td width="18%" style="border-right:1px solid #000; border-bottom:1px solid #000">Direcci&oacute;n</td>
    <td width="10%" style="border-right:1px solid #000; border-bottom:1px solid #000">Tel&eacute;fonos</td>
    <td width="10%" style="border-right:1px solid #000; border-bottom:1px solid #000">Celular</td>
    <td width="18%" style="border-right:1px solid #000; border-bottom:1px solid #000">Art&iacute;culos</td>
    <td width="14%" style="border-bottom:1px solid #000">Dinero</td>
  </tr>
 <?php
 $style = "style=\"border-right:1px solid #000; border-bottom:1px solid #000\"";
 for($a=0; $a<$i; $a++)
 {
	 $articulos1 = explode('-', $articulos[$a]);
	 $cantidades1 = explode('-', $cantidades[$a]);
	 $sizeof = sizeof($articulos1);
	 $sizeof--;
	 echo "<tr>";
	 echo "<td $style align=\"center\">".$fecha_emision[$a]."</td>";
	 echo "<td $style>".$nombre_completo[$a]."</td>";
	 echo "<td $style>".$direccion[$a]."</td>";
	 echo "<td $style align=\"center\">".$telefono[$a]."</td>";
	 echo "<td $style align=\"center\">".$celular[$a]."</td>";
	 echo "<td $style>";
	 for($x=0; $x<$sizeof; $x++) echo $articulos1[$x]." (".$cantidades1[$x].")<br />";
	 echo "</td>";
	 $pesos = $precio[$a] * $dolar_pedido[$a];
	 echo "<td style=\"border-bottom:1px solid #000\" align=\"left\">US $".$precio[$a]." / CO $".number_format($pesos,2)."</td>";
	 echo "</tr>";
 }
 ?>
</table>
<p align="center"><a id="flechas" onclick="history.go(-1)" style="cursor:pointer" ><img src="imagenes/botonatras.png" alt="Regresar" width="25" height="25" align="absmiddle" /> Regresar</a> <a id="flechas" onclick="javascript:document-print()" style="cursor:pointer" ><img src="imagenes/impresora.png" alt="Regresar" width="25" height="25" align="absmiddle" /> Imprimir</a></p>
</body>
</html>
<?php
}
else
{
	include ('index.php');
}
?>
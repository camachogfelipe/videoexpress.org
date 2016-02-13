<?php
session_start();

if (isset($_SESSION['user_admin']))
{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Planilla VideoExpress</title>
<link href="../estilo.css" rel="stylesheet" type="text/css" />
</head>

<body style="font-family: Arial, Helvetica, sans-serif; font-size: 12px; color: #000">
<?php
	include("../include/funciones_globales.php");
	include("../include/funciones_generales.php");
	$conecta = conecta_bd("videoexpress");
	//nos conectamos a la tabla respectiva
	$result1 = consulta_bd("pedidos","id_comprador, tipo, articulos, cantidades, precio, fecha_emision","-1;;;;");
	$i = 0;
	while ($row = mysql_fetch_object($result1))
	{
		$id_comprador1[$i]		= $row->id_comprador;
		$tipo1[$i]				= $row->tipo;
		$articulos1[$i]			= $row->articulos;
		$cantidades1[$i]		= $row->cantidades;
		$precio1[$i]			= $row->precio;
		$fecha_emision1[$i]		= $row->fecha_emision;
		$i++;
	}
	
	for ($a=0; $a<$i; $a++)
	{
		$sizeof = substr_count($id_comprador1[$a],'+');
		if ($sizeof > 0)
		{
			$id_comprador1 = explode('+', $id_comprador1[$a]);
			$datos_cliente[$a]	= $id_comprador1[1];
			$datos_cliente[$a]	= $id_comprador1[2]." / ".$id_comprador1[6];
			$datos_cliente[$a]	= $id_comprador1[3];
			$datos_cliente[$a]	= $id_comprador1[4];
		}
		else
		{
			$datos_cliente[$a] = datos_cliente_planilla($id_comprador1[$a]);
		}
	}
?>
<p class="encabezado_tabla">Peliculas por entregar</p>
<table width="100%" border="0" cellspacing="0" cellpadding="0" style="border: 1px solid #000">
  <tr bgcolor="#CCCCCC" style="font-weight:bold" align="center">
    <td style="border-right:1px solid #000; border-bottom:1px solid #000">Fecha</td>
    <td style="border-right:1px solid #000; border-bottom:1px solid #000">Nombre completo</td>
    <td style="border-right:1px solid #000; border-bottom:1px solid #000">Direcci&oacute;n</td>
    <td style="border-right:1px solid #000; border-bottom:1px solid #000">Tel&eacute;fonos</td>
    <td style="border-right:1px solid #000; border-bottom:1px solid #000">Celular</td>
    <td style="border-right:1px solid #000; border-bottom:1px solid #000">Art&iacute;culos</td>
    <td style="border-bottom:1px solid #000">Dinero</td>
  </tr>
 <?php
 $style = "style=\"border-right:1px solid #000; border-bottom:1px solid #000\"";
 for($a=0; $a<$i; $a++)
 {
	 $tipo1 = explode('+', $tipo1[$a]);
	 $articulos1 = explode('+', $articulos1[$a]);
	 $cantidades1 = explode('+', $cantidades1[$a]);
	 $sizeof = sizeof($tipo1);
	 $sizeof--;
	 $datos = explode("|", $datos_cliente[$a]);
	 echo "<tr>";
	 echo "<td $style align=\"center\">".$fecha_emision1[$a]."</td>";
	 echo "<td $style>".$datos[0]."</td>";
	 echo "<td $style>".$datos[1]."</td>";
	 echo "<td $style align=\"center\">".$datos[2]."</td>";
	 echo "<td $style align=\"center\">".$datos[3]."</td>";
	 echo "<td $style>";
	 for($x=0; $x<$sizeof; $x++) echo $tipo1[$x]." ".$articulos1[$x]." (".$cantidades1[$x].")<br />";
	 echo "</td>";
	 echo "<td style=\"border-bottom:1px solid #000\" align=\"center\">$ ".number_format($precio1[$a])."</td>";
	 echo "</tr>";
 }
 ?>
</table>
<p>
<?php
	//nos conectamos a la tabla respectiva
	$result2 = consulta_bd("facturas INNER JOIN info_fac_videx ON info_fac_videx.id_factura=facturas.id_factura","facturas.id_comprador, facturas.tipo, facturas.articulos, facturas.cantidades, facturas.fecha_emision","3;facturas.fecha_emision;ASC;info_fac_videx.devueltas='no' and Pertenece_a='videx';");
	$i = 0;
	while ($row = mysql_fetch_object($result2))
	{
		$id_comprador2[$i]		= $row->id_comprador;
		$tipo2[$i]				= $row->tipo;
		$articulos2[$i]			= $row->articulos;
		$cantidades2[$i]		= $row->cantidades;
		$fecha_emision2[$i]		= $row->fecha_emision;
		$i++;
	}
	
	for ($a=0; $a<$i; $a++)
	{
		$datos_cliente[$a] = datos_cliente_planilla($id_comprador2[$a]);
	}
?>
<p class="encabezado_tabla">Peliculas por recoger</p>
<table width="100%" border="0" cellspacing="0" cellpadding="0" style="border: 1px solid #000">
  <tr bgcolor="#CCCCCC" style="font-weight:bold" align="center">
    <td style="border-right:1px solid #000; border-bottom:1px solid #000">Fecha</td>
    <td style="border-right:1px solid #000; border-bottom:1px solid #000">Nombre completo</td>
    <td style="border-right:1px solid #000; border-bottom:1px solid #000">Direcci&oacute;n</td>
    <td style="border-right:1px solid #000; border-bottom:1px solid #000">Tel&eacute;fonos</td>
    <td style="border-right:1px solid #000; border-bottom:1px solid #000">Celular</td>
    <td style="border-right:1px solid #000; border-bottom:1px solid #000">Art&iacute;culos</td>
    <td style="border-right:1px solid #000; border-bottom:1px solid #000">D&iacute;as pasados</td>
  </tr>
 <?php
 $style = "style=\"border-right:1px solid #000; border-bottom:1px solid #000\"";
 for($a=0; $a<$i; $a++)
 {
	 $tipo = explode('+', $tipo2[$a]);
	 $articulos = explode('+', $articulos2[$a]);
	 $cantidades = explode('+', $cantidades2[$a]);
	 $sizeof = sizeof($tipo);
	 $sizeof--;
	 
	 $dias = calcular_dias($fecha_emision2[$a]);
	 if($dias >= 3)
	 {
		 echo "<tr>";
		 echo "<td $style align=\"center\">".$fecha_emision2[$a]."</td>";
		 $datos = explode("|", $datos_cliente[$a]);
		 echo "<td $style>".$datos[0]."</td>";
	 	 echo "<td $style>".$datos[1]."</td>";
	 	 echo "<td $style align=\"center\">".$datos[2]."</td>";
	 	 echo "<td $style align=\"center\">".$datos[3]."</td>";
		 echo "<td $style>";
		 for($x=0; $x<$sizeof; $x++) echo $tipo[$x].": ".$articulos[$x]." (".$cantidades[$x].")<br />";
		 echo "</td>";
		 echo "<td $style align=\"center\">".$dias."</td>";
		 echo "</tr>";
	 }
 }
 ?>
</table>
<p align="center"><a id="flechas" onclick="history.go(-1)" style="cursor:pointer" ><img src="../botones/botonatras.png" alt="Regresar" width="25" height="25" align="absmiddle" /> Regresar</a> <a id="flechas" onclick="javascript:document-print()" style="cursor:pointer" ><img src="../Imagenes_pagina/impresora.png" alt="Regresar" width="25" height="25" align="absmiddle" /> Imprimir</a></p>
</body>
</html>
<?php
}
else
{
	include ('index.php');
}
?>
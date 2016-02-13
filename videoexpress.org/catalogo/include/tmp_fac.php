<?php
include("funciones_globales.php");

$conecta = conecta_bd("videoexpress");

$query = consulta_bd("facturas", "fecha_emision", "4;;;;234");

$i = 0; $x = 1;
$cadena['/'] = "-";
while($row=mysql_fetch_object($query))
{
	echo $fecha = $row->fecha_emision;
	echo " nueva: ";
	$fecha[2] = "-";
	$fecha[5] = "-";
	echo $fecha .= ":00";
	echo " sql: ";
	act_datos_tabla("facturas", "fecha_emision='$fecha'", "id_factura='$x'", 1);
	echo "<br />";
	$x++; $i++;
}
?>
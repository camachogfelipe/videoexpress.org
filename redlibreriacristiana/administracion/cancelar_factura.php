<?php
$id = $_REQUEST['id'];
$anular = $_REQUEST['anular'];

include('funciones.php');
conecta_bd("redlibr_redlibreria");

$sql = "SELECT * FROM pedidos WHERE id_factura = '$id'";
$result = mysql_query($sql) or die("La siguiente consulta contiene alg&uacute;n error:<br>nSQL: <b>$sql</b>");
while ($row = mysql_fetch_object($result))
{
	$id_factura			= $row->id_factura;
	$id_comprador 		= $row->id_comprador;
	$tipo				= $row->tipo;
	$articulos 			= $row->articulos;
	$cantidades 		= $row->cantidades;
	$precios_unitarios 	= $row->precios_unitarios;
	$precio 			= $row->total;
	$fecha_emision 		= $row->fecha_emision;
}

if($anular == true)
{
	borrar_pedido($id_factura);
}
else
{
	$fecha_cancelada = date("Y-m-j H:i:s");

	conecta_bd("redlibr_redlibreria");
	$query = "INSERT INTO facturas (";
	$query .= "id_comprador, tipo, articulos, cantidades, precios_unitarios, total,  fecha_emision, fecha_cancelada";
	$query .= ") VALUES (";
	$query .= "'$id_comprador', '$tipo', '$articulos', '$cantidades', '$precios_unitarios', '$precio', '$fecha_emision', '$fecha_cancelada')";
	mysql_query($query) or die(mysql_error());
	borrar_pedido($id);
}

function borrar_pedido($id_factura)
{
	$query = "DELETE FROM pedidos WHERE id_factura='$id_factura'";
	mysql_query($query) or die(mysql_error());
}
echo "<img src=\"imagenes/informacion.png\" width=\"25\" height=\"25\" align=\"absmiddle\" /> <span id=\"informacion_gral\"> El pedido No. $id, ha sido facturado con &eacute;xito.";
?>

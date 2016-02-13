<?php
$id = $_REQUEST['id'];
$anular = $_REQUEST['anular'];

include('conexion.php');
conecta_bd("libroexpress");

$sql = "SELECT * FROM pedidos WHERE id_factura = '$id'";
$result = mysql_query($sql) or die("La siguiente consulta contiene alg&uacute;n error:<br>nSQL: <b>$sql</b>");
while ($row = mysql_fetch_object($result))
{
	$id_factura			= $row->id_factura;
	$id_comprador 		= $row->id_comprador;
	$articulos 			= $row->articulos;
	$cantidades 		= $row->cantidades;
	$precios_unitarios 	= $row->precios_unitarios;
	$precio 			= $row->precio;
	$fecha_emision 		= $row->fecha_emision;
	$trm				= $row->dolar_factura;
	$tipo				.= "compra+";
}

if($anular == true)
{
	borrar_pedido($id_factura);
}
else
{
	$dia = date(j);
	$mes = date(m);
	$ano = date(Y);
	$hor = date("H:i:s");
	$fecha_cancelada = date("Y-m-j");

	$query = mysql_query("SELECT factura_del, factura_al, resolucion_dian, fecha_res_dian, factura_actual FROM datos");
	while($row=mysql_fetch_object($query))
	{
		//Mostramos los titulos de los articulos o lo que deseemos...
		$factura_del = $row->factura_del;
		$factura_al = $row->factura_al;
		$resolucion_dian = $row->resolucion_dian;
		$fecha_res_dian = $row->fecha_res_dian;
		$factura_actual = $row->factura_actual;
	}

	$dian = "$factura_del-$factura_al@$resolucion_dian@$fecha_res_dian@";

	conecta_bd("catalogo");
	$query = "INSERT INTO facturas (";
	$query .= "id_comprador, tipo, articulos, cantidades, precios_unitarios, precio,  fecha_emision, ";
	$query .= " fecha_cancelada_dia, fecha_cancelada_mes, fecha_cancelada_anio, fecha_cancelada_hora, fecha_cancelada, ";
	$query .= "dian, Pertenece_a";
	$query .= ") VALUES (";
	$query .= "'$id_comprador', '$articulos', '$cantidades', '$precios_unitarios', '$precio', '$fecha_emision', ";
	$query .= "'$dia', '$mes', '$ano', '$hor', '$fecha_cancelada', '$dian', 'libro')";
	mysql_query($query) or die(mysql_error());
	$id_factura = mysql_insert_id();
	$query = "INSERT INTO dolar_fac_libro (";
	$query .= "id_factura, dolar_factura";
	$query .= ") VALUES (";
	$query .= "'$id_factura', '$trm')";
	mysql_query($query) or die(mysql_error());

	borrar_pedido($id);
}

function borrar_pedido($id_factura)
{
	$query = "DELETE FROM pedidos WHERE id_factura='$id_factura'";
	mysql_query($query) or die(mysql_error());
}
echo "<img src=\"imagenes/informacion.png\" width=\"25\" height=\"25\" align=\"absmiddle\" /> <span id=\"informacion_gral\"> El pedido No. $id, ha sido enviado con &eacute;xito, se ha generado la factura No. $num_factura";
?>

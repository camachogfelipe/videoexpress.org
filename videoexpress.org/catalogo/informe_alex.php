<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso8859-1" />
<title>Informe de facturaci&oacute;n Alex</title>
</head>

<body>
<?php
include("include/funciones_globales.php");
$conecta = conecta_bd("videoexpress");
$res = consulta_bd("facturas", "id_factura, id_comprador, precio, fecha_cancelada_dia, fecha_cancelada_mes, fecha_cancelada_anio", "3;id_factura;DESC;id_factura>='75' and id_factura<='231';");

echo '<table width="100%" cellpadding="0" cellspacing="0" style="border:1px solid #000" border="1">';
echo '<tr style="background-color:#000; color:#FFF"><td>Id fac</td><td>Comprador</td><td>Direcci&oacute;n</td><td>precio</td><td>fecha</td></tr>';

while($row=mysql_fetch_object($res))
{
	echo "<tr>";
	echo "<td>".$row->id_factura."</td>";
	
	if($row->id_comprador != 'Factura Anulada')
	{
		$sizeof = substr_count($row->id_comprador,'-');
		$id = $row->id_comprador;
		if ($sizeof > 0)
		{
			$res_datos = consulta_bd("usuarios","nombre, direccion","1;;;codigo_cliente='$id'");
			while ($r = mysql_fetch_object($res_datos))
			{
				$nombre = $r->nombre;
				$dir = $r->direccion;
			}
		}
		else
		{
			$res_datos = consulta_bd("clientes","nombres, direccion","1;;;id_cliente='$id'");
			while ($r = mysql_fetch_object($res_datos))
			{
				$nombre = $r->nombres;
				$dir = $r->direccion;
			}
		}
		echo "<td>".$nombre."</td>";
		echo "<td>".$dir."</td>";
	}
	else
	{
		echo "<td>".$row->id_comprador."</td>";
		echo "<td>".$row->id_comprador."</td>";
	}
	
	$total["precio"] += $row->precio;
	echo "<td>$ ".number_format($row->precio)."</td>";
	echo "<td>".$row->fecha_cancelada_anio."-".$row->fecha_cancelada_mes."-".$row->fecha_cancelada_dia."</td>";
	echo "</tr>";
}
echo '<tr style="background-color:#000; color:#FFF"><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>'.$total["precio"]."</td><td>&nbsp;</td></tr>"
?>
</body>
</html>
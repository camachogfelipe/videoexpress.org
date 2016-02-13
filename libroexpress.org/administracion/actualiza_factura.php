<?php
include('conexion.php');

$sql = "SELECT factura_actual FROM datos";
$result = mysql_query($sql) or die("La siguiente consulta contiene alg&uacute;n error:<br>nSQL: <b>$sql</b>");
while ($row = mysql_fetch_object($result))
{
      $num_factura   = $row->factura_actual;
}
$num_factura++;
$id_factura = $num_factura;

$query = "UPDATE datos SET factura_actual='$num_factura'";
mysql_query($query) or die(mysql_error());
?>

<?php

//nos conectamos a la base de datos
$bd = "enews";
include ("conexion.php");

//nos conectamos a la base de datos
$sql = "SELECT * FROM programacion_mail";
$result = mysql_query($sql) or die("La siguiente consulta contiene alg&uacute;n error:<br>nSQL: <b>$sql</b>");

while ($row = mysql_fetch_object($result))
{
	$programado = $row->programado;
	$inicio = $row->inicio;
	$final = $row->final;
}

echo "programado: $programado<br>";
echo "inicio: $inicio<br>";
echo "final: $final";
?>
<?php

$query = mysql_query("SELECT trm, ultima_actualizacion_trm FROM datos");
while($row=mysql_fetch_object($query))
{
	//Mostramos los titulos de los articulos o lo que deseemos...
	$trm = $row->trm;
}

$pesos = $trm * $precio_dolares;
$pesos = ceil($pesos);
?>
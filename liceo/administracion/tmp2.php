<?php

$cadena = "este es un texto largo 1,este es un texto largo 2,este es un texto largo 3,este es un texto largo 4,este es un texto largo 5,este es un texto largo 6,este es un texto largo 7,este es un texto largo 8,este es un texto largo 9";

function tamanio($cadena, $tam)
{
	if(strlen($cadena) > $tam) $cadena = substr($cadena, 0, $tam);
	return strtolower($cadena);
}

$n = tamanio($cadena, 50);


echo "$n";

?>
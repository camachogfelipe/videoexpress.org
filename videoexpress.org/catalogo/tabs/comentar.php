<?php
include("../../catalogo/include/funciones_globales.php");
$nombre = remplazar(strip_tags($_REQUEST["nombre"]));
$email = strip_tags($_REQUEST["email"]);
$valoracion = $_REQUEST['valoracion'];
$comentario = remplazar(strip_tags($_REQUEST["comentario"]));
$edad = $_REQUEST['edad'];
$sexo = $_REQUEST['sexo'];
$articulo = $_REQUEST['art'];
$pagina = $_GET['pagina'];

if($nombre != NULL and $email != NULL and $comentario != NULL)
{
	$conecta = conecta_bd("videoexpress");
	$tabla = "libro_visitas";
	//Cortamos las cadenas demasiado largas
	$nombre=substr($nombre,0,150);
	$email=substr($email,0,80);
	
	$fecha = fecha();

	ing_datos_tabla($tabla,"nombre, email, valoracion, comentario, pagina, articulo, edad, sexo, fecha","'$nombre','$email','$valoracion','$comentario','$pagina', '$articulo', '$edad', '$sexo', '$fecha'");

	echo '<b>Muchas gracias por tu participaci&oacute;n</b>';
}

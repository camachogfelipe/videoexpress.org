<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Libro de visitas</title>
<link href="../libro_visitas/radio/libro.css" rel="stylesheet" type="text/css" />
<link href="radio.css" rel="stylesheet" type="text/css" />
</head>
<body class="radio" style="color: #000">
<div id="fondo">
<div class="parrafos">
<?php
include("../catalogo/include/funciones_globales.php");
$url = explode("/", $_SERVER['REQUEST_URI']);
$pagina = $url[1];
//$tf = dato_columna("libro_visitas", "COUNT(*)", "-1;;;pagina='$pagina';");
$conecta = conecta_bd("videoexpress");
$tf = dato_columna("libro_visitas","COUNT(*)","1;;;pagina='$pagina' and activo='1';");

if($url[1] == "radio")
{
	$pregunta = "¿Qué opinión tiene usted de estos programas de radio? Déjenos su comentario";
	echo "<strong>Para dejar su firma en el libro de visitas es preciso dar click en alguno de los programas de radio</strong>";
}
else $pregunta = "D&eacute;janos tu mensaje en el libro de visitas";

echo '<p><img src="../libro_visitas/rss.png" width="16" height="16" align="absmiddle" /> '.$tf.' Comentarios en '.$pagina.'</p>';
require("../libro_visitas/index.php");
?>
</div>
</div>
</body>
</html>
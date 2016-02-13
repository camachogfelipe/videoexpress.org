<?php error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING); ob_start( 'ob_gzhandler' ); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Catalogo de peliculas VideoExpress</title>
<link href="estilo.css" rel="stylesheet" type="text/css" />
<link type="text/css" rel="stylesheet" href="Scripts/floatbox/floatbox.css" />
<script type="text/javascript" src="Scripts/floatbox/floatbox.js"></script>
<script type="text/javascript" src="Scripts/floatbox/options.js"></script>
</head>
<body style="background:url(Imagenes_pagina/fondo_alfa.png)">
<?php
include("include/funciones_globales.php");
include("include/funciones_generales.php");
$busqueda =  $_REQUEST['busqueda'];
$inf = $_GET['inf'];
if ($inf == NULL || $inf <= 0 || $inf >= 9) $inf = 3;
if ($inf == 8 && $busqueda == NULL) $inf = 3;
$pag = $_GET['pag'];
if ($pag == NULL || $pag < 1) $pag = 1;
$gc = $_GET['gc'];
if ($gc == NULL || $gc < 0 || $gc > 1)$gc = 0;
$id_p = $_GET['id_p'];
if ($id_p == NULL) $id_p = 1;
$aud = $_GET['aud'];
if ($aud == NULL || $aud < 3 || $aud > 7) $aud = 3;

if($inf == 1)
{
	$TEXT['titulo'] = "infantiles";
	$auditorio = "infantil";
}
if($inf == 2)
{
	$TEXT['titulo'] = "juveniles";
	$auditorio = "juvenil";
}
if($inf == 3)
{
	$TEXT['titulo'] = "familiares";
	$auditorio = "familiar";
}
if($inf == 4)
{
	$TEXT['titulo'] = $auditorio = "adultos";
	$auditorio = "adultos";
}
if($inf == 5)
{
	$TEXT['titulo'] = "musicales";
	$auditorio = "musical";
}
if($inf == 6)
{
	$TEXT['titulo'] = $auditorio = "videoclips";
}
if($inf == 7)
{
	$TEXT['titulo'] = "todos";
	$auditorio = "*";
}
if($inf == 8)
{
	$TEXT['titulo'] = "busqueda";
}

$conecta = conecta_bd("videoexpress");
echo "<div id='titulo_informacion'><img src='Imagenes_pagina/titulos/".$TEXT['titulo'].".png'/></div><div id='contenido_informacion'>";
if($TEXT['titulo'] != "busqueda") generar_resultados($pag, $auditorio, $inf);
else include('include/busqueda.php');
echo "</div>";
?>
</body> 
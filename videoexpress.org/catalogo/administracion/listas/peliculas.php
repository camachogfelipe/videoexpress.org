<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
session_start();

// check session variable
if (isset($_SESSION['user_admin']))
{
	echo "<html><meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
	echo "<link href='../../estilo.css' rel='stylesheet' type='text/css'/>";

	$orden = $_REQUEST['orden'];
	if($orden == NULL) $orden = "id/ASC";
	$orden1 = explode("/",$orden);
	
	include("../../include/funciones_globales.php");
	include("../../include/funciones_generales.php");
	$conecta = conecta_bd("videoexpress");

	$tabla = "catalogo";
	$datos = "*";
	$pagina = "peliculas";
	$pag = $_REQUEST['pag'];
	if($pag == NULL || $pag < 1) $pag = 1;
	$registros_a_mostrar = 15;
	include("codigo_comun.php");
	
	echo "<table border='1px' width='100%' id='listado_peliculas'><tr class='encabezado_tabla'>";
	echo "<td $estilo_celda><a href='peliculas.php?orden=id/"; orden("id",$orden1); echo "'>ID</a></td>";
	echo "<td width='100px' $estilo_celda><a href='peliculas.php?orden=titulo/"; orden("titulo",$orden1); echo "'>Titulo</a></td>";
	echo "<td $estilo_celda><a href='peliculas.php?orden=auditorio/"; orden("auditorio",$orden1); echo "'>Auditorio</a></td>";
	echo "<td $estilo_celda><a href='peliculas.php?orden=clasificacion/"; orden("clasificacion",$orden1); echo "'>Clas.</a></td>";
	echo "<td $estilo_celda><a href='peliculas.php?orden=genero/"; orden("genero",$orden1); echo "'>Genero</a></td>";
	echo "<td $estilo_celda><a href='peliculas.php?orden=tiempo/"; orden("tiempo",$orden1); echo "'>Tiempo</a></td>";
	echo "<td width='180px' $estilo_celda>Descripcion</td>";
	echo "<td $estilo_celda>Imagen</td>";
	echo "<td $estilo_celda>Formato</td>";
	echo "<td width='80px' $estilo_celda><a href='peliculas.php?orden=fecha/"; orden("fecha",$orden1); echo "'>Fecha</a></td>";
	echo "<td width='100px' $estilo_celda><a href='peliculas.php?orden=nuevo/"; orden("nuevo",$orden1); echo "'>Otros datos</a></td>";
	echo "<td $estilo_celda>Acci&oacute;n</td></tr>";
	echo "</tbody>";
	
	$colorfila = 1;
			
	while ($row = mysql_fetch_object($result))
	{
		if ($colorfila==0)
		{
			$color = "#9ABEDC";
			$color1 = "#000";
		    $colorfila = 1; 
		}
		else
		{
			$color = "#fff";
			$color1 = "#000";
			$colorfila = 0;
		}
		
		$estilo_celda = "valign='top' style='text-align:justify; background-color:$color; color:$color1'";

		echo "<tr>";
		$id = $row->id;
		echo "<td $estilo_celda>$id</td>";
		$titulo = $row->titulo;
		echo "<td $estilo_celda>$titulo</td>";
		$auditorio = $row->auditorio;
		echo "<td $estilo_celda>$auditorio</td>";
		$clasificacion = $row->clasificacion;
		echo "<td $estilo_celda>$clasificacion</td>";
		$genero = $row->genero;
		echo "<td $estilo_celda>$genero</td>";
		$tiempo = $row->tiempo;
		echo "<td $estilo_celda>$tiempo min.</td>";
		$descripcion = $row->descripcion;
		echo "<td $estilo_celda width='300px'>$descripcion</td>";
		$imagen = $row->imagen;
		echo "<td $estilo_celda><img src='../../Imagenes_peliculas/$imagen' width='120px' height='174px'></td>";
		$formato = $row->formato;
		echo "<td $estilo_celda>$formato</td>";
		$fecha = $row->fecha;
		echo "<td $estilo_celda>$fecha</td>";
		$nuevo = $row->nuevo;
		$compra = $row->compra;
		$alquiler = $row->alquiler;
		$precio_compra = $row->precio_compra;
		$trailer = $row->trailer;
		$resena = $row->resena;
		$alquilada = $row->alquilada;
		echo "<td $estilo_celda>Nuevo: $nuevo<br />Para compra: $compra<br />Precio compra: $".number_format($precio_compra,2)."<br />Para alquiler: $alquiler<br />Trailer: $trailer<br />Rese&ntilde;a: $resena<br />No. veces alquilada: $alquilada</td>";
		echo "<td $estilo_celda><span id='menu_admon2'><a href='../editar_peliculas/actualizar_peliculas.php?";
		echo "id=$id&";
		echo "editar=true&";
		echo "titulo=$titulo&";
		echo "auditorio=$auditorio&";
		echo "clasificacion=$clasificacion&";
		echo "genero=$genero&";
		echo "tiempo=$tiempo&";
		echo "descripcion=$descripcion&";
		echo "imagen=$imagen&";
		echo "formato=$formato&";
		echo "fecha=$fecha&";
		echo "nuevo=$nuevo&";
		echo "compra=$compra&";
		echo "alquiler=$alquiler&";
		echo "trailer=$trailer&";
		echo "resena=$resena&";
		echo "precio_compra=$precio_compra&";
		echo "pag=$pag&orden=$x'>Editar</a></span><br />";
		echo "<span id='menu_admon2'><a href='borrar.php?id=$id&tabla=$tabla&pagina=$pagina&nombre=$titulo&orden=$x&pag=$pag'>Eliminar</a></span></td>";
		echo "</tr>";
	}

	echo "<tr><td></tr></table><p align=\"center\">";
	paginacion_lista($total_paginas, $pag, $tabla, $pagina, $orden);
	echo "</p>";
}
else
{
	include ('index.php');
}
?>
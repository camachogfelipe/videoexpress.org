<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Busqueda</title>
<link href="../estilo.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php
include('../include/funciones_globales.php');
$conecta = conecta_bd("videoexpress");

$texto_busqueda = $_REQUEST['texto_busqueda'];
$lugar_busqueda = $_REQUEST['lugar_busqueda'];
	
if ($texto_busqueda != NULL)
{
	//CUENTA EL NUMERO DE PALABRAS
	if ($lugar_busqueda != 'todos') $cadbusca="SELECT * FROM catalogo WHERE $lugar_busqueda LIKE '%$texto_busqueda%' ORDER BY ($lugar_busqueda) ASC";
	else $cadbusca="SELECT * FROM catalogo WHERE TITULO LIKE '%$texto_busqueda%' OR auditorio LIKE  '%$texto_busqueda%' OR clasificacion LIKE  '%$texto_busqueda%' OR genero LIKE '%$texto_busqueda%' OR descripcion LIKE '%$texto_busqueda%' ORDER BY (titulo) ASC";
		
	//SI SOLO HAY UNA PALABRA DE BUSQUEDA SE ESTABLECE UNA INSTRUCION CON LIKE
		
	$result = mysql_query($cadbusca) or die("La siguiente consulta contiene alg&uacute;n error:<br>nSQL: <b>$cadbusca</b>");
	$total_resultados = mysql_num_rows($result);
	
	$No_items = 0;
		
	$estilo_celda = "valign='top' style='text-align:justify'";
	
	echo "<table border='1px' width='100%' id='listado_peliculas'><tr class='encabezado_tabla'>";
	echo "<td $estilo_celda><a href='listado_peliculas.php?ord=1'>ID</a></td>";
	echo "<td width='100px' $estilo_celda><a href='listado_peliculas.php?ord=2'>Titulo</a></td>";
	echo "<td $estilo_celda><a href='listado_peliculas.php?ord=3'>Auditorio</a></td>";
	echo "<td $estilo_celda><a href='listado_peliculas.php?ord=4'>Clasificacion</a></td>";
	echo "<td $estilo_celda><a href='listado_peliculas.php?ord=5'>Genero</a></td>";
	echo "<td $estilo_celda><a href='listado_peliculas.php?ord=6'>Tiempo</a></td>";
	echo "<td width='180px' $estilo_celda>Descripcion</td>";
	echo "<td $estilo_celda>Imagen</td>";
	echo "<td $estilo_celda><a href='listado_peliculas.php?ord=7'>Formato</a></td>";
	echo "<td width='80px' $estilo_celda><a href='listado_peliculas.php?ord=8'>Fecha</a></td>";
	echo "<td $estilo_celda><a href='listado_peliculas.php?ord=9'>Otros datos</a></td>";
	echo "<td $estilo_celda>Acci&oacute;n</td></tr>";
	
	$colorfila = 1;
	$tabla = "catalogo";
	$pagina = "listas/peliculas";
			
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
		echo "<td $estilo_celda><img src='../Imagenes_peliculas/$imagen' width='120px' height='174px'></td>";
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
		echo "<td $estilo_celda>Nuevo: $nuevo<br />Para compra: $compra<br />Precio compra: $".number_format($precio_compra,2)."<br />Para alquiler: $alquiler<br />Trailer: $trailer<br />Rese&ntilde;a: $resena</td>";
		echo "<td $estilo_celda><span id='menu_admon2'><a href='editar_peliculas/actualizar_peliculas.php?";
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
		echo "precio_compra=$precio_compra'>Editar</a></span><br />";
		echo "<span id='menu_admon2'><a href='editar_peliculas/borrar.php?id=$id&tabla=$tabla&pagina=$pagina'>Eliminar</a></span></td>";
		echo "</tr>";
	}

	echo "<tr><td></tr></table></span>";
}
?>
</body>
</html>
<?php
session_start();

// check session variable
if (isset($_SESSION['valid_user']))
{
	$t = $_REQUEST['t'];
	if($t == NULL) $t = "index";
	
	echo "<html><meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1' />";
	echo "<link href='../estilo.css' rel='stylesheet' type='text/css'/>";
	//nos conectamos a la base de datos
	$bd = "enews";
	include ("conexion.php");
	
	$sql = "select * FROM inicio";	
	//nos conectamos a la tabla respectiva
	$result = mysql_query($sql) or die("La siguiente consulta contiene algún error:<br>nSQL: <b>$sql</b>");
	
	$estilo_celda = "valign='top' style='text-align:justify; font-weight: bold'";
	
	echo "<div id='enc_tabla_cont'>";
	echo "<table cellspacing='0' cellpading='0' border='0' width='100%'><tr align='center'>";
	echo "<td style='border-right: 1px dotted #000'>";
	echo "<a href=\"tabla_contenido.php?t=index\">Index</a>";
	echo "</td>";
	echo "<td style='border-right: 1px dotted #000'>";
	echo "<a href=\"tabla_contenido.php?t=para_editar\">Para editar</a>";
	echo "</td>";
	echo "<td style='border-right: 1px dotted #000'>";
	echo "<a href=\"tabla_contenido.php?t=primera_fila\">Primera fila</a>";
	echo "</td>";
	echo "<td style='border-right: 1px dotted #000'>";
	echo "<a href=\"tabla_contenido.php?t=nueva_mente\">Nueva Mente</a>";
	echo "</td>";
	echo "<td style='border-right: 1px dotted #000'>";
	echo "<a href=\"tabla_contenido.php?t=buenas_nuevas\">Buenas nuevas</a>";
	echo "</td>";
	echo "<td style='border-right: 1px dotted #000'>";
	echo "<a href=\"tabla_contenido.php?t=garabatos\">Garabatos</a>";
	echo "</tr>";
	echo "</table>";
	
	if($t == 'index')
	{
		echo "</div><br />";	
		echo "<table border='1px' width='100%' id='listado_contenido'><tr class='encabezado_tabla'>";
		echo "<td $estilo_celda>No</td>";
		echo "<td $estilo_celda>Imagen</td>";
		echo "<td width='100px' $estilo_celda>Fecha</td>";
		echo "<td $estilo_celda>Titulo Para Editar</td>";
		echo "<td $estilo_celda>Texto Para Editar</td>";
		echo "<td $estilo_celda>Titulo Primera Fila</td>";
		echo "<td $estilo_celda>Texto Primera Fila</td>";
		echo "<td $estilo_celda>Titulo Nueva Mente</td>";
		echo "<td $estilo_celda>Texto Nueva Mente</td>";
		echo "<td $estilo_celda>Titulo Buenas Nuevas</td>";
		echo "<td $estilo_celda>Texto Buenas Nuevas</td>";
		echo "<td $estilo_celda>Titulo Garabatos</td>";
		echo "<td $estilo_celda>Texto Garabatos</td>";
		echo "<td $estilo_celda>Acci&oacute;n</td></tr>";
	
		$colorfila = 0;
			
		while ($row = mysql_fetch_object($result))
		{
			if ($colorfila==0)
			{
				$color = "#FFFF99";
				$color1 = "#000";
			    $colorfila = 1; 
			}
			else
			{
				$color = "#FFF";
				$color1 = "#000";
				$colorfila = 0;
			}
		
			$estilo_celda = "valign='top' style='text-align:justify; background-color:$color; color:$color1'";

			echo "<tr>";
			$No = $row->No;
			echo "<td $estilo_celda>$No</td>";
			$fondo = $row->fondo;
			echo "<td $estilo_celda><img src='../imagenes-para-secciones/fondos/$fondo' width='100px' height='100px'></td>";
			$fecha = $row->fecha;
			echo "<td $estilo_celda>$fecha</td>";
			$titulo_paraeditar = $row->titulo_paraeditar;
			echo "<td $estilo_celda>$titulo_paraeditar</td>";
			$texto_paraeditar = $row->cuerpo_paraeditar;
			echo "<td $estilo_celda>$texto_paraeditar</td>";
			$titulo_primerafila = $row->titulo_primerafila;
			echo "<td $estilo_celda>$titulo_primerafila</td>";
			$texto_primerafila = $row->cuerpo_primerafila;
			echo "<td $estilo_celda>$texto_primerafila</td>";
			$titulo_nuevamente = $row->titulo_nuevamente;
			echo "<td $estilo_celda>$titulo_nuevamente</td>";
			$texto_nuevamente = $row->cuerpo_nuevamente;
			echo "<td $estilo_celda>$texto_nuevamente</td>";
			$titulo_buenasnuevas = $row->titulo_buenasnuevas;
			echo "<td $estilo_celda>$titulo_buenasnuevas</td>";
			$texto_buenasnuevas = $row->cuerpo_buenasnuevas;
			echo "<td $estilo_celda>$texto_buenasnuevas</td>";
			$titulo_garabatos = $row->titulo_garabatos;
			echo "<td $estilo_celda>$titulo_garabatos</td>";
			$texto_garabatos = $row->cuerpo_garabatos;
			echo "<td $estilo_celda>$texto_garabatos</td>";
			echo "<td $estilo_celda><span id='menu_admon'><a href='editar_index.php?No=$No&editar=true&fondo=$fondo&fecha=$fecha&";
			echo "titulo_paraeditar=$titulo_paraeditar&texto_paraeditar=$texto_paraeditar&";
			echo "titulo_primerafila=$titulo_primerafila&texto_primerafila=$texto_primerafila&";
			echo "titulo_nuevamente=$titulo_nuevamente&texto_nuevamente=$texto_nuevamente&";
			echo "titulo_buenasnuevas=$titulo_buenasnuevas&texto_buenasnuevas=$texto_buenasnuevas&";
			echo "titulo_garabatos=$titulo_garabatos&texto_garabatos=$texto_garabatos'";
			echo ">Editar</a></span></td></tr>";
		}

		echo "</table><p style='clear: both'>&nbsp;</p>";
	}
	elseif($t == 'para_editar')
	{
		$tabla = "para_editar";
		$tit_tabla = "Para Editar";
		dibujar_tabla($tabla, $tit_tabla);
	}
	elseif($t == 'primera_fila')
	{
		$tabla = "primera_fila";
		$tit_tabla = "Primera Fila";
		dibujar_tabla($tabla, $tit_tabla);
	}
	elseif($t == 'nueva_mente')
	{
		$tabla = "nueva_mente";
		$tit_tabla = "Nueva Mente";
		dibujar_tabla($tabla, $tit_tabla);
	}
	elseif($t == 'buenas_nuevas')
	{
		$tabla = "buenas_nuevas";
		$tit_tabla = "Buenas Nuevas";
		dibujar_tabla($tabla, $tit_tabla);
	}
	elseif($t == 'garabatos')
	{
		$tabla = "garabatos";
		$tit_tabla = "Garabatos";
		dibujar_tabla($tabla, $tit_tabla);
	}
}
else
{
	include ('index.php');
}

function dibujar_tabla($tabla, $tit_tabla)
{
	$sql = "select * FROM $tabla";
	$result = mysql_query($sql) or die("La siguiente consulta contiene algún error:<br>nSQL: <b>$sql</b>");
	
	$estilo_celda = "valign='top' style='text-align:justify; font-weight: bold'";
	
	echo "<p>";
	echo "<div id='enc_tabla_cont'>$tit_tabla</div><br>";		
	echo "<table width=\"100%\" border=\"1px\" cellspacing=\"0\" cellpadding=\"0\" id=\"listado_contenido\">";
  	echo "<tr class=\"encabezado_tabla\">";
	echo "<td $estilo_celda>No</td>";
    echo "<td $estilo_celda>Titulo</td>";
    echo "<td $estilo_celda>Texto del articulo</td>";
    echo "<td $estilo_celda>Imagen de apoyo</td>";
    echo "<td $estilo_celda>Fecha</td>";
    echo "<td $estilo_celda>Acci&oacute;n</td>";
	echo "</tr>";
	
	$colorfila = 0;
			
	while ($row = mysql_fetch_object($result))
	{
		if ($colorfila==0)
		{
			$color = "#FFFF99";
			$color1 = "#000";
		    $colorfila = 1; 
		}
		else
		{
			$color = "#FFF";
			$color1 = "#000";
			$colorfila = 0;
		}
		
		$estilo_celda = "valign='top' style='text-align:justify; background-color:$color; color:$color1'";

		echo "<tr>";
		$No = $row->No_seccion;
		echo "<td $estilo_celda>$No</td>";
		$titulo_articulo = $row->Titulo;
    	echo "<td $estilo_celda>$titulo_articulo</td>";
		$texto_articulo = $row->Texto;
		echo "<td $estilo_celda>$texto_articulo</td>";
		$img_photo_main = $row->Img_photo_main;
    	echo "<td $estilo_celda><img src=\"../imagenes-para-secciones/photo-main/$img_photo_main\" width=\"150\" height=\"75\" /></td>";
		$fecha = $row->fecha;
    	echo "<td $estilo_celda>$fecha</td>";
    	echo "<td $estilo_celda><span id=\"menu_admon\"><a href=\"editar_articulo.php?No=$No&editar=true&articulo=$tabla\">Editar</a></span></td>";
  		echo "</tr>";
	}
	echo "</table></p>";
}
?>
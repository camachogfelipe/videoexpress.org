<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
<link href="estilo_admin.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php
// check session variable

if (isset($_SESSION['valid_user']))
{
	include ("conexion.php");
	conecta_bd("libroexpress");
	//definimos las variables para la paginacion
	$tabla = "libros";
	$pagina = "lista_libros";
	$lis = 4;
	//nos conectamos a la tabla respectiva
	$x = @$_REQUEST["ord"];
	if ($x == NULL) $x = 1;
	include ("ordenar.php");
	
	$result = mysql_query($sql) or die("La siguiente consulta contiene alg&uacute;n error:<br>nSQL: <b>$sql</b>");
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="20"><img src="imagenes/redondo_sup_izq.png" width="20" height="20" /></td>
    <td style="background:url(imagenes/linea_superior.png) repeat-x">&nbsp;</td>
    <td width="20"><img src="imagenes/redondo_sup_der.png" width="20" height="20" /></td>
  </tr>
  <tr>
    <td style="background:url(imagenes/linea_vertical_izq.png) repeat-y">&nbsp;</td>
    <td bgcolor="#ebebeb" align="center">
     <table width="100%" border="0" cellspacing="0" cellpadding="2px" id="tabla">
      <tr align="center" id="encabezado_tablas">
        <td width="5%"><a href="lista_libros.php?ord=1&pag<?php $pag++; echo $pag; ?>"><img src="imagenes/ordenar.png" width="15" height="15" border="0" align="absmiddle" /></a> Id</td>
        <td width="8%">Imagen</td>
        <td width="11%"><a href="lista_libros.php?ord=2&pag<?php echo $pag; ?>"><img src="imagenes/ordenar.png" alt="" width="15" height="15" border="0" align="absmiddle" /></a> T&iacute;tulo</td>
        <td width="8%"><a href="lista_libros.php?ord=3&pag<?php echo $pag; ?>"><img src="imagenes/ordenar.png" alt=" " width="15" height="15" border="0" align="absmiddle" /></a> Autor</td>
        <td width="10%"><a href="lista_libros.php?ord=4&pag<?php echo $pag; ?>"><img src="imagenes/ordenar.png" alt="" width="15" height="15" border="0" align="absmiddle" /></a> Editorial</td>
        <td width="18%">Sinopsis</td>
        <td width="17%">Datos</td>
        <td width="11%">Art&iacute;culos Relacionados</td>
        <td width="8%">Acci&oacute;n</td>
      </tr>
      <?php
      while ($row = mysql_fetch_object($result))
	  {
	    if ($colorfila==0)
		{
			$color = "#dddddd";
			$colorfila = 1;
		}
		else
		{
			$colorfila = 0;
		}

		$estilo_celda = "valign='top' style='text-align:justify; background-color:$color'";
		
		echo "<tr $estilo_celda>";
		//id
		$id = $row->id;
		echo "<td align=\"center\">$id</td>";
		//imagen
		$imagen = $row->imagen_caratula;
		echo "<td align=\"center\"><img src='../imagenes_libros/$imagen' width='69px' height='100px' align=\"center\" ></td>";
		//titulo
		$titulo = $row->titulo;
		echo "<td>$titulo</td>";
		//autor
		$autor = $row->autor;
		echo "<td>$autor</td>";
		//editorial
		$editorial = $row->editorial;
		echo "<td>$editorial</td>";
		//sinopsis
		$sinopsis = $row->sinopsis;
		echo "<td>$sinopsis</td>";
		//datos pilas
		$paginas = $row->paginas;
		$tipo_pasta = $row->tipo_pasta;
		$size = $row->size;
		$precio_dolares = $row->precio_dolares;
		$categoria_general = $row->categoria_general;
		$categoria_especifica = $row->categoria_especifica;
		$articulos_relacionados = $row->articulos_relacionados;
		$en_promocion = $row->en_promocion;
		$porcentaje_promocion = $row->porcentaje_promocion;
		$articulo_promocion = $row->articulo_promocion;
		echo "<td><span id=\"informacion_gral\">P&aacute;ginas: </span>$paginas<br />";
		echo "<span id=\"informacion_gral\">Tipo de pasta: </span>$tipo_pasta<br />";
		echo "<span id=\"informacion_gral\">Tama&ntilde;o: </span>$size<br />";
		echo "<span id=\"informacion_gral\">precio (\$US): </span>".number_format($precio_dolares, 2)."<br />";
		include('pesos.php');
		echo "<span id=\"informacion_gral\">precio (\$CO): </span>".number_format($pesos, 2)."<br />";
		echo "<span id=\"informacion_gral\">categor&iacute;a general: </span>$categoria_general<br />";
		echo "<span id=\"informacion_gral\">Categor&iacute;a espec&iacute;fica: </span>$categoria_especifica<br />";
		echo "<span id=\"informacion_gral\">&iquest;Esta en promoci&oacute;n?: </span>$en_promocion<br />";
		echo "<span id=\"informacion_gral\">% de la promoci&oacute;n: </span>$porcentaje_promocion<br />";
		echo "<span id=\"informacion_gral\">Art&iacute;culo para adjuntar a la promoci&oacute;n: </span>$articulo_promocion";
		echo "</td>";
		//articulos relacionados
		echo "<td>$articulos_relacionados</td>";
		//accion
		echo "<td>";
		echo "<a href='ing_libro.php?id=$id";
		echo "&categoria_general=$categoria_general";		
		echo "&imagen=$imagen";
		echo "&titulo=$titulo";
		echo "&autor=$autor";
		echo "&editorial=$editorial";
		echo "&sinopsis=$sinopsis";
		echo "&paginas=$paginas";
		echo "&tipo_pasta=$tipo_pasta";
		echo "&size=$size";
		echo "&precio_dolares=$precio_dolares";
		echo "&categoria_especifica=$categoria_especifica";
		echo "&articulos_relacionados=$articulos_relacionados";
		echo "&en_promocion=$en_promocion";
		echo "&porcentaje_promocion=$porcentaje_promocion";
		echo "&articulo_promocion=$articulo_promocion";
		echo "'><img src=\"imagenes/editar.png\" border=\"0\" width=\15\" height=\"15\" align=\"absmiddle\">Editar</a><br />";
		echo "<a href='borrar.php?id=$id&tabla=$tabla&pagina=$pagina'><img src=\"imagenes/borrar.png\" border=\"0\" width=\15\" height=\"15\" align=\"absmiddle\">Eliminar</a></td>";
		echo "</tr>";
	  }
	  ?>
     </table>
     <?php include('paginacion.php') ?>
    </td>
    <td style="background:url(imagenes/linea_vertical_der.png) repeat-y">&nbsp;</td>
  </tr>
  <tr>
    <td><img src="imagenes/redondo_inf_izq.png" width="20" height="20" /></td>
    <td style="background:url(imagenes/linea_inferior.png) repeat-x">&nbsp;</td>
    <td><img src="imagenes/redondo_inf_der.png" width="20" height="20" /></td>
  </tr>
</table>
</body>
</html>
<?php
}
else
{
	include ('index.php');
}

function calcular_pesos($precio_dolares)
{
	include('pesos.php');
	return $pesos;
}
?>
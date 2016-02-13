<link href="red.css" rel="stylesheet" type="text/css" />
<div id="detalle">
<?php
ob_start( 'ob_gzhandler' );
$id = $_GET['id'];
$r = $_GET['r'];
if($r != 0 || $r == NULL) $r = 1;
if($_GET['op'] == NULL || $_GET['op'] != 2) include("administracion/funciones.php");
$conecta = conecta_bd("redlibr_redlibreria");
$consulta = consulta_bd("articulos", "*", "1;;;id='$id';");

$num_rows = mysql_num_rows($consulta);
	
if($num_rows == 0) echo 'No se ha definido ninguna pel&iacute;cula';
else
{
	while ($row = mysql_fetch_object($consulta))
   	{
		echo '<table width="100%" border="0" cellspacing="3" cellpadding="0">'."\n";
  		echo '<tr>'."\n";
		echo '<td rowspan="2" width="40%" valign="top">'."\n";
    	echo '<div id="img_res"><img src="imagenes_articulos/'.$row->imagen_caratula.'" width="160px" height="220px" align="center" ></div>'."\n";
	    echo '<div id="datos_res"><span id="informacion_gral">Tipo: </span>';
		if($row->tipo == 'L') echo 'Libro';
		elseif($row->tipo == 'CD') echo 'CD/DVD';
		else echo 'Miscel&aacute;nia';
		echo '<br /><span id="informacion_gral">T&iacute;tulo: </span>'.ucfirst($row->titulo)."\n";
		echo '<br /><span id="informacion_gral">Autor: </span>'.ucwords($row->autor)."\n";
		echo '<br /><span id="informacion_gral">Editorial: </span>'.ucwords($row->editorial)."\n";
		$en_promocion = $row->en_promocion;
		$precio_promocion = $row->precio_promocion;
		$articulo_promocion = $row->articulo_promocion;
		if($en_promocion == 'Si' and $precio_promocion != 0)
		{
			echo '<br /><span id="informacion_gral">Antes: </span><s>$ '.number_format($row->precio_oficial).'</s>';
			echo '<br /><span id="informacion_gral">Ahora: </span>$ '.number_format($precio_promocion);
		}
		else if($en_promocion == 'si' and $articulo_promocion != NULL)
		{
			echo '<br /><span id="informacion_gral">Precio (CO): </span>$ '.number_format($row->precio_oficial)."\n";
			echo '<br /><span id="informacion_gral">Art&iacute;culo en promoci&oacute;n: </span>'.ucfirst($articulo_promocion);
		}
		else echo '<br /><span id="informacion_gral">Precio (CO): </span>$ '.number_format($row->precio_oficial)."\n";
		echo '</div>'."\n";
		echo '</td>'."\n";
		echo '<td valign="top">'."\n";
		echo '<span id="informacion_gral">P&aacute;ginas: </span>'.ucfirst($paginas = $row->paginas);
		echo '<br /><span id="informacion_gral">Tipo caratula: </span>';
		if($row->tipo_caratula == "Rustica") $tipo_caratula = "Rustica";
		elseif($row->tipo_caratula == "ImitacionCuero") $tipo_caratula = "ImitacionCuero";
		else $tipo_caratula = $row->tipo_caratula;
		echo ucfirst($tipo_caratula);
		echo '<br /><span id="informacion_gral">Tama&ntilde;o: </span>';
		if($row->size == "Pequeno") $size = "Peque&ntilde;o";
		elseif($row->size == "EdicionBolsillo") $size = "Edici&oacute;n de bolsillo";
		else $size = $row->size;
		echo ucfirst($size);
		echo '<br /><span id="informacion_gral">Art&iacute;culos relacionados: </span>'.ucfirst($articulos_relacionados = $row->articulos_relacionados);
		echo '<br /><span id="informacion_gral">Categor&iacute;a: </span>';
		if($row->categoria_general == "Ninos") $categoria_general = "Ni&ntilde;os";
		elseif($row->categoria_general == "EstudioBiblico") $categoria_general = "Estudio biblico";
		elseif($row->categoria_general == "VidaCristiana") $categoria_general = "Vida cristiana";
		elseif($row->categoria_general == "Miscelania") $categoria_general = "Miscel&aacute;nea";
		else $size = $row->categoria_general;
		echo ucfirst($categoria_general);
		echo '<br /><span id="informacion_gral">Novedad: </span>';
		if($row->novedad == "Y") echo "Si";
		else echo "No";
		echo '<br /><br /><span id="informacion_gral">Rese&ntilde;a: </span><p>'.ucfirst($resena = $row->resena).'</p>';
		echo '</td>'."\n";
		echo '</tr>'."\n";
		echo '<tr>'."\n";
		echo '<td height="32">';
		if($r==1) $lugar = "#addcarrito";
		elseif($r==0 || $r==NULL) $lugar = "#mensaje_carrito";
		echo '<div id="addcarrito"></div>';
		echo '<a href="#" title="Agregar al carrito" onclick="'."recargar('carrito/agregacar','id=".$row->id."&r=".$r."','".$lugar."')".'">';
		echo '<img src="images/boton_addcarrito.png" width="41" height="41" border="0" align="right">';
		echo '</a>'."\n";
		echo '</td>'."\n";
		echo '</tr>'."\n";
		echo '</table>'."\n";
	}
}		
?>
</div>
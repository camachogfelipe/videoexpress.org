<link rel="stylesheet" href="scripts/thickbox.css" type="text/css" media="screen" />
<script type="text/javascript" src="scripts/thickbox.js"></script>
<script language="JavaScript">
<!--
function preCarga() {
if (!document.images) return;
var ar = new Array();
var argumentos = preload.argumentos;
for (var i = 0; i < argumentos.length; i++) {
ar[i] = new Image();
ar[i].src = argumentos[i];
}
}
window.onload=" preCarga( 'images/ant2.png', 'images/ant2.png', 'images/next2.png', 'images/next2.png' )" ;
-->
</script>
<script>
$(document).ready(function()  
{
	$('#form, #busqueda').submit(function() {
        $.ajax({
            type: 'GET',
            url: $(this).attr('action'),
            data: $(this).serialize(),
            success: function(data) {
                $('#contenido').html(data);

            }
        })
        
        return false;
    });
});
</script>
<div id="contenido_izq" class="catalogo">
	<div id="titulo_secciones" class="tit_catalogo">Nuestros Productos, <?php include("administracion/funciones.php"); total_articulos() ?></div>
    <div id="contenido_der" class="busqueda">
    	<form action="busqueda.php" method="get" name="busqueda" id="busqueda">
        	<input name="texto_busqueda" type="text" value="Busqueda" onFocus="javascript:this.value=''" size="50" maxlength="50">
            <input type="image" src="images/buscar-20.png" id="submit" name="submit" align="absmiddle" />
    	</form>
    </div>
    <div id="quienes">
<?php
ob_start( 'ob_gzhandler' );
$texto_busqueda = htmlspecialchars($_REQUEST['texto_busqueda']);

$registros_a_mostrar = 8;
if(isset($pag))
{
	$registro_a_empezar = ($pag - 1) * $registros_a_mostrar;
}
else
{
	$registro_a_empezar = 0;
	$pag = 1;
}

$conecta = conecta_bd("redlibr_redlibreria");
//se establece el formato de busqueda
$lugar_busqueda = "TITULO LIKE '%$texto_busqueda%' OR AUTOR LIKE '%$texto_busqueda%' OR EDITORIAL LIKE '%$texto_busqueda%' OR RESENA LIKE '%$texto_busqueda%'";
$total = dato_columna("articulos", "COUNT(*)", "1;titulo;ASC;$lugar_busqueda;");
$consulta = consulta_bd("articulos", "*", "5;titulo;ASC;$lugar_busqueda;$registro_a_empezar/$registros_a_mostrar");

$tp = ceil($total / 8);
$a = $pag - 1;
$s = $pag + 1;
$img_ant = '<img src="images/ant.png" width="61" height="80" border="0" name="botones1" />';
$img_sig = '<img src="images/next.png" width="61" height="80" border="0" name="botones2" />';
if($a < 1) $ant = $img_ant;
else $ant = "<a href=\"#\" onclick=\"recargar('busqueda','texto_busqueda=$texto_busqueda&pag=$a','#quienes')\" OnMouseOver =\"document.images['botones1'].src=' images/ant2.png '\" OnMouseOut =\"document.images['botones1'].src=' images/ant.png ' \" title=\"$a\">$img_ant</a>";
if($s > $tp) $sig = $img_sig;
else $sig = "<a href=\"#\" onclick=\"recargar('busqueda','texto_busqueda=$texto_busqueda&pag=$s','#quienes')\" OnMouseOver =\"document.images['botones2'].src=' images/next2.png '\" OnMouseOut =\"document.images['botones2'].src=' images/next.png ' \" title=\"$s\">$img_sig</a>";

$num_rows = mysql_num_rows($consulta);
echo '<div id="sidebar">';
	echo '<div id="links_secciones" style="background-color: #0071BC"><a href="#" onclick="'."recargar('mostrar_articulos','id=Novedad','#quienes')".'">Novedades</a></div>';
	echo '<div id="links_secciones" style="background-color: #2E3192"><a href="#" onclick="'."recargar('mostrar_articulos','id=Biblias','#quienes')".'">Biblias</a></div>';
	echo '<div id="links_secciones" style="background-color: #1B1464"><a href="#" onclick="'."recargar('mostrar_articulos','id=EstudioBiblico','#quienes')".'">Estudio biblico</a></div>';
	echo '<div id="links_secciones" style="background-color: #662D91"><a href="#" onclick="'."recargar('mostrar_articulos','id=Ninos','#quienes')".'">Ni&ntilde;os</a></div>';
	echo '<div id="links_secciones" style="background-color: #93278F"><a href="#" onclick="'."recargar('mostrar_articulos','id=Jovenes','#quienes')".'">J&oacute;venes</a></div>';
	echo '<div id="links_secciones" style="background-color: #9E005D"><a href="#" onclick="'."recargar('mostrar_articulos','id=Mujeres','#quienes')".'">Mujeres</a></div>';
	echo '<div id="links_secciones" style="background-color: #C1272D"><a href="#" onclick="'."recargar('mostrar_articulos','id=Hombres','#quienes')".'">Hombres</a></div>';
	echo '<div id="links_secciones" style="background-color: #D4145A"><a href="#" onclick="'."recargar('mostrar_articulos','id=Parejas','#quienes')".'">Parejas</a></div>';
	echo '<div id="links_secciones" style="background-color: #ED1C24"><a href="#" onclick="'."recargar('mostrar_articulos','id=Vida','#quienes')".'">Vida cristiana</a></div>';
	echo '<div id="links_secciones" style="background-color: #EF4326"><a href="#" onclick="'."recargar('mostrar_articulos','id=Familia','#quienes')".'">Familia</a></div>';
	echo '<div id="links_secciones" style="background-color: #F15A24"><a href="#" onclick="'."recargar('mostrar_articulos','id=Miscelania','#quienes')".'">Miscel&aacute;nea</a></div>';
	echo '<div id="links_secciones" style="background-color: #FBB03B"><a href="#" onclick="'."recargar('mostrar_articulos','id=Flet','#quienes')".'">Libros Flet</a></div>';	
	echo '<div id="mensaje_carrito"></div>';
	echo '</div>';

if($num_rows == 0) echo "No se encontraron resultados";
else
{
	echo '<div id="sidebar1">'.$ant.'</div>'."\n";
	echo '<div id="sidebar2">';
	echo mostrar_paginacion($pag, $tp, $id);
	echo '<table width="100%" border="0" cellspacing="3" cellpadding="0" align="center" id="cat_catalogo">'."\n";
	echo '<tr>'."\n";
	$i = 1;
	while ($row = mysql_fetch_object($consulta))
	{
		echo '<td valign="top" width="170">'."\n";
        echo '<div id="img_res" style="background-image: url(imagenes_articulos/'.$row->imagen_caratula.')">'."\n";
		echo '<a href="detalle.php?id='.$row->id.'&r=0" title="'.ucfirst($row->titulo).'" class="thickbox">';
		echo '<img id="btn1" src="images/boton_vercarrito.png" width="41" height="41" border="0" align="left" alt="Ver detalles"';
		echo'</a>'."\n";
		echo ' <a href="#" title="Agregar al carrito" onclick="'."recargar('carrito/agregacar','id=".$row->id."&r=0','#mensaje_carrito')".'">';
		echo '<img id="btn1" src="images/boton_addcarrito.png" width="41" height="41" border="0" align="right">';
		echo '</a>'."\n";
		echo '</div>'."\n";
		echo '<div id="datos_res"><span id="informacion_gral">Tipo: </span>';
		if($row->tipo == 'L') echo 'Libro';
		elseif($row->tipo == 'CD') echo 'CD/DVD';
		else echo 'Miscelania';
		echo '<br /><span id="informacion_gral">T&iacute;tulo: </span>'.ucfirst($row->titulo)."\n";
		echo '<br /><span id="informacion_gral">Autor: </span>'.ucwords($row->autor)."\n";
		echo '<br /><span id="informacion_gral">Editorial: </span>'.ucwords($row->editorial)."\n";
		echo '<br /><span id="informacion_gral">Precio (CO): </span>$ '.number_format($row->precio_oficial)."\n";
		echo '</div>'."\n".'</td>'."\n";
		$i++;
		if($i == 5)
		{
			echo '</tr>'."\n".'<tr>';
			$i = 0;
		}
	}
	echo '</tr>'."\n".'</table>';
	echo '</div>';
	echo '<div id="sidebar3">'.$sig.'</div>'."\n";
}
?>
	</div>
</div>
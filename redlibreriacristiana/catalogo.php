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
    	<table width="100%" border="0" cellspacing="10" cellpadding="2" align="center" id="cat_catalogo">
		  <tr>
		    <td width="20%" height="120" align="center"><a href="#" onclick="recargar('mostrar_articulos','id=Novedad','#quienes')"><img src="images/01novedades.png" width="180" height="120" border="0" /></a></td>
		    <td width="20%" align="center"><a href="#" onclick="recargar('mostrar_articulos','id=Biblias','#quienes')"><img src="images/02biblias.png" width="180" height="120" border="0" /></a></td>
		    <td width="20%" align="center"><a href="#" onclick="recargar('mostrar_articulos','id=EstudioBiblico','#quienes')"><img src="images/03estudio.png" width="180" height="124" border="0" /></a></td>
	   		<td width="20%" align="center"><a href="#" onclick="recargar('mostrar_articulos','id=Ninos','#quienes')"><img src="images/04ninos.png" width="180" height="120" border="0" /></a></td>
	    	<td width="20%" align="center"><a href="#" onclick="recargar('mostrar_articulos','id=Jovenes','#quienes')"><img src="images/05jovenes.png" width="181" height="120" border="0" /></a></td>
		  </tr>
		  <tr>
    		<td height="120" align="center"><a href="#" onclick="recargar('mostrar_articulos','id=Mujeres','#quienes')"><img src="images/06mujeres.png" width="180" height="120" border="0" /></a></td>
	    	<td align="center"><a href="#" onclick="recargar('mostrar_articulos','id=Hombres','#quienes')"><img src="images/07hombres.png" width="180" height="121" border="0" /></a></td>
	    	<td align="center"><a href="#" onclick="recargar('mostrar_articulos','id=Parejas','#quienes')"><img src="images/08parejas.png" width="180" height="121" border="0" /></a></td>
		    <td align="center"><a href="#" onclick="recargar('mostrar_articulos','id=VidaCristiana','#quienes')"><img src="images/09vidacristiana.png" width="180" height="120" border="0" /></a></td>
            <td align="center"><a href="#" onclick="recargar('mostrar_articulos','id=Familia','#quienes')"><img src="images/11familia.png" width="180" height="121" border="0" /></a></td>
          </tr>
          <tr>
         	<td align="center"><a href="#" onclick="recargar('mostrar_articulos','id=Miscelania','#quienes')"><img src="images/10miscelanea.png" width="180" height="121" border="0" /></a></td> 
          	<td>&nbsp;</td>
            	<td>&nbsp;</td>
            	<td>&nbsp;</td>
            	<td align="center"><a href="#" onclick="recargar('mostrar_articulos','id=Flet','#quienes')"><img src="images/12librosflet.png" width="180" height="121" border="0" /></a></td> 
		  </tr>
		</table>
    </div>
</div>
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
<?php
if(!isset($index) and $index == false) ob_start( 'ob_gzhandler' );
$id_notired = $_GET['id_notired'];
if($_GET['op'] == NULL || $op != 1) require_once("administracion/funciones.php");
?>
<div id="contenido_izq" class="catalogo">
	<div id="titulo_secciones" class="tit_catalogo">NotiRED</div>
    <div id="contenido_der" class="busqueda">
    	<form action="busqueda.php" method="get" name="busqueda" id="busqueda">
        	<input name="texto_busqueda" type="text" value="Busqueda" onFocus="javascript:this.value=''" size="50" maxlength="50">
            <input type="image" src="images/buscar-20.png" id="submit" name="submit" align="absmiddle" />
    	</form>
    </div>
    <div id="quienes" class="notired2">
    	<div id="contenido_notired"><?php notired2($id_notired) ?></div>
        <div id="menu_notired"><?php menu_notired() ?></div>
	</div>
</div>
<?php
session_start();
error_reporting(E_ALL);
@ini_set('display_errors', '1');
?>
<style type="text/css">
<!--
.tit {
   font-family: Verdana, Arial, Helvetica, sans-serif;
   font-size: 14px;
   color: #FFFFFF;
}
.prod {
   font-family: Verdana, Arial, Helvetica, sans-serif;
   font-size: 14px;
   color: #000;
}
-->
</style>
<link href="red.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="scripts/jquery-1.5.1.js"></script>
<script>
$(document).ready(function()  
{
	$('#act, #busqueda').submit(function() {
        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: $(this).serialize(),
            success: function(data) {
                $('#contenido').html(data);

            }
        })
        
        return false;
    });
});
function carrito()
{
	$("#precio_carrito").html("$ <?php echo number_format($_SESSION['total']) ?>");
}
carrito();
</script>
<div id="contenido_izq" class="catalogo">
	<div id="titulo_secciones" class="tit_catalogo">Carrito de compras</div>
    <div id="contenido_der" class="busqueda">
    	<form action="busqueda.php" method="get" name="busqueda" id="busqueda">
        	<input name="texto_busqueda" type="text" value="Busqueda" onFocus="javascript:this.value=''" size="50" maxlength="50">
            <input type="image" src="images/buscar-20.png" id="submit" name="submit" align="absmiddle" />
    	</form>
    </div>
    <div id="quienes">
<div id="vercarrito" style="color:#FFF">
<?php
if(isset($_SESSION['carro']))
$carro=$_SESSION['carro'];else $carro=false;
if($carro){
	$cantidad = 0;
	foreach($carro as $k => $v) $cantidad += $v['cantidad'];
?>
<div id="titulo_secciones" class="tit_catalogo">
	<table width="60%" border="0" cellspacing="5" cellpadding="0" align="right">
	  <tr>
    	<td rowspan="2"><img src="images/boton_carrito2.png" width="41" height="41" /></td>
	    <td align="center"><span id="carrito" class="texto">Total</span></td>
    	<td align="center"><span id="carrito" class="texto">Productos</span></td>
	  </tr>
	  <tr bgcolor="#FFF">
	    <td width="50%" align="center"><span id="carrito" class="texto2">$ <?php echo number_format($_SESSION['total']) ?></span></td>
    	<td width="40%" align="center"><span id="carrito" class="texto2"><?php echo $cantidad ?></span></td>
	  </tr>
	</table>
</div>
<div class="detalle">Detalle del carrito</div>
<div id="carrito">
<table width="990" border="0" cellspacing="1" cellpadding="5" align="center">
  <tr bgcolor="#C1272D" class="tit" style="font-weight:bold">
    <td width="235" rowspan="2">Producto</td>
    <td rowspan="2" width="117" align="center">Precio unitario CO$</td>
    <td colspan="2" rowspan="2" align="center">Cantidad de Unidades</td>
    <td colspan="2" align="center">IVA</td>
    <td rowspan="2" width="132" align="center">Precio CO$</td>
    <td rowspan="2" width="51" align="center">Borrar</td>
  </tr>
  <tr class="tit" bgcolor="#C1272D" style="font-weight:bold">
   <td width="29" align="center">%</td>
   <td width="108" align="center">VALOR</td>
  </tr>
  <?php
  $color=array("#ffffff","#F0F0F0");
  $contador=0;
  $suma=$suma2=$cantidad=0;
  $to_sin_iva = $to_cantidad = $to_con_iva = $to_iva = $tmp = 0;
  include('../administracion/funciones.php');
  conecta_bd("redlibr_redlibreria");
  foreach($carro as $k => $v){
  $subto=$v['cantidad']*$v['precio_oficial'];
  $precio_oficial = $subto;
  $suma=$suma+$subto;
  $cantidad += $v['cantidad'];
  $contador++;
  //sacamos los valores sin iva
  $sin_iva = $v['precio_oficial']*0.16;
  $sin_iva2 = $v['precio_oficial'] - $sin_iva;
  $sin_iva = $v['cantidad'] * $sin_iva;
  $to_iva += $sin_iva;
  $tmp = $sin_iva2 * $v['cantidad'];
  $to_sin_iva += $tmp;
  if($suma == NULL) $_SESSION['total'] = 0;
  else $_SESSION['total'] = $suma;
  //sacamos los totales con iva
  ?>
    <tr bgcolor="<?php echo $color[$contador%2]; ?>" class='prod'>
      <td><?php echo ucfirst($v['titulo']) ?></td>
      <td align="center"><?php echo number_format($sin_iva2) ?></td>
      <td width="63" align="center"><?php echo $v['cantidad'] ?></td>
      <td width="72" align="center">
        <a href="#" onclick="recargar('carrito/agregacar','sid=<?php echo SID ?>&id=<?php echo $v['id'] ?>&pagina=vercarrito&cantidad=<?php echo $c = $v['cantidad']+1 ?>&recargar=1', '#contenido')"><img src="images/Imagenes de edicion/mas.png" width="20" height="20" border="0"></a>
        <?php if($v['cantidad']==1) {?><a href="#" onclick="recargar('carrito/borracar', 'sid=<?php echo SID ?>&id=<?php echo $v['id'] ?>', '#contenido')"><img src="images/Imagenes de edicion/menos.png" width="20" height="20" border="0"></a><?php }else { ?>
        <a href="#" onclick="recargar('carrito/agregacar','sid=<?php echo SID ?>&id=<?php echo $v['id'] ?>&pagina=vercarrito&cantidad=<?php echo $c = $v['cantidad']-1 ?>&recargar=1', '#contenido')"><img src="images/Imagenes de edicion/menos.png" width="20" height="20" border="0"></a><?php } ?>
      </td>
      <td width="29" align="center">16</td>
      <td align="center"><?php echo number_format($sin_iva) ?></td>
      <td align="center"><?php echo number_format($precio_oficial); ?></td>
      <td align="center"><a href="#" onclick="recargar('carrito/borracar', 'sid=<?php echo SID ?>&id=<?php echo $v['id'] ?>', '#contenido')"><img src="images/Imagenes de edicion/trash.png" width="12" height="14" border="0"></a></td>
  </tr>
  <?php }?>
  <tr bgcolor="#C1272D" class='tit' style="font-weight:bold">
   <td>Total</td>
   <td align="center"><?php echo number_format($to_sin_iva) ?></td>
   <td align="center"><?php echo $cantidad ?></td>
   <td>&nbsp;</td>
   <td colspan="2" align="center"><?php echo number_format($to_iva) ?></td>
   <td align="center"><?php echo number_format($suma) ?></td>
   <td>&nbsp;</td>
  </tr>
</table>
<div id="titulo_secciones" class="funciones_carrito">
	<div id="funciones_carrito">
    	<a href="#anular_carrito" onclick="recargar('catalogo','','#contenido')">
			<div id="img_carrito"><img src="images/boton_volverprodu.png" width="41" height="41" /></div>
			<div id="texto_carrito">Volver a productos</div>
		</a>
    </div>
    <div id="funciones_carrito">
    	<a href="#anular_carrito" onclick="recargar('carrito/anular','','#vercarrito')">
	    	<div id="img_carrito"><img src="images/boton_cancelarpedi.png" width="41" height="41" /></div>
		    <div id="texto_carrito">Cancelar el pedido</div>
        </a>
    </div>
    <div id="funciones_carrito">
    	<a href="#anular_carrito" onclick="recargar('carrito/confirmar_datos_carrito','','#vercarrito')">
	    	<div id="img_carrito"><img src="images/boton_continuarpedi.png" width="41" height="41" /></div>
		    <div id="texto_carrito">Confirmar el pedido</div>
		</a>
    </div>
</div>
<?php }else{ ?>
<p align="center" id="carrito" class="texto2">No tiene ning&uacute;n &aacute;rticulo en el carrito</p>
<?php } ?>
<script type="text/javascript">
carrito();
</script>
</div>
</div>
</div>
</div>
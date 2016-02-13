<?php
session_start();
error_reporting(E_ALL);
@ini_set('display_errors', '1');
if(isset($_SESSION['carro']))
$carro=$_SESSION['carro'];else $carro=false;
?>
<html>
<head>
<title>PRODUCTOS AGREGADOS AL CARRITO</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
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
<link href="../libroexpress.css" rel="stylesheet" type="text/css">
</head>

<body style="color:#FFF; margin-top: 20px; background:url(../imagenes/Imagenes%20de%20edicion/alpha2.png)">
<?php
if($carro){
?>
<table width="95%" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr bgcolor="#333333" class="tit">
    <td rowspan="2">Producto</td>
    <td rowspan="2" width="86">Precio unitario US$</td>
    <td colspan="2" rowspan="2" align="center">Cantidad de Unidades</td>
    <td colspan="2" align="center">IVA</td>
    <td rowspan="2" width="84">Precio US$</td>
    <td rowspan="2" width="84">Precio CO$</td>
    <td rowspan="2" width="52" align="center">Borrar</td>
    <td rowspan="2" width="74" align="center">Actualizar</td>
  </tr>
  <tr class="tit">
   <td width="39" bgcolor="#333333">%</td>
   <td bgcolor="#333333">VALOR</td>
  </tr>
  <?php
  $color=array("#ffffff","#F0F0F0");
  $contador=0;
  $suma=$suma2=$cantidad=0;
  $to_sin_iva = $to_cantidad = $to_con_iva = $to_iva = $tmp = 0;
  include('../administracion/conexion.php');
  conecta_bd("libroexpress");
  foreach($carro as $k => $v){
  $subto=$v['cantidad']*$v['precio_dolares'];
  $precio_dolares = $subto;
  include('../administracion/pesos.php');
  $suma=$suma+$subto;
  $cantidad += $v['cantidad'];
  $suma2 = $suma2 + $pesos;
  $contador++;
  //sacamos los valores sin iva
  $sin_iva = $v['precio_dolares']*0.16;
  $sin_iva2 = $v['precio_dolares'] - $sin_iva;
  $sin_iva = $v['cantidad'] * $sin_iva;
  $to_iva += $sin_iva;
  $tmp = $sin_iva2 * $v['cantidad'];
  $to_sin_iva += $tmp;
  //sacamos los totales con iva
  ?>
  <form name="a<?php echo $v['identificador'] ?>" method="post" action="agregacar.php?<?php echo SID ?>&pagina=vercarrito" id="a<?php echo $v['identificador'] ?>">
    <tr bgcolor="<?php echo $color[$contador%2]; ?>" class='prod'>
      <td><?php echo $v['titulo'] ?></td>
      <td><?php echo number_format($sin_iva2,2) ?></td>
      <td width="75" align="center"><?php echo $v['cantidad'] ?></td>
      <td width="83" align="center">
        <input name="cantidad" type="text" id="cantidad" value="<?php echo $v['cantidad'] ?>" size="8">
        <input name="id" type="hidden" id="id" value="<?php echo $v['id'] ?>"> </td>
      <td width="41">16</td>
      <td><?php echo number_format($sin_iva,2) ?></td>
      <td><?php echo $precio_dolares ?></td>
      <td><?php echo number_format($pesos); ?></td>
      <td align="center"><a href="borracar.php?<?php echo SID ?>&id=<?php echo $v['id'] ?>"><img src="../imagenes/Imagenes de edicion/trash.png" width="12" height="14" border="0"></a></td>
      <td align="center">
        <input name="imageField" type="image" src="../imagenes/Imagenes de edicion/actualizar.png" width="20" height="20" border="0"></td>
  </tr></form>
  <?php }?>
  <tr bgcolor="#333333" class='tit'>
   <td>Total</td>
   <td><?php echo number_format($to_sin_iva,2) ?></td>
   <td align="center"><?php echo $cantidad ?></td>
   <td>&nbsp;</td>
   <td colspan="2" align="center"><?php echo number_format($to_iva,2) ?></td>
   <td><?php echo number_format($suma,2) ?></td>
   <td><?php echo number_format($suma2) ?></td>
   <td>&nbsp;</td>
   <td>&nbsp;</td>
  </tr>
</table>
<br>
<div align="center"><a href="vercarrito.php">Actualizar el carrito <img src="../imagenes/Imagenes de edicion/actualizar.png" width="20" height="20" border="0" align="absmiddle"></a></div>

<?php }else{ ?>
<p align="center"><a href="vercarrito.php">Actualizar el carrito <img src="../imagenes/Imagenes de edicion/actualizar.png" width="20" height="20" border="0" align="absmiddle"></a>
<?php }?></p>
<br>
<img src="../imagenes/Imagenes de edicion/informacion.png" width="25" height="25" align="absmiddle"><span id="informacion_gral">Nota:</span>El valor del IVA solo se aplica para Colombia
</body>
</html>

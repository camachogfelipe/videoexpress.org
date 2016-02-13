<?php 
ob_start("ob_gzhandler");
//error_reporting(E_ALL);
//@ini_set('display_errors', '1');
//Las funciones ob_start y ob_end_flush te permiten escojer en qué momento enviar el resultado
// de un script al navegador. Si no las utilizamos estamos
//obligados a que nuestra primera línea de código sea session_start() u obtendremos un error
session_start();
//conectamos a la base de datos
include('../../include/funciones_globales.php');
$conecta = conecta_bd("videoexpress");
//rescatamos los valores guardados en la variable de sesión (si es que hay alguno, cosa que
//comprobamos con isset) y los asignamos a $carro. Si no existen valores, ponemos a false el
//valor de $carro
if(isset($_SESSION['carro_admin_mod']))
$carro=$_SESSION['carro_admin_mod'];else $carro=false;
//y hacemos la consulta
$qry = consulta_bd("catalogo","*","2;titulo;asc;;");
$alquiler = $_SESSION['alquiler_admin'];
?>
<html>
<head>
<title>Cat&aacute;logo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.catalogo {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 14px;
	color: #333333;
}
-->
</style>
<link href="../../estilo.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="../subcarro/jquery.chromatable-1.3.0/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="../subcarro/jquery.chromatable-1.3.0/jquery-ui-1.7.2.custom.min.js"></script>
<script type="text/javascript" src="../subcarro/jquery.chromatable-1.3.0/jquery.chromatable.js"></script>


<script>

	$(document).ready(function(){
	
		$("#tabla_catalogo").chromatable({
		
				height: "420px",
				scrolling: "yes",
			});	
			
		
	});
	
</script>
</head>
<body>
<center>
<table id="tabla_catalogo" width="95%" align="center" cellpadding="0" cellspacing="0" style="border: 1px solid #000000;">
  <thead>
  <tr align="center" valign="middle" bordercolor="#FFFFFF" bgcolor="#DFDFDF" class="catalogo"> 
    <th rowspan="2" style="border-right:1px solid #000"><strong>Producto</strong></th>
    <th width="80" rowspan="2" style="border-right:1px solid #000"><strong>Alquiler</strong></th>
    <th width="90" rowspan="2" style="border-right:1px solid #000"><strong>Precio de compra</strong></th>
    <th colspan="4" align="left"><span id="menu_admon2"><a href="ver_carritomod.php" title="Ver el contenido del carrito"><img src="../subcarro/vercarrito.png" width="25" height="26" border="0"> Ver el carrito</a></span></th>
  </tr>
  <tr valign="middle" bordercolor="#FFFFFF" bgcolor="#DFDFDF" class="catalogo">
    <th width="76"><strong>Alquilar</strong></th>
    <th width="71"><strong>Comprar</strong></th>
    <th width="98"><strong>Rese&ntilde;a</strong></th>
    <th width="98"><strong>Cortes&iacute;a</strong></th>
  </tr>
  </thead>
  <tbody>
  <?php
  //mostramos todos nuestros artículos, viendo si han sido agregados o no a nuestro carro de compra
  while($row=mysql_fetch_assoc($qry)){
  ?>
   <tr valign="middle" class="catalogo">
    <td style="border-right:1px solid #000; border-bottom:1px solid #000" align="center"><?php echo $row['titulo'] ?></td>
    <td style="border-right:1px solid #000; border-bottom:1px solid #000">$ <?php echo number_format($alquiler) ?></td>
    <td style="border-right:1px solid #000; border-bottom:1px solid #000">$ <?php echo number_format($row['precio_compra']) ?></td>
    <td style="border-right:1px solid #000; border-bottom:1px solid #000" align="center"><?php $id = $row['id'];
	if ($carro[$row['id']]['tipo_pedido'] == 'alquiler') echo "<img src=\"../../Imagenes_pagina/verificado_pos.png\" width=\"15\" height=\"15\" border=\"0\">";
	   else echo "<a href=\"agregacarmod.php?SID&id=$id&tipo_pedido=alquiler\"><img src=\"../../Imagenes_pagina/no_verificado_pos.png\" width=\"15\" height=\"15\" border=\"0\"></a>";
	?></td>
    <td style="border-right:1px solid #000; border-bottom:1px solid #000" align="center"><?php
	if ($carro[$row['id']]['tipo_pedido'] == 'compra') echo "<img src=\"../../Imagenes_pagina/verificado_pos.png\" width=\"15\" height=\"15\" border=\"0\">";
	elseif ($row['precio_compra'] > 0) echo "<a href=\"agregacarmod.php?SID&id=$id&tipo_pedido=compra\"><img src=\"../../Imagenes_pagina/no_verificado_pos.png\" width=\"15\" height=\"15\" border=\"0\"></a>";
	else echo "<img src=\"../../Imagenes_pagina/no_verificado_pos.png\" width=\"15\" height=\"15\" border=\"0\">"; ?></td>
    <td style="border-right:1px solid #000; border-bottom:1px solid #000" align="center"><?php
	if ($carro[$row['id']]['tipo_pedido'] == 'resena') echo "<img src=\"../../Imagenes_pagina/verificado_pos.png\" width=\"15\" height=\"15\" border=\"0\">";
	   else echo "<a href=\"agregacarmod.php?SID&id=$id&tipo_pedido=resena\"><img src=\"../../Imagenes_pagina/no_verificado_pos.png\" width=\"15\" height=\"15\" border=\"0\"></a>"; ?></td>
    <td style="border-right:1px solid #000; border-bottom:1px solid #000" align="center"><?php
	if ($carro[$row['id']]['tipo_pedido'] == 'cortesia') echo "<img src=\"../../Imagenes_pagina/verificado_pos.png\" width=\"15\" height=\"15\" border=\"0\">";
	   else echo "<a href=\"agregacarmod.php?SID&id=$id&tipo_pedido=cortesia\"><img src=\"../../Imagenes_pagina/no_verificado_pos.png\" width=\"15\" height=\"15\" border=\"0\"></a>"; ?></td>
  </tr><?php } ?>
  </tbody>
</table>
</center>
</body>
</html>
<?php 
ob_end_flush();
?>
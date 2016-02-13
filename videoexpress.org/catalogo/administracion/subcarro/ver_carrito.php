<?php 
session_start();
error_reporting(E_ALL);
@ini_set('display_errors', '1');
if(isset($_SESSION['carro_admin'])) $carro=$_SESSION['carro_admin'];else $carro=false;
?>
<html>
<head>
<title>PRODUCTOS AGREGADOS AL CARRITO</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../../estilo.css" rel="stylesheet" type="text/css">
</head>

<body style="color:#000">
<div id='titulo_informacion'><img src="../../Imagenes_pagina/titulos/carrito.png" width="69" height="20"></div><br />
<?php 
if($carro)
{
?>
	<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
  	  <tr style="background: url(Imagenes_pagina/titulos/fondo.png); color: #000">
    	<td width="43">&nbsp;</td>
    	<td width="306">Producto</td>
	    <td width="79" align="center">alquiler</td>
    	<td width="67" align="center">Compra</td>
	    <td width="66" align="center">rese&ntilde;a</td>
    	<td width="66" align="center">Cortes&iacute;a</td>
	    <td colspan="2" align="center">Unidades</td>
    	<td width="50" align="center">Borrar</td>
	    <td width="156" align="center">Sub total</td>
	  </tr>
  	<?php
  	$contador=0;
  	$suma=0;
	$subto_compra = $subto_cortesia = $subto_alquiler = $suma = $ta = $tc = $tr = $valor_alquiler = 0;
  	$valor_alquiler = $_SESSION['alquiler_admin'];
  	foreach($carro as $k => $v)
  	{
		if ($v['tipo_pedido'] == 'alquiler') $ta += 1;
	}
	foreach($carro as $k => $v)
  	{
		$id = $v['id'];
	   	if ($v['tipo_pedido'] == 'compra'){ $subto = $v['cantidad'] * $v['precio_compra']; $subto_compra += $subto; $tc += 1; }
	   	if ($v['tipo_pedido'] == 'alquiler') { $subto_alquiler += "$valor_alquiler"; }
	   	if ($ta == 3)
        {
        	$subto_alquiler = 20000;
			$valor_alquiler = $subto_alquiler/3;
        }
	   	if ($ta == 4)
        {
			$subto_alquiler = 24000;
			$valor_alquiler = $subto_alquiler/4;
		}
	   	if ($v['tipo_pedido'] == 'cortesia') $subto_cortesia = 0;
	   	if ($v['tipo_pedido'] == 'resena') { $tr += 1; }
    	$suma=$subto_alquiler+$subto_compra;
    	$contador++;
    	?>
  		<form name="a<?php echo $v['identificador'] ?>" method="post" action="agregacar.php?<?php echo SID ?>&id=<?php $id ?>&tipo_pedido=compra" id="a<?php echo $v['identificador'] ?>">
    	<tr bgcolor="#FFFFFF" class='prod'>
      	  <td height="27" align="center" valign="middle" id="base_no"><?php echo $contador; ?></td> 
      	  <td><?php echo $v['producto'] ?></td>
      	  <td align="center">
	  	  <?php
	   	  if ($v['tipo_pedido'] == 'alquiler') echo "<img src=\"../../Imagenes_pagina/verificado_pos.png\" width=\"15\" height=\"15\" border=\"0\">";
	   	  else echo "<a href=\"agregacar.php?SID&id=$id&tipo_pedido=alquiler\"><img src=\"../../Imagenes_pagina/no_verificado_pos.png\" width=\"15\" height=\"15\" border=\"0\"></a>";
	  	  ?>
      	  </td>
      	  <td align="center">
		  <?php
          if ($v['tipo_pedido'] == 'compra') echo "<img src=\"../../Imagenes_pagina/verificado_pos.png\" width=\"15\" height=\"15\" border=\"0\">";
	  	  else echo "<a href=\"agregacar.php?SID&id=$id&tipo_pedido=compra\"><img src=\"../../Imagenes_pagina/no_verificado_pos.png\" width=\"15\" height=\"15\" border=\"0\"></a>"; ?></td>
      	  <td align="center">
		  <?php
		  if ($v['tipo_pedido'] == 'resena') echo "<img src=\"../../Imagenes_pagina/verificado_pos.png\" width=\"15\" height=\"15\" border=\"0\">";
		  else echo "<a href=\"agregacar.php?SID&id=$id&tipo_pedido=resena\"><img src=\"../../Imagenes_pagina/no_verificado_pos.png\" width=\"15\" height=\"15\" border=\"0\"></a>"; ?></td>
      	  <td align="center"><?php if ($v['tipo_pedido'] == 'cortesia') echo "<img src=\"../../Imagenes_pagina/verificado_pos.png\" width=\"15\" height=\"15\" border=\"0\">";
	  	  else echo "<a href=\"agregacar.php?SID&id=$id&tipo_pedido=cortesia\"><img src=\"../../Imagenes_pagina/no_verificado_pos.png\" width=\"15\" height=\"15\" border=\"0\"></a>"; ?></td>
      	  <td width="62" align="center"><?php echo $v['cantidad'] ?></td>
      	  <td width="150" align="center">
       	  <?php
		  if ($v['tipo_pedido'] == 'compra')
		  {
		  ?>
        	  <input name="cantidad" type="text" id="cantidad" value="<?php echo $v['cantidad'] ?>" size="8">
       	  <?php
		  }
		  ?>
       	  <?php
		  if ($v['tipo_pedido'] == 'compra')
		  {
			  
		  ?>
        	  <a href="javascript:document.a<?php echo $v['identificador'] ?>.submit()"><img src="../../Imagenes_pagina/refrescar1.png" border="0"></a>
       	  <?php
		  }
		  ?>
          <input name="id" type="hidden" id="id" value="<?php echo $v['id'] ?>">
      	  </td>
      	  <td width="34" align="center"><a href="borracar.php?<?php echo SID ?>&id=<?php echo $v['id'] ?>&tipo_pedido=<?php echo $v['tipo_pedido'] ?>"><img src="../../Imagenes_pagina/caneca.png" width="15" height="15" border="0"></a></td>
      	  <td align="right">$ 
		  <?php
		  if ($v['tipo_pedido'] == 'alquiler') echo number_format($valor_alquiler, 2);
	  	  elseif ($v['tipo_pedido'] == 'resena') echo number_format('0');
		  elseif ($v['tipo_pedido'] == 'cortesia') echo number_format('0');
	  	  else echo number_format($subto,2);
		  ?>
      	  </td>
  		  </tr></form>
	<?php
	}
	if ($ta == 4)
	{
	?>
  		<tr bgcolor="#FFFFFF" class='prod'>
      	  <td height="27" align="center" valign="middle" id="base_no"><?php echo $contador+1; ?></td> 
      	  <td>PopCorn para microondas</td>
      	  <td align="center"><img src="../../Imagenes_pagina/no_verificado_pos.png" width="15" height="15" border="0"></td>
      	  <td align="center"><img src="../../Imagenes_pagina/no_verificado_pos.png" width="15" height="15" border="0"></td>
      	  <td align="center"><img src="../../Imagenes_pagina/no_verificado_pos.png" width="15" height="15" border="0"></td>
      	  <td align="center"><img src="../../Imagenes_pagina/verificado_pos.png" width="15" height="15" border="0"></td>
      	  <td width="62" align="center">1</td>
      	  <td width="150" align="center">&nbsp;</td>
      	  <td width="34" align="center"><img src="../../Imagenes_pagina/caneca.png" width="15" height="15" border="0"></td>
      	  <td align="right">$ 0</td>
  		</tr>
	<?php
	}
	?>
  	<tr>
      <td valign="middle">&nbsp;</td>
      <td valign="middle">&nbsp;</td>
      <td valign="middle">&nbsp;</td>
      <td valign="middle">&nbsp;</td>
      <td valign="middle">&nbsp;</td>
      <td valign="middle">&nbsp;</td>
      <td valign="middle">&nbsp;</td>
      <td valign="middle">&nbsp;</td>
      <td valign="middle" align="center" style="background:url(Imagenes_pagina/titulos/fondo.png); color: #000">Total</td>
      <td valign="middle" align="right" style="background:url(Imagenes_pagina/titulos/fondo.png); padding-right: 5px; color: #000">$&nbsp;<?php echo number_format($suma,2); ?></td>
  	</tr>
	</table><br />
	<table width="800" border="0" cellspacing="0" cellpadding="0" align="center">
  	  <tr>
    	<td width="50%" align="right" style="padding-right: 10px"><a href="anular.php"><img src="../../Imagenes_pagina/cancelar_pedido.png" width="100" height="25" border="0" /></a></td>
    	<td width="50%" align="left" style="padding-left: 10px"><a href="confirmar_pedido.php"><img src="../../Imagenes_pagina/continuar_pedido.png" width="100" height="26" border="0" /></a></td>
  	  </tr>
	</table>
	<p><div align="center">Total de Artículos en el carro: <?php echo count($carro); ?></div></p>
	<p><div align="center">Total de Artículos en compra: <?php echo $tc; ?> por un valor de: $<?php echo number_format($subto_compra,2); ?></div>
	<div align="center">Total de Artículos en alquiler: <?php echo $ta; ?> por un valor de: $<?php echo number_format($subto_alquiler,2); ?></div>
	<div align="center">Total de reseñas en el carrito: <?php echo $tr; ?></div></p>
	<?php
}
else
{
?>
	<p align="center"> No hay productos seleccionados 
<?php
}
?>
</p>
</body>
</html>

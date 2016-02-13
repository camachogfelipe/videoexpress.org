<?php 
session_start();
error_reporting(E_ALL);
//@ini_set('display_errors', '1');
if(isset($_SESSION['carro'])) $carro=$_SESSION['carro'];else $carro=false;

$continuar_act = '<a href="confirmar_pedido.php"><img src="../Imagenes_pagina/continuar_pedido.png" width="100" height="26" border="0" /></a>';
$continuar_inact = "<img onclick=\"alert('Apreciado usuario, recuerde que el pedido m&iacute;nimo de pel&iacute;culas que se deben alquilar es de dos (2), por favor ingrese a nuestro variado cat&aacute;logo y selecione otra(s) pel&iacute;cula(s) de su inter&eacute;s para agregarla al carrito.');\" src=\"../Imagenes_pagina/continuar_pedido.png\" width=\"100\" height=\"26\" border=\"0\" style=\"cursor:pointer\">";
?>
<html>
<head>
<title>PRODUCTOS AGREGADOS AL CARRITO</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../estilo.css" rel="stylesheet" type="text/css">
<script type="text/javascript">
/************************************

	Custom Alert Demonstration
	version 1.0
	last revision: 02.02.2005
	steve@slayeroffice.com

	Should you improve upon this source please
	let me know so that I can update the version
	hosted at slayeroffice.

	Please leave this notice in tact!

************************************/

var ALERT_TITLE = "Mensaje de aviso de VideoExpress.org";
var ALERT_BUTTON_TEXT = "Ok";

if(document.getElementById) {
	window.alert = function(txt) {
		createCustomAlert(txt);
	}
}

function createCustomAlert(txt) {
	d = document;

	if(d.getElementById("modalContainer")) return;

	mObj = d.getElementsByTagName("body")[0].appendChild(d.createElement("div"));
	mObj.id = "modalContainer";
	mObj.style.height = d.documentElement.scrollHeight + "px";
	mObj.style.color = "#000";
	
	alertObj = mObj.appendChild(d.createElement("div"));
	alertObj.id = "alertBox";
	if(d.all && !window.opera) alertObj.style.top = document.documentElement.scrollTop + "px";
	alertObj.style.left = (d.documentElement.scrollWidth - alertObj.offsetWidth)/2 + "px";
	alertObj.style.visiblity="visible";

	h1 = alertObj.appendChild(d.createElement("h1"));
	h1.appendChild(d.createTextNode(ALERT_TITLE));

	msg = alertObj.appendChild(d.createElement("p"));
	//msg.appendChild(d.createTextNode(txt));
	msg.innerHTML = txt;

	btn = alertObj.appendChild(d.createElement("a"));
	btn.id = "closeBtn";
	btn.appendChild(d.createTextNode(ALERT_BUTTON_TEXT));
	btn.href = "#";
	btn.focus();
	btn.onclick = function() { removeCustomAlert();return false; }

	alertObj.style.display = "block";
	
}

function removeCustomAlert() {
	document.getElementsByTagName("body")[0].removeChild(document.getElementById("modalContainer"));
}
</script>
</head>

<body style="background:url(../Imagenes_pagina/fondo_alfa.png)">
<div id='titulo_informacion'><img src="../Imagenes_pagina/titulos/carrito.png" width="69" height="20"></div><br />
<?php 
include("../include/funciones_globales.php");
$conecta = conecta_bd("videoexpress");
$valor_alquiler = $_SESSION['alquiler'];

if($carro)
{
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr style="background: url(../Imagenes_pagina/titulos/fondo.png); color: #000">
    <td width="46">&nbsp;</td>
    <td width="340">Producto</td>
    <td width="68" align="center">alquiler</td>
    <td width="68" align="center">Compra</td>
    <td width="68" align="center">rese&ntilde;a</td>
    <td colspan="2" align="center">Unidades</td>
    <td width="51" align="center">Borrar</td>
    <td width="163" align="center">Sub total</td>
  </tr>
	<?php
	$contador=0;
	$suma=0;
	$subto_compra = $subto_alquiler = $suma = $ta = $tc = $tr = 0;
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
		if ($v['tipo_pedido'] == 'resena')
		{
			$tr += 1;
		}
		$suma=$subto_alquiler+$subto_compra;
		$contador++;
		echo "<form name=\"a".$v['identificador']."\" method=\"post\" action=\"agregacar.php?".SID."&id=$id&tipo_pedido=compra\" id=\"a".$v['identificador']."\">";
		echo "<tr bgcolor=\"#FFFFFF\" class='prod'>
		 <td height='27' align='center' valign='middle' id='base_no'>$contador</td> 
		 <td>".$v['producto']."</td>
		 <td align=\"center\">";
		 if (isset($_SESSION['usuario_afiliado']) and $_SESSION['activo'] == 'si')
		 {
			 if ($v['tipo_pedido'] == 'alquiler') echo "<img src=\"../Imagenes_pagina/verificado_pos.png\" width=\"15\" height=\"15\" border=\"0\">";
			 else echo "<a href=\"agregacar.php?SID&id=$id&tipo_pedido=alquiler\"><img src=\"../Imagenes_pagina/no_verificado_pos.png\" width=\"15\" height=\"15\" border=\"0\"></a>";
		 }
		 else
		 {
			 echo "<img src=\"../Imagenes_pagina/no_verificado_pos.png\" width=\"15\" height=\"15\" border=\"0\">";
		 }
		 ?>
		 </td>
		 <td align="center">
		 <?php
		 if ($v['tipo_pedido'] == 'compra') echo "<img src=\"../Imagenes_pagina/verificado_pos.png\" width=\"15\" height=\"15\" border=\"0\">";
		 else echo "<a href=\"agregacar.php?SID&id=$id&tipo_pedido=compra\"><img src=\"../Imagenes_pagina/no_verificado_pos.png\" width=\"15\" height=\"15\" border=\"0\"></a>"; ?>
         </td>
		 <td align="center">
		 <?php
		 if ($v['tipo_pedido'] == 'resena') echo "<img src=\"../Imagenes_pagina/verificado_pos.png\" width=\"15\" height=\"15\" border=\"0\">";
		 else echo "<a href=\"agregacar.php?SID&id=$id&tipo_pedido=resena\"><img src=\"../Imagenes_pagina/no_verificado_pos.png\" width=\"15\" height=\"15\" border=\"0\"></a>"; ?>
         </td>
		 <td width="48" align="center"><?php echo $v['cantidad']; ?></td>
		 <td width="161" align="center">
		 <?php
		 if ($v['tipo_pedido'] == 'compra')
		 { ?>
			<input name="cantidad" type="text" id="cantidad" value="<?php echo $v['cantidad']; ?>" size="8">
		 <?php
		 }
		 if ($v['tipo_pedido'] == 'compra')
		 {
			 ?>
			 <a href="javascript:document.a<?php echo $v['identificador']; ?>.submit()"><img src="../Imagenes_pagina/refrescar1.png" border="0"></a>
		 	<input name="id" type="hidden" id="id" value="<?php echo $v['id']; ?>">
         <?php
		 }
		 ?>
		 </td>
		 <td align="center"><a href="borracar.php?<?php echo SID; ?>&id=<?php echo $v['id']; ?>&tipo_pedido=<?php echo $v['tipo_pedido']; ?>"><img src="../Imagenes_pagina/caneca.png" width="15" height="15" border="0"></a></td>
		 <td align="right">
		 <?php
		 if ($v['tipo_pedido'] == 'alquiler') echo number_format($valor_alquiler, 2);
		 elseif ($v['tipo_pedido'] == 'resena') echo number_format('0');
		 else echo number_format($subto,2);
		 ?>
		 </td>
		</tr>
        </form>
		<?php
	}
	if ($ta == 4)
	{
		?>
		<tr bgcolor="#FFFFFF" class='prod'>
		 <td height="27" align="center" valign="middle" id="base_no"><?php echo $contador+1; ?></td> 
		 <td>PopCorn para microondas</td>
		 <td align="center"><img src="../Imagenes_pagina/no_verificado_pos.png" width="15" height="15" border="0"></td>
		 <td align="center"><img src="../Imagenes_pagina/no_verificado_pos.png" width="15" height="15" border="0"></td>
		 <td align="center"><img src="../Imagenes_pagina/no_verificado_pos.png" width="15" height="15" border="0"></td>
		 <td width="62" align="center">1</td>
		 <td width="150" align="center">&nbsp;</td>
		 <td width="34" align="center"><img src="../Imagenes_pagina/caneca.png" width="15" height="15" border="0"></td>
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
	 <td valign="middle" align="center" style="background:url(../Imagenes_pagina/titulos/fondo.png); color: #000">Total</td>
	 <td valign="middle" align="right" style="background:url(../Imagenes_pagina/titulos/fondo.png); padding-right: 5px; color: #000">$&nbsp;<?php echo number_format($suma,2); ?></td>
	</tr>
</table><br />
<table width="800" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td width="50%" align="right" style="padding-right: 10px"><a href="anular.php"><img src="../Imagenes_pagina/cancelar_pedido.png" width="100" height="25" border="0" /></a></td>
    <td width="50%" align="left" style="padding-left: 10px">
	<?php
    	if($ta >= 2 || $ta <= 0) echo $continuar_act;
		elseif($ta > 0 and $ta < 2) echo $continuar_inact;
	?></td>
  </tr>
</table>
<p><div align="center"><span class="prod1">Total de Artículos en el carro: <?php echo count($carro); ?></span></div></p>
<p><div align="center"><span class="prod1">Total de Artículos en compra: <?php echo $tc; ?> por un valor de: $<?php echo number_format($subto_compra,2); ?></span></div>
<div align="center"><span class="prod1">Total de Artículos en alquiler: <?php echo $ta; ?> por un valor de: $<?php echo number_format($subto_alquiler,2); ?></span></div>
<div align="center"><span class="prod1">Total de reseñas en el carrito: <?php echo $tr; ?></span></div></p>
<?php
}
else
{ ?>
<p align="center"> <span class="prod1">No hay productos seleccionados</span> 
<?php
}
?>
</p>
</body>
</html>

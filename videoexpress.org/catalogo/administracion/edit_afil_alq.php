<?php
session_start();

  // check session variable

if (isset($_SESSION['user_admin']))
{
	$alquiler2		= $_SESSION['alquiler_admin'];
  	$afiliacion2	= $_SESSION['afiliacion_admin'];
	$afiliacion		= $_REQUEST['afiliaciona'];
	$alquiler 		= $_REQUEST['alquilera'];
	$editar			= $_REQUEST['editar'];
	$actualizado	= 'n';

	if ($editar == true)
	{
		include("../include/funciones_globales.php");
		include('../include/funciones_generales.php');
		$conecta = conecta_bd("videoexpress");
		
		if($alquiler == NULL) $alquiler1 = $_SESSION['alquiler_admin'];
		else $alquiler1 = $_SESSION['alquiler'] = $alquiler;
		if($afiliacion == NULL) $afiliacion1 = $_SESSION['afiliacion_admin'];
		else $afiliacion1 = $_SESSION['afiliacion'] = $afiliacion;
		//Todo parece correcto procedemos con la inserccion
		$query = act_datos_tabla("actualizacion","alquiler='$alquiler1', afiliacion='$afiliacion1'","","");
		$actualizado = 's';
		if ($alquiler != 0) $_SESSION['alquiler_admin'] = $alquiler;
		if ($afiliacion != 0) $_SESSION['afiliacion_admin'] = $afiliacion;
		$alquiler2		= $_SESSION['alquiler_admin'];
	  	$afiliacion2	= $_SESSION['afiliacion_admin'];
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Afiliación a VideoExpress.org</title>
<script>
//Pon en la variable obligatorios el name de todos los campos que deben rellenar

obligatorio = ["afiliacion", "alquiler"];
vacio = 0;

//Pon en la veriable textoObligatorio el texto que quieres que aparezca en el alert

textoObligatorio=["Afiliacion", "Alquiler"];

function comprobar(este)
{
	for(a=0; a<obligatorio.length; a++)
	{
		if(este.elements[obligatorio[a]].value == "") { vacio += 1; }
		if(vacio == 2)
		{
			alert("Por favor ingrese al menos un precio");
			este.elements[obligatorio[3]].focus();
			vacio = 0;
			return false;
		}
	}
	return true;
}
</script>
<link href="../estilo.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id='titulo_informacion'><strong>Edici&oacute;n de precios de Alquiler y de Afiliaci&oacute;n de videoexpress.org</strong></div>
<div id='contenido_informacion'>
<form name="edit_afil_alq" id="edit_afil_alq" method='post' action='edit_afil_alq.php?editar=true' onSubmit="return comprobar(this)">
<table width="300" border="0" cellspacing="2" cellpadding="0" align="center" style="border-style:dotted; background-color: #9ABEDC; color:#000">
  <tr>
    <td width="50%">Valor act&uacute;al Afiliaci&oacute;n</td>
    <td width="50%">$ <?php echo number_format($afiliacion2) ?></td>
  </tr>
  <tr>
    <td>Valor act&uacute;al Alquiler</td>
    <td>$ <?php echo number_format($alquiler2) ?></td>
  </tr>
  <tr>
    <td colspan="2" align="center" style="padding: 5px"><strong>Actualizar:</strong></td>
  </tr>
  <tr>
    <td width="50%">Afiliaci&oacute;n</td>
    <td width="50%"><input name="afiliaciona" type="text" id="afiliaciona" tabindex="1" size="15" maxlength="200" /></td>
  </tr>
  <tr>
    <td>Alquiler</td>
    <td><input name="alquilera" type="text" id="alquilera" tabindex="2" size="15" maxlength="150" /></td>
  </tr>
  <tr>
    <td colspan="3" align="center"><a href="#" onclick="javascript:document.edit_afil_alq.reset()"><img src="../Imagenes_pagina/limpiar.png" width="100" height="26" border="0" /></a>&nbsp;<input type="image" src="../Imagenes_pagina/boton_enviar.png" name="submit" value="submit" tabindex="11" /></td>
  </tr>
</table>
</form>
<?php if($actualizado == 's')
{
	$vacio = 0;
	if($afiliacion != NULL) $vacio += 1;
	if($alquiler != NULL) $vacio += 1;
	echo '<center><div id="informacion1"><img src="../Imagenes_pagina/informacion.png" width=\"25\" height=\"25\" align=\"absmiddle\" /> ';
	if($vacio == 2)
	{
		echo "Se ha actualizado el precio de alquiler a $".number_format($alquiler);
		echo "<br />Se ha actualizado el precio de afiliación a $ ".number_format($afiliacion);
	}
	if($vacio == 1)
	{
		echo "Se ha actualizado el precio de ";
		if($alquiler != NULL) echo "Alquiler a: $ ".number_format($alquiler);
		if($afiliacion != NULL) echo "Afiliación a: $ ".number_format($afiliacion);
	}
	echo "</div></center>";
}
?>
</div>
</body>
</html>
<?php
}
else
{
	include ('index.php');
}
?>
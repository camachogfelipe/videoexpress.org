<?php
session_start();

if (isset($_SESSION['user_admin']))
{
	$id_usuario	= $_REQUEST['id_comprador'];
	$peliculas	= $_REQUEST['peliculas'];
	$id_factura	= $_REQUEST['id_factura'];
	$actualizar	= $_REQUEST['actualizar'];
	$auditorio	= $_REQUEST['auditorio2'];
	$no_auditorio	= $_REQUEST['no_auditorio'];
	$comentarios	= $_REQUEST['comentarios'];
	$msj = 0;
	
	if($actualizar == 1 and $no_auditorio != NULL)
	{
		include('../../include/funciones_globales.php');
		$conecta = conecta_bd("videoexpress");
		$id = 0;
		$id = dato_columna("info_peliculas", "'id'", "1;;;id_factura='$id_factura'");
		if($id == 0)
		{
			$columna = "id_factura, auditorio_no, tipo_auditorio, comentarios";
			$datos = "'$id_factura', '$no_auditorio', '$auditorio', '$comentarios'";
			$query = ing_datos_tabla("info_peliculas", $columna, $datos);
		}
		else
		{
			$datos = "auditorio_no='$no_auditorio', tipo_auditorio='$auditorio', comentarios='$comentarios'";
			$query = act_datos_tabla("info_peliculas","$datos","id_factura='$id_factura'",1);
		}
		$status = "Se han actualizado los datos de la factura No. $id_factura";
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Auditorio</title>
<link href="../estilo.css" rel="stylesheet" type="text/css" />
</head>

<body>
<form action="formulario_auditorio.php?actualizar=1&id_factura=<?php echo $id_factura ?>&id_comprador=<?php echo $id_usuario ?>&peliculas=<?php echo $peliculas ?>" method="post" enctype="application/x-www-form-urlencoded" name="auditorio">
<table width="50%" border="0" align="center" cellpadding="0" cellspacing="2px" style="border-style:dotted; background-color: #9ABEDC; color:#000">
  <tr>
    <td width="50%">Id usuario</td>
    <td width="50%"><?php echo $id_usuario ?></td>
  </tr>
  <tr>
    <td>Peliculas</td>
    <td><?php $pel = explode(",",$peliculas); $sizeof = sizeof($pel); $sizeof--; for($a=0; $a<$sizeof; $a++) echo $pel[$a]."<br>"; ?></td>
  </tr>
  <tr>
    <td>Auditorio</td>
    <td>
      <select name="auditorio2" id="auditorio2" tabindex="1">
        <option value="Familia" selected="selected">Familia</option>
        <option value="Iglesia">Iglesia</option>
        <option value="Edificaci&oacute;n grupal">Edificaci&oacute;n grupal</option>
        <option value="Edificaci&oacute;n empresarial">Edificaci&oacute;n empresarial</option>
        <option value="Edificaci&oacute;n personal">Edificaci&oacute;n personal</option>
        <option value="J&oacute;venes y ni&ntilde;os">J&oacute;venes y ni&ntilde;os</option>
        <option value="Radio evangelismo">Radio evangelismo</option>
        <option value="Televangelismo">Televangelismo</option>
        <option value="Online">Online</option>
      </select>
    </td>
  </tr>
  <tr>
    <td>No. Personas Auditorio</td>
    <td <?php if($actualizar == 1 and $no_auditorio == NULL) { echo "style='background-color: red; font-weigh: bold'"; $msj = 1; } ?>><input type="text" name="no_auditorio" id="no_auditorio" tabindex="2" /> <?php if($msj == 1) echo "<span style='color: #fff'>Debes rellenar este campo</span>"; ?></td>
  </tr>
  <tr>
    <td colspan="2">Comentarios:<br /><textarea name="comentarios" id="comentarios" cols="70" rows="5" tabindex="3"></textarea></tr>
  <tr>
    <td align="right"><a href="#" onclick="javascript:document.auditorio.reset()"><img src="../../Imagenes_pagina/limpiar.png" width="100" height="25" border="0" /></a></td>
    <td><input type="image" src="../../Imagenes_pagina/boton_enviar.png" name="submit" value="submit" tabindex="11" /></td>
  </tr>
  <tr>
    <td width="100%" colspan="2" align="center" style="color:#009; font-size:16px"><?php if($status != NULL) echo $status ?></td>
  </tr>
</table>
</form>
</body>
</html>
<?php
}
else
{
	include ('index.php');
}
?>
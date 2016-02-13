<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Trabaje a nuestro lado</title>
<link href="mea.css" rel="stylesheet" type="text/css" />
</head>

<body bgcolor="#000" id="info">
<?php
$mensaje[0] = -1;
$mensaje[1] = "Por favor rellene los campos requeridos para que su solicitud sea tramitada";
$mensaje[2] = "Los campos de tel&eacute;fono o celular deben ser un n&uacute;mero y no puede contener letras";
$mensaje[3] = "Sus datos fueron recibidos con exito. Muchas gracias por su participaci&oacute;n";
if($_GET['ing'] == 1)
{
	include("../catalogo/include/funciones_generales.php");
	$organizacion	= $_POST['organizacion'];
	$nombre			= $_POST['nombre'];
	$telefono		= $_POST['telefono'];
	$celular		= $_POST['celular'];
	$email			= $_POST['email'];
	$ayuda			= $_POST['ayuda'];
	$tipo_ayuda		= $_POST['tipo_ayuda'];
	
	if($nombre != NULL and $telefono != NULL and $celular != NULL and $email != NULL and $tipo_ayuda != NULL)
	{
		if(is_numeric($telefono) and is_numeric($celular))
		{
			$cuerpo = "Contacto desde MINA, formulario de ayuda<p>";
			$cuerpo .= "Tipo de organizaci&oacute;n: ".$organizacion;
			$cuerpo .= "<br />Nombre: ".$nombre;
			$cuerpo .= "<br />Tel&eacute;fono: ".$telefono;
			$cuerpo .= "<br />Celular: ".$celular;
			$cuerpo .= "<br />Email: ".$email;
			$cuerpo .= "<br />Ayuda: ".$ayuda;
			$cuerpo .= "<br />Tipo de ayuda: ".$tipo_ayuda;
			$cuerpo .= "</p>";
			$asunto = "Contacto desde MINA, formulario de ayuda";
			$mail = mail_form($asunto, $cuerpo, $email);
			$mensaje[0] = 2;
		}
		else $mensaje[0] = 1;
	}
	else $mensaje[0] = 0;
}
?>
<p>Trabaje con nosotros es una forma de lograr asocio con personas naturales o juridicas, que buscan ayuda de nuestro ministerio o quieren ofrecer ayuda al ministerio.</p>
Por favor rellene los datos del formulario para que nos contactemos con usted.
<p>Gerencia VideoExpress.org</p>
<form id="tcn" name="tcn" method="post" action="?ing=1">
  <table width="80%" border="0" align="center" cellpadding="0" cellspacing="5">
    <tr>
      <td width="30%">Seleccione su caso:</td>
      <td width="70%"><input name="organizacion" type="radio" id="organizacion" tabindex="1" value="Persona" checked="checked" /><label for="organizacion">Persona <input type="radio" name="organizacion" id="organizacion" value="organizacion" tabindex="2" />
      Organizaci&oacute;n o Empresa</label></td>
    </tr>
    <tr>
      <td width="30%">Nombre</td>
      <td width="70%"><span id="req">* </span><label for="nombre"></label>
      <input name="nombre" type="text" id="nombre" tabindex="3" size="50" /></td>
    </tr>
    <tr>
      <td>Tel&eacute;fono</td>
      <td><span id="req">* </span><label for="telefono"></label>
      <input name="telefono" type="text" id="telefono" tabindex="4" size="50" /></td>
    </tr>
    <tr>
      <td>Celular</td>
      <td><span id="req">* </span><label for="celular"></label>
      <input name="celular" type="text" id="celular" tabindex="5" size="50" /></td>
    </tr>
    <tr>
      <td>E-mail</td>
      <td><span id="req">* </span><label for="email"></label>
      <input name="email" type="text" id="email" tabindex="6" size="50" /></td>
    </tr>
    <tr>
      <td>Ayuda</td>
      <td><input name="ayuda" type="radio" id="ayuda" tabindex="7" value="doy" checked="checked" /><label for="ayuda">Ofrezco ayuda <input type="radio" name="ayuda" id="ayuda" value="quiero" tabindex="8" />Requiero ayuda</label></td>
    </tr>
    <tr>
      <td>Tipo de ayuda</td>
      <td><span id="req">* </span><label for="tipo_ayuda"></label>
      <textarea name="tipo_ayuda" id="tipo_ayuda" cols="40" rows="5" tabindex="9"></textarea></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><a href="javascript:document.tcn.submit()"><img src="Imagenes/contact_btn-01.png" width="60" height="24" border="0" /></a>&nbsp;&nbsp;&nbsp;<a href="javascript:document.tcn.reset()"><img src="Imagenes/contact_btn-02.png" width="60" height="24" border="0" /></a></td>
    </tr>
  </table>
</form>
<center id="req">
<?php
if($mensaje[0] == 0) echo $mensaje[1];
elseif($mensaje[0] == 1) echo $mensaje[2];
elseif($mensaje[0] == 2) echo $mensaje[3];
?>
</center>
</body>
</html>
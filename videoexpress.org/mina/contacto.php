<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
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
	$nombre			= $_POST['nombre'];
	$telefono		= $_POST['telefono'];
	$celular		= $_POST['celular'];
	$email			= $_POST['email'];
	$texto			= $_POST['texto'];
	
	if($nombre != NULL and $telefono != NULL and $celular != NULL and $email != NULL and $texto != NULL)
	{
		if(is_numeric($telefono) and is_numeric($celular))
		{
			$cuerpo = "Contacto desde MINA, formulario de cont&aacute;cto<p>";
			$cuerpo .= "Tipo de organizaci&oacute;n: ".$organizacion;
			$cuerpo .= "<br />Nombre: ".$nombre;
			$cuerpo .= "<br />Tel&eacute;fono: ".$telefono;
			$cuerpo .= "<br />Celular: ".$celular;
			$cuerpo .= "<br />Email: ".$email;
			$cuerpo .= "<p>".$texto."</p>";
			$cuerpo .= "</p>";
			$asunto = "Contacto desde MINA, formulario de cont&aacute;cto";
			$mail = mail_form($asunto, $cuerpo, $email);
			$mensaje[0] = 2;
		}
		else $mensaje[0] = 1;
	}
	else $mensaje[0] = 0;
}
?>
<p>Si tiene sugerencias, aportes o nos contacta por otra raz&oacute;n diferente a ofrecernos su ayuda, no dude en comunicarse con nostros rellenando los campos vac&iacute;os del formulario, y nosotros con gusto nos comunicaremos con usted.</p>
Si usted requiere ayuda, por favor use el formulario de "<span style="text-decoration:underline"><a href="tcn.php">Trabaje a nuestro lado</a></span>"
<p>Gerenc&iacute;a VideoExpress.org</p>
<form id="contacto" name="contacto" method="post" action="?ing=1">
  <table width="80%" border="0" align="center" cellpadding="0" cellspacing="5">
    <tr>
      <td width="30%">Nombre</td>
      <td width="70%"><span id="req">* </span><input name="nombre" type="text" id="nombre" tabindex="1" size="50" /></td>
    </tr>
    <tr>
      <td>Teléfono</td>
      <td><span id="req">* </span><input name="telefono" type="text" id="telefono" tabindex="2" size="50" /></td>
    </tr>
    <tr>
      <td>Celular</td>
      <td><span id="req">* </span><input name="celular" type="text" id="celular" tabindex="3" size="50" /></td>
    </tr>
    <tr>
      <td>E-mail</td>
      <td><span id="req">* </span><input name="email" type="text" id="email" tabindex="4" size="50" /></td>
    </tr>
    <tr>
      <td>Cont&aacute;cto</td>
      <td><span id="req">* </span><textarea name="texto" id="texto" cols="40" rows="5" tabindex="7"></textarea></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><a href="javascript:document.contacto.submit()"><img src="Imagenes/contact_btn-01.png" width="60" height="24" border="0" /></a>&nbsp;&nbsp;&nbsp;<a href="javascript:document.contacto.reset()"><img src="Imagenes/contact_btn-02.png" width="60" height="24" border="0" /></a></td>
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
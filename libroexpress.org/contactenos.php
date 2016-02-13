<?php
$enviar = $_REQUEST['enviar'];
$nombres = $_REQUEST['nombre_apellidos'];
$correo = $_REQUEST['correo'];
$mensaje = $_REQUEST['mensaje'];

if($enviar == true and $mensaje == "") $status = "Su mensaje esta vac&iacute;o";

if($enviar == true and $mensaje != "" and $nombres != "" and $correo != "")
{
	$asunto = "Contácto desde página web libroexpress";
	
	$cuerpo = "$nombres<br>$correo<p>$mensaje</p>";
	
	$headers = "X-Mailer:PHP/\".phpversion().\"\n";
	$headers .= "Mime-Version: 1.0\n";
	$headers .= "Content-Type: text/html; charset=iso-8859-1\n"; 

	//direcci&#243;n del remitente 
	$headers .= "From: $nombres <$correo>\n";
	
	$email_envio = "gerencia@videoexpress.org";
	
	mail($email_envio, $asunto, $cuerpo, $headers);
	
	$status = "Su mensaje ha sido enviado";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
<link href="libroexpress.css" rel="stylesheet" type="text/css" />
</head>

<body bgcolor="#000000" style="color:#FFF">
<form action="contactenos.php?enviar=true" method="post" enctype="multipart/form-data" name="contactenos">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="3">
  <tr>
    <td width="40%" align="right">Nombres y apellidos</td>
    <td><label>
      <input name="nombre_apellidos" type="text" id="nombre_apellidos" tabindex="1" size="70" />
    </label></td>
  </tr>
  <tr>
    <td align="right">Direcci&oacute;n de correo electr&oacute;nico</td>
    <td><label>
      <input name="correo" type="text" id="correo" tabindex="2" size="70" />
    </label></td>
  </tr>
  <tr>
    <td height="94" align="right" valign="top">Mensaje</td>
    <td><label>
      <textarea name="mensaje" cols="50" rows="8" id="mensaje" tabindex="3"></textarea>
    </label></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><a href="javascript:document.confirmacion_datos.reset()"><img src="imagenes/Imagenes de edicion/limpiar.png" width="100" height="25" border="0" /></a> <input type="image" src="imagenes/Imagenes de edicion/continuar.png" id="submit" name="submit" /></td>
  </tr>
</table>
</form>
<?php if ($enviar == true) echo $status; ?>
</body>
</html>
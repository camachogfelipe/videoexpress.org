<?php
$asunto = $razon;

switch ($razon)
{
	case 'sugerencia'	: $email_envio = 'gerencia@videoexpress.org';
						  break;
	case 'alquiler'		: $email_envio = 'alquiler@videoexpress.org';
						  break;
	case 'reclamo'		: $email_envio = 'gerencia@videoexpress.org';
						  break;
	case 'otro'			: $email_envio = 'gerencia@videoexpress.org';
						  break;
}

$cuerpo = "
<html> 
<head> 
<title>Correo de contacto</title> 
<link href=\"http://www.videoexpress.org/catalogo/estilo.css\" rel=\"stylesheet\" type=\"text/css\" />
</head> 
<body> 
Hola!!
<p>$nombre, se ha contactado por un(a) $razon</p>
Sus datos son:
<p>
Nombre completo: $nombre<br />
E-mail: $email<br />
Tel&eacute;fono: $telefono<br />
Pa&iacute;s: $pais<br />
Ciudad: $ciudad<br /></p>
Raz&oacute;n del contacto: $razon
<p>Mensaje:</p>
$texto_contacto
</body> 
</html>";

$headers = "X-Mailer:PHP/".phpversion()."\n";
$headers .= "Mime-Version: 1.0\n";
$headers .= "Content-Type: text/html; charset=iso-8859-1\n"; 

//dirección del remitente 
$headers .= "From: Clientes <clientes@videoexpress.org>\n";
mail($email_envio, $asunto, $cuerpo, $headers);

echo '<script languaje="Javascript">location.href="index.php?op=2"</script>';
?>
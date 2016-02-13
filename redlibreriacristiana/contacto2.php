<?php
ob_start( 'ob_gzhandler' );
$enviar = $_REQUEST['enviar'];
$nombres = $_REQUEST['nombre_apellidos'];
$correo = $_REQUEST['correo'];
$mensaje = $_REQUEST['mensaje'];

if($enviar == true)
{
	$asunto = "Contácto desde página web RED libreriaCristiana";
	$cuerpo = "$nombres<br>$correo<p>$mensaje</p>";

	$headers = "X-Mailer:PHP/\".phpversion().\"\n";
	$headers .= "Mime-Version: 1.0\n";
	$headers .= "Content-Type: text/html; charset=iso-8859-1\n"; 

	//direcci&#243;n del remitente 
	$headers .= "From: $nombres <$correo>\n";

	$email_envio = "claudia@redlibreriacristiana.org";

	mail($email_envio, $asunto, $cuerpo, $headers);
	echo $status = '<div id="enviado"><img src="images/ok.png" width="128" height="128" align="absmiddle" /> Su mensaje ha sido enviado correctamente</div>';
}
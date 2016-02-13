<?php
session_start();
$lang = $_SESSION['lang'];
include("lang/$lang/lang.php");

$nombre = $_POST['nombre_completo'];
$motivo = $_POST['motivo'];
$mail = $_POST['mail'];
$asunto = $_POST['asunto'];

$cuerpo = "
<html> 
<head> 
<title>Correo de contacto</title> 
</head> 
<body> 
Hola Administrador!!
<p>$nombre, se ha contactado por un(a) $motivo</p>
Mensaje:
$asunto
</body> 
</html>";

$headers = "X-Mailer:PHP/".phpversion()."\n";
$headers .= "Mime-Version: 1.0\n";
$headers .= "Content-Type: text/html; charset=iso-8859-1\n"; 

//dirección del remitente 
$headers .= "From: ".$nombre." <".$mail.">\n";
mail("gerencia@videoexpress.org", $asunto, $cuerpo, $headers);

echo $TEXTO['form_contacto_respuesta'];

?>
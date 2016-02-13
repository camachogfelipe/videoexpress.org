<? 

$nombre = $_POST['nombre'];
$mail = $_POST['mail'];
$empresa = $_POST['empresa'];
$nombre invitado1= $_POST['nombreinvitado1'];

$header = 'From: ' . $mail . " \r\n";
$header .= "X-Mailer: PHP/" . phpversion() . " \r\n";
$header .= "Mime-Version: 1.0 \r\n";
$header .= "Content-Type: text/plain";

$mensaje = "Este mensaje fue enviado por " . $nombre . ", de la empresa " . $empresa . " \r\n";
$mensaje .= "Su e-mail es: " . $mail . " \r\n";
$mensaje .= "telefono: " . $_POST['telefono'] . " \r\n";
$mensaje .= "invitado 1: " . $_POST['nombreinvitado1'] . " \r\n";
$mensaje .= "Enviado el " . date('d/m/Y', time());

$para = 'alejonuevo@hotmail.com';
$asunto = 'Contacto desde cinexpress.org';

mail($para, $asunto, utf8_decode($mensaje), $header);

echo '&estatus=ok&';
?> 
<? 

$nombre = $_POST['nombre'];
$mail = $_POST['mail'];
$empresa = $_POST['empresa'];


$header = 'From: ' . $mail . " \r\n";
$header .= "X-Mailer: PHP/" . phpversion() . " \r\n";
$header .= "Mime-Version: 1.0 \r\n";
$header .= "Content-Type: text/plain";

$mensaje = "Este mensaje fue enviado por " . $nombre . ", de la iglesia " . $empresa . " \r\n";
$mensaje .= "Su e-mail es: " . $mail . " \r\n";
$mensaje .= "telefono: " . $_POST['telefono'] . " \r\n";
$mensaje .= "invitado 1: " . $_POST['nombreinvitado1'] . " \r\n";
$mensaje .= "Su e-mail es: " . $_POST['emailinvitado1']  . " \r\n";
$mensaje .= "telefono: " . $_POST['telefonoinvitado1'] . " \r\n";
$mensaje .= "invitado 2: " . $_POST['nombreinvitado2'] . " \r\n";
$mensaje .= "Su e-mail es: " . $_POST['emailinvitado2']  . " \r\n";
$mensaje .= "telefono: " . $_POST['telefonoinvitado2'] . " \r\n";
$mensaje .= "Enviado el " . date('d/m/Y', time());

$para = 'gerencia@videoexpress.org';
$asunto = 'Contacto desde cinexpress.org';

mail($para, $asunto, utf8_decode($mensaje), $header);

echo '&estatus=ok&';
?> 
<?php
$bd = 'redlibr_redlibreria';
include("funciones.php");

function resultados($id)
{
	$sql = "SELECT * FROM notired WHERE id_notired = '$id'";
	
	$result = mysql_query($sql) or die("La siguiente consulta contiene alg&uacute;n error:<br>nSQL: <b>$sql</b>");

	$No_items = 0;
	while ($row = mysql_fetch_array($result))
	{
		//datos notired
		$info[No] 					= "{$row['id_notired']}";
		$info[titulo_notired]		= "{$row['titulo']}";
		$info[encabezado_notired] 	= "{$row['encabezado']}";
		$info[fecha_notired]	 	= "{$row['fecha']}";
		$No_items++;
	}
	
	return $info;
}

$conecta = conecta_bd($bd);
$sql = "select MAX(id_email) FROM email";
$result = mysql_query($sql) or die("La siguiente consulta contiene alg&uacute;n error:<br>nSQL: <b>$sql</b>");
$t = mysql_fetch_array($result);
$final = $t[0];

$sql = "select * FROM datos";
$result = mysql_query($sql) or die("La siguiente consulta contiene alg&uacute;n error:<br>nSQL: <b>$sql</b>");
while($row=mysql_fetch_object($result))
{
	$programado = $row->en_proceso;
	$inicio		= $row->fecha_inicio_notired;
	$id			= $row->id_notired;
	$fecha_final= $row->fecha_terminado_notired;
	$correo_final= $row->inicio;
}

$tm = 50;
$faltan = $final - $correo_final;
if($faltan < $tm) $tm = $faltan;

if($programado == "S" and $faltan > 0)
{
	$sql = "select * FROM email limit $correo_final,$tm";
	$result = mysql_query($sql) or die("La siguiente consulta contiene alg&uacute;n error:<br>nSQL: <b>$sql</b>");
	$i = 0;
	while($row=mysql_fetch_object($result))
	{
		$correo[$i]	.= $row->email;
		$i++;
	}

	$info = resultados($id);
	$rec = recomendados2();
	$nov = novedades2();
	
	$cuerpo = '
<br />
<div style="width:713px">
	<div><img src="http://www.redlibreriacristiana.org/images/notired/cabezoteNotired-03.png" width="713" height="118" border="0"></div>
	<div style="padding-left: 20px; min-height: 33px; background-color: #C1272D; color: #FFF; font-weight: bolder; font-size: 26px; font-family: \'Times New Roman\', Times, serif; font-style: italic; width: 500px; text-align: left">NotiRED</div>
	<div>
		<span style="color: #C1272D; font-size: 18px">'.ucfirst($info[titulo_notired]).'</span> <span style="color: #BBB">'.$info[fecha_notired].'</span>
		<p>'.$info[encabezado_notired].'</p>
		<a href="http://www.redlibreriacristiana.org/?op=1">Ver m&aacute;s...</a>
	</div>
	<div style="padding-left: 20px; min-height: 33px; background-color: #C1272D; color: #FFF; font-weight: bolder; font-size: 26px; font-family: \'Times New Roman\', Times, serif; font-style: italic; width: 500px; margin-top: 15px; text-align: left">Recomendados</div>
	<div>
	<div>'.$rec.'</div>
	<div style="padding-left: 20px; min-height: 33px; background-color: #C1272D; color: #FFF; font-weight: bolder; font-size: 26px; font-family: \'Times New Roman\', Times, serif; font-style: italic; width: 500px; margin-top: 15px; text-align: left">Novedades</div>
	<div>
	<div>'.$nov.'</div>
</div>
	<div style="clear: both; text-align: center">Cont&aacute;ctenos a <a href="mailto:notired@redlibreriacristiana.org"><u>notired@redlibreriacristiana.org</u></a><br />
    Tel.: (57 1) 229 8725 - 429 8580 - 429 9618<br />
   	Bogot&aacute; - Colombia
    &bull; &copy; redlibreriacristiana.org</a>. 2011.
	</div>
';

// múltiples recipientes
$asunto = "NotiRED No. $id";
echo $cuerpo;
$mensaje = $cuerpo;
mailphpmailer($asunto, $mensaje, $correo, $correo_final, $tm);
}

function mailphpmailer($asunto, $mensaje, $correo, $correo_final, $tm)
{
	// primero hay que incluir la clase phpmailer para poder instanciar
  //un objeto de la misma
  require "PHPMailer_v5.1/class.phpmailer.php";

  //instanciamos un objeto de la clase phpmailer al que llamamos 
  //por ejemplo mail
  $mail = new phpmailer();

  //Definimos las propiedades y llamamos a los métodos 
  //correspondientes del objeto mail

  //Con PluginDir le indicamos a la clase phpmailer donde se 
  //encuentra la clase smtp que como he comentado al principio de 
  //este ejemplo va a estar en el subdirectorio includes
  $mail->PluginDir = "PHPMailer_v5.1/";

  //Con la propiedad Mailer le indicamos que vamos a usar un 
  //servidor smtp
  $mail->Mailer = "sendmail";
  
  $mail->IsHTML(true);

  //Asignamos a Host el nombre de nuestro servidor smtp
  //$mail->Host = "smtp.videoexpress.org";

  //Le indicamos que el servidor smtp requiere autenticación
  //$mail->SMTPAuth = true;

  //Le decimos cual es nuestro nombre de usuario y password
  //$mail->Username = "prueba@videoexpress.org"; 
  //$mail->Password = "prueba";

  //Indicamos cual es nuestra dirección de correo y el nombre que 
  //queremos que vea el usuario que lee nuestro correo
  $mail->From = "notired@redlibreriacristiana.org";
  $mail->FromName = $asunto;

  //el valor por defecto 10 de Timeout es un poco escaso dado que voy a usar 
  //una cuenta gratuita, por tanto lo pongo a 30  
  $mail->Timeout=30;

  //Asignamos asunto y cuerpo del mensaje
  //El cuerpo del mensaje lo ponemos en formato html, haciendo 
  //que se vea en negrita
  $mail->Subject = $asunto;
  $mail->Body = $mensaje;

  //Definimos AltBody por si el destinatario del correo no admite email con formato html 
  $mail->AltBody = $mensaje;

  //Indicamos cual es la dirección de destino del correo
  $coutn = count($correo);
  for($x=0; $x<$coutn; $x++)
  {
	  $mail->ClearAllRecipients();
	  $mail->AddAddress($correo[$x]);
	  //se envia el mensaje, si no ha habido problemas 
	  //la variable $exito tendra el valor true
	  $exito = $mail->Send();

	  //Si el mensaje no ha podido ser enviado se realizaran 4 intentos mas como mucho 
	  //para intentar enviar el mensaje, cada intento se hara 5 segundos despues 
	  //del anterior, para ello se usa la funcion sleep	
	  $intentos=1; 
	  while ((!$exito) && ($intentos < 1))
	  {
		  sleep(5);
		  //echo $mail->ErrorInfo;
     	  $exito = $mail->Send();
     	  $intentos=$intentos+1;	
	  }
	  if(!$exito) $errores .= "- ".$correo[$x]."\n";
	  $correo[$x] = NULL;
  }
  $correo_final = $correo_final + $tm;
  $sql = "UPDATE datos SET inicio='$correo_final'";
  echo '<script language="javascript">alert("correo_final: '.$correo_final.', tm: '.$tm.'")</script>';
  if($tm < 50 )
  {
	  $sql .= ", fecha_terminado_notired='".date("Y-m-d")."'";
	  $sql .= ", en_proceso='N'";
	  $mail->ClearAllRecipients();
	  $mail->Subject = "Confirmaci&oacute;n de correo NotiRED";
	  $mail->Body = "Se enviaron todos los correos de NotiRED, ya puede redactar uno nuevo y enviarlo";
	  $mail->AltBody = $mail->Body;
	  $mail->AddAddress("claudia@redlibreriacristiana.org");
	  $mail->AddBCC("webmaster@redlibreriacristiana.org");
	  $exito = $mail->Send();
  }
  $sql .= " WHERE id_datos='1'";
  mysql_query($sql) or die(mysql_error());
}
<?php
#! /usr/local/bin/php-q

//nos conectamos a la base de datos
	$bd = "enews";
	include ("conexion.php");
	
	//nos conectamos a la base de datos
	$sql = "SELECT * FROM programacion_mail";
	$result = mysql_query($sql) or die("La siguiente consulta contiene alg&uacute;n error:<br>nSQL: <b>$sql</b>");
	
	while ($row = mysql_fetch_object($result))
	{
		$programado = $row->programado;
		$inicio = $row->inicio;
		$final = $row->final;
	}
	
	echo "Se ha leido programación...<br>";
	echo "Los datos son:<br>programado: $programado<br>inicio: $inicio<br>final: $final<br>";
	
	if($programado != 0)
	{
		//nos conectamos a la base de datos
		$sql2 = "SELECT * FROM sus_enews order by email asc limit $inicio,$final";
		$result2 = mysql_query($sql2) or die("La siguiente consulta contiene alg&uacute;n error:<br>nSQL: <b>$sql2</b>");
		
		echo "Hemos leído los correos en el siguiente rango: $sql2<br>";
		echo "Vamos a leer cuantos tenemos en base de datos...";
		
		$sql1 = "SELECT COUNT(*) FROM sus_enews";
		$result1 = mysql_query($sql1) or die("La siguiente consulta contiene alg&uacute;n error:<br>nSQL: <b>$sql1</b>");
		$total_resultados = mysql_fetch_array($result1);
		
		echo " tenemos $total_resultados[0]<br>";
		
		$ultimo = 0;
		if($final > $total_resultados[0])
		{
			$final = $total_resultados[0];
			$ultimo = 1;
		}

		$info = resultados($id);
		//$inicio = 0;
	
		$asunto = "VideoExpress.org E-news"; 
		$mensaje = "
		<html><head><title>.$asunto.'</title></head>\n
		<link href=\"http://www.videoexpress.org/enews/estilo.css\" rel=\"stylesheet\" type=\"text/css\" />
		<link href=\"http://www.videoexpress.org/enews/estilo_e.css\" rel=\"stylesheet\" type=\"text/css\" />
		</head>

		<body>
		Si no puede ver correctamente este correo de click <a href=\"http://www.videoexpress.org/enews\">Aqui</a><br><br>
		<center>
		 <div style=\"background:url(http://www.videoexpress.org/enews/imagenes-para-secciones/fondos/$info[fondo]) 100% no-repeat\">
		  <div style=\"background:url(http://www.videoexpress.org/enews/imagenes/index.png)100% no-repeat\">
   		  <div style=\"width: 200px; color: #113687; font-size: 12px; margin-left: 300px\">
    <span style=\"color: #000\">Num. $info[No]&nbsp;&#8226;&nbsp;$info[fecha]</span>
   </div>
   <table width=\"500\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
    <tr>
     <td height=\"173px\" style=\"text-align:center\">&nbsp;
      
     </td>
    </tr>
    <tr>
     <td height=\"550px\">
       <table width=\"498\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
         <tr>
           <td width=\"50%\" style=\"height: 110px; vertical-align: text-top; text-align: justify\">
            <span style=\"font-size: 12px\">
             <p style=\"font-size: 12px; font-weight: bold\">$info[titulo_paraeditar]</p>$info[cuerpo_paraeditar]
            </span>
           </td>
           <td><img src=\"http://www.videoexpress.org/enews/imagenes/paraeditar_index.png\" width=\"247\" height=\"109\" border=\"0\" usemap=\"#paraeditar\" /></td>
         </tr>
         <tr>
           <td><img src=\"http://www.videoexpress.org/enews/imagenes/primerafila_index.png\" width=\"247\" height=\"109\" border=\"0\" usemap=\"#primerafila\" /></td>
           <td style=\"height: 110px; vertical-align: text-top; text-align: right\">
            <span style=\"font-size: 12px\">
             <p style=\"font-size: 12px; font-weight: bold\">$info[titulo_primerafila]</p>$info[cuerpo_primerafila]
            </span>
           </td>
         </tr>
         <tr>
           <td style=\"height: 110px; vertical-align: text-top; text-align: justify\">
            <span style=\"font-size: 12px\">
             <p style=\"font-size: 12px; font-weight: bold\">$info[titulo_nuevamente]</p>$info[cuerpo_nuevamente]
            </span>
           </td>
           <td><img src=\"http://www.videoexpress.org/enews/imagenes/nuevamente_index.png\" width=\"247\" height=\"109\" border=\"0\" usemap=\"#nuevamente\" /></td>
         </tr>
         <tr>
           <td><img src=\"http://www.videoexpress.org/enews/imagenes/buenasnuevas_index.png\" width=\"247\" height=\"109\" border=\"0\" usemap=\"#buenasnuevas\" /></td>
           <td style=\"height: 110px; vertical-align: text-top; text-align: right\">
            <span style=\"font-size: 12px\">
             <p style=\"font-size: 12px; font-weight: bold\">$info[titulo_buenasnuevas]</p>$info[cuerpo_buenasnuevas]
            </span>
           </td>
         </tr>
         <tr>
           <td style=\"height: 110px; vertical-align: text-top; text-align: justify\">
            <span style=\"font-size: 12px\">
             <p style=\"font-size: 12px; font-weight: bold\">$info[titulo_garabatos]</p>$info[cuerpo_garabatos]
            </span>
           </td>
           <td><img src=\"http://www.videoexpress.org/enews/imagenes/garabatos_index.png\" width=\"247\" height=\"109\" border=\"0\" usemap=\"#garabatos\" /></td>
         </tr>
       </table>
      </td>
    </tr>
    <tr>
     <td style=\"width: 100%; color: #000; padding: 10px; font-size: 10px; text-align: center\">Una publicaci&oacute;n de <b>VideoExpress.org</b><br />La primera organizaci&oacute;n de alquiler, venta, difusi&oacute;n y exhibici&oacute;n de <b>Videos con principios y valores</b></td>
    </tr>
   </table>
  </div>
 </div>
 <div style=\"width: 700px; background-color: #000; color: #FFF; text-align: justify\">
  <table width=\"400\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">
	 <tr>
      <td>Est&aacute;s recibiendo este e-mail, porque esta direcci&oacute;n de e-mail $mail[0] fue registrada en http://www.videoexpress.org/enews para recibir comunicaciones relevantes.<br />
Puedes no recibir ninguna informaci&oacute;n de VideoExpress.org.<br />
Para no recibir m&aacute;s correo de VideoExpress.org, da click <a href=\"http://www.videoexpress.org/enews/suscribirse.php?ac=unsuscribirse&amp;email=$email[0]\">Aqu&iacute;</a>;
      </td>
     </tr>
    </table>
 </div>
 <div id=\"linkweb\">Cont&aacute;ctenos a <a href=\"mailto:news@videoexpress.org; gerencia@videoexpress.org\" class=\"linkweb\"><u>news@videoexpress.org</u>  / <u>gerencia@videoexpress.org</u></a><br />
    Tel.: (57 1) 526 9007  &bull; Cel.: 312 4907879<br />
    Bogot&aacute; - Colombia
    &bull; &copy; VideoExpress.org</a>. 2009.
 </div>
</center>

<map name=\"paraeditar\" id=\"paraeditar\">
  <area shape=\"rect\" coords=\"0,0,247,109\" href=\"http://www.videoexpress.org/enews/seccion.php?seccion=para_editar&id=$info[No]; \" alt=\"Para editar...\" />
</map>
<map name=\"primerafila\" id=\"primerafila\">
  <area shape=\"rect\" coords=\"0,0,247,109\" href=\"http://www.videoexpress.org/enews/seccion.php?seccion=primera_fila&id=$info[No];\" alt=\"En primera fila\" />
</map>
<map name=\"nuevamente\" id=\"nuevamente\">
  <area shape=\"rect\" coords=\"0,0,247,109\" href=\"http://www.videoexpress.org/enews/seccion.php?seccion=nueva_mente&id=$info[No]\" alt=\"Nueva...mente\" />
</map>
<map name=\"buenasnuevas\" id=\"buenasnuevas\">
  <area shape=\"rect\" coords=\"0,0,247,109\" href=\"http://www.videoexpress.org/enews/seccion.php?seccion=buenas_nuevas&id=$info[No]\" alt=\"Buenas nuevas para ver\" />
</map>
<map name=\"garabatos\" id=\"garabatos\">
  <area shape=\"rect\" coords=\"0,0,247,109\" href=\"http://www.videoexpress.org/enews/seccion.php?seccion=garabatos&id=$info[No]\" alt=\"Videos y Garabatos\" />
</map>
</body>
</html>";

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
		$mail->Mailer = "mail";

		//Asignamos a Host el nombre de nuestro servidor smtp
		//$mail->Host = "smtp.videoexpress.org";

		//Le indicamos que el servidor smtp requiere autenticación
		//$mail->SMTPAuth = true;

		//Le decimos cual es nuestro nombre de usuario y password
		//$mail->Username = "enews@videoexpress.org"; 
		//$mail->Password = "Videx.enews";

		//Indicamos cual es nuestra dirección de correo y el nombre que 
		//queremos que vea el usuario que lee nuestro correo
		$mail->From = "enews@videoexpress.org";
		$mail->FromName = "Enews Videoexpress.org";

		//el valor por defecto 10 de Timeout es un poco escaso dado que voy a usar 
		//una cuenta gratuita, por tanto lo pongo a 30  
		//$mail->Timeout=30;
  
		//Asignamos asunto y cuerpo del mensaje
		//El cuerpo del mensaje lo ponemos en formato html, haciendo 
		//que se vea en negrita
		$mail->Subject = "$asunto";
		$mail->Body = "$mensaje";
		//Definimos AltBody por si el destinatario del correo no admite email con formato html 
		$mail->AltBody = "Si no puede ver correctamente este correo de click http://www.videoexpress.org/enews";
		
		$mail->AddAddress("felipecamachogonzalez@gmail.com","Felipe");
		$exito = $mail->Send();
		$mail->ClearAddresses();
		if(!$exito) echo "No se envío el correo a felipe";
		else echo "Se envio el correo a felipe";

		/*while ($row = mysql_fetch_object($result2))
		{
			$email = $row->email;
			$nombre = $row->nombre;

	 		//Indicamos cual es la dirección de destino del correo
  			$mail->AddAddress("$email","$nombre");

			//se envia el mensaje, si no ha habido problemas 
			//la variable $exito tendra el valor true
			$exito = $mail->Send();
			
			if(!$exito) $en_mail_error .= $email.", ";
			else $en_mail .= $email.", ";

  			//Si el mensaje no ha podido ser enviado se realizaran 4 intentos mas como mucho 
			//para intentar enviar el mensaje, cada intento se hara 5 segundos despues 
  			//del anterior, para ello se usa la funcion sleep	
  			/*$intentos=1;
  			while ((!$exito) && ($intentos < 2))
			{
				sleep(5);
				//echo $mail->ErrorInfo;
				$exito = $mail->Send();
				$intentos=$intentos+1;
			}*/
			/*$mail->ClearAddresses();
		}*/

		/*if($en_mail_error != "")
		{
			//me envio un mail de confirmación de la tarea
			$mail->Body = "No se envío correo a ningún suscrito en enews";
			$mail->AddAddress("felipecamachogonzalez@gmail.com","Felipe");
			$exito = $mail->Send();
			$mail->ClearAddresses();
		}
		else
		{
			if($ultimo == 0)
			{
				$query = "UPDATE programacion_mail SET ";
				$query .= "programado='1', ";
				$x = $final + 1;
				$y = $x + 17;
				$query .= "inicio='$x', ";
				$query .= "final='$y' ";
				$query .= "WHERE No='1'";
				mysql_query($query) or die(mysql_error());
			}
			else
			{
				$query = "UPDATE programacion_mail SET ";
				$query .= "programado='0', ";
				$query .= "inicio='0', ";
				$query .= "final='0' ";
				$query .= "WHERE No='1'";
				mysql_query($query) or die(mysql_error());
			}*/
			//me envio un mail de confirmación de la tarea
		//}
		mysql_free_result($result);
		mysql_free_result($result1);
		mysql_free_result($result2);
	}

function resultados($id)
{
	$sql = "select COUNT(*) FROM inicio";
	$result = mysql_query($sql) or die("La siguiente consulta contiene alg&uacute;n error:<br>nSQL: <b>$sql</b>");
	$total_resultados = mysql_fetch_array($result);
	
	$tmp = $total_resultados[0];
	$info[tr] = $tmp;
	
	if ($id == NULL || $id <= 0 || $id > $tmp) $id = $total_resultados[0];

	$sql = "SELECT * FROM inicio WHERE No = '$id'";
	
	$result = mysql_query($sql) or die("La siguiente consulta contiene alg&uacute;n error:<br>nSQL: <b>$cadbusca</b>");

	$No_items = 0;
	while ($row = mysql_fetch_array($result))
	{
		$info[No] 					= "{$row['No']}";
		$info[titulo_paraeditar]	= "{$row['titulo_paraeditar']}";
		$info[cuerpo_paraeditar] 	= "{$row['cuerpo_paraeditar']}";
		$info[titulo_primerafila]	= "{$row['titulo_primerafila']}";
		$info[cuerpo_primerafila] 	= "{$row['cuerpo_primerafila']}";
		$info[titulo_nuevamente]	= "{$row['titulo_nuevamente']}";
		$info[cuerpo_nuevamente] 	= "{$row['cuerpo_nuevamente']}";
		$info[titulo_buenasnuevas]	= "{$row['titulo_buenasnuevas']}";
		$info[cuerpo_buenasnuevas] 	= "{$row['cuerpo_buenasnuevas']}";
		$info[titulo_garabatos]		= "{$row['titulo_garabatos']}";
		$info[cuerpo_garabatos] 	= "{$row['cuerpo_garabatos']}";
		$info[fecha]				= "{$row['fecha']}";
		$info[fondo]				= "{$row['fondo']}";
		$No_items++;
	}
	
	return $info;
}
?>
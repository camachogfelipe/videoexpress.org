<?php
$nombre = $_REQUEST['nombre'];
$telefono = $_REQUEST['telefono'];
$celular = $_REQUEST['celular'];
$email = $_REQUEST['email'];
$mensaje = $_REQUEST['mensaje'];
$enviar = $_REQUEST['enviar'];
$mail_contacto = $_REQUEST['mail_contacto'];

switch($mail_contacto)
	{
		case "rectoria" 		: $email_envio = "rectoria@liceoanglocolombiano.edu.co";
								  break;
		case "administracion" 	: $email_envio = "administracion@liceoanglocolombiano.edu.co";
								  break;
		case "general" 			: $email_envio = "administracion@liceoanglocolombiano.edu.co, ";
						 		  $email_envio .= "isabel.diaz@liceoanglocolombiano.edu.co";
						 		  break;
		case "ingles" 			: $email_envio = "isabel.robledo@liceoanglocolombiano.edu.co, ";
								  $email_envio .= "andres.lopez@liceoanglocolombiano.edu.co, ";
								  $email_envio .= "juan.obando@liceoanglocolombiano.edu.co, ";
								  $email_envio .= "ingles@liceoanglocolombiano.edu.co";
								  break;
		case "matematicas"		: $email_envio = "carol.marin@liceoanglocolombiano.edu.co, ";
								  $email_envio .= "andres.lopez@liceoanglocolombiano.edu.co";
								  break;
		case "espanol"			: $email_envio = "milena.lopez@liceoanglocolombiano.edu.co";
						  		  break;
		case "sociales"			: $email_envio = "andres.gaitan@liceoanglocolombiano.edu.co, ";
								  $email_envio .= "paola.zarate@liceoanglocolombiano.edu.co";
								  break;
		case "ciencias"			: $email_envio = "milena.morales@liceoanglocolombiano.edu.co";
								  break;
		case "ed.fisica"		: $email_envio = "jorge.sepulveda@liceoanglocolombiano.edu.co";
								  break;
		case "arte"				: $email_envio = "alexandra.lopero@liceoanglocolombiano.edu.co";
								  break;
		case "filosofia"		: $email_envio = "alberto.zapata@liceoanglocolombiano.edu.co";
								  break;
		case "musica"			: $email_envio = "wilmer.tangarife@liceoanglocolombiano.edu.co";
								  break;
		default					: $email_envio = "administracion@liceoanglocolombiano.edu.co";
								  break;
	}

if ($enviar == true && $nombre != NULL && $telefono != NULL && $celular != NULL && $mensaje != NULL)
{
	$asunto = "Contacto desde la página del colegio";
	
	$cuerpo = "<html> 
				<head>
				 <title>Correo de contacto</title>
				</head>
				<body>
				 Hola!!
				 <p>$nombre, se ha contactado a través de la página web</p>
				 Sus datos son:
				 <p>Nombre completo: $nombre<br />
				 E-mail: $email<br />
				 Teléfono: $telefono<br />
				 Celular: $celular</p>
				 Mensaje: <p>$mensaje</p>
				</body> 
			   </html>";

	$headers = "X-Mailer:PHP/".phpversion()."\n";
	$headers .= "Mime-Version: 1.0\n";
	$headers .= "Content-Type: text/html; charset=iso-8859-1\n"; 
	
	//dirección del remitente 
	$headers .= "From: $nombre <$email>\n"; 
	mail($email_envio, $asunto, $cuerpo, $headers);

	echo '<script languaje="Javascript">location.href="http://www.liceoanglocolombiano.edu.co"</script>';
}
if ($mail_contacto == NULL)
{
?>
<center>
<table width="350" height="350" cellspacing="0" cellpadding="0" border="0" style="text-align: center">
   <tr>
    <td width="110" height="110"><a href="?ac=5&mail_contacto=rectoria"><img src="imagenes/rectoria.png" width="110" height="110" border="0"></a></td>
    <td width="110" height="110"><a href="?ac=5&mail_contacto=administracion"><img src="imagenes/administracion.png" width="110" height="110" border="0"></a></td>
    <td width="110" height="110"><a href="?ac=5&mail_contacto=general"><img src="imagenes/general.png" width="110" height="110" border="0"></a></td>
   </tr>
   <tr>
    <td width="110" height="110"><a href="?ac=5&mail_contacto=ingles"><img src="imagenes/ingles.png" width="110" height="110" border="0"></a></td>
    <td width="110" height="110"><a href="?ac=5&mail_contacto=matematicas"><img src="imagenes/matematicas.png" width="110" height="110" border="0"></a></td>
    <td width="110" height="110"><a href="?ac=5&mail_contacto=espanol"><img src="imagenes/espanol.png" width="110" height="110" border="0"></a></td>
   <tr>
    <td width="110" height="110"><a href="?ac=5&mail_contacto=sociales"><img src="imagenes/sociales.png" width="110" height="110" border="0"></a></td>
    <td width="110" height="110"><a href="?ac=5&mail_contacto=ciencias"><img src="imagenes/ciencias.png" width="110" height="110" border="0"></a></td>
    <td width="110" height="110"><a href="?ac=5&mail_contacto=ed.fisica"><img src="imagenes/edfisica.png" width="110" height="110" border="0"></a></td>
   </tr>
   <tr>
    <td width="110" height="110"><a href="?ac=5&mail_contacto=arte"><img src="imagenes/arte.png" width="110" height="110" border="0"></a></td>
    <td width="110" height="110"><a href="?ac=5&mail_contacto=filosofia"><img src="imagenes/filosofia.png" width="110" height="110" border="0"></a></td>
    <td width="110" height="110"><a href="?ac=5&mail_contacto=musica"><img src="imagenes/musica.png" width="110" height="110" border="0"></a></td>
   </tr>
</table>
<center>
<?php
}
if ($mail_contacto != NULL)
{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin título</title>
<script>
//Pon en la variable obligatorios el name de todos los campos que deben rellenar

obligatorio = ["nombre", "telefono", "celular", "email", "mensaje"];
vacio = 0;

//Pon en la veriable textoObligatorio el texto que quieres que aparezca en el alert

textoObligatorio=["Nombre", "Telefono", "Celular", "E-mail", "Mensaje"];

function comprobar(este)
{
	for(a=0; a<obligatorio.length; a++)
	{
		if (este.elements[obligatorio[3]].value != "")
		{
			isMail(este.elements[obligatorio[3]].value);
			if (x == 1)
			{
				este.elements[obligatorio[a]].focus();
				return false;
			}
		}
				
		if(este.elements[obligatorio[a]].value == "")
		{
			if (a != 3)
			{
				if (a == 0)
				{
					alert("El campo "+textoObligatorio[a]+" esta vacío.\nPor favor rellena este campo.");
					este.elements[obligatorio[a]].focus();
					return false;
				}
				if (este.elements[obligatorio[1]].value == "") { vacio += 1; }
				if (este.elements[obligatorio[2]].value == "") { vacio += 1; }
				if (vacio == 2)
				{
					alert("Debes ingresar al menos un número de contacto");
					este.elements[obligatorio[1]].focus();
					return false;
				}
				if (a == 4)
				{
					alert("El campo "+textoObligatorio[a]+" esta vacío.\nPor favor rellena este campo.");
					este.elements[obligatorio[a]].focus();
					return false;
				}
			}
		}
	}
	return true;
}

function isMail(Cadena) {   
  
    Punto = Cadena.substring(Cadena.lastIndexOf('.') + 1, Cadena.length);            // Cadena del .com   
    Dominio = Cadena.substring(Cadena.lastIndexOf('@') + 1, Cadena.lastIndexOf('.'));    // Dominio @lala.com   
    Usuario = Cadena.substring(0, Cadena.lastIndexOf('@'));                  // Cadena lalala@   
    Reserv = "@/º\"\'+*{}\\<>?¿[]áéíóú#·¡!^*;,:";                      // Letras Reservadas   
       
    // Añadida por El Codigo para poder emitir un alert en funcion de si email valido o no   
    valido = true;   
       
    // verifica qie el Usuario no tenga un caracter especial   
    for (var Cont=0; Cont<Usuario.length; Cont++)
	{   
        X = Usuario.substring(Cont,Cont+1);
        if (Reserv.indexOf(X)!=-1) valido = false;
    }   
  
    // verifica qie el Punto no tenga un caracter especial   
    for (var Cont=0; Cont<Punto.length; Cont++)
	{   
        X=Punto.substring(Cont,Cont+1);
        if (Reserv.indexOf(X)!=-1) valido = false;
    }   
                           
    // verifica qie el Dominio no tenga un caracter especial   
    for (var Cont=0; Cont<Dominio.length; Cont++)
	{   
        X=Dominio.substring(Cont,Cont+1);
        if (Reserv.indexOf(X)!=-1) valido = false;
        }   
  
    // Verifica la sintaxis básica.....   
    if (Punto.length<2 || Dominio <1 || Cadena.lastIndexOf('.')<0 || Cadena.lastIndexOf('@')<0 || Usuario<1)
	{   
        valido = false;
    }   
       
    // Añadido por El Código para que emita un alert de aviso indicando si email válido o no   
    if (valido)
	{   
		return x = 0;
    }
	else
	{   
        alert('El campo Email está vacio o no es válido.');
		return x = 1;
    }   
}
</script>
</head>

<body>
<p id="encabezado">Ll&aacute;manos</p>
Tel&eacute;fono: 315 5006779 - 315 5471951 - 315 3782003<br />
Fax: (6) 758 68 06
<p id="encabezado">Escríbenos</p>
<form action="index.php?ac=5&enviar=true&mail_contacto=<?php echo $mail_contacto ?>" method="post" enctype="multipart/form-data" onSubmit="return comprobar(this)">
<table width="100%" border="0" cellspacing="3px" cellpadding="0" style="border: 1px solid #CCC; background-color:#FFFFCC">
  <tr>
    <td>
      <table width="100%" border="0" cellspacing="3px" cellpadding="0">
       <tr>
        <td width="25%" style="border-right: 1px solid #CCC">Dirigido a:</td><td><?php echo $mail_contacto."@liceoanglocolombiano.edu.co"; ?></td>
       </tr>
  		<tr>
		  <td width="25%" style="border-right: 1px solid #CCC">* Nombre completo</td>
    	  <td width="75%"><input name="nombre" type="text" id="nombre" tabindex="1" size="40" maxlength="150" /></td>
		</tr>
  		<tr>
    	  <td style="border-right: 1px solid #CCC">** Tel&eacute;fono</td>
    	  <td><input name="telefono" type="text" id="telefono" tabindex="2" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue=false;" size="10" maxlength="15" /></td>
  		</tr>
  		<tr>
    	  <td style="border-right: 1px solid #CCC">** Celular</td>
  	      <td><input name="celular" type="text" id="celular" tabindex="3" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue=false;" size="10" maxlength="10" /></td>
  		</tr>
  		<tr>
    	  <td style="border-right: 1px solid #CCC">Email</td>
		  <td><input name="email" type="text" id="email" tabindex="4" size="40" maxlength="150" /></td>
  		</tr>
	  </table>
    </td>
  </tr>
  <tr>
    <td><span style="border-right: 1px solid #CCC">*</span> Mensaje<br /><br /><textarea name="mensaje" cols="70" rows="10" id="mensaje" tabindex="5"></textarea></td>
  </tr>
  <tr style="text-align: center">
    <td><input type="submit" name="submit" id="submit" value="Enviar" tabindex="7" /><input name="limpiar" type="reset" value="Limpiar el formulario" tabindex="6" /></td>
  </tr>
</table>
* Campos obligatorios<br />** Debes ingresar al menos un número de contácto
</form>
</body>
</html>
<?php
}
?>
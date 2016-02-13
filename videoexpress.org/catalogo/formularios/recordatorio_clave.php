<?php
$email	 = $_REQUEST['email'];
$mensaje[0] = -1;
$mensaje[1] = "<p style='font-weight: bold'>La cuenta de correo no es correcta o usted no está afiliado</p>";

//sacamos la fecha para determinar el codigo de usuario
include("../include/funciones_globales.php");
include("../include/funciones_generales.php");

if ($email != NULL)
{
	$conecta = conecta_bd("videoexpress");
	$checkemail = mysql_query("SELECT email FROM usuarios WHERE email='$email'");
	$email_exist = mysql_num_rows($checkemail);

	if ($email_exist>0)
	{
		mail_clave($email);
		$mensaje[0] = 1;
		$mensaje[1] = "<p style='font-weight: bold; font-size: 16px'>Se ha enviado un mensaje al correo registrado, por favor verifíquelo.</p><p style='font-weight: bold; font-size: 16px'>Su contraseña ha sido regenerada.</p>";
	}
	else $mensaje[0] = 0;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//ES" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Recordación clave</title>
<script>
//Pon en la variable obligatorios el name de todos los campos que deben rellenar

obligatorio = ["email"];

//Pon en la veriable textoObligatorio el texto que quieres que aparezca en el alert

textoObligatorio=["Correo electronico"];

function comprobar(este)
{
	for(a=0; a<obligatorio.length; a++)
	{
		if (a == 0)
		{
			isMail(este.elements[obligatorio[0]].value);
			if (x == 1)
			{
				este.elements[obligatorio[a]].focus();
				return false;
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
       
    // verifica que el Usuario no tenga un caracter especial   
    for (var Cont=0; Cont<Usuario.length; Cont++)
	{   
        X = Usuario.substring(Cont,Cont+1);
        if (Reserv.indexOf(X)!=-1) valido = false;
    }   
  
    // verifica que el Punto no tenga un caracter especial   
    for (var Cont=0; Cont<Punto.length; Cont++)
	{   
        X=Punto.substring(Cont,Cont+1);
        if (Reserv.indexOf(X)!=-1) valido = false;
    }   
                           
    // verifica que el Dominio no tenga un caracter especial   
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
        alert('Email no válido.');
		return x = 1;
    }   
}
</script>
<link href="../estilo.css" rel="stylesheet" type="text/css" />
</head>

<body style="background:url(../Imagenes_pagina/fondo_alfa.png); padding: 5px">
<div id='titulo_informacion'><strong>Formulario para solicitar la recordaci&oacute;n de su clave</strong></div>
<div id='contenido_informacion'>
<?php
if($mensaje[0] == -1 || $mensaje[0] == 0)
{
?>
<p>Si usted ha olvidado su contrase&ntilde;a de ingreso a nuestro portal debe ingresar su direcci&oacute;n de correo electr&oacute;nico con la cual ingresa a nuestro portal.</p>
  Est&aacute; contrase&ntilde;a ser&aacute; regenerada y enviada a la direcci&oacute;n de correo registrada, y luego debe ser cambiada por una de su preferencia.
<p>Administraci&oacute;n VideoExpress.org</p>
<form name="clave" id="clave" method='post' action='recordatorio_clave.php' onSubmit="return comprobar(this)">
  <table width="600" border="0" cellspacing="2" cellpadding="0" align="center" style="border: 2px solid #999">
    <tr>
      <td width="185">Correo electr&oacute;nico</td>
      <td width="289"><input name="email" type="text" id="email" tabindex="1" size="47" maxlength="200" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><a href="#" onclick="javascript:document.clave.reset()"><img src="../Imagenes_pagina/limpiar.png" width="100" height="25" border="0" /></a>&nbsp;<input type="image" src="../Imagenes_pagina/boton_enviar.png" name="submit" value="submit" tabindex="2" /></td>
    </tr>
  </table>
</form>
<?php
		if($mensaje[0] == 0) echo $mensaje[1];
	}
	elseif($email_exist > 0 and $mensaje[0] == 1) echo $mensaje[1];
?>
</div>
</body>
</html>
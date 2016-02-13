<?php
session_start();

if (isset($_SESSION['user_admin']))
{
	$nombre				= $_REQUEST['nombre'];
	$direccion			= $_REQUEST['direccion'];
	$barrio				= $_REQUEST['barrio'];
	$tel_oficina		= $_REQUEST['tel_oficina'];
	$tel_oficina2		= $_REQUEST['tel_oficina2'];
	$tel_casa			= $_REQUEST['tel_casa'];
	$celular			= $_REQUEST['celular'];
	$email				= $_REQUEST['email'];
	$clave_acceso		= md5('videoexpress');
	$iglesia_congrega	= $_REQUEST['iglesia'];
	$cortesia			= $_REQUEST['cortesia'];
	$alquiler			= $_SESSION['alquiler_admin'];
	$afiliacion			= $_SESSION['afiliacion_admin'];
	
	//sacamos la fecha para determinar el codigo de usuario
	include("../include/funciones_globales.php");
	include("../include/funciones_generales.php");
	$conecta = conecta_bd("videoexpress");
	
	$result = consulta_bd("actualizacion","num_afiliado, alquiler, afiliacion","-1;;;;");
	while($row=mysql_fetch_object($result))
	{
		$num = $row->num_afiliado;
		$alquiler = $row->alquiler;
		$afiliacion = $row->afiliacion;
	}
	$num++;
	$codigo_cliente = date(Y);
	$codigo_cliente .= date(m);
	$codigo_cliente .= date(d)."-";
	$codigo_cliente .= $num;

	if ($nombre != NULL && $email != NULL)
	{
		$checkemail = consulta_bd("usuarios","email","1;;;email='$email';");
		$email_exist = mysql_num_rows($checkemail);

		if ($email_exist>0)
		{
			echo "<center>";
			echo "<span id='menu_admon2' style='border: 1px solid #09C; padding: 2px; background-color: #EFF'>";
			echo "La cuenta de correo ya est&aacute; en uso, por favor verifique el listado de clientes";
			echo "</span>";
			echo "</center><br />";
		}
		else
		{
			//Todo parece correcto procedemos con la inserccion
			$tabla = "usuarios";
			$columna = "codigo_cliente, nombre, email, tel_oficina, tel_oficina2, tel_casa, celular, direccion, barrio, clave_acceso, iglesia_congrega, activo";
			$valores ="'$codigo_cliente', '$nombre', '$email','$tel_oficina','$tel_oficina2','$tel_casa','$celular', '$direccion', '$barrio', '$clave_acceso', '$iglesia_congrega', 'no'";
			$query = ing_datos_tabla($tabla,$columna,$valores);
			$query = act_datos_tabla("actualizacion","num_afiliado='$num'","","");

			$fecha = date("j-m-Y H:i:s");
			
			if($cortesia == "si") $afiliacion = 0;

			$columna = "id_comprador, tipo, articulos, cantidades, precios_unitarios, precio, fecha_emision";
			$valores = "'$codigo_cliente', 'Afiliación+Alquiler+Alquiler+', 'Afiliación a videoexpress+Pelicula de cortesia 1+Pelicula de cortesia 2+', '1+1+1+', '$afiliacion+0+0+', '$afiliacion', '$fecha'";
			$query = ing_datos_tabla("pedidos",$columna,$valores);

			$asunto = "Afiliacion nueva";
			$headers = "X-Mailer:PHP/".phpversion()."\n"; $headers .= "Mime-Version: 1.0\n"; $headers .= "Content-Type: text/html; charset=iso-8859-1\n";
			$cuerpo = "Bienvenido a VideoExpress.org<p>Usted se ha afiliado en el día de hoy, por lo que pronto será contáctado por uno de nuestros asesores</p>Gracias<p>Atentamente,</p>Gerencia VideoExpress.org";
			mail($email, $asunto, $cuerpo, $headers);
			echo "Su afiliación ha sido exitosa<br />Por favor verifica tu email de contácto";
		}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Afiliación a VideoExpress.org</title>
<script>
//Pon en la variable obligatorios el name de todos los campos que deben rellenar

obligatorio = ["nombre", "direccion", "barrio", "tel_oficina", "tel_oficina2", "tel_casa", "celular", "email", "clave", "iglesia"];
vacio = 0;

//Pon en la veriable textoObligatorio el texto que quieres que aparezca en el alert

textoObligatorio=["Nombre", "Direccion", "Barrio", "", "", "", "Celular", "Correo electronico", "Clave de acceso", "Iglesia"];

function comprobar_afiliacion(este)
{
	for(a=0; a<obligatorio.length; a++)
	{
		if(a == 3 || a == 4 || a == 5 || a == 6)
		{
			if(este.elements[obligatorio[a]].value == "") { vacio += 1; }
			if(vacio == 4)
			{
				alert("Por favor ingrese al menos un numero de contacto");
				este.elements[obligatorio[3]].focus();
				vacio = 0;
				return false;
			}
		}
		
		if (a == 7)
		{
			isMail(este.elements[obligatorio[7]].value);
			if (x == 1)
			{
				este.elements[obligatorio[a]].focus();
				return false;
			}
		}
		
		if(a == 0 || a == 1 || a == 2 || a == 8 || a == 9)
		{
			if(este.elements[obligatorio[a]].value == "")
			{
				alert("Por favor, rellena el campo "+textoObligatorio[a]);
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

<body style="color: #000">
<div id='titulo_informacion'><strong>Formulario de afiliación a videoexpress.org</strong></div>
<div id='contenido_informacion'>
<form name="afiliacion" id="afiliacion" method='post' action='afiliar_usuario.php' onSubmit="return comprobar_afiliacion(this)">
<table width="600" border="0" cellspacing="2" cellpadding="0" align="center" style="border-style:dotted; background-color: #9ABEDC; color:#000">
  <tr>
  	<td width="26">*</td>
    <td width="185">Nombre completo</td>
    <td width="289"><input name="nombre" type="text" id="nombre" tabindex="1" size="47" maxlength="200" /></td>
  </tr>
  <tr>
  	<td>*</td>
    <td>Direcci&oacute;n</td>
    <td><input name="direccion" type="text" id="direccion" tabindex="2" size="47" maxlength="150" /></td>
  </tr>
  <tr>
  	<td>*</td>
    <td>Barrio</td>
    <td><input name="barrio" type="text" id="barrio" tabindex="3" size="30" /></td>
  </tr>
  <tr>
  	<td>**</td>
    <td>Tel&eacute;fono oficina</td>
    <td><input name="tel_oficina" type="text" id="tel_oficina" tabindex="4" size="30" maxlength="10" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue=false;" /></td>
  </tr>  
  <tr>
  	<td>**</td>
    <td> Tel&eacute;fono oficina2</td>
    <td><input name="tel_oficina2" type="text" id="tel_oficina2" tabindex="5" size="30" maxlength="10" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue=false;" /></td>
  </tr>
  
  <tr>
  	<td>**</td>
    <td>Tel&eacute;fono casa</td>
    <td><input name="tel_casa" type="text" id="tel_casa" tabindex="6" size="30" maxlength="7" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue=false;" /></td>
  </tr>
  <tr>
  	<td>**</td>
    <td>Celular</td>
    <td><input name="celular" type="text" id="celular" tabindex="7" size="30" maxlength="10" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue=false;" /></td>
  </tr>
  <tr>
  	<td>***</td>
    <td>Correo electr&oacute;nico</td>
    <td><input name="email" type="text" id="email" tabindex="8" size="47" maxlength="200" /></td>
  </tr>
  </tr>
  <tr>
  	<td>*</td>
    <td>Iglesia en la que se congrega</td>
    <td><input name="iglesia" type="text" id="iglesia" tabindex="9" size="47" maxlength="500" /></td>
  </tr>
  <tr>
  	<td>*</td>
    <td>&iquest;Es una afiliación de cortes&iacute;a?</td>
    <td>Si 
      <input type="radio" name="cortesia" id="cortesia" value="si" tabindex="10" />
      No <input name="cortesia" type="radio" id="cortesia" tabindex="11" value="no" checked="checked" /></td>
  </tr>
  <tr>
    <td colspan="3" align="center"><a href="#" onclick="javascript:document.afiliacion.reset()"><img src="../Imagenes_pagina/limpiar.png" width="100" height="25" border="0" /></a>&nbsp;<input type="image" src="../Imagenes_pagina/afiliarse.png" name="submit" value="submit" tabindex="12" /></td>
  </tr>
  <tr>
  	<td>*<br />**<br />***</td>
    <td colspan="2" align="left">
     Campos obligatorios<br />Debe ingresar al menos un número de contacto<br />
     El email ser&aacute; su nombre de usuario para ingresar a la Zona de Afiliados
    </td>
  </tr>
</table>
</form>
</div>
</body>
</html>
<?php
}
else
{
	include ('index.php');
}
?>
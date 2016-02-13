<?php
session_start();

  // check session variable

if (isset($_SESSION['user_admin']))
{
	$id 			= $_REQUEST['id'];
	$nombre 		= $_REQUEST['nombre'];
	$direccion		= $_REQUEST['direccion'];
	$barrio			= $_REQUEST['barrio'];
	$tel_oficina	= $_REQUEST['tel_oficina'];
	$tel_oficina2	= $_REQUEST['tel_oficina2'];
	$tel_casa		= $_REQUEST['tel_casa'];
	$celular		= $_REQUEST['celular'];
	$email			= $_REQUEST['email'];
	$iglesia		= $_REQUEST['iglesia'];
	$pag			= $_REQUEST['pag'];
	$pagina			= $_REQUEST['pagina'];
	$orden			= $_REQUEST['orden'];
	$editar			= $_REQUEST['editar'];
	$texto_busqueda = $_REQUEST['texto_busqueda'];
	$lugar_busqueda = $_REQUEST['lugar_busqueda']; echo "<br>";

	if ($editar == true)
	{
		include('../../include/funciones_globales.php');
		$conecta = conecta_bd("videoexpress");

		//Todo parece correcto procedemos con la inserccion
		$datos = "nombre='$nombre', email='$email', tel_oficina='$tel_oficina', tel_oficina2='$tel_oficina2', tel_casa='$tel_casa', celular='$celular', direccion='$direccion', barrio='$barrio', iglesia_congrega='$iglesia'";
		$concepto = "codigo_cliente='$id'";
		$query = act_datos_tabla("usuarios",$datos,$concepto,1);
		$nombre	= $direccion = $barrio = $tel_oficina = $tel_oficina2 = $tel_casa = $celular = $email = $iglesia = $id = NULL;
		echo "<script languaje='Javascript'>location.href='$pagina.php?pag=$pag&orden=$orden&texto_busqueda=$texto_busqueda&lugar_busqueda=$lugar_busqueda'</script>";
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
<link href="../../estilo.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id='titulo_informacion'>Edici&oacute;n de usuario de videoexpress.org</div>
<div id='contenido_informacion'>
<form name="edicion" id="edicion" method='post' action='editar_usuario.php?editar=true&id=<?php echo $id ?>&pag=<?php echo $pag ?>&pagina=<?php echo $pagina ?>&orden=<?php echo $orden ?>&lugar_busqueda=<?php echo $lugar_busqueda ?>&texto_busqueda=<?php echo $texto_busqueda ?>' onSubmit="return comprobar_afiliacion(this)">
<table width="600" border="0" cellspacing="2" cellpadding="0" align="center" style="border-style:dotted; background-color: #9ABEDC; color:#000">
  <tr>
  	<td width="26">*</td>
    <td width="185">Nombre completo</td>
    <td width="289"><input name="nombre" type="text" id="nombre" tabindex="1" size="47" maxlength="200" value="<?php echo $nombre ?>" /></td>
  </tr>
  <tr>
  	<td>*</td>
    <td>Direcci&oacute;n</td>
    <td><input name="direccion" type="text" id="direccion" tabindex="2" size="47" maxlength="150" value="<?php echo $direccion ?>" /></td>
  </tr>
  <tr>
  	<td>*</td>
    <td>Barrio</td>
    <td><input name="barrio" type="text" id="barrio" tabindex="3" size="30" value="<?php echo $barrio ?>" /></td>
  </tr>
  <tr>
  	<td>**</td>
    <td>Tel&eacute;fono oficina</td>
    <td><input name="tel_oficina" type="text" id="tel_oficina" tabindex="4" size="30" maxlength="10"  value="<?php echo $tel_oficina ?>" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue=false;" /></td>
  </tr>  
  <tr>
  	<td>**</td>
    <td> Tel&eacute;fono oficina2</td>
    <td><input name="tel_oficina2" type="text" id="tel_oficina2" tabindex="5" size="30" maxlength="10" value="<?php echo $tel_oficina2 ?>" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue=false;" /></td>
  </tr>
  
  <tr>
  	<td>**</td>
    <td>Tel&eacute;fono casa</td>
    <td><input name="tel_casa" type="text" id="tel_casa" tabindex="6" size="30" maxlength="7" value="<?php echo $tel_casa ?>" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue=false;" /></td>
  </tr>
  <tr>
  	<td>**</td>
    <td>Celular</td>
    <td><input name="celular" type="text" id="celular" tabindex="7" size="30" maxlength="10" value="<?php echo $celular ?>" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue=false;" /></td>
  </tr>
  <tr>
  	<td>***</td>
    <td>Correo electr&oacute;nico</td>
    <td><input name="email" type="text" id="email" tabindex="8" size="47" value="<?php echo $email ?>" maxlength="200" /></td>
  </tr>
  <tr>
  	<td>*</td>
    <td>Iglesia en la que se congrega</td>
    <td><input name="iglesia" type="text" id="iglesia" tabindex="10" size="47" maxlength="500" value="<?php echo $iglesia ?>" /></td>
  </tr>
  <tr>
    <td colspan="3" align="center"><a href="#" onclick="javascript:document.edicion.reset()"><img src="../../Imagenes_pagina/limpiar.png" width="100" height="25" border="0" /></a>&nbsp;<input type="image" src="../../Imagenes_pagina/boton_enviar.png" name="submit" value="submit" tabindex="11" /></td>
  </tr>
  <tr>
  	<td>*<br />**<br />***</td>
    <td colspan="2" align="left">
     Campos obligatorios<br />Debe ingresar al menos un número de contacto<br />
     El email ser&aacute;  el nombre de usuario para ingresar a la Zona de Afiliados
     <p align="center"><a id="flechas" onclick="history.go(-1)" style="cursor:pointer" ><img src="../../botones/botonatras.png" alt="Regresar" width="25" height="25" align="absmiddle" /> Regresar</a></p>
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
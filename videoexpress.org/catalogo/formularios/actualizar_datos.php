<?php 
session_start();

include("../include/funciones_globales.php");

$codigo_cliente		= $_SESSION['codigo_cliente'];
$nombres			= $_REQUEST['nombres'];
$direccion			= $_REQUEST['direccion'];
$barrio				= $_REQUEST['barrio'];
$tel_oficina		= $_REQUEST['tel_oficina'];
if($tel_oficina != 0) $tel_oficina = "ext. ".$ext = $_REQUEST['ext'];
$tel_oficina1		= $_REQUEST['tel_oficina1'];
if($tel_oficina1 != 0) $tel_oficina = "ext. ".$ext1	= $_REQUEST['ext1'];
$tel_casa			= $_REQUEST['tel_casa'];
$celular			= $_REQUEST['celular'];
$email				= $_REQUEST['email'];
$ciudad				= $_REQUEST['ciudad'];
$pais				= $_REQUEST['pais'];
$iglesia_congrega	= $_REQUEST['iglesia_congrega'];
$existe				= $_REQUEST['existe'];
$continuar 			= $_REQUEST['continuar'];
$msj				= $_REQUEST['msj'];

$mensaje = NULL;

if($codigo_cliente == NULL) $existe=false;
else $existe = true;

if ($continuar == 'true' and $existe == 1 and $codigo_cliente != NULL)
{
	$conecta = conecta_bd("videoexpress");
	
	$tabla = "usuarios";
	$columna = "nombre='$nombres', email='$email', tel_oficina='$tel_oficina', tel_oficina2='$tel_oficina1', ";
	$columna .= "tel_casa='$tel_casa', celular='$celular', direccion='$direccion', barrio='$barrio', ";
	$columna .= "iglesia_congrega='$iglesia_congrega'";
	$concepto = "codigo_cliente='$codigo_cliente'";
	$inc = 1;
	$query = act_datos_tabla($tabla,$columna,$concepto,$inc);
	//$query = "UPDATE usuarios SET nombre='$nombres', email='$email', tel_oficina='$tel_oficina', tel_oficina2='$tel_oficina1', tel_casa='$tel_casa', celular='$celular', direccion='$direccion', barrio='$barrio', iglesia_congrega='$iglesia_congrega' WHERE codigo_cliente='$codigo_cliente'";
	//mysql_query($query) or die(mysql_error());
	$mensaje = "<img src=\"Imagenes_pagina/informacion.png\" width=\"25\" height=\"25\" align=\"absmiddle\" /> Sus datos se actualizaron con &eacute;xito";
	//$desconecta = desconecta_bd($conecta);
}
else
{
	$conecta = conecta_bd("videoexpress");
	
	$query = consulta_bd("usuarios","*","1;;;codigo_cliente='$codigo_cliente'");
	//$query = mysql_query("SELECT * FROM usuarios WHERE codigo_cliente = '$codigo_cliente'");

    while($row=mysql_fetch_object($query))
	{
		$nombres			= $row->nombre;
		$direccion			= $row->direccion;
		$barrio				= $row->barrio;
		$tel_oficina		= $row->tel_oficina;
		$tel_oficina1		= $row->tel_oficina1;
		$tel_casa			= $row->tel_casa;
		$celular			= $row->celular;
		$email				= $row->email;
		$iglesia_congrega	= $row->iglesia_congrega;
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&#237;tulo</title>
<script>
//Pon en la variable obligatorios el name de todos los campos que deben rellenar

obligatorio = ["nombres", "direccion", "barrio", "tel_oficina", "tel_oficina1", "tel_casa", "celular", "email"];

//Pon en la veriable textoObligatorio el texto que quieres que aparezca en el alert

textoObligatorio=["Nombre completo", "Direcci&oacute;n", "Barrio", "Tel&eacute;fono de oficina", "Tel&eacute;fono de oficina aux.", "Tel&eacute;fono de la casa", "Celular", "Correo electr&oacute;nico", "Igles&iacute;a en la que se congrega"];

function comprobar(este)
{
	for(a=0; a<obligatorio.length; a++)
	{
		if (este.elements[obligatorio[7]].value != "")
		{
			isMail(este.elements[obligatorio[7]].value);
			if (x == 1)
			{
				este.elements[obligatorio[7]].focus();
				return false;
			}
		}
		
		if(este.elements[obligatorio[a]].value == "")
		{
			alert("Por favor, rellena el campo "+textoObligatorio[a]);
			este.elements[obligatorio[a]].focus();
			return false;
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
<link href="../estilo.css" rel="stylesheet" type="text/css" />
</head>

<body background="Imagenes_pagina/fondo_alfa.png" style="; padding: 5px">
<form action="actualizar_datos.php?continuar=true&existe=<?php echo $existe ?>" method="post" enctype="multipart/form-data" name="confirmacion_datos" id="confirmacion_datos" onSubmit="return comprobar(this)">
<table width="600" border="0" align="center" cellpadding="0" cellspacing="2px">
  <tr>
    <td align="center" valign="middle" id="obligatorio">*</td>
    <td id="carrito">Nombre completo</td>
    <td><input name="nombres" type="text" id="nombres" tabindex="1" size="60" maxlength="100" value="<?php echo $nombres ?>" /></td>
  </tr>
  <tr>
    <td align="center" valign="middle" id="obligatorio">*</td>
    <td id="carrito">Direcci&oacute;n</td>
    <td><input name="direccion" type="text" id="direccion" tabindex="2" size="60" maxlength="150" value="<?php echo $direccion ?>" /></td>
  </tr>
  <tr>
    <td align="center" valign="middle" id="obligatorio">*</td>
    <td id="carrito">Barrio</td>
    <td><input name="barrio" type="text" id="barrio" tabindex="3" size="30" maxlength="150" value="<?php echo $barrio ?>" /></td>
  </tr>
  <tr>
    <td align="center" valign="middle" id="obligatorio">*</td>
    <td id="carrito">Tel&eacute;fono oficina</td>
    <td><input name="tel_oficina" type="text" id="tel_oficina" tabindex="4" size="12" maxlength="10" value="<?php echo $tel_oficina ?>" /> extensi&oacute;n <input name="ext" type="text" id="ext" size="10" tabindex="5" /></td>
  </tr>
  <tr>
    <td align="center" valign="middle" id="obligatorio">*</td>
    <td id="carrito">Tel&eacute;fono oficina 2</td>
    <td><input name="tel_oficina1" type="text" id="tel_oficina1" tabindex="6" size="12" maxlength="10" value="<?php echo $tel_oficina1 ?>" /> extensi&oacute;n <input name="ext1" type="text" id="ext1" size="10" tabindex="7" /></td>
  </tr>
  <tr>
    <td align="center" valign="middle" id="obligatorio">*</td>
    <td id="carrito">Tel&eacute;fono casa</td>
    <td><input name="tel_casa" type="text" id="tel_casa" tabindex="8" size="12" maxlength="10" value="<?php echo $tel_casa ?>" /></td>
  </tr>
  <tr>
    <td align="center" valign="middle" id="obligatorio">*</td>
    <td id="carrito">Celular</td>
    <td><input name="celular" type="text" id="celular" tabindex="9" size="12" maxlength="10" value="<?php echo $celular ?>" /></td>
  </tr>
  <tr>
    <td align="center" valign="middle" id="obligatorio">*</td>
    <td id="carrito">Correo electr&oacute;nico</td>
    <td><input name="email" type="text" id="email" tabindex="10" size="60" maxlength="150" value="<?php echo $email ?>" /></td>
  </tr>
  <tr>
    <td align="center" valign="middle" id="obligatorio">*</td>
    <td id="carrito">Igles&iacute;a en la que se congrega</td>
    <td><input name="iglesia_congrega" type="text" id="iglesia_congrega" tabindex="11" size="60" maxlength="150" value="<?php echo $iglesia_congrega ?>" /></td>
  </tr>
</table>
<table width="600" border="0" cellspacing="2px" cellpadding="0" align="center">
  <tr>
    <td width="300" align="right"><a href="javascript:document.confirmacion_datos.reset()"><img src="../Imagenes_pagina/limpiar.png" width="100" height="25" border="0" /></a></td>
    <td width="300"><input type="image" src="../Imagenes_pagina/ingresar.png" id="submit" name="submit" tabindex="12" /></td>
  </tr>
  <tr>
    <td colspan="2"><span id="obligatorio">*</span> <span id="carrito">Estos datos son obligatorios<br />
        <strong>Nota:</strong> Si por alguna raz&oacute;n
    no tiene tel&eacute;fono de la oficina ingrese 0.</span></td>
  </tr>
</table>
</form>
<?php
	if($msj == 1) echo "<h3>Debe cambiar su email para poder continuar con el proceso de alquiler, debido a que su email es provisional</h3>";
?>
<center><span id="carrito"><?php echo $mensaje ?></span></center>
</body>
</html>
<?php } ?>
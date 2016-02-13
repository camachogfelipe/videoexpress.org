<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Restauración de contrase&ntilde;a</title>
<link href="../estilo.css" rel="stylesheet" type="text/css" />
<script>
//Pon en la variable obligatorios el name de todos los campos que deben rellenar
obligatorio = ["userid"];
vacio = 0;
//Pon en la veriable textoObligatorio el texto que quieres que aparezca en el alert
textoObligatorio=["Correo electrónico"];

function comprobar(este)
{
	for(a=0; a<obligatorio.length; a++)
	{
		if(este.elements[obligatorio[a]].value == "")
		{
			alert("El campo "+textoObligatorio[a]+" esta vacío.\nPor favor rellena este campo.");
			este.elements[obligatorio[a]].focus();
			return false;
		}
	}
	return true;
}
</script>
</head>

<body>
<div align='center' style='height:100; margin-top:25px; vertical-align:middle; text-align:left; background-color:#FFF500'>
  <p><span style='color:#000; padding-left:102px'>Cuentas del Liceo Anglo Colombiano</span></p>
</div>
<div style="padding-bottom: 20px; padding-left: 102px">
<?php
$r = $_REQUEST['r'];
if ($r == NULL) $r = false;

$userid = $_REQUEST['userid'];

if ($r == true && $userid == NULL) $r = false;

$to = $_GET['to'];
$recuperacion = $_GET['re'];
$con1 = $_POST['con1'];
$con2 = $_POST['con2'];

if ($r == true && $userid != NULL && $con1 == NULL)
{
	include ("conexion.php");

	$sql = "SELECT codigo, usuario, correo, token FROM cat_usr WHERE correo = '$userid'";
	$result = mysql_query($sql) or die("La siguiente consulta contiene alg&uacute;n error:<br>nSQL: <b>$sql</b>");
	$total_resultados = mysql_num_rows($result);

	while ($row = mysql_fetch_array($result))
  	{
		//Mostramos los titulos de los articulos o lo que deseemos...
		$codigo = "{$row['codigo']}";
		$user = "{$row['usuario']}";
		$mail = "{$row['correo']}";
		$token = "{$row['token']}";
	}
 
	$usuario = strcmp($mail, $userid);

	if ($usuario == 0)
	{
		// Si están en la base de datos del registro de usuario
		$token = mt_rand();
		$query = "UPDATE cat_usr SET token='$token' WHERE codigo='$codigo'";
		mysql_query($query) or die(mysql_error());
	
		$asunto = "Recordacion clave";

		$cuerpo = "Hola $user
Este es un correo de Liceo Anglo Colombiano para confirmar la recordación de tu clave de acceso al portal de administración del boletin.<br />
Por favor da click al siguiente vinculo para confirmar la recordación de tu clave:
http://www.liceoanglocolombiano.edu.co/administracion/recordacion.php?re=true&to=$token&userid=$userid
Si el enlace anterior no funciona, pruebe a copiarlo y pegarlo en una nueva ventana del navegador.
La función de este mensaje es únicamente informativa. Las respuestas no se supervisarán ni se contestarán."; 
		/*$headers = "MIME-Version: 1.0\n"; 
		$headers .= "Content-type: text/html; charset=iso-8859-1\n"; */
		//dirección del remitente 
		$headers .= "From: Soporte <soporte@liceoanglocolombiano.edu.co>\n"; 
		mail($mail, $asunto, $cuerpo, $headers);
		echo "<div style='padding: 5px; width: 350px; border: 2px solid #D5ECFF'>";
		echo "Por favor verifica tu correo: $mail, para seguir las instrucciones de restablecimiento de contrase&ntilde;a.";
		echo "</div>";
  	}
	else
	{
		echo "<div style='padding: 5px; width: 350px; border: 2px solid #D5ECFF'>";
		echo "El nombre de usuario no existe";
		echo "</div>";
	}
}

if ($userid != NULL && $to != NULL && $recuperacion == true)
{
	include ("conexion.php");

	$sql = "SELECT codigo, correo, usuario, clave_acceso, token FROM cat_usr WHERE correo = '$userid'";
	$result = mysql_query($sql) or die("La siguiente consulta contiene alg&uacute;n error:<br>nSQL: <b>$sql</b>");
	$total_resultados = mysql_num_rows($result);

	while ($row = mysql_fetch_array($result))
  	{
		//Mostramos los titulos de los articulos o lo que deseemos...
		$codigo = "{$row['codigo']}";
		$user = "{$row['usuario']}";
		$mail = "{$row['correo']}";
		$clave = "{$row['clave_acceso']}";
		$token = "{$row['token']}";
	}

	$usuario = strcmp($mail, $userid);
	$tok	 = strcmp($token, $to);

	if ($usuario == 0 && $tok == 0)
	{
		// Si están en la base de datos del registro de usuario
		echo "<p style='font-weight:bold'>Restablecer contrase&ntilde;a</p>
			  Seleccione su nueva contrase&ntilde;a, e introduzcala a continuación.
			  </div>
			  <div style='padding: 5px; width: 350px; border: 2px solid #D5ECFF'>
			  <form method='POST' action='recordacion.php?userid=$userid'>
			  <table width='400' border='0'>
			   <tr>
			    <td width='50%'>Contrase&ntilde;a nueva</td>
				<td width='50%'><input type='text' name='con1'></td>
			   </tr>
			   <tr>
			    <td>Vuelva a escribir la contrase&ntilde;a</td>
				<td><input type='text' name='con2'></td>
			   </tr>
			  </table>
			  <input type='submit' value='Enviar' name='submit'>
			  </form>";
	}
}

if ($con1 != NULL && $con2 != NULL)
{
	$con = strcmp($con1, $con2);
	$con1 = md5($con1);

	if ($con == 0)
	{
		include ("conexion.php");
		
		$query = "UPDATE cat_usr SET clave_acceso='$con1', token='0' WHERE correo='$userid'";
		mysql_query($query) or die(mysql_error());
		
		echo "<div style='padding: 5px; width: 350px; border: 2px solid #D5ECFF'>";
		echo "La contraseña ha sido restablecida";
		echo "</div>";
		echo "<p><span id='menu_admon'><a href='index.php'>Ir al panel de administracion</a></span>";
	}
}

if ($r == false && $userid == NULL)
{
	echo "<p style='font-weight:bold'>¿Ha olvidado su contrase&ntilde;a?</p>
		 Para iniciar el proceso de recuperación de contraseña, por favor, introduzca su correo electr&oacute;nico inscrito en el Liceo Anglo Colombiano.<BR />
		 <div style='padding-top: 5px; padding-right: 5px; padding-left: 5px; padding-bottom: 0px; width: 340px; border: 2px solid #FFF500'  vertical-align='text-middle'>
		 <form method='POST' action='recordacion.php?r=true' onSubmit='return comprobar(this)'>
		 Correo electr&oacute;nico: <input type='text' name='userid'>
		 <input type='submit' value='Enviar' name='submit'>
		 </form>";
}
?>
</div>
<div style="padding-left: 102px; clear: both; margin-left: -102px">
<p><a id="flechas" onclick="history.go(-1)" style="cursor: pointer" ><img src="../imagenes/botonatras.png" align="left" width="25" height="25" alt="Regresar" /> &nbsp;&nbsp;Regresar</a>
</p>
</div>
<div align='center' style='height:100%; margin-top:25px; vertical-align:middle; text-align:left; background-color:#FFF500; clear: both; margin-left: -102px'>
  <span style='color:#000; padding-left:102px'>&copy; 2009 Liceo Anglo colombiano</span>
</div>
</body>
</html>
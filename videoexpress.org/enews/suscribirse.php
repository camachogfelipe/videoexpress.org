<?php
$nombre = $_POST['nombre'];
$email = $_REQUEST['email'];
$accion = $_REQUEST['ac'];

$bd = "enews";
include('administracion/conexion.php');

function inscribirse($nombre, $email)
{
	$checkemail = mysql_query("SELECT email FROM sus_enews WHERE email='$email'");
	$email_exist = mysql_num_rows($checkemail);
	
	if ($email_exist>0)
	{
		echo "<body background='imagenes/bg-page.gif' style='color: #fff; cursor: pointer'>";
		echo "EL nombre o la cuenta de correo estan ya en uso ";
		echo "<a onclick='history.go(-1)' ><img src='imagenes/botonatras.png' width='25' height='25' alt='Regresar' /></a>";
	}
	else
	{
		$query = "INSERT INTO sus_enews (nombre, email) VALUES('$nombre', '$email')";
		mysql_query($query) or die(mysql_error());
		echo "<script languaje='Javascript'>location.href='seccion.php'</script>";
	}
}

function unsuscribirse($email)
{
	$query = "DELETE FROM sus_enews WHERE email='$email'";
	mysql_query($query) or die(mysql_error());
	echo "<body background='imagenes/bg-page.gif' style='color: #fff; cursor: pointer'>";
	echo "Se ha eliminado de la lista de suscritos a E-news de VideoExpress.org";
	echo "<br /><a href='index.php'>Index</a>";
}

if ($accion == 'inscribirse') inscribirse($nombre, $email);
if ($accion == 'unsuscribirse') unsuscribirse($email);
?>
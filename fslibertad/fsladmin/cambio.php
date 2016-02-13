<?php
session_start();
if (isset($_SESSION['fsluser']))
{
	$clave_anterior1 = md5($_POST['clave_anterior']);
	$clave_nueva1 = md5($_POST['clave_nueva1']);
	$clave_nueva2 = md5($_POST['clave_nueva2']);
	$usuario = $_POST['usuario'];
	
	if($clave_anterior1!=NULL and $clave_nueva1!=NULL and $clave_nueva2!=NULL and $usuario!=NULL)
	{
		require("funciones.php");
		$conecta = conecta_bd();
		$clave_anterior2 = dato_columna("usuarios", "Password_access", "1;;;id_usuario='$usuario';");

		$clave1 = strcmp($clave_anterior1, $clave_anterior2);
		$clave2 = strcmp($clave_nueva1, $clave_nueva2);

		if ($clave1 == 0 and $clave2 == 0)
		{
			act_datos_tabla("usuarios", "Password_access='$clave_nueva1'", "id_usuario='$usuario'", 1);
			echo '<span id="titulos">Se ha cambiado la clave con exito</span>';
		}
		else echo '<span id="titulos">Las claves no coinciden</span>';
	}
	else echo '<span id="titulos">Los valores no deben estar vacios</span>';
}
else header ("Location: ../");
?>
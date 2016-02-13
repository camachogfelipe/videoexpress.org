<?php
	session_start();
	if($_GET['e'] == 1 and $_POST['op'] != NULL and $_POST['s'] != NULL and $_POST['Nombre'] != NULL and $_POST['Email'] != NULL and $_POST['Descripcion'] != NULL and $_POST['Dream'] != NULL)
	{
		require("funciones.php");
		$conecta = conecta_bd();
		$op = $_POST['op'];
		$s = $_POST['s'];
		$email = $_POST['Email'];
		$nombre = remplazar($_POST['Nombre']);
		$des = $_POST['Descripcion'];
		$dream = $_POST['Dream'];
		$ue = date("Y-m-d H:i:s");
		act_datos_tabla("que_hacemos", "Email='$email', Coordinador='$nombre', Descripcion='$des', Dream='$dream', Ultima_edicion='$ue', Usuario='$_SESSION[Nombre]'", "ID_seccion='$s'", 1);
		echo "Se han realizado los cambios con exito";
	}
	else echo "Los campos no pueden estar vacios";
?>
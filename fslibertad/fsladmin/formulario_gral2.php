<?php
	session_start();
	if($_GET['e'] == 1 and $_POST['op'] != NULL and $_POST['s'] != NULL and $_POST['texto1'] != NULL)
	{
		require("funciones.php");
		$conecta = conecta_bd();
		$op = $_POST['op'];
		$subseccion = $_POST['s'];
		$texto = $_POST['texto1'];
		$ue = date("Y-m-d H:i:s");
		act_datos_tabla("informacion_gral", "Texto='$texto', Ultima_edicion='$ue', Usuario='$_SESSION[Nombre]'", "ID_seccion='$op' and Subseccion='$subseccion'", 1);
		echo "Se han realizado los cambios con exito";
	}
	else echo "Los campos no pueden estar vacios";
?>
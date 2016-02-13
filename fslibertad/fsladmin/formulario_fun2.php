<?php
	session_start();
	if($_GET['e'] == 1 and $_POST['op'] != NULL and $_POST['s'] != NULL and $_POST['Nombre'] != NULL and $_POST['Perfil'] != NULL and $_POST['Experiencia'] != NULL)
	{
		require("funciones.php");
		$conecta = conecta_bd();
		$op = $_POST['op'];
		$subseccion = $_POST['s'];
		$nombre = remplazar($_POST['Nombre']);
		$perfil = $_POST['Perfil'];
		$experiencia = $_POST['Experiencia'];
		$es = $_POST['es'];
		$ue = date("Y-m-d H:i:s");
		if($es=="n") act_datos_tabla("fundadores", "Nombre='$nombre', Perfil='$perfil', Experiencia='$experiencia', Ultima_actualizacion='$ue', Usuario='$_SESSION[Nombre]'", "id_fundador='$s'", 1);
		else ing_datos_tabla("fundadores","Nombre, Perfil, Experiencia, Ultima_actualizacion, Usuario","'$nombre','$perfil','$experiencia','$ue','$_SESSION[Nombre]'");
		echo "Se han realizado los cambios con exito";
	}
	else echo "Los campos no pueden estar vacios";
?>
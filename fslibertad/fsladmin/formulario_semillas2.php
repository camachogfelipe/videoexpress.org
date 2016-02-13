<?php
	session_start();
	if($_GET['e'] == 1 and $_POST['op'] != NULL and $_POST['s'] != NULL and $_POST['texto1'] != NULL)
	{
		require("funciones.php");
		$conecta = conecta_bd();
		$op = $_POST['op'];
		$subseccion = $_POST['s'];
		$texto = $_POST['texto1'];
		$id = $_REQUEST['id'];
		$ue = date("Y-m-d H:i:s");
		if($id != NULL)
		{
			act_datos_tabla("semillas", "Texto='$texto', Ultima_actualizacion='$ue', Usuario='$_SESSION[Nombre]'", "ID_semilla='$id'", 1);
			echo "Se han realizado los cambios con exito";
		}
		else
		{
			$columna = "Texto, Ultima_actualizacion, Usuario";
			$valores = "'$texto', '$ue', '$_SESSION[Nombre]'";
			ing_datos_tabla("semillas", $columna, $valores);
			echo "Se creo la nueva Semilla de Libertad con exito";
		}
	}
	else echo "Los semilla no puede estar vacia";
?>
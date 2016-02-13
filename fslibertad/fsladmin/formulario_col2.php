<?php
	session_start();
	if($_GET['e'] == 1 and $_POST['op'] != NULL and $_POST['s'] != NULL and $_POST['Nombre'] != NULL)
	{
		require("funciones.php");
		$conecta = conecta_bd();
		$op = $_POST['op'];
		$s = $_POST['s'];
		$id = $_POST['id'];
		$nombre = remplazar($_POST['Nombre']);
		$ue = date("Y-m-d H:i:s");
		if($s == "Crear")
		{
			ing_datos_tabla("colaboradores", "Nombre, Creado, Usuario", "'$nombre', '$ue', '$_SESSION[Nombre]'");
			echo "Se ha creado a $nombre como colaborador";
		}
		else
		{
			act_datos_tabla("colaboradores", "Nombre='$nombre', Usuario='$_SESSION[Nombre]'", "id_colaborador='$id'", 1);
			echo "Se ha actualizado el nombre del colaborador con exito";
		}
	}
	else echo "Los campos no pueden estar vacios";
?>
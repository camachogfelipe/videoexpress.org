<?php
	session_start();
	if($_GET['e'] == 1 and $_POST['op'] != NULL and $_POST['s'] != NULL and $_POST['Titulo'] != NULL and $_POST['texto1'] != NULL)
	{
		require("funciones.php");
		$conecta = conecta_bd();
		$op = $_POST['op'];
		$subseccion = $_POST['s'];
		$tema = $_POST['Tema'];
		$titulo = remplazar($_POST['Titulo']);
		$texto = $_POST['texto1'];
		$id = $_REQUEST['id'];
		$ue = date("Y-m-d H:i:s");
		if($id != NULL)
		{
			act_datos_tabla("editoriales", "Titulo='$titulo', Tema='$tema', Texto='$texto', Ultima_actualizacion='$ue', Usuario='$_SESSION[Nombre]'", "ID_editorial='$id'", 1);
			echo "Se han realizado los cambios con exito";
		}
		else
		{
			$columna = "Titulo, Tema, Texto, Ultima_actualizacion, Usuario";
			$valores = "'$titulo', '$tema', '$texto', '$ue', '$_SESSION[Nombre]'";
			ing_datos_tabla("editoriales", $columna, $valores);
			echo "Se creo el nuevo editorial con exito";
		}
	}
	else echo "Los campos no pueden estar vacios";
?>
<?php
	session_start();
	if($_GET['e'] == 1 and $_SESSION['Nombre'] != NULL)
	{
		require("funciones.php");
		$conecta = conecta_bd();
		$op = $_POST['op'];
		$s = $_POST['s'];
		$es= $_POST['es'];
		$id= $_POST['id'];
		$monte= $_POST['monte'];
		$nombre= remplazar($_POST['nombre']);
		$fecha_inicio= $_POST['anio1']."-".$_POST['mes1']."-".$_POST['dia1'];
		$fecha_final= $_POST['anio2']."-".$_POST['mes2']."-".$_POST['dia2'];
		$donde= remplazar($_POST['donde']);
		$participantes= remplazar($_POST['participantes']);
		$personas= $_POST['personas'];
		$inversion_pesos= $_POST['inversion_pesos'];
		$inversion_dolares= $_POST['inversion_dolares'];
		$ultima_actividad= $_POST['ultima_actividad'];
		$descripcion= $_POST['descripcion'];
		$ue = date("Y-m-d H:i:s");
		$tabla = "proyectos";
		if($id != NULL and $s != "crear")
		{
			$datos = "monte='$monte', nombre='$nombre', fecha_inicio='$fecha_inicio', fecha_final='$fecha_final', ";
			$datos .= "ultima_actividad='$ultima_actividad', donde='$donde', quienes='$participantes', ";
			$datos .= "personas_impactadas='$personas', descripcion='$descripcion', inversion_pesos='$inversion_pesos', ";
			$datos .= "inversion_dolares='$inversion_dolares', Ultima_actualizacion='$ue', Usuario='$_SESSION[Nombre]'";
			$concepto = "id_proyecto='$id'";
			act_datos_tabla($tabla, $datos, $concepto, 1);
			/*echo $datos;
			echo "<p>".$concepto."</p>";*/
			echo "Se ha actualizado el proyecto con exito";
		}
		else
		{
			$columnas = "monte, nombre, fecha_inicio, fecha_final, ultima_actividad, donde, quienes, personas_impactadas, ";
			$columnas .= "descripcion, inversion_pesos, inversion_dolares, Ultima_actualizacion, Usuario";
			$valores = "'$monte', '$nombre', '$fecha_inicio', '$fecha_final', '$ultima_actividad', '$donde', '$participantes', ";
			$valores .= "'$personas', '$descripcion', '$inversion_pesos', '$inversion_dolares', '$ue', '$_SESSION[Nombre]'";
			ing_datos_tabla($tabla, $columnas, $valores);
			/*echo $columnas;
			echo "<p>".$valores."</p>";*/
			echo "Se ha creado el proyecto con exito";
		}
	}
	else echo "Los campos del proyecto no pueden estar vacios";
?>
<?php
	require("fsladmin/funciones.php");
	$conecta = conecta_bd();
	$nombre = $_REQUEST['nombres_apellidos'];
	$correo = $_REQUEST['correo'];
	$telefono = $_REQUEST['telefono'];
	$celular = $_REQUEST['celular'];
	$ciudad = $_REQUEST['ciudad'];
	$pais = $_REQUEST['pais'];
	$asunto = $_REQUEST['asunto'];
	$tipo = $_REQUEST['t'];
	if($tipo == "pa")
	{
		$tipo_ayuda = $_REQUEST['tipo_ayuda'];
		$tipo = "OA";
	}
	else
	{
		$tipo_ayuda = "NA";
		$tipo = "SA";
	}
	$fecha = date("Y-m-d H:i:s");
	$columna = "Tipo_solicitud, Nombres, Correo, Tipo_ayuda, Telefono, Celular, Ciudad, Pais, Asunto, Fecha_solicitud";
	$valores = "'$tipo', '$nombre', '$correo', '$tipo_ayuda', '$telefono', '$celular', '$ciudad', '$pais', '$asunto', '$fecha'";
	ing_datos_tabla("ayudas", $columna, $valores);
	echo "Sus datos fueron registrados con exito";
?>
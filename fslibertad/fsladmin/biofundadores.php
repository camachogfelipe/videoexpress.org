<?php
session_start();
if (isset($_SESSION['fsluser']))
{
	require("funciones.php");
	$conecta = conecta_bd();
	$consulta = consulta_bd("fundadores", "id_fundador, Nombre", "-1;;;;");
	$nums = mysql_num_rows($consulta);
	
	echo '<div id="submenu">';
	if($nums > 0)
	{
		while($fun=mysql_fetch_object($consulta))
		{
			echo "<li onclick=\"recargar('formulario_fun','op=1&s=".$fun->id_fundador."&es=n','#submenuder')\">".$fun->Nombre."</li>";
		}
	}
	echo "<li onclick=\"recargar('formulario_fun','op=1&s=&es=s','#submenuder')\">Crear un nuevo fundador</li>";
	echo "</div>";
	echo '<div id="submenuder"></div>';
}
else header("Location: ../");
?>
<?php
session_start();
if (isset($_SESSION['fsluser']))
{
	require_once("funciones.php");
	$conecta = conecta_bd();
	$consulta = consulta_bd("junta", "id_miembro, Nombre", "-1;;;;");
	$nums = mysql_num_rows($consulta);
	
	echo '<div id="submenu">';
	if($nums > 0)
	{
		while($fun=mysql_fetch_object($consulta))
		{
			echo "<li onclick=\"recargar('formulario_jun','op=1&s=".$fun->id_miembro."&es=n','#submenuder')\">".$fun->Nombre."</li>\n";
		}
	}
	echo "<li onclick=\"recargar('formulario_jun','op=1&s=&es=s','#submenuder')\">Crear un nuevo miembro</li>";
	echo "</div>";
	echo '<div id="submenuder"></div>';
}
else header("Location: ../");
?>
<?php
session_start();
if (isset($_SESSION['fsluser']))
{
	require("funciones.php");
	$conecta = conecta_bd();
	$consulta = consulta_bd("colaboradores", "id_colaborador, Nombre", "-1;;;;");
	$nums = mysql_num_rows($consulta);
	
	echo '<div id="submenu">';
	if($nums > 0)
	{
		echo '<table cellpadding="3" cellspacing="2" align="left">';
		while($fun=mysql_fetch_object($consulta))
		{
			echo '<tr>';
			echo '<td>';
			echo "<li onclick=\"recargar('formulario_col','op=1&s=Editar&id=";
			echo $fun->id_colaborador;
			echo "&es=n','#submenuder')\">";
			echo $fun->Nombre;
			echo "</li>";
			echo '</td>';
			echo '<td>';
			echo '<img src="../imagenes/boton_borrar_off.png" width="24" height="24" ';
			echo 'onclick="recargar(\'index3\',\'op=1&s=delcolaborador&id='.$fun->id_colaborador.'\', \'#submenuder\')" />';
			echo '</td>';
			echo '</tr>';
		}
		echo '</table>';
	}
	echo "<li onclick=\"recargar('formulario_col','op=1&s=Crear&es=s','#submenuder')\">Crear un nuevo colaborador</li>";
	echo "</div>";
	echo '<div id="submenuder"></div>';
}
else header("Location: ../");
?>
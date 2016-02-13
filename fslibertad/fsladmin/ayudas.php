<?php
session_start();
if (isset($_SESSION['fsluser']))
{
	$tipo = $_REQUEST['tipo'];
	echo '<div id="submenu1">';
	echo "<li onclick=\"recargar('index3','op=7&s=ver_editorial&es=n','#submenuder1')\">Ver editoriales</li>";
	echo "<li onclick=\"recargar('formulario_editorial','op=1&s=nvo_editorial&es=s','#submenuder1')\">Crear un nuevo editorial</li>";
	echo "</div>";
	echo '<div id="submenuder1"></div>';
}
else header("Location: ../");
?>
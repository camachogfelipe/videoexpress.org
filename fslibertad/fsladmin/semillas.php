<?php
session_start();
if (isset($_SESSION['fsluser']))
{
	echo '<div id="submenu1">';
	echo "<li onclick=\"recargar('index3','op=8&s=ver_semillas&es=n','#submenuder1')\">Ver semillas</li>";
	echo "<li onclick=\"recargar('formulario_semillas','op=1&s=nva_semilla&es=s','#submenuder1')\">Crear una nueva Semilla</li>";
	echo "</div>";
	echo '<div id="submenuder1"></div>';
}
else header("Location: ../");
?>
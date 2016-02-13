<?php
session_start();
if (isset($_SESSION['fsluser']))
{
	echo '<div id="submenu1">';
	echo "<li onclick=\"recargar('index3','op=8&s=ver_semillas2&es=n','#submenuder1')\">Ver ense&ntilde;anas</li>";
	echo "<li onclick=\"recargar('formulario_semillas_2','op=1&s=nva_semilla2&es=s','#submenuder1')\">Crear una nueva ense&ntilde;ana</li>";
	echo "</div>";
	echo '<div id="submenuder1"></div>';
}
else header("Location: ../");
?>
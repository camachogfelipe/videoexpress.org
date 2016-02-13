<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Informaci&oacute;n general</title>
<link href="../estilo.css" rel="stylesheet" type="text/css" />
</head>

<body style="background:url(../Imagenes_pagina/fondo_alfa.png)">
<div style="padding: 5px">
<?php
$op = $_REQUEST['op'];
$alquiler = $_SESSION['alquiler'];
$afiliacion = $_SESSION['afiliacion'];

switch ($op)
{
	case 1	:	$TEXT['titulo'] 	= "<img src='../Imagenes_pagina/titulos/bienvenida.png' />";
				echo "<div id='titulo_informacion'>".$TEXT['titulo']."</div><div id='contenido_informacion'>";
				echo "<strong>Bienvenido(a) ".$_SESSION['usuario_afiliado']." a VideoExpress.org</strong><p>";
				include("bienvenida.html");
				echo "</p>";
				break;
	case 2	:	$TEXT['titulo'] = "<img src='../Imagenes_pagina/titulos/contactenos.png' />";
				echo "<div id='titulo_informacion'>".$TEXT['titulo']."</div><div id='contenido_informacion'>";
				include ('contacto.php');
				echo "</div>";
				break;
	case 3	:	$TEXT['titulo'] 	= "<img src='../Imagenes_pagina/titulos/alquiler.png' />";
				echo "<div id='titulo_informacion'>".$TEXT['titulo']."</div><div id='contenido_informacion'>";
				include("como_alquilar.php");
				echo "</div>";
				break;
	default	:	$TEXT['titulo'] 	= "<img src='../Imagenes_pagina/titulos/bienvenida.png' />";
				echo "<div id='titulo_informacion'>".$TEXT['titulo']."</div><div id='contenido_informacion'>";
				echo "<strong>Bienvenido(a) ";
				echo $_SESSION['usuario_afiliado']."</strong><p>";
				include("bienvenida.html");
				echo "</div>";
				break;
}
?>
</div>
</body>
</html>

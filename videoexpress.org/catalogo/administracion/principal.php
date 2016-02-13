<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
session_start();
ob_start("ob_gzhandler");
$salir = $_REQUEST['salir'];
if($salir == 'admin')
{
	include("../include/funciones_globales.php");
	salir($salir);
	header("Location: ../");
}
?>
<HTML>
<HEAD>
<link rel="shortcut icon" href="../../images/favicon.ico" />
<TITLE>Actualizar base de datos</TITLE>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="../estilo.css" rel="stylesheet" type="text/css">
<?php
// check session variable
if (isset($_SESSION['user_admin']))
{
?>
<script>
//Pon en la variable obligatorios el name de todos los campos que deben rellenar

obligatorio = ["busqueda"];
vacio = 0;

//Pon en la veriable textoObligatorio el texto que quieres que aparezca en el alert

textoObligatorio=["Debe ingresar al menos una palabra"];

function comprobar(este)
{
	for(a=0; a<obligatorio.length; a++)
	{
		if(este.elements[obligatorio[a]].value == "")
		{
			alert(textoObligatorio[a]);
			este.elements[obligatorio[a]].focus();
			return false;
		}
	}
	return true;
}
</script>
</HEAD>
<BODY style="margin: 0">
<center>
<table width="100%" border="0" cellspacing="2px" cellpadding="0" background="../Imagenes_pagina/fppal.png">
  <tr>
    <td width="14.3%"><div id="menu_admon"><a href="listas/peliculas.php" target="mostrar"><img src="../Imagenes_pagina/t_pel.png" width="40" height="40" border="0" align="left"> Mostrar todas las pel&iacute;culas</a></div></td>
    <td width="14.2%"><div id="menu_admon"><a href="editar_peliculas/actualizar_peliculas.php" target="mostrar"><img src="../Imagenes_pagina/ed_pel.png" width="40" height="40" border="0" align="absmiddle">Editar pel&iacute;cula</a></div></td>
    <td width="14.3%"><div id="menu_admon"><a href="listas/pedidos.php" target="mostrar"><img src="../Imagenes_pagina/pedidos.png" width="40" height="40" border="0" align="left"> Mostrar todos los pedidos</a></div></td>
    <td width="14.3%"><div id="menu_admon"><a href="listas/facturas.php" target="mostrar"><img src="../Imagenes_pagina/fac.png" width="40" height="40" border="0" align="left"> Mostrar todas las facturas</a></div></td>
    <td width="14.3%"><div id="menu_admon"><a href="listas/afiliados.php" target="mostrar"><img src="../Imagenes_pagina/afiliados.png" width="40" height="40" border="0" align="left"> Manejo de afiliados</a></div></td>
    <td width="14.3%"><div id="menu_admon"><a href="busqueda1.php" target="mostrar"><img src="../Imagenes_pagina/buscar_icono.png" width="40" height="40" border="0" align="absmiddle"> Buscar</a></div></td>
  <td width="14.3%"><div id="menu_admon"><a href="../../admin_video"><img src="../Imagenes_pagina/panel_ppal.png" width="40" height="40" border="0" align="left"> Panel principal</a></div></td>
  </tr>
  <tr>
    <td><div id="menu_admon"><a href="planilla.php" target="mostrar"><img src="../Imagenes_pagina/planilla.png" width="40" height="40" border="0" align="absmiddle"> Planilla</a></div></td>
    <td><div id="menu_admon"><a href="reportes/reportes.php" target="mostrar"><img src="../Imagenes_pagina/reportes.png" width="40" height="40" border="0" align="absmiddle"> Reportes</a></div></td>
    <td><div id="menu_admon"><a href="afiliar_usuario.php" target="mostrar"><img src="../Imagenes_pagina/ag_afiliado.png" width="40" height="40" border="0" align="left"> Afiliar un usuario</a></div></td>
    <td><div id="menu_admon"><a href="subcarro/catalogo.php" target="mostrar"><img src="../Imagenes_pagina/alquilar_panel.png" width="40" height="40" border="0" align="left"> Alquilar o comprar pel&iacute;culas</a></div></td>
    <td><div id="menu_admon"><a href="edit_afil_alq.php" target="mostrar"><img src="../Imagenes_pagina/edit_afil_alq.png" width="40" height="40" border="0" align="left"> Editar precios Afiliaci&oacute;n y alquiler</a></div></td>
    <td></td>
    <td><div id="menu_admon"><a href="?salir=admin"><img src="../Imagenes_pagina/salir.png" width="40" height="40" border="0" align="absmiddle"> Salir</a></div></td>
  </tr>
</table>
</center>
<br />
<div id="iframe" align="center" style="width:100%px; height:760px; margin-top:-15px; border:0px">
<iframe frameborder="0" name="mostrar" id="mostrar" src="listas/peliculas.php" scrolling="auto" style="border: 0px none; border-style:none none none none; width:100%; height:760px">Su explorador no soporta frames, por favor actualicelo</iframe>
</div>
</BODY>
</HTML>
<?php
}
else
{
	include ('index.php');
}
ob_end_flush();
?>
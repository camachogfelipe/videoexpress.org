<?php
session_start();
?>
<HTML>
<HEAD>
<TITLE>Actualizar base de datos</TITLE>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="../estilo.css" rel="stylesheet" type="text/css">
<link rel="shortcut icon" href="../../images/favicon.ico" />
<?php
  // check session variable

if (isset($_SESSION['valid_user']))
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
<BODY>
<center>
<table width="960" height="40" border="0" cellspacing="0" cellpadding="0">
 <tr>
  <td style="width:160px; height:40px; margin-left:5px; margin-right:5px; margin-top: 0px; background:url(../imagenes/fondo_menu.png) no-repeat">
   <div id="menu_admon"><a href="editar_index.php" target="mostrar">Editar index</a></div>
  </td>
  <td style="width:160px; height:40px; margin-left:5px; margin-right:5px; margin-top: 0px; background:url(../imagenes/fondo_menu.png) no-repeat">
   <div id="menu_admon"><a href="editar_articulo.php" target="mostrar">Editar articulo</a></div>
  </td>
  <td style="width:160px; height:40px; margin-left:5px; margin-right:5px; margin-top: 0px; background:url(../imagenes/fondo_menu.png) no-repeat">
   <div id="menu_admon"><a href="tabla_contenido.php" target="mostrar">Todos los articulos</a></div>
  </td>
  <td style="width:160px; height:40px; margin-left:5px; margin-right:5px; margin-top: 0px; background:url(../imagenes/fondo_menu.png) no-repeat">
   <div id="menu_admon"><a href="mail.php?es=1" target="mostrar" onClick="advertencia()">Enviar por mail el E-news</a></div>
  </td>
  <td style="width:160px; height:40px; margin-left:5px; margin-right:5px; margin-top: 0px; background:url(../imagenes/fondo_menu.png) no-repeat">
   <div id="menu_admon" style="padding-top: 10px"><a href="../../admin_video">Panel principal</a></div>
  </td>
  <td style="width:160px; height:40px; margin-left:5px; margin-right:5px; margin-top: 0px; background:url(../imagenes/fondo_menu.png) no-repeat">
   <div id="menu_admon" style="padding-top: 10px"><a href="salir.php">Salir</a></div>
  </td>
 </tr>
</table>
</center>
<br />
<div id="iframe" align="center" style="width:100%px; height:760px; margin-top:0px; border:0px">
<iframe frameborder="0" name="mostrar" id="mostrar" src="editar_index.php" scrolling="auto" style="border: 0px none; border-style:none none none none; width:100%; height:760px">Su explorador no soporta frames, por favor actualicelo</iframe>
</div>
</BODY>
</HTML>
<?php
}
else
{
	include ('index.php');
}
?>
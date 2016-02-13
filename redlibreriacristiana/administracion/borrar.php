<?php
session_start();
?>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="estilo_admin.css" rel="stylesheet" type="text/css" />
<?php

$id = $_REQUEST['id'];
$tabla = $_REQUEST['tabla'];
if ($tabla == 'clientes') $nom_var = "cedula";
elseif($tabla == "notired") $nom_var = "id_notired";
elseif($tabla == "email") $nom_var = "id_email";
else $nom_var = "id";
$pagina = $_REQUEST['pagina'];
$borrar = $_REQUEST['borrar'];

// check session variable
if (isset($_SESSION['valid_user']))
{
	if($borrar == NULL)
	{
?>
<table width="250" border="0" align="center" cellpadding="0" cellspacing="0">
 <tr>
  <td width="20" height="20" align="center" valign="middle"><img src="imagenes/redondo_sup_izq.png" width="20" height="20" /></td>
  <td align=\"center\" valign="middle" style="background:url(imagenes/linea_superior.png) repeat-x">&nbsp;</td>
  <td width="20" align="center" valign="middle"><img src="imagenes/redondo_sup_der.png" width="20" height="20" /></td>
 </tr>
 <tr>
  <td align="center" valign="middle" style="background:url(imagenes/linea_vertical_izq.png) repeat-y">&nbsp;</td>
  <td align="center" valign="middle" bgcolor="#ebebeb">
   <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
	<tr>
     <td align="center">&iquest;Esta seguro de continuar?</td>
	</tr>
  	<tr>
	 <td align="center"><a id="flechas" href="<?php echo "borrar.php?id=$id&tabla=$tabla&pagina=$pagina" ?>&borrar=true">Ok</a>&nbsp;&nbsp;&nbsp;&nbsp;<a id="flechas" href="<?php echo $pagina ?>.php">Cancelar</a>
     </td>
	</tr>
   </table>
  </td>
  <td align="center" valign="middle" style="background:url(imagenes/linea_vertical_der.png) repeat-y">&nbsp;</td>
 </tr>
 <tr>
  <td height="20" align="center" valign="middle"><img src="imagenes/redondo_inf_izq.png" width="20" height="20" /></td>
  <td align="center" valign="middle" style="background:url(imagenes/linea_inferior.png) repeat-x">&nbsp;</td>
  <td align="center" valign="middle"><img src="imagenes/redondo_inf_der.png" width="20" height="20" /></td>
 </tr>
</table>
<?php
	}	
	elseif($borrar == true)
	{
		include ("funciones.php");
		$conecta = conecta_bd("redlibr_redlibreria");

		$query = "DELETE FROM $tabla WHERE $nom_var='$id'";
		mysql_query($query) or die(mysql_error());
		echo "<script languaje='Javascript'>location.href='$pagina.php'</script>";
	}
}
else
{
	echo '<script type="text/javascript">window.location="../administracion";</script>';
}
?>
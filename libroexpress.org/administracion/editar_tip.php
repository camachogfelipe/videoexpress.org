<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Actualizaci&oacute;n TRM</title>
<link href="estilo_admin.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php
  if (isset($_SESSION['valid_user']))
  {
     $id = $_REQUEST['id'];
     $tip = $_REQUEST['tip'];
     $categoria = $_REQUEST['categoria'];
     $ingresar = $_REQUEST['ingresar'];
     $editar = $_REQUEST['editar'];
     
     if ($ingresar == NULL || $editar == NULL) { $ingresar = "nuevo"; $editar = 0; }

	 include("conexion.php");
	 conecta_bd("libroexpress");

     if ($editar == 1 and $ingresar == "actualizar" and $id != NULL and $tip != NULL and $categoria != NULL)
     {
        //ejecutamos la operacion
        $query = "UPDATE tips SET tip='$tip', categoria='$categoria' WHERE id='$id'";
        mysql_query($query) or die(mysql_error());
        $insertado = true;
     }
     if ($editar == 1 and $ingresar == "nuevo" and $tip != NULL and $categoria != NULL)
     {
        //ejecutamos la operacion
        $query = "INSERT INTO tips (tip, categoria) VALUES ('$tip', '$categoria')";
        mysql_query($query) or die(mysql_error());
        $insertado = true;
     }
?>
<table width="500" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="20" height="20" align="center" valign="middle"><img src="imagenes/redondo_sup_izq.png" width="20" height="20" /></td>
    <td align="center" valign="middle" style="background:url(imagenes/linea_superior.png) repeat-x">&nbsp;</td>
    <td width="20" align="center" valign="middle"><img src="imagenes/redondo_sup_der.png" width="20" height="20" /></td>
  </tr>
  <tr>
    <td align="center" valign="middle" style="background:url(imagenes/linea_vertical_izq.png) repeat-y">&nbsp;</td>
    <td align="center" valign="middle" bgcolor="#ebebeb">
     <form action="editar_tip.php?ingresar=<?php echo $ingresar ?>&id=<?php echo $id ?>&editar=1" method="post" enctype="application/x-www-form-urlencoded" name="tip">
     <table width="100%" border="0" cellspacing="3" cellpadding="0">
      <tr>
        <td width="23%" align="left" valign="top" id="informacion_gral">Tip</td>
        <td width="77%" align="left" valign="top"><textarea name="tip" cols="50" rows="3" id="tip" tabindex="1"><?php echo $tip ?></textarea></td>
      </tr>
      <tr>
        <td width="23%" align="left" valign="top" id="informacion_gral">Categor&iacute;a</td>
        <td width="77%" align="left" valign="top"><select name="categoria" id="categoria" tabindex="2">
             <option value="Ni&ntilde;os" <?php if($id!=NULL and $categoria == 'Niños') echo "selected=\"selected\""; ?>>Ni&ntilde;os</option>
             <option value="Adolescentes" <?php if($id!=NULL and $categoria == 'Adolescentes') echo "selected=\"selected\""; ?>>Adolescentes</option>
             <option value="Jovenes" <?php if($id!=NULL and $categoria == 'Jovenes') echo "selected=\"selected\""; ?>>Jovenes</option>
             <option value="Adultos" <?php if($id!=NULL and $categoria == 'Adultos') echo "selected=\"selected\""; ?>>Adultos</option>
             <option value="Inter&eacute;s general" <?php if($id!=NULL and $categoria == 'Interés general') echo "selected=\"selected\""; ?>>Inter&eacute;s general</option>
           </select></td>
      </tr>
      <tr>
        <td colspan="2" align="center"><a href="javascript:document.tip.reset()"><img src="imagenes/limpiar.png" width="100" height="25" border="0" /></a> <input type="image" src="imagenes/acceder.png" name="submit" id="submit" tabindex="3" /></td>
      </tr>
     </table>
     </form>
     <?php if($insertado == true) echo "<div id=\"informacion_gral\"><img src=\"imagenes/informacion.png\" width=\"25\" height=\"25\" align=\"absmiddle\" /> Se ha ingresado el tip correctamente</div>"; ?>
    </td>
    <td align="center" valign="middle" style="background:url(imagenes/linea_vertical_der.png) repeat-y">&nbsp;</td>
  </tr>
  <tr>
    <td height="20" align="center" valign="middle"><img src="imagenes/redondo_inf_izq.png" width="20" height="20" /></td>
    <td align="center" valign="middle" style="background:url(imagenes/linea_inferior.png) repeat-x">&nbsp;</td>
    <td align="center" valign="middle"><img src="imagenes/redondo_inf_der.png" width="20" height="20" /></td>
  </tr>
</table>
</body>
</html>
<?php
}
else
{
   include ('index.php');
}
?>

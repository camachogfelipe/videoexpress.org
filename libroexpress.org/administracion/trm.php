<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Actualización TRM</title>
<link href="estilo_admin.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php
  if (isset($_SESSION['valid_user']))
  {
     $trm_nvo = $_REQUEST['trm'];
	 include('conexion.php');	 
	 conecta_bd("libroexpress");
     
     if ($trm_nvo == NULL)
     {
        $query = mysql_query("SELECT trm, ultima_actualizacion_trm FROM datos");
        while($row=mysql_fetch_object($query))
        {
           //Mostramos los titulos de los articulos o lo que deseemos...
           $trm_ant = $row->trm;
           $fecha_trm = $row->ultima_actualizacion_trm;
        }
     }
     else
     {
        //obtenemos la fecha de hoy
        $num_dia = date(j);
        $mes = date(n);
        $anio = date(Y);
        //formamos la fecha del día
        $fecha = "$anio-$mes-$num_dia";
        //ejecutamos la operacion
        $query = "UPDATE datos SET trm='$trm_nvo', ultima_actualizacion_trm='$fecha'";
        mysql_query($query) or die(mysql_error());
        $trm_ant = $trm_nvo;
        $fecha_trm = $fecha;
        $insertado = true;
     }
?>
<table width="300" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="20" height="20" align="center" valign="middle"><img src="imagenes/redondo_sup_izq.png" width="20" height="20" /></td>
    <td align="center" valign="middle" style="background:url(imagenes/linea_superior.png) repeat-x">&nbsp;</td>
    <td width="20" align="center" valign="middle"><img src="imagenes/redondo_sup_der.png" width="20" height="20" /></td>
  </tr>
  <tr>
    <td align="center" valign="middle" style="background:url(imagenes/linea_vertical_izq.png) repeat-y">&nbsp;</td>
    <td align="center" valign="middle" bgcolor="#ebebeb">
     <form action="trm.php" method="post" enctype="application/x-www-form-urlencoded" name="trm">
     <table width="100%" border="0" cellspacing="3" cellpadding="0">
      <tr>
        <td width="50%" align="left" valign="top">Valor actual:<br /><?php echo "<span id=\"informacion_gral\">$ ".$trm_ant."</span>"; ?><br /><br />          
        &Uacute;ltima actualizaci&oacute;n:<br /><?php echo "<span id=\"informacion_gral\">".$fecha_trm."</span>"; ?></td>
        <td width="50%" align="left" valign="top">Nuevo Valor:<br /><input name="trm" type="text" id="trm" tabindex="1" size="15" maxlength="7" /></td>
      </tr>
      <tr>
        <td align="right"><a href="javascript:document.trm.reset()"><img src="imagenes/limpiar.png" width="100" height="25" border="0" /></a></td>
        <td><input type="image" src="imagenes/acceder.png" name="submit" id="submit" tabindex="2" /></td>
      </tr>
     </table>
     </form>
     <?php if($insertado == true) echo "<div id=\"informacion_gral\"><img src=\"imagenes/informacion.png\" width=\"25\" height=\"25\" align=\"absmiddle\" /> Se ha actualizado la TRM</div>"; ?>
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

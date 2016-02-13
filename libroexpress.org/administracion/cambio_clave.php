<?php
session_start();

// check session variable
if (isset($_SESSION['valid_user']))
{
	$vieja = md5($_REQUEST['vieja']);
	$nueva = $_REQUEST['nueva'];
	$rnueva = $_REQUEST['rnueva'];
	$cambiar = $_REQUEST['cambioclave'];
	$user = "manuel";
	$status = NULL;
	
	if($nueva == NULL || $rnueva == NULL) $status = "La clave no puede estar vacía";
	
	if ($cambiar == true and $nueva != NULL and $rnueva != NULL)
	{
		include ("conexion.php");
		conecta_bd("libroexpress");

		$query = mysql_query("SELECT usuario_admin, password FROM usuarios_admin WHERE usuario_admin='$user'");
		
		while($row=mysql_fetch_object($query))
	    {
		  //Mostramos los titulos de los articulos o lo que deseemos...
		  $vieja_clave = $row->password;
		}
		
		$rvieja = $vieja_clave;
		$clave_vieja = strcmp($vieja, $rvieja);
		$clave_nueva = strcmp($nueva, $rnueva);
		
		if ($clave_vieja == 0 and $clave_nueva == 0)
		{
			$nueva = md5($nueva);
			$query = "UPDATE usuarios_admin SET password='$nueva' WHERE usuario_admin='$user'";
			mysql_query($query) or die(mysql_error());
			$status = "La clave ha sido cambiada con exito";
		}
		else
		{
			$status = "Las claves no coinciden";
		}

	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin título</title>
<link href="estilo_admin.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="550" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td width="20"><img src="imagenes/redondo_sup_izq.png" width="20" height="20" /></td>
    <td background="imagenes/linea_superior.png">&nbsp;</td>
    <td><img src="imagenes/redondo_sup_der.png" width="20" height="20" /></td>
  </tr>
  <tr>
    <td style="background:url(imagenes/linea_vertical_izq.png) repeat-y">&nbsp;</td>
    <td bgcolor="#ebebeb"><form id="clave" name="clave" method="post" action="cambio_clave.php?cambioclave=true" >
  	  <table width="100%" border="0" cellspacing="3px" cellpadding="0" style="margin-top: 20px">
       <tr>
        <td>
         <table width="100%" border="0" cellspacing="3px" cellpadding="0">
          <tr>
           <td width="200" style="text-align: left">Clave anterior</td>
           <td width="200"><input name="vieja" type="password" id="vieja" tabindex="1" value="" size="30" maxlength="150" /></td>
          </tr>
          <tr>
           <td style="text-align: left">nueva clave</td>
           <td><input name="nueva" type="password" id="nueva" tabindex="2" size="30" maxlength="150" /></td>
          </tr>
          <tr>
           <td style="text-align: left">Repita la nueva clave</td>
           <td><input name="rnueva" type="password" id="rnueva" tabindex="3" size="30" maxlength="150" /></td>
          </tr>
         </table>
        </td>
       </tr>
       <tr>
        <td style="text-align:center">
         <a href="javascript:document.clave.reset()"><img src="imagenes/limpiar.png" width="100" height="25" border="0" /></a>
         <input name="submit" type="image" src="imagenes/cambiar.png" value="Cambiar la clave" tabindex="5" />
        </td>
       </tr>
      </table>
     </form>
     <?php if($status != NULL) echo "<div id=\"informacion_gral\" style=\"text-align:center\"><img src=\"imagenes/informacion.png\" width=\"25\" height=\"25\" align=\"absmiddle\" /> $status</div>"; ?>
    </td>
    <td style="background:url(imagenes/linea_vertical_der.png) repeat-y">&nbsp;</td>
  </tr>
  <tr>
    <td><img src="imagenes/redondo_inf_izq.png" width="20" height="20" /></td>
    <td background="imagenes/linea_inferior.png">&nbsp;</td>
    <td><img src="imagenes/redondo_inf_der.png" width="20" height="20" /></td>
  </tr>
</table>
</center>
</body>
</html>
<?php
}
else
{
	include ('index.php');
}
?>
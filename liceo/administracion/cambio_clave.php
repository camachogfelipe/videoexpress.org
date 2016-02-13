<?php
session_start();

// check session variable
if (isset($_SESSION['valid_user']))
{
	$vieja = md5($_REQUEST['vieja']);
	$nueva = $_REQUEST['nueva'];
	$rnueva = $_REQUEST['rnueva'];
	$cambiar = $_REQUEST['cambioclave'];

	if ($cambiar == true)
	{
		include ("conexion.php");
		
		$query = mysql_query("SELECT clave_acceso FROM cat_usr WHERE codigo='$_SESSION[codigo]'");
		
		while($row=mysql_fetch_object($query))
	    {
		  $rvieja = $row->clave_acceso;
		}
		
		$clave_vieja = strcmp($vieja, $rvieja);
		$clave_nueva = strcmp($nueva, $rnueva);
		
		if ($clave_vieja == 0 and $clave_nueva == 0)
		{
			$nueva = md5($nueva);
			$query = "UPDATE cat_usr SET clave_acceso='$nueva' WHERE codigo='$_SESSION[codigo]'";
			mysql_query($query) or die(mysql_error());
			echo "<center><br />La clave se ha cambiado</center>";
		}
		else
		{
			echo "<center><br />Las claves no coinciden, no se ha cambiado la clave</center>";
		}

	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<link href="../estilo.css" rel="stylesheet" type="text/css" />
</head>

<body>
<center>
<form id="form1" name="form1" method="post" action="cambio_clave.php?cambioclave=true" >
<table width="400" border="0" cellspacing="3px" cellpadding="0" style="margin-top: 20px">
  <tr>
    <td>
     <table width="400" border="0" cellspacing="3px" cellpadding="0">
      <tr>
        <td width="200" style="text-align: left">Clave anterior</td>
        <td width="200"><input name="vieja" type="password" id="vieja" tabindex="1" size="30" maxlength="150" /></td>
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
     <input name="limpiar" type="reset" value="Limpiar el formulario" tabindex="4" />
     <input name="submit" type="submit" value="Cambiar la clave" tabindex="5" />
    </td>
  </tr>
</table>
</form>
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
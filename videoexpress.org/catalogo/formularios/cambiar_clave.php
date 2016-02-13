<?php
session_start();
include("../include/funciones_globales.php");

// check session variable
if (isset($_SESSION['usuario_afiliado']))
{
	$vieja = md5($_REQUEST['vieja']);
	$nueva = $_REQUEST['nueva'];
	$rnueva = $_REQUEST['rnueva'];
	$cambiar = $_REQUEST['cambioclave'];
	$status = NULL;
	$texto = $_REQUEST['texto'];
	
	if ($cambiar == true)
	{
		$conecta = conecta_bd("videoexpress");
		$user = $_SESSION['codigo_cliente'];
		
		$query = consulta_bd("usuarios","codigo_cliente, clave_acceso","1;;;codigo_cliente='$user'");
		//$query = mysql_query("SELECT codigo_cliente, clave_acceso FROM usuarios WHERE codigo_cliente='$user'");
		
		while($row=mysql_fetch_object($query))
	    {
		  //Mostramos los titulos de los articulos o lo que deseemos...
		  $vieja_clave = $row->clave_acceso;
		}
		
		$rvieja = $vieja_clave;
		$clave_vieja = strcmp($vieja, $rvieja);
		$clave_nueva = strcmp($nueva, $rnueva);
		
		if ($clave_vieja == 0 and $clave_nueva == 0)
		{
			$nueva = md5($nueva);
			if ($texto == true) $query = act_datos_tabla("usuarios","clave_acceso='$nueva', activo='si'","codigo_cliente='$user'",1);
			//$query = "UPDATE usuarios SET clave_acceso='$nueva', activo='si' WHERE codigo_cliente='$user'";
			else $query = act_datos_tabla("usuarios","clave_acceso='$nueva'","codigo_cliente='$user'",1);
			//$query = "UPDATE usuarios SET clave_acceso='$nueva' WHERE codigo_cliente='$user'";
			//mysql_query($query) or die(mysql_error());
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
<link href="../estilo.css" rel="stylesheet" type="text/css" />
</head>

<body style="background:url(../Imagenes_pagina/fondo_alfa.png) repeat; padding: 5px">
<div align="center">
  <h2>Bienvenido <?php echo $_SESSION['usuario_afiliado'] ?></h2>
</div>
<?php 
if ($texto == true)
{
?>
	<table width="50%" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td><p>Es preciso cambiar la clave porque usted a&uacute;n no est&aacute; activo debido a que es la primera vez que ingresa a nuestro portal.</p>
    <p>Hasta no hacer el cambio de contrase&ntilde;a no podr&aacute; alquilar peliculas.</p>
    <p>Administraci&oacute;n VideoExpress.org</p></td>
  </tr>
</table>
<?php
}
?>
<form id="clave" name="clave" method="post" action="cambiar_clave.php?cambioclave=true&texto=<?php echo $texto ?>" >
  	  <table width="400" border="0" cellspacing="3px" cellpadding="0" style="margin-top: 50px" align="center">
       <tr>
        <td>
         <table width="100%" border="0" cellspacing="3px" cellpadding="0">
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
         <a href="javascript:document.clave.reset()"><img src="../Imagenes_pagina/limpiar.png" width="100" height="26" border="0" /></a>
         <input name="submit" type="image" src="../Imagenes_pagina/ingresar.png" value="Cambiar la clave" tabindex="5" />
        </td>
       </tr>
      </table>
     </form>
     <?php if($status != NULL) echo "<div align=\"center\" style=\"text-align:center\">$status</div>"; ?>
</center>
</body>
</html>
<?php
}
else
{
	echo '<script languaje="Javascript">location.href="../"</script>';
}
?>
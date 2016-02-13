<?php
session_start();

// check session variable
if (isset($_SESSION['user_adminvideo']))
{
	$vieja = md5($_REQUEST['vieja']);
	$nueva = $_REQUEST['nueva'];
	$rnueva = $_REQUEST['rnueva'];
	$cambiar = $_REQUEST['cambioclave'];
	$user = "manuel";
	$status = NULL;
	
	if($nueva == NULL and $cambiar == true || $rnueva == NULL and $cambiar == true) $status = "La clave no puede estar vacía";
	
	if ($cambiar == true and $nueva != NULL and $rnueva != NULL)
	{
		$query = consulta_bd("cat_usr","usuario_admin, clave_acceso","1;;;usuario_admin='$user';");
		
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
			act_datos_tabla("cat_usr","clave_acceso='$nueva'","usuario_admin='$user'",1);
			$status = "La clave ha sido cambiada con exito";
		}
		else
		{
			$status = "Las claves no coinciden";
		}

	}
?>
<form id="clave" name="clave" method="post" action="?op=cc&cambioclave=true" >
<table width="550" border="0" cellspacing="3px" cellpadding="0" align="center">
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
  <tr>
	<td align="right">
	  <a href="javascript:document.clave.reset()">
      	<div id="btn">
          <img src="imagenes/limpiar.png" width="25" height="25" border="0" align="left" alt="ingresar">
		  <div id="texto">Limpiar</div>
		</div>
	  </a>
	</td>
	<td align="left">
	  <a href="javascript:document.clave.submit()" style="border:1px">
		<div id="btn">
		  <img src="imagenes/aceptar.png" width="25" height="25" border="0" align="left" alt="ingresar">
		  <div id="texto">Cambiar</div>
		</div>
	  </a>
	</td>
  </tr>
</table>
</form>
<?php if($status != NULL) echo "<center><div id=\"error2\"><img src=\"imagenes/error.png\" width=\"48\" height=\"48\" align=\"absmiddle\" /> $status</div></center>"; ?>
<?php
}
else
{
	include ('index.php');
}
?>
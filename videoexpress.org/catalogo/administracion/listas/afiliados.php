<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin título</title>
<link href="../../estilo.css" rel="stylesheet" type="text/css" />
</head>

<body style="font-size:12px">
<?php
// check session variable

if (isset($_SESSION['user_admin']))
{
	$orden = $_REQUEST['orden'];
	if($orden == NULL) $orden = "codigo_cliente/ASC";
	$orden1 = explode("/",$orden);
	
	include("../../include/funciones_globales.php");
	include("../../include/funciones_generales.php");
	$conecta = conecta_bd("videoexpress");

	$tabla = "usuarios";
	$datos = "*";
	$pagina = "afiliados";
	$pag = $_REQUEST['pag'];
	if($pag == NULL || $pag < 1) $pag = 1;
	$registros_a_mostrar = 7;
	include("codigo_comun.php");
?>
<table width="100%" border="1px" cellspacing="0" cellpadding="0" id="encabezado_tablas" style="border:1px solid #CCC">
      <tr align="center" class="encabezado_tabla">
        <td width="5%"><a href="afiliados.php?orden=codigo_cliente/<?php orden("codigo_cliente",$orden1) ?>&pag=<?php echo $pag ?>">Id cliente</a></td>
        <td width="8%"><a href="afiliados.php?orden=nombre/<?php echo orden("nombre",$orden1) ?>&pag=<?php echo $pag ?>">Nombre completo</a></td>
        <td width="15%"><a href="afiliados.php?orden=email/<?php echo orden("email",$orden1) ?>&pag=<?php echo $pag ?>">Correo electr&oacute;nico</a></td>
        <td width="11%">Tel&eacute;fonos de cont&aacute;cto</td>
        <td width="16%"><a href="afiliados.php?orden=direccion/<?php echo orden("direccion",$orden1) ?>&pag=<?php echo $pag ?>">Direcci&oacute;n</a></td>
        <td width="7%"><a href="afiliados.php?orden=barrio/<?php echo orden("barrio",$orden1) ?>&pag=<?php echo $pag ?>">Barrio</a></td>
        <td width="10%"><a href="afiliados.php?orden=iglesia_congrega/<?php echo orden("iglesia_congrega",$orden1) ?>&pag=<?php echo $pag ?>">Iglesia donde se congrega</a></td>
        <td width="7%"><a href="afiliados.php?orden=ultimo_alquiler/<?php echo orden("ultimo_alquiler",$orden1) ?>&pag=<?php echo $pag ?>">&Uacute;ltimo alquiler</a></td>
        <td width="5%"><a href="afiliados.php?orden=saldo/<?php echo orden("saldo",$orden1) ?>&pag=<?php echo $pag ?>">Saldo</a></td>
        <td width="4%"><a href="afiliados.php?orden=activo/<?php echo orden("activo",$orden1) ?>&pag=<?php echo $pag ?>">Activo</a></td>
        <td width="12%">Acci&oacute;n</td>
      </tr>
      <?php
	  $colorfila = 1;
	  
      while ($row = mysql_fetch_object($result))
	  {
	    if ($colorfila==0)
		{
			$color = "#9ABEDC";
			$color1 = "#000";
		    $colorfila = 1; 
		}
		else
		{
			$color = "#fff";
			$color1 = "#000";
			$colorfila = 0;
		}
		
		$estilo_celda = "valign='top' style='text-align:justify; background-color:$color; color:$color1'";

		echo "<tr $estilo_celda>";
		//id cliente
		$id = $row->codigo_cliente;
		echo "<td align=\"center\"><span id='menu_admon2'><a href=\"datos_comprador.php?id=$id&existe=1&tabla=$tabla\">";
		echo $id;
		echo "</a></span></td>";
		//email
		$nombre = $row->nombre;
		echo "<td align=\"center\">$nombre</td>";
		//telefono oficina
		$email = $row->email;
		echo "<td align=\"center\">$email</td>";
		//telefono oficina
		$tel_oficina = $row->tel_oficina;
		$tel_oficina2 = $row->tel_oficina2;
		$tel_casa = $row->tel_casa;
		$celular = $row->celular;
		echo "<td align=\"left\">";
		echo "Oficina: ".$tel_oficina."<br />Oficina2: ".$tel_oficina2."<br />Casa: ".$tel_casa."<br />Celular: ".$celular;
		echo "</td>";
		//direccion
		$direccion = $row->direccion;
		echo "<td align=\"center\">$direccion</td>";
		//barrio
		$barrio = $row->barrio;
		echo "<td align=\"center\">$barrio</td>";
		//iglesia congrega
		$iglesia = $row->iglesia_congrega;
		echo "<td align=\"center\">$iglesia</td>";
		//ultimo alquiler
		$alquiler = $row->ultimo_alquiler;
		echo "<td align=\"center\">$alquiler</td>";
		//saldo
		$saldo = $row->saldo;
		echo "<td align=\"center\">$ ".number_format($saldo)."</td>";
		//activo
		$activo = $row->activo;
		echo "<td align=\"center\">$activo</td>";
		//accion
		echo "<td align=\"left\">";
		echo "<span id='menu_admon2' style=\"text-align: left\"><a style=\"text-align: left\" href=\"editar_usuario.php?";
		echo "id=$id&";
		echo "nombre=$nombre&";
		echo "direccion=$direccion&";
		echo "barrio=$barrio&";
		echo "tel_oficina=$tel_oficina&";
		echo "tel_oficina2=$tel_oficina2&";
		echo "tel_casa=$tel_casa&";
		echo "celular=$celular&";
		echo "email=$email&";
		echo "iglesia=$iglesia&";
		echo "pagina=afiliados&";
		echo "orden=$orden&";
		echo "pag=$pag";
		echo "\"><img src=\"../Imagenes_pagina/editar.png\" width=\"15\" height=\"15\" border=\"0\" align=\"absmiddle\" /> Editar</a></span>";
		echo "<br /><span id='menu_admon2' style=\"text-align: left\"><a style=\"text-align: left\" href=\"activar.php?";
		echo "id=$id&";
		echo "activo=$activo&";
		echo "orden=$orden&";
		echo "pag=$pag";
		echo "\"><img src=\"../Imagenes_pagina/editar.png\" width=\"15\" height=\"15\" border=\"0\" align=\"absmiddle\" /> Activar / desactivar</a></span>";
		echo "</td></tr>";
	  }
	  ?>
</table>
<table width="100%" border="1px" cellspacing="0" cellpadding="0" style="border:1px solid #CCC">
</table>
<table width="100%" border="1px" cellspacing="0" cellpadding="0" style="border:1px solid #CCC">
</table>
     <?php
		paginacion_lista($total_paginas, $pag, $tabla, $pagina, $orden);
     ?>
</body>
</html>
<?php
}
else
{
	include ('index.php');
}
?>
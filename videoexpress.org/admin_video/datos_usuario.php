<?php
session_start();
ob_start("ob_gzhandler");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin título</title>
<link href="adminvideo.css" rel="stylesheet" type="text/css" />
</head>

<body style="font-size:0.9em">
<?php
// check session variable
if (isset($_SESSION['user_adminvideo']))
{
	$id = $_REQUEST['id'];
	$existe = $_REQUEST['e'];
	include ("../catalogo/include/funciones_globales.php");
	$conecta = conecta_bd("videoexpress");
	//nos conectamos a la tabla respectiva
	if($existe == 1)
	{
		$res_datos = consulta_bd("usuarios","*","1;;;codigo_cliente='$id'");
		while ($row = mysql_fetch_object($res_datos))
		{
			$cedula		= $row->codigo_cliente;
			$nombre		= $row->nombre;
			$direccion	= $row->direccion;
			$direccion  .= " ".$row->barrio;
			if($row->tel_oficina != NULL) $telefono	= $row->tel_oficina;
			elseif($row->tel_oficina2 != NULL) $telefono	= $row->tel_oficina2;
			else $telefono	= $row->tel_casa;
			$celular	= $row->celular;
			$email		= $row->email;
			$ciudad		= "Bogot&aacute;";
			$pais		= "Colombia";
		}
	}
	elseif($existe == 0)
	{
		$res_datos = consulta_bd("clientes","*","1;;;id_cliente='$id'");
		while ($row = mysql_fetch_object($res_datos))
		{
			$cedula		= $row->id_cliente;
			$nombre		= $row->nombres;
			$direccion	= $row->direccion;
			$telefono	= $row->telefono;
			$celular	= $row->celular;
			$email		= $row->email;
			$ciudad		= $row->ciudad;
			$pais		= $row->pais;
		}
	}
	$tabla = "facturas_canceladas";
	if($tabla == 'facturas_canceladas')
	{
		$total_resultados = dato_columna("facturas_canceladas","COUNT(*)","1;;;id_comprador='$id'");

		$result = consulta_bd("facturas_canceladas","*","3;id_factura;DESC;id_comprador='$id';");
		$result1 = consulta_bd("facturas_canceladas","precio","1;;;id_comprador='$id'");
		
		$total_compra = 0;
		
		while ($row1 = mysql_fetch_object($result1))
		{
			$total_compra += $row1->precio;
		}
	}
?>
<table width="550" border="0" cellspacing="0" cellpadding="2" align="center" style="border:1px solid #069">
  <tr>
    <td width="100" rowspan="9" align="center" valign="top"><img src="../catalogo/Imagenes_pagina/afiliado.png" width="100" height="150" /></td>
    <td width="158" id="encabezado_tablas">Identificaci&oacute;n</td>
    <td width="330" id="encabezado_tablas"><?php echo $cedula ?></td>
  </tr>
  <tr id="encabezado_tabla">
    <td>Nombre(s)</td>
    <td><?php echo $nombre ?></td>
  </tr>
  <tr>
    <td>Direcci&oacute;n</td>
    <td><?php echo $direccion ?></td>
  </tr>
  <tr id="encabezado_tabla">
    <td>Tel&eacute;fono</td>
    <td><?php echo $telefono ?></td>
  </tr>
  <tr>
    <td>Celular</td>
    <td><?php echo $celular ?></td>
  </tr>
  <tr id="encabezado_tabla">
    <td>Correo electr&oacute;nico</td>
    <td><?php echo $email ?></td>
  </tr>
  <tr>
    <td>Ciudad</td>
    <td><?php echo $ciudad ?></td>
  </tr>
  <tr id="encabezado_tabla">
    <td>Pa&iacute;s</td>
    <td><?php echo $pais ?></td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
</table>
<?php
if($tabla == 'facturas_canceladas')
{
	?>
<br /><div class="encabezado" id="encabezado_tabla">Total facturas emitidas a este cliente: <em><?php echo $total_resultados ?></em></div><br />
<div class="encabezado" id="encabezado_tabla">Total facturado a este cliente: <em>$ <?php echo number_format($total_compra) ?></em> pesos</div><br />
<div class="encabezado" id="encabezado_tabla">Detalle de las facturas emitidas a este cliente:</div><br />
<div>
<table width="100%" border="1px" cellspacing="0" cellpadding="0" id="encabezado_tablas" style="border:1px solid #CCC">
      <tr align="center" id="encabezado_tabla">
        <td width="3%" rowspan="2">Id</td>
        <td colspan="3">Art&iacute;culos del pedido</td>
        <td colspan="2">Valor total Factura</td>
        <td rowspan="2" width="8%">Fecha de cancelaci&oacute;n</td>
        <td rowspan="2" width="7%">Fecha de emisi&oacute;n</td>
        <td rowspan="2" width="4%">Dev.</td>
        <td rowspan="2" width="5%">No  aud.</td>
        <td rowspan="2" width="6%">Tipo de auditorio</td>
        <td rowspan="2" width="17%">Comentarios</td>
      </tr>
      <tr align="center" id="encabezado_tabla">
       <td width="6%">Tipo de pedido</td>
       <td width="27%">T&iacute;tulo</td>
       <td width="3%">Cant.</td>
       <td width="7%">Valor Unitario</td>
       <td width="7%">Total</td>
      </tr>
      <?php
	  $colorfila = 1;
	  
	  if($result != NULL)
	  {
		  while ($row = mysql_fetch_object($result))
		  {
		    if ($colorfila==0)
        {
            $color = "#F3F8FB";
            $color1 = "#000";
            $colorfila = 1; 
        }
        else
        {
            $color = "#DDEEFF";
            //A8CEFF
            $color1 = "#000";
            $colorfila = 0;
        }
		
			$estilo_celda = "valign='top' style='text-align:justify; background-color:$color; color:$color1'";

			echo "<tr $estilo_celda>";
			//id
			$id = $row->id_factura;
			echo "<td align=\"center\">$id</td>";
			//tipo
			$tipo = explode('+',$row->tipo);
			$sizeof = sizeof($tipo);
			$sizeof--;
			echo "<td>";
			for ($i=0; $i<$sizeof; $i++) echo $tipo[$i]."<br />";
			echo "</td>";
			//articulos
			$articulos = explode('+',$row->articulos);
			$peliculas = implode(',',$articulos);
			$sizeof = sizeof($articulos);
			$sizeof--;
			echo "<td>";
			for ($i=0; $i<$sizeof; $i++) echo $articulos[$i]."<br />";
			echo "</td>";
			//cantidades
			$cantidades = explode('+',$row->cantidades);
			$sizeof = sizeof($cantidades);
			$sizeof--;
			echo "<td align=\"center\">";
			$cant = 0;
			for ($i=0; $i<$sizeof; $i++)
			{
				echo $cantidades[$i]."<br />";
				$cant += $cantidades[$i];
			}
			echo "<div id=\"encabezado_tabla\">".$cant." U</div>";
			echo "</td>";
			//precios unitarios
			$precios_unitarios = explode('+',$row->precios_unitarios);
			$sizeof = count($precios_unitarios);
			$sizeof--;
			$subto = array();
			echo "<td align=\"left\">";
			for ($i=0; $i<$sizeof; $i++)
			{
				echo "$ ".number_format($precios_unitarios[$i])."<br />";
				$subto[$i] = $cantidades[$i] * $precios_unitarios[$i];
			}
			echo "<div id=\"encabezado_tabla\">Total</div></td>";
			//precio
			$precio = $row->precio;
			echo "<td align=\"left\">";
			$count = count($subto);
			for ($i=0; $i<$count; $i++) echo "$ ".number_format($subto[$i])."<br />";
			echo "<div id=\"encabezado_tabla\">$ ".number_format($precio)."</div></td>";
			//fecha de cancelada
			$fecha_cancelada = $row->fecha_cancelada_dia."-".$row->fecha_cancelada_mes."-".$row->fecha_cancelada_anio." ".$row->fecha_cancelada_hora;
			echo "<td>$fecha_cancelada</td>";
			//fecha de emisiÃ³n
			$fecha_emision = $row->fecha_emision;		
			echo "<td>$fecha_emision</td>";
			//devueltas
			$devueltas = $row->devueltas;
			echo "<td align=\"center\">$devueltas</td>";
			//no auditorio
			$no_auditorio = $row->auditorio_no;
			echo "<td align=\"center\">$no_auditorio</td>";
			//tipo auditorio
			$tipo_auditorio = $row->tipo_auditorio;
			echo "<td>$tipo_auditorio</td>";
			//comentarios
			$comentarios = $row->comentarios;
			echo "<td>$comentarios</td>";
			echo "</tr>";
		 }
	  }
	  ?>
</table>
</div>
<?php
}
?>
</body>
</html>
<?php
}
else
{
	echo '<script languaje="Javascript">location.href="../admin_video"</script>';
}
ob_end_flush();
?>
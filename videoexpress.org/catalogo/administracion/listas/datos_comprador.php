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

<body style="color:#000">
<?php
// check session variable

if (isset($_SESSION['user_admin']))
{
	$id = $_REQUEST['id'];
	$existe = $_REQUEST['existe'];
	$tabla	= $_REQUEST['tabla'];
	include ("../../include/funciones_globales.php");
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
	$tabla = "facturas";
	if($tabla == 'facturas')
	{
		$total_resultados = dato_columna("facturas","COUNT(*)","1;;;id_comprador='$id'");
		//SELECT id_factura, tipo, articulos, precios_unitarios, precio, devueltas, auditorio_no, tipo_auditorio, comentarios FROM `facturas` LEFT JOIN info_fac_videx USING (`id_factura`) LEFT JOIN info_peliculas USING (`id_factura`)  WHERE `Pertenece_a` = "videx"
		$tbl = "facturas LEFT JOIN info_fac_videx USING (`id_factura`) LEFT JOIN info_peliculas USING (`id_factura`)";
		$datos = "id_factura, tipo, articulos, cantidades, precios_unitarios, precio, fecha_emision, fecha_cancelada, fecha_cancelada_hora, devueltas, auditorio_no, tipo_auditorio, comentarios";
		$result = consulta_bd($tbl, $datos, "3;id_factura;DESC;id_comprador='$id' and Pertenece_a='videx';");
		$result1 = consulta_bd("facturas","precio","1;;;id_comprador='$id'");
		
		$total_compra = 0;
		
		while ($row1 = mysql_fetch_object($result1))
		{
			$total_compra += $row1->precio;
		}
	}
?>
<table width="550" border="0" cellspacing="0" cellpadding="2" align="center" style="border:1px solid #069">
  <tr>
    <td width="100" rowspan="9" align="center" valign="top"><img src="../../Imagenes_pagina/afiliado.png" width="100" height="150" /></td>
    <td width="158" id="encabezado_tablas">Identificaci&oacute;n</td>
    <td width="330" id="encabezado_tablas"><?php echo $cedula ?></td>
  </tr>
  <tr class="encabezado_tabla">
    <td>Nombre(s)</td>
    <td><?php echo $nombre ?></td>
  </tr>
  <tr>
    <td>Direcci&oacute;n</td>
    <td><?php echo $direccion ?></td>
  </tr>
  <tr class="encabezado_tabla">
    <td id="encabezado_tablas">Tel&eacute;fono</td>
    <td id="encabezado_tablas"><?php echo $telefono ?></td>
  </tr>
  <tr>
    <td>Celular</td>
    <td><?php echo $celular ?></td>
  </tr>
  <tr class="encabezado_tabla">
    <td id="encabezado_tablas">Correo electr&oacute;nico</td>
    <td id="encabezado_tablas"><?php echo $email ?></td>
  </tr>
  <tr>
    <td>Ciudad</td>
    <td><?php echo $ciudad ?></td>
  </tr>
  <tr class="encabezado_tabla">
    <td id="encabezado_tablas">Pa&iacute;s</td>
    <td id="encabezado_tablas"><?php echo $pais ?></td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
</table>
<?php
if($tabla == 'facturas')
{
	?>
<br /><div class="encabezado_tabla">Total facturas emitidas a este cliente: <?php echo $total_resultados ?></div><br />
<div class="encabezado_tabla">Total facturado a este cliente: $ <?php echo number_format($total_compra) ?></div><br />
<div class="encabezado_tabla">Detalle de pedidos realizados por este cliente:</div>
<br />
<div>
<table width="100%" border="1px" cellspacing="0" cellpadding="0" id="encabezado_tablas" style="border:1px solid #CCC">
      <tr align="center" class="encabezado_tabla">
        <td width="2%" rowspan="2"><a href='lista_facturas.php?ord=id_factura'>Id</a></td>
        <td colspan="3">Art&iacute;culos del pedido</td>
        <td colspan="2">Valor total Factura</td>
        <td rowspan="2" width="8%">Fecha cancelaci&oacute;n</td>
        <td rowspan="2" width="7%">Fecha de emisi&oacute;n</td>
        <td rowspan="2" width="7%"><a href='lista_facturas.php?ord=devueltas'>Devueltas</a></td>
        <td rowspan="2" width="7%">No de auditorio</td>
        <td rowspan="2" width="6%">Tipo de auditorio</td>
        <td rowspan="2" width="19%">Comentarios</td>
      </tr>
      <tr align="center" class="encabezado_tabla">
       <td width="6%">Tipo de pedido</td>
       <td width="17%">T&iacute;tulo</td>
       <td width="7%">Cantidades</td>
       <td width="9%">Unitario</td>
       <td width="5%">Total</td>
      </tr>
      <?php
	  $colorfila = 1;
	  
	  if($result != NULL)
	  {
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
			for ($i=0; $i<$sizeof; $i++) echo $cantidades[$i]."<br />";
			echo "</td>";
			//precios unitarios
			$precios_unitarios = explode('+',$row->precios_unitarios);
			$sizeof = sizeof($precios_unitarios);
			$sizeof--;
			echo "<td align=\"center\">";
			for ($i=0; $i<$sizeof; $i++)
			{
				echo number_format($precios_unitarios[$i])."<br />";
				$subto[$i] = $cantidades[$i] * $precios_unitarios[$i];
			}
			echo "<span id=\"encabezado_tablas\">Total</span></td>";
			//precio
			$precio = $row->precio;
			echo "<td align=\"center\">";
			$sizeof = sizeof($subto);
			for ($i=0; $i<$sizeof; $i++) echo number_format($subto[$i])."<br />";
			echo "<span id=\"encabezado_tablas\">".number_format($precio)."</span></td>";
			//fecha de cancelada
			$fecha_cancelada = $row->fecha_cancelada." ".$row->fecha_cancelada_hora;
			echo "<td>$fecha_cancelada</td>";
			//fecha de emisiÃ³n
			$fecha_emision = $row->fecha_emision;		
			echo "<td>$fecha_emision</td>";
			//devueltas
			$devueltas = $row->devueltas;
			echo "<td>$devueltas</td>";
			//no auditorio
			$no_auditorio = $row->auditorio_no;
			echo "<td>$no_auditorio</td>";
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
<p align="center"><a id="flechas" onclick="history.go(-1)" style="cursor:pointer" ><img src="../../botones/botonatras.png" alt="Regresar" width="25" height="25" align="absmiddle" /> Regresar</a></p>
</body>
</html>
<?php
}
else
{
	include ('index.php');
}
?>
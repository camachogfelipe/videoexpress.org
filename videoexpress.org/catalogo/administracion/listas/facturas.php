<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Facturas</title>
<link href="../../estilo.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php
// check session variable

if (isset($_SESSION['user_admin']))
{
	$orden = $_REQUEST['orden'];
	if($orden == NULL) $orden = "id_factura/DESC";
	$orden1 = explode("/",$orden);
	
	include("../../include/funciones_globales.php");
	include("../../include/funciones_generales.php");
	$conecta = conecta_bd("videoexpress");

	$tabla = "facturas LEFT JOIN info_fac_videx ON (facturas.id_factura=info_fac_videx.id_factura) LEFT JOIN info_peliculas ON (facturas.id_factura=info_peliculas.id_factura)";
	$datos = "facturas.*, info_fac_videx.devueltas, info_peliculas.auditorio_no, info_peliculas.tipo_auditorio";
	$pagina = "facturas";
	$pag = $_REQUEST['pag'];
	if($pag == NULL || $pag < 1) $pag = 1;
	$registros_a_mostrar = 10;
	include("codigo_comun.php");
?>
<table width="100%" border="1px" cellspacing="0" cellpadding="0" id="encabezado_tablas" style="border:1px solid #CCC">
      <tr align="center" class="encabezado_tabla">
        <td width="1%" rowspan="2"><a href='facturas.php?orden=id_factura/<?php orden("id_factura",$orden1) ?>'>Id</a></td>
        <td rowspan="2" width="12%">Datos Comprador</td>
        <td colspan="3">Art&iacute;culos del pedido</td>
        <td colspan="2">Valor total Factura</td>
        <td rowspan="2" width="9%">Fecha cancelaci&oacute;n</td>
        <td rowspan="2" width="9%">Fecha de emisi&oacute;n</td>
        <td rowspan="2" width="2%"><a href='facturas.php?orden=devueltas/<?php orden("devueltas",$orden1) ?>'>Devueltas</a></td>
        <td rowspan="2" width="13%">Acci&oacute;n</td>
      </tr>
      <tr align="center" class="encabezado_tabla">
       <td width="5%">Tipo</td>
       <td width="29%">T&iacute;tulo</td>
       <td width="9%">Cantidades</td>
       <td width="7%">Unitario</td>
       <td width="5%">Total</td>
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
		//id
		$id = $row->id_factura;
		echo "<td align=\"center\">$id</td>";
		//id comprador
		$id_comprador = $row->id_comprador;
		$sizeof = substr_count($id_comprador,'-');
		if ($sizeof > 0)
		{
			$existe = "1";
		}
		else
		{
			$existe = "0";
		}
		if($id_comprador == 'Factura Anulada')
		{
			echo "<td align=\"center\"><span id='menu_admon2'>";
			echo $id_comprador;
			echo "</span></td>";
		}
		else
		{
			echo "<td align=\"center\"><span id='menu_admon2'>";
			echo "<a href=\"datos_comprador.php?id=$id_comprador&existe=$existe&tabla=$tabla\">";
			echo $id_comprador;
			echo "</a></span></td>";
		}
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
		//$sizeof = sizeof($subto);
		for ($i=0; $i<$sizeof; $i++) echo number_format($subto[$i])."<br />";
		echo "<span id=\"encabezado_tablas\">".number_format($precio)."</span></td>";
		//fecha de cancelada
		$fecha_cancelada = $row->fecha_cancelada_dia."-".$row->fecha_cancelada_mes."-".$row->fecha_cancelada_anio." ".$row->fecha_cancelada_hora;
		echo "<td>$fecha_cancelada</td>";
		//fecha de emisiÃ³n
		$fecha_emision = $row->fecha_emision;		
		echo "<td>$fecha_emision</td>";
		//devueltas
		$devueltas = $row->devueltas;
		echo "<td>$devueltas</td>";
		//accion
		echo "<td>";
		echo "<span id='menu_admon2'>";
		echo "<a href=\"factura.php?id=$id&tabla=facturas&existe=$existe\">Ver factura para imprimir</a>";
		echo "</span>";
		if($devueltas == 'no' and $id_comprador != 'Factura Anulada')
		{
			echo "<br><span id='menu_admon2'>";
			echo "<a href=\"devueltas.php?id=$id\">Devolver peliculas</a>";
			echo "</span>";
		}
		$auditorio_no = $row->auditorio_no;
		$tipo_auditorio = $row->tipo_auditorio;
		if($auditorio_no == 0 and $tipo_auditorio == NULL)
		{
			if($id_comprador != 'Factura Anulada')
			{
				echo "<br><span id='menu_admon2'>";
				echo "<a href=\"formulario_auditorio.php?id_factura=$id&id_comprador=$id_comprador&peliculas=$peliculas\">";
				echo "Obtener información de auditorio</a>";
				echo "<br /><span id='menu_admon2'><a href=\"cancelar_factura.php?id=$id&anular=factura\">Anular factura</a></span><br />";
				echo "</span>";
			}
		}
		echo "</td>";
		echo "</tr>";
	  }
	  ?>
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

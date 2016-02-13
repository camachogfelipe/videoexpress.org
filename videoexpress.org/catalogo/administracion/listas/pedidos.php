<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>lista pedidos</title>
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

	$tabla = "pedidos";
	$datos = "*";
	$pagina = "pedidos";
	$pag = $_REQUEST['pag'];
	if($pag == NULL || $pag < 1) $pag = 1;
	$registros_a_mostrar = 10;
	include("codigo_comun.php");
?>
     <table width="100%" border="1px" cellspacing="0" cellpadding="0" id="listado_peliculas" style="border:1px solid #CCC">
      <tr align="center" class="encabezado_tabla">
        <td rowspan="2" width="3%">Id</td>
        <td rowspan="2"  width="12%">Datos Comprador</td>
        <td colspan="3">Art&iacute;culos del pedido</td>
        <td colspan="2">Valor  Factura</td>
        <td rowspan="2"  width="13%">Fecha de emisi&oacute;n</td>
        <td rowspan="2"  width="19%">Acci&oacute;n</td>
      </tr>
      <tr align="center" class="encabezado_tabla">
       <td width="5%">Tipo</td>
       <td width="28%">T&iacute;tulo</td>
       <td width="6%">Cantidades</td>
       <td width="7%">Unitario</td>
       <td width="7%">Total</td>
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

		echo "<tr $estilo_celda>\n";
		//id
		$id = $row->id_factura;
		echo "<td align=\"center\">$id</td>\n";
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
		echo "<td align=\"center\"><span id='menu_admon2'><a href=\"datos_comprador.php?id=$id_comprador&existe=$existe&tabla=$tabla\">";
		echo $id_comprador;
		echo "</a></span></td>\n";
		//tipo
		$tipo = explode('+',$row->tipo);
		$tipo1 = $row->tipo;
		$sizeof = sizeof($tipo);
		$sizeof--;
		echo "<td>";
		for ($i=0; $i<$sizeof; $i++)
		{
			if($tipo[$i] == "resena") echo "Reseña<br />";
			else echo $tipo[$i]."<br />";
		}
		echo "</td>\n";
		//articulos
		$articulos = explode('+',$row->articulos);
		$articulos1 = implode("@",$articulos);
		$sizeof = sizeof($articulos);
		$sizeof--;
		echo "<td>";
		for ($i=0; $i<$sizeof; $i++) echo $articulos[$i]."<br />";
		echo "</td>\n";
		//cantidades
		$cantidades1 = $row->cantidades;
		$cantidades = explode('+',$row->cantidades);
		$sizeof = sizeof($cantidades);
		$sizeof--;
		echo "<td align=\"center\">";
		for ($i=0; $i<$sizeof; $i++) echo $cantidades[$i]."<br />";
		echo "</td>\n";
		//precios unitarios
		$precios = $row->precios_unitarios;
		$precios_unitarios = explode('+',$row->precios_unitarios);
		$sizeof = sizeof($precios_unitarios);
		$sizeof--;
		echo "<td align=\"center\">";
		for ($i=0; $i<$sizeof; $i++)
		{
			echo "$ ".number_format($precios_unitarios[$i])."<br />";
			$subto[$i] = $cantidades[$i] * $precios_unitarios[$i];
		}
		echo "<span id=\"encabezado_tablas\">Total</span></td>\n";
		//precio
		$precio = $row->precio;
		echo "<td align=\"center\">";
		//$sizeof = sizeof($subto);
		for ($i=0; $i<$sizeof; $i++) echo "$ ".number_format($subto[$i])."<br />";
		echo "<span id=\"encabezado_tablas\">$ ".number_format($precio)."</span></td>\n";
		//fecha de emisiÃ³n
		$fecha_emision = $row->fecha_emision;
		if($tipo[0] == "Afiliación") $afiliacion = "si";
		else $afiliacion = "no";
		echo "<td align=\"center\">$fecha_emision</td>\n";
		$id_peliculas = $row->id_peliculas;
		$id_peliculas2 = substr_count($id_peliculas,'@');
		//accion
		echo "<td>";
		if($afiliacion == 'si' and $id_peliculas2 == 0)
		{
			if($precio == 0) $_SESSION['ac'] = $ac = 1;
			else $_SESSION['ac'] = $ac = 0;
			echo "<span id='menu_admon2'><a href=\"../modificar_pedido/modificar_pedido.php?id_fac=$id&ac=$ac&titulos=$articulos1&tipo=$tipo1\">Modificar pedido por afiliación</a></span><br />";
		}
		elseif($afiliacion == 'si' and $id_peliculas2 > 0)
		{
			echo "<span id='menu_admon2'><a href=\"cancelar_factura.php?id=$id&afiliacion=$afiliacion\">Generar la factura</a></span><br />";
		}
		elseif($afiliacion == 'no')
		{
			echo "<span id='menu_admon2'><a href=\"../modificar_pedido/modificar_pedido.php?id_fac=$id&titulos=$articulos1&id_peliculas=$id_peliculas&tipo=$tipo1&precios=$precios&cantidades=$cantidades1\">Modificar pedido</a></span><br />";
			echo "<span id='menu_admon2'><a href=\"cancelar_factura.php?id=$id&afiliacion=$afiliacion\">Generar la factura</a></span><br />";
		}
		echo "<span id='menu_admon2'><a href=\"factura.php?id=$id&tabla=pedidos&existe=$existe\">Ver orden de pedido para imprimir</a></span>";
		echo "<br /><span id='menu_admon2'><a href=\"cancelar_factura.php?id=$id&anular=pedido\">Anular pedido</a></span><br />";
		echo "</td>\n</tr>\n";
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

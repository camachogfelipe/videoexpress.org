<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin titulo</title>
<link href="estilo_admin.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php
// check session variable

if (isset($_SESSION['valid_user']))
{
   include ("funciones.php");
	conecta_bd("redlibr_redlibreria");
	//definimos las variables para la paginacion
	$tabla = "facturas";
	$pagina = "lista_facturas";
	$lis = 4;
	//nos conectamos a la tabla respectiva
	$x = @$_REQUEST["ord"];
	if ($x == NULL) $x = 1;
	include ("ordenar.php");
   
   $result = mysql_query($sql) or die("La siguiente consulta contiene alg&uacute;n error:<br>nSQL: <b>$sql</b>");
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="20"><img src="imagenes/redondo_sup_izq.png" width="20" height="20" /></td>
    <td style="background:url(imagenes/linea_superior.png) repeat-x">&nbsp;</td>
    <td width="20"><img src="imagenes/redondo_sup_der.png" width="20" height="20" /></td>
  </tr>
  <tr>
    <td style="background:url(imagenes/linea_vertical_izq.png) repeat-y">&nbsp;</td>
    <td bgcolor="#ebebeb" align="center">
     <table width="100%" border="0" cellspacing="0" cellpadding="0" id="tabla">
      <tr align="center" id="encabezado_tablas">
        <td rowspan="2" width="2%"><a href="lista_facturas.php?ord=1&pag<?php $pag++; echo $pag; ?>"><img src="imagenes/ordenar.png" alt="" width="15" height="15" border="0" /></a> Id</td>
        <td rowspan="2" width="9%"><a href="lista_facturas.php?ord=2&pag<?php echo $pag; ?>"><img src="imagenes/ordenar.png" alt="" width="15" height="15" border="0" /></a> Datos Comprador</td>
        <td colspan="2">Art&iacute;culos comprados</td>
        <td colspan="2"><a href="lista_facturas.php?ord=3&pag<?php echo $pag; ?>"><img src="imagenes/ordenar.png" alt="" width="15" height="15" border="0" /></a> Valor total Factura</td>
        <td rowspan="2" width="11%"><a href="lista_facturas.php?ord=4&pag<?php echo $pag; ?>"><img src="imagenes/ordenar.png" alt="" width="15" height="15" border="0" /></a> Fecha cancelaci&oacute;n</td>
        <td rowspan="2" width="11%"><a href="lista_facturas.php?ord=5&pag<?php echo $pag; ?>"><img src="imagenes/ordenar.png" alt="" width="15" height="15" border="0" /></a> Fecha de emisi&oacute;n</td>
        <td rowspan="2" width="15%">Acci&oacute;n</td>
      </tr>
      <tr align="center" id="encabezado_tablas">
       <td width="28%">T&iacute;tulo</td>
       <td width="7%">Cantidades</td>
       <td>Unitario</td>
       <td>Total</td>
      </tr>
      <?php
      while ($row = mysql_fetch_object($result))
     {
       if ($colorfila==0)
      {
         $color = "#dddddd";
         $colorfila = 1;
      }
      else
      {
         $colorfila = 0;
      }
      
      $estilo_celda = "valign='top' style='text-align:justify; background-color:$color'";

      echo "<tr $estilo_celda>";
      //id
      $id = $row->id_factura;
      echo "<td align=\"center\">$id</td>";
      //id comprador
      $id_comprador = $row->id_comprador;
      echo "<td align=\"center\"><a href=\"datos_comprador.php?id=$id_comprador\">$id_comprador</a></td>";
      //articulos
      $articulos = explode('+',$row->articulos);
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
         echo $precios_unitarios[$i]."<br />";
         $subto[$i] = $cantidades[$i] * $precios_unitarios[$i];
      }
      echo "<span id=\"encabezado_tablas\">Total</span></td>";
      //precio
      $precio = $row->total;
      echo "<td align=\"center\">";
      $sizeof = sizeof($subto);
      for ($i=0; $i<$sizeof; $i++) echo $subto[$i]."<br />";
      echo "<span id=\"encabezado_tablas\">$precio</span></td>";
      //fecha de cancelada
      $fecha_cancelada = $row->fecha_cancelada;
      echo "<td>$fecha_cancelada</td>";
      //fecha de emisión
      $fecha_emision = $row->fecha_emision;
      echo "<td>$fecha_emision</td>";
      //accion
      echo "<td>";
      echo "<a href=\"factura.php?id=$id&tabla=facturas\"><img src=\"imagenes/ver.png\" border=\"0\" width=\15\" height=\"15\" align=\"absmiddle\">Ver factura para imprimir</a></td>";
      echo "</tr>";
     }
     ?>
     </table>
     <?php include('paginacion.php') ?>
    </td>
    <td style="background:url(imagenes/linea_vertical_der.png) repeat-y">&nbsp;</td>
  </tr>
  <tr>
    <td><img src="imagenes/redondo_inf_izq.png" width="20" height="20" /></td>
    <td style="background:url(imagenes/linea_inferior.png) repeat-x">&nbsp;</td>
    <td><img src="imagenes/redondo_inf_der.png" width="20" height="20" /></td>
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

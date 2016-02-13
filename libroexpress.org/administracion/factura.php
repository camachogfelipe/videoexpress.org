<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin título</title>
<link href="estilo_admin.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php
// check session variable

if (isset($_SESSION['valid_user']))
{
   $id = $_REQUEST['id'];
   $tabla = $_REQUEST['tabla'];
   
   $texto = "Orden de pedido";
   $texto2 = "pedido";		

   include ("conexion.php");
   conecta_bd("libroexpress");
   //nos conectamos a la tabla respectiva
   $sql = "select * FROM pedidos WHERE id_factura = '$id'";
   $result = mysql_query($sql) or die("La siguiente consulta contiene alg&uacute;n error:<br>nSQL: <b>$sql</b>");
   while ($row = mysql_fetch_object($result))
   {
      $id_factura          = $row->id_factura;
      $id_comprador        = $row->id_comprador;
      $articulos           = $row->articulos;
      $cantidades          = $row->cantidades;
      $precios_unitarios   = $row->precios_unitarios;
      $precio              = $row->precio;
      $fecha_emision       = $row->fecha_emision;
      $trm                 = $row->dolar_factura;
   }
   
   $rango_factura = explode("+", $rango_factura);

   $factura_del		= $rango_factura[0];
   $factura_al			= $rango_factura[1];

   $articulos        = explode('+',$articulos);
   $cantidades       = explode('+',$cantidades);
   $precios_unitarios   = explode('+',$precios_unitarios);

   $sizeof = sizeof($articulos);
   $sizeof--;

   $sql = "select * FROM clientes WHERE cedula = '$id_comprador'";
   $result = mysql_query($sql) or die("La siguiente consulta contiene alg&uacute;n error:<br>nSQL: <b>$sql</b>");
   while ($row = mysql_fetch_object($result))
   {
      $cedula     = $row->cedula;
      $nombre     = $row->nombre;
      $apellidos  = $row->apellidos;
      $direccion  = $row->direccion;
      $telefono   = $row->telefono;
      $celular = $row->celular;
      $ciudad     = $row->ciudad;
      $pais    = $row->pais;
   }

   if($pais == 'Colombia')
   {
      //iniciamos las variables
      $to_sin_iva = $to_cantidad = $to_con_iva = $to_iva = $tmp = 0;

      for($i=0; $i<$sizeof; $i++)
      {
         //sacamos los valores sin iva
         $sin_iva[$i] = $precios_unitarios[$i]*0.16;
         $sin_iva2[$i] = $precios_unitarios[$i] - $sin_iva[$i];
         $sin_iva[$i] = $cantidades[$i] * $sin_iva[$i];
         $to_iva += $sin_iva[$i];
         $tmp = $sin_iva2[$i] * $cantidades[$i];
         $to_sin_iva += $tmp;
         //sacamos el total de unidades
         $to_cantidad += $cantidades[$i];
         //sacamos los totales con iva
         $con_iva[$i] = $precios_unitarios[$i] * $cantidades[$i];
         $to_con_iva += $con_iva[$i];
      }
   }
   else
   {
      //iniciamos las variables
      $to_sin_iva = $to_cantidad = $to_con_iva = $to_iva = $tmp = 0;

      for($i=0; $i<$sizeof; $i++)
      {
         //sacamos los valores sin iva
         $sin_iva[$i] = 0;
         $sin_iva2[$i] = $precios_unitarios[$i];
         $sin_iva[$i] = $cantidades[$i] * $sin_iva[$i];
         $to_iva += $sin_iva[$i];
         $tmp = $sin_iva2[$i] * $cantidades[$i];
         $to_sin_iva += $tmp;
         //sacamos el total de unidades
         $to_cantidad += $cantidades[$i];
         //sacamos los totales con iva
         $con_iva[$i] = $precios_unitarios[$i] * $cantidades[$i];
         $to_con_iva += $con_iva[$i];
      }
   }
?>
<table width="1000" height="519" border="0" cellspacing="0" cellpadding="0" style="font-size:12px; font-family:Arial, Helvetica, sans-serif; color:#66cc99" align="center">
  <tr>
    <td align="center" valign="middle">
     <table width="1000" height="468" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td>
         <table width="100%" height="68" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="10%">&nbsp;</td>
            <td valign="top">
             <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="14%">Nombre:</td>
                <td width="19%"><span style="color:#000">VideoExpress.org</span></td>
                <td width="67%" rowspan="5" align="center"><img src="imagenes/logoprovisional.png" width="100" height="37" /></td>
              </tr>
              <tr>
                <td>Nit:</td>
                <td><span style="color:#000">830.501.686-3</span></td>
              </tr>
              <tr>
                <td>Direcci&oacute;n:</td>
                <td><span style="color:#000">Cra. 7 B No. 151 - 97</span></td>
              </tr>
              <tr>
                <td>Tel&eacute;fono:</td>
                <td><span style="color:#000">5269007</span></td>
              </tr>
              <tr>
                <td>Ciudad:</td>
                <td><span style="color:#000">Bogot&aacute;</span></td>
              </tr>
            </table>
            </td>
            <td width="200" valign="top">
             <table width="100%" height="57" border="0" cellspacing="0" cellpadding="0" style="border: 1px #66CC99 solid">
              <tr>
                <td height="29" align="right" style="border-bottom:1px #66CC99 solid"><span style="font-size: 12px"><?php echo $texto ?></span><br /><span style="font-size:8px">IMPRESA POR COMPUTADOR</span></td>
              </tr>
              <tr>
                <td height="28" style="font-size:12px"><span style="color: #cc9966; font-size:14; font-weight: bold; float:left">No. </span><span style="float:right; color: #cc9966; font-size:14; font-weight: bold"><?php echo $id_factura ?></span></td>
              </tr>
            </table></td>
          </tr>
         </table>
        </td>
      </tr>
      <tr>
        <td height="100" align="center" valign="top" style="border:1px solid #66CC99"><table width="98%" border="0" cellspacing="0" cellpadding="0">
          <tr style="font-weight: bold" height="11">
            <td width="43%">Resoluci&oacute;n de autorizaci&oacute;n DIAN No. <span style="color:#000"><?php echo $resolucion_dian; ?></span></td>
            <td width="27%">Fecha: <span style="color:#000"><?php echo $fecha_res_dian; ?></span></td>
            <td width="15%">del No. <span style="color:#000"><?php echo $factura_del; ?></span></td>
            <td width="15%">al No. <span style="color:#000"><?php echo $factura_al; ?></span></td>
          </tr>
        </table>
        <table width="98%" height="75" border="0" cellspacing="0" cellpadding="0" style="border: 1px solid #66cc99">
          <tr>
            <td width="45%" style="border-right:1px solid #66CC99">
             <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="17%" align="left">Vendido a:</td>
                <td width="83%" align="left" style="color:#000"><?php echo $nombre." ".$apellidos ?></td>
              </tr>
              <tr>
                <td align="left">Nit:</td>
                <td align="left" style="color:#000"><?php echo number_format($cedula) ?></td>
              </tr>
              <tr>
                <td align="left">Direcci&oacute;n:</td>
                <td align="left" style="color:#000"><?php echo $direccion ?></td>
              </tr>
              <tr>
                <td align="left">Tel&eacute;fono:</td>
                <td align="left" style="color:#000"><?php echo $celular." - ".$telefono ?></td>
              </tr>
              <tr>
                <td align="left">Ciudad:</td>
                <td align="left" style="color:#000"><?php echo $ciudad ?></td>
              </tr>
             </table>
            </td>
            <td width="55%"><table width="100%" height="75" border="0" cellspacing="0" cellpadding="0">
              <tr height="45%" style="font-size: 14px">
                <td width="70%" align="center" style="color:#000; border:1px solid #66CC99">Fecha de <?php echo $texto2 ?></td>
                <td align="center" style="border:1px solid #66CC99; color:#000"><?php echo $fecha_emision ?></td>
              </tr>
              <tr height="55%">
                <td colspan="4" valign="top"><span style="font-weight: bold">Calidad de agente retenedor IVA:</span></td>
              </tr>
            </table></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td height="179"><table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0" style="border:1px solid #66CC99">
          <tr style="color: #000">
            <td width="13%" align="center" style="border-right:1px solid #66CC99; border-bottom:1px solid #66CC99">REF. PRODUCTO</td>
            <td width="37%" align="center" style="border-right:1px solid #66CC99; border-bottom:1px solid #66CC99">DESCRIPCION DEL ARTICULO O SERVICIO</td>
            <td width="14%" align="center" style="border-right:1px solid #66CC99; border-bottom:1px solid #66CC99">VALOR UNITARIO<br />
<span style="font-size:9px">US$ / CO$</span></td>
            <td width="8%" align="center" style="border-right:1px solid #66CC99; border-bottom:1px solid #66CC99">CANTIDAD</td>
            <td colspan="2" align="center" style="border-right:1px solid #66CC99; border-bottom:1px solid #66CC99">
             <table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0">
           <tr>
             <td colspan="2" align="center" style="border-bottom:1px solid #fff">IVA</td>
           </tr>
           <tr>
             <td width="31%" align="center" style="border-right:1px solid #66CC99; border-top:1px solid #66CC99">%</td>
             <td width="69%" align="center" style="border-top:1px solid #66CC99"><span style="font-size:9px">VALOR US$/CO$</span></td>
           </tr>
          </table>
         </td>
            <td width="14%" align="center" valign="top" style="border-bottom:1px solid #66CC99">VALOR TOTAL CON IVA</td>
          </tr>
          <?php
        $colorfila = $i = 0;
        while ($i<$sizeof)
        {
           if ($colorfila==0)
           {
              $color = "#FFFFFF";
              $colorfila = 1;
           }
           else
           {
              $color = "#ccffcc";
              $colorfila = 0;
           }
        ?>
          <tr style="color:#000" bgcolor="<?php echo $color ?>">
            <td style="border-right:1px solid #66CC99">Libro</td>
            <td style="border-right:1px solid #66CC99"><?php echo $articulos[$i] ?></td>
            <td style="border-right:1px solid #66CC99">$ <?php echo number_format($sin_iva2[$i],2)." / $ ".$pesos = number_format($sin_iva2[$i] * $trm,2); ?></td>
            <td style="border-right:1px solid #66CC99" align="center"><?php echo $cantidades[$i] ?></td>
            <td width="3%" style="border-right:1px solid #66CC99">16</td>
            <td width="11%" style="border-right:1px solid #66CC99">$ <?php echo number_format($sin_iva[$i],2)." / $ ".$pesos = number_format($sin_iva[$i] * $trm,2); ?></td>
            <td>$ <?php $pesos1 = $precios_unitarios[$i] * $cantidades[$i]; echo number_format($pesos1,2)." / $ ".$pesos = number_format($pesos1 * $trm,2); ?></td>
          </tr>
          <?php
         $i++;
        }
        ?>
          <?php
        while ($i<8)
        {
           if ($colorfila==0)
           {
              $color = "#FFFFFF";
              $colorfila = 1;
           }
           else
           {
              $color = "#ccffcc";
              $colorfila = 0;
           }
        ?>
          <tr style="color:#000" bgcolor="<?php echo $color ?>">
            <td style="border-right:1px solid #66CC99">&nbsp;</td>
            <td style="border-right:1px solid #66CC99">&nbsp;</td>
            <td style="border-right:1px solid #66CC99">&nbsp;</td>
            <td style="border-right:1px solid #66CC99">&nbsp;</td>
            <td width="5%" style="border-right:1px solid #66CC99">&nbsp;</td>
            <td width="9%" style="border-right:1px solid #66CC99">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <?php
         $i++;
        }
        ?>
        </table>
       </td>
      </tr>
      <tr>
        <td height="28" style="border:1px solid #66CC99"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="50%" align="right"><span style="font-weight: bold; border-right:1px solid #66CC99">VALORES TOTALES DE LA OPERACI&Oacute;N:&nbsp;&nbsp;&nbsp;</span></td>
            <td width="14%" align="center" style="border-right:1px solid #66CC99; color:#000">$ <?php echo number_format($to_sin_iva,2)." / $ ".$pesos = number_format($to_sin_iva * $trm,2); ?></td>
            <td width="10%" align="center" style="border-right:1px solid #66CC99; color:#000"><?php echo $to_cantidad ?></td>
            <td width="12%" align="center" style="border-right:1px solid #66CC99; color:#000">$ <?php echo number_format($to_iva,2)." / $ ".$pesos = number_format($to_iva * $trm,2); ?></td>
            <td width="14%" align="center" style="color:#000">$ <?php echo number_format($to_con_iva,2)." / $ ".$pesos = number_format($to_con_iva * $trm,2); ?></td>
          </tr>
          <tr>
            <td colspan="5" style="border-top: 1px solid #66CC99">Valor total en letras</td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td height="92" style="border:1px solid #66CC99">
         <table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="50%" height="60%" valign="top" style="border: 1px solid #66cc99">
             <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="33%" align="center">Tarifa ICA</td>
                <td width="33%" align="center">c&oacute;digo CIIU</td>
                <td width="34%" align="center">Descripci&oacute;n:</td>
              </tr>
             </table>
            </td>
            <td rowspan="2" align="center" valign="top" style="border: 1px solid #66cc99"><div style="margin-left: 10px; margin-right: 10px; font-size: 9px; text-align:justify">El presente documento constituye una factura cambiaria de compra venta cuando no ha sido cancelada y es aceptada por el adquiriente. Se asimila en sus efectos a la letra de cambio</div><span style="color:#CCC; font-size: 34px">ACEPTADA</span><br /><div style="margin-left: 10px; margin-right: 10px; font-size: 10px; text-align:justify; padding-top: 3px; border-top: 1px solid #66cc99">El comprador&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;C.C. <span style="width: 10px; border:1px dotted #66CC99; background-color: #ccffcc;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> NIT <span style="width: 10px; border:1px dotted #66CC99; background-color: #ccffcc;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> No</div>
            </td>
          </tr>
          <tr>
            <td height="40%" valign="top" style="border: 1px solid #66cc99"><span style="padding-left: 20px">Observaciones:</span><br /><?php if ($tabla == 'facturas_canceladas') echo "<span style=\"color:#000; font-size: 14px\">Esta factura fúe cancelada el: $fecha_cancelada</span><br>";
echo "<span style=\"color:#000; font-size: 14px\">El dolar de facturación es de: $ ".number_format($trm,2)." pesos por dolar</span>"; ?></td>
          </tr>
         </table>
        </td>
      </tr>
     </table>
    </td>
  </tr>
</table>
<p align="center"><a id="flechas" onclick="history.go(-1)" style="cursor:pointer" ><img src="imagenes/botonatras.png" alt="Regresar" width="25" height="25" align="absmiddle" /> Regresar</a> <a id="flechas" onclick="javascript:document-print()" style="cursor:pointer" ><img src="imagenes/impresora.png" alt="Regresar" width="25" height="25" align="absmiddle" /> Imprimir</a></p>
</body>
</html>
<?php
}
else
{
   include ('index.php');
}
?>

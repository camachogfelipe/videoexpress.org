<?php
// check session variable
   $asunto = "Orden de pedido Ministerio RED";

   //nos conectamos a la tabla respectiva
   $sql = "select * FROM pedidos WHERE id_factura = '$id_insertado'";
   $result = mysql_query($sql) or die("La siguiente consulta contiene alg&uacute;n error:<br>nSQL: <b>$sql</b>");
   while ($row = mysql_fetch_object($result))
   {
      $id_factura          = $row->id_factura;
      $id_comprador        = $row->id_comprador;
	  $tipo			       = $row->tipo;
      $articulos           = $row->articulos;
      $cantidades          = $row->cantidades;
      $precios_unitarios   = $row->precios_unitarios;
      $precio              = $row->precio;
      $fecha_emision       = $row->fecha_emision;
   }

   $articulos        = explode('+',$articulos);
   $cantidades       = explode('+',$cantidades);
   $precios_unitarios   = explode('+',$precios_unitarios);
   $tipo 				= explode('+', $tipo);

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

   //iniciamos las variables
   $to_sin_iva = $to_cantidad = $to_con_iva = $to_iva = $tmp = 0;

   for($i=0; $i<$sizeof; $i++)
   {
	   //sacamos los valores sin iva
       $sin_iva[$i] = 0;
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

   $email_envio = $email;

   $cuerpo = "
<table width=\"1000\" bgcolo=\"#FFFFFF\" height=\"519\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" style=\"font-size:12px; font-family:Arial, Helvetica, sans-serif; color:#66cc99\" align=\"center\">
  <tr>
    <td align=\"center\" valign=\"middle\">
     <table width=\"1000\" height=\"468\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
      <tr>
        <td>
         <table width=\"100%\" height=\"68\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
          <tr>
            <td width=\"10%\">&nbsp;</td>
            <td valign=\"top\">
             <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
              <tr>
                <td align='left' width=\"14%\">Nombre:</td>
                <td align='left' width=\"30%\"><span style='color:#000'>Asociaci&oacute;n RED de Edificaci&oacute;n</span></td>
                <td align='center' width=\"56%\" rowspan=\"5\" align=\"center\"><img src=\"http://www.redlibreriacristiana.org/imagenes/logo.png\" width=\"100\" height=\"37\" /></td>
              </tr>
              <tr>
                <td align='left'>Nit:</td>
                <td align='left'><span style=\"color:#000\">900.266.873-1</span></td>
              </tr>
              <tr>
                <td align='left'>Direcci&oacute;n:</td>
                <td align='left'><span style=\"color:#000\">Carrera 75 No. 24D 40, Modelia</span></td>
              </tr>
              <tr>
                <td align='left'>Tel&eacute;fono:</td>
                <td align='left'><span style=\"color:#000\">429 8725 - 429 8580 - 429 9618</span></td>
              </tr>
              <tr>
                <td align='left'>Ciudad:</td>
                <td align='left'><span style=\"color:#000\">Bogot&aacute; - Colombia</span></td>
              </tr>
            </table>
            </td>
            <td width=\"200\" valign=\"top\">
             <table width=\"100%\" height=\"57\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" style=\"border: 1px #66CC99 solid\">
              <tr>
                <td height=\"29\" align=\"right\" style=\"border-bottom:1px #66CC99 solid\"><span style=\"font-size: 12px\">Factura de venta</span><br /><span style=\"font-size:8px\">IMPRESA POR COMPUTADOR</span></td>
              </tr>
              <tr>
                <td height=\"28\" style=\"font-size:12px\"><span style=\"color: #cc9966; font-size:14; font-weight: bold; float:left\">No. </span><span style=\"float:right; color: #cc9966; font-size:14; font-weight: bold; margin-right: 40px\">Pro-forma</span></td>
              </tr>
            </table></td>
          </tr>
         </table>
        </td>
      </tr>
      <tr>
        <td height=\"100\" align=\"center\" valign=\"top\" style=\"border:1px solid #66CC99\"><table width=\"98%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
          <tr style=\"font-weight: bold\" height=\"11\">
            <td width=\"43%\">Resoluci&oacute;n de autorizaci&oacute;n DIAN No. <span style=\"color:#000\"></span></td>
            <td width=\"27%\">Fecha: <span style=\"color:#000\">$fecha_res_dian</span></td>
            <td width=\"15%\">del No. <span style=\"color:#000\">$factura_del</span></td>
            <td width=\"15%\">al No. <span style=\"color:#000\">$factura_al</span></td>
          </tr>
        </table>
        <table width=\"98%\" height=\"75\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" style=\"border: 1px solid #66cc99\">
          <tr>
            <td width=\"45%\" style=\"border-right:1px solid #66CC99\">
             <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
              <tr>
                <td width=\"17%\" align=\"left\">Vendido a:</td>
                <td width=\"83%\" align=\"left\" style=\"color:#000\">$nombres $apellidos</td>
              </tr>
              <tr>
                <td align=\"left\">Nit:</td>
                <td align=\"left\" style=\"color:#000\">".number_format($cedula)."</td>
              </tr>
              <tr>
                <td align=\"left\">Direcci&oacute;n:</td>
                <td align=\"left\" style=\"color:#000\">$direccion</td>
              </tr>
              <tr>
                <td align=\"left\">Tel&eacute;fono:</td>
                <td align=\"left\" style=\"color:#000\">$telefono</td>
              </tr>
              <tr>
                <td align=\"left\">Ciudad:</td>
                <td align=\"left\" style=\"color:#000\">$ciudad</td>
              </tr>
             </table>
            </td>
            <td width=\"55%\"><table width=\"100%\" height=\"75\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
              <tr height=\"45%\" style=\"font-size: 14px\">
                <td width=\"70%\" align=\"center\" style=\"color:#000; border:1px solid #66CC99\">Fecha de factura</td>
                <td align=\"center\" style=\"border:1px solid #66CC99; color:#000\">".$fecha."</td>
              </tr>
              <tr height=\"55%\">
                <td colspan=\"4\" valign=\"top\"><span style=\"font-weight: bold\">Calidad de agente retenedor IVA:</span></td>
              </tr>
            </table></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td height=\"179\"><table width=\"100%\" height=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" style=\"border:1px solid #66CC99\">
          <tr style=\"color: #000\">
            <td width=\"13%\" align=\"center\" style=\"border-right:1px solid #66CC99; border-bottom:1px solid #66CC99\">REF. PRODUCTO</td>
            <td width=\"37%\" align=\"center\" style=\"border-right:1px solid #66CC99; border-bottom:1px solid #66CC99\">DESCRIPCION DEL ARTICULO O SERVICIO</td>
            <td width=\"14%\" align=\"center\" style=\"border-right:1px solid #66CC99; border-bottom:1px solid #66CC99\">VALOR UNITARIO<br />
<span style=\"font-size:9px\">CO$</span></td>
            <td width=\"10%\" align=\"center\" style=\"border-right:1px solid #66CC99; border-bottom:1px solid #66CC99\">CANTIDAD</td>
            <td colspan=\"2\" align=\"center\" style=\"border-right:1px solid #66CC99; border-bottom:1px solid #66CC99\">
             <table width=\"100%\" height=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
           <tr>
             <td colspan=\"2\" align=\"center\" style=\"border-bottom:1px solid #fff\">IVA</td>
           </tr>
           <tr>
             <td width=\"33%\" align=\"center\" style=\"border-right:1px solid #66CC99; border-top:1px solid #66CC99\">%</td>
             <td width=\"67%\" align=\"center\" style=\"border-top:1px solid #66CC99\"><span style=\"font-size:9px\">VALOR CO$</span></td>
           </tr>
          </table>
         </td>
            <td width=\"14%\" align=\"center\" style=\"border-bottom:1px solid #66CC99\">VALOR TOTAL CON IVA</td>
          </tr>";
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
           $pesos = ceil($sin_iva2[$i]);
           $pesos1 = ceil($sin_iva[$i]);
           $pesos2 = $precios_unitarios[$i] * $cantidades[$i];
           $pesos3 = ceil($pesos2);
          $cuerpo .= "<tr style=\"color:#000\" bgcolor=\"$color\">
            <td align=\"center\" style=\"border-right:1px solid #66CC99\">";
			if($tipo[$i] == 'L') $cuerpo .= "Libro";
	  elseif($tipo[$i] == 'CD') $cuerpo .= "CD/DVD";
	  else $cuerpo .= "Miscel&aacute;nea";
		  $cuerpo .= "</td>
            <td align=\"center\" style=\"border-right:1px solid #66CC99\">$articulos[$i]</td>
            <td style=\"border-right:1px solid #66CC99\" align=\"center\">".number_format($sin_iva2[$i],1)."</td>
            <td style=\"border-right:1px solid #66CC99\" align=\"center\">$cantidades[$i]</td>
            <td width=\"4%\" style=\"border-right:1px solid #66CC99\">16</td>
            <td width=\"8%\" style=\"border-right:1px solid #66CC99\" align=\"center\">".number_format($sin_iva[$i],1)."</td>
            <td align=\"center\">".number_format($pesos3)."</td>
          </tr>";
         $i++;
        }
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
          $cuerpo .= "<tr style=\"color:#000\" bgcolor=\"$color\">
            <td style=\"border-right:1px solid #66CC99\">&nbsp;</td>
            <td style=\"border-right:1px solid #66CC99\">&nbsp;</td>
            <td style=\"border-right:1px solid #66CC99\">&nbsp;</td>
            <td style=\"border-right:1px solid #66CC99\">&nbsp;</td>
            <td width=\"4%\" style=\"border-right:1px solid #66CC99\">&nbsp;</td>
            <td width=\"8%\" style=\"border-right:1px solid #66CC99\">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>";
         $i++;
        }
        $pesos = ceil($to_sin_iva);
        $pesos1 = ceil($to_iva);
        $pesos2 = ceil($to_con_iva);
        $cuerpo .= "</table>
       </td>
      </tr>
      <tr>
        <td height=\"28\" style=\"border:1px solid #66CC99\"><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
          <tr>
            <td width=\"50%\" align=\"right\"><span style=\"font-weight: bold; border-right:1px solid #66CC99\">VALORES TOTALES DE LA OPERACI&Oacute;N:&nbsp;&nbsp;&nbsp;</span></td>
            <td width=\"14%\" align=\"center\" style=\"border-right:1px solid #66CC99; color:#000\">".number_format($to_sin_iva,1)."</td>
            <td width=\"10%\" align=\"center\" style=\"border-right:1px solid #66CC99; color:#000\">$to_cantidad</td>
            <td width=\"12%\" align=\"center\" style=\"border-right:1px solid #66CC99; color:#000\">".number_format($to_iva,1)."</td>
            <td width=\"14%\" align=\"center\" style=\"color:#000\"><span style=\"font-weight: bold\">".number_format($pesos2)."</span></td>
          </tr>
          <tr>
            <td colspan=\"5\" style=\"border-top: 1px solid #66CC99\">Valor total en letras</td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td height=\"92\" style=\"border:1px solid #66CC99\">
         <table width=\"100%\" height=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
          <tr>
            <td width=\"50%\" height=\"60%\" valign=\"top\" style=\"border: 1px solid #66cc99\">
             <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
              <tr>
                <td width=\"33%\" align=\"center\">Tarifa ICA</td>
                <td width=\"33%\" align=\"center\">c&oacute;digo CIIU</td>
                <td width=\"34%\" align=\"center\">Descripci&oacute;n:</td>
              </tr>
             </table>
            </td>
            <td rowspan=\"2\" align=\"center\" valign=\"top\" style=\"border: 1px solid #66cc99\"><div style=\"margin-left: 10px; margin-right: 10px; font-size: 9px; text-align:justify\">El presente documento constituye una factura cambiaria de compra venta cuando no ha sido cancelada y es aceptada por el adquiriente. Se asimila en sus efectos a la letra de cambio</div><span style=\"color:#CCC; font-size: 34px\">ACEPTADA</span><br /><div style=\"margin-left: 10px; margin-right: 10px; font-size: 10px; text-align:justify; padding-top: 3px; border-top: 1px solid #66cc99\">El comprador&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;C.C. <span style=\"width: 10px; border:1px dotted #66CC99; background-color: #ccffcc;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> NIT <span style=\"width: 10px; border:1px dotted #66CC99; background-color: #ccffcc;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> No</div>
            </td>
          </tr>
          <tr>
            <td height=\"40%\" align=\"center\" valign=\"top\" style=\"border: 1px solid #66cc99;font-weight: bold\"><span style=\"padding-left: 20px\">Observaciones:</span><br /><span style=\"padding-left: 20px; font-weith:bold\">Para pagar hacer consignaci&#243;n en cuenta de ahorros BCSC Colmena<br />No. 26507189970 a nombre de Asociaci&oacute;n Ministerios RED de Edificaci&oacute;n</span></td>
          </tr>
         </table>
        </td>
      </tr>
     </table>
    </td>
  </tr>
</table>
<p align=\"center\"><a id=\"flechas\" onclick=\"javascript:document-print()\" style=\"cursor:pointer\" ><img src=\"http://www.redlibreriacristiana.org/images/Imagenes de edicion/impresora.png\" alt=\"imprimir\" width=\"25\" height=\"25\" align=\"absmiddle\" /> Imprimir</a></p>";

   $headers = "X-Mailer:PHP/\".phpversion().\"\n";
   $headers .= "Mime-Version: 1.0\n";
   $headers .= "Content-Type: text/html; charset=iso-8859-1\n";

   //direcci&#243;n del remitente
   $headers .= "From: contacto RED <claudia@redlibreriacristiana.org>\n";

   mail($email_envio, $asunto, $cuerpo, $headers);
   mail("claudia@redlibreriacristiana.org","Nuevo pedido","Hay un nuevo pedido en RED de Edificaci&oacute;n",$headers);
?>

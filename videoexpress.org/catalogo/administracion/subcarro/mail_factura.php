<?php
// check session variable
	$asunto = "Factura de pedido VideoExpress.org";
	
	//nos conectamos a la tabla respectiva
	$result = consulta_bd("pedidos","*","1;;;id_comprador='$id_ingresado';");
	while ($row = mysql_fetch_object($result))
	{
		$id_factura			= $row->id_factura;
		$id_comprador		= $row->id_comprador;
		$articulos			= $row->articulos;
		$cantidades			= $row->cantidades;
		$precios_unitarios	= $row->precios_unitarios;
		$precio				= $row->precio;
		$fecha				= $row->fecha_emision;
	}
	
	$tipo				= explode('+',$tipo);
	$articulos			= explode('+',$articulos);
	$cantidades			= explode('+',$cantidades);
	$precios_unitarios	= explode('+',$precios_unitarios);
	
	$sizeof = sizeof($articulos);
	$sizeof--;
	
	$result = consulta_bd("usuarios","*","1;;;codigo_cliente='$id_comprador';");
	while ($row = mysql_fetch_object($result))
	{
		$cedula		= $row->codigo_cliente;
		$nombre		= $row->nombre;
		$direccion	= $row->direccion;
		$direccion  .= " ".$row->barrio;
		if($row->tel_oficina != NULL) $telefono	= $row->tel_oficina;
		elseif($row->tel_oficina2 != NULL) $telefono	= $row->tel_oficina2;
		else $telefono	= $row->tel_casa;
		$celular	= $row->celular;
		$ciudad		= "Bogot&aacute;";
		$pais		= "Colombia";
		$mail_envio = $row->email;
	}
	
	$fecha_recogida = explode(" ",$fecha);
	$fecha_recogida = explode("-",$fecha_recogida[0]);
	$fecha_recogida = date("j-m-Y", mktime(0, 0, 0, $fecha_recogida[1], $fecha_recogida[0]+3, $fecha_recogida[2]));
	
	//iniciamos las variables
	$to_sin_iva = $to_cantidad = $to_con_iva = $to_iva = $tmp = 0;
	
	for($i=0; $i<$sizeof; $i++)
	{
		//sacamos los valores sin iva
		if($tipo[$i] == 'compra')
		{
			$sin_iva[$i] = $precios_unitarios[$i]*0.16;
			$sin_iva2[$i] = $precios_unitarios[$i] - $sin_iva[$i];
		}
		elseif($tipo[$i] == 'alquiler')
		{
			$sin_iva2[$i] = $precios_unitarios[$i];
			$alquiladas = true;
		}
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
	
	$fecha_entrega = explode(" ",$fecha);
	$fecha_entrega = explode("-", $fecha_entrega[0]);
	$fecha_ent = date("d-m-Y", mktime(0,0,0,$fecha_entrega[1],$fecha_entrega[0]+1,$fecha_entrega[2]));
	
	$cuerpo = "
<table width=\"1000\" bgcolor=\"#FFFFFF\" height=\"519\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" style=\"font-size:12px; font-family:Arial, Helvetica, sans-serif; color:#66cc99\" align=\"center\">
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
                <td align='left' width=\"19%\"><span style=\"color:#000\">VideoExpress.org</span></td>
                <td align='center' width=\"67%\" rowspan=\"5\" align=\"center\">&nbsp;</td>
              </tr>
              <tr>
                <td align='left'>Nit:</td>
                <td align='left'><span style=\"color:#000\">830.501.686-3</span></td>
              </tr>
              <tr>
                <td align='left'>Direcci&oacute;n:</td>
                <td align='left'><span style=\"color:#000\">Cra. 7B No. 151 - 97</span></td>
              </tr>
              <tr>
                <td align='left'>Tel&eacute;fono:</td>
                <td align='left'><span style=\"color:#000\">5269007</span></td>
              </tr>
              <tr>
                <td align='left'>Ciudad:</td>
                <td align='left'><span style=\"color:#000\">Bogot&aacute;</span></td>
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
            <td width=\"43%\">Resoluci&oacute;n de autorizaci&oacute;n DIAN No. <span style=\"color:#000\">$resolucion_dian</span></td>
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
                <td width=\"83%\" align=\"left\" style=\"color:#000\">".$nombre."</td>
              </tr>
              <tr>
                <td align=\"left\">Nit:</td>
                <td align=\"left\" style=\"color:#000\">$cedula</td>
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
                <td align=\"left\" style=\"color:#000\">$ciudad - $pais</td>
              </tr>
             </table>
            </td>
            <td width=\"55%\"><table width=\"100%\" height=\"75\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
              <tr height=\"45%\" style=\"font-size: 14px\">
                <td width=\"26%\" align=\"center\" style=\"color:#000; border:1px solid #66CC99\">Fecha de factura</td>
                <td width=\"28%\" align=\"center\" style=\"border:1px solid #66CC99; color:#000\">".$fecha."</td>
				<td width=\"25%\" align=\"center\" style=\"color:#000; border:1px solid #66CC99\">Fecha de entrega</td>
                <td width=\"21%\" align=\"center\" style=\"border:1px solid #66CC99; color:#000\">".$fecha_ent."</td>
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
            <td width=\"14%\" align=\"center\" style=\"border-right:1px solid #66CC99; border-bottom:1px solid #66CC99\">VALOR UNITARIO</td>
            <td width=\"10%\" align=\"center\" style=\"border-right:1px solid #66CC99; border-bottom:1px solid #66CC99\">CANTIDAD</td>
            <td colspan=\"2\" align=\"center\" style=\"border-right:1px solid #66CC99; border-bottom:1px solid #66CC99\">
             <table width=\"100%\" height=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
			  <tr>
			    <td colspan=\"2\" align=\"center\" style=\"border-bottom:1px solid #fff\">IVA</td>
			  </tr>
			  <tr>
			    <td width=\"33%\" align=\"center\" style=\"border-right:1px solid #66CC99; border-top:1px solid #66CC99\">%</td>
			    <td width=\"67%\" align=\"center\" style=\"border-top:1px solid #66CC99\"><span style=\"font-size:9px\">VALOR</span></td>
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
			  $pesos2 = $precios_unitarios[$i] * $cantidades[$i];
          $cuerpo .= "<tr style=\"color:#000\" bgcolor=\"$color\">
            <td align=\"center\" style=\"border-right:1px solid #66CC99\">$tipo[$i]</td>
            <td align=\"center\" style=\"border-right:1px solid #66CC99\">$articulos[$i]</td>
            <td style=\"border-right:1px solid #66CC99\"><span style=\"font-weight: bold\">".number_format($sin_iva2[$i],1)."</span></td>
            <td style=\"border-right:1px solid #66CC99\" align=\"center\">$cantidades[$i]</td>
            <td width=\"4%\" style=\"border-right:1px solid #66CC99\">16</td>
            <td width=\"8%\" style=\"border-right:1px solid #66CC99\"><span style=\"font-weight: bold\">".number_format($sin_iva[$i])."</span></td>
            <td><span style=\"font-weight: bold\">".number_format($pesos2)."</span></td>
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
        $cuerpo .= "</table>
       </td>
      </tr>
      <tr>
        <td height=\"28\" style=\"border:1px solid #66CC99\"><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
          <tr>
            <td width=\"50%\" align=\"right\"><span style=\"font-weight: bold; border-right:1px solid #66CC99\">VALORES TOTALES DE LA OPERACI&Oacute;N:&nbsp;&nbsp;&nbsp;</span></td>
            <td width=\"14%\" align=\"center\" style=\"border-right:1px solid #66CC99; color:#000\"><span style=\"font-weight: bold\">".number_format($to_sin_iva)."</span></td>
            <td width=\"10%\" align=\"center\" style=\"border-right:1px solid #66CC99; color:#000\">$to_cantidad</td>
            <td width=\"12%\" align=\"center\" style=\"border-right:1px solid #66CC99; color:#000\"><span style=\"font-weight: bold\">".number_format($to_iva)."</span></td>
            <td width=\"14%\" align=\"center\" style=\"color:#000\"><span style=\"font-weight: bold\">".number_format($to_con_iva)."</span></td>
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
            <td height=\"40%\" align=\"center\" valign=\"top\" style=\"border: 1px solid #66cc99;font-weight: bold\"><span style=\"padding-left: 20px\">Observaciones:</span><br /><span style=\"padding-left: 20px; font-weith:bold\">";
			if($alquiladas = true) $cuerpo .= "Las peliculas en compra se pueden cancelar con el valor del alquiler<p>Las peliculas en alquiler se recogeran a partir de $fecha_recogida</p>";
			else $cuerpo .= "Para pagar las compras hacer consignaci&#243;n en cuenta de ahorros Bancolombia<br />No. 2090825036 a nombre de VideoExpress.org.";
			$cuerpo .= "</span></td>
          </tr>
         </table>
        </td>
      </tr>
     </table>
    </td>
  </tr>
</table>
";

	$headers = "X-Mailer:PHP/\".phpversion().\"\n";
	$headers .= "Mime-Version: 1.0\n";
	$headers .= "Content-Type: text/html; charset=iso-8859-1\n"; 

	//direcci&#243;n del remitente 
	$headers .= "From: Gerencia Comercial <gerencia@videoexpress.org>\n";
	
	mail($mail_envio, $asunto, $cuerpo, $headers);
	echo "el mail fue enviado a: $mail_envio";
?>
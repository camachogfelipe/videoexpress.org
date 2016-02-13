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

if (isset($_SESSION['user_admin']))
{
	$id = $_REQUEST['id'];
	$tabla = $_REQUEST['tabla'];
	$existe = $_REQUEST['existe'];
	
	if($tabla == 'pedidos')
	{
		$texto = "Orden de pedido";
		$texto2 = "pedido";		
	}
	else
	{
		$texto = "Factura de venta";
		$texto2 = "factura";
	}
	
	include("../../include/funciones_globales.php");
	$conecta = conecta_bd("videoexpress");
	//nos conectamos a la tabla respectiva
	$result = consulta_bd($tabla,"*","1;;;id_factura='$id'");
	while ($row = mysql_fetch_object($result))
	{
		$id_factura			= $row->id_factura;
		$id_comprador		= $row->id_comprador;
		$tipo				= $row->tipo;
		$articulos			= $row->articulos;
		$cantidades			= $row->cantidades;
		$precios_unitarios	= $row->precios_unitarios;
		$precio				= $row->precio;
		$fecha_emision		= $row->fecha_emision;
		$fecha_cancelada	= $row->fecha_cancelada." ";
		$fecha_cancelada	.= $row->fecha_cancelada_hora;
		$dian				= $row->dian;
	}
	
	$dian = explode("@", $dian);
	$rango_factura		= $dian[0];
	$resolucion_dian	= $dian[1];
	$fecha_res_dian		= $dian[2];
	
	$rango_factura = explode("-", $rango_factura);
	
	$factura_del		= $rango_factura[0];
	$factura_al			= $rango_factura[1];
	
	$tipo				= explode('+',$tipo);
	$articulos			= explode('+',$articulos);
	$cantidades			= explode('+',$cantidades);
	$precios_unitarios	= explode('+',$precios_unitarios);
	
	$sizeof = sizeof($articulos);
	$sizeof--;
	
	if($existe == 1)
	{
		$result = consulta_bd("usuarios","*","1;;;codigo_cliente='$id_comprador'");
		while ($row = mysql_fetch_object($result))
		{
			$cedula		= $row->codigo_cliente;
			$nombre		= $row->nombre;
			$direccion	= $row->direccion;
			$direccion  .= " ".$row->barrio;
			if($row->tel_oficina != NULL and $row->tel_oficina != 0) $telefono	= $row->tel_oficina;
			elseif($row->tel_oficina2 != NULL and $row->tel_oficina2 != 0) $telefono	= $row->tel_oficina2;
			else $telefono	= $row->tel_casa;
			$celular	= $row->celular;
			$ciudad		= "Bogot&aacute;";
			$pais		= "Colombia";
		}
	}
	elseif($existe == 0)
	{
		$result = consulta_bd("clientes","*","1;;;id_cliente='$id_comprador'");
		while ($row = mysql_fetch_object($result))
		{
			$cedula		= $row->id_cliente;
			$nombre		= $row->nombres;
			$direccion	= $row->direccion;
			$telefono	= $row->telefono;
			$celular	= $row->celular;
			$ciudad		= $row->ciudad;
			$pais		= $row->pais;
		}
	}
	
	if($existe == 1)
	{
		//iniciamos las variables
		$to_sin_iva = $to_cantidad = $to_con_iva = $to_iva = $tmp = 0; $alquilar_1 = "false";
	
		for($i=0; $i<$sizeof; $i++)
		{
			//sacamos los valores sin iva
			$sin_iva2[$i] = $precios_unitarios[$i];
			if($tipo[$i] == 'alquiler' || $tipo[$i] == 'Nota credito')
			{
				$alquilar_1 = "true";
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
                <td width="67%" rowspan="5" align="center"><img src="../../Imagenes_pagina/videoexpress.png" width="100" height="37" /></td>
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
                <td height="29" align="right" style="border-bottom:1px #66CC99 solid; padding-right: 3px"><span style="font-size: 12px"><?php echo $texto ?></span><br /><span style="font-size:8px">IMPRESA POR COMPUTADOR</span></td>
              </tr>
              <tr>
                <td height="28" style="font-size:12px">
                 <table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                   <td style="color: #cc9966; font-size:14; font-weight: bold; padding-left: 5px">No. </td>
                   <td style="color: #cc9966; font-size:14; font-weight: bold; padding-right: 10px" align="right"><?php echo $id_factura ?></td>
                  </tr>
                 </table>
                </td>
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
                <td width="83%" align="left" style="color:#000"><?php echo $nombre ?></td>
              </tr>
              <tr>
                <td align="left">Nit:</td>
                <td align="left" style="color:#000"><?php if($existe == 1) echo $cedula; else echo number_format($cedula) ?></td>
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
                <td align="left" style="color:#000"><?php echo $ciudad." - ".$pais ?></td>
              </tr>
             </table>
            </td>
            <td width="55%"><table width="100%" height="75" border="0" cellspacing="0" cellpadding="0">
              <tr height="45%" style="font-size: 14px">
                <td width="26%" align="center" style="color:#000; border:1px solid #66CC99">Fecha de <?php echo $texto2 ?></td>
                <td width="28%" align="center" style="border:1px solid #66CC99; color:#000"><?php echo $fecha_emision; ?></td>
                <td width="25%" align="center" style="color:#000; border:1px solid #66CC99">Fecha de entrega</td>
                <td width="21%" align="center" style="border:1px solid #66CC99; color:#000">
				<?php
					$fecha_entrega = explode(" ",$fecha_emision);
					$fecha_entrega = explode("-", $fecha_entrega[0]);
					$fecha_ent = date("d-m-Y", mktime(0,0,0,$fecha_entrega[1],$fecha_entrega[0]+3,$fecha_entrega[2]));
					echo $fecha_ent;
				?>
                </td>
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
            <td width="14%" align="center" style="border-right:1px solid #66CC99; border-bottom:1px solid #66CC99">VALOR UNITARIO</td>
            <td width="10%" align="center" style="border-right:1px solid #66CC99; border-bottom:1px solid #66CC99">CANTIDAD</td>
            <td colspan="2" align="center" style="border-right:1px solid #66CC99; border-bottom:1px solid #66CC99">
             <table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0">
			  <tr>
			    <td colspan="2" align="center" style="border-bottom:1px solid #fff">IVA</td>
			  </tr>
			  <tr>
			    <td width="33%" align="center" style="border-right:1px solid #66CC99; border-top:1px solid #66CC99">%</td>
			    <td width="67%" align="center" style="border-top:1px solid #66CC99"><span style="font-size:9px">VALOR</span></td>
			  </tr>
			 </table>
			</td>
            <td width="14%" align="center" style="border-bottom:1px solid #66CC99">VALOR TOTAL CON IVA</td>
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
            <td style="border-right:1px solid #66CC99"><?php if($tipo[$i] == "resena") echo "Reseña"; else echo $tipo[$i]; ?></td>
            <td style="border-right:1px solid #66CC99"><?php echo $articulos[$i] ?></td>
            <td align="center" style="border-right:1px solid #66CC99">$ <?php echo number_format($sin_iva2[$i],2) ?></td>
            <td style="border-right:1px solid #66CC99" align="center"><?php echo $cantidades[$i] ?></td>
            <td width="4%" align="center" style="border-right:1px solid #66CC99">16</td>
            <td width="8%" align="center" style="border-right:1px solid #66CC99">$ <?php echo number_format($sin_iva[$i],2) ?></td>
            <td align="center">$ <?php $pesos1 = $precios_unitarios[$i] * $cantidades[$i]; echo number_format($pesos1,2) ?></td>
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
            <td width="4%" style="border-right:1px solid #66CC99">&nbsp;</td>
            <td width="8%" style="border-right:1px solid #66CC99">&nbsp;</td>
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
            <td width="14%" align="center" style="border-right:1px solid #66CC99; color:#000"><span style="font-weight: bold">$ <?php echo number_format($to_sin_iva,2) ?></span></td>
            <td width="10%" align="center" style="border-right:1px solid #66CC99; color:#000"><span style="font-weight: bold"><?php echo number_format($to_cantidad,2) ?></span></td>
            <td width="12%" align="center" style="border-right:1px solid #66CC99; color:#000"><span style="font-weight: bold">$ <?php echo number_format($to_iva,2) ?></span></td>
            <td width="14%" align="center" style="color:#000"><span style="font-weight: bold">$ <?php echo number_format($to_con_iva,2) ?></span></td>
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
            <td height="40%" valign="top" align="left" style="border: 1px solid #66cc99; padding-left: 20px">Observaciones:<br /><span style="color:#000; font-size: 14px"><?php if($tabla == 'facturas_canceladas') echo "Está factura fué cancelada el: $fecha_cancelada."; echo "<br>Las películas alquiladas se recogerán 3 días después de la fecha de entrega";?></span></td>
          </tr>
         </table>
        </td>
      </tr>
     </table>
    </td>
  </tr>
</table>
<p align="center"><a id="flechas" onclick="history.go(-1)" style="cursor:pointer" ><img src="../../botones/botonatras.png" alt="Regresar" width="25" height="25" align="absmiddle" /> Regresar</a> <a id="flechas" onclick="javascript:document-print()" style="cursor:pointer" ><img src="../../Imagenes_pagina/impresora.png" alt="Regresar" width="25" height="25" align="absmiddle" /> Imprimir</a></p>
</body>
</html>
<?php
}
else
{
	include ('index.php');
}
?>

<?php 
session_start();

$carro = $_SESSION['carro_admin'];
$continuar = $_REQUEST['continuar'];
$mensaje = NULL;
$identificacion		= $_REQUEST['identificacion'];

if($carro == NULL)
{
	echo "<center><span id=\"obligatorio\">No has ingresado nada al carrito</span></center><br />";
}

$fecha = date("j-m-Y H:i:s");

include('../../include/funciones_globales.php');
$conecta = conecta_bd("videoexpress");

if ($continuar == 'true' and $carro != NULL)
{
	$contador=0;
	$suma=0;
	$subto_compra = $subto_alquiler = $suma = $ta = $tc = 0;
	$articulos = $cantidades = $precios_unitarios = $tipo = "";
	$precio = 0;	
	foreach($carro as $k => $v)
	{
		if ($v['tipo_pedido'] == 'alquiler') $ta += 1;
	}
	foreach($carro as $k => $v)
	{
		$id_peliculas .= $v['identificador']."@";
		$articulos .= $v['producto']."+";
	    if ($v['tipo_pedido'] == 'compra')
		{
			$tipo .= "compra+";
			$precios_unitarios .= $v['precio_compra']."+";
			$cantidades .= $v['cantidad']."+";
			$subto = $v['cantidad'] * $v['precio_compra'];
			$subto_compra += $subto;
			$tc += 1;
		}
	    if ($v['tipo_pedido'] == 'alquiler')
		{
			$tipo .= "alquiler+";
			$cantidades .= $v['cantidad']."+";
			$tmp += 1;
			if ($ta == 2)
	   		{
             	$subto_alquiler = 15000;
             	$precios = $subto_alquiler/2;
             	$precios_unitarios .= "$precios+";
           	}
			elseif ($ta == 3)
			{
				$subto_alquiler = 20000;
				$precios .= $subto_alquiler/3;
				$precios_unitarios .= "$precios+";
			}
			elseif ($ta == 4)
			{
				$subto_alquiler = 24000;
				$precio = $subto_alquiler/4;
				$precios_unitarios .= "$precio+";
				if($tmp == 4)
				{
					$tipo .= "cortesia+";
					$precios_unitarios .= "0+";
					$cantidades .= "1+";
					$articulos .= "PopCorn para microondas+";
				}
			}
			else
			{
				$precios_unitarios .= $_SESSION['alquiler_admin'];
				$precios_unitarios .= "+";
				$subto_alquiler += $_SESSION['alquiler_admin'];
			}
		}
		if ($v['tipo_pedido'] == 'resena')
		{
			$tipo .= "resena+";
			$precios_unitarios .= "0+";
			$cantidades .= $v['cantidad']."+";
		}
		if ($v['tipo_pedido'] == 'cortesia')
		{
			$tipo .= "cortesia+";
			$precios_unitarios .= "0+";
			$cantidades .= $v['cantidad']."+";
		}
        $precio=$subto_alquiler+$subto_compra;
	}
	
	$saldo_cliente = dato_columna("usuarios","saldo","1;;;codigo_cliente='$id_comprador';");
	$saldo = $saldo_cliente - $precio;
	if($precio >= $saldo_cliente) $saldo_aplicado = $saldo_cliente;
	else $saldo_aplicado = $precio;
	if($saldo < 0) $saldo = 0;
	$query = act_datos_tabla("usuarios","saldo='$saldo'","codigo_cliente='$id_comprador'",1);
	if($precio >= $saldo_cliente) $saldo_aplicado = $saldo_cliente;
	else $saldo_aplicado = $precio;
	
	if($saldo_cliente > 0)
	{
		$tipo .= "Nota credito+";
		$articulos .= "Saldo cliente+";
		$cantidades .= "1+";
		$precios_unitarios .= "-$saldo_aplicado+";
		$precio = $precio - $saldo_aplicado;
	}
	
	$columna = "id_factura, id_comprador, tipo, articulos, cantidades, precios_unitarios, precio, fecha_emision, id_peliculas";
	$valores = "'$id_factura', '$identificacion', '$tipo', '$articulos', '$cantidades', '$precios_unitarios', '$precio', '$fecha', '$id_peliculas'";
	$query = ing_datos_tabla("pedidos",$columna,$valores);
	$query = act_datos_tabla("usuarios","ultimo_alquiler='$fecha'","codigo_cliente='$identificacion'",1);
	
	$id_ingresado = $identificacion;
	echo "Enviando el mail al usuario ..... <br />";
	include('mail_factura.php');
	//$mensaje = "El mensaje ha sido enviado.";
	
	unset($_SESSION['carro_admin']);
	unset($_SESSION['pel_alq_admin']);
	unset($_SESSION['res_admin']);
}
else
{
	$query = consulta_bd("usuarios","*","2;nombre;ASC;;");

	$i = 0;
	while($row=mysql_fetch_object($query))
	{
		//Mostramos los titulos de los articulos o lo que deseemos...
		$codigo[$i] = $row->codigo_cliente;
		$nombre[$i] = $row->nombre;
		$i++;
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&#237;tulo</title>
<link href="estilo.css" rel="stylesheet" type="text/css" />
</head>

<body background="Imagenes_pagina/fondo_alfa.png">
<form action="confirmar_pedido.php?continuar=true" method="post" enctype="multipart/form-data" name="confirmacion_datos" id="confirmacion_datos" onSubmit="return comprobar(this)">
<table width="600" border="0" align="center" cellpadding="0" cellspacing="2px">
  <tr>
    <td id="carrito">Usuario</td>
    <td><select name="identificacion" id="identificacion" tabindex="9">
    	<?php for($a=0; $a<$i; $a++) echo "<option value=".$codigo[$a].">".$nombre[$a]."</option>"; ?>
        </select>
    </td>
  </tr>
  <tr>
    <td width="300" align="right">&nbsp;</td>
    <td width="300"><input type="image" src="../../Imagenes_pagina/confirmar_pedido.png" id="submit" name="submit" /></td>
  </tr>
</table>
</form>
<center><span id="carrito"><?php } echo $mensaje; ?></span></center>
</body>
</html>
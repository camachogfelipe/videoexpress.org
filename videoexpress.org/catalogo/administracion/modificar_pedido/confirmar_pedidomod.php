<?php 
session_start();

$carro = $_SESSION['carro_admin_mod'];
$id_fac = $_REQUEST['id_fac'];
$ac = $_SESSION['ac'];

$fecha = date("j-m-Y H:i:s");

include('../../include/funciones_globales.php');
$conecta = conecta_bd("videoexpress");

if ($carro != NULL)
{
	$contador=0;
	$suma=0;
	$subto_compra = $subto_alquiler = $suma = $ta = $tc = $tp = 0;
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
		if ($v['identificador'] == 0)
		{
			$tipo .= $v['tipo_pedido']."+";
			if($ac == 1) $precios_unitarios .= "0+";
			else $precios_unitarios .= $_SESSION['afiliacion_admin']."+";
			$cantidades .= "1+";
			$taf += 1;
		}
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
			if ($ta == 3)
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
				if($tmp == 4 and $_SESSION['cpc'] == 1)
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
		if ($taf > 0) $precio += $_SESSION['afiliacion_admin'];
		$tp += 1;
	}
	
	$saldo_cliente = dato_columna("usuarios","saldo","1;;;codigo_cliente='$id_comprador';");
	$saldo = $saldo_cliente - $precio;
	if($precio >= $saldo_cliente) $saldo_aplicado = $saldo_cliente;
	else $saldo_aplicado = $precio;
	if($saldo < 0) $saldo = 0;
	$query = act_datos_tabla("usuarios","saldo='$saldo'","codigo_cliente='$id_comprador'",1);
	if($precio >= $saldo_cliente) $saldo_aplicado = $saldo_cliente;
	else $saldo_aplicado = $precio;
	
	if($taf >= 1 and $tp > 0)
	{
		if($ac == 1) $precios_unitarios = "0+";
		else $precios_unitarios = $_SESSION['afiliacion_admin']."+";
		for($a=1; $a<$tp; $a++) $precios_unitarios .= "0+";
		if($ac == 1) $precio = 0;
		else $precio = $_SESSION['afiliacion_admin'];
	}
	
	if($saldo_cliente > 0)
	{
		$tipo .= "Nota credito+";
		$articulos .= "Saldo cliente+";
		$cantidades .= "1+";
		$precios_unitarios .= "-$saldo_aplicado+";
		$precio = $precio - $saldo_aplicado;
	}
	if($taf >= 1 and $tp <= 1) echo "No has agregado peliculas de cortesia, por favor modifica el pedido nuevamente";
	else
	{
		$datos = "tipo='$tipo', articulos='$articulos', cantidades='$cantidades', precios_unitarios='$precios_unitarios',";
		$datos .= "precio='$precio', fecha_emision='$fecha', id_peliculas='$id_peliculas'";
		$query = act_datos_tabla("pedidos",$datos,"id_factura='$id_fac'",1);
	
		$id_ingresado = $id_fac;
		echo "Enviando el mail al usuario ..... <br />";
		include('mail_factura.php');
		//$mensaje = "El mensaje ha sido enviado.";
	
		unset($_SESSION['carro_admin_mod']);
		unset($_SESSION['pel_alq_admin_mod']);
		unset($_SESSION['res_admin_mod']);
		unset($_SESSION['id_fac']);
		unset($_SESSION['cpc']);
		echo "El pedido fue modificado con exito";
	}
}
else echo "No se ha modificado nada en el pedido";
?>
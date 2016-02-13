<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>modificar pedido</title>
<link href="../../estilo.css" rel="stylesheet" type="text/css" />
</head>
<body style="color:#000">
<?php
if (isset($_SESSION['user_admin']))
{
	$id_fac			= $_REQUEST['id_fac'];
	$tipo_pedido	= explode(" ",$_REQUEST['tipo']);
	$cantidades		= explode(" ",$_REQUEST['cantidades']);
	$precios		= explode(" ",$_REQUEST['precios']);
	$id_peliculas	= explode("@",$_REQUEST['id_peliculas']);
	$titulo			= explode("@",$_REQUEST['titulos']);
	$sizeof			= sizeof($tipo_pedido);
	$sizeof--;
	$carro = false;
	if($tipo_pedido[0] == 'Afiliación')
	{
		$carro[$id_peliculas[$a]]['identificador']=0;
		$carro[$id_peliculas[$a]]['cantidad']=1;
		$carro[$id_peliculas[$a]]['producto']="Afiliación a videoexpress";
		$afiliacion = $_SESSION['afiliacion_admin'];
		$carro[$id_peliculas[$a]]['precio_compra']=$afiliacion;
		$carro[$id_peliculas[$a]]['id']="";
		$carro[$id_peliculas[$a]]['tipo_pedido']="Afiliación";
		$cpc = 0;
	}
	else
	{
		for($a=0; $a<$sizeof; $a++)
		{
			$carro[$id_peliculas[$a]]['identificador']=$id_peliculas[$a];
			$carro[$id_peliculas[$a]]['cantidad']=$cantidades[$a];
			$carro[$id_peliculas[$a]]['producto']=$titulo[$a];
			$carro[$id_peliculas[$a]]['precio_compra']=$precios[$a];
			$carro[$id_peliculas[$a]]['id']=$id_peliculas[$a];
			$carro[$id_peliculas[$a]]['tipo_pedido']=$tipo_pedido[$a];
		}
	}
	$_SESSION['carro_admin_mod']=$carro;
	$contador=0;
	$suma=0;
	$subto_compra = $subto_alquiler = $suma = $ta = $tc = 0;
	foreach($carro as $k => $v)
	{
		$id = $v['id'];
		if ($v['tipo_pedido'] == 'compra'){ $subto = $v['cantidad'] * $v['precio_compra']; $subto_compra += $subto; $tc += 1; }
		if ($v['tipo_pedido'] == 'alquiler') { $subto_alquiler += $_SESSION['alquiler']; $ta += 1; }
		if ($v['tipo_pedido'] == 'cortesia') $subto_cortesia = 0;
		if ($v['tipo_pedido'] == 'Afiliación') $subto_afiliacion = $_SESSION['afiliacion_admin'];
		if ($ta == 3) $subto_alquiler = 20000;
		if ($ta == 4) { $subto_alquiler = 24000; $cpc = 1; }
		$suma=$subto_alquiler+$subto_compra+$subto_cortesia+$subto_afiliacion;
		$contador++;
	}
	if ($ta >= 0 && $ta <= 3) $_SESSION['pel_alq_admin'] = $ta;
	$_SESSION['suma_admin_mod'] = $suma;
	$_SESSION['tot_pel_admin_mod'] = $contador;
	$_SESSION['id_fac'] = $id_fac;
	$_SESSION['cpc'] = $cpc;
	echo '<script languaje="Javascript">location.href="catalogomod.php"</script>';
}
else
{
	include ('index.php');
}
?>

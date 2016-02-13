<?php
$id		= $_REQUEST['id'];
$activo	= $_REQUEST['activo'];	
$pag	= $_REQUEST['pag'];
$orden	= $_REQUEST['orden'];

if ($activo == "no") $activo = "si";
else ($activo = "no");

include('../../include/funciones_globales.php');
$conecta = conecta_bd("videoexpress");

//Todo parece correcto procedemos con la inserccion
$query = act_datos_tabla("usuarios","activo='$activo'","codigo_cliente='$id'",1);
echo "<script languaje='Javascript'>location.href='afiliados.php?orden=$orden&pag=$pag'</script>";
?>
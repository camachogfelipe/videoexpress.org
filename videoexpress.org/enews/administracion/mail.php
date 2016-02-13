<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../estilo.css" rel="stylesheet" type="text/css">
<?php
$ok = $_REQUEST['ok'];
$es = $_REQUEST['es'];
$bd = "enews";

if ($es == 1 && $ok == NULL)
{
	echo "<center style=\"border: 1px dotted #fff; color: #FFF; font-family: Arial; font-size: 16px; background-color: #555\">";
	echo "¿Esta seguro de enviar el boletin por email?<br>";
	echo "<span id=\"menu_admon_mail\"><a href=\"mail.php?es=0&ok=1\">OK</a></span>&nbsp;<span id=\"menu_admon_mail\"><a href=\"mail.php?&es=0&ok=0\">Cancelar</a></span>";
	echo "</center><br>";
	include('preview.php');
}

if ($es == 0 && $ok == 1)
{
	//nos conectamos a la base de datos
	$bd = "enews";
	include ("conexion.php");
	
	$sql = "select COUNT(*) FROM inicio";
	$result = mysql_query($sql) or die("La siguiente consulta contiene alg&uacute;n error:<br>nSQL: <b>$sql</b>");
	$total_resultados = mysql_fetch_array($result);
	
	$tmp = $total_resultados[0];
	$id = $tmp;

	$query = "UPDATE programacion_mail SET ";
	$query .= "programado='1', ";
	$query .= "inicio='0', ";
	$query .= "enews='$id'";
	$query .= "WHERE No='1'";
	mysql_query($query) or die(mysql_error());
	
	echo "<span style='color:#FFF'>Se ha programado el envío de 100 mails cada 60 minutos hasta terminar la base de datos existente</span>";	
}

if($es == 0 && $ok == 0)
{
	echo "<center style=\"border: 1px dotted #fff; color: #FFF; font-family: Arial; font-size: 16px; background-color: #555\">";
	echo "No se ha enviado nada";
	echo "</center>";
}

function resultados($id)
{
	$sql = "select COUNT(*) FROM inicio";
	$result = mysql_query($sql) or die("La siguiente consulta contiene alg&uacute;n error:<br>nSQL: <b>$sql</b>");
	$total_resultados = mysql_fetch_array($result);
	
	$tmp = $total_resultados[0];
	$info[tr] = $tmp;
	
	if ($id == NULL || $id <= 0 || $id > $tmp) $id = $total_resultados[0];

	$sql = "SELECT * FROM inicio WHERE No = '$id'";
	
	$result = mysql_query($sql) or die("La siguiente consulta contiene alg&uacute;n error:<br>nSQL: <b>$cadbusca</b>");

	$No_items = 0;
	while ($row = mysql_fetch_array($result))
	{
		$info[No] 					= "{$row['No']}";
		$info[titulo_paraeditar]	= "{$row['titulo_paraeditar']}";
		$info[cuerpo_paraeditar] 	= "{$row['cuerpo_paraeditar']}";
		$info[titulo_primerafila]	= "{$row['titulo_primerafila']}";
		$info[cuerpo_primerafila] 	= "{$row['cuerpo_primerafila']}";
		$info[titulo_nuevamente]	= "{$row['titulo_nuevamente']}";
		$info[cuerpo_nuevamente] 	= "{$row['cuerpo_nuevamente']}";
		$info[titulo_buenasnuevas]	= "{$row['titulo_buenasnuevas']}";
		$info[cuerpo_buenasnuevas] 	= "{$row['cuerpo_buenasnuevas']}";
		$info[titulo_garabatos]		= "{$row['titulo_garabatos']}";
		$info[cuerpo_garabatos] 	= "{$row['cuerpo_garabatos']}";
		$info[fecha]				= "{$row['fecha']}";
		$info[fondo]				= "{$row['fondo']}";
		$No_items++;
	}
	
	return $info;
}
?>
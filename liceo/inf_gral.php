<?php
$op = $_REQUEST['op'];
$no = $_REQUEST['no'];

switch ($op)
{
	case 1	:	boletines();
				general();
				break;
	case 2	:	ver_boletin($no);
				break;
	default	:	boletines();
				general();
				break;
}

function boletines()
{
	include('administracion/conexion.php');

	$sql = "select * FROM boletin ORDER BY No asc";	
	//nos conectamos a la tabla respectiva
	$result = mysql_query($sql) or die("La siguiente consulta contiene algÃºn error:<br>nSQL: <b>$sql</b>");

	echo "<p id=\"encabezado\">Boletines</p>";
	
	while ($row = mysql_fetch_object($result))
	{
		$No = $row->No;
		echo "<a id=\"menu_admon\" href=\"?ac=8&op=2&no=$No\">Ver Boletin No. ".$No."</a>";
		//echo "<a id=\"menu_admon\" href=\"archivos_descarga/boletin$No.pdf\">Versi&oacute;n pdf</a><br />";
	}
}

function ver_boletin($no)
{
	include('administracion/conexion.php');

	$sql = "select * FROM boletin WHERE No='$no'";
	
	//nos conectamos a la tabla respectiva
	$result = mysql_query($sql) or die("La siguiente consulta contiene algÃºn error:<br>nSQL: <b>$sql</b>");

	echo "<p id=\"encabezado\">Boletines</p>";
	
	while ($row = mysql_fetch_object($result))
	{
		$No = $row->No;
		$boletin = $row->boletin;
		echo $boletin;
	}
}

function general()
{
	include('administracion/conexion.php');

	$sql = "select * FROM archivos ORDER BY id asc";	
	//nos conectamos a la tabla respectiva
	$result = mysql_query($sql) or die("La siguiente consulta contiene algÃºn error:<br>nSQL: <b>$sql</b>");

	echo "<p id=\"encabezado\">Informaci&oacute;n de interes</p>";
	
	while ($row = mysql_fetch_object($result))
	{
		$nombre = $row->titulo;
		$archivo = $row->archivo;
		echo "<a href=\"archivos_descarga/$archivo\" id=\"menu_admon\">$nombre</a><br />";
	}
}
?>
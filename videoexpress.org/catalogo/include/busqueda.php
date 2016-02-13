<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link type="text/css" rel="stylesheet" href="Scripts/floatbox/floatbox.css" />
<script type="text/javascript" src="Scripts/floatbox/floatbox.js"></script>
<script type="text/javascript" src="Scripts/floatbox/options.js"></script>
<title>Busqueda</title>
<link href="estilo.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php
if ($busqueda != NULL)
{
	//CUENTA EL NUMERO DE PALABRAS
	$trozos=explode(" ",$busqueda);
	$numero=count($trozos);
	$pag = $_REQUEST['pag'];
	$registros_a_mostrar = 10;
	if(isset($pag))
	{
		$registro_a_empezar = ($pag -1 ) * $registros_a_mostrar;
		$pag_actual = $pag;
	}
	else
	{
		$registro_a_empezar = 0;
		$pag_actual = 1;
	}

	if ($numero==1)
	{
		//SI SOLO HAY UNA PALABRA DE BUSQUEDA SE ESTABLECE UNA INSTRUCION CON LIKE
		$cadbusca="SELECT * FROM catalogo WHERE TITULO LIKE  '%$busqueda%' OR auditorio LIKE  '%$busqueda%' OR clasificacion LIKE  '%$busqueda%' OR genero LIKE '%$busqueda%' OR descripcion LIKE '%$busqueda%' ORDER BY (titulo) ASC";
		$result = mysql_query($cadbusca) or die("La siguiente consulta contiene alg&uacute;n error:<br>nSQL: <b>$cadbusca</b>");
		$total_resultados = mysql_num_rows($result);
		$cadbusca .= " LIMIT $registro_a_empezar,$registros_a_mostrar";
		$result = mysql_query($cadbusca) or die("La siguiente consulta contiene alg&uacute;n error:<br>nSQL: <b>$cadbusca</b>");
	}elseif ($numero>1)
	{
		//SI HAY UNA FRASE SE UTILIZA EL ALGORTIMO DE BUSQUEDA AVANZADO DE MATCH AGAINST
   		//busqueda de frases con mas de una palabra y un algoritmo especializado
   		$cadbusca = "SELECT *, MATCH ( titulo, auditorio, clasificacion, genero, descripcion ) AGAINST ('$busqueda') AS Score FROM catalogo WHERE MATCH (titulo, auditorio, clasificacion, genero, descripcion) AGAINST ('$busqueda') ORDER BY (titulo) ASC";
		$result = mysql_query($cadbusca) or die("La siguiente consulta contiene alg&uacute;n error:<br>nSQL: <b>$cadbusca</b>");
		$total_resultados = mysql_num_rows($result);
		$cadbusca .= " LIMIT $registro_a_empezar,$registros_a_mostrar";
		$result = mysql_query($cadbusca) or die("La siguiente consulta contiene alg&uacute;n error:<br>nSQL: <b>$cadbusca</b>");		
	}

	//$result = mysql_query($cadbusca) or die("La siguiente consulta contiene alg&uacute;n error:<br>nSQL: <b>$cadbusca</b>");
	//$total_resultados = mysql_num_rows($result);
	
	$No_items = 0;
	while ($row = mysql_fetch_array($result))
	{
		//Mostramos los titulos de los articulos o lo que deseemos...
		$idt_p[$No_items]		= "{$row['id']}";
	    $titulo_p[$No_items]    = "{$row['titulo']}";
		$imagen_p[$No_items]	= "{$row['imagen']}";
		$No_items++;
	}
	
	$b = 1;
	resultado_titulos($No_items,$idt_p,$titulo_p,$imagen_p,$inf,$auditorio,$total_resultados,$pag_actual,$busqueda);
}
?>
</body>
</html>
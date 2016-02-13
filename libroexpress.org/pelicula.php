<?php session_start() ?>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="estilo.css" rel="stylesheet" type="text/css" />
<body style="color: #000">
<?php
$aid_r = $_GET['aid'];
$id_p = $_GET['id_p'];

if ($id_p == NULL || $aid_r == NULL)
{
	echo "Para poder ver la informaci&#243;n de alguna pelicula es preciso que lo haga por medio del menu de peliculas o de la busqueda en la p&aacute;gina principal";
}
else
{
	$aid_r = explode(",", $aid_r);
	
	include('administracion/conexion.php');

	$sql = "select * FROM catalogo WHERE id='$id_p'";
	
	$result = mysql_query($sql) or die("La siguiente consulta contiene alg&uacute;n error:<br>nSQL: <b>$sql</b>");
	$total_resultados = mysql_num_rows($result);

	while ($row = mysql_fetch_array($result))
	{
		$id = "{$row['id']}";
		$titulo = "{$row['titulo']}";
		$clasificacion = "{$row['clasificacion']}";
		$genero = "{$row['genero']}";
		$tiempo = "{$row['tiempo']}";
		$descripcion = "{$row['descripcion']}";
		$imagen = "{$row['imagen']}";
		$formato = "{$row['formato']}";
		$fecha = "{$row['fecha']}";
		$nuevo = "{$row['nuevo']}";
		$auditorio = "{$row[auditorio]}";
		$compra = "{$row[compra]}";
		$alquiler = "{$row[alquiler]}";
		$precio_compra = "{$row[precio_compra]}";
	}

	$flecha_izq_act = "<img src='botones/botonatras.png' width='25px' height='25px' align='left' alt='Anterior Titulo' border='0px'>";
	$flecha_der_act = "<img src='botones/botonadelante.png' width='25px' height='25px' align='right' alt='Siguiente Titulo' border='0px'>";
	$flecha_izq_inact = "<img src='botones/botonatras_inactivo.png' width='25px' height='25px' align='left' alt='Anterior Titulo'  border='0px'>";
	$flecha_der_inact = "<img src='botones/botonadelante_inactivo.png' width='25px' height='25px' align='right' alt='Siguiente Titulo'  border='0px'>";
	$alquilar = "<img src=\"botones/alquilar.png\" border=\"0\" title=\"Alquilar\" width=\"100px\" height=\"28px\" align=\"center\">";

	for($i=0; $i<sizeof($aid_r); $i++)
	{
		if ($aid_r[$i] == $id)
		{
			$ta = $i - 1;
			$ant = $aid_r[$ta];
			$ts = $i + 1;
			$sig = $aid_r[$ts];
			$aid_e = implode(",", $aid_r);
			
			echo "<div style='width: 100%; margin-top: -4px'><div id='titulo_informacion'>$titulo</div></div>";
	
			echo "<table width='100%' height='auto' id='tabla_pelicula' border='0px' cellpadding='2px' cellspacing='0px' style='margin-top:3px'>";
			echo "<tr><td width='50%' height='360' align='center' style='border-right: 1px dotted #999999'><div style='width: 229'>";
			if ($nuevo == 'si')
			{
				echo "<div style='width: 192px; height: 270px; float: right; margin-top: 10px; z-index: 1'><img src='Imagenes_peliculas/$imagen' width='192' height='270'></div><div style='width: 75; height: 75; float: left; margin-top: -280px; margin-left: 0px; z-index: 2'><img src='Imagenes_pagina/nuevo.png' width='75' height='75' style='vertical-align:top' align='left'></div></div>";
			}
			else
			{
				echo "<img src='Imagenes_peliculas/$imagen' width='199' height='180'><br><br>";
			}
			echo "<table width='100%' border='0px' cellpadding='1px' cellspacing='0' style='margin-top: 2px'>";
			echo "<tr id='titulo_pelicula'><td><span>Auditorio: </span></td><td>$auditorio</td></tr>";
			echo "<tr id='titulo_pelicula'><td><span>Clasificaci&oacute;n: </span></td><td>$clasificacion</td></tr>";
			echo "<tr id='titulo_pelicula'><td><span>Genero: </span></td><td>$genero</td></tr>";
			echo "<tr id='titulo_pelicula'><td><span>Tiempo: </span></td><td>$tiempo minutos</td></tr>";
			echo "<tr id='titulo_pelicula'><td><span>Formato: </span></td><td>$formato</td></tr>";
			echo "<tr id='titulo_pelicula'><td><span>Precio de compra: </span></td><td>\$ $precio_compra</td></tr></table><br></td>";
			echo "<td width='50%' style='vertical-align: top'>";
			echo "<table width='100%' height='100%' id='tabla_pelicula' border='0px' cellpadding='2px' cellspacing='0'>";
			echo "<tr><td height='28px' valign='middle' style='text-align: center'>";
			
			if ($ant != NULL) echo "<a href='?inf=8&id_p=$ant&aud=$aud&aid=$aid_e' border='0px'>$flecha_izq_act</a>";
			else echo $flecha_izq_inact;
			if ($sig != NULL) echo "<a href='?inf=8&id_p=$sig&aud=$aud&aid=$aid_e' border='0px'>$flecha_der_act</a>";
			else echo $flecha_der_inact;
			
			if (isset($_SESSION['usuario_afiliado']) and $_SESSION['activo'] == 'si') echo "<a href=\"agregacar.php?".SID."&id=$id&tipo_pedido=alquiler\">$alquilar</a>";
			else echo "$alquilar";
			echo " <a href=\"agregacar.php?".SID."&id=$id&tipo_pedido=compra\"><img src='botones/comprar.png' width='100px' height='28px' align='center' alt='Alquilar este titulo' border='0px'></a>";
			echo "</td></tr><tr><td style='vertical-align: top; text-align:justify'>";
			echo "<span id='titulo_pelicula'>Descripci&oacute;n: </span><br /><br /><div id='descripcion'>$descripcion</div><br></td></tr>";
		}
	}
	
	echo "</table></td></tr></table>";
}
?>
<?php
function actualizacion_catalogo()
{
	$res = consulta_bd("actualizacion","fecha_actualizacion","-1;;;");
	while($row=mysql_fetch_object($res))
	{
		echo $row->fecha_actualizacion;
	}
}

function total_titulos()
{
	$sql = dato_columna("catalogo","COUNT(*)","-1;;;");
	return $sql;
}

function recomendadas()
{
	$res = consulta_bd("catalogo","*","2;titulo;Asc;;");
	
	$No_items = 0;
	while ($row = mysql_fetch_array($res))
	{
		$idt_p[$No_items] 		= "{$row['id']}";
		$tmp = $No_items + 1;
		if ($idt_p[$tmp] == NULL) $ultimo = $idt_p[$No_items];
		$No_items++;
	}
	
	$No_items = 0;
	$rec[0] = -1;
	for ($i=0; $i<=5; $i++)
	{
		$tmp = rand(1, $ultimo);
		$tmp2 = in_array($tmp, $rec);
		if ($tmp2 != 1)
		{
			$rec[$No_items] = $tmp;
			$No_items++;
		}
	}
	
	$No_items = 0;
	for ($i=1; $i<=sizeof($rec); $i++)
	{
		$res = consulta_bd("catalogo","*","1;;;id='$rec[$No_items]'");
		while ($row = mysql_fetch_array($res))
		{
			$idt[$No_items] 	= "{$row['id']}";
			$titulo[$No_items] 	= "{$row['titulo']}";
			$imagen[$No_items]	= "{$row['imagen']}";
			$No_items++;
		}
	}
	
	if($idt != NULL) $aid_e = implode(",", $idt);
	
	$i = 0;
	while ($i < sizeof($idt))
	{
		echo "<span id='titulacion'><a href='tabs/?id_p=$idt[$i]' class=\"floatbox\" data-fb-options=\"width:70% height:480px disableScroll:true scrolling:no\" ><img src='Imagenes_peliculas/$imagen[$i]' alt='$titulo[$i]' width='75' height='110' border='0px' /></a></span> ";
		$i++;
	}
}

//fucnion que escoge un fondo aleatoriamente
function fondo()
{
	$fondo = mt_rand(0,40);
	$fondo = "fondo".$fondo.".jpg";
	
	return $fondo;
}

//funcione que manda el mail del formulario de contacto
function mail_contacto($datos)
{
	switch ($datos['asunto'])
	{
		case 'sugerencia'	: $email_envio = 'gerencia@videoexpress.org';
							  break;
		case 'alquiler'		: $email_envio = 'alquiler@videoexpress.org';
							  break;
		case 'reclamo'		: $email_envio = 'gerencia@videoexpress.org';
							  break;
		case 'otro'			: $email_envio = 'gerencia@videoexpress.org';
							  break;
	}
	
	$cuerpo = "
<html>
<head>
<title>Correo de contacto</title>
<link href=\"http://www.videoexpress.org/catalogo/estilo.css\" rel=\"stylesheet\" type=\"text/css\" />
</head>
<body>
Hola Sr. Manuel!!
<p>".$datos['nombre'].", se ha contactado por un(a) ".$datos['asunto']."</p>
Sus datos son:
<p>
Nombre completo: ".$datos['nombre']."
E-mail: ".$datos['email']."
Teléfono: ".$datos['telefono']."
País: ".$datos['pais']."
Ciudad: ".$datos['ciudad']."
</p>
Razón del contacto: ".$datos['asunto']."
<p>
Mensaje:
</p>
".$datos['texto_contacto']."
</body>
</html>";

	$headers = "X-Mailer:PHP/".phpversion()."\n";
	$headers .= "Mime-Version: 1.0\n";
	$headers .= "Content-Type: text/html; charset=iso-8859-1\n";

	//dirección del remitente
	$headers .= "From: Clientes <clientes@videoexpress.org>\n";
	mail($email_envio, $datos['asunto'], $cuerpo, $headers);

	echo '<script languaje="Javascript">location.href="http://www.videoexpress.org/catalogo/?inf=1"</script>';
}

//funcion que envia el correo de recordacion de clave
function mail_clave($email_envio)
{
	$asunto = "Nueva contrase&ntilde;a de VideoExpress.org";
	$cuerpo = "Su nueva contrase&ntilde;a es videoexpress, est&aacute; contrase&ntilde;a es generica por lo que debe cambiarla al momento de ingresar nuevamente en nuestro portal<p>Administraci&oacute;n VideoExpress.org</p>";
	$headers = "X-Mailer:PHP/".phpversion()."\n"; $headers .= "Mime-Version: 1.0\n"; $headers .= "Content-Type: text/html; charset=iso-8859-1\n";
	mail($email_envio, $asunto, $cuerpo, $headers);
		
	$clave = md5("videoexpress");
	$query = act_datos_tabla("usuarios","clave_acceso='$clave'","email='$email'");
}

//funcion que genera los resultados de los titulos solicitados
function generar_resultados($pag, $auditorio, $inf)
{
	if(isset($pag))
	{
		$registros_a_mostrar = 10;
		$registro_a_empezar = ($pag -1 ) * $registros_a_mostrar;
		$pag_actual = $pag;
	}
	else
	{
		$registro_a_empezar = 0;
		$pag_actual = 1;
	}

	if ($auditorio != '*') $sql = consulta_bd("catalogo","*","5;titulo;asc;auditorio='$auditorio';$registro_a_empezar/$registros_a_mostrar");
	else $sql = consulta_bd("catalogo","*","6;titulo;asc;;$registro_a_empezar/$registros_a_mostrar");
	
	if($auditorio != '*') $total_resultados = dato_columna("catalogo","COUNT(*)","3;titulo;asc;auditorio='$auditorio';");
	else $total_resultados = dato_columna("catalogo","COUNT(*)","2;titulo;asc;;");
	
	$No_items = 0;
	while ($row = mysql_fetch_array($sql))
	{
		$idt_p[$No_items] 		= "{$row['id']}";
		$titulo_p[$No_items] 	= "{$row['titulo']}";
		$imagen_p[$No_items]	= "{$row['imagen']}";
		$No_items++;
	}
	
	resultado_titulos($No_items,$idt_p,$titulo_p,$imagen_p,$inf,$auditorio,$total_resultados,$pag,"");
}

//funcion que muestra los resultados de los titulos
function resultado_titulos($No_items,$idt_p,$titulo_p,$imagen_p,$inf,$auditorio,$total_resultados,$pag,$busqueda)
{
	if ($total_resultados > 10)
	{
		$total_paginas = ceil($total_resultados / 10);

		if ($pag == $total_paginas)
		{
			$tmp2 = ($pag - 1) * 10;
			$tmp3 = $total_resultados - $tmp2;
			$y = $total_resultados;
			$x = $total_resultados - $tmp3;
		}
		else
		{
			$y = $pag * 10;
			$x = $y - 10;
		}
	}
	else
	{
		$total_paginas = 1;
		$pag = 1;
		$x = 1;
		$y = $No_items;
	}

	echo "<center><table width='100%' border='0' cellpadding='0' cellspacing='5px' style='text-align:top'>";
	echo "<tr>";
	
	$z = 0;
	
	for ($i=0; $i<10; $i++)
	{
		echo "<td style='text-align: center'><span id='titulacion'><a href='tabs/?id_p=$idt_p[$i]&aud=$auditorio' class=\"floatbox\" data-fb-options=\"width:70% height:480px disableScroll:true scrolling:no language:es\" border='0px'><img src='Imagenes_peliculas/$imagen_p[$i]' alt='$titulo_p[$i]' width='130' height='189' border='0px' /></a></span></td>";
		$z++;
		if ($z == 5)
		{
			echo "</tr><tr>";
		}
	}
	
	echo "</tr></table>";

	echo "<p><table width='$tmp' border='0' cellpadding='0' cellspacing='0'><tr>";
	
	$anterior = $pag - 1;
	$siguiente = $pag + 1;
	
	$span = "style=\"background:url(Imagenes_pagina/titulos/fondo.png)\"";
	
	if ($anterior <= 0) $links['anterior'] = "Anterior ";
	else $links['anterior'] = "<a href=\"generos.php?inf=$inf&pag=$anterior&busqueda=$busqueda\">Anterior </a>";
	if ($siguiente > $total_paginas) $links['siguiente'] = " Siguiente";
	else $links['siguiente'] = "<a href=\"generos.php?inf=$inf&pag=$siguiente&busqueda=$busqueda\"> Siguiente</a> ";
	
	echo "<td id='paginacion' $span>".$links['anterior']."</td>";
	
	$a = $pag - 5;
	$b = $pag + 5;
	if($a < 1)
	{
		$a = 2;
		$b = 12;
	}
	if($b > $total_paginas)
	{
		$b = $total_paginas;
		$a = $total_paginas - 10;
		if ($a < 1) $a = 2;
	}
	if($pag == 1)
	{
		echo "<td id='paginacion'>";
		echo "<span id='pagina_activa'>1</span>";
		if($total_paginas != 1) echo "</td><td id='paginacion'>...";
		echo "</td>";
	}
	else
	{
		echo "<td id='paginacion'>";
		echo "<a href='generos.php?inf=$inf&pag=1&busqueda=$busqueda' border='0px'>1</a>";
		if($total_paginas != 1) echo "</td><td id='paginacion'>...";
		echo "</td>";
	}
	for ($i=$a; $i<$b; $i++)
	{
		echo "<td id='paginacion'>";
		if ($i == $pag) echo "<span id='pagina_activa'>$i</span>";
		else echo "<a href='generos.php?inf=$inf&pag=$i&busqueda=$busqueda' border='0px'>$i</a>";
		echo "</td>";
	}
	if($pag == $total_paginas)
	{
		if($total_paginas != 1)
		{
			echo "<td id='paginacion'>...</td><td id='paginacion'>";
			echo "<span id='pagina_activa'>$total_paginas</span>";
			echo "</td>";
		}
	}
	else
	{
		echo "<td id='paginacion'>...</td><td id='paginacion'>";
		echo "<a href='generos.php?inf=$inf&pag=$total_paginas&busqueda=$busqueda' border='0px'>$total_paginas</a>";
		echo "</td>";
	}
	echo "<td id='paginacion' $span> ".$links['siguiente']."</td>";
	
	if ($y != 0 and $x > 1) $t = $x + 1;
	else $t = 1;
	echo "</tr></table><p>Titulos del $t al $y de un total de $total_resultados</p></center>";
}

//funcion que pagina los resultados de las listas en administracion
function paginacion_lista($total_paginas, $pag, $tabla, $pagina, $orden)
{
	echo "<center><p><table width='$tmp' border='0' cellpadding='0' cellspacing='0'><tr>";
	
	$anterior = $pag - 1;
	$siguiente = $pag + 1;
	
	$span = "style=\"background:url(../../Imagenes_pagina/titulos/fondo.png)\"";
	
	if ($anterior <= 0) $links['anterior'] = "Anterior ";
	else $links['anterior'] = "<a href=\"$pagina.php?pag=$anterior&orden=$orden\">Anterior </a> ";
	if ($siguiente > $total_paginas) $links['siguiente'] = " Siguiente</span>";
	else $links['siguiente'] = "<a href=\"$pagina.php?pag=$siguiente&orden=$orden\"> Siguiente</a> ";
	
	echo "<td id='paginacion' $span>".$links['anterior']."</td>";

	$a = $pag - 5;
	$b = $pag + 5;
	if($a < 1)
	{
		$a = 2;
		$b = 12;
	}
	if($b > $total_paginas)
	{
		$b = $total_paginas - 1;
		$a = $total_paginas - 10;
		if ($a < 1) $a = 2;
	}
	if($pag == 1)
	{
		echo "<td id='paginacion'>";
		echo "<span id='pagina_activa'>1</span>";
		if($total_paginas != 1) echo "</td><td id='paginacion'>...";
		echo "</td>";
	}
	else
	{
		echo "<td id='paginacion'>";
		echo "<a href='$pagina.php?pag=1&orden=$orden' border='0px'>1</a>";
		if($total_paginas != 1) echo "</td><td id='paginacion'>...";
		echo "</td>";
	}

	for ($i=$a; $i<=$b; $i++)
	{
		echo "<td id='paginacion'>";
		if ($i == $pag) echo "<span id='pagina_activa'>$i</span>";
		else echo "<a href='$pagina.php?pag=$i&orden=$orden' border='0px'>$i</a>";
		echo "</td>";
	}
	
	if($pag == $total_paginas)
	{
		if($total_paginas != 1)
		{
			echo "<td id='paginacion'>...</td><td id='paginacion'>";
			echo "<span id='pagina_activa'>$total_paginas</span>";
			echo "</td>";
		}
	}
	else
	{
		echo "<td id='paginacion'>...</td><td id='paginacion'>";
		echo "<a href='$pagina.php?pag=$total_paginas&orden=$orden' border='0px'>$total_paginas</a>";
		echo "</td>";
	}
	echo "<td id='paginacion' $span> ".$links['siguiente']."</td></tr></table>";
	echo "</p>";
	echo "<form id=\"form1\" name=\"form1\" method=\"post\" action=\"$pagina.php?orden=$orden\" style=\"width:160px; margin-top: 10px; background-color: #9ABEDC\">
  <span style=\"color: #000\">Ir a la p&aacute;gina </span><input name=\"pag\" type=\"text\" id=\"pag\" tabindex=\"1\" size=\"5\" />
</form></center>";
}

//funcion que pone el tipo de orden de una consulta sql
function orden($orden,$orden1)
{
	if($orden == $orden1[0])
	{
		if($orden1[1] == "ASC") echo "DESC";
		else echo "ASC";
	}
	else echo "ASC";
}

function calcular_dias($fecha)
{
	$fecha1 = explode(" ", $fecha);
	$fecha1 = explode("-", $fecha1[0]);
	
	$dia = date("d");
	$mes = date("m");
	$ano = date("Y");
	//calculo timestam de las dos fechas
	$timestamp1 = mktime(0,0,0,$fecha1[1],$fecha1[0],$fecha1[2]);
	$timestamp2 = mktime(4,12,0,$mes,$dia,$ano);

	//resto a una fecha la otra
	$segundos_diferencia = $timestamp1 - $timestamp2;
	//echo $segundos_diferencia;

	//convierto segundos en días
	$dias_diferencia = $segundos_diferencia / (60 * 60 * 24);

	//obtengo el valor absoulto de los días (quito el posible signo negativo)
	$dias_diferencia = abs($dias_diferencia);

	//quito los decimales a los días de diferencia
	$dias_diferencia = floor($dias_diferencia);

	return $dias_diferencia;
}

//funcion que toma los datos del cliente para la planilla
function datos_cliente_planilla($id_comprador)
{
	$dato = "nombre, direccion, tel_oficina, tel_oficina2, tel_casa, barrio, celular";
	$result = consulta_bd("usuarios",$dato,"1;;;codigo_cliente='$id_comprador';");
	while ($row = mysql_fetch_object($result))
	{
		$cliente[0]																= $row->nombre;
		$cliente[1]																= $row->direccion." / ".$row->barrio;
		if($row->tel_oficina != NULL || $row->tel_oficina > 0) $cliente[2]		= $row->tel_oficina."<br />";
		if($row->tel_oficina2 != NULL || $row->tel_oficina2 > 0) $cliente[2]	.= $row->tel_oficina2."<br />";
		if($row->tel_casa != 0 || $row->tel_casa != 0) $cliente[2]				.= $row->tel_casa;
		$cliente[3]																= $row->celular;
	}
	if($cliente != NULL )
	{
		$datos = implode("|",$cliente);
		return $datos;
	}
}

function mostrar_val_sesiones($x)
{
	if($x == 'alq') echo number_format($alquiler = $_SESSION['alquiler']);
	if($x == 'afi') echo number_format($afiliacion = $_SESSION['afiliacion']);
}

function version_panel()
{
	return $version = "0.3";
}

function mail_form($asunto, $cuerpo, $email)
{
// múltiples recipientes
$para  = 'gerencia@videoexpress.org';

// mensaje
$mensaje = '
<html>
<head>
  <title>'.$asunto.'</title>
</head>
<body>'.$cuerpo.'
</body>
</html>
';

// Para enviar correo HTML, la cabecera Content-type debe definirse
$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Cabeceras adicionales
$cabeceras .= 'To: '.$para."\r\n";
$cabeceras .= 'From: '.$email."\r\n";

// Enviarlo
mail($para, $asunto, $mensaje, $cabeceras);
}
?>
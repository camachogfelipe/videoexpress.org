<?php
function conecta_bd($bd)
{
	// Configura los datos de tu cuenta
	$dbhost='localhost';
	$dbusername='root';
	$dbuserpass='camachitos';
	$dbname=$bd;

	//nos conectamos a la base de datos
	mysql_connect ($dbhost, $dbusername, $dbuserpass);
	mysql_select_db($dbname) or die("Cannot select database");
}

function ambiente()
{
	$hora = date(G);
	$hora += 1;
	if($hora >= 0 and $hora <= 5) $estilo = 'noche';
	elseif($hora > 5 and $hora <= 12) $estilo = 'dia';
	elseif($hora > 12 and $hora <= 18) $estilo = 'tarde';
	elseif($hora > 18 and $hora <= 23) $estilo = 'noche';
	
	return $estilo;
}

function fondo()
{
	$dia1 = date("j");
	$mes1 = date("n");
	$dia2 = 14;
	$mes2 = 1;
	if($dia1 >=15 and $mes1 >= 11 and $dia2 <= 14 and $mes2 <= 1)
		$fondo = rand(0, 19);
	else $fondo = rand(0, 17); 
	if($fondo == 11) fondo();
	else echo $fondo;
}

//Funcion que realiza una consulta a la base de datos
function consulta_bd($tabla, $datos, $opciones)
{
	$opciones = explode(";", $opciones);
	if ($opciones[0] != NULL) $tipo = $opciones[0];
	{
		//variable que selecciona por donde se organizan los datos
		if ($opciones[1] != NULL) $var1 = $opciones[1];
		//variable para organizar los datos
		if ($opciones[2] != NULL) $var2 = $opciones[2];
		//variable que selecciona cierto tipo de datos
		if ($opciones[3] != NULL) $var3 = $opciones[3];
		//variable de valor de cierto tipo de datos
		if ($opciones[4] != NULL) $var4 = explode("/",$opciones[4]);

		$sql = "SELECT $datos FROM $tabla";
		$opcion1 = "WHERE $var3";
		$opcion2 = "ORDER BY $var1 $var2";
		if($var4[1] != NULL) $opcion3 = "LIMIT $var4[0],$var4[1]";
		else $opcion3 = "LIMIT $var4[0]";

		if ($tipo == 1) $sql .= " ".$opcion1;
		elseif ($tipo == 2) $sql .= " ".$opcion2;
		elseif ($tipo == 3)
		{
			$sql .= " ".$opcion1;
			$sql .= " ".$opcion2;
		}
		elseif ($tipo == 4)
		{
			$sql .= " ".$opcion3;
		}
		elseif ($tipo == 5)
		{
			$sql .= " ".$opcion1;
			$sql .= " ".$opcion2;
			$sql .= " ".$opcion3;
		}
		elseif ($tipo == 6)
		{
			$sql .= " ".$opcion2." ".$opcion3;
		}
		elseif ($tipo == 7)
		{
			$sql .= " ".$opcion1." ".$opcion3;
		}
		//echo $sql;
		$resultado = mysql_query($sql) or die("La siguiente consulta contiene alg&uacute;n error:<br><b>$sql</b>");
	}
	return $resultado;
}

//Funcion que saca un dato de una columna de una tabla: sum, count, etc
function dato_columna($tabla, $datos, $opciones)
{
    $resultado = consulta_bd($tabla, $datos, $opciones);
    $t = mysql_fetch_array($resultado);
    $total = $t[0];
    return $total;
}

//Funcion para ingresar datos en una tabla
function ing_datos_tabla($tabla, $columna, $valores)
{
    //$conecta = conecta_bd("videoexpress");
    $query = "INSERT INTO $tabla ($columna) VALUES ($valores)";
    mysql_query($query) or die(mysql_error());
    //desconecta_bd($conecta);
}

//Funcion para actualizar los datos en una tabla
function act_datos_tabla($tabla, $datos, $concepto, $inc)
{
    $query = "UPDATE $tabla SET $datos";
	if($inc == "1") $query .= " WHERE $concepto";
	//echo $query;
    mysql_query($query) or die(mysql_error());
}

//funcion para eliminar datos de una tabla sql
function del_datos_tabla($tabla, $concepto)
{
	$conecta = conecta_bd("c274400_01800");
    $query = "DELETE FROM $tabla WHERE $concepto";
    mysql_query($query) or die(mysql_error());
}

//Funcion de muestra de fecha
function fecha()
{
    $dia = date(w);
    $num_mes = date(n);

    switch ($dia)
    {
	   case 0 : $dia = "Domingo";
	       		break;
	   case 1 : $dia = "Lunes";
                break;
	   case 2 : $dia = "Martes";
                break;
	   case 3 : $dia = "Miercoles";
                break;
	   case 4 : $dia = "Jueves";
                break;
	   case 5 : $dia = "Viernes";
                break;
	   case 6 : $dia = "Sabado";
                break;
    }

    $num_dia = date(j);

    switch ($num_mes)
    {
	   case 1 : $mes = "Enero";
                break;
	   case 2 : $mes = "Febrero";
                break;
	   case 3 : $mes = "Marzo";
                break;
	   case 4 : $mes = "Abril";
                break;
	   case 5 : $mes = "Mayo";
                break;
	   case 6 : $mes = "Junio";
                break;
	   case 7 : $mes = "Julio";
                break;
	   case 8 : $mes = "Agosto";
                break;
	   case 9 : $mes = "Septiembre";
                break;
	   case 10 : $mes = "Octubre";
                 break;
	   case 11 : $mes = "Noviembre";
                 break;
	   case 12 : $mes = "Diciembre";
                 break;
    }

    $anio = date(Y);
    
    return $fecha = array('dia'=>$dia, 'num_dia'=>$num_dia, 'mes'=>$mes, 'num_mes'=>$num_mes, 'anio'=>$anio); 
}

//Funcion que nos desconecta de la BD
function desconecta_bd($bd)
{
    mysql_close($bd);
}

//funcion que selecciona los datos de una tabla
function sel_items_form($tabla,$datos,$opciones)
{
    conecta_bd("redlibr_redlibreria");    
    $res = consulta_bd($tabla,$datos, $opciones);
    $i = 0;
    while ($row = mysql_fetch_object($res))
    {
            $res1[$i] = $row->$datos;
            $i++;
    }
    return $res1;
}

function salir($salir)
{
	extract($_REQUEST);

	if($salir == true)
	{
		unset($_SESSION['valid_user']);
		unset($_SESSION['nombre']);
		unset($_SESSION['apellidos']);
		unset($_SESSION['ultimo_acceso']);
		session_destroy();
	}
	elseif($pagina == 'inf_general')
	{
		header("Location: include/inf_general/?op=1");
	}
	elseif($salir == 'carro')
	{
		unset($_SESSION['carro']);
		$_SESSION['pel_alq'] = $_SESSION['suma'] = $_SESSION['tot_pel'] = 0;
		header("Location: carrito/ver_carrito.php");
	}
	elseif($salir == 'admin' || $salir == 'adminvideo')
	{
		// store to test if they *were* logged in
		unset($_SESSION['user_admin']);
		unset($_SESSION['carro_admin']);
		unset($_SESSION['pel_alq_admin']);
		unset($_SESSION['res_admin']);
		unset($_SESSION['alquiler']);
		unset($_SESSION['afiliacion']);
		session_destroy();
		// store to test if they *were* logged in
		unset($_SESSION['user_adminvideo']);
		//destruimos la sesion de libro o enews
		unset($_SESSION['valid_user']);
        unset($_SESSION['nombre']);
		session_destroy();
	}
}

function remplazar($tex)
{
	$cadena_buscar['á'] = "a";
	$cadena_buscar['é'] = "e;";
	$cadena_buscar['í'] = "i";
	$cadena_buscar['ó'] = "o";
	$cadena_buscar['ú'] = "u";
	$cadena_buscar['ñ'] = "n";
	$cadena_buscar['Á'] = "A";
	$cadena_buscar['É'] = "E";
	$cadena_buscar['Í'] = "I";
	$cadena_buscar['Ó'] = "O";
	$cadena_buscar['Ú'] = "U";
	$cadena_buscar['Ñ'] = "N";
	
	echo $texto = strtr($tex, $cadena_buscar);
	
	return $texto = strtr($tex, $cadena_buscar);
}

function mostrar_paginacion($pag, $total_paginas, $id)
{
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
	
	echo '<div id="paginacion" class="menu_ppal">';
	
	if($pag == 1)
	{
		echo "<span id='pag_sel'>1</span>\n";
		if($total_paginas != 1) echo "&nbsp;...&nbsp;\n";
	}
	else
	{
		echo "<a href='#' onclick=\"recargar('mostrar_articulos','id=$id&pag=1','#quienes')\">1</a>\n";
		if($total_paginas != 1) echo "&nbsp;...&nbsp;\n";
	}

	for ($i=$a; $i<=$b; $i++)
	{
		if ($i == $pag) echo "<span id='pag_sel'>$i</span>\n";
		else echo "<a href='#' onclick=\"recargar('mostrar_articulos','id=$id&pag=$i','#quienes')\">$i</a>\n";
	}
	
	if($pag == $total_paginas)
	{
		if($total_paginas != 1)
		{
			echo "&nbsp;...&nbsp;\n";
			echo "<span id='pag_sel'>$total_paginas</span>\n";
		}
	}
	else
	{
		echo "&nbsp;...&nbsp;\n";
		echo "<a href='#' onclick=\"recargar('mostrar_articulos','id=$id&pag=$total_paginas','#quienes')\" border='0px'>$total_paginas</a>\n";
	}
	echo '</div>';
}

function notired1()
{
	$conecta = conecta_bd("redlibr_redlibreria");
	$consulta = consulta_bd("notired", "*", "6;id_notired;DESC;;6");
	
	$num_rows = mysql_num_rows($consulta);
	
	if($num_rows == 0) echo '<span style="margin: 5px">No se han publicado NotiRED a&uacute;n</span>';
	else
	{
		$i = 1;
		echo '<table cellpadding="0" cellspacing="3" border="0" width="100%">'."\n";
		echo '<tr>'."\n";
		while ($row = mysql_fetch_object($consulta))
	    {
			if($i == 1)
			{
				echo '<td width="70%" valign="top" align="justify">'."\n";
				$titulo = $row->titulo;
				$titulo = htmlspecialchars_decode(trim(utf8_decode($titulo)), ENT_QUOTES);
				echo '<span id="titulos_otros2">'.ucfirst($titulo).'</span>'."\n";
				echo '<br /><br /><div id="texto_notired1" class="creditos2">'.substr(htmlspecialchars_decode(utf8_decode($row->encabezado)),0,200).'...<a href="#" onclick="'."recargar('notired','','#contenido')".'">Ver m&aacute;s</a></div>'."\n";
				echo '</td>'."\n";
				echo '<td width="30%" valign="top" align="justify" class="menu_ppal">'."\n";
			}
			else echo '<li><a href="#" id="notired" onclick="'."recargar('notired','id_notired=$row->id_notired','#contenido')".'">'.ucfirst(htmlspecialchars_decode(trim(utf8_decode($row->titulo)))).'</a></li>'."\n";
			$i++;
		}
		echo '</td>'."\n";
		echo '</tr>'."\n";
		echo '</table>'."\n";
	}
}

function notired2($id_notired)
{
	$conecta = conecta_bd("redlibr_redlibreria");
	if($id_notired == NULL) $id_notired = dato_columna("notired", "MAX(id_notired)", "-1;;;;");
	$consulta = consulta_bd("notired", "*", "1;;;id_notired='$id_notired';");
	
	$num_rows = mysql_num_rows($consulta);
	
	if($num_rows == 0) echo 'No se han publicado NotiRED a&uacute;n';
	else
	{
		while ($row = mysql_fetch_object($consulta))
    	{
			echo '<p id="titulos_otros">'.ucfirst(htmlspecialchars_decode($row->titulo)).'</p>'."\n";
			echo '<p id="encabezado_notired">'.htmlspecialchars_decode($row->encabezado).'</p>'."\n";
			$texto = $row->texto;
			echo htmlspecialchars_decode($texto)."\n";
		}
	}
}

function novedades()
{
	$conecta = conecta_bd("redlibr_redlibreria");
	$total = dato_columna("articulos", "COUNT(*)", "1;;;novedad='Y';");
	$numero1 = random(1, $total);
	$numero2 = random(1, $total);
	while($numero2 == $numero1 || $numero2 == NULL) $numero2 = random(0, $total);
	$consulta = consulta_bd("articulos", "id, titulo, imagen_caratula", "1;;;novedad='Y';");
	
	$num_rows = mysql_num_rows($consulta);
	
	if($num_rows == 0) echo 'No se han publicado articulos novedosos a&uacute;n';
	else
	{
		$i = 1;
		echo '<table cellpadding="0" cellspacing="3" border="0" align="center" width="100%">'."\n";
		echo '<tr>'."\n";
		while ($row = mysql_fetch_object($consulta))
    	{
			if($i == $numero1 || $i == $numero2)
			{
				echo '<td width="50%" valign="top" align="center">'."\n";
				echo '<a href="detalle.php?id='.$row->id.'&r=1" title="'.ucfirst($row->titulo).'" class="thickbox">';
				echo '<img src="imagenes_articulos/'.$row->imagen_caratula.'" width="160" height="210" border="0">'."\n";
				echo '</a>';
				echo '</td>'."\n";
				if($i == $numero1) $numero1 = NULL;
				if($i == $numero2) $numero2 = NULL;
			}
			$i++;
		}
		echo '</tr>'."\n";
		echo '</table>'."\n";
	}
}

function recomendados()
{
	$conecta = conecta_bd("redlibr_redlibreria");
	$consulta = consulta_bd("articulos", "id, titulo, imagen_caratula", "6;RAND();;;5");
	
	$num_rows = mysql_num_rows($consulta);
	
	if($num_rows == 0) echo 'No se han publicado articulos novedosos a&uacute;n';
	else
	{
		echo '<div id="noui" class="slideViewer">';
		echo '<div style="width: 200px; overflow: hidden; position: relative; top: 0pt; left: 0pt;">';
		echo '<ul style="width: 9230px; left: -200px;">';
		while ($row = mysql_fetch_object($consulta))
    	{
			echo '<li><a href="detalle.php?id='.$row->id.'" title="'.ucfirst($row->titulo).'" class="thickbox"><img src="imagenes_articulos/'.$row->imagen_caratula.'" width="200" height="267" border="0" /></a></li>';
		}
		echo '</ul>';
		echo '</div>';
		echo '</div>';
	}
}

function recomendados2()
{
	$conecta = conecta_bd("redlibr_redlibreria");
	$consulta = consulta_bd("articulos", "id, titulo, imagen_caratula", "6;RAND();;;5");
	
	$num_rows = mysql_num_rows($consulta);
	
	if($num_rows == 0) echo 'No se han publicado articulos novedosos a&uacute;n';
	else
	{
		$rec = '<table cellpadding="0" cellspacing="2" border="0">';
		$rec .= '<tr>';
		while ($row = mysql_fetch_object($consulta))
    	{
			$rec .= '<td><a href="http://www.redlibreriacristiana.org/detalle.php?op=2&id='.$row->id.'" title="'.ucfirst($row->titulo).'" class="thickbox"><img src="http://www.redlibreriacristiana.org/imagenes_articulos/'.$row->imagen_caratula.'" width="130" height="197" border="0" /></a></td>';
		}
		$rec .= '</tr>';
		$rec .= '</table>';
	}
	return $rec;
}

function novedades2()
{
	$conecta = conecta_bd("redlibr_redlibreria");
	$total = dato_columna("articulos", "COUNT(*)", "1;;;novedad='Y';");
	$numero1 = random(1, $total);
	$numero2 = random(1, $total);
	while($numero2 == $numero1 || $numero2 == NULL) $numero2 = random(0, $total);
	$consulta = consulta_bd("articulos", "id, titulo, imagen_caratula", "1;;;novedad='Y';");
	
	$num_rows = mysql_num_rows($consulta);
	
	if($num_rows == 0) echo 'No se han publicado articulos novedosos a&uacute;n';
	else
	{
		$i = 1;
		$nov = '<table cellpadding="0" cellspacing="3" border="0" align="left" width="513">'."\n";
		$nov .= '<tr>'."\n";
		while ($row = mysql_fetch_object($consulta))
    	{
			if($i == $numero1 || $i == $numero2)
			{
				$nov .= '<td width="50%" valign="top" align="center">'."\n";
				$nov .= '<a href="http://www.redlibreriacristiana.org/detalle.php?op=2&id='.$row->id.'" title="'.ucfirst($row->titulo).'" class="thickbox">';
				$nov .= '<img src="http://www.redlibreriacristiana.org/imagenes_articulos/'.$row->imagen_caratula.'" width="160" height="210" border="0">'."\n";
				$nov .= '</a>';
				$nov .= '</td>'."\n";
				if($i == $numero1) $numero1 = NULL;
				if($i == $numero2) $numero2 = NULL;
			}
			$i++;
		}
		$nov .= '</tr>'."\n";
		$nov .= '</table>'."\n";
	}
	return $nov;
}

function menu_notired()
{
	$conecta = conecta_bd("redlibr_redlibreria");
	$consulta = consulta_bd("notired", "*", "6;id_notired;DESC;;15");
	
	$num_rows = mysql_num_rows($consulta);
	
	if($num_rows == 0) echo '';
	else
	{
		while ($row = mysql_fetch_object($consulta))
	    {
			echo '<li id="mn"><a href="#" id="notired" onclick="'."recargar('notired','id_notired=$row->id_notired','#contenido')".'">'.ucfirst(htmlspecialchars_decode(trim(utf8_decode($row->titulo)))).'</a></li>'."\n";
		}
	}
}

function total_articulos()
{
	$conecta = conecta_bd("redlibr_redlibreria");
	echo $total = dato_columna("articulos","COUNT(*)","");
	echo " art&iacute;culos";
}

function random($x, $y)
{
	$y--;
	return rand($x, $y);
}
?>

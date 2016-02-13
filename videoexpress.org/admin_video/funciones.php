<?php
/**
 * @author Felocamgo
 * @copyright 2010
 */

//funcion que recibe datos según formulario
function recibir_datos($op, $op_form)
{
	$dir = 0;
	if($op == "awl" && $op_form == "wl_vyg" || $op == "awl" && $op_form == "wl_mea")
	{
		$name_link		= $_REQUEST['name_link'];
		$dir_link		= $_REQUEST['dir_link'];
		if($name_link != NULL and $dir_link != NULL)
		{
			$conecta = conecta_bd("videoexpress");
			$columna = "nombre, link, seccion";
			if($op_form == "wl_vyg") $seccion_link = "videosygarabatos";
			elseif($op_form == "wl_mea") $seccion_link = "ministeriosenasocio";
			$valores = "'".$name_link."', '".$dir_link."', '".$seccion_link."'";
			ing_datos_tabla("weblinks", $columna, $valores);
			$dir = 1;
		}
		else $dir = 2;
	}
	elseif($op == "apr" && $op_form == "aa_vyg")
	{
		$titulo_vyg = $_REQUEST['titulo_vyg'];
		$tema_vyg = $_REQUEST['tema_vyg'];
		$auditorio_vyg = $_REQUEST['auditorio_vyg'];
		$vx100_vyg = $_REQUEST["vx100_vyg"];
	    $vx500_vyg = $_REQUEST["vx500_vyg"];
        $vx1000_vyg = $_REQUEST["vx1000_vyg"];
	    $vx2000_vyg = $_REQUEST["vx2000_vyg"];
        $descripcion_vyg = $_REQUEST["descripcion_vyg"];
		if ($_POST["action"] == "upload")
		{
			// obtenemos los datos del archivo 
		   	$tamano = $_FILES["archivo_vyg"]['size'];
		   	$tipo = $_FILES["archivo_vyg"]['type'];
	    	$archivo = $_FILES["archivo_vyg"]['name'];
			
			if ((strpos($archivo, "swf") || strpos($archivo, "flv")))
			{
			   	if ($archivo != "")
				{
        	       	// guardamos el archivo a la carpeta files
					$archivo = cadena_sin_tildes($archivo);
					$destino =  "../videosygarabatos/";
					$destino .= $archivo;
	    	    	if(copy($_FILES['archivo_vyg']['tmp_name'],$destino)) $status = "ok";
					else $status = "Error al subir el archivo<br>";
				}
				else
				{
					$archivo = $_GET['archivo_vyg'];
		    	}
				if($titulo_vyg != NULL and $vx100_vyg != NULL and $vx500_vyg != NULL and $vx1000_vyg != NULL and $vx2000_vyg != NULL and $descripcion_vyg != NULL and $archivo != NULL)
				{
					$conecta = conecta_bd("videoexpress");
					$columna = "titulo, tema, auditorio, descripcion, Archivo, valorx100, valorx500, valorx1000, valorx2000";
					$valores = "'$titulo_vyg', '$tema_vyg', '$auditorio_vyg', '$descripcion_vyg', '$archivo', '$vx100_vyg', ";
					$valores .= "'$vx500_vyg', '$vx1000_vyg', '$vx2000_vyg'";
					ing_datos_tabla("videos_garabatos", $columna, $valores);
					$dir = 1;
				}
				else $dir = 2;
			}
			else $dir = 2;
		}
	}
	elseif($op == "apr" && $op_form == "aa_pr")
	{
		$titulo_pr = $_REQUEST['titulo_pr'];
        $descripcion_pr = $_REQUEST["descripcion_pr"];
		if ($_REQUEST["action"] == "upload")
		{
			// obtenemos los datos del archivo 
			$tamano1 = $_FILES["archivo_pr"]['size'];
			$tipo1 = $_FILES["archivo_pr"]['type'];
			$archivo1 = $_FILES["archivo_pr"]['name'];
			// obtenemos los datos de la imagen
			$tamano2 = $_FILES["imagen_pr"]['size'];
			$tipo2 = $_FILES["imagen_pr"]['type'];
			$archivo2 = $_FILES["imagen_pr"]['name'];

			$error = 0;
			if (!(strpos($archivo1, ".mp3") || strpos($archivo1, ".wma"))) $error += 1;
			else
			{
			   	if ($archivo1 != "")
				{
        	       	// guardamos el archivo a la carpeta files
					$archivo1 = cadena_sin_tildes($archivo1);
					$destino =  "../radio/mp3/";
					$destino .= $archivo1;
		        	if(copy($_FILES['archivo_pr']['tmp_name'],$destino))
						$status = "Archivo subido: <b>".$archivo1."</b><br>";
					else $status = "Error al subir el archivo<br>";
				}
				else
				{
					$archivo1 = $_GET['archivo_vyg'];
		    	}

			}

			if ($archivo2 != "")
			{
				if (!(strpos($archivo2, ".jpg") || strpos($archivo2, ".png") || strpos($archivo2, ".jpeg"))) $error += 1;
				else
				{
        	       	// guardamos el archivo a la carpeta files
					$archivo2 = cadena_sin_tildes($archivo2);
					$destino =  "../radio/covers/";
					$destino .= $archivo2;
	        		if(copy($_FILES['imagen_pr']['tmp_name'],$destino)) $status = "Archivo subido: <b>".$archivo2."</b><br>";
					else $status = "Error al subir el archivo<br>";
				}
			}
			else
			{
				$archivo2 = $_GET['imagen_pr'];
    		}
			if($titulo_pr != NULL and $descripcion_pr != NULL and $archivo1 != NULL and $error < 1)
			{
				$conecta = conecta_bd("videoexpress");
				$columna = "Nombre, Archivo, Imagen, Descripcion";
				$valores = "'".$titulo_pr."', '".$archivo1."', '".$archivo2."', '".$descripcion_pr."'";
				ing_datos_tabla("radio", $columna, $valores);
				$dir = 1;
			}
			else $dir = 2;
		}
		else $dir = 2;
	}
	elseif($op == "re" and $op_form == "irf")
	{
		$dia1 = $_REQUEST['dia1'];
		$dia2 = $_REQUEST['dia2'];
		$mes1 = $_REQUEST['mes1'];
		$mes2 = $_REQUEST['mes2'];
		$anio1 = $_REQUEST['anio1'];
		$anio2 = $_REQUEST['anio2'];
		if($anio1 > $anio2) $mj = 1;
		elseif($anio1 == $anio2)
		{
			if($mes1 > $mes2) $mj = 1;
			elseif($mes1 == $mes2)
			{
				if($dia1 > $dia2) $mj = 1;
				else $mj = 0;
			}
		}
		else $mj = 0;
		
		if($mj == 0) { $dir = 1; $inf = 0; $f1 = $anio1."-".$mes1."-".$dia1; $f2 = $anio2."-".$mes2."-".$dia2; }
		elseif($mj == 1) { $dir = 2; $inf = 1; }
	}
	
	if($dir == 1)
	{
		echo '<script languaje="Javascript">location.href="?op='.$op.'&op_form='.$op_form.'&msj=1&inf='.$inf.'&f1='.$f1.'&f2='.$f2.'"</script>';
	}
	if($dir == 2) echo '<script languaje="Javascript">location.href="?op='.$op.'&op_form='.$op_form.'&msj=2&inf='.$inf.'"</script>';
}

function cadena_sin_tildes($nombre)
{
	$cadena_buscar['á'] = "a";
	$cadena_buscar['é'] = "e";
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
	$st = strtr($nombre, $cadena_buscar);
	return preg_replace("/ /","-",$st);
}

//Funcion que totaliza la columna de una tabla
function total_columna($tabla, $datos, $opciones)
{
    $conecta = conecta_bd();
    $resultado = sel_dat_tabla($tabla, $datos, $opciones);
    $t = mysql_fetch_array($resultado);
    $total += $t[0];
    return $total;
    //desconecta_bd($conecta);
}

//Función que calcula el numero de días entre dos fechas
function calcular_dias_fecha($fecha1, $fecha2)
{
	//calculo timestam de las dos fechas
	$timestamp1 = mktime(0,0,0,$fecha1[1],$fecha1[0],$fecha1[2]);
	$timestamp2 = mktime(0,0,0,$fecha2[1],$fecha2[0],$fecha2[2]);
	//resto a una fecha la otra
	$segundos_diferencia = $timestamp1 - $timestamp2;

	//convierto segundos en días
	$dias_diferencia = $segundos_diferencia / 86400;
	
	return ceil($dias_diferencia);
}

//funcion que determina el tipo de menu a mostrar
function menu($op)
{
	switch($op)
	{
		case "lv":	$datos['tabla'] = "libro_visitas";
					$datos['columna'] = "pagina";
					mostrar_lista_menu($datos,$op);
					echo '<li><a href="?op=lv&op_form=vca">ver comenarios activos</a></li>';
					echo '<li><a href="?op=lv&op_form=vci">ver comentarios inactivos</a></li>';
					break;
		case "wl":	$datos['tabla'] = "weblinks";
					$datos['columna'] = "seccion";
					mostrar_lista_menu($datos,$op);
					break;
		case "pr":	echo '<li><a href="?op=pr&op_form=vt">ver tabla</a></li>';
					echo '<li><a href="?op=pr&op_form=vpra">ver programas activos</a></>';
					echo '<li><a href="?op=pr&op_form=vpri">ver programas inactivos</a></l>';
					break;
		case "vyg":	echo '<li><a href="?op=vyg&op_form=vt">ver tabla</a></li>';
					echo '<li><a href="?op=vyg&op_form=vpp">ver pedidos pendientes</a></li>';
					$datos['tabla'] = "videos_garabatos";
					$datos['columna'] = "Tema";
					echo "<li>Ver por tema</li><ul>";
					mostrar_lista_menu($datos,$op);
					echo "</ul><li>Ver por Auditorio</li><ul>";
					$datos['columna'] = "Auditorio";
					mostrar_lista_menu($datos,$op);
					break;
		case "awl": echo '<li><a href="?op=awl&op_form=wl_vyg">videos &amp; Garabatos</a></li>';
					echo '<li><a href="?op=awl&op_form=wl_mea">Ministerios en asocio</a></li>';
					break;
		case "apr": echo '<li><a href="?op=apr&op_form=aa_pr">radio</a></li>';
					echo '<li><a href="?op=apr&op_form=aa_vyg">Videos &amp; Garabatos</a></li>';
					break;
		case "re":	echo '<li>facturación</li>';
					echo '<li id="lianidadatop" class="anidada"><a href="?op=re&op_form=videx">videoexpress</a></li>';
					echo '<li class="anidada"><a href="?op=re&op_form=libro">libroexpress</a></li>';
					echo '<li class="anidada"><a href="?op=re&op_form=vyg">videos &amp; Garabatos</a></li>';
					echo '<li id="lianidadabtm" class="anidada"><a href="?op=re&op_form=irf">Informe en un rango de fecha</a></li>';
					echo '<li><a href="?op=re&op_form=gral">generales</a></li>';
					break;
		default:	$op = "lv";
					$datos['tabla'] = "libro_visitas";
					$datos['columna'] = "pagina";
					mostrar_lista_menu($datos,$op);
					echo '<li><a href="?op=lv&op_form=vca">ver comenarios activos</a></li>';
					echo '<li><a href="?op=lv&op_form=vci">ver comentarios inactivos</a></li>';
					break;
					break;
	}
}

//funcion que selecciona y muestra los menus necesarios
function mostrar_lista_menu($datos,$op)
{
	$columna = "DISTINCT ".$datos['columna'];
	$res = consulta_bd($datos['tabla'], "$columna", "-1;;;;");
	$num = 0;
	while ($row = mysql_fetch_object($res))
	{
		echo '<li><a href="?op='.$op.'&op_form='.$datos['columna']."/".$row->$datos['columna'].'">'.$row->$datos['columna']."</a></li>";
		$num++;
	}
	if($num < 1) echo "<li>No existen items</li>";
}

//función que carga los formularios según sea necesario
function formulario($op_form)
{
	switch($op_form)
	{
		case "wl_vyg":	weblinks("vyg");
						break;
		case "wl_mea":	weblinks("mea");
						break;
		case "aa_pr":	add_archivo("pr");
						break;
		case "aa_vyg":	add_archivo("vyg");
						break;
		case "irf":		form_irf("irf");
						break;
	}
}

//función que muestra el formulario de weblinks
function weblinks($op)
{
	$form = "link";
	if($op == "vyg") $nombre_form = "vyglink";
	elseif($op == "mea") $nombre_form = "mealink";
	include("form.php");
}

//función que muestra el formulario de archivo
function add_archivo($op)
{
	$form = "archivo";
	if($op == "pr") $nombre_form = "praa";
	elseif($op == "vyg") $nombre_form = "vygaa";
	include("form.php");
}

//función que muestra el formulario de informe de rango de fecha
function form_irf($op)
{
	$form = $op;
	$nombre_form = "irf";
	include("form.php");
}

//función que nos muestra los resultados de acuerdo a lo que vamos necesitando en el panel derecho de principal
function panel($op, $op_form, $o1, $o2, $reg_empezar, $pag)
{
	$reg_mostrar = 10;
	if($op == "lv")
	{
		if($op_form == "vca") paginacion("libro_visitas", $op, "5;$o1;$o2;activo='1';$reg_empezar/$reg_mostrar", $reg_empezar, $pag);
		elseif($op_form == "vci") paginacion("libro_visitas", $op, "5;$o1;$o2;activo='0';$reg_empezar/$reg_mostrar", $reg_empezar, $pag);
		else
		{
			$pagina = explode("/", $op_form);
			$col = $pagina[0]; $tem = $pagina[1];
			paginacion("libro_visitas", $op, "5;$o1;$o2;$col='$tem';$reg_empezar/$reg_mostrar", $reg_empezar, $pag);
		}
	}
	if($op == "wl")
	{
		$pagina = explode("/", $op_form);
		$col = $pagina[0]; $tem = $pagina[1];
		paginacion("weblinks", $op, "5;$o1;$o2;seccion='$tem';$reg_empezar/$reg_mostrar", $reg_empezar, $pag);
	}
	if($op == "pr")
	{
		if($op_form == "vt") paginacion("radio", $op, "6;$o1;$o2;;$reg_empezar/$reg_mostrar", $reg_empezar, $pag);
		elseif($op_form == "vpra") paginacion("radio", $op, "5;$o1;$o2;Activo='1';$reg_empezar/$reg_mostrar", $reg_empezar, $pag);
		elseif($op_form == "vpri") paginacion("radio", $op, "5;$o1;$o2;Activo='0';$reg_empezar/$reg_mostrar", $reg_empezar, $pag);
	}
	if($op == "vyg")
	{
		if($op_form == "vt") paginacion("videos_garabatos", $op, "6;$o1;$o2;;$reg_empezar/$reg_mostrar", $reg_empezar, $pag);
		elseif($op_form == "vpp") paginacion("videos_garabatos", $op, "6;$o1;$o2;;$reg_empezar/$reg_mostrar", $reg_empezar, $pag);
		elseif($op_form == "vpp") paginacion("videos_garabatos", $op, "6;$o1;$o2;;$reg_empezar/$reg_mostrar", $reg_empezar, $pag);
		else
		{
			$pagina = explode("/", $op_form);
			$col = $pagina[0]; $tem = $pagina[1];
			paginacion("videos_garabatos", $op, "5;$o1;$o2;$col='$tem';$reg_empezar/$reg_mostrar", $reg_empezar, $pag);
		}
	}
	if($op == "re")
	{
		if($op_form == "videx") paginacion("facturas", $op, "5;$o1;$o2;Pertenece_a='videx';$reg_empezar/$reg_mostrar", $reg_empezar, $pag);
		elseif($op_form == "libro") paginacion("facturas", $op, "5;$o1;$o2;Pertenece_a='libro';$reg_empezar/$reg_mostrar", $reg_empezar, $pag);
		elseif($op_form == "vyg") paginacion("facturas", $op, "5;$o1;$o2;Pertenece_a='vyg';$reg_empezar/$reg_mostrar", $reg_empezar, $pag);
		elseif($op_form == "irf") formulario($op_form);
		elseif($op_form == "gral")
		{
			echo "<strong>Reportes generales</strong><p>";
			echo "<ul><li>Total comentarios en los libros de visitas: <strong>";
			echo $t = dato_columna("libro_visitas", "COUNT(id_libro)", "-1;;;;;");
			echo '</strong></li><img src="imagenes/activar.png" width="16" height="16" align="absmiddle" /> Activos: <strong>';
			echo $t = dato_columna("libro_visitas", "COUNT(id_libro)", "1;;;activo='1';;");
			echo '</strong><br /><img src="imagenes/desactivar.png" width="16" height="16" align="absmiddle" /> Inactivos: </strong>';
			echo $t = dato_columna("libro_visitas", "COUNT(id_libro)", "1;;;activo='0';;");
			echo "</strong><li>Total links ingresados a la base de datos: <strong>";
			echo $t = dato_columna("weblinks", "COUNT(id_link)", "-1;;;;;");
			echo '</strong></li><img src="imagenes/activar.png" width="16" height="16" align="absmiddle" /> Activos: <strong>';
			echo $t = dato_columna("weblinks", "COUNT(id_link)", "1;;;activo='1';;");
			echo '</strong><br /><img src="imagenes/desactivar.png" width="16" height="16" align="absmiddle" /> Inactivos: <strong>';
			echo $t = dato_columna("weblinks", "COUNT(id_link)", "1;;;activo='0';;");
			echo "</strong><li>Total de programas de radio: <strong>";
			echo $t = dato_columna("radio", "COUNT(id_radio)", "-1;;;;;");
			echo '</strong></li><img src="imagenes/activar.png" width="16" height="16" align="absmiddle" /> Activos: <strong>';
			echo $t = dato_columna("radio", "COUNT(id_radio)", "1;;;activo='1';;");
			echo '</strong><br /><img src="imagenes/desactivar.png" width="16" height="16" align="absmiddle" /> Inactivos: <strong>';
			echo $t = dato_columna("radio", "COUNT(id_radio)", "1;;;activo='0';;");
			echo "</strong><li>Total plegables Videos &amp; Garabatos: <strong>";
			echo $t = dato_columna("videos_garabatos", "COUNT(id)", "-1;;;;;");
			echo "</strong></li><li>Total facturas: <strong>";
			echo $t = dato_columna("facturas", "COUNT(id_factura)", "-1;;;;;");
			echo "</strong></li>VideoExpress.org: <strong>";
			echo $t = dato_columna("facturas", "COUNT(id_factura)", "1;;;Pertenece_a='videx';;");
			echo '</strong><br />LibroExpress: <strong>';
			echo $t = dato_columna("facturas", "COUNT(id_factura)", "1;;;Pertenece_a='libro';;");
			echo '</strong><br />Videos &amp; Garabatos: <strong>';
			echo $t = dato_columna("facturas", "COUNT(id_factura)", "1;;;Pertenece_a='vyg';;");
			echo '</strong></ul>';
		}
	}
}

//funcion que pone el tipo de orden de una consulta sql
function ordenar($orden,$o1, $o2)
{
	if($orden == $o1)
	{
		if($o2 == "ASC") echo "DESC";
		else echo "ASC";
	}
	else echo "ASC";
}

//funcion que nos muestra la tabla del libro de visitas
function mostrar_tabla_lv($tabla, $datos, $opciones, $op, $op_form, $pag)
{
	$op_form = $_GET['op_form'];
    $conecta = conecta_bd("videoexpress");
    
    $query_columnas = mysql_query('SHOW COLUMNS FROM '.$tabla);
    $cantidad_de_campos = mysql_num_rows($query_columnas);
	if($datos != "*")
	{
		$dat = explode(",", $datos);
		$count = count($dat);
	}
	else $count = $cantidad_de_campos;
	$opciones1 = explode(";", $opciones);
	$o1 = $opciones1[1];
	$o2 = $opciones1[2];
	$url = explode("?", $_SERVER['REQUEST_URI']);
	if(strpos($url[1], "&o=") > 0)
	{
		$siz = explode("&", $url[1]);
		$sizeof = sizeof($siz);
		$sizeof -= 1;
		for($i=0; $i<$sizeof; $i++)
		{
			$url1 .= $siz[$i];
			$url1 .= "&";
		}
		$url = substr($url1,0,-1);
	}
	else $url = $url[1];

    echo "<center>";
    echo '<table width="100%" border="1" cellpading="0" cellspacing="0">'."\n";
    echo '<tr>'."\n";
    $i = 0;
    while(($row_columnas=mysql_fetch_assoc($query_columnas)) && ($i<$count))
    {
		if($row_columnas['Field'] == "comentario" || $row_columnas['Field'] == "pagina" || $row_columnas['Field'] == "Activo" || $row_columnas['Field'] == "link" || $row_columnas['Field'] == "seccion" || $row_columnas['Field'] == "Descripcion" || $row_columnas['Field'] == "Tema" || $row_columnas['Field'] == "Auditorio")
		{
			if($row_columnas['Field'] == "comentario") echo "<td width='220px' id='encabezado_tabla' align='center'>";
			else echo "<td id='encabezado_tabla' align='center'>";
			echo $row_columnas['Field']."</td>";
		}
		else
		{
			echo "<td id='encabezado_tabla' align='center'>";
			echo "<div id='link_orden'><a href='?".$url."&o=".$row_columnas['Field']."/";
			ordenar($row_columnas['Field'], $o1, $o2);
			echo "'>";
			echo $row_columnas['Field']."</a></div></td>";
		}
        $columna[$i] = $row_columnas['Field'];
        $i++;
    }
	if($op == "wl" || $op == "pr" || $op == "vyg")
	{
		echo '<td id="encabezado_tabla" align="center">Acci&oacute;n</td>';
	}
    echo "</tr>";
    
    $res = consulta_bd($tabla, $datos, $opciones);
    
    $i = 0;
    $colorfila = 0;

    while ($row = mysql_fetch_object($res))
    {
	    echo "<tr>";
        if ($colorfila==0)
        {
            $color = "#F3F8FB";
            $color1 = "#000";
            $colorfila = 1; 
        }
        else
        {
            $color = "#FFC";
            //A8CEFF
            $color1 = "#000";
            $colorfila = 0;
        }
        
        while($i < $count)
        {
			echo "<td style='background-color:$color; color:$color1; border-color: #FFF'>";
            if($columna[$i] == 'valoracion')
			{
				$star = $row->$columna[$i];
				for($s=1; $s<=$star; $s++) echo '<img src="imagenes/star.png" width="22" height="22" align="top" />';
				if($star < 5) for($s=$star+1; $s<=5; $s++) echo '<img src="imagenes/star_ina.png" width="22" height="22" align="top" />';
            }
			elseif($columna[$i] == 'Activo')
			{
				if($row->$columna[$i] == 0)
				{
					$activo = '<img src="imagenes/desactivar.png" width="16" height="16" align="top" border="0" />';
					$title = "Activar";
				}
				elseif($row->$columna[$i] == 1)
				{
					$activo = '<img src="imagenes/activar.png" width="16" height="16" align="top" border="0" />';
					$title = "desactivar";
				}
				if($op == "awl" || $op == "apr") echo $activo;
				else echo "<a title='".$title."' href='?op=$op&op_form=$op_form&acc=act&id=".$row->$columna[0]."&act=".$row->$columna[$i]."&pag=".$pag."'>$activo</a>";
			}
			elseif($columna[$i] == 'email' || $columna[$i] == "link" || $columna[$i] == 'Archivo' || $columna[$i] == "Imagen")
			{
				if($columna[$i] == "email")
				{
					$pagina = 'mail.php?em='.$row->$columna[0];
					$tamanio = "width:600 height:400px disableScroll:true scrolling:no";
					$class = "floatbox";
					$link = $row->$columna[$i];
				}
				elseif($columna[$i] == "link")
				{
					$pagina = 'http://www.'.$row->$columna[$i];
					$tamanio = "width:100% height:100% disableScroll:false scrolling:si";
					$class = "floatbox";;
					$link = $row->$columna[$i];
				}
				elseif($columna[$i] == "Archivo")
				{
					if($op == "pr" || $op == "apr")
					{
						$pagina = 'dewplayer-vol.swf?mp3=../radio/mp3/'.$row->$columna[$i];
						$tamanio = "width:235px height:20px disableScroll:false scrolling:si";
						$class = "floatbox";;
						$link = $row->$columna[$i];
					}
					elseif($op == "vyg")
					{
						$pagina = '../videosygarabatos/'.$row->$columna[$i];
						$tamanio = "width:70% height:50% disableScroll:false scrolling:si";
						$class = "floatbox";;
						$link = $row->$columna[$i];
					}
				}
				elseif($columna[$i] == "Imagen")
				{
					$pagina = '../radio/covers/'.$row->$columna[$i];
					$tamanio = "width:500px height:400px disableScroll:false scrolling:si";
					$class = "floatbox fbPopup";
					;
					$link = $row->$columna[$i].'<img src="../radio/covers/'.$row->$columna[$i].'" alt="" />';
				}
				echo '<a href="'.$pagina.'" class="'.$class.'" data-fb-options="';
				echo $tamanio.' language:es" border="0px">';
				echo $link.'</a>';
			}
			elseif($columna[$i] == "articulo")
			{
				if($row->$columna[$i-1] == "radio")
				{
					$id_radio = $row->$columna[$i];
					$npr = sel_items_form("radio", "Archivo", "1;;;id_radio='$id_radio'");
					$pagina = 'dewplayer-vol.swf?mp3=../radio/mp3/'.$npr[0];
					$tamanio = "width:235px height:20px disableScroll:false scrolling:si";
					$class = "floatbox";;
					$link = $row->$columna[$i];
				}
				else
				{
					$pagina = 'info_articulo.php?id_p='.$row->$columna[$i].'&aud='.$row->$columna[$i-1];
					$tamanio = "width:70% height:500px disableScroll:false scrolling:si";
					$class = "floatbox";;
					$link = $row->$columna[$i];
				}
				echo '<a href="'.$pagina.'" class="'.$class.'" data-fb-options="';
				echo $tamanio.' language:es" border="0px">';
				echo $link.'</a>';
			}
			elseif($columna[$i] == "valorx100" || $columna[$i] == "valorx500" || $columna[$i] == "valorx1000" || $columna[$i] == "valor>2000")
			{
				echo "$ ".number_format($row->$columna[$i], 0);
			}
			elseif($columna[$i] == "sexo")
			{
				if($row->$columna[$i] == 0) echo "F";
				elseif($row->$columna[$i] == 1) echo "M";
			}
            else
            {
                echo $row->$columna[$i];
            }
			echo "</td>";
            $i++;
			if($op == "wl" || $op == "pr" || $op == "vyg")
			{
				if($op == "wl")
				{
					if($row->seccion == "videosygarabatos") $op1 = "wl_vyg";
					else $op1 = "wl_mea";
					$form = "link";
				}
				elseif($op == "pr" || $op == "vyg")
				{
					$op1 = $op;
					$form = "archivo";
				}
				if($i == $cantidad_de_campos)
				{
					echo '<td style="background-color:$color; color:$color1; border-color: #FFF">';
					echo '<a title="Eliminar" href="del.php?id='.$row->$columna[0].'&op='.$op.'&op_form='.$op_form.'&pag='.$pag.'&n='.$row->$columna[1].'">';
					echo '<img src="imagenes/del.png" width="16" height="16" align="absmiddle" border="0" />';
					echo "</a>";
					$pagina = 'form_edit.php?id='.$row->$columna[0].'&op='.$op1.'&form='.$form;
					$tamanio = "width:70% height:70% disableScroll:false scrolling:si";
					$class = "floatbox";
					echo '<a href="'.$pagina.'" class="'.$class.'" data-fb-options="';
					echo $tamanio.' language:es" border="0px">';
					echo '<img src="imagenes/editar.png" width="16" height="16" align="absmiddle" border="0" alt="Editar" />';
					echo "</a>";
					echo "</td>";
				}
			}
        }
        $i = 0;
        echo "</tr>";
    }
    
    echo "</center></table>";
    
    mysql_free_result($res);
}

function accion($op, $op_form, $acc)
{
	if($acc == "act") { $id = $_REQUEST['id']; $act = $_REQUEST['act']; activar($op, $id, $act); }
	/*echo '<script languaje="Javascript">location.href="?op='.$op.'&op_form='.$op_form.'"</script>';*/
}

//funcion que activa o desactiva
function activar($op, $id, $act)
{
	if($act == 0) $act = 1;
	elseif($act = 1) $act = 0;
	$var = variables($op);
	$conecta = conecta_bd("videoexpress");
	act_datos_tabla($var['tabla'], "activo='$act'", $var['columna']."='$id'", 1);
	if($var['tabla'] == "radio") genera_xml_radio();
}

//funcion que activa o desactiva
function borrar($op, $id)
{
	echo "recibio las variables:<br>";
	echo "op = $op, id = $id<br>";
	$conecta = conecta_bd("videoexpress");
	$var = variables($op);
	$b = -1;
	if($op == 'pr')
	{
		$opc = "1;;;".$var['columna']."='$id';";
		$consulta = consulta_bd($var['tabla'], "Archivo, Imagen", $opc);
		while($a = mysql_fetch_object($consulta))
		{
			$archivo1 = $a->Archivo;
			$archivo2 = $a->Imagen;
		}
		$mp3 = "../radio/mp3/".$archivo1;
		if(unlink($mp3)) $b += 1;
		$img = "../radio/covers/".$archivo2;
		if(unlink($img)) $b += 1;
	}
	if($op == 'vyg')
	{
		$carpeta = "../radio/mp3";
		$opc = "1;;;".$var['columna']."='$id';";
		$consulta = consulta_bd($var['tabla'], "Archivo", $opc);
		while($a = mysql_fetch_object($consulta)) $archivo = $a->Archivo;
		$mp3 = "../videosygarabatos/".$archivo;
		if(unlink($mp3)) $b += 1;
	}
	elseif($op == 'wl') $b = 0;
	if($b >= 0)del_datos_tabla($var['tabla'], $var['columna']."='$id'");
}

function variables($op)
{
	switch($op)
	{
		case "lv":	$var['tabla'] = "libro_visitas";
					$var['columna'] = "id_libro";
					break;
		case "wl":	$var['tabla'] = "weblinks";
					$var['columna'] = "id_link";
					break;
		case "pr":	$var['tabla'] = "radio";
					$var['columna'] = "id_radio";
					break;
		case "vyg":	$var['tabla'] = "videos_garabatos";
					$var['columna'] = "id";
					break;
		default:	$var['tabla'] = "libro_visitas";
					$var['columna'] = "id_libro";
					break;
	}
	return $var;
}

//funcion que pone el tipo de orden de una consulta sql
function orden($op, $o)
{
	switch($op)
	{
		case "lv":	if($o == NULL) $o = "id_libro/DESC";
					break;
		case "wl":	if($o == NULL) $o = "id_link/ASC";
					break;
		case "pr":	if($o == NULL) $o = "id_radio/ASC";
					break;
		case "vyg":	if($o == NULL) $o = "id/ASC";
					break;
		case "awl":	if($o == NULL) $o = "id_link/ASC";
					break;
		case "apr":	if($o == NULL) $o = "id_radio/ASC";
					break;
		case "re":	if($o == NULL) $o = "id_factura/DESC";
					break;
		default:	if($o == NULL) $o = "id_libro/DESC";
					break;
	}
	$o = explode("/", $o);
	return $o;
}

function genera_xml_radio()
{
	$buffer = '<?xml version="1.0" encoding="utf-8"?>
	<playlist version="1" xmlns="http://xspf.org/ns/0/">
	<title>Ounage Playlist</title>
	<creator>Dew</creator>
	<link>http://www.blup.fr/</link>
	<info>The Best Playlist for Testing</info>
	<image>covers/tracklist.jpg</image>
	<trackList>';

	$conecta = conecta_bd("videoexpress");
	$Result = consulta_bd("radio", "*", "3;id_radio;ASC;Activo=1;");

	while ( $User = mysql_fetch_object( $Result ) )
	{
		$buffer .= "		<track>
			<location>mp3/".$User->Archivo."</location>
			<creator>".$User->Descripcion."</creator>
			<title>".$User->Nombre."</title>
			<image>covers/".$User->Imagen."</image>
			<tiempo>".$User->tiempo."</tiempo>
			<link>libro_visitas.php?art=".$User->id_radio."</link>
		</track>";
	}

	$buffer.="</trackList></playlist>";
	$file=fopen("../radio/playlist.xml","w+");
	fwrite ($file,$buffer);
	fclose($file);
	mysql_free_result($Result);
}

function paginacion($tabla, $op, $opciones, $reg_empezar, $pag)
{
	$reg_mostrar = 10;
	$opciones1 = explode(";", $opciones);
	if($opciones1[3] == "" || $opciones1[3] == NULL) $opciones1[0] = 2;
	else $opciones1[0] = 1;
	$opciones1 = implode(";", $opciones1);
	$total_resultados = dato_columna($tabla,"COUNT(*)",$opciones1);

	if ($total_resultados > 10)
	{
		$total_paginas = ceil($total_resultados / 10);
		
		$opc = explode(";", $opciones);

		if($pag > $total_paginas)
		{
			$pag = $total_paginas;
			$rm = explode("/", $opc[4]);
			$rm[0] = $reg_empezar - 10;
			$opc[4] = implode("/", $rm);
		}
		elseif($pag < 1)
		{
			$pag = 1;
			$opc[4] = "0/10";
		}

		$opciones = implode(";", $opc);

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
		$y = $total_resultados;
		$opc = explode(";", $opciones);
		$opc[4] = "0/10";
		$opciones = implode(";", $opc);
	}

	if($op == "re") mostrar_tabla_fc($tabla, "*", $opciones, $op, "irf", $pag);
	else mostrar_tabla_lv($tabla, "*", $opciones, $op, "", $pag);
	$url = explode("?", $_SERVER['REQUEST_URI']);
	$url = $url[1];

	echo '<p><table width="$tmp" border="0" cellpadding="0" cellspacing="2px" align="center"><tr>';
	
	$anterior = $pag - 1;
	$siguiente = $pag + 1;
	
	if(strpos($url, "ag=") > 0)
	{
		$c = explode("&", $url);
		$c = strlen($c[0]);
		$c++;
		$url = substr($url, $c);
	}

	if(strpos($url, "&pag=") > 0)
	{
		$siz = explode("&", $url);
		$sizeof = sizeof($siz);
		$sizeof -= 1;
		for($i=0; $i<$sizeof; $i++)
		{
			$url1 .= $siz[$i];
			$url1 .= "&";
		}
		$url = substr($url1,0,-1);
	}
	
	$img_ant = '<img src="imagenes/ant.png" width="45" height="25" border="0" />';
	$img_sig = '<img src="imagenes/sig.png" width="45" height="25" border="0" />';
	if ($anterior <= 0) $links['anterior'] = $img_ant;
	else $links['anterior'] = '<a href="?pag='.$anterior.'&amp;'.$url.'">'.$img_ant.'</a>';
	if ($siguiente > $total_paginas) $links['siguiente'] = $img_sig;
	else $links['siguiente'] = '<a href="?pag='.$siguiente.'&'.$url.'">'.$img_sig.'</a> ';
	
	echo '<td id="paginacion">'.$links['anterior'].'</td>';
	
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
		echo '<td id="pag_act" align="center"> 1 ';
		if($total_paginas > 2) echo '</td><td id="pag" align="center">...';
		echo "</td>";
	}
	else
	{
		echo '<td id="pag" align="center">';
		echo '<a href="?pag=1&amp;'.$url.'" border="0px">1</a>';
		if($total_paginas > 2) echo '</td><td id="pag" align="center">...';
		echo "</td>";
	}
	for ($i=$a; $i<$b; $i++)
	{
		if ($i == $pag) { echo '<td id="pag_act" align="center">'; echo "$i"; }
		else { echo '<td id="pag" align="center">'; echo '<a href="?pag='.$i.'&amp;'.$url.'" border="0px">'.$i.'</a>'; }
		echo "</td>";
	}
	if($pag == $total_paginas)
	{
		if($total_paginas != 1)
		{
			echo '<td id="pag" align="center">...</td>';
			echo '<td id="pag_act" align="center">';
			echo $total_paginas;
			echo "</td>";
		}
	}
	else
	{
		echo '<td id="pag" align="center">...</td><td id="pag" align="center">';
		echo '<a href="?pag='.$total_paginas.'&amp;'.$url.'" border="0px">'.$total_paginas.'</a>';
		echo "</td>";
	}
	echo '<td id="pag" align="center">'.$links['siguiente'].'</td>';
	
	if ($y != 0 and $x > 1) $t = $x + 1;
	elseif($total_resultados == 0) $t = 0;
	else $t = 1;
	echo "</tr></table><center>Resultados del $t al $y de un total de $total_resultados</center>";
}

//funcion que nos muestra la tabla del libro de visitas
function mostrar_tabla_fc($tabla, $datos, $opciones, $op, $op_form, $pag)
{
    $conecta = conecta_bd("videoexpress");
    
    $query_columnas = mysql_query('SHOW COLUMNS FROM '.$tabla);
    $cantidad_de_campos = mysql_num_rows($query_columnas);
	if($datos != "*")
	{
		$dat = explode(",", $datos);
		$count = count($dat);
	}
	else $count = $cantidad_de_campos;
	$opciones1 = explode(";", $opciones);
	$o1 = $opciones1[1];
	$o2 = $opciones1[2];
	$pa = $opciones1[3];
	$url = explode("?", $_SERVER['REQUEST_URI']);
	if(strpos($url[1], "&o=") > 0)
	{
		$siz = explode("&", $url[1]);
		$sizeof = sizeof($siz);
		$sizeof -= 1;
		for($i=0; $i<$sizeof; $i++)
		{
			$url1 .= $siz[$i];
			$url1 .= "&";
		}
		$url = substr($url1,0,-1);
	}
	else $url = $url[1];
	
    echo "<center>";
	echo '<div id="encabezado_tabla">Facturas ';
	if($pa == NULL) echo "Generales";
	else
	{
		$pa = explode("=", $pa);
		if($pa[1] == "'videx'") echo "Videoexpress";
		elseif($pa[1] == "'libro'") echo "Libroexpress";
		elseif($pa[1] == "vyg") echo "Videos &amp; Garabatos";
		else
		{
			$f1 = $_GET['f1'];
			$f2 = $_GET['f2'];
			echo "en el rango de fecha $f1 a $f2 ";
		}
	}
	echo "</div><br />";
    echo '<table width="100%" border="1" cellpading="0" cellspacing="0">'."\n";
    echo '<tr>'."\n";
    $i = 0;
	
	echo '<tr align="center" id="encabezado_tabla">
        <td width="1%" rowspan="2"><div id="link_orden"><a href="?'.$url.'&o=id_factura/';
		ordenar("id_factura", $o1, $o2);
	echo '">Id</a></div></td>
        <td rowspan="2" width="12%">Datos Comprador</td>
        <td colspan="3">Art&iacute;culos del pedido</td>
        <td colspan="2">Valor total Factura</td>
        <td rowspan="2" width="9%">Fecha cancelaci&oacute;n</td>
        <td rowspan="2" width="9%">Fecha de emisi&oacute;n</td>';
	if($pa[1] == NULL) echo '<td rowspan="2" width="9%">Pertenece a</td>';
    echo '</tr>
      <tr align="center" id="encabezado_tabla">
       <td width="5%">Tipo</td>
       <td width="29%">T&iacute;tulo</td>
       <td width="9%">Cantidades</td>
       <td width="7%">Unitario</td>
       <td width="5%">Total</td>
      </tr>';
	
    $res = consulta_bd($tabla, $datos, $opciones);
    
    $i = 0;
    $colorfila = 0;
    echo "<tr>";
	while ($row = mysql_fetch_object($res))
    {
	    if ($colorfila==0)
        {
            $color = "#F3F8FB";
            $color1 = "#000";
            $colorfila = 1; 
        }
        else
        {
            $color = "#FFC";
            //A8CEFF
            $color1 = "#000";
            $colorfila = 0;
        }
		
		$estilo_celda = "valign='top' style='text-align:justify; background-color:$color; color:$color1'";

		echo "<tr $estilo_celda>";
		//id
		$id = $row->id_factura;
		echo "<td align=\"center\">$id</td>";
		//id comprador
		$id_comprador = $row->id_comprador;
		$sizeof = substr_count($id_comprador,'-');
		if ($sizeof > 0)
		{
			$existe = "1";
		}
		else
		{
			$existe = "0";
		}
		echo "<td align=\"center\"><span id='menu_admon2'>";
		echo '<a href="datos_usuario.php?id='.$id_comprador.'&e='.$existe.'" class="floatbox" data-fb-options="';
		echo 'width:90% height:80% disableScroll:false scrolling:si language:es" border="0px">';
		echo $id_comprador;
		echo "</a>";
		echo "</span></td>";
		//tipo
		$tipo = explode('+',$row->tipo);
		$sizeof = sizeof($tipo);
		$sizeof--;
		echo "<td>";
		for ($i=0; $i<$sizeof; $i++) echo $tipo[$i]."<br />";
		echo "</td>";
		//articulos
		$articulos = explode('+',$row->articulos);
		$peliculas = implode(',',$articulos);
		$sizeof = sizeof($articulos);
		$sizeof--;
		echo "<td>";
		for ($i=0; $i<$sizeof; $i++) echo $articulos[$i]."<br />";
		echo "</td>";
		//cantidades
		$cantidades = explode('+',$row->cantidades);
		$sizeof = sizeof($cantidades);
		$sizeof--;
		echo "<td align=\"center\">";
		for ($i=0; $i<$sizeof; $i++) echo $cantidades[$i]."<br />";
		echo "</td>";
		//precios unitarios
		$precios_unitarios = explode('+',$row->precios_unitarios);
		$sizeof = sizeof($precios_unitarios);
		$sizeof--;
		echo "<td align=\"center\">";
		for ($i=0; $i<$sizeof; $i++)
		{
			echo number_format($precios_unitarios[$i])."<br />";
			$subto[$i] = $cantidades[$i] * $precios_unitarios[$i];
		}
		echo "<span id=\"encabezado_tablas\">Total</span></td>";
		//precio
		$precio = $row->precio;
		echo "<td align=\"center\">";
		//$sizeof = sizeof($subto);
		for ($i=0; $i<$sizeof; $i++) echo number_format($subto[$i])."<br />";
		echo "<span id=\"encabezado_tablas\">".number_format($precio)."</span></td>";
		//fecha de cancelada
		$fecha_cancelada = $row->fecha_cancelada." ".$row->fecha_cancelada_hora;
		echo "<td>$fecha_cancelada</td>";
		//fecha de emisiÃ³n
		$fecha_emision = $row->fecha_emision;		
		echo "<td>$fecha_emision</td>";
		if($pa[1] == NULL)
		{
			$pertenecea = $row->Pertenece_a;
			echo "<td>$pertenecea</td>";
		}
		echo "</tr>";
	}

    echo "</table>";
    
    mysql_free_result($res);
}
?>
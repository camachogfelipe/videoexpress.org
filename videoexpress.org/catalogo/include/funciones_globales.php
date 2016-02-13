<?php
//funcion que nos permite conectarnos a la BD
function conecta_bd($bd)
{
    // Configura los datos de tu cuenta
    $dbhost='localhost';
    $dbusername='root';
    $dbuserpass='camachitos';
    if($bd == "videoexpress") $dbname='C274400_catalogo';
    elseif($bd == "libroexpress") $dbname='C274400_libroexpress';

    //nos conectamos a la base de datos
    mysql_connect ("$dbhost", "$dbusername", "$dbuserpass");
    mysql_select_db("$dbname") or die("Cannot select database");
    
    return $dbname;
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
		//echo $sql."<br>";
		$resultado = mysql_query($sql) or die("La siguiente consulta contiene alg&uacute;n error:<br><b>$sql</b>");
	}
	return $resultado;
}

//Funcion que saca un dato de una columna de una tabla: sum, count, etc
function dato_columna($tabla, $datos, $opciones)
{
    $resultado = consulta_bd($tabla, $datos, $opciones);
    $t = mysql_fetch_array($resultado);
    $total += $t[0];
    return $total;
}

//Funcion que muestra el resultado de una tabla dada
function mostrar_tablas($tabla, $datos, $opciones)
{
    $conecta = conecta_bd("videoexpress");
    
    $query_columnas = mysql_query('SHOW COLUMNS FROM '.$tabla);
    $cantidad_de_campos = mysql_num_rows($query_columnas);
    
    echo "<center>";
    echo '<table width="100%" border="1" cellpading="0" cellspacing="0">'."\n";
    echo '<tr>'."\n";
    $i = 0;
    while($row_columnas=mysql_fetch_assoc($query_columnas))
    {
        echo "<td id='encabezado_tabla' align='center'>".$row_columnas['Field']."</td>";
        $columna[$i] = $row_columnas['Field'];
        $i++;
    }
    echo "</tr>";
    
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
            $color = "#DDEEFF";
            //A8CEFF
            $color1 = "#000";
            $colorfila = 0;
        }
        
        while($i < $cantidad_de_campos)
        {
            if($columna[$i] == 'Valor' || $columna[$i] == 'Abonos' || $columna[$i] == 'Saldo'){
                echo "<td style='background-color:$color; color:$color1; border-color: #FFF'>$ ".number_format($row->$columna[$i])."</td>";
            }
            else
            {
                echo "<td style='background-color:$color; color:$color1; border-color: #FFF'>".$row->$columna[$i]."</td>";
            }
            $i++;
        }
        $i = 0;
        echo "</tr>";
    }
    
    echo "</center></table>";
    
    mysql_free_result($res);
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
	echo $query;
    mysql_query($query) or die(mysql_error());
}

//funcion para eliminar datos de una tabla sql
function del_datos_tabla($tabla, $concepto)
{
	$conecta = conecta_bd("videoexpress");
    $query = "DELETE FROM $tabla WHERE $concepto";
    mysql_query($query) or die(mysql_error());
}

//Funcion de muestra de fecha
function fecha()
{
    $dia = date(w);
    $mes = date(n);

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

    switch ($mes)
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
    
    return $fecha = "$dia, $num_dia de $mes de $anio"; 
}

//Funcion que nos desconecta de la BD
function desconecta_bd($bd)
{
    mysql_close($bd);
}

//funcion que selecciona los datos de una tabla
function sel_items_form($tabla,$datos,$opciones)
{
    conecta_bd("videoexpress");    
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
		unset($_SESSION['codigo_cliente']);
		unset($_SESSION['usuario_afiliado']);
		unset($_SESSION['email']);
		unset($_SESSION['telefono']);
		unset($_SESSION['celular']);
		unset($_SESSION['direccion']);
		unset($_SESSION['ultimo_alquiler']);
		unset($_SESSION['pel_alq']);
		unset($_SESSION['suma']);
		unset($_SESSION['tot_pel']);
		unset($_SESSION['carro']);
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
	$cadena_buscar['á'] = "&aacute;";
	$cadena_buscar['é'] = "&eacute;";
	$cadena_buscar['í'] = "&iacute;";
	$cadena_buscar['ó'] = "&oacute;";
	$cadena_buscar['ú'] = "&uacute;";
	$cadena_buscar['ñ'] = "&ntilde;";
	$cadena_buscar['Á'] = "&Aacute;";
	$cadena_buscar['É'] = "&Eacute;";
	$cadena_buscar['Í'] = "&Iacute;";
	$cadena_buscar['Ó'] = "&Oacute;";
	$cadena_buscar['Ú'] = "&Uacute;";
	$cadena_buscar['Ñ'] = "&Ntilde;";
	
	return $texto = strtr($tex, $cadena_buscar);
}
?>
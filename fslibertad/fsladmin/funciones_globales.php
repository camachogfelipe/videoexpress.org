<?php
//funcion que nos permite conectarnos a la BD
function conecta_bd()
{
    // Configura los datos de tu cuenta
    $dbhost='localhost';
    $dbusername='root';
    $dbuserpass='camachitos';
    $dbname='C274400_fslibertad';

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
    mysql_query($query) or die(mysql_error());
}

//funcion para eliminar datos de una tabla sql
function del_datos_tabla($tabla, $concepto)
{
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
    conecta_bd();    
    $res = consulta_bd($tabla,$datos, $opciones);
    $i = 0;
    while ($row = mysql_fetch_object($res))
    {
            $res1[$i] = $row->$datos;
            $i++;
    }
    return $res1;
}

/*editar y actualizar*/
function salir($salir)
{
	if($salir == true)
	{
		unset($_SESSION['fsluser']);
		unset($_SESSION['nombre']);
		unset($_SESSION['creado']);
		unset($_SESSION['ingreso']);
		session_destroy();
		header("Location: ../");
	}
	else header("Location: ../fsladmin");
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
	$cadena_buscar['¿'] = "&iquest;";
	$cadena_buscar['¡'] = "&iexcl;";
	
	return $texto = strtr($tex, $cadena_buscar);
}
?>
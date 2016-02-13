<?php
//funcion que grafica la recompra de un año
function recompra($an, $year)
{
	$conecta = conecta_bd("videoexpress");
	$result = consulta_bd("recompra","id, item, $an","4;;;;6/3");

	$i = 0;

	while ($row = mysql_fetch_object($result))
	{
		$id[$i] = $row->id;
		$item[$i] = $row->item;
		$anio[$i] = $row->$an;
		$i++;
	}

	if($anio[0] != NULL and $anio[2] != 0)
	{
		if($anio[2] != 0 and $anio[1] != 0)
		{
			$x = ($anio[0]*100)/$anio[2];
			$y = ($anio[1]*100)/$anio[2];
		}
		else
		{
			$x = $y = 0;
		}

		$x = number_format($x,2);
		$y = number_format($y,2);
		for($a=0; $a<$i; $a++)
		{
			echo utf8_encode($item[$a]).": <strong>".number_format($anio[$a])."</strong>";
			if($a < 2) echo ", ";
		}
		
		//Generación de gráfica
		if($year == date(Y)) :
			require_once ("jpgraph-3.5.0b1/src/jpgraph.php");
			require_once ("jpgraph-3.5.0b1/src/jpgraph_pie.php");
			require_once ("jpgraph-3.5.0b1/src/jpgraph_pie3d.php");
			unset($graph);
			$graph = new PieGraph(400,200);
			//echo "Generando sombras";
			$graph->SetShadow();
			//echo "Generando título del año $year";
			$graph->title->Set("Re-compra: $year");
			$graph->title->SetFont(FF_FONT1,FS_BOLD);
			//secho "Generando valores";
			$legends = array($x, $y);
			$p1 = new PiePlot3D($legends);
			$p1->SetSize(0.4);
			$p1->SetCenter(0.3);
			//echo "Generando legendas";
			$legends = array("Una Vez (".$x."&#37;)", utf8_decode("Más de una vez (".$y."&#37;)"));
			$p1->SetLegends($legends);
			//$p1->ExplodeAll(10);
			$p1->SetLabelPos(0.9);
			$p1->ExplodeAll( 10 );
			//$p1->SetTheme("water");
			
			$graph->Add($p1);
			$graph->legend->SetShadow('gray@0.4',5);
			$graph->legend->SetPos(0.1,0.7,'right','top');
			$graph->legend->SetColumns(1);
			$graph->Stroke(_IMG_HANDLER);
		
			// Stroke image to a file and browser
			// Default is PNG so use ".png" as suffix
			$fileName = "graficas/recompra_$an.png";
			$graph->img->Stream($fileName);
		endif;
		//
		
		
		/*include "lib_graficas/libchart/classes/libchart.php";

		$chart = new PieChart(400, 200);

		$dataSet = new XYDataSet();
		$dataSet->addPoint(new Point("Una Vez ($x%)", $x));
		$dataSet->addPoint(new Point(utf8_decode("Más de una vez ($y%)"), $y));
		$chart->setDataSet($dataSet);

		$chart->setTitle("Re-compra año: $year");
		$chart->render("graficas/recompra_$an.png");*/

		echo "<center><img src=\"graficas/recompra_$an.png\"></center>";
	}
	else
	{
		echo "$year: A&uacute;n no se ha consolidado este a&ntilde;o";
	}
}

//funcion que agrega una columna a la tabla
function agregar_columna($tabla, $columna, $t_columna, $despues_de)
{
	$conecta = conecta_bd("videoexpress");
	$sql = "ALTER TABLE $tabla ADD COLUMN $columna $t_columna AFTER $despues_de";
	$result = mysql_query($sql) or die("La siguiente consulta contiene alg&uacute;n error:<br>nSQL: <b>$sql</b>");
	echo "La columna ".$columna." se ha creado con exito en la tabla ".$tabla.", despues de ".$despues_de." con tipo ".$t_columna;
	//insertamos los datos del año consolidado
	$query = act_datos_tabla("ingresos_y_capital","$columna='0'","id='1'",1);
	$query = act_datos_tabla("ingresos_y_capital","$columna='0'","id='2'",1);
	$query = act_datos_tabla("ingresos_y_capital","$columna='0'","id='3'",1);
	$query = act_datos_tabla("ingresos_y_capital","$columna='0'","id='4'",1);
	$query = act_datos_tabla("ingresos_y_capital","$columna='0'","id='5'",1);
	$query = act_datos_tabla("ingresos_y_capital","$columna='0'","id='6'",1);
	$query = act_datos_tabla("ingresos_y_capital","$columna='0'","id='7'",1);
	$query = act_datos_tabla("ingresos_y_capital","$columna='0'","id='8'",1);
}

//funcion que verifica si una columna de una tabla existe
function verificar_columna($nombre_columna, $tabla)
{
	$existe = false;
	$qry=mysql_query("select * from $tabla"); 
	$campos = mysql_num_fields($qry);
	$i=0; 
	while($i<$campos)
	{
		if($nombre_columna == mysql_field_name ($qry, $i))
		{
			$existe = true;
		}
		$i++;
	}
	return $existe;
}

//funcion que consolida el año en la recompra
function consolidar_anio_recompra($year)
{
	$conecta = conecta_bd("videoexpress");
	$total_ventas=$total_auditorio=$total_una_vez=$total_mas_una_vez=$total_envios=$prom_por_envio=$prom_gente_por_envio=0;
	
	$total_ventas = dato_columna("facturas","SUM(precio)","1;;;fecha_cancelada_anio='$year';");
	$sql = "SELECT		SUM(info_peliculas.auditorio_no) AS auditorio_no 
			FROM		info_peliculas 
			INNER JOIN	facturas ON facturas.id_factura=info_peliculas.id_factura AND facturas.Pertenece_a='videx' 
						AND facturas.fecha_cancelada_anio='".$year."'";
	$resultado = mysql_query($sql);
	$t = mysql_fetch_array($resultado);
    $total_auditorio = $t[0];
	//$total_auditorio = dato_columna("info_peliculas","SUM(auditorio_no)","1;;;anio='$year';");
	$sql = "SELECT		COUNT(*) 
			FROM		info_fac_videx 
			INNER JOIN	facturas ON facturas.id_factura=info_fac_videx.id_factura AND facturas.Pertenece_a='videx' 
						AND facturas.fecha_cancelada_anio='".$year."' 
			WHERE		info_fac_videx.recompra='no'";
	$resultado = mysql_query($sql);
	$t = mysql_fetch_array($resultado);
	$total_una_vez = $t[0];
	//$total_una_vez = dato_columna("info_fac_videx","COUNT(*)","1;;;recompra='no' and anio='$year';");
	$sql = "SELECT		COUNT(*) 
			FROM		info_fac_videx 
			INNER JOIN	facturas ON facturas.id_factura=info_fac_videx.id_factura AND facturas.Pertenece_a='videx' 
						AND facturas.fecha_cancelada_anio='".$year."' 
			WHERE		info_fac_videx.recompra='si'";
	$resultado = mysql_query($sql);
	$t = mysql_fetch_array($resultado);
	$total_mas_una_vez = $t[0];
	//$total_mas_una_vez = dato_columna("info_fac_videx","COUNT(*)","1;;;recompra='si' and anio='$year';");
	$total_envios = $total_una_vez + $total_mas_una_vez;
	$prom_por_envio = $total_ventas / $total_envios;
	$prom_gente_por_envio = $total_auditorio / $total_envios;
	//actualizamos la tabla
	//promedio por envio
	$datos = array("","$prom_por_envio","$total_envios","$total_mas_una_vez","$total_ventas","$total_auditorio","$prom_gente_por_envio","$total_una_vez","$total_mas_una_vez","$total_envios");
	for($i=1;$i<=9;$i++) {
		$query = act_datos_tabla("recompra","anio_$year='$datos[$i]'","id='$i'",1);
	}
}

//funcion que consolida el mes de un año en sus ventas
function consolidar_mes($year, $mes)
{
	$conecta = conecta_bd("videoexpress");
	$total_mes = $total_una_vez = $total_mas_una_vez = 0;	
	$total_mes = dato_columna("facturas","sum(precio)","1;;;fecha_cancelada_mes='$mes' and fecha_cancelada_anio='$year';");
	if($mes == "01") $mes = "enero";
	if($mes == "02") $mes = "febrero";
	if($mes == "03") $mes = "marzo";
	if($mes == "04") $mes = "abril";
	if($mes == "05") $mes = "mayo";
	if($mes == "06") $mes = "junio";
	if($mes == "07") $mes = "julio";
	if($mes == "08") $mes = "agosto";
	if($mes == "09") $mes = "septiembre";
	if($mes == "10") $mes = "octubre";
	if($mes == "11") $mes = "noviembre";
	if($mes == "12") $mes = "diciembre";
	//ventas del mes
	$query = act_datos_tabla("anio_por_anio","$mes='$total_mes'","anio='$year'",1);
	$total_una_vez = dato_columna("info_fac_videx","COUNT(*)","1;;;recompra='no' and anio='$year'");
	$total_mas_una_vez = dato_columna("info_fac_videx","COUNT(*)","1;;;recompra='si' and anio='$year'");
	$total_envios = $total_una_vez + $total_mas_una_vez;
	$query = act_datos_tabla("anio_por_anio","servicios_atendidos='$total_envios'","anio='$year'",1);
	$promedio_anio = promedio_anio($year);

	//sacamos el promedio del año anterior
	$anio_anterior = $year - 1;
	$result = consulta_bd("anio_por_anio","promedio_mes, servicios_atendidos","1;;;anio='$anio_anterior'");
	
	while ($row = mysql_fetch_object($result))
	{
		$prom_anio_anterior = $row->promedio_mes;
		$total_servicios_anterior = $row->servicios_atendidos;
	}
	
	if($prom_anio_anterior != 0) $promedio_ventas = ($promedio_anio*100) / $prom_anio_anterior;
	$crecimiento = ($total_envios*100) / $total_servicios_anterior;
	
	//promedio del año
	$query = act_datos_tabla("anio_por_anio","promedio_mes='$promedio_anio'","anio='$year'",1);
	//ventas con respecto al año anterior
	$query = act_datos_tabla("anio_por_anio","porcentaje_ventas_anio_anterior='$promedio_ventas'","anio='$year'",1);
	//total servicios del año
	//crecimiento
	$query = act_datos_tabla("anio_por_anio","crecimiento='$crecimiento'","anio='$year'",1);
}

//funcion que promedio las ventas de un año
function promedio_anio($year)
{
	$conecta = conecta_bd("videoexpress");
	$total = 0;
	$result = consulta_bd("anio_por_anio","*","1;;;anio='$year'");
	
	$mes = array("enero","febrero","marzo","abril","mayo","junio","julio","agosto","septiembre","octubre","noviembre","diciembre");

	while ($row = mysql_fetch_object($result))
	{
		for($a=0; $a<12; $a++) $promedio += $row->$mes[$a];
	}
	$total = $promedio / 12;
	return $total;
}

//funcion que calcula los dias entre dos fechas
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

//funcion que calcula el promedio diario de dinero
function promedio_ventas($capital, $dias_diferencia)
{
	$total = 0;
	$total = $capital / $dias_diferencia;
	return $total;
}

//funcion que calcula los domingos
function domingos()
{
	$fecha1[0] = 3; $fecha1[1] = 3; $fecha1[2] = 2003;
	$fecha2[0] = date("d"); $fecha2[1] = date("m"); $fecha2[2] = date("Y");
	
	$dias_diferencia = calcular_dias_fecha($fecha2, $fecha1);
	
	$total = round($dias_diferencia / 7);
	
	return $total;
}

//funcion que suma n dias a una fecha
function suma_dias($ndias)
{
	$dia = date(d);
	$mes = date(m);
	$ano = date(Y);
	$nuevafecha = date("d-M-Y", mktime(0, 0, 0, $mes, $dia+$ndias, $ano));
	return $nuevafecha;
}

//funcion que calcula los dias que faltan para llegar a uno determinado
function dias_faltan()
{
	$conecta = conecta_bd("videoexpress");
	$result = consulta_bd("actualizacion","dia_celebrar","-1;;;;");
	
	while ($row = mysql_fetch_object($result))
	{
		$dia_celebrar = $row->dia_celebrar;
	}

	$result = consulta_bd("ingresos_y_capital","total","1;;;id='5'");
	
	while ($row = mysql_fetch_object($result))
	{
		$dias_trabajados = $row->total;
	}
	
	$total = $dia_celebrar - $dias_trabajados;
	
	return $total;
}

//funcion que calcula ingresos y capital
function ingresos_y_capital()
{
	$conecta = conecta_bd("videoexpress");
	//calculamos el total de ventas hasta la fecha
	$anio = date(Y);
	$columna = "anio_".$anio;
	$t_columna = "VARCHAR(250) COLLATE latin1_spanish_ci NOT NULL";
	$anio--;
	$despues_de = "anio_".$anio;
	$existe = verificar_columna($columna, "ingresos_y_capital");
	$year = date(Y);
	$dia = date(d);
	$mes = date(m);
	if($existe == false)
	{
		agregar_columna("ingresos_y_capital", $columna, $t_columna, $despues_de);
		$year--;
		$fac = dato_columna("facturas","MAX(id_factura)","1;;;fecha_cancelada_anio='$year'");
		$dia = dato_columna("facturas","fecha_cancelada_dia","1;;;id_factura='$fac'");
		$mes = dato_columna("facturas","fecha_cancelada_mes","1;;;id_factura='$fac'");
	}
	$result_sf = consulta_bd("ingresos_y_capital","*","1;;;id='3'");
	$fechar = "anio_".$year;
	while ($row = mysql_fetch_object($result_sf))
	{
		$fecha_x = $row->$fechar;
	}
	echo $fecha_x;
	if($fecha_x != 0)
	{
		$total_ventas = dato_columna("facturas","SUM(precio)","1;;;fecha_cancelada_anio='$year' and Pertenece_a='videx'");
		$fecha_y = explode("-",$fecha_x);
		//calculamos los dias trabajados hasta la fecha
		$fecha1[0] = $fecha_y[0]; $fecha1[1] = $fecha_y[1]; $fecha1[2] = $fecha_y[2];
		$fecha2[0] = $dia; $fecha2[1] = $mes; $fecha2[2] = $year;
		$fecha3 = "$fecha2[0]-$fecha2[1]-$fecha2[2]";
		$dias_trabajados = calcular_dias_fecha($fecha2, $fecha1);

		//calculamos el promedio de ventas
		if($total_ventas != 0) $promedio_diario_ventas = promedio_ventas($total_ventas, $dias_trabajados);
		else $promedio_diario_ventas = 0;

		//calculamos el total de envios
		$total_una_vez = dato_columna("info_fac_videx","COUNT(*)","1;;;recompra='no' and anio='$year'");
		$total_mas_una_vez = dato_columna("info_fac_videx","COUNT(*)","1;;;recompra='si' and anio='$year'");
		$total_envios = $total_una_vez + $total_mas_una_vez;

		//calculamos el total del capital
		$result = consulta_bd("ingresos_y_capital","*","1;;;id='7'");

		$capital = 0;
		while ($row = mysql_fetch_object($result))
		{
			$fechar2 = "anio_".$fechar;
			$capital_anio = $row->$fechar2;
		}

		$capitalanio = $total_ventas + $capital_anio;
		if($capitalanio != 0) $promedio_diario_capital = promedio_ventas($capitalanio, $dias_trabajados);
		else $promedio_diario_capital = 0;
		
		//insertamos los datos del año consolidado
		$query = act_datos_tabla("ingresos_y_capital","anio_$year='$total_envios'","id='1'",1);
		$query = act_datos_tabla("ingresos_y_capital","anio_$year='$total_ventas'","id='2'",1);
		$query = act_datos_tabla("ingresos_y_capital","anio_$year='$fecha3'","id='4'",1);
		$query = act_datos_tabla("ingresos_y_capital","anio_$year='$dias_trabajados'","id='5'",1);
		$query = act_datos_tabla("ingresos_y_capital","anio_$year='$promedio_diario_ventas'","id='6'",1);
		$query = act_datos_tabla("ingresos_y_capital","anio_$year='$promedio_diario_capital'","id='8'",1);
	}
	else
	{
		$y = date(Y);
		$fac = dato_columna("facturas","MIN(id_factura)","1;;;fecha_cancelada_anio='$y' AND Pertenece_a='videx'");
		//$fac = dato_columna("facturas","MAX(id_factura)","1;;;fecha_cancelada_anio='$y'");
		$dia = dato_columna("facturas","fecha_cancelada_dia","1;;;id_factura='$fac'");
		$mes = dato_columna("facturas","fecha_cancelada_mes","1;;;id_factura='$fac'");
		$fecha3 = $dia."-".$mes."-".$y;
		$query = act_datos_tabla("ingresos_y_capital","anio_$year='$fecha3'","id='3'",1);
	}
	
	$year = date(Y);
	
	//calculamos el total de envios
	$result = consulta_bd("ingresos_y_capital","*","1;;;id='1'");
	$envios = $ingresos = $total_dias_trabajados = $capital = 0;
	while ($row = mysql_fetch_object($result))
	{
		for($fechar=2003; $fechar<=$year; $fechar++)
		{
			$fechar2 = "anio_".$fechar;
			$envios += $row->$fechar2;
		}
	}
	
	//calculamos el total del ingreso
	$result = consulta_bd("ingresos_y_capital","*","1;;;id='2'");
	while ($row = mysql_fetch_object($result))
	{
		for($fechar=2003; $fechar<=$year; $fechar++)
		{
			$fechar2 = "anio_".$fechar;
			$ingresos += $row->$fechar2;
		}
	}

	//calculamos los dias trabajados en total - los domingos
	$result = consulta_bd("ingresos_y_capital","*","1;;;id='5'");
	while ($row = mysql_fetch_object($result))
	{
		for($fechar=2003; $fechar<=$year; $fechar++)
		{
			$fechar2 = "anio_".$fechar;
			$total_dias_trabajados += $row->$fechar2;
		}
	}

	//calculamos el total del capital
	$result = consulta_bd("ingresos_y_capital","*","1;;;id='7'");
	while ($row = mysql_fetch_object($result))
	{
		for($fechar=2003; $fechar<=$year; $fechar++)
		{
			$fechar2 = "anio_".$fechar;
			$capital += $row->$fechar2;
		}
	}

	if($capital != 0) $promedio_diario_capital = promedio_ventas($capital, $total_dias_trabajados);
	else $promedio_diario_capital = 0;

	//calculamos el promedio total de ventas
	$promedio_diario_ventas_total = promedio_ventas($ingresos, $total_dias_trabajados);
	
	//calculamos el promedio del capital
	$total_capital = $ingresos + $capital;
	$promedio_diario_capital_total = promedio_ventas($total_capital, $total_dias_trabajados);
	
	//insertamos los datos hasta el año actual
	$query = act_datos_tabla("ingresos_y_capital","total='$envios'","id='1'",1);
	$query = act_datos_tabla("ingresos_y_capital","total='$ingresos'","id='2'",1);
	$query = act_datos_tabla("ingresos_y_capital","total='$fecha3'","id='4'",1);
	$query = act_datos_tabla("ingresos_y_capital","total='$total_dias_trabajados'","id='5'",1);
	$query = act_datos_tabla("ingresos_y_capital","total='$promedio_diario_ventas_total'","id='6'",1);
	$query = act_datos_tabla("ingresos_y_capital","total='$capital'","id='7'",1);
	$query = act_datos_tabla("ingresos_y_capital","total='$promedio_diario_capital_total'","id='8'",1);
}

//graficas año por año
function graf_anio_por_anio($ani, $ene, $feb, $mar, $abr, $may, $jun, $jul, $ago, $sep, $oct, $nov, $dic)
{
	include "lib_graficas/libchart/classes/libchart.php";

	$sizeof = sizeof($ani);
	
	$chart = new LineChart(1100, 300);
	
	for($a=0; $a<$sizeof; $a++)
	{
		$serie[$a] = new XYDataSet();
		$serie[$a]->addPoint(new Point("Enero", $ene[$a]));
		$serie[$a]->addPoint(new Point("Febrero", $feb[$a]));
		$serie[$a]->addPoint(new Point("Marzo", $mar[$a]));
		$serie[$a]->addPoint(new Point("Abril", $abr[$a]));
		$serie[$a]->addPoint(new Point("Mayo", $may[$a]));
		$serie[$a]->addPoint(new Point("Junio", $jun[$a]));
		$serie[$a]->addPoint(new Point("Julio", $jul[$a]));
		$serie[$a]->addPoint(new Point("Agosto", $ago[$a]));
		$serie[$a]->addPoint(new Point("Septiembre", $sep[$a]));
		$serie[$a]->addPoint(new Point("Octubre", $oct[$a]));
		$serie[$a]->addPoint(new Point("Noviembre", $nov[$a]));
		$serie[$a]->addPoint(new Point("Diciembre", $dic[$a]));
	}
	
	$dataSet = new XYSeriesDataSet();
	
	for($a=0; $a<$sizeof; $a++) $dataSet->addSerie("$ani[$a]", $serie[$a]);

	$chart->setDataSet($dataSet);

	$chart->setTitle("Ventas mes a mes");
	$chart->getPlot()->setGraphCaptionRatio(0.8);
	$chart->render("graficas/anio_por_anio.png");
	
	echo "<img src=\"graficas/anio_por_anio.png\">";
}

//funcion que totaliza la fila de recompra
function total_fila_recompra($id)
{
	$conecta = conecta_bd("videoexpress");
	$result = consulta_bd("recompra","*","1;;;id='$id'");
	
	$total = 0;
    $year = date(Y);
	while ($row = mysql_fetch_object($result))
	{
		for($fechar=2003; $fechar<=$year; $fechar++)
		{
			$fechar2 = "anio_".$fechar;
			$total += $row->$fechar2."<br>";
		}
	}
    return $total;
}

//Funcio que consolida el total de a;os en recompra
function consolida_total_recompra() {
    $conecta = conecta_bd("videoexpress");
	$total_ventas=$total_auditorio=$total_una_vez=$total_mas_una_vez=$total_envios=$prom_por_envio=$prom_gente_por_envio=0;
	
    //total envios id=2 id=9
    $total_envios = total_fila_recompra("2");
    //total recompra id=3 id=8
    $total_mas_de_una_vez = total_fila_recompra("3");
    //Total ventas
    $total_ventas = total_fila_recompra("4");
    //Total gente impt
    $total_auditorio = total_fila_recompra("5");
    //Total promedio por envio id=1
    $total_prom_por_envio = $total_ventas / $total_envios;
    //Total una vez
    $total_una_vez = total_fila_recompra("7");
    //Promedio gente por envio id=6
	$prom_gente_por_envio = $total_auditorio / $total_envios;
	
    //actualizamos la tabla
	//promedio por envio
	$query = "UPDATE recompra SET totales = '$total_prom_por_envio' WHERE id='1'";
	mysql_query($query) or die(mysql_error());
	//total envios
	$query = "UPDATE recompra SET totales = '$total_envios' WHERE id='2'";
	mysql_query($query) or die(mysql_error());
	//recompra mas de una vez
	$query = "UPDATE recompra SET totales = '$total_mas_de_una_vez' WHERE id='3'";
	mysql_query($query) or die(mysql_error());
	//Total ventas
	$query = "UPDATE recompra SET totales = '$total_ventas' WHERE id='4'";
	mysql_query($query) or die(mysql_error());
	//total no auditorio
	$query = "UPDATE recompra SET totales = '$total_auditorio' WHERE id='5'";
	mysql_query($query) or die(mysql_error());
	//promedio gente por envio
	$query = "UPDATE recompra SET totales = '$prom_gente_por_envio' WHERE id='6'";
	mysql_query($query) or die(mysql_error());
	//una vez
	$query = "UPDATE recompra SET totales = '$total_una_vez' WHERE id='7'";
	mysql_query($query) or die(mysql_error());
	//mas de una vez
	$query = "UPDATE recompra SET totales = '$total_mas_de_una_vez' WHERE id='8'";
	mysql_query($query) or die(mysql_error());
	//total recompra
	$query = "UPDATE recompra SET totales = '$total_envios' WHERE id='9'";
	mysql_query($query) or die(mysql_error());
}

function genera_grafica_reporte($tipo_auditorio,$total_tipo_auditorio)
{
	require_once ("jpgraph-3.5.0b1/src/jpgraph.php");
	require_once ("jpgraph-3.5.0b1/src/jpgraph_pie.php");
	require_once ("jpgraph-3.5.0b1/src/jpgraph_pie3d.php");

	$graph = new PieGraph(510,300);
	$graph->SetShadow();

	$graph->title->Set("Porcentajes de uso del tipo de auditorio");
	$graph->title->SetFont(FF_FONT1,FS_BOLD);
	$p1 = new PiePlot3D($total_tipo_auditorio);
	$p1->SetSize(0.4);
	$p1->SetCenter(0.3);
	$p1->SetLegends($tipo_auditorio);
	//$p1->ExplodeAll(10);
	$p1->SetLabelPos(0.9);
	$p1->ExplodeAll( 10 );
	$p1->SetTheme("water");
	
	$graph->Add($p1);
	$graph->legend->SetShadow('gray@0.4',5);
	$graph->legend->SetPos(0.1,0.1,'right','top');
	$graph->legend->SetColumns(1);
	$graph->Stroke(_IMG_HANDLER);

	// Stroke image to a file and browser
	// Default is PNG so use ".png" as suffix
	$fileName = "graficas/tipo_auditorio1.png";
	$graph->img->Stream($fileName);
 
	// Send it back to browser
	//$graph->img->Headers();
	//$graph->img->Stream();
}
?>

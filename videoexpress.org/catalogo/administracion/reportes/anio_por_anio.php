<?php
session_start();

if (isset($_SESSION['user_admin']))
{
	echo "<link href=\"../../estilo.css\" rel=\"stylesheet\" type=\"text/css\" />";
	include('../../include/funciones_globales.php');
	$conecta = conecta_bd("videoexpress");
	include('funciones_reportes.php');
	/*boton para generar pdf*/
 echo '<div><a href="pdf_anio_por_anio.php" target="_blank" title="Exportar Pdf" class="btn_pdf">Exportar Pdf</a></div>';

	$year = date(Y)-1;
	$mes = 12;
	$ver_anio = ($year - 2003) + 1;
	$total = dato_columna("anio_por_anio","COUNT(*)","-1;;;;");
	$total -= 2;
	$result_sf = consulta_bd("ingresos_y_capital","*","1;;;id='3'");
	
	$fechar = "anio_".$year;
	while ($row = mysql_fetch_object($result_sf))
	{
		$fecha_x = $row->$fechar;
	}
	if($total < $ver_anio and $fecha_x != 0)
	{
		//$query = ing_datos_tabla("anio_por_anio","anio","'$year'");
		for($m=1; $m<=12; $m++)
		{
			if($m < 10) $month = "0".$m;
			else $month = $m;
			consolidar_mes($year, $month);
		}
	}
	consolidar_mes($year, $mes);
	
	//Consolidación año actual
	$year = date(Y);
	$mes = date(m);
	$ver_anio = ($year - 2003) + 1;
	$total = dato_columna("anio_por_anio","COUNT(*)","-1;;;;");
	$result_sf = consulta_bd("ingresos_y_capital","*","1;;;id='3'");
	
	$fechar = "anio_".$year;
	while ($row = mysql_fetch_object($result_sf))
	{
		$fecha_x = $row->$fechar;
	}
	if($total < $ver_anio and $fecha_x != 0)
	{
		$query = ing_datos_tabla("anio_por_anio","anio","'$year'");
		for($m=1; $m<=12; $m++)
		{
			if($m < 10) $month = "0".$m;
			else $month = $m;
			consolidar_mes($year, $month);
		}
	}
	consolidar_mes($year, $mes);
	
	echo "<table width=\"100%\" cellpading=\"0\" cellspacing=\"0\" border=\"1px\" align=\"center\" style=\"font-size: 13px\">";
	echo "<tr align=\"center\" class=\"encabezado_tabla\" style=\"border: 1px dotted #FFF\">";
	echo "<td>A&ntilde;o</td>";
	echo "<td>Enero</td>";
	echo "<td>Febrero</td>";
	echo "<td>Marzo</td>";
	echo "<td>Abril</td>";
	echo "<td>Mayo</td>";
	echo "<td>Junio</td>";
	echo "<td>Julio</td>";
	echo "<td>Agosto</td>";
	echo "<td>Septiembre</td>";
	echo "<td>Octubre</td>";
	echo "<td>Noviembre</td>";
	echo "<td>Diciembre</td>";
	echo "</tr>";

	$result = consulta_bd("anio_por_anio","*","-1;;;;");
	
	$i = $a = 0;
	$colorfila = 1;
	
	while ($row = mysql_fetch_object($result))
	{
		if ($colorfila==0)
		{
			$color = "#9ABEDC";
			$color1 = "#fff";
		    $colorfila = 1; 
		}
		else
		{
			$color = "#FFF";
			$color1 = "#000";
			$colorfila = 0;
		}
	
		$estilo_celda = "style='background-color:$color; color:$color1'";
		
		echo "<tr bgcolor=\"#cccccc\" style=\"color: #000; border: 1px dotted #FFF\">";
		//año
		echo "<td align=\"left\" class=\"encabezado_tabla\" style=\"background-color: #3366CC\">".$row->anio."</td>";
		$ani[$a] = $row->anio;
		//enero
		echo "<td align=\"left\" $estilo_celda>$ ".number_format($ene[$a] = $row->enero)."</td>";
		$enero += $row->enero;
		//febrero
		echo "<td align=\"left\" $estilo_celda>$ ".number_format($feb[$a] = $row->febrero)."</td>";
		$febrero += $row->febrero;
		//marzo
		echo "<td align=\"left\" $estilo_celda>$ ".number_format($mar[$a] = $row->marzo)."</td>";
		$marzo += $row->marzo;
		//abril
		echo "<td align=\"left\" $estilo_celda>$ ".number_format($abr[$a] = $row->abril)."</td>";
		$abril += $row->abril;
		//mayo
		echo "<td align=\"left\" $estilo_celda>$ ".number_format($may[$a] = $row->mayo)."</td>";
		$mayo += $row->mayo;
		//junio
		echo "<td align=\"left\" $estilo_celda>$ ".number_format($jun[$a] = $row->junio)."</td>";
		$junio += $row->junio;
		//julio
		echo "<td align=\"left\" $estilo_celda>$ ".number_format($jul[$a] = $row->julio)."</td>";
		$julio += $row->julio;
		//agosto
		echo "<td align=\"left\" $estilo_celda>$ ".number_format($ago[$a] = $row->agosto)."</td>";
		$agosto += $row->agosto;
		//septiembre
		echo "<td align=\"left\" $estilo_celda>$ ".number_format($sep[$a] = $row->septiembre)."</td>";
		$septiembre += $row->septiembre;
		//octubre
		echo "<td align=\"left\" $estilo_celda>$ ".number_format($oct[$a] = $row->octubre)."</td>";
		$octubre += $row->octubre;
		//noveimbre
		echo "<td align=\"left\" $estilo_celda>$ ".number_format($nov[$a] = $row->noviembre)."</td>";
		$noviembre += $row->noviembre;
		//diciembre
		echo "<td align=\"left\" $estilo_celda>$ ".number_format($dic[$a] = $row->diciembre)."</td>";
		$diciembre += $row->diciembre;
		//promedio mensual
		$prom_mes[$a] = $row->promedio_mes;
		$promedio_mes += $row->promedio_mes;
		//ventas con respecto año anterior
		$pvaa[$a] = $row->porcentaje_ventas_anio_anterior;
		if($i>0) $porcentaje += $row->porcentaje_ventas_anio_anterior;
		$i++;
		//servicios atendidos
		$ser_aten[$a] = $row->servicios_atendidos;
		//crecimiento
		$crec[$a] = $row->crecimiento;
		//total ingresos año
		$anio[$a] = $row->enero+$row->febrero+$row->marzo+$row->abril+$row->mayo+$row->junio+$row->julio+$row->agosto+$row->septiembre+$row->octubre+$row->noviembre+$row->diciembre; 
		echo "</tr>";
		$a++;
	}
	
	echo "<tr align=\"center\" class=\"encabezado_tabla\" style=\"border: 1px dotted #FFF; background-color: #FFD064; color: #000\">";
	echo "<td>&nbsp;</td>";
	echo "<td>$ ".number_format($enero/$a,2)."</td>";
	echo "<td>$ ".number_format($febrero/$a,2)."</td>";
	echo "<td>$ ".number_format($marzo/$a,2)."</td>";
	echo "<td>$ ".number_format($abril/$a,2)."</td>";
	echo "<td>$ ".number_format($mayo/$a,2)."</td>";
	echo "<td>$ ".number_format($junio/$a,2)."</td>";
	echo "<td>$ ".number_format($julio/$a,2)."</td>";
	echo "<td>$ ".number_format($agosto/$a,2)."</td>";
	echo "<td>$ ".number_format($septiembre/$a,2)."</td>";
	echo "<td>$ ".number_format($octubre/$a,2)."</td>";
	echo "<td>$ ".number_format($noviembre/$a,2)."</td>";
	echo "<td>$ ".number_format($diciembre/$a,2)."</td>";
	echo "</tr>";
	echo "</table>";
	
	echo "<table cellspacing='0' cellpanding='0' border='0' width='100%' align='center'><tr><td align='center'>";
	graf_anio_por_anio($ani, $ene, $feb, $mar, $abr, $may, $jun, $jul, $ago, $sep, $oct, $nov, $dic);
	echo "</tr></td></table>";
	
	//tabla de promedios
	echo "<br><center>";
	echo "<table width=\"50%\" cellpading=\"0\" cellspacing=\"0\" border=\"1px\" align=\"left\" style=\"font-size: 13px\">";
	echo "<tr align=\"center\" class=\"encabezado_tabla\" style=\"border: 1px dotted #FFF\">";
	echo "<td>A&ntilde;o</td>";
	echo "<td>Promedio mensual de ingresos por ventas al a&ntilde;o</td>";
	echo "<td>Ventas con respecto al a&ntilde;o anterior</td>";
	echo "<td>Servicios atendidos durante al a&ntilde;o</td>";
	echo "<td>Crecimiento con respecto al a&ntilde;o anterior</td>";
	echo "<td>Ingresos por ventas al a&ntilde;o</td>";
	echo "</tr>";
	for($b=0; $b<$a; $b++)
	{
		echo "<tr align=\"center\" class=\"encabezado_tabla\" style=\"border: 1px dotted #FFF; background-color: #FFD064; color: #000\">";
		echo "<td align=\"left\" class=\"encabezado_tabla\" style=\"background-color: #3366CC\">".$ani[$b]."</td>";
		//promedio mensual
		echo "<td align=\"left\" style='background-color: #CCFF66'>$ ".number_format($prom_mes[$b])."</td>";
		//ventas con respecto año anterior
		echo "<td align=\"center\" style='background-color: #33FF66'>".number_format($pvaa[$b],2)." %</td>";
		//servicios atendidos
		echo "<td align=\"center\" style='background-color: #FFF'>".number_format($ser_aten[$b])."</td>";
		//crecimiento
		echo "<td align=\"left\">".number_format($crec[$b],2)." %</td>";
		//total ingresos año
		echo "<td align=\"left\" style='background-color: #FFF'>$ ".number_format($anio[$b],2)."</td>";
		echo "</tr>";
	}
	
	echo "<tr align=\"center\" class=\"encabezado_tabla\" style=\"border: 1px dotted #FFF; background-color: #FFD064; color: #000\">";
	echo "<td>&nbsp;</td>";
	echo "<td>$ ".number_format($promedio_mes/$a,2)."</td>";
	$i -= 2;
	$porcentaje /= $i;
	echo "<td>".number_format($porcentaje,2)." %</td>";
	echo "<td>&nbsp;</td>";
	echo "<td>&nbsp;</td>";
	echo "<td>&nbsp;</td>";
	echo "</tr>";
	echo "</table></center>";
}
else
{
	echo '<script languaje="Javascript">location.href="../"</script>';
}
?>
<?php
session_start();

if (isset($_SESSION['user_admin']))
{
	echo "<link href=\"../../estilo.css\" rel=\"stylesheet\" type=\"text/css\" />";
	include('../../include/funciones_globales.php');
	include('funciones_reportes.php');
	$conecta = conecta_bd("videoexpress");
	/*boton para generar pdf*/
 echo '<div><a href="pdf_dias_trabajados_capital.php" target="_blank" title="Exportar Pdf" class="btn_pdf">Exportar Pdf</a></div>';
	
	
	ingresos_y_capital();
	$year = date(Y);
	
	echo "<table width=\"100%\" cellpading=\"0\" cellspacing=\"0\" border=\"0\" align=\"center\" style=\"font-size: 13px\">";
	echo "<tr align=\"center\" class=\"encabezado_tabla\">";
	echo "<td>&nbsp;</td>";
	for($fechar=2003; $fechar<=$year;$fechar++)
	{
		echo "<td>$fechar</td>";
	}
	echo "<td>Total</td>";
	echo "</tr>";
	$result = consulta_bd("ingresos_y_capital","*","-1;;;;");

	$i = 0;
	
	while ($row = mysql_fetch_object($result))
	{
		//id
		$id[$i] = $row->id;
		//id
		$item[$i] = $row->item;
		for($fechar=2003; $fechar<=$year;$fechar++)
		{
			$fechar2 = "anio_".$fechar;
			$anio[$fechar][$i] = $row->$fechar2;
		}
		//Total
		$total[$i] = $row->total;
		$i++;
	}
	
	for($y=2003; $y<=$year; $y++)
	{
		$total_anio[$y]		= $anio[$y][1] + $anio[$y][6];
	}
	$total_total	 	= $total[1]			+ $total[6];
	
	echo "<tr bgcolor=\"#FFF\" style=\"color: #000\">";
	echo "<td>".$item[0]."</td>";
	for($y=2003; $y<=$year; $y++)
	{
		echo "<td>".number_format($anio[$y][0])."</td>";
	}
	echo "<td>".number_format($total[0])."</td>";
	echo "</tr>";
	echo "<tr bgcolor=\"#9ABEDC\" style=\"color: #fff\">";
	echo "<td>".$item[1]."</td>";
	for($y=2003; $y<=$year; $y++)
	{
		echo "<td>$ ".number_format($total_anio[$y],2)."</td>";
	}
	echo "<td>$ ".number_format($total_total,2)."</td>";
	echo "</tr>";
	echo "<tr bgcolor=\"#FFF\" style=\"color: #000\">";
	echo "<td>".$item[2]."</td>";
	for($y=2003; $y<=$year; $y++)
	{
		echo "<td>".$anio[$y][2]."</td>";
	}
	echo "<td>".$total[2]."</td>";
	echo "</tr>";
	echo "<tr bgcolor=\"#9ABEDC\" style=\"color: #fff\">";
	echo "<td>".$item[3]."</td>";
	for($y=2003; $y<=$year; $y++)
	{
		echo "<td>".$anio[$y][3]."</td>";
	}
	echo "<td>".$total[3]."</td>";
	echo "</tr>";
	echo "<tr bgcolor=\"#FFF\" style=\"color: #000\">";
	echo "<td>".$item[4]."</td>";
	for($y=2003; $y<=$year; $y++)
	{
		echo "<td>".number_format($anio[$y][4])."</td>";
	}
	echo "<td>".number_format($total[4])."</td>";
	echo "</tr>";
	echo "<tr bgcolor=\"#9ABEDC\" style=\"color: #fff\">";
	echo "<td>".$item[7]."</td>";
	for($y=2003; $y<=$year; $y++)
	{
		echo "<td>$ ".number_format($anio[$y][7],2)."</td>";
	}
	echo "<td>$ ".number_format($total[7],2)."</td>";
	echo "</tr>";
	echo "</table>";
	
	$dias_faltan = dias_faltan();
	$result = consulta_bd("actualizacion","dia_celebrar","-1;;;;");
	
	while ($row = mysql_fetch_object($result))
	{
		$dia_celebrar = $row->dia_celebrar;
	}
	
	echo "<br><br>";
	echo "<table cellpading=\"0\" cellspacing=\"3px\" border=\"0\" align=\"left\" bgcolor=\"#9ABEDC\" style=\"color: #000\">";
	echo "<tr>";
	//dias que faltan
	echo "<td>Dias que faltan</td>";
	echo "<td>".$dias_faltan."</td>";
	echo "</tr><tr>";
	echo "<td>Dia a celebrar</td>";
	echo "<td>".$dia_celebrar."</td>";
	$fecha = suma_dias($dias_faltan);
	echo "</tr><tr>";
	echo "<td>fecha a celebrar</td>";
	echo "<td>".$fecha."</td>";
	echo "</tr>";
	echo "</table>";
	
	echo "<table cellpading=\"0\" cellspacing=\"3px\" border=\"0\" align=\"left\" bgcolor=\"#9ABEDC\" style=\"color: #000; margin-left: 50px\">";
	echo "<tr>";
	//dias que faltan
	echo "<td>Inicio</td>";
	echo "<td>03-03-2003</td>";
	echo "</tr><tr>";
	echo "<td>Hoy</td>";
	$fecha2[0] = date(d); $fecha2[1] = date(m); $fecha2[2] =date(Y);
	echo "<td>".date(d)."-".date(m)."-".date(Y)."</td>";
	$fecha1[0] = "03"; $fecha1[1] = "03"; $fecha1[2] = "2003";
	$fecha = calcular_dias_fecha($fecha2, $fecha1);
	echo "</tr><tr>";
	echo "<td>Corridos</td>";
	echo "<td>".$fecha."</td>";
	$domingos = domingos();
	echo "</tr><tr>";
	echo "<td>Domingos</td>";
	echo "<td>".$domingos."</td>";
	echo "</tr>";
	echo "</table>";
}
else
{
	echo '<script languaje="Javascript">location.href="../"</script>';
}
?>
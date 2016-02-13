<?php
session_start();

if (isset($_SESSION['user_admin']))
{
	include('../../include/funciones_globales.php');
	$conecta = conecta_bd("videoexpress");
	
	/*boton para generar pdf*/
	echo '<div><a href="pdf_recompra.php" target="_blank" title="Exportar Pdf" class="btn_pdf">Exportar Pdf</a></div>';

	$result = consulta_bd("recompra","*","4;;;;0/6");

	echo "<table cellpading=\"0\" cellspacing=\"1px\" border=\"1px\" align=\"center\">";
	echo "<tr valign='top' style='text-align:center; background-color:#003366; color:#fff; font-weight: bold'>";
	echo "<td>&nbsp;</td>";
	
	for($a=2003; $a<=date(Y); $a++) {
		echo "<td>$a</td>";
	}
	echo "<td>Totales</td><tr>";

	$colorfila = 1;
	include('funciones_reportes.php');
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
	
		$estilo_celda = "valign='top' style='text-align:center; background-color:$color; color:$color1'";
	
		$id = $row->id;
	
		if($id == 1 || $id == 4) $t = "$ ";
		else $t = "";
	
		echo "<tr $estilo_celda>";
		echo "<td><strong>".$row->item."</strong></td>";
		for($a=2003; $a<=date(Y); $a++)
		{
			if($a >= 2010) consolidar_anio_recompra($a);
			$fechar = "anio_$a";
			echo "<td>".$t.number_format($row->$fechar,2)."</td>";
		}
		echo "<td>".$t.number_format($row->Totales,2)."</td>";
		echo "</tr>";
	}

	echo "</table>";
	echo "<p><table cellpading=\"0\" cellspacing=\"5px\" border=\"1px\" align=\"center\" style=\"color: #000\">";
	$r = 0;

	echo "<tr>";

	$anio_actual = date(Y);
	
	$anio = date(Y);
	$columna = "anio_".$anio;
	$t_columna = "DECIMAL(10,0)";
	$anio--;
	$despues_de = "anio_".$anio;
	$existe = verificar_columna($columna, "recompra");
	if($existe == false) agregar_columna("recompra", $columna, $t_columna, $despues_de);
    
    consolidar_anio_recompra($anio_actual);
    //consolidamos los totales de recompra
    consolida_total_recompra();

	for($z=2003; $z<=$anio_actual; $z++)
	{
		echo "<td valign=\"top\">";
		$year = "$z";
		$an = "anio_$year"; 
		recompra($an, $year);
		echo "</td>";
		$r++;
		if($r==3)
		{
			echo "</tr><tr>";
			$r = 0;
		}
	}
	
	echo "<td>";
	$an = "Totales";
	echo "<strong>$an hasta el &uacute;ltimo a&ntilde;o consolidado</strong><br />";
	recompra($an, "Total");
	echo "</td></tr>";
	echo "</table></p>";
}
else
{
	echo '<script languaje="Javascript">location.href="../"</script>';
}
?>
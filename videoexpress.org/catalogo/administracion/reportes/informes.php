<?php
session_start();
// check session variable
if (isset($_SESSION['user_admin']))
{
	echo "<html><meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
	echo "<link href='../estilo.css' rel='stylesheet' type='text/css'/>";
	//nos conectamos a la base de datos
	include ("../../include/funciones_globales.php");
	$conecta = conecta_bd("videoexpress");
	//nos conectamos a la tabla respectiva
	
	include("funciones_reportes.php");
	/*boton para generar pdf*/
 	echo '<div><a href="pdf_informes.php" target="_blank" title="Exportar Pdf" class="btn_pdf">Exportar Pdf</a></div>';
	
	echo "<table cellspacing='0' cellpading='0' border='0' width='100%' style=\"color: #000000\"><tr><td valign=\"top\">";

	$color1 = "#B7D3DD";
	$color2 = "white";
	$i = 0;
	echo '<table cellspacing="0" cellpadding="5" border="0" width="100%">';
	
	echo "<tr style=\"background-color:".$color2."\"><td>Total peliculas enviadas a la fecha:</td><td><strong>";
	$total_alquiladas = dato_columna("catalogo","SUM(alquilada)","2;alquilada;ASC;;");
	$total_alquiladas += 5957;
	echo number_format($total_alquiladas,0,'',',');
	echo "</strong></td></tr>";
	$total_auditorio = dato_columna("info_peliculas","SUM(auditorio_no)","-1;;;;");
	echo "<tr style=\"background-color:".$color1."\"><td>Total del auditorio a la fecha:</td><td><strong>".number_format($total_auditorio,0,'',',')." personas</strong></td><tr><td colspan=\"2\">&nbsp;</td></tr>";
	
	$tipo_auditorio = array('Familia','Iglesia','Edificación grupal','Edificación empresarial','Edificación personal','Jóvenes y niños','Radio evangelismo','Televangelismo','Online');
	
	for($a=0; $a<9; $a++) {
		if($i == 0) { echo '<tr style="background-color:'.$color1.'"><td>'; $i = 1; }
		else { echo '<tr style="background-color:'.$color2.'"><td>'; $i = 0; }
		$total_tipo_auditorio1 = dato_columna("info_peliculas","SUM(auditorio_no)","3;auditorio_no;desc;tipo_auditorio='".utf8_decode($tipo_auditorio[$a])."';");
		$total_tipo_auditorio[$a] = ($total_tipo_auditorio1*100)/$total_auditorio;
		$total_tipo_auditorio[$a] = number_format($total_tipo_auditorio[$a],2);
		echo "Total auditorio $tipo_auditorio[$a]:</td><td><strong>".number_format($total_tipo_auditorio1,0,'',',');
		echo "</strong> (".$total_tipo_auditorio[$a]." %)</td></tr>";
	}
	foreach($tipo_auditorio as $ta) $taf[] = utf8_decode($ta);
	genera_grafica_reporte($taf,$total_tipo_auditorio);
	
	$year = date(Y);
	$mes = date(n);
	$dia = date(j);
	echo "<tr><td>&nbsp;</td></tr><tr style=\"background-color:".$color1."\"><td>Total facturado en el presente año (".$year."):</td><td><strong>$ ";
	echo number_format(dato_columna("facturas","SUM(precio)","1;;;fecha_cancelada_mes>='1' and fecha_cancelada_mes<='12' and fecha_cancelada_anio='$year'"),0);
	echo "</strong></td></tr>";
	echo "<tr style=\"background-color:".$color2."\"><td>Total facturado en este mes (".date(M)."): <strong>$ ";
	echo number_format(dato_columna("facturas","SUM(precio)","1;;;fecha_cancelada_mes='$mes' and fecha_cancelada_anio='$year'"),0);
	echo "</strong></td></tr>";
	echo "<tr style=\"background-color:".$color1."\"><td>Total facturado en el día de hoy (".$dia."):</td><td><strong>$ ";
	echo number_format(dato_columna("facturas","SUM(precio)","1;;;fecha_cancelada_dia='$dia' and fecha_cancelada_mes='$mes' and fecha_cancelada_anio='$year'"),0);
	echo "</strong></td></tr>";
	
	echo "<tr style=\"background-color:".$color2."\"><td>Total facturas generadas en el presente año (".$year.") con Videoexpress:</td><td><strong>";
	echo number_format(dato_columna("facturas","COUNT(id_factura)","1;;;fecha_cancelada_mes>='1' and fecha_cancelada_mes<='12' and fecha_cancelada_anio='$year'"),0);
	echo "</strong></td></tr>";
	echo "<tr style=\"background-color:".$color1."\"><td>Total facturas generadas en este mes (".date(M)."):</td><td><strong>";
	echo number_format(dato_columna("facturas","COUNT(id_factura)","1;;;fecha_cancelada_mes='$mes' and fecha_cancelada_anio='$year'"),0);
	echo "</strong></td></tr>";
	echo "<tr style=\"background-color:".$color2."\"><td>Total facturas generadas en el día de hoy (".$dia."):</td><td><strong>";
	echo number_format(dato_columna("facturas","COUNT(id_factura)","1;;;fecha_cancelada_dia='$dia' and fecha_cancelada_mes='$mes' and fecha_cancelada_anio='$year'"),0);
	echo "</strong></td></tr>";
	
	echo "<tr style=\"background-color:".$color1."\"><td colspan=\"2\">&nbsp;</td></tr><tr style=\"background-color:".$color2."\"><td>Total facturas que no han devuelto las peliculas:</td><td><strong>";
	echo number_format(dato_columna("info_fac_videx","COUNT(devueltas)","1;;;devueltas='no'"),0);
	echo "</strong></td></tr>";
	echo "</table></td><td align=\"center\">";
	echo "<img src=\"graficas/tipo_auditorio1.png\">";
	echo "</td></tr></table>";
	echo "</span>";
}
else
{
	include ('index.php');
}

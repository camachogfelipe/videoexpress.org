<?php
session_start();

if (isset($_SESSION['user_admin'])){
	include('../../include/funciones_globales.php');
	$conecta = conecta_bd("videoexpress");
	include('funciones_reportes.php');
 #clase pdf
 require_once('tcpdf/config/lang/spa.php');
 require_once('tcpdf/tcpdf.php');
 #creo un objeto de la clase FPDF
 $pdf= new TCPDF('L', PDF_UNIT, PDF_PAGE_FORMAT);
 #declaraciones de pagina
 #------------------------------------------ 
	$year = date(Y);
	$mes = date(m);
 $ancho = $pdf->getPageWidth();
 
 $unidad = ($ancho-10)/13;
 $pixel = 3.779527559;//1 mm es igual a 37.795275591
 $pdf->SetMargins(5,35,-1);
 $pdf->setHeaderData(PDF_HEADER_LOGO,$unidad*13);
 $pdf->setHeaderMargin(2);
 $pdf->AddPage();
 $pdf->SetFontSize(14);
 $pdf->setPrintFooter(false);
 $pdf->SetDisplayMode('real');
 //$pdf->SetTextColor(0, 0, 100, 0);
 //$pdf->SetDrawColor(0, 0, 50, 0);
 $pdf->SetFillColor(154,190,220);
 #mpezar a contruir el PDF
 $pdf->Cell(0,5,'Año X Año','LTB',0,'C');
 $pdf->SetFontSize(9);
 $pdf->Cell(0,5,'Reporte generado el '.date('Y-m-d h:i:s A '),'RTB',1,'R');
 $pdf->Ln(5);
 
//	$ver_anio = ($year - 2003) + 1;
//	$total = dato_columna("anio_por_anio","COUNT(*)","-1;;;;");
//	$result_sf = consulta_bd("ingresos_y_capital","*","1;;;id='3'");
//	$fechar = "anio_".$year;
 
 $pdf->Cell($unidad/2,5,'Año',1,0,'L',1);
 $pdf->Cell($unidad,5,'Enero',1,0,'L',1);
 $pdf->Cell($unidad,5,'Febrero',1,0,'L',1);
 $pdf->Cell($unidad,5,'Marzo',1,0,'L',1);
 $pdf->Cell($unidad,5,'Abril',1,0,'L',1);
 $pdf->Cell($unidad,5,'Mayo',1,0,'L',1);
 $pdf->Cell($unidad,5,'Junio',1,0,'L',1);
 $pdf->Cell($unidad,5,'Julio',1,0,'L',1);
 $pdf->Cell($unidad,5,'Agosto',1,0,'L',1);
 $pdf->Cell($unidad,5,'Septiembre',1,0,'L',1);
 $pdf->Cell($unidad,5,'Octubre',1,0,'L',1);
 $pdf->Cell($unidad,5,'Noviembre',1,0,'L',1);
 $pdf->Cell($unidad,5,'Diciembre',1,1,'L',1);

	$result = consulta_bd("anio_por_anio","*","-1;;;;");	
	$i = $a = 0;
	$colorfila = 1;	
	while ($row = mysql_fetch_object($result)){
		if ($colorfila==0){
    $pdf->SetTextColor(255,255,255);
    $pdf->SetFillColor(154,190,220);
    $colorfila = 1; 
		}
		else{
   $pdf->SetTextColor(0,0,0);
   $pdf->SetFillColor(255,255,255);
			$colorfila = 0;
		}
 $pdf->Cell($unidad/2,5,$row->anio,1,0,0,1);
 $pdf->Cell($unidad,5,number_format($ene[$a] = $row->enero),1,0,'L',1);
 $pdf->Cell($unidad,5,number_format($feb[$a] = $row->febrero),1,0,'L',1);
 $pdf->Cell($unidad,5,number_format($mar[$a] = $row->marzo),1,0,'L',1);
 $pdf->Cell($unidad,5,number_format($abr[$a] = $row->abril),1,0,'L',1);
 $pdf->Cell($unidad,5,number_format($may[$a] = $row->mayo),1,0,'L',1);
 $pdf->Cell($unidad,5,number_format($jun[$a] = $row->junio),1,0,'L',1);
 $pdf->Cell($unidad,5,number_format($jul[$a] = $row->julio),1,0,'L',1);
 $pdf->Cell($unidad,5,number_format($ago[$a] = $row->agosto),1,0,'L',1);
 $pdf->Cell($unidad,5,number_format($sep[$a] = $row->septiembre),1,0,'L',1);
 $pdf->Cell($unidad,5,number_format($oct[$a] = $row->octubre),1,0,'L',1);
 $pdf->Cell($unidad,5,number_format($nov[$a] = $row->noviembre),1,0,'L',1);
 $pdf->Cell($unidad,5,number_format($dic[$a] = $row->diciembre),1,1,'L',1);
 $ani[$a] = $row->anio;
 $enero += $row->enero;
 $febrero += $row->febrero;
 $marzo += $row->marzo;
 $abril += $row->abril;
 $mayo += $row->mayo;
 $junio += $row->junio;
 $julio += $row->julio;
 $agosto += $row->agosto;
 $septiembre += $row->septiembre;
 $octubre += $row->octubre;
 $noviembre += $row->noviembre;
 $diciembre += $row->diciembre;
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
		$a++;
	} 
 $pdf->SetTextColor(0,0,0);
 $pdf->SetFillColor(255,255,255);
 
 $pdf->Cell($unidad/2,5,'',1,0,0,1);
 $pdf->Cell($unidad,5,number_format($enero/$a,2),1,0,0,1);
 $pdf->Cell($unidad,5,number_format($febrero/$a,2),1,0,0,1);
 $pdf->Cell($unidad,5,number_format($marzo/$a,2),1,0,0,1);
 $pdf->Cell($unidad,5,number_format($abril/$a,2),1,0,0,1);
 $pdf->Cell($unidad,5,number_format($mayo/$a,2),1,0,0,1);
 $pdf->Cell($unidad,5,number_format($junio/$a,2),1,0,0,1);
 $pdf->Cell($unidad,5,number_format($julio/$a,2),1,0,0,1);
 $pdf->Cell($unidad,5,number_format($agosto/$a,2),1,0,0,1);
 $pdf->Cell($unidad,5,number_format($septiembre/$a,2),1,0,0,1);
 $pdf->Cell($unidad,5,number_format($octubre/$a,2),1,0,0,1);
 $pdf->Cell($unidad,5,number_format($noviembre/$a,2),1,0,0,1);
 $pdf->Cell($unidad,5,number_format($diciembre/$a,2),1,0,0,1);
 
 $pdf->Ln(10);
 $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
 $nameimag = "graficas/anio_por_anio.png";
 $pdf->writeHTML('<img src="'.$nameimag.'" alt="'.$nameimag.'" width="'.(($unidad*12)*$pixel).'" />',1,1,1,1,'J'); 
 
 $pdf->AddPage();
 $pdf->Ln(5);
 
 $pdf->SetTextColor(255,255,255);
 $pdf->SetFillColor(154,190,220);
 
 $pdf->MultiCell($unidad/2,8,'Año',1,0,1,0);
 $pdf->MultiCell($unidad*2,5,'Promedio mensual de ingresos por ventas al año',1,'L',1,0);
 $pdf->MultiCell($unidad*1.5,5,'Ventas con respecto al año anterior',1,'L',1,0);
 $pdf->MultiCell($unidad*1.5,5,'Servicios atendidos durante al año',1,'L',1,0);
 $pdf->MultiCell($unidad*1.5,5,'Crecimiento con respecto al año anterior',1,'L',1,0);
 $pdf->MultiCell($unidad*1.5,5,'Ingresos por ventas al año',1,'L',1);
 
 $pdf->SetTextColor(0,0,0);
 $pdf->SetFillColor(255,255,255);
 
 for($b=0; $b<$a; $b++){
 $pdf->Cell($unidad/2,5,$ani[$b],1,0,'L',1);
 $pdf->Cell($unidad*2,5,number_format($prom_mes[$b]),1,0,'L',1);
 $pdf->Cell($unidad*1.5,5,number_format($pvaa[$b],2),1,0,'L',1);
 $pdf->Cell($unidad*1.5,5,number_format($ser_aten[$b]),1,0,'L',1);
 $pdf->Cell($unidad*1.5,5,number_format($crec[$b],2),1,0,'L',1);
 $pdf->Cell($unidad*1.5,5,number_format($anio[$b],2),1,1,'L',1); 
 }
 
 $pdf->SetTextColor(255,255,255);
 $pdf->SetFillColor(154,190,220);
 
 $pdf->Cell($unidad/2,5,'',1,0,1,1);
 $pdf->Cell($unidad*2,5,number_format($promedio_mes/$a,2),1,0,'L',1);
 $i -= 2;
	$porcentaje /= $i;
 $pdf->Cell($unidad*1.5,5,number_format($porcentaje,2),1,1,'L',1);
 
 $pdf->Output('anio_por_anio_'.date("dmY").'.pdf','I');
 exit;
 }
?>
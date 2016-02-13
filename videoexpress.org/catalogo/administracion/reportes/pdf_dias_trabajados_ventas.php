<?php
session_start();
// check session variable
if (isset($_SESSION['user_admin'])){
 //nos conectamos a la base de datos
 include ("../../include/funciones_globales.php");
 $conecta = conecta_bd("videoexpress");
	include('funciones_reportes.php');
 //nos conectamos a la tabla respectiva
 #-----------------------------
 #clase pdf
 require_once('tcpdf/config/lang/spa.php');
 require_once('tcpdf/tcpdf.php');
 #creo un objeto de la clase FPDF
 $pdf= new TCPDF('L', PDF_UNIT, PDF_PAGE_FORMAT);
 #declaraciones de pagina
 #------------------------------------------
 $year = date(Y);
 $inicio = 2003;
 for($f=$inicio; $f<=$year;$f++){
	 $contadoranos ++;
	}
 $ancho = $pdf->getPageWidth();
 $unidad = ($ancho-10)/9;
 $pixel = 3.779527559;//1 mm es igual a 37.795275591
 $pdf->SetMargins(5,35,-1);
 $pdf->setHeaderData(PDF_HEADER_LOGO,($ancho-10));
 $pdf->setHeaderMargin(2);
 $pdf->AddPage();
 $pdf->SetFontSize(14);
 $pdf->setPrintHeader(false);
 $pdf->setPrintFooter(false);
 $pdf->SetDisplayMode('real');
 //$pdf->SetTextColor(0, 0, 100, 0);
 //$pdf->SetDrawColor(0, 0, 50, 0);
 $pdf->SetFillColor(154,190,220);
 #mpezar a contruir el PDF
 $pdf->Cell(0,5,'Días trabajados ventas','LTB',0,'C');
 $pdf->SetFontSize(9);
 $pdf->Cell(0,5,'Reporte generado el '.date('Y-m-d h:i:s A '),'RTB',1,'R');
 $pdf->Ln(5);
 #--------------------------------- 
 $rst = consulta_bd("ingresos_y_capital","*","4;;;;0/6");
 $i = 0;
	while ($row = mysql_fetch_object($rst)){
		//id
		$id[$i] = $row->id;
		//id
		$item[$i] = $row->item;
		for($a=$inicio; $a<=$year; $a++){
			$f2 = "anio_".$a;
			$anio[$a][$i] = $row->$f2;
		}
		//Total
		$total[$i] = $row->total;
		$i++;
	} 
 
 ###inicio tabla### 
 for($k=1;$k<$contadoranos;$k=$k+8){  
  $fin = (($inicio+7)<$year)?$inicio+7:$year;
  $pdf->SetTextColor(255,255,255);
  $pdf->SetFillColor(0,51,102);
  $pdf->Cell($unidad,5,'',1,0,'C',1); 
 	for($a=$inicio; $a<=$fin; $a++)	{
 	 $pdf->Cell($unidad,5,$a,1,0,'C',1);
 	}
  (($inicio+8)<$year)?$pdf->Cell(0,5,'',1,1):
   $pdf->Cell($unidad,5,'Total',1,1,'L',1);
   
   $pdf->SetTextColor(255,255,255);
   $pdf->SetFillColor(154,190,220);   
   $pdf->Cell($unidad,5,$item[0],1,0,'L',1);
  	for($a=$inicio; $a<=$fin; $a++)	{
  	 $pdf->Cell($unidad,5,number_format($anio[$a][0],0),1,0,'L',1);
  	}
   (($inicio+8)<$year)?$pdf->Cell(0,5,'',1,1): 
   $pdf->Cell($unidad,5,number_format($total[0],0),1,1,'L',1);
   
   $pdf->SetTextColor(0,0,0);
   $pdf->SetFillColor(255,255,255);
   $pdf->Cell($unidad,5,$item[1],1,0,'L',1);
  	for($a=$inicio; $a<=$fin; $a++)	{
  	 $pdf->Cell($unidad,5,'$ '.number_format($anio[$a][1],0),1,0,'L',1);
  	}
   (($inicio+8)<$year)?$pdf->Cell(0,5,'',1,1): 
   $pdf->Cell($unidad,5,'$ '.number_format($total[1],0),1,1,'L',1);
   
   $pdf->SetTextColor(255,255,255);
   $pdf->SetFillColor(154,190,220);   
   $pdf->Cell($unidad,5,$item[2],1,0,'L',1);
  	for($a=$inicio; $a<=$fin; $a++)	{
  	 $pdf->Cell($unidad,5,$anio[$a][2],1,0,'L',1);
  	}
   (($inicio+8)<$year)?$pdf->Cell(0,5,'',1,1): 
   $pdf->Cell($unidad,5,$total[2],1,1,'L',1);
   
   $pdf->SetTextColor(0,0,0);
   $pdf->SetFillColor(255,255,255);  
   $pdf->Cell($unidad,5,$item[3],1,0,'L',1);
  	for($a=$inicio; $a<=$fin; $a++)	{
  	 $pdf->Cell($unidad,5,$anio[$a][3],1,0,'L',1);
  	}
   (($inicio+8)<$year)?$pdf->Cell(0,5,'',1,1): 
   $pdf->Cell($unidad,5,$total[3],1,1,'L',1);
   
   $pdf->SetTextColor(255,255,255);
   $pdf->SetFillColor(154,190,220);   
   $pdf->Cell($unidad,5,$item[4],1,0,'L',1);
  	for($a=$inicio; $a<=$fin; $a++)	{
  	 $pdf->Cell($unidad,5,number_format($anio[$a][4],0),1,0,'L',1);
  	}
   (($inicio+8)<$year)?$pdf->Cell(0,5,'',1,1): 
   $pdf->Cell($unidad,5,number_format($total[4],0),1,1,'L',1);
  
   $pdf->SetTextColor(0,0,0);
   $pdf->SetFillColor(255,255,255);
   $pdf->Cell($unidad,5,$item[5],1,0,'L',1);
  	for($a=$inicio; $a<=$fin; $a++)	{
  	 $pdf->Cell($unidad,5,'$ '.number_format($anio[$a][5],0),1,0,'L',1);
  	}
   (($inicio+8)<$year)?$pdf->Cell(0,5,'',1,1): 
   $pdf->Cell($unidad,5,'$ '.number_format($total[5],0),1,1,'L',1);
   
  $pdf->Ln(2);
  $inicio +=8;   
 }
 
 
	$pdf->Ln(5);
 $pdf->SetTextColor(0,0,0);
 $pdf->SetFillColor(154,190,220); 
 
	$dias_faltan = dias_faltan();
	$result = consulta_bd("actualizacion","dia_celebrar","-1;;;;");	
	while ($row = mysql_fetch_object($result)){
		$dia_celebrar = $row->dia_celebrar;
	}
	$pdf->Cell($unidad,5,'Dias que faltan',1,0,'L',1);
 $pdf->Cell($unidad,5,$dias_faltan,1,0,'L',1);
 $pdf->Cell($unidad,5,'',0,0);
 $pdf->Cell($unidad,5,'Inicio',1,0,'L',1);
 $pdf->Cell($unidad,5,'03-03-2003',1,1,'L',1);
 
 $pdf->Cell($unidad,5,'Dia a celebrar',1,0,'L',1);
 $pdf->Cell($unidad,5,$dia_celebrar,1,0,'L',1);
 $pdf->Cell($unidad,5,'',0,0);
 $pdf->Cell($unidad,5,'Hoy',1,0,'L',1);
 $fecha2[0] = date(d); $fecha2[1] = date(m); $fecha2[2] =date(Y);
 $pdf->Cell($unidad,5,$fecha2[0]."-".$fecha2[1]."-".$fecha2[2],1,1,'L',1);
 
 $pdf->Cell($unidad,5,'fecha a celebrar',1,0,'L',1);
	$fecha = suma_dias($dias_faltan);
 $pdf->Cell($unidad,5,$fecha,1,0,'L',1);
 $pdf->Cell($unidad,5,'',0,0);
 $pdf->Cell($unidad,5,'Corridos',1,0,'L',1);
	$fecha1[0] = "03"; $fecha1[1] = "03"; $fecha1[2] = "2003";
 $pdf->Cell($unidad,5,calcular_dias_fecha($fecha2, $fecha1),1,1,'L',1);
 
 $pdf->Cell($unidad,5,'',0,0);
 $pdf->Cell($unidad,5,'',0,0);
 $pdf->Cell($unidad,5,'',0,0);
 $pdf->Cell($unidad,5,'Domingos',1,0,'L',1);
 $pdf->Cell($unidad,5,domingos(),1,1,'L',1);

 $pdf->Output('dias_trabajados_ventas_'.date("dmY").'.pdf','I');
 exit;
}
?>
<?php
session_start();

if (isset($_SESSION['user_admin'])){
	include('../../include/funciones_globales.php');
	conecta_bd("videoexpress");
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
 $pdf->setPrintFooter(false);
 $pdf->SetDisplayMode('real');
 //$pdf->SetTextColor(0, 0, 100, 0);
 $pdf->SetFillColor(154,190,220);
 #mpezar a contruir el PDF
 $pdf->Cell(0,5,'Recompra','LTB',0,'C');
 $pdf->SetFontSize(9);
 $pdf->Cell(0,5,'Reporte generado el '.date('Y-m-d h:i:s A '),'RTB',1,'R');
 $pdf->Ln(5);
  
 
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
   $pdf->Cell($unidad,5,'Totales',1,1,'L',1);
  
  $colorfila = 1; 
  $result = consulta_bd("recompra","*","4;;;;0/6");  
 	while ($row = mysql_fetch_object($result)){
 		if ($colorfila==0)		{
     $pdf->SetTextColor(255,255,255);
     $pdf->SetFillColor(154,190,220);
     $colorfila = 1; 
 		}
 		else		{
    $pdf->SetTextColor(0,0,0);
    $pdf->SetFillColor(255,255,255);
 			$colorfila = 0;
 		}
   
 		if($row->id == 1 || $row->id == 4) $t = "$ ";
 		else $t = "";
   $pdf->Cell($unidad,5,$row->item,1,0,'L',1);  
 		for($a=$inicio; $a<=$fin; $a++){
 			$fechar = "anio_$a";
    $pdf->Cell($unidad,5,$t.number_format($row->$fechar,0),1,0,'L',1);
 		}
  (($inicio+8)<$year)?$pdf->Cell(0,5,'',1,1):
   $pdf->Cell($unidad,5,$t.number_format($row->Totales,0),1,1,'L',1);  
  }
  $pdf->Ln(2);
  $inicio +=8;
 } 
 ###fin tabla###
 
 $pdf->SetTextColor(0,0,0); 
 $pdf->Ln(5);
 $r = 0; 
 $htmlimg = '<table><tr>';
 $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO); 
  
		for($a=2003; $a<=$year; $a++){   
		 $nameimag = "graficas/recompra_anio_$a.png";
   $htmlimg .= '<td><img src="'.$nameimag.'" alt="'.$nameimag.'"/></td>';
   $r++;
		if($r==3){
		 $htmlimg .= '</tr><tr>';
			$r = 0;
		}  
	} 
 
 $nameimag = "graficas/recompra_Totales.png";
 $htmlimg .= '<td><img src="'.$nameimag.'" alt="'.$nameimag.'"/></td>';
 
 $htmlimg .= '</tr></table>';
 $pdf->writeHTML($htmlimg,false,true,true,true);
 $pdf->Output('recompra_'.date("dmY").'.pdf','I');
 exit;

	recompra($an, "Total");
 }
?>
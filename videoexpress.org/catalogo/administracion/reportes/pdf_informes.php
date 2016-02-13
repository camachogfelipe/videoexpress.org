<?php
session_start();
// check session variable
if (isset($_SESSION['user_admin'])){
 //nos conectamos a la base de datos
 include ("../../include/funciones_globales.php");
 $conecta = conecta_bd("videoexpress");
 //nos conectamos a la tabla respectiva
 #-----------------------------
 #clase pdf
 require_once('tcpdf/config/lang/spa.php');
 require_once('tcpdf/tcpdf.php');
 #------------------------------------------
 #creo un objeto de la clase FPDF
 $pdf= new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT);
 #declaraciones de pagina
 $ancho = $pdf->getPageWidth();
 $unidad = ($ancho-(PDF_MARGIN_LEFT+PDF_MARGIN_RIGHT))/4;
 $pixel = 3.779527559;//1 mm es igual a 3.779527559 px
 
 $pdf->SetMargins(PDF_MARGIN_LEFT,PDF_MARGIN_TOP,PDF_MARGIN_RIGHT);
 $pdf->setHeaderData(PDF_HEADER_LOGO,$unidad*4);
 $pdf->setHeaderMargin(5);
 $pdf->AddPage();
 $pdf->SetFontSize(14);
 $pdf->setPrintHeader();
 $pdf->setPrintFooter(false);
 $pdf->SetDisplayMode('real');
 #mpezar a contruir el PDF
 $pdf->Ln(5);
 $pdf->Cell(0,5,'Informes generales','LTB',0,'C');
 $pdf->SetFontSize(8);
 $pdf->Cell(0,5,'Reporte generado el '.date('Y-m-d h:i:s A '),'RTB',1,'R'); 
 $pdf->SetFontSize(11);
 $pdf->Ln(5);
 #------------------------------------------
 
 $pdf->Cell($unidad*3,5,'Total peliculas enviadas a la fecha:','LRT',0,'L');
 $total_alquiladas = dato_columna("catalogo","SUM(alquilada)","2;alquilada;ASC;;");
 $total_alquiladas += 5957;
 $pdf->Cell($unidad,5,number_format($total_alquiladas,0,'',','),'RT',1,'L');
 
 $pdf->Cell($unidad*3,5,'Total del auditorio a la fecha:','LRT',0,'L');
 $total_auditorio = dato_columna("info_peliculas","SUM(auditorio_no)","-1;;;;");
 $pdf->Cell($unidad,5,number_format($total_auditorio,0,'',',').' personas','RT',1,'L');
 
 $tipo_auditorio = array('Familia','Iglesia','Edificación grupal','Edificación empresarial','Edificación personal','Jóvenes y niños','Radio evangelismo','Televangelismo','Online');
 for($a=0; $a<9; $a++){
	 $total_tipo_auditorio1 = dato_columna("info_peliculas","SUM(auditorio_no)","3;auditorio_no;desc;tipo_auditorio='$tipo_auditorio[$a]';");
	 $total_tipo_auditorio[$a] = number_format((($total_tipo_auditorio1*100)/$total_auditorio),2);
	 $pdf->Cell($unidad*2,5,'Total auditorio '.$tipo_auditorio[$a].':','LT',0,'L');
	 $pdf->Cell($unidad,5,number_format($total_tipo_auditorio1,0,'',','),'TR',0,'R');
	 $pdf->Cell($unidad,5,'('.$total_tipo_auditorio[$a].'%)','RT',1,'L');
 }
 //genera_grafica_reporte($tipo_auditorio,$total_tipo_auditorio);
 $year = date(Y);
	$mes = date(n);
	$dia = date(j);
 
 $pdf->Cell($unidad*3,5,'Total facturado en el presente año ('.$year.'):',1,0,'L');
 $pdf->Cell($unidad,5,'$ '.number_format(dato_columna("facturas","SUM(precio)","1;;;fecha_cancelada_mes>='1' and fecha_cancelada_mes<='12' and fecha_cancelada_anio='$year'"),0),1,1,'L');
 
 $pdf->Cell($unidad*3,5,'Total facturado en este mes ('.date(M).'): $ ',1,0,'L');
 $pdf->Cell($unidad,5,'$ '.number_format(dato_columna("facturas","SUM(precio)","1;;;fecha_cancelada_mes='$mes' and fecha_cancelada_anio='$year'"),0),1,1,'L');
 
 $pdf->Cell($unidad*3,5,'Total facturado en el día de hoy ('.$dia.'):',1,0,'L');
 $pdf->Cell($unidad,5,number_format(dato_columna("facturas","SUM(precio)","1;;;fecha_cancelada_dia='$dia' and fecha_cancelada_mes='$mes' and fecha_cancelada_anio='$year'"),0),1,1,'L');
 $pdf->Cell($unidad*3,5,'Total facturas generadas en el presente año ('.$year.') con Videoexpress:',1,0,'L');
 $pdf->Cell($unidad,5,number_format(dato_columna("facturas","COUNT(id_factura)","1;;;fecha_cancelada_mes>='1' and fecha_cancelada_mes<='12' and fecha_cancelada_anio='$year'"),0),1,1,'L');
 $pdf->Cell($unidad*3,5,'Total facturas generadas en este mes ('.date(M).'):',1,0,'L');
 $pdf->Cell($unidad,5,number_format(dato_columna("facturas","COUNT(id_factura)","1;;;fecha_cancelada_mes='$mes' and fecha_cancelada_anio='$year'"),0),1,1,'L');
 $pdf->Cell($unidad*3,5,'Total facturas generadas en el día de hoy ('.$dia.'):',1,0,'L');
 $pdf->Cell($unidad,5,number_format(dato_columna("facturas","COUNT(id_factura)","1;;;fecha_cancelada_dia='$dia' and fecha_cancelada_mes='$mes' and fecha_cancelada_anio='$year'"),0),1,1,'L');
 $pdf->Cell($unidad*3,5,'Total facturas que no han devuelto las peliculas:',1,0,'L');
 $pdf->Cell($unidad,5,number_format(dato_columna("info_fac_videx","COUNT(devueltas)","1;;;devueltas='no'"),0),1,1,'L');
// $pdf->Cell($unidad*3,5,'',1,0,'L');
// $pdf->Cell($unidad,5,,1,1,'L');
 
 
 #----------------------------
 $pdf->Cell(0,0,'',1);
 $pdf->Ln(10);
 $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
 $nameimag = "graficas/tipo_auditorio1.png";
 
 $pdf->writeHTML('<img src="'.$nameimag.'" alt="'.$nameimag.'" width="'.(($unidad*4)*$pixel).'" />',1,1,1,1,'J'); 
 //$pdf->Image($nameimag,30,120,$unidad*2,79.375,'png', '', 'J');
 $pdf->Output('informes_'.date("dmY").'.pdf','I');
 exit;
}

?>

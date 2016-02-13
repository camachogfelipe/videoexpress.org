<?php
   $meses_txt=array("","Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio", "Agosto","Septiembre","Octubre","Noviembre","Diciembre");
   $dias_txt=array("L","M","M","J","V","S","D");

   // Función que transforma el dia de la semana para que el 0 sea el lunes y
   // el 6 el domingo
   function actualiza_dia_semana($dia){
     return ($dia>0)?$dia-1:6;
   }
   // Función que informa si un día pertenece al fin de semana
   function festivo($dia){
     return ($dia>4)?true:false;
   }

 ?>
 <center>
     <?php
       $hoy=getdate();
       $dia=$hoy[mday];
       $mes=$hoy[mon];
       $anio=$hoy[year];
	  // obtenemos el día de la semana del primer día del mes
	  $primer_dia=actualiza_dia_semana(date("w",mktime(0,0,0,$mes,1,$anio)));
      // obtenemos el último día del mes
	  $ultimo_dia=date("t",mktime(0,0,0,$mes,1,$anio));
?>
      <TABLE BORDER='0' CELLPADDING='0' CELLSPACING='0' WIDTH='280px' height='245'>
       <TR style='background:url(../imagenes/Imagenes%20de%20edicion/calendario_cab1.png) no-repeat'>
        <TD COLSPAN='7' height='23' align='right' style='padding-right: 10px'><?php echo $meses_txt[$mes]." ".$anio ?></TD>
       </TR>
       <TR height='22' style='background:url(../imagenes/Imagenes%20de%20edicion/calendario_cab2.png) no-repeat'>
       <?php for ($i=0; $i<7; $i++) { ?>
			<TD align="center"><?php echo $dias_txt[$i] ?></TD>
       <?php } ?>
      </TR>
      <TR style='background:url(../imagenes/Imagenes%20de%20edicion/calendario_cuerpo1.png) no-repeat'>
	  <?php
      $contador_de_dias=1;
	  $a = 2;
      while ($contador_de_dias <= $ultimo_dia)
	  {
         for ($i=0; $i<7; $i++)
		 {
            if ($i < $primer_dia || $contador_de_dias > $ultimo_dia)
			{
				echo "<TD height=\"40px\" align=\"center\" valign=\"middle\">&nbsp;</TD>";
			}
            else
			{
				echo "<TD height=\"40px\" align=\"center\" valign=\"middle\"";
				if($contador_de_dias==$dia) echo " style='background:url(../imagenes/Imagenes%20de%20edicion/activo.png) no-repeat; color: #006699'";
				if(festivo($i)) echo " style='color: #006699'";
				echo ">$contador_de_dias</TD>";
                $contador_de_dias++;
            }
		 }
		 // la siguiente semana comienza por lunes (dia 0)   
         $primer_dia=0;
		 echo "</TR><TR style='background:url(../imagenes/Imagenes%20de%20edicion/calendario_cuerpo$a.png) no-repeat'>"; $a++;
      } ?>
      </TABLE>
</center>
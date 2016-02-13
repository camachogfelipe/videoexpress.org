<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
<link href="../libroexpress.css" rel="stylesheet" type="text/css" />
</head>

<body>
<center>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
   <tr>
    <td height="100%">
     <table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0" style="background: url(../imagenes/texturas/textura%20papel2.png) 0% 0% repeat">
      <tr>
       <td width="37" rowspan="2" style="background: url(../imagenes/Imagenes%20de%20edicion/espiral2.png) repeat-y">&nbsp;</td>
       <td style="background:url(../imagenes/Imagenes%20de%20edicion/linea_cuaderno.png)" valign="top">
        <iframe frameborder="0" name="mostrar" id="mostrar" src="ninos2.php" AllowTransparency scrolling="auto" style="border: 0px; border-style:none; width:99%; height:385px">Su explorador no soporta frames, por favor actualicelo
      </iframe>
       </td>
      </tr>
      <tr>
	<td height="50" align="center" valign="middle">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td align="center">
           <table cellpading="0" cellspacing="0" border="0" width="80%" align="center">
            <tr>
             <td width="8%" align="left"><img src="../imagenes/iconos/tips.png" width="50" height="50" align="absmiddle" /></td>
             <td width="92%" align="center" id="informacion_gral" style="font-size: 14px">
		      <?php
		  		include('../administracion/conexion.php');
				conecta_bd("libroexpress");
				$sql = "select tip FROM tips WHERE categoria = 'Niños'";
				$result = mysql_query($sql) or die("La siguiente consulta contiene alg&uacute;n error:<br>nSQL: <b>$sql</b>");
				$total_resultados = mysql_num_rows($result);

				$i = 0;
				while ($row = mysql_fetch_object($result))
				{
					$tip[$i] = $row->tip;
					$i++;
				}
	
				$i--;
				$tmp = rand(0, $i);

				echo " ".$tip[$tmp];
		      ?>
	         </td>
	        </tr>
           </table>
	      </td>
          <td width="110"><img src="../imagenes/Imagenes de edicion/logoprovisional.png" width="100" height="37" style="margin-right: 10px" /></td>
        </tr>
      </table>
    </td>
      </tr>
     </table>
    </td>
    <td width="101" align="center" valign="top">
     <table width="100%" border="0" cellspacing="0" cellpadding="0">
  	  <tr valign="middle" align="center">
    	<td height="40" background="../imagenes/Botones derechos/ninosderecho-01.png" class="menu_derecho"><a href="resultados.php?cat_gral=Ni&#241;os&cat_esp=Biblias y Devocionales&pag=1" target="mostrar">Biblias y Devocionales</a></td>
  	  </tr>
	  <tr valign="middle" align="center">
	    <td height="40" background="../imagenes/Botones derechos/ninosderecho-02.png" class="menu_derecho"><a href="resultados.php?cat_gral=Ni&#241;os&cat_esp=Peque&#241;as ense&#241;anzas&pag=1" target="mostrar">Peque&ntilde;as ense&ntilde;anzas</a></td>
	  </tr>
	  <tr valign="middle" align="center">
	    <td height="40" background="../imagenes/Botones derechos/ninosderecho-02.png" class="menu_derecho"><a href="resultados.php?cat_gral=Ni&#241;os&cat_esp=Didacticos&pag=1" target="mostrar">Did&aacute;cticos</a></td>
	  </tr>
	  <tr valign="middle" align="center">
	    <td height="40" background="../imagenes/Botones derechos/ninosderecho-02.png" class="menu_derecho"><a href="resultados.php?cat_gral=Ni&#241;os&cat_esp=Cuentos y cartillas&pag=1" target="mostrar">Cuentos y cartillas</a></td>
	  </tr>
	 </table>
    </td>
   </tr>
  </table>
</center>
</body>
</html>
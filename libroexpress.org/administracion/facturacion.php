<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin título</title>
<script>
//Pon en la variable obligatorios el name de todos los campos que deben rellenar

obligatorio = ["No_minimo", "No_maximo", "No_resolucion", "dia", "mes", "anio"];

//Pon en la veriable textoObligatorio el texto que quieres que aparezca en el alert

textoObligatorio=["Factura del", "Factura al", "No. resoluci&oacute;n", "d&iacute;a", "mes", "Año"];

function comprobar(este)
{
   for(a=0; a<obligatorio.length; a++)
   {
      if(este.elements[obligatorio[a]].value == "")
      {
         alert("Por favor, rellena el campo "+textoObligatorio[a]);
         este.elements[obligatorio[a]].focus();
         return false;
      }
   }
   return true;
}
</script>
<link href="estilo_admin.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php
  if (isset($_SESSION['valid_user']))
  {
     $actualizar     = $_REQUEST['actualizar'];
     $factura_del    = $_REQUEST['No_minimo'];
     $factura_al     = $_REQUEST['No_maximo'];
     $resolucion_dian   = $_REQUEST['No_resolucion'];
     $factura_actual = $_REQUEST['factura_actual'];
     $dia            = $_REQUEST['dia'];
     $mes            = $_REQUEST['mes'];
     $anio           = $_REQUEST['anio'];
     $fecha_res_dian = "$anio-$mes-$dia";
     
     include('conexion.php');
	 conecta_bd("libroexpress");

     if ($actualizar == NULL)
     {
         $query = mysql_query("SELECT factura_del, factura_al, resolucion_dian, fecha_res_dian, factura_actual FROM datos");
         While($row=mysql_fetch_object($query))
        {
           //Mostramos los titulos de los articulos o lo que deseemos...
           $No_min_ant = $row->factura_del;
           $No_max_ant = $row->factura_al;
           $resolucion_ant = $row->resolucion_dian;
           $fecha_resolucion_ant = $row->fecha_res_dian;
           $factura_actual = $row->factura_actual;
        }
        $fact_max = $No_max_ant - 10;
        if($factura_actual >= $fact_max) $advertencia = true;
        else $advertencia = false;
     }
     else
     {
        //ejecutamos la operacion
        $query = "UPDATE datos SET factura_del='$factura_del', factura_al='$factura_al', resolucion_dian='$resolucion_dian', fecha_res_dian='$fecha_res_dian'";
        mysql_query($query) or die(mysql_error());
        $No_min_ant = $factura_del;
        $No_max_ant = $factura_al;
        $resolucion_ant = $resolucion_dian;
        $fecha_resolucion_ant = $fecha_res_dian;
        $insertado = true;
     }
?>
<table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="20"><img src="imagenes/redondo_sup_izq.png" width="20" height="20" /></td>
    <td background="imagenes/linea_superior.png">&nbsp;</td>
    <td width="20"><img src="imagenes/redondo_sup_der.png" width="20" height="20" /></td>
  </tr>
  <tr>
    <td style="background:url(imagenes/linea_vertical_izq.png) repeat-y">&nbsp;</td>
    <td bgcolor="#ebebeb">
    <?php if($advertencia == true) echo "<center><div id=\"informacion_gral\"><img src=\"imagenes/informacion.png\" width=\"25\" height=\"25\" align=\"absmiddle\" /> Se est&aacute; llegando al rango m&aacute;ximo de facturaci&oacute;n, por favor pedir nuevo rango de facturas</div></center>"; ?>
     <table width="100%" border="0" cellspacing="2" cellpadding="0">
       <tr>
         <td width="37%">Rango actual de numeraci&oacute;n</td>
         <td width="63%">Factura del <?php echo "<span id=\"informacion_gral\">".$No_min_ant."</span>"; ?> al <?php echo "<span id=\"informacion_gral\">".$No_max_ant."</span>"; ?></td>
       </tr>
       <tr>
         <td>Resoluci&oacute;n DIAN actual</td>
         <td><?php echo "<span id=\"informacion_gral\">".$resolucion_ant."</span>"; ?></td>
       </tr>
       <tr>
         <td>Fecha de la resoluci&oacute;n actual</td>
         <td><?php echo "<span id=\"informacion_gral\">".$fecha_resolucion_ant."</span>"; ?></td>
       </tr>
       <tr>
         <td>N&uacute;mero de factura actual</td>
         <td><?php echo "<span id=\"informacion_gral\">".$factura_actual."</span>"; ?></td>
       </tr>
     </table>
     <form action="facturacion.php?actualizar=true&factura_actual=<?php echo $factura_actual; ?>" method="post" enctype="multipart/form-data" name="facturacion" onSubmit="return comprobar(this)">
     <table width="100%" border="0" cellspacing="2" cellpadding="0">
      <tr>
        <td width="29%">Rango numeraci&oacute;n</td>
        <td width="71%">Factura del <input name="No_minimo" type="text" id="No_minimo" tabindex="1" size="20" /> al <input name="No_maximo" type="text" id="No_maximo" tabindex="2" size="20" />
        </td>
      </tr>
      <tr>
        <td>Resoluci&oacute;n DIAN No.</td>
        <td><input name="No_resolucion" type="text" id="No_resolucion" tabindex="3" size="30" /></td>
      </tr>
      <tr>
        <td>Fecha de la resoluci&oacute;n</td>
        <td>D&iacute;a <select name="dia" id="dia" tabindex="4">
          <?php
          for ($i=1; $i<=31; $i++)
          {
             if($i == 1) echo "<option value=\"$i\" selected=\"selected\">$i</option>";
             else echo "<option value=\"$i\">$i</option>";
          }
          ?>
          </select> mes <select name="mes" id="mes" tabindex="5">
            <option value="1" selected="selected">Enero</option>
            <option value="2">Febrero</option>
            <option value="3">Marzo</option>
            <option value="4">Abril</option>
            <option value="5">Mayo</option>
            <option value="6">Junio</option>
            <option value="7">Julio</option>
            <option value="8">Agosto</option>
            <option value="9">Septiembre</option>
            <option value="10">Octubre</option>
            <option value="11">Noviembre</option>
            <option value="12">Diciembre</option>
          </select> a&ntilde;o <select name="anio" id="anio" tabindex="6">
              <option value="2009">2009</option>
            </select>
          </td>
      </tr>
     </table>
     <table width="100%" border="0" cellspacing="0" cellpadding="0">
       <tr>
         <td width="50%" align="right"><a href="javascript:document.facturacion.reset()"><img src="imagenes/limpiar.png" width="100" height="25" border="0" /></a></td>
         <td width="50%"><input type="image" src="imagenes/acceder.png" name="submit" id="submit" tabindex="8" /></td>
       </tr>
     </table>
     </form>
     <center>
     <?php if($insertado == true) echo "<div id=\"informacion_gral\"><img src=\"imagenes/informacion.png\" width=\"25\" height=\"25\" align=\"absmiddle\" /> Se ha actualizado la informaci&oacute;n de la facturaci&oacute;n</div>"; ?>
     </center>
    </td>
    <td style="background:url(imagenes/linea_vertical_der.png) repeat-y">&nbsp;</td>
  </tr>
  <tr>
    <td><img src="imagenes/redondo_inf_izq.png" width="20" height="20" /></td>
    <td background="imagenes/linea_inferior.png">&nbsp;</td>
    <td><img src="imagenes/redondo_inf_der.png" width="20" height="20" /></td>
  </tr>
</table>
</body>
</html>
<?php
}
else
{
   include ('index.php');
}
?>

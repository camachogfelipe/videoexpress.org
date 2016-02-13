<?php
$sql1 = "SELECT COUNT(*) FROM $tabla WHERE categoria_general = '$cat_gral' and categoria_especifica = '$cat_esp'";
$result1 = mysql_query($sql1) or die("La siguiente consulta contiene algún error:<br>nSQL: <b>$sql</b>");
$total_resultados = mysql_fetch_array($result1);

$atras     = "<img src=\"../imagenes/Imagenes de edicion/izq.png\" width=\"36\" height=\"36\" border=\"0\" alt=\"Anterior\" title=\"Anterior\" />";
$adelante = "<img src=\"../imagenes/Imagenes de edicion/der.png\" width=\"36\" height=\"36\" border=\"0\" alt=\"Siguiente\" title=\"Siguiente\" />";

$No_items = $total_resultados[0];
$total_paginas = ceil($No_items / 6);
if ($No_items == 0) $pag = 0;
$anterior = $pag - 1;
$siguiente = $pag + 1;

if ($anterior < 1) $links['anterior'] = $atras;
else $links['anterior'] = "<a href=\"resultados.php?pag=$anterior&cat_gral=$cat_gral&cat_esp=$cat_esp\">".$atras."</a> ";
if ($siguiente > $total_paginas) $links['siguiente'] = $adelante;
else $links['siguiente'] = "<a href=\"resultados.php?pag=$siguiente&cat_gral=$cat_gral&cat_esp=$cat_esp\">".$adelante."</a> ";

if($status == true) $mensaje = "<img src=\"../imagenes/Imagenes de edicion/informacion.png\" width=\"25\" height=\"25\" alt=\"Información\" title=\"Información\" border=\"0\" align=\"absmiddle\" /><span id=\"informacion_gral\">Su libro $titulo_a ha sido agregado al carrito de la compra</span>";
else $mensaje = "";

echo "
<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
  <tr>
    <td width=\"33%\">$mensaje</td>
    <td width=\"34%\">
    <table width=\"116\" height=\"44\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">
      <tr>
        <td width=\"36\" align=\"center\" valign=\"middle\">".$links['anterior']."</td>
        <td width=\"44\" align=\"center\" valign=\"top\" style=\"background:url(../imagenes/Imagenes%20de%20edicion/circulo_resultados.png) center no-repeat\">
         <table width=\"44\" height=\"40\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">
          <tr>
            <td width=\"50%\" align=\"right\" valign=\"bottom\" title=\"P&aacute;gina: $pag\">".$pag."</td>
            <td width=\"50%\">&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td align=\"left\" valign=\"top\" title=\"Total paginas: $total_paginas\">".$total_paginas."</td>
          </tr>
         </table>
        </td>
        <td width=\"36\" align=\"center\" valign=\"middle\">".$links['siguiente']."</td>
      </tr>
     </table>
   </td>
    <td width=\"33%\"><span id=\"informacion_gral\">Hay $No_items libros de $cat_esp</span></td>
  </tr>
</table>";
?>

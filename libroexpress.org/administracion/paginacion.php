<?php
if($tabla == "facturas LEFT JOIN dolar_fac_libro USING (`id_factura`)")
	$sql1 = "SELECT COUNT(*) FROM $tabla where Pertenece_a='libro'";
else $sql1 = "SELECT COUNT(*) FROM $tabla";
$result1 = mysql_query($sql1) or die("La siguiente consulta contiene algún error:<br>nSQL: <b>$sql</b>");
$total_resultados = mysql_fetch_array($result1);

$atras = "<img src=\"imagenes/botonatras15x15.png\" width=\"15\" height=\"15\" align=\"absmiddle\" border=\"0\" /> Anterior p&aacute;gina";
$adelante = "Siguiente p&aacute;gina <img src=\"imagenes/botonadelante15x15.png\" width=\"15\" height=\"15\" align=\"absmiddle\" border=\"0\" />";

$No_items = $total_resultados[0];
$total_paginas = ceil($No_items / $lis);
$anterior = $pag - 1;
$siguiente = $pag + 1;
$ultimo = ($total_paginas - 1) * $lis;

$tmp = $y + $lis;

if ($No_items == 0) $al_x = 0;
elseif ($No_items < $tmp) $al_x = $No_items;
else $al_x = $y + $lis;

$y++;

if ($anterior < 1) $links['anterior'] = $atras;
else $links['anterior'] = "<a href=\"$pagina.php?ord=$x&pag=$anterior\">".$atras."</a> ";
if ($siguiente > $total_paginas) $links['siguiente'] = $adelante;
else $links['siguiente'] = "<a href=\"$pagina.php?ord=$x&pag=$siguiente\">".$adelante."</a> ";

echo "Mostrando del $y al $al_x de $No_items<br />";
echo $links['anterior']." ".$links['primero']." ";
if ($total_paginas == 0) $total_paginas = 1;

$a = $pag - 5;
$b = $pag + 5;
if($a < 1)
{
	$a = 1;
	$b = 10;
}
if($b > $total_paginas)
{
	$b = $total_paginas;
	$a = $total_paginas -10;
	if ($a < 1) $a = 1;
}

for ($i=$a; $i<=$b; $i++)
{
	$links['numero_act'] = "<a href=\"$pagina.php?ord=$x&pag=$i\">$i </a> ";
	$links['numero_inact'] = "<span id=\"encabezado_tablas\">$i</span> ";
	if ($i == $pag) echo $links['numero_inact'];
	else echo $links['numero_act'];
}
echo "&nbsp;".$links['siguiente'];
echo "<form id=\"form1\" name=\"form1\" method=\"post\" action=\"$pagina.php\" style=\"float: right; margin-top: -10px; background-color: #ccc\">
  <span style=\"color: #000\">Ir a la p&aacute;gina </span><input name=\"pag\" type=\"text\" id=\"pag\" tabindex=\"1\" size=\"5\" />
</form>";
?>
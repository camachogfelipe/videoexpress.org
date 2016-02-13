<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin título</title>
</head>

<body>
<?php
if ($iframe == true)
{
	echo "<iframe frameborder=\"0\" name=\"enlaces\" id=\"enlaces\" src=\"$enlace\" scrolling=\"auto\" style=\"border: 0px none; border-style:none none none none; width:100%; height:650px\">Su explorador no soporta frames, por favor actualicelo</iframe>";
}
else
{
	echo "<ul id=\"lista\"  class=\"menu_enlaces\">
			<li><a href=\"?ac=6&iframe=true&enlace=http://www.worldmathday.com/\">World Math Day</a></li>
			<li><a href=\"?ac=6&iframe=true&enlace=http://www.ecopibes.com/\">Ecopibes</a></li>
 			<li><a href=\"?ac=6&iframe=true&enlace=http://www.abchicos.com.ar/abchicos/\">AbcChicos</a></li>
 			<li><a href=\"?ac=6&iframe=true&enlace=http://www.cienciafacil.com/\">Ciencia Fácil</a></li>
			<li><a href=\"?ac=6&iframe=true&enlace=http://www.astronomiamoderna.com.ar/\">Astronom&iacute;a Moderna</a></li>
			<li><a href=\"?ac=6&iframe=true&enlace=http://www.planetariodebogota.gov.co/\">Planetario de Bogot&aacute;</a></li>
			<li><a href=\"?ac=6&iframe=true&enlace=http://www.planetario.gov.ar/indexnuevo.htm\">Planetario de Argentina</a></li>
			<li><a href=\"?ac=6&iframe=true&enlace=http://www.rompecocos.com/default2.html\">Rompecocos</a></li>
			<li><a href=\"?ac=6&iframe=true&enlace=http://www.maloka.org/\">Maloka</a></li>
			<li><a href=\"?ac=6&iframe=true&enlace=http://www.tudiscovery.com/como_hacen1/index.shtml\">¿C&oacute;mo lo hacen?</a></li>
			<li><a href=\"?ac=6&iframe=true&enlace=http://www.lablaa.org/para_ninos_digital.htm\">Solo para ni&ntilde;os</a></li>
			<li><a href=\"?ac=6&iframe=true&enlace=http://www.lablaa.org/blaavirtual/ninos/quimbaya/quimbaya.htm\">As&iacute; eramos los Quimbayas</a></li>
		</ul>";
}
?>
</body>
</html>
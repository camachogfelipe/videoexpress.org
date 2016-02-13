<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<?php
switch ($ac)
{
	case 1 	: $titulo_menu = "Bienvenido(a)";
			  $texto_img_titulo = "background=\"imagenes/barratitulo.png\" height=\"57\"";
			  $nino = "n";
			  $enlaces = "";
			  pinta_tabla($titulo_menu, $texto_img_titulo, $nino, $enlaces);
			  break;
	case 2 	: $titulo_menu = "&#191;Quiénes<br /><br />somos?";
			  $texto_img_titulo = "background=\"imagenes/titulocompleta.png\" height=\"102\"";
			  $nino = "quienesnina";
			  $enlaces = "<li><a href=\"#rh\">Rese&ntilde;a histórica</a></li>
	 <li><a href=\"#propositos\">Propósitos</a></li>
 	 <li><a href=\"#mision\">Misi&oacute;n</a></li>
 	 <li><a href=\"#vision\">Visi&oacute;n</a></li>";
			  pinta_tabla($titulo_menu, $texto_img_titulo, $nino, $enlaces);
			  break;
	case 3 	: $titulo_menu = "&#191;Dónde<br /><br />estamos?";
			  $texto_img_titulo = "background=\"imagenes/titulocompleta.png\" height=\"102\"";
			  $nino = "dondenina";
			  $enlaces = "";
			  pinta_tabla($titulo_menu, $texto_img_titulo, $nino, $enlaces);
			  break;
	case 4	: $titulo_menu = "Informaci&#243;n<br /><br />institucional";
			  $texto_img_titulo = "background=\"imagenes/titulocompleta.png\" height=\"102\"";
			  $nino = "infonino";
			  $enlaces = "<li><a href=\"#escudo\">Escudo</a></li>
	 <li><a href=\"#eslogan\">Eslogan</a></li>
 	 <li><a href=\"#pe\">Proyecto educativo</a></li>
 	 <li><a href=\"#np\">Naturaleza del proyecto</a></li>
	 <li><a href=\"#fi\">Fines institucionales</a></li>
	 <li><a href=\"#pi\">Principios institucionales</a></li>
	 <li><a href=\"#ri\">Referentes institucionales</a></li>
	 <li><a href=\"#csh\">Caracterizaci&oacute;n del ser<br />humano</a></li>
	 <li><a href=\"#cce\">Caracterizaci&oacute;n de la<br />comunidad educativa</a></li>";
			  pinta_tabla($titulo_menu, $texto_img_titulo, $nino, $enlaces);
			  break;
	case 5 	: $titulo_menu = "Contáctenos";
			  $texto_img_titulo = "background=\"imagenes/barratitulo.png\" height=\"57\"";
			  $nino = "contactonino";
			  $enlaces = "<li><a id=\"gmail\" href=\"https://www.google.com/a/liceoanglocolombiano.edu.co\" target=\"_blank\"><img src=\"imagenes/gmail.png\" width=\"32\" height=\"32\" align=\"absmiddle\" border=\"0\" />&nbsp;&nbsp;&nbsp;Ingresa a tu<br />cuenta de correo</a>";
			  pinta_tabla($titulo_menu, $texto_img_titulo, $nino, $enlaces);
			  break;
	case 6 	: $titulo_menu = "Enlaces para<br /><br />los m&#225;s chicos";
			  $texto_img_titulo = "background=\"imagenes/titulocompleta.png\" height=\"102\"";
			  $nino = "profe";
			  $enlaces = "<li><a href=\"?ac=6&iframe=true&enlace=http://www.worldmathday.com/\">World Math Day</a></li>
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
	 <li><a href=\"?ac=6&iframe=true&enlace=http://www.lablaa.org/blaavirtual/ninos/quimbaya/quimbaya.htm\">As&iacute; eramos los Quimbayas</a></li>";
			  pinta_tabla($titulo_menu, $texto_img_titulo, $nino, $enlaces);
			  break;
	case 7 	: $titulo_menu = "Galería<br /><br />de imágenes";
			  $texto_img_titulo = "background=\"imagenes/titulocompleta.png\" height=\"102\"";
			  $nino = "nina";
			  $enlaces = "";
			  pinta_tabla($titulo_menu, $texto_img_titulo, $nino, $enlaces);
			  break;
	case 8 	: $titulo_menu = "Información<br /><br />general";
			  $texto_img_titulo = "background=\"imagenes/titulocompleta.png\" height=\"102\"";
			  $nino = "papa";
			  $enlaces = "";
			  pinta_tabla($titulo_menu, $texto_img_titulo, $nino, $enlaces);
			  break;
	case 9  : $titulo_menu = "Al<br /><br />Tablero";
			  $texto_img_titulo = "background=\"imagenes/titulocompleta.png\" height=\"102\"";
			  $nino = "papa";
			  include("administracion/conexion.php");
			  $query = mysql_query("SELECT DISTINCT(curso) FROM alumnos ORDER BY curso ASC");
			  $enlaces = "<ul>";
			  while($row=mysql_fetch_object($query))
			  {
				  $enlaces .= "<li>Curso ".$row->curso."</li>";
				  $query2 = mysql_query("SELECT DISTINCT(alumno) FROM alumnos WHERE curso='$row->curso' ORDER BY alumno ASC");
				  $enlaces .= "<ul>";
				  while($row2=mysql_fetch_object($query2))
				  {
					  $enlaces .= '<li id="tablero"><a href="?ac=9&a='.$row2->alumno.'&c='.$row->curso.'">'.$row2->alumno.'</a></li>';
				  }
				  $enlaces .= "</ul>";
			  }
			  $enlaces .= "</ul>";
			  pinta_tabla($titulo_menu, $texto_img_titulo, $nino, $enlaces);
			  break;
	default : $titulo_menu = "Bienvenido(a)";
			  $texto_img_titulo = "background=\"imagenes/barratitulo.png\" height=\"57\"";
			  $nino = "n";
			  $enlaces = "";
			  pinta_tabla($titulo_menu, $texto_img_titulo, $nino, $enlaces);
			  break;
}

function pinta_tabla($titulo_menu, $texto_img_titulo, $nino, $enlaces)
{
	echo "
<div id=\"menu_izq\">
 <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
  <tr>
   <td $texto_img_titulo style=\"color: #fff; font-size: 24px\"><span style=\"margin-left: 5px\">$titulo_menu</span></td>
  </tr>
  <tr>
   <td background=\"imagenes/barra_morada_sombra_superior.png\" height=\"14\">&nbsp;</td>
  </tr>
  <tr>
   <td background=\"imagenes/barra_morada_sombra_medio.png\" height=\"14\">
    <ul id=\"menu_morado\">
 	 $enlaces
	</ul>
   </td>
  </tr>
  <tr>
   <td background=\"imagenes/barra_morada_sombra_inferior.png\" height=\"25\">&nbsp;</td>
  </tr>
  <tr>
   <td height=\"350\" style=\"background:url(imagenes/$nino.png) no-repeat\">&nbsp;</td>
  </tr>
 </table>
</div>";
}
?>
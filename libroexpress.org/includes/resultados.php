<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>resultados</title>
<script type="text/javascript" src="../scripts/mootools1.11.js"></script>
<script type="text/javascript" src="../scripts/overlay.js"></script>
<script type="text/javascript" src="../scripts/multibox.js"></script>
<link href="../scripts/multibox.css" rel="stylesheet" type="text/css" />
<link href="../libroexpress.css" rel="stylesheet" type="text/css" />
</head>

<body style="margin-top: 10px">
<?php
$cat_gral = $_REQUEST['cat_gral'];
$cat_esp  = $_REQUEST['cat_esp'];
$pag    = $_REQUEST['pag'];
$status    = $_REQUEST['status'];
$titulo_a = $_REQUEST['titulo'];
if ($pag <= 0) $pag = 0;
else $pag -= 1;

$y = $pag * 6;

include('../administracion/conexion.php');
conecta_bd("libroexpress");

//definimos las variables para la paginacion
$tabla = "libros";
$pagina = "resultados";
//nos conectamos a la tabla respectiva
$sql = "select id, titulo, autor, editorial, precio_dolares, imagen_caratula, en_promocion, porcentaje_promocion, articulo_promocion FROM libros WHERE categoria_general = '$cat_gral' and categoria_especifica = '$cat_esp' ORDER BY (titulo) ASC LIMIT $y, 6";
$result = mysql_query($sql) or die("La siguiente consulta contiene alg&uacute;n error:<br>nSQL: <b>$sql</b>");
$i = 1;
$pag++;
while ($row = mysql_fetch_object($result))
{
   $id = $row->id;
   $titulo = $row->titulo;
   $autor   = $row->autor;
   $editorial = $row->editorial;
   $precio_dolares = $row->precio_dolares;
   $imagen = $row->imagen_caratula;
   $en_promocion        = $row->en_promocion;
   $porcentaje_promocion = $row->porcentaje_promocion;
   $articulo_promocion = $row->articulo_promocion;
   include('../administracion/pesos.php');
   if ($en_promocion == 'Si')
   {
      //determinamos el tipo de promocion
      if ($porcentaje_promocion != 0)
      {
         include('calcular_promocion.php');
         $promocion = true;
         $art_promo = false;
      }
      else
      {
         $art_promo = true;
      }
   }
   else
   {
      $promocion = false;
      $art_promo = false;
   }

   echo "<table width=\"255\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" id=\"resultados\" class=\"margen_resultados\">";
   echo "<tr>";
   echo "<td width=\"105\" align=\"center\"><img src='../imagenes_libros/$imagen' width='100px' height='145px' align=\"center\" ></td>";
   echo "<td width=\"150\" valign=\"top\">";
   echo "<span id=\"informacion_gral\">$titulo</span><br />";
   echo "<span id=\"informacion_gral\">Autor: </span>$autor<br />";
   echo "<span id=\"informacion_gral\">Editorial: </span>$editorial<br />";
   //determinamos como se muestran los precios
   if ($promocion == true)
   {
      echo "<span id=\"informacion_gral\">precio (\$US): </span><span id=\"precio_promo\">".number_format($precio_dolares, 2)."</span> ";
      echo number_format($precio_pos_dolar, 2)."<br />";
      echo "<span id=\"informacion_gral\">precio (\$CO): </span><span id=\"precio_promo\">".number_format($pesos)."</span> ";
      echo "<span id=\"informacion_gral\">".number_format($precio_pos_pesos)."</span><br />";
   }
   else
   {
      echo "<span id=\"informacion_gral\">precio (\$US): </span>".number_format($precio_dolares, 2)."<br />";
      echo "<span id=\"informacion_gral\">precio (\$CO): ".number_format($pesos)."</span><br />";
      if ($art_promo == true) echo "<span id=\"informacion_gral\">Art&iacute;culo de promoci&oacute;n: </span>".$articulo_promocion."<br />";
   }
   echo "<a href=\"libro.php?id=$id\" rel=\"width:700,height:250\" id=\"mb$i\" class=\"mb\" title=\"".$titulo."\"><img src=\"../imagenes/Imagenes de edicion/ver.png\" width=\"15\" height=\"15\" alt=\"Ver m&#225;s informaci&#243;n\" title=\"Agregar al carrito\" border=\"0\" align=\"absmiddle\" /><span style=\"color:#000\">Ver m&#225;s >></span></a>";
   echo "<br /><a href=\"agregacar.php?&id=".$id."&pag=".$pag."&cat_gral=".$cat_gral."&cat_esp=".$cat_esp."&pagina=resultados&status=true\"><span style=\"color:#000\"><img src=\"../imagenes/Imagenes de edicion/agregar.png\" width=\"15\" height=\"15\" alt=\"Agregar al carrito\" title=\"Agregar al carrito\" border=\"0\" align=\"absmiddle\" /> Agregar al carrito</span></a>";
   echo "<div class=\"multiBoxDesc mb$i\">".$autor."</div>";
   echo "</td>";
   echo "</tr>";
   echo "</table>";
   $promocion = false;
   $art_promo = false;
   $i++;
}
echo "<div id=\"paginacion\">";
include('paginacion.php');
echo "</div>";
?>
<script type="text/javascript">
//-->
var box = {};
         window.addEvent('domready', function(){
            box = new MultiBox('mb', {descClassName: 'multiBoxDesc', useOverlay: true});
         });
</script>
</body>
</html>

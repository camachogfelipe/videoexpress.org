<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&#195;&#173;tulo</title>
<script type="text/javascript" src="../scripts/mootools1.11.js"></script>
<script type="text/javascript" src="../scripts/overlay.js"></script>
<script type="text/javascript" src="../scripts/multibox.js"></script>
<link href="../scripts/multibox.css" rel="stylesheet" type="text/css" />
<link href="../libroexpress.css" rel="stylesheet" type="text/css" />
</head>

<body style=\"margin-top: 10px\">
<?php
include('../administracion/conexion.php');
conecta_bd("libroexpress");

$texto_busqueda = $_REQUEST['texto_busqueda'];
$lugar_busqueda = $_REQUEST['lugar_busqueda'];

if ($texto_busqueda != NULL)
{
   //se establece el formato de busqueda
   if ($lugar_busqueda != 'todos') $cadbusca="SELECT * FROM libros WHERE $lugar_busqueda LIKE '%$texto_busqueda%' ORDER BY ($lugar_busqueda) ASC";
   else $cadbusca="SELECT * FROM libros WHERE TITULO LIKE '%$texto_busqueda%' OR AUTOR LIKE '%$texto_busqueda%' OR EDITORIAL LIKE '%$texto_busqueda%' OR SINOPSIS LIKE '%$texto_busqueda%' ORDER BY (TITULO) ASC";

   $result = mysql_query($cadbusca) or die("La siguiente consulta contiene alg&uacute;n error:<br>nSQL: <b>$cadbusca</b>");
   $total_resultados = mysql_num_rows($result);

   if($total_resultados[0] == NULL) echo "<center style='margin-top: 20px'><img src=\"../imagenes/Imagenes de edicion/informacion.png\" width=\"25\" height=\"25\" align=\"absmiddle\" /> <span id=\"informacion_gral\">No se ha encontrado ning&uacute;n resultado</span></center>";

   //mostramos los resultados
   $i = 0;
   while ($row = mysql_fetch_object($result))
   {
      $id                  = $row->id;
      $titulo              = $row->titulo;
      $autor               = $row->autor;
      $editorial           = $row->editorial;
      $precio_dolares         = $row->precio_dolares;
      $cat_gral            = $row->categoria_general;
      $cat_esp          = $row->categoria_especifica;
      $imagen              = $row->imagen_caratula;
      $en_promocion        = $row->en_promocion;
      $porcentaje_promocion   = $row->porcentaje_promocion;
      $articulo_promocion     = $row->articulo_promocion;
      include('../administracion/pesos.php');
      if ($en_promocion == 'Si')
      {
         //determinamos el tipo de promocion
         if ($porcentaje_promocion != NULL)
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
      echo "<span id=\"informacion_gral\">T&iacute;tulo: </span><br />$titulo<br />";
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
         echo "<span id=\"informacion_gral\">precio (\$CO): </span>".number_format($pesos, 2)."<br />";
         if ($art_promo == true) echo "<span id=\"informacion_gral\">Art&iacute;culo de promoci&oacute;n: </span>".$articulo_promocion."<br />";
      }
      echo "<a href=\"libro.php?id=$id\" rel=\"width:700,height:250\" id=\"mb$i\" class=\"mb\" title=\"".$titulo."\"><img src=\"../imagenes/Imagenes de edicion/ver.png\" width=\"15\" height=\"15\" alt=\"Ver m&#225;s informaci&#243;n\" title=\"Agregar al carrito\" border=\"0\" align=\"absmiddle\" /><span style=\"color:#000\">Ver m&#225;s >></span></a>";
   echo "<br /><a href=\"agregacar.php?&id=".$id."&texto_busqueda=$texto_busqueda&lugar_busqueda=$lugar_busqueda&pagina=busqueda&status=true\"><span style=\"color:#000\"><img src=\"../imagenes/Imagenes de edicion/agregar.png\" width=\"15\" height=\"15\" alt=\"Agregar al carrito\" title=\"Agregar al carrito\" border=\"0\" align=\"absmiddle\" /> Agregar al carrito</span></a>";
      echo "<div class=\"multiBoxDesc mb$i\">".$autor."</div>";
      echo "</td>";
      echo "</tr>";
      echo "</table>";
      $i++;
   }
?>
<script type="text/javascript">
//-->
var box = {};
         window.addEvent('domready', function(){
            box = new MultiBox('mb', {descClassName: 'multiBoxDesc', useOverlay: true});
         });
</script>
<?php
}
else
{
?>
     <form action="busqueda.php?tabla=libros" method="post" enctype="application/x-www-form-urlencoded" name="busca_libro" id="busca_libro">
      <table width="500" border="0" cellspacing="0" cellpadding="0" align="center">
        <tr>
          <td>Escriba el texto a buscar:</td>
          <td><input name="texto_busqueda" type="text" id="texto_busqueda" tabindex="1" size="50" maxlength="200" /></td>
        </tr>
        <tr>
          <td>Buscar por:</td>
          <td>
            <select name="lugar_busqueda" id="lugar_busqueda" tabindex="2">
              <option value="titulo">T&iacute;tulo</option>
              <option value="autor">Autor</option>
              <option value="editorial">Editorial</option>
              <option value="todos">Toda la base de datos</option>
            </select>
          </td>
        </tr>
      </table>
      <table width="500" border="0" cellspacing="5" cellpadding="0" align="center">
        <tr>
          <td width="50%" align="right"><a href="javascript: document.busca_libro.reset()"><img src="../imagenes/Imagenes de edicion/limpiar.png" width="100" height="25" border="0" /></a></td>
          <td width="50%" align="left"><input type="image" src="../imagenes/Imagenes de edicion/buscar.png" name="submit" id="submit" tabindex="3" /></td>
        </tr>
      </table>
     </form>
<?php
}
?>
</body>
</html>

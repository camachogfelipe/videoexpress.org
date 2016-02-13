<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin título</title>
<link href="../libroexpress.css" rel="stylesheet" type="text/css" />
</head>

<body bgcolor="#000">
<?php
$id = $_REQUEST['id'];

include('../administracion/conexion.php');
conecta_bd("libroexpress");

$sql = "select * FROM libros WHERE id='$id'";
$result = mysql_query($sql) or die("La siguiente consulta contiene alg&uacute;n error:<br>nSQL: <b>$sql</b>");
while ($row = mysql_fetch_object($result))
{
   //obtenemos la información de libro
   $editorial           = $row->editorial;
   $paginas          = $row->paginas;
   $tipo_pasta          = $row->tipo_pasta;
   $size             = $row->size;
   $sinopsis            = $row->sinopsis;
   $precio_dolares         = $row->precio_dolares;
   $articulos_relacionados = $row->articulos_relacionados;
   $imagen              = $row->imagen_caratula;
   //determinamos si es o no una promocion
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

   //mostramos los resultados
   echo "<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" id=\"resultados_promocion\" >";
    echo "<tr>";
   echo "<td width=\"170\" height=\"242\" align=\"center\" valign=\"middle\" background=\"../imagenes/Imagenes de edicion/brillo.png\"><img src='../imagenes_libros/".$imagen."' width='140px' height='212px' ></td>";
   echo "<td width=\"24%\" valign=\"top\" style=\"padding-left: 5px\">";
   echo "<span id=\"inf_gral\">Editorial: </span>".$editorial."<br />";
   echo "<span id=\"inf_gral\">P&aacute;ginas: </span>".$paginas."<br />";
   echo "<span id=\"inf_gral\">Tipo de pasta: </span>".$tipo_pasta."<br />";
   echo "<span id=\"inf_gral\">Tama&ntilde;o: </span>".$size."<br />";
   //determinamos como se muestran los precios
   if ($promocion == true)
   {
      echo "<span id=\"inf_gral\">precio (\$US): </span><span id=\"precio_promo\">".number_format($precio_dolares, 2)."</span> ";
      echo number_format($precio_pos_dolar, 2)."<br />";
      echo "<span id=\"inf_gral\">precio (\$CO): </span><span id=\"precio_promo\">".number_format($pesos)."</span> ";
      echo number_format($precio_pos_pesos)."<br />";
   }
   else
   {
      echo "<span id=\"inf_gral\">precio (\$US): </span>".number_format($precio_dolares, 2)."<br />";
      echo "<span id=\"inf_gral\">precio (\$CO): </span>".number_format($pesos)."<br />";
      if ($art_promo == true) echo "<span id=\"inf_gral\">Art&iacute;culo de promoci&oacute;n: </span>".$articulo_promocion."<br />";
   }
   echo "<span id=\"inf_gral\">Art&iacute;culos relacionados: </span>".$articulos_relacionados;
   echo "</td>";
   echo "<td valign=\"top\" align=\"justify\">";
   echo "<span id=\"inf_gral\">Sinopsis: </span> <span style=\"font-size: 13px\">".$sinopsis."</span>";
   echo "</td>";
   echo "</tr>";
   echo "</table>";
   $promocion = false;
   $art_promo = false;
}
?>
</body>
</html>

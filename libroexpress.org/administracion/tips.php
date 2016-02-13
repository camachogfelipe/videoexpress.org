<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Panel de administraci&oacute;n LibroExpress.org</title>
<link href="estilo_admin.css" rel="stylesheet" type="text/css" />
</head>

<body style="margin: 0">
<?php
  if (isset($_SESSION['valid_user']))
  {
   include ("conexion.php");
   conecta_bd("libroexpress");
   //definimos las variables para la paginacion
   $tabla = "tips";
   $pagina = "tips";
   $lis = 10;
   //nos conectamos a la tabla respectiva
   $x = @$_REQUEST["ord"];
   if ($x == NULL) $x = 1;
   include ("ordenar.php");
   
   $result = mysql_query($sql) or die("La siguiente consulta contiene alg&uacute;n error:<br>nSQL: <b>$sql</b>");
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="20"><img src="imagenes/redondo_sup_izq.png" width="20" height="20" /></td>
    <td style="background:url(imagenes/linea_superior.png) repeat-x">&nbsp;</td>
    <td width="20"><img src="imagenes/redondo_sup_der.png" width="20" height="20" /></td>
  </tr>
  <tr>
    <td style="background:url(imagenes/linea_vertical_izq.png) repeat-y">&nbsp;</td>
    <td bgcolor="#ebebeb" align="center">
     <table width="100%" border="0" cellspacing="0" cellpadding="0" id="tabla">
      <tr align="center" id="encabezado_tablas">
        <td width="5%"><a href="tips.php?ord=1&pag<?php $pag++; echo $pag; ?>"><img src="imagenes/ordenar.png" alt="" width="15" height="15" border="0" /></a> Id</td>
        <td width="58%">Tip</td>
        <td width="22%"><a href="tips.php?ord=2&pag<?php echo $pag; ?>"><img src="imagenes/ordenar.png" alt="" width="15" height="15" border="0" /></a> Categor&iacute;a del tip</td>
        <td width="15%">Acci&oacute;n</td>
      </tr>
      <?php
      while ($row = mysql_fetch_object($result))
     {
       if ($colorfila==0)
      {
         $color = "#dddddd";
         $colorfila = 1;
      }
      else
      {
         $colorfila = 0;
      }
      
      $estilo_celda = "valign='top' style='text-align:justify; background-color:$color'";

      echo "<tr $estilo_celda>";
      //id
      $id = $row->id;
      echo "<td align=\"center\">$id</td>";
      //tip
      $tip = $row->tip;
      echo "<td align=\"justify\">$tip</td>";
      //categoria
      $categoria = $row->categoria;
      echo "<td>$categoria</td>";
      //accion
      echo "<td>";
      echo "<a href=\"editar_tip.php?id=$id&editar=0&tip=$tip&categoria=$categoria&ingresar=actualizar\"><img src=\"imagenes/editar.png\" border=\"0\" width=\15\" height=\"15\" align=\"absmiddle\">Editar el tip</a> ";
      echo "<a href='borrar.php?id=$id&tabla=$tabla&pagina=$pagina'><img src=\"imagenes/borrar.png\" border=\"0\" width=\15\" height=\"15\" align=\"absmiddle\">Eliminar</a></td>";
      echo "</tr>";
     }
     ?>
     </table>
     <?php include('paginacion.php') ?>
    </td>
    <td style="background:url(imagenes/linea_vertical_der.png) repeat-y">&nbsp;</td>
  </tr>
  <tr>
    <td><img src="imagenes/redondo_inf_izq.png" width="20" height="20" /></td>
    <td style="background:url(imagenes/linea_inferior.png) repeat-x">&nbsp;</td>
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

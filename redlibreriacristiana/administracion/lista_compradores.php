<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
<link href="estilo_admin.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php
// check session variable

if (isset($_SESSION['valid_user']))
{
	include ("funciones.php");
	conecta_bd("redlibr_redlibreria");
	//definimos las variables para la paginacion
	$tabla = "clientes";
	$pagina = "lista_compradores";
	$lis = 4;
	//nos conectamos a la tabla respectiva
	$x = @$_REQUEST["ord"];
	if ($x == NULL) $x = 1;
	include ("ordenar.php");
	
	$result = mysql_query($sql) or die("La siguiente consulta contiene algÃºn error:<br>nSQL: <b>$sql</b>");
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
       <tr id="encabezado_tablas" align="center">
          <td width="8%"><a href="lista_compradores.php?ord=1&pag<?php echo $pag; ?>"><img src="imagenes/ordenar.png" alt="" width="15" height="15" border="0" /></a> Cedula y/o Nit</td>
         <td width="12%"><a href="lista_compradores.php?ord=2&pag<?php echo $pag; ?>"><img src="imagenes/ordenar.png" alt="" width="15" height="15" border="0" /></a> Nombre</td>
         <td width="14%"><a href="lista_compradores.php?ord=3&pag<?php echo $pag; ?>"><img src="imagenes/ordenar.png" alt="" width="15" height="15" border="0" /></a> Apellidos</td>
         <td width="15%"><a href="lista_compradores.php?ord=4&pag<?php echo $pag; ?>"><img src="imagenes/ordenar.png" alt="" width="15" height="15" border="0" /></a> Direcci&oacute;n</td>
         <td width="6%"><a href="lista_compradores.php?ord=5&pag<?php echo $pag; ?>"><img src="imagenes/ordenar.png" alt="" width="15" height="15" border="0" /></a> Tel&eacute;fono</td>
         <td width="6%"><a href="lista_compradores.php?ord=6&pag<?php echo $pag; ?>"><img src="imagenes/ordenar.png" alt="" width="15" height="15" border="0" /></a> Celular</td>
         <td width="14%"><a href="lista_compradores.php?ord=7&pag<?php echo $pag; ?>"><img src="imagenes/ordenar.png" alt="" width="15" height="15" border="0" /></a> Correo Electronico</td>
         <td width="8%"><a href="lista_compradores.php?ord=8&pag<?php echo $pag; ?>"><img src="imagenes/ordenar.png" alt="" width="15" height="15" border="0" /></a> Ciudad</td>
         <td width="8%"><a href="lista_compradores.php?ord=9&pag<?php echo $pag; ?>"><img src="imagenes/ordenar.png" alt="" width="15" height="15" border="0" /></a> Pa&iacute;s</td>
         <td width="6%">Acci&oacute;n</td>
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
		//cedula
		$cedula = $row->cedula;
		echo "<td align=\"center\">$cedula</td>";
		//nombre
		$nombre = $row->nombre;
		echo "<td>$nombre</td>";
		//apellidos
		$apellidos = $row->apellidos;
		echo "<td>$apellidos</td>";
		//direccion
		$direccion = $row->direccion;
		echo "<td>$direccion</td>";
		//telefono
		$telefono = $row->telefono;
		echo "<td>$telefono</td>";
		//celular
		$celular = $row->celular;
		echo "<td>$celular</td>";
		//correo
		$correo = $row->correo;
		echo "<td>$correo</td>";
		//ciudad
		$ciudad = $row->ciudad;
		echo "<td>$ciudad</td>";
		//país
		$pais = $row->pais;
		echo "<td>$pais</td>";
		//accion
		echo "<td>";
		echo "<a href='borrar.php?id=$cedula&tabla=$tabla&pagina=$pagina'><img src=\"imagenes/borrar.png\" border=\"0\" width=\15\" height=\"15\" align=\"absmiddle\">Eliminar</a>";
		echo "<p><a href='editar_cliente.php?id=$cedula'><img src=\"imagenes/editar.png\" border=\"0\" width=\15\" height=\"15\" align=\"absmiddle\">Editar</a></p></td>";
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
	echo '<script type="text/javascript">window.location="../administracion";</script>';
}
?>
<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Busqueda de usuario</title>
<link href="../estilo.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php
if (isset($_SESSION['user_admin']))
{
	include('../include/funciones_globales.php');
	$conecta = conecta_bd("videoexpress");

	$texto_busqueda = $_REQUEST['texto_busqueda'];
	$lugar_busqueda = $_REQUEST['lugar_busqueda'];

	if ($texto_busqueda != NULL)
	{
		//se establece el formato de busqueda
		if ($lugar_busqueda != 'todos')
		{
			$cadbusca="SELECT * FROM usuarios WHERE $lugar_busqueda LIKE '%$texto_busqueda%' ORDER BY ($lugar_busqueda) ASC";
			$cont="SELECT COUNT(*) FROM usuarios WHERE $lugar_busqueda LIKE '%$texto_busqueda%' ORDER BY ($lugar_busqueda) ASC";
		}
		else
		{
			$cadbusca="SELECT * FROM usuarios WHERE NOMBRE LIKE '%$texto_busqueda%' OR TEL_OFICINA LIKE '%$texto_busqueda%' OR TEL_OFICINA2 LIKE '%$texto_busqueda%' OR TEL_CASA LIKE '%$texto_busqueda%' OR CELULAR LIKE '%$texto_busqueda' OR EMAIL LIKE '%$texto_busqueda' ORDER BY ($lugar_busqueda) ASC";
			$cont="SELECT COUNT(*) FROM usuarios WHERE NOMBRE LIKE '%$texto_busqueda%' OR TEL_OFICINA LIKE '%$texto_busqueda%' OR TEL_OFICINA2 LIKE '%$texto_busqueda%' OR TEL_CASA LIKE '%$texto_busqueda%' OR CELULAR LIKE '%$texto_busqueda' OR EMAIL LIKE '%$texto_busqueda' ORDER BY ($lugar_busqueda) ASC";
		}

		$result = mysql_query($cadbusca) or die("La siguiente consulta contiene alg&uacute;n error:<br>nSQL: <b>$cadbusca</b>");
		
		$result1 = mysql_query($cont) or die("La siguiente consulta contiene alg&uacute;n error:<br>nSQL: <b>$cadbusca</b>");
		$total_resultados1 = mysql_fetch_array($result1);
?>
<div class="encabezado_tabla">Total registros encontrados para la palabra <?php echo $texto_busqueda.": "; echo $total_resultados1[0] ?></div><br />
	  <table width="100%" border="1px" cellspacing="0" cellpadding="0" id="encabezado_tablas" style="border:1px solid #CCC">
       <tr align="center" class="encabezado_tabla">
        <td width="5%"><a href="listas/afiliados.php?orden=codigo_cliente&pag=<?php echo $pag ?>">Id cliente</a></td>
        <td width="9%"><a href="listas/afiliados.php?orden=nombre&pag=<?php echo $pag ?>">Nombre completo</a></td>
        <td width="18%"><a href="listas/afiliados.php?orden=email&pag=<?php echo $pag ?>">Correo electr&oacute;nico</a></td>
        <td width="22%">Tel&eacute;fonos de cont&aacute;cto</td>
        <td width="7%"><a href="listas/afiliados.php?orden=direccion&pag=<?php echo $pag ?>">Direcci&oacute;n</a></td>
        <td width="7%"><a href="listas/afiliados.php?orden=barrio&pag=<?php echo $pag ?>">Barrio</a></td>
        <td width="7%"><a href="listas/afiliados.php?orden=iglesia_congrega&pag=<?php echo $pag ?>">Iglesia donde se congrega</a></td>
        <td width="7%"><a href="listas/afiliados.php?orden=ultimo_alquiler&pag=<?php echo $pag ?>">&Uacute;ltimo alquiler</a></td>
        <td width="4%"><a href="listas/afiliados.php?orden=activo&pag=<?php echo $pag ?>">Activo</a></td>
        <td width="14%">Acci&oacute;n</td>
      </tr>
      <?php
	  $colorfila = 1;
	  
      while ($row = mysql_fetch_object($result))
	  {
	    if ($colorfila==0)
		{
			$color = "#9ABEDC";
			$color1 = "#000";
		    $colorfila = 1; 
		}
		else
		{
			$color = "#FFF";
			$color1 = "#000";
			$colorfila = 0;
		}
		
		$estilo_celda = "valign='top' style='text-align:justify; background-color:$color; color:$color1'";

		echo "<tr $estilo_celda>";
		//id
		$id = $row->codigo_cliente;
		echo "<td align=\"center\"><span id='menu_admon2'>";
		echo "<a href=\"listas/datos_comprador.php?id=$id&existe=1&tabla=usuarios\">";
		echo "$id</a></span></td>";
		//email
		$nombres = $row->nombre;
		echo "<td align=\"center\">$nombres</td>";
		//telefono oficina
		$email = $row->email;
		echo "<td align=\"center\">$email</td>";
		//telefono oficina
		$tel_oficina = $row->tel_oficina;
		$tel_oficina2 = $row->tel_oficina2;
		$tel_casa = $row->tel_casa;
		$celular = $row->celular;
		echo "<td align=\"left\">";
		echo "Oficina: ".$tel_oficina."<br />Oficina2: ".$tel_oficina2."<br />Casa: ".$tel_casa."<br />Celular: ".$celular;
		echo "</td>";
		//direccion
		$direccion = str_replace("#", "No. ", $row->direccion);
		echo "<td align=\"center\">$direccion</td>";
		//barrio
		$barrio = $row->barrio;
		echo "<td align=\"center\">$barrio</td>";
		//iglesia congrega
		$iglesia = $row->iglesia_congrega;
		echo "<td align=\"center\">$iglesia</td>";
		//ultimo alquiler
		$alquiler = $row->ultimo_alquiler;
		echo "<td align=\"center\">$alquiler</td>";
		//activo
		$activo = $row->activo;
		echo "<td align=\"center\">$activo</td>";
		//accion
		echo "<td align=\"left\">";
		echo "<span id='menu_admon2' style=\"text-align: left\"><a style=\"text-align: left\" href=\"listas/editar_usuario.php?";
		echo "id=$id&";
		echo "nombre=".htmlentities($nombres)."&";
		echo "direccion=".htmlentities($direccion)."&";
		echo "barrio=".htmlentities($barrio)."&";
		echo "tel_oficina=".htmlentities($tel_oficina)."&";
		echo "tel_oficina2=".htmlentities($tel_oficina2)."&";
		echo "tel_casa=".htmlentities($tel_casa)."&";
		echo "celular=".htmlentities($celular)."&";
		echo "email=".$email."&";
		echo "iglesia=".htmlentities($iglesia)."&";
		echo "pagina=../busqueda1&";
		echo "texto_busqueda=$texto_busqueda&";
		echo "lugar_busqueda=$lugar_busqueda&";
		echo "pag=$pag";
		echo "\"><img src=\"../Imagenes_pagina/editar.png\" width=\"15\" height=\"15\" border=\"0\" align=\"absmiddle\" /> Editar</a></span>";
		echo "<br /><span id='menu_admon2' style=\"text-align: left\"><a style=\"text-align: left\" href=\"listas/activar.php?";
		echo "id=$id&";
		echo "activo=$activo&";
		echo "pag=$pag";
		echo "\"><img src=\"../Imagenes_pagina/editar.png\" width=\"15\" height=\"15\" border=\"0\" align=\"absmiddle\" /> Activar / desactivar</a></span>";
		echo "</td></tr>";
	  }
	  ?>
    </table>
     <?php
	}
	else
	{
?>
<center style="color:#000; margin: 50px 0px 0px 0px">
<p><strong>Buscar un usuario</strong></p>
     <form action="busqueda1.php" method="post" enctype="application/x-www-form-urlencoded" name="busca_libro" id="busca_libro">
      <table width="500" border="0" cellspacing="0" cellpadding="0" align="center">
        <tr>
          <td>Escriba el texto a buscar:</td>
          <td><input name="texto_busqueda" type="text" id="texto_busqueda" tabindex="1" size="50" maxlength="200" /></td>
        </tr>
        <tr>
          <td>Buscar por:</td>
          <td>
            <select name="lugar_busqueda" id="lugar_busqueda" tabindex="2">
              <option value="nombre">Nombre</option>
              <option value="tel_oficina">Tel&eacute;fono oficina</option>
              <option value="tel_oficina2">Tel&eacute;fono oficina2</option>
              <option value="tel_casa">Tel&eacute;fono casa</option>
              <option value="celular">Celular</option>
              <option value="todos">Toda la base de datos</option>
            </select>
          </td>
        </tr>
      </table>
      <table width="500" border="0" cellspacing="5" cellpadding="0" align="center">
        <tr>
          <td width="50%" align="right"><a href="javascript: document.busca_libro.reset()"><img src="../Imagenes_pagina/limpiar.png" width="100" height="25" border="0" /></a></td>
          <td width="50%" align="left"><input type="image" src="../Imagenes_pagina/boton_buscar.png" name="submit" id="submit" tabindex="3" /></td>
        </tr>
      </table>
     </form>
  <p><strong>Buscar una pel&iacute;cula:</strong></p>
  <form action="busqueda.php" method="post" enctype="application/x-www-form-urlencoded" name="busca_libro" id="busca_libro">
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
              <option value="auditorio">Auditorio</option>
              <option value="clasificacion">Clasificaci&oacute;n</option>
              <option value="genero">Genero</option>
              <option value="descripcion">Descripci&oacute;n</option>
              <option value="todos">Toda la base de datos</option>
            </select>
          </td>
        </tr>
      </table>
      <table width="500" border="0" cellspacing="5" cellpadding="0" align="center">
        <tr>
          <td width="50%" align="right"><a href="javascript: document.busca_libro.reset()"><img src="../Imagenes_pagina/limpiar.png" width="100" height="25" border="0" /></a></td>
          <td width="50%" align="left"><input type="image" src="../Imagenes_pagina/boton_buscar.png" name="submit" id="submit" tabindex="3" /></td>
        </tr>
      </table>
     </form>
</center>
</body>
</html>
<?php
	}
}
else
{
	include ('index.php');
}
?>
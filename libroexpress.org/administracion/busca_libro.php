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
?>
<table width="500" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td width="20"><img src="imagenes/redondo_sup_izq.png" width="20" height="20" /></td>
    <td style="background:url(imagenes/linea_superior.png) repeat-x">&nbsp;</td>
    <td width="20"><img src="imagenes/redondo_sup_der.png" width="20" height="20" /></td>
  </tr>
  <tr>
    <td style="background:url(imagenes/linea_vertical_izq.png) repeat-y">&nbsp;</td>
    <td bgcolor="#ebebeb">
     <form action="busqueda.php?tabla=libros" method="post" enctype="application/x-www-form-urlencoded" name="busca_libro" id="busca_libro">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
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
              <option value="categoria_general">Categoria general</option>
              <option value="categoria_especifica">Categoria especifica</option>
            </select>
          </td>
        </tr>
      </table>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="50%" align="right"><a href="javascript: document.busca_libro.reset()"><img src="imagenes/limpiar.png" width="100" height="25" border="0" /></a></td>
          <td width="50%" align="left"><input type="image" src="imagenes/boton_buscar.png" name="submit" id="submit" tabindex="3" /></td>
        </tr>
      </table>
     </form>
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
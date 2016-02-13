<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" href="../images/favicon.ico" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Panel de administraci&oacute;n LibroExpress.org</title>
<link href="estilo_admin.css" rel="stylesheet" type="text/css" />
</head>

<body style="margin: 0">
<?php
  if (isset($_SESSION['valid_user']))
  {
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="20" height="20"><img src="imagenes/redondo_sup_izq.png" width="20" height="20" /></td>
    <td style="background: url(imagenes/linea_superior.png) repeat-x">&nbsp;</td>
    <td width="20"><img src="imagenes/redondo_sup_der.png" width="20" height="20" /></td>
  </tr>
  <tr style="color:#FFF; font-weight:bold">
    <td style="background: url(imagenes/linea_vertical_izq.png) repeat-y">&nbsp;</td>
    <td bgcolor="#E65200">
     <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td colspan="9" align="center"><img src="imagenes/administracion.jpg" width="616" height="106" /><p>&nbsp;</p></td>
      </tr>
      <tr>
        <td align="center" valign="middle"><a href="ing_libro.php" target="mostrar"><img src="imagenes/agregar_libro.png" name="menu" width="75" height="70" border="0" id="menu" /></a><br />
          Ingresar un &aacute;rticulo</td>
        <td align="center" valign="middle"><a href="lista_libros.php" target="mostrar"><img src="imagenes/lista_libros.png" width="75" height="70" border="0" /></a><br />
          Listar los &aacute;rticulos</td>
        <td align="center" valign="middle"><a href="busca_libro.php" target="mostrar"><img src="imagenes/buscar_libro.png" width="75" height="70" border="0" /></a><br />
          Buscar un &aacute;rticulo</td>
        <td align="center" valign="middle"><a href="lista_pedidos.php" target="mostrar"><img src="imagenes/listar_pedidos.png" width="75" height="70" border="0" /></a><br />
          Pedidos pendientes</td>
          <td align="center" valign="middle"><a href="lista_facturas.php" target="mostrar"><img src="imagenes/listar_facturas.png" width="75" height="70" border="0" /></a><br />
          Pedidos ya resueltos</td>
        <td align="center" valign="middle"><a href="lista_compradores.php" target="mostrar"><img src="imagenes/lista_compradores.png" width="75" height="70" border="0" /></a><br />
          Lista de compradores</td>
          <td align="center" valign="middle"><a href="notired.php" target="mostrar"><img src="imagenes/notired.png" width="75" height="70" border="0" /></a><br />
          NotiRED</td>
          <td align="center" valign="middle"><a href="salir.php?ts=1" target="mostrar"><img src="imagenes/correo.png" width="75" height="70" border="0" /></a><br />
          Ingresar al correo</td>
        <td align="center" valign="middle"><a href="cambio_clave.php" target="mostrar"><img src="imagenes/cambio_clave.png" width="75" height="70" border="0" /></a><br />
          Cambiar la clave</td>
        <td align="center" valign="middle"><a href="salir.php"><img src="imagenes/salir.png" width="75" height="70" border="0" /></a><br />
          Salir</td>
      </tr>
     </table>
    </td>
    <td style="background: url(imagenes/linea_vertical_der.png) repeat-y">&nbsp;</td>
  </tr>
  <tr>
    <td height="20"><img src="imagenes/redondo_inf_izq.png" width="20" height="20" /></td>
    <td style="background: url(imagenes/linea_inferior.png) repeat-x">&nbsp;</td>
    <td><img src="imagenes/redondo_inf_der.png" width="20" height="20" /></td>
  </tr>
</table>
<iframe frameborder="0" name="mostrar" id="mostrar" src="inicio2.php" AllowTransparency scrolling="auto" style="border: 0px none; border-style:none none none none; width:100%; height:600px">Su explorador no soporta frames, por favor actualicelo
</iframe>
</body>
</html>
<?php
}
else
{
   echo '<script type="text/javascript">window.location="../administracion";</script>';
}
?>

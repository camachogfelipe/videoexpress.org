<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="adminvideo.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php
include("../catalogo/include/funciones_globales.php");
$id_com = $_REQUEST['em'];
$e = $_REQUEST['e'];
$escrito = $_REQUEST['text_mail'];
$mensaje = -1;
if($id_com != NULL)
{
	if($e == NULL) $e = 0;
	$datos = obtener_datos($id_com);
	if($id_com != NULL and $e == 1 and $escrito != NULL)
	{
		$cuerpo = "<html>\n";
		$cuerpo .= "<head>\n";
		$cuerpo .= "<title>".$datos['asunto']."</title>\n";
		$cuerpo .= "</head>\n
					<body>\n
					Hola ".$datos['nombre']."\n
					<p>$escrito</p>\n
					Atentamente,\n
					<p>Manuel Obado!!<br />Gerente Videoexpress.org<br />\n
					Tel:526 9007, Cel: 312 490 7879<br /><a href='http://www.videoexpress.org'>www.videoexpress.org</a>\n
					</p>\n
					".$datos['comentario']."
					</body>\n
					</html>";

		$headers = "X-Mailer:PHP/".phpversion()."\n";
		$headers .= "Mime-Version: 1.0\n";
		$headers .= "Content-Type: text/html; charset=iso-8859-1\n";

		//dirección del remitente
		$headers .= "From: Manuel Obando <gerencia@videoexpress.org>\n";
		mail($datos['email'], $datos['asunto'], $cuerpo, $headers);
		$mensaje = 2;
	}
	elseif($id_com != NULL and $e != 0 and $escrito == NULL) $mensaje = 1;
}
else $mensaje = 0;

function obtener_datos($id_com)
{
	$conecta = conecta_bd("videoexpress");
	$sql = consulta_bd("libro_visitas", "nombre, email, pagina, comentario, articulo", "1;;;id_libro='$id_com'");
	while ($row = mysql_fetch_object($sql))
    {
		$datos['nombre']		= $row->nombre;
		$datos['email']			= $row->email;
		$datos['pagina']		= $row->pagina;
		$datos['comentario']	= $row->comentario;
		$datos['articulo']		= $row->articulo;
	}
	if($datos['pagina'] == 'radio') $texto = "Programa de radio";
	elseif($datos['pagina'] == 'videoclips') $texto = "Videoclip";
	$datos['asunto'] = "Comentario ".$texto." No. ".$datos['articulo'];
	return $datos;
}
?>
<form action="mail.php?e=1&em=<?php echo $id_com; ?>" method="post" enctype="multipart/form-data" name="mail">
<table width="100%" border="0" cellspacing="10" cellpadding="0">
  <tr>
    <td width="50%">Para:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $datos['nombre']." / ".$datos['email']; ?></td>
  </tr>
  <tr>
    <td>Asunto:&nbsp;&nbsp;<?php echo $datos['asunto']; ?></td>
  </tr>
  <tr>
    <td>
    	<?php
			if($id_com != NULL and $escrito == NULL)
			{
		?>
	    	<textarea name="text_mail" cols="65" rows="10"></textarea>
    </td>
  </tr>
  <tr>
    <td>
    	<table width="100%" border="0" cellspacing="10" cellpadding="0">
		  <tr>
		    <td align="right">
            	<a href="javascript:document.mail.submit()" style="border:1px">
					<div id="btn">
						<img src="imagenes/aceptar.png" width="25" height="25" border="0" align="left" alt="ingresar">
						<div id="texto">Enviar</div>
					</div>
				</a>
            </td>
		    <td align="left">
            	<a href="javascript:document.mail.reset()">
					<div id="btn">
						<img src="imagenes/limpiar.png" width="25" height="25" border="0" align="left" alt="ingresar">
						<div id="texto">Limpiar</div>
					</div>
				</a>
                <?php } ?>
            </td>
		  </tr>
		</table>
    </td>
  </tr>
</table>
</form>
<?php
if($mensaje == 0) echo "<div id=\"error2\"><img src=\"imagenes/error.png\" width=\"48\" height=\"48\" align=\"absmiddle\" /> No se ha ingresado de manera correcta a mail</span></div>";
elseif($mensaje == 1) echo "<div id=\"error2\"><img src=\"imagenes/error.png\" width=\"48\" height=\"48\" align=\"absmiddle\" /> Alg&uacute;n campo est&aacute; vac&iacute;o</span></div>";
elseif($mensaje == 2) echo '<img src="imagenes/info.png" width="48" height="48" align="absmiddle" /><span id="info">El e-mail se ha env&iacute;ado con exito</span>';
?>
</body>
</html>
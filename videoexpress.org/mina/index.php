<?php
include("../catalogo/include/funciones_globales.php");
$conecta = conecta_bd("videoexpress");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" href="../images/favicon.ico" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ministerios en Asocio</title>
<link href="mea.css" rel="stylesheet" type="text/css" />
<link href="../Scripts/floatbox/floatbox.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../Scripts/floatbox/floatbox.js"></script>
<script type="text/javascript">
fbPageOptions = {
  licenseKey: "",
  colorTheme: "black",
  language: "es"
};
</script>
<body id="body">
<table width="876" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><img src="Imagenes/bannerasocio-02-02.png" width="876" height="140" border="0" align="top" usemap="#Map" /></td>
  </tr>
</table>
<div id="menu">
		<?php
			$sql = consulta_bd("weblinks", "*", "3;nombre;ASC;seccion='ministeriosenasocio' and Activo='1';");
			$i=1;
			while ($row = mysql_fetch_object($sql))
			{
				echo '<li><a href="http://www.'.$row->link.'" ';
				if($row->nombre == "Dove.org") echo 'target="_blank">';
				else echo 'target="mostrar">';
				echo $row->nombre;
				echo '</a></li>';
				echo "\n";
				$i++;
			}
		?> 
</div>
<div id="panel">
	<script>
		var alto = screen.height;
		var ancho = screen.width;
		document.write('<iframe name="mostrar" id="mostrar" src="mea.html" AllowTransparency scrolling="auto" width="'+ancho+'" height="'+alto+'" frameborder="0" marginheight: "0"></iframe>');
	</script>
</div>
<map name="Map" id="Map">
  <area shape="rect" coords="556,91,695,110" href="tcn.php" class="floatbox" data-fb-options="width:70% height:500px disableScroll:false scrolling:si" border="0px" />
  <area shape="rect" coords="706,90,771,111" href="../portafolio/" alt="ir a portafolio" />
  <area shape="rect" coords="776,90,838,110" href="contacto.php" class="floatbox" data-fb-options="width:70% height:500px disableScroll:false scrolling:si" border="0px" />
</map>
</body>
</html>
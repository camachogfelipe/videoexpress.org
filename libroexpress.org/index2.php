<?php
session_start();
//rescatamos los valores guardados en la variable de sesión (si es que hay alguno, cosa que
//comprobamos con isset) y los asignamos a $carro. Si no existen valores, ponemos a false el
//valor de $carro
if(isset($_SESSION['carro']))
$carro=$_SESSION['carro'];else $carro=false;

include("administracion/conexion.php");
conecta_bd("libroexpress");

$sql = "SELECT factura_actual, trm FROM datos";
$result = mysql_query($sql) or die("La siguiente consulta contiene alg&uacute;n error:<br>nSQL: <b>$sql</b>");
while ($row = mysql_fetch_object($result))
{
  $trm           = $row->trm;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>LibroExpress.org</title>
<script type="text/javascript" src="scripts/mootools1.11.js"></script>
<script type="text/javascript" src="scripts/mootabs1.2.js"></script>
<script type="text/javascript" charset="utf-8">
      window.addEvent('domready', init);
      function init() {
      myTabs1 = new mootabs('container', {
			mode: 'vertical',
            width: '100%',
            height: '32em',
            duration: 1000,
            activateOnLoad: 'first'
      });
      }
</script>
<script>
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}
</script>
<script type="text/javascript" src="scripts/overlay.js"></script>
<script type="text/javascript" src="scripts/multibox.js"></script>
<script>
//Pon en la variable obligatorios el name de todos los campos que deben rellenar
obligatorio = ["busqueda"];
//Pon en la veriable textoObligatorio el texto que quieres que aparezca en el alert
textoObligatorio=["Busqueda"];
function comprobar(este)
{
	for(a=0; a<obligatorio.length; a++)
	{
		if(este.elements[obligatorio[a]].value == "")
		{
			alert("Por favor, rellena el campo "+textoObligatorio[a]);
			este.elements[obligatorio[a]].focus();
			return false;
		}
	}
	return true;
}
</script>
<link href="scripts/multibox.css" rel="stylesheet" type="text/css" />
<link href="libroexpress.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="scripts/multibox.css" />
<!--[if lte IE 6]><link rel="stylesheet" href="scripts/ie6.css" type="text/css" media="all" /><![endif]-->
</head>
 
<body id="body_index">
<div style="margin-bottom: 5px; background:url(imagenes/Imagenes%20de%20edicion/alpha.png) 100% repeat; width:auto">
 <table width="100%" height="50" border="0" cellspacing="0" cellpadding="0" style="color:#FFF; font-weight:bold">
  <tr>
    <td align="left" width="12%"><img src="imagenes/Imagenes de edicion/logoprovisional.png" width="100" height="37" /></td>
    <td align="center" style="border-right: 1px dotted #FFF">TRM: $ <?php echo number_format($trm,2); ?></td>
    <td align="center" style="border-right: 1px dotted #FFF">
     <a href="contactenos.php" rel="width:600,height:300" id="mb1" class="mb" title="Contáctenos">Cont&aacute;ctenos</a>
     <div class="multiBoxDesc mb1">Escribanos, queremos saber en qué podemos servirle</div>
    </td>
    <td align="center" style="border-right: 1px dotted #FFF"><a href="http://www.videoexpress.org/catalogo">VideoExpress.org</a></td>
    <td align="center" style="border-right: 1px dotted #FFF"><a href="preguntas_frecuentes.htm" rel="width:600,height:400" id="mb2" class="mb" title="Preguntas frecuentes">Preguntas frecuentes</a><div class="multiBoxDesc mb2">Si tiene alguna otra duda escribanos en la sección contáctenos, gracias</div></td>
    <td align="right" width="350" valign="middle"> 
     <form id="buscador" name="buscador" method="post" target="mostrar" action="includes/busqueda.php?tabla=libros&lugar_busqueda=todos" onSubmit="return comprobar(this)">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td>Buscar:</td>
          <td width="26"><img src="imagenes/Imagenes de edicion/buscarizq.png" width="26" height="26" /></td>
          <td align="center" style="background:url(imagenes/Imagenes%20de%20edicion/buscarcen.png)"><input name="texto_busqueda" type="text" id="texto_busqueda" tabindex="1" size="35" style="border: 0px" /></td>
          <td align="left"><input name="submit" type="image" id="submit" tabindex="2" src="imagenes/Imagenes de edicion/buscarder.png" /></td>
        </tr>
      </table>
     </form>
    </td>
  </tr>
 </table>
</div>
<div id="container">
 <ul class="mootabs_title">
  <li title="Tab1"><img src="imagenes/Botones superiores/home-02.png" width="120" height="50" /></li>
  <li title="Tab2"><img src="imagenes/Botones superiores/ninos-02.png" width="108" height="50" /></li>
  <li title="Tab3"><img src="imagenes/Botones superiores/adolescentes-02.png" width="115" height="50" /></li>
  <li title="Tab4"><img src="imagenes/Botones superiores/jovenes-02.png" width="108" height="50" /></li>
  <li title="Tab5"><img src="imagenes/Botones superiores/adultos-02.png" width="107" height="50" /></li>
  <li title="Tab6"><img src="imagenes/Botones superiores/int_gral-02.png" width="103" height="50" /></li>
  <li title="Tab7"><img src="imagenes/Botones superiores/promos-02.png" width="115" height="50" /></li>
  <li title="Tab8"><img src="imagenes/Botones superiores/carrito-02.png" width="125" height="50" /></li>
 </ul>
 <div id="Tab1" class="mootabs_panel">
  <iframe frameborder="0" name="index" id="mostrar" src="includes/home.php" AllowTransparency scrolling="auto" style="border: 0px; border-style:none; width:100%; height:460px; margin: 0px 0px 0px 0px">Su explorador no soporta frames, por favor actualicelo
  </iframe>
 </div>
 <div id="Tab2" class="mootabs_panel">
  <iframe frameborder="0" name="index" id="mostrar" src="includes/ninos.php" AllowTransparency scrolling="auto" style="border: 0px; border-style:none; width:100%; height:460px; margin: 0px 0px 0px 0px">Su explorador no soporta frames, por favor actualicelo
  </iframe>
 </div>
 <div id="Tab3" class="mootabs_panel">
  <iframe frameborder="0" name="index" id="mostrar" src="includes/adolescentes.php" AllowTransparency scrolling="auto" style="border: 0px; border-style:none; width:100%; height:460px; margin: 0px 0px 0px 0px">Su explorador no soporta frames, por favor actualicelo
  </iframe>
 </div>
 <div id="Tab4" class="mootabs_panel">
  <iframe frameborder="0" name="index" id="mostrar" src="includes/jovenes.php" AllowTransparency scrolling="auto" style="border: 0px; border-style:none; width:100%; height:460px; margin: 0px 0px 0px 0px">Su explorador no soporta frames, por favor actualicelo
  </iframe>
 </div>
 <div id="Tab5" class="mootabs_panel" style="color: #FFF">
  <iframe frameborder="0" name="index" id="mostrar" src="includes/adultos.php" AllowTransparency scrolling="auto" style="border: 0px; border-style:none; width:100%; height:460px; margin: 0px 0px 0px 0px">Su explorador no soporta frames, por favor actualicelo
  </iframe>
 </div>
 <div id="Tab6" class="mootabs_panel">
  <iframe frameborder="0" name="index" id="mostrar" src="includes/interes_gral.php" AllowTransparency scrolling="auto" style="border: 0px; border-style:none; width:100%; height:460px; margin: 0px 0px 0px 0px">Su explorador no soporta frames, por favor actualicelo
  </iframe>
 </div>
 <div id="Tab7" class="mootabs_panel">
  <iframe frameborder="0" name="index" id="mostrar" src="includes/promociones.php" AllowTransparency scrolling="auto" style="border: 0px; border-style:none; width:100%; height:460px; margin: 0px 0px 0px 0px">Su explorador no soporta frames, por favor actualicelo
  </iframe>
 </div>
 <div id="Tab8" class="mootabs_panel">
  <iframe frameborder="0" name="index" id="mostrar" src="includes/carrito.php" AllowTransparency scrolling="auto" style="border: 0px; border-style:none; width:100%; height:460px; margin: 0px 0px 0px 0px">Su explorador no soporta frames, por favor actualicelo
  </iframe>
 </div>
</div>
<div id="creditos" style="background:url(imagenes/Imagenes%20de%20edicion/alpha.png) 100% ">Est&aacute; p&aacute;gina esta dise&ntilde;ada para ser vista en IE7 o superior. Todos los derechos reservados &copy;. Dise&ntilde;o por LibroExpress.org y programaci&oacute;n por FCO <img src="imagenes/Imagenes de edicion/logofco.png" width="15" height="15" align="absmiddle" /></div>
<script type="text/javascript">
//-->
var box = {};
			window.addEvent('domready', function(){
				box = new MultiBox('mb', {descClassName: 'multiBoxDesc', useOverlay: true});
			});
</script>
</body>
</html>

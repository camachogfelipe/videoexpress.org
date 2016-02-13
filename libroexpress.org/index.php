<?php
session_start();
//rescatamos los valores guardados en la variable de sesión (si es que hay alguno, cosa que
//comprobamos con isset) y los asignamos a $carro. Si no existen valores, ponemos a false el
//valor de $carro
if(isset($_SESSION['carro']))
$carro=$_SESSION['carro'];else $carro=false;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="verify-v1" content="PXFu4sj4HYHJ0Da2x3HnSMSG9zTDI1ePRtwacNo2qxk=" >
<META NAME="Title" CONTENT="LibroExpress.org">
<META NAME="Author" CONTENT="LibroExpress.org - Felipe Camacho">
<META NAME="Subject" CONTENT="libros cristianos, libros con mensaje, libros de contenido educativo, libros de edificacion, libros eclesiasticos, libros para lideres, libros para ministerios, libros de crecimiento, libros de crecimiento espiritual">
<META NAME="Description" CONTENT="LibroExpress.org es una empresa que tiene como objetivo el de prestar el servicio de venta de libros y venta de libros que tiene un muy buen mensaje, y que sirven para su edificacion espiritual">
<META NAME="Keywords" CONTENT="libros, cristianos, cristianas, mensaje, mensajes, libros con mensaje, libros edificantes, libros cristianos, edificacion, crecimiento espiritual, espirituales, biografias">
<META NAME="Language" CONTENT="Spanish">
<META NAME="Revisit" CONTENT="1 day">
<META NAME="Distribution" CONTENT="Global">
<META NAME="Robots" CONTENT="All">
<title>LibroExpress.org</title>
<script type="text/javascript" src="scripts/mootools1.11.js"></script>
<script type="text/javascript" src="scripts/mootabs1.2.js"></script>
<script src="scripts/swfobject_modified.js" type="text/javascript"></script>
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
<link href="scripts/multibox.css" rel="stylesheet" type="text/css" />
<link href="libroexpress.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="scripts/multibox.css" />
<!--[if lte IE 6]><link rel="stylesheet" href="scripts/ie6.css" type="text/css" media="all" /><![endif]-->
</head>
 
<body id="body_index" onload="MM_preloadImages('Botones derechos/adolescentes derechos-01.png', 'Botones derechos/adultos derecho-01.png', 'Botones derechos/carrito-01.png', 'Botones derechos/home derecho-01.png', 'Botones derechos/jovenes-01.png', 'Botones derechos/ninosderecho-01.png', 'Botones derechos/promociones-01.png', 'Botones superiores/adolescentes-02.png', 'Botones superiores/adultos-02.png', 'Botones superiores/carrito-02.png', 'Botones superiores/home-02.png', 'Botones superiores/int_gral-02.png', 'Botones superiores/jovenes-02.png', 'Botones superiores/ninos-02.png', 'Botones superiores/promos-02.png', 'Imagenes de edicion/alpha.png', 'Imagenes de edicion/alpha2.png', 'Imagenes de edicion/circulos_resultados.png', 'Imagenes de edicion/der.png', 'Imagenes de edicion/espiral2.png', 'Imagenes de edicion/izq.png', 'Imagenes de edicion/linea_cuaderno.png', 'Imagenes de edicion/logofco.png', 'Imagenes de edicion/logoprovisional.png', 'Imagenes de edicion/texto_buscar.png')">
<center>
<div style="margin-top: 15%"> 
  <object id="FlashID" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="360" height="264">
    <param name="movie" value="VideoLIbroexpress.swf" />
    <param name="quality" value="high" />
    <param name="wmode" value="opaque" />
    <param name="swfversion" value="9.0.45.0" />
    <!-- Esta etiqueta param indica a los usuarios de Flash Player 6.0 r65 o posterior que descarguen la versión más reciente de Flash Player. Elimínela si no desea que los usuarios vean el mensaje. -->
    <param name="expressinstall" value="scripts/expressInstall.swf" />
    <!-- La siguiente etiqueta object es para navegadores distintos de IE. Ocúltela a IE mediante IECC. -->
    <!--[if !IE]>-->
    <object type="application/x-shockwave-flash" data="VideoLIbroexpress.swf" width="360" height="264">
      <!--<![endif]-->
      <param name="quality" value="high" />
      <param name="wmode" value="opaque" />
      <param name="swfversion" value="9.0.45.0" />
      <param name="expressinstall" value="scripts/expressInstall.swf" />
      <!-- El navegador muestra el siguiente contenido alternativo para usuarios con Flash Player 6.0 o versiones anteriores. -->
      <div>
        <h4>El contenido de esta p&aacute;gina requiere una versi&oacute;n m&aacute;s reciente de Adobe Flash Player.</h4>
        <p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Obtener Adobe Flash Player" width="112" height="33" /></a></p>
      </div>
      <!--[if !IE]>-->
    </object>
    <!--<![endif]-->
  </object>
</div>
<p>Cargando ....</p>
<a href="index2.php">Skip intro</a>
</center>
<script type="text/javascript">
//-->
var box = {};
			window.addEvent('domready', function(){
				box = new MultiBox('mb', {descClassName: 'multiBoxDesc', useOverlay: true});
			});
swfobject.registerObject("FlashID");
</script>
</body>
</html>
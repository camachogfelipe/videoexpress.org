<?php
$ac = $_REQUEST['ac'];
$iframe = $_REQUEST['iframe'];
$enlace = $_REQUEST['enlace'];

switch ($ac)
{
	case 1 	: $titulo = "Bienvenido a la p&#225;gina de el Liceo Anglo Colombiano";
			  break;
	case 2 	: $titulo = "";
			  break;
	case 3 	: $titulo = "";
			  break;
	case 4	: $titulo = "";
			  break;
	case 5 	: $titulo = "";
			  break;
	case 6 	: $titulo = "";
			  break;
	case 7	: $titulo = "";
			  break;
	case 8	: $titulo = "";
			  break;
	case 9  : $titulo = "Al tablero";
			  break;
	default : $titulo = "Bienvenido a la p&#225;gina de el Liceo Anglo Colombiano";
			  break;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 
<title>:: Liceo Anglo Colombiano ::</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="verify-v1" content="QqRUeQ+f9qrplkFUX4/VJEIeABGXx97EHbJpWWuYgsE=" />
<META NAME="Title" CONTENT="Liceo Anglo Colombiano">
<META NAME="Author" CONTENT="VideoExpress.org - Felipe Camacho">
<META NAME="Subject" CONTENT="Liceo Anglo Colombiano, La positiva alternativa de aprender con alegr&#237;a">
<META NAME="Description" CONTENT="El liceo Anglo colombiano tiene como proposito educar con principios y valores a su tesoro m&#225;s preciado: sus hijos">
<META NAME="Keywords" CONTENT="liceo, anglo, educativo, colombiano, educaci&#243;n, colegio, colegios, aducar, principios, valores, proposito educativo">
<META NAME="Keywords" CONTENT="colombiano, anglo, liceo, description, item, aprendizaje, niños, educación, habilidades, humano, cultura, inauguracion, reciente, campos, conocimiento, contácto, dirigido, edu, educativa, email, escríbenos, liceoanglocolombiano, llámanos, mensaje, personas, vida, desarrollar, integral, inteligencias, proyecto, respeto, bilingüe, calendario, escolar, hombre, institucionales, institución, personal, potencialidades, ambiente, educativo, naturaleza, propósitos, sociedad, académicas, amor, aprender, básica, caracterización, ciencia, colegio, creativo, especificas, física, niño, octavo, oportunidades, potencial, preescolar, respetando, trascendencia, alumnos, confianza, cultural, entorno, escudo, escuela, estudiantes, gardner, genera, identifican, idiomas, incluyen, intelectual, pedagógico, proceso, acorde, actividad, actuales, actualizadas, administracion, alegría, altamente, alternativa, amante, amenas, anuales, espanol, histórica, misión, reseña, visión, aportar, aprobaciones, armenia, armonía, arraigada, boletines, boletín, ciencias, edfisica, funcionara, galeria, imagenes, inauguración, ingles, rectoria, sociales">
<META NAME="Language" CONTENT="Spanish">
<META NAME="Revisit" CONTENT="1 day">
<META NAME="Distribution" CONTENT="Global">
<META NAME="Robots" CONTENT="All">
<link href="estilo.css" rel="stylesheet" type="text/css" />
<script src="scripts/swfobject_modified.js" type="text/javascript"></script>
</head>

<body>
<div id="main">
 <div id="encabezado_menu">
   <object id="FlashID" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="680" height="100">
     <param name="movie" value="plastic.swf" />
     <param name="quality" value="high" />
     <param name="wmode" value="opaque" />
     <param name="swfversion" value="9.0.45.0" />
     <!-- Esta etiqueta param indica a los usuarios de Flash Player 6.0 r65 o posterior que descarguen la versi&#243;n m&#225;s reciente de Flash Player. Elim&#237;nela si no desea que los usuarios vean el mensaje. -->
     <param name="expressinstall" value="scripts/expressInstall.swf" />
     <!-- La siguiente etiqueta object es para navegadores distintos de IE. Oc&#250;ltela a IE mediante IECC. -->
     <!--[if !IE]>-->
     <object type="application/x-shockwave-flash" data="plastic.swf" width="680" height="100">
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
 <div id="sombra"><img src="imagenes/sombra_izq.png" width="200" height="10" /></div>
 <div id="logo"><img src="imagenes/logo.png" width="155" height="155" border="0" id="img_logo" /></div>
 <?php include('menu_izq.php'); ?>
 <div id="cuerpo">
  <div id="encabezado_cuerpo" class="azul">
   <div>
    <div><?php echo $titulo; ?>
    </div>
   </div>
  </div>
  <div id="texto_cuerpo">
   <?php
    switch ($ac)
	{
		case 1 	: echo $cuerpo = "<p>Es un placer para nosotros poder presentarnos a usted con el fin de que conozca nuestra visi&#243;n y misi&#243;n para educar a su tesoro m&#225;s preciado: Sus hijos.<p></p>";
			  echo "<iframe frameborder=\"0\" name=\"bienvenida\" id=\"bienvenida\" src=\"bienvenida.php\" scrolling=\"auto\" style=\"border: 0px none; border-style:none none none none; width:100%; height:510px\">Su explorador no soporta frames, por favor actualicelo</iframe>";
				  break;
		case 2 	: include('quienes.php');
				  break;
		case 3 	: echo $cuerpo = "Haz click sobre el logotipo en el mapa, para que conozcas nuestra ubicaci&oacute;n.<p></p>";
			  echo "<iframe frameborder=\"0\" name=\"mapa\" id=\"mapa\" src=\"mapa.php\" scrolling=\"auto\" style=\"border: 0px none; border-style:none none none none; width:100%; height:450px\">Su explorador no soporta frames, por favor actualicelo</iframe>";
				  break;
		case 4	: include('inf_inst.php');
				  break;
		case 5 	: include('contacto.php');
				  break;
		case 6 	: include('enlaces.php');
				  break;
		case 7	: echo "<iframe frameborder=\"0\" name=\"galeria\" id=\"galeria\" src=\"galeria.php\" scrolling=\"auto\" style=\"border: 0px none; border-style:none none none none; width:100%; height:650px\">Su explorador no soporta frames, por favor actualicelo</iframe>";
			  	  break;
		case 8	: include('inf_gral.php');
				  break;
		case 9	: include('eltablero.php');
				  break;
		default : echo $cuerpo = "Bienvenido(a) a la p&#225;gina web del Liceo Anglo Colombiano. <p>Es un placer para nosotros poder presentarnos a usted con el fin de que conozca nuestra visi&#243;n y misi&#243;n para educar a su tesoro m&#225;s preciado: Sus hijos.<p></p>";
				  echo "<iframe frameborder=\"0\" name=\"bienvenida\" id=\"bienvenida\" src=\"bienvenida.php\" scrolling=\"auto\" style=\"border: 0px none; border-style:none none none none; width:100%; height:510px\">Su explorador no soporta frames, por favor actualicelo</iframe>";
				  break;
 	}
   ?>
  </div>
 </div>
 <div id="creditos">Copyright &copy; Liceo Anglo Colombiano 2009. Todos los derechos reservados. Dise&ntilde;o Por <span id="links_inf"><a href="http://www.videoexpress.org" target="_blank">VideoExpress.org</a></span>, programaci&oacute;n por <span id="links_inf"><a href="http://www.facamort.ws" target="_blank">Felipe Camacho</a></span></div>
</div>
<script type="text/javascript">
<!--
swfobject.registerObject("FlashID");
//-->
</script>
</body>
</html>
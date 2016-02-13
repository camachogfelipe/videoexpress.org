<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
session_start();

include ("include/funciones_globales.php");
include ("include/funciones_generales.php");

//recibimos la variable de accion de limpieza de sesion
$salir = $_REQUEST['salir'];
if($salir == true)
{
	salir($salir);
    header("Location: ../catalogo");
}

$conecta = conecta_bd("videoexpress");
$res = consulta_bd("actualizacion","alquiler, afiliacion","-1;;;");
while($row = mysql_fetch_object($res))
{
	$alquiler = $row->alquiler;
	$afiliacion = $row->afiliacion;
}
// Si están en la base de datos del registro de usuario
$_SESSION['alquiler'] = $alquiler;
$_SESSION['afiliacion'] = $afiliacion;
$p = $_REQUEST['p'];

if (isset($_POST['afiliado']) && isset($_POST['password']))
{
  // if the user has just tried to log in
  $afiliado = $_POST['afiliado'];
  $password = md5($_POST['password']);
  
  $afiliado2 = explode("@", $afiliado);
  if($afiliado2[1] == "videoexpress.org") $email_con_video = 1;
  else $email_con_video = 0;
  
  $query = consulta_bd("usuarios","*","1;;;email='$afiliado' and clave_acceso='$password';");

  while($row = mysql_fetch_object($query))
  {
	  //Asignamos los valores a las variables para manejar la sesion
	  $codigo_cliente = $row->codigo_cliente;
	  $nombre = $row->nombre;
	  $email = $row->email;
	  $tel_oficina = $row->tel_oficina;
	  $tel_oficina2 = $row->tel_oficina;
	  $tel_casa = $row->tel_casa;
	  $celular = $row->celular;
	  $direccion = $row->direccion;
	  $pass = $row->clave_acceso;
	  $ultimo_alquiler = $row->ultimo_alquiler;
	  $activo = $row->activo;
  }
  
  $usuario = strcmp($email, $afiliado);
  $clave = strcmp($pass, $password);
  if ($usuario == 0 and $clave == 0)
  {
	  // Si están en la base de datos del registro de usuario
	  $_SESSION['codigo_cliente'] = $codigo_cliente;
	  $_SESSION['usuario_afiliado'] = $nombre;
	  $_SESSION['email'] = $email;
	  if($tel_oficina != NULL) $_SESSION['telefono'] = $tel_oficina;
	  elseif ($tel_oficina2 != NULL) $_SESSION['telefono'] = $tel_oficina2;
	  elseif ($tel_casa != NULL) $_SESSION['telefono'] = $tel_casa;
	  $_SESSION['celular'] = $celular;
	  $_SESSION['direccion'] = $direccion;
	  $_SESSION['ultimo_alquiler'] = $ultimo_alquiler;
	  $_SESSION['activo'] = $activo;
	  $_SESSION['pel_alq'] = $_SESSION['suma'] = $_SESSION['tot_pel'] = $_SESSION['res'] = 0;
  }
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" href="../images/favicon.ico" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<META NAME="Title" CONTENT="VideoExpress.org" />
<META NAME="Author" CONTENT="VideoExpress.org - Felipe Camacho" />
<META NAME="Subject" CONTENT="peliculas cristianas, peliculas con mensaje, peliculas de contenido educativo" />
<META NAME="Description" CONTENT="VideoExpress.org es una empresa que tiene como objetivo el de prestar el servicio de alquiler de peliculas y venta de libros que tiene un muy buen mensaje" />
<META NAME="Keywords" CONTENT="peliculas, libros, cristianos, cristianas, mensaje, mensajes, pelicula, videos con mensaje, videos, cortos, cortometraje, cortometrajes, documentales, documental" />
<META NAME="Keywords" CONTENT="videoexpress, news, catalogo, jonás, peliculas, videos, mensaje, alquilar, alquiler, bogotá, buenas, colombia, mundo, valores, amor, audiovisuales, chicos, cristo, difusión, exhibición, familia, justicia, organización, publicación, titulo, titulos, acontecimientos, adiós, adolescentes, adquirir, adultos, articulo, campo, cartelera, cielo, cliente, conocidos, conozca, cuidad, decisiones, deseamos, dirigido, edificación, editorial, empresa, enfrentados, enseñanza, escoger, esparcimiento, espectáculo, fieras, fuego, fértil, guerreros, hombres, huracanados, ideal, imagen, libroexpress, llegamos, marcos, material, medios, mental, mente, misericordia, moda, mujeres, ninive, niñas, niños, nuevo, ocasiones, olvido, pelicula, peliculas, permanentemente, planta, politica, preocupamos, programación, protectora, públicamente, público, seres, servicios, sol, vender, videográfico, viendo, vientos, vistazo, visual, witt, aborto, abraza, abruptamente, acaricia, adecuadamente, adoración, adrián, afiliar, afirmarse, agitada, angeles, animados, apoyar, archienemigo, ardemos, armagedón, arrebatará, arrepienten, artificiales, asociados, astutos, ataque, atendiendo, auditorio, aventuras, banda, barrabás, basados, bella, bendecida, bendecir, bienvenida, brazos, buscan, básica, caer, calvario, cena, centra, charlotte, chistosa, clasificación, cobertura, columna, comisión, comparte, comprado, confort, constituida, contactenos, contento, convertirse, corazones, corazón, costumbres, crezca, cristocéntricos, culturales, darle, decide, decía, dejará, desaparecer, describen, descubrir, desear, deseo, desfile, desplaza, desplazarse, destaquen, detenerlo, devorarán, dibujos, diseñada, disfrutar, divina, documento, dvd, emplear, enciende" />
<META NAME="Language" CONTENT="Spanish" />
<META NAME="Revisit" CONTENT="1 day" />
<META NAME="Distribution" CONTENT="Global" />
<META NAME="Robots" CONTENT="All" />
<script type="text/javascript">
fbPageOptions = {
  licenseKey: "",
  language: "es",
  centerOnResize: false
};
</script>

<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-20812417-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<link type="text/css" rel="stylesheet" href="Scripts/floatbox/floatbox.css" />
<script type="text/javascript" src="Scripts/floatbox/floatbox.js"></script>
<script type="text/javascript" src="Scripts/floatbox/options.js"></script>
<script language="text/javacscript">
//Pon en la variable obligatorios el name de todos los campos que deben rellenar

obligatorio = ["busqueda"];
vacio = 0;

//Pon en la veriable textoObligatorio el texto que quieres que aparezca en el alert

textoObligatorio=["Debe ingresar al menos una palabra"];

function comprobar(este)
{
	for(a=0; a<obligatorio.length; a++)
	{		
		if(este.elements[obligatorio[a]].value == "")
		{
			alert(textoObligatorio[a]);
			este.elements[obligatorio[a]].focus();
			return false;
		}
	}
	return true;
}

obligatorio1 = ["afiliado", "password"];
//Pon en la veriable textoObligatorio el texto que quieres que aparezca en el alert

textoObligatorio1=["Nombre de usuario", "Clave de acceso"];

function comprobar1(este)
{
	for(a=0; a<obligatorio1.length; a++)
	{
		if (este.elements[obligatorio1[0]].value != "")
		{
			isMail(este.elements[obligatorio1[0]].value);
			if (x == 1)
			{
				este.elements[obligatorio1[a]].focus();
				return false;
			}
		}
		
		if(este.elements[obligatorio1[a]].value == "")
		{
			alert("Por favor, rellena el campo "+textoObligatorio1[a]);
			este.elements[obligatorio1[a]].focus();
			return false;
		}
	}
	return true;
}

function isMail(Cadena) {   
  
    Punto = Cadena.substring(Cadena.lastIndexOf('.') + 1, Cadena.length);            // Cadena del .com   
    Dominio = Cadena.substring(Cadena.lastIndexOf('@') + 1, Cadena.lastIndexOf('.'));    // Dominio @lala.com   
    Usuario = Cadena.substring(0, Cadena.lastIndexOf('@'));                  // Cadena lalala@   
    Reserv = "@/º\"\'+*{}\\<>?¿[]áéíóú#·¡!^*;,:";                      // Letras Reservadas   
       
    // Añadida por El Codigo para poder emitir un alert en funcion de si email valido o no   
    valido = true;   
       
    // verifica qie el Usuario no tenga un caracter especial   
    for (var Cont=0; Cont<Usuario.length; Cont++)
	{   
        X = Usuario.substring(Cont,Cont+1);
        if (Reserv.indexOf(X)!=-1) valido = false;
    }   
  
    // verifica qie el Punto no tenga un caracter especial   
    for (var Cont=0; Cont<Punto.length; Cont++)
	{   
        X=Punto.substring(Cont,Cont+1);
        if (Reserv.indexOf(X)!=-1) valido = false;
    }   
                           
    // verifica qie el Dominio no tenga un caracter especial   
    for (var Cont=0; Cont<Dominio.length; Cont++)
	{   
        X=Dominio.substring(Cont,Cont+1);
        if (Reserv.indexOf(X)!=-1) valido = false;
        }   
  
    // Verifica la sintaxis básica.....   
    if (Punto.length<2 || Dominio <1 || Cadena.lastIndexOf('.')<0 || Cadena.lastIndexOf('@')<0 || Usuario<1)
	{   
        valido = false;
    }   
       
    // Añadido por El Código para que emita un alert de aviso indicando si email válido o no   
    if (valido)
	{   
		return x = 0;
    }
	else
	{   
        alert('El campo Email está vacio o no es válido.');
		return x = 1;
    }   
}

<!--
function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}
function MM_nbGroup(event, grpName) { //v6.0
var i,img,nbArr,args=MM_nbGroup.arguments;
  if (event == "init" && args.length > 2) {
    if ((img = MM_findObj(args[2])) != null && !img.MM_init) {
      img.MM_init = true; img.MM_up = args[3]; img.MM_dn = img.src;
      if ((nbArr = document[grpName]) == null) nbArr = document[grpName] = new Array();
      nbArr[nbArr.length] = img;
      for (i=4; i < args.length-1; i+=2) if ((img = MM_findObj(args[i])) != null) {
        if (!img.MM_up) img.MM_up = img.src;
        img.src = img.MM_dn = args[i+1];
        nbArr[nbArr.length] = img;
    } }
  } else if (event == "over") {
    document.MM_nbOver = nbArr = new Array();
    for (i=1; i < args.length-1; i+=3) if ((img = MM_findObj(args[i])) != null) {
      if (!img.MM_up) img.MM_up = img.src;
      img.src = (img.MM_dn && args[i+2]) ? args[i+2] : ((args[i+1])?args[i+1] : img.MM_up);
      nbArr[nbArr.length] = img;
    }
  } else if (event == "out" ) {
    for (i=0; i < document.MM_nbOver.length; i++) { img = document.MM_nbOver[i]; img.src = (img.MM_dn) ? img.MM_dn : img.MM_up; }
  } else if (event == "down") {
    nbArr = document[grpName];
    if (nbArr) for (i=0; i < nbArr.length; i++) { img=nbArr[i]; img.src = img.MM_up; img.MM_dn = 0; }
    document[grpName] = nbArr = new Array();
    for (i=2; i < args.length-1; i+=2) if ((img = MM_findObj(args[i])) != null) {
      if (!img.MM_up) img.MM_up = img.src;
      img.src = img.MM_dn = (args[i+1])? args[i+1] : img.MM_up;
      nbArr[nbArr.length] = img;
  } }
}
//-->
</script>
<title>Catalogo de peliculas VideoExpress</title>
<link href="estilo.css" rel="stylesheet" type="text/css" />

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-35509708-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

</head>

<body bgcolor="#FFFFFF" onload="MM_preloadImages('botones/icononinos.png','botones/icononinos2.png','botones/iconojovenes.png','botones/iconojovenes2.png','botones/iconofamilia.png','botones/iconofamilia2.png','botones/iconoadultos.png','botones/iconoadultos2.png','botones/iconomusicales.png','botones/iconomusicales2.png','botones/Videoclips.gif','botones/Videoclips2.gif','botones/01 todos.png','botones/01 todos_2.png','botones/02 home.png','botones/02 home_2.png','botones/03 enews.png','botones/03 enews_2.png')">
<center>
<div id="principal" <?php $fondo_img = fondo(); echo "style='background-image:url(fondos/".$fondo_img."); background-position: top; background-repeat: no-repeat'"; ?>>
 <table width="1024" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="558" height="67" align="right" valign="top" style="background: url(Imagenes_pagina/index_r1_c1.png) no-repeat"><span id="text_actualizacion" style="padding-right: 20px">
      <?php echo $fecha = fecha(); ?>
    </span></td>
    <td width="466" valign="bottom" style="background:url(Imagenes_pagina/index_r1_c6.png) no-repeat" align="left">
     <table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
       <td height="34">
        <div id="menu_superior">
         <ul>
          <li><span class="borde"><a href="inf_general/?op=1" target="mostrar">Bienvenida</a></span></li>
          <li><span class="borde"><a href="inf_general/?op=2" target="mostrar">Cont&aacute;ctenos</a></span></li>
          <li><a href="inf_general/?op=3" target="mostrar">C&#243;mo solicitar pel&iacute;culas</a></li>
         </ul>
        </div>
       </td>
      </tr>
      <tr>
       <td height="33" style="background:url(Imagenes_pagina/fondo_alfa.png) repeat-x; vertical-align:middle">
        <span id="text_actualizacion" style="padding-left:20px">&Uacute;ltima actualizaci&oacute;n del cat&aacute;logo: </span>
        <span id="res_actualizacion"><?php actualizacion_catalogo(); ?></span>
       </td>
      </tr>
     </table>
    </td>
  </tr>
 </table>
 <table width="1024" border="0" cellspacing="0" cellpadding="0" style="margin: 0px 0px 0px 0px">
  <tr>
    <td width="202" height="33" align="left" style="background:url(Imagenes_pagina/index_r3_c1.png) no-repeat"/></td>
    <td width="252" align="left" valign="top" style="background:url(Imagenes_pagina/fondo_alfa.png) repeat-x; text-align:center; vertical-align:middle"><span id="links_usr"><a href="?p=vc"><img src="Imagenes_pagina/carrito.png" width="20" height="20" align="absmiddle" border="0" />&nbsp;Ver los detalles del carrito</a></span></td>
    <td width="227" align="left" valign="top" style="background:url(Imagenes_pagina/fondo_alfa.png) repeat-x; text-align:center; vertical-align:middle">
     <span id="text_actualizacion">T&iacute;tulos disponibles: </span>
     <span id="res_actualizacion"><?php echo $tt = total_titulos(); ?></span>
     </td>
    <td width="343" height="33" style="background:url(Imagenes_pagina/fondo_alfa.png) repeat-x">
     <form id="form1" name="form1" method="post" target="mostrar" action="generos.php?inf=8" onSubmit="return comprobar(this)" style="height:14px">
      <table width="284" height="22" border="0" cellspacing="0" cellpadding="0" style="margin: 0px 0px 0px 0px">
       <tr>
        <td width="284" height="22" align="left">
		 <table width="284" height="22" border="0" cellspacing="0" cellpadding="0">
          <tr>
           <td width="264px" height="22" style="background:url(Imagenes_pagina/buscar_izq.png) 100% no-repeat; padding: 2px; padding-left: 4px">
            <input name="busqueda" type="text" id="busqueda" style="height: 15px; font-size:14px; color:#000" tabindex="1" size="35" />
           </td>
           <td width="20px" height="22" style="background:url(Imagenes_pagina/buscar_der.png) 100% no-repeat">
            <input name="submit" type="image" id="submit" tabindex="2" style="width:20; height:22; margin: 0px 0px 0px 0px" src="Imagenes_pagina/buscar_lupa.png" align="left" />
           </td>
          </tr>
         </table>
        </td>
       </tr>
      </table>
     </form>
    </td>
  </tr>
 </table>
 <div style="margin-top:0px">
  <div style="width:142px; float:left; background:url(Imagenes_pagina/index_r4_c1.png) no-repeat">
   <table width="100" border="0" cellspacing="0" cellpadding="0" align="left" style="margin-top:50px; margin-left: 20px">
     <tr>
       <td><a href="generos.php?inf=1&amp;pag=1" target="mostrar" onmouseout="MM_nbGroup('out');" onmouseover="MM_nbGroup('over','icononinos.png','botones/icononinos2.png','botones/icononinos.png',1);" onclick="MM_nbGroup('down','navbar1','icononinos.png','botones/icononinos.png',1);"> <img src="botones/icononinos.png" alt="ninos" name="icononinos.png" width="90" height="90" border="0" id="icononinos.png" /></a></td>
     </tr>
     <tr>
       <td><a href="generos.php?inf=2&amp;pag=1" target="mostrar" onmouseout="MM_nbGroup('out');" onmouseover="MM_nbGroup('over','iconojovenes.png','botones/iconojovenes2.png','botones/iconojovenes.png',1);" onclick="MM_nbGroup('down','navbar1','iconojovenes.png','botones/iconojovenes.png',1);"> <img src="botones/iconojovenes.png" alt="Jovenes" name="iconojovenes.png" width="90" height="90" border="0" id="iconojovenes.png" /></a></td>
     </tr>
     <tr>
       <td><a href="generos.php?inf=3&amp;pag=1" target="mostrar" onmouseout="MM_nbGroup('out');" onmouseover="MM_nbGroup('over','iconofamilia.png','botones/iconofamilia2.png','botones/iconofamilia.png',1);" onclick="MM_nbGroup('down','navbar1','iconofamilia.png','botones/iconofamilia.png',1);"> <img src="botones/iconofamilia.png" alt="Familia" name="iconofamilia.png" width="90" height="90" border="0" id="iconofamilia.png" /></a></td>
     </tr>
     <tr>
       <td><a href="generos.php?inf=4&amp;pag=1" target="mostrar" onmouseout="MM_nbGroup('out');" onmouseover="MM_nbGroup('over','iconoadultos.png','botones/iconoadultos2.png','botones/iconoadultos.png',1);" onclick="MM_nbGroup('down','navbar1','iconoadultos.png','botones/iconoadultos.png',1);"> <img src="botones/iconoadultos.png" alt="Adultos" name="iconoadultos.png" width="90" height="90" border="0" id="iconoadultos.png" /></a></td>
     </tr>
     <tr>
       <td><a href="generos.php?inf=5&amp;pag=1" target="mostrar" onmouseout="MM_nbGroup('out');" onmouseover="MM_nbGroup('over','iconomusicales.png','botones/iconomusicales2.png','botones/iconomusicales.png',1);" onclick="MM_nbGroup('down','navbar1','iconomusicales.png','botones/iconomusicales.png',1);"> <img src="botones/iconomusicales.png" name="iconomusicales.png" width="90" height="90" border="0" id="iconomusicales.png" /></a></td>
     </tr>
     <tr>
       <td><a href="videoclips.html" target="mostrar" onmouseout="MM_nbGroup('out');" onmouseover="MM_nbGroup('over','icononumeracion.gif','botones/Videoclips2.gif','botones/Videoclips.gif',1);" onclick="MM_nbGroup('down','navbar1','icononumeracion.gif','botones/Videoclips.gif',1);"> <img src="botones/Videoclips.gif" alt="VideoClips" name="icononumeracion.gif" border="0" id="icononumeracion.gif" /></a></td>
     </tr>
     <tr>
       <td><a href="generos.php?inf=7&amp;pag=1" target="mostrar" onClick="MM_nbGroup('down','group1','todas','botones/01 todos.png',1)" onMouseOver="MM_nbGroup('over','todas','botones/01 todos_2.png','botones/01 todos.png',1)" onMouseOut="MM_nbGroup('out')"><img name="todas" src="botones/01 todos.png" border="0" alt="Todos los videos" onLoad="" /></a></td>
     </tr>
     <tr>
       <td><a href="http://www.videoexpress.org" target="_top" onClick="MM_nbGroup('down','group1','home','botones/02 home.png',1)" onMouseOver="MM_nbGroup('over','home','botones/02 home_2.png','botones/02 home.png',1)" onMouseOut="MM_nbGroup('out')"><img name="home" src="botones/02 home.png" border="0" alt="ir a video express" onLoad="" /></a></td>
     </tr>
     <tr>
       <td><a href="http://www.videoexpress.org/enews" target="_top" onClick="MM_nbGroup('down','group1','enews','botones/03 enews.png',1)" onMouseOver="MM_nbGroup('over','enews','botones/03 enews_2.png','botones/03 enews.png',1)" onMouseOut="MM_nbGroup('out')"><img name="enews" src="botones/03 enews.png" border="0" alt="enews" onLoad="" /></a></td>
     </tr>
   </table>
  </div>
  <div style="float:right">
  <table width="800" border="0" cellspacing="0" cellpadding="0" style="float: right; margin-top:0px; margin-right: 60px">
   <tr>
    <td style="height: 525px; border:1px dotted #CCC">
      <?php
	  if(isset($_SESSION['usuario_afiliado']))
	  {
		  if($email_con_video == 1) echo '<script languaje="Javascript">location.href="http://www.videoexpress.org/catalogo/?salir=true"</script>';
		  elseif ($pass == 'a6cd91f0dc660f3c800d1c2461461a7a') $pagina = "formularios/cambiar_clave.php?texto=true";
		  elseif($activo == 'no' and $pass != 'a6cd91f0dc660f3c800d1c2461461a7a') $pagina = "salir.php?pagina=inf_general";
		  elseif($p == "vc") $pagina = "carrito/ver_carrito.php";
		  else $pagina = "inf_general/?op=1";
	  }
	  elseif ($p == "vc")
	  {
		  $pagina = "carrito/ver_carrito.php";
	  }
	  elseif ($p == "clips") $pagina = "generos.php?inf=6&amp;pag=1";
	  else $pagina = "inf_general/?op=6";
	  ?>
      <iframe frameborder="0" name="mostrar" id="mostrar" src="<?php echo $pagina ?>" allowtransparency scrolling="auto" style="border: 0px none; border-style:none none none none; width:100%; height:100%">Su explorador no soporta frames, por favor actualicelo </iframe></td>
   </tr>
   <tr>
    <td>
     <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top: 8px">
      <tr>
       <td width="490" height="135" align="center">
        <div style="width:485px; height: 152px; border: 1px dotted #ccc; background:url(Imagenes_pagina/fondo_alfa.png)">
         <div id="titulo_informacion"><img src="Imagenes_pagina/titulos/recomendadas.png" /></div>
         <div style="height: 110px; margin-top: 5px"><?php recomendadas(); ?></div>
        </div>
       </td>
       <td width="310" height="135" style="padding-left: 10px">
        <?php
  if (isset($_SESSION['usuario_afiliado']))
  {
?>
    	<div style="width:323px; height: 135; border: 1px dotted #ccc; background:url(Imagenes_pagina/fondo_alfa.png)">
         <div id="titulo_informacion"><img src="Imagenes_pagina/titulos/carrito.png" /></div>
         <div style="height: 132px; margin-top: 1px; padding: 0px; text-align: justify">
          <table width="100%" border="0" cellspacing="1" cellpadding="0" style="border-bottom: 1px dotted #CCC">
		   <tr>
		    <td width="25"><img src="Imagenes_pagina/avatar.png" width="20" height="20" /></td>
		    <td><?php echo $_SESSION['usuario_afiliado']; ?></td>
		   </tr>
          </table>
          <table width="100%" border="0" cellspacing="1" cellpadding="0" style="border-bottom: 1px dotted #ccc">
		   <tr>
            <td width="25"><img src="Imagenes_pagina/total_pel.png" width="20" height="20" /></td>
		    <td width="180">Total pel&iacute;culas en el carrito</td>
		    <td width="96" style="background: url(Imagenes_pagina/titulos/fondo.png) 100%; color: #000; padding-left: 5px; font-weight: bold"><?php echo number_format($_SESSION['tot_pel']); ?></td>
		   </tr>
          </table>
          <table width="100%" border="0" cellspacing="1" cellpadding="0" style="border-bottom: 1px dotted #ccc">
		   <tr>
            <td width="25"><img src="Imagenes_pagina/total_precio.png" width="20" height="20" /></td>
		    <td width="180">Valor total del carrito</td>
		    <td width="96" style="background: url(Imagenes_pagina/titulos/fondo.png) 100%; color: #000; padding-left: 5px; font-weight: bold">$&nbsp;<?php echo number_format($_SESSION['suma'],2); ?></td>
		   </tr>
          </table>
          <table width="100%" border="0" cellspacing="1" cellpadding="0" style="border-bottom: 1px dotted #ccc">
		   <tr>
		    <td align="left"><span id="links_usr"><a href=""><img src="Imagenes_pagina/refrescar.png" width="20" height="20" align="top" border="0" />&nbsp;Actualizar el carrito</a></span></td>
		   </tr>
          </table>
          <table width="100%" border="0" cellspacing="1" cellpadding="0" style="border-bottom: 1px dotted #ccc">
           <tr>
            <td width="35%" align="center"><span id="links_usr" style="text-align: right"><a href="formularios/cambiar_clave.php" target="mostrar">cambiar tu clave</a></span> | <span id="links_usr" style="text-align: right"><a href="formularios/actualizar_datos.php" target="mostrar">Actualizar mis datos</a></span></td>
           </tr>
          </table>
          <table width="100%" border="0" cellspacing="1" cellpadding="0">
           <tr>
            <td width="30%" align="center" valign="top"><span id="links_usr" style="text-align: right"><a href="?salir=true">Salir</a></span></td>
           </tr>
          </table>
         </div>
        </div>  	
<?php
  }
  else
  {
	  $usuario = false;
?>
   <div style="width:305px; height: 152px; border: 1px dotted #ccc; background:url(Imagenes_pagina/fondo_alfa.png)">
    <div id="titulo_informacion"><img src="Imagenes_pagina/titulos/usuario.png" /></div>
    <div style="height: 128px; margin-top: 2px; padding: 2px">
     <table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0" style="vertical-align: middle">
     <form name="acceso" id="acceso" method='POST' action='' onSubmit="return comprobar1(this)">
	  <tr>
	   <td height="50%">
         <table width="100%" border="0" cellspacing="1px" cellpadding="0" style="text-align: justify; border: 1px dotted #CCC">
		  <tr>
		   <td width="20%">Usuario</td>
 		   <td style="padding-left: 5px"><input name="afiliado" type="text" size="30" /></td>
		  </tr>
		  <tr>
		   <td>Contrase&ntilde;a</td>
		   <td style="padding-left: 5px"><input name="password" type="password" size="30" /></td>
		  </tr>
		 </table>
       </td>
	  </tr>
	  <tr>
	   <td height="50%">
        <table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0" style="text-align: justify">
	     <tr>
		  <td style="font-size: 11px"><span id="links_usr"><a href="formularios/recordatorio_clave.php" target="mostrar">Olvido su clave?</a><br /><a href="formularios/recordatorio_usuario.php" target="mostrar">Olvido su usuario?</a><br /><a href="formularios/afiliacion.php" target="mostrar">Me deseo afiliar</a></span>
          </td>
		  <td width="120px" style="text-align: center"><input type="image" src="Imagenes_pagina/ingresar.png" name="submit" value="submit" /></td>
		 </tr>
		</table>
       </td>
	  </tr>
      </form>
	 </table>
    </div>
   </div>
<?php
  }
?>
       </td>
      </tr>
     </table>
    </td>
   </tr>
  </table>
 </div>
 </div>
</div>
<div id="copyright">Copyright &copy; VideoExpress.org 2009. Todos los derechos reservados. <span id="links_inf"><a href="politica.php" target="mostrar">Politica de privacidad.</a></span> Dise&ntilde;o Por <span id="links_inf"><a href="http://www.videoexpress.org">VideoExpress.org</a></span>, programaci&oacute;n por <span id="links_inf"><a href="http://www.cogroupsas.com" target="_blank">CO Group<img src="Imagenes_pagina/co_group15x15.png" width="15" height="15" border="0" /></a></span> <img src="Imagenes_pagina/navegadores.png" width="178" height="15" /></div>
</center>
</body>
</html>
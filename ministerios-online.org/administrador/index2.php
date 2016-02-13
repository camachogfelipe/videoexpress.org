<?php require_once('admin/Connections/Proyectos.php'); 
?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "")
{
  $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}
?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['frmUsuario'])) {
  $loginUsername=$_POST['frmUsuario'];
  $password=($_POST['frmContrasena']);
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "admin/admin.php";
  $MM_redirectLoginFailed = "acceso_denegado.php";
  $MM_redirecttoReferrer = true;
  mysql_select_db($database_Proyectos, $Proyectos);

  $LoginRS__query=sprintf("SELECT usuario, contrasena FROM empresa WHERE usuario=%s AND contrasena=%s",
    GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text"));

  $LoginRS = mysql_query($LoginRS__query, $Proyectos) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = "";

    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
	$_SESSION['correoelectronico'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;

    if (isset($_SESSION['PrevUrl']) && true) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf8_polish_ci" /> 
<META http-equiv=Content-Type content="text/html; charset=iso-8859-2"> 
<META http-equiv=Content-Type content="text/html; charset=utf8"> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="favicon.ico" />
<link rel="stylesheet" type="text/css" href="CIEC style.css"/>
<title>MINISTERIOS ONLINE</title>
<script src="Scripts/swfobject_modified.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="Scripts/floatbox/floatbox.css"/>
<script type="text/javascript" src="Scripts/floatbox/floatbox.js"></script>
<script>
<!--
function valida_envio(){

		document.formulario.action = 'resultados.php';
		document.formulario.submit();
	
}
function borrar_contenido(){

		document.getElementById('keyword').value="";
		
	
}
function borrar_contenido2(){

		document.getElementById('frmUsuario').value="";
		
	
}
function borrar_contenido3(){

		document.getElementById('frmContrasena').value="";
		
	
}
function inicia_sesion(){

	
		document.frmLogin.submit();
	
}

</script>
</head>



<body style="margin-top:0px">
<div class="superior">
	  <div class="interiorsup">
   		<div class="logo"><a href="index.php"><img src="images/logoCIEC.png" alt="logo" width="158" height="161" align="left" /></a></div>
        	<div class="barra"><img src="images/barra 2.png" alt="barra" width="837" height="40" align="right" /></div>
            <div class="contmenu">
            	<ul class="menu" >
            		<li>Organizaci&oacute;n
      					<ul>
         					<li><a href="vision.html" class="floatbox">Visi&oacute;n</a></li>
         					<li><a href="mision.html" class="floatbox">Misi&oacute;n</a></li>
                            <li><a href="historia.html" class="floatbox" >Historia</a></li>
      					</ul>
   					</li>
   					<li>Afiliaci&oacute;n
      					<ul>
        					<li><a href="pasos.html" class="floatbox" >Proceso</a></li>
         					<li><a href="carta.doc" >Documentaci&oacute;n</a></li>
                            <li><a href="formulario_preinscripcion.php" class="floatbox" >Preinscripci&oacute;n</a></li>
      					</ul>
  					</li>
                    <li>Beneficios
      					<ul>
         					<li><a href="Beneficios.html" class="floatbox">Para su empresa</a></li>
         					<li>Para el pa&iacute;s</li>
                            <li>Para la Iglesia</li>
      					</ul>
   					</li>
                    <li><a href="documentos/estatutos.pdf" class="floatbox">Estatutos</a>
      					
   					</li>
                    <li><a href="formulario_contacto.html" class="floatbox">Contacto</a>
   					</li>
			  </ul>
            </div>
	  </div>
        <div class="buscador" id="texto_pie" >
		<form class="busqueda" id= "formulario" name="buscar" action="resultados.php" method="get" >
        Encuentre lo que necesita en nuestra feria virtual de empresas 
        	<select name="lugar" class="seleccion" id="lugar">
            					 <? $queryMensaje2 = "select id_tipo_busqueda, nombre_tipo_busqueda from tipo_busqueda";
                         $row1 = mysql_query($queryMensaje2,$conexion);			           
	while($row = mysql_fetch_row($row1)) 
	
	{ $nombre =$row[1]; 
	  $id = $row[0];
						?>
                    	<option value="<?php echo $id?>"><?php echo $nombre ?></option>
                        
                        <?
							}
						
						?>
			</select>
   
             
            					
         <select name="clasificacion" id="clasificacion" class="seleccion" >
         <? $queryMensaje2 = "select id_clasificacion, nombre_clasificacion from clasificacion";
                         $row1 = mysql_query($queryMensaje2,$conexion);			           
	while($row = mysql_fetch_row($row1)) 
	
	{ $nombre =$row[1]; 
	  $id = $row[0];
						?>
                    	<option value="<?php echo $id?>"><?php echo $nombre ?></option>
                        
                        <?
							}
						
						?>
		  </select>
            <input name="keyword" class="seleccion" value="ingrese su busqueda" id="keyword" align="top" size="15" onclick="borrar_contenido();"></input>
            <input  type="image"  align="middle"  src="images/btn_busqueda.png"onclick="valida_envio();" ></input>
        </form>
        
        <form class="ingreso" id="frmLogin" name="frmLogin" method="POST" action="<?php echo $loginFormAction; ?>">Ingrese al sistema o <a href="" style="color:#C00">afiliese</a><br />
        <input name="frmUsuario" id="frmUsuario"class="seleccion" size="10" value="Usuario" onclick="borrar_contenido2();"></input>
        <input  type="password" name="frmContrasena" class="seleccion" size="10" value="contrasena" id="frmContrasena" onclick="borrar_contenido3();" ></input>
        <input name="btnLogin" type="image" src="images/btn_ingreso.png" align="middle" onclick="inicia_sesion();" ></input>
        </form>
      
       </div>
       <div class="contenido">
   		 <div class="images">
             <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="960" height="360" id="FlashID" title="pantalla">
      		    <param name="movie" value="media/banner_principal.swf" />
      		    <param name="quality" value="high" />
      		    <param name="wmode" value="transparent" />
      		    <param name="swfversion" value="6.0.65.0" />
      		    <!-- Esta etiqueta param indica a los usuarios de Flash Player 6.0 r65 o posterior que descarguen la versión más reciente de Flash Player. Elimínela si no desea que los usuarios vean el mensaje. -->
      		    <param name="expressinstall" value="Scripts/expressInstall.swf" />
      		    <param name="SCALE" value="exactfit" />
      		    <!-- La siguiente etiqueta object es para navegadores distintos de IE. Ocúltela a IE mediante IECC. -->
      		    <!--[if !IE]>-->
      		    <object type="application/x-shockwave-flash" data="media/banner_principal.swf" width="960" height="360">
      		      <!--<![endif]-->
      		      <param name="quality" value="high" />
      		      <param name="wmode" value="transparent" />
      		      <param name="swfversion" value="6.0.65.0" />
      		      <param name="expressinstall" value="Scripts/expressInstall.swf" />
      		      <param name="SCALE" value="exactfit" />
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
   		 <div class="columnas"> 
          	
            <div class="contactos">
            <h1 id="blanco">Formas de Contacto</h1>
            <p><img src="images/telefono.png" width="225" height="40" alt="telefono" style="margin-top:-7px"/></p>
            <p><img src="images/fax.png" width="227" height="48" alt="fax" /></p>
            <p><img src="images/mail.png" width="226" height="42" alt="mail" /></p>
            <p id="centrar">
            <img src="images/correo.png" width="65" height="51" alt="correo" /><img src="images/twitter.png" width="50" height="53" alt="twitter"  /> <img src="images/face.png" width="50" height="52" alt="face"></img></p>                        </div>
           <div class="feria">
             <h1>Feria Virtual</h1><p>
             Cientos de empresas se estan sumando para darle lo mejor a usted. &Uacute;nase a trv&eacute;s de estos sencillos pasos y haga parte de la m&aacute;s grande agremiaci&oacute;n de empresas cristianas.</p>
           </div>
          
         
          </div>
        <div class="noticias">
            <h1>NOTI<font color="#CC0000">CIEC</font></h1>
          <div class="noti1">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam diam tellus, volutpat sed congue sed, rutrum vitae turpis. Etiam et mi et metus posuere eleifend. Morbi sed consequat libero. Duis viverra felis in quam ultrices scelerisque. Mauris enim eros, ultrices at posuere sed, luctus a turpis. Praesent ligula sem, tempus eleifend feugiat quis, consectetur non dui. Nam fringilla porttitor nisi et posuere. Pellentesque placerat sagittis lorem at venenatis. Vivamus et est eu nibh sollicitudin dignissim. Nunc accumsan hendrerit mattis. Praesent dictum bibendum diam, vitae vehicula orci laoreet ac. In bibendum enim id dui tristique adipiscing. Fusce viverra accumsan dolor vitae auctor.
              
         </div>
              <div class="numerador">1 2 3 4 5 &gt;&gt; </div>
          </div>
          </div>
    	<div class="inferior">
        	<div class="interiorinf">
            <div class="interiorinfenlaces">
            	<div class="panelinf">
                <img src="images/CIEC.png" width="102" height="32" alt="ciec letra" />
                </div><br/><br/><br/>
                 <div class="panelinf2">
                <a href="">Organizaci&oacute;n<br /></a>
                <a href="">Afiliaci&oacute;n<br /></a>
               	<a href=""> Beneficios<br /></a>
                <a href="">Estatutos</a>
              
    <p>
    <a href="http://validator.w3.org/check?uri=referer"><img
      src="http://www.w3.org/Icons/valid-xhtml10" alt="Valid XHTML 1.0 Transitional" height="31" width="88" /></a>
  </p>

                </div>
                <div class="panelinf2">
                <a href="">Junta Directiva<br /></a>
                <a href="">Visionarios<br /></a>
               	<a href="">Lista de Miembros<br /></a>
                </div>
                <div class="panelinf2">
                <a href="">Recursos<br /></a>
                <a href="">Im&aacute;genes<br /></a>
               	<a href="">Video<br /></a>
                </div>                           
             </div>
             <div class="interioraliados">
             <div class="panelinf" id="titulo1">
                Aliados
               </div><br/><br/><br/>
                <div class="panelinf3"><img src="images/logo acoopi.png" width="114" height="122" alt="logo acopi" /></div>
             </div>
    	</div>
    </div>
	</div>
<script type="text/javascript">
swfobject.registerObject("FlashID");
</script>
</body>
</html>

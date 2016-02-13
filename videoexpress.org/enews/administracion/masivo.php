<?php
$bd = 'enews';
include("conexion.php");

function resultados($id)
{
	$sql = "SELECT * FROM inicio WHERE No = '$id'";
	
	$result = mysql_query($sql) or die("La siguiente consulta contiene alg&uacute;n error:<br>nSQL: <b>$cadbusca</b>");

	$No_items = 0;
	while ($row = mysql_fetch_array($result))
	{
		$info[No] 			= "{$row['No']}";
		$info[titulo_paraeditar]	= "{$row['titulo_paraeditar']}";
		$info[cuerpo_paraeditar] 	= "{$row['cuerpo_paraeditar']}";
		$info[titulo_primerafila]	= "{$row['titulo_primerafila']}";
		$info[cuerpo_primerafila] 	= "{$row['cuerpo_primerafila']}";
		$info[titulo_nuevamente]	= "{$row['titulo_nuevamente']}";
		$info[cuerpo_nuevamente] 	= "{$row['cuerpo_nuevamente']}";
		$info[titulo_buenasnuevas]	= "{$row['titulo_buenasnuevas']}";
		$info[cuerpo_buenasnuevas] 	= "{$row['cuerpo_buenasnuevas']}";
		$info[titulo_garabatos]		= "{$row['titulo_garabatos']}";
		$info[cuerpo_garabatos] 	= "{$row['cuerpo_garabatos']}";
		$info[fecha]			= "{$row['fecha']}";
		$info[fondo]			= "{$row['fondo']}";
		$No_items++;
	}
	
	return $info;
}

$sql = "select MAX(id) FROM sus_enews";
$result = mysql_query($sql) or die("La siguiente consulta contiene alg&uacute;n error:<br>nSQL: <b>$sql</b>");
$t = mysql_fetch_array($result);
$final = $t[0];

$sql = "select * FROM programacion_mail";
$result = mysql_query($sql) or die("La siguiente consulta contiene alg&uacute;n error:<br>nSQL: <b>$sql</b>");
while($row=mysql_fetch_object($result))
{
	$programado = $row->programado;
	$inicio		= $row->inicio;
	$id			= $row->enews;
	$errores	= $row->errores;
	$fecha_final= $row->fecha_final;
	$correo_final= $row->correo_final;
}

$tm = 50;
$faltan = $final - $inicio;
if($faltan < $tm) $tm = $faltan;

if($programado == 1 and $faltan > 0)
{
	$sql = "select * FROM sus_enews limit $inicio,$tm";
	$result = mysql_query($sql) or die("La siguiente consulta contiene alg&uacute;n error:<br>nSQL: <b>$sql</b>");
	$i = 0;
	while($row=mysql_fetch_object($result))
	{
		$correo[$i]	.= $row->email;
		$i++;
	}

	$info = resultados($id);
	
	$cuerpo = '<br /><center>
 <div id="Imagen_de_fondo" style="background:url(http://www.videoexpress.org/enews/imagenes-para-secciones/fondos/'.$info[fondo].')">
  <div id="Imagen_de_base">
   <div id="No">
    <span style="color: #000">Num. '.$info[No].'&nbsp;&#8226;&nbsp;'.$info[fecha].'</span>
   </div>
   <table width="500" border="0" cellspacing="0" cellpadding="0">
    <tr>
     <td height="173px" style="text-align:center">&nbsp;</td>
    </tr>
    <tr>
     <td height="550px">
       <table width="498" border="0" cellspacing="0" cellpadding="0">
         <tr>
           <td width="50%" id="td_cuerpo" class="left">
            <span id="index">
             <span id="index" class="resaltado">'.$info[titulo_paraeditar].'</span><br />'.$info[cuerpo_paraeditar].'
            </span>
           </td>
           <td><img src="http://www.videoexpress.org/enews/imagenes/paraeditar_index.png" width="247" height="109" border="0" usemap="#paraeditar" /></td>
         </tr>
         <tr>
           <td><img src="http://www.videoexpress.org/enews/imagenes/primerafila_index.png" width="247" height="109" border="0" usemap="#primerafila" /></td>
           <td id="td_cuerpo" class="right">
            <span id="index">
             <span id="index" class="resaltado">'.$info[titulo_primerafila].'</span><br />'.$info[cuerpo_primerafila].'
            </span>
           </td>
         </tr>
         <tr>
           <td id="td_cuerpo" class="left">
            <span id="index">
             <span id="index" class="resaltado">'.$info[titulo_nuevamente].'</span><br />'.$info[cuerpo_nuevamente].'
            </span>
           </td>
           <td><img src="http://www.videoexpress.org/enews/imagenes/nuevamente_index.png" width="247" height="109" border="0" usemap="#nuevamente" /></td>
         </tr>
         <tr>
           <td><img src="http://www.videoexpress.org/enews/imagenes/buenasnuevas_index.png" width="247" height="109" border="0" usemap="#buenasnuevas" /></td>
           <td id="td_cuerpo" class="right">
            <span id="index">
             <span id="index" class="resaltado">'.$info[titulo_buenasnuevas].'</span><br />'.$info[cuerpo_buenasnuevas].'
            </span>
           </td>
         </tr>
         <tr>
           <td id="td_cuerpo" class="left">
            <span id="index">
             <span id="index" class="resaltado">'.$info[titulo_garabatos].'</span><br />'.$info[cuerpo_garabatos].'
            </span>
           </td>
           <td><img src="http://www.videoexpress.org/enews/imagenes/garabatos_index.png" width="247" height="109" border="0" usemap="#garabatos" /></td>
         </tr>
       </table>
      </td>
    </tr>
    <tr>
     <td id="mail">Una publicaci&oacute;n de <b>VideoExpress.org</b><br />La primera organizaci&oacute;n de alquiler, venta, difusi&oacute;n y exhibici&oacute;n de <b>Videos con principios y valores</b></td>
    </tr>
   </table>
  </div>
 </div>
 <div id="linkweb">Cont&aacute;ctenos a <a href="mailto:news@videoexpress.org; gerencia@videoexpress.org" class="linkweb"><u>news@videoexpress.org</u>  / <u>gerencia@videoexpress.org</u></a><br />
    Tel.: (57 1) 526 9007  &bull; Cel.: 312 4907879<br />
    Bogot&aacute; - Colombia
    &bull; &copy; VideoExpress.org</a>. 2011.
 </div>
</center>

<map name="paraeditar" id="paraeditar">
  <area shape="rect" coords="0,0,247,109" href="http://www.videoexpress.org/enews/seccion.php?seccion=para_editar&id='.$info[No].'" alt="Para editar..." />
</map>
<map name="primerafila" id="primerafila">
  <area shape="rect" coords="0,0,247,109" href="http://www.videoexpress.org/enews/seccion.php?seccion=primera_fila&id='.$info[No].'" alt="En primera fila" />
</map>
<map name="nuevamente" id="nuevamente">
  <area shape="rect" coords="0,0,247,109" href="http://www.videoexpress.org/enews/seccion.php?seccion=nueva_mente&id='.$info[No].'" alt="Nueva...mente" />
</map>
<map name="buenasnuevas" id="buenasnuevas">
  <area shape="rect" coords="0,0,247,109" href="http://www.videoexpress.org/enews/seccion.php?seccion=buenas_nuevas&id='.$info[No].'" alt="Buenas nuevas para ver" />
</map>
<map name="garabatos" id="garabatos">
  <area shape="rect" coords="0,0,247,109" href="http://www.videoexpress.org/enews/seccion.php?seccion=garabatos&id='.$info[No].'" alt="Videos y Garabatos" />
</map>';

// múltiples recipientes
$asunto = $info[titulo_paraeditar];
$mensaje = '
<title>VideoExpress.org @-news</title>
<style type="text/css">
html {
	height:auto;
}

body
{
  font-family:Verdana, Geneva, sans-serif;
  background-color: #BBBBBB;
  text-decoration: none;
  margin:0;
  padding:0;
  background: url(http://www.videoexpress.org/enews/imagenes/bg-page.gif);
}

#td_cuerpo
{
  height: 110px;
  color: #FFF;
  vertical-align: text-top;
}

#td_cuerpo.left
{
  text-align: justify;
}

#td_cuerpo.right
{
  text-align: right;
}

#linkweb
{
  font-family: Arial, Helvetica, sans-serif;
  font-size: 10px;
  text-align: center;
  width: 700px;
  background-color: #000;
  color: #FFF;
  border-top: #999 dotted 1px;
}

#linkweb a
{
  font-family: Arial, Helvetica, sans-serif;
  font-size: 10px;
  text-align: center;
  color: #FFF;
}

#linkweb a:hover
{
  font-family: Arial, Helvetica, sans-serif;
  font-size: 10px;
  text-align: center;
  color: #ffff99;
}

#Imagen_de_fondo, #Imagen_de_base
{
  width: 700px;
  height: 795px;
  background-position: center;
}

#Imagen_de_base
{
  background-image: url(http://www.videoexpress.org/enews/imagenes/index.png);
}

#No
{
  width:200px;
  color:#113687;
  font-size:12px;
  margin-left:300px;
}

#img_logo
{
  width: 243px;
  height: 55px;
  border: 0px;
}


#mail
{
  width: 100%;
  color:#FFF;
  padding: 10px;
  font-size:10px;
  text-align:center;
}

#navbar
{
  border: 0px none transparent;
  font-weight:normal;
  line-height:normal;
  font-size: 10px;
  padding: 0px;
  color:#FFF;
  margin-top: 9px;
  cell
}

#navbar ul li
{
  list-style: none;
  margin:0;
  padding:0;
  display: inline;
  background: url(http://www.videoexpress.org/enews/imagenes/menu.png) 100% repeat-x;
}

#navbar ul
{
  list-style: none;
  display: inline;
  text-align: center;
}

#navbar li
{
  list-style: none;
  display:inline;
  float: left;
}

#navbar ul li a
{
  display: inline;
  color: #FFF;
  text-decoration: none;
  border-style: none none none none;
  border: 0px;
}

#navbar ul li a span
{
  display:block;
  padding: 5px;
}

#navbar ul li span
{
  display:block;
  padding: 5px;
}

#navbar ul li a:hover span
{
  color: #FFFF00;
  background-color: transparent;
  text-align: center;
  border-style: none none none none;
  border: 0px;
}

#navbar #current a
{
  background: url(http://www.videoexpress.org/enews/imagenes/Menu_resaltado.png) 100% repeat-x;
  color: #FFFF00;
  background-color: transparent;
  text-align: center;
  border-style: none none none none;
  border: 0px;
}

#navbar #current a span
{
  background: url(http://www.videoexpress.org/enews/Imagenes/Menu_resaltado.png) 100% repeat-x;
  color: #FFFF00;
  background-color: transparent;
  text-align: center;
  border-style: none none none none;
  border: 0px;
}

.menu_derecha
{
  border-right: 1px dotted;
}

#logo
{
  margin:16px 21px 0 21px;
  padding-top: 25px;
  padding-left:20px;
  padding-right: 20px;
  padding-bottom:0;
  background-color: #FFFFFF;
  background-repeat: no-repeat;
  background-position: center top;
}

.clear {
	clear:both;
}

#main {
	width:652px;
	margin:auto;
	background-color:#000000;
	background-repeat: repeat-y;
	border:1px solid #464646;
    font-size: 11px;
	color: #464646;
    height:100%;
}

#main-inner {
	margin:0px 21px 16px 21px;
	padding:10px 20px 20px 20px;
	min-height:200px;
	background-color: #FFFFFF;
	background-image: url(http://www.videoexpress.org/enews/imagenes/bg-main-inner-bottom.gif);
	background-repeat: no-repeat;
	background-position: center bottom;
	height: auto;
}
#main-inner-left {
	width: 386px;
	display:block;
	float:left;
	line-height:18px;
}
#main-inner-right {
	width: 171px;
	display:block;
	float:right;
}

#headingimg {
	margin:18px 0 0 0;
}

h1, h2, h3, h4, h5, h6
{
  margin: 15px 0;
}

p, ul, ol
{
  margin: 15px 0;
}

#box-small
{
  width:171px;
  min-height:146px;
  margin-top:15px;
  background-color: #DEDEDE;
  background-image: url(http://www.videoexpress.org/enews/imagenes/bg-box-bottom-small.gif);
  background-repeat: no-repeat;
  background-position: center bottom;
}

#box-top-small
{
  width:171px;
  height:12px;
  background-color: #FFFFFF;
  background-image: url(http://www.videoexpress.org/enews/imagenes/bg-box-top-small.gif);
  background-repeat: no-repeat;
  background-position: center bottom;
}

#box-small p
{
  padding:0 8px 12px 8px;
  margin:0;
  font-family: Verdana, Arial, Helvetica, sans-serif;
  font-size: 11px;
  color: #669999;
  text-align:right;
}

#Titulo
{
  font-family: Verdana, Arial, Helvetica, sans-serif;
  font-size: 20px;
  text-align: justify;
}

#resaltado
{
  font-family: "Trebuchet MS", "Lucida Grande", Verdana, Sans-Serif;;
  font-size: 18px;
  color: #464646;
  text-align: left;
  font-weight: normal;
}

#edicion
{
  font-family: Verdana, Arial, Helvetica, sans-serif;
  font-size: 10px;
  font-weight: bold;
  color: #FFFFFF;
  text-align: center;
}

#photo-main
{
  width: 385px;
  height: 145px;
  background-color: #ffffff;
}

#photo-main.mascara
{
  background: url(http://www.videoexpress.org/enews/imagenes/mascara-photo-main.png) no-repeat;
}

#index
{
	color: #FFF;
	font-size: 10px;
}

#index.resaltado
{
	font-weight: bold;
}

#menu_admon
{
  color: #9CCE17;
  margin-left:16px;
  margin-right:15px;
  text-align:center;
  height: 40px;
  font-weight: bold;
}


#menu_admon a
{
  color: #9CCE17;
  text-decoration: none;
  text-align: center;
  border-style: none none none none;
  border: 0px;
}

#menu_admon a:link, #menu_admon li a:visited {
        color: #9CCE17;
        text-align: center;
        border-style: none none none none;
        border: 0px;
        }

#menu_admon a:hover {
        color: #FFF;
        background-color: transparent;
        text-align: center;
        border-style: none none none none;
        border: 0px;
        }

#menu_admon a:active {
  color: #FFF;
  background-color: transparent;
  text-align: center;
  border-style: none none none none;
  border: 0px;
}

#listado_contenido
{
  color: #FFF;
  font-size: 10px;
}

.encabezado_tabla
{
  background-color: #996600;
  color: #000;
}

#enc_tabla_cont
{
  background-color: #9CCE17;
  color: #000;
  font-size: 14px;
  width: 100%;
  height: 22px;
  font-weight: bold;
  padding: 5px;
  clear: both;
}

#enc_tabla_cont a
{
  font-family: Arial, Helvetica, sans-serif;
  font-size: 14px;
  text-align: center;
  color: #000;
  text-decoration: none;
  font-weight: bold;
}

#enc_tabla_cont a:hover
{
  font-family: Arial, Helvetica, sans-serif;
  font-size: 14px;
  text-align: center;
  color: #fff;
  text-decoration: none;
  font-weight: bold;
}
</style>
'.$cuerpo;
mailphpmailer($asunto, $mensaje, $correo, $inicio, $tm, $errores);
}

function mailphpmailer($asunto, $mensaje, $correo, $inicio, $tm, $errores)
{
	// primero hay que incluir la clase phpmailer para poder instanciar
  //un objeto de la misma
  require "PHPMailer_v5.1/class.phpmailer.php";

  //instanciamos un objeto de la clase phpmailer al que llamamos 
  //por ejemplo mail
  $mail = new phpmailer();

  //Definimos las propiedades y llamamos a los métodos 
  //correspondientes del objeto mail

  //Con PluginDir le indicamos a la clase phpmailer donde se 
  //encuentra la clase smtp que como he comentado al principio de 
  //este ejemplo va a estar en el subdirectorio includes
  $mail->PluginDir = "PHPMailer_v5.1/";

  //Con la propiedad Mailer le indicamos que vamos a usar un 
  //servidor smtp
  $mail->Mailer = "sendmail";
  
  $mail->IsHTML(true);

  //Asignamos a Host el nombre de nuestro servidor smtp
  //$mail->Host = "smtp.videoexpress.org";

  //Le indicamos que el servidor smtp requiere autenticación
  //$mail->SMTPAuth = true;

  //Le decimos cual es nuestro nombre de usuario y password
  //$mail->Username = "prueba@videoexpress.org"; 
  //$mail->Password = "prueba";

  //Indicamos cual es nuestra dirección de correo y el nombre que 
  //queremos que vea el usuario que lee nuestro correo
  $mail->From = "enews@videoexpress.org";
  $mail->FromName = $asunto;

  //el valor por defecto 10 de Timeout es un poco escaso dado que voy a usar 
  //una cuenta gratuita, por tanto lo pongo a 30  
  $mail->Timeout=30;

  //Asignamos asunto y cuerpo del mensaje
  //El cuerpo del mensaje lo ponemos en formato html, haciendo 
  //que se vea en negrita
  $mail->Body = $mensaje;

  //Definimos AltBody por si el destinatario del correo no admite email con formato html 
  $mail->AltBody = $mensaje;

  //Indicamos cual es la dirección de destino del correo
  $coutn = count($correo);
  for($x=0; $x<$coutn; $x++)
  {
	  $mail->ClearAddresses();
	  $mail->ClearAllRecipients();
	  $mail->AddAddress($correo[$x]);
	  //se envia el mensaje, si no ha habido problemas 
	  //la variable $exito tendra el valor true
	  $exito = $mail->Send();

	  //Si el mensaje no ha podido ser enviado se realizaran 4 intentos mas como mucho 
	  //para intentar enviar el mensaje, cada intento se hara 5 segundos despues 
	  //del anterior, para ello se usa la funcion sleep	
	  $intentos=1; 
	  while ((!$exito) && ($intentos < 1))
	  {
		  sleep(5);
		  //echo $mail->ErrorInfo;
     	  $exito = $mail->Send();
     	  $intentos=$intentos+1;	
	  }
	  if(!$exito) $errores .= "- ".$correo[$x]."\n";
	  $correo[$x] = NULL;
  }
  $inicio += $tm;
  $sql = "UPDATE programacion_mail SET inicio='$inicio', errores='$errores'";
  if($tm < 50 )
  {
	  $sql .= ", fecha_final='".date("Y-m-d")."'";
	  $mail->Subject = "Confirmaci&oacute;n de correo enews";
	  $mail->Body = "Se enviaron todos los correos de de enews<p>Correos no enviados: <p>".$errores."</p></p>";
	  $mail->AltBody = $mail->Body;
	  $mail->ClearAddresses();
	  $mail->AddAddress("gerencia@videoexpress.org");
	  $exito = $mail->Send();
  }
  $sql .= " WHERE No='1'";
  mysql_query($sql) or die(mysql_error());
}
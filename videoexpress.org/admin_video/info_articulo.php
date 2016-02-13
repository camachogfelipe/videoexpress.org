<?php
session_start();
function ObtenerNavegador($user_agent)
{
	$navegadores = array(  
           'Opera' => 'Opera',  
           'Mozilla Firefox'=> '(Firebird)|(Firefox)',  
           'Galeon' => 'Galeon',  
           'Mozilla'=>'Gecko',  
           'MyIE'=>'MyIE',  
           'Lynx' => 'Lynx',  
           'Netscape' => '(Mozilla/4\.75)|(Netscape6)|(Mozilla/4\.08)|(Mozilla/4\.5)|(Mozilla/4\.6)|(Mozilla/4\.79)',  
           'Konqueror'=>'Konqueror',  
           'Internet Explorer 7' => '(MSIE 7\.[0-9]+)',  
           'Internet Explorer 6' => '(MSIE 6\.[0-9]+)',  
           'Internet Explorer 5' => '(MSIE 5\.[0-9]+)',  
           'Internet Explorer 4' => '(MSIE 4\.[0-9]+)',  
	);  
	foreach($navegadores as $navegador=>$pattern)
	{
		if (eregi($pattern, $user_agent)) return $navegador;
	}
	return 'Desconocido';
}
$explorer = ObtenerNavegador($_SERVER['HTTP_USER_AGENT']);

if($explorer == "Internet Explorer 7") $link = '<link rel="stylesheet" type="text/css" href="../catalogo/tabs/tabsIE7.css" />';
else $link = '<link rel="stylesheet" type="text/css" href="../catalogo/tabs/tabs.css" />';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<script src="../catalogo/Scripts/flowplayer-3.2.4.min.js" type="text/javascript"></script>
<script src="../catalogo/Scripts/jquery-1.4.4.min.js"></script>
<script type="text/javascript">
/************************************

	Custom Alert Demonstration
	version 1.0
	last revision: 02.02.2005
	steve@slayeroffice.com

	Should you improve upon this source please
	let me know so that I can update the version
	hosted at slayeroffice.

	Please leave this notice in tact!

************************************/

var ALERT_TITLE = "Mensaje de aviso de VideoExpress.org";
var ALERT_BUTTON_TEXT = "Ok";

if(document.getElementById) {
	window.alert = function(txt) {
		createCustomAlert(txt);
	}
}

function createCustomAlert(txt) {
	d = document;

	if(d.getElementById("modalContainer")) return;

	mObj = d.getElementsByTagName("body")[0].appendChild(d.createElement("div"));
	mObj.id = "modalContainer";
	mObj.style.height = d.documentElement.scrollHeight + "px";
	
	alertObj = mObj.appendChild(d.createElement("div"));
	alertObj.id = "alertBox";
	if(d.all && !window.opera) alertObj.style.top = document.documentElement.scrollTop + "px";
	alertObj.style.left = (d.documentElement.scrollWidth - alertObj.offsetWidth)/2 + "px";
	alertObj.style.visiblity="visible";

	h1 = alertObj.appendChild(d.createElement("h1"));
	h1.appendChild(d.createTextNode(ALERT_TITLE));

	msg = alertObj.appendChild(d.createElement("p"));
	//msg.appendChild(d.createTextNode(txt));
	msg.innerHTML = txt;

	btn = alertObj.appendChild(d.createElement("a"));
	btn.id = "closeBtn";
	btn.appendChild(d.createTextNode(ALERT_BUTTON_TEXT));
	btn.href = "#";
	btn.focus();
	btn.onclick = function() { removeCustomAlert();return false; }

	alertObj.style.display = "block";
	
}

function removeCustomAlert() {
	document.getElementsByTagName("body")[0].removeChild(document.getElementById("modalContainer"));
}

$(document).ready(function()  
{  
	$(".tab_content").hide();  
	$(".tabs li:first").addClass("active").show();  
	$(".tab_content:first").show();  
	$(".tabs li").click(function()  
	{  
		//$(".tabs li").removeClass("active");  
		$(".boton").css("background-image","boton2.png");
		$(".tab_content").hide();  
		var activeTab = $(this).find("a").attr("href");  
		$(activeTab).fadeIn();  
		return false;  
	});  
});

$(document).ready(function()
{
	$().ajaxStart(function()
	{
		$('#loading').show();
		$('#result').hide();
	});
	$('#form, #comentar').submit(function()
	{
		$('#loading').hide();
		$.ajax(
		{
			type: 'POST',
			url: $(this).attr('action'),
			data: $(this).serialize(),
			success: function(data)
			{
				var result = $('#result').html(data);
				$(result).fadeIn('slow');
			}
		})
		return false;
	}); 
});
</script>
<?php echo $link; ?>
</head>

<?php
$id_p = $_GET['id_p'];
$aud = $_GET['aud'];
$carro=$_SESSION['carro'];

if ($id_p == NULL)
{
	echo "<span id='msg'>Para poder ver la informaci&oacute;n de alguna pel&iacute;cula es preciso que lo haga por medio del menu de pel&iacute;culas o de la busqueda en la p&aacute;gina principal</span>";
}
else
{
	include('../catalogo/include/funciones_globales.php');
	$conecta = conecta_bd("videoexpress");
	
	if($aud == "*")
	{
		$res = sel_items_form("catalogo","id","2;titulo;asc;;");
		$total_resultados = count($res);
	}
	else
	{
		$res = sel_items_form("catalogo","id","3;titulo;asc;auditorio = '$aud';");
		$total_resultados = count($res);
	}
	
	$anterior = '<img src="../catalogo/tabs/back.png" width="94" height="66" border="0" alt="Anterior" style="cursor:pointer" />';
	$siguiente = '<img src="../catalogo/tabs/right.png" width="94" height="66" border="0" alt="Siguiente" style="cursor:pointer" />';

	$result = consulta_bd("catalogo","*","1;;;id='$id_p';");
	
	while ($row = mysql_fetch_array($result))
	{
		$titulo = "{$row['titulo']}";
		$clasificacion = "{$row['clasificacion']}";
		$genero = "{$row['genero']}";
		$tiempo = "{$row['tiempo']}";
		$descripcion = "{$row['descripcion']}";
		$imagen = "{$row['imagen']}";
		$formato = "{$row['formato']}";
		$fecha = "{$row['fecha']}";
		$nuevo = "{$row['nuevo']}";
		$auditorio = "{$row[auditorio]}";
		$compra = "{$row[compra]}";
		$alquiler = "{$row[alquiler]}";
		$precio_compra = "{$row[precio_compra]}";
		$trailer = "{$row[trailer]}";
		$resena = "{$row[resena]}";
	}
	
	$alquilar_act = '<img src="alquilar.png" width="94" height="66" border="0" style="cursor:pointer">';
	$alquilar_inact = "<img onclick=\"alert('Para poder alquilar la película $titulo, es necesario que ingreses con tu usuario y tu contraseña. Si no estás afiliado puedes afiliarte dando clic en el vínculo inferior: - Me deseo afiliar -');\" src=\"alquilar.png\" width=\"94\" height=\"66\" border=\"0\" style=\"cursor:pointer\">";
	$comprar_act = '<img src="comprar.png" width="94" height="66" border="0" style="cursor:pointer">';
	$comprar_inact = "<img onclick=\"alert('La película $titulo, no está disponible para la venta.');\" src=\"comprar.png\" width=\"94\" height=\"66\" border=\"0\" style=\"cursor:pointer\">";
?>

<body>
<div id="ppal">
  <div class="menu_izq">
	<div>
		<li class="boton" id="links">
			<?php echo $anterior ?>
		</li>  
	</div>
	<div class="tabs">  
		<li class="boton" id="links"><a href="#tab1"><img src="../catalogo/tabs/info.png" width="94" height="66" border="0"></a></li>  
		<li class="boton" id="links"><a href="#tab2"><img src="../catalogo/tabs/trailer.png" width="94" height="66" border="0"></a></li>
        <li class="boton" id="links"><a href="#tab3"><img src="../catalogo/tabs/education.png" width="94" height="66" border="0"></a></li>
        <li class="boton"></li>
        <li class="boton"></li>
	</div>
  </div>
  <div class="tab_container">  
	<div id="tab1" class="tab_content">
      <center><strong style="background-image: url(bg_black_60.png); color: #FFF; padding: 4px"><?php echo $titulo ?></strong></center>
	  <table width='100%' height='auto' border='0px' cellpadding='0' cellspacing='0px' style='margin-top:3px; color: #FFF'>
		<tr>
		  <td width='45%' height='340' align='center' style='border-right: 1px dotted #999999'>
			<div style='width: 229'>
			  <div style='width: 75; height: 75; position: absolute; float: left; margin-left: 5px;'>
				<?php if ($nuevo == 'si') echo "<img src='../Imagenes_pagina/nuevo.png' width='75' height='75' style='vertical-align:top' align='left'>"; ?>
			  </div>
			  <div style='width: 192px; height: 270px; float: left; margin-left: 27px; margin-top: 22px'>
				<img src='../catalogo/Imagenes_peliculas/<?php echo $imagen ?>' width='192' height='260'>
			  </div>
			</div>
			<table width='80%' border='0px' cellpadding='0px' cellspacing='0' style='clear: both; margin-top: 0px; font-size:13px'>
			  <tr id='titulo_pelicula'><td><span>Auditorio: </span></td><td><?php echo $auditorio ?></td></tr>
			  <tr id='titulo_pelicula'><td><span>Clasificaci&oacute;n: </span></td><td><?php echo $clasificacion ?></td></tr>
			  <tr id='titulo_pelicula'><td><span>G&eacute;nero: </span></td><td><?php echo $genero ?></td></tr>
			  <tr id='titulo_pelicula'><td><span>Tiempo: </span></td><td><?php echo $tiempo ?> minutos</td></tr>
			  <tr id='titulo_pelicula'><td><span>Formato: </span></td><td><?php echo $formato ?></td></tr>
			  <tr id='titulo_pelicula'><td><span>Precio de compra: </span></td>
				<td>$ <?php echo number_format($precio_compra) ?></td>
			  </tr>
			</table>
		  </td>
		  <td width='55%' style='vertical-align: top; text-align: justify; padding: 10px'>
			<span>Descripci&oacute;n: </span><br /><br />
			<div id='descripcion'><?php echo $descripcion ?></div>
            <div id="msj_add">
              <?php
			    if($carro[$id_p]['identificador'] != NULL) echo "<span style=\"color: yellow; font-size:14px\"><img src=\"../Imagenes_pagina/informacion.png\" width=\"25\" height=\"25\" align=\"absmiddle\">&nbsp;Ya se ha agregado al carrito</span>";
			  ?>
            </div>
		  </td>
		</tr>
	  </table>
	</div>  
	<div id="tab2" class="tab_content">
     <?php if($trailer != NULL || $trailer != "") { ?>
		<a  
			 href="../catalogo/files/<?php echo $trailer ?>"  
			 style="display:block;width:590px;height:380px; margin-left:auto;margin-right:auto"
			 id="player"> 
		</a>
        <!-- this will install flowplayer inside previous A- tag. -->
		<script>
			flowplayer("player", "../catalogo/Scripts/flowplayer-3.2.5.swf",
			{
				clip:  {
					autoPlay: false,
				}
			});
		</script>
     <?php } else { ?> <img src="../catalogo/tabs/pronto.png" width="64" height="64" align="absmiddle" /> <span style="color:#FFF; font-size:2em">Muy pronto</span> <?php } ?>
    </div>
	<div id="tab3" class="tab_content">
     <center>
     <?php if($resena != NULL || $resena != "")
	 {
		 ?>
        <embed src="../catalogo/resenas/<?php echo $resena; ?>#toolbar=0&navpanes=0&scrollbar=1" width="590? height="380? style="margin-top: 20px; height:380px"></embed>
         <noembed>Para ver la reseña se requiere Adobe Acrobat 8 o superior<br />Por favor instalelo<br /><a href="http://get.adobe.com/es/reader/?promoid=BUIGO">Adquirir Adobe Acrobat</a></noembed>
     <?php
	 }
     	   else { ?> <img src="../catalogo/tabs/education1.png" width="256" height="256" align="absmiddle" /> <span style="color:#FFF; font-size:2em">Muy pronto</span> <?php } ?>
     </center>
    </div>
  </div>
  <div class="menu_der">
    <div>
		<li class="boton" id="links">
        	<?php echo $siguiente ?>
		</li>
		<li class="boton"></li>  
		<li class="boton"></li>
        <li class="boton"></li>
        <li class="boton"></li>
		<li class="boton"></li>
        <li class="boton"></li>
	</div>
  </div>
</div>
<?php } ?>
</body>
</html>
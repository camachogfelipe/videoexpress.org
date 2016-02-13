<?php
session_start();
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
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
		if (str_replace($pattern, $user_agent)) return $navegador;
	}
	return 'Desconocido';
}
$explorer = ObtenerNavegador($_SERVER['HTTP_USER_AGENT']);

if($explorer == "Internet Explorer 7") $link = '<link rel="stylesheet" type="text/css" href="tabsIE7.css" />';
else $link = '<link rel="stylesheet" type="text/css" href="tabs.css" />';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<script src="../Scripts/flowplayer-3.2.4.min.js" type="text/javascript"></script>
<script src="../Scripts/jquery-1.4.4.min.js"></script>
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
	include('../../catalogo/include/funciones_globales.php');
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
	
	if($res != NULL )
	{
		$el_id = array_search($id_p, $res);

		if($el_id == 0)
		{
			$anterior = '<img src="back.png" width="94" height="66" border="0" alt="Anterior" style="cursor:pointer" />';
			$siguiente = '<a href="?id_p='.$res[1].'&aud='.$aud.'" title="Siguiente"><img src="right.png" width="94" height="66" border="0" alt="Siguiente" /></a>';
		}
		elseif($res[$el_id+1] == NULL)
		{
			$anterior = '<a href="?id_p='.$res[$el_id-1].'&aud='.$aud.'" title="Anterior"><img src="back.png" width="94" height="66" border="0" alt="Anterior" /></a>';
			$siguiente = '<img src="right.png" width="94" height="66" border="0" alt="Siguiente" style="cursor:pointer" />';
		}
		else
		{
			$anterior = '<a href="?id_p='.$res[$el_id-1].'&aud='.$aud.'" title="Anterior"><img src="back.png" width="94" height="66" border="0" alt="Anterior" /></a>';
			$siguiente = '<a href="?id_p='.$res[$el_id+1].'&aud='.$aud.'" title="Siguiente"><img src="right.png" width="94" height="66" border="0" alt="Siguiente" /></a>';
		}
		$res = NULL;
	}
	else
	{
		$anterior = '<img src="back.png" width="94" height="66" border="0" alt="Anterior" style="cursor:pointer" />';
		$siguiente = '<img src="right.png" width="94" height="66" border="0" alt="Siguiente" style="cursor:pointer" />';
	}

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
		$tipo_video = "{$row[tipo_video]}";
		$online = "{$row[online]}";
		$tipo_online = "{$row[tipo_online]}";
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
		<li class="boton" id="links"><a href="#tab1"><img src="info.png" width="94" height="66" border="0"></a></li>  
		<li class="boton" id="links"><a href="#tab2"><img src="trailer.png" width="94" height="66" border="0"></a></li>
        <li class="boton" id="links"><a href="#tab3"><img src="education.png" width="94" height="66" border="0"></a></li>
        <li class="boton" id="links"><a href="#tab4"><img src="comentarios.png" width="94" height="66" border="0"></a></li>
        <li class="boton" id="links"><a href="#tab6"><img src="online.png" width="94" height="66" border="0" /></a></li>
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
				<img src='../Imagenes_peliculas/<?php echo $imagen ?>' width='192' height='260'>
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
     <?php
     	if($trailer != NULL || $trailer != "") {
			if($tipo_video == "FILE") :
				echo '<a href="../files/'.$trailer.'" style="display:block;width:590px;height:380px; margin-left:auto;margin-right:auto" 
					  id="player"></a>
					  <!-- this will install flowplayer inside previous A- tag. -->
					  <script>
					  	flowplayer("player", "../Scripts/flowplayer-3.2.5.swf", { clip: { autoPlay: false, } });
					  </script>';
			else :
				echo '<iframe id="iframe_video" src="'.$trailer.'" width="590" height="380" frameborder="0" webkitAllowFullScreen allowFullScreen></iframe>';
			endif;
		} else { ?> <img src="pronto.png" width="64" height="64" align="absmiddle" /> <span style="color:#FFF; font-size:2em">Muy pronto</span> <?php } ?>
    </div>
	<div id="tab3" class="tab_content">
     <center>
     <?php if($resena != NULL || $resena != "")
	 {
		 ?>
        <embed src="../resenas/<?php echo $resena; ?>#toolbar=0&navpanes=0&scrollbar=1" width="590? height="380? style="margin-top: 20px; height:380px"></embed>
         <noembed>Para ver la reseña se requiere Adobe Acrobat 8 o superior<br />Por favor instalelo<br /><a href="http://get.adobe.com/es/reader/?promoid=BUIGO">Adquirir Adobe Acrobat</a></noembed>
     <?php
	 }
     	   else { ?> <img src="education1.png" width="256" height="256" align="absmiddle" /> <span style="color:#FFF; font-size:2em">Muy pronto</span> <?php } ?>
     </center>
    </div>
	<div id="tab4" class="tab_content">
      <div id="comentarios"><?php $url = "catalogo"; include("libro_visitas.php"); ?></div>
    </div>
    <div id="tab5" class="tab_content">
      <div id="loading">
        <form name="librovisitas" action="comentar.php?art=<?php echo $id_p ?>&pagina=<?php echo $aud ?>" method="post" id="comentar">
          <table width="350" cellspacing="0" cellpadding="0" border="0" id="comentar" align="center">
			<tr>
			  <td><b><img src="../../libro_visitas/firma.png" width="64" height="64" align="middle" /> Firma el Libro de Visitas</b></td>
			</tr>
			<tr>
			  <td>D&eacute;janos tu mensaje en el libro de visitas</td>
			</tr>
			<tr>
			  <td align="left" valign="top" style="padding-top: 3px">
				<table width="100%" border="0" cellspacing="0" cellpadding="3">
				  <tr>
					<td width="55%" style="border-right: 1px dotted #FFF">Nombre <input type="Text" name="nombre" size="20" maxlength="150"></td>
					<td width="45%">Sexo: F<input name="sexo" type="radio" id="sexo" value="0" checked="checked" /> M<input type="radio" name="sexo" id="sexo" value="1" /></td>
				  </tr>
				  <tr>
					<td style="border-right: 1px dotted #FFF">Email <input type="Text" name="email" size="20" maxlength="100"></td>
					<td>edad <select name="edad" id="edad">
					  <option value="0" selected="selected">0-12</option>
					  <option value="13">13-25</option>
					  <option value="26">26-49</option>
					  <option value="50">50+</option>
					 </select></td>
				  </tr>
				</table>
				Valoraci&oacute;n
				<select name="valoracion">
				  <option value=1>Repelente</option>
				  <option value=2>Mal</option>
				  <option value=3>Regular</option>
				  <option value=4>Bien</option>
				  <option value=5 selected="selected">Fant&aacute;stica</option>
				</select><br /><br />
				Comentarios:<br />
				<textarea name="comentario" cols="35" rows="3"></textarea>
			  </td>
		    </tr>
		    <tr>
			  <td colspan=2 align=center class=fuente8>
			    <br>
			    <input type="submit" value=" Enviar la firma al libro de visitas ">
			  </td>
		    </tr>
		  </table>
	    </form>
	  </div>
	  <div id="result"></div>
    </div>
    <div id="tab6" class="tab_content">
     <?php
     	if($online != NULL || $online != "") {
			if($tipo_video_online == "FILE") :
				echo '<a href="../files/'.$online.'" style="display:block;width:590px;height:380px; margin-left:auto;margin-right:auto" 
					  id="player"></a>
					  <!-- this will install flowplayer inside previous A- tag. -->
					  <script>
					  	flowplayer("player", "../Scripts/flowplayer-3.2.5.swf", { clip: { autoPlay: false, } });
					  </script>';
			else :
				echo '<iframe id="iframe_video" src="'.$online.'" width="590" height="380" frameborder="0" webkitAllowFullScreen allowFullScreen></iframe>';
			endif;
		} else { ?> <img src="pronto.png" width="64" height="64" align="absmiddle" /> <span style="color:#FFF; font-size:2em">Muy pronto</span> <?php } ?>
    </div>
  </div>
  <div class="menu_der">
    <div>
		<li class="boton" id="links">
        	<?php echo $siguiente ?>
		</li>
	</div>
	<div>
		<li class="boton" id="links">
          <?php
		    if (isset($_SESSION['usuario_afiliado']) and $_SESSION['activo'] == 'si')
			{
				echo '<script type="text/javascript">
	  function recargar_alquiler(){   
       /// Aqui podemos enviarle alguna variable a nuestro script PHP
    var variable_post="";
       /// Invocamos a nuestro script PHP
    $.post("../carrito/agregacar.php?'.SID.'&id='.$id_p.'&tipo_pedido=alquiler", { variable: variable_post }, function(data){
       /// Ponemos la respuesta de nuestro script en el DIV recargado
    var activeTab = $("#msj_add").html("<img src=\"../Imagenes_pagina/informacion.png\" width=\"25\" height=\"25\" align=\"absmiddle\">&nbsp;Ya se ha agregado al carrito para alquiler");
	$(activeTab).fadeIn(); 
    });        
}
	  </script>';
	  			echo '<a href="#" onclick="javascript:recargar_alquiler();">'.$alquilar_act.'</a>';
			}
			else echo $alquilar_inact;
		  ?>
        </li>  
		<li class="boton" id="links">
          <?php
		    if ($compra == 'si')
			{
				echo '<script type="text/javascript">
	  function recargar_compra(){   
       /// Aqui podemos enviarle alguna variable a nuestro script PHP
    var variable_post="";
       /// Invocamos a nuestro script PHP
    $.post("../carrito/agregacar.php?'.SID.'&id='.$id_p.'&tipo_pedido=compra", { variable: variable_post }, function(data){
       /// Ponemos la respuesta de nuestro script en el DIV recargado
    var activeTab = $("#msj_add").html("<img src=\"../Imagenes_pagina/informacion.png\" width=\"25\" height=\"25\" align=\"absmiddle\">&nbsp;Ya se ha agregado al carrito para compra");
	$(activeTab).fadeout(); 
    });        
}
	  </script>';
	  			echo '<a href="#" onclick="javascript:recargar_compra();">'.$comprar_act.'</a>';
			}
			else echo $comprar_inact;
		  ?>
        </li>
    </div>
    <div class="tabs">
        <li class="boton" id="links"><a href="#tab5"><img src="comentar.png" width="94" height="66" border="0"></a></li>
        <li class="boton"></li>
    </div>
    <div>
		<li class="boton"></li>
        <li class="boton"></li>
	</div>
  </div>
</div>
<?php } ?>
</body>
</html>
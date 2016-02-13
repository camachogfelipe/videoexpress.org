<?php
session_start();
ob_start( 'ob_gzhandler' );
//rescatamos los valores guardados en la variable de sesión (si es que hay alguno, cosa que
//comprobamos con isset) y los asignamos a $carro. Si no existen valores, ponemos a false el
//valor de $carro
if(isset($_SESSION['carro']))
$carro=$_SESSION['carro'];else $carro=false;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<link rel="shortcut icon" href="images/favicon.ico" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>.::RED librer&iacute;a Cristiana::.</title>
<script type="text/javascript" src="scripts/jquery-1.5.1.js"></script>
<script type="text/javascript" src="scripts/jquery.corner.js"></script>
<script type="text/javascript" src="scripts/thickbox.js"></script>
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

$(document).ready(function()  
{
	$("#precio_carrito").html("$ <?php echo number_format($_SESSION['total']) ?>");
	settings = {
          tl: { radius: 30 },
          tr: { radius: 30 },
          bl: { radius: 30 },
          br: { radius: 30 },
          antiAlias: true,
          autoPad: true,
          validTags: ["div"]
      }

  	$('.menu_ppal').corner("bottom");
	$('.busqueda').corner(settings);
	
	$(".menu_ppal a").click(function(e)  
	{
		var a = e.target.id;
		if(a == "home") location.reload();
		else
		{
        //desactivamos seccion y activamos elemento de menu  
        $(".menu_ppal a.active").removeClass("active");  
        $(".menu_ppal a#"+a).addClass("active"); 
		return false;
		}
	});
	
	$('#form, #busqueda').submit(function() {
        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: $(this).serialize(),
            success: function(data) {
                $('#contenido').html(data);

            }
        })
        
        return false;
    });
});

function recargar(x,y,z)
{
	var pagina=x+".php?"+y;
	$.post(pagina, function(data){
		$(z).load($(z).html(data));
	});
}
</script>
<script src="scripts/jquery.slideViewerPro.1.0.js" type="text/javascript"></script> 
<script src="scripts/jquery.timers1.2.js" type="text/javascript"></script> 
<script type="text/javascript">
	$(window).bind("load", function()
	{
		$("div#noui").slideViewerPro({
			galBorderWidth: 0,
			autoslide: true,
			thumbsVis: false,
			shuffle: true
		});	
	});
</script>
<link href="red.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="svwp_style.css" type="text/css" media="screen" />
<link rel="stylesheet" href="scripts/thickbox.css" type="text/css" media="screen" />
<?php include("administracion/funciones.php"); $estilo = ambiente(); ?>
<link href="<?php echo $estilo ?>.css" rel="stylesheet" type="text/css" />
<link href="scripts/multibox.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="scripts/multibox.css" />
<!--[if lte IE 6]><link rel="stylesheet" href="scripts/ie6.css" type="text/css" media="all" /><![endif]-->
</head>
 
<body>
	<div id="div_main">
    	<div id="ambiente_top">&nbsp;</div>
		<div id="main">
			<div id="encabezado">
        		<div id="logo"><img src="images/logo_y_texto.png" width="362" height="101" id="img_logo" /></div>
        		<div id="menu_ppal">
            		<div id="mp" class="menu_ppal"><a href="?op=0" class="active" id="home">Home</a>&nbsp;&nbsp;<a href="#" id="quienessomos" onclick="recargar('quienes','0','#contenido')">Quienes somos</a>&nbsp;&nbsp;<a href="#nuestros" onclick="recargar('catalogo','0','#contenido')" id="naranja">Nuestros productos</a>&nbsp;&nbsp;<a href="#notired" id="notired" onclick="recargar('notired','','#contenido')">NotiRED</a>&nbsp;&nbsp;<a href="#" id="contacto" onclick="recargar('contacto','0','#contenido')">Cont&aacute;ctenos</a></div>
	                <div id="carrito_ppal">
    	            	<table width="100%" border="0" cellspacing="2" cellpadding="0">
						  <tr>
            	            <td>Carrito de compras<br /></td>
						    <td rowspan="2" valign="middle"> <a href="#" onclick="recargar('carrito/vercarrito','0','#contenido')"><img src="images/carrito.png" width="31" height="31" border="" /></a></td>
						  </tr>
						  <tr>
						    <td><div id="precio_carrito">$ 
							<?php
							if($_SESSION['total'] == NULL || $_SESSION['total'] == "undefined") echo number_format(0);
                            else echo number_format($_SESSION['total']) ?></div></td>
						  </tr>
						</table>
                	</div>
	            </div>
			</div>
			<div id="contenido">
            	<?php
					switch($_GET['op'])
					{
						case 1 : $index = true;
								 include("notired.php");
								 break;
						case 2 : include("detalle.php");
								 break;
						default : include("index2.php");
								  break;
					}
                ?>
			</div>
    	</div>
	    <div id="ambiente_bottom">&nbsp;</div>
    	<div id="creditos"><p>&nbsp;</p><p>&nbsp;</p>
        <div id="accesos"><a href="http://www.flet.edu" target="_blank"><img src="images/boton_flet.png" width="40" height="40" align="absbottom" border="0" /> Flet</a> <a href="http://mail.redlibreriacristiana.org"><img src="images/boton_gmail.png" width="41" height="41" align="absbottom" border="0" /> Correo</a> <a href="http://www.skype.com/intl/es/get-skype/" target="_new"><img src="images/boton_skype.png" width="41" height="41" align="absbottom" border="0" /> red.libreria</a></div>
        <p id="creditos2">Copyright &copy; Ministerios RED de Edificaci&oacute;n 2011. Todos los derechos reservados. <a href="politica.php" target="_new">Politica de privacidad.</a> Diseño Por <a href="http://www.videoexpress.org" target="_new">VideoExpress.org</a> y <a href="http://www.cogroupsas.com">Felipe Camacho</a></p></div>
	</div>
</body>
</html>

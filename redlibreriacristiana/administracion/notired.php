<?php
session_start();
if (isset($_SESSION['valid_user']))
{
?>
<link href="estilo_admin.css" rel="stylesheet" type="text/css">
<script type="text/javascript" language="javascript" src="../scripts/jquery-1.5.1.js"></script>
<script type="text/javascript" language="javascript" src="../scripts/jquery.corner.js"></script>
<script>
$(document).ready(function()  
{
	settings = {
          tl: { radius: 30 },
          tr: { radius: 30 },
          bl: { radius: 30 },
          br: { radius: 30 },
          antiAlias: true,
          autoPad: true,
          validTags: ["div", "table"]
      }

  	$('#menu_notired').corner("bevel right");
	$('#contenido_notired').corner( "bottom");
	
	$("#menu_notired li a").click(function(e)  
	{
		var a = e.target.id;
        //desactivamos seccion y activamos elemento de menu  
        $("#menu_notired li a.active").removeClass("active");  
        $("#menu_notired li a#"+a).addClass("active"); 
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
<div id="menu_notired">
	<li><a href="#Home" id="Home" class="active" onClick="recargar('notired2','op=1','#contenido_notired')">Resumen</a></li>
    <li><a href="#lista_notired" id="lista_notired" onClick="recargar('notired2','op=2','#contenido_notired')">Ver todos los notired</a></li>
    <li><a href="#nuevo_notired" id="nuevo_notired" onClick="recargar('editar','','#contenido_notired')">Nuevo NotiRED</a></li>
    <li><a href="#lista_emails" id="lista_emails" onClick="recargar('notired2','op=3','#contenido_notired')">Lista inscritos NotiRED</a></li>
    <li><a href="#nuevo_email" id="nuevo_email" onClick="recargar('editar_email','','#contenido_notired')">Inscribir email para NotiRED</a></li>
    <li><a href="#enviar" id="enviar" onClick="recargar('notired2','op=4','#contenido_notired')">Enviar por email NotiRED</a></li>
    <li><a href="#cancelar" id="cancelar" onClick="recargar('notired2','op=5','#contenido_notired')">Cancelar el env&iacute;o por email del NotiRED</a></li>
</div>
<div id="contenido_notired"><?php include("notired2.php") ?></div>
<?php
}
else
{
   echo '<script type="text/javascript">window.location="../";</script>';
}
?>
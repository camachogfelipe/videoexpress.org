<link rel="stylesheet" href="scripts/thickbox.css" type="text/css" media="screen" />
<link rel="stylesheet" href="svwp_style.css" type="text/css" media="screen" />
<script type="text/javascript" src="scripts/jquery-1.5.1.js"></script>
<script type="text/javascript" src="scripts/thickbox.js"></script>
<script src="scripts/jquery.slideViewerPro.1.0.js" type="text/javascript"></script> 
<script src="scripts/jquery.timers1.2.js" type="text/javascript"></script> 
<script type="text/javascript">
	$(window).bind("load", function()
	{
		$("div#noui").slideViewerPro({
			galBorderWidth: 0,
			autoslide: true,
			asTimer: 3500, 
			thumbsVis: false,
			shuffle: true
		});	
	});
</script>
<script>
$(document).ready(function()  
{
	$(".tabs").hide();  
	$("#tabs li a:first").addClass("active");  
	$(".tabs:first").show();  
	$("#tabs li").click(function(e)  
	{
		var a = e.target.id;  
        //desactivamos seccion y activamos elemento de menu  
        $("#tabs li a.active").removeClass("active");  
        $("#tabs li a#"+a).addClass("active"); 
		var activeTab = $(this).find("a").attr("href");
		$(".tabs").hide();
		$(activeTab).fadeIn();
		return false;  
	});
	
	$('#form, #busqueda').submit(function() {
        $.ajax({
            type: 'GET',
            url: $(this).attr('action'),
            data: $(this).serialize(),
            success: function(data) {
                $('#contenido').html(data);

            }
        })
        
        return false;
    });
});
</script>
<div id="contenido_izq" class="contenido_izq">
	<div id="titulo_secciones" class="float_izq">Quienes somos</div>
    <div id="contenido_der" class="busqueda">
    	<form action="busqueda.php" method="get" name="busqueda" id="busqueda">
        	<input name="texto_busqueda" type="text" value="Busqueda" onFocus="javascript:this.value=''" size="50" maxlength="50">
            <input type="image" src="images/buscar-20.png" id="submit" name="submit" align="absmiddle" />
    	</form>
    </div>
</div>
<div id="contenido_izq" class="contenido2">
    <div id="quienes">
    	<div id="tabs">
			<li><a href="#fragment-1" id="fragement-1" class="active" >Quienes somos</a></li>
	 	  	<li><a href="#fragment-2" id="fragement-2">/&nbsp;&nbsp;Misi&oacute;n&nbsp;&nbsp;/</a></li>
			<li><a href="#fragment-3" id="fragement-3">Visi&oacute;n</a></li>
		    <div id="fragment-1" class="tabs">
                <span id="titulos_otros">Quienes somos</span>
                <span id="texto_quienes">
                <p><span class="texto_quienes">Asociaci&oacute;n Ministerios Red de Edificaci&oacute;n</span>, es  una entidad de car&aacute;cter interdenominacional sin &aacute;nimo de lucro para el servicio  de la iglesia Cristiana, mediante la distribuci&oacute;n de literatura, m&uacute;sica y  miscel&aacute;nea con mensaje de edificaci&oacute;n proyectado a la transformaci&oacute;n de vidas,  respondiendo a la necesidad de crecimiento integral del pueblo cristiano.</p>
            Contamos  con programas de capacitaci&oacute;n mediante la representaci&oacute;n de instituciones que  ofrecen procesos de formaci&oacute;n Bibliocentricos   y que responden a las necesidades de preparaci&oacute;n en los diversos campos  de acción de la Iglesia Cristiana  en el pa&iacute;s.</span>
            </div>
		    <div id="fragment-2" class="tabs">
				<span id="titulos_otros">Misi&oacute;n</span>
                <span id="texto_quienes">
                <p><span class="texto_quienes">Asociaci&oacute;n Ministerios Red de Edificaci&oacute;n</span>, tiene como misi&oacute;n el trabajar en la difusi&oacute;n de la Palabra de Dios, la distribuci&oacute;n de literatura y productos con mensajes de edificaci&oacute;n, con  el prop&oacute;sito de dar a conocer el mensaje de salvaci&oacute;n.</p></span>
		    </div>
		    <div id="fragment-3" class="tabs">
				<span id="titulos_otros">Visi&oacute;n</span>
                <span id="texto_quienes">
                <p><span class="texto_quienes">Asociaci&oacute;n Ministerios Red de Edificaci&oacute;n</span>, busca ser un instrumento en las manos de Dios para la evangelizaci&oacute;n a trav&eacute;s de la distribuci&oacute;n de literatura en todo el pa&iacute;s.</p></span>
		    </div>
		</div>
	</div>
</div>
<div id="contenido_der" class="recomendados">
	<div id="titulo_secciones">Recomendados</div>
	<?php
		include("administracion/funciones.php");
    	recomendados();
	?>
</div>
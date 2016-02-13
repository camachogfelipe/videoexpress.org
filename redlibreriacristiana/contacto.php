<link rel="stylesheet" href="scripts/thickbox.css" type="text/css" media="screen" />
<link rel="stylesheet" href="svwp_style.css" type="text/css" media="screen" />
<?php
ob_start( 'ob_gzhandler' );
include("administracion/funciones.php");
?>
<script type="text/javascript" src="scripts/jquery-1.5.1.js"></script>
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
<script type="text/javascript" src="scripts/jquery.validate.js"></script>
<script type="text/javascript" src="scripts/thickbox.js"></script>
<script type="text/javascript">
$.validator.setDefaults({
	submitHandler: function()
	{
		$().ajaxStart(function()
		{
			$('#loading').show();
			$('#result').hide();
		});
		$('#form, #contactenos').submit(function()
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
	}
});

$().ready(function()
{
	$('INPUT:first').focus();
	// validate signup form on keyup and submit
	var valido = $("#form, #contactenos").validate({
		rules: {
			nombre_apellidos: {
				required: true,
				minlength: 4
			},
			correo: {
				required: true,
				email: true
			},
			mensaje: {
				required: true,
				minlength: 2
			}
		},
		messages: {
			nombre_apellidos: "<br />Por favor ingrese sus nombres y apellidos, mínimo 4 caracteres",
			correo: "<br />Por favor ingrese una dirección de correo electrónico valida",
			mensaje: "<br />Por favor ingrese un mensaje, mínimo 2 caracteres"
		}
	});
});
</script>
<div id="contenido_izq" class="contenido" style="background-image:url(images/fondos/red<?php fondo() ?>.jpg)">
	<div id="contenido2">
    	<div id="loading">
    	<form action="contacto2.php?enviar=true" method="post" enctype="multipart/form-data" name="contactenos" id="contactenos">
			<table width="100%" border="0" align="center" cellpadding="0" cellspacing="3" style="color:#FFF">
			  <tr>
			    <td width="30%" align="right">Nombres y apellidos</td>
			    <td width="70%">
                	<label for="nombre_apellidos"></label>
				      <input name="nombre_apellidos" type="text" id="nombre_apellidos" tabindex="1" size="70" />
                </td>
			  </tr>
			  <tr>
			    <td align="right">Direcci&oacute;n de correo electr&oacute;nico</td>
			    <td>
                	<label>
				      <input name="correo" type="text" id="correo" tabindex="2" size="70" />
				    </label>
                </td>
			  </tr>
			  <tr>
			    <td height="94" align="right" valign="top">Mensaje<p><a href="javascript:document.contactenos.reset()"><img src="images/limpiar.png" width="84" height="26" border="0" /></a><br /><input type="image" src="images/continuar.png" id="submit" name="submit" /></p>
                <div style="text-align:center; margin-top: 10px; font-size: 14px">Direcci&oacute;n:<br />Carrera 75 No. 24D 40, Modelia<br />Bogot&aacute; - Colombia
                <br /><br />Tel&eacute;fonos:<br />429 8725 - 429 8580 - 429 9618<br /><br />Usuario Skype: red.libreria
                </div>
                </td>
			    <td><label>
			      <textarea name="mensaje" cols="50" rows="8" id="mensaje" tabindex="3" style="font-family:arial"></textarea>
			    </label></td>
			  </tr>
			  <tr>
			    <td colspan="2" align="center"></td>
			  </tr>
			</table>
		</form>
        </div>
		<div id="result"></div>
    </div>
</div>
<div id="contenido_der" class="recomendados"><div id="titulo_secciones">Recomendados</div><?php recomendados() ?></div>
<div id="contenido_izq" class="notired"><div id="titulo_secciones">NotiRED</div><?php notired1() ?></div>
<div id="contenido_der" class="novedades"><div id="titulo_secciones">Novedades</div><?php novedades() ?></div>
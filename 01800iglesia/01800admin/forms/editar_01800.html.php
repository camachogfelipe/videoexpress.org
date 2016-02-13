<link rel="shortcut icon" href="../imagenes/favicon.ico" />
<link href="estilo.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="../Scripts/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="../Scripts/jquery.form.js"></script>
<script type="text/javascript" src="../Scripts/jquery.validate.js"></script>
<script type="text/javascript" src="../Scripts/jquery.validate.additional-methods.js"></script>
<script type="text/javascript" src="../Scripts/tinymce/jscripts/tiny_mce/jquery.tinymce.js"></script>
<script type="text/javascript">
jQuery(document).ready(function() {
	var v = jQuery("#texto01800").validate( {
		success: function(label) { label.addClass("valid").text("") },
		rules: {
			texto: {
				required: true,
				minlength: 3
			}
		},
		messages: {
			texto: {
				required: jQuery.format("<br /><span id='msj_error_texto'>Escriba la palabra a editar</span>"),
				minlength: jQuery.format("<br /><span id='msj_error_texto'>Mínimo {0} caracteres necesarios!</span>")
			}
		},
		submitHandler: function() {
			jQuery.ajax({
				async: false,
				dataType: "html",
				cache: true,
				type: 'POST',
				url: "index3.php",
				data: jQuery("#texto01800").serialize(),
				success: function(data) {
					var result = jQuery('#panel_derecho_menu').html(data);
					jQuery(result).fadeIn('slow');
				}
			})
			return false;
		}
	});
});
</script>
<script type="text/javascript" src="../Scripts/editor_texto.js"></script>
<span id="titulos">¿Qué es 01800Iglesia?</span>
<form action="index3.php" name="texto01800" id="texto01800">
<input name="op" type="hidden" value="31" />
<input name="e" type="hidden" value="true" />
<textarea name="texto" class="tinymce" cols="100" rows="30" id="texto"><?php
	if(!empty($contenido)) echo $contenido;
?></textarea>
<div style="text-align:center">
	<button type="submit"><img src="../imagenes/boton_enviar_form_contacto.png" width="22" height="22" align="absmiddle"> Guardar</button>
</div>
</form>
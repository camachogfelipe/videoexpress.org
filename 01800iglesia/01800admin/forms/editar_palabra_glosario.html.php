<link rel="shortcut icon" href="../imagenes/favicon.ico" />
<link href="estilo.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="../Scripts/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="../Scripts/jquery.form.js"></script>
<script type="text/javascript" src="../Scripts/jquery.validate.js"></script>
<script type="text/javascript" src="../Scripts/jquery.validate.additional-methods.js"></script>
<script type="text/javascript">
jQuery(document).ready(function() {
	var v = jQuery("#glosario").validate( {
		success: function(label) { label.addClass("valid").text("") },
		rules: {
			palabra: {
				required: true,
				minlength: 3
			},
			significado: {
				required: true,
				minlength: 3
			},
			idioma: {
				required: true
			}
		},
		messages: {
			palabra: {
				required: jQuery.format(" <span id='msj_error_texto'>Escriba la palabra a editar</span>"),
				minlength: jQuery.format(" <span id='msj_error_texto'>Mínimo {0} caracteres necesarios!</span>"),
				letterswithbasicpunc: " <span id='msj_error_texto'>Ingrese solo letras por favor</span>"
			},
			significado: {
				required: " <span id='msj_error_texto'>Ingrese el significado de la Palabra</span>",
				minlength: jQuery.format(" <span id='msj_error_texto'>Mínimo {0} caracteres necesarios!</span>"),
				letterswithbasicpunc: " <span id='msj_error_texto'>Ingrese solo letras por favor</span>"
			},
			idioma: {
				required: jQuery.format(" <span id='msj_error_texto'>Escoja el idioma de la palabra</span>")
			}
		},
		submitHandler: function() {
			jQuery.ajax({
				type: 'POST',
				url: jQuery("#glosario").attr('action'),
				data: jQuery("#glosario").serialize(),
				success: function(data)
				{
					var result = jQuery('#panel_derecho_menu').html(data);
					jQuery(result).fadeIn('slow');
				}
			})
			return false;
		}
	});
});
</script><br>
<form action="index3.php" name="glosario" id="glosario">
<input name="op" type="hidden" value="28" />
<input name="e" type="hidden" value="true" />
<input name="id" type="hidden" value="<?php echo $this->palabras[0]['glo_id']; ?>" />
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="right"><label for="palabra">Palabra:</label></td>
    <td><input name="palabra" type="text" id="palabra" size="30" value="<?php echo $this->palabras[0]['palabra']; ?>" /></td>
  </tr>
  <tr>
    <td align="right"><label for="idioma">Idioma:</label></td>
    <td><select name="idioma" id="idioma">
			<option value="">Seleccione el idioma</option>
			<option value="3"<?php if($this->palabras[0]['id_idioma'] == 3) echo ' selected="selected"'; ?>>Ingles</option>
			<option value="7"<?php if($this->palabras[0]['id_idioma'] == 7) echo ' selected="selected"'; ?>>Espa&ntilde;ol</option>
		</select>
	</td>
  </tr>
  <tr>
    <td align="right" valign="top"><label for="significado">Significado</label></td>
    <td><textarea name="significado" cols="55" rows="7" id="significado"><?php echo $this->palabras[0]['descripcion']; ?></textarea></td>
  </tr>
</table>
<div style="text-align:center">
	<button type="submit"><img src="../imagenes/boton_enviar_form_contacto.png" width="22" height="22" align="absmiddle"> Guardar palabra</button>
</div>
</form>
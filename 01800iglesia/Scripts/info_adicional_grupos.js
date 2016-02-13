jQuery(document).ready(function() {
	jQuery("#img_iconos img[title]").tooltip({ position: "bottom center" });
	var g = jQuery("#grupos").validate( {
		success: function(label) { label.addClass("valid").text("ok!") },
		rules: {
			grupo_nombre: {
				required: true,
				minlength: 5
			},
			grupo_iconos: { required: true },
			grupo_tipo: { required: true },
			grupo_descripcion: {
				required: true,
				minlength: 5
			},
			grupo_horarios: {
				required: true,
				minlength: 5
			}
		},
		messages: {
			grupo_nombre: {
				required: " <span id='msj_error_texto'>Ingrese el nombre del grupo</span>",
				minlength: jQuery.format(" <span id='msj_error_texto'>Mínimo {0} caracteres necesarios!</span>"),
				letterswithbasicpunc: " <span id='msj_error_texto'>Ingrese solo letras por favor</span>"
			},
			grupo_tipo: { required: " <span id='msj_error_texto'>Seleccione el tipo de grupo</span>" },
			grupo_iconos: { required: " <span id='msj_error_texto'>Seleccione el tipo de grupo</span>" },
			grupo_descripcion: {
				required: " <span id='msj_error_texto'>Ingrese la descripci&oacute;n del grupo</span>",
				minlength: jQuery.format(" <span id='msj_error_texto'>Mínimo {0} caracteres necesarios!</span>"),
				letterswithbasicpunc: " <span id='msj_error_texto'>Ingrese solo letras por favor</span>"
			},
			grupo_horarios: {
				required: " <span id='msj_error_texto'>Ingrese los horarios del grupo</span>",
				minlength: jQuery.format(" <span id='msj_error_texto'>Mínimo {0} caracteres necesarios!</span>"),
				letterswithbasicpunc: " <span id='msj_error_texto'>Ingrese solo letras por favor</span>"
			}
		},
		submitHandler: function() {
			jQuery().ajaxStart(function() { jQuery('#loading').show(); });
			$.ajax( {
				type: 'POST',
				url: jQuery('#grupos').attr('action'),
				data: jQuery('#grupos').serialize(),
				success: function(data) {
					var result = jQuery('#res_grupos').html(data);
					jQuery(result).fadeIn('slow');
					jQuery('#loading').hide();
				}
			})
			return false;
		}
	});
	jQuery("#grupos").click(function() { g.resetForm(); });
});

function seleccionar(archivo, id) {
	var id_img = jQuery("#id_img").val();
	if(id_img != "") {
		jQuery("#"+id_img).css("background-color", "#FFFFFF");
		jQuery("#"+id_img).css("color", "#000000");
	}
	jQuery("#"+id).css("background-color", "#421867");
	jQuery("#"+id).css("color", "#FFFFFF");
	jQuery("#id_img").val(id);
	jQuery("#grupo_icono").val(archivo);
	var logo = jQuery("#grupo_icono").val();
}
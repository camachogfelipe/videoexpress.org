jQuery(document).ready(function() {
	jQuery('#cargando').hide();
    var v = jQuery("#contacto").validate( {
		success: function(label) { label.addClass("valid").text("ok!") },
		rules: {
			nombre_completo: {
				required: true,
				minlength: 5,
				letterswithbasicpunc: true
			},
			motivo: {
				required: true,
				minlength: 5,
				letterswithbasicpunc: true
			},
			mail: {
				required: true,
				minlength: 5,
				email: true
			},
			asunto: {
				required: true,
				minlength: 3,
				letterswithbasicpunc: true
			}
		},
		messages: {
			nombre_completo: {
				required: " <br /><span id='msj_error_texto'>Ingrese su nombre por favor</span>",
				minlength: jQuery.format(" <br /><span id='msj_error_texto'>Mínimo {0} caracteres necesarios!</span>"),
				letterswithbasicpunc: " <br /><span id='msj_error_texto'>Ingrese solo letras por favor</span>"
			},
			motivo: {
				required: " <br /><span id='msj_error_texto'>Ingrese el motivo por el que nos contacta</span>",
				minlength: jQuery.format(" <br /><span id='msj_error_texto'>Mínimo {0} caracteres necesarios!</span>"),
				letterswithbasicpunc: " <br /><span id='msj_error_texto'>Ingrese solo letras por favor</span>"
			},
			mail: {
				required: " <br /><span id='msj_error_texto'>Ingrese el mail para poderlo contactar</span>",
				minlength: jQuery.format(" <span id='msj_error_texto'>Mínimo {0} caracteres necesarios!</span>"),
				email: " <span id='msj_error_texto'>Ingrese un mail valido</span>"
			},
			asunto: {
				required: " <br /><span id='msj_error_texto'>Ingrese el texto explicando el motivo por el que nos contacta</span>",
				minlength: jQuery.format(" <br /><span id='msj_error_texto'>Mínimo {0} numeros necesarios!</span>"),
				letterswithbasicpunc: " <br /><span id='msj_error_texto'>Ingrese solo letras por favor</span>"
			}
		},
		submitHandler: function()
		{
			jQuery().ajaxStart(function() {
				jQuery('#contacto').hide();
				jQuery('#cargando').show("slow");
			});
			jQuery.ajax( {
				type: 'POST',
				url: jQuery("#contacto").attr('action'),
				data: jQuery("#contacto").serialize(),
				success: function(data)
				{
					jQuery('#cargando').hide();
					jQuery('#contacto').hide();
					jQuery('#form').hide();
					var result = jQuery('#resultado').html(data);
					jQuery(result).fadeIn('slow');
				}
			})
			return false;
		}
	});
	jQuery("#reset").click(function() {
			v.resetForm();
	});
	jQuery('#colorgris').corner("right");
	jQuery('#publicidad').corner("top");
	jQuery("input").corner("round 5px");
	jQuery("textarea").corner("round 5px");
});
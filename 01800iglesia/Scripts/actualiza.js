jQuery(document).ready(function() {
	jQuery('#cargando').hide();
    var v = jQuery("#sac").validate( {
		success: function(label) { label.addClass("valid").text("ok!") },
		rules: {
			nombre_iglesia: {
				minlength: 5,
				alphanumeric: true
			},
			pastor: {
				minlength: 5,
				letterswithbasicpunc: true
			},
			telefono: {
				minlength: 3
			},
			celular: {
				minlength: 3
			},
			pbx: {
				minlength: 3
			},
			direccion: {
				minlength: 3,
				alphanumeric: true
			},
			mail: {
				minlength: 5,
				email: true
			},
			web: {
				minlength: 3,
				url2: true
			},
			nombre_inscribe: {
				required: true,
				minlength: 5,
				letterswithbasicpunc: true
			},
			mail_inscribe: {
				required: true,
				minlength: 5,
				email: true
			},
			tel_inscribe: {
				required: true,
				minlength: 5,
				digits: true
			},
			skype: {
				minlength: 3,
				alphanumeric: true
			},
			msn: {
				minlength: 3,
				email: true
			}
		},
		messages: {
			nombre_iglesia: {
				required: "<br /><span id='msj_error_texto'>Ingrese el nombre de la iglesia</span>",
				minlength: jQuery.format(" <br /><span id='msj_error_texto'>Mínimo {0} caracteres necesarios!</span>"),
				alphanumeric: "<br /><span id='msj_error_texto'>Ingrese solo letras por favor</span>"
			},
			pastor: {
				required: "<br /><span id='msj_error_texto'>Ingrese el nombre del pastor por favor</span>",
				minlength: jQuery.format("<br /><span id='msj_error_texto'>Mínimo {0} caracteres necesarios!</span>"),
				letterswithbasicpunc: "<br /><span id='msj_error_texto'>Ingrese solo letras por favor</span>"
			},
			telefono: {
				required: "<br /><span id='msj_error_texto'>Ingrese el n&uacute;mero de tel&eacute;fono por favor</span>",
				minlength: jQuery.format("<br /><span id='msj_error_texto'>Mínimo {0} caracteres necesarios!</span>"),
				digits: "<br /><span id='msj_error_texto'>Ingrese solo numeros por favor</span>"
			},
			celular: {
				required: "<br /><span id='msj_error_texto'>Ingrese su nombre por favor</span>",
				minlength: jQuery.format("<br /><span id='msj_error_texto'>Mínimo {0} caracteres necesarios!</span>"),
				digits: "<br /><span id='msj_error_texto'>Ingrese solo numeros por favor</span>"
			},
			pbx: {
				required: "<br /><span id='msj_error_texto'>Ingrese su nombre por favor</span>",
				minlength: jQuery.format("<br /><span id='msj_error_texto'>Mínimo {0} caracteres necesarios!</span>"),
				digits: "<br /><span id='msj_error_texto'>Ingrese solo numeros por favor</span>"
			},
			direccion: {
				required: "<br /><span id='msj_error_texto'>Ingrese su nombre por favor</span>",
				minlength: jQuery.format("<br /><span id='msj_error_texto'>Mínimo {0} caracteres necesarios!</span>"),
				alphanumeric: "<br /><span id='msj_error_texto'>Ingrese solo letras por favor</span>"
			},
			mail: {
				required: "<br /><span id='msj_error_texto'>Ingrese el mail de la iglesia por favor</span>",
				minlength: jQuery.format("<br /><span id='msj_error_texto'>Mínimo {0} caracteres necesarios!</span>"),
				email: "<br /><span id='msj_error_texto'>Ingrese un mail valido</span>"
			},
			web: {
				required: "<br /><span id='msj_error_texto'>Ingrese la url de la iglesia por favor</span>",
				minlength: jQuery.format("<br /><span id='msj_error_texto'>Mínimo {0} caracteres necesarios!</span>"),
				url2: " <br /><span id='msj_error_texto'>Ingrese una direcci&oacute;n web valida por favor</span>"
			},
			nombre_inscribe: {
				required: "<br /><span id='msj_error_texto'>Ingrese su nombre por favor</span>",
				minlength: jQuery.format("<br /><span id='msj_error_texto'>Mínimo {0} caracteres necesarios!</span>"),
				letterswithbasicpunc: "<br /><span id='msj_error_texto'>Ingrese solo letras por favor</span>"
			},
			mail_inscribe: {
				required: "<br /><span id='msj_error_texto'>Ingrese el mail para poderlo contactar</span>",
				minlength: jQuery.format("<br /><span id='msj_error_texto'>Mínimo {0} caracteres necesarios!</span>"),
				email: "<br /><span id='msj_error_texto'>Ingrese un mail valido</span>"
			},
			tel_inscribe: {
				required: "<br /><span id='msj_error_texto'>Ingrese su n&uacute;mero de tel&eacute;fono por favor</span>",
				minlength: jQuery.format("<br /><span id='msj_error_texto'>Mínimo {0} caracteres necesarios!</span>"),
				digits: "<br /><span id='msj_error_texto'>Ingrese solo numeros por favor</span>"
			},
			skype: {
				minlength: jQuery.format("<br /><span id='msj_error_texto'>Mínimo {0} caracteres necesarios!</span>"),
				alphanumeric: "<br /><span id='msj_error_texto'>Ingrese solo letras por favor</span>"
			},
			msn: {
				minlength: jQuery.format("<br /><span id='msj_error_texto'>Mínimo {0} caracteres necesarios!</span>"),
				email: "<br /><span id='msj_error_texto'>Ingrese un mail valido</span>"
			}
		},
		submitHandler: function()
		{
			jQuery().ajaxStart(function() {
				jQuery('#sac').hide();
				jQuery('#cargando').show("slow");
			});
			jQuery.ajax( {
				type: 'POST',
				url: jQuery("#sac").attr('action'),
				data: jQuery("#sac").serialize(),
				success: function(data) {
					jQuery('#cargando').hide();
					jQuery('#sac').hide();
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
	jQuery("input").corner("round 5px");
});
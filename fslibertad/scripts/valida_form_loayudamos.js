// JavaScript Document
$(document).ready(function()
{
    var x = $("#form_loayudamos").validate(
	{
		success: function(label) { label.addClass("valid").text("ok!") },
		rules: {
			nombres_apellidos: {
				required: true,
				minlength: 5,
				letterswithbasicpunc: true
			},
			correo: {
				required: true,
				email: true,
			},
			tipo_ayuda: {
				required: true,
			},
			telefono: {
				required: true,
				minlength: 7,
				digits: true
			},
			celular: {
				required: true,
				digits: true,
				minlength: 10,
			},
			ciudad: {
				required: true,
				minlength: 5,
				letterswithbasicpunc: true
			},
			pais: {
				required: true,
				minlength: 3,
				letterswithbasicpunc: true
			},
			asunto: {
				required: true,
				minlength: 10,
			}
		},
		messages: {
			nombres_apellidos: {
				required: " <span id='msj_error_texto'>Ingrese sus nombres y apellidos por favor</span>",
				minlength: jQuery.format(" <span id='msj_error_texto'>M&iacute;nimo {0} numeros necesarios!</span>"),
				letterswithbasicpunc: " <span id='msj_error_texto'>Ingrese solo letras por favor</span>"
			},
			correo: {
				email: " <span id='msj_error_texto'>Ingrese direcci&oacute;n de correo valida por favor</span>",
				required: " <span id='msj_error_texto'>Ingrese su correo electr&oacute;nico por favor</span>",
			},
			tipo_ayuda: {
				required: " <span id='msj_error_texto'>Seleccione el tipo de ayuda que solicita</span>",
			},
			telefono: {
				required: " <span id='msj_error_texto'>Ingrese el numero de tel&eacute;fono</span>",
				minlength: jQuery.format(" <span id='msj_error_texto'>M&iacute;nimo {0} numeros necesarios!</span>"),
				digits: " <span id='msj_error_texto'>Ingrese solo numeros por favor</span>"
			},
			celular: {
				required: " <span id='msj_error_texto'>Ingrese el numero de celular</span>",
				minlength: jQuery.format(" <span id='msj_error_texto'>M&iacute;nimo {0} numeros necesarios!</span>"),
				digits: " <span id='msj_error_texto'>Ingrese solo numeros por favor</span>"
			},
			ciudad: {
				required: " <span id='msj_error_texto'>Ingrese la ciudad donde esta ubicado</span>",
				minlength: jQuery.format(" <span id='msj_error_texto'>M&iacute;nimo {0} numeros necesarios!</span>"),
				letterswithbasicpunc: " <span id='msj_error_texto'>Ingrese solo letras por favor</span>"
			},
			pais: {
				required: " <span id='msj_error_texto'>Ingrese el nombre del pa&iacute;s donde esta ubicado</span>",
				minlength: jQuery.format(" <span id='msj_error_texto'>M&iacute;nimo {0} numeros necesarios!</span>"),
				letterswithbasicpunc: " <span id='msj_error_texto'>Ingrese solo letras por favor</span>"
			},
			asunto: {
				required: " <span id='msj_error_texto'>Ingrese una descripci&oacute;n de la ayuda</span>",
				minlength: jQuery.format(" <span id='msj_error_texto'>M&iacute;nimo {0} numeros necesarios!</span>"),
			}
		},
		submitHandler: function()
		{
			$().ajaxStart(function()
			{
				$('#form_loayudamos').hide();
			});
			$('#form_loayudamos').submit(function()
			{
				$('#form_loayudamos').hide();
				$.ajax(
				{
					type: 'POST',
					url: $(this).attr('action'),
					data: $(this).serialize(),
					success: function(data)
					{
						var result = $('#resultadoform_loayudamos').html(data);
						$(result).fadeIn('slow');
					}
				})
				return false;
			});
		}
	});
	jQuery("#reset").click(function() {
			x.resetForm();
	});
});
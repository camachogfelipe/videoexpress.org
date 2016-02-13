$(document).ready(function() {	
	var v = $("#cambio_clave").validate( {
		success: function(label) { label.addClass("valid").text("") },
		rules: {
			clave_anterior: {
				required: true,
				minlength: 6
			},
			clave_nueva1: {
				required: true,
				minlength: 6,
				maxlength: 12,
				alphanumeric: true
			},
			clave_nueva2: {
				required: true,
				minlength: 6,
				maxlength: 12,
				equalTo: "#clave_nueva1",
				alphanumeric: true
			}
		},
		messages: {
			clave_anterior: {
				required: jQuery.format(" <span id='msj_error_texto'>Escriba su clave anterior</span>"),
				minlength: jQuery.format(" <span id='msj_error_texto'>Mínimo {0} caracteres necesarios!</span>")
			},
			clave_nueva1: {
				required: " <span id='msj_error_texto'>Ingrese una clave nueva</span>",
				minlength: jQuery.format(" <span id='msj_error_texto'>Mínimo {0} caracteres necesarios!</span>"),
				maxlength: jQuery.format(" <span id='msj_error_texto'>Máximo {0} caracteres!</span>"),
				alphanumeric: " <span id='msj_error_texto'>Ingrese solo letras o numeros</span>"
			},
			clave_nueva2: {
				required: " <span id='msj_error_texto'>Repita la clave nueva</span>",
				minlength: jQuery.format(" <span id='msj_error_texto'>Mínimo {0} caracteres necesarios!</span>"),
				maxlength: jQuery.format(" <span id='msj_error_texto'>Máximo {0} caracteres!</span>"),
				equalTo: " <span id='msj_error_texto'>La clave no coincide con la anterior</span>",
				alphanumeric: " <span id='msj_error_texto'>Ingrese solo letras o numeros</span>"
			}
		},
		submitHandler: function()
		{
			$.ajax({
				type: 'POST',
				url: $('#cambio_clave').attr('action'),
				data: $('#cambio_clave').serialize(),
				success: function(data)
				{
					var result = $('#resultados_cambio').html(data);
					$(result).fadeIn('slow');
				}
			})
			return false;
		}
	});
});
$(document).ready(function() {	
	var v = $("#edit_user").validate( {
		success: function(label) { label.addClass("valid").text("") },
		rules: {
			nombre: {
				required: true,
				minlength: 6
			},
			apellidos: {
				required: true,
				minlength: 6
			},
			email: {
				required: true,
				minlength: 6,
				email: true
			},
			tipo: { required: true }
		},
		messages: {
			nombre: {
				required: jQuery.format(" <span id='msj_error_texto'>Escriba el nombre</span>"),
				minlength: jQuery.format(" <span id='msj_error_texto'>Mínimo {0} caracteres necesarios!</span>")
			},
			apellidos: {
				required: " <span id='msj_error_texto'>Escriba los apellidos</span>",
				minlength: jQuery.format(" <span id='msj_error_texto'>Mínimo {0} caracteres necesarios!</span>")
			},
			email: {
				required: " <span id='msj_error_texto'>Escribe un email valido</span>",
				minlength: jQuery.format(" <span id='msj_error_texto'>Mínimo {0} caracteres necesarios!</span>"),
				email: " <span id='msj_error_texto'>El email no es valido</span>"
			},
			tipo: { required: " <span id='msj_error_texto'>Seleccione el tipo de usuario</span>" }
		},
		submitHandler: function()
		{
			$.ajax( {
				type: 'POST',
				url: $('#edit_user').attr('action'),
				data: $('#edit_user').serialize(),
				success: function(data) {
					var result = $('#resultados_editar').html(data);
					$(result).fadeIn('slow');
				}
			})
			return false;
		}
	});
});
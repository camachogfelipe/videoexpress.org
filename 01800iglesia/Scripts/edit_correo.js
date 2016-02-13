$(document).ready(function() {	
	var v = $("#edit_correo").validate( {
		success: function(label) { label.addClass("valid").text("") },
		rules: {
			email: {
				required: true,
				minlength: 6,
				email: true
			},
			tipo: { required: true }
		},
		messages: {
			email: {
				required: " <span id='msj_error_texto'>Escribe un email valido</span>",
				minlength: jQuery.format(" <span id='msj_error_texto'>Mínimo {0} caracteres necesarios!</span>"),
				email: " <span id='msj_error_texto'>El email no es valido</span>"
			}
		},
		submitHandler: function()
		{
			$.ajax( {
				type: 'POST',
				url: $('#edit_correo').attr('action'),
				data: $('#edit_correo').serialize(),
				success: function(data) {
					var result = $('#resultados_editar').html(data);
					$(result).fadeIn('slow');
				}
			})
			return false;
		}
	});
});
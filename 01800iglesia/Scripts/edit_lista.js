$(document).ready(function() {	
	var v = $("#edit_lista").validate( {
		success: function(label) { label.addClass("valid").text("") },
		rules: {
			nombre: {
				required: true,
				minlength: 4
			},
			descripcion: {
				required: true,
				minlength: 6
			},
			email: {
				required: true,
				minlength: 6,
				email: true
			},
			firma: {
				required: false
			},
			tipo: { required: true }
		},
		messages: {
			nombre: {
				required: jQuery.format(" <span id='msj_error_texto'>Escriba el nombre</span>"),
				minlength: jQuery.format(" <span id='msj_error_texto'>Mínimo {0} caracteres necesarios!</span>")
			},
			descripcion: {
				required: " <span id='msj_error_texto'>Escriba la descripcion</span>",
				minlength: jQuery.format(" <span id='msj_error_texto'>Mínimo {0} caracteres necesarios!</span>")
			},
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
				url: $('#edit_lista').attr('action'),
				data: $('#edit_lista').serialize(),
				success: function(data) {
					var result = $('#resultados_editar').html(data);
					$(result).fadeIn('slow');
				}
			})
			return false;
		}
	});
});
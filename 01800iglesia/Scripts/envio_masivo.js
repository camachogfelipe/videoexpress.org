$(document).ready(function() {
	$( "#igl_id" ).autocomplete({ source: "index3.php?op=52&tipo=2" });	
	var v = $("#envio_masivo").validate( {
		success: function(label) { label.addClass("valid").text("") },
		rules: {
			asunto: {
				required: true,
				minlength: 4
			},
			mensajecorreo: {
				required: true,
				minlength: 10
			},
			tipo: { required: true },
			igl_id: {
				required : function() {
							if(jQuery("#tipo option:selected").val() == "SA") return false;
							else return true;
						}
			}
		},
		messages: {
			asunto: {
				required: jQuery.format(" <span id='msj_error_texto'>Escriba el asunto</span>"),
				minlength: jQuery.format(" <span id='msj_error_texto'>Mínimo {0} caracteres necesarios!</span>")
			},
			mensajecorreo: {
				required: " <span id='msj_error_texto'>Escriba el mensaje</span>",
				minlength: jQuery.format(" <span id='msj_error_texto'>Mínimo {0} caracteres necesarios!</span>")
			},
			tipo: { required: " <span id='msj_error_texto'>Seleccione el tipo de usuario</span>" },
			igl_id: { required: " <span id='msj_error_texto'>Ingrese el nombre de la iglesia</span>" }
		},
		submitHandler: function() { jQuery("#envio_masivo").submit(); }
/*		submitHandler: function()
		{
			$.ajax( {
				type: 'POST',
				url: $('#envio_masivo').attr('action'),
				data: $('#envio_masivo').serialize(),
				success: function(data) {
					var result = $('#resultados_editar').html(data);
					$(result).fadeIn('slow');
				}
			})
			return false;
		}*/



	});
});
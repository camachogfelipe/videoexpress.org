$(document).ready(function() {
	$( "#igl_id" ).autocomplete({ source: "index3.php?op=58&tipo=2" });	
	var v = $("#envio_masivo_sms").validate( {
		success: function(label) { label.addClass("valid").text("") },
		rules: {
			mensajecorreo: {
				required: true,
				minlength: 10,
				maxlength: 160
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
			mensajecorreo: {
				required: " <span id='msj_error_texto'>Escriba el mensaje</span>",
				minlength: jQuery.format(" <span id='msj_error_texto'>Mínimo {0} caracteres necesarios!</span>"),
				maxlength: jQuery.format(" <span id='msj_error_texto'>Maximo {0} caracteres necesarios!</span>")
			},
			tipo: { required: " <span id='msj_error_texto'>Seleccione el tipo de usuario</span>" },
			igl_id: { required: " <span id='msj_error_texto'>Ingrese el nombre de la iglesia</span>" }
		},
		submitHandler: function() { jQuery("#envio_masivo_sms").submit(); }
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
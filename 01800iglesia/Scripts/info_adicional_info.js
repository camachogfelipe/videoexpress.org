$(document).ready(function() {
	var h = $("#info_adc").validate( {
		success: function(label) { label.addClass("valid").text("ok!") },
		rules: {
			info_mision: { minlength: 5 },
			info_vision: { minlength: 5 },
			info_credo: { minlength: 5 },
			info_historia: { minlength: 5 }
		},
		messages: {
			info_mision: { minlength: jQuery.format("<br /><span id='msj_error_texto'>Mínimo {0} caracteres necesarios!</span>") },
			info_vision: { minlength: jQuery.format("<br /><span id='msj_error_texto'>Mínimo {0} caracteres necesarios!</span>") },
			info_credo: { minlength: jQuery.format("<br /><span id='msj_error_texto'>Mínimo {0} caracteres necesarios!</span>") },
			info_historia: { minlength: jQuery.format("<br /><span id='msj_error_texto'>Mínimo {0} caracteres necesarios!</span>") }
		},
		submitHandler: function() {
			$().ajaxStart(function() { $('#loading').show(); });
			$.ajax( {
				type: 'POST',
				url: $('#info_adc').attr('action'),
				data: $('#info_adc').serialize(),
				success: function(data)
				{
					var result = $('#res_info_adc').html(data);
					$(result).fadeIn('slow');
					$('#loading').hide();
				}
			})
			return false;
		}
	});
	jQuery("#info_adc").click(function() { g.resetForm(); });
});

function seleccionar(archivo, id) {
	var id_img = $("#id_img").val();
	if(id_img != "") {
		$("#"+id_img).css("background-color", "#FFFFFF");
		$("#"+id_img).css("color", "#000000");
	}
	$("#"+id).css("background-color", "#421867");
	$("#"+id).css("color", "#FFFFFF");
	$("#id_img").val(id);
	$("#grupo_icono").val(archivo);
	var logo = $("#grupo_icono").val();
}
$(document).ready(function() {
	var v = $("#redes").validate( {
		success: function(label) { label.addClass("valid").text("ok!") },
		rules: {
			red_url: {
				required: true,
				minlength: 5
			}
		},
		messages: {
			red_url: {
				required: " <span id='msj_error_texto'>Ingrese el nombre del eventoa URL del evento</span>",
				minlength: jQuery.format(" <span id='msj_error_texto'>Mínimo {0} caracteres necesarios!</span>")
			}
		}
	});
	jQuery("#redes").click(function() { v.resetForm(); });
});

function actualiza_redes() {
	var dir = "index3.php?op=25&palabra=redes&e=listar_redes&inc&id="+jQuery("#id_igl_red").val();
	$().ajaxStart(function() { $('#loading').show(); });
	$.ajax( {
		type: 'POST',
		url: dir,
		success: function(data) {
			var result = $('#res_redes').html(data);
			//alert("recargando "+dir);
			$(result).fadeIn('slow');
			$('#loading').hide();
		}
	});
}
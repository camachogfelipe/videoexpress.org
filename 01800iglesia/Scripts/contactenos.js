$(document).ready(function() {	
	var v = $("#form_con").validate( {
		success: function(label) { label.addClass("valid").text("") },
		rules: {
			respuesta: {
				required: true,
				minlength: 10,
				maxlength: 100,
				letterswithbasicpunc: true
			}
		},
		messages: {
			respuesta: {
				required: jQuery.format("<br /><span id='msj_error_texto'>Escriba la respuesta</span>"),
				minlength: jQuery.format("<br /><span id='msj_error_texto'>M&iacute;nimo {0} caracteres necesarios!</span>"),
				maxlength: jQuery.format("<br /><span id='msj_error_texto'>M&aacute;ximo {0} caracteres necesarios!</span>"),
				letterswithbasicpunc: "<br /><span id='msj_error_texto'>Ingrese solo letras por favor</span>"
			}
		},
		submitHandler: function()
		{
			$.ajax( {
				type: 'POST',
				url: $('#form_con').attr('action'),
				data: $('#form_con').serialize(),
				success: function(data) {
					var result = $('#div_respuesta').html(data);
					$(result).fadeIn('slow');
				}
			})
			return false;
		}
	});
});

function eliminar(id) {
	var entrar = confirm("¿Está seguro de eliminar el mensaje, se borraran todos los datos?");
	if(entrar == true) {
		var uri = "op=4&id="+id+"&a=elm";
		recargar('index3',uri,'#panel_derecho_menu');
	}
}
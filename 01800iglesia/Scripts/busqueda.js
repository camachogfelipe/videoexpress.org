$(document).ready(function() {	
	var v = jQuery("#busqueda").validate( {
		success: function(label) { label.addClass("valid").text("") },
		rules: {
			palabra: {
				required: true,
				minlength: 3,
				letterswithbasicpunc: true
			}
		},
		messages: {
			palabra: {
				required: "Ingrese el texto para buscar la iglesia",
				minlength: jQuery.format("Mínimo {0} caracteres necesarios!"),
				letterswithbasicpunc: "Ingrese solo letras por favor"
			}
		},
		submitHandler: function()
		{
			$.ajax( {
				type: 'POST',
				url: jQuery("#busqueda").attr('action'),
				data: jQuery("#busqueda").serialize(),
				success: function(data) {
					var result = jQuery('#panel_derecho_menu').html(data);
					jQuery(result).fadeIn('slow');
				}
			})
			return false;
		}
	});
});
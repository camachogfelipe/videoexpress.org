$(document).ready(function() {
	$( "#igl_id" ).autocomplete({ source: "index3.php?op=47&tipo=2" });	
	var v = $("#crear_correo").validate( {
		success: function(label) { label.addClass("valid").text("") },
		rules: {
			email: {
				required: true,
				minlength: 6,
				email: true
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
			email: {
				required: " <span id='msj_error_texto'>Escribe un email valido</span>",
				minlength: jQuery.format(" <span id='msj_error_texto'>Mínimo {0} caracteres necesarios!</span>"),
				email: " <span id='msj_error_texto'>El email no es valido</span>"
			},
//			tipo: { required: " <span id='msj_error_texto'>Seleccione el tipo de usuario</span>" },
//			igl_id: { required: " <span id='msj_error_texto'>Ingrese el nombre de la iglesia</span>" }
		},
		submitHandler: function() { jQuery("#crear_correo").submit(); }
	});
});
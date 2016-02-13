$(document).ready(function() {
	$("#loading").hide();
    var v = jQuery("#estadistica").validate( {
		success: function(label) { label.addClass("valid").text("ok!") },
		rules: {
			datos: {
				required: true,
				minlength: 5,
				alphanumeric2: true
			},
			region: { required: true },
			pais: { required: true }
		},
		messages: {
			datos: {
				required: "<br><span id='msj_error_texto'>Ingrese los datos estadísticos</span>",
				minlength: jQuery.format("<br><span id='msj_error_texto'>Mínimo {0} caracteres necesarios!</span>"),
				alphanumeric2: "<br><span id='msj_error_texto'>Ingrese solo números y letras por favor</span>"
			},
			region: {
				required: "<br><span id='msj_error_texto'>Seleccione una región por favor</span>"
			},
			pais: {
				required: "<br><span id='msj_error_texto'>Seleccione un país por favor</span>"
			}
		},
		submitHandler: function() {
			$("#loading").show();
			$.ajax( {
				type: 'POST',
				url: $('#estadistica').attr('action'),
				data: $('#estadistica').serialize(),
				success: function(data) {
					//$('#estadistica').hide();
					var result = $('#resultado').html(data);
					$(result).fadeIn('slow');
					$('#loading').hide();
				}
			})
			return false;
		}
	});
	$("#reset").click(function() {
			v.resetForm();
	});
	$("#region").change(function(){
		$("#loading").show();
		$("#pais option[value=").attr("selected",true);
		$("#depto option[value=]").attr("selected",true);
		$("#ciudad option[value=]").attr("selected",true);
		$.post("index3.php",{ op:"17", tabla:"paises", id_geo:$(this).val() },function(data){$("#pais").html(data);});
		$("#loading").hide();
	});
});

function eliminar(id, pag) {
	if(id != "") {
		$("#loading").show();
		var entrar = confirm("¿Está seguro de eliminar el dato con id: "+id+"?");
		if(entrar == true) {
			recargar('index3', 'op=57&id='+id+'&pag='+pag, '#panel_derecho_menu');
		}
		$("#loading").hide();
	}
}
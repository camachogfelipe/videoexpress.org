$(document).ready(function() {
	jQuery("#loading").hide();
    var v = jQuery("#geografia").validate( {
		success: function(label) { label.addClass("valid").text("ok!") },
		rules: {
			termino : {
				required: true
			},
			buscar_en: {
				required: true
			},
			continente : {
				required: true
			},
			pais : {
				required: true
			},
			region : {
				required: true
			},
			spanish: {
				required: true,
				minlength: 3,
				maxlength: 150,
				letterswithbasicpunc: true
			},
			english: {
				required: true,
				minlength: 3,
				maxlength: 150,
				letterswithbasicpunc: true
			}
		},
		messages: {
			termino : {
				required: " <span id='msj_error_texto'>Ingrese una palabra de busqueda por favor</span>",
			},
			buscar_en : {
				required: " <span id='msj_error_texto'>Seleccione el lugar donde quiere buscar</span>",
			},
			continente : {
				required: " <span id='msj_error_texto'>Seleccione por favor un continente</span>",
			},
			pais : {
				required: " <span id='msj_error_texto'>Seleccione por favor un país</span>",
			},
			region : {
				required: " <span id='msj_error_texto'>Seleccione por favor un departamento y/o región</span>",
			},
			spanish: {
				required: " <span id='msj_error_texto'>Ingrese el nombre</span>",
				minlength: jQuery.format(" <span id='msj_error_texto'>Mínimo {0} caracteres necesarios!</span>"),
				maxlength: jQuery.format(" <span id='msj_error_texto'>Mínimo {0} caracteres necesarios!</span>"),
				letterswithbasicpunc: " <span id='msj_error_texto'>Ingrese solo letras por favor</span>"
			},
			english: {
				required: " <span id='msj_error_texto'>Ingrese el nombre</span>",
				minlength: jQuery.format(" <span id='msj_error_texto'>Mínimo {0} caracteres necesarios!</span>"),
				maxlength: jQuery.format(" <span id='msj_error_texto'>Mínimo {0} caracteres necesarios!</span>"),
				letterswithbasicpunc: " <span id='msj_error_texto'>Ingrese solo letras por favor</span>"
			}
		},
		submitHandler: function()
		{
			$.ajax( {
				type: 'POST',
				url: $('#geografia').attr('action'),
				data: $('#geografia').serialize(),
				success: function(data) {
					$('#formulario').hide();
					$('#form').hide();
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
	$("#continente").change(function(){
		$("#pais option[value=]").attr("selected",true);
		$("#region option[value=]").attr("selected",true);
		$.post("index3.php",{ op:"17", tabla:"paises", id_geo:$(this).val() },function(data){$("#pais").html(data);})
	});
	$("#pais").change(function(){
		$("#region option[value=]").attr("selected",true);
		$.post("index3.php",{ op:"17", tabla:"regiones", id_geo:$(this).val() },function(data){$("#region").html(data);})
	});
});
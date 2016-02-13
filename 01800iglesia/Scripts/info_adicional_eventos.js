$(document).ready(function() {
	var dates = $( "#evento_fecha_inicio, #evento_fecha_fin" ).datepicker({
		defaultDate: "+1d",
		dateFormat: 'yy-mm-dd',
		regional: "es",
		changeMonth: true,
		changeYear: true,
		numberOfMonths: 1,
		onSelect: function( selectedDate ) {
			var option = this.id == "evento_fecha_inicio" ? "minDate" : "maxDate",
				instance = $( this ).data( "datepicker" ),
				date = $.datepicker.parseDate(
					instance.settings.dateFormat ||
					$.datepicker._defaults.dateFormat,
					selectedDate, instance.settings );
			dates.not( this ).datepicker( "option", option, date );
		}
	});
	var v = $("#eventos").validate( {
		success: function(label) { label.addClass("valid").text("ok!") },
		rules: {
			evento_nombre: {
				required: true,
				minlength: 5,
				letterswithbasicpunc: true
			},
			evento_descripcion: {
				required: true,
				minlength: 5,
				letterswithbasicpunc: true
			},
			evento_fecha_incio: {
				required: true,
				date: true
			},
			evento_fecha_fin: {
				date: true
			},
			evento_lugar: {
				required: true,
				minlength: 5
			},
			evento_invita: {
				minlength: 5,
				letterswithbasicpunc: true
			},
			evento_valor: { digits2: true }
		},
		messages: {
			evento_nombre: {
				required: " <span id='msj_error_texto'>Ingrese el nombre del evento</span>",
				minlength: jQuery.format(" <span id='msj_error_texto'>Mínimo {0} caracteres necesarios!</span>"),
				letterswithbasicpunc: " <span id='msj_error_texto'>Ingrese solo letras por favor</span>"
			},
			evento_descripcion: {
				required: " <span id='msj_error_texto'>Ingrese la descripci&oacute;n del evento</span>",
				minlength: jQuery.format(" <span id='msj_error_texto'>Mínimo {0} caracteres necesarios!</span>"),
				letterswithbasicpunc: " <span id='msj_error_texto'>Ingrese solo letras por favor</span>"
			},
			evento_fecha: {
				required: " <span id='msj_error_texto'>Ingrese la fecha del evento</span>",
				date: jQuery.format(" <span id='msj_error_texto'>Ingrese una fecha valida por favor</span>")
			},
			evento_lugar: {
				required: " <span id='msj_error_texto'>Ingrese el lugar del evento</span>",
				minlength: jQuery.format(" <span id='msj_error_texto'>Mínimo {0} caracteres necesarios!</span>")
			},
			evento_invita: {
				minlength: jQuery.format(" <span id='msj_error_texto'>Mínimo {0} caracteres necesarios!</span>"),
				letterswithbasicpunc: " <span id='msj_error_texto'>Ingrese solo letras por favor</span>"
			},
			evento_valor: { digits2: " <span id='msj_error_texto'>Ingrese solo numeros por favor</span>" }
		}
	});
	jQuery("#eventos").click(function() { v.resetForm(); });
});

function actualiza_eventos() {
	var dir = "index3.php?op=25&palabra=eventos&e=listar_eventos&inc&id="+jQuery("#id_igl_evt").val();
	$().ajaxStart(function() { $('#loading').show(); });
	$.ajax( {
		type: 'POST',
		url: dir,
		success: function(data) {
			var result = $('#res_eventos').html(data);
			//alert("recargando "+dir);
			$(result).fadeIn('slow');
			$('#loading').hide();
		}
	});
}
$(document).ready(function() {
	jQuery("#loading").hide();
    var v = jQuery("#ins_iglesia").validate( {
		success: function(label) { label.addClass("valid").text("ok!") },
		rules: {
			fecha_fundacion: { date: true },
			cuenta: { minlength: 5 },
			nombre: {
				required: true,
				minlength: 5,
				alphanumeric: true
			},
			pastorppal: {
				required: true,
				minlength: 5,
				letterswithbasicpunc: true
			},
			dir: {
				required: true,
				minlength: 5
			},
			tel: {
				required: function() {
					if(jQuery("#pbx").val == null && jQuery.val("#cel") == null) return true;
					else return false;
				},
				minlength: 7,
				digits2: true
			},
			pbx: {
				digits2: true,
				minlength: 7
			},
			cel: {
				digits2: true,
				minlength: 10
			},
			email: { email: true },
			region: { required: true },
			pais: { required: true },
			depto: { required: true },
			ciudad: { required: true },
			web: { url: true }
		},
		messages: {
			fecha_fundacion: {
				date: jQuery.format(" <span id='msj_error_texto'>Ingrese una fecha valida por favor</span>")
			},
			cuenta: {
				minlength: jQuery.format(" <span id='msj_error_texto'>Mínimo {0} caracteres necesarios!</span>")
			},
			nombre: {
				required: " <span id='msj_error_texto'>Ingrese el nombre de la iglesia</span>",
				minlength: jQuery.format(" <span id='msj_error_texto'>Mínimo {0} caracteres necesarios!</span>"),
				letterswithbasicpunc: " <span id='msj_error_texto'>Ingrese solo letras por favor</span>"
			},
			pastorppal: {
				required: " <span id='msj_error_texto'>Ingrese el nombre del pastor principal de la iglesia</span>",
				minlength: jQuery.format(" <span id='msj_error_texto'>Mínimo {0} caracteres necesarios!</span>"),
				letterswithbasicpunc: " <span id='msj_error_texto'>Ingrese solo letras por favor</span>"
			},
			dir: {
				required: " <span id='msj_error_texto'>Ingrese la dirección donde esta unicada la iglesia</span>",
				minlength: jQuery.format(" <span id='msj_error_texto'>Mínimo {0} caracteres necesarios!</span>")
			},
			tel: {
				required: " <span id='msj_error_texto'>Ingrese el numero de teléfono de la iglesia</span>",
				minlength: jQuery.format(" <span id='msj_error_texto'>Mínimo {0} numeros necesarios!</span>"),
				digits2: " <span id='msj_error_texto'>Ingrese solo numeros por favor</span>"
			},
			pbx: {
				minlength: jQuery.format(" <span id='msj_error_texto'>Mínimo {0} numeros necesarios!</span>"),
				digits2: " <span id='msj_error_texto'>Ingrese solo numeros por favor</span>"
			},
			cel: {
				minlength: jQuery.format(" <span id='msj_error_texto'>Mínimo {0} numeros necesarios!</span>"),
				digits2: " <span id='msj_error_texto'>Ingrese solo numeros por favor</span>"
			},
			email: {
				email: " <span id='msj_error_texto'>Ingrese dirección de correo valida por favor</span>"
			},
			region: {
				required: " <span id='msj_error_texto'>Seleccione una región por favor</span>"
			},
			pais: {
				required: " <span id='msj_error_texto'>Ingrese el nombre del país donde esta ubicada la ilgesia</span>"
			},
			depto: {
				required: " <span id='msj_error_texto'>Ingrese el departamento/estado donde esta ubicada la iglesia</span>"
			},
			ciudad: {
				required: " <span id='msj_error_texto'>Ingrese la ciudad/municipo donde esta ubicada la iglesia</span>"
			},
			web: {
				url: " <span id='msj_error_texto'>Ingrese dirección web valida</span>"
			}
		},
		submitHandler: function()
		{
			$.ajax( {
				type: 'POST',
				url: $('#ins_iglesia').attr('action'),
				data: $('#ins_iglesia').serialize(),
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
	$("#region").change(function(){
		$("#pais option[value=").attr("selected",true);
		$("#depto option[value=]").attr("selected",true);
		$("#ciudad option[value=]").attr("selected",true);
		$.post("index3.php",{ op:"17", tabla:"paises", id_geo:$(this).val() },function(data){$("#pais").html(data);})
	});
	$("#pais").change(function(){
		$("#depto option[value=]").attr("selected",true);
		$("#ciudad option[value=]").attr("selected",true);
		$.post("index3.php",{ op:"17", tabla:"regiones", id_geo:$(this).val() },function(data){$("#depto").html(data);})
	});
	$("#depto").change(function(){
		$("#ciudad option[value=]").attr("selected",true);
		$.post("index3.php",{ op:"17", tabla:"localidades", id_geo:$(this).val() },function(data){$("#ciudad").html(data);})
	});
	$("#subir_logo_iframe").hide();
	$("#subir_logo").click(function() {
		$("#subir_logo_iframe").show();
		$("#iframeupload").show();
	});
	$( "#fecha_fundacion" ).datepicker({ 
		dateFormat: 'yy-mm-dd',
		maxDate: 0,
		regional: "es",
		changeMonth: true,
		changeYear: true
	});
});

function seleccionar(archivo, id) {
	var id_td = $("#id_td").val();
	if(id_td != "") {
		$("#"+id_td).css("background-color", "#FFFFFF");
		$("#"+id_td).css("color", "#000000");
	}
	$("#"+id).css("background-color", "#421867");
	$("#"+id).css("color", "#FFFFFF");
	$("#id_td").val(id);
	$("#logo").val(archivo);
	var logo = $("#logo").val();
}

function igl_ppal(a) {
	if(a == "P") { $("#igl_ppal").hide(); $("#iglesia_ppal").val("Escriba el nombre de la iglesia principal..."); }
	else if(a == "NP") { $("#igl_ppal").show(); $("#iglesia_ppal").val("Escriba el nombre de la iglesia principal...");  }
	else if(a == "F") $("#iglesia_ppal").val("");
}

function refrescar() {
	$("#subir_logo_iframe").hide();
	$.ajax( {
		type: 'POST',
		url: "index3.php?op=19",
		data: $(this).serialize(),
		success: function(data) {
			$("#loading").show();
			var result = $('#mostrar_logos').html(data);
			$("#loading").hide();
			$(result).fadeIn('slow');
		}
	});
}
jQuery(document).ready(function() {
	jQuery('#cargando').hide();

	jQuery(".region").change(function(){
		jQuery(".pais option[value=]").attr("selected",true);
		jQuery(".depto option[value=]").attr("selected",true);
		jQuery(".ciudad option[value=]").attr("selected",true);
		//jQuery(".pais").load('index2.php?sec=inscribe&e=geo&tabla=paises&id_geo='+jQuery(".region").val().replace(/ /g,"+"));
		jQuery.post("index2.php",{ sec:"inscribe", e:"geo", tabla:"paises", id_geo:jQuery(this).val() },function(data){
			var nav = $.browser;
			if(nav.msie) {
				var datos = data;
				document.getElementById("pais").innerHTML = "";
				document.getElementById("pais").innerHTML = datos;
				alert(jQuery(".pais").html());
			}
			else jQuery(".pais").empty().html(data);
		});
	});	
	jQuery(".pais").change(function(){
		jQuery(".depto option[value=]").attr("selected",true);
		jQuery(".ciudad option[value=]").attr("selected",true);
		jQuery.post("index2.php",{ sec:"inscribe", e:"geo", tabla:"regiones", id_geo:jQuery(this).val() },function(data){
			var nav = $.browser;
			if(nav.msie) {
				var datos = data;
				document.getElementById("depto").innerHTML = "";
				document.getElementById("depto").innerHTML = ""+datos+"";
			}
			else jQuery("#depto").html(data);
		});
	});
	jQuery("#depto").change(function(){
		jQuery(".ciudad option[value=]").attr("selected",true);
		jQuery.post("index2.php",{ sec:"inscribe", e:"geo", tabla:"localidades", id_geo:jQuery(this).val() },function(data){
			var nav = $.browser;
			if(nav.msie) {
				var datos = data;
				document.getElementById("ciudad").innerHTML = "";
				document.getElementById("ciudad").innerHTML = ""+datos+"";
			}
			else jQuery("#ciudad").html(data);
		});
	});

    var v = jQuery("#sac").validate( {
		success: function(label) { label.addClass("valid").text("ok!") },
		rules: {
			nombre_iglesia: {
				required: true,
				minlength: 5,
				alphanumeric: true
			},
			pastor: {
				minlength: 5,
				letterswithbasicpunc: true
			},
			telefono: {
				minlength: 3,
				digits: true,
				required: function() {
					if(jQuery("#celular").val() == "" && jQuery("#pbx").val() == "") return true;
					else return false;
				}
			},
			celular: {
				minlength: 3,
				digits: true,
				required: function() {
					if(jQuery("#telefono").val() == "" && jQuery("#pbx").val() == "") return true;
					else return false;
				}
			},
			pbx: {
				minlength: 3,
				digits: true,
				required: function() {
					if(jQuery("#telefono").val() == "" && jQuery("#celular").val() == "") return true;
					else return false;
				}
			},
			region: { required: true },
			pais: { required: true },
			depto: { required: true },
			ciudad: { required: true },
			email: { email: true },
			p1: { required: true },
			p2: { required: true },
			p3: { required: true },
			p4: { required: true },
			p5: { 
				required: true,
				minlength: 100,
				letterswithbasicpunc: true
			},
			nombre_inscribe: {
				required: true,
				minlength: 5,
				letterswithbasicpunc: true
			},
			mail_inscribe: {
				required: true,
				minlength: 5,
				email: true
			},
			tel_inscribe: {
				required: true,
				minlength: 5,
				digits: true
			},
			skype: {
				minlength: 3,
				alphanumeric: true
			},
			msn: {
				minlength: 3,
				email: true
			},
			acepto: { required: true }
		},
		messages: {
			nombre_iglesia: {
				required: "<br /><span id='msj_error_texto'>Ingrese el nombre de la iglesia</span>",
				minlength: jQuery.format(" <br /><span id='msj_error_texto'>Mínimo {0} caracteres necesarios!</span>"),
				alphanumeric: "<br /><span id='msj_error_texto'>Ingrese solo letras por favor</span>"
			},
			pastor: {
				required: "<br /><span id='msj_error_texto'>Ingrese el nombre del pastor por favor</span>",
				minlength: jQuery.format("<br /><span id='msj_error_texto'>Mínimo {0} caracteres necesarios!</span>"),
				letterswithbasicpunc: "<br /><span id='msj_error_texto'>Ingrese solo letras por favor</span>"
			},
			telefono: {
				required: "<br /><span id='msj_error_texto'>Ingrese el n&uacute;mero de tel&eacute;fono por favor</span>",
				minlength: jQuery.format("<br /><span id='msj_error_texto'>Mínimo {0} caracteres necesarios!</span>"),
				digits: "<br /><span id='msj_error_texto'>Ingrese solo numeros por favor</span>"
			},
			celular: {
				required: "<br /><span id='msj_error_texto'>Ingrese el n&uacute;mero m&oacute;vil por favor</span>",
				minlength: jQuery.format("<br /><span id='msj_error_texto'>Mínimo {0} caracteres necesarios!</span>"),
				digits: "<br /><span id='msj_error_texto'>Ingrese solo numeros por favor</span>"
			},
			pbx: {
				required: "<br /><span id='msj_error_texto'>Ingrese el n&uacute;mero del PBX por favor</span>",
				minlength: jQuery.format("<br /><span id='msj_error_texto'>Mínimo {0} caracteres necesarios!</span>"),
				digits: "<br /><span id='msj_error_texto'>Ingrese solo numeros por favor</span>"
			},
			region: { required: "<br /><span id='msj_error_texto'>Seleccione el continente por favor</span>" },
			pais: { required: "<br /><span id='msj_error_texto'>Seleccione el pais por favor</span>" },
			depto: { required: "<br /><span id='msj_error_texto'>Seleccione el departamento/estado por favor</span>" },
			ciudad: { required: "<br /><span id='msj_error_texto'>Seleccione la ciudad por favor</span>" },
			email: { email: "<br /><span id='msj_error_texto'>Ingrese un email valido por favor</span>" },
			p1: { required: "<br /><span id='msj_error_texto'>Seleccione una respuesta por favor</span>" },
			p2: { required: "<br /><span id='msj_error_texto'>Seleccione una respuesta por favor</span>" },
			p3: { required: "<br /><span id='msj_error_texto'>Seleccione una respuesta por favor</span>" },
			p4: { required: "<br /><span id='msj_error_texto'>Seleccione una respuesta por favor</span>" },
			p5: { 
				required: "<br /><span id='msj_error_texto'>Escriba una respuesta por favor</span>",
				minlength: jQuery.format("<br /><span id='msj_error_texto'>Mínimo {0} caracteres necesarios!</span>"),
				letterswithbasicpunc: "<br /><span id='msj_error_texto'>Ingrese solo letras por favor</span>"
			},
			nombre_inscribe: {
				required: "<br /><span id='msj_error_texto'>Ingrese su nombre por favor</span>",
				minlength: jQuery.format("<br /><span id='msj_error_texto'>Mínimo {0} caracteres necesarios!</span>"),
				letterswithbasicpunc: "<br /><span id='msj_error_texto'>Ingrese solo letras por favor</span>"
			},
			mail_inscribe: {
				required: "<br /><span id='msj_error_texto'>Ingrese el mail para poderlo contactar</span>",
				minlength: jQuery.format("<br /><span id='msj_error_texto'>Mínimo {0} caracteres necesarios!</span>"),
				email: "<br /><span id='msj_error_texto'>Ingrese un mail valido</span>"
			},
			tel_inscribe: {
				required: "<br /><span id='msj_error_texto'>Ingrese su n&uacute;mero de tel&eacute;fono por favor</span>",
				minlength: jQuery.format("<br /><span id='msj_error_texto'>Mínimo {0} caracteres necesarios!</span>"),
				digits: "<br /><span id='msj_error_texto'>Ingrese solo numeros por favor</span>"
			},
			skype: {
				minlength: jQuery.format("<br /><span id='msj_error_texto'>Mínimo {0} caracteres necesarios!</span>"),
				alphanumeric: "<br /><span id='msj_error_texto'>Ingrese solo letras por favor</span>"
			},
			msn: {
				minlength: jQuery.format("<br /><span id='msj_error_texto'>Mínimo {0} caracteres necesarios!</span>"),
				email: "<br /><span id='msj_error_texto'>Ingrese un mail valido</span>"
			},
			acepto: { required: jQuery.format("<br /><span id='msj_error_texto'>Es preciso aceptar los terminos y condiciones del servicio</span>") }
		},
		errorPlacement: function(error, element) { error.insertAfter("#"+element.attr('id')+"_error"); },
		submitHandler: function()
		{
			jQuery().ajaxStart(function()
			{
				jQuery('#cargando').show("slow");
			});
			jQuery.ajax( {
				type: 'POST',
				url: jQuery("#sac").attr('action'),
				data: jQuery("#sac").serialize(),
				dataType:"html",
				success: function(data) {
					jQuery('#cargando').hide();
					var nav = jQuery.browser;
					if(nav.opera || nav.mozilla || nav.chrome || nav.safari) var result = jQuery('#resultado').html(data);
					else if(nav.msie) var result = document.getElementById("resultado").innerHTML = data;
					jQuery(result).fadeIn('slow');
					jQuery("#submit").attr('disabled', 'disabled');
					jQuery("#reset").attr('disabled', 'disabled');
					jQuery("#acepto").attr('disabled', 'disabled');
				}
			})
			return false;
		}
	});
	jQuery("#reset").click(function() {
			v.resetForm();
	});
});

function check() {
	if(jQuery('#acepto').is(':checked')) jQuery("#submit").attr('disabled', false);
	else jQuery("#submit").attr('disabled', true);
}
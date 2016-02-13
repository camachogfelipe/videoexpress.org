jQuery(document).ready(function() {	
	var x = 0;
	var v = jQuery("#publicidad").validate({
		success: function(label) { label.addClass("valid").text("") },
		rules: {
			empresa: {
				required: true,
				minlength: 3,
				alphanumeric: true
			},
			tel: {
				required: function(){
							if(jQuery("#movil").val() == "" && jQuery("#pbx").val() == "") return true;
							else return false;
						  },
				minlength: 3,
				alphanumeric: true
			},
			movil: {
				required: function(){
							if(jQuery("#tel").val() == "" && jQuery("#pbx").val() == "") return true;
							else return false;
						  },
				minlength: 3,
				alphanumeric: true
			},
			pbx: {
				required: function(){
							if(jQuery("#tel").val() == "" && jQuery("#movil").val() == "") return true;
							else return false;
						  },
				minlength: 3,
				alphanumeric: true
			},
			web: {
				minlength: 7,
				url2: true
			},
			email: {
				minlength: 5,
				email2: true
			},
			lapa1: {
				required: function(){
							if(jQuery('#lapa2').is(':checked') == false && 
							   jQuery('#lapa3').is(':checked') == false && 
							   jQuery('#lapa4').is(':checked') == false && 
							   jQuery('#lapa5').is(':checked') == false && 
							   jQuery('#lapa6').is(':checked') == false && 
							   jQuery('#lapa7').is(':checked') == false && 
							   jQuery('#lapa8').is(':checked') == false) return true;
						  }
			},
			lapa2: {
				required: function(){
							if(jQuery('#lapa1').is(':checked') == false && 
							   jQuery('#lapa3').is(':checked') == false && 
							   jQuery('#lapa4').is(':checked') == false && 
							   jQuery('#lapa5').is(':checked') == false && 
							   jQuery('#lapa6').is(':checked') == false && 
							   jQuery('#lapa7').is(':checked') == false && 
							   jQuery('#lapa8').is(':checked') == false) return true;
						  }
			},
			lapa3: {
				required: function(){
							if(jQuery('#lapa1').is(':checked') == false && 
							   jQuery('#lapa2').is(':checked') == false && 
							   jQuery('#lapa4').is(':checked') == false && 
							   jQuery('#lapa5').is(':checked') == false && 
							   jQuery('#lapa6').is(':checked') == false && 
							   jQuery('#lapa7').is(':checked') == false && 
							   jQuery('#lapa8').is(':checked') == false) return true;
						  }
			},
			lapa4: {
				required: function(){
							if(jQuery('#lapa1').is(':checked') == false && 
							   jQuery('#lapa2').is(':checked') == false && 
							   jQuery('#lapa3').is(':checked') == false && 
							   jQuery('#lapa5').is(':checked') == false && 
							   jQuery('#lapa6').is(':checked') == false && 
							   jQuery('#lapa7').is(':checked') == false && 
							   jQuery('#lapa8').is(':checked') == false) return true;
						  }
			},
			lapa5: {
				required: function(){
							if(jQuery('#lapa1').is(':checked') == false && 
							   jQuery('#lapa2').is(':checked') == false && 
							   jQuery('#lapa3').is(':checked') == false && 
							   jQuery('#lapa4').is(':checked') == false && 
							   jQuery('#lapa6').is(':checked') == false && 
							   jQuery('#lapa7').is(':checked') == false && 
							   jQuery('#lapa8').is(':checked') == false) return true;
							else return false;
						  }
			},
			lapa6: {
				required: function(){
							if(jQuery('#lapa1').is(':checked') == false && 
							   jQuery('#lapa2').is(':checked') == false && 
							   jQuery('#lapa3').is(':checked') == false && 
							   jQuery('#lapa4').is(':checked') == false && 
							   jQuery('#lapa5').is(':checked') == false && 
							   jQuery('#lapa7').is(':checked') == false && 
							   jQuery('#lapa8').is(':checked') == false) return true;
							else return false;
						  }
			},
			lapa7: {
				required: function(){
							if(jQuery('#lapa1').is(':checked') == false && 
							   jQuery('#lapa2').is(':checked') == false && 
							   jQuery('#lapa3').is(':checked') == false && 
							   jQuery('#lapa4').is(':checked') == false && 
							   jQuery('#lapa5').is(':checked') == false && 
							   jQuery('#lapa6').is(':checked') == false && 
							   jQuery('#lapa8').is(':checked') == false) return true;
							else return false;
						  }
			},
			lapa8: {
				required: function(){
							if(jQuery('#lapa1').is(':checked') == false && 
							   jQuery('#lapa2').is(':checked') == false && 
							   jQuery('#lapa3').is(':checked') == false && 
							   jQuery('#lapa4').is(':checked') == false && 
							   jQuery('#lapa5').is(':checked') == false && 
							   jQuery('#lapa6').is(':checked') == false && 
							   jQuery('#lapa7').is(':checked') == false) return true;
							else return false;
						  }
			},
			pact: {
				required: true
			},
			logotipo: {
				required: true
			},
			texto: {
				required: true,
				minlength: 3,
				maxlength: 250,
				alphanumeric: true
			}
		},
		messages: {
			empresa: {
				required: jQuery.format(" <span id='msj_error_texto'>Ingrese el nombre de la empresa</span>"),
				minlength: jQuery.format(" <span id='msj_error_texto'>Mínimo {0} caracteres necesarios!</span>"),
				alphanumeric: jQuery.format(" <span id='msj_error_texto'>Ingrese solo numeros y letras</span>")
			},
			tel: {
				required: jQuery.format(" <span id='msj_error_texto'>Ingrese un n&uacute;mero de contacto</span>"),
				minlength: jQuery.format(" <span id='msj_error_texto'>Mínimo {0} caracteres necesarios!</span>"),
				alphanumeric: jQuery.format(" <span id='msj_error_texto'>Ingrese solo numeros y letras</span>")
			},
			movil: {
				required: jQuery.format(" <span id='msj_error_texto'>Ingrese un n&uacute;mero de contacto</span>"),
				minlength: jQuery.format(" <span id='msj_error_texto'>Mínimo {0} caracteres necesarios!</span>"),
				alphanumeric: jQuery.format(" <span id='msj_error_texto'>Ingrese solo numeros y letras</span>")
			},
			pbx: {
				required: jQuery.format(" <span id='msj_error_texto'>Ingrese un n&uacute;mero de contacto</span>"),
				minlength: jQuery.format(" <span id='msj_error_texto'>Mínimo {0} caracteres necesarios!</span>"),
				alphanumeric: jQuery.format(" <span id='msj_error_texto'>Ingrese solo numeros y letras</span>")
			},
			web: {
				minlength: jQuery.format(" <span id='msj_error_texto'>Mínimo {0} caracteres necesarios!</span>"),
				url2: jQuery.format(" <span id='msj_error_texto'>Ingrese una direcci&oacute;n web valida</span>")
			},
			email: {
				minlength: jQuery.format(" <span id='msj_error_texto'>Mínimo {0} caracteres necesarios!</span>"),
				email2: jQuery.format(" <span id='msj_error_texto'>Ingrese un email valido</span>")
			},
			lapa1: {
				required: jQuery.format(" <span id='msj_error_texto'>Escoja al menos una categoria</span>")
			},
			lapa2: {
				required: jQuery.format(" <span id='msj_error_texto'>Escoja al menos una categoria</span>")
			},
			lapa3: {
				required: jQuery.format(" <span id='msj_error_texto'>Escoja al menos una categoria</span>")
			},
			lapa4: {
				required: jQuery.format(" <span id='msj_error_texto'>Escoja al menos una categoria</span>")
			},
			lapa5: {
				required: jQuery.format(" <span id='msj_error_texto'>Escoja al menos una categoria</span>")
			},
			lapa6: {
				required: jQuery.format(" <span id='msj_error_texto'>Escoja al menos una categoria</span>")
			},
			lapa7: {
				required: jQuery.format(" <span id='msj_error_texto'>Escoja al menos una categoria</span>")
			},
			lapa8: {
				required: jQuery.format(" <span id='msj_error_texto'>Escoja al menos una categoria</span>")
			},
			pact: {
				required: jQuery.format(" <span id='msj_error_texto'>Escoja al menos una opci&oacute;n</span>")
			},
			logotipo: {
				required: jQuery.format(" <span id='msj_error_texto'>Ingrese el logotipo de la empresa</span>")
			},
			texto: {
				required: jQuery.format(" <span id='msj_error_texto'>Ingrese el texto del aviso</span>"),
				minlength: jQuery.format(" <span id='msj_error_texto'>Mínimo {0} caracteres necesarios!</span>"),
				maxlength: jQuery.format(" <span id='msj_error_texto'>Máximo {0} caracteres!</span>"),
				alphanumeric: jQuery.format(" <span id='msj_error_texto'>Ingrese solo numeros y letras</span>")
			}
		},
		errorPlacement: function(error, element) {
			var y = element.attr('id');
			if(y == "lapa1" || y == "lapa2" || y == "lapa3" || y == "lapa4" || y == "lapa5" || y == "lapa6" || y == "lapa7" || y == "lapa8") x++;
			if(x == 8) { error.insertAfter("#lapa_error"); x++; }
			else error.insertAfter("#"+element.attr('id')+"_error");
		}
	});
});

function contar(input) {
	var t = document.getElementById(input).value;
	t = t.length;
	$("#"+input+"-contar").html(t);
}
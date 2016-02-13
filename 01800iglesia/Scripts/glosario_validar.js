jQuery(document).ready(function() {
	var v = jQuery("#glosario").validate( {
		submitHandler: function() {
			var cant = jQuery("#cant_palabras").val();
			jQuery(".validacion").remove();
			if(cant == 0) alert("Ingrese al menos una palabra");
			else {
				jQuery.ajax({
					type: 'POST',
					url: jQuery("#glosario").attr('action'),
					data: jQuery("#glosario").serialize(),
					success: function(data) {
						var result = jQuery('#panel_derecho_menu').html(data);
						jQuery(result).fadeIn('slow');
					}
				})
				return false;
			}
		}
	});
});

function valida() {
	var campos = 0;
	jQuery(".palabra").remove();
	jQuery(".significado").remove();
	jQuery(".idioma").remove();
	if(jQuery("#palabra").val() != "") campos++;
	else {
		texto_insertar = ' <label class="palabra" id="msj_error_texto">Ingrese la palabra</label>';
		elem = jQuery("#palabra");
		elem.after(texto_insertar);
	}
	if(jQuery("#significado").val() != "") campos++;
	else {
		texto_insertar = ' <label class="significado" id="msj_error_texto">Ingrese el significado</label>';
		elem = jQuery("#significado");
		elem.after(texto_insertar);
	}
	if(jQuery("#idioma").val() != "") campos++;
	else {
		texto_insertar = ' <label class="idioma" id="msj_error_texto">Seleccione el idioma</label>';
		elem = jQuery("#idioma");
		elem.after(texto_insertar);
	}
	
	if(campos == 3) generaNuevosCampos();
}

function generaNuevosCampos(){
	var indice = jQuery("#cant_palabras").val();
	var ind = indice;
	ind++;

	if(jQuery("#idioma").val() == "3") var lang = "Ingles";
	else if(jQuery("#idioma").val() == "7") var lang = "Espa&ntilde;ol";

	texto_insertar = '\n<tr valign="top">\n'+
					 '\n<td align="center"  style="border-left: 1px solid #700095; border-top: 1px solid #700095; border-bottom: 1px solid #700095;">'+ind+'</td>\n'+
					 '\n<td style="border-top: 1px solid #700095; border-bottom: 1px solid #700095;"><input name="glosario['+indice+'][palabra]" type="hidden" value="'+jQuery("#palabra").val()+'" />'+
					 jQuery("#palabra").val()+'</td>\n'+
					 '\n<td style="border-top: 1px solid #700095; border-bottom: 1px solid #700095;"><input name="glosario['+indice+'][significado]" type="hidden" value="'+jQuery("#significado").val()+'" />'+
					 jQuery("#significado").val()+'</td>\n'+
					 '\n<td style="border-right: 1px solid #700095; border-top: 1px solid #700095; border-bottom: 1px solid #700095;"><input name="glosario['+indice+'][idioma]" type="hidden" value="'+jQuery("#idioma").val()+'" />'+lang+'</td>\n'+
					 '\n</tr>\n';
	indice++;
	jQuery("#cant_palabras").val(indice);
	jQuery("#tp").html(ind);
	jQuery("#palabra").val("");
	jQuery("#significado").val("");
	jQuery("#idioma").val("");
	elem = jQuery("#pal");
	elem.before(texto_insertar);
}
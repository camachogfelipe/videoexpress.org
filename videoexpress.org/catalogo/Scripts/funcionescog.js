// JavaScript Document
jQuery(document).ready(function() {
	var v = jQuery("#peliculas").validate( {
		success: function(label) { label.addClass("valid").text("") },
		rules: {
			titulo_pelicula: {
				required: true,
				minlength: 3,
				letterswithbasicpunc: true
			},
			tiempo: {
				required: true,
				minlength: 2
			},
			descripcion: {
				required: true,
				minlength: 10
			}
		},
		messages: {
			titulo_pelicula: {
				required: "Ingrese el título de la pelicula",
				minlength: jQuery.format("Mínimo {0} caracteres necesarios!>"),
				letterswithbasicpunc: "Ingrese solo letras por favor"
			},
			tiempo: {
				required: "Ingrese el tiempo que dura la pelicula por favor",
				minlength: jQuery.format("Mínimo {0} caracteres necesarios!>")
			},
			descripcion: {
				required: "Ingrese la reseña de la pelicula por favor",
				minlength: jQuery.format("Mínimo {0} caracteres necesarios!>")
			}
		}
	});
	
	jQuery("#div_archivo").hide();
	jQuery("#link_video").hide();
	jQuery("#tipo_video").change(function(){
		jQuery("#link_video").hide();
		jQuery("#div_archivo").hide();
		if(jQuery(this).val() == "link") {
			jQuery("#link_video").show();
			jQuery("#div_archivo").hide();
		}
		else { jQuery("#div_archivo").show(); }
	});
	jQuery('#subir').submit(function(){
		jQuery("#error, #info, #alerta").hide();
		bUploaded.start('fileprogress');
	});
	
	jQuery("#div_archivo_online").hide();
	jQuery("#link_video_online").hide();
	jQuery("#tipo_video_online").change(function(){
		jQuery("#link_video_online").hide();
		jQuery("#div_archivo_online").hide();
		if(jQuery(this).val() == "online_link") {
			jQuery("#link_video_online").show();
			jQuery("#div_archivo_online").hide();
		}
		else { jQuery("#div_archivo_online").show(); }
	});
	jQuery('#subir').submit(function(){
		jQuery("#error, #info, #alerta").hide();
		bUploaded.start('fileprogress');
	});
});
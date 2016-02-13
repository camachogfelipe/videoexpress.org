var is_open = 0;
	
	function close_nav() {
		jQuery('#boton_menu_superior').removeClass('nav-js');
		jQuery('.navigation-toggle').removeClass('nav-js2');
		is_open = 0;
	}
	
	function open_nav() {
		jQuery('#boton_menu_superior').addClass('nav-js');
		jQuery('.navigation-toggle').addClass('nav-js2');
		is_open = 1;
	}

jQuery(document).ready(function() {
	jQuery("#load").hide();
	var v = jQuery("#busqueda").validate({
		success: function(label) { label.addClass("valid").text("") },
		rules: {
			tb: {
				required: true,
				minlength: 3,
				letterswithbasicpunc: true
			}
		},
		messages: {
			tb: {
				required: "Ingrese el texto para buscar la iglesia",
				minlength: jQuery.format("Mínimo {0} caracteres necesarios!>"),
				letterswithbasicpunc: "Ingrese solo letras por favor"
			}
		},
		errorLabelContainer: ".error_busqueda",
		submitHandler: function() {
			jQuery.ajax( {
				type: 'POST',
				url: jQuery("#busqueda").attr('action'),
				data: jQuery("#busqueda").serialize(),
				success: function(data) {
					jQuery("#load").show();
					var result = jQuery('#body_contenido').html(data);
					jQuery(result).fadeIn('slow');
					jQuery("#load").hide();
				}
			})
			return false;
		}
	});
	var u = jQuery("#login_ing").validate( {
		rules: {
			usuario: { required: true },
			clave : { required: true }
		},
		messages: {
			usuario: { required: "Ingrese el nombre de usuario" },
			clave: { required: "Ingrese la clave de acceso" }
		},
		errorLabelContainer: ".error_ingreso"
	});

	jQuery("#nav-open").click(function(e) {
		if (is_open === 1) { // si está abierto
			if (!jQuery(e.target).closest("#boton_menu_superior").length != 0) {
				close_nav();
			}
		 } else { // si está cerrado
				if (jQuery(e.target).closest("#boton_menu_superior").length == false) {
					open_nav();
				}
		 }
	});
});

function recargar(x,y, z) {
	close_nav();
	is_open = 0;
	jQuery("#load").delay(1000).show();
	var pagina=x+".php?"+y;
	//alert(pagina);
	jQuery.ajax({
		async: false,
		type: 'GET',
		dataType:"html",
		url: pagina,
		cache: true,
		success: function(data) {
			jQuery("#load").delay(1000).show();
			jQuery("#body_contenido").html(data);
			var height = jQuery("#publicidad").height();
			jQuery("#body_contenido").height(height);
			jQuery("#load").delay(1000).hide();
		}
	});
	jQuery("#load").delay(1000).hide();
}
jQuery(document).ready(function() {
	var width = jQuery("body").width();
	//alert(width);
	$(window).resize(function() {
		var width = jQuery("body").width();
		//alert(width);
		if(width >= 980) {
			ajustarAltura();
			var horizontal2 = jQuery(".scrollable2").scrollable({ circular: true,  speed: 4000 }).autoscroll({ autoplay: true });
		}
		else {
			jQuery("#mitad_izq").height("auto");
		}
	});
	if(width >= 980) {
		ajustarAltura();
		var horizontal2 = jQuery(".scrollable2").scrollable({ circular: true,  speed: 4000 }).autoscroll({ autoplay: true });
	}
	else {
		jQuery("#mitad_izq").height("auto");
	}
	redondear();
});

function ajustarAltura() {
	var height_izq = jQuery("#mitad_izq").height();
	var height_der = jQuery("#mitad_der").height();
	if(height_izq > height_der) {
		jQuery("#mitad_der").height(height_izq);
		jQuery("#publicidad").height(height_izq);
	}
	if(height_izq < height_der) { jQuery("#mitad_izq").height(height_der); }
	
	jQuery("#back img[title]").tooltip({ position: "bottom center" });
}

function redondear() {
	jQuery.each('p#texto_caja_publicidad', function() {
      jQuery('p#texto_caja_publicidad').corner();
    });
	jQuery('#colorgris').corner("right");
	jQuery('#publicidad').corner("top");
	jQuery("input").corner("round 5px");
	jQuery("textarea").corner("round 5px");
}
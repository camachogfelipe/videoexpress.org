jQuery(document).ready(function() {
	var width = jQuery("body").width();
	//alert(width);
	$(window).resize(function() {
		var width = jQuery("body").width();
		//alert(width);
		if(width >= 980) {
			jQuery("#mitad_izq2").removeAttr("style");
			jQuery("#mitad_der2").removeAttr("style");
			AjustarAnchos();
			height();
		}
		else {
			jQuery("#mitad_izq2").width("100%");
			jQuery("#mitad_izq2").height("auto");
			jQuery("#mitad_der2").width("100%");
			jQuery("#mitad_der2").height("auto");
			jQuery("#pasos").height("auto");
			jQuery("#body_contenido").height("auto");
		}
	});
	if(width >= 980) {
		AjustarAnchos();
	}
	else {
		jQuery("#mitad_izq2").height("auto");
		jQuery("#mitad_der2").height("auto");
		jQuery("#pasos").height("auto");
		jQuery("#body_contenido").height("auto");
	}
	
	jQuery(".mitad_der3").hide();
	jQuery("#tabs li:first").addClass("active").show();  
	jQuery(".mitad_der3:first").show();  
	jQuery("#tabs li").click(function() {
		jQuery(".boton").css("background-image","boton2.png");
		jQuery(".mitad_der3").hide();
		var activeTab = jQuery(this).attr("href");
		jQuery(activeTab).fadeIn();
		if(width >= 980) { height(); }
		return false;
	});
	/*segundos tabs*/
	jQuery(".tabs2").hide();
	jQuery("#tabs2 li:first").addClass("active").show();
	jQuery(".tabs2:first").show();
	jQuery("#tabs2 li").click(function() {
		jQuery(".boton").css("background-image","boton2.png");
		jQuery(".tabs2").hide();
		var activeTab2 = jQuery(this).find("a").attr("href");
		jQuery(activeTab2).fadeIn();
		if(width >= 980) { height(); }
		return false;
	});
	jQuery("#iframe_emisora").hide();
	jQuery("#player2").hide();
	jQuery("#emisoras_link li").click(function() {
		if(width >= 980) { height(); }
		jQuery("#emisoras li.active").removeClass("active");
		jQuery(this).addClass("active");
		var ahref = jQuery(this).attr("href");
		jQuery("#player2").hide();
		jQuery("#iframe_emisora").attr("src", ahref);
		jQuery("#iframe_emisora").show();
		return false;
	});
	/*terceros tabs*/
	jQuery(".tabs3").hide();
	jQuery("#tabs3 li:first").addClass("active").show();
	jQuery(".tabs3:first").show();
	jQuery("#tabs3 li").click(function() {
		jQuery(".boton").css("background-image","boton2.png");
		jQuery(".tabs3").hide();
		var activeTab3 = jQuery(this).find("a").attr("href");
		jQuery(activeTab3).fadeIn();
		if(width >= 980) { height(); }
		return false;
	});
	jQuery("#iframe_video").hide();
	jQuery("#player").hide();
	jQuery("#videos_link li").click(function() {
		if(width >= 980) { height(); }
		jQuery("#videos li.active").removeClass("active");
		jQuery(this).addClass("active");
		var ahref = jQuery(this).attr("href");
		jQuery("#player").hide();
		jQuery("#iframe_video").attr("src", ahref);
		jQuery("#iframe_video").show();
		return false;
	});
	var myURL = parseURL(location.href);
//	var url = myURL.protocol+"://"+myURL.host+"/"+myURL.segments+"/";
	var url = "http://01800iglesia.org/";
	jQuery("#videos_archivo li").click(function() {
		if(width >= 980) { height(); }
		jQuery("#videos li.active").removeClass("active");
		jQuery(this).addClass("active");
		var ahref =  url+'archivos_iglesias/audio_video/'+jQuery(this).attr("href");
		jQuery("#iframe_video").hide();
		jQuery("#player").show();
		return false;
	});
	$f("player", url+"Scripts/flowplayer/flowplayer-3.2.7-0.swf", {
		clip: { baseUrl: url+'archivos_iglesias/audio_video' }
	}).playlist("#videos_archivo", {loop:true});
	jQuery("#audio td").click(function() {
		if(width >= 980) { height(); }
		jQuery("#audio td.active").removeClass("active");
		jQuery(this).addClass("active");
		var ahref = url+'archivos_iglesias/audio_video/'+jQuery(this).attr("href");
		jwplayer().load(ahref);
		return false;
	});

  jQuery('.tabs2').corner("30");
	jQuery('.tabs3').corner("30");
	jQuery('#tab0').corner("top 20px");
	jQuery('#tab1').corner("top 20px");
	jQuery('#tab2').corner("top 20px");
	jQuery('#tab3').corner("top 20px");
	jQuery('#tab4').corner("top 20px");
	jQuery('#tab5').corner("top 20px");
	jQuery('#tab6').corner("top 20px");
	jQuery('.pasos_region3').corner("right");
	jQuery('.iglesia').corner("right");
	jQuery('#semaforo').corner("right");
	jQuery('.boton').corner("top", "cc:#000");
	jQuery("#inf_basica a[title]").tooltip({ position: "bottom center" });
	jQuery("#back img[title]").tooltip({ position: "bottom center" });
	jQuery("#tabs3 li a[title]").tooltip({ position: "bottom center" });
	jQuery("#tabs2 li a[title]").tooltip({ position: "bottom center" });
});

function AjustarAnchos() {
	var width = jQuery("#body_contenido").width() - jQuery("#mitad_izq2").width();
	width -= 16;
	jQuery("#mitad_der2").width(width);
}

function parseURL(url) {
    var a =  document.createElement('a');
    a.href = url;
    return {
        source: url,
        protocol: a.protocol.replace(':',''),
        host: a.hostname,
        port: a.port,
        query: a.search,
        params: (function(){
            var ret = {},
                seg = a.search.replace(/^\?/,'').split('&'),
                len = seg.length, i = 0, s;
            for (;i<len;i++) {
                if (!seg[i]) { continue; }
                s = seg[i].split('=');
                ret[s[0]] = s[1];
            }
            return ret;
        })(),
        file: (a.pathname.match(/\/([^\/?#]+)$/i) || [,''])[1],
        hash: a.hash.replace('#',''),
        path: a.pathname.replace(/^([^\/])/,'/$1'),
        relative: (a.href.match(/tps?:\/\/[^\/]+(.+)/) || [,''])[1],
        segments: //a.pathname.replace(/^\//,'')
		(function(){
            var seg = a.pathname.replace(/^\//,'');
				seg = seg.split('/');
			var len = seg.length, i = 1, s, ret;
			if(len > 1) {
	            for (i=0;i<len;i++) {
					s = seg[i].match(/\W/);
					if(s == null) {
						if(ret == undefined) { ret = seg[i]; }
						else { ret = ret + "/" + seg[i]; }
					}
            	}
				return ret;
			}
			else return seg;
        })()
    };
}

function alerta(msj){ alert(msj); }

function height(){
	jQuery("#mitad_der2").height("auto");
	var height_izq = jQuery("#mitad_izq2").height() + 25;
	var height_der = jQuery("#mitad_der2").height();
	//alert(height_izq+" "+height_der);
	if(height_izq < height_der || height_der >= 505) {
		//alert("der2");
		jQuery("#mitad_izq2").height(height_der);
		jQuery("#pasos").height(height_izq);
		jQuery("#body_contenido").height(height_der);
	}
	else if(height_izq > height_der && height_der <= 505) {
		//alert("izq");
		if(height_der < 505) height_der = 505;
		else height_der = "auto";
		//alert(height_der);
		jQuery("#mitad_izq2").height(height_der);
		jQuery("#mitad_der2").height(height_der);
		jQuery("#pasos").height(height_der);
		jQuery("#body_contenido").height(height_der);
	}
	jQuery(".mitad_der3").height("auto");
	/*var height_izq = jQuery("#mitad_izq2").height();
	var height_der = jQuery("#mitad_der2").height();*/
	//alert(height_izq+" "+height_der);
}

function mostrar_evento(id) {
	jQuery("#eventos li.active").removeClass("active");
	jQuery(id).addClass("active");
	var descripcion = jQuery("#"+id.id+" input[name='descripcion']").val();
	var fecha = jQuery("#"+id.id+" input[name='fecha']").val();
	var lugar = jQuery("#"+id.id+" input[name='lugar']").val();
	var invita = jQuery("#"+id.id+" input[name='invita']").val();
	var valor = jQuery("#"+id.id+" input[name='valor']").val();
	jQuery("#evt_descripcion").html(descripcion);
	jQuery("#evt_fecha").html(fecha);
	jQuery("#evt_lugar").html(lugar);
	jQuery("#evt_invita").html(invita);
	jQuery("#evt_valor").html("$ "+valor);
}

var lyteboxTheme = 'purple';
initLytebox();
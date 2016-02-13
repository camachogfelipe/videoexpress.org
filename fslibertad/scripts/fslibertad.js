// JavaScript Document
function mycarousel_initCallback(carousel)
{
    // Disable autoscrolling if the user clicks the prev or next button.
    carousel.buttonNext.bind('click', function() {
        carousel.startAuto(0);
    });

    carousel.buttonPrev.bind('click', function() {
        carousel.startAuto(0);
    });

    // Pause autoscrolling if the user moves with the cursor over the clip.
    carousel.clip.hover(function() {
        carousel.stopAuto();
    }, function() {
        carousel.startAuto();
    });
};

function mostrar(donde)
{
	$('#'+donde).fadeIn("slow");
}

function ocultar(quien)
{
	$('#'+quien).fadeOut("slow");
}

jQuery(document).ready(function() {
    jQuery('#mycarousel').jcarousel({
        auto: 3,
        wrap: 'circular',
		animation: 'slow',
        initCallback: mycarousel_initCallback
    });
	jQuery('#mycarousel2').jcarousel({
        auto: 3,
        wrap: 'circular',
		animation: 'slow',
		vertical: true,
		size: 5,
		scroll: 1,
        initCallback: mycarousel_initCallback
    });
	settings = {
          tl: { radius: 30 },
          tr: { radius: 30 },
          bl: { radius: 30 },
          br: { radius: 30 },
          antiAlias: true,
          autoPad: true,
          validTags: ["div", "table", "ul", "input", "textarea", "select", "li"]
      }
	  $("#menu_contenido").corner("round bottom 22px");
	  $("input").corner("round 22px");
	  $("textarea").corner("round 22px");
	  $("select").corner("round 22px");
	  $("#m1").hide();
	  $("#m2").hide();
	  $("#m3").hide();
	  $("#m4").hide();
	  $("#m5").hide();
	  $("#m6").hide();
	  
	  // hover in
	// initialize default menu width
	//initwidth = $("li").width();
	initwidth = 130;
	$("li.mp").hover( function(){
		// get the title inside a
		description = $(this).children("p").show();
		// start the animation
		$(this).stop().animate({width: "250"},{queue:false, duration:"fast" });
		// remove previously p
		//$(this).children("p").remove();
		// create p and attach title into it
		$(this).find("a").insertafter(description)
		// create animation to make it looks good
		$(this).children("p").stop().animate({ opacity: "show" }, {queue:false, duration:"fast"});
	// hover out
	},function(){
		// animate it to the basic width
		$(this).stop().animate({width: initwidth},{queue:false, duration:"fast"});
		// fade out animation
		$(this).children("p").hide();
		//$(this).children("p").stop().animate({ opacity: "0" }, {queue:false, duration:"fast"});
	});
    /*alturamaxima = $('#divizqindex_contenido').height();
    alturaMinima = 290;
    $('#divizqindex_contenido').css('height', alturaMinima);
	$("#click").click(function(event)
	{
		event.preventDefault();
		$("#divizqindex_contenido").slideDown(1000, function(){
			$("#divizqindex_contenido").css('height', alturamaxima);
		});
		$("#click").hide();
	});*/
	$('INPUT:first').focus();
});

(function($) {
	$(function() { //on DOM ready
		$("#scroller").simplyScroll({
			className: 'vert',
			horizontal: false,
			frameRate: 10,
			autoMode: 'loop'
		});
	});
})(jQuery);
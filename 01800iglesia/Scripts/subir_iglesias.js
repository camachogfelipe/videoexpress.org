$(document).ready(function(){
	$( "#iglesia_ppal" ).autocomplete({ source: "index3.php?op=39&tipo=2" });
	var v = $("#subir_iglesias2").validate( {
		success: function(label) { label.addClass("valid").text("") },
		rules: {
			iglesia_ppal: {
				required: true
			}
		},
		messages: {
			iglesia_ppal: {
				required: jQuery.format(" <span id='msj_error_texto'>Escriba el nombre de la iglesia principal</span>")
			}
		},
		submitHandler: function()
		{
			$('#subir_iglesias, #subir_iglesias2').submit();
			return false;
		}
	});
});
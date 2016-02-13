jQuery(document).ready(function() {
	$( "#accordion" ).accordion("enable");
});

function eliminar(opciones, div) {
	var entrar = confirm("¿Está seguro de eliminar el "+div+"?");
	if(entrar == true) {
		var pagina="index3.php?"+opciones;
		$("#loading").show();
		$.post(pagina, function(data){
			$("#loading").show();
			$("#res_"+div+"s").load($("#res_"+div+"s").html(data));
			$("#loading").hide();
		});
		$("#loading").hide();
	}
}
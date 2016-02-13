jQuery(document).ready(function() {
	jQuery("#loading").hide();
	jQuery("#link img[title]").tooltip({ position: "bottom center" });
});
function eliminar(id) {
	var entrar = confirm("¿Está seguro de eliminar la iglesia, se borraran todos los datos: eventos, grupos, etc., incluso las sugerencias de actualización?");
	if(entrar == true)
	{
		var pag = jQuery("#pag").val();
		var uri = "op=14&id="+id+"&pag="+pag;
		recargar('index3',uri,'#panel_derecho_menu');
	}
}
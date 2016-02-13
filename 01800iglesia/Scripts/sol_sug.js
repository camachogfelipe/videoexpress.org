initLytebox();

function actualizar(args) {
	recargar('index3','op='+args,'#panel_derecho_menu');
}

function eliminar(id, op) {
	var entrar = confirm("¿Está seguro de eliminar la solicitud/sugerencia No. "+id+"?");
	if(entrar == true) {
		var uri = "op=32&id="+id+"&op2="+op;
		recargar('index3',uri,'#panel_derecho_menu');
	}
}

jQuery(document).ready(function() {
	jQuery("#link img[title]").tooltip({ position: "bottom center" });
});
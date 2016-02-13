initLytebox();

function actualizar(){ recargar('index3','op=10','#panel_derecho_menu'); }

function eliminar_pub(id) {
	var entrar = confirm("¿Está seguro de eliminar el aviso No "+id+"?");
	if(entrar == true) {
		recargar('index3','op=10&opp=del&idp='+id,'#panel_derecho_menu');
	}
}
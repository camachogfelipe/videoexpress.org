$(document).ready(function(){ jQuery("#links img[title]").tooltip({ position: "bottom center" }); });

function eliminarm(id, avid, tipo) {
	var entrar = confirm("¿Está seguro de eliminar esta multimedia de la iglesia?");
	if(entrar == true) {
		opciones = "op=15&id="+id+"&evt_id="+avid+"&e="+tipo;
		var pagina="index3.php?"+opciones;
		$("#loading").show();
		//alert(pagina);
		$.post(pagina, function(data){
			$("#loading").show();
			$("#res_multimedia").load($("#res_multimedia").html(data));
			$("#loading").hide();
			//eval(x);
		});
		$("#loading").hide();
	}
}
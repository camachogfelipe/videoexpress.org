$(document).ready(function(){
	$("#div_archivo").hide();
	$("#video").hide();
	$("#link_video").hide();
	$("#tipo_archivo").change(function(){
		$("#div_archivo").hide();
		if($(this).val() == "audio") {
			$("#video").hide();
			$("#div_archivo").show();
		}
		else { $("#video").show(); }
	});
	$("#tipo_video").change(function(){
		$("#link_video").hide();
		if($(this).val() == "link") {
			$("#link_video").show();
		}
		else { $("#div_archivo").show(); }
	});
	$('#subir').submit(function(){
		$("#error, #info, #alerta").hide();
		bUploaded.start('fileprogress');
	});
});
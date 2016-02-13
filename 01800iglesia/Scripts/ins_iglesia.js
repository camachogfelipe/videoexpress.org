$(document).ready(function() {
	$( "#tabs" ).tabs({ selected: 0 });
	$( "#nombre" ).autocomplete({ source: "index3.php?op=39&tipo=1" });
	$( "#iglesia_ppal" ).autocomplete({ source: "index3.php?op=39&tipo=2" });
	$( "#replegal" ).autocomplete({ source: "index3.php?op=39&tipo=3" });
	$("#igl_ppal").hide();
});
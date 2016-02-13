<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="jquery, ajax, php, recargar, html, tutorial, demo" />
<meta name="description" content="Demo para recargar elementos sin html sin recargar la página web usando AJAX jquery" />
<title>Actualizar</title>
<script language="javascript" src="../Scripts/jquery-1.4.4.min.js"></script>
<script language="javascript">
function recargar(){	
	var variable_post="Mi texto recargado";
	$.post("miscript.php", { variable: variable_post }, function(data){
	$("#recargado").html(data);
	});			
}
</script>
<style type="text/css">
<!--
body,td,th {
	color: #333333;
	font-family:Arial, Helvetica, sans-serif;
	font-size:11px;
}
#recargado {
	width:400px;
	border:1px solid #CCCCCC;
	margin:auto;
	padding:10px;
}
-->
</style></head>
<body>
<div id="recargado">Mi texto sin recargar</div>

<p align="center">
	<a href="#" onclick="javascript:recargar();">recargar</a><br />
    <a href="http://www.miguelmanchego.com/2009/actualizar-un-elemento-sin-recargar-con-jquery/">Regresar al blog</a>
</p>    
</body>
</html>
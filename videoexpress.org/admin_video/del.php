<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="adminvideo.css" rel="stylesheet" type="text/css">
<title>Actualizar base de datos</title>
</head>

<body>
<?php
ob_start("ob_gzhandler");
include("../catalogo/include/funciones_globales.php");
include("funciones.php");
extract($_REQUEST);
if(isset($_REQUEST['c']))
{
	if($c == 1) borrar($op, $id);
	/*echo '<script languaje="Javascript">location.href="principal.php?op='.$op.'&op_form='.$op_form.'"</script>';*/
}
else
{
?>
<div id="pregunta">&iquest;Est&aacute; seguro de eliminar los datos
	<?php
		if($op == "wl") echo "del link No. $id ($n)";
		elseif($op == "pr") echo "del Programa de Radio No. $id ($n)";
		elseif($op == "vyg") echo "del Plegable de Videos y Garabatos No. $id ($n)";
	?>?
	<p>
    <form action="" method="post" enctype="multipart/form-data" id="del" name="del">
	<input type="hidden" id="id" value="<?php echo $id ?>" />
	<input type="hidden" id="op" value="<?php echo $op ?>" />
	<input type="hidden" id="op_form" value="<?php echo $op_form ?>" />
	<input type="hidden" id="c" value="1" />
    <table width="80" height="45" border="0" cellspacing="10" cellpadding="0" align="center">
	  <tr>
	    <td id="pag" align="center"><a href="javascript:document.del.submit()">si</a></td>
    	<td id="pag" align="center"><a href="javascript:history.back(1)">no</a></td>
	  </tr>
	</table>
    </form>
	</p>
</div>
<?php } ob_end_flush(); ?>
</body>
</html>

<?php session_start(); ?>
<link href="../estilo.css" rel="stylesheet" type="text/css">
<?php
$id = $_REQUEST['id'];
$nombre = $_REQUEST['nombre'];
$tabla = $_REQUEST['tabla'];
$pagina = $_REQUEST['pagina'];
$borrar = $_REQUEST['borrar'];
$pag = $_REQUEST['pag'];
$pag++;
$orden = $_REQUEST['orden'];
$tipo_id = "id";

// check session variable
if (isset($_SESSION['user_admin']))
{
	if($borrar == NULL)
	{
		?>
   <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
	<tr>
     <td align="center" style="color: #000">&iquest;Esta seguro de Borrar la pelicula <span style="color:#06C; font-style:italic"><?php echo $nombre ?></span>?</td>
	</tr>
  	<tr>
	 <td align="center" bgcolor="#CCFF99"><span id="menu_admon2"><a href="<?php echo "borrar.php?id=$id&tabla=$tabla&pagina=$pagina" ?>&borrar=true">Ok</a> <a href="<?php echo "../".$pagina ?>.php?orden=<?php echo $orden ?>&pag=<?php echo $pag ?>">Cancelar</a></span>
     </td>
	</tr>
   </table>
        <?php
	}
	elseif($borrar == true)
	{
		echo "Borrando";
		include ("../../include/funciones_globales.php");
		$conecta = conecta_bd("videoexpress");
  		$query = del_datos_tabla($tabla,"$tipo_id='$id'");
  
		//$query = "DELETE FROM $tabla WHERE $tipo_id='$id'";
		//mysql_query($query) or die(mysql_error());
		echo "Borrado";
		echo "<script languaje='Javascript'>location.href='../$pagina.php'</script>";
	}
}
else
{
	include ('../index.php');
}
?>
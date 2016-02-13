<?php
session_start();
?>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="estilo_admin.css" rel="stylesheet" type="text/css" />
<?php
//id=1&tabla=catalogo&pagina=peliculas&nombre=A%20las%20puertas%20del%20ARMAGEDON&orden=&pag=1
$id = $_REQUEST['id']; //ok
$tabla = $_REQUEST['tabla']; //ok
$nom_var = "id"; //ok
$pagina = $_REQUEST['pagina']; //ok
$borrar = $_REQUEST['borrar'];

// check session variable
if (isset($_SESSION['user_admin']))
{
	if($borrar == NULL)
	{
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
	<tr>
     <td align="center">&iquest;Esta seguro de continuar?</td>
	</tr>
  	<tr>
	 <td align="center"><a id="flechas" href="<?php echo "borrar.php?id=$id&tabla=$tabla&pagina=$pagina" ?>&borrar=true">Ok</a> <a id="flechas" href="<?php echo $pagina ?>.php">Cancelar</a>
     </td>
	</tr>
</table>
<?php
	}	
	elseif($borrar == true)
	{
		include('../../include/funciones_globales.php');
		conecta_bd("videoexpress");

		$query = "DELETE FROM $tabla WHERE $nom_var='$id'";
		mysql_query($query) or die(mysql_error());
		echo "<script languaje='Javascript'>location.href='$pagina.php'</script>";
	}
}
else
{
	include ('index.php');
}
?>
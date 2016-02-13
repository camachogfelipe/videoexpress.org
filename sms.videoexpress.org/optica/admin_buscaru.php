<?php
if($_SESSION["perfil"] != 1)
{
	die("<h1>No esta autorizado para ver esta informaci&oacute;n</h1>");
}
/*
*	$PSN = new DBbase_Sql;
*/
// Objeto de Base de Datos
$PSN1 = new DBbase_Sql;
$PSN2 = new DBbase_Sql;
// Array que nos servira para ir llevando cuenta de los requerimientos.
if(isset($_GET["del"]))
{
	$sql = 'delete from usuario where id = "'.$_GET["del"].'" and tipo != 4 and tipo != 5 and tipo != 1';
	$ultimoQuery = $PSN1->query($sql);
	$varExitoDEL = 1;
}

// Array que nos servira para ir llevando cuenta de los requerimientos.
/*
*	TRAEMOS LOS colegioS.
*/
$sql = "SELECT usuario.*, categorias.descripcion, colegio.nombre as nomcolegio ";
$sql.=" FROM usuario ";
$sql.=" LEFT JOIN categorias ";
$sql.=" ON categorias.id = usuario.tipo";
$sql.=" LEFT JOIN usuario as colegio ON colegio.id = usuario.idColegio";
//
$sql.=" WHERE usuario.id != 2 ORDER BY usuario.nombre ASC";

$PSN1->query($sql);
$numero=$PSN1->num_rows();
?>
<script language="javascript">
function borrarRegistro(registro){
		if(confirm("Esta accion BORRARA el USUARIO de el sistema, ¿esta seguro que desea continuar?"))
		{
			if(confirm("Recuerde que si el USUARIO tiene Ordenes de Servicio activas esto puede causar perdida de integridad en los datos, esta seguro que desea eliminar este USUARIO?"))
			{
				window.location.href = "index.php?doc=admin_buscaru&del="+registro;
			}
		}
}
function init(){
	<?
	if($varExitoDEL == 1)
	{
		?>alert("Se ha BORRADO correctamente el USUARIO, espere mientras es dirigido de nuevo a la busqueda.");
		window.location.href = "index.php?doc=admin_buscaru";<?
	}
	?>
}
window.onload = function(){
	init();
}
</script>
<table width="800px" border="0" cellspacing="0" cellpadding="2"  align="center">
<thead>
	<tr> 
	<th colspan="7">.ACCESOS.</th>
	</tr>
	<tr> 
		<th>Id</th>
		<th>Nombre</th>
		<th>Telefono</th>
		<th>E-Mail</th>
		<th>Tipo</th>
		<th>Opciones</th>
	</tr>
</thead>
<tbody>
<?
if($numero > 0)
{
	$contador = 0;
	while($PSN1->next_record())
	{
		//Solo si no se ha modificado ya el formulario.
		$id = $PSN1->f('id');
		$nomcolegio = $PSN1->f('nomcolegio');
		$tipodesc = $PSN1->f('descripcion');
		$nombre = $PSN1->f('nombre');
		$razon = $PSN1->f('razon');
		$identificacion = $PSN1->f('identificacion');
		$tipoIdentificacion = $PSN1->f('tipoIdentificacion');
		$tipoContribuyente = $PSN1->f('tipoContribuyente');
		$regimenDian = $PSN1->f('regimenDian');
		$categoriaDian = $PSN1->f('categoriaDian');
		$clasificacionIndustria = $PSN1->f('clasificacionIndustria');
		$representanteLegal = $PSN1->f('representanteLegal');
		$pais = $PSN1->f('pais');
		$departamento = $PSN1->f('departamento');
		$ciudad = $PSN1->f('ciudad');
		$direccion = $PSN1->f('direccion');
		$telefono1 = $PSN1->f('telefono1');
		$telefono2 = $PSN1->f('telefono2');
		$celular = $PSN1->f('celular');
		$email = $PSN1->f('email');
		$url = $PSN1->f('url');
		$observaciones = $PSN1->f('observaciones');
		$login = $PSN1->f('login');
		$password = $PSN1->f('password');
		$prefijo = $PSN1->f('prefijo');
		$consecutivo = $PSN1->f('consecutivo');

		?><tr <? if($contador%2==0){ ?>bgcolor="#EEEEEE"<? } ?>>
		<td><a href="index.php?doc=admin_usu4&id=<?=$id; ?>"><?=str_pad($id, 6, "0", STR_PAD_LEFT); ?></a></td>
		<td><a href="index.php?doc=admin_usu4&id=<?=$id; ?>"><?=$nombre; ?></a></td>
		<td><?=$telefono1; ?></td>
		<td><?=$email; ?></td>
		<td><?=$tipodesc; ?></td>
		<td>[<a href="javascript:borrarRegistro('<?=$id; ?>');void(0);">BORRAR</a>]</td>
		</tr>
		<?
		$contador++;
	}
}
?>
</tbody>
</table>
<?php
if($_SESSION["superusuario"] != 1)
{
	die("<h1>No esta autorizado a visualizar esta opcion.</h1>");
}
if(isset($_GET["idcat"]))
{
	$varMiIdCat = $_GET["idcat"];
}
else
{
	die("Debe especificarse un ID de categoria.");
}

$varMiId = 0;
if(isset($_GET["id"]) && $_GET["id"] > 0)
{
	$varMiId = $_GET["id"];
}
else if(isset($_POST["id"]) && $_POST["id"] > 0)
{
	$varMiId = $_POST["id"];
}

// Objeto de Base de Datos
$PSN1 = new DBbase_Sql;

if(isset($_POST["funcion"]))
{
	if($_POST["funcion"] == "insertarCategoria" && trim(htmlspecialchars($_POST["categoria"])) != "")
	{
		if($varMiId == 0)
		{
			$sql = 'insert into categorias (idSec, descripcion, detalle) ';
			$sql .= 'values ('.$varMiIdCat.', "'.htmlspecialchars($_POST["categoria"]).'", "'.htmlspecialchars($_POST["categoria"]).'")';
		}
		else
		{
			$sql = 'update categorias set descripcion = "'.htmlspecialchars($_POST["categoria"]).'", detalle = "'.htmlspecialchars($_POST["categoria"]).'" where id = '.$varMiId;
		}

		$ultimoQuery = $PSN1->query($sql);		
		$varExito = 1;
	}
}

// Array que nos servira para ir llevando cuenta de los requerimientos.
/*
*	TRAEMOS LAS CATEGORIAS
*/
$sql = "SELECT * ";
$sql.=" FROM categorias  ";
$sql.=" WHERE idSec = ".$varMiIdCat." ORDER BY descripcion ASC";

$PSN1->query($sql);
$numero=$PSN1->num_rows();
?>
<table border="0" cellspacing="0" cellpadding="2"  align="center">
<tr>
<td><table width="400px" border="0" cellspacing="0" cellpadding="2"  align="center">
<thead>
	<tr> 
	<th colspan="6">.CATEGORIAS DE "<?
	switch($varMiIdCat)
	{
		case 1:
			echo "PERFILES";
			break;
		case 2:
			echo "TIPOS DE IDENTIFICACION";
			break;
		case 3:
			echo "TIPOS DE SERVICIO";
			break;
		case 4:
			echo "TIPOS DE REQUERIMIENTO";
			break;
		case 5:
			echo "ESTADOS DE LA ORDEN";
			break;
		case 6:
			echo "TIPO DE CONTRIBUYENTE";
			break;
		case 7:
			echo "REGIMEN DIAN";
			break;
		case 8:
			echo "CLASIFICACION DIAN";
			break;
		case 9:
			echo "TIPOS DE INDUSTRIA";
			break;
		case 10:
			echo "TIPOS DE SECTOR";
			break;
		case 11:
			echo "SEXO";
			break;
		default:
			echo "NADEDAD";
			break;
	}
	?>".</th>
	</tr>
	<tr> 
		<th>Id</th>
		<th>Descripcion</th>
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
		$descripcion = $PSN1->f('descripcion');
		?><tr <? if($contador%2==0){ ?>bgcolor="#EEEEEE"<? } ?>>
		<td><a href="index.php?doc=admin_buscarcat&idcat=<?=$varMiIdCat; ?>&id=<?=$id; ?>"><?=str_pad($id, 6, "0", STR_PAD_LEFT); ?></a></td>
		<td><a href="index.php?doc=admin_buscarcat&idcat=<?=$varMiIdCat; ?>&id=<?=$id; ?>"><?=$descripcion; ?></a></td>
		</tr>
		<?
		$contador++;
	}
}

/*
*	TRAEMOS LAS CATEGORIAS
*/
$sql = "SELECT * ";
$sql.=" FROM categorias  ";
$sql.=" WHERE id = ".$varMiId." ORDER BY descripcion ASC";

$PSN1->query($sql);
$numero=$PSN1->num_rows();

if($numero > 0)
{
	$contador = 0;
	$PSN1->next_record();
}
?>
</tbody>
</table></td>
<td><form method="post" enctype="multipart/form-data" name="form1" id="form1" action="index.php?doc=admin_buscarcat&idcat=<?=$varMiIdCat; ?>&id=<?=$varMiId; ?>">
<table width="100%" border="0" cellspacing="0" cellpadding="2"  align="center">
<thead>
	<tr> 
	<th>.INSERTAR DATO.</th>
	</tr>
</thead>
<tbody>
	<tr> 
		<td><input type="text" name="categoria" id="categoria" value="<?=$PSN1->f('descripcion'); ?>" /><input type="button" name="button" onclick="generarForm()" value="<?
		if($varMiId > 0)
		{
			echo "Actualizar ";
		}
		else
		{
			echo "Insertar ";
		}?>Dato" style="background-color:#FFFFFF;border-color:#88BA3D;color:#006600;font-weight:bold"><BR /><BR />
		<?
		if($varMiId > 0)
		{
			?><a href="index.php?doc=admin_buscarcat&idcat=<?=$varMiIdCat; ?>" style="font-size:12px;text-decoration:underline">NUEVO DATO</a><?
		}
		?></td>
	</tr>
	</tbody>
</table>
<input type="hidden" name="funcion" id="funcion" value="" />
</form><script language="javascript">
	function generarForm(){
		if(confirm("Esta accion insertara un dato a la categoria actual, Esta seguro que desea continuar?"))
		{
			if(document.getElementById('categoria').value != "")
			{
				document.getElementById('funcion').value = "insertarCategoria";
				document.getElementById('form1').submit();
			}
			else
			{
				alert("Debe escribir algo.");
			}
		}
	}

	function init(){
		document.getElementById('form1').onsubmit = function(){
				return false;
		}
		<?
		if($varExito == 1)
		{
			?>alert("Operacion exitosa!");<?
		}
		?>
	}

	function regresar()
	{
		window.location.href = "index.php?doc=admin_buscarcatm";
	}

	window.onload = function(){
		init();
	}
	</script></td></tr></table>
	
<center><input type="button" name="button" onclick="regresar()" value="Regresar" style="background-color:#FFFFFF;border-color:#88BA3D;color:#006600;font-weight:bold"></center>
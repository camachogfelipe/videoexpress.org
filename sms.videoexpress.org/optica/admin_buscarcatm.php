<?php
if($_SESSION["superusuario"] != 1)
{
	die("<h1>No esta autorizado a visualizar esta opcion.</h1>");
}
?>
<table width="400px" border="0" cellspacing="0" cellpadding="2"  align="center">
<thead>
	<tr> 
	<th colspan="6">.CATEGORIAS DISPONIBLES</th>
	</tr>
	<tr> 
		<th>Descripcion</th>
	</tr>
</thead>
<tbody>
<?
	$contador = 1;
	while($contador < 14)
	{
		//Solo si no se ha modificado ya el formulario.
		$id = $contador+1;
		?><tr <? if($contador%2==0){ ?>bgcolor="#EEEEEE"<? } ?>>
		<td><a href="index.php?doc=admin_buscarcat&idcat=<?=$id; ?>"><?
		
		switch($id)
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
		case 14:
			echo "TIPO DE TITULO";
			break;
		default:
			//echo "NADEDAD";
			break;
	}
	?></a></td>
		</tr>
		<?
		$contador++;
	}
?>
</tbody>
</table>
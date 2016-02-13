<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="../estilo.css" rel="stylesheet" type="text/css">
<title>Editar usuario Liceo</title>
</head>

<body>
<?php
$id = $_GET['id'];

include("conexion.php");
$query = mysql_query("SELECT * FROM profileusuario WHERE codigo='$id'"); echo "\n";
while($row = mysql_fetch_object($query))
{
	$nombre = $row->nombre;
	$apellidos =$row->apellidos;
	$correo = $row->correo;
	$ENB = $row->ENB;
	$VTB = $row->VTB;
	$EB = $row->EB;
	$IPLE = $row->IPLE;
	$LPE = $row->LPE;
	$EPE = $row->EPE;
	$SFIG = $row->SFIG;
	$VFIG = $row->VFIG;
	$EFIG = $row->EFIG;
	$EMUB = $row->EMUB;
	$SFP = $row->SFP;
	$MU = $row->MU;
}
?>
<form action="usuarios.php" method="get">
	<input name="id" type="hidden" value="<?php echo $id ?>" />
    <input name="op" type="hidden" value="2" />
    <input name="e" type="hidden" value="1" />
	<table cellpadding="5" cellspacing="0" border="0" width="70%" align="center" id="tmu">
		<tr align="left" style="background-color:#EEE">
			<td width="42%">Nombre</td>
			<td width="58%"><input name="nombre" type="text" size="50" value="<?php echo $nombre ?>" /></td>
		</tr>
		<tr>
			<td>Apellidos</td>
			<td><input name="nombre" type="text" size="50" value="<?php echo $apellidos ?>" /></td>
		</tr>
		<tr style="background-color:#EEE">
			<td>Correo electr&oacute;nico</td>
			<td><input name="nombre" type="text" size="50" value="<?php echo $correo ?>" /></td>
		</tr>
		<tr>
			<td>Editar un nuevo bolet&iacute;n</td>
			<td>
                <input name="ENB" type="radio" value="y" <?php if($ENB == "Y") echo ' checked="checked"' ?> />Y
				<input name="ENB" type="radio" value="N" <?php if($ENB == "N") echo ' checked="checked"' ?> />N
			</td>
		</tr>
		<tr style="background-color:#EEE">
			<td>Ver todos los boletines</td>
			<td>
               <input name="VTB" type="radio" value="Y" <?php if($VTB == "Y") echo ' checked="checked"' ?> />Y
				<input name="VTB" type="radio" value="N" <?php if($VTB == "N") echo ' checked="checked"' ?> />N
			</td>
		</tr>
		<tr>
			<td>Eliminar bolet&iacute;n</td>
			<td>
				<input name="EB" type="radio" value="Y" <?php if($EB == "Y") echo ' checked="checked"' ?> />Y
				<input name="EB" type="radio" value="N" <?php if($EB == "N") echo ' checked="checked"' ?> />N
		</td>
		</tr>
		<tr style="background-color:#EEE">
			<td>Ingresar email de padre a la lista</td>
			<td>
				<input name="IPLE" type="radio" value="Y"<?php if($IPLE == "Y") echo ' checked="checked"' ?> />Y
				<input name="IPLE" type="radio" value="N"<?php if($IPLE == "N") echo ' checked="checked"' ?> />N
			</td>
		</tr>
		<tr>
			<td>Ver la lista de emails de los padres</td>
			<td>
                <input name="LPE" type="radio" value="Y"<?php if($LPE == "Y") echo ' checked="checked"' ?> />Y
				<input name="LPE" type="radio" value="N"<?php if($LPE == "N") echo ' checked="checked"' ?> />N
			</td>
		</tr>
		<tr style="background-color:#EEE">
			<td>Eliminar un email de los padres de la lista</td>
			<td>
				<input name="EPE" type="radio" value="Y"<?php if($EPE == "Y") echo ' checked="checked"' ?> />Y
				<input name="EPE" type="radio" value="N"<?php if($EPE == "N") echo ' checked="checked"' ?> />N
			</td>
		</tr>
		<tr>
		<td>Subir ficheros de informaci&oacute;n general</td>
			<td>
				<input name="SFIG" type="radio" value="Y"<?php if($SFIG == "Y") echo 'Y checked="checked"' ?> />Y
				<input name="SFIG" type="radio" value="N"<?php if($SFIG == "N") echo 'Y checked="checked"' ?> />N
			</td>
		</tr>
		<tr style="background-color:#EEE">
			<td>Ver ficheros de informaci&oacute;n general</td>
			<td>
				<input name="VFIG" type="radio" value="Y"<?php if($VFIG == "Y") echo ' checked="checked"' ?> />Y
				<input name="VFIG" type="radio" value="N"<?php if($VFIG == "N") echo ' checked="checked"' ?> />N
			</td>
		</tr>
		<tr>
		<td>Eliminar un fichero de informaci&oacute;n general</td>
			<td>
				<input name="EFIG" type="radio" value="Y"<?php if($EFIG == "Y") echo ' checked="checked"' ?> />Y
				<input name="EFIG" type="radio" value="N"<?php if($EFIG == "N") echo ' checked="checked"' ?> />N
			</td>
		</tr>
		<tr style="background-color:#EEE">
			<td>Enviar por mail el &uacute;ltimo bolet&iacute;n</td>
			<td>
				<input name="EMUB" type="radio" value="Y"<?php if($EMUB == "Y") echo ' checked="checked"' ?> />Y
				<input name="EMUB" type="radio" value="N"<?php if($EMUB == "N") echo ' checked="checked"' ?> />N
			</td>
		</tr>
		<tr>
			<td>Subir tareas de alumnos</td>
			<td>
				<input name="SFP" type="radio" value="Y"<?php if($SFP == "Y") echo ' checked="checked"' ?> />Y
				<input name="SFP" type="radio" value="N"<?php if($SFP == "N") echo ' checked="checked"' ?> />N
			</td>
		</tr>
		<tr style="background-color:#EEE">
			<td>Crear, editar y manejar usuarios</td>
			<td>
				<input name="MU" type="radio" value="Y"<?php if($MU == "Y") echo ' checked="checked"' ?> />Y
				<input name="MU" type="radio" value="N"<?php if($MU == "N") echo ' checked="checked"' ?> />N
			</td>
		</tr>
		<tr>
			<td colspan="2" align="right"><input name="submit" type="submit" value="Actualizar" /></td>
		</tr>
	</table>
</form>
</body>
</html>
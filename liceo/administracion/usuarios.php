<?php
session_start();

if (isset($_SESSION['valid_user']) and $_SESSION['permisos'][11] == "Y")
{
	echo '<html>'; echo "\n";
	echo '<head>'; echo "\n";
	echo '<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />'; echo "\n";
	echo '<link href="../estilo.css" rel="stylesheet" type="text/css">'; echo "\n";
	echo '</head>'; echo "\n";
	echo '<body>'; echo "\n";
	$op = $_GET['op'];

	switch($op)
	{
		case 1 : listarusers();
				 break;
		case 2 : $id = $_GET['id'];
				 $e = $_GET['e'];
				 editarusers($id, $e);
				 break;
		case 3 : $id = $_GET['id'];
				 $e = $_GET['e'];
				 eliminarusers($id, $e);
				 break;
		case 4 : $id = $_GET['id'];
				 $act = $_GET['act'];
				 activarusers($id, $act);
				 break;
		case 5 : $c = $_GET['c'];
				 crearusers($c);
				 break;
		default: listarusers();
				 break;
	}
	echo '</body>'; echo "\n";
	echo '</html>'; echo "\n";
}
else
{
	include ('index.php');
}

function listarusers()
{
	include("conexion.php");
	$query = mysql_query("SELECT codigo, usuario, correo, activo FROM cat_usr");

	$estilo_celda = 'align="center" valign="top" style="text-align:justify; font-weight: bold"';

	echo "<table border='1px' width='100%' style='border: 1px solid #CCC;' id='listado_contenido'><tr class='encabezado_tabla'>\n";
	echo "<td width='30px' $estilo_celda>No</td>\n";
	echo "<td $estilo_celda>Usuario</td>\n";
	echo "<td $estilo_celda>Correo electr&oacute;nico</td>\n";
	echo "<td $estilo_celda>Activo</td>\n";
	echo "<td $estilo_celda width='100px'>Acci&oacute;n</td>\n";
	echo "</tr>\n";

	$colorfila = 0;

	while($row=mysql_fetch_object($query))
	{
		if ($colorfila==0)
		{
			$color = "#FFFF99";
			$color1 = "#000";
		   	$colorfila = 1; 
		}
		else
		{
			$color = "#FFF";
			$color1 = "#000";
			$colorfila = 0;
		}
		
		$estilo_celda = "valign='top' style='text-align:justify; background-color:$color; color:$color1'";

		echo "<tr>\n";
		echo "<td $estilo_celda>".$row->codigo."</td>\n";
		echo "<td $estilo_celda>".$row->usuario."</td>\n";
		echo "<td $estilo_celda>".$row->correo."</td>\n";
		echo "<td $estilo_celda>".$row->activo."</td>\n";
		echo "<td $estilo_celda>\n";
		if($_SESSION['permisos'][6] == "Y")
			echo '<a href="usuarios.php?id='.$row->codigo.'&op=2&e=0">Editar</a>';
		if($_SESSION['permisos'][8] == "Y")
			echo "&nbsp;<a href='usuarios.php?id=".$row->codigo."&op=3'>Eliminar</a>";
		if($_SESSION['permisos'][8] == "Y")
			echo "&nbsp;<a href='usuarios.php?id=".$row->codigo."&op=4&act=".$row->activo."'>Activar/desactivar</a>";
		echo "</td>\n</tr>\n";
	}
	echo "</table>\n";
	echo '<center style="margin-top: 15px"><a href="usuarios.php?op=5&c=0">Crear un usuario nuevo</a></center>';
}

function editarusers($id, $e)
{
	if($id != NULL and $e == 0 and $_SESSION['tipo_usuario'] == 2)
	{
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
		} ?>
<form action="usuarios.php" method="get">
	<input name="id" type="hidden" value="<?php echo $id ?>" />
    <input name="op" type="hidden" value="2" />
    <input name="e" type="hidden" value="1" />
	<table cellpadding="5" cellspacing="0" border="0" width="80%" align="center" id="tmu">
		<tr align="left" style="background-color:#EEE">
			<td width="30%">Nombre</td>
			<td width="40%"><input name="nombre" type="text" size="40" value="<?php echo $nombre ?>" /></td>
            <td width="30%" id="explicacion">Puede ser el nombre de la persona.<br />
Debe ser escrito en minusculas.</td>
		</tr>
		<tr>
			<td>Apellidos</td>
			<td><input name="apellidos" type="text" size="50" value="<?php echo $apellidos ?>" /></td>
            <td id="explicacion">Apellidos de la persona a crear</td>
		</tr>
		<tr style="background-color:#EEE">
			<td>Correo electr&oacute;nico</td>
			<td><input name="correo" type="text" size="50" value="<?php echo $correo ?>" /></td>
            <td id="explicacion">El correo electr&oacute;nico debe ser el institucional</td>
		</tr>
		<tr>
			<td>Editar un nuevo bolet&iacute;n</td>
			<td>
                <input name="ENB" type="radio" value="Y" <?php if($ENB == "Y") echo ' checked="checked"' ?> />Y
				<input name="ENB" type="radio" value="N" <?php if($ENB == "N") echo ' checked="checked"' ?> />N
			</td>
			<td id="explicacion">Permite editar nuevos boletines que ser&aacute; publicados en la p&aacute;gina web, y adem&aacute;s enviados a los padres si el permiso es concedido.</td>
        </tr>
		<tr style="background-color:#EEE">
			<td>Ver todos los boletines</td>
			<td>
               <input name="VTB" type="radio" value="Y" <?php if($VTB == "Y") echo ' checked="checked"' ?> />Y
				<input name="VTB" type="radio" value="N" <?php if($VTB == "N") echo ' checked="checked"' ?> />N
			</td>
			<td id="explicacion">Acceso a una vista de los boletines p&uacute;blicados en la p&aacute;gina web.</td>
        </tr>
		<tr>
			<td>Eliminar bolet&iacute;n</td>
			<td>
				<input name="EB" type="radio" value="Y" <?php if($EB == "Y") echo ' checked="checked"' ?> />Y
				<input name="EB" type="radio" value="N" <?php if($EB == "N") echo ' checked="checked"' ?> />N
			</td>
			<td id="explicacion">Permite eliminar boletines.</td>
        </tr>
		<tr style="background-color:#EEE">
			<td>Ingresar email de padre a la lista</td>
			<td>
				<input name="IPLE" type="radio" value="Y"<?php if($IPLE == "Y") echo ' checked="checked"' ?> />Y
				<input name="IPLE" type="radio" value="N"<?php if($IPLE == "N") echo ' checked="checked"' ?> />N
			</td>
			<td id="explicacion">Es el acceso a ingresar los correos electronicos de los padres a quienes se les desea enviar boletines.</td>
        </tr>
		<tr>
			<td>Ver la lista de emails de los padres</td>
			<td>
                <input name="LPE" type="radio" value="Y"<?php if($LPE == "Y") echo ' checked="checked"' ?> />Y
				<input name="LPE" type="radio" value="N"<?php if($LPE == "N") echo ' checked="checked"' ?> />N
			</td>
			<td id="explicacion">Ver la lista de los padres inscritos en el boletine del colegio.</td>
        </tr>
		<tr style="background-color:#EEE">
			<td>Eliminar un email de los padres de la lista</td>
			<td>
				<input name="EPE" type="radio" value="Y"<?php if($EPE == "Y") echo ' checked="checked"' ?> />Y
				<input name="EPE" type="radio" value="N"<?php if($EPE == "N") echo ' checked="checked"' ?> />N
			</td>
			<td id="explicacion">Eliminar de la lista de padfres inscritos al boletin.</td>
        </tr>
		<tr>
		<td>Subir ficheros de informaci&oacute;n general</td>
			<td>
				<input name="SFIG" type="radio" value="Y"<?php if($SFIG == "Y") echo 'Y checked="checked"' ?> />Y
				<input name="SFIG" type="radio" value="N"<?php if($SFIG == "N") echo 'Y checked="checked"' ?> />N
			</td>
			<td id="explicacion">Permite subir archivos en pdf para que sean publicados en la secci&oacute;n de informaci&oacute;n general.</td>
        </tr>
		<tr style="background-color:#EEE">
			<td>Ver ficheros de informaci&oacute;n general</td>
			<td>
				<input name="VFIG" type="radio" value="Y"<?php if($VFIG == "Y") echo ' checked="checked"' ?> />Y
				<input name="VFIG" type="radio" value="N"<?php if($VFIG == "N") echo ' checked="checked"' ?> />N
			</td>
			<td id="explicacion">Le permite ver los ficheros de informaci&oacute;n general actualmente publicados.</td>
        </tr>
		<tr>
		<td>Eliminar un fichero de informaci&oacute;n general</td>
			<td>
				<input name="EFIG" type="radio" value="Y"<?php if($EFIG == "Y") echo ' checked="checked"' ?> />Y
				<input name="EFIG" type="radio" value="N"<?php if($EFIG == "N") echo ' checked="checked"' ?> />N
			</td>
			<td id="explicacion">Elimiar archivos de la lista de informaci&oacute;n general.</td>
        </tr>
		<tr style="background-color:#EEE">
			<td>Enviar por mail el &uacute;ltimo bolet&iacute;n</td>
			<td>
				<input name="EMUB" type="radio" value="Y"<?php if($EMUB == "Y") echo ' checked="checked"' ?> />Y
				<input name="EMUB" type="radio" value="N"<?php if($EMUB == "N") echo ' checked="checked"' ?> />N
			</td>
			<td id="explicacion">Le permite enviar el &uacute;ltimo boletin editado.</td>
        </tr>
		<tr>
			<td>Subir tareas de alumnos</td>
			<td>
				<input name="SFP" type="radio" value="Y"<?php if($SFP == "Y") echo ' checked="checked"' ?> />Y
				<input name="SFP" type="radio" value="N"<?php if($SFP == "N") echo ' checked="checked"' ?> />N
			</td>
			<td id="explicacion">Este permiso es exclusivo para profesores, sin embargo puede ser concedido a otras personas, pero ser&aacute; publicado el trabajo del alumno bajo la tutoria de este usuario.</td>
        </tr>
		<tr style="background-color:#EEE">
			<td>Crear, editar y manejar usuarios</td>
			<td>
				<input name="MU" type="radio" value="Y"<?php if($MU == "Y") echo ' checked="checked"' ?> />Y
				<input name="MU" type="radio" value="N"<?php if($MU == "N") echo ' checked="checked"' ?> />N
			</td>
			<td id="explicacion">Permisos para crear, editar y eliminar usuarios que tienen acceso a este panel administrativo.</td>
        </tr>
		<tr>
			<td colspan="3" align="right"><input name="submit" type="submit" value="Actualizar" /></td>
		</tr>
	</table>
</form>
	<?php }
	elseif($id != NULL and $e == 1 and $_SESSION['tipo_usuario'] == 2)
	{
		$variables = "nombre='".$_GET['nombre']."'";
		$variables .= ", apellidos='".$_GET['apellidos']."'";
		$variables .= ", correo='".$_GET['correo']."'";
		$variables .= ", ENB='".$_GET['ENB']."'";
		$variables .= ", VTB='".$_GET['VTB']."'";
		$variables .= ", EB='".$_GET['EB']."'";
		$variables .= ", IPLE='".$_GET['IPLE']."'";
		$variables .= ", LPE='".$_GET['LPE']."'";
		$variables .= ", EPE='".$_GET['EPE']."'";
		$variables .= ", SFIG='".$_GET['SFIG']."'";
		$variables .= ", VFIG='".$_GET['VFIG']."'";
		$variables .= ", EFIG='".$_GET['EFIG']."'";
		$variables .= ", EMUB='".$_GET['EMUB']."'";
		$vp = verificar_permisos();
		if($vp == 0) $variables .= ", SFP='Y'";
		else $variables .= ", SFP='".$_GET['SFP']."'";
		$variables .= ", MU='".$_GET['MU']."'";

		include("conexion.php");
		$query = mysql_query("UPDATE profileusuario SET $variables WHERE codigo='$id'");
		
		//creamos el usuario
		$tipo_usuario = 0;
		if($_GET['SFP'] == "N" || $vp != 0) $tipo_usuario = 1;
		if($_GET['MU'] == "Y") $tipo_usuario = 2;
		$query = "UPDATE profileusuario SET $variables WHERE codigo='$id'";
		mysql_query($query) or die(mysql_error());
		$variables = "tipo_usuario='".$tipo_usuario."'";
		$query = "UPDATE cat_usr SET $variables WHERE codigo='$id'";
		mysql_query($query) or die(mysql_error());
		if($_GET['correo'] != NULL)
		{
			$variables = "correo='".$_GET['correo']."'";
			$query = "UPDATE cat_usr SET $variables WHERE codigo='$id'";
			mysql_query($query) or die(mysql_error());
		}
		echo "<center style=\"margin-top: 50px\">Se han actualizados los datos del usuario ".$_GET['nombre']."</center>";
	}
	else echo "<center style=\"margin-top: 50px\">Usted no se puede editar asi mismo</center>";
}

function eliminarusers($id, $e)
{
	echo '<center><div style="margin-top: 50px">';
	if($id != NULL and $e == NULL and $_SESSION['codigo'] != $id and $id != 1)
	{
		echo '&iquest;est&aacute; seguro de quere eliminar al usuario con id No. '.$id.'?';
		echo '<p><span id="menu_admon"><a href="usuarios.php?op=3&id='.$id.'&e=1">OK</a></span>';
		echo '<span id="menu_admon"><a href="usuarios.php">Cancelar</a></span></p>';
	}
	elseif($id != NULL and $e == 1 and $_SESSION['codigo'] != $id and $id != 1)
	{
		include("conexion.php");
		$query = "DELETE FROM cat_usr WHERE codigo='$id'";
		mysql_query($query) or die(mysql_error());
		$query = "DELETE FROM profileusuario WHERE codigo='$id'";
		mysql_query($query) or die(mysql_error());
		echo "<center style=\"margin-top: 50px\">El usuario ha sido eliminado</center>";
	}
	else
	{
		echo "<center style=\"margin-top: 50px\">Usted no se puede eliminar as&iacute; mismo</center>";
	}
	echo "</div></center>";
}

function activarusers($id, $act)
{
	echo "<center><div>";
	if($id != NULL and $_SESSION['codigo'] != $id and $id != 1)
	{
		include("conexion.php");
		if($act == 0) { $activo = 1; $mensaje = "activado"; }
		elseif($act == 1) { $activo = 0; $mensaje = "desactivado"; }

		$query = mysql_query("UPDATE cat_usr SET activo='$activo' WHERE codigo='$id'");
		
		echo "<center style=\"margin-top: 50px\">Se ha $mensaje el usuario con id No. $id</center>";
	}
	else
	{
		echo "<center style=\"margin-top: 50px\">Usted no se puede activar/desactivar as&iacute; mismo</center>";
	}
	echo "</div></center>";
}

function crearusers($c)
{
	include("conexion.php");
	if($c == 0)
	{ ?>
<form action="usuarios.php" method="get">
    <input name="op" type="hidden" value="5" />
    <input name="c" type="hidden" value="1" />
	<table cellpadding="5" cellspacing="0" border="0" width="80%" align="center" id="tmu">
    	<tr align="left">
			<td width="30%">Usuario</td>
			<td width="40%"><input name="usuario" type="text" size="30" value="" /></td>
            <td width="30%" id="explicacion">Puede ser el nombre de la persona.<br />
            Debe ser escrito en minusculas.</td>
		</tr>
        <tr align="left" style="background-color:#EEE">
			<td>Password</td>
			<td><input name="clave1" type="password" size="30" value="" /></td>
            <td id="explicacion">M&iacute;nimo debe contener 6 caracteres. Puede ser numerico, alfabetico o alfanumerico</td>
		</tr>
        <tr align="left">
			<td>Repita el password</td>
			<td><input name="clave2" type="password" size="30" value="" /></td>
            <td id="explicacion">Igual que el anterior.</td>
		</tr>
		<tr align="left" style="background-color:#EEE">
			<td>Nombre</td>
			<td><input name="nombre" type="text" size="40" value="" /></td>
            <td id="explicacion">Nombre de la persona a crear</td>
		</tr>
		<tr>
			<td>Apellidos</td>
			<td><input name="apellidos" type="text" size="50" value="" /></td>
            <td id="explicacion">Apellidos de la persona a crear</td>
		</tr>
		<tr style="background-color:#EEE">
			<td>Correo electr&oacute;nico</td>
			<td><input name="correo" type="text" size="50" value="" /></td>
            <td id="explicacion">El correo electr&oacute;nico debe ser el institucional</td>
		</tr>
		<tr>
			<td>Editar un nuevo bolet&iacute;n</td>
			<td>
                <input name="ENB" type="radio" value="Y" />Y
				<input name="ENB" type="radio" value="N" checked="checked" />N
			</td>
            <td id="explicacion">Permite editar nuevos boletines que ser&aacute; publicados en la p&aacute;gina web, y adem&aacute;s enviados a los padres si el permiso es concedido.</td>
		</tr>
		<tr style="background-color:#EEE">
			<td>Ver todos los boletines</td>
			<td>
               <input name="VTB" type="radio" value="Y" />Y
				<input name="VTB" type="radio" value="N" checked="checked" />N
			</td>
            <td id="explicacion">Acceso a una vista de los boletines p&uacute;blicados en la p&aacute;gina web.</td>
		</tr>
		<tr>
			<td>Eliminar bolet&iacute;n</td>
			<td>
				<input name="EB" type="radio" value="Y" />Y
				<input name="EB" type="radio" value="N" checked="checked" />N
			</td>
            <td id="explicacion">Permite eliminar boletines.</td>
		</tr>
		<tr style="background-color:#EEE">
			<td>Ingresar email de padre a la lista</td>
			<td>
				<input name="IPLE" type="radio" value="Y" />Y
				<input name="IPLE" type="radio" value="N" checked="checked" />N
			</td>
            <td id="explicacion">Es el acceso a ingresar los correos electronicos de los padres a quienes se les desea enviar boletines.</td>
		</tr>
		<tr>
			<td>Ver la lista de emails de los padres</td>
			<td>
                <input name="LPE" type="radio" value="Y" />Y
				<input name="LPE" type="radio" value="N" checked="checked" />N
			</td>
            <td id="explicacion">Ver la lista de los padres inscritos en el boletine del colegio.</td>
		</tr>
		<tr style="background-color:#EEE">
			<td>Eliminar un email de los padres de la lista</td>
			<td>
				<input name="EPE" type="radio" value="Y" />Y
				<input name="EPE" type="radio" value="N" checked="checked" />N
			</td>
            <td id="explicacion">Eliminar de la lista de padfres inscritos al boletin.</td>
		</tr>
		<tr>
		<td>Subir ficheros de informaci&oacute;n general</td>
			<td>
				<input name="SFIG" type="radio" value="Y" />Y
				<input name="SFIG" type="radio" value="N" checked="checked" />N
			</td>
            <td id="explicacion">Permite subir archivos en pdf para que sean publicados en la secci&oacute;n de informaci&oacute;n general.</td>
		</tr>
		<tr style="background-color:#EEE">
			<td>Ver ficheros de informaci&oacute;n general</td>
			<td>
				<input name="VFIG" type="radio" value="Y" />Y
				<input name="VFIG" type="radio" value="N" checked="checked" />N
			</td>
            <td id="explicacion">Le permite ver los ficheros de informaci&oacute;n general actualmente publicados.</td>
		</tr>
		<tr>
		<td>Eliminar un fichero de informaci&oacute;n general</td>
			<td>
				<input name="EFIG" type="radio" value="Y" />Y
				<input name="EFIG" type="radio" value="N" checked="checked" />N
			</td>
            <td id="explicacion">Elimiar archivos de la lista de informaci&oacute;n general.</td>
		</tr>
		<tr style="background-color:#EEE">
			<td>Enviar por mail el &uacute;ltimo bolet&iacute;n</td>
			<td>
				<input name="EMUB" type="radio" value="Y" />Y
				<input name="EMUB" type="radio" value="N" checked="checked" />N
			</td>
            <td id="explicacion">Le permite enviar el &uacute;ltimo boletin editado.</td>
		</tr>
		<tr>
			<td>Subir tareas de alumnos</td>
			<td>
				<input name="SFP" type="radio" value="Y" />Y
				<input name="SFP" type="radio" value="N" checked="checked" />N
			</td>
            <td id="explicacion">Este permiso es exclusivo para profesores, sin embargo puede ser concedido a otras personas, pero ser&aacute; publicado el trabajo del alumno bajo la tutoria de este usuario.</td>
		</tr>
		<tr style="background-color:#EEE">
			<td>Crear, editar y manejar usuarios</td>
			<td>
				<input name="MU" type="radio" value="Y" />Y
				<input name="MU" type="radio" value="N" checked="checked" />N
			</td>
            <td id="explicacion">Permisos para crear, editar y eliminar usuarios que tienen acceso a este panel administrativo.</td>
		</tr>
		<tr>
			<td colspan="3" align="right"><input name="submit" type="submit" value="Actualizar" /></td>
		</tr>
	</table>
</form>
	<?php }
	elseif($c == 1 and $_GET['usuario'] != "liceo")
	{
		$userid = strtolower($_GET['usuario']);
		$query = mysql_query("SELECT usuario FROM cat_usr WHERE usuario = '$userid'");
		while($row=mysql_fetch_object($query))
		{
			//Mostramos los titulos de los articulos o lo que deseemos...
			$user = $row->usuario;
		}
  
		$usuario = strcmp($user, $userid);
		if($usuario != 0 and $_GET['usuario'] != NULL)
		{
			if($_GET['clave1'] == $_GET['clave2'])
			{
				include("conexion.php");

				//creamos el usuario
				$vp = verificar_permisos();
				$tipo_usuario = 0;
				if($_GET['SFP'] == "N" || $vp != 0) $tipo_usuario = 1;
				if($_GET['MU'] == "Y") $tipo_usuario = 2;
				$variables = "usuario, tipo_usuario, clave_acceso, correo, token, activo";
				$valores = "'".$_GET['usuario']."'";
				$valores .= ", '".$tipo_usuario."'";
				$valores .= ", '".md5($_GET['clave1'])."'";
				$valores .= ", '".$_GET['correo']."'";
				$valores .= ", '0'";
				$valores .= ", '1'";
				$query = "INSERT INTO cat_usr ($variables) VALUES ($valores)";
				mysql_query($query) or die(mysql_error());

				//ingresamos los datos del usuario creado
				$variables = "nombre, apellidos, correo, creado, ENB, VTB, EB, IPLE, LPE, EPE, SFIG, VFIG, EFIG, EMUB, SFP, MU";
				$valores = "'".$_GET['nombre']."'";
				$valores .= ", '".$_GET['apellidos']."'";
				$valores .= ", '".$_GET['correo']."'";
				$valores .= ", '".date("Y-m-j H:i:s")."'";
				$valores .= ", '".$_GET['ENB']."'";
				$valores .= ", '".$_GET['VTB']."'";
				$valores .= ", '".$_GET['EB']."'";
				$valores .= ", '".$_GET['IPLE']."'";
				$valores .= ", '".$_GET['LPE']."'";
				$valores .= ", '".$_GET['EPE']."'";
				$valores .= ", '".$_GET['SFIG']."'";
				$valores .= ", '".$_GET['VFIG']."'";
				$valores .= ", '".$_GET['EFIG']."'";
				$valores .= ", '".$_GET['EMUB']."'";
				if($vp == 0) $valores .= ", 'Y'";
				else $valores .= ", '".$_GET['SFP']."'";
				$valores .= ", '".$_GET['MU']."'";
				$query = "INSERT INTO profileusuario ($variables) VALUES ($valores)";
				mysql_query($query) or die(mysql_error());
				echo '<center style="margin-top: 25px">El usuario '.$_GET['nombre'].' ha sido creado con exito</center>';
			}
			else echo '<center style="margin-top: 25px">Las claves no coinciden <a href="javascript:history.go(-1)">Regresar</a></center>';
		}
		else echo '<center style="margin-top: 25px">El usuario ya esta en uso o esta vac&iacute;o <a href="javascript:history.go(-1)">Regresar</a></center>';
	}
}

function verificar_permisos()
{
	$y = 0;
	if($_GET['ENB'] == "Y") $y += 1;
	if($_GET['VTB'] == "Y") $y += 1;
	if($_GET['EB'] == "Y") $y += 1;
	if($_GET['IPLE'] == "Y") $y += 1;
	if($_GET['LPE'] == "Y") $y += 1;
	if($_GET['EPE'] == "Y") $y += 1;
	if($_GET['SFIG'] == "Y") $y += 1;
	if($_GET['VFIG'] == "Y") $y += 1;
	if($_GET['EFIG'] == "Y") $y += 1;
	if($_GET['EMUB'] == "Y") $y += 1;
	if($_GET['SFP'] == "Y") $y += 1;
	if($_GET['MU'] == "Y") $y += 1;
	return $y;
}
?>
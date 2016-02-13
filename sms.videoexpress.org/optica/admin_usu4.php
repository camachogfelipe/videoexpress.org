<?php
if($_SESSION["perfil"] != 1)
{
	die("<h1>No esta autorizado para ver esta informaci&oacute;n</h1>");
}

if(isset($_GET["id"]))
{
	$varMiId = $_GET["id"];
}
else
{
	die("Debe especificarse un ID.");
}
/*
*	$PSN = new DBbase_Sql;
*/
// Objeto de Base de Datos
$PSN1 = new DBbase_Sql;
$PSN = new DBbase_Sql;
// Array que nos servira para ir llevando cuenta de los requerimientos.
$arrayRequerimientos = array();
if(isset($_POST["funcion"]))
{
	/*
	* AQUI OBTENEMOS "N" CANTIDAD DE REQUERIMIENTOS SEGUN LO DIGITADO POR EL USUARIO ANTERIORMENTE.
	*/
	$sql= "SELECT * ";
	$sql.=" FROM usuario";
	$sql.=" WHERE id != '".$varMiId."' and login = '".$_POST["login"]."'";
	$PSN->query($sql);		
	if($PSN->next_record())
	{
		$errorLogueo = 1;
	}
	else if($_POST["funcion"] == "actualizar")
	{
		$nombre_archivo = $_FILES['archivo']['name'];
		$tipo_archivo = $_FILES['archivo']['type'];
		$tamano_archivo = $_FILES['archivo']['size'];

		/*
		*	DEBEMOS INSERTAR LA INFORMACION DEL CLIENTE/USUARIO SEGUN CORRESPONDA.
		*/
		$sql = 'update usuario set tipo= "'.eliminarInvalidos($_POST["tipo"]).'", idColegio= "'.eliminarInvalidos($_POST["idColegio"]).'", nombre= "'.eliminarInvalidos($_POST["nombre"]).'", identificacion= "'.eliminarInvalidos($_POST["identificacion"]).'", tipoIdentificacion= "'.eliminarInvalidos($_POST["tipoIdentificacion"]).'", pais= "'.eliminarInvalidos($_POST["pais"]).'", departamento= "'.eliminarInvalidos($_POST["departamento"]).'", ciudad= "'.eliminarInvalidos($_POST["ciudad"]).'", direccion= "'.eliminarInvalidos($_POST["direccion"]).'", telefono1= "'.eliminarInvalidos($_POST["telefono1"]).'", telefono2= "'.eliminarInvalidos($_POST["telefono2"]).'", celular= "'.eliminarInvalidos($_POST["celular"]).'", email= "'.eliminarInvalidos($_POST["email"]).'", cargo= "'.eliminarInvalidos($_POST["cargo"]).'", genero= "'.eliminarInvalidos($_POST["genero"]).'", lider= "'.eliminarInvalidos($_POST["lider"]).'", url= "'.eliminarInvalidos($_POST["url"]).'", observaciones= "'.eliminarInvalidos($_POST["observaciones"]).'", login= "'.eliminarInvalidos($_POST["login"]).'"';
		
		if(eliminarInvalidos($_POST["password"]) != "")
		{
			$sql .= ', password = "'.md5(eliminarInvalidos($_POST["password"])).'"';
		}
		 
		$sql .= " where id = ".$varMiId;

		$ultimoQuery = $PSN1->query($sql);

		if(trim($nombre_archivo) != "")
		{
			//echo $nombre_archivo;
			//Compruebo si las características del archivo son las que deseo 
			if(move_uploaded_file($_FILES['archivo']['tmp_name'], "images/consultores/".$varMiId.".jpg"))
			{
				//echo "Movio...";
			}
		}
		$varExitoUSU = 1;
	}	
}

/*
*	TRAEMOS EL CLIENTE
*/
$sql = "SELECT * ";
$sql.=" FROM usuario ";
$sql.=" WHERE id = ".$varMiId;


$PSN1->query($sql);
$numero=$PSN1->num_rows();
if($numero > 0)
{
	$PSN1->next_record();
	//Solo si no se ha modificado ya el formulario.
	$nombre = $PSN1->f('nombre');
	$tipo = $PSN1->f('tipo');
	$idColegio = $PSN1->f('idColegio');
	$idSucursal = $PSN1->f('idSucursal');
	$cargo= $PSN1->f('cargo');
	$genero= $PSN1->f('genero');
	$lider= $PSN1->f('lider');
	$identificacion = $PSN1->f('identificacion');
	$tipoIdentificacion = $PSN1->f('tipoIdentificacion');
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
	$cupoMax =  $PSN1->f('cupoMax');
}
else
{
	die("<h1>No esta autorizado para ver este perfil.</h1>");
}

?><br /><form method="post" name="form1" id="form1" enctype="multipart/form-data">
<table width="800px" border="0" cellspacing="0" cellpadding="2"  align="center">
<thead>
	<tr> 
	<th colspan="4">.MODIFICACION DE ACCESO.</th>
	</tr>
	<?
	if($errorLogueo == 1)
	{
		?>
		<tr>
		<th colspan="4" bgcolor="#ffffff" style="background-color:#ffffff"><h1><font color="red"><u>ATENCION:</u> NO SE ACTUALIZO EL ACCESO<BR /><u>MOTIVO:</u> YA EXISTE UN ACCESO CON ESE MISMO "LOGIN".<br />POR FAVOR CAMBIE EL "LOGIN".</font></h1></th>
		</tr>
		<?
	}
	?>
</thead>
<tbody>
	<tr>
	    <td rowspan="8" colspan="2" bgcolor="#EFEFEF" align="center" valign="middle"><?
		if(file_exists("images/consultores/".$varMiId.".jpg"))
		{
			?><img src="images/consultores/<?=$varMiId;?>.jpg" width="200px" vspace="10" align="middle"><?
		}
		else
		{
			?><img src="images/consultores/desconocido.jpg" height="200px" vspace="10" align="middle"><?
		}	
		?></td>
		<td><strong>Nombre:</strong></td>
		<td><input name="nombre" type="text" id="nombre" maxlength="250" value="<?=$nombre; ?>" /></td>
    </tr>
    <tr>
		<td><strong>Tipo de Usuario:</strong></td>
		<td><select name="tipo">
		<?
		/*
		*	TRAEMOS LOS TIPOS DE USUARIO (1)
		*/
		$sql = "SELECT * ";
		$sql.=" FROM categorias ";
		$sql.=" WHERE idSec = 1 ORDER BY descripcion asc";
		
		
		$PSN1->query($sql);
		$numero=$PSN1->num_rows();
		if($numero > 0)
		{
		while($PSN1->next_record())
		{
			if($PSN1->f('id') != 4)
			{
				?><option value="<?=$PSN1->f('id'); ?>" <?
				if($tipo == $PSN1->f('id'))
				{
					?>selected="selected"<?
				}
				?>><?=$PSN1->f('descripcion'); ?></option><?
			}		
		}
		}
		?>
		</select></td>
	</tr>
	<tr>
		<td><strong>Identificacion:</strong></td>
		<td><input name="identificacion" type="text" id="identificacion" maxlength="250" value="<?=$identificacion; ?>" /></td>
    </tr>
    <tr>
		<td><strong>Tipo de Identificacion:</strong></td>
		<td><select name="tipoIdentificacion">
		<?
		/*
		*	TRAEMOS LOS TIPOS DE IDENTIFICACION (2)
		*/
		$sql = "SELECT * ";
		$sql.=" FROM categorias ";
		$sql.=" WHERE idSec = 2 ORDER BY descripcion asc";
		
		
		$PSN1->query($sql);
		$numero=$PSN1->num_rows();
		if($numero > 0)
		{
			while($PSN1->next_record())
			{
				?><option value="<?=$PSN1->f('id'); ?>" <?
				if($tipoIdentificacion == $PSN1->f('id'))
				{
					?>selected="selected"<?
				}
				?>><?=$PSN1->f('descripcion'); ?></option><?
			}
		}
		?>
		</select></td>
	</tr>
	<tr>
		<td><strong>Cargo:</strong></td>
		<td><select name="cargo">
		<?
		/*
		*	TRAEMOS LOS CARGOS (10)
		*/
		$sql = "SELECT * ";
		$sql.=" FROM categorias ";
		$sql.=" WHERE idSec = 10 ORDER BY descripcion asc";
		
		
		$PSN1->query($sql);
		$numero=$PSN1->num_rows();
		if($numero > 0)
		{
		while($PSN1->next_record())
		{
		?><option value="<?=$PSN1->f('id'); ?>" <?
		if($cargo == $PSN1->f('id'))
		{
			?>selected="selected"<?
		}
		?>><?=$PSN1->f('descripcion'); ?></option><?
		
		}
		}
		?>
		</select></td>
    </tr>
    <tr>
		<td><strong>Pais:</strong></td>
		<td><select name="pais">
			<option <? if($pais == "Argentina"){ ?>selected="selected"<? } ?>>Argentina</option>
			<option <? if($pais == "Aruba"){ ?>selected="selected"<? } ?>>Aruba</option>
			<option <? if($pais == "Australia"){ ?>selected="selected"<? } ?>>Australia</option>
			<option <? if($pais == "Barbados"){ ?>selected="selected"<? } ?>>Barbados</option>
			<option <? if($pais == "Belarus"){ ?>selected="selected"<? } ?>>Belarus</option>
			<option <? if($pais == "Brazil"){ ?>selected="selected"<? } ?>>Brazil</option>
			<option <? if($pais == "Canada"){ ?>selected="selected"<? } ?>>Canada</option>
			<option <? if($pais == "Chile"){ ?>selected="selected"<? } ?>>Chile</option>
			<option <? if($pais == "Colombia"){ ?>selected="selected"<? } ?>>Colombia</option>
			<option <? if($pais == "Costa Rica"){ ?>selected="selected"<? } ?>>Costa Rica</option>
			<option <? if($pais == "Cuba"){ ?>selected="selected"<? } ?>>Cuba</option>
			<option <? if($pais == "Dominican Republic"){ ?>selected="selected"<? } ?>>Dominican Republic</option>
			<option <? if($pais == "Ecuador"){ ?>selected="selected"<? } ?>>Ecuador</option>
			<option <? if($pais == "El Salvador"){ ?>selected="selected"<? } ?>>El Salvador</option>
			<option <? if($pais == "Guatemala"){ ?>selected="selected"<? } ?>>Guatemala</option>
			<option <? if($pais == "Guyana"){ ?>selected="selected"<? } ?>>Guyana</option>
			<option <? if($pais == "Haiti"){ ?>selected="selected"<? } ?>>Haiti</option>
			<option <? if($pais == "Honduras"){ ?>selected="selected"<? } ?>>Honduras</option>
			<option <? if($pais == "India"){ ?>selected="selected"<? } ?>>India</option>
			<option <? if($pais == "Italy"){ ?>selected="selected"<? } ?>>Italy</option>
			<option <? if($pais == "Jamaica"){ ?>selected="selected"<? } ?>>Jamaica</option>
			<option <? if($pais == "Mexico"){ ?>selected="selected"<? } ?>>Mexico</option>
			<option <? if($pais == "Nicaragua"){ ?>selected="selected"<? } ?>>Nicaragua</option>
			<option <? if($pais == "Panama"){ ?>selected="selected"<? } ?>>Panama</option>
			<option <? if($pais == "Paraguay"){ ?>selected="selected"<? } ?>>Paraguay</option>
			<option <? if($pais == "Peru"){ ?>selected="selected"<? } ?>>Peru</option>
			<option <? if($pais == "United States"){ ?>selected="selected"<? } ?>>United States</option>
			<option <? if($pais == "Venezuela"){ ?>selected="selected"<? } ?>>Venezuela</option>
		</select></td>
	</tr>
	<tr>
		<td><strong>Departamento:</strong></td>
		<td><input name="departamento" type="text" id="departamento" maxlength="250" value="<?=$departamento; ?>" /></td>
    </tr>
    <tr>
		<td><strong>Ciudad:</strong></td>
		<td><input name="ciudad" type="text" id="ciudad" maxlength="250" value="<?=$ciudad; ?>" /></td>
	</tr>
	<tr>
		<td><strong>Direccion:</strong></td>
		<td><input name="direccion" type="text" id="direccion" maxlength="250" value="<?=$direccion; ?>" /></td>
		<td><strong>Telefono:</strong></td>
		<td><input name="telefono1" type="text" id="telefono1" maxlength="250" value="<?=$telefono1; ?>" /></td>
	</tr>
	<tr>
		<td><strong>Fax:</strong></td>
		<td><input name="telefono2" type="text" id="telefono2" maxlength="250" value="<?=$telefono2; ?>" /></td>
		<td><strong>Celular:</strong></td>
		<td><input name="celular" type="text" id="celular" maxlength="250" value="<?=$celular; ?>" /></td>
	</tr>
	<tr>
		<td><strong>E-mail:</strong></td>
		<td><input name="email" type="text" id="email" maxlength="250" value="<?=$email; ?>" /></td>
		<td><strong>Pagina Web:</strong></td>
		<td><input name="url" type="text" id="url" maxlength="250" value="<?=$url; ?>" /></td>
	</tr>
	<tr>
		<td><strong>Login:</strong></td>
		<td><input name="login" type="text" id="login" maxlength="250" value="<?=$login; ?>" /></td>
		<td><strong>Password:</strong><br /><i>(Dejar en blanco si no lo desea cambiar)</i></td>
		<td><input name="password" type="text" id="password" maxlength="250" value="" /></td>
	</tr>
	<tr>
		<td><strong>Observaciones:</strong></td>
		<td colspan="3"><textarea name="observaciones" id="observaciones" cols="70" rows="5"  ><?=$observaciones; ?></textarea></td>
	</tr>
	<tr>
		<td><strong>Logotipo/Foto (200*200 pixeles - .jpg):</strong></td>
		<td><input name="archivo" type="file" id="archivo" /></td>
    </tr>
	</tbody>
</table>
<input type="hidden" name="funcion" id="funcion" value="" />
<br />
<hr color="#0000FF" width="800px" />
<br />
<center><input type="button" name="button" onclick="generarForm()" value="Actualizar Usuario" style="background-color:#FFFFFF;border-color:#0000FF;color:#006600;font-weight:bold"> <input type="button" name="button" onclick="regresar()" value="Cancelar" style="background-color:#FFFFFF;border-color:#0000FF;color:#006600;font-weight:bold"></center>
</form><script language="javascript">
	function generarForm(){
			if(confirm("Esta accion actualizara informacion del USUARIO en el sistema, ¿esta seguro que desea continuar?"))
			{
				if(document.getElementById('nombre').value != "" 
				&& document.getElementById('identificacion').value != ""
				&& document.getElementById('email').value != ""
				&& document.getElementById('login').value != ""
				)
				{
					document.getElementById('funcion').value = "actualizar";
					document.getElementById('form1').submit();
				}
				else
				{
					alert("La informacion es primordial para brindarle un excelente servicio, por favor digite al menos los campos de NOMBRE, NIT, E-MAIL, LOGIN");
				}
			}
	}
	function regresar()
	{
		window.location.href = "index.php?doc=admin_buscaru";
	}
	function init(){
		document.getElementById('form1').onsubmit = function(){
				return false;
		}
		<?
		if($varExitoUSU == 1)
		{
			?>alert("Se ha actualizado correctament el ACCESO.");<?
		}
		?>
	}
	window.onload = function(){
		init();
	}
	</script>
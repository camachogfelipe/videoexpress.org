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
$PSN = new DBbase_Sql;
// Array que nos servira para ir llevando cuenta de los requerimientos.
$arrayRequerimientos = array();
if(isset($_POST["funcion"]))
{
	/*
	* AQUI OBTENEMOS "N" CANTIDAD DE REQUERIMIENTOS SEGUN LO DIGITADO POR EL USUARIO ANTERIORMENTE.
	*/
	/*
	* AQUI OBTENEMOS "N" CANTIDAD DE REQUERIMIENTOS SEGUN LO DIGITADO POR EL USUARIO ANTERIORMENTE.
	*/
	$sql= "SELECT * ";
	$sql.=" FROM usuario";
	$sql.=" WHERE login = '".$_POST["login"]."'";
	$PSN->query($sql);		
	if($PSN->next_record())
	{
		$errorLogueo = 1;
	}
	else if($_POST["funcion"] == "insertar")
	{
		$nombre_archivo = $_FILES['archivo']['name'];
		$tipo_archivo = $_FILES['archivo']['type'];
		$tamano_archivo = $_FILES['archivo']['size'];

		/*
		*	DEBEMOS INSERTAR LA INFORMACION DEL CLIENTE/USUARIO SEGUN CORRESPONDA.
		*/
		//$sql = 'insert into usuario (tipo, idColegio, nombre, razon, identificacion, tipoIdentificacion, tipoContribuyente, regimenDian, categoriaDian, clasificacionIndustria, representanteLegal, pais, departamento, ciudad, direccion, telefono1, telefono2, celular, email, cargo, genero, lider, url, observaciones, login, password, prefijo, consecutivo) ';
		$sql = 'insert into usuario (tipo, idColegio, nombre, identificacion, tipoIdentificacion, pais, departamento, ciudad, direccion, telefono1, telefono2, celular, email, cargo, genero, lider, url, observaciones, login, password) ';
		$sql .= ' values ("'.soloNumeros($_POST["tipo"]).'", "'.soloNumeros($_POST["idColegio"]).'", "'.eliminarInvalidos($_POST["nombre"]).'", "'.soloNumeros($_POST["identificacion"]).'", "'.soloNumeros($_POST["tipoIdentificacion"]).'", "'.eliminarInvalidos($_POST["pais"]).'", "'.eliminarInvalidos($_POST["departamento"]).'", "'.eliminarInvalidos($_POST["ciudad"]).'", "'.eliminarInvalidos($_POST["direccion"]).'", "'.soloNumeros($_POST["telefono1"]).'", "'.soloNumeros($_POST["telefono2"]).'", "'.soloNumeros($_POST["celular"]).'", "'.eliminarInvalidos($_POST["email"]).'", "'.eliminarInvalidos($_POST["cargo"]).'", "'.eliminarInvalidos($_POST["genero"]).'", "'.soloNumeros($_POST["lider"]).'", "'.eliminarInvalidos($_POST["url"]).'", "'.eliminarInvalidos($_POST["observaciones"]).'", "'.eliminarInvalidos($_POST["login"]).'", "'.md5(eliminarInvalidos($_POST["password"])).'") ';


		$ultimoQuery = $PSN1->query($sql);
		$ultimoId = mysql_insert_id();

		//Compruebo si las características del archivo son las que deseo 
		if(move_uploaded_file($_FILES['archivo']['tmp_name'], "images/consultores/".$ultimoId.".jpg"))
		{
		}

		$varExitoUSU = 1;
	}	
}


?><br /><form method="post" enctype="multipart/form-data" name="form1" id="form1">
<table width="800px" border="0" cellspacing="0" cellpadding="2"  align="center">
<thead>
	<tr> 
	<th colspan="4">.CREACION DE ACCESO.</th>
	</tr>
	<?
	if($errorLogueo == 1)
	{
		?>
		<tr>
		<th colspan="4" bgcolor="#ffffff" style="background-color:#ffffff"><h1><font color="red"><u>ATENCION:</u> NO SE CREO EL ACCESO<BR /><u>MOTIVO:</u> YA EXISTE UN ACCESO CON ESE MISMO "LOGIN".<br />POR FAVOR CAMBIE EL "LOGIN".</font></h1></th>
		</tr>
		<?
	}
	?>
</thead>
<tbody>
	<tr> 
		<td><strong>Nombre:</strong></td>
		<td><input name="nombre" type="text" id="nombre" maxlength="250" value="<?=$_POST["nombre"]; ?>" /></td>
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
				if($_POST["tipo"] == $PSN1->f('id'))
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
		<td><input name="identificacion" type="text" id="identificacion" maxlength="250" value="<?=$_POST["identificacion"]; ?>" /></td>
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
		if($_POST["tipoIdentificacion"] == $PSN1->f('id'))
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
		if($_POST["cargo"] == $PSN1->f('id'))
		{
			?>selected="selected"<?
		}
		?>><?=$PSN1->f('descripcion'); ?></option><?
		
		}
		}
		?>
		</select></td>
		<td><strong>Pais:</strong></td>
		<td><select name="pais">
			<option>Argentina</option>
			<option>Aruba</option>
			<option>Australia</option>
			<option>Barbados</option>
			<option>Belarus</option>
			<option>Brazil</option>
			<option>Canada</option>
			<option>Chile</option>
			<option selected="selected">Colombia</option>
			<option>Costa Rica</option>
			<option>Cuba</option>
			<option>Dominican Republic</option>
			<option>Ecuador</option>
			<option>El Salvador</option>
			<option>Guatemala</option>
			<option>Guyana</option>
			<option>Haiti</option>
			<option>Honduras</option>
			<option>India</option>
			<option>Italy</option>
			<option>Jamaica</option>
			<option>Mexico</option>
			<option>Nicaragua</option>
			<option>Panama</option>
			<option>Paraguay</option>
			<option>Peru</option>
			<option>United States</option>
			<option>Venezuela</option>
		</select></td>
	</tr>
	<tr>
		<td><strong>Departamento:</strong></td>
		<td><input name="departamento" type="text" id="departamento" maxlength="250" value="<?=$_POST["departamento"]; ?>" /></td>
		<td><strong>Ciudad:</strong></td>
		<td><input name="ciudad" type="text" id="ciudad" maxlength="250" value="<?=$_POST["ciudad"]; ?>" /></td>
	</tr>
	<tr>
		<td><strong>Direccion:</strong></td>
		<td><input name="direccion" type="text" id="direccion" maxlength="250" value="<?=$_POST["direccion"]; ?>" /></td>
		<td><strong>Telefono:</strong></td>
		<td><input name="telefono1" type="text" id="telefono1" maxlength="250" value="<?=$_POST["telefono1"]; ?>" /></td>
	</tr>
	<tr>
		<td><strong>Fax:</strong></td>
		<td><input name="telefono2" type="text" id="telefono2" maxlength="250" value="<?=$_POST["telefono2"]; ?>" /></td>
		<td><strong>Celular:</strong></td>
		<td><input name="celular" type="text" id="celular" maxlength="250" value="<?=$_POST["celular"]; ?>" /></td>
	</tr>
	<tr>
		<td><strong>E-mail:</strong></td>
		<td><input name="email" type="text" id="email" maxlength="250" value="<?=$_POST["email"]; ?>" /></td>
		<td><strong>Pagina Web:</strong></td>
		<td><input name="url" type="text" id="url" maxlength="250" value="<?=$_POST["url"]; ?>" /></td>
	</tr>
	<tr>
		<td><strong>Login:</strong></td>
		<td><input name="login" type="text" id="login" maxlength="250" value="<?=$_POST["login"]; ?>" /></td>
		<td><strong>Password:</strong></td>
		<td><input name="password" type="text" id="password" maxlength="250" value="<?=$_POST["password"]; ?>" /></td>
	</tr>
	<tr>
		<td><strong>Observaciones:</strong></td>
		<td colspan="3"><textarea name="observaciones" id="observaciones" cols="70" rows="5"  ><?=$_POST["observaciones"]; ?></textarea></td>
	</tr>
	<tr>
		<td><strong>Foto (200*200 pixeles - .jpg):</strong></td>
		<td><input name="archivo" type="file" id="archivo" /></td>
	</tr>
	</tbody>
</table>
<input type="hidden" name="funcion" id="funcion" value="" />
<br />
<hr color="#0000FF" width="800px" />
<br />
<center><input type="button" name="button" onclick="generarForm()" value="Crear Usuario" style="background-color:#FFFFFF;border-color:#0000FF;color:#006600;font-weight:bold"></center>
</form><script language="javascript">
	function generarForm(){
			if(confirm("Esta accion generara el ACCESO en el sistema, ¿esta seguro que desea continuar?"))
			{
				if(document.getElementById('nombre').value != "" 
				&& document.getElementById('identificacion').value != ""
				&& document.getElementById('email').value != ""
				&& document.getElementById('login').value != ""
				&& document.getElementById('password').value != ""
				)
				{
					document.getElementById('funcion').value = "insertar";
					document.getElementById('form1').submit();
				}
				else
				{
					alert("La informacion es primordial para brindarle un excelente servicio, por favor digite al menos los campos de NOMBRE, CC, E-MAIL, LOGIN, PASSWORD");
				}
			}
	}
	function init(){
		document.getElementById('form1').onsubmit = function(){
				return false;
		}
		<?
		if($varExitoUSU == 1)
		{
			?>alert("Se ha colocado correctamente el ACCESO, espere mientras es dirigido.");
			window.location.href = "index.php?doc=admin_usu4&id=<?=$ultimoId;?>";<?
		}
		?>
	}
	window.onload = function(){
		init();
	}
	</script>
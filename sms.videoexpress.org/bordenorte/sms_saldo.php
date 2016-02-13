<?php
if($_SESSION["perfil"] != 1 || $_SESSION["superusuario"] != 1)
{
	die("<h1>No esta autorizado para ver esta informaci&oacute;n</h1>");
}

$PSN1 = new DBbase_Sql;
if(isset($_POST["mensajes"]))
{
	$PSN = new DBbase_Sql;
	$mensajes = soloNumeros($_POST["mensajes"]);
	echo $mensajes;
	//exit;
	$audit_usuario = $_SESSION["id"];
	$audit_ip = $_SERVER['REMOTE_ADDR'];
	//
	if($mensajes != "")
	{
		$sql = "INSERT INTO sms_historico (tipo, mensajes, fecha, audit_usuario, audit_fecha, audit_ip) ";
		$sql .= " VALUES(1, '".$mensajes."', '".date("Y-m-d")."', '".$audit_usuario."', NOW(), '".$audit_ip."')";
		$sql .= " ON DUPLICATE KEY UPDATE mensajes = (mensajes+".$mensajes.")";
		$PSN->query($sql);
	}

	?>
	<SCRIPT LANGUAGE="JavaScript">
	alert("Se ha aumentado correctamente el saldo!!!");
	window.location.href= "index.php?doc=sms_envio&opc=2";
	</script>
	<?
}
else
{
	$PSN = new DBbase_Sql;
	?><center>
	<form method="post" enctype="multipart/form-data" name="form1" id="form1">
	<table width="80%" border="0" cellspacing="0" cellpadding="2"  align="center">
	<thead>
		<tr> 
		<th colspan="4">.AGREGAR SALDO.</th>
		</tr>
	</thead>
	<tbody>
        <tr>
            <td colspan="2">&nbsp;</td>
        </tr>
		<tr> 
			<td><strong>Mensajes:</strong></td>
			<td><input name="mensajes" type="text" id="mensajes" maxlength="10" value="<?=soloNumeros($_POST["mensajes"]); ?>" /></td>
		</tr>
		</tbody>
	</table>
	<input type="hidden" name="funcion" id="funcion" value="" />
	<br />
	<hr color="#0000FF" />
	<br />
	<center><input type="button" name="button" onclick="generarForm()" value="Agregar Saldo"></center>
	</form>
	</center>
	<script language="javascript">
		function generarForm(){
				if(confirm("Esta accion agregara SALDO en el sistema, ¿esta seguro que desea continuar?"))
				{
					if(document.getElementById('mensajes').value != "" 
					)
					{
						document.getElementById('funcion').value = "insertar";
						document.getElementById('form1').submit();
					}
					else
					{
						alert("La informacion es primordial para brindarle un excelente servicio, por favor digite al menos el campo de MENSAJES");
					}
				}
		}
		function init(){
			document.getElementById('form1').onsubmit = function(){
					return false;
			}
		}
		window.onload = function(){
			init();
		}
		</script>
					<?
}

?>
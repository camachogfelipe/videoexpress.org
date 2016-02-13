<?php
if($_SESSION["perfil"] != 1 && $_SESSION["perfil"] != 2)
{
	die("<h1>No esta autorizado para ver esta informaci&oacute;n</h1>");
}

if(!isset($_GET["opc"]))
{
	$opc = 2;
}
else
{
	$opc = eliminarInvalidos($_GET["opc"]);
}

$PSN = new DBbase_Sql;
if($opc == 1)
{

		//
		if(isset($_POST["mensajecorreo"]))
		{
			$mensajecorreo = eliminarInvalidos($_POST["mensajecorreo"]);
			$mensajecorreo = urlencode($mensajecorreo);
			if(isset($_POST['listaasociar']))
			{
				$listas = implode(",", $_POST['listaasociar']);
			}
			if($mensajecorreo != "")
			{
				//
				$audit_usuario = $_SESSION["id"];
				$audit_ip = $_SERVER['REMOTE_ADDR'];
				
				//ENVIO A LISTAS
				if(count($_POST['listaasociar']) > 0 && trim($listas) != "" && $listas != ",")
				{
					$sql= "SELECT sms_usuarios.nombres, sms_usuarios.celular ";
					$sql.=" FROM sms_grupos, sms_asociacion, sms_usuarios";
					$sql.=" WHERE sms_grupos.id IN (".$listas.") AND sms_asociacion.id_grupo = sms_grupos.id AND sms_usuarios.id = sms_asociacion.id_usuario ";
					
					$PSN->query($sql);
					$num=$PSN->num_rows();
					if($num > 0)
					{
						$PSNT = new DBbase_Sql;
						while($PSN->next_record())
						{
							$sms_celular = $PSN->f('celular');
							$xml = file_get_contents("https://sistemasmasivos.com/smsmasivo/api/sendsms/send.php?user=".urlencode("smsliceo@iglesiaamoryrestauracion.org")."&password=DUqItGuWlZ&GSM=".$sms_celular."&SMSText=".$mensajecorreo);
							//
							$retorno = explode(",", $xml);
							if(trim($retorno[1]) > 0 && trim($retorno[1]) != "")
							{
								$sql = "INSERT INTO sms_historico (tipo, mensajes, fecha, audit_usuario, audit_fecha, audit_ip) ";
								$sql .= " VALUES(2, -1, '".date("Y-m-d")."', '".$audit_usuario."', NOW(), '".$audit_ip."')";
								$sql .= " ON DUPLICATE KEY UPDATE mensajes = (mensajes-1)";
								$PSNT->query($sql);
								//
								$contadorOk++;
							}
							else
							{
								$sql = "INSERT INTO sms_historico (tipo, error, fecha, audit_usuario, audit_fecha, audit_ip) ";
								$sql .= " VALUES(2, 1, '".date("Y-m-d")."', '".$audit_usuario."', NOW(), '".$audit_ip."')";
								$sql .= " ON DUPLICATE KEY UPDATE error = (error+1)";
								$PSNT->query($sql);
								//
								if($retorno[0] < 0)
								{
									echo "<strong><u>Error:</u></strong> ";
									switch($retorno[0])
									{
										case -3:
											echo "<strong>Saldo INSUFICIENTE (#".$sms_celular.")...</strong><br />";
											break;
										case -4:
											echo "<strong>Celular INVALIDO (#".$sms_celular.")...</strong><br />";
											break;
										case -5:
											echo "<strong>Mensaje invalido  (#".$sms_celular.")...</strong><br />";
											break;
										case -6:
											echo "<strong>Sistema en mantenimiento, perdone los inconvenientes  (#".$sms_celular.")...</strong><br />";
											break;
										default:
											echo "<strong>Error de autenticacion  (#".$sms_celular.")...</strong><br />";
											break;
									}
								}
								$contadorError++;
							}							
							//echo $PSN->f('nombres');
						}
					}
				}//Fin Envio a listas.
				/*
				*
				*	ENVIO A CORREOS MANUALES
				*
				*/
				if(isset($_POST['mensajeusumanual']) && trim($_POST['mensajeusumanual']) != "")
				{
					$sql= "SELECT sms_usuarios.celular ";
					$sql.=" FROM sms_usuarios";
					$sql.=" WHERE id IN (".htmlspecialchars($_POST['mensajeusumanual']).") ";
					
					$PSN->query($sql);
					$num=$PSN->num_rows();
					if($num > 0)
					{
						$PSNT = new DBbase_Sql;
						while($PSN->next_record())
						{
							$sms_celular = $PSN->f('celular');
							$xml = file_get_contents("https://sistemasmasivos.com/smsmasivo/api/sendsms/send.php?user=".urlencode("smsliceo@iglesiaamoryrestauracion.org")."&password=DUqItGuWlZ&GSM=".$sms_celular."&SMSText=".$mensajecorreo);
							//
							$retorno = explode(",", $xml);
							if(trim($retorno[1]) > 0 && trim($retorno[1]) != "")
							{
								$sql = "INSERT INTO sms_historico (tipo, mensajes, fecha, audit_usuario, audit_fecha, audit_ip) ";
								$sql .= " VALUES(2, -1, '".date("Y-m-d")."', '".$audit_usuario."', NOW(), '".$audit_ip."')";
								$sql .= " ON DUPLICATE KEY UPDATE mensajes = (mensajes-1)";
								$PSNT->query($sql);
								//
								$contadorOk++;
							}
							else
							{
								$sql = "INSERT INTO sms_historico (tipo, error, fecha, audit_usuario, audit_fecha, audit_ip) ";
								$sql .= " VALUES(2, 1, '".date("Y-m-d")."', '".$audit_usuario."', NOW(), '".$audit_ip."')";
								$sql .= " ON DUPLICATE KEY UPDATE error = (error+1)";
								$PSNT->query($sql);
								//
								if($retorno[0] < 0)
								{
									echo "<strong><u>Error:</u></strong> ";
									switch($retorno[0])
									{
										case -3:
											echo "<strong>Saldo INSUFICIENTE (#".$sms_celular.")...</strong><br />";
											break;
										case -4:
											echo "<strong>Celular INVALIDO (#".$sms_celular.")...</strong><br />";
											break;
										case -5:
											echo "<strong>Mensaje invalido  (#".$sms_celular.")...</strong><br />";
											break;
										case -6:
											echo "<strong>Sistema en mantenimiento, perdone los inconvenientes  (#".$sms_celular.")...</strong><br />";
											break;
										default:
											echo "<strong>Error de autenticacion  (#".$sms_celular.")...</strong><br />";
											break;
									}
								}
								$contadorError++;
							}							
							//echo $PSN->f('nombres');
						}
					}
				}//Fin correos manuales
			}
			
			if($contadorOk > 0)
			{
				?><center><h1>.MENSAJES ENVIADO CON EXITO: <u><?=$contadorOk; ?>.</h1></center><?
			}
			if($contadorError > 0)
			{
				?><center><h1>.MENSAJES EN ERROR: <?=$contadorError; ?>.</h1></center><?
			}



			//
			//
			//

			/*
			$sql = 'insert into sms_usuarios (
				nombres,
				email,
				celular,
				celular2,
				audit_usuario,
				audit_fecha,
				audit_ip
			) ';

			$sql .= 'values (
				"'.$nombres.'",
				"'.$email.'",
				"'.$celular.'",
				"'.$celular2.'",
				"'.$audit_usuario.'",
				NOW(),
				"'.$audit_ip.'"
			)';

			$ultimoQuery = $PSN->query($sql);
			$ultimoId = mysql_insert_id();

			if(isset($_POST['listaasociar']))
			{
				if (is_array($_POST['listaasociar']))
				{
					foreach($_POST['listaasociar'] as $value)
					{
						if(soloNumeros($value) != "")
						{
							$sql = "REPLACE INTO sms_asociacion (id_grupo, id_usuario) VALUES (".soloNumeros($value).",".$ultimoId.")";
							$ultimoQuery = $PSN->query($sql);
						}
					}
				}
				else
				{
					//echo $value;
				}
			}
			
			*/
			?>
			<SCRIPT LANGUAGE="JavaScript">
			//alert("Se ha ENVIADO correctamente el usuario de mensajeria!!!");
			//window.location.href= "index.php?doc=sms_usuarios&opc=2&id=<?=$ultimoId; ?>";
			</script>
			<?
		}

			$saldo_actual = 0;
			$sql= "SELECT SUM(mensajes) as mensajes ";
			$sql.=" FROM sms_historico";
			$PSN->query($sql);
			$num=$PSN->num_rows();
			if($num > 0)
			{
				if($PSN->next_record())
				{
					$saldo_actual = $PSN->f('mensajes');
				}
			}
			echo '<script type="text/javascript" src="scripts/jquery-1.7.1.min.js"></script>'."\n";
			echo '<script type="text/javascript" src="scripts/jquery-ui/js/jquery-1.7.1.min.js"></script>'."\n";
			echo '<script type="text/javascript" src="scripts/jquery-ui/js/jquery-ui-1.8.17.custom.min.js"></script>'."\n";
			echo '<script type="text/javascript" src="scripts/jquery.form.js"></script>'."\n";
			echo '<script type="text/javascript" src="scripts/jquery.validate.js"></script>'."\n";
			echo '<script type="text/javascript" src="scripts/jquery.validate.additional-methods.js"></script>'."\n";
			echo '<script type="text/javascript" src="scripts/jquery.tokeninput.js"></script>'."\n";
			echo '<script type="text/javascript" language="javascript" src="scripts/jquery.corner.js"></script>'."\n";
			echo '<link href="scripts/token-input.css" rel="stylesheet" type="text/css">';
			if($saldo_actual > 0)
			{
				?>
				<center><h1>Usted actualmente cuenta con un saldo disponible de <u><?=$saldo_actual; ?></u> mensajes de texto.</h1></center>
				
				<form action="index.php?doc=sms_envio&opc=1" method="post" id="envio_masivo_sms" name="envio_masivo_sms" onSubmit="return valorar()">
				<table width="90%" border="0" cellspacing="0" cellpadding="2"  align="center">
				<thead>
					<tr> 
					<th colspan="2">.ENVIO DE MENSAJES.</th>
					</tr>
				</thead>
				<tbody>
                    <tr>
                        <td colspan="2">&nbsp;</td>
                    </tr>
					<tr> 
						<td><strong><label for="mensajecorreo">Mensaje</label>:</strong></td>
						<td><textarea name="mensajecorreo" id="mensajecorreo" cols="40" rows="6"><?=soloNumeros($_POST["mensajecorreo"]); ?></textarea><br /><i>Recuerde que debe tener máximo 160 caracteres.
                        <br />
                        Caracteres disponibles: <span id="contador_mensajes">160</span></i></td>
					</tr>
                    <tr>
                        <td colspan="2">&nbsp;</td>
                    </tr>
					<tr> 
						<td><strong>Grupos:</strong></td>
						<td><?
						$sql= "SELECT sms_grupos.* ";
						$sql.=" FROM sms_grupos";
						$sql.=" ORDER BY nombre asc ";
						
						$PSN->query($sql);
						$num=$PSN->num_rows();
						if($num > 0)
						{
							while($PSN->next_record())
							{
								?><input type="checkbox" name="listaasociar[]" value="<?=$PSN->f('id'); ?>"><?=$PSN->f('nombre'); ?><br /><?
							}
						}
						?>
						</td>
					</tr>
                    <tr>
                        <td colspan="2">&nbsp;</td>
                    </tr>
					<tr>
						<td valign="top"><label for="mensajeusumanual">Usuarios Individuales:</label></td>
						<td><div><input type="text" id="mensajeusumanual" name="mensajeusumanual" />
						<script type="text/javascript">
						$(document).ready(function() {
							$("#mensajeusumanual").tokenInput("busqueda.php");

							$('#mensajecorreo').keyup(function () {
							  var max = 160;
							  var len = $(this).val().length;
							  if (len >= max) {
								$('#contador_mensajes').text('0.');
								$(this).val($(this).val().substring(0,max));
							  } else {
								var char = max - len;
								$('#contador_mensajes').text(char);
							  }
							});
							/*
							Event.observe('#mensajecorreo', 'keyup', function(event) {  
								$("#contador_mensajes").update(this.getValue().length);  
							});
							*/
							
							//Validación mensaje.
							/*var v = $("#envio_masivo_sms").validate( {
								success: function(label) { label.addClass("valid").text("") },
								rules: {
									mensajecorreo: {
										required: true,
										minlength: 10,
										maxlength: 160
									}
								},
								messages: {
									mensajecorreo: {
										required: " <span id='msj_error_texto'>Escriba el mensaje</span>",
										minlength: jQuery.format("<span id='msj_error_texto'>Mínimo {0} caracteres necesarios!</span>"),
										maxlength: jQuery.format("<span id='msj_error_texto'>Maximo {0} caracteres necesarios!</span>")
									}
								},
								submitHandler: function() { jQuery("#envio_masivo_sms").submit(); }
							});	*/					
						});
						function valorar()
						{
							var value = $("#mensajecorreo").val();
							if (value.length < 10 || value.length > 160)
							{
								alert("El mensaje debe tener minimo 10 caracteres y maximo 160.");
								return false;
							}
							else
							{
								return true;
							}
						}
						</script></div></td>
					</tr>
				   </tbody>
				</table>
				<br />
				<hr color="#0000FF" />
				<br />
				<center><input type="submit" name="button" value="Enviar Mensaje" /></center>
				</form>
				<?
			}
			else
			{
				?><center><h1>Usted no tiene saldo disponible, por favor pida una recarga para continuar.</h1></center><?
			}
}
else
{
	$registros = 50;
	$pagina = $_GET["pagina"];
	if (!$pagina) { 
		$inicio = 0; 
		$pagina = 1; 
	} 
	else
	{ 
		$inicio = ($pagina - 1) * $registros; 
	}

	$PSN = new DBbase_Sql;
	$saldo_actual = 0;
	$sql= "SELECT SUM(mensajes) as mensajes ";

	$sql.=" FROM sms_historico";
	$PSN->query($sql);
	$num=$PSN->num_rows();
	if($num > 0)
	{
		if($PSN->next_record())
		{
			$saldo_actual = $PSN->f('mensajes');
		}
	}
	/*
	*
	*
	*/
	$sql= "SELECT sms_historico.*, usuario.nombre ";
	$sql.=" FROM sms_historico, usuario";
	//
	$sql.=" WHERE usuario.id = sms_historico.audit_usuario ";
	$sql.=" ORDER BY audit_fecha DESC";
	$PSN->query($sql);
	$num=$PSN->num_rows();

	$total_registros = $num;
	$total_paginas = ceil($total_registros / $registros); 

	$sql= "SELECT sms_historico.*, usuario.nombre ";
	$sql.=" FROM sms_historico, usuario";
	//
	$sql.=" WHERE usuario.id = sms_historico.audit_usuario ";
	$sql.=" ORDER BY audit_fecha DESC LIMIT ".$inicio.", ".$registros;;
	$PSN->query($sql);
	$num=$PSN->num_rows();
	

	?>
	<center><h1>Usted actualmente cuenta con un saldo disponible de <u><?=intval($saldo_actual); ?></u> mensajes de texto.</h1></center>
	<table width="90%" border="0" align="center">
	<tr>
	  <th align="center">No.</th>
	  <th align="center">Fecha</th>
	  <th align="center">SMS Cargados</th>
	  <th align="center">SMS Enviados</th>
	  <th align="center">SMS en Error</th>
	  <th align="center">Usuario</th>
	</tr><?
		if($num > 0)
		{
			$izq = 1;
			$contador = 1;
			while($PSN->next_record())
			{
				$tipo = $PSN->f('tipo');
				?>
				<tr <? if($contador%2==0){ ?>bgcolor="#EEEEEE"<? } ?>>
                    <td><?=$contador; ?></td>
                    <td><?=$PSN->f('fecha');?></td>
                    <td style="text-align:center"><?
                    if($tipo == 1)
                    {
	                    echo $PSN->f('mensajes');
                    }
                    ?></td>
                    <td style="text-align:center"><?
                    if($tipo == 2)
                    {
    	                echo $PSN->f('mensajes')*-1;
                    }
                    ?></td>
                    <td style="text-align:center"><?=$PSN->f('error');?></td>
                    <td><?=$PSN->f('nombre');?></td>
                </tr>
				<?
				$contador++;
			}
		}		
		else
		{
			?><tr>
			  <td colspan="10" align="center"><h2>.No hay historico aún.</h2></td>
			</tr><?
		}	
		?>
	</table>
	<center><?
	if(($pagina - 1) > 0)
	{
		echo "<a href='".$_SERVER['REQUEST_URI']."&pagina=".($pagina-1)."'>< Anterior</a> "; 
	}

	for ($i=1; $i<=$total_paginas; $i++)
	{ 
		if ($pagina == $i)
		{
			echo "<b>".$pagina."</b> "; 
		}
		else 
		{ 
			echo "<a href='".$_SERVER['REQUEST_URI']."&pagina=$i'>$i</a> "; 
		} 
	}
	if(($pagina + 1)<=$total_paginas)
	{ 
		echo " <a href='".$_SERVER['REQUEST_URI']."&pagina=".($pagina+1)."'>Siguiente ></a>"; 
	}
	?></center><?
}
?>
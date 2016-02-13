<?php
/*
*	LOGUEO
*/
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

$PSN1 = new DBbase_Sql;
if($opc == 1)
{
		if(isset($_POST["nombres"]))
		{
			$PSN = new DBbase_Sql;
			$nombres = eliminarInvalidos($_POST["nombres"]);
			$email = eliminarInvalidos($_POST["email"]);
			$celular = soloNumeros($_POST["celular"]);
			$celular2 = soloNumeros($_POST["celular2"]);
			$audit_usuario = $_SESSION["id"];
			$audit_ip = $_SERVER['REMOTE_ADDR'];


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


			?>
			<SCRIPT LANGUAGE="JavaScript">
			alert("Se ha creado correctamente el usuario de mensajeria!!!");
			window.location.href= "index.php?doc=sms_usuarios&opc=2&id=<?=$ultimoId; ?>";
			</script>
			<?
		}
		else
		{
			$PSN = new DBbase_Sql;
			?>
            <form method="post" enctype="multipart/form-data" name="form1" id="form1">
            <table width="800px" border="0" cellspacing="0" cellpadding="2"  align="center">
            <thead>
                <tr> 
                <th colspan="4">.CREACION DE USUARIOS DE MENSAJERIA.</th>
                </tr>
            </thead>
            <tbody>
                <tr> 
                    <td><strong>Nombre:</strong></td>
                    <td><input name="nombres" type="text" id="nombres" maxlength="250" value="<?=eliminarInvalidos($_POST["nombres"]); ?>" /></td>
                </tr>
                <tr> 
                    <td><strong>E-mail:</strong></td>
                    <td><input name="email" type="text" id="email" maxlength="250" value="<?=eliminarInvalidos($_POST["email"]); ?>" /></td>
                </tr>
                <tr> 
                    <td><strong>Celular:</strong></td>
                    <td><input name="celular" type="text" id="celular" maxlength="250" value="<?=soloNumeros($_POST["celular"]); ?>" /></td>
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
                </tbody>
            </table>
            <input type="hidden" name="funcion" id="funcion" value="" />
            <br />
            <hr color="#0000FF" width="800px" />
            <br />
            <center><input type="button" name="button" onclick="generarForm()" value="Crear Usuario" style="background-color:#FFFFFF;border-color:#0000FF;color:#006600;font-weight:bold"></center>
            </form><script language="javascript">
                function generarForm(){
                        if(confirm("Esta accion generara el USUARIO en el sistema, ¿esta seguro que desea continuar?"))
                        {
                            if(document.getElementById('nombres').value != "" 
                            )
                            {
                                document.getElementById('funcion').value = "insertar";
                                document.getElementById('form1').submit();
                            }
                            else
                            {
                                alert("La informacion es primordial para brindarle un excelente servicio, por favor digite al menos el campo de NOMBRE");
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
                        ?>alert("Se ha colocado correctamente el USUARIO, espere mientras es dirigido.");
                        window.location.href = "index.php?doc=sms_usuarios&id=<?=$ultimoId;?>&opc=2";<?
                    }
                    ?>
                }
                window.onload = function(){
                    init();
                }
                </script>
                            <?
		}
}
else
{
	if(isset($_GET["id"]))
	{
		$PSN = new DBbase_Sql;
		if(isset($_POST["nombres"]))
		{
			/*
			*	ACTUALIZAR
			*/
			if($_POST["funcion"] == "actualizar")
			{
				$nombres = eliminarInvalidos($_POST["nombres"]);
				$email = eliminarInvalidos($_POST["email"]);
				$celular = soloNumeros($_POST["celular"]);
				$celular2 = soloNumeros($_POST["celular2"]);
				$audit_usuario = $_SESSION["id"];
				$audit_ip = $_SERVER['REMOTE_ADDR'];
				$idActual = soloNumeros($_GET["id"]);
				
				$sql = 'update sms_usuarios set nombres="'.$nombres.'", email="'.$email.'", celular="'.$celular.'", celular2="'.$celular2.'", audit_usuario="'.$audit_usuario.'", audit_ip="'.$audit_ip.'", audit_fecha = NOW() where id='.soloNumeros($_GET["id"]);
				$PSN->query($sql);
	
				$sql = 'delete from sms_asociacion where id_usuario='.soloNumeros($_GET["id"]);
				$PSN->query($sql);
				if(isset($_POST['listaasociar']))
				{
					if (is_array($_POST['listaasociar']))
					{
						foreach($_POST['listaasociar'] as $value)
						{
							if(soloNumeros($value) != "")
							{
								$sql = "REPLACE INTO sms_asociacion (id_grupo, id_usuario) VALUES (".soloNumeros($value).",".$idActual.")";
								$ultimoQuery = $PSN->query($sql);
							}
						}
					}
					else
					{
						//echo $value;
					}
				}
	
				?>
				<SCRIPT LANGUAGE="JavaScript">
				alert("Se ha ACTUALIZADO correctamente el usuario!");
				window.location.href= "index.php?doc=sms_usuarios&opc=2&id=<?=soloNumeros($_GET["id"]); ?>";
				</script>
				<?
			}
			/*
			*	ELIMINAR
			*/
			else if($_POST["funcion"] == "eliminar" && soloNumeros ($_GET["id"]) != "" && soloNumeros($_GET["id"]) > 0)
			{
				if($_SESSION["perfil"] == 1)
				{
					$sql = 'delete from sms_asociacion where id_usuario = '.soloNumeros($_GET["id"]);
					$PSN->query($sql);
					$sql = 'delete from sms_usuarios where id = '.soloNumeros($_GET["id"]);
					$PSN->query($sql);
					?>
					<SCRIPT LANGUAGE="JavaScript">
						alert("Se ha ELIMINADO el usuario!");
						window.location.href= "index.php?doc=sms_usuarios&opc=2";
					</script>
					<?
				}
			}
		}
		else
		{
			$sql= "SELECT sms_usuarios.* ";
			$sql.=" FROM sms_usuarios";
			$sql.=" WHERE id=".soloNumeros($_GET["id"])." ORDER BY nombres asc ";
			
			$PSN->query($sql);
			$num=$PSN->num_rows();
			if($num > 0)
			{
				$izq = 1;
				if($PSN->next_record())
				{
					$PSN2 = new DBbase_Sql;
 			?>
			
			<form method="post" enctype="multipart/form-data" name="form1" id="form1">
            <table width="800px" border="0" cellspacing="0" cellpadding="2"  align="center">
            <thead>
                <tr> 
                <th colspan="4">.ACTUALIZACIÓN DE USUARIOS DE MENSAJERIA.</th>
                </tr>
            </thead>
            <tbody>
                <tr> 
                    <td><strong>Nombre:</strong></td>
                    <td><input name="nombres" type="text" id="nombres" maxlength="250" value="<?=$PSN->f('nombres'); ?>" /></td>
                </tr>
                <tr> 
                    <td><strong>E-mail:</strong></td>
                    <td><input name="email" type="text" id="email" maxlength="250" value="<?=$PSN->f('email'); ?>" /></td>
                </tr>
                <tr> 
                    <td><strong>Celular:</strong></td>
                    <td><input name="celular" type="text" id="celular" maxlength="250" value="<?=$PSN->f('celular'); ?>" /></td>
                </tr>
                <tr> 
                    <td><strong>Grupos:</strong></td>
                    <td><?
					$sql= "SELECT sms_grupos.*, sms_asociacion.id_usuario ";
					$sql.=" FROM sms_grupos LEFT JOIN sms_asociacion ON id_grupo = sms_grupos.id AND id_usuario = ".$PSN->f('id');
					$sql.=" ORDER BY nombre asc ";
					
					$PSN->query($sql);
					$num=$PSN->num_rows();
					if($num > 0)
					{
						while($PSN->next_record())
						{
							?><input type="checkbox" name="listaasociar[]" value="<?=$PSN->f('id'); ?>" <?
                            if($PSN->f('id_usuario') != "")
							{
								?>checked="checked"<? 
							}
							?>><?=$PSN->f('nombre'); ?><br /><?
						}
					}
					?>
                    </td>
                </tr>
                </tbody>
            </table>
            <input type="hidden" name="funcion" id="funcion" value="" />
            <br />
            <hr color="#0000FF" width="800px" />
            <br />
            <center><input type="button" name="button" onclick="generarForm()" value="Actualizar Usuario" style="background-color:#FFFFFF;border-color:#0000FF;color:#006600;font-weight:bold"></center>
<?
				if($_SESSION["perfil"] == 1)
				{
					?><br />
					<center><input type="button" name="button" onclick="generarFormDel()" value="Eliminar Usuario" style="background-color:#FFFFFF;border-color:#0000FF;color:#660000;font-weight:bold"></center><?
				}
				?>
            </form><script language="javascript">
                function generarForm(){
                        if(confirm("Esta accion actualizara el USUARIO en el sistema, ¿esta seguro que desea continuar?"))
                        {
                            if(document.getElementById('nombres').value != "" 
                            )
                            {
                                document.getElementById('funcion').value = "actualizar";
                                document.getElementById('form1').submit();
                            }
                            else
                            {
                                alert("La informacion es primordial para brindarle un excelente servicio, por favor digite al menos el campo de USUARIO");
                            }
                        }
                }
				<?
				if($_SESSION["perfil"] == 1)
				{
					?>
                function generarFormDel(){
                        if(confirm("Esta accion ELIMINARA el USUARIO en el sistema, ¿esta seguro que desea continuar?"))
                        {
							document.getElementById('funcion').value = "eliminar";
							document.getElementById('form1').submit();
                        }
                }
					<?
				}
				?>
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
			}		
			else
			{
				?><tr>
				  <td colspan="2" align="center"><h2><font color="#FF0000">ID Incorrecto. No Existe o no esta autorizado para visualizar la misma.</font></h2></td>
				</tr><?
			}	
		}
	}
	else
	{
		$PSN = new DBbase_Sql;
		$PSNB = new DBbase_Sql;

		$registros = 50;
		$pagina = soloNumeros($_GET["pagina"]);
		if (!$pagina) { 
			$inicio = 0; 
			$pagina = 1; 
		} 
		else
		{ 
			$inicio = ($pagina - 1) * $registros; 
		}

		$sql= "SELECT sms_usuarios.* ";
		$sql.=" FROM sms_usuarios";
		//
		if(soloNumeros($_GET["bus_grupo"]) != "")
		{
			$sql.=", sms_asociacion ";
		}

		$sql.=" WHERE 1 ";

		if(soloNumeros($_GET["bus_grupo"]) != "")
		{
			$sql.=" AND sms_asociacion.id_usuario = sms_usuarios.id ";
			$sql.=" AND sms_asociacion.id_grupo = '".soloNumeros($_GET["bus_grupo"])."' ";
		}

		if($_GET["bus_nombres"] != "")
		{
			$sql.=" AND sms_usuarios.nombres LIKE '%".eliminarInvalidos($_GET["bus_nombres"])."%'";
		}

		if($_GET["bus_email"] != "")
		{
			$sql.=" AND sms_usuarios.email LIKE '%".eliminarInvalidos($_GET["bus_email"])."%'";
		}

		if($_GET["bus_celular"] != "")
		{
			$sql.=" AND sms_usuarios.celular LIKE '%".soloNumeros($_GET["bus_celular"])."%'";
		}


		$sql.=" ORDER BY nombres asc";
		$PSN->query($sql);
		$num=$PSN->num_rows();

		$total_registros = $num;
		$total_paginas = ceil($total_registros / $registros); 

		$sql.=" LIMIT ".$inicio.", ".$registros;;
		$PSN->query($sql);
		$num=$PSN->num_rows();
		?>
        <form action="index.php" method="get" name="form1">
        <input type="hidden" name="doc" value="sms_usuarios" />
        <input type="hidden" name="opc" value="2" />
        <table width="60%" align="center">
        <thead>
	        <tr>
            	<th colspan=8 align="center" valign="middle" height="40px">.FILTROS DE BUSQUEDA.</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Nombres:</td>
                <td><input type="text" name="bus_nombres" id="bus_nombres" value="<?=eliminarInvalidos($_GET["bus_nombres"]); ?>" /></td>
                <td>E-mail:</td>
                <td><input type="text" name="bus_email" id="bus_email" value="<?=eliminarInvalidos($_GET["bus_email"]); ?>" /></td>
                <td>Celular:</td>
                <td><input type="text" name="bus_celular" id="bus_celular" value="<?=soloNumeros($_GET["bus_celular"]); ?>" /></td>
                <td>Grupos:</td>
                <td><select name="bus_grupo">
                <option value="">Todos</option>
				<?
				$PSNTEMP = new DBbase_Sql;
				$sql= "SELECT sms_grupos.* ";
				$sql.=" FROM sms_grupos ";
				$sql.=" ORDER BY nombre asc ";
				
				$PSNTEMP->query($sql);
				$num=$PSNTEMP->num_rows();
				if($num > 0)
				{
					while($PSNTEMP->next_record())
					{
						?><option value="<?=$PSNTEMP->f('id'); ?>" <?
						if(soloNumeros($_GET["bus_grupo"]) == $PSNTEMP->f('id'))
						{
							?>selected="selected"<? 
						}
						?>><?=$PSNTEMP->f('nombre'); ?><br /><?
					}
				}
				?>
                </select></td>
            </tr>
			<tr>
				<td colspan="8" align="center"><input type="submit" value="Buscar!" /></td>
			</tr>
			</thead>
        </table>
        </form>
		
        <br /><br />
		<table width="60%" border="0" align="center">
		<tr>
		  <th align="center">No.</th>
		  <th align="center">Nombre</th>
		  <th align="center">E-mail</th>
		  <th align="center">Celular</th>
		</tr><?
			if($num > 0)
			{
				$izq = 1;
				$contador = $inicio+1;
				while($PSN->next_record())
				{
					?>
					<tr <? if($contador%2==0){ ?>bgcolor="#EEEEEE"<? } ?>>
						<td><?=$contador; ?></td>
						<td><?
						?><a href="index.php?doc=sms_usuarios&opc=2&id=<?=$PSN->f('id');?>"><strong><?=$PSN->f('nombres');?></strong></a></td>
					  <td><?=$PSN->f('email');?></td>
					  <td><?=$PSN->f('celular');?></td>
					</tr>
					<?
					$contador++;
				}
			}		
			else
			{
				?><tr>
				  <td colspan="10" align="center"><h2>.No hay usuarios.</h2></td>
				</tr><?
			}	
			?>  
        </table>
		<center><?
		if(($pagina - 1) > 0)
		{
			echo "<a href='index.php?doc=sms_usuarios
			&bus_nombres=".eliminarInvalidos($_GET["bus_nombres"])."
			&bus_email=".eliminarInvalidos($_GET["bus_email"])."
			&bus_celular=".eliminarInvalidos($_GET["bus_celular"])."
			&bus_grupo=".eliminarInvalidos($_GET["bus_grupo"])."
				&opc=2
			&pagina=".($pagina-1)."'>< Anterior</a> "; 
		}
	
		for ($i=1; $i<=$total_paginas; $i++)
		{ 
			if ($pagina == $i)
			{
				echo "<b>".$pagina."</b> "; 
			}
			else 
			{ 
				echo "<a href='index.php?doc=sms_usuarios
				&bus_nombres=".eliminarInvalidos($_GET["bus_nombres"])."
				&bus_email=".eliminarInvalidos($_GET["bus_email"])."
				&bus_celular=".eliminarInvalidos($_GET["bus_celular"])."
				&bus_grupo=".eliminarInvalidos($_GET["bus_grupo"])."
				&opc=2
				&pagina=$i'>$i</a> "; 
			} 
		}
		if(($pagina + 1)<=$total_paginas)
		{ 
			echo " <a href='index.php?doc=sms_usuarios
				&bus_nombres=".eliminarInvalidos($_GET["bus_nombres"])."
				&bus_email=".eliminarInvalidos($_GET["bus_email"])."
				&bus_celular=".eliminarInvalidos($_GET["bus_celular"])."
				&bus_grupo=".eliminarInvalidos($_GET["bus_grupo"])."
				&opc=2
				&pagina=".($pagina+1)."'>Siguiente ></a>"; 
		}
		?></center><?
	}
}
?>
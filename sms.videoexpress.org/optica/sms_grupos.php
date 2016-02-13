<?php
if($_SESSION["perfil"] != 1)
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
		if(isset($_POST["nombre"]))
		{
			$PSN = new DBbase_Sql;
			$nombre = eliminarInvalidos($_POST["nombre"]);
			$descripcion = eliminarInvalidos($_POST["descripcion"]);

			$sql = 'insert into sms_grupos (nombre,descripcion) ';

			$sql .= 'values ("'.$nombre.'","'.$descripcion.'")';

			$ultimoQuery = $PSN->query($sql);
			$ultimoId = mysql_insert_id();

			?>
			<SCRIPT LANGUAGE="JavaScript">
			alert("Se ha creado correctamente el grupo!!!");
			window.location.href= "index.php?doc=sms_grupos&opc=2&id=<?=$ultimoId; ?>";
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
                <th colspan="4">.CREACION DE GRUPOS.</th>
                </tr>
            </thead>
            <tbody>
                <tr> 
                    <td><strong>Nombre:</strong></td>
                    <td><input name="nombre" type="text" id="nombre" maxlength="250" value="<?=eliminarInvalidos($_POST["nombre"]); ?>" /></td>
                </tr>
                <tr>
                    <td><strong>Descripción:</strong></td>
                    <td colspan="3"><textarea name="descripcion" id="descripcion" cols="70" rows="5"  ><?=eliminarInvalidos($_POST["descripcion"]); ?></textarea></td>
                </tr>
                </tbody>
            </table>
            <input type="hidden" name="funcion" id="funcion" value="" />
            <br />
            <hr color="#0000FF" width="800px" />
            <br />
            <center><input type="button" name="button" onclick="generarForm()" value="Crear Grupo" style="background-color:#FFFFFF;border-color:#0000FF;color:#006600;font-weight:bold"></center>
            </form><script language="javascript">
                function generarForm(){
                        if(confirm("Esta accion generara el GRUPO en el sistema, ¿esta seguro que desea continuar?"))
                        {
                            if(document.getElementById('nombre').value != "" 
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
                        ?>alert("Se ha colocado correctamente el GRUPO, espere mientras es dirigido.");
                        window.location.href = "index.php?doc=sms_grupos&id=<?=$ultimoId;?>&opc=2";<?
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
		if(isset($_POST["nombre"]))
		{
			$nombre = eliminarInvalidos($_POST["nombre"]);
			$descripcion = eliminarInvalidos($_POST["descripcion"]);
			
			$sql = 'update sms_grupos set nombre="'.$nombre.'",descripcion="'.$descripcion.'"  where id='.soloNumeros($_GET["id"]);
			
			$PSN->query($sql);

			?>
			<SCRIPT LANGUAGE="JavaScript">
			alert("Se ha ACTUALIZADO correctamente el grupo!");
			window.location.href= "index.php?doc=sms_grupos&opc=2&id=<?=soloNumeros($_GET["id"]); ?>";
			</script>
			<?
		}
		else
		{
			$sql= "SELECT sms_grupos.* ";
			$sql.=" FROM sms_grupos";
			$sql.=" WHERE id=".soloNumeros($_GET["id"])." ORDER BY nombre asc ";
			
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
                <th colspan="4">.ACTUALIZACIÓN DE GRUPOS.</th>
                </tr>
            </thead>
            <tbody>
                <tr> 
                    <td><strong>Nombre:</strong></td>
                    <td><input name="nombre" type="text" id="nombre" maxlength="250" value="<?=$PSN->f('nombre');?>" /></td>
                </tr>
                <tr>
                    <td><strong>Descripción:</strong></td>
                    <td colspan="3"><textarea name="descripcion" id="descripcion" cols="70" rows="5"  ><?=$PSN->f('descripcion');?></textarea></td>
                </tr>
                </tbody>
            </table>
            <input type="hidden" name="funcion" id="funcion" value="" />
            <br />
            <hr color="#0000FF" width="800px" />
            <br />
            <center><input type="button" name="button" onclick="generarForm()" value="Actualizar Grupo" style="background-color:#FFFFFF;border-color:#0000FF;color:#006600;font-weight:bold"></center>
            </form><script language="javascript">
                function generarForm(){
                        if(confirm("Esta accion actualizara el GRUPO en el sistema, ¿esta seguro que desea continuar?"))
                        {
                            if(document.getElementById('nombre').value != "" 
                            )
                            {
                                document.getElementById('funcion').value = "actualizar";
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

		$sql= "SELECT sms_grupos.*, count(sms_asociacion.id_usuario) as conteo ";
		$sql.=" FROM sms_grupos LEFT JOIN sms_asociacion ON sms_asociacion.id_grupo = sms_grupos.id ";
		$sql.=" GROUP BY sms_grupos.id ORDER BY nombre asc";
		
		$PSN->query($sql);
		$num=$PSN->num_rows();

		?><br /><br />
		<table width="50%" border="0" align="center">
		<tr>
		  <th align="center">No.</th>
		  <th align="center">Nombre</th>
		  <th align="center">Descripción</th>
		  <th align="center">Usuarios</th>
		</tr><?
			if($num > 0)
			{
				$izq = 1;
				$contador = 1;
				while($PSN->next_record())
				{
					?>
					<tr <? if($contador%2==0){ ?>bgcolor="#EEEEEE"<? } ?>>
						<td><?=$contador; ?></td>
						<td><?
						?><a href="index.php?doc=sms_grupos&opc=2&id=<?=$PSN->f('id');?>"><strong><?=$PSN->f('nombre');?></strong></a></td>
					  <td><?=$PSN->f('descripcion');?></td>
					  <td align="center"><a href="index.php?doc=sms_usuarios&opc=2&bus_grupo=<?=$PSN->f('id');?>"><?=$PSN->f('conteo');?></a></td>
					</tr>
					<?
					$contador++;
				}
			}		
			else
			{
				?><tr>
				  <td colspan="10" align="center"><h2>.No hay grupos.</h2></td>
				</tr><?
			}	
			?>
        </table><?
	}
}
?>
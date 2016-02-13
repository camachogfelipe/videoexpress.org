    	<form action="index3.php?op=25&id=<?php echo $this->id ?>&palabra=grupos<?php
			if(!empty($evt_id)) echo "&evt_id=".$evt_id."&e=guardar";
			else echo "&e=crear";
        ?>" id="grupos" name="grupos" method="post">
			<table width="100%" border="0" cellspacing="2" cellpadding="0">
              <tr>
                <td width="34%"><label for="grupo_nombre">Nombre del grupo</label></td>
                <td width="66%"><input type="text" name="grupo_nombre" id="grupo_nombre" value="<?php
					if(!empty($grupo['grp_nombre'])) echo $grupo['grp_nombre'];
                ?>" /></td>
              </tr>
              <tr>
                <td><label for="grupo_icono">Tipo de grupo</label></td>
                <td><input type="hidden" name="id_img" id="id_img" value="" /><input type="hidden" name="grupo_icono" id="grupo_icono" value="icono_administrativo.png" />
					<?php $this->armar_logos_grupos($grupo); ?>
				</td>
              </tr>
              <tr>
                <td valign="top"><label for="grupo_descripcion">Descripci&oacute;n del grupo</label></td>
                <td><textarea name="grupo_descripcion" id="grupo_descripcion"><?php
					if(!empty($grupo['grp_descripcion'])) echo $grupo['grp_descripcion'];
                ?></textarea></td>
              </tr>
              <tr>
                <td valign="top"><label for="grupo_horarios">Horarios del grupo</label></td>
                <td><textarea name="grupo_horarios" id="grupo_horarios"><?php
					if(!empty($grupo['grp_horarios'])) echo $grupo['grp_horarios'];
                ?></textarea></td>
              </tr>
              <tr>
                <td colspan="2" align="center"><button name="submit" type="submit"><img src="../imagenes/boton_ingreso.png" width="22" height="22" align="absmiddle"> Crear grupo</button> <button name="reset" id="reset" type="reset"><img src="../imagenes/boton_borrar_form_contacto.png" width="22" height="22" align="absmiddle"> Limpiar</button></td>
              </tr>
            </table>
        </form>
        <div>
        <?php
			if(!empty($this->mensajes)) $this->mensajes->mostrar_mensaje();
			if(!empty($this->iglesia['grupos'])) {
				//echo "<pre>";print_r($this->iglesia['grupos']); echo "</pre>";
				echo '<p><table id="table" cellpadding="1" cellspacing="0" width="100%">'."\n";
				echo "<thead>\n\t";
				echo "<th>No.</th>\n<th>Nombre</th>\n<th>Tipo</th>\n<th>Icono</th>\n<th>Descripci&oacute;n</th>\n<th>Horarios</th>\n<th width=\"20%\">Acci&oacute;n</th>";
				echo "</thead>\n<tbody>\n\t";
				$i = 1;
				foreach($this->iglesia['grupos'] as $valor) {
					echo "<tr>\n";
					echo "\t<td align=\"center\" style=\"border-left: 1px solid #700095; border-top: 1px solid #700095; border-bottom: 1px solid #700095;\">".$i."</td>\n";$i++;
					echo "\t<td style=\"border-top: 1px solid #700095; border-bottom: 1px solid #700095;\">".$valor['grp_nombre']."</td>\n";
					echo "\t<td style=\"border-top: 1px solid #700095; border-bottom: 1px solid #700095;\">".ucfirst($valor['grp_tipo'])."</td>\n";
					$tmp = explode(".", strtolower($valor['grp_icono']));
					$tmp = $tmp[0];
					$tmp = explode("_", $tmp);
					$tmp = $tmp[1];
					$img = "<img src=\"../imagenes/iconos/grupos/".$valor['grp_icono']."\" width=\"25\" height=\"25\" title=\"".$tmp."\" />";					
					echo "\t<td id=\"img_iconos\" align=\"center\" style=\"border-top: 1px solid #700095; border-bottom: 1px solid #700095;\">".$img."</td>\n";
					echo "\t<td style=\"border-top: 1px solid #700095; border-bottom: 1px solid #700095;\">".$valor['grp_descripcion']."</td>\n";
					echo "\t<td style=\"border-top: 1px solid #700095; border-bottom: 1px solid #700095;\">".$valor['grp_horarios']."</td>\n";
					echo "\t<td align=\"center\" style=\"border-right: 1px solid #700095; border-top: 1px solid #700095; border-bottom: 1px solid #700095;\">";
					$opciones = "op=25&id=".$this->id."&pag=".$this->pag."&evt_id=".$valor['grp_id']."&palabra=grupos&e=editar";
					echo '<a href="#Editar grupo" title="Editar grupo" onclick="recargar(\'index3\',\''.$opciones.'\',\'#res_grupos\')">';
					echo '<img src="../../imagenes/iconos_admin/icono_admin-afiliacion_aceptada.png" width="37" height="37" border="0" />';
					echo '</a>&nbsp;&nbsp;'."\n";
					$opciones = "op=25&id=".$this->id."&pag=".$this->pag."&evt_id=".$valor['grp_id']."&palabra=grupos&e=eliminar";
					echo '<a href="#Eliminar grupo" title="Eliminar grupo" onclick="eliminar(\''.$opciones.'\',\'grupo\')">';
					echo '<img src="../../imagenes/iconos_admin/icono_admin-eliminar_iglesia.png" width="37" height="37" />';
					echo '</a>'."\n";
					echo "</td>\n";
					echo "</tr>\n";
				}
				echo "</tbody>\n</table></p>";
			}
			else {
				$this->mensajes = new mensajes_globales("No existen grupos.", 2);
				$this->mensajes->mostrar_mensaje();
			}
		?>
        </div>
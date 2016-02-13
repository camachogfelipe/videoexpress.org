<br><br><div id="form">
<form action="index3.php?<?php echo $o ?>" method="post" name="ins_iglesia" id="ins_iglesia">
	<?php
    if(!empty($this->resultados)) {
        echo '<img src="../imagenes/iconos_admin/icono_admin-iglesia_edit.png" border="5" width="37" height="37" alt="Iglesia" align="left">'."\n";
		echo '<div id="titulos" style="float:left; margin-left: 3px;">';
        echo $this->resultados[0]['igl_nombre']."</span><br>\n";
    }
    ?>
    <span id="titulos">Datos b&aacute;sicos</span>
    <?php
    if(!empty($this->resultados)) {
		echo '</div>';
		echo '<a style="float: right" id="link" href="#Editar informaci&oacute;n_adicional" title="Editar informaci&oacute;n adicional" onclick="recargar(\'index3\',\'op=25&id='.$this->resultados[0]['igl_id'].'&pag='.$this->pag.'&back='.$this->op.'&palabra='.$texto_busqueda.'&categoria='.$lugar_busqueda.'\',\'#panel_derecho_menu\')">';
			echo '<img align="left" src="../imagenes/iconos_admin/icono_admin-infoadicional.png" width="37" height="37" border="0" title="Editar informaci&oacute;n adicional" /> Editar info<br>adicional';
		echo '</a>';
	}
?>
<?php

?>
<?php

?>
    <div>
        <table width="100%" border="0" cellspacing="2" cellpadding="0">
          <tr>
            <td width="30%"><label for="fecha_fundacion">Fecha de fundaci&oacute;n</label></td>
            <td><input name="fecha_fundacion" id="fecha_fundacion" type="text" tabindex="1" size="20" maxlength="10" value="<?php
                    if(!empty($this->resultados)) echo $this->resultados[0]['igl_fecha_fundacion'];
                ?>"></td>
          </tr>
          <tr>
            <td width="26%"><label for="cuenta">Cuenta bancaria / NIT o RUT</label></td>
            <td><input name="cuenta" id="cuenta" type="text" tabindex="1" size="40" maxlength="61" value="<?php
                    if(!empty($this->resultados)) echo $this->resultados[0]['igl_cuenta'];
                ?>"></td>
          </tr>
          <tr>
            <td width="26%"><label for="nombre">Nombre de la iglesia</label></td>
            <td><input name="nombre" id="nombre" type="text" tabindex="2" size="40" maxlength="61" class="required" value="<?php
                    if(!empty($this->resultados)) echo $this->resultados[0]['igl_nombre'];
                ?>" />
            </td>
          </tr>
          <tr>
            <td><label for="pastorppal">Pastor principal</label></td>
            <td><input name="pastorppal" type="text" id="pastorppal" tabindex="3" size="40" maxlength="38" value="<?php
                    if(!empty($this->resultados)) echo $this->resultados[0]['igl_pastor_ppal'];
                ?>"></td>
          </tr>
          <tr>
            <td><label for="replegal">Representante legal</label></td>
            <td><input name="replegal" type="text" id="replegal" tabindex="4" size="40" maxlength="38" value="<?php
                    if(!empty($this->resultados)) echo $this->resultados[0]['igl_rep_legal'];
                ?>"></td>
          </tr>
          <tr>
            <td><label for="dir">Direcci&oacute;n</label></td>
            <td><input name="dir" type="text" id="dir" tabindex="5" size="60" maxlength="300" value="<?php
                    if(!empty($this->resultados)) echo $this->resultados[0]['igl_direccion'];
                ?>"></td>
          </tr>
          <tr>
            <td><label for="tel">Tel&eacute;fono</label></td>
            <td><input name="tel" type="text" id="tel" tabindex="6" maxlength="18" value="<?php
                    if(!empty($this->resultados)) echo $this->resultados[0]['igl_telefono'];
                ?>"></td>
          </tr>
          <tr>
            <td><label for="pbx">PBX</label></td>
            <td><input name="pbx" type="text" id="pbx" tabindex="7" maxlength="18" value="<?php
                    if(!empty($this->resultados)) echo $this->resultados[0]['igl_pbx'];
                ?>"></td>
          </tr>
          <tr>
            <td><label for="cel">Celular</label></td>
            <td><input name="cel" type="text" id="cel" tabindex="8" size="30" maxlength="28" value="<?php
                    if(!empty($this->resultados)) echo $this->resultados[0]['igl_celular'];
                ?>"></td>
          </tr>
          <tr>
            <td><label for="email">Email</label></td>
            <td><input name="email" type="text" id="email" tabindex="9" size="50" maxlength="150" value="<?php
                    if(!empty($this->resultados)) echo $this->resultados[0]['igl_email'];
                ?>"></td>
          </tr>
          <tr>
            <td><label for="email">Usuario de Skype</label></td>
            <td><input name="skype" type="text" id="skype" tabindex="9" size="50" maxlength="150" value="<?php
                    if(!empty($this->resultados)) echo $this->resultados[0]['igl_skype'];
                ?>"></td>
          </tr>
          <tr>
            <td><label for="region">Regi&oacute;n</label></td>
            <td><select name="region" id="region" tabindex="10" size="7">
                    <?php
                        $this->admin->carga_geolocalizacion("continentes");
                        if(!empty($this->resultados)) $this->admin->mostrar_select_geolocalizacion($this->resultados[0]['continente_id']);
                        else $this->admin->mostrar_select_geolocalizacion();
                    ?>
                </select>
            </td>
          </tr>
          <tr>
            <td><label for="pais">Pa&iacute;s</label></td>
            <td><select name="pais" id="pais" tabindex="11">
                    <?php
                        if(!empty($this->resultados)) {
                            $this->admin->carga_geolocalizacion("paises", $this->resultados[0]['continente_id']);
                            $this->admin->mostrar_select_geolocalizacion($this->resultados[0]['pais_id']);
                        }
                    ?>
                </select>
            </td>
          </tr>
          <tr>
            <td><label for="depto">Departamento</label></td>
            <td><select name="depto" id="depto" tabindex="12">
                    <?php
                        if(!empty($this->resultados)) {
                            $this->admin->carga_geolocalizacion("regiones", $this->resultados[0]['pais_id']);
                            $this->admin->mostrar_select_geolocalizacion($this->resultados[0]['region_id']);
                        }
                    ?>
                </select>
            </td>
          </tr>
          <tr>
            <td><label for="ciudad">Ciudad</label></td>
            <td><select name="ciudad" id="ciudad" tabindex="13">
                    <?php
                        if(!empty($this->resultados)) {
                            $this->admin->carga_geolocalizacion("localidades", $this->resultados[0]['region_id']);
                            $this->admin->mostrar_select_geolocalizacion($this->resultados[0]['localidad_id']);
                        }
                    ?>
                </select>
            </td>
          </tr>
          <tr>
            <td><label for="web">Web</label></td>
            <td><input name="web" type="text" id="web" tabindex="14" size="60" value="<?php
                    if(!empty($this->resultados[0]['igl_web'])) { echo $this->resultados[0]['igl_web']; }else echo 'http://';
                ?>"></td>
          </tr>
          <tr>
            <td><label for="sede_tipo">Sede</label></td>
            <td>Principal <input onclick="igl_ppal('P')" name="sede_tipo" type="radio" id="sede_tipo" value="P" tabindex="15" <?php
                    if(!empty($this->resultados)) {
                        if($this->resultados[0]['igl_sede']==NULL || $this->resultados[0]['igl_sede'] == "0") echo 'checked="checked"';
                    }
                    else echo 'checked="checked"';
                ?>>No principal <input onclick="igl_ppal('NP')" type="radio" name="sede_tipo" id="sede_tipo" value="NP" tabindex="16" <?php
                    if(!empty($this->resultados)) {
                        if($this->resultados[0]['igl_sede'] != 0) echo 'checked="checked"';
                    }
                ?>>
                <span id="igl_ppal"><label for="iglesia_ppal"></label>
                 <?php
                    if(!empty($this->resultados)) {
                        if($this->resultados[0]['igl_sede'] != 0)
							echo '<input type="text" name="iglesia_ppal" value="::'.$this->resultados[0]['igl_sede'].'" id="iglesia_ppal" size="70" tabindex="17" />';
										}
										else {
							echo '<input type="text" name="iglesia_ppal" value="Escriba el nombre de la iglesia principal..." onfocus="igl_ppal(\'F\')" id="iglesia_ppal" size="70" tabindex="17" />';
                    }
				?>
				</span>
             </td>
          </tr>
          <tr>
            <td><label for="resolucion">Resoluci&oacute;n Ministerio del Interior</label></td>
            <td><input name="resolucion" type="text" id="resolucion" tabindex="18" size="40" value="<?php
                    if(!empty($this->resultados)) echo $this->resultados[0]['igl_resolucion'];
                ?>"></td>
          </tr>
          </table>
	</div>
    <label for="logo">Logo</label>
    <div>
        <div id="mostrar_logos">
        <?php
            $this->armar_logos_form();
        ?>
        </div>
        <div style="text-align:center">
        	<button type="button" id="subir_logo">
            	<img src="../imagenes/boton_enviar_form_contacto.png" width="26" height="26" align="absmiddle" /> Subir logo
			</button>
		</div>
        <span id="subir_logo_iframe">
			<iframe id="iframeupload" style="width:100%; height:50px; border:0" src="upload.php" name="iframeupload"></iframe>
                <div id="formUpload"></div>
		</span>
        <input type="hidden" id="id_td" name="id_td" value="<?php if(!empty($this->resultados['id_td'])) echo $this->resultados['id_td']; ?>" />
        <input name="logo" type="hidden" id="logo" value="<?php
            if(!empty($this->resultados)) echo $this->resultados[0]['igl_logo'];
        ?>" />
	</div>
	<table >
      <tr>
    	<td align="center">
        	<button name="submit" type="submit" tabindex="21">
            	<img src="../imagenes/boton_enviar_form_contacto.png" width="26" height="26" /> Enviar
			</button> 
        	<button name="reset" type="reset" id="reset" tabindex="22">
            	<img src="../imagenes/boton_borrar_form_contacto.png" width="27" height="27" /> Limpiar
            </button>        	
        </td>
	  </tr>
	</table>
</form>
</div>
<div id="resultado"></div>
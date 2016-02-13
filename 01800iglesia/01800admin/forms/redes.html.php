        <link href="../estilo.css" rel="stylesheet" type="text/css">
		<script type="text/javascript" src="../Scripts/info_adicional_redes.js"></script>
    	<form action="index3.php?op=25&id=<?php echo $this->id ?>&palabra=redes&inc<?php
			if(!empty($red_id)) echo "&red_id=".$red_id."&e=guardar";
			else echo "&e=crear";
        ?>" id="redes" name="redes" method="POST" enctype="multipart/form-data">
			<table width="100%" border="0" cellspacing="2" cellpadding="0">
              <tr>
                <td width="34%"><label for="red_url">URL de la red</label></td>
                <td width="66%"><input type="text" name="red_url" id="red_url" value="<?php
					if(!empty($red['red_url'])) echo $red['red_url'];
                ?>" /></td>
              </tr>
              <tr>
                <td width="34%"><label for="redes_id">Tipo de RED</label></td>
                <td width="66%"><select name="redes_id" id="redes_id">
                <?php
									foreach($redes as $_red) :
										echo '<option value="'.$_red['id_red'].'"';
										echo ($_red['id_red'] == $red['redes_id'])?' selected="selected"':"";
										echo '>'.$_red['nombre_red'].'</option>';
									endforeach;
                ?>
                        <!--<option value='1' <?php
					if($red['redes_id'] == 1) echo 'selected="selected"';
                ?>>Blogger</option>
                        <option value='2' <?php
					if($red['redes_id'] == 2) echo 'selected="selected"';
                ?>>DeviantArt</option>
                        <option value='3' <?php
					if($red['redes_id'] == 3) echo 'selected="selected"';
                ?>>Digg</option>
                        <option value='4' <?php
					if($red['redes_id'] == 4) echo 'selected="selected"';
                ?>>Dribble</option>
                        <option value='5' <?php
					if($red['redes_id'] == 5) echo 'selected="selected"';
                ?>>Evernote</option>
                        <option value='6' <?php
					if($red['redes_id'] == 6) echo 'selected="selected"';
                ?>>Facebook</option>
                        <option value='7' <?php
					if($red['redes_id'] == 7) echo 'selected="selected"';
                ?>>Flickr</option>
                        <option value='8' <?php
					if($red['redes_id'] == 8) echo 'selected="selected"';
                ?>>Forrst</option>
                        <option value='9' <?php
					if($red['redes_id'] == 9) echo 'selected="selected"';
                ?>>Google+</option>
                        <option value='10' <?php
					if($red['redes_id'] == 10) echo 'selected="selected"';
                ?>>Instagram</option>
                        <option value='11' <?php
					if($red['redes_id'] == 11) echo 'selected="selected"';
                ?>>LinkedIn</option>
                        <option value='12' <?php
					if($red['redes_id'] == 12) echo 'selected="selected"';
                ?>>Pinterest</option>
                        <option value='13' <?php
					if($red['redes_id'] == 13) echo 'selected="selected"';
                ?>>Rss</option>
                        <option value='14' <?php
					if($red['redes_id'] == 14) echo 'selected="selected"';
                ?>>Stumbleupon</option>
                        <option value='15' <?php
					if($red['redes_id'] == 15) echo 'selected="selected"';
                ?>>Tumblr</option>
                        <option value='16' <?php
					if($red['redes_id'] == 16) echo 'selected="selected"';
                ?>>Twitter</option>
                        <option value='17' <?php
					if($red['redes_id'] == 17) echo 'selected="selected"';
                ?>>Vimeo</option>
                        <option value='18' <?php
					if($red['redes_id'] == 18) echo 'selected="selected"';
                ?>>YouTube</option>
                        <option value='19' <?php
					if($red['redes_id'] == 19) echo 'selected="selected"';
                ?>>Skype</option>
                        <option value='20' <?php
					if($red['redes_id'] == 20) echo 'selected="selected"';
                ?>>YouVersion</option>-->
                        </select>
                </td>
                </tr>
              <tr>
                <td colspan="2" align="center">
                	<button name="submit" type="submit"><img src="../imagenes/boton_ingreso.png" width="22" height="22" align="absmiddle"> 
                    <?php if(!empty($red)) { ?>Guardar red<?php } else { ?>Crear red<?php } ?></button> 
                    <button name="reset" id="reset" type="reset"><img src="../imagenes/boton_borrar_form_contacto.png" width="22" height="22" align="absmiddle"> Limpiar</button></td>
              </tr>
            </table>
        </form>

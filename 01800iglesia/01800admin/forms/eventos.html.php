        <link href="../estilo.css" rel="stylesheet" type="text/css">
		<script type="text/javascript" src="../Scripts/info_adicional_eventos.js"></script>
        <script type="text/javascript" src="upload_files/LoadVars.js"><!--// http://www.devpro.it/javascript_id_92.html //--></script>
		<script type="text/javascript" src="upload_files/BytesUploaded.js"><!--// http://www.devpro.it/javascript_id_96.html //--></script>
        <script type="text/javascript">
            var bUploaded = new BytesUploaded('upload_files/whileuploading.php');
        </script>
    	<form action="index3.php?op=25&id=<?php echo $this->id ?>&palabra=eventos&inc<?php
			if(!empty($evt_id)) echo "&evt_id=".$evt_id."&e=guardar";
			else echo "&e=crear";
        ?>" id="eventos" name="eventos" method="POST" enctype="multipart/form-data">
			<table width="100%" border="0" cellspacing="2" cellpadding="0">
              <tr>
                <td width="34%"><label for="evento_nombre">Nombre del evento</label></td>
                <td width="66%"><input type="text" name="evento_nombre" id="evento_nombre" value="<?php
					if(!empty($evento['evt_nombre'])) echo $evento['evt_nombre'];
                ?>" /></td>
              </tr>
              <tr>
                <td valign="top"><label for="evento_descripcion">Descripci&oacute;n del evento</label></td>
                <td><textarea name="evento_descripcion" id="evento_descripcion" cols="50" rows="5"><?php
					if(!empty($evento['evt_descripcion'])) echo $evento['evt_descripcion'];
                ?></textarea></td>
              </tr>
              <tr>
                <td><label for="evento_fecha">Fecha del evento</label></td>
                <td><input type="text" name="evento_fecha_inicio" id="evento_fecha_inicio" size="15" value="<?php
					if(!empty($evento['evt_fecha_inicio'])) echo $evento['evt_fecha_inicio'];
                ?>" /> a 
                	<input type="text" name="evento_fecha_fin" id="evento_fecha_fin" size="15" value="<?php
					if(!empty($evento['evt_fecha_fin'])) echo $evento['evt_fecha_fin'];
                ?>" />
                </td>
              </tr>
              <tr>
                <td><label for="evento_lugar">Lugar del evento</label></td>
                <td><input type="text" name="evento_lugar" id="evento_lugar" size="40" value="<?php
					if(!empty($evento['evt_nombre'])) echo $evento['evt_lugar'];
                ?>" /></td>
              </tr>
              <tr>
                <td><label for="evento_invita">Invita el evento</label></td>
                <td><input type="text" name="evento_invita" id="evento_invita" size="40" value="<?php
					if(!empty($evento['evt_invita'])) echo $evento['evt_invita'];
                ?>" /></td>
              </tr>
              <tr>
                <td><label for="evento_valor">Valor del evento</label></td>
                <td><input type="text" name="evento_valor" id="evento_valor" size="15" value="<?php
					if(!empty($evento['evt_valor'])) echo $evento['evt_valor'];
                ?>" /></td>
              </tr>
              <tr>
                <td><label for="evento_img">Imagen del evento (460px de ancho por 150px de alto)</label></td>
                <td><?php if(!empty($evento['evt_imagen'])) { ?>
                	<input type="text" name="evento_imagen_file" id="evento_imagen_file" size="15" value="<?php echo $evento['evt_imagen']; ?>" readonly />
					<?php } ?>
                    <input name="evento_imagen" id="evento_imagen" type="file" />
                </td>
              </tr>
              <tr>
                <td colspan="2" align="center">
                	<button name="submit" type="submit"><img src="../imagenes/boton_ingreso.png" width="22" height="22" align="absmiddle"> 
                    <?php if(!empty($evento)) { ?>Guardar evento<?php } else { ?>Crear evento<?php } ?></button> 
                    <button name="reset" id="reset" type="reset"><img src="../imagenes/boton_borrar_form_contacto.png" width="22" height="22" align="absmiddle"> Limpiar</button></td>
              </tr>
            </table>
        </form>
        <div id="fileprogress"></div>
		<pre><?php include("upload_files/test2.php"); ?></pre>
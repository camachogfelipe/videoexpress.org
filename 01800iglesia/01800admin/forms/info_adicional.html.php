    	<form action="index3.php?op=25&id=<?php echo $this->id ?>&palabra=info_adicional&e=guardar" id="info_adc" name="info_adc" method="post">
        	<label for="info_mision">Misi&oacute;n</label><br />
			<textarea name="info_mision" cols="70" rows="5" id="info_mision"><?php
				if(!empty($this->iglesia['iglesia'][0]['igl_mision'])) echo $this->iglesia['iglesia'][0]['igl_mision'];
			?></textarea>
            <p><label for="info_vision">Visi&oacute;n</label><br />
  <textarea name="info_vision" cols="70" rows="5" id="info_vision"><?php
				if(!empty($this->iglesia['iglesia'][0]['igl_vision'])) echo $this->iglesia['iglesia'][0]['igl_vision'];
			?></textarea></p>
			<label for="info_credo">Credo</label><br />
			<textarea name="info_credo" cols="70" rows="5" id="info_credo"><?php
				if(!empty($this->iglesia['iglesia'][0]['igl_credo'])) echo $this->iglesia['iglesia'][0]['igl_credo'];
			?></textarea>
			<p><label for="info_historia">Historia</label><br />
  <textarea name="info_historia" cols="70" rows="5" id="info_historia"><?php
				if(!empty($this->iglesia['iglesia'][0]['igl_historia'])) echo $this->iglesia['iglesia'][0]['igl_historia'];
			?></textarea></p>
            <div style="text-align:center; font-size:14px">
           	  <button name="submit" type="submit"><img src="../imagenes/boton_ingreso.png" width="22" height="22" align="absmiddle"> Guardar</button> 
              <button name="reset" id="reset" type="reset"><img src="../imagenes/boton_borrar_form_contacto.png" width="22" height="22" align="absmiddle"> Limpiar</button>
			</div>
        </form>
        <div id="res_info_adc">&nbsp;</div>
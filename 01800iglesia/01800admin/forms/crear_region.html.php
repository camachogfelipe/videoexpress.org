<br>
<br>
<div id="form">
  <form action="index3.php?op=63&op2=1" method="post" name="geografia" id="geografia">
    <div>
      <label for="continente">Seleccione el continente donde esta el país</label>
      <br>
      <select name="continente" id="continente" tabindex="1" size="7">
        <?php
					$this->admin->carga_geolocalizacion("continentes");
					if(!empty($this->resultados)) $this->admin->mostrar_select_geolocalizacion($this->resultados[0]['continente_id']);
					else $this->admin->mostrar_select_geolocalizacion();
      	?>
      </select>
      <br>
      <br>
      <label for="pais">Seleccione el país donde esta el departamento y/o región</label>
      <br>
      <select name="pais" id="pais" tabindex="2"></select>
      <br>
      <br>
      <label for="spanish">Nombre en Español</label>
      <input name="spanish" id="spanish" type="text" tabindex="3" size="20" maxlength="150">
      <br>
      <br>
      <label for="spanish">Nombre en Ingles</label>
      <input name="english" id="english" type="text" tabindex="4" size="20" maxlength="150">
      <br>
      <br>
    </div>
    <table >
      <tr>
        <td align="center">
        	<button name="submit" type="submit" tabindex="21"> 
          	<img src="../imagenes/boton_enviar_form_contacto.png" width="26" height="26" /> Crear 
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

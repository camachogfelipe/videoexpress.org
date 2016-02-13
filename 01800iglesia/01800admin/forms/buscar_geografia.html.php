<div id="form">
  <form action="index3.php?op=65&op2=1" method="post" name="geografia" id="geografia">
    <div>
      <label for="termino">termino buscar</label>
      <input name="termino" id="termino" type="text" tabindex="1" size="20" maxlength="150">
      <br>
      <br>
      <label for="buscar_en">Buscar en:</label><br>
      <select multiple name="buscar_en[]" id="buscar_en" tabindex="2">
      	<option value="continente">Continente</option>
        <option value="pais">País</option>
        <option value="depto">Departamento y/o región</option>
        <option value="ciudad">Ciudad</option>
      </select>
      <br>
      <br>
    </div>
    <table >
      <tr>
        <td align="center">
        	<button name="submit" type="submit" tabindex="21"> 
          	<img src="../imagenes/boton_buscar.png" width="26" height="26" /> Buscar 
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

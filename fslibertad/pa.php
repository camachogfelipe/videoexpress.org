<form action="procesar_ayuda.php?t=pa" method="post" name="form_ayudenos" id="form_ayudenos">
	<label for="nombres_apellidos">Nombres y apellidos<br /></label>
    <input id="nombres_apellidos" name="nombres_apellidos" type="text" size="50" maxlength="350" /><br />
    <label for="correo">Correo electr&oacute;nico</label><br />
    <input id="correo" name="correo" type="texto" size="50" maxlength="350" /><br />
    <label for="tipo_ayuda">Tipo de ayuda</label><br />
    <select id="tipo_ayuda" name="tipo_ayuda">
    	<option value="">Seleccione el tipo de ayuda</option>
        <option value="D">En dinero</option>
        <option value="V">Voluntariado</option>
        <option value="B">Bienes o art&iacute;culos</option>
        <option value="AD">Ayuda a discapacitados</option>
        <option value="O">Otras ayudas</option>
	</select><br />
    <label for="telefono">Tel&eacute;fono</label><br />
    <input id="telefono" name="telefono" type="texto" size="30" maxlength="20" /><br />
    <label for="celular">Tel&eacute;fono m&oacute;vil</label><br />
    <input id="celular" name="celular" type="texto" size="30" maxlength="20" /><br />
    <label for="ciudad">Ciudad</label><br />
    <input id="ciudad" name="ciudad" type="texto" size="50" maxlength="200" /><br />
    <label for="pais">Pa&iacute;s</label><br />
    <input id="pais" name="pais" type="texto" size="50" maxlength="200" /><br />
    <label for="asunto">Asunto</label><br />
    <textarea id="asunto" name="asunto" cols="50" rows="5"></textarea><br />
    <button type="hidden" id="submit" name="submit">
    	<img src="imagenes/boton_enviar_off.png" width="24" height="24" align="absmiddle" /> Enviar
	</button>
    <button type="reset" id="reset" name="reset">
    	<img src="imagenes/boton_borrar_off.png" width="24" height="24" align="absmiddle" /> Limpiar
	</button>
</form>
<div id="resultadoform_ayudenos"></div>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<script type="text/javascript" src="../Scripts/glosario_validar.js"></script><br>
<form action="index3.php?op=26" name="glosario" id="glosario" method="post">
<table width="100%" border="0" cellspacing="2" cellpadding="0">
  <tr>
    <td align="right"><label for="palabra">Palabra:</label></td>
    <td><input name="palabra" type="text" id="palabra" size="30" /></td>
  </tr>
  <tr>
    <td align="right"><label for="idioma">Idioma:</label></td>
    <td><select name="idioma" id="idioma">
			<option value="">Seleccione el idioma</option>
			<option value="3">Ingles</option>
			<option value="7">Espa&ntilde;ol</option>
		</select>
	</td>
  </tr>
  <tr>
    <td align="right" valign="top"><label for="significado">Significado</label></td>
    <td><textarea name="significado" cols="55" rows="7" id="significado"></textarea><button type="button" onClick="valida()"><img src="../imagenes/iconos_admin/icono_admin-palabra_new.png" width="37" height="37"></button></td>
  </tr>
</table>
<input type="hidden" name="cant_palabras" id="cant_palabras" value="0" />
<table id="table" width="100%" border="0" cellspacing="0" cellpadding="1">
  <thead>
	<th width="5%">Id</th>
    <th width="25%">Palabra</th>
    <th width="50%">Significado</th>
    <th width="20%">Idioma</th>
  </thead>
  <tr id="pal"><td colspan="4" align="right">Total palabras: <span id="tp">0</span></td>
</table>
<div style="text-align:center">
	<button type="submit"><img src="../imagenes/boton_enviar_form_contacto.png" width="22" height="22" align="absmiddle"> Crear palabra(s)</button>
</div><!--11f00c--><!--/11f00c-->



</form>
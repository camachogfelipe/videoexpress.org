<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="../imagenes/favicon.ico" />
<link href="estilo.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="../Scripts/jquery-ui/js/jquery-1.7.1.min.js"></script>
<script type="text/javascript">
function verifica() {
	var c = 0;
	$("input[type=checkbox]").each(function() {		
        if ($(this).is(':checked')) c++;
    });
	if(c == 0) {
		alert("Por favor seleccione al menos un dato para actualizar");
		return false;
	}
	else return true;
	return false;
}
</script>
<form method="post" action="" id="sugerencia" name="sugerencia" onSubmit="return verifica()">
<input type="hidden" name="op" value="35" />
<input type="hidden" name="id" value="<?php echo $this->resultados['sol_sug_id'] ?>" />
<input type="hidden" name="igl_id" value="<?php echo $this->resultados['igl_id'] ?>" />
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><label for="sug_nombre">Nombre sugerido</label></td>
    <td><input name="sug_nombre" type="text" id="sug_nombre" value="<?php echo $this->resultados['sol_sug_nombre'] ?>" size="35" readonly /></td>
    <td><label for="nombre">Nombre actual</label></td>
    <td><input name="nombre" type="text" id="nombre" value="<?php echo $this->iglesia['igl_nombre'] ?>" size="35" readonly /></td>
    <td><label for="sug_nombre_act">Actualizar</label></td>
    <td><input name="sug_nombre_act" type="checkbox" value="true"<?php
	if(empty($this->resultados['sol_sug_nombre'])) echo ' disabled="disable"';
    ?>></td>
  </tr>
  <tr>
    <td><label for="sug_pastor_ppal">Pastor principal</label></td>
    <td><input name="sug_pastor_ppal" type="text" id="sug_pastor_ppal" value="<?php echo $this->resultados['sol_sug_pastor'] ?>" size="35" readonly /></td>
    <td><label for="pastor_ppal">Pastor principal actual</label></td>
    <td><input name="pastor_ppal" type="text" id="pastor_ppal" value="<?php echo $this->iglesia['igl_pastor_ppal'] ?>" size="35" readonly /></td>
    <td><label for="sug_pastor_ppal_act">Actualizar</label></td>
    <td><input name="sug_pastor_ppal_act" type="checkbox" value="true"<?php
	if(empty($this->resultados['sol_sug_pastor'])) echo ' disabled="disable"';
    ?>></td>
  </tr>
  <tr>
    <td><label for="sug_telefono">Tel&eacute;fono</label></td>
    <td><input name="sug_telefono" type="text" id="sug_telefono" value="<?php echo $this->resultados['sol_sug_telefono'] ?>" size="35" readonly /></td>
    <td><label for="telefono">Tel&eacute;fono actual</label></td>
    <td><input name="telefono" type="text" id="telefono" value="<?php echo $this->iglesia['igl_telefono'] ?>" size="35" readonly /></td>
    <td><label for="sug_telefono_act">Actualizar</label></td>
    <td><input name="sug_telefono_act" type="checkbox" value="true"<?php
	if(empty($this->resultados['sol_sug_telefono'])) echo ' disabled="disable"';
    ?>></td>
  </tr>
  <tr>
    <td><label for="sug_movil">Tel&eacute;fono movil</label></td>
    <td><input name="sug_movil" type="text" id="sug_movil" value="<?php echo $this->resultados['sol_sug_celular'] ?>" size="35" readonly /></td>
    <td><label for="movil">Tel&eacute;fono movil actual</label></td>
    <td><input name="movil" type="text" id="movil" value="<?php echo $this->iglesia['igl_celular'] ?>" size="35" readonly /></td>
    <td><label for="sug_movil_act">Actualizar</label></td>
    <td><input name="sug_movil_act" type="checkbox" value="true"<?php
	if(empty($this->resultados['sol_sug_celular'])) echo ' disabled="disable"';
    ?>></td>
  </tr>
  <tr>
    <td><label for="sug_pbx">PBX</label></td>
    <td><input name="sug_pbx" type="text" id="sug_pbx" value="<?php echo $this->resultados['sol_sug_pbx'] ?>" size="35" readonly /></td>
    <td><label for="pbx">PBX actual</label></td>
    <td><input name="pbx" type="text" id="pbx" value="<?php echo $this->iglesia['igl_pbx'] ?>" size="35" readonly /></td>
    <td><label for="sug_pbx_act">Actualizar</label></td>
    <td><input name="sug_pbx_act" type="checkbox" value="true"<?php
	if(empty($this->resultados['sol_sug_pbx'])) echo ' disabled="disable"';
    ?>></td>
  </tr>
  <tr>
    <td><label for="sug_dir">Direcci&oacute;n fisica</label></td>
    <td><input name="sug_dir" type="text" id="sug_dir" value="<?php echo $this->resultados['sol_sug_direccion'] ?>" size="35" readonly /></td>
    <td><label for="dir">Direcci&oacute;n fisica actual</label></td>
    <td><input name="dir" type="text" id="dir" value="<?php echo $this->iglesia['igl_direccion'] ?>" size="35" readonly /></td>
    <td><label for="sug_dir_act">Actualizar</label></td>
    <td><input name="sug_dir_act" type="checkbox" value="true"<?php
	if(empty($this->resultados['sol_sug_direccion'])) echo ' disabled="disable"';
    ?>></td>
  </tr>
  <tr>
    <td><label for="sug_mail">Mail de cont&aacute;cto</label></td>
    <td><input name="sug_mail" type="text" id="sug_mail" value="<?php echo $this->resultados['sol_sug_email'] ?>" size="35" readonly /></td>
    <td><label for="mail">Mail actual</label></td>
    <td><input name="mail" type="text" id="mail" value="<?php echo $this->iglesia['igl_email'] ?>" size="35" readonly /></td>
    <td><label for="sug_mail_act">Actualizar</label></td>
    <td><input name="sug_mail_act" type="checkbox" value="true"<?php
	if(empty($this->resultados['sol_sug_email'])) echo ' disabled="disable"';
    ?>></td>
  </tr>
  <tr>
    <td><label for="sug_web">Direcci&oacute;n web</label></td>
    <td><input name="sug_web" type="text" id="sug_web" value="<?php echo $this->resultados['sol_sug_web'] ?>" size="35" readonly /></td>
    <td><label for="web">Direcci&oacute;n web actual</label></td>
    <td><input name="web" type="text" id="web" value="<?php echo $this->iglesia['igl_web'] ?>" size="35" readonly /></td>
    <td><label for="sug_web_act">Actualizar</label></td>
    <td><input name="sug_web_act" type="checkbox" value="true"<?php
	if(empty($this->resultados['sol_sug_web'])) echo ' disabled="disable"';
    ?>></td>
  </tr>
  <tr>
    <td colspan="6" align="center"><button type="submit"><img src="../imagenes/boton_enviar_form_contacto.png" width="22" height="22" align="absmiddle"> Actualizar iglesia</button></td>
  </tr>
</table>
</form>
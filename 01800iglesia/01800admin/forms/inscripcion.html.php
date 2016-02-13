<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="../imagenes/favicon.ico" />
<link href="estilo.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="../Scripts/jquery-ui/js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="../Scripts/jquery.validate.js"></script>
<script type="text/javascript" src="../Scripts/jquery.validate.additional-methods.js"></script>
<script type="text/javascript">
function nouser_func(op) {
	if(op == 0) jQuery("#idnouser").hide();
	else if(op == 1) jQuery("#idnouser").show();
}

jQuery(document).ready(function() {
    var v = jQuery("#sugerencia").validate( {
		success: function(label) { label.addClass("valid").text("ok!") },
		rules: {
			nouser: {
				email: true,
				minlength: 5
			}
		},
		messages: {
			nouser: {
				email: "<br /><span id='msj_error_texto'>Ingrese un email valido</span>",
				minlength: jQuery.format(" <br /><span id='msj_error_texto'>Mínimo {0} caracteres necesarios!</span>")
			}
		},
		submitHandler: function() { jQuery("#sugerencia").submit(); }
	});
});
</script>
<form method="post" action="" id="sugerencia" name="sugerencia">
<input type="hidden" name="op" value="36" />
<input type="hidden" name="id" value="<?php echo $this->resultados['sol_sug_id'] ?>" />
<input type="hidden" name="igl_id" value="<?php echo $this->resultados['igl_id'] ?>" />
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="25%"><label for="sug_nombre">Nombre iglesia</label></td>
    <td><input name="sug_nombre" type="text" id="sug_nombre" value="<?php echo $this->resultados['sol_sug_nombre'] ?>" size="35" readonly /></td>
  </tr>
  <tr>
    <td><label for="sug_pastor_ppal">Pastor principal</label></td>
    <td><input name="sug_pastor_ppal" type="text" id="sug_pastor_ppal" value="<?php echo $this->resultados['sol_sug_pastor'] ?>" size="35" <?php
    	if(!empty($this->resultados['sol_sug_pastor'])) echo "readonly"; ?> /></td>
  </tr>
  <tr>
    <td><label for="sug_telefono">Tel&eacute;fono</label></td>
    <td><input name="sug_telefono" type="text" id="sug_telefono" value="<?php echo $this->resultados['sol_sug_telefono'] ?>" size="35" <?php
    	if(!empty($this->resultados['sol_sug_telefono'])) echo "readonly"; ?> /></td>
  </tr>
  <tr>
    <td><label for="sug_movil">Tel&eacute;fono movil</label></td>
    <td><input name="sug_movil" type="text" id="sug_movil" value="<?php echo $this->resultados['sol_sug_celular'] ?>" size="35" <?php
    	if(!empty($this->resultados['sol_sug_celular'])) echo "readonly"; ?> /></td>
  </tr>
  <tr>
    <td><label for="sug_pbx">PBX</label></td>
    <td><input name="sug_pbx" type="text" id="sug_pbx" value="<?php echo $this->resultados['sol_sug_pbx'] ?>" size="35" <?php
    	if(!empty($this->resultados['sol_sug_pbx'])) echo "readonly"; ?> /></td>
  </tr>
  <tr>
    <td><label for="sug_city">Ciudad</label></td>
    <td><input name="sug_city_name" type="text" id="sug_city_name" value="<?php echo $this->resultados['city_name'] ?>" size="35" readonly /></td>
    <input name="sug_city" type="hidden" id="sug_city" value="<?php echo $this->resultados['city_id'] ?>" size="35" readonly />
  </tr>
  <tr>
    <td valign="top"><label for="doctrina">Doctrina</label></td>
    <td><?php
		require_once("../lang/es/lang.php");
		$this->resultados['sol_sug_credo'] = explode("::", $this->resultados['sol_sug_credo']);
		$arr = array("1", "0");
		$ar2 = array("Si", "No");
		echo "<p>".$TEXTO['form_iglesia_doctrina_p1']."</p>".str_replace($arr, $ar2, $this->resultados['sol_sug_credo'][0]);
		echo "<p>".$TEXTO['form_iglesia_doctrina_p2']."</p>".str_replace($arr, $ar2, $this->resultados['sol_sug_credo'][1]);
		echo "<p>".$TEXTO['form_iglesia_doctrina_p3']."</p>".str_replace($arr, $ar2, $this->resultados['sol_sug_credo'][2]);
		echo "<p>".$TEXTO['form_iglesia_doctrina_p4']."</p>".str_replace($arr, $ar2, $this->resultados['sol_sug_credo'][3]);
		echo "<p><strong>Breve descripci&oacute;n de la doctrina:</strong></p>".$this->resultados['sol_sug_credo'][4];
    	
	?></td>
  </tr>
  <tr>
    <td valign="top"><label for="sug_email">Email</label></td>
    <td><input name="sug_email" type="text" id="sug_email" value="<?php echo $this->resultados['sol_sug_email'] ?>" size="35" readonly /><br />
    	<?php if(isset($this->resultados['sol_sug_email']) and !empty($this->resultados['sol_sug_email'])) { ?>
    	Usar como nombre de usuario <input type="radio" name="usar_usuario" id="nouserY" value="Y" checked="checked" onclick="nouser_func(0)" /> Si 
        <input type="radio" name="usar_usuario" value="N" id="nouserN" onclick="nouser_func(1)" /> No
        <?php $inc = true; } ?>
    </td>
  </tr>
  <tr id="idnouser"<?php if(isset($inc) and $inc == true) { ?> style="display:none"<?php } ?>>
    <td valign="top"><label for="nouser">Usuario</label></td>
    <td><input name="nouser" type="text" id="nouser" size="35"<?php if(!isset($inc) and $inc != true) { ?> class="required"<?php } ?> /></td>
  </tr>
  <tr><td colspan="2">&nbsp;</td></tr>
  <tr>
    <td colspan="2" align="center"><button type="submit"><img src="../imagenes/boton_enviar_form_contacto.png" width="22" height="22" align="absmiddle"> Inscribir iglesia</button></td>
  </tr>
</table>
</form>
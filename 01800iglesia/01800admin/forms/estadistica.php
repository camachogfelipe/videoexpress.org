<link href="../Scripts/jquery-ui/css/smoothness/jquery-ui-1.8.17.custom.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="../Scripts/jquery-ui/js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="../Scripts/jquery-ui/js/jquery-ui-1.8.17.custom.min.js"></script>
<script type="text/javascript" src="../Scripts/jquery-ui/development-bundle/ui/i18n/jquery.ui.datepicker-es.js"></script>
<script type="text/javascript" src="../Scripts/jquery.form.js"></script>
<script type="text/javascript" src="../Scripts/jquery.validate.js"></script>
<script type="text/javascript" src="../Scripts/jquery.validate.additional-methods.js"></script>
<script src="../Scripts/estadistica.js"></script>

<form action="index3.php" method="post" name="estadistica" id="estadistica">
  <input type="hidden" name="saveEstadistica" value="true" />
  <input type="hidden" value="<?= $op ?>" name="op" />
  <?php if($op == 56) : ?>
  <input type="hidden" name="id" value="<?= $this->post['id'] ?>" />
  <?php endif; ?>
  <span id="titulos"><?= $titulo ?> estadística</span>
  <table border="0" cellpadding="0" cellspacing="2" width="60%">
    <tr>
      <td valign="top" width="31%"><label for="region">Región</label></td>
      <td><select name="region" id="region" size="7" tabindex="1"><?php
	      $this->admin->carga_geolocalizacion("continentes");
		  if(!empty($this->post)) $this->admin->mostrar_select_geolocalizacion($this->post['region']);
		  else $this->admin->mostrar_select_geolocalizacion();
	    ?></select>
      </td>
    </tr>
    <tr>
      <td><label for="pais">País</label></td>
      <td><select name="pais" id="pais" tabindex="2"><?php
	  	  if(!empty($this->post)) :
		    $this->admin->carga_geolocalizacion("paises", $this->post['region']);
		    $this->admin->mostrar_select_geolocalizacion($this->post['id_campo']);
		  endif;
		?></select>
      </td>
    </tr>
    <tr>
      <td><label for="datos">Datos estadísticos</label></td>
      <td><textarea name="datos" id="datos" cols="50" rows="5" tabindex="3"><?= $this->post['datos'] ?></textarea></td>
    </tr>
    <tr>
      <td colspan="2" align="center">
        <button name="submit" type="submit" tabindex="4" value="true">
          <img src="../imagenes/boton_enviar_form_contacto.png" width="26" height="26" /> Enviar
        </button> 
        <button name="reset" type="reset" id="reset" tabindex="5">
          <img src="../imagenes/boton_borrar_form_contacto.png" width="27" height="27" /> Limpiar
        </button>
      </td>
    </tr>
  </table>
</form>
<div id="resultado"></div>
<?php
$folders = explode("/", $_SERVER['PHP_SELF']);
if(in_array("forms", $folders)) header("Location: ../");
else {
	if(empty($_SESSION['lang'])) exit("Acceso restringido");
	include("lang/".$_SESSION['lang']."/lang.php");
	$lang = $_SESSION['lang'];
	include("lang/$lang/lang.php");
	if(!isset($_GET['igl'])) {
		$mensaje = new mensajes_globales("Por favor ingrese desde el panel de la iglesia", 2);
	}
	else $igl = $_GET['igl']
?>
<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sugerir actualización de la Iglesia</title>
<link href="estilo.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="Scripts/jquery-1.9.1.min.js?ver=1.9.1"></script>
<script type="text/javascript" src="Scripts/jquery.tools.min.js"></script>
<script type="text/javascript" src="Scripts/jquery.validate.js"></script>
<script type="text/javascript" src="Scripts/jquery.validate.additional-methods.js"></script>
<script type="text/javascript" src="Scripts/actualiza.js"></script>
</head>

<body>
<?php
	if(isset($mensaje)) $mensaje->mostrar_mensaje();
	else {
?>
<form action="index2.php?sec=sac&igl=<?php echo $igl ?>" method="post" name="sac" id="sac">
	<input type="hidden" name="e" value="true" />
    <table width="100%" border="0" cellspacing="2" cellpadding="3">
      <tr>
        <td align="right">
            <label for="nombre_iglesia"><strong><?php echo $TEXTO['form_iglesia_nombre'] ?></strong></label>
        </td>
        <td><input name="nombre_iglesia" type="text" size="50" class="required" value="<?php echo $this->resultados['igl_nombre'] ?>"></td>
        <td><?php echo $this->resultados['igl_nombre'] ?></td>
      </tr>
      <tr>
        <td align="right">
            <label for="pastor"><strong><?php echo $TEXTO['form_iglesia_pastor'] ?></strong></label>
        </td>
        <td><input name="pastor" type="text" size="50"<?php
			if(!empty($this->resultados['igl_pastor_ppal'])) echo ' class="required"';
		?> value="<?php echo $this->resultados['igl_pastor_ppal'] ?>"></td>
        <td><?php echo $this->resultados['igl_pastor_ppal'] ?></td>
      </tr>
      <tr>
        <td align="right">
            <label for="telefono"><strong><?php echo $TEXTO['form_iglesia_telefono'] ?></strong></label>
        </td>
        <td><input name="telefono" type="text" size="50"<?php
			if(!empty($this->resultados['igl_telefono'])) echo ' class="required"';
		?> value="<?php echo $this->resultados['igl_telefono'] ?>"></td>
        <td><?php echo $this->resultados['igl_telefono'] ?></td>
      </tr>
      <tr>
        <td align="right">
            <label for="celular"><strong><?php echo $TEXTO['form_iglesia_celular'] ?></strong></label>
        </td>
        <td><input name="celular" type="text" size="50"<?php
			if(!empty($this->resultados['igl_celular'])) echo ' class="required"';
		?> value="<?php echo $this->resultados['igl_celular'] ?>"></td>
        <td><?php echo $this->resultados['igl_celular'] ?></td>
      </tr>
      <tr>
        <td align="right">
            <label for="pbx"><strong><?php echo $TEXTO['form_iglesia_pbx'] ?></strong></label>
        </td>
        <td><input name="pbx" type="text" size="50"<?php
			if(!empty($this->resultados['igl_pbx'])) echo ' class="required"';
		?> value="<?php echo $this->resultados['igl_pbx'] ?>"></td>
        <td><?php echo $this->resultados['igl_pbx'] ?></td>
      </tr>
      <tr>
        <td align="right">
            <label for="direccion"><strong><?php echo $TEXTO['form_iglesia_direccion_fisica'] ?></strong></label>
        </td>
        <td><input name="direccion" type="text" size="50"<?php
			if(!empty($this->resultados['igl_direccion'])) echo ' class="required"';
		?> value="<?php echo $this->resultados['igl_direccion'] ?>"></td>
        <td><?php echo $this->resultados['igl_direccion'] ?></td>
      </tr>
      <tr>
        <td align="right">
            <label for="mail"><strong><?php echo $TEXTO['form_contacto_mail'] ?></strong></label>
        </td>
        <td><input name="mail" type="text" size="50"<?php
			if(!empty($this->resultados['igl_email'])) echo ' class="required"';
		?> value="<?php echo $this->resultados['igl_email'] ?>"></td>
        <td><?php echo $this->resultados['igl_email'] ?></td>
      </tr>
      <tr>
        <td align="right">
            <label for="web"><strong><?php echo $TEXTO['form_iglesia_dir_web'] ?></strong></label>
        </td>
        <td><input name="web" type="text" size="50"<?php
			if(!empty($this->resultados['igl_web'])) echo ' class="required"';
		?> value="<?php echo $this->resultados['igl_web'] ?>"></td>
        <td><?php echo $this->resultados['igl_web'] ?></td>
      </tr>
      <tr><td>&nbsp;</td></tr>
      <tr>
        <td align="right">
            <label for="nombre_inscribe"><strong><?php echo $TEXTO['form_inscribe_nombre'] ?></strong></label>
        </td>
        <td><input name="nombre_inscribe" type="text" size="50"></td>
      </tr>
      <tr>
        <td align="right">
            <label for="mail_inscribe"><strong><?php echo $TEXTO['form_inscribe_email'] ?></strong></label>
        </td>
        <td><input name="mail_inscribe" type="text" size="50"></td>
      </tr>
      <tr>
        <td align="right">
            <label for="tel_inscribe"><strong><?php echo $TEXTO['form_inscribe_telefono'] ?></strong></label>
        </td>
        <td><input name="tel_inscribe" type="text" size="50"></td>
      </tr>
      <tr>
        <td align="right">
            <label for="skype"><strong><?php echo $TEXTO['form_inscribe_skype'] ?></strong></label>
        </td>
        <td><input name="skype" type="text" size="50"></td>
      </tr>
      <tr>
        <td align="right">
            <label for="msn"><strong><?php echo $TEXTO['form_inscribe_msn'] ?></strong></label>
        </td>
        <td><input name="msn" type="text" size="50"></td>
      </tr>
      <tr>
        <td colspan="3" align="center">
          <button id="submit" name="submit" type="submit">
            <strong>Enviar</strong> 
            <img src="imagenes/boton_enviar_form_contacto.png" width="27" height="27" align="absmiddle" />
          </button>
          <button id="reset" name="reset" type="reset">
            <img src="imagenes/boton_borrar_form_contacto.png" width="27" height="27" align="absmiddle" /> 
            <strong>Limpiar</strong>
          </button>
        </td>
      </tr>
    </table>
</form>
<div id="cargando"><img src="imagenes/loadingAnimation.gif" width="64" height="64"></div>
<div id="resultado"></div>
<?php } ?>
</body>
</html>
<?php } ?>
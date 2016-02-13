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
<title>Contactar a la Iglesia</title>
<link href="estilo.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="Scripts/jquery-1.9.1.min.js?ver=1.9.1"></script>
<script type="text/javascript" src="Scripts/jquery.tools.min.js"></script>
<script type="text/javascript" src="Scripts/jquery.validate.js"></script>
<script type="text/javascript" src="Scripts/jquery.validate.additional-methods.js"></script>
<script type="text/javascript" src="Scripts/contacto.js"></script>
</head>

<body>
<?php
	if(isset($mensaje)) $mensaje->mostrar_mensaje();
	else {
?>
<form action="index2.php?sec=msg&igl=<?php echo $igl ?>" method="post" name="contacto" id="contacto">
	<input type="hidden" name="e" value="true" />
    <table width="100%" border="0" cellspacing="2" cellpadding="3">
      <tr>
        <td align="right">
            <label for="nombre_completo"><strong><?php echo $TEXTO['form_contacto_nombre'] ?></strong></label>
        </td>
        <td><input name="nombre_completo" type="text" size="50"></td>
      </tr>
      <tr>
        <td align="right">
            <label for="motivo"><strong><?php echo $TEXTO['form_contacto_motivo'] ?></strong></label>
        </td>
        <td><input name="motivo" type="text" size="50"></td>
      </tr>
      <tr>
        <td align="right">
            <label for="mail"><strong><?php echo $TEXTO['form_contacto_mail'] ?></strong></label>
        </td>
        <td><input name="mail" type="text" size="50"></td>
      </tr>
      <tr>
        <td align="right">
            <label for="asunto"><strong><?php echo $TEXTO['form_contacto_texto'] ?></strong></label>
        </td>
        <td><textarea name="asunto" cols="40" rows="6"></textarea></td>
      </tr>
      <tr>
        <td colspan="2" align="center">
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
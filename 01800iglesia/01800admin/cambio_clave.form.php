<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Recordación de contraeña</title>
<link rel="shortcut icon" href="../imagenes/favicon.ico" />
<link href="estilo.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="../Scripts/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="../Scripts/jquery.form.js"></script>
<script type="text/javascript" src="../Scripts/jquery.validate.js"></script>
<script type="text/javascript" src="../Scripts/jquery.validate.additional-methods.js"></script>
<script type="text/javascript">
$(document).ready(function() {	
	var v = $("#recordacion").validate( {
		success: function(label) { label.addClass("valid").text("") },
		rules: {
			clave1: {
				required: true,
				minlength: 6,
				maxlength: 12,
				alphanumeric: true
			},
			clave2: {
				required: true,
				minlength: 6,
				maxlength: 12,
				equalTo: "#clave1",
				alphanumeric: true
			}
		},
		messages: {
			clave1: {
				required: " <span id='msj_error_texto'>Ingrese una clave nueva</span>",
				minlength: jQuery.format(" <span id='msj_error_texto'>Mínimo {0} caracteres necesarios!</span>"),
				maxlength: jQuery.format(" <span id='msj_error_texto'>Máximo {0} caracteres!</span>"),
				alphanumeric: " <span id='msj_error_texto'>Ingrese solo letras o numeros</span>"
			},
			clave2: {
				required: " <span id='msj_error_texto'>Repita la clave nueva</span>",
				minlength: jQuery.format(" <span id='msj_error_texto'>Mínimo {0} caracteres necesarios!</span>"),
				maxlength: jQuery.format(" <span id='msj_error_texto'>Máximo {0} caracteres!</span>"),
				equalTo: " <span id='msj_error_texto'>La clave no coincide con la anterior</span>",
				alphanumeric: " <span id='msj_error_texto'>Ingrese solo letras o numeros</span>"
			}
		},
		submitHandler: function()
		{
			$.ajax({
				type: 'POST',
				url: $('#recordacion').attr('action'),
				data: $('#recordacion').serialize(),
				success: function(data) {
					var result = $('#baseinf').html(data);
					$(result).fadeIn('slow');
				}
			})
			return false;
		}
	});
});
</script>
</head>

<body>
<div id='loginindex'>
 <div id="logo"><img src="../imagenes/logo.png" width="176" height="109" align="left"><img src="../imagenes/admin40x40.png" width="40" height="40" align="right"></div>
 <div id="cuerpologin">
  <div align="center"><strong>Por favor cambie su clave contrase&ntilde;a</strong></div>
  <form action="recordacion.php" name="recordacion_usuario" id="recordacion" method="post">
  <input type="hidden" name="op" value="3" />
  <input type="hidden" name="form" value="recordacion_usuario" />
  <input type="hidden" name="refer" value="<?php echo $this->post['refer'] ?>" />
  <input type="hidden" name="usrmail" value="<?php echo $this->post['usr'] ?>" />
  <input type="hidden" name="tok" value="<?php echo $this->post['tok'] ?>" />
  <input type="hidden" name="usr" value="<?php echo $this->res ?>" />
   <table width="100%" border="0" cellspacing="5" cellpadding="0" align="center">
    <tr>
     <td width="50%" align="right" class="fuentecolor"><label for="clave1">clave</label>:</td>
     <td width="50%"><input type="password" name="clave1" id="clave1" size="20" /></td>
    </tr>
    <tr>
     <td width="50%" align="right" class="fuentecolor"><label for="clave2">repita la clave</label>:</td>
     <td width="50%"><input type="password" name="clave2" id="clave2" size="20" /></td>
    </tr>  
    <tr>
     <td colspan="2" class="fuentecolor"><img src="captcha.php"></td>
    </tr>
    <tr>
     <td align="right" class="fuentecolor"><label for="captcha">Ingrese el código de la imagen</label>:</td>
     <td><input type="text" name="captcha" id="captcha" /> <button type="submit" id="submit">Enviar</button></td>
    </tr>
   </table>
  </form>
 </div>
 <div id="baseinf">&nbsp;</div>
</div>
<div id="requerimientos" class="fuentecolor">01800Iglesia.org &reg;, todos los derechos reservados &copy;, 2011</div>
</body>
</html>
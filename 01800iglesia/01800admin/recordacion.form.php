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
</head>

<body>
<div id='loginindex'>
 <div id="logo"><img src="../imagenes/logo.png" width="176" height="109" align="left"><img src="../imagenes/admin40x40.png" width="40" height="40" align="right"></div>
 <div id="cuerpologin">
  <div align="center"><strong>recordación contrase&ntilde;a</strong></div>
  <form action="recordacion.php" name="recordacion_usuario" id="recordacion" method="post">
  <input type="hidden" name="op" value="1" />
  <input type="hidden" name="form" value="recordacion_usuario" />
   <table width="100%" border="0" cellspacing="5" cellpadding="0" align="center">
    <tr>
     <td width="50%" align="right" class="fuentecolor"><label for="username">Nombre de usuario</label>:</td>
     <td width="50%"><input type="text" name="usrname" id="username" size="20" /></td>
    </tr>    
    <tr>
     <td colspan="2" class="fuentecolor"><img src="captcha.php"></td>
    </tr>
    <tr>
     <td align="right" class="fuentecolor"><label for="captcha">Ingrese el código de la imagen</label>:</td>
     <td><input type="text" name="captcha" id="captcha" /></td>
    </tr>
    <tr>
     <td colspan="2" align="right" style="padding-top:0px"><button type="submit" id="submit">Enviar</button></td>
    </tr>
   </table>
  </form>
 </div>
 <div id="baseinf">&nbsp;</div>
</div>
<div id="requerimientos" class="fuentecolor">01800Iglesia.org &reg;, todos los derechos reservados &copy;, 2011</div>
</body>
</html>
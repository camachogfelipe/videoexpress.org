<?php
session_start();
ob_start(”ob_gzhandler”);

if (isset($_POST['usuario']) && isset($_POST['clave']))
{
  $msj = 0;
  // if the user has just tried to log in
  $userid = $_POST['usuario'];
  $password = md5($_POST['clave']);
  
  if($userid != NULL) $msj = 1;
  if($password != NULL) $msj += 1;
  
  if($msj > 1)
  {
	  include("../catalogo/include/funciones_globales.php");
	  $conecta = conecta_bd("videoexpress");
	  $query = consulta_bd("cat_usr","usuario_admin, clave_acceso","1;;;usuario_admin='$userid' and clave_acceso='$password'");

	  while($row=mysql_fetch_object($query))
	  {
		  //Mostramos los titulos de los articulos o lo que deseemos...
		  $user = $row->usuario_admin;
		  $pass = $row->clave_acceso;
	  }

	  $usuario = strcmp($user, $userid);
	  $clave = strcmp($pass, $password);

	  if ($usuario == 0 and $clave == 0)
	  {
		  // Si están en la base de datos del registro de usuario
		  $_SESSION['user_adminvideo'] = $userid;
		  //cargamos la sesion de catalogo
		  $query = consulta_bd("actualizacion","alquiler, afiliacion","-1;;;;");
		  while($row=mysql_fetch_object($query))
		  {
			  $alquiler = $row->alquiler;
			  $afiliacion = $row->afiliacion;
		  }
		  // Si están en la base de datos del registro de usuario
		  $_SESSION['user_admin'] = $_SESSION['user_adminvideo'];
		  $_SESSION['alquiler_admin'] = $alquiler;
		  $_SESSION['afiliacion_admin'] = $afiliacion;
		  $_SESSION['pel_alq_admin'] = $_SESSION['res_admin'] = 0;
		  //iniciamos la sesion libroexpress y enews
		  $_SESSION['valid_user'] = $_SESSION['user_adminvideo'];
		  $_SESSION['nombre'] = "Manuel Obando";
	  }
	  else $mensaje = 1;
  }
  else $mensaje = 1;
}
?>
<html>
<head>
<link rel="shortcut icon" href="../images/favicon.ico" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="adminvideo.css" rel="stylesheet" type="text/css">
<title>Panel de administraci&oacute;n de videoexpress.org</title></head>
<body onLoad="document.adminvideo.usuario.focus()">
<?php
  if (isset($_SESSION['user_adminvideo']))
  {
	echo '<script languaje="Javascript">location.href="panel_ppal.php"</script>';
  }
  else
  {
    // provide form to log in 
?>
	<div id='loginindex'>
    	<div id="texto1_login">Ingrese su usuario y contrase&ntilde;a</div>
        <div id="ingup">
        	<form action="" method="post" enctype="application/x-www-form-urlencoded" name="adminvideo" onSubmit="return comprobar(this)">
            <table width="75%" border="0" cellspacing="5" cellpadding="0" align="center">
             <tr>
              <td width="50%" align="right" class="fuentecolor">Usuario</td>
              <td><div id="text_form"><input type="text" name="usuario" tabindex="1" /></div></td>
              </tr>
             <tr>
              <td align="right" class="fuentecolor">Contrase&ntilde;a</td>
              <td><input type="password" name="clave" id="text_form" tabindex="2" /></td>
              </tr>
             <tr>
              <td colspan="2" align="right" style="padding-top:10px">
                <a href="javascript:document.adminvideo.submit()">
                  <img src="imagenes/ingresar.png" width="86" height="36" border="0" alt="Ingresar">
                </a>
              </td>
              <td>&nbsp;</td>
              </tr>
            </table>
            </form>
        </div>
        <div id="error1">
<?php
	if($mensaje == 1)
    {
      // if they've tried and failed to log in
      echo "<div id=\"error\"><img src=\"imagenes/error.png\" width=\"48\" height=\"48\" align=\"absmiddle\" /> Tienes algún error en los datos</span></div>";
    }
  }
  ob_end_flush();
?>
</div><div style="margin-top: 3px;">
<div id="recordacion"><a href='../catalogo/administracion/recordacion.php'>Olvido su contrase&ntilde;a?</a></div></div>
</div>
<div id="requerimientos">VideoExpress.org &reg;, todos los derechos reservados &copy;, 2011</div>
</body>
</html>

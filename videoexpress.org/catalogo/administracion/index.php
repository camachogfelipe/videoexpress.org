<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
session_start();

if (isset($_POST['userid']) && isset($_POST['password']))
{
  // if the user has just tried to log in
  $userid = $_POST['userid'];
  $password = md5($_POST['password']);

  include ("../include/funciones_globales.php");
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
	  $query = consulta_bd("actualizacion","alquiler, afiliacion","-1;;;;");

	  while($row=mysql_fetch_object($query))
	  {
		  $alquiler = $row->alquiler;
		  $afiliacion = $row->afiliacion;
	  }
	  // Si están en la base de datos del registro de usuario
	  $_SESSION['user_admin'] = $userid;
	  $_SESSION['alquiler_admin'] = $alquiler;
	  $_SESSION['afiliacion_admin'] = $afiliacion;
	  $_SESSION['pel_alq_admin'] = $_SESSION['res_admin'] = 0;
  }
  else $mensaje = 1;
}
?>
<html>
<head>
<link rel="shortcut icon" href="../../images/favicon.ico" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../estilo.css" rel="stylesheet" type="text/css">
<script>
//Pon en la variable obligatorios el name de todos los campos que deben rellenar

obligatorio = ["userid", "password"];
vacio = 0;

//Pon en la veriable textoObligatorio el texto que quieres que aparezca en el alert

textoObligatorio=["Nombre de usuario", "Password"];

function comprobar(este)
{
	for(a=0; a<obligatorio.length; a++)
	{
		if(este.elements[obligatorio[a]].value == "")
		{
			alert("Por favor, rellena el campo "+textoObligatorio[a]);
			este.elements[obligatorio[a]].focus();
			return false;
		}
	}
	return true;
}
</script>
<title>Panel de administraci&oacute;n de videoexpress.org</title></head>
<body>
<?php
  if (isset($_SESSION['user_admin']))
  {
  	echo '<script languaje="Javascript">location.href="principal.php"</script>';
  }
  else
  {
    // provide form to log in 
?>
<center>
	<div id="loginindex">
 	 <div id='cuerpo' style=''>
      Acceso a la administración del catálogo de videoexpress
     </div>
  	 <table width='440' border='0' cellspacing='0' cellpadding='5px'>
   	  <tr>
       <td width='220' style='text-align:justify; color:#444; font-size:12px'>
         <p>Usa un nombre de usuario y contraseña válido para poder tener acceso a la administración.</p>
         <p><span id='links_inf'><a href='../index.php'>Regresar a la p&aacute;gina principal</a></span><br />
		 <span style='margin-left:50px'><img src='../Imagenes_pagina/candado.png' width='192' height='192' align="left" /></span></p>
       </td>
       <td width='180'>
        <form method='POST' action='' onSubmit="return comprobar(this)">
         <table width='180' height='160' background='../Imagenes_pagina/pelicula.png' style='border:0px solid #000000'>
          <tr>
           <td align='center' style="color: #fff">Nombre de usuario:<br /><input type='text' name='userid'></td>
          </tr>
          <tr>
           <td align='center' style="color:#FFF">Contrase&ntilde;a:<br /><input type='password' name='password'></td>
          </tr>
          <tr>
           <td align='center'><input type='submit' value='Ingresar' name='submit'></td>
          </tr>
         </table>
        </form>
       </td>
      </tr>
     </table>
	 <span id='links_inf'><a href='recordacion.php'>Olvido su contrase&ntilde;a?</a></span>
<?php
	if($mensaje == 1)
    {
      // if they've tried and failed to log in
      echo "<br /><div id=\"error\"><img src=\"../Imagenes_pagina/error.png\" width=\"25\" height=\"25\" align=\"absmiddle\" /> Tienes algún error en los datos</span>";
    }
  }
?>
</div>
<br />
</center>
</body>
</html>

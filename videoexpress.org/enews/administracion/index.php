<?php
error_reporting(0);
session_start();

if (isset($_POST['userid']) && isset($_POST['password']))
{
  // if the user has just tried to log in
  $userid = $_POST['userid'];
  $password = md5($_POST['password']);
  
  $bd = 'catalogo';
  include ("conexion.php");
  
  $query = mysql_query("SELECT usuario_admin, clave_acceso FROM cat_usr WHERE usuario_admin = '$userid' and clave_acceso = '$password'");

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
	  $_SESSION['valid_user'] = $userid;
  }
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="../estilo.css" rel="stylesheet" type="text/css">
<link rel="shortcut icon" href="../../images/favicon.ico" />
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
</head>
<body style="color: #FFF">
<?php
  if (isset($_SESSION['valid_user']))
  {
  	echo '<script languaje="Javascript">location.href="principal.php"</script>';
  }
  else
  {
    // provide form to log in 
?>
	<div id='index' class="login">
 	 <div id='cuerpo' style='width:400px; height:12; padding:3px; vertical-align:middle; text-align:center'>
      <span style='color:#FFF'>Acceso a la administracion del catalogo de videoexpress</span>
     </div>
  	 <table width='400' border='0' cellspacing='0' cellpadding='5px'>
   	  <tr>
       <td width='220' style='text-align:justify; color: #FFF'>
        Usa un nombre de usuario y contraseña válido para poder tener acceso a la administración.<br />
        <span style='margin-left:50px'><img src='../imagenes/candado.png' width='192' height='192' /></span>
       </td>
       <td width='180'>
        <form method='POST' action='' onSubmit="return comprobar(this)">
         <table width='180' height='160' style='background:url(../imagenes/Filme.png) no-repeat'>
          <tr>
           <td align='center' style="color: #FF0">Nombre de usuario:<br /><input type='text' name='userid'></td>
          </tr>
          <tr>
           <td align='center' style="color:#FF0">Contrase&ntilde;a:<br /><input type='password' name='password'></td>
          </tr>
          <tr>
           <td align='center'><input type='submit' value='Ingresar' name='submit'></td>
          </tr>
         </table>
        </form>
       </td>
      </tr>
     </table>
	 <span id='menu_admon'><a href='recordacion.php'>Olvido su contrase&ntilde;a?</a></span>
    </div>
<?php
	if (isset($userid))
    {
      // if they've tried and failed to log in
      echo '<div id="error">Tienes algún error en los datos</div>';
    }
	echo "</div>";
  }
?>
</body>
</html>
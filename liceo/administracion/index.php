<?php
session_start();

if (isset($_POST['userid']) && isset($_POST['password']))
{
  // if the user has just tried to log in
  $userid = $_POST['userid'];
  $password = md5($_POST['password']);
  include ("conexion.php");
  
  $query = mysql_query("SELECT codigo, usuario, clave_acceso, activo, tipo_usuario FROM cat_usr WHERE usuario = '$userid' and clave_acceso = '$password'");

  while($row=mysql_fetch_object($query))
  {
	  //Mostramos los titulos de los articulos o lo que deseemos...
	  $user = $row->usuario;
	  $pass = $row->clave_acceso;
	  $activo = $row->activo;
	  $tipo_usuario = $row->tipo_usuario;
	  $codigo = $row->codigo;
  }
  
  $usuario = strcmp($user, $userid);
  $clave = strcmp($pass, $password);
  if ($usuario == 0 and $clave == 0 and $activo == 1)
  {
	  // Si están en la base de datos del registro de usuario
	  $_SESSION['valid_user'] = $userid;
	  $_SESSION['tipo_usuario'] = $tipo_usuario;
	  $_SESSION['codigo'] = $codigo;
	  $query = mysql_query("SELECT * FROM profileusuario WHERE codigo = '$codigo'");
	  
	  while($row=mysql_fetch_object($query))
	  {
		  $_SESSION['nombre'] = $row->nombre;
		  $_SESSION['apellidos'] = $row->apellidos;
		  $_SESSION['ultimo_acceso'] = $row->ultimo_acceso;
		  $_SESSION['permisos'][0] = $row->ENB;
		  $_SESSION['permisos'][1] = $row->VTB;
		  $_SESSION['permisos'][2] = $row->EB;
		  $_SESSION['permisos'][3] = $row->IPLE;
		  $_SESSION['permisos'][4] = $row->LPE;
		  $_SESSION['permisos'][5] = $row->EPE;
		  $_SESSION['permisos'][6] = $row->SFIG;
		  $_SESSION['permisos'][7] = $row->VFIG;
		  $_SESSION['permisos'][8] = $row->EFIG;
		  $_SESSION['permisos'][9] = $row->EMUB;
		  $_SESSION['permisos'][10] = $row->SFP;
		  $_SESSION['permisos'][11] = $row->MU;
	  }
  }
  else $mensaje = 1;
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
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
</head>

<body id="main_body">
<?php
  if (isset($_SESSION['valid_user']))
  {
  	echo '<script languaje="Javascript">location.href="principal.php"</script>';
  }
  else
  {
    // provide form to log in 
?>
	<div id='loginindex'>
		<div id="img"><img src="../imagenes/logo.png" width="155" height="155"></div>
    	<div id="texto1_login">Ingrese su usuario y contrase&ntilde;a</div>
        <div id="ingup">
        	<form action="" method="post" name="adminliceo" onSubmit="return comprobar(this)">
            <table width="75%" border="0" cellspacing="5" cellpadding="0" align="center">
             <tr>
              <td width="50%" align="right" class="fuentecolor">Usuario</td>
              <td><div id="text_form"><input type="text" name="userid" tabindex="1" /></div></td>
              </tr>
             <tr>
              <td align="right" class="fuentecolor">Contrase&ntilde;a</td>
              <td><input type="password" name="password" id="password" tabindex="2" /></td>
              </tr>
             <tr>
              <td colspan="2" align="right" style="padding-top:10px"><input type="submit" name="submit" id="submit" value="ingresar" tabindex="3">
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
      echo "<div id=\"error\"><img src=\"../imagenes/error.png\" width=\"48\" height=\"48\" align=\"absmiddle\" /> Tienes algún error en los datos</span></div>";
    }
  }
  ob_end_flush();
?>
</div><div style="margin-top: 3px;">
<div id="recordacion"><a href='recordacion.php'>Olvido su contrase&ntilde;a?</a></div></div>
</div>
</body>
</html>
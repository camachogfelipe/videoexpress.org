<?php
session_start();

if (isset($_POST['usuario']) && isset($_POST['clave']))
{
  // if the user has just tried to log in
  $userid = $_POST['usuario'];
  $password = md5($_POST['clave']);

  include ("funciones.php");
  conecta_bd();

  $query = consulta_bd("usuarios", "*", "1;;;User_access='$userid' and Password_access='$password'");

  while($row=mysql_fetch_object($query))
  {
     //Mostramos los titulos de los articulos o lo que deseemos...
	 $id_usuario = $row->id_usuario;
     $nombres = $row->Nombres;
	 $apellidos = $row->Apellidos;
     $user = $row->User_access;
     $pass = $row->Password_access;
	 $creado = $row->Creado;
	 $ingreso = $row->Ingreso;
  }

  $usuario = strcmp($user, $userid);
  $clave = strcmp($pass, $password);
  if ($usuario == 0 and $clave == 0)
  {
     // Si están en la base de datos del registro de usuario
     $_SESSION['fsluser'] = $id_usuario;
     $_SESSION['Nombre'] = $nombres." ".$apellidos;
	 $_SESSION['creado'] = $creado;
	 $_SESSION['ingreso'] = $ingreso;
	 $ingreso = date("Y-m-d H:i:s");
	 act_datos_tabla("usuarios","Ingreso='$ingreso'","id_usuario='$id_usuario'",1);
  }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//ES" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es">
<head>
<link rel="shortcut icon" href="../imagenes/faviconsemillas.ico" />
<link href="../fslibertad.css" rel="stylesheet" type="text/css" />
<link href="../admin.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>_:_ FSlibertad Panel de administraci&oacute;n _:_</title>
<script type="text/javascript" src="../scripts/jquery-1.5.1.js"></script>
<script type="text/javascript" src="../scripts/jquery.corner.js"></script>
<script>
jQuery(document).ready(function() {
	settings = {
          tl: { radius: 30 },
          tr: { radius: 30 },
          bl: { radius: 30 },
          br: { radius: 30 },
          antiAlias: true,
          autoPad: true,
          validTags: ["div", "table", "ul", "input", "textarea", "select", "li"]
      }
	  $("#form_login").corner("round 22px");
	  $("#campos_form").corner("round 22px");
	  $("#campos_form2").corner("round 22px");
  
});

function submitir(este)
{
	comprobar(este);
}

//Pon en la variable obligatorios el name de todos los campos que deben rellenar
obligatorio = ["usuario", "clave"];

//Pon en la veriable textoObligatorio el texto que quieres que aparezca en el alert

textoObligatorio=["Nombre de usuario", "Clave de acceso"];

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
   document.administracion.submit();
}
</script>
</head>

<body>
<div id="div_main">
   	<div id="logo_top"><img src="../imagenes/fondo_logo.png" width="1200" height="219" border="0" /></div>
<?php
  if (isset($_SESSION['fsluser']))
  {
     echo '<script languaje="Javascript">location.href="index2.php"</script>';
  }
  else
  {
    // provide form to log in 
?>
	<div id="form_login">
		<form action="index.php" method="post" enctype="application/x-www-form-urlencoded" name="administracion">
			<div>
               	<div id="texto"><label for="usuario">Nombre de usuario</label></div>
               	<input type="text" name="usuario" id="usuario" tabindex="1" />
			</div>
               <div class="texto">
				<div id="texto"><label for="clave">Contrase&ntilde;a</label></div>
                <input type="password" name="clave" id="clave" tabindex="2" />
			</div>
			<div id="btnsubmit" class="texto">
               	<a href="#" onclick="submitir(document.administracion)">
                   	<img src="../imagenes/boton_enviar_off.png" width="24" height="24" border="0" align="absmiddle" /> Ingresar
				</a>
			</div>
		</form>
<?php
	if(isset($userid))
    {
      //mensaje si el login falla
      echo "<div id=\"error\"><img src=\"../imagenes/error.png\" width=\"25\" height=\"25\" align=\"absmiddle\" /> Tienes algún error en los datos</span>";
	}
  }
?>
	</div>
</div>
</body>
</html>
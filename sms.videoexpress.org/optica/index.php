<?
session_start();
//session_register("SESSION");
include_once('funciones.php');


if(!isset($_GET["salir"]) && $_SESSION["id"] != "" && $_SESSION["id"] != 0 && $_SESSION["sistema"] != "optica")
{
	header("Location: index.php?salir=");
	exit;
}


$array_meses = array(
"Enero",
"Enero",
"Febrero",
"Marzo",
"Abril",
"Mayo",
"Junio",
"Julio",
"Agosto",
"Septiembre",
"Octubre",
"Noviembre",
"Diciembre"
);

$array_semana = array(
"Mon" => "Lunes",
"Tue" => "Martes", 
"Wed" => "Miercoles", 
"Thu" => "Jueves", 
"Fri" => "Viernes", 
"Sat" => "S&aacute;bado", 
"Sun" => "Domingo",
); 

$mesactual = intval(date("m"));
$anhoactual = intval(date("Y"));
$diaactual = intval(date("d"));
$semanaactual = date("D"); 

if(isset($_GET[salir]))
{
	session_unset();
	redirect('index.php');
}

if(isset($_POST["logueo"]) && trim($_POST["logueo"]) != "")
{
	$PSN = new DBbase_Sql;
	$logueo = htmlspecialchars($_POST["logueo"]);
	$pass = htmlspecialchars($_POST["passwordlogueo"]);
	$error = 0;
	
	$sql= "SELECT usuario.* ";
	$sql.=" FROM usuario ";
	$sql.=" WHERE inactivo = 0 AND login='".$logueo."'";

	$PSN->query($sql);
		
	if($PSN->next_record())
	{
		if (md5($pass) == $PSN->f('password'))
		{
			$_SESSION["administrador"] = "admin";
			$_SESSION["sistema"] = "optica";
			$_SESSION["nombre"] = $PSN->f('nombre');
			$_SESSION["identificacion"] = $PSN->f('identificacion');
			$_SESSION["direccion"] = $PSN->f('direccion');
			$_SESSION["telefono1"] = $PSN->f('telefono1');
			$_SESSION["telefono2"] = $PSN->f('telefono2');
			$_SESSION["celular"] = $PSN->f('celular');
			$_SESSION["email"] = $PSN->f('email');
			$_SESSION["id"] = $PSN->f('id');
			$_SESSION["idColegio"] = $PSN->f('idColegio');
			$_SESSION["superusuario"] = $PSN->f('superusuario');
			
			$_SESSION["perfil"] = $PSN->f('tipo');
			//
			//
			if($_POST["redireccion"] != "")
			{
				redirect(eliminarInvalidos($_POST["redireccion"]));
			}
			else
			{
				redirect('index.php?doc=main');
			}
		}
		else
		{
			$error = 2;
		}
	}
	else
	{
		$error = 1;
	}
}

if(trim($_SESSION["imagen"]) == "")
{
	$_SESSION["imagen"] = "LogoWeb.jpg";				
}


if(isset($_GET["excelX"]))
{
	header('Content-type: application/vnd.ms-excel');
	header("Content-Disposition: attachment; filename=archivo".date("Ymd_His").".xls");
	header("Pragma: no-cache");
	header("Expires: 0");
	$docu = $_GET["doc"];
	include_once("$docu.php");
	exit;
}


?><html>
<head>
<title><?=$gloPrograma; ?> - <?=$gloEmpresa	; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" type="text/css" href="scripts/calendario.css" />
<link rel="stylesheet" type="text/css" href="estilos.css" />
<link rel="stylesheet" href="menu/menu_style.css" type="text/css" />
<script language="javascript" type="text/javascript" src="scripts/calendario.js"></script>
<?
if($_GET["doc"] != "sms_envio")
{
	?><script language="javascript" type="text/javascript" src="scripts/prototype.js"></script><?
}
?>
<script type="text/javascript">
function getfocus(id){
	if(document.getElementById(id))
    {
		document.getElementById(id).focus()
	}
}
function salirSistema()
{
	if(confirm("Desea salir del sistema?"))
	{
		window.location.href = "index.php?salir=";
	}
}
</script>
</head>
<body>
<?
/*
*	AQUI VA EL CONTENIDO.
*/
if(isset($_GET["doc"]) && !empty( $_GET["doc"]) && is_logged_in())
{
	/*
	* MENU - MENU - MENU
	*/
	?><table width="100%" border=0 align="center" cellpadding="0" cellspacing="0">
	<tr>
		<td align="left" width="30%" valign="middle" style="vertical-align:middle"><img src="images/logoanglo3.png" align="middle" width="150"></td>
		<td align="center" width="40%" valign="middle" bgcolor="#ffffff" style="vertical-align:middle"><h1><strong><?=$gloPrograma; ?></strong></h1></td>
		<td align="right" valign="middle" width="30%" style="vertical-align:middle"><?
		/*
		if($_SESSION["perfil"] == 5)
		{
			?><img src="images/clientes/<?=$_SESSION["idColegio"];?>.jpg" align="middle"><?
		}
		else if($_SESSION["perfil"] == 4)
		{
				if(file_exists("images/clientes/".$_SESSION["id"].".jpg"))
				{
					?><img src="images/clientes/<?=$_SESSION["id"];?>.jpg" align="middle" height="50"><?
				}
		}
		else
		{
			echo "&nbsp;";
		}
		*/
			?></td>
	</td>
	</tr>
	<tr>
	<td colspan="3"><div id="navcontainer">
	<ul id="menu">
		<li><a href="index.php?doc=main" target="_self" title="Inicio" <?
		if($_GET["doc"] == "main")
		{
			?>class="current"<?
		}
		?>>Inicio</a></li>
		<?
		if($_SESSION["perfil"] == 1)
		{
			//SUPER ADMINISTRADOR
			?>
			<!--<li><a href="index.php?doc=admin_usu" target="_self" title="Crear Cliente" <?
			if($_GET["doc"] == "admin_usu")
			{
				?>class="current"<?
			}
			?>>Crear Cliente</a></li>
			<li><a href="index.php?doc=admin_buscarc" target="_self" title="Consulta de Clientes" <?
			if($_GET["doc"] == "admin_usu2" || $_GET["doc"] == "admin_buscarc")
			{
				?>class="current"<?
			}
			?>>Consultar Clientes</a></li>//-->
			<li><a href="index.php?doc=admin_usu3" target="_self" title="Crear Acceso" <?
			if($_GET["doc"] == "admin_usu3")
			{
				?>class="current"<?
			}
			?>>Crear Acceso</a></li>
			<li><a href="index.php?doc=admin_buscaru" target="_self" title="Consulta de Accesos" <?
			if($_GET["doc"] == "admin_usu4" || $_GET["doc"] == "admin_buscaru")
			{
				?>class="current"<?
			}
			?>>Consultar Accesos</a></li>


			<li><a href="index.php?doc=sms_grupos&opc=1" target="_self" title="Crear Grupo" <?
			if($_GET["doc"] == "sms_grupos" && $_GET["opc"] == 1)
			{
				?>class="current"<?
			}
			?>>Crear Grupo</a></li>
			<li><a href="index.php?doc=sms_grupos&opc=2" target="_self" title="Consulta de Grupos" <?
			if($_GET["doc"] == "sms_grupos"  && $_GET["opc"] == 2)
			{
				?>class="current"<?
			}
			?>>Consultar Grupos</a></li>

            <?
            if($_SESSION["superusuario"] == 1)
            {
				?>
				<li><a href="index.php?doc=sms_saldo" target="_self" title="Agregar SALDO" <?
				if($_GET["doc"] == "sms_saldo")
				{
					?>class="current"<?
				}
				?>>Agregar SALDO</a></li>
				<?
			}
			?>

			<li><a href="index.php?doc=sms_usuarios&opc=1" target="_self" title="Crear Usuario" <?
			if($_GET["doc"] == "sms_usuarios" && $_GET["opc"] == 1)
			{
				?>class="current"<?
			}
			?>>Crear Usuario</a></li>
			<li><a href="index.php?doc=sms_usuarios&opc=2" target="_self" title="Consulta de Usuarios" <?
			if($_GET["doc"] == "sms_usuarios"  && $_GET["opc"] == 2)
			{
				?>class="current"<?
			}
			?>>Consultar Usuarios</a></li>


			<li><a href="index.php?doc=sms_envio&opc=1" target="_self" title="Envio SMS" <?
			if($_GET["doc"] == "sms_envio" && $_GET["opc"] == 1)
			{
				?>class="current"<?
			}
			?>>Enviar SMS</a></li>
			<li><a href="index.php?doc=sms_envio&opc=2" target="_self" title="Historico SMS" <?
			if($_GET["doc"] == "sms_envio" && $_GET["opc"] == 2)
			{
				?>class="current"<?
			}
			?>>Historico SMS</a></li>
			<?
			/*
			if($_SESSION["superusuario"] == 1)
			{
				?>
				<li><a href="index.php?doc=admin_buscarcatm" target="_self" title="Consulta de Categorias" <?
				if($_GET["doc"] == "admin_buscarcatm" || $_GET["doc"] == "admin_buscarcat")
				{
					?>class="current"<?
				}
				?>>Categorias</a></li><?
			}
			*/
			?>
            <li><a href="index.php?doc=politicas" target="_self" title="Politicas de Confidencialidad" <?
			if($_GET["doc"] == "politicas")
			{
				?>class="current"<?
			}
			?>>Politicas</a></li><?
		}
		else if($_SESSION["perfil"] == 2)
		{
			// LIDER
			?>
			<li><a href="index.php?doc=sms_envio&opc=1" target="_self" title="Envio SMS" <?
			if($_GET["doc"] == "sms_envio" && $_GET["opc"] == 1)
			{
				?>class="current"<?
			}
			?>>Enviar SMS</a></li>
			<li><a href="index.php?doc=sms_envio&opc=2" target="_self" title="Historico SMS" <?
			if($_GET["doc"] == "sms_envio" && $_GET["opc"] == 2)
			{
				?>class="current"<?
			}
			?>>Historico SMS</a></li>
			<li><a href="index.php?doc=politicas" target="_self" title="Politicas de Confidencialidad" <?
			if($_GET["doc"] == "politicas")
			{
				?>class="current"<?
			}
			?>>Politicas</a></li><?
		}
		?>
	   <li><a href="javascript:salirSistema();void(0);" target="_self" title="Salir del Sistema">Salir del Sistema</a></li>
	</ul></td>
	</tr>
	<tr>
	<td valign="top" colspan="3">
	<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
	<tr>
	<td><br /><?
	/*
	* FIN DEL MENU - MENU - MENU
	*/
	$docu = $_GET["doc"];
	if(trim($docu) == "")
	{
		$docu = "main";
	}
	include_once("$docu.php");
	
	?></td>
	</tr>
	</table>
	</td>
	</tr>
	<tr>
	<td align="right" valign="middle" bgcolor="#ffffff" colspan="3"><br /><br /><span id="footer">
	  <hr color="#0000FF">
	<font size="1">Bienvenido <?=$_SESSION["nombre"]; ?>, hoy es <?=$array_semana[$semanaactual]; ?> <?=$diaactual; ?> de <?=$array_meses[$mesactual]; ?> del <?=$anhoactual; ?>
	<br />
	<font size="1"><?=$gloPrograma; ?> - <?=$gloEmpresa; ?>
	<br />
	Copyright 2010 - <?=date("Y"); ?> <?=$gloEmpresa; ?></font><br /></span></td></tr></table><?
}
else
{
	?>
    <center>
    <img src="images/logoanglo3.png" align="middle" width="400">
    </center>
    <table width="100%" border=0 align="center" cellpadding="0" cellspacing="0" style="border:thin;border:#006600">
<tr><td colspan="2"><?
	if ($error == 1)
	{
		?><center><font color="#FF0000">.LOGIN INCORRECTO.</font></center></td></tr><tr><td colspan="2"><?
	}
	else if ($error == 2)
	{
		?><center><font color="#FF0000">.PASSWORD INCORRECTO.</font></center></td></tr><tr><td colspan="2"><?
	}
	else
	{
		?><center><font color="#000000"><strong>.INGRESE SUS DATOS.</strong></font></center></td></tr><tr><td colspan="2"><?
	}
	?>
	<form name="form1" method="post" action="">
    <?
	
	if(isset($_GET["doc"]))
	{
		?>
        <input type="hidden" name="redireccion" value="<?=$_SERVER['REQUEST_URI']; ?>" />
        <?
	}
	?>
	<table border="0" align="center" cellpadding="0" cellspacing="0">
		<tr> 
		  <td height="30"><strong> Usuario: </font></strong></td>
		  <td height="30"><input name="logueo" type="text" id="logueo" size="14" value="<?=$_POST["logueo"]; ?>"></td>
		</tr>
		<tr> 
		  <td height="30"><strong> Contrase&ntilde;a:</font></strong></td>
		  <td height="30"><input name="passwordlogueo" type="password" id="passwordlogueo" size="14"></td>
		</tr>
		<tr align="right"> 
		  <td height="26" colspan="2"><input type="submit" value="Ingresar" style="background-color:#FFFFFF;border-color:#006600;color:#006600;"></td>
		</tr>
	  </table>
	</form>
	</td></tr></table>
  <h1><strong><?=$gloPrograma; ?></strong></h1>
  <hr color="#0000FF">
  <span id="footer">
	<font size="1"><?=$gloPrograma; ?> - <?=$gloEmpresa; ?>
	<br />
	Copyright 2014 - <?=date("Y"); ?> <?=$gloEmpresa; ?></font><br /></span></td>
</table><?
}
?>
</body></html>
<?php require_once('Connections/Proyectos.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "")
{
  $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}
?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['frmUsuario'])) {
  $loginUsername=$_POST['frmUsuario'];
  $password=md5($_POST['frmContrasena']);
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "admin/admin.php";
  $MM_redirectLoginFailed = "acceso_denegado.php";
  $MM_redirecttoReferrer = true;
  mysql_select_db($database_Proyectos, $Proyectos);

  $LoginRS__query=sprintf("SELECT usuario, contrasena FROM usuario WHERE usuario=%s AND contrasena=%s",
    GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text"));

  $LoginRS = mysql_query($LoginRS__query, $Proyectos) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = "";

    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;

    if (isset($_SESSION['PrevUrl']) && true) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}
?>
<html>
<head>
<title>:: COMUNIDAD CRISTIANA EL REDIL:: PANEL DE ADMINISTRACI&Oacute;N</title>
<META  name="description"  content="El Redil">
<META name="keywords" content="El Redil"
<style type="text/css"></style>
<style>
body {
	margin-left: 0%;
	margin-right: 0%;
	margin-top: 0%;
	margin-bottom:0%;
	text-align: justify;
	font-family: Arial, Helvetica, sans-serif;
	background-color: #f3f3f3;
}
.text {
	font-family:Arial, Helvetica, sans-serif;
	font-size:10px;
	color:#FFFFFF;
	text-decoration:none;
}
.text:hover {
	font-family:Arial, Helvetica, sans-serif;
	font-size:10px;
	color:#FFFFFF;
	text-decoration:underline;
}
.Titulo {
	font-size: 14px;
}
a:link {
	color: #c1272d;
}
.style1 {
	font-size: 12px
}
</style>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"></head>

<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<div align="center">
<table align="top" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="50%" height="100%" style="background-position:right top; background-repeat">&nbsp;</td>
      <td><table width="955" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="955" valign="top"><table width="955" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="20">&nbsp;</td>
              <td  width="955" valign="top"><table background="images/bg.jpg" width="955" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td height="121" background="images/header.jpg">&nbsp;</td>
                </tr>
                <tr>
                  <td valign="top"><table background="images/bg-body.jpg" width="955" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="73">&nbsp;</td>
                      <td width="806" height="388" valign="top"><table width="806" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td height="36">&nbsp;</td>
                        </tr>
                        <tr>
                          <td><div align="center">
                          <form id="frmLogin" name="frmLogin" method="POST" action="<?php echo $loginFormAction; ?>">
                            <p>&nbsp;</p>
                            <table width="691" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td width="305"><div align="right">Usuario &nbsp;&nbsp;&nbsp;</div></td>
      <td width="403"><label>
        <input type="text" name="frmUsuario" id="frmUsuario" />
      </label></td>
    </tr>
    <tr>
      <td><div align="right">Contrase&ntilde;a&nbsp;&nbsp;&nbsp;&nbsp;</div></td>
      <td><label>
        <input type="password" name="frmContrasena" id="frmContrasena" />
      </label></td>
    </tr>
  </table>
  <p align="center">
    <label>
    <input type="submit" name="btnLogin" id="btnLogin" value="Login" />
    </label>
</p>
</form>
                          </div></td>
                        </tr>
                      </table></td>
                      <td width="76">&nbsp;</td>
                    </tr>
                    <tr>
                      <td bgcolor="F3F3F3" width="73">&nbsp;</td>
                      <td bgcolor="F3F3F3" height="20" width="806"><div align="center" class="style1"></div></td>
                      <td bgcolor="F3F3F3" width="76">&nbsp;</td>
                    </tr>
                  </table></td>
                </tr>
              </table></td>
              <td width="20">&nbsp;</td>
            </tr>
          </table></td>
        </tr>
      </table></td>
      <td width="50%" height="100%" style="background-position:left top; background-repeat">&nbsp;</td>
    </tr>
</table>
</body>
</html>
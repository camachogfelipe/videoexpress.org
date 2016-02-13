<?php require_once('Connections/Proyectos.php'); 
?>
<?php
// ** Logout the current user. **
$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
}

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



if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
  //to fully log out a visitor we need to clear the session varialbles
  $_SESSION['MM_Username'] = NULL;
  $_SESSION['MM_UserGroup'] = NULL;
  $_SESSION['PrevUrl'] = NULL;
  unset($_SESSION['MM_Username']);
  unset($_SESSION['MM_UserGroup']);
  unset($_SESSION['PrevUrl']);

  $logoutGoTo = "cerrar_sesion.php";
  if ($logoutGoTo) {
    header("Location: $logoutGoTo");
    exit;
  }
}
?>
<?php
if (!isset($_SESSION)) {
  session_start();
}
$MM_authorizedUsers = "";
$MM_donotCheckaccess = "true";

// *** Restrict Access To Page: Grant or deny access to this page
function isAuthorized($strUsers, $strGroups, $UserName, $UserGroup) {
  // For security, start by assuming the visitor is NOT authorized.
  $isValid = False;

  // When a visitor has logged into this site, the Session variable MM_Username set equal to their username.
  // Therefore, we know that a user is NOT logged in if that Session variable is blank.
  if (!empty($UserName)) {
    // Besides being logged in, you may restrict access to only certain users based on an ID established when they login.
    // Parse the strings into arrays.
    $arrUsers = Explode(",", $strUsers);
    $arrGroups = Explode(",", $strGroups);
    if (in_array($UserName, $arrUsers)) {
      $isValid = true;
    }
    // Or, you may restrict access to only certain users based on their username.
    if (in_array($UserGroup, $arrGroups)) {
      $isValid = true;
    }
    if (($strUsers == "") && true) {
      $isValid = true;
    }
  }
  return $isValid;
}

$MM_restrictGoTo = "../index.php";
if (!((isset($_SESSION['MM_Username'])) && (isAuthorized("",$MM_authorizedUsers, $_SESSION['MM_Username'], $_SESSION['MM_UserGroup'])))) {
  $MM_qsChar = "?";
  $MM_referrer = $_SERVER['PHP_SELF'];
  if (strpos($MM_restrictGoTo, "?")) $MM_qsChar = "&";
  if (isset($QUERY_STRING) && strlen($QUERY_STRING) > 0)
  $MM_referrer .= "?" . $QUERY_STRING;
  $MM_restrictGoTo = $MM_restrictGoTo. $MM_qsChar . "accesscheck=" . urlencode($MM_referrer);
  header("Location: ". $MM_restrictGoTo);
  exit;
}
?>
<?php 

//id_empresa:
$query2 = "select id_empresa,logo,contacto from empresa where usuario = '$_SESSION[MM_Username]';";
$row1 = mysql_query($query2,$conexion);			           
$consulta = mysql_fetch_row($row1);
$id_empresa = $consulta[0];
$logo1 = $consulta[1];
$contacto1 = $consulta[2];

global $id_empresa;


?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script>function borrar_contenido(){

		document.getElementById('keyword').value="";	
	
}

</script>
<script>
function valida_envio2(){

		document.formulario.action = 'inicio_afiliaciones.php';
		document.formulario.submit();
	
}
</script>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="../favicon.ico" />
<link rel="stylesheet" type="text/css" href="../CIEC style.css"/>
<title>MINISTERIOS ONLINE</title>
<style type="text/css">
		@import "../Scripts/domtab.css";
	</style>
<script type="text/javascript" src="../Scripts/domtab.js"></script>
<script type="text/javascript">
		document.write('<style type="text/css">');    
		document.write('div.domtab div{display:none;}<');
		document.write('/s'+'tyle>');    
    </script>
<style type="text/css">div.domtab div{display:none;}</style>
<script src="../Scripts/swfobject_modified.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="../Scripts/floatbox/floatbox.css"/>
<script type="text/javascript" src="../Scripts/floatbox/floatbox.js"></script>
</head>

<body style="margin-top:0px">
<div class="superior">
  <div class="interiorsup">
   		<div class="logo"><a href="admin.php"><img src="../images/logoCIEC.png" alt="logo" width="158" height="161" align="left" /></a></div>
        	<div class="barra"><img src="../images/barra 2.png" alt="barra" width="837" height="40" align="right" /></div><div id="fotoidentificacion"><img src="../<? echo $logo1 ?>" width="40" height="40" alt="logomsociedad" /> </div>
        <div id="identificacion"><h2><? echo $contacto1 ?> </h2>
        <div id="textidentificacion">Superadministrador</div>
        </div>
            <div class="contmenu">
            	<ul class="menu" >
            		<li><a href="admin.php">Cuenta</a></li>
   					<li><a href="inicio_afiliaciones.php">Afiliaciones</a></li>
                    <li>Herramientas</li>
                    <li>Notificaciones</li>
                    <li><a href="<?php echo $logoutAction ?>" target="_self">Salir</a></li>
			  </ul>
            </div>
	  </div>
      <div class="buscador" id="texto_pie" >
		<form class="busqueda" id= "formulario" name="buscar" action="inicio_afiliaciones.php" method="get" >
        Encuentre lo que necesita en nuestra feria virtual de empresas 
        	<select name="lugar" class="seleccion" id="lugar">
            					 <? $queryMensaje2 = "select id_tipo_busqueda, nombre_tipo_busqueda from tipo_busqueda";
                         $row1 = mysql_query($queryMensaje2,$conexion);			           
	while($row = mysql_fetch_row($row1)) 
	
	{ $nombre =iconv('ISO-8859-1','UTF-8//TRANSLIT',$row[1]);
	  $id = $row[0];
						?>
                    	<option value="<?php echo $id?>"><?php echo $nombre ?></option>
                        
                        <?
							}
						
						?>
			</select>
   
             
            					
         <select name="clasificacion" id="clasificacion" class="seleccion" >
         <? $queryMensaje2 = "select id_clasificacion, nombre_clasificacion from clasificacion";
                         $row1 = mysql_query($queryMensaje2,$conexion);			           
	while($row = mysql_fetch_row($row1)) 
	
	{ $nombre =$row[1];
	  $id = $row[0];
						?>
                    	<option value="<?php echo $id?>"><?php echo $nombre ?></option>
                        
                        <?
							}
						
						?>
		  </select>
             <input name="keyword" class="seleccion" value="ingrese su busqueda" id="keyword" align="top" size="15" onclick="borrar_contenido();"></input>
            <input  type="image" src="../images/btn_busqueda.png" align="middle"  size="15" onclick="valida_envio2();" ></input>
        </form>
	  </div>
  <div class="contenido">
   	<div class="empresa">
        <div class="empresa_sup">
    <div class="empresa_menu">
           <div class="domtab">
  <ul class="domtabs">
    <li><a href="#t1">Noticias</a></li>
    <li><a href="#t2">Informaci&oacute;n</a></li>
	<li><a href="#t3">Productos Y servicios</a></li>
    <li><a href="#t4">Clientes</a></li>
  </ul></div>
  


          </div>
            <? 

$query ="SELECT  empresa.nombre_institucion,empresa.direccion, ciudad.cityName,empresa.telefono, pais.countryName, empresa.logo, empresa.id_empresa, empresa.descripcion, empresa.pagina_web, empresa.facebook,empresa.correo, empresa.telefono, empresa.celular, empresa.twitter, empresa.contacto from empresa,ciudad,pais, departamento where  empresa.id_empresa = $id_empresa and
ciudad.idCity = empresa.idCity
and ciudad.cityDepartment = departamento.departmentCode
and pais.countryISO = departamento.departmentISO2Country" ;
				$result = mysql_query($query,$conexion);
				
			 
				while($row = @mysql_fetch_row($result)) {
					$nombre_empresa = $row[0];
					$direccion= $row[1];
				    $ciudad= $row[2];
					$tel= $row[3];
					$pais= $row[4];
					$logo= $row[5];
					$descripcion= $row[7];
					$id_empresa = $row[6];
					$pagina = $row[8];
					$face = $row[9];
					$correo= $row[10];
					$tel= $row[11];
					$cel= $row[12];
					$contacto= $row[14];
					$twitter= $row[13];
				  
			
				   
					?>
                    <?	}?>

        	<div class="empresa_nombre">
              <h1 id="blanco"><? echo $nombre_empresa?></h1>
        	</div>
            
        </div>
        
        	<div class="empresa_izq">
            	<div class="logo_empresa"><img src="../<? echo $logo ?>" width="200" height="200" alt="logomsociedad" />
                </div><br />
              <ul  id="p_item2">
                <li><? echo $ciudad." " .$pais ?> </li>
				<li>Tel&eacute;fono:<strong><? echo $tel. "</br> "  . $tel . "</br> "  . $cel ?></strong></li>
                <li>Dir: <strong><? echo $direccion ?></strong></li>
                <li>E-mail:  <? echo $correo ?></li>
                <li>Web: <a href="http://<? echo $pagina ?>"  target="_new" style="color:#900"><? echo $pagina ?></a></li>
                <? if ($face != ""){?>
               <div id ="contenedor_redes"><a href="http://<? echo $face ?>" target="_new" style="color:#900"><div id="facebook2"></div></a> <?php }?>
                 <? if ($twitter != ""){?>
                <a href="http://<? echo $twitter ?>" target="_new" style="color:#900"><div id="twitter2"></div></a></div><?php }?></ul>
              <br />
                
          <a href="mailto:<? echo $correo ?>" target="_blank"><div id="p_item2"><img src="../images/icon_correo.png" align="left" style="margin-left:20px;" />Escriba un mensaje a:<br />
            <b><? echo $nombre_empresa ?>.</b></div></div></a>
        	
       	
       		<div class="empresa_der">
       		  <div class="domtab">
    <h3 id="titulos2"><a name="t1" id="t1">Noticias</a></h3>
    <p>En este espacio ir&aacute;n noticias, eventos y clasificados que la empresa, fundaci&oacute;n ministerio u organizaci&oacute;n quiera publicar </p>
    
  </div>
  <div  class="domtab">
    <h3 id="titulos2"><a name="t2" id="t2">Informaci&oacute;n</a></h3>
    <p>Espacio par informaci&oacute;n general e institucional de la empresa</p>
   
  </div>
  <div  class="domtab">
    <h3 id="titulos2"><a name="t3" id="t3">Productos y servicios</a></h3>
    <p>Cat&aacute;logo web de productos de la empresa</p>
    
  </div>
  <div  class="domtab">
    <h3 id="titulos2"><a name="t4" id="t4">Clientes</a></h3>
    <p>Clientes, socios y aliados de la empresa</p>
    
  </div>
      	</div>
     
       		
    </div>       		
  </div>
       
    	<div class="inferior">
        	<div class="interiorinf">
            <div class="interiorinfenlaces">
            	<div class="panelinf" >
                <img src="../images/CIEC.png" width="102" height="32" alt="ciec letra" />
                </div><br/><br/><br/>
                 <div class="panelinf2">
                <a href="">Organizaci&oacute;n<br /></a>
                <a href="">Afiliaci&oacute;n<br /></a>
               	<a href=""> Beneficios<br /></a>
                <a href="">Estatutos</a>
                </div>
                <div class="panelinf2">
                <a href="">Junta Directiva<br /></a>
                <a href="">Visionarios<br /></a>
               	<a href="">Lista de Miembros<br /></a>
                </div>
                <div class="panelinf2">
                <a href="">Recursos<br /></a>
                <a href="">Im&aacute;genes<br /></a>
               	<a href="">Video<br /></a>
                </div>                           
             </div>
             <div class="interioraliados">
             <div class="panelinf" id="titulo1">
                Aliados
               </div><br/><br/><br/>
                <div class="panelinf3"><img src="../images/logo acoopi.png" width="114" height="122" alt="logo acopi" /></div>
             </div>
            
    	</div>
    </div>
	</div>

</body>
</html>
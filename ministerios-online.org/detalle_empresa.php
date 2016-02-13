<?php require_once('admin/Connections/Proyectos.php'); 
?>
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
  $password=($_POST['frmContrasena']);
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "admin/admin.php";
  $MM_redirectLoginFailed = "acceso_denegado.php";
  $MM_redirecttoReferrer = true;
  mysql_select_db($database_Proyectos, $Proyectos);

  $LoginRS__query=sprintf("SELECT usuario, contrasena FROM empresa WHERE usuario=%s AND contrasena=%s",
    GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text"));

  $LoginRS = mysql_query($LoginRS__query, $Proyectos) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = "";

    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
	$_SESSION['correoelectronico'] = $loginUsername;
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


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="favicon.ico" />
<link rel="stylesheet" type="text/css" href="CIEC style.css"/>
<title>MINISTERIOS ONLINE</title>
<style type="text/css">
		@import "Scripts/domtab.css";
	</style>
<script type="text/javascript" src="Scripts/domtab.js"></script>
<script type="text/javascript">
		document.write('<style type="text/css">');    
		document.write('div.domtab div{display:none;}<');
		document.write('/s'+'tyle>');    
    </script>
<style type="text/css">div.domtab div{display:none;}</style>
<script src="Scripts/swfobject_modified.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="Scripts/floatbox/floatbox.css"/>
<script type="text/javascript" src="Scripts/floatbox/floatbox.js"></script>
<script>function borrar_contenido(){

		document.getElementById('keyword').value="";
		

		
	
}
	
function borrar_contenido2(){

		document.getElementById('frmUsuario').value="";
		
	
}
function borrar_contenido3(){

		document.getElementById('frmContrasena').value="";
		
	
}
</script>
</head>

<body style="margin-top:0px">
<div class="superior">
	  <div class="interiorsup">
   		<div class="logo"><a href="index.html"><img src="images/logoCIEC.png" alt="logo" width="158" height="161" align="left" /></a></div>
        	<div class="barra"><img src="images/barra 2.png" alt="barra" width="837" height="40" align="right" /></div>
            <div class="contmenu">
            	<ul class="menu" >
            		<li>Organizaci&oacute;n
      					<ul>
         					<li><a href="vision.html" class="floatbox">Visi&oacute;n</a></li>
         					<li><a href="mision.html" class="floatbox">Misi&oacute;n</a></li>
                            <li><a href="historia.html" class="floatbox" >Historia</a></li>
      					</ul>
   					</li>
   					<li>Afiliaci&oacute;n
      					<ul>
        					<li><a href="pasos.html" class="floatbox" >Proceso</a></li>
         					<li><a href="carta.doc" >Documentaci&oacute;n</a></li>
                            <li><a href="formulario_preinscripcion.php" class="floatbox" >Preinscripci&oacute;n</a></li>
      					</ul>
  					</li>
                    <li>Beneficios
      					<ul>
         					<li><a href="Beneficios.html" class="floatbox">Para su empresa</a></li>
         					<li>Para el pa&iacute;s</li>
                            <li>Para la Iglesia</li>
      					</ul>
   					</li>
                    <li><a href="documentos/estatutos.pdf" class="floatbox">Estatutos</a>
      					
   					</li>
                    <li><a href="formulario_contacto.html" class="floatbox">Contacto</a>
   					</li>
			  </ul>
            </div>
	  </div>
      
        <div class="buscador" id="texto_pie" >
		<form class="busqueda" id= "formulario" name="buscar" action="resultados.php" method="get" >
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
            <input  type="image" src="images/btn_busqueda.png" align="middle" size="15"  onclick="valida_envio();" ></input>
        </form>
		   <form class="ingreso" id="frmLogin" name="frmLogin" method="POST" action="<?php echo $loginFormAction; ?>">Ingrese al sistema o <a href="" style="color:#C00">afiliese</a><br />
        <input name="frmUsuario" id="frmUsuario"class="seleccion" size="10" value="Usuario" onclick="borrar_contenido2();"></input>
        <input  type="password" name="frmContrasena" class="seleccion" size="10" value="contrasena" id="frmContrasena" onclick="borrar_contenido3();" ></input>
        <input name="btnLogin" type="image" src="images/btn_ingreso.png" align="middle" onclick="inicia_sesion();" ></input>
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
  

<? 
$id_empresa= $_GET['i'];


$query ="SELECT  empresa.nombre_institucion,empresa.direccion, ciudad.cityName,empresa.telefono, pais.countryName, empresa.logo, empresa.id_empresa, empresa.descripcion, empresa.pagina_web, empresa.facebook,empresa.correo, empresa.telefono, empresa.celular, empresa.twitter from empresa,ciudad,pais, departamento where  empresa.id_empresa = $id_empresa and
ciudad.idCity = empresa.idCity
and ciudad.cityDepartment = departamento.departmentCode
and pais.countryISO = departamento.departmentISO2Country " ;
				$result = mysql_query($query,$conexion);
				
			 
				while($row = mysql_fetch_row($result)) {
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
					$twitter= $row[13];
				  
			
				   
					?>
                    <?	}?>
         
            </div>
        	<div class="empresa_nombre">
              <h1 id="blanco"><? echo $nombre_empresa ?> </h1>
        	</div>
            
        </div>
        	<div class="empresa_izq">
            	<div class="logo_empresa"><img src="<? echo $logo ?>" width="200" height="200"  />
                </div><br />
              <ul  id="p_item2">
                <li><? echo $ciudad." " .$pais ?> </li>
				<li>Tel&eacute;fonos:<strong><? echo $tel.  "</br> "  . $cel ?></strong></li>
                <li>Dir: <strong><? echo $direccion ?></strong></li>
                <li>E-mail: <? echo $correo ?></li>
                <li>Web: <a href="http://<? echo $pagina ?>" target="_new" style="color:#900"><? echo $pagina ?></a></li>
                <? if ($face != ""){?>
               <div id ="contenedor_redes"><a href="http://<? echo $face ?>" target="_new" style="color:#900"><div id="facebook2"></div></a> <?php }?>
                 <? if ($twitter != ""){?>
                <a href="http://<? echo $twitter ?>" target="_new" style="color:#900"><div id="twitter2"></div></a></div><?php }?></ul>
              <br />
                
               <a href="mailto:<? echo $correo ?>" target="_blank"><div id="p_item2"><img src="images/icon_correo.png" align="left" style="margin-left:20px;" />Escriba un mensaje a:<br />
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
                <img src="images/CIEC.png" width="102" height="32" alt="ciec letra" />
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
                <div class="panelinf3"><img src="images/fondonacional.png" alt="fondo" width="126" height="110" hspace="5" vspace="5" align="middle" /> <img src="images/logo patrocinio.png" alt="logo patrocinio" width="126" height="110" hspace="5" vspace="5" align="middle" /><img src="images/logopatrocinio1.png" alt="patrocinio 2" width="129" height="112" hspace="5" vspace="5" align="middle" /></div>
             </div>
            
    	</div>
    </div>
	</div>

</body>
</html>

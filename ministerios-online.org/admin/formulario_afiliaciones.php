<?php require_once('Connections/Proyectos.php'); 
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
  $MM_redirectLoginSuccess = "admin.php";
  $MM_redirectLoginFailed = "../acceso_denegado.php";
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
	$_SESSION['usuario'] = $loginUsername;
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
<meta http-equiv="Content-Type" content="text/html; charset=utf8_polish_ci" />
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
<script type="text/javascript" src="js/jquery-1.4.2.js"></script>
<script src="../Scripts/swfobject_modified.js" type="text/javascript"></script>

<script type="text/javascript">

$(document).ready(function() {
				  
				  $('#pais').change(function(){
									
									$.post("../ajax/ajax_depto.php", {
										   pais: $('#pais').val()
										   }, function(response){
										   setTimeout("finishAjax('depto', '"+escape(response)+"')", 400);
										   });
									return false;
				 });
				  
				  $('#depto').change(function(){
									
									$.post("../ajax/ajax_ciudad.php", {
										   depto: $('#depto').val()
										   }, function(response){
										   setTimeout("finishAjax('ciudad', '"+escape(response)+"')", 400);
										   });
									return false;
									});
				  
				  });

function finishAjax(id, response){
	$('#'+id).html(unescape(response));
}
</script>
<script>
function borrar_envio(){
	document.formulario.reset();
	
}

function valida_envio(){

	if (variable = document.getElementById('nombre').value==""){
		alert("Todos los campos deben ser diligenciados");
		return 0;
	}
	if (variable = document.getElementById('nit').value==""){
		alert("Todos los campos deben ser diligenciados");
		return 0;
	}
	if(isNaN(document.getElementById('nit').value)){
		alert("Identificación NIT NO valido, digite los 10 digitos, incluido digito de verificación");
		return 0;
	} 
	if (variable = document.getElementById('nombre_representante').value==""){
		alert("Todos los campos deben ser diligenciados");
		return 0;
	}
	if (variable = document.getElementById('cedula').value==""){
		alert("Todos los campos deben ser diligenciados");
		return 0;
	}
	if (variable = document.getElementById('pais').value==""){
		alert("Debe ingresar el País");
		return 0;
	}
	if (variable = document.getElementById('depto').value==""){
		alert("Debe ingresar el departamento");
		return 0;
	}
	if (variable = document.getElementById('ciudad').value==""){
		alert("Debe ingresar la ciudad");
		return 0;
	}
	if (variable = document.getElementById('direccion').value==""){
		alert("Todos los campos deben ser diligenciados");
		return 0;
	}
	if (variable = document.getElementById('telefono').value==""){
		alert("Todos los campos deben ser diligenciados");
		return 0;
	}
	if (variable = document.getElementById('celular').value==""){
		alert("Todos los campos deben ser diligenciados");
		return 0;
	}
	if (variable = document.getElementById('mail').value==""){
		alert("Todos los campos deben ser diligenciados");
		return 0;
	}
	
	if (document.getElementById('mail').value.indexOf('@') == -1){ 
		alert ("el correo electrónico  no es correcto"); 
		return 0;
	}
	
	if (variable = document.getElementById('nombre_contacto').value==""){	
		alert("Todos los campos deben ser diligenciados");
		return 0;
	}
	if (variable = document.getElementById('anio').value==""){
		alert("Debe diligenciar el ano en que fue constituida la empresa");
		return 0;
	}
	if(isNaN(document.getElementById('anio').value)){
		alert("El ano debe ser un número de 4 digitos");
		return 0;
	}
	if (variable = document.getElementById('descripcion').value==""){
		alert("Todos los campos deben ser diligenciados");
		return 0;
	} 
	else{
		document.formulario.action = '../creacion_empresa.php';
		document.formulario.submit();
	}
	
}
</script>
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

</head>


<body style="margin-top:0px">
<div class="superior">
	  <div class="interiorsup">
   		<div class="logo"><a href="index.php"><img src="../images/logoCIEC.png" alt="logo" width="158" height="161" align="left" /></a></div>
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
                    <li>Salir</li>
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
      
       <div class="resultados">
       <div class="titulo_afiliados" id="titulo1">
       Afiliaciones
       </div>
<div class="menu_afiliados"><br />
            <a href="formulario_afiliaciones.php"> +Congregación</a> / 
            <a href="formulario_afiliaciones2.php"> +Ministerio/Empresa</a> / 
            <a href="afiliaciones_afiliados.php">Ver Ministerios</a> /
            <a href="afiliaciones_afiliados2.php">Ver Empresas</a> /
            <a href="afiliaciones_visionarios.php"> Ver Congregaciones</a>
</div>
<div class="for_preinscripcion">
                  <h3 id="titulos1" style="text-align:left">Inscribir Congregación</h3>
              <form  name="formulario" method="post" enctype="multipart/form-data"> 
                   
                  <table class="form" width="680" border="0" cellspacing="0" cellpadding="0" summary="Items para formulario de preincripcion
">
  <tr>
    <td width="236">Nombre o Razón Social</td>
    <td width="444" align="left"><input name="nombre" id="nombre" maxlength="100" width="300" /></td>
  </tr>
  <tr>
    <td>NIT (Código de Afiliación)</td>
    <td align="left"><input name="nit" type="text" id="nit" maxlength="10" width="300" /></td>
  </tr>
  <tr>
    <td>Nombre representante Legal</td>
    <td align="left"><input name="nombre_representante" type="text" id="nombre_representante" width="300" /></td>
  </tr>
  <tr>
    <td>Cédula </td>
    <td align="left"><input name="cedula" type="text" id="cedula" size="12" maxlength="11"/></td>
  </tr >
  
    <td>País</td>
    <td align="left">
    <select id="pais" name="pais">
<?php

	$q = "SELECT countryName, idCountry FROM pais ORDER BY countryName ASC";
				$result = mysql_query($q,$conexion);
				while($row = mysql_fetch_row($result)){
				$nombre1 = $row[0];
				$id= $row[1];
	
		?>
              <option value="<?php echo $id?>"><?php echo $nombre1 ?></option>
                        
                        <?
	}
	
	?>
   
</select>
    
    </td>
  </tr>
  <tr>
    <td>Departamento</td>
    <td align="left"><select id="depto" name="depto">

<?php

	$q = "SELECT departmentName, idDepartment FROM departamento ORDER BY departmentName ASC";
				$result = mysql_query($q,$conexion);
				while($row = mysql_fetch_row($result)){
				$nombre1 = $row[0];
				$id= $row[1];
	
		?>
              <option value="<?php echo $id?>"><?php echo $nombre1 ?></option>
                        
                        <?
	}
	
	?>
   
</select></td>
  </tr>
  <tr>
    <td>Ciudad</td>
    <td align="left"><select id="ciudad" name="ciudad">
    
<?php
	$q = "SELECT cityName, idCity FROM  ciudad order by cityName ";
				$result = mysql_query($q,$conexion);
				while($row = mysql_fetch_row($result)){
				$nombre1 = $row[0];
				$id= $row[1];
	
		?>
              <option value="<?php echo $id?>"><?php echo $nombre1 ?></option>
                        
                        <?
	}
	
	?>
</select></td>
  </tr >
  <tr>
    <td>Dirección</td>
    <td align="left"><input name="direccion" type="text" id="direccion"  /></td>
  </tr>
  <tr>
    <td>Teléfono</td>
    <td align="left"><input name="telefono" type="text" id="telefono" maxlength="15"  /></td>
  </tr>
  <tr>
    <td>Celular</td>
    <td align="left"><input name="celular" type="text" id="celular" maxlength="20"  /></td>
  </tr>
  <tr>
    <td>E-mail</td>
    <td align="left"><input name="mail" type="text" id="mail"  /></td>
  </tr>
  <tr>
    <td>Página Web</td>
    <td align="left"><input name="web" type="text" id="web" /></td>
  </tr>
    <tr>
    <td>Facebook</td>
    <td align="left"><input name="facebook" type="text" id="facebook"   /></td>
  </tr>
    <tr>
    <td>Twitter</td>
    <td align="left"><input name="twitter" type="text" id="twitter"  /></td>
  </tr>
  
  <tr>
    <td>Logo de la empresa</td>
    <td align="left"><input name="archivo" id="archivo" type="file" /></td>

  </tr>
  <tr>
    <td>Nombre del Contacto</td>
    <td align="left"><input name="nombre_contacto" id="nombre_contacto" maxlength="100" width="300" /></td>
  </tr>
  <tr>
    <td>Congregación</td>
    <td align="left"><input name="es_visionario" id="es_visionario"  type="radio" value="si" checked="checked" />
     </td>
    
  </tr>
  <tr>
    <td>Fecha constitución de la empresa</td>
    <td align="left">
    Día <select name="dia"  id="dia">
		<option selected value="1">01</option>
		<option value="2">02</option>
		<option value="3">03</option>
        <option value="4">04</option>
		<option value="5">05</option>
		<option value="6">06</option>
        <option value="7">07</option>
		<option value="8">08</option>
		<option value="9">09</option>
        <option value="10">10</option>
		<option value"11">11</option>
        <option value="12">12</option>
		<option value="13">13</option>
		<option value="14">14</option>
        <option value="15">15</option>
		<option value="16">16</option>
		<option value="17">17</option>
        <option value="18">18</option>
		<option value="19">19</option>
        <option value="20">20</option>
		<option value="21"> 21</option>
		<option value="22">22</option>
        <option value="23">23</option>
		<option  value="24">24</option>
		<option value="25">25</option>
        <option value="26">26</option>
        <option value="27">27</option>
        <option value="28">28</option>
        <option value="29">29</option>
        <option value="30">30</option>
        <option value="31">31</option>
	</select>
     Mes 
     <select name="mes"  id="mes">
		<option selected value="1">Enero</option>
		<option value="2">Febrero</option>
		<option value="3">Marzo</option>
        <option value="4">Abril</option>
		<option value="5">Mayo</option>
		<option value="6">Junio</option>
        <option value="7">Julio</option>
		<option value="8">Agosto</option>
		<option value="9">Septiembre</option>
        <option value="10">Octubre</option>
		<option value="11">Noviembre</option>
        <option value="12">Diciembre</option>
		
	</select>
    Ano <input id="anio" name="anio" maxlength="5" style="text-align:right" size="4" />
    </td>
  </tr>
  <tr>
    <td>Tipo de afiliación</td>
    <td align="left">
    <input name="tipo_afiliacion" type="radio" value="5" checked="checked"/>Persona natural o S.A.S
<input name="tipo_afiliacion" type="radio" value="6" />
Micro
<input name="tipo_afiliacion" type="radio" value="7"  />Pequena
<input name="tipo_afiliacion" type="radio" value="8"  />Mediana
<input name="tipo_afiliacion" type="radio" value="2"  />Iglesia
<input name="tipo_afiliacion" type="radio" value="3"  />Ministerio
<input name="tipo_afiliacion" type="radio" value="4"  />Fundación



    </td>
  </tr>
  <tr>
    <td valign="top">Descripción actividad económica</td>
    <td align="left"><textarea name="descripcion" id="descripcion" rows="5" cols="50"></textarea></td>
  </tr>
  <tr>
    <td colspan="2" align="center">
    Sector Industrial <input name="sector" id="sector" maxlength="100" width="100" /> 
    Código CIIU <input name="ciiu" id="ciiu" maxlength="50" width="50" /> 
      </td>
    </tr>
   <tr>
    <input type="hidden" id="logo"  name="logo"  value="<?php echo $uploadFile ?>"/>
    <td colspan="2" align="center">
    <div id ="contenedor" align="center">
        <div id ="enviar" onclick="valida_envio();"></div>
        <div id="mensaje">Enviar</div>
         
        <div id ="borrar" onclick="borrar_envio();"></div>
        <div id="mensaje">Borrar</div>
    </div> 
 
    </td>
  </tr>
</table>

                  </form>
       	 </div>
   		 
   		  
   		 
          </div>
    	
	</div><div class="inferior">
        	<div class="interiorinf">
            <div class="interiorinfenlaces">
            	<div class="panelinf">
                <img src="../images/CIEC.png" width="102" height="32" alt="ciec letra" />
                </div><br/><br/><br/>
                 <div class="panelinf2">
                <a href="">OrganizaciĂłn<br /></a>
                <a href="">AfiliaciĂłn<br /></a>
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
                <a href="">ImĂĄgenes<br /></a>
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
</body>
</html>

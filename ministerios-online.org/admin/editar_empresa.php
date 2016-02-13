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
<? $id_empresa1 = $_GET['i'];
   global $id_empresa1 ;
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
<script type="text/javascript" src="../Scripts/floatbox/floatbox.js"></script>

<script>
function borrar_envio(){
	document.formulario.reset();
	
}
function valida_envio(){

		document.formulario.action = 'editar.php?i=<? echo $id_empresa1  ?>';
		document.formulario.submit();
	
	
}
</script>
<script>
function borrar_contenido(){

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
                  <h3 id="titulos1" style="text-align:left">Editar Información</h3>
              <form  name="formulario" method="post" enctype="multipart/form-data"> 
                   
                   <?  
                   $query ="SELECT  empresa.nombre_institucion,empresa.direccion, ciudad.cityName,empresa.telefono, pais.countryName, empresa.logo, empresa.id_empresa, empresa.descripcion, empresa.pagina_web, empresa.facebook,empresa.correo, empresa.telefono, empresa.celular, empresa.twitter, empresa.representante_legal, empresa.cedula, empresa.contacto, empresa.fecha_constitucion,empresa.es_principal, empresa.sector_industrial, empresa.codigo_CIIU, empresa.id_clasificacion, empresa.nit, ciudad.idCity, pais.idCountry, departamento.idDepartment, departamento.departmentName, empresa.codigo_padre,empresa.tipo from empresa,ciudad,pais, departamento where  empresa.id_empresa = $id_empresa1 and
ciudad.idCity = empresa.idCity
and ciudad.cityDepartment = departamento.departmentCode
and pais.countryISO = departamento.departmentISO2Country " ;
				$result = mysql_query($query,$conexion);

				
			 
				while($row = mysql_fetch_row($result)) {
					$nombre_empresa =$row[0];
					$direccion= $row[1];
				    $ciudad= $row[2];
					$tel= $row[3];
					$pais= $row[4];
					$logo= $row[5];
					$descripcion =$row[7];
					$idempresa = $row[6];
					$pagina = $row[8];
					$face = $row[9];
					$correo= $row[10];
					$tel= $row[11];
					$cel= $row[12];
					$twitter= $row[13];
					$nombre_representante =$row[14];
					$cedula= $row[15];
					$contacto= $row[16];
					$fecha_c= $row[17];
					$contacto =iconv('ISO-8859-1','UTF-8//TRANSLIT',$row[16]);
					$es_principal= $row[18];
					$sector= $row[19];
					$CIIU= $row[20];
					$clasificacion= $row[21];
					$nit= $row[22];
					$id_ciudad= $row[23];
					$id_pais= $row[24];
					$id_depto= $row[25];
					$depto= $row[26];
					$tipo_asociado= $row[28];
					$codigo_padre= $row[27];
			
				   
						}?>
                  <table class="form" width="680" border="0" cellspacing="0" cellpadding="0" summary="Items para formulario de preincripcion
">
  <tr>
    <td width="236">Nombre o Razón Social</td>
    <td width="444" align="left"><input name="nombre" id="nombre" width="300" value="<? echo $nombre_empresa ?>" /></td>
  </tr>
  <tr>
    <td>NIT (Código de Afiliación)</td>
    <td align="left"><input name="nit" type="text" id="nit" maxlength="10" width="300"  value="<? echo $nit?>" /></td>
  </tr>
  <tr>
    <td>Nombre representante Legal</td>
    <td align="left"><input name="nombre_representante" type="text" id="nombre_representante" width="300"  value="<? echo $nombre_representante ?>" /></td>
  </tr>
  <tr>
    <td>Cédula </td>
    <td align="left"><input name="cedula" type="text" id="cedula" size="12" maxlength="11" value="<? echo $cedula ?>"/></td>
  </tr >
  
    <td>País</td>
    <td align="left">
<select id="pais" name="pais">
<option value="<?php echo $id_pais?>"><?php echo $pais ?></option>

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
   <option value="<?php echo $id_depto?>"><?php echo $depto ?></option>

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
    <option value="<?php echo $id_ciudad?>"><?php echo $ciudad ?></option>

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
    <td align="left"><input name="direccion" type="text" id="direccion" value="<?php echo $direccion?>"  /></td>
  </tr>
  <tr>
    <td>Teléfono</td>
    <td align="left"><input name="telefono" type="text" id="telefono" value="<?php echo $tel?>"/></td>
  </tr>
  <tr>
    <td>Celular</td>
    <td align="left"><input name="celular" type="text" id="celular" value="<?php echo $cel?>"  /></td>
  </tr>
  <tr>
    <td>E-mail</td>
    <td align="left"><input name="mail" type="text" id="mail" value="<?php echo $correo?>" /></td>
  </tr>
  <tr>
    <td>Página Web</td>
    <td align="left"><input name="web" type="text" id="web" value="<?php echo $pagina?>" /></td>
  </tr>
    <tr>
    <td>Facebook</td>
    <td align="left"><input name="facebook" type="text" id="facebook" value="<?php echo $face?>"   /></td>
  </tr>
    <tr>
    <td>Twitter</td>
    <td align="left"><input name="twitter" type="text" id="twitter"value="<?php echo $twitter?>"  /></td>
  </tr>
  
  <tr>
    <td>Logo de la empresa</td>
    <td align="left"><input name="archivo" id="archivo" type="file" /></td>

  </tr>
  <tr>
    <td>Nombre del Contacto</td>
    <td align="left"><input name="nombre_contacto" id="nombre_contacto" maxlength="100" width="300" value="<?php echo $contacto?>"/></td>
  </tr>
  <? if ($es_principal =='no'){?>
  <tr>
    <td> Tipo de Asociado</td>
<td align="left">
<select id="tipo_asociado" name="tipo_asociado">

 <? $s = "SELECT tipo  from empresa where tipo = '$tipo_asociado' ";
				$result = mysql_query($s,$conexion);
				$row = mysql_fetch_row($result);
				$nombre2 = $row[0]; ?>
              <option value="empresario" <?
              if($nombre2 == "empresario")
			  {
				  ?>selected="selected"<?
			  }
			  ?>>Ministerio</option>
               <option value="emprendedor" <?
              if($nombre2 == "emprendedor")
			  {
				  ?>selected="selected"<?
			  }
			  ?>>Empresa</option>
                        
                        
	
</select></td>
     
    
  </tr>
  <? } ?>
  <tr>
    
    <? if ($es_principal =='si'){?>
    <td> Congregación</td>
    <td align="left"><input name="es_visionario" id="es_visionario"  type="radio" value="si" checked="checked" />
  <?  }else {?>
  <td>Congregación</td>
    <td align="left"> <input name="es_visionario" id="es_visionario"  type="radio" value="no"  checked="checked" />
Referencia Congregacional:
<select id="visionario_padre" name="visionario_padre" style="width:200px" >
     <? $s= "select nombre_institucion from empresa where id_empresa = $codigo_padre ";
	 $result = mysql_query($s,$conexion);
	 $rowf = mysql_fetch_row($result);
	  $nombre_inst = $rowf[0];
	  ?>
    <option value="<?php echo $codigo_padre ?>"><?php echo $nombre_inst ?>
    </option>
    
    <? $t= "select nombre_institucion, id_empresa from empresa where es_principal='si' ORDER BY nombre_institucion ASC ";
	 $resul = mysql_query($t,$conexion);
	  while($row = mysql_fetch_row($resul)){
	  $nombre_ = $row[0];
	  $id_=$row[1];
	 
	  ?>
    <option value="<?php echo $id_ ?>"><?php echo $nombre_ ?></option>
<? }?>

</select>
<? }?>
     </td>
    
  </tr>
   
  <tr>
    <td>Tipo de afiliación</td>
    
    <td align="left">
   <select name="clasificacion" id="clasificacion" class="seleccion" >
      <? $r= "select nombre_clasificacion from clasificacion where id_clasificacion= $clasificacion";
	 $result = mysql_query($r,$conexion);
	  $y = mysql_fetch_row($result);
	  $nombre_cla = $y[0];?>
       <option value="<?php echo $clasificacion?>"><?php echo $nombre_cla ?></option>
         <? $queryMensaje2 = "select id_clasificacion, nombre_clasificacion from clasificacion";
                         $row1 = mysql_query($queryMensaje2,$conexion);			           
	while($row = mysql_fetch_row($row1)) 
	
	{ $nombre = iconv('ISO-8859-1','UTF-8//TRANSLIT',$row[1]);
	  $id = $row[0];
						?>
                    	<option value="<?php echo $id?>"><?php echo $nombre ?></option>
                        
                        <?
							}
						
						?>
		  </select>

    </td>
  </tr>

  <tr>
    <td valign="top">Descripción actividad económica</td>
    <td align="left"><textarea name="descripcion" id="descripcion" rows="5" cols="50"><? echo $descripcion?></textarea></td>
  </tr>
  <tr>
    <td colspan="2" align="center">
    Sector Industrial <input name="sector" id="sector" maxlength="100"  value="<?php echo $sector ?>" /> 
    Código CIIU <input name="ciiu" id="ciiu" maxlength="50" value="<?php echo $CIIU ?>" width="50" /> 
      </td>
    </tr>
   <tr>
    <input type="hidden" id="logo"  name="logo"  value="<?php echo $uploadFile ?>"/>
    <td colspan="2" align="center">
    <div id ="contenedor" align="center">
        <div id ="enviar" onclick="valida_envio();"></div>
        <div id="mensaje">Editar</div>
         
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

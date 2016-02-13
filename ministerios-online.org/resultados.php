<?php 
	require_once('admin/Connections/Proyectos.php'); 
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
   		<div class="logo"><a href="index.php"><img src="images/logoCIEC.png" alt="logo" width="158" height="161" align="left" /></a></div>
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
            <input  type="image" src="images/btn_busqueda.png" align="middle"  size="15" onclick="valida_envio();" ></input>
        </form>
       <form class="ingreso" id="frmLogin" name="frmLogin" method="POST" action="<?php echo $loginFormAction; ?>">Ingrese al sistema o <a href="" style="color:#C00">afiliese</a><br />
        <input name="frmUsuario" id="frmUsuario"class="seleccion" size="10" value="Usuario" onclick="borrar_contenido2();"></input>
        <input  type="password" name="frmContrasena" class="seleccion" size="10" value="contrasena" id="frmContrasena"  onclick="borrar_contenido3();"></input>
        <input name="btnLogin" type="image" src="images/btn_ingreso.png" align="middle" onclick="inicia_sesion();" ></input>
        </form>
      
       </div>
       <?php 
       $clasificacion= $_GET['clasificacion'];
					   $campo1= $_GET['keyword'];
				       $lugar = $_GET['lugar'];
					   global $lugar;
					   global $resultado;
					   
						if ($lugar == 1){
						$opcion = 150;
					    $select1 = "ciudad.idCity = empresa.idCity
  and ciudad.cityDepartment = departamento.departmentCode
  and pais.countryISO = departamento.departmentISO2Country 
  and clasificacion.id_clasificacion = empresa.id_clasificacion
 and clasificacion.id_clasificacion = $clasificacion
 and ciudad.idCity = $opcion
  and (empresa.nombre_institucion like '%$campo1%' or empresa.representante_legal  like '%$campo1%' or empresa.pagina_web  like '%$campo1%' or empresa.descripcion  like '%$campo1%' or empresa.sede like '%$campo1%' or empresa.contacto  like '%campo1%' or empresa.facebook like '%$campo1%')";
			
						$resultado = $select1;
						
						}
						if ($lugar == 2){
						$opcion = 'CO';
						$select2 = "ciudad.idCity = empresa.idCity
  and ciudad.cityDepartment = departamento.departmentCode
  and pais.countryISO = departamento.departmentISO2Country 
  and clasificacion.id_clasificacion = empresa.id_clasificacion
 and clasificacion.id_clasificacion = $clasificacion
 and departamento.departmentISO2Country = '$opcion'
  and (empresa.nombre_institucion like '%$campo1%' or empresa.representante_legal  like '%$campo1%' or empresa.pagina_web  like '%$campo1%' or empresa.descripcion  like '%$campo1%' or empresa.sede like '%$campo1%' or empresa.contacto  like '%campo1%' or empresa.facebook like '%$campo1%')";
						$resultado = $select2;
						}
						if ($lugar == 3){
						
						  
  		$select3 = "ciudad.idCity = empresa.idCity
  and ciudad.cityDepartment = departamento.departmentCode
  and pais.countryISO = departamento.departmentISO2Country 
  and clasificacion.id_clasificacion = empresa.id_clasificacion
  and clasificacion.id_clasificacion = $clasificacion
  and (empresa.nombre_institucion like '%$campo1%' or empresa.representante_legal  like '%$campo1%' or empresa.pagina_web  like '%$campo1%' or empresa.descripcion  like '%$campo1%' or empresa.sede like '%$campo1%' or empresa.facebook like '%$campo1%'or empresa.contacto like '%campo1%'or empresa.twitter like '%campo1%')";
                       $resultado = $select3;
						}
						
	  $cant_reg = 5;
		$num_pag = $_GET["pagina"];
		if (!$num_pag){
			$comienzo = 0;
			$num_pag = 1;
		}
			else{$comienzo = ($num_pag - 1) * $cant_reg;
		}
			
	$consulta = "SELECT  empresa.nombre_institucion,empresa.direccion, ciudad.cityName,empresa.telefono, pais.countryName, empresa.logo, empresa.id_empresa, empresa.descripcion from empresa,ciudad,pais, departamento, clasificacion where $resultado " ;
	$query = "SELECT  empresa.nombre_institucion,empresa.direccion, ciudad.cityName,empresa.telefono, pais.countryName, empresa.logo, empresa.id_empresa, empresa.descripcion from empresa,ciudad,pais, departamento, clasificacion where $resultado LIMIT $comienzo, $cant_reg" ;
	
	$resultad = mysql_query($consulta,$conexion);
	$result = mysql_query($query,$conexion);
	       
	$total_registros = @mysql_num_rows($resultad);
	$total_paginas = ceil($total_registros / $cant_reg);
       ?>
       <div class="contenido">
       		<div class="resultados">
        	<p id="texto_pie"><?php if ($total_paginas == 0) echo "No existen registros con esta búsqueda"; else { ?>Resultados totales <?php echo $total_registros ?>. Mostrando <?php echo $num_pag ?><sup>a</sup> p&aacute;gina de <?php echo $total_paginas ?></p>
        		
                	 <? 
					  
        	}

				while($row = @mysql_fetch_row($result)) {
			
					$nombre_empresa =$row[0];
					$direccion= $row[1];
				    $ciudad= $row[2];
					$tel= $row[3];
					$pais= $row[4];
					$logo= $row[5];
					$descripcion =$row[7];
					$id_empresa = $row[6];
				  
				   
					?>
                  <div class="item">
       			  <div class="imagen_item"><img src="<? echo $logo ?>" width="98" height="100"  />
                </div>
                    <div class="colum1_item">
                    <h1 id="item"><? echo $nombre_empresa ?></h1>
                    	<ul id="p_item">
                        <li><? echo $direccion ?></li>
                        <li><? echo $ciudad." " .$pais ?></li>
                        <li>PBX: <? echo $tel?></li>
                        </ul>
                       <a href="detalle_empresa.php?i=<? echo $id_empresa ?>" id="ver">M&aacute;s informaci&oacute;n</a>
                    </div>
					  <div class="colum2_item">
                  <span id="p_item" style=" font-weight:bold">Descripci&oacute;n</span>
                    <span id="p_item"><? echo $descripcion?></span>
                    </div>
        	
			    </div>  
<?	}?>
       					  
               
                
                <div class="numerador2">
                <?php 
                if(($num_pag - 1) > 0) {
			echo "<a href='".$PHP_SELF."?pagina=".($num_pag-1)."&keyword=$campo1&clasificacion=$clasificacion&lugar=$lugar' style='text-decoration:none; color:#25110B;'>Anterior</a> ";
		}

		for ($i=1; $i<=$total_paginas; $i++){
			if ($num_pag == $i) {
				echo "<b>".$num_pag."</b> ";
			} else {
				echo "<a href='".$PHP_SELF."?pagina=$i&keyword=$campo1&clasificacion=$clasificacion&lugar=$lugar' style='text-decoration:none; color:#25110B;'>$i</a> ";
			}
		}

		if(($pagina + 1)<$total_paginas) {
			echo " <a href='".$PHP_SELF."?pagina=".($num_pag+1)."&keyword=$campo1&clasificacion=$clasificacion&lugar=$lugar' style='text-decoration:none; color:#25110B;'>Siguiente ></a>";
		}

		
?>
              
                </div>  
        	</div>
       </div>
       
    	<div class="inferior">
        	<div class="interiorinf">
            <div class="interiorinfenlaces">
            	<div class="panelinf">
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
             Elaborado por:
    	</div>
    </div>
	</div>

</body>
</html>

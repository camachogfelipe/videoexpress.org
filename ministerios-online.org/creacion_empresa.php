<?php require_once('admin/Connections/Proyectos.php'); 

define('CHARSET','UTF-8');

$empresa=$_POST['nombre'];
$mail= $_POST['mail'];
$sector =$_POST['sector'];
$nit =$_POST ['nit'];
$pagina =$_POST['web'];
$pagina = str_replace('http://','',$pagina);
$descripcion =$_POST['descripcion'];
$nombre_representante = $_POST['nombre_representante'];
$departamento =$_POST['departamento'];
$ciudad =$_POST['ciudad'];
$archivo =$_POST['archivo'];
$tipo =$_POST['tipo_asociado'];
$direccion =$_POST['direccion'];
$tipo_afiliacion =$_POST['tipo_afiliacion'];
$contacto =$_POST['nombre_contacto'];
$ciiu =$_POST['ciiu'];
$telefono =$_POST['telefono'];
$celular =$_POST['celular'];
$cedula =$_POST['cedula'];
$twitter=$_POST['twitter'];
$facebook=$_POST['facebook'];
$es_visionario=$_POST['es_visionario'];
$dia=$_POST['dia'];
$mes=$_POST['mes'];
$anio=$_POST['anio'];
$fecha=$anio.'-'.$mes.'-'.$dia;
$codigo_padre = $_POST['visionario_padre'];
if ($codigo_padre==""){
	$codigo_padre=0;
	}

function subir($archivo){

        $turn_on_error_for_numeric = "0";  // 1 is error, 0 is ignore.
        //***************End user defined variables::edit past here at your own risk.
        //Form fields parsed:

        //check there is an file attachment else exit
        if (empty($archivo)) {
            $uploadfile = "";
        }
       else{
       		$uploaddir = 'admin/uploads/';
	        $uploadfile =  $uploaddir.basename($_FILES['archivo']['name']);
	        if (move_uploaded_file($_FILES['archivo']['tmp_name'], $uploadfile)) {
	            //File is valid, and was successfully uploaded
	            $file_name = $_FILES['archivo']['name'] ;
	            $file_type = $_FILES['archivo']['type'] ;
	        } else {
	           //File was invalid: error out, return to form page
	        }
	}
        return $uploadfile;
}

$archivo=$_FILES['archivo'];
$uploadFile = subir($archivo);


$insert = "INSERT INTO `empresa` (`id_empresa`, `NIT`, `nombre_institucion`, `contacto`, `representante_legal`, `cedula`, `fecha_constitucion`, `logo`, `direccion`, `telefono`, `celular`, `correo`, `pagina_web`, `facebook`, `twitter`, `es_principal`, `sede`, `descripcion`, `sector_industrial`, `codigo_CIIU`, `idCity`, `id_clasificacion`, `usuario`, `contrasena`, `id_tipo_usuario`,codigo_padre,tipo) VALUES ('', $nit, '$empresa', '$contacto','$nombre_representante','$cedula', '$fecha', '$uploadFile', '$direccion', '$telefono', '$celular', '$mail', '$pagina', '$facebook', '$twitter','$es_visionario','','$descripcion','$sector', '$ciiu ',$ciudad ,$tipo_afiliacion,'','','',$codigo_padre,'$tipo')"; 

mysql_query($insert,$conexion);


$mensaje .= "Nombre empresa:   " .$empresa."<br><br>";
	$mensaje .= "Mail:   " . $mail."<br><br>";
	$mensaje .= "Nit :   " . $nit."<br><br>" ;
	$mensaje .= "Sector:   " . $sector."<br><br>";
	$mensaje .= "Nombre del Representante:   " . $nombre_representante ."<br><br>";
	$mensaje .= "Direccion :   " . $direccion."<br><br>";
	$mensaje .= "Telefono :   " . $telefono."<br><br>";
	$mensaje .= "Celular :   " . $celular."<br><br>";
	$mensaje .= "pagina Web:   " . $pagina."<br><br>";
	
	$para  = 'presidente@cieec.org' . ', '; 
	$para .= 'info@cieec.org';
	//$para .= 'gerencia@framesoftsolutions.com';
	
	$titulo = "Preinscripciones CIIEC";
	
	$cabeceras  = "MIME-Version: 1.0\r\n";
	$cabeceras .= "Content-type: text/html; charset=iso-8859-1\r\n";
	$cabeceras .= 'From: "Preinscripciones CIEEC <info@cieec.org>' . "\r\n";

//echo "<hr />".$mensaje;

//mail($para,$titulo,$mensaje,$cabeceras);

//exit;
echo  ("<META HTTP-EQUIV=\"Refresh\" CONTENT=\"0;URL=index.php\">");




?>
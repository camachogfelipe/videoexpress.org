<?php require_once('Connections/Proyectos.php'); 
$idempresa =$_GET['i'];
global $idempresa ;
define('CHARSET','UTF-8');

$empresa=$_POST['nombre'];
$mail= $_POST['mail'];
$tipo= $_POST['tipo_asociado'];
$sector =$_POST['sector'];
$nit =$_POST ['nit'];
$pagina =$_POST['web'];
$descripcion =$_POST['descripcion'];
$nombre_representante = $_POST['nombre_representante'];
$departamento =$_POST['departamento'];
$ciudad =$_POST['ciudad'];
$archivo =$_POST['$archivo'];
$logo =$_POST['$archivo'];
$direccion =$_POST['direccion'];
$tipo_afiliacion =$_POST['tipo_afiliacion'];
$contacto =$_POST['nombre_contacto'];
$ciiu =$_POST['ciiu'];
$es_visionario =$_POST['es_visionario'];
if ($es_visionario ==""){
  $es_visionario =0;
	}
$telefono =$_POST['telefono'];
$celular =$_POST['celular'];
$cedula =$_POST['cedula'];
$twitter=$_POST['twitter'];
$facebook=$_POST['facebook'];
$id_calsificacion= $_POST['clasificacion'];
$visionario_padre=$_POST['visionario_padre'];
if ($visionario_padre==''){
  $visionario_padre=0;
}

if ($_FILES['archivo']['name'] != "" && $_FILES['archivo']['size'] != 0){
function subir($archivo){
 		$uploaddir = 'uploads/';

        $turn_on_error_for_numeric = "0";  // 1 is error, 0 is ignore.
        //***************End user defined variables::edit past here at your own risk.
        //Form fields parsed:

        //check there is an file attachment else exit
        if (empty($archivo)) {
            //redirect to error page
        }
		
      
		$uploadfile =  $uploaddir.basename($_FILES['archivo']['name']);
        if (move_uploaded_file($_FILES['archivo']['tmp_name'], $uploadfile)) {
            //File is valid, and was successfully uploaded
            $file_name = $_FILES['archivo']['name'] ;
            $file_type = $_FILES['archivo']['type'] ;
        } else {
           //File was invalid: error out, return to form page
        }
        return $uploadfile;
}

$archivo=$_FILES['archivo'];
$uploadFile = subir($archivo);

}
$insert =("UPDATE `cieecorg_CIEC`.`empresa` set
NIT=$nit,
nombre_institucion='$empresa',
contacto='$contacto',
representante_legal= '$nombre_representante', 
cedula = '$cedula',
direccion= '$direccion', 
telefono= '$telefono',
celular= '$celular',
correo= '$mail',
pagina_web='$pagina',
facebook= '$facebook',
twitter= '$twitter',
es_principal= '$es_visionario',
descripcion= '$descripcion',
sector_industrial='$sector',
codigo_CIIU='$ciiu',
idCity= $ciudad,
id_clasificacion =$id_calsificacion,
codigo_padre = $visionario_padre,
tipo='$tipo'
WHERE empresa.id_empresa= $idempresa;"); 
$insert;
 mysql_query($insert);

if ($_FILES['archivo']['name'] != "" && $_FILES['archivo']['size'] != 0){
	$insert = mysql_query("UPDATE `cieecorg_CIEC`.`empresa` set
logo='admin/$uploadFile' WHERE empresa.id_empresa= $idempresa;"); 
	
}


echo  ("<META HTTP-EQUIV=\"Refresh\" CONTENT=\"0;URL=admin.php\">");
?>
<?php require_once('Connections/Proyectos.php'); 
$idempresa =$_GET['i'];
global $idempresa ;
define('CHARSET','UTF-8');
session_start();

$idempresa =$_GET['i'];

$delet= ("delete from cieecorg_CIEC.empresa WHERE empresa.id_empresa = $idempresa");
mysql_query($delet,$conexion);



echo  ("<META HTTP-EQUIV=\"Refresh\" CONTENT=\"0;URL=http://www.cieec.org/admin/admin.php\">");


?>
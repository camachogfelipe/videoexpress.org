<?
define('CHARSET','UTF-8');

$empresa =$_POST['empresa'];
$pais= $_POST['pais'];
$departamento =$_POST['departamento'];
$ciudad =$_POST['ciudad'];
$direccion =$_POST ['direccion'];
$telefono =$_POST['telefono'];
$celular =$_POST['celular'];
$mail = $_POST['mail'];
$web =$_POST['web'];
$Asunto =$_POST['Asunto'];
$mensaje1 =$_POST['mensaje1'];



    $mensaje .= "Nombre empresa:   " .$empresa."<br><br>";
	$mensaje .= "Mail:   " . $mail."<br><br>";
	$mensaje .= "Pais :   " . $pais."<br><br>" ;
	$mensaje .= "Departamento:   " . $departamento."<br><br>";
	$mensaje .= "Ciudad:   " . $ciudad."<br><br>";
	$mensaje .= "Direccion :   " . $direccion."<br><br>";
	$mensaje .= "Telefono :   " . $telefono."<br><br>";
	$mensaje .= "Celular :   " . $celular."<br><br>";
	$mensaje .= "pagina Web:   " . $web."<br><br>";
	$mensaje .= "Asunto :   " . $Asunto."<br><br>";
	$mensaje .= "Mensaje:   " . $mensaje1."<br><br>";

	
	
	$mensaje .= "Enviado el : " . date('d/m/Y', time());
	
	$para  = 'presidente@cieec.org' . ', '; // atención a la coma
	$para .= 'info@cieec.org'; // atención a la coma
	//$para .= 'monica.uribe.94@facebook.com';
	
	$titulo = "Formulario de Contacto CIIEC";
	
	$cabeceras  = "MIME-Version: 1.0\r\n";
	$cabeceras .= "Content-type: text/html; charset=iso-8859-1\r\n";
	$cabeceras .= 'From: "Contacto de  CIEEC <info@cieec.org>' . "\r\n";


mail($para,$titulo,$mensaje,$cabeceras);


echo  ("<META HTTP-EQUIV=\"Refresh\" CONTENT=\"0;URL=http://www.cieec.org/formulario_enviado.html\">");



?>
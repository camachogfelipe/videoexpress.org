<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../estilo.css" rel="stylesheet" type="text/css" />

<body style="margin-top: 20px">
<center>
<?php
$ok = $_REQUEST['ok'];
$es = $_REQUEST['es'];

if ($es == 1 && $ok == NULL)
{
	echo "¿Esta seguro de enviar el boletin por email?<p>&nbsp;</p>";
	echo "<span id=\"menu_admon\"><a href=\"mail.php?es=0&ok=1\">OK</a></span>&nbsp;<span id=\"menu_admon\"><a href=\"mail.php?&es=0&ok=0\">Cancelar</a></span>";
}

if ($es == 0 && $ok == 1)
{
	//nos conectamos a la base de datos
	include ("conexion.php");

	//nos conectamos a la base de datos
	$sql = "select nombre, email FROM emails";
	
	$result = mysql_query($sql) or die("La siguiente consulta contiene algún error:<br>nSQL: <b>$sql</b>");
	$total_resultados = mysql_num_rows($result);
	
	$inicio = 0;
	while ($row = mysql_fetch_array($result))
	{
		$nombre[$inicio] = "{$row['nombre']}";
		$email[$inicio] = "{$row['email']}";
		$inicio += 1;
	}

	$inicio = 0;
	
	$info = resultados($id);
	
	while ($inicio < $total_resultados)
	{
		$asunto = "Nuevo Enews"; 
		$cuerpo = "Si no puede ver correctamente este correo de click <a href=\"http://www.liceoanglocolombiano.edu.co/?ac=8&op=2&no=$info[No]\">Aqui</a><br><br>
		<html> 
		<title>Liceo Anglo Colombiano - Boletin</title>
		<link href=\"http://www.liceoanglocolombiano.org/estilo.css\" rel=\"stylesheet\" type=\"text/css\" />
		</head>

		<body>
		<div id=\"main\">
 		  <div id=\"encabezado_menu\"></div>
 		  <div id=\"logo\"><img src=\"http://www.liceoanglocolombiano.edu.co/imagenes/logo.png\" width=\"155\" height=\"155\" border=\"0\" id=\"img_logo\" /></div>
  		  <div id=\"cuerpo\"><div id=\"encabezado_cuerpo\" class=\"azul\">
		   <div>
    	    <div>Boletin No. $info[No]
			</div>
   		   </div>
  	      </div>
	      <div id=\"texto_cuerpo\">$info[boletin]</div>
		 </div>
		</div>
		</body>
		</html> 
		";

		//para el envío en formato HTML 
		$headers = "MIME-Version: 1.0\n"; 
		$headers .= "Content-type: text/html; charset=iso-8859-1\n"; 
	
		//dirección del remitente 
		$headers .= "From: Contacto Liceo Anglo Colombiano <contacto@liceoanglocolombiano.edu.co>\n"; 
		
		mail($email[$inicio],$asunto,$cuerpo,$headers);
		echo "Enviado a: $nombre[$inicio], al correo $email[$inicio]<br>";
		$inicio += 1;
	}
}

if($es == 0 && $ok == 0)
{
	echo "No se ha enviado nada";
}

function resultados($id)
{
	$sql = "select COUNT(*) FROM boletin";
	$result = mysql_query($sql) or die("La siguiente consulta contiene alg&uacute;n error:<br>nSQL: <b>$sql</b>");
	$total_resultados = mysql_fetch_array($result);
	
	$tmp = $total_resultados[0];
	$info[tr] = $tmp;
	
	if ($id == NULL || $id <= 0 || $id > $tmp) $id = $total_resultados[0];
	
	$sql = "SELECT * FROM boletin WHERE No = '$id'";
	
	$result = mysql_query($sql) or die("La siguiente consulta contiene alg&uacute;n error:<br>nSQL: <b>$cadbusca</b>");

	$No_items = 0;
	while ($row = mysql_fetch_array($result))
	{
		$info[No] 					= "{$row['No']}";
		$info[boletin]				= "{$row['boletin']}";
		$No_items++;
	}
	
	return $info;
}
?>
</center>
</body>
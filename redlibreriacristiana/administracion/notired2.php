<?php 
session_start();
include("funciones.php");

if (isset($_SESSION['valid_user']))
{
	switch($_GET['op'])
	{
		case 1 : echo resumen_notired();
				 break;
		case 2 : echo listar_notired();
				 break;
		case 3 : echo lista_inscritos();
				 break;
		case 4 : echo programar_notired();
				 break;
		case 5 : cancelar_notired();
				 break;
		default : echo resumen_notired();
				  break;
	}
}
else
{
   echo '<script type="text/javascript">window.location="../administracion";</script>';
}

function resumen_notired()
{
	$conecta = conecta_bd("redlibr_redlibreria");

	$tnr = dato_columna("notired", "COUNT(*)", "");
	$eun = dato_columna("notired", "MAX(fecha)", "");
	$tei = dato_columna("email", "COUNT(*)", "");
	$une = dato_columna("datos", "id_notired", "");
	$unf = dato_columna("datos", "fecha_enviado_notired", "");
	$unt = dato_columna("datos", "fecha_terminado_notired", "");
	$epe = dato_columna("datos", "en_proceso", "");
	
	echo "Total NotiRED escritos: <span id='resaltado'>".$tnr."</span>\n";
	echo "<br />El &uacute;ltimo NotiRED escrito fue en el: <span id='resaltado'>".$eun."</span>\n";
	echo "<br />El total de email's inscritos para env&iacute;o de NotiRED es de <span id='resaltado'>".number_format($tei)."</span>\n";
	echo "<br />El &uacute;ltimo NotiREd enviado fue el: <span id='resaltado'>".$une."</span>\n";
	echo "<br />El &uacute;ltimo NotiREd empezo a ser enviado el: <span id='resaltado'>".$unf."</span>\n";
	echo "<br />El &uacute;ltimo NotiREd se termino de enviar el: <span id='resaltado'>".$unt."</span>\n";
	echo "<br />El &uacute;ltimo notired <span id='resaltado'>";
	if($epe == "S") echo "esta";
	else echo "no esta";
	echo "</span> en proceso de env&iacute;o\n";
}

function listar_notired()
{
	$conecta = conecta_bd("redlibr_redlibreria");
	$consulta = consulta_bd("notired", "*", "2;fecha;DESC;;;");
	echo '<table width="100%" cellpadding="2" cellspacing="0" border="0" align="center">';
	echo '<thead><tr><td>Id</td><td>T&iacute;tulo</td><td>Encabezado</td><td>Texto</td><td>Fecha</td><td>Acci&oacute;n</td></tr></thead>';
	while($row=mysql_fetch_object($consulta))
	{
		echo "<tr>\n";
		echo "<td align='center'>".$row->id_notired."</td>\n";
		echo "<td>".$row->titulo."</td>\n";
		echo "<td>".$row->encabezado."</td>\n";
		echo "<td>".htmlspecialchars_decode($row->texto)."</td>\n";
		echo "<td>".$row->fecha."</td>\n";
		$variables = "No=".$row->id_notired."&editar=true";
		echo '<td><a href="#" onClick="'."recargar('editar','$variables','#contenido_notired')".'">Editar</a> | <a href="#" onClick="'."recargar('borrar','id=".$row->id_notired."&tabla=notired&pagina=notired','#contenido_notired')".'">Eliminar</a></td>';
		echo "<tr>";
	}
	echo "</table>";
}

function lista_inscritos()
{
	$conecta = conecta_bd("redlibr_redlibreria");
	$consulta = consulta_bd("email", "*", "2;id_email;ASC;;;");
	echo '<table width="100%" cellpadding="2" cellspacing="0" border="0" align="center">';
	echo '<thead><tr><td>Id</td><td>Nombres</td><td>Email</td><td>Acci&oacute;n</td></tr></thead>';
	while($row=mysql_fetch_object($consulta))
	{
		echo "<tr>\n";
		echo "<td align='center'>".$row->id_email."</td>\n";
		echo "<td>".$row->nombres."</td>\n";
		echo "<td>".$row->email."</td>\n";
		$variables = "id_email=".$row->id_email."&nombres=".$row->nombres."&email=".$row->email;
		echo '<td><a href="#" onClick="'."recargar('editar_email','$variables&editar=true','#contenido_notired')".'">Editar</a> | <a href="#" onClick="'."recargar('borrar','id=".$row->id_email."&tabla=email&pagina=notired','#contenido_notired')".'">Eliminar</a></td>';
		echo "<tr>";
	}
	echo "</table>";
}

function programar_notired()
{
	$conecta = conecta_bd("redlibr_redlibreria");
	echo "&Uacute;ltimo NotiRED escrito: ".$maxnot = dato_columna("notired", "MAX(id_notired)", "");
	echo "<br />&Uacute;ltimo NotiRED enviado: ".$notenv = dato_columna("datos", "id_notired", "");
	echo "<br />Fecha de inicio del env&iacute;o del NotiRED: ".$fecha1 = dato_columna("datos", "fecha_enviado_notired", "");
	echo "<br />Fecha de terminaci&oacute;n del env&iacute;o del NotiRED: ".$fecha2 = dato_columna("datos", "fecha_terminado_notired", "");
	echo "<br />Esta en proceso de env&iacute;o el NotiRED: ".$enproc = dato_columna("datos", "en_proceso", "");
	if($maxnot > $notenv and $enproc != "S")
	{
		$fecha1 = "fecha_enviado_notired='".date("Y-m-d")."'";
		$fecha2 = "fecha_terminado_notired='0000-00-00'";
		$id_notired = "id_notired='".$maxnot."'";
		$en_proc = "en_proceso='S'";
		act_datos_tabla("datos", $fecha1, "id_datos='1'", 1);
		act_datos_tabla("datos", $fecha2, "id_datos='1'", 1);
		act_datos_tabla("datos", $id_notired, "id_datos='1'", 1);
		act_datos_tabla("datos", $en_proc, "id_datos='1'", 1);
		echo "<p>Se ha programado el env&iacute;o del NotiRED No. ".$maxnot."</p>";
		prewiev($maxnot);
	}
	elseif($maxnot == $notenv and $enproc == "N") echo "<p>Este NotiREd ya fue enviado</p>";
	elseif($maxnot == $notenv and $enproc == "S") echo "<p>El NotiRed esta en proceso de ser enviado, por favor escriba uno nuevo y espere a que el env&iacute;o del presente se haya terminado. Gracias</p>";
	elseif($maxnot > $notenv and $enproc == "S") echo "<p>Se esta enviando el notired anterior, debe esperar a que termine este proceso para comenzar uno nuevo</p>";
}

function cancelar_notired()
{
	$c = $_GET['c'];
	if($c == NULL)
	{
		echo "&iquest;Est&aacute; seguro de cancelar el env&iacute;o del NotiRED?";
		echo "<br /><br />";
		echo "<a href=\"#enviar\" id=\"enviar\" onClick=\"recargar('notired2','op=5&c=1','#contenido_notired')\">OK</a>";
		echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
		echo "<a href=\"#Home\" id=\"Home\" onClick=\"recargar('notired2','op=1','#contenido_notired')\">Cancelar</a>";
	}
	else
	{
		$conecta = conecta_bd("redlibr_redlibreria");
		act_datos_tabla("datos", "fecha_enviado_notired='0000-00-00', fecha_terminado_notired='0000-00-00', id_notired='0', en_proceso='N', inicio='0'", "id_datos='1'", 1);
		echo "El env&iacute;o del NotiRED fue cancelado con &eacute;xito";
	}
}

function prewiev($id_notired)
{
	$sql = "SELECT * FROM notired WHERE id_notired = '$id_notired'";
	
	$result = mysql_query($sql) or die("La siguiente consulta contiene alg&uacute;n error:<br>nSQL: <b>$sql</b>");

	$No_items = 0;
	while ($row = mysql_fetch_array($result))
	{
		//datos notired
		$info[No] 					= "{$row['id_notired']}";
		$info[titulo_notired]		= "{$row['titulo']}";
		$info[encabezado_notired] 	= "{$row['encabezado']}";
		$info[fecha_notired]	 	= "{$row['fecha']}";
		$No_items++;
	}
	
	$rec = recomendados2();
	$nov = novedades2();
	
	$cuerpo = '
<br />
<div style="width:713px; background-color: #FFF; color:#000">
	<div><img src="http://www.redlibreriacristiana.org/images/notired/cabezoteNotired-03.png" width="713" height="118" border="0"></div>
	<div style="padding-left: 20px; min-height: 33px; background-color: #C1272D; color: #FFF; font-weight: bolder; font-size: 26px; font-family: \'Times New Roman\', Times, serif; font-style: italic; width: 500px; text-align: left">NotiRED</div>
	<div>
		<span style="color: #C1272D; font-size: 18px">'.ucfirst($info[titulo_notired]).'</span> <span style="color: #BBB">'.$info[fecha_notired].'</span>
		<p>'.$info[encabezado_notired].'</p>
		<a href="http://www.redlibreriacristiana.org/">Ver m&aacute;s...</a>
	</div>
	<div style="padding-left: 20px; min-height: 33px; background-color: #C1272D; color: #FFF; font-weight: bolder; font-size: 26px; font-family: \'Times New Roman\', Times, serif; font-style: italic; width: 500px; margin-top: 15px; text-align: left">Recomendados</div>
	<div>
	<div>'.$rec.'</div>
	<div style="padding-left: 20px; min-height: 33px; background-color: #C1272D; color: #FFF; font-weight: bolder; font-size: 26px; font-family: \'Times New Roman\', Times, serif; font-style: italic; width: 500px; margin-top: 15px; text-align: left">Novedades</div>
	<div>
	<div>'.$nov.'</div>
</div>
	<div style="clear: both; text-align: center">Cont&aacute;ctenos a <a href="mailto:notired@redlibreriacristiana.org"><u>notired@redlibreriacristiana.org</u></a><br />
    Tel.: (57 1) 229 8725 - 429 8580 - 429 9618<br />
   	Bogot&aacute; - Colombia
    &bull; &copy; redlibreriacristiana.org</a>. 2011.
	</div>
';
	echo '<div style="background-color:#FFF"'.$cuerpo.'</div>';
}
?>
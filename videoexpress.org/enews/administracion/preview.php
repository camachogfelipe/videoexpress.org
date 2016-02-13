<?php
$id = $_REQUEST['id'];

$bd = 'enews';
include('conexion.php');

$info = resultados_preview($id);

function resultados_preview($id)
{
	$sql = "select COUNT(*) FROM inicio";
	$result = mysql_query($sql) or die("La siguiente consulta contiene alg&uacute;n error:<br>nSQL: <b>$sql</b>");
	$total_resultados = mysql_fetch_array($result);
	
	$tmp = $total_resultados[0];
	$info[tr] = $tmp;
	
	if ($id == NULL || $id <= 0 || $id > $tmp) $id = $total_resultados[0];
	
	$sql = "SELECT * FROM inicio WHERE No = '$id'";
	
	$result = mysql_query($sql) or die("La siguiente consulta contiene alg&uacute;n error:<br>nSQL: <b>$cadbusca</b>");

	$No_items = 0;
	while ($row = mysql_fetch_array($result))
	{
		$info[No] 			= "{$row['No']}";
		$info[titulo_paraeditar]	= "{$row['titulo_paraeditar']}";
		$info[cuerpo_paraeditar] 	= "{$row['cuerpo_paraeditar']}";
		$info[titulo_primerafila]	= "{$row['titulo_primerafila']}";
		$info[cuerpo_primerafila] 	= "{$row['cuerpo_primerafila']}";
		$info[titulo_nuevamente]	= "{$row['titulo_nuevamente']}";
		$info[cuerpo_nuevamente] 	= "{$row['cuerpo_nuevamente']}";
		$info[titulo_buenasnuevas]	= "{$row['titulo_buenasnuevas']}";
		$info[cuerpo_buenasnuevas] 	= "{$row['cuerpo_buenasnuevas']}";
		$info[titulo_garabatos]		= "{$row['titulo_garabatos']}";
		$info[cuerpo_garabatos] 	= "{$row['cuerpo_garabatos']}";
		$info[fecha]			= "{$row['fecha']}";
		$info[fondo]			= "{$row['fondo']}";
		$No_items++;
	}
	
	return $info;
}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>VideoExpress.org E-news</title>
<link href="../estilo.css" rel="stylesheet" type="text/css" />
</head>

<body>
<center>
 <div id="Imagen_de_fondo" style="background-image:url(../imagenes-para-secciones/fondos/<?php echo $info[fondo]; ?>);">
  <div id="Imagen_de_base">
   <div id="No">
    <span style="color: #FFF">Num. <?php echo $info[No]; ?>&nbsp;&#8226;&nbsp;<?php echo $info[fecha]; ?></span>
   </div>
   <table width="500" border="0" cellspacing="0" cellpadding="0">
    <tr>
     <td height="173px" style="text-align:center">&nbsp;
      
     </td>
    </tr>
    <tr>
     <td height="550px">
       <table width="498" border="0" cellspacing="0" cellpadding="0">
         <tr>
           <td width="50%" id="td_cuerpo" class="left">
            <span id="index">
             <p id="index" class="resaltado"><?php echo $info[titulo_paraeditar]; ?></p><?php echo $info[cuerpo_paraeditar]; ?>
            </span>
           </td>
           <td><img src="../imagenes/paraeditar_index.png" width="247" height="109" border="0" /></td>
         </tr>
         <tr>
           <td><img src="../imagenes/primerafila_index.png" width="247" height="109" border="0" /></td>
           <td id="td_cuerpo" class="right">
            <span id="index">
             <p id="index" class="resaltado"><?php echo $info[titulo_primerafila]; ?></p><?php echo $info[cuerpo_primerafila]; ?>
            </span>
           </td>
         </tr>
         <tr>
           <td id="td_cuerpo" class="left">
            <span id="index">
             <p id="index" class="resaltado"><?php echo $info[titulo_nuevamente]; ?></p><?php echo $info[cuerpo_nuevamente]; ?>
            </span>
           </td>
           <td><img src="../imagenes/nuevamente_index.png" width="247" height="110" border="0" /></td>
         </tr>
         <tr>
           <td><img src="../imagenes/buenasnuevas_index.png" width="247" height="109" border="0" /></td>
           <td id="td_cuerpo" class="right">
            <span id="index">
             <p id="index" class="resaltado"><?php echo $info[titulo_buenasnuevas]; ?></p><?php echo $info[cuerpo_buenasnuevas]; ?>
            </span>
           </td>
         </tr>
         <tr>
           <td id="td_cuerpo" class="left">
            <span id="index">
             <p id="index" class="resaltado"><?php echo $info[titulo_garabatos]; ?></p><?php echo $info[cuerpo_garabatos]; ?>
            </span>
           </td>
           <td><img src="../imagenes/garabatos_index.png" width="247" height="109" border="0" /></td>
         </tr>
       </table>
      </td>
    </tr>
    <tr>
     <td id="mail">Una publicaci&oacute;n de <b>VideoExpress.org</b><br />La primera organizaci&oacute;n de alquiler, venta, difusi&oacute;n y exhibici&oacute;n de <b>Videos con principios y valores</b></td>
    </tr>
   </table>
  </div>
 </div>
 <div style="width: 700px; background-color: #000">
  <table width="400" border="0" cellspacing="0" cellpadding="0" align="center">
	 <tr>
      <td>
       <div id="navbar">
        <ul>
         <li class="menu_derecha"><span>VideoExpress.org</span></li>
         <li class="menu_derecha"><span>Catalogo</span></li>
         <li class="menu_derecha"><span>E-news anterior</span></li>
         <li><span>E-news siguiente</span></li>
        </ul>
       </div>
      </td>
     </tr>
    </table>
 </div>
 <div id="linkweb">Cont&aacute;ctenos a <u>news@videoexpress.org</u>  / <u>gerencia@videoexpress.org</u><br />
    Tel.: (57 1) 526 9007  &bull; Cel.: 312 4907879<br />
    Bogot&aacute; - Colombia
    &bull; &copy; VideoExpress.org</a>. 2009.
 </div>
</center>
</body>
</html>
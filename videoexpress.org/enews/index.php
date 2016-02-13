<?php
$id = $_REQUEST['id'];

$bd = 'enews';
include('administracion/conexion.php');

$info = resultados($id);
$ts = ts();

function resultados($id)
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

function ts()
{
	$sql = "select COUNT(*) FROM sus_enews";
	$result = mysql_query($sql) or die("La siguiente consulta contiene alg&uacute;n error:<br>nSQL: <b>$sql</b>");
	$total_resultados = mysql_fetch_array($result);
	
	$ts = $total_resultados[0];
	
	return $ts;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" href="../images/favicon.ico" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<META NAME="Title" CONTENT="VideoExpress.org">
<META NAME="Author" CONTENT="VideoExpress.org - Felipe Camacho">
<META NAME="Subject" CONTENT="peliculas cristianas, peliculas con mensaje, peliculas de contenido educativo">
<META NAME="Description" CONTENT="VideoExpress.org es una empresa que tiene como objetivo el de prestar el servicio de alquiler de peliculas y venta de libros que tiene un muy buen mensaje">
<META NAME="Keywords" CONTENT="peliculas, libros, cristianos, cristianas, mensaje, mensajes, pelicula, videos con mensaje, videos, cortos, cortometraje, cortometrajes, documentales, documental">
<META NAME="Language" CONTENT="Spanish">
<META NAME="Revisit" CONTENT="1 day">
<META NAME="Distribution" CONTENT="Global">
<META NAME="Robots" CONTENT="All">
<title>VideoExpress.org E-news</title>
<link href="estilo.css" rel="stylesheet" type="text/css" />
</head>

<body>
<center>
 <div id="Imagen_de_fondo" style="background-image:url(imagenes-para-secciones/fondos/<?php echo $info[fondo]; ?>);">
  <div id="Imagen_de_base">
   <div id="No">
    <div style="color:#FFF; float:left"><?php echo number_format($ts) ?> suscriptores</div><span style="color: #FFF">Num. <?php echo $info[No]; ?>&nbsp;&#8226;&nbsp;<?php echo $info[fecha]; ?></span>
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
             <span id="index" class="resaltado"><?php echo $info[titulo_paraeditar]; ?></span><br /><?php echo $info[cuerpo_paraeditar]; ?>
            </span>
           </td>
           <td><img src="imagenes/paraeditar_index.png" width="247" height="109" border="0" usemap="#paraeditar" /></td>
         </tr>
         <tr>
           <td><img src="imagenes/primerafila_index.png" width="247" height="109" border="0" usemap="#primerafila" /></td>
           <td id="td_cuerpo" class="right">
            <span id="index">
             <span id="index" class="resaltado"><?php echo $info[titulo_primerafila]; ?></span><br /><?php echo $info[cuerpo_primerafila]; ?>
            </span>
           </td>
         </tr>
         <tr>
           <td id="td_cuerpo" class="left">
            <span id="index">
             <span id="index" class="resaltado"><?php echo $info[titulo_nuevamente]; ?></span><br /><?php echo $info[cuerpo_nuevamente]; ?>
            </span>
           </td>
           <td><img src="imagenes/nuevamente_index.png" width="247" height="109" border="0" usemap="#nuevamente" /></td>
         </tr>
         <tr>
           <td><img src="imagenes/buenasnuevas_index.png" width="247" height="109" border="0" usemap="#buenasnuevas" /></td>
           <td id="td_cuerpo" class="right">
            <span id="index">
             <span id="index" class="resaltado"><?php echo $info[titulo_buenasnuevas]; ?></span><br /><?php echo $info[cuerpo_buenasnuevas]; ?>
            </span>
           </td>
         </tr>
         <tr>
           <td id="td_cuerpo" class="left">
            <span id="index">
             <span id="index" class="resaltado"><?php echo $info[titulo_garabatos]; ?></span><br /><?php echo $info[cuerpo_garabatos]; ?>
            </span>
           </td>
           <td><img src="imagenes/garabatos_index.png" width="247" height="109" border="0" usemap="#garabatos" /></td>
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
 <div style="width: 700px; background-color: #000"><br />
  <table width="400" border="0" cellspacing="0" cellpadding="0" align="center">
	 <tr>
      <td>
       <div id="navbar">
        <ul>
         <li class="menu_derecha"><a href="../"><span>VideoExpress.org</span></a></li>
         <li class="menu_derecha"><a href="../catalogo"><span>Catalogo</span></a></li>
         <li class="menu_derecha">
         <?php
		  $id = $info[No] - 1;
		  
		  if ($id == 0) echo "<span>E-news anterior</span>";
		  else echo "<a href=\"?id=$id\"><span>E-news anterior</span></a>"
		 ?>
		 </li>
         <li>
          <?php
		   if ($info[tr] == $info[No]) echo "<span>E-news siguiente</span>";
		   else
		   {
			   $id = $info[No] + 1;
			   echo "<a href=\"?id=$id\"><span>E-news siguiente</span></a>";
		   }
		  ?>
         </li>
        </ul>
       </div>
      </td>
     </tr>
    </table>
 </div>
 <div id="linkweb">Cont&aacute;ctenos a <a href="mailto:news@videoexpress.org; gerencia@videoexpress.org" class="linkweb"><u>enews@videoexpress.org</u>  / <u>gerencia@videoexpress.org</u></a><br />
    Tel.: (57 1) 526 9007  &bull; Cel.: 312 4907879<br />
    Bogot&aacute; - Colombia
    &bull; &copy; VideoExpress.org</a>. 2009.
 </div>
</center>

<map name="paraeditar" id="paraeditar">
  <area shape="rect" coords="0,0,247,109" href="seccion.php?seccion=para_editar&id=<?php echo $info[No]; ?>" alt="Para editar..." />
</map>
<map name="primerafila" id="primerafila">
  <area shape="rect" coords="0,0,247,109" href="seccion.php?seccion=primera_fila&id=<?php echo $info[No]; ?>" alt="En primera fila" />
</map>
<map name="nuevamente" id="nuevamente">
  <area shape="rect" coords="0,0,247,109" href="seccion.php?seccion=nueva_mente&id=<?php echo $info[No]; ?>" alt="Nueva...mente" />
</map>
<map name="buenasnuevas" id="buenasnuevas">
  <area shape="rect" coords="0,0,247,109" href="seccion.php?seccion=buenas_nuevas&id=<?php echo $info[No]; ?>" alt="Buenas nuevas para ver" />
</map>
<map name="garabatos" id="garabatos">
  <area shape="rect" coords="0,0,247,109" href="seccion.php?seccion=garabatos&id=<?php echo $info[No]; ?>" alt="Videos y Garabatos" />
</map>
</body>
</html>
<?php
session_start();
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
$pag = $_REQUEST['pag'];
$orden = $_REQUEST['orden'];
?>
<HTML>
<HEAD>
<TITLE>Actualizar base de datos</TITLE>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="blitzer/jquery-ui-1.9.2.custom.min.css" type="text/css" media="screen" />
<link href="../../estilo.css" rel="stylesheet" type="text/css">
<?php
  // check session variable

if (isset($_SESSION['user_admin']))
{
?>
<style>
.progress {
	position:relative;
	height: 22px;
	border: 1px solid #ddd;
	overflow: hidden;
	background-color: #F7F7F7;
	background-image: -moz-linear-gradient(top, whiteSmoke, #F9F9F9);
	background-image: -webkit-gradient(linear, 0 0, 0 100%, from(whiteSmoke), to(#F9F9F9));
	background-image: -webkit-linear-gradient(top, whiteSmoke, #F9F9F9);
	background-image: -o-linear-gradient(top, whiteSmoke, #F9F9F9);
	background-image: linear-gradient(to bottom, whiteSmoke, #F9F9F9);
	background-repeat: repeat-x;
	filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#fff5f5f5', endColorstr='#fff9f9f9', GradientType=0);
	-webkit-box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
	-moz-box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
	box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
}

.progress, #status {
	width:80%;
	max-width: 80%;
	margin: 0 auto 0 auto;
	padding: 1px;
	-webkit-border-radius: 4px;
	-moz-border-radius: 4px;
	border-radius: 4px;
}

#status {
	width:790;
	max-width: 790px;
	margin: 0 auto 0 auto;
	padding: 1px;
	-webkit-border-radius: 4px;
	-moz-border-radius: 4px;
	border-radius: 4px;
}

.bar {
	background-color: white;
	background-image: url(../../Imagenes_pagina/progressbar.gif);
	width:0%;
	height: 100%;
	color: white;
	float: left;
	font-size: 12px;
	text-align: center;
	text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
	background-color: #0E90D2;
	background-repeat: repeat-x;
	-webkit-box-shadow: inset 0 -1px 0 rgba(0, 0, 0, 0.15);
	-moz-box-shadow: inset 0 -1px 0 rgba(0, 0, 0, 0.15);
	box-shadow: inset 0 -1px 0 rgba(0, 0, 0, 0.15);
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	box-sizing: border-box;
	-webkit-transition: width 0.6s ease;
	-moz-transition: width 0.6s ease;
	-o-transition: width 0.6s ease;
	transition: width 0.6s ease;
	-webkit-border-radius: 4px;
	-moz-border-radius: 4px;
	border-radius: 4px;
}
.percent { position:absolute; display:inline-block; top:3px; left:48%; }

.form_upload {
	margin: 20px;
	background-color: #92298D;
	color: white;
	display: block;
	-moz-border-radius: 10px;
	-webkit-border-radius: 10px;
	border-radius: 10px;
	padding: 15px
}
</style>
</HEAD>
<BODY>
<center>
<?php
$id				= $_GET["id"];
$titulo			= $_GET["titulo"];
$auditorio		= $_GET["auditorio"];
$clasificacion	= $_GET["clasificacion"];
$genero			= $_GET["genero"];
$tiempo			= $_GET["tiempo"];
$descripcion	= $_GET["descripcion"];
$imagen			= $_GET["imagen"];
$formato		= $_GET["formato"];
$nuevo			= $_GET["nuevo"];
$compra			= $_GET["compra"];
$alquiler		= $_GET["alquiler"];
$precio_compra	= $_GET["precio_compra"];
$editar			= $_GET['editar'];
$trailer		= $_GET['trailer'];
$online			= $_GET['online'];
$resena			= $_GET['resena'];
$pag			= $_GET['pag'];
$orden			= $_GET['orden'];

if ($pag == NULL) $pag = 1;
if ($orden == NULL) $orden = 1;

?>
<form action="subir_fich.php?pag=<?php echo $pag ?>&orden=<?php echo $orden; ?>" method="post" id="peliculas" enctype="multipart/form-data" onSubmit="return comprobar(this)">
 <?php
 	if($editar == true) {
		echo '<input type="hidden" name="editar" value="true" />'."\n";
		if($imagen != NULL) echo '<input type="hidden" name="imagen_" value="'.$imagen.'" />'."\n";
		if($trailer != NULL) echo '<input type="hidden" name="trailer_" value="'.$trailer.'" />'."\n";
		if($online != NULL) echo '<input type="hidden" name="online_" value="'.$online.'" />'."\n";
		if($resena != NULL) echo '<input type="hidden" name="resena_" value="'.$resena.'" />'."\n";
	}
 ?>
  <table width="800" border="1px" cellspacing="0" cellpadding="2px" align="center" style="border-style:dotted; background-color: #9ABEDC; color:#000">
  <tr>
    <td>
    <table width="100%" border="0" cellspacing="0" cellpadding="2px" style="color:#000">
<?php if($editar == true)
	  {
		echo "<tr><td width='35%'>ID</td><td width='40%'>$id<input name='id' type='hidden' id='id' size='10' maxlength='3' value='$id'</td></tr>";
	  } ?>    
  <tr height="30px">
    <td width="40%">T&#237;tulo de la pel&#237;cula</td>
    <td width="60%"><input name="titulo_pelicula" type="text" id="titulo_pelicula" tabindex="1" size="50" style="color:#000" value="<?php if($editar == true)
	  {
	  	echo "$titulo";
	  } ?>" /></td>
  </tr>
  <tr height="30px">
    <td>Auditorio</td>
    <td>
      <select name="auditorio" id="auditorio" tabindex="2">
        <option value="adultos" <?php if ($auditorio == 'adultos') echo "selected='selected'"; ?>>Adultos</option>
        <option value="familiar" <?php if ($auditorio == 'familiar') echo "selected='selected'"; ?>>Familiar</option>
        <option value="infantil" <?php if ($auditorio == 'infantil') echo "selected='selected'"; ?>>Infantil</option>
        <option value="juvenil" <?php if ($auditorio == 'juvenil') echo "selected='selected'"; ?>>Juvenil</option>
        <option value="musical" <?php if ($auditorio == 'musical') echo "selected='selected'"; ?>>Musical</option>
        <option value="videoclips" <?php if ($auditorio == 'videoclips') echo "selected='selected'"; ?>>VideoCLIPS</option>
      </select>
    </td>
  </tr>
  <tr height="30px">
    <td>Clasificaci&oacute;n</td>
    <td>
      <select name="clasificacion" id="clasificacion" tabindex="3">
        <option value="PG" <?php if ($clasificacion == 'PG') echo "selected='selected'"; ?>>PG</option>
        <option value="G" <?php if ($clasificacion == 'G') echo "selected='selected'"; ?>>G</option>
        <option value="R" <?php if ($clasificacion == 'R') echo "selected='selected'"; ?>>R</option>
      </select>
    </td>
  </tr>
  <tr height="30px">
    <td>Genero</td>
    <td>
      <select name="genero" id="genero" tabindex="4">
      	<option value="aventura" <?php if ($auditorio == 'aventura') echo "selected='selected'"; ?>>Aventura</option>
        <option value="Charla Edificaci&#243;n" <? if ($genero == 'Charla Edificaci&#243;n') echo "selected='selected'"; ?>>Charla Edificaci&#243;n</option>
        <option value="Dibujos animados" <?php if ($genero == 'Dibujos animados') echo "selected='selected'"; ?>>Dibujos animados</option>
        <option value="Documental" <?php if ($genero == 'Documental') echo "selected='selected'"; ?>>Documental</option>
        <option value="Drama" <?php if ($genero == 'Drama') echo "selected='selected'"; ?>>Drama</option>
        <option value="Musica Concierto" <? if ($genero == 'Musica concierto') echo "selected='selected'"; ?>>M&#250;sica concierto</option>
        <option value="Musicales" <?php if ($genero == 'Musicales') echo "selected='selected'"; ?>>Musicales</option>
        <option value="Testimonial" <?php if ($genero == 'Testimonial') echo "selected='selected'"; ?>>Testimonial</option>
      </select>
    </td>
  </tr>
  <tr height="30px">
    <td>Tiempo</td>
    <td><input name="tiempo" type="text" id="tiempo" style="color:#000" tabindex="5" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue=false;" value="<?php if($editar == true)
	  {
	  	echo "$tiempo";
	  } ?>" size="3" maxlength="3" /></td>
  </tr>
  <tr>
    <td height="136" valign="top">Descripci&oacute;n</td>
    <td><textarea name="descripcion" cols="60" rows="6" tabindex="6"><?php if($editar == true)
	  {
	  	echo "$descripcion";
	  }?></textarea></td>
  </tr>
  <tr>
    <td>Imagen de la pel&#237;cula</td>
    <td><?php echo "$imagen"; ?><br><input name="archivo" type="file" size="35" tabindex="7" /></td>
  </tr>
  <tr>
    <td valign="top">Trailer de la pel&#237;cula</td>
    <td><?php echo "$trailer"; ?>
    	<div id="video">
         	<label for="tipo_video">Tipo del video: </label>
            <select name="tipo_video" id="tipo_video" tabindex="2">
            	<option value="">Seleccione el tipo de video</option>
	            <option value="link">Link</option>
    	        <option value="archivo">Archivo</option>
            </select><br /><br />
			<div id="link_video"><label for="web">Link: </label><input type="text" name="web" id="web" size="70" /></div>
			<div id="div_archivo"><label for="archivo">Archivo: </label><br><input name="trailer" type="file" size="35" tabindex="8" id="trailer" /></div>
	    </div>
	</td>
  </tr>
  <tr>
    <td valign="top">Video online de la película</td>
    <td><?php echo "$online"; ?>
    	<div id="video_online">
         	<label for="tipo_video_online">Tipo del video: </label>
            <select name="tipo_video_online" id="tipo_video_online" tabindex="2">
            	<option value="">Seleccione el tipo de video online</option>
	            <option value="online_link">Link</option>
    	        <option value="online_archivo">Archivo</option>
            </select><br /><br />
			<div id="link_video_online"><label for="web_online">Link: </label><input type="text" name="web_online" id="web_online" size="70" /></div>
			<div id="div_archivo_online"><label for="online">Archivo: </label><br><input name="online" type="file" size="35" tabindex="8" id="online" /></div>
	    </div>
	</td>
  </tr>
  <tr>
    <td>Rese&ntilde;a de la pel&#237;cula</td>
    <td><?php echo "$resena"; ?><br><input name="resena" type="file" size="35" tabindex="9" id="resena" /></td>
  </tr>
  <tr height="30px">
    <td>Formato</td>
    <td>
      <select name="formato" id="formato" tabindex="10">
        <option value="DVD" <?php if ($formato == 'DVD') echo "selected='selected'"; ?>>DVD</option>
        <option value="BlueRay" <?php if ($formato == 'BlueRay') echo "selected='selected'"; ?>>BlueRay Disc</option>
        <option value="HD-DVD" <?php if ($formato == 'HD-DVD') echo "selected='selected'"; ?>>HD-DVD</option>
        <option value="ONLINE" <?php if ($formato == 'ONLINE') echo "selected='selected'"; ?>>Online</option>
      </select>
    </td>
  </tr>
  <tr height="30px">
    <td>Es t&#237;tulo nuevo?</td>
    <td><input name="nuevo" type="radio" id="nuevo" tabindex="11" value="si" <?php if ($nuevo == 'si' || $nuevo == NULL) {?> checked <?php } ?> />&nbsp;Si&nbsp;
        <input type="radio" name="nuevo" id="nuevo" tabindex="12" value="no"  <?php if ($nuevo == 'no') { echo "checked"; } ?>/>&nbsp;No
    </td>
  </tr>
  <tr>
   <td>¿Se permite compra?</td>
   <td><input name="compra" type="radio" id="compra" tabindex="13" value="si" <?php if ($compra == 'si' || $compra == NULL) {?> checked <?php } ?> />&nbsp;Si&nbsp;
        <input type="radio" name="compra" id="compra" tabindex="14" value="no"  <?php if ($compra == 'no') { echo "checked"; } ?>/>
        No,&nbsp;precio para compra:&nbsp;$&nbsp;<input name="precio_compra" type="text" size="8" tabindex="13" value="<?php if ($precio_compra != NULL) { echo $precio_compra; } ?>" onKeyPress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue=false;" maxlength="6" >
   </td>
  </tr>
  <tr>
   <td>¿Se permite alquiler?</td>
   <td><input name="alquiler" type="radio" id="alquiler" tabindex="15" value="si" <?php if ($alquiler == 'si' || $alquiler == NULL) {?> checked <?php } ?> />&nbsp;Si&nbsp;
        <input type="radio" name="alquiler" id="alquiler" tabindex="16" value="no"  <?php if ($alquiler == 'no') { echo "checked"; } ?>/>&nbsp;No
   </td>
  </tr>
</table>
    </td>
  </tr>
  <tr>
    <td align="center">
     <a id="flechas" onClick="history.go(-1)" style="cursor:pointer" ><img src="../../botones/botonatras.png" alt="Regresar" width="25" height="25" align="absmiddle" /> Cancelar</a>
     <input name="enviar" type="submit" value="Ingresar y/o actualizar pel&#237;cula" tabindex="17" />
  <input name="action" type="hidden" value="upload" />
    </td>
  </tr>
  <tr>
  	<td colspan="2">
    	<div class="progress">
            <div class="bar"></div >
            <div class="percent">0%</div >
        </div>
        <div id="status" style="color: black; background-color:#9ABEDC"></div>
    </td>
  </tr>
</table>
</form>
<script type="text/javascript" src="../../Scripts/jquery-1.8.2.min.js"></script>
<script type="text/javascript" src="../../Scripts/jquery.form.js"></script>
<script type="text/javascript" src="../../Scripts/jquery.validate.js"></script>
<script type="text/javascript" src="../../Scripts/jquery.validate.additional-methods.js"></script>
<script type="text/javascript" src="../../Scripts/bootstrap.min.js"></script>
<script type="text/javascript" src="../../Scripts/jquery-ui/js/jquery-ui-1.9.2.custom.min.js"></script>
<script type="text/javascript" src="../../Scripts/funcionescog.js"></script>
<script type="text/javascript" src="../../Scripts/upload.js"></script>
</BODY>
</HTML>
<?php
}
else
{
	include ('index.php');
}
?>

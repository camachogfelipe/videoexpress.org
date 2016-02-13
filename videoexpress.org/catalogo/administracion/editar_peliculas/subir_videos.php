<?php
$id = $_GET['id'];
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="estilo.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../Scripts/jquery-ui/js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="../Scripts/jquery.form.js"></script>
<script type="text/javascript" src="../Scripts/audio_video.js"></script>
<script type="text/javascript" src="upload_files/LoadVars.js"><!--// http://www.devpro.it/javascript_id_92.html //--></script>
<script type="text/javascript" src="upload_files/BytesUploaded.js"><!--// http://www.devpro.it/javascript_id_96.html //--></script>
<script type="text/javascript">
	var bUploaded = new BytesUploaded('upload_files/whileuploading.php');
</script>
<form action="subir_predica2.php?id=<?php echo $id ?>" method="post" enctype="multipart/form-data" name="subir" id="subir">
	<label for="nombre_archivo">Nombre del archivo: </label><input name="nombre_archivo" type="text" id="nombre_archivo" size="40" tabindex="1" /><br />
    <label for="tipo_archivo">Tipo del archivo: </label>
    <select name="tipo_archivo" id="tipo_archivo" tabindex="2">
    	<option value="">Seleccione el tipo de archivo</option>
        <option value="audio">Audio</option>
        <option value="video">Video</option>
	</select><br /><br />
    <div id="video">
   	  <label for="tipo_video">Tipo del video: </label>
    	<select name="tipo_video" id="tipo_video" tabindex="2">
	    	<option value="">Seleccione el tipo de video</option>
       	  <option value="link">Link</option>
   	      <option value="archivo">Archivo</option>
		</select><br /><br />
      <div id="link_video"><label for="web">Link: </label><input type="text" name="web" id="web" size="100" /></div>
    </div>
    <div id="div_archivo"><label for="archivo">Archivo: </label><input name="archivo" id="archivo" type="file" tabindex="3" /></div>
    <button name="submit" type="submit"><img src="../imagenes/boton_enviar_form_contacto.png" width="26" height="26" align="absmiddle" /> Subir archivo</button>
</form>
<div id="fileprogress"></div>
<pre><?php include("upload_files/test2.php"); ?></pre>
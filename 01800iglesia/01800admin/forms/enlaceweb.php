<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="estilo.css" rel="stylesheet" type="text/css" />
<form action="index3.php?op=68&op2=subir" method="post" enctype="multipart/form-data" name="subir" id="subir">
	<input type="hidden" name="id" value="<?= $id ?>" />
	<div id="div_archivo"><label for="archivo">Archivo: </label><input name="archivo" id="archivo" type="file" tabindex="3" /></div>
    <button name="submit" type="submit"><img src="../imagenes/boton_enviar_form_contacto.png" width="26" height="26" align="absmiddle" /> Subir archivo</button>
</form>
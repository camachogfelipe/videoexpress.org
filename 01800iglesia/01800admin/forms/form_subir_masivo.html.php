<?php
$servidor = $_SERVER['HTTP_REFERER'];
$pos = strpos($servidor, "?");
if($pos !== false) :
	$servidor = mb_substr($servidor, 0, $pos);
endif;
$pos = mb_stripos($servidor, "01800admin");
if($pos !== false) :
	$servidor = mb_substr($servidor, 0, $pos-1);
endif;
?>
<script type="text/javascript" src="<?= $servidor ?>/Scripts/subir_iglesias.js"></script>
<div id="form">
	<h3 id="titulos">Subir iglesias de la misma denominación</h3>
  <a href="<?= $servidor ?>/01800admin/archivos_cargue/formatos/formato_iglesia_misma_denominacion.csv">Descargar formato</a><br><br>
  <form action="<?= $servidor ?>/01800admin/?op=66&op2=3" method="post" name="subir_iglesias" id="subir_iglesias" enctype="multipart/form-data">
    <label for="cabeceras">Primera fila del archivo con cabeceras: </label>
    <input name="cabeceras" type="checkbox" id="cabeceras" tabindex="2" value="S" />
    <br>
    <br>
    <div id="div_archivo">
      <label for="archivo">Archivo: </label>
      <input name="archivo" id="archivo" type="file" tabindex="3" />
    </div>
    <br>
    <button name="submit" type="submit"><img src="<?= $servidor ?>/imagenes/boton_enviar_form_contacto.png" width="26" height="26" align="absmiddle" /> Subir archivo</button>
  </form>
</div>
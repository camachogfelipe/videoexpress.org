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
  <form action="<?= $servidor ?>/01800admin/?op=66&op2=6" method="post" name="subir_iglesias2" id="subir_iglesias2" enctype="multipart/form-data">
  	<input type="hidden" name="cabeceras" value="<?= $archivo['cabeceras'] ?>" />
  	<table cellpadding="1" cellspacing="0" id="vli_table" class="vli_table2" width="100%">
    	<tbody>
    	<tr><td>Nombre del archivo: </td><td><?= $archivo['nombre']; ?><input type="hidden" name="file" value="<?= $archivo['nombre'] ?>"></td></tr>
			<tr><td>Tipo de archivo: </td><td><?= $archivo['tipo']; ?></td></tr>
			<tr><td>Extensión del archivo: </td><td><?= $archivo['extension']; ?></td></tr>
			<tr><td>Tamaño del archivo: </td><td><?= $archivo['size']." ".$archivo['sizeType']; ?></td></tr>
			<tr><td>Estado de subida del archivo: </td><td><?= $archivo['error']; ?></td></tr>
			<tr><td>Total Filas en el archivo: </td><td><?= $archivo['filas']; ?></td></tr>
			<tr><td>Columnas en el archivo: </td><td><?= $archivo['columnas']; ?></td></tr>
      </tbody>
    </table>
    <br><br>
    <table cellpadding="0" cellspacing="0" id="vli_table" class="vli_table2" width="100%">
    <?php if(isset($archivo['columnas_nombre']) and !empty($archivo['columnas_nombre'])) :?>
    	<thead>
      	<?php
					foreach($archivo['columnas_nombre'] as $columna) :
						echo "<th style='font-size: 70%'>".$columna."</th>";
					endforeach;
        ?>
      </thead>
    <?php endif; ?>
    	<tbody>
      <?php
      if(isset($archivo['datos']) and !empty($archivo['datos'])) :
				foreach($archivo['datos'] as $fila) :
					echo "<tr>\n";
					foreach($fila as $dato) :
						echo "<td style='font-size: 70%'>".$dato."</td>\t";
					endforeach;
					echo "</tr>\n";
				endforeach;
			endif;
			?>
      </tbody>
    </table>
    <br>
    <button name="submit" type="submit"><img src="<?= $servidor ?>/imagenes/boton_enviar_form_contacto.png" width="26" height="26" align="absmiddle" /> Cargar información en la base de datos</button>
  </form>
</div>
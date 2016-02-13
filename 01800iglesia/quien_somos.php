<?php
defined ( '_01800Index' ) or header("Location: index.php");
?>
<script type="text/javascript" language="javascript" src="Scripts/jquery.corner.js"></script>
<script>
jQuery(document).ready(function() {
  	jQuery('#coloriglesia').corner("right");
	jQuery('#texto_pasos').corner("right");
	jQuery('#publicidad').corner("top");
});
</script>
<script type="text/javascript" src="Scripts/publicidad.js"></script>
<link href="estilo.css" rel="stylesheet" type="text/css" />
		<div id="pasos">
            <div id="mitad_izq" style="min-height:480px">
            	<div id="coloriglesia">
                	<span id="titulo_contacto" class="titulo2-4"><?php echo $TEXTO['menu_que_es']; ?></span>
                    <div id="texto_pasos">
                    	<?php
							$nombre_fichero = "01800.txt";
							$file = fopen($nombre_fichero, "r");
							$contenido = fread($file, filesize($nombre_fichero));
							$contenido = str_replace("\\\"",'', $contenido);
							echo $contenido;
                        ?>
                    </div>
                </div>
                <div id="bandera"><img src="imagenes/esquinas/esquina_izq_iglesia.png" width="25" height="19" class="bandera2" /></div>
            </div>
            <div id="mitad_der">
            	<div id="publicidad">
					<?php
						$txs = 2;
						$minheight = $txs * 228;
						$publicidad->post['opub'] = "01800";
						require_once("publicidad.php");
					?>
                </div>
            </div>
        </div>
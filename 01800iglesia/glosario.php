<?php
defined ( '_01800Index' ) or header("Location: index.php");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
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
            <div id="mitad_izq">
            	<div style="padding:10px; min-height: 465px">
					<?php
                        echo '<img src="imagenes/iconos/icono glosario.png" width="34" height="27" align="absmiddle" />';
                        echo ' <span id="titulos">'.$TEXTO['glosario'].'</span>';
                        if(empty($abecedario) || empty($tglosario))
                            echo '<p><span id="titulos">El glosario est&aacute; vac&iacute;o</span><br /></p>';
                        else {
                            echo '<p class="glosario">';		 
                            foreach($abecedario as $value) {
								if($e == false) {
                                  $letra = $value['letra'];
                                  $e = true;
                                }
								if($letra != $value['letra'])
									echo '<a href="#'.$value['letra'].'" onclick="recargar(\'index2\', \'sec=glosario&e='.$value['letra'].'\')">';
                                echo $value['letra']." ";
								if($letra != mb_strtolower($value['letra'])) echo "</a> ";
                            }
                            $glosario = $glosario->cargar_glosario($letra);
                            echo '</p>';
							if($letra == "ñ") $letra = "nn";
                            echo '<img src="imagenes/abecedario/'.$letra.'.png" width="34" height="27" align="absmiddle" />';
                            echo '<table cellpadding="2" cellspacing="3" border="0" width="100%">';
                            foreach($glosario as $valor) {
                                echo '<tr valign="top">'."\n";
                                echo '<td width="100" id="titulos">'.ucfirst($valor['palabra']).':</td>'."\n";
                                echo '<td>'.html_entity_decode($valor['descripcion'], ENT_QUOTES, "UTF-8").'</td>'."\n";
                                echo '</tr>'."\n";
                            }
                            echo '</table>';
							echo '<span class="glosario">';
                            foreach($abecedario as $value) {
                                if($letra != $value['letra'])
									echo '<a href="#'.$value['letra'].'" onclick="recargar(\'index2\', \'sec=glosario&e='.$value['letra'].'\')">';
                                echo $value['letra']." ";
								if($letra != $value['letra']) echo "</a> ";
                            }
							echo '</span>';
                        }
                    ?>
				</div>
            </div>
            <div id="mitad_der">
            	<div id="publicidad">
					<?php
						$txs = 2;
						$minheight = $txs * 228;
						$publicidad->post['opub'] = "glosario";
						require_once("publicidad.php");
					?>
                </div>
            </div>
        </div>
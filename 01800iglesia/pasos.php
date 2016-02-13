<?php
if(!isset($_SESSION)) session_start();
$file = $_SERVER['SCRIPT_NAME'];
if (strrpos($file, "/")) {
	$file = explode("/", $file);
	$ap = count($file) - 1;
	$file = $file[$ap];
}
if(isset($_GET['r'])) { $r = $_GET['r']; $paso = "paso1"; }
if(isset($_GET['p'])) $p = $_GET['p'];
if(isset($_GET['d'])) { $d = $_GET['d']; $paso = "pasos"; }
else $d = NULL;
if(isset($_GET['c'])) $c = $_GET['c'];
else $c = NULL;
if(isset($_GET['pag'])) $pag = $_GET['pag'];
else $pag = 1;
if($file == "pasos.php" and empty($r) and empty($p)) header("Location: index.php");
if(empty($_SESSION['lang'])) exit("Acceso restringido");
include("lang/".$_SESSION['lang']."/lang.php");
defined ( '_01800Index' ) or define ( '_01800Index', 1);
require("clases/index.php");
$pa = NULL;
?>
<script type="text/javascript" src="Scripts/jquery-1.9.1.min.js?ver=1.9.1"></script>
<script type="text/javascript" src="Scripts/jquery.tools.min.js"></script>
<script type="text/javascript" language="javascript" src="Scripts/jquery.corner.js"></script>
<script>
jQuery(document).ready(function() {
  	jQuery('.pasos_region2').corner("right");
	jQuery('#paso').corner("tr", "cc:#FFF");
	jQuery('#paso').corner("br", "cc:#FFF");
	jQuery('#texto_pasos').corner("tr", "cc:#FFF");
	jQuery('#texto_pasos').corner("br", "cc:#FFF");
	jQuery('#publicidad').corner("top");
});
</script>
<script type="text/javascript" src="Scripts/publicidad.js"></script>
<link href="estilo.css" rel="stylesheet" type="text/css">
		<div id="pasos">
            <div id="mitad_izq">
                <div id="pasos_region2">
                	<?php
						if(!empty($p)) {
							$class1 = 4; $id = "4b"; $pa = 2; $res = $paises->carga_deptos(); $esquina = "verde"; $titulo = $TEXTO['paso2'];
							$txs = 2; $publicidad->post['opub'] = "deptos";
						}
						if(!empty($d)) {
							$class1 = 7; $id = "4b"; $pa = 3; $res = $paises->carga_ciudades(); $esquina = "roja"; $titulo = $TEXTO['paso3'];
							$txs = 2; $publicidad->post['opub'] = "ciudades";
						}
						if(!empty($c)) {
							$class1 = 4; 
							$id = "4b";
							$pa = 4;
							$res = $paises->carga_iglesias($pag);
							$esquina = "azul";
							$titulo = $TEXTO['paso4'];
							$txs = 3;
							$publicidad->post['opub'] = "iglesia";
						}
					?>
                    <div class="pasos_region2">
                        <table cellspacing="5" cellpadding="0" align="left">
                          <tr align="left">
                            <td width="5%"><img src="imagenes/numeros-gris01.png" width="24" height="24"></td>
                            <td width="14%"><p><img src="imagenes/okgris.png" width="25" height="25"></p></td>
                            <td width="5%"><img src="imagenes/numeros-gris02.png" width="24" height="24"></td>
                            <td width="14%"><p><img src="imagenes/okgris.png" width="25" height="25"></p></td>
                            <td width="5%"><img src="imagenes/numeros-<?php if($pa > 2) echo "gris"; ?>03.png" width="24" height="24"></td>
                            <td width="14%"><p><?php if($pa != 2 and $pa > 2) { ?><img src="imagenes/okgris.png" width="25" height="25"><?php }
							else echo $TEXTO['paso2'] ?></p></td>
                            <td width="5%"><img src="imagenes/numeros-<?php if($pa > 3) echo "gris"; ?>04.png" width="24" height="24"></td>
                            <td width="14%"><p><?php if($pa != 3 and $pa > 3) { ?><img src="imagenes/okgris.png" width="25" height="25"><?php }
							else echo $TEXTO['paso3'] ?></p></td>
                            <td width="5%"><img src="imagenes/numeros-<?php if($pa > 4) echo "gris"; ?>05.png" width="24" height="24"></td>
                            <td width="14%"><p><?php if($pa != 4 and $pa > 4) { ?><img src="imagenes/okgris.png" width="25" height="25"><?php }
							else echo $TEXTO['paso4'] ?></p></td>
                            <td width="5%">
                                <a id="back" href="#pais" onclick="recargar('<?php echo $paso ?>','<?php
                                echo "r=".$r;
								if(!empty($p) and !empty($d)) echo "&p=".$p;
								if(!empty($p) and !empty($d) and !empty($c)) echo "&p=".$p."&d=".$d;
                                ?>')">
                                    <img src="imagenes/back.png" width="24" title="volver" height="24">
                                </a>
                            </td>
                          </tr>
                      </table>
					</div>
                </div>
                <div id="bandera"><img src="imagenes/esquinas/esquina_izq_gris.png" width="25" height="19" class="bandera2"></div>
                <div id="paso" class="paso<?php echo $pa ?>">
                    <span id="titulos" class="titulo2-4">
                        <img src="imagenes/numeros-0<?php echo $pa + 1 ?>.png" width="24" height="24"> <?php echo $titulo; ?>
                    </span>
                    <div id="texto_pasos">
                    <?php
						//echo "Total Iglesias: ".count($res)." en ".count($res)." Departamentos/Estados<br><br>";
						if($pa == 2) { $paises->mostrar_deptos_ciudades(1, $r, $p, NULL, NULL, $TEXTO); }
						if($pa == 3) { $paises->mostrar_deptos_ciudades(2, $r, $p, $d, NULL, $TEXTO); }
						if($pa == 4) { $paises->mostrar_iglesias($r, $p, $d, $c, $pag, $TEXTO); }
					?>
                    </div>
				</div>
			    <div id="bandera"><img src="imagenes/esquinas/esquina_izq_<?php echo $esquina ?>.png" width="25" height="19" class="bandera2"></div>
            </div>
            <div id="mitad_der">
            	<div id="publicidad">
					<?php
						$minheight = $txs * 228;
						require_once("publicidad.php");
					?>
                </div>
            </div>
        </div>
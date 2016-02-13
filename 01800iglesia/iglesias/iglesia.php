<?php
error_reporting(E_ALL & ~E_NOTICE);
if(!isset($_SESSION)) session_start();
$file = $_SERVER['SCRIPT_NAME'];
if (strrpos($file, "/")) {
	$file = explode("/", $file);
	$ap = count($file) - 1;
	$file = $file[$ap];
}
if(isset($_GET['r'])) $r = $_GET['r'];
if(isset($_GET['p'])) $p = $_GET['p'];
if(isset($_GET['d'])) $d = $_GET['d'];
if(isset($_GET['c'])) $c = $_GET['c'];
if(isset($_GET['i'])) $i = $_GET['i'];
if($file == "../iglesia.php" and empty($r) and empty($p) and empty($i)) header("Location: index.php");
if(empty($_SESSION['lang'])) exit("Acceso restringido");
include("../lang/".$_SESSION['lang']."/lang.php");
if(isset($_GET['pag'])) $pag = $_GET['pag'];
else $pag = 1;
$b1 = false;
if(isset($_GET['b'])) $b1 = $_GET['b'];
if(isset($_GET['lb'])) $tb = $_GET['tb'];
if(isset($_GET['tb'])) $lb = $_GET['lb'];
defined ( '_01800Index' ) or define ( '_01800Index', 1);
require_once("../clases/index.php");
$church = new Iglesia();
$church->id = $i;
$iglesia = $church->carga_iglesia_completo();
//echo "<pre>";print_r($iglesia);echo "</pre>";
if(!defined("inc_igl")) {
?>
<script language="javascript" src="../Scripts/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="../Scripts/jquery.tools.min.js"></script>
<script type="text/javascript" src="../Scripts/flowplayer/flowplayer-3.2.8.min.js"></script>
<script type="text/javascript" src="../Scripts/flowplayer/flowplayer.playlist-3.2.8.min.js"></script>
<script type="text/javascript" language="javascript" src="../Scripts/jquery.corner.js"></script>
<script type="text/javascript" src="../Scripts/info_iglesia.js"></script>
<script type="text/javascript" src="../Scripts/mediaplayer-5.9-viral/jwplayer.js"></script>
<?php } ?>
		<div id="pasos">
            <div id="mitad_izq2">
                <div id="pasos_region2">
                    <div class="pasos_region3">
                        <table cellspacing="5" cellpadding="0" align="left" width="371">
                          <tr align="left">
                            <td><img src="../imagenes/numeros-gris01.png" width="24" height="24"></td>
                            <td><p><img src="../imagenes/okgris.png" width="25" height="25"></p></td>
                            <td><img src="../imagenes/numeros-gris02.png" width="24" height="24"></td>
                            <td><p><img src="../imagenes/okgris.png" width="25" height="25"></p></td>
                            <td><img src="../imagenes/numeros-gris03.png" width="24" height="24"></td>
                            <td><p><img src="../imagenes/okgris.png" width="25" height="25"></p></td>
                            <td><img src="../imagenes/numeros-gris04.png" width="24" height="24"></td>
                            <td><p><img src="../imagenes/okgris.png" width="25" height="25"></p></td>
                            <td><img src="../imagenes/numeros-gris05.png" width="24" height="24"></td>
                            <td><p><img src="../imagenes/okgris.png" width="25" height="25"></p></td>
                            <td width="5%">
                            <?php
                            if($b1 == false || $b1 == NULL || !isset($b1)) { ?>
                            	<a id="back" href="#ciudad" onclick="recargar('pasos','<?php
                                        echo "r=".$r."&p=".$p."&d=".$d."&c=".$c."&pag=".$pag;
                                    ?>')"> <img src="../imagenes/back.png" width="24" height="24" title="regresar">
                                </a>                                
                            <?php } else { ?>
                            	<a id="back" href="#ciudad" onclick="recargar('busqueda','<?php
                                        echo "b=true&pag=".$pag."&tb=".$tb."&lb=".$lb;
                                    ?>')"> <img src="../imagenes/back.png" width="24" height="24">
                                </a>
                            <?php } ?>
                            </td>
                          </tr>
                        </table>
                    </div>
				</div>
			    <div id="bandera"><img src="../imagenes/esquinas/esquina_izq_gris.png" width="25" height="18" class="bandera2"></div>
                <table cellspacing="0" cellpadding="0" id="color2" class="iglesia">
                  <tr>
                    <td>&nbsp;</td>
                    <td height="18" id="esq_sup_der" class="esq_pasos_sup_der">&nbsp;</td>
                  </tr>
                  <tr>
                    <td>
                        <table width="371" cellspacing="0" cellpadding="0" align="center" height="24">
                          <tr align="left">
                            <td width="3%">&nbsp;</td>
                            <td width="37%" valign="top" id="inf_basica">
                                <?php
                                	if(!empty($iglesia['iglesia'][0]['igl_web']))
										echo '<a href="'.$iglesia['iglesia'][0]['igl_web'].'" title="'.$iglesia['iglesia'][0]['igl_web'].'">';
									if(empty($iglesia['iglesia'][0]['igl_logo'])) $logo = "../logowho.png";
									else $logo = $iglesia['iglesia'][0]['igl_logo'];
								?>
                                <img src="archivos_iglesias/logos/<?php echo $logo ?>" width="100" height="100">
                                <?php if(!empty($iglesia['iglesia'][0]['igl_web'])) echo '</a>'; ?>
                            </td>
                            <td width="60%" valign="top" bordercolor="#990000" style="font-size:14px">
                                <span id="titulos"><?php echo ucwords($iglesia['iglesia'][0]['igl_nombre']); ?></span>
                                <br><strong style="font-size:12px"><?php
                                	echo ucwords($iglesia['iglesia'][0]['localidad_nombre']);
									echo ", ".ucwords($iglesia['iglesia'][0]['region_nombre']);
									echo ", ".ucwords($iglesia['iglesia'][0]['pais_nombre']);
								?></strong>
                                <p>
                                	<table cellpadding="2" cellspacing="0" border="0">
                                    	<tr>
											<td><?php echo $TEXTO['telefono']; ?></td>
                                            <td><?php echo ucwords($iglesia['iglesia'][0]['igl_telefono']); ?></td>
										</tr>
                                        <?php if(!empty($iglesia['iglesia'][0]['igl_celular'])) : ?>
                                        <tr>
											<td>&nbsp;</td>
                                            <td><?php echo ucwords($iglesia['iglesia'][0]['igl_celular']); ?></td>
										</tr>
                                        <?php endif; ?>
                                        <?php if(!empty($iglesia['iglesia'][0]['igl_pbx'])) : ?>
                                        <tr>
											<td>&nbsp;</td>
                                            <td><?php echo ucwords($iglesia['iglesia'][0]['igl_pbx']); ?></td>
										</tr>
                                        <?php endif; ?>
                                    </table>
                                    <br><?php echo $TEXTO['direccion'].': '; echo $iglesia['iglesia'][0]['igl_direccion']; ?>
                                    <br><?php echo $TEXTO['correo'].': '; echo $iglesia['iglesia'][0]['igl_email']; ?>
                                </p>
                            </td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td colspan="2" style="font-size:14px">
                                <p>
                                <?php
                                if (isset($_SESSION['user_01800']) and $_SESSION['user_tipo'] == "SA") {
									echo '<a href="../01800admin/?op=2&id='.$i.'&e=true&inc=true" target="_blank">';
                                    echo '<img src="../imagenes/iconos_admin/icono_admin-iglesia_edit.png" width="37" height="37"> ';
									echo $TEXTO['link_actualizar'].'<br>';
									echo '</a>';
                                }
								else {
                                ?>
                                <a href="index2.php?sec=sac&igl=<?php echo $iglesia['iglesia'][0]['igl_id'] ?>" class="lytebox" data-title="Sugerir actualización de <?php echo ucwords($iglesia['iglesia'][0]['igl_nombre']) ?>" data-lyte-options="width:900 heigh:350 doAnimations:false">
                                <img src="../imagenes/iconos/icono_sugerir.png" width="23" height="19"> <?php echo $TEXTO['link_sugerencia_actualizacion'] ?></a><br>
								<a href="index2.php?sec=msg&igl=<?php echo $iglesia['iglesia'][0]['igl_id'] ?>" class="lytebox" data-title="escribir a <?php echo ucwords($iglesia['iglesia'][0]['igl_nombre']) ?>" data-lyte-options="width:600 heigh:200 doAnimations:false">
                                <img src="../imagenes/iconos/icono_mensaje.png" width="23" height="19"> <?php echo $TEXTO['link_enviar_mensaje'] ?></a><br><?php } ?></p>
                                </td>
						  </tr>
                        </table>
                    </td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td height="10" id="esq_inf_der" class="esq_pasos_inf_der"></td>
                  </tr>
                </table>
				<div id="bandera"><img src="../imagenes/esquinas/esquina_izq_gris.png" width="25" height="18" class="bandera2"></div>
				<span id="titulos" class="titulo2-4"><?php echo $TEXTO['semaforo'] ?></span>
				<div id="semaforo"><?php $church->semaforo($iglesia); ?></div>
				<div id="bandera"><img src="../imagenes/esquinas/esquina_izq_gris_semaforo.png" width="25" height="20" class="bandera2"></div>
			</div>
            <div id="mitad_der2">
				<div id="tabs">
                	<div id="links">
                        <li class="boton" id="color2" href="#tab1"><?php echo $TEXTO['eventos'] ?></li>
                        <li class="boton" id="color6" href="#tab2"><?php echo $TEXTO['grupos'] ?></li>
                        <li class="boton" id="color3" href="#tab3"><?php echo $TEXTO['sedes'] ?></li>
                        <li class="boton" id="color4b" href="#tab4"><?php echo $TEXTO['audio'] ?></li>
                        <li class="boton" id="color5b" href="#tab5"><?php echo $TEXTO['video'] ?></li>
                        <li class="boton" id="color1" href="#tab6"><?php echo $TEXTO['informacion'] ?></li>
					</div>
                </div>
				<div id="tab1" class="mitad_der3">
                	<img id="icono_igl_tabs" src="../imagenes/iconos/icono eventos.png" width="50" height="50">
                    <div id="igl_tabs">
                    <?php
						if(!empty($iglesia['eventos'])) {
							$i = 0;
							foreach($iglesia['eventos'] as $valor) {
								if($i > 0) echo '<br><br>';
								$i++;
								echo '<span id="titulos">'.ucfirst($valor['evt_nombre'])."</span>\n";
								if(!empty($valor['evt_imagen']))
									echo '<img src="archivos_iglesias/eventos/'.$valor['evt_imagen'].'" width="460" height="150">';
								echo '<table valign="top" width="100%" cellspacing="3" cellpadding="2">'."\n";
								echo '	<tr>'."\n";
								echo '		<td width="8%" id="titulos" align="right" valign="top">Descripci&oacute;n: </td>'."\n";
								echo '		<td width="92%" align="justify">'.str_replace("\n", "<br>", $valor['evt_descripcion']).'</td>'."\n";
								echo '	</tr>'."\n";
								echo '	<tr>'."\n";
								echo '		<td id="titulos" align="right">Fecha: </td>'."\n";
								echo '		<td>'.$valor['evt_fecha_inicio'];
								if(!empty($valor['evt_fecha_fin']) and $valor['evt_fecha_fin'] != $valor['evt_fecha_inicio'])
								echo '</td>'."\n";
								echo '	</tr>'."\n";
								echo '	<tr>'."\n";
								echo '		<td id="titulos" align="right">Lugar: </td>'."\n";
								echo '		<td>'.$valor['evt_lugar'].'</td>'."\n";
								echo '	</tr>'."\n";
								echo '	<tr>'."\n";
								echo '		<td id="titulos" align="right">Invita: </td>'."\n";
								echo '		<td>'.$valor['evt_invita'].'</td>'."\n";
								echo '	</tr>'."\n";
								echo '	<tr>'."\n";
								echo '		<td id="titulos" align="right">Valor: </td>'."\n";
								echo '		<td>'.number_format($valor['evt_valor'], 0, ",", ".").'</td>'."\n";
								echo '	</tr>'."\n";
								echo '</table>'."\n";
							}
						}
					?>
                    </div>
                </div>
				<div id="tab2" class="mitad_der3">
					<div id="tabs3">
                    	<?php
							$x = 1;
							if(!empty($iglesia['grupos'])) {
								foreach($iglesia['grupos'] as $valor) {
									echo "<li>";
									echo '<a href="#tabs3_'.$x.'" title="'.$valor['grp_nombre'].'">';
									echo '<img src="../imagenes/iconos/grupos/'.$valor['grp_icono'].'" width="50" height="50">';
									echo "</a>";
									echo "</li>";
									$x++;
								}
								$x = 1;
								foreach($iglesia['grupos'] as $valor) {
									echo '<div id="tabs3_'.$x.'" class="tabs3">';
									echo '<div id="tabs3-'.$x.'"><img src="../imagenes/select.png" width="25" height="30"></div>';
									echo '<p id="titulos">'.ucfirst($TEXTO['descripcion']).'</p> '.nl2br($valor['grp_descripcion']);
									echo '<p id="titulos">'.ucfirst($TEXTO['horarios']).'</p> '.nl2br($valor['grp_horarios']);
									echo '</div>';
									$x++;
									if($x == 10) break;
								}
							}
						?>
                    </div>
				</div>
				<div id="tab3" class="mitad_der3">
                	<img id="icono_igl_tabs" src="../imagenes/iconos/icono sedes.png" width="50" height="50">
                    <div id="igl_tabs">
						<?php
                            if(!empty($iglesia['sedes'])) {
                                //echo "<pre>";print_r($iglesia['sedes']);echo "</pre>";
                                $i = 0;
                                foreach($iglesia['sedes'] as $valor) {
                                    if($i > 0) echo "<br><br>";
                                    $i++;
                                    echo '<a href="#sede" onclick="javascript:recargar(\'iglesia\',\'r='.$valor['con_id'].'&p='.$valor['pais_id'].
									'&d='.$valor['reg_id'].'&c='.$valor['loc_id'].'&i='.$valor['igl_id'].'\')">'.
									ucfirst($valor['igl_nombre']).'</a>'."\n";
                                    echo '<br><span id="titulos" style="font-size: 13px">'.$TEXTO['pastor_principal'].'</span> '.$valor['igl_pastor_ppal']."\n";
                                    echo '<br><span style="font-size: 13px">';
                                    echo $valor['loc_nombre'].' - '.$valor['pais_nombre'].'. ';
                                    echo $valor['igl_direccion'].'. '.$TEXTO['telefono'];
                                    if(!empty($valor['igl_telefono'])) echo ' '.$valor['igl_telefono'];
                                    if(!empty($valor['igl_pbx'])) echo ' '.$valor['igl_pbx'];
                                    if(!empty($valor['igl_celular'])) echo ' '.$valor['igl_celular'];
                                    echo '</span>'."\n";
                                }
                            }
                        ?>
					</div>
				</div>
                <div id="tab4" class="mitad_der3">
                	<img id="icono_igl_tabs" src="../imagenes/iconos/grupos/icono_sonido.png" width="50" height="50">
                    <div id="igl_tabs">
	                  <div id="container"></div>
						<script type="text/javascript">
        	                jwplayer("container").setup({
								flashplayer: "Scripts/mediaplayer-5.9-viral/player2.swf",
								autostart: true,
								width: 460,
								height: 22,
								'icons': 'false',
								'stretching': 'fill',
								'controlbar': 'bottom',
								'id': 'playerID'
							});
						</script>
						<?php
                            if(!empty($iglesia['audio'])) {
								$ta = ceil(count($iglesia['audio']) / 2);
								$i = 0;
                                //echo "<pre>";print_r($iglesia['audio']);echo "</pre>";
								echo '<table cellpadding="3" cellspacing="0" width="450" id="audio">'."\n";
								echo '<tr>'."\n";
                                foreach($iglesia['audio'] as $valor) {
                                    echo '<td href="'.$valor['aud_vid_archivo'].'">';
                                    echo $valor['aud_vid_nombre'];
                                    echo '</td>'."\n";
									$i++;
									if($i == 2) { echo '</tr>'."\n".'<tr>'."\n"; $i = 0; }
                                }
                                echo '</tr>'."\n";
								echo '</table>'."\n";
                            }
                        ?>
                        <div id="mostrar_audio"></div>
					</div>
                </div>
				<div id="tab5" class="mitad_der3">
                	<img id="icono_igl_tabs" src="../imagenes/iconos/icono video nuevo.png" width="50" height="50">
                    <div id="igl_tabs">
	                    <div id="mostrar_videos">
    		                <a class="player" id="player" style="float:left">
								<img src="http://static.flowplayer.org/img/player/btn/play_text_large.png">
							</a>
							<iframe id="iframe_video" src="" width="320" height="180" frameborder="0" webkitAllowFullScreen allowFullScreen></iframe>
						</div>
						<!-- this will install flowplayer inside previous A- tag. -->
                        <?php
                            if(!empty($iglesia['video'])) {
                                //echo "<pre>";print_r($iglesia['video']);echo "</pre>";
                                echo '<ul id="videos">';
                                echo '<div id="videos_link">';
								$x = 0;
                                foreach($iglesia['video'] as $valor) {
                                    if($valor['vid_tipo'] == "link") {
                                        echo "<li";
                                        echo ' href="'.$valor['aud_vid_archivo'].'">';
                                        echo $valor['aud_vid_nombre'];
                                        echo "</li>";
										$x++;
                                    }
                                }
                                echo "</div>";
                                $first = true;
                                foreach($iglesia['video'] as $valor) {
									if($valor['vid_tipo'] == "archivo" and $first == true) echo '<div id="videos_archivo">';
                                    if($valor['vid_tipo'] == "archivo") {
                                        echo "<li";
                                        echo ' href="'.$valor['aud_vid_archivo'].'"';
                                        if($first == true) echo ' class="first"';
                                        echo ' >';
                                        echo $valor['aud_vid_nombre'];
                                        echo "</li>";
                                        $first = false;
										$x++;
                                    }
                                }
								if($first == true) echo '<div>';
                                echo "</div>";
                            }
                        ?>
                        </ul>
				  </div>
              </div>
				<div id="tab6" class="mitad_der3">
					<div id="tabs2">
                        <li><a href="#fragment-1" title="<?php echo $TEXTO['mision'] ?>"><img src="../imagenes/iconos/informacion/icono_mision.png" width="50" height="50"></a></li>
                        <li><a href="#fragment-2" title="<?php echo $TEXTO['vision'] ?>"><img src="../imagenes/iconos/informacion/icono_vision.png" width="50" height="50"></a></li>
                        <li><a href="#fragment-3" title="<?php echo $TEXTO['credo'] ?>"><img src="../imagenes/iconos/informacion/icono_credo.png" width="50" height="50"></a></li>
                        <li><a href="#fragment-4" title="<?php echo $TEXTO['historia'] ?>"><img src="../imagenes/iconos/informacion/icono_historia.png" width="50" height="50"></a></li>
                        <li><a href="#fragment-5" title="<?php echo $TEXTO['informacion'] ?>"><img src="../imagenes/iconos/informacion/icono_info.png" width="50" height="50"></a></li>
                        <div id="fragment-1" class="tabs2">
                            <div id="tabs2-1"><img src="../imagenes/select.png" width="25" height="30"></div>
                            <?php if($iglesia['iglesia'][0]['igl_mision']) echo nl2br($iglesia['iglesia'][0]['igl_mision']); ?>
                        </div>
                        <div id="fragment-2" class="tabs2">
                            <div id="tabs2-2"><img src="../imagenes/select.png" width="25" height="30"></div>
                            <?php if($iglesia['iglesia'][0]['igl_vision']) echo nl2br($iglesia['iglesia'][0]['igl_vision']) ?>
                        </div>
                        <div id="fragment-3" class="tabs2">
                            <div id="tabs2-3"><img src="../imagenes/select.png" width="25" height="30"></div>
                            <?php if($iglesia['iglesia'][0]['igl_credo']) echo nl2br($iglesia['iglesia'][0]['igl_credo']) ?>
                        </div>
                        <div id="fragment-4" class="tabs2">
                            <div id="tabs2-4"><img src="../imagenes/select.png" width="25" height="30"></div>
                            <?php if($iglesia['iglesia'][0]['igl_historia']) echo nl2br($iglesia['iglesia'][0]['igl_historia']) ?>
                        </div>
                        <div id="fragment-5" class="tabs2">
                            <div id="tabs2-5"><img src="../imagenes/select.png" width="25" height="30"></div>
                            <?php
								if($iglesia['iglesia'][0]['igl_fecha_fundacion'])
									echo '<span id="titulos">'.ucfirst($TEXTO['fecha_fundacion']).'</span> '.$iglesia['iglesia'][0]['igl_fecha_fundacion'];
							?>
                        </div>
                    </div>
				</div>
		  </div>
		</div>
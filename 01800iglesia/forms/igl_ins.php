<?php
$folders = explode("/", $_SERVER['PHP_SELF']);
if(in_array("forms", $folders)) header("Location: ../");
else {
	if(empty($_SESSION['lang'])) exit("Acceso restringido");
	include("lang/".$_SESSION['lang']."/lang.php");
	$lang = $_SESSION['lang'];
	include("lang/$lang/lang.php");
	defined ( '_01800Index' ) or define ( '_01800Index', 1);
	require("clases/index.php");
?>
<link href="estilo.css" rel="stylesheet" type="text/css" />
<div id="pasos">
            <div id="mitad_izq">
            	<div id="colorgris">
                	<span id="titulo_contacto" class="titulo2-4"><img src="imagenes/iconos/icono inscripcion.png" width="34" height="27" align="absmiddle" /> <?php echo $TEXTO['form_iglesia_inscripcion_titulo']; ?></span>
                    <div id="texto_pasos">
						<form action="index2.php?sec=inscribe" method="post" name="sac" id="sac">
                            <input type="hidden" name="e" value="true" />
                            <table width="100%" border="0" cellspacing="2" cellpadding="3">
                              <tr>
                                <td align="right" width="28%">
                                    <label for="nombre_iglesia"><strong><?php echo $TEXTO['form_iglesia_nombre'] ?></strong></label>
                                </td>
                                <td><input name="nombre_iglesia" id="nombre_iglesia" type="text" size="50" />
                                	<span id="nombre_iglesia_error"></span></td>
                              </tr>
                              <tr>
                                <td align="right">
                                    <label for="pastor"><strong><?php echo $TEXTO['form_iglesia_pastor'] ?></strong></label>
                                </td>
                                <td><input name="pastor" type="text" size="50" id="pastor" /><span id="pastor_error"></span></td>
                              </tr>
                              <tr>
                                <td align="right">
                                    <label for="telefono"><strong><?php echo $TEXTO['form_iglesia_telefono'] ?></strong></label>
                                </td>
                                <td><input name="telefono" type="text" size="30" id="telefono" /><span id="telefono_error"></span></td>
                              </tr>
                              <tr>
                                <td align="right">
                                    <label for="celular"><strong><?php echo $TEXTO['form_iglesia_celular'] ?></strong></label>
                                </td>
                                <td><input name="celular" type="text" size="30" id="celular" /><span id="celular_error"></span></td>
                              </tr>
                              <tr>
                                <td align="right">
                                    <label for="pbx"><strong><?php echo $TEXTO['form_iglesia_pbx'] ?></strong></label>
                                </td>
                                <td><input name="pbx" type="text" size="30" id="pbx" /><span id="pbx_error"></span></td>
                              </tr>
                              <tr>
                                <td align="right">
                                    <label for="region"><strong><?php echo $TEXTO['form_iglesia_continente'] ?></strong></label>
                                </td>
                                <td><select name="region" id="region" class="region" size="8">
                                        <?php
                                            $this->geo->carga_geolocalizacion("continentes");
                                            $this->geo->mostrar_select_geolocalizacion();
                                        ?>
                                    </select><span id="region_error"></span>
                                </td>
                              </tr>
                              <tr>
                                <td align="right">
                                    <label for="pais"><strong><?php echo $TEXTO['form_iglesia_pais'] ?></strong></label>
                                </td>
                                <td><select name="pais" id="pais" class="pais"></select><span id="pais_error"></span></td>
                              </tr>
                              <tr>
                                <td align="right">
                                    <label for="depto"><strong><?php echo $TEXTO['form_iglesia_depto'] ?></strong></label>
                                </td>
                                <td><select name="depto" id="depto" class="depto"></select><span id="depto_error"></span></td>
                              </tr>
                              <tr>
                                <td align="right">
                                    <label for="ciudad"><strong><?php echo $TEXTO['form_iglesia_ciudad'] ?></strong></label>
                                </td>
                                <td><select name="ciudad" id="ciudad" class="ciudad"></select><span id="ciudad_error"></span></td>
                              </tr>
                              <tr>
                                <td align="right">
                                    <label for="email"><strong><?php echo $TEXTO['form_iglesia_mail_contacto'] ?></strong></label>
                                </td>
                                <td><input name="email" id="email" size="50" ><span id="email_error"></span></td>
                              </tr>
                              <tr>
                                <td id="titulos" align="right" valign="top"><?php echo $TEXTO['form_iglesia_doctrina_']; ?></td>
                                <td align="justify">
                                    <?php
                                        echo $TEXTO['form_iglesia_doctrina'];
                                        echo "<p>".$TEXTO['form_iglesia_doctrina_p1']."</p>";
                                        echo $TEXTO['form_si'].'<input type="radio" name="p1" id="p1" value="1" />'."\n";
                                        echo $TEXTO['form_no'].'<input type="radio" name="p1" id="p1" value="0" />'."\n";
										echo '<span id="p1_error"></span>'."\n";
                                        echo "<p>".$TEXTO['form_iglesia_doctrina_p2']."</p>";
                                        echo $TEXTO['form_si'].'<input type="radio" name="p2" id="p2" value="1" />'."\n";
                                        echo $TEXTO['form_no'].'<input type="radio" name="p2" id="p2" value="0" />'."\n";
										echo '<span id="p2_error"></span>'."\n";
                                        echo "<p>".$TEXTO['form_iglesia_doctrina_p3']."</p>";
                                        echo $TEXTO['form_si'].'<input type="radio" name="p3" id="p3" value="1" />'."\n";
                                        echo $TEXTO['form_no'].'<input type="radio" name="p3" id="p3" value="0" />'."\n";
										echo '<span id="p3_error"></span>'."\n";
                                        echo "<p>".$TEXTO['form_iglesia_doctrina_p4']."</p>";
                                        echo $TEXTO['form_si'].'<input type="radio" name="p4" id="p4" value="1" />'."\n";
                                        echo $TEXTO['form_no'].'<input type="radio" name="p4" id="p4" value="0" />'."\n";
										echo '<span id="p4_error"></span>'."\n";
                                        echo "<p>".$TEXTO['form_iglesia_doctrina_p5']."</p>";
                                        echo '<textarea name="p5" id="p5" cols="50" rows="5"></textarea>';
										echo '<span id="p5_error"></span>'."\n";
                                    ?>
                                </td>
                              </tr>
                              <tr>
                                <td align="right">
                                    <label for="nombre_inscribe"><strong><?php echo $TEXTO['form_inscribe_nombre'] ?></strong></label>
                                </td>
                                <td><input name="nombre_inscribe" id="nombre_inscribe" type="text" size="50">
                                	<span id="nombre_inscribe_error"></span></td>
                              </tr>
                              <tr>
                                <td align="right">
                                    <label for="mail_inscribe"><strong><?php echo $TEXTO['form_inscribe_email'] ?></strong></label>
                                </td>
                                <td><input name="mail_inscribe" id="mail_inscribe" type="text" size="50"><span id="mail_inscribe_error"></span></td>
                              </tr>
                              <tr>
                                <td align="right">
                                    <label for="tel_inscribe"><strong><?php echo $TEXTO['form_inscribe_telefono'] ?></strong></label>
                                </td>
                                <td><input name="tel_inscribe" id="tel_inscribe" type="text" size="50"><span id="tel_inscribe_error"></span></td>
                              </tr>
                              <tr>
                                <td align="right">
                                    <label for="skype"><strong><?php echo $TEXTO['form_inscribe_skype'] ?></strong></label>
                                </td>
                                <td><input name="skype" id="skype" type="text" size="50"><span id="skype_error"></span></td>
                              </tr>
                              <tr>
                                <td align="right">
                                    <label for="msn"><strong><?php echo $TEXTO['form_inscribe_msn'] ?></strong></label>
                                </td>
                                <td><input name="msn" id="msn" type="text" size="50"><span id="msn_error"></span></td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                                <td align="justify"><?php echo $TEXTO['form_texto_acepto'] ?></td>
                              <tr>
                              <tr>
                                <td>&nbsp;</td>
                                <td><input type="checkbox" value="1" id="acepto" name="acepto" onClick="check()" /> 
                                	<label for="acepto"><strong><?php echo $TEXTO['form_acepto'] ?></strong></label>
                                    <span id="msn_error"></span>
                                </td>
                              <tr>
                                <td colspan="3" align="center">
                                  <button id="submit" name="submit" type="submit" disabled="disabled">
                                    <strong>Enviar</strong> 
                                    <img src="imagenes/boton_enviar_form_contacto.png" width="27" height="27" align="absmiddle" />
                                  </button>
                                  <button id="reset" name="reset" type="reset">
                                    <img src="imagenes/boton_borrar_form_contacto.png" width="27" height="27" align="absmiddle" /> 
                                    <strong>Limpiar</strong>
                                  </button>
                                </td>
                              </tr>
                            </table>
                        </form>
                        <div id="cargando"><img src="imagenes/loadingAnimation.gif" width="64" height="64"></div>
                        <div id="resultado"></div>
                    </div>
                </div>
                <div id="bandera"><img src="imagenes/esquinas/esquina_izq_gris.png" width="25" height="19" class="bandera2" /></div>
            </div>
            <div id="mitad_der">
            	<div id="publicidad" style="min-height: 1700px">
					<?php
						$txs = 7;
						$minheight = $txs * 228;
						$publicidad->post['opub'] = "inscripcion";
						require_once("publicidad.php");
					?>
                </div>
            </div>
        </div>
<?php } ?>
<script type="text/javascript" src="Scripts/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="Scripts/jquery.tools.min.js"></script>
<script type="text/javascript" language="javascript" src="Scripts/jquery.corner.js"></script>
<script type="text/javascript" src="Scripts/jquery.form.js"></script>
<script type="text/javascript" src="Scripts/jquery.validate.js"></script>
<script type="text/javascript" src="Scripts/jquery.validate.additional-methods.js"></script>
<script type="text/javascript" src="Scripts/publicidad.js"></script>
<script type="text/javascript" src="Scripts/inscribe.js"></script>
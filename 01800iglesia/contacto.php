<?php
defined ( '_01800Index' ) or header("Location: index.php");
?>
<script type="text/javascript" src="Scripts/jquery.tools.min.js"></script>
<script type="text/javascript" language="javascript" src="Scripts/jquery.corner.js"></script>
<script type="text/javascript" src="Scripts/jquery.validate.js"></script>
<script type="text/javascript" src="Scripts/jquery.validate.additional-methods.js"></script>
<script type="text/javascript" src="Scripts/contacto.js"></script>
<script type="text/javascript" src="Scripts/publicidad.js"></script>
<link href="estilo.css" rel="stylesheet" type="text/css" />
		<div id="pasos">
            <div id="mitad_izq">
            	<div id="colorgris">
                	<span id="titulo_contacto" class="titulo2-4"><img src="imagenes/iconos/icono_sugerir.png" width="40" height="32" align="absmiddle" /> <?php echo $TEXTO['form_contacto_titulo']; ?></span>
                    <div id="texto_pasos">
						<form action="contacto2.php" method="post" name="contacto" id="contacto">
                            <table width="100%" border="0" cellspacing="2" cellpadding="3">
                              <tr>
                                <td align="right">
                                    <label for="nombre_completo"><strong><?php echo $TEXTO['form_contacto_nombre'] ?></strong></label>
                                </td>
                                <td><input name="nombre_completo" type="text" size="50"></td>
                              </tr>
                              <tr>
                                <td align="right">
                                    <label for="motivo"><strong><?php echo $TEXTO['form_contacto_motivo'] ?></strong></label>
                                </td>
                                <td><input name="motivo" type="text" size="50"></td>
                              </tr>
                              <tr>
                                <td align="right">
                                    <label for="mail"><strong><?php echo $TEXTO['form_contacto_mail'] ?></strong></label>
                                </td>
                                <td><input name="mail" type="text" size="50"></td>
                              </tr>
                              <tr>
                                <td align="right">
                                    <label for="asunto"><strong><?php echo $TEXTO['form_contacto_texto'] ?></strong></label>
                                </td>
                                <td><textarea name="asunto" cols="40" rows="6"></textarea></td>
                              </tr>
                              <tr>
                                <td colspan="2" align="center">
                                  <button id="submit" name="submit" type="submit">
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
            	<div id="publicidad">
					<?php
						$txs = 2;
						$minheight = $txs * 228;
						$publicidad->post['opub'] = "contacto";
						require_once("publicidad.php");
					?>
                </div>
            </div>
        </div>
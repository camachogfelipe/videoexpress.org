<script type="text/javascript" src="scripts/jquery.validate.js"></script>
<script type="text/javascript" src="scripts/jquery.validate.additional-methods.js"></script>
<script type="text/javascript">
$.validator.setDefaults({
	submitHandler: function()
	{
		$().ajaxStart(function()
		{
			$('#loading').show();
			$('#result').hide();
		});
		$('#form, #confirmacion_datos').submit(function()
		{
			$('#loading').hide();
			$.ajax(
			{
				type: 'POST',
				url: $(this).attr('action'),
				data: $(this).serialize(),
				success: function(data)
				{
					var result = $('#result').html(data);
					$(result).fadeIn('slow');
				}
			})
			return false;
		}); 
	}
});

$().ready(function()
{
	var v = $("#confirmacion_datos").validate(
	{
		success: function(label) { label.addClass("valid").text("ok!") },
		rules: {
			cedula: {
				required: true,
				digits: true,
				minlength: 8,
			},
			nombres: {
				required: true,
				minlength: 5,
				letterswithbasicpunc: true
			},
			apellidos: {
				required: true,
				minlength: 5,
				letterswithbasicpunc: true
			},
			dir: {
				required: true,
				minlength: 8,
			},
			tel: {
				required: true,
				minlength: 7,
				digits: true
			},
			cel: {
				required: true,
				digits: true,
				minlength: 10,
			},
			email: {
				required: true,
				email: true,
			},
			ciudad: {
				required: true,
				minlength: 3,
				letterswithbasicpunc: true
			},
		},
		messages: {
			cedula: {
				required: " <span id='msj_error_texto'>Ingrese un n&uacute;mero de c&eacute;dula valido</span>",
				minlength: jQuery.format(" <span id='msj_error_texto'>M&iacute;nimo {0} caracteres necesarios!</span>"),
				digits: " <span id='msj_error_texto'>Ingrese solo numeros por favor</span>"
			},
			nombres: {
				required: " <span id='msj_error_texto'>Ingrese su nombre por favor</span>",
				minlength: jQuery.format(" <span id='msj_error_texto'>M&iacute;nimo {0} caracteres necesarios!</span>"),
				letterswithbasicpunc: " <span id='msj_error_texto'>Ingrese solo letras por favor</span>"
			},
			apellidos: {
				required: " <span id='msj_error_texto'>Ingrese sus apellidos por favor</span>",
				minlength: jQuery.format(" <span id='msj_error_texto'>M&iacute;nimo {0} caracteres necesarios!</span>"),
				letterswithbasicpunc: " <span id='msj_error_texto'>Ingrese solo letras por favor</span>"
			},
			dir: {
				required: " <span id='msj_error_texto'>Ingrese la direcci&oacute;n donde se le va a enviar los productos</span>",
				minlength: jQuery.format(" <span id='msj_error_texto'>M&iacute;nimo {0} caracteres necesarios!</span>")
			},
			tel: {
				required: " <span id='msj_error_texto'>Ingrese el numero de tel&eacute;fono de contacto</span>",
				minlength: jQuery.format(" <span id='msj_error_texto'>M&iacute;nimo {0} numeros necesarios!</span>"),
				digits: " <span id='msj_error_texto'>Ingrese solo numeros por favor</span>"
			},
			cel: {
				required: " <span id='msj_error_texto'>Ingrese el numero de celular de contacto</span>",
				minlength: jQuery.format(" <span id='msj_error_texto'>M&iacute;nimo {0} numeros necesarios!</span>"),
				digits: " <span id='msj_error_texto'>Ingrese solo numeros por favor</span>"
			},
			email: {
				required: " <span id='ms_error_texto'>Ingrese su correo electr&oacute;nico por favor</span>",
				email: " <span id='msj_error_texto'>Ingrese direcci&oacute;n de correo valida por favor</span>"
			},
			ciudad: {
				required: " <span id='msj_error_texto'>Ingrese la ciudad por favor</span>",
				minlength: jQuery.format(" <span id='msj_error_texto'>M&iacute;nimo {0} numeros necesarios!</span>"),
				letterswithbasicpunc: " <span id='msj_error_texto'>Ingrese solo letras por favor</span>"
			},
			pais: {
				required: " <span id='msj_error_texto'>Seleccione el pais</span>",
				minlength: jQuery.format(" <span id='msj_error_texto'>M&iacute;nimo {0} numeros necesarios!</span>"),
				letterswithbasicpunc: " <span id='msj_error_texto'>Ingrese solo letras por favor</span>"
			}
		}
	});
	jQuery("#reset").click(function() {
			v.resetForm();
	});
});
</script>
<div id="confirmar_carrito">
<div id="loading">
	<form action="carrito/confirmar_datos_carrito2.php?continuar=true" method="post" enctype="multipart/form-data" name="confirmacion_datos" id="confirmacion_datos">
<table width="620" border="0" align="center" cellpadding="0" cellspacing="2px" bgcolor="#C1272D">
  <tr>
    <td width="20" align="center" valign="middle" id="obligatorio">*</td>
    <td width="67" id="carrito">C&eacute;dula</td>
    <td width="525"><input name="cedula" type="text" id="cedula" tabindex="1" size="30" maxlength="20" class="required" /></td>
  </tr>
  <tr>
    <td align="center" valign="middle" id="obligatorio">*</td>
    <td id="carrito">Nombre(s)</td>
    <td><input name="nombres" type="text" id="nombres" tabindex="2" size="45" maxlength="100" class="required" /></td>
  </tr>
  <tr>
    <td align="center" valign="middle" id="obligatorio">*</td>
    <td id="carrito">Apellidos</td>
    <td><input name="apellidos" type="text" id="apellidos" tabindex="3" size="45" maxlength="100" class="required" /></td>
  </tr>
  <tr>
    <td align="center" valign="middle" id="obligatorio">*</td>
    <td id="carrito">Direcci&oacute;n</td>
    <td><input name="dir" type="text" id="dir" tabindex="4" size="45" maxlength="150" class="required" /></td>
  </tr>
  <tr>
    <td align="center" valign="middle" id="obligatorio">*</td>
    <td id="carrito">Tel&eacute;fono</td>
    <td><input name="tel" type="text" id="tel" tabindex="5" size="12" maxlength="10" class="required" /></td>
  </tr>
  <tr>
    <td align="center" valign="middle" id="obligatorio">*</td>
    <td id="carrito">Celular</td>
    <td><input name="cel" type="text" id="cel" tabindex="6" size="12" maxlength="10" class="required" /></td>
  </tr>
  <tr>
    <td align="center" valign="middle" id="obligatorio">*</td>
    <td id="carrito">Correo electr&oacute;nico</td>
    <td><input name="email" type="text" id="email" tabindex="7" size="45" maxlength="150" /></td>
  </tr>
  <tr>
    <td align="center" valign="middle" id="obligatorio">*</td>
    <td id="carrito">Ciudad</td>
    <td><input name="ciudad" type="text" id="ciudad" tabindex="8" size="45" maxlength="150" class="required" /></td>
  </tr>
  <tr>
    <td align="center" valign="middle" id="obligatorio">*</td>
    <td id="carrito">Pa&iacute;s</td>
    <td><select name="pais" id="pais" tabindex="9" class="required">
             <option value="Colombia" selected="selected">Colombia</option>
             <?php /*<option value="usa">Estados Unidos</option>
             <option value="mexico">Mexico</option>
             <option value="canada">Canada</option>
             <option value="australia">Australia</option>
             <option value="afghanistan">Afghanistan</option>
             <option value="alemania">Alemania</option>
             <option value="albania">Albania</option>
             <option value="algeria">Algeria</option>
             <option value="american_samoa">American Samoa</option>
             <option value="andorra">Andorra</option>
             <option value="angola">Angola</option>
             <option value="anguila">Anguilla</option>
             <option value="antigua_barbuda">Antigua and Barbuda</option>
             <option value="arabia_saudita">Arabia Saudita</option>
             <option value="argentina">Argentina</option>
             <option value="armenia">Armenia</option>
             <option value="aruba">Aruba</option>
             <option value="australia">Australia</option>
             <option value="austria">Austria</option>
             <option value="azerbaijan">Azerbaijan Republic</option>
             <option value="bahamas">Bahamas</option>
             <option value="bahrain">Bahrain</option>
             <option value="bangladesh">Bangladesh</option>
             <option value="barbados">Barbados</option>
             <option value="belarus">Belarus</option>
             <option value="belgium">Belgium</option>
             <option value="belize">Belize</option>
             <option value="benin">Benin</option>
             <option value="bermuda">Bermuda</option>
             <option value="bhutan">Bhutan</option>
             <option value="bolivia">Bolivia</option>
             <option value="bosnia">Bosnia y Herzegovina</option>
             <option value="botswana">Botswana</option>
             <option value="brasil">Brasil</option>
             <option value="brunei">Brunei Darussalam</option>
             <option value="bulgaria">Bulgaria</option>
             <option value="burkina">Burkina Faso</option>
             <option value="burundi">Burundi</option>
             <option value="cambodia">Cambodia</option>
             <option value="camerun">Camerun</option>
             <option value="canada">Canada</option>
             <option value="cabo_verde">Cabo Verde</option>
             <option value="islas_caiman">Islas Caiman</option>
             <option value="republica_central_africana">Rep&#250;blica central de Africa</option>
             <option value="chad">Chad</option>
             <option value="chile">Chile</option>
             <option value="china">China</option>
             <option value="christmas_island">Christmas Island</option>
             <option value="cocos">Cocos (Keeling) Islands</option>
             <option value="comoros">Comoros</option>
             <option value="congo">Congo, Rep. Democratica</option>
             <option value="cook">Cook Islands</option>
             <option value="corea">Corea</option>
             <option value="corea2">Corea, Rep.Democratica</option>
             <option value="costarica">Costa Rica</option>
             <option value="cote">Cote d Ivoire (Ivory Coast)</option>
             <option value="croacia">Croacia</option>
             <option value="cuba">Cuba</option>
             <option value="chipre">Chipre</option>
             <option value="rep_checa">Czech Republic</option>
             <option value="dinamarca">Dinamarca</option>
             <option value="djibouti">Djibouti</option>
             <option value="dominica">Dominica</option>
             <option value="timor">East Timor</option>
             <option value="ecuador">Ecuador</option>
             <option value="egipto">Egipto</option>
             <option value="salvador">El Salvador</option>
             <option value="emiratos">Emiratos Arabes Unidos</option>
             <option value="eritrea">Eritrea</option>
             <option value="eslovaquia">Eslovaquia</option>
             <option value="eslovenia">Eslovenia</option>
             <option value="espa&#241;a">Espa&#241;a</option>
             <option value="estonia">Estonia</option>
             <option value="etiopia">Etiopia</option>
             <option value="islas_falkland">Falkland Islands (Islas Malvinas)</option>
             <option value="fji">Fiji</option>
             <option value="filipinas">Filipinas</option>
             <option value="finlandia">Finlandia</option>
             <option value="francia">Francia</option>
             <option value="gabon">Gabon Republic</option>
             <option value="gambia">Gambia</option>
             <option value="georgia">Georgia</option>
             <option value="ghana">Ghana</option>
             <option value="gibraltar">Gibraltar</option>
             <option value="grecia">Grecia</option>
             <option value="greenland">Greenland</option>
             <option value="granada">Granada</option>
             <option value="guam">Guam</option>
             <option value="guatemala">Guatemala</option>
             <option value="guinea">Guinea</option>
             <option value="guinea2">Guinea Ecuatorial</option>
             <option value="guinea3">Guinea-Bissau</option>
             <option value="guyana">Guyana</option>
             <option value="guyana2">Guyana Francesa</option>
             <option value="haiti">Haiti</option>
             <option value="heard">Heard &amp; McDonald Islands</option>
             <option value="holanda">Holanda</option>
             <option value="honduras">Honduras</option>
             <option value="hongkong">Hong Kong</option>
             <option value="hungria">Hungria</option>
             <option value="india">India</option>
             <option value="indonesia">Indonesia</option>
             <option value="inglaterra">Inglaterra</option>
             <option value="iran">Iran</option>
             <option value="iraq">Iraq</option>
             <option value="irlanda">Irlanda</option>
             <option value="islandia">Islandia</option>
             <option value="israel">Israel</option>
             <option value="italia">Italia</option>
             <option value="jamaica">Jamaica</option>
             <option value="japon">Japon</option>
             <option value="jordania">Jordania</option>
             <option value="kazakhstan">Kazakhstan</option>
             <option value="kenya">Kenya</option>
             <option value="kiribati">Kiribati</option>
             <option value="kuwait">Kuwait</option>
             <option value="kyrgyzstan">Kyrgyzstan</option>
             <option value="laos">Laos</option>
             <option value="latvia">Latvia</option>
             <option value="lesotho">Lesotho</option>
             <option value="liberia">Liberia</option>
             <option value="libano">Libano</option>
             <option value="libia">Libia</option>
             <option value="liechtenstein">Liechtenstein</option>
             <option value="lituania">Lituania</option>
             <option value="luxemburgo">Luxemburgo</option>
             <option value="macau">Macau</option>
             <option value="macedonia">Macedonia</option>
             <option value="madagascar">Madagascar</option>
             <option value="malawi">Malawi</option>
             <option value="malasya">Malaysia</option>
             <option value="maldives">Maldives</option>
             <option value="mali">Mali</option>
             <option value="malta">Malta</option>
             <option value="marshall">Marshall Islands</option>
             <option value="martinica">Martinica</option>
             <option value="mauritania">Mauritania</option>
             <option value="mauritius">Mauritius</option>
             <option value="micronesia">Micronesia</option>
             <option value="molsdovia">Moldova</option>
             <option value="monaco">Monaco</option>
             <option value="mongolia">Mongolia</option>
             <option value="montserrat">Montserrat</option>
             <option value="morocco">Morocco</option>
             <option value="mozambique">Mozambique</option>
             <option value="myanmar">Myanmar</option>
             <option value="namibia">Namibia</option>
             <option value="nauru">Nauru</option>
             <option value="nepal">Nepal</option>
             <option value="jersey">Jersey</option>
             <option value="antillas_holandesas">Netherlands Antilles</option>
             <option value="las_holandezas">The Netherlands</option>
             <option value="zona_neutral">Neutral Zone</option>
             <option value="nicaragua">Nicaragua</option>
             <option value="niger">Niger</option>
             <option value="nigeria">Nigeria</option>
             <option value="niue">Niue</option>
             <option value="norfolk">Norfolk Island</option>
             <option value="mariana">Northern Mariana Islands</option>
             <option value="noruega">Noruega</option>
             <option value="caledonia">Nueva Caledonia</option>
             <option value="nueva_zelanda">Nueva Zelanda</option>
             <option value="oman">Oman</option>
             <option value="pakistan">Pakistan</option>
             <option value="palau">Palau</option>
             <option value="panama">Panama</option>
             <option value="papua">Papua Nueva Guinea</option>
             <option value="paraguay">Paraguay</option>
             <option value="peru">Peru</option>
             <option value="polinesia">Polinesia Francesa</option>
             <option value="pitcairn">Pitcairn</option>
             <option value="polonia">Polonia</option>
             <option value="portugal">Portugal</option>
             <option value="guernsey">Guernsey</option>
             <option value="isla_man">Isla de Man</option>
             <option value="mayotte">Mayotte</option>
             <option value="puerto_rico">Puerto Rico</option>
             <option value="qatar">Qatar</option>
             <option value="rep_dominicana">Republica Dominicana</option>
             <option value="reunion">Reunion</option>
             <option value="rumania">Rumania</option>
             <option value="rusia">Rusia </option>
             <option value="rwuanda">Rwanda</option>
             <option value="saint">Saint Kitts-Nevis</option>
             <option value="san_vicente">San Vicente y las Granadinas</option>
             <option value="samoa">Samoa</option>
             <option value="san_marino">San Marino</option>
             <option value="sao_tome">Sao Tome &amp; Principe</option>
             <option value="senegal">Senegal</option>
             <option value="seychelles">Seychelles</option>
             <option value="sierra_leona">Sierra Leona</option>
             <option value="singapur">Singapur</option>
             <option value="salomon">Salomon Islands</option>
             <option value="somalia">Somalia</option>
             <option value="sur_africa">Sur Africa</option>
             <option value="south_georgia">South Georgia &amp; Sandwich Islands</option>
             <option value="sri_lanka">Sri Lanka</option>
             <option value="st_helena">St. Helena</option>
             <option value="st_pierre">St. Pierre &amp; Miquelon</option>
             <option value="sudan">Sudan</option>
             <option value="surinam">Surinam</option>
             <option value="svalbard">Svalbard &amp; Jan Mayen Islands</option>
             <option value="swazilandia">Swazilandia</option>
             <option value="suecia">Suecia</option>
             <option value="siria">Siria</option>
             <option value="taiwan">Taiwan</option>
             <option value="tajikistan">Tajikistan</option>
             <option value="tanzania">Tanzania</option>
             <option value="tailandia">Tailandia</option>
             <option value="togo">Togo</option>
             <option value="tokelau">Tokelau</option>
             <option value="tonga">Tonga</option>
             <option value="trinidad">Trinidad y Tobago</option>
             <option value="tunisia">Tunisia</option>
             <option value="turquia">Turquia</option>
             <option value="turkmenistan">Turkmenistan</option>
             <option value="turks">Turks and Caicos Islands</option>
             <option value="tuvalu">Tuvalu</option>
             <option value="uganda">Uganda</option>
             <option value="ucrania">Ukraine</option>
             <option value="uruguay">Uruguay</option>
             <option value="uzbekistan">Uzbekistan</option>
             <option value="vanuatu">Vanuatu</option>
             <option value="vatican_citi">Vatican City State</option>
             <option value="venezuela">Venezuela</option>
             <option value="vietnam">Vietnam</option>
             <option value="islas_virgenes">Virgin Islands (British)</option>
             <option value="islas_virgenes2">Virgin Islands (U.S.)</option>
             <option value="wallis">Wallis and Futuna</option>
             <option value="western_sahara">Western Sahara</option>
             <option value="yemen">Yemen</option>
             <option value="yugoslavia">Yugoslavia</option>
             <option value="zaire">Zaire</option>
             <option value="zambia">Zambia</option>
             <option value="zimbabwe">Zimbabwe</option>*/?>
             </select>
    </td>
  </tr>
  <tr>
    <td align="center" valign="middle" id="obligatorio">*</td>
    <td>Desea recibir notificaciones por email?</td>
    <td>Si <input name="notired" type="radio" value="Y" tabindex="11" checked>No<input name="notired" type="radio" value="N" tabindex="12"></td>
  </tr>
</table>
<table width="600" border="0" cellspacing="2px" cellpadding="0" align="center">
  <tr>
    <td width="300" align="right"><button type="submit" id="submit" name="submit" tabindex="13"><img src="images/continuar.png" width="84" height="26" alt="Confirmar datos" /></button></td>
    <td width="300"><button type="reset" name="reset" id="reset" tabindex="14"><img src="images/limpiar.png" width="84" height="26" alt="Confirmar datos" /></button></td>
  </tr>
  <tr>
    <td colspan="2"><span class="detalle">*</span> <span class="detalle">Estos datos son obligatorios</span></td>
  </tr>
</table>
</form>
</div>
<div id="result"></div>
</div>
<?php
session_start();

$carro = $_SESSION['carro'];
$continuar = $_REQUEST['continuar'];
$mensaje = NULL;

if($carro == NULL)
{
   echo "<center><span id=\"obligatorio\">No has ingresado nada al carrito</span></center><br />";
}

$fecha = date("Y-m-j H:i:s");

if ($continuar == 'true' and $carro != NULL)
{
   include('../administracion/conexion.php');
   conecta_bd("libroexpress");

   $cedula     = $_REQUEST['cedula'];
   $nombres = $_REQUEST['nombres'];
   $apellidos  = $_REQUEST['apellidos'];
   $direccion  = $_REQUEST['direccion'];
   $telefono   = $_REQUEST['telefono'];
   $celular = $_REQUEST['celular'];
   $email      = $_REQUEST['email'];
   $ciudad     = $_REQUEST['ciudad'];
   $pais    = $_REQUEST['pais'];

   $query = mysql_query("SELECT cedula FROM clientes WHERE cedula = '$cedula'");

   While($row=mysql_fetch_object($query))
   {
      //Mostramos los titulos de los articulos o lo que deseemos...
      $cedula2 = $row->cedula;
   }
   if ($cedula2 != NULL)
   {
      $query = "UPDATE clientes SET ";
      $query .= "nombre = '$nombres', ";
      $query .= "apellidos = '$apellidos', ";
      $query .= "direccion = '$direccion', ";
      $query .= "telefono = '$telefono', ";
      $query .= "celular = '$celular', ";
      $query .= "correo = '$email', ";
      $query .= "ciudad = '$ciudad', ";
      $query .= "pais = '$pais' ";
      $query .= "WHERE cedula='$cedula'";
      mysql_query($query) or die(mysql_error());
   }
   else
   {
      //Todo parece correcto procedemos con la inserccion
         $query = "INSERT INTO clientes (";
         $query .= "cedula, nombre, apellidos, direccion, telefono, celular, correo, ciudad, pais";
         $query .= ") VALUES (";
         $query .= "'$cedula', '$nombres', '$apellidos', '$direccion', '$telefono', '$celular', '$email', '$ciudad', '$pais')";
         mysql_query($query) or die(mysql_error());
   }

   $articulos = $cantidades = $precios_unitarios = "";
   $precio = 0;
   foreach($carro as $k => $v)
   {
      $articulos .= $v['titulo']."+";
      $cantidades .= $v['cantidad']."+";
      $precios_unitarios .= $v['precio_dolares']."+";
      $subto=$v['cantidad']*$v['precio_dolares'];
      $precio=$precio+$subto;
   }

   $sql = "SELECT trm FROM datos";
   $result = mysql_query($sql) or die("La siguiente consulta contiene alg&uacute;n error:<br>nSQL: <b>$sql</b>");
   while ($row = mysql_fetch_object($result))
   {
      $trm           = $row->trm;
   }

   $query = "INSERT INTO pedidos (";
   $query .= "id_factura, id_comprador, articulos, cantidades, precios_unitarios, precio, fecha_emision, dolar_factura";
   $query .= ") VALUES (";
   $query .= "'$id_factura', '$cedula', '$articulos', '$cantidades', '$precios_unitarios', '$precio', '$fecha', '$trm')";
   mysql_query($query) or die(mysql_error());

   unset($_SESSION['carro']);

   $id_ingresado = $cedula;
   include('mail.php');

   $mensaje = "<img src=\"../imagenes/Imagenes de edicion/informacion.png\" width=\"25\" height=\"25\" align=\"absmiddle\" /> Gracias, la operaci&oacute;n se ha realizado con &eacute;xito<br />Favor verificar el e-mail ingresado";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&#237;tulo</title>
<script>
//Pon en la variable obligatorios el name de todos los campos que deben rellenar
obligatorio = ["cedula", "nombres", "apellidos", "direccion", "telefono", "celular", "email", "ciudad"];

//Pon en la veriable textoObligatorio el texto que quieres que aparezca en el alert

textoObligatorio=["Cedula", "Nombre(s)", "Apellidos", "Direcci&oacute;n", "Tel&eacute;fono", "Celular", "Correo electr&oacute;nico", "Ciudad"];

function comprobar(este)
{
   for(a=0; a<obligatorio.length; a++)
   {
      if (este.elements[obligatorio[6]].value != "")
      {
         isMail(este.elements[obligatorio[6]].value);
         if (x == 1)
         {
            este.elements[obligatorio[6]].focus();
            return false;
         }
      }

      if(este.elements[obligatorio[a]].value == "")
      {
         alert("Por favor, rellena el campo "+textoObligatorio[a]);
         este.elements[obligatorio[a]].focus();
         return false;
      }
   }
   return true;
}

function isMail(Cadena) {

    Punto = Cadena.substring(Cadena.lastIndexOf('.') + 1, Cadena.length);            // Cadena del .com
    Dominio = Cadena.substring(Cadena.lastIndexOf('@') + 1, Cadena.lastIndexOf('.'));    // Dominio @lala.com
    Usuario = Cadena.substring(0, Cadena.lastIndexOf('@'));                  // Cadena lalala@
    Reserv = "@/º\"\'+*{}\\<>?¿[]áéíóú#·¡!^*;,:";                      // Letras Reservadas

    // Añadida por El Codigo para poder emitir un alert en funcion de si email valido o no
    valido = true;

    // verifica qie el Usuario no tenga un caracter especial
    for (var Cont=0; Cont<Usuario.length; Cont++)
   {
        X = Usuario.substring(Cont,Cont+1);
        if (Reserv.indexOf(X)!=-1) valido = false;
    }

    // verifica qie el Punto no tenga un caracter especial
    for (var Cont=0; Cont<Punto.length; Cont++)
   {
        X=Punto.substring(Cont,Cont+1);
        if (Reserv.indexOf(X)!=-1) valido = false;
    }

    // verifica qie el Dominio no tenga un caracter especial
    for (var Cont=0; Cont<Dominio.length; Cont++)
   {
        X=Dominio.substring(Cont,Cont+1);
        if (Reserv.indexOf(X)!=-1) valido = false;
        }

    // Verifica la sintaxis básica.....
    if (Punto.length<2 || Dominio <1 || Cadena.lastIndexOf('.')<0 || Cadena.lastIndexOf('@')<0 || Usuario<1)
   {
        valido = false;
    }

    // Añadido por El Código para que emita un alert de aviso indicando si email válido o no
    if (valido)
   {
      return x = 0;
    }
   else
   {
        alert('El campo Email está vacio o no es válido.');
      return x = 1;
    }
}
</script>
<link href="../libroexpress.css" rel="stylesheet" type="text/css" />
</head>

<body id="sec_body_frames">
<form action="confirmar_datos_carrito.php?continuar=true" method="post" enctype="multipart/form-data" name="confirmacion_datos" id="confirmacion_datos" onSubmit="return comprobar(this)">
<table width="600" border="0" align="center" cellpadding="0" cellspacing="2px">
  <tr>
    <td width="20" align="center" valign="middle" id="obligatorio">*</td>
    <td width="180" id="carrito">C&eacute;dula</td>
    <td width="400"><input name="cedula" type="text" id="cedula" tabindex="1" size="30" maxlength="20" /></td>
  </tr>
  <tr>
    <td align="center" valign="middle" id="obligatorio">*</td>
    <td id="carrito">Nombre(s)</td>
    <td><input name="nombres" type="text" id="nombres" tabindex="2" size="60" maxlength="100" /></td>
  </tr>
  <tr>
    <td align="center" valign="middle" id="obligatorio">*</td>
    <td id="carrito">Apellidos</td>
    <td><input name="apellidos" type="text" id="apellidos" tabindex="3" size="60" maxlength="100" /></td>
  </tr>
  <tr>
    <td align="center" valign="middle" id="obligatorio">*</td>
    <td id="carrito">Direcci&oacute;n</td>
    <td><input name="direccion" type="text" id="direccion" tabindex="4" size="60" maxlength="150" /></td>
  </tr>
  <tr>
    <td align="center" valign="middle" id="obligatorio">*</td>
    <td id="carrito">Tel&eacute;fono</td>
    <td><input name="telefono" type="text" id="telefono" tabindex="5" size="12" maxlength="10" /></td>
  </tr>
  <tr>
    <td align="center" valign="middle" id="obligatorio">*</td>
    <td id="carrito">Celular</td>
    <td><input name="celular" type="text" id="celular" tabindex="6" size="12" maxlength="10" /></td>
  </tr>
  <tr>
    <td align="center" valign="middle" id="obligatorio">*</td>
    <td id="carrito">Correo electr&oacute;nico</td>
    <td><input name="email" type="text" id="email" tabindex="7" size="60" maxlength="150" /></td>
  </tr>
  <tr>
    <td align="center" valign="middle" id="obligatorio">*</td>
    <td id="carrito">Ciudad</td>
    <td><input name="ciudad" type="text" id="ciudad" tabindex="8" size="60" maxlength="150" /></td>
  </tr>
  <tr>
    <td align="center" valign="middle" id="obligatorio">*</td>
    <td id="carrito">Pa&iacute;s</td>
    <td><select name="pais" id="pais" tabindex="9">
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
</table>
<table width="600" border="0" cellspacing="2px" cellpadding="0" align="center">
  <tr>
    <td width="300" align="right"><a href="javascript:document.confirmacion_datos.reset()"><img src="../imagenes/Imagenes de edicion/limpiar.png" width="100" height="25" border="0" /></a></td>
    <td width="300"><input type="image" src="../imagenes/Imagenes de edicion/continuar.png" id="submit" name="submit" /></td>
  </tr>
  <tr>
    <td colspan="2"><span id="obligatorio">*</span> <span id="carrito">Estos datos son obligatorios</span></td>
  </tr>
</table>
</form>
<center><span id="carrito"><?php echo $mensaje; ?></span></center>
</body>
</html>

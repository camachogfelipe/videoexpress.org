<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin título</title>
<link href="estilo_admin.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php
// check session variable

if (isset($_SESSION['valid_user']))
{
	$id = $_REQUEST['id'];
	$editar = $_REQUEST['editar'];
	$insertado=false;
	include ("funciones.php");
	conecta_bd("redlibr_redlibreria");

	if($editar == true)
	{
		$cedula		= $_REQUEST['cedula'];
		$nombre		= $_REQUEST['nombre'];
		$apellidos	= $_REQUEST['apellidos'];
		$direccion	= $_REQUEST['direccion'];
		$telefono	= $_REQUEST['telefono'];
		$celular	= $_REQUEST['celular'];
		$correo		= $_REQUEST['correo'];
		$ciudad		= $_REQUEST['ciudad'];
		$pais		= $_REQUEST['pais'];
		$query = "UPDATE clientes SET nombre='$nombre', apellidos='$apellidos', direccion='$direccion', telefono='$telefono', celular='$celular', correo='$correo', ciudad='$ciudad', pais='$pais' WHERE cedula='$cedula'";
		mysql_query($query) or die(mysql_error());
		$insertado = true;
		
	}
	else
	{
		//nos conectamos a la tabla respectiva
		$sql = "select * FROM clientes WHERE cedula = '$id'";	
		$result = mysql_query($sql) or die("La siguiente consulta contiene alg&uacute;n error:<br>nSQL: <b>$sql</b>");
		while ($row = mysql_fetch_object($result))
		{
			$cedula		= $row->cedula;
			$nombre		= $row->nombre;
			$apellidos	= $row->apellidos;
			$direccion	= $row->direccion;
			$telefono	= $row->telefono;
			$celular	= $row->celular;
			$correo		= $row->correo;
			$ciudad		= $row->ciudad;
			$pais		= $row->pais;
		}
	}
?>
<form action="editar_cliente.php?editar=true" method="post" enctype="multipart/form-data" name="editar_cliente">
<table width="550" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td><img src="imagenes/redondo_sup_izq.png" width="20" height="20" /></td>
    <td background="imagenes/linea_superior.png">&nbsp;</td>
    <td><img src="imagenes/redondo_sup_der.png" width="20" height="20" /></td>
  </tr>
  <tr>
    <td style="background:url(imagenes/linea_vertical_izq.png) repeat-y">&nbsp;</td>
    <td bgcolor="#ebebeb">
     <table width="500" border="0" cellspacing="0" cellpadding="2" align="center">
  <tr>
    <td width="100" rowspan="9" align="center" valign="top"><img src="imagenes/avatar.png" width="100" height="150" /></td>
    <td width="120" id="encabezado_tablas">Cedula</td>
    <td width="280" id="encabezado_tablas"><input type="text" name="cedula" id="cedula" tabindex="1" value="<?php echo $cedula ?>" /></td>
  </tr>
  <tr>
    <td>Nombre(s)</td>
    <td><input name="nombre" type="text" id="nombre" tabindex="2" value="<?php echo $nombre ?>" size="45" /></td>
  </tr>
  <tr>
    <td id="encabezado_tablas">Apellidos</td>
    <td id="encabezado_tablas"><input name="apellidos" type="text" id="apellidos" tabindex="3" value="<?php echo $apellidos ?>" size="45" /></td>
  </tr>
  <tr>
    <td>Direcci&oacute;n</td>
    <td><input name="direccion" type="text" id="direccion" tabindex="4" value="<?php echo $direccion ?>" size="45" /></td>
  </tr>
  <tr>
    <td id="encabezado_tablas">Tel&eacute;fono</td>
    <td id="encabezado_tablas"><input type="text" name="telefono" id="telefono" tabindex="5" value="<?php echo $telefono ?>" /></td>
  </tr>
  <tr>
    <td>Celular</td>
    <td><input type="text" name="celular" id="celular" tabindex="6" value="<?php echo $celular ?>" /></td>
  </tr>
  <tr>
    <td id="encabezado_tablas">Correo electr&oacute;nico</td>
    <td id="encabezado_tablas"><input name="correo" type="text" id="correo" tabindex="7" value="<?php echo $correo ?>" size="45" /></td>
  </tr>
  <tr>
    <td>Ciudad</td>
    <td><input type="text" name="ciudad" id="ciudad" tabindex="8" value="<?php echo $ciudad ?>" /></td>
  </tr>
  <tr>
    <td id="encabezado_tablas">Pa&iacute;s</td>
    <td id="encabezado_tablas"><select name="pais" id="pais" tabindex="9">
       <option value="Colombia"<?php if($pais == 'Colombia') echo " selected=\"selected\""?>>Colombia</option>
       <option value="usa"<?php if($pais == 'usa') echo " selected=\"selected\""?>>Estados Unidos</option>
       <option value="mexico"<?php if($pais == 'mexico') echo " selected=\"selected\""?>>Mexico</option>
       <option value="canada"<?php if($pais == 'canada') echo " selected=\"selected\""?>>Canada</option>
       <option value="afghanistan"<?php if($pais == 'afghanistan') echo " selected=\"selected\""?>>Afghanistan</option>
       <option value="alemania"<?php if($pais == 'alemania') echo " selected=\"selected\""?>>Alemania</option>
       <option value="albania"<?php if($pais == 'albania') echo " selected=\"selected\""?>>Albania</option>
       <option value="algeria"<?php if($pais == 'algeria') echo " selected=\"selected\""?>>Algeria</option>
       <option value="american_samoa"<?php if($pais == 'american_samoa') echo " selected=\"selected\""?>>American Samoa</option>
       <option value="andorra"<?php if($pais == 'andorra') echo " selected=\"selected\""?>>Andorra</option>
       <option value="angola"<?php if($pais == 'angola') echo " selected=\"selected\""?>>Angola</option>
       <option value="anguila"<?php if($pais == 'anguila') echo " selected=\"selected\""?>>Anguilla</option>
       <option value="antigua_barbuda"<?php if($pais == 'antigua_barbuda') echo " selected=\"selected\""?>>Antigua and Barbuda</option>
       <option value="arabia_saudita"<?php if($pais == 'arabia_saudita') echo " selected=\"selected\""?>>Arabia Saudita</option>
       <option value="argentina"<?php if($pais == 'argentina') echo " selected=\"selected\""?>>Argentina</option>
       <option value="armenia"<?php if($pais == 'armenia') echo " selected=\"selected\""?>>Armenia</option>
       <option value="aruba"<?php if($pais == 'aruba') echo " selected=\"selected\""?>>Aruba</option>
       <option value="australia"<?php if($pais == 'australia') echo " selected=\"selected\""?>>Australia</option>
       <option value="austria"<?php if($pais == 'austria') echo " selected=\"selected\""?>>Austria</option>
       <option value="azerbaijan"<?php if($pais == 'azerbaijan') echo " selected=\"selected\""?>>Azerbaijan Republic</option>
       <option value="bahamas"<?php if($pais == 'bahamas') echo " selected=\"selected\""?>>Bahamas</option>
       <option value="bahrain"<?php if($pais == 'bahrain') echo " selected=\"selected\""?>>Bahrain</option>
       <option value="bangladesh"<?php if($pais == 'bangladesh') echo " selected=\"selected\""?>>Bangladesh</option>
       <option value="barbados"<?php if($pais == 'barbados') echo " selected=\"selected\""?>>Barbados</option>
       <option value="belarus"<?php if($pais == 'belarus') echo " selected=\"selected\""?>>Belarus</option>
       <option value="belgium"<?php if($pais == 'belgium') echo " selected=\"selected\""?>>Belgium</option>
       <option value="belize"<?php if($pais == 'belize') echo " selected=\"selected\""?>>Belize</option>
       <option value="benin"<?php if($pais == 'benin') echo " selected=\"selected\""?>>Benin</option>
       <option value="bermuda"<?php if($pais == 'bermuda') echo " selected=\"selected\""?>>Bermuda</option>
       <option value="bhutan"<?php if($pais == 'bhutan') echo " selected=\"selected\""?>>Bhutan</option>
       <option value="bolivia"<?php if($pais == 'bolivia') echo " selected=\"selected\""?>>Bolivia</option>
       <option value="bosnia"<?php if($pais == 'bosnia') echo " selected=\"selected\""?>>Bosnia y Herzegovina</option>
       <option value="botswana"<?php if($pais == 'botswana') echo " selected=\"selected\""?>>Botswana</option>
       <option value="brasil"<?php if($pais == 'brasil') echo " selected=\"selected\""?>>Brasil</option>
       <option value="brunei"<?php if($pais == 'brunei') echo " selected=\"selected\""?>>Brunei Darussalam</option>
       <option value="bulgaria"<?php if($pais == 'bulgaria') echo " selected=\"selected\""?>>Bulgaria</option>
       <option value="burkina"<?php if($pais == 'burkina') echo " selected=\"selected\""?>>Burkina Faso</option>
       <option value="burundi"<?php if($pais == 'burundi') echo " selected=\"selected\""?>>Burundi</option>
       <option value="cambodia"<?php if($pais == 'cambodia') echo " selected=\"selected\""?>>Cambodia</option>
       <option value="camerun"<?php if($pais == 'camerun') echo " selected=\"selected\""?>>Camerun</option>
       <option value="canada"<?php if($pais == 'canada') echo " selected=\"selected\""?>>Canada</option>
       <option value="cabo_verde"<?php if($pais == 'cabo_verde') echo " selected=\"selected\""?>>Cabo Verde</option>
       <option value="islas_caiman"<?php if($pais == 'islas_caiman') echo " selected=\"selected\""?>>Islas Caiman</option>
       <option value="republica_central_africana"<?php if($pais == 'republica_central_africana') echo " selected=\"selected\""?>>República central de Africa</option>
	   <option value="chad"<?php if($pais == 'chad') echo " selected=\"selected\""?>>Chad</option>
       <option value="chile"<?php if($pais == 'chile') echo " selected=\"selected\""?>>Chile</option>
       <option value="china"<?php if($pais == 'china') echo " selected=\"selected\""?>>China</option>
       <option value="christmas_island"<?php if($pais == 'christmas_island') echo " selected=\"selected\""?>>Christmas Island</option>
       <option value="cocos"<?php if($pais == 'cocos') echo " selected=\"selected\""?>>Cocos (Keeling) Islands</option>
       <option value="comoros"<?php if($pais == 'comoros') echo " selected=\"selected\""?>>Comoros</option>
       <option value="congo"<?php if($pais == 'congo') echo " selected=\"selected\""?>>Congo, Rep. Democratica</option>
       <option value="cook"<?php if($pais == 'cook') echo " selected=\"selected\""?>>Cook Islands</option>
       <option value="corea"<?php if($pais == 'corea') echo " selected=\"selected\""?>>Corea</option>
       <option value="rep_democratica_de_corea"<?php if($pais == 'rep_democratica_de_corea') echo " selected=\"selected\""?>>Corea, Rep.Democratica</option>
       <option value="costarica"<?php if($pais == 'costa_rica') echo " selected=\"selected\""?>>Costa Rica</option>
       <option value="cote"<?php if($pais == 'cote') echo " selected=\"selected\""?>>Cote d Ivoire (Ivory Coast)</option>
       <option value="croacia"<?php if($pais == 'croacia') echo " selected=\"selected\""?>>Croacia</option>
       <option value="cuba"<?php if($pais == 'cuba') echo " selected=\"selected\""?>>Cuba</option>
       <option value="chipre"<?php if($pais == 'chipre') echo " selected=\"selected\""?>>Chipre</option>
       <option value="rep_checa"<?php if($pais == 'rep_checa') echo " selected=\"selected\""?>>Czech Republic</option>
       <option value="dinamarca"<?php if($pais == 'dinamarca') echo " selected=\"selected\""?>>Dinamarca</option>
       <option value="djibouti"<?php if($pais == 'djibouti') echo " selected=\"selected\""?>>Djibouti</option>
       <option value="dominica"<?php if($pais == 'dominica') echo " selected=\"selected\""?>>Dominica</option>
       <option value="timor"<?php if($pais == 'timor') echo " selected=\"selected\""?>>East Timor</option>
       <option value="ecuador"<?php if($pais == 'ecuador') echo " selected=\"selected\""?>>Ecuador</option>
       <option value="egipto"<?php if($pais == 'egipto') echo " selected=\"selected\""?>>Egipto</option>
       <option value="salvador"<?php if($pais == 'salvador') echo " selected=\"selected\""?>>El Salvador</option>
       <option value="emiratos"<?php if($pais == 'emiratos') echo " selected=\"selected\""?>>Emiratos Arabes Unidos</option>
       <option value="eritrea"<?php if($pais == 'eritrea') echo " selected=\"selected\""?>>Eritrea</option>
       <option value="eslovaquia"<?php if($pais == 'eslovaquia') echo " selected=\"selected\""?>>Eslovaquia</option>
       <option value="eslovenia"<?php if($pais == 'eslovenia') echo " selected=\"selected\""?>>Eslovenia</option>
       <option value="españa"<?php if($pais == 'españa') echo " selected=\"selected\""?>>España</option>
       <option value="estonia"<?php if($pais == 'estonia') echo " selected=\"selected\""?>>Estonia</option>
       <option value="etiopia"<?php if($pais == 'etiopia') echo " selected=\"selected\""?>>Etiopia</option>
       <option value="islas_falkland"<?php if($pais == 'islas_falkland') echo " selected=\"selected\""?>>Falkland Islands (Islas Malvinas)</option>
       <option value="fji"<?php if($pais == 'fiji') echo " selected=\"selected\""?>>Fiji</option>
       <option value="filipinas"<?php if($pais == 'filipinas') echo " selected=\"selected\""?>>Filipinas</option>
       <option value="finlandia"<?php if($pais == 'finlandia') echo " selected=\"selected\""?>>Finlandia</option>
       <option value="francia"<?php if($pais == 'francia') echo " selected=\"selected\""?>>Francia</option>
       <option value="gabon"<?php if($pais == 'gabon') echo " selected=\"selected\""?>>Gabon Republic</option>
       <option value="gambia"<?php if($pais == 'gambia') echo " selected=\"selected\""?>>Gambia</option>
       <option value="georgia"<?php if($pais == 'georgia') echo " selected=\"selected\""?>>Georgia</option>
       <option value="ghana"<?php if($pais == 'ghana') echo " selected=\"selected\""?>>Ghana</option>
       <option value="gibraltar"<?php if($pais == 'gibraltar') echo " selected=\"selected\""?>>Gibraltar</option>
       <option value="grecia"<?php if($pais == 'grecia') echo " selected=\"selected\""?>>Grecia</option>
       <option value="greenland"<?php if($pais == 'greenland') echo " selected=\"selected\""?>>Greenland</option>
       <option value="granada"<?php if($pais == 'granada') echo " selected=\"selected\""?>>Granada</option>
       <option value="guam"<?php if($pais == 'guam') echo " selected=\"selected\""?>>Guam</option>
       <option value="guatemala"<?php if($pais == 'guatemala') echo " selected=\"selected\""?>>Guatemala</option>
       <option value="guinea"<?php if($pais == 'guinea') echo " selected=\"selected\""?>>Guinea</option>
       <option value="guinea_ecuatorial"<?php if($pais == 'guinea_ecuatorial') echo " selected=\"selected\""?>>Guinea Ecuatorial</option>
       <option value="guinea_bissau"<?php if($pais == 'guinea_bissau') echo " selected=\"selected\""?>>Guinea-Bissau</option>
       <option value="guyana"<?php if($pais == 'guayana') echo " selected=\"selected\""?>>Guyana</option>
       <option value="guyana_francesa"<?php if($pais == 'guayana_francesa') echo " selected=\"selected\""?>>Guyana Francesa</option>
       <option value="haiti"<?php if($pais == 'haiti') echo " selected=\"selected\""?>>Haiti</option>
       <option value="heard"<?php if($pais == 'heard') echo " selected=\"selected\""?>>Heard &amp; McDonald Islands</option>
       <option value="holanda"<?php if($pais == 'holanda') echo " selected=\"selected\""?>>Holanda</option>
       <option value="honduras"<?php if($pais == 'honduras') echo " selected=\"selected\""?>>Honduras</option>
       <option value="hongkong"<?php if($pais == 'hongkong') echo " selected=\"selected\""?>>Hong Kong</option>
       <option value="hungria<?php if($pais == 'hungria') echo " selected=\"selected\""?>">Hungria</option>
       <option value="india"<?php if($pais == 'india') echo " selected=\"selected\""?>>India</option>
       <option value="indonesia"<?php if($pais == 'indonesia') echo " selected=\"selected\""?>>Indonesia</option>
       <option value="inglaterra"<?php if($pais == 'inglaterra') echo " selected=\"selected\""?>>Inglaterra</option>
       <option value="iran"<?php if($pais == 'iran') echo " selected=\"selected\""?>>Iran</option>
       <option value="iraq"<?php if($pais == 'iraq') echo " selected=\"selected\""?>>Iraq</option>
       <option value="irlanda"<?php if($pais == 'irlanda') echo " selected=\"selected\""?>>Irlanda</option>
       <option value="islandia"<?php if($pais == 'islandia') echo " selected=\"selected\""?>>Islandia</option>
       <option value="israel"<?php if($pais == 'israel') echo " selected=\"selected\""?>>Israel</option>
       <option value="italia"<?php if($pais == 'italia') echo " selected=\"selected\""?>>Italia</option>
       <option value="jamaica"<?php if($pais == 'jamaica') echo " selected=\"selected\""?>>Jamaica</option>
       <option value="japon"<?php if($pais == 'japon') echo " selected=\"selected\""?>>Japon</option>
       <option value="jordania"<?php if($pais == 'jordania') echo " selected=\"selected\""?>>Jordania</option>
       <option value="kazakhstan"<?php if($pais == 'kazakhstan') echo " selected=\"selected\""?>>Kazakhstan</option>
       <option value="kenya"<?php if($pais == 'kenya') echo " selected=\"selected\""?>>Kenya</option>
       <option value="kiribati"<?php if($pais == 'kiribati') echo " selected=\"selected\""?>>Kiribati</option>
       <option value="kuwait"<?php if($pais == 'kuwait') echo " selected=\"selected\""?>>Kuwait</option>
       <option value="kyrgyzstan"<?php if($pais == 'kyrgyzstan') echo " selected=\"selected\""?>>Kyrgyzstan</option>
       <option value="laos"<?php if($pais == 'laos') echo " selected=\"selected\""?>>Laos</option>
       <option value="latvia"<?php if($pais == 'latvia') echo " selected=\"selected\""?>>Latvia</option>
       <option value="lesotho"<?php if($pais == 'lesotho') echo " selected=\"selected\""?>>Lesotho</option>
       <option value="liberia"<?php if($pais == 'liberia') echo " selected=\"selected\""?>>Liberia</option>
       <option value="libano"<?php if($pais == 'libano') echo " selected=\"selected\""?>>Libano</option>
       <option value="libia"<?php if($pais == 'libia') echo " selected=\"selected\""?>>Libia</option>
       <option value="liechtenstein"<?php if($pais == 'liechtenstein') echo " selected=\"selected\""?>>Liechtenstein</option>
       <option value="lituania"<?php if($pais == 'lituania') echo " selected=\"selected\""?>>Lituania</option>
       <option value="luxemburgo"<?php if($pais == 'luxemburgo') echo " selected=\"selected\""?>>Luxemburgo</option>
       <option value="macau"<?php if($pais == 'macau') echo " selected=\"selected\""?>>Macau</option>
       <option value="macedonia"<?php if($pais == 'macedonia') echo " selected=\"selected\""?>>Macedonia</option>
       <option value="madagascar"<?php if($pais == 'madagascar') echo " selected=\"selected\""?>>Madagascar</option>
       <option value="malawi"<?php if($pais == 'malawi') echo " selected=\"selected\""?>>Malawi</option>
       <option value="malasya"<?php if($pais == 'malasya') echo " selected=\"selected\""?>>Malaysia</option>
       <option value="maldives"<?php if($pais == 'maldives') echo " selected=\"selected\""?>>Maldives</option>
       <option value="mali"<?php if($pais == 'mali') echo " selected=\"selected\""?>>Mali</option>
       <option value="malta"<?php if($pais == 'malta') echo " selected=\"selected\""?>>Malta</option>
       <option value="marshall"<?php if($pais == 'marshall') echo " selected=\"selected\""?>>Marshall Islands</option>
       <option value="martinica"<?php if($pais == 'martinica') echo " selected=\"selected\""?>>Martinica</option>
       <option value="mauritania"<?php if($pais == 'mauritania') echo " selected=\"selected\""?>>Mauritania</option>
       <option value="mauritius"<?php if($pais == 'mauritius') echo " selected=\"selected\""?>>Mauritius</option>
       <option value="micronesia"<?php if($pais == 'micronesia') echo " selected=\"selected\""?>>Micronesia</option>
       <option value="molsdovia"<?php if($pais == 'molsdovia') echo " selected=\"selected\""?>>Moldova</option>
       <option value="monaco"<?php if($pais == 'monaco') echo " selected=\"selected\""?>>Monaco</option>
       <option value="mongolia"<?php if($pais == 'mongolia') echo " selected=\"selected\""?>>Mongolia</option>
       <option value="montserrat"<?php if($pais == 'montserrat') echo " selected=\"selected\""?>>Montserrat</option>
       <option value="morocco"<?php if($pais == 'morocco') echo " selected=\"selected\""?>>Morocco</option>
       <option value="mozambique"<?php if($pais == 'mozambique') echo " selected=\"selected\""?>>Mozambique</option>
       <option value="myanmar"<?php if($pais == 'myanmar') echo " selected=\"selected\""?>>Myanmar</option>
       <option value="namibia"<?php if($pais == 'namibia') echo " selected=\"selected\""?>>Namibia</option>
       <option value="nauru"<?php if($pais == 'nauru') echo " selected=\"selected\""?>>Nauru</option>
       <option value="nepal"<?php if($pais == 'nepal') echo " selected=\"selected\""?>>Nepal</option>
       <option value="jersey"<?php if($pais == 'jersey') echo " selected=\"selected\""?>>Jersey</option>
       <option value="antillas_holandesas"<?php if($pais == 'antillas_holandesas') echo " selected=\"selected\""?>>Netherlands Antilles</option>
       <option value="las_holandezas"<?php if($pais == 'las_holandezas') echo " selected=\"selected\""?>>The Netherlands</option>
       <option value="zona_neutral"<?php if($pais == 'zona_neutral') echo " selected=\"selected\""?>>Neutral Zone</option>
       <option value="nicaragua"<?php if($pais == 'nicaragua') echo " selected=\"selected\""?>>Nicaragua</option>
       <option value="niger"<?php if($pais == 'niger') echo " selected=\"selected\""?>>Niger</option>
       <option value="nigeria"<?php if($pais == 'nigeria') echo " selected=\"selected\""?>>Nigeria</option>
       <option value="niue"<?php if($pais == 'niue') echo " selected=\"selected\""?>>Niue</option>
       <option value="norfolk"<?php if($pais == 'norfolk') echo " selected=\"selected\""?>>Norfolk Island</option>
       <option value="mariana"<?php if($pais == 'mariana') echo " selected=\"selected\""?>>Northern Mariana Islands</option>
       <option value="noruega"<?php if($pais == 'noruega') echo " selected=\"selected\""?>>Noruega</option>
       <option value="caledonia"<?php if($pais == 'calcedonia') echo " selected=\"selected\""?>>Nueva Caledonia</option>
       <option value="nueva_zelanda"<?php if($pais == 'nueva_zelanda') echo " selected=\"selected\""?>>Nueva Zelanda</option>
       <option value="oman"<?php if($pais == 'oman') echo " selected=\"selected\""?>>Oman</option>
       <option value="pakistan"<?php if($pais == 'pakistan') echo " selected=\"selected\""?>>Pakistan</option>
       <option value="palau"<?php if($pais == 'palau') echo " selected=\"selected\""?>>Palau</option>
       <option value="panama"<?php if($pais == 'panama') echo " selected=\"selected\""?>>Panama</option>
       <option value="papua"<?php if($pais == 'papua') echo " selected=\"selected\""?>>Papua Nueva Guinea</option>
       <option value="paraguay"<?php if($pais == 'paraguay') echo " selected=\"selected\""?>>Paraguay</option>
       <option value="peru"<?php if($pais == 'peru') echo " selected=\"selected\""?>>Peru</option>
       <option value="polinesia"<?php if($pais == 'polinesia') echo " selected=\"selected\""?>>Polinesia Francesa</option>
       <option value="pitcairn"<?php if($pais == 'pitcairn') echo " selected=\"selected\""?>>Pitcairn</option>
       <option value="polonia"<?php if($pais == 'polonia') echo " selected=\"selected\""?>>Polonia</option>
       <option value="portugal"<?php if($pais == 'portugal') echo " selected=\"selected\""?>>Portugal</option>
       <option value="guernsey"<?php if($pais == 'guernsey') echo " selected=\"selected\""?>>Guernsey</option>
       <option value="isla_de_man"<?php if($pais == 'isla_de_man') echo " selected=\"selected\""?>>Isla de Man</option>
       <option value="mayotte"<?php if($pais == 'mayotte') echo " selected=\"selected\""?>>Mayotte</option>
       <option value="puerto_rico"<?php if($pais == 'puerto_rico') echo " selected=\"selected\""?>>Puerto Rico</option>
       <option value="qatar"<?php if($pais == 'qatar') echo " selected=\"selected\""?>>Qatar</option>
       <option value="rep_dominicana"<?php if($pais == 'rep_dominicana') echo " selected=\"selected\""?>>Republica Dominicana</option>
       <option value="reunion"<?php if($pais == 'reunion') echo " selected=\"selected\""?>>Reunion</option>
       <option value="rumania"<?php if($pais == 'rumania') echo " selected=\"selected\""?>>Rumania</option>
       <option value="rusia"<?php if($pais == 'rusia') echo " selected=\"selected\""?>>Rusia </option>
       <option value="rwuanda"<?php if($pais == 'rwanda') echo " selected=\"selected\""?>>Rwanda</option>
       <option value="saint"<?php if($pais == 'saint') echo " selected=\"selected\""?>>Saint Kitts-Nevis</option>
       <option value="san_vicente"<?php if($pais == 'san_vicente') echo " selected=\"selected\""?>>San Vicente y las Granadinas</option>
       <option value="samoa"<?php if($pais == 'samoa') echo " selected=\"selected\""?>>Samoa</option>
       <option value="san_marino"<?php if($pais == 'san_marino') echo " selected=\"selected\""?>>San Marino</option>
       <option value="sao_tome"<?php if($pais == 'sao_tome') echo " selected=\"selected\""?>>Sao Tome &amp; Principe</option>
       <option value="senegal"<?php if($pais == 'senegal') echo " selected=\"selected\""?>>Senegal</option>
       <option value="seychelles"<?php if($pais == 'seychelles') echo " selected=\"selected\""?>>Seychelles</option>
       <option value="sierra_leona"<?php if($pais == 'sierra_leona') echo " selected=\"selected\""?>>Sierra Leona</option>
       <option value="singapur"<?php if($pais == 'singapur') echo " selected=\"selected\""?>>Singapur</option>
       <option value="salomon"<?php if($pais == 'ssalomon') echo " selected=\"selected\""?>>Salomon Islands</option>
       <option value="somalia"<?php if($pais == 'somalia') echo " selected=\"selected\""?>>Somalia</option>
       <option value="sur_africa"<?php if($pais == 'sur_africa') echo " selected=\"selected\""?>>Sur Africa</option>
       <option value="south_georgia"<?php if($pais == 'south_georgia') echo " selected=\"selected\""?>>South Georgia &amp; Sandwich Islands</option>
       <option value="sri_lanka"<?php if($pais == 'sri_lanka') echo " selected=\"selected\""?>>Sri Lanka</option>
       <option value="st_helena"<?php if($pais == 'st_helena') echo " selected=\"selected\""?>>St. Helena</option>
       <option value="st_pierre"<?php if($pais == 'st_pierre') echo " selected=\"selected\""?>>St. Pierre &amp; Miquelon</option>
       <option value="sudan"<?php if($pais == 'sudan') echo " selected=\"selected\""?>>Sudan</option>
       <option value="surinam"<?php if($pais == 'surinam') echo " selected=\"selected\""?>>Surinam</option>
       <option value="svalbard"<?php if($pais == 'svalbard') echo " selected=\"selected\""?>>Svalbard &amp; Jan Mayen Islands</option>
       <option value="swazilandia"<?php if($pais == 'swazilandia') echo " selected=\"selected\""?>>Swazilandia</option>
       <option value="suecia"<?php if($pais == 'suecia') echo " selected=\"selected\""?>>Suecia</option>
       <option value="siria"<?php if($pais == 'siria') echo " selected=\"selected\""?>>Siria</option>
       <option value="taiwan"<?php if($pais == 'taiwan') echo " selected=\"selected\""?>>Taiwan</option>
       <option value="tajikistan"<?php if($pais == 'tajikistan') echo " selected=\"selected\""?>>Tajikistan</option>
       <option value="tanzania"<?php if($pais == 'tanzania') echo " selected=\"selected\""?>>Tanzania</option>
       <option value="tailandia"<?php if($pais == 'tailandia') echo " selected=\"selected\""?>>Tailandia</option>
       <option value="togo"<?php if($pais == 'togo') echo " selected=\"selected\""?>>Togo</option>
       <option value="tokelau"<?php if($pais == 'tokelau') echo " selected=\"selected\""?>>Tokelau</option>
       <option value="tonga"<?php if($pais == 'tonga') echo " selected=\"selected\""?>>Tonga</option>
       <option value="trinidad"<?php if($pais == 'trinidad') echo " selected=\"selected\""?>>Trinidad y Tobago</option>
       <option value="tunisia"<?php if($pais == 'tunisia') echo " selected=\"selected\""?>>Tunisia</option>
       <option value="turquia"<?php if($pais == 'turquia') echo " selected=\"selected\""?>>Turquia</option>
       <option value="turkmenistan"<?php if($pais == 'turkmenistan') echo " selected=\"selected\""?>>Turkmenistan</option>
       <option value="turks"<?php if($pais == 'turks') echo " selected=\"selected\""?>>Turks and Caicos Islands</option>
       <option value="tuvalu"<?php if($pais == 'tuvalu') echo " selected=\"selected\""?>>Tuvalu</option>
       <option value="uganda"<?php if($pais == 'uganda') echo " selected=\"selected\""?>>Uganda</option>
       <option value="ucrania"<?php if($pais == 'ucrania') echo " selected=\"selected\""?>>Ukraine</option>
       <option value="uruguay"<?php if($pais == 'uruguay') echo " selected=\"selected\""?>>Uruguay</option>
       <option value="uzbekistan"<?php if($pais == 'uzbekistan') echo " selected=\"selected\""?>>Uzbekistan</option>
       <option value="vanuatu"<?php if($pais == 'vanuatu') echo " selected=\"selected\""?>>Vanuatu</option>
       <option value="vatican_citi"<?php if($pais == 'vatican_citi') echo " selected=\"selected\""?>>Vatican City State</option>
       <option value="venezuela"<?php if($pais == 'venezuela') echo " selected=\"selected\""?>>Venezuela</option>
       <option value="vietnam"<?php if($pais == 'vietnam') echo " selected=\"selected\""?>>Vietnam</option>
       <option value="islas_virgenes_britanicas"<?php if($pais == 'islas_virgenes_britanicas') echo " selected=\"selected\""?>>Virgin Islands (British)</option>
       <option value="islas_virgenes_usa"<?php if($pais == 'islas_virgenes_usa') echo " selected=\"selected\""?>>Virgin Islands (U.S.)</option>
       <option value="wallis"<?php if($pais == 'wallis') echo " selected=\"selected\""?>>Wallis and Futuna</option>
       <option value="western_sahara"<?php if($pais == 'western_sahara') echo " selected=\"selected\""?>>Western Sahara</option>
       <option value="yemen"<?php if($pais == 'yemen') echo " selected=\"selected\""?>>Yemen</option>
       <option value="yugoslavia"<?php if($pais == 'yugoslavia') echo " selected=\"selected\""?>>Yugoslavia</option>
       <option value="zaire"<?php if($pais == 'zaire') echo " selected=\"selected\""?>>Zaire</option>
       <option value="zambia"<?php if($pais == 'zambia') echo " selected=\"selected\""?>>Zambia</option>
       <option value="zimbabwe"<?php if($pais == 'zimbabwe') echo " selected=\"selected\""?>>Zimbabwe</option>
     </select>
    </td>
  </tr>
  <tr>
    <td colspan="3" align="center"><a id="flechas" onclick="history.go(-1)" style="cursor:pointer" ><img src="imagenes/botonatras.png" alt="Regresar" width="25" height="25" align="bottom" /> Regresar</a> <input type="image" src="imagenes/cambiar.png" name="submit" id="submit" tabindex="10" />
    <?php if($insertado == true) echo "<div id=\"informacion_gral\"><br /><img src=\"imagenes/informacion.png\" width=\"25\" height=\"25\" align=\"absmiddle\" /> Se han actualizado los datos</div>"; ?>
    </td>
  </tr>
</table>
    </td>
    <td style="background:url(imagenes/linea_vertical_der.png) repeat-y">&nbsp;</td>
  </tr>
  <tr>
    <td><img src="imagenes/redondo_inf_izq.png" width="20" height="20" /></td>
    <td background="imagenes/linea_inferior.png">&nbsp;</td>
    <td><img src="imagenes/redondo_inf_der.png" width="20" height="20" /></td>
  </tr>
</table>
</form>
</body>
</html>
<?php
}
else
{
	echo '<script type="text/javascript">window.location="../administracion";</script>';
}
?>
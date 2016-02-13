<?
session_start();

#
# Example PHP server-side script for generating
# responses suitable for use with jquery-tokeninput
#
# Connect to the database
mysql_pconnect("localhost", "libroexp_admin", "manuel.obando.123") or die("Could not connect");
mysql_select_db("libroexp_sms_sdv") or die("Could not select database");

# Perform the query
$texto = $_GET["q"];
strip_tags($texto);
addslashes($texto);
trim($texto);
static $acentos = "áéíóúÁÉÍÓÚàèìòùÀÈÌÒÙâêîôûÂÊÎÔÛäëïöüÄËÏÖÜ";
static $validos = "aeiouAEIOUaeiouAEIOUaeiouAEIOUaeiouAEIOU";
$texto = strtr($texto, $acentos, $validos);


$query = "SELECT id, concat(nombres,' - ', celular) as name FROM sms_usuarios WHERE nombres LIKE '%".$texto."%' ORDER BY nombres ASC LIMIT 10";
$arr = array();
$rs = mysql_query($query);

//echo $query;

# Collect the results
while($obj = mysql_fetch_object($rs)) {
	$id_temp = $obj->id;
    $name_temp =  utf8_encode($obj->name);
//    $arr[] =  $obj;
    $arr[] =  array(
			"id" => $id_temp,
			"name" => $name_temp
			);
}

# JSON-encode the response
$json_response = json_encode($arr);

# Optionally: Wrap the response in a callback function for JSONP cross-domain support
if($_GET["callback"]) {
    $json_response = $_GET["callback"] . "(" . $json_response . ")";
}

# Return the response
echo $json_response;

?>
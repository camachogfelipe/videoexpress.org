<?
session_start();

#
# Example PHP server-side script for generating
# responses suitable for use with jquery-tokeninput
#
# Connect to the database
mysql_pconnect("localhost", "libroexp_admin", "manuel.obando.123") or die("Could not connect");
mysql_select_db("libroexp_Iglesia") or die("Could not select database");

# Perform the query
$query = "SELECT idLisu as id, concat(lisuNombre,' - ', lisuCelular) as name FROM listas_usuarios WHERE lisuNombre LIKE '%".mysql_real_escape_string($_GET["q"])."%' AND idIglesia = '".$_SESSION['user_igl']."' ORDER BY lisuNombre ASC LIMIT 10";
$arr = array();
$rs = mysql_query($query);

# Collect the results
while($obj = mysql_fetch_object($rs)) {
    $arr[] = $obj;
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
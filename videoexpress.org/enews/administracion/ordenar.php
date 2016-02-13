<?php
session_start();

  // check session variable

if (isset($_SESSION['valid_user']))
{
	$bd = "enews";
	$sql = "select * FROM inicio ORDER BY ";
	
	switch ($x)
	{
		//orden por id
		case "1":	$sql .= "(No) ASC";
					break;
		case "2":	$sql .= "(fecha) DESC";
					break;
		//orden por titulo
		case "3":	$sql .= "(titulo_paraeditar) ASC";
				  	break;
		//orden por auditorio
		case "4":	$sql .= "(titulo_primerafila) ASC";
					break;
		//orden por clasificacion
		case "5":	$sql .= "(titulo_nuevamente) ASC";
					break;
		//orden por genero
		case "6":	$sql .= "(titulo_buenasnuevas) ASC";
					break;
		//orden por tiempo
		case "7":	$sql .= "(titulo_garabatos) ASC";
					break;
	}
}
else
{
	include ('index.php');
}
?>
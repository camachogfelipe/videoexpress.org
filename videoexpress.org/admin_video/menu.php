<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="adminvideo.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="99%" align="center"border="0" cellspacing="0" cellpadding="0" class="menu">
  <tr>
    <td id="esq_sup_izq">&nbsp;</td>
    <td id="mdl_sup">&nbsp;</td>
    <td id="esq_sup_der">&nbsp;</td>
  </tr>
  <tr>
    <td id="mdl_izq">&nbsp;</td>
    <td id="mdl_cen">
    <ul>
    	<?php
			include("funciones.php");
			menu($op);
		?>
    </ul>
   	</td>
    <td id="mdl_der">&nbsp;</td>
  </tr>
  <tr>
    <td id="esq_inf_izq">&nbsp;</td>
    <td id="mdl_inf">&nbsp;</td>
    <td id="esq_inf_der">&nbsp;</td>
  </tr>
</table>
</body>
</html>
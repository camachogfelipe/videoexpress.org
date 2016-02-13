<?php
session_start();
?>
<HTML>
<HEAD>
<TITLE>Actualizar base de datos</TITLE>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="../estilo.css" rel="stylesheet" type="text/css">
<?php
  // check session variable

if (isset($_SESSION['valid_user']) and $_SESSION['permisos'][0] == "Y")
{
?>
</HEAD>

<body bgcolor="#FFFFFF">
<center>
<?php
$info[No]					= $_GET["No"];
$info[boletin]				= $_GET["boletin"];
$editar 					= $_GET['editar'];

if ($editar == true)
{
	include ("conexion.php");

	$sql = "select * FROM boletin WHERE No='$info[No]'";
	$result = mysql_query($sql) or die("La siguiente consulta contiene alg&uacute;n error:<br>nSQL: <b>$sql</b>");

	while ($row = mysql_fetch_object($result))
	{
		$info[No] = $row->No;
		$info[boletin] = $row->boletin;
	}
}
?>
<form action="<?php if($editar == true)
	  {
		echo "editar2.php?editar=true";
	  }
	  else
	  {
		  echo "editar2.php";
	  } ?>" method="post" enctype="multipart/form-data">
<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top: 0px">
<?php if($editar == true)
	  {
		echo "<tr><td width='35%'>Boletin No. $info[No]<input name='No' type='hidden' id='No' size='10' maxlength='3' value='$info[No]'</td></tr>";
	  }

	echo "<tr><td height='300px'><div id=\"main\">
 		  <div id=\"encabezado_menu\" style=\"height: 70px\"></div>
 		  <div id=\"sombra\"><img src=\"../imagenes/sombra_izq.png\" width=\"200\" height=\"10\" /></div>
 		  <div id=\"logo\"><img src=\"../imagenes/logo.png\" width=\"145\" height=\"145\" border=\"0\" id=\"img_logo\" /></div>
  		  <div id=\"cuerpo\" style=\"margin-left: 105px\"><div id=\"encabezado_cuerpo\" class=\"azul\">
		   <div>
    	    <div>Boletin No. $info[No]
			</div>
   		   </div>
  	      </div>
	      <div id=\"texto_cuerpo\">";
	 include("FCKeditor/fckeditor.php") ;
  	 $oFCKeditor = new FCKeditor('boletin') ;
     $oFCKeditor->BasePath = 'FCKeditor/';
	 $oFCKeditor->Value = $info[boletin];
     $oFCKeditor->Width  = '650px' ;
     $oFCKeditor->Height = '400px' ;
     $oFCKeditor->Create() ;
	 echo "</div></div></div></td></tr>";
 	?>
    <tr><td style="text-align:center; clear: both">
   <input name="action" type="hidden" value="upload" /></td></tr></table>
</form>
</BODY>
</HTML>
<?php
}
else
{
	include ('index.php');
}
?>
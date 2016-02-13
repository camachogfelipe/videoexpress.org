<?php
session_start();
?>
<HTML>
<HEAD>
<TITLE>Actualizar base de datos</TITLE>
<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
<link href="estilo_admin.css" rel="stylesheet" type="text/css">
<?php
  // check session variable

if (isset($_SESSION['valid_user']))
{
?>
<script type="text/javascript" src="../scripts/jquery-1.5.1.js"></script>
<script type="text/javascript" src="../scripts/jquery.validate.js"></script>
<script type="text/javascript">
$.validator.setDefaults({
	submitHandler: function()
	{
		$().ajaxStart(function()
		{
			$('#loading').show();
			$('#result').hide();
		});
		$('#editarnotired').submit(function()
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
	$('#editarnotired:first').focus();
	// validate signup form on keyup and submit
	var valido = $("#editarnotired").validate({
		rules: {
			titulo: {
				required: true,
				minlength: 4
			},
			encabezado: {
				required: true,
				minlength: 10
			},
			texto: {
				required: true,
				minlength: 50
			}
		},
		messages: {
			titulo: "<br />Por favor ingrese el titulo",
			correo: "<br />Por favor ingrese un encabezado",
			mensaje: "<br />Por favor ingrese un texto"
		}
	});
});
</script>
</HEAD>

<body>
<center>
<?php
$info[No]		= $_GET["No"];
$info[titulo]	= $_GET["titulo"];
$info[encabezado] = $_GET['encabezado'];
$info[texto]	= $_GET["texto"];
$info[texto]	= htmlspecialchars_decode($info[texto]);
$editar 		= $_GET['editar'];

if ($editar == true)
{
	include ("funciones.php");
	conecta_bd("redlibr_redlibreria");

	$sql = "select * FROM notired WHERE id_notired='$info[No]'";
	$result = consulta_bd("notired", "*", "1;;;id_notired='$info[No]';");

	while ($row = mysql_fetch_object($result))
	{
		$info[No] = $row->id_notired;
		$info[titulo] = $row->titulo;
		$info[encabezado] = $row->encabezado;
		$info[texto] = htmlspecialchars_decode($row->texto);
	}
}
?>
<div id="loading">
<form action="<?php if($editar == true)
	  {
		echo "editar2.php?editar=true";
	  }
	  else
	  {
		  echo "editar2.php";
	  } ?>" method="post" enctype="multipart/form-data" id="editarnotired" name="editarnotired">
<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top: 0px">
<?php if($editar == true)
	  {
		echo "<tr><td width='35%'>NotiRED No. $info[No]<input name='No' type='hidden' id='No' size='10' maxlength='3' value='$info[No]' /></td></tr>";
	  }

	echo '<tr><td>T&iacute;tulo: <input name="titulo" type="text" value="'.$info[titulo].'" size="60"></td></tr>';
	echo '<tr><td valign="top">Encabezado: <textarea name="encabezado" id="encabezado" cols="100" rows="5">'.$info[encabezado].'</textarea></td></tr>';
	echo "<tr><td height='300px'><div id=\"main\">";
	 include("FCKeditor/fckeditor.php") ;
  	 $oFCKeditor = new FCKeditor('texto') ;
     $oFCKeditor->BasePath = 'FCKeditor/';
	 $oFCKeditor->Value = $info[texto];
     $oFCKeditor->Width  = '100%' ;
     $oFCKeditor->Height = '600px';
     $oFCKeditor->Create() ;
	 echo "</td></tr>";
 	?>
    </table>
</form>
</div>
<div id="result"></div>
</BODY>
</HTML>
<?php
}
else
{
	echo "<script languaje='Javascript'>location.href='../'</script>";
}
?>
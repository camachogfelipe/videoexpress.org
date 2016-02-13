<?php 
session_start();

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
			$('#editaremail').submit(function()
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
		$('#editaremail:first').focus();
		// validate signup form on keyup and submit
		var valido = $("#editaremail").validate({
			rules: {
				nombres: {
					required: true,
					minlength: 4
				},
				correo: {
					required: true,
					email: true
				}
			},
			messages: {
				nombres: "<br />Por favor ingrese el nombre",
				correo: "<br />Por favor ingrese un email valido",
			}
		});
	});
	</script>
	<?php
	$info[id]		= $_GET["id_email"];
	$info[nombres]	= $_GET["nombres"];
	$info[email] = $_GET['email'];
	$editar 		= $_GET['editar'];
	?>
	<div id="loading">
	<form action="<?php if($editar == true)
	  {
		echo "editar_email2.php?editar=true";
	  }
	  else
	  {
		  echo "editar_email2.php";
	  } ?>" method="post" id="editaremail" name="editaremail">
	<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top: 0px">
	<?php if($editar == true)
	{
		echo "<tr><td width='35%'>Email No. $info[id]<input name='id_email' type='hidden' id='id_email' size='10' maxlength='3' value='$info[id]' /></td></tr>";
	  }

	echo '<tr><td>Nombres: <input name="nombres" id="nombres" type="text" value="'.$info[nombres].'" size="60"></td></tr>';
	echo '<tr><td>email: <input name="correo" id="correo" type="text" value="'.$info[email].'" size="60"></td></tr>';
	echo '<tr><td><button type="submit" id="submit" name="submit" tabindex="13"><img src="../images/continuar.png" width="84" height="26" alt="Confirmar datos" /></button></td></tr>';
 	?>
    </table>
</form>
</div>
<div id="result"></div>
    <?php
}
else
{
   echo '<script type="text/javascript">window.location="../administracion";</script>';
}
?>
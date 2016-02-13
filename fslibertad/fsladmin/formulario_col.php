<?php
session_start();
if (isset($_SESSION['fsluser']))
{
	include("funciones.php");
	$op = $_REQUEST['op'];
	$s = $_REQUEST['s'];
	$id = $_REQUEST['id'];
	$es = $_REQUEST['es'];
	$conecta = conecta_bd();
	$consulta = consulta_bd("colaboradores", "*", "1;;;id_colaborador='$id';");
	while($filas = mysql_fetch_object($consulta))
	{
		$nombre = $filas->Nombre;
		$ua = $filas->Creado;
		$usuario = $filas->Usuario;
	}
?>
		<script language="javascript" src="../scripts/jquery.validate.js"></script>
        <script language="javascript" src="../scripts/jquery.validate.additional-methods.js"></script>
        <script type="text/javascript" src="../scripts/tinymce/jscripts/tiny_mce/jquery.tinymce.js"></script>
        <script language="javascript">
			$('#formulario_col').submit(function()
			{
				$.ajax(
				{
					type: 'POST',
					url: $(this).attr('action'),
					data: $(this).serialize(),
					success: function(data)
					{
						$("#formulario_col").hide();
						var result = $('#enviado').html(data);
						$(result).fadeIn('slow');
					}
				})
				return false;
			});
		</script>
		<form action="formulario_col2.php?<?php echo "e=1" ?>" method="post" id="formulario_col" name="formulario_col">
    		<input type="hidden" id="op" name="op" value="<?php echo $op ?>" />
        	<input type="hidden" id="s" name="s" value="<?php echo $s ?>" />
            <input type="hidden" id="es" name="es" value="<?php echo $es ?>" />
            <input type="hidden" id="id" name="id" value="<?php echo $id ?>" />
            <p>Creado: <?php echo $ua ?>, Creado por: <?php echo $usuario ?></p>
            Nombre colaborador: <input name="Nombre" type="text" id="Nombre" value="<?php echo $nombre ?>" size="50" />
			<button type="submit" id="submit" name="submit"><img src="../imagenes/boton_enviar_off.png" width="24" height="24" /> Enviar</button>
		</form>
        <div id="enviado"></div>
<?php
}
else header("Location: ../");
?>
<?php
session_start();
if (isset($_SESSION['fsluser']))
{
	include("funciones.php");
	$op = $_REQUEST['op'];
	$subseccion = $_REQUEST['s'];
	$es = $_REQUEST['es'];
	$id = $_REQUEST['id'];
	if($id != NULL and $s != "nva_semilla")
	{
		$conecta = conecta_bd();
		$consulta = consulta_bd("semillas", "*", "1;;;ID_semilla='$id';");
		while($filas = mysql_fetch_object($consulta))
		{
			$texto = $filas->Texto;
			$ua = $filas->Ultima_actualizacion;
			$usuario = $filas->Usuario;
		}
	}
?>
		<script language="javascript" src="../scripts/jquery.validate.js"></script>
        <script language="javascript" src="../scripts/jquery.validate.additional-methods.js"></script>
        <script type="text/javascript" src="../scripts/tinymce/jscripts/tiny_mce/jquery.tinymce.js"></script>
		<script type="text/javascript" src="../scripts/editor_texto.js"></script>
        <script language="javascript">
			$('#formulario_semillas').submit(function()
			{
				$.ajax(
				{
					type: 'POST',
					url: $(this).attr('action'),
					data: $(this).serialize(),
					success: function(data)
					{
						$("#formulario_semillas").hide();
						var result = $('#enviado').html(data);
						$(result).fadeIn('slow');
					}
				})
				return false;
			});
		</script>
		<form action="formulario_semillas2.php?<?php echo "e=1" ?>" method="post" id="formulario_semillas" name="formulario_semillas">
    		<input type="hidden" id="op" name="op" value="<?php echo $op ?>" />
        	<input type="hidden" id="s" name="s" value="<?php echo $subseccion ?>" />
            <input type="hidden" id="es" name="es" value="<?php echo $es ?>" />
            <input type="hidden" id="id" name="id" value="<?php echo $id ?>" />
	        <?php
				if($id != NULL)
				{
            ?>
          <p>&Uacute;ltima actualizaci&oacute;n: <?php echo $ua ?>, realizada por: <?php echo $usuario ?></p>
            <?php } ?>
    	    <div>
				<div><label for="texto1">Semilla de Libertad</label></div>
				<div>
                	<textarea id="texto1" name="texto1" class="tinymce" style="width:100%; min-height:300px"><?php echo $texto ?></textarea>
				</div>
			</div>
            <button type="hidden" id="submit" name="submit"><img src="../imagenes/boton_enviar_off.png" width="24" height="24" /> Enviar</button>
		</form>
        <div id="enviado"></div>
<?php
}
else header("Location: ../");
?>
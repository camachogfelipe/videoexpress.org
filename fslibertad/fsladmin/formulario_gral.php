<?php
session_start();
if (isset($_SESSION['fsluser']))
{
	include("funciones.php");
	$op = $_REQUEST['op'];
	$subseccion = $_REQUEST['s'];
	$es = $_REQUEST['es'];
	$conecta = conecta_bd();
	$consulta = consulta_bd("informacion_gral", "Titulo, Texto, Ultima_edicion, Usuario", "1;;;ID_seccion='$op' and Subseccion='$subseccion';");
	while($filas = mysql_fetch_object($consulta))
	{
		$titulo = $filas->Titulo;
		$texto = $filas->Texto;
		$ua = $filas->Ultima_edicion;
		$usuario = $filas->Usuario;
	}
?>
		<script language="javascript" src="../scripts/jquery.validate.js"></script>
        <script language="javascript" src="../scripts/jquery.validate.additional-methods.js"></script>
        <script type="text/javascript" src="../scripts/tinymce/jscripts/tiny_mce/jquery.tinymce.js"></script>
		<script type="text/javascript" src="../scripts/editor_texto.js"></script>
        <script language="javascript">
			$('#formulario_gral').submit(function()
			{
				$.ajax(
				{
					type: 'POST',
					url: $(this).attr('action'),
					data: $(this).serialize(),
					success: function(data)
					{
						$("#formulario_gral").hide();
						var result = $('#enviado').html(data);
						$(result).fadeIn('slow');
					}
				})
				return false;
			});
		</script>
		<form action="formulario_gral2.php?<?php echo "e=1" ?>" method="post" id="formulario_gral" name="formulario_gral">
    		<input type="hidden" id="op" name="op" value="<?php echo $op ?>" />
        	<input type="hidden" id="s" name="s" value="<?php echo $subseccion ?>" />
            <input type="hidden" id="es" name="es" value="<?php echo $es ?>" />
	        <p>&Uacute;ltima actualizaci&oacute;n: <?php echo $ua ?>, realizada por: <?php echo $usuario ?></p>
    		<div><?php echo $titulo ?></div><br />
    	    <div>
				<div><label for="texto1">Texto</label></div>
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
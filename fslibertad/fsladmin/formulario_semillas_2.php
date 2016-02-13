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
		$consulta = consulta_bd("semillas2", "*", "1;;;id_semilla2='$id';");
		while($filas = mysql_fetch_object($consulta))
		{
			$texto = $filas->texto;
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
						$("#formulario_semillas2").hide();
						var result = $('#enviado').html(data);
						$(result).fadeIn('slow');
					}
				})
				return false;
			});
		</script>
		<form action="formulario_semillas2_2.php?<?php echo "e=1" ?>" method="post" id="formulario_semillas2" name="formulario_semillas2">
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
				<div><label for="texto1">Peque&ntilde;a ense&ntilde;anza</label></div>
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
<?php
session_start();
if (isset($_SESSION['fsluser']))
{
	include("funciones.php");
	$op = $_REQUEST['op'];
	$id = $_REQUEST['s'];
	$es = $_REQUEST['es'];
	if($es=="n")
	{
		$conecta = conecta_bd();
		$consulta = consulta_bd("junta", "*", "1;;;id_miembro='$id';");
		while($filas = mysql_fetch_object($consulta))
		{
			$nombre = $filas->Nombre;
			$perfil = $filas->Perfil;
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
			$('#formulario_jun').submit(function()
			{
				$.ajax(
				{
					type: 'POST',
					url: $(this).attr('action'),
					data: $(this).serialize(),
					success: function(data)
					{
						$("#formulario_jun").hide();
						var result = $('#enviado').html(data);
						$(result).fadeIn('slow');
					}
				})
				return false;
			});
		</script>
		<form action="formulario_jun2.php?<?php echo "e=1" ?>" method="post" id="formulario_jun" name="formulario_jun">
    		<input type="hidden" id="op" name="op" value="<?php echo $op ?>" />
        	<input type="hidden" id="s" name="s" value="<?php if($id!=NULL) echo $id; else echo 0; ?>" />
            <input type="hidden" id="es" name="es" value="<?php echo $es ?>" />
	        <?php if($es=='n') { ?>
            <p>&Uacute;ltima actualizaci&oacute;n: <?php echo $ua ?>, realizada por: <?php echo $usuario ?></p>
            <?php } ?>
            Nombre miembro: <input name="Nombre" type="text" id="Nombre" value="<?php echo $nombre ?>" size="50" />
    	    <p>
			  <div><label for="Perfil">Perfil</label></div>
				<div>
                	<textarea id="Perfil" name="Perfil" class="tinymce" style="width:100%; min-height:300px"><?php echo $perfil ?></textarea>
				</div>
			</p>
          <button type="hidden" id="submit" name="submit"><img src="../imagenes/boton_enviar_off.png" width="24" height="24" /> Enviar</button>
		</form>
        <div id="enviado"></div>
<?php
}
else header("Location: ../");
?>
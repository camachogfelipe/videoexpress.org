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
		$consulta = consulta_bd("fundadores", "*", "1;;;id_fundador='$id';");
		while($filas = mysql_fetch_object($consulta))
		{
			$nombre = $filas->Nombre;
			$perfil = $filas->Perfil;
			$experiencia = $filas->Experiencia;
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
			$('#formulario_fun').submit(function()
			{
				$.ajax(
				{
					type: 'POST',
					url: $(this).attr('action'),
					data: $(this).serialize(),
					success: function(data)
					{
						$("#formulario_fun").hide();
						var result = $('#enviado').html(data);
						$(result).fadeIn('slow');
					}
				})
				return false;
			});
		</script>
		<form action="formulario_fun2.php?<?php echo "e=1" ?>" method="post" id="formulario_fun" name="formulario_fun">
    		<input type="hidden" id="op" name="op" value="<?php echo $op ?>" />
        	<input type="hidden" id="s" name="s" value="<?php if($id!=NULL) echo $id; else echo 0; ?>" />
            <input type="hidden" id="es" name="es" value="<?php echo $es ?>" />
	        <?php if($es=='n') { ?>
            <p>&Uacute;ltima actualizaci&oacute;n: <?php echo $ua ?>, realizada por: <?php echo $usuario ?></p>
            <?php } ?>
            Nombre fundador: <input name="Nombre" type="text" id="Nombre" value="<?php echo $nombre ?>" size="50" />
    	    <p>
			  <div><label for="Perfil">Perfil profesional</label></div>
				<div>
                	<textarea id="Perfil" name="Perfil" class="tinymce" style="width:100%; min-height:300px"><?php echo $perfil ?></textarea>
				</div>
			</p>
            <div>
				<div><label for="Experiencia">Experiencia Laboral</label></div>
				<div>
               	  <textarea id="Experiencia" name="Experiencia" class="tinymce" style="width:100%; min-height:300px"><?php echo $perfil ?></textarea>
				</div>
			</div>
          <button type="hidden" id="submit" name="submit"><img src="../imagenes/boton_enviar_off.png" width="24" height="24" /> Enviar</button>
		</form>
        <div id="enviado"></div>
<?php
}
else header("Location: ../");
?>
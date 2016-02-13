<?php
session_start();
if (isset($_SESSION['fsluser']))
{
	include("funciones.php");
	$op = $_REQUEST['op'];
	$s = $_REQUEST['s'];
	$es = $_REQUEST['es'];
	$conecta = conecta_bd();
	$consulta = consulta_bd("que_hacemos", "*", "1;;;ID_seccion='$s';");
	while($filas = mysql_fetch_object($consulta))
	{
		$titulo = $filas->Titulo;
		$email = $filas->Email;
		$nombre = $filas->Coordinador;
		$descripcion = $filas->Descripcion;
		$dream = $filas->Dream;
		$ua = $filas->Ultima_actualizacion;
		$usuario = $filas->Usuario;
	}
?>
		<script language="javascript" src="../scripts/jquery.validate.js"></script>
        <script language="javascript" src="../scripts/jquery.validate.additional-methods.js"></script>
        <script type="text/javascript" src="../scripts/tinymce/jscripts/tiny_mce/jquery.tinymce.js"></script>
		<script type="text/javascript" src="../scripts/editor_texto.js"></script>
        <script language="javascript">
			$('#formulario_qh').submit(function()
			{
				$.ajax(
				{
					type: 'POST',
					url: $(this).attr('action'),
					data: $(this).serialize(),
					success: function(data)
					{
						$("#formulario_qh").hide();
						var result = $('#enviado').html(data);
						$(result).fadeIn('slow');
					}
				})
				return false;
			});
		</script>
		<form action="formulario_qh2.php?<?php echo "e=1" ?>" method="post" id="formulario_qh" name="formulario_qh">
    		<input type="hidden" id="op" name="op" value="<?php echo $op ?>" />
        	<input type="hidden" id="s" name="s" value="<?php echo $s ?>" />
            <input type="hidden" id="es" name="es" value="<?php echo $es ?>" />
            <p>&Uacute;ltima actualizaci&oacute;n: <?php echo $ua ?>, realizada por: <?php echo $usuario ?></p>
            <p>Monta&ntilde;a: <?php echo $titulo ?></p>
            Nombre coordinador: <input name="Nombre" type="text" id="Nombre" value="<?php echo $nombre ?>" size="50" />
            <br />Email coordinador: <input name="Email" type="text" id="Email" value="<?php echo $email ?>" size="50" />
    	    <p>
				<div><label for="Descripcion">Descripci&oacute;n</label></div>
				<div>
                	<textarea id="Descripcion" name="Descripcion" class="tinymce" style="width:100%; min-height:200px"><?php echo $descripcion ?></textarea>
				</div>
			</p>
            <div>
				<div><label for="Dream">Sue&ntilde;o</label></div>
				<div>
               	  <textarea id="Dream" name="Dream" class="tinymce" style="width:100%; min-height:300px"><?php echo $dream ?></textarea>
				</div>
			</div>
          <button type="hidden" id="submit" name="submit"><img src="../imagenes/boton_enviar_off.png" width="24" height="24" /> Enviar</button>
		</form>
        <div id="enviado"></div>
<?php
}
else header("Location: ../");
?>
<?php
session_start();
if (isset($_SESSION['fsluser']))
{
	include("funciones.php");
	$op = $_REQUEST['op'];
	$subseccion = $_REQUEST['s'];
	$es = $_REQUEST['es'];
	$id = $_REQUEST['id'];
	if($id != NULL and $s != "nvo_editorial")
	{
		$conecta = conecta_bd();
		$consulta = consulta_bd("editoriales", "*", "1;;;ID_editorial='$id';");
		while($filas = mysql_fetch_object($consulta))
		{
			$titulo = $filas->Titulo;
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
			$('#formulario_editorial').submit(function()
			{
				$.ajax(
				{
					type: 'POST',
					url: $(this).attr('action'),
					data: $(this).serialize(),
					success: function(data)
					{
						alert(data);
						$("#formulario_editorial").hide();
						var result = $('#enviado').html(data);
						$(result).fadeIn('slow');
					}
				})
				return false;
			});
		</script>
		<form action="formulario_editorial2.php?<?php echo "e=1" ?>" method="post" id="formulario_editorial" name="formulario_editorial">
    		<input type="hidden" id="op" name="op" value="<?php echo $op ?>" />
        	<input type="hidden" id="s" name="s" value="<?php echo $subseccion ?>" />
            <input type="hidden" id="es" name="es" value="<?php echo $es ?>" />
            <input type="hidden" id="id" name="id" value="<?php echo $id ?>" />
			<label for="Titulo">T&iacute;tulo: </label>
            <input name="Titulo" type="text" id="Titulo" value="<?php echo $titulo ?>" size="50" />
	        <?php
				if($id != NULL)
				{
            ?>
          <p>&Uacute;ltima actualizaci&oacute;n: <?php echo $ua ?>, realizada por: <?php echo $usuario ?></p>
            <?php } ?>
    	    <div>
            	<div>
                	<select name="Tema">
                	  <option value="1" selected="selected">Ministerial</option>
                	  <option value="2">Educacion</option>
                	  <option value="3">Gobierno civil y estado</option>
                	  <option value="4">Economia y negocios</option>
                	  <option value="5">Social</option>
                	  <option value="6">Arte y entretenimiento</option>
                	  <option value="7">Medios de comunicacion</option>
                    </select>
                </div>
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
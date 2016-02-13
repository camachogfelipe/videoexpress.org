<?php
session_start();
if (isset($_SESSION['fsluser']))
{
	include("funciones.php");
	$op = $_REQUEST['op'];
	$subseccion = $_REQUEST['s'];
	$conecta = conecta_bd();
	$consulta = consulta_bd("informacion_gral", "Titulo, Links, Texto, Ultima_edicion, Usuario", "1;;;ID_seccion='$op' and Subseccion='$subseccion';");
	while($filas = mysql_fetch_object($consulta))
	{
		$titulo = $filas->Titulo;
		$links = $filas->Links;
		$texto = $filas->Texto;
		$ua = $filas->Ultima_edicion;
		$usuario = $filas->Usuario;
	}
	if($_GET['e'] == 1 and $op != NULL and $subseccion != NULL and $_POST['titulo'] != NULL and $_POST['links'] != NULL and $_POST['texto'] != NULL)
	{
		$titulo = htmlentities($_POST['titulo']);
		$titulo = $_POST['links'];
		$texto = $_POST['texto'];
		$ue = date("Y-m-d H:i:s");
		act_datos_tabla("informacion_gral", "Titulo='$titulo', Texto='$texto', Ultima_edicion='$ue', Usuario='$_SESSION[Nombre]'", "ID_seccion='$op' and Subseccion='$subseccion'", 1);
		echo "Se han realizado los cambios con exito";
	}
	else
	{
		
?>
		<form action="?<?php echo "e=1" ?>" method="post" name="formulario_gral">
        <?php
			if($s=="biofundadores") echo '<input type="hidden" id="fundador" value="Y" />';
			else echo '<input type="hidden" id="fundador" value="N" />';;
		?>
    		<input type="hidden" id="op" name="op" value="<?php echo $op ?>" />
        	<input type="hidden" id="s" name="s" value="<?php echo $subseccion ?>" />
            <input type="hidden" id="es" name="es" value="<?php echo $es ?>" />
	        <p>&Uacute;ltima actualizaci&oacute;n: <?php echo $ua ?>, realizada por: <?php echo $usuario ?></p>
    		<div>
				<div id="texto"><label for="titulo">T&iacute;tulo</label></div>
				<input type="text" name="titulo" id="titulo" tabindex="1" value="<?php echo $titulo ?>" />
			</div>
    	    <div>
				<div id="texto"><label for="texto">Texto</label></div>
				<?php
					include("FCKeditor/fckeditor.php");
					$oFCKeditor = new FCKeditor('texto');
					$oFCKeditor->BasePath = 'FCKeditor/';
					$oFCKeditor->Value = $texto;
					$oFCKeditor->Width  = '100%';
					$oFCKeditor->Height = '500';
					$oFCKeditor->Create();
				?>
			</div>
		</form>
<?php
	}
}
else header("Location: ../");
?>